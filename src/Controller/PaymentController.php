<?php

// src/Controller/PaymentController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Utilisateur;

class PaymentController extends AbstractController
{
    #[Route('/payment-required', name: 'payment_required')]
    public function paymentRequired(
        ParameterBagInterface $params,
        Request $request
    ): Response {
        $error = $request->query->get('error');
        $baseUrl = $request->getSchemeAndHttpHost();
        
        // Récupérer l'utilisateur connecté directement via AbstractController
        $user = $this->getUser();
        $username = $user ? $user->getUserIdentifier() : 'Guest';

        return $this->render('payment/required.html.twig', [
            'stripe_price_premium' => 19.90,
            'stripe_price_basique' => 9.90,
            'stripe_public_key' => $params->get('stripe_public_key'),
            'stripe_price_id_basique' => $params->get('stripe_price_id_basique'),
            'stripe_price_id_premium' => $params->get('stripe_price_id_premium'),
            'success_url' => $baseUrl.$this->generateUrl('payment_success'),
            'cancel_url' => $baseUrl.$this->generateUrl('payment_required'),
            'username' => $username
        ]);
    }


    // ✅ NOUVELLE MÉTHODE : Créer une session Stripe Checkout

    #[Route('/create-checkout-session', name: 'create_checkout_session', methods: ['POST'])]
    public function createCheckoutSession(Request $request, ParameterBagInterface $params): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'User not authenticated'], 403);
        }

        try {
            // Récupérer le type d'abonnement depuis la requête
            $data = json_decode($request->getContent(), true);
            $subscriptionType = $data['subscription_type'] ?? null;

            if (!in_array($subscriptionType, ['basique', 'premium'])) {
                return new JsonResponse(['error' => 'Invalid subscription type'], 400);
            }

            // Déterminer le price_id selon le type
            $priceId = $subscriptionType === 'basique' 
                ? $params->get('stripe_price_id_basique')
                : $params->get('stripe_price_id_premium');

            $stripeSecretKey = $params->get('stripe_secret_key');
            if (empty($stripeSecretKey)) {
                throw new \RuntimeException('Stripe secret key is not configured.');
            }

            \Stripe\Stripe::setApiKey($stripeSecretKey);

            // ✅ CRÉATION de la session Stripe
            $checkoutSession = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $priceId,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => $this->generateUrl('payment_success', [], UrlGeneratorInterface::ABSOLUTE_URL) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $this->generateUrl('payment_cancel', [], UrlGeneratorInterface::ABSOLUTE_URL),
                'customer_email' => $user->getUserIdentifier(),
                'metadata' => [
                    'user_id' => $user->getId(),
                    'subscription_type' => $subscriptionType
                ],
            ]);

            return new JsonResponse(['id' => $checkoutSession->id]);

        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('/payment/success', name: 'payment_success')]
    public function paymentSuccess(Request $request, ParameterBagInterface $params, EntityManagerInterface $entityManager
): Response
    {
// Récupérer l'utilisateur connecté (retourne l'entité si correctement configuré)
        $user = $this->getUser();
        $username = $user->getUserIdentifier();
        $utilisateur = $entityManager->getRepository(Utilisateur::class)->find($user->getId());

        // Initialize with default value
        $subscriptionType = 'unknown';
        $paymentIntent = $request->query->get('payment_intent');
        $sessionId = $request->query->get('session_id');

        // Vérifier que session_id est présent
        if (!$sessionId) {
            $this->addFlash('error', 'Session ID manquant');
            return $this->render('payment/success.html.twig', [
                'payment_intent' => $paymentIntent,
                'session_id' => null,
                'subscription_type' => 'unknown',
                'stripe_public_key' => $params->get('stripe_public_key'),
                'username' => $username
            ]);
        }

        try {
            $stripeSecretKey = $params->get('stripe_secret_key');
            if (empty($stripeSecretKey)) {
                throw new \RuntimeException('Stripe secret key is not configured.');
            }

            \Stripe\Stripe::setApiKey($stripeSecretKey);

            // Récupérer la session existante
            $checkoutSession = \Stripe\Checkout\Session::retrieve($sessionId);

            // Vérifier que la session est complète
            if ($checkoutSession->payment_status === 'paid') {
                
                // D'abord vérifier les metadata
                if (isset($checkoutSession->metadata['subscription_type'])) {
                    $subscriptionType = $checkoutSession->metadata['subscription_type'];

                // Update user in database
                $utilisateur->setSubscriptionType($subscriptionType);
                $entityManager->flush();
                }
                // Sinon, récupérer depuis l'abonnement
                elseif ($checkoutSession->mode === 'subscription' && isset($checkoutSession->subscription)) {
                    $subscription = \Stripe\Subscription::retrieve($checkoutSession->subscription);
                    $priceId = $subscription->items->data[0]->price->id;
                    
                    // Compare with configured price IDs
                    $basicPriceId = $params->get('stripe_price_id_basique');
                    $premiumPriceId = $params->get('stripe_price_id_premium');
                    
                    if ($priceId === $basicPriceId) {
                        $subscriptionType = 'basique';
                    } elseif ($priceId === $premiumPriceId) {
                        $subscriptionType = 'premium';
                    }

                        // ENREGISTREMENT DANS LA BDD
                    $utilisateur->setSubscriptionType($subscriptionType);
                    $entityManager->flush();

                }
            } else {
                throw new \Exception('Payment not completed. Status: ' . $checkoutSession->payment_status);
            }
            
        } catch (\Exception $e) {
            // Log error and keep subscriptionType as 'unknown'
            error_log('Stripe error in paymentSuccess: ' . $e->getMessage());
            $this->addFlash('error', 'Erreur lors de la vérification: ' . $e->getMessage());
        }

        return $this->render('payment/success.html.twig', [
            'payment_intent' => $paymentIntent,
            'session_id' => $sessionId,
            'subscription_type' => $subscriptionType,
            'stripe_public_key' => $params->get('stripe_public_key'),
            'username' => $username
        ]);
    }

    #[Route('/payment/cancel', name: 'payment_cancel')]
    public function paymentCancel(): Response
    {
        $this->addFlash('warning', 'Paiement annulé');
        return $this->redirectToRoute('payment_required');
    }
}