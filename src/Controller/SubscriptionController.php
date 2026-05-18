<?php

namespace App\Controller;

use Stripe\StripeClient;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;



class SubscriptionController extends AbstractController
{
    private string $stripeSecretKey;

    public function __construct(
        private EntityManagerInterface $em,
        private ManagerRegistry $doctrine,
        ParameterBagInterface $params
    ) {
        $this->stripeSecretKey = $params->get('stripe_secret_key');
    }
#[Route('/subscribe', name: 'subscribe')]
public function subscribe(): RedirectResponse
{
    /** @var Utilisateur $user */
    $user = $this->getUser();
    
    if (!$user instanceof Utilisateur) {
        throw new AccessDeniedException('Accès refusé');
    }

    $stripe = new StripeClient($this->stripeSecretKey);

    // 1. Gestion du client Stripe
    $stripeCustomerId = $user->getAbonnementId();
    
    if (!$stripeCustomerId) {
        $customer = $stripe->customers->create([
            'email' => $user->getCourriel(),
            'name' => $user->getPrenom().' '.$user->getNom(),
            'metadata' => ['user_id' => $user->getId()]
        ]);
        $stripeCustomerId = $customer->id;
        $user->setAbonnementId($stripeCustomerId);
    }

    // 2. Calcul de la période d'essai
    $trialEnd = $user->getTrialEndsAt() ?? new \DateTime();
    
    // Si l'utilisateur n'a jamais souscrit OU que son essai est expiré
    if ($user->getSubscriptionCount() === 0 || $trialEnd < new \DateTime()) {
        // Nouvel utilisateur ou essai expiré: 3 mois
        $trialEnd = new \DateTime();
        $trialEnd->add(new \DateInterval('P3M'));
    } else {
        // Réabonnement: ajoute 1 mois à la date existante
        $trialEnd = new \DateTime();
        $trialEnd->add(new \DateInterval('P1M'));
    }

    // 3. Création de l'abonnement Stripe
    $subscription = $stripe->subscriptions->create([
        'customer' => $stripeCustomerId,
        'items' => [['price' => $_ENV['STRIPE_PRICE_ID_PREMIUM']]],
        'trial_end' => $trialEnd->getTimestamp()
    ]);

    // 4. Mise à jour de l'utilisateur
    $user->setTrialEndsAt($trialEnd);
    $user->setSubscriptionCount($user->getSubscriptionCount() + 1);
    $this->em->flush();
    
    return $this->redirectToRoute('payment_success');
}



}