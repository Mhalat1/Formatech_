<?php

namespace App\Controller;

use App\Entity\StripePayment;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StripeWebhookController extends AbstractController
{
    public function __construct(
        private LoggerInterface $logger,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/webhooks/stripe', name: 'app_stripe_webhook', methods: ['POST'])]
    public function index(Request $request): Response
    {
        try {
            $payload = $request->getContent();
            $signature = $request->headers->get('stripe-signature');
            // 1. VÉRIFICATION DE LA SIGNATURE (SECURITE 1/1 pour être sûr que la requette vient de stripe)
            if (!$this->verifyStripeSignature($payload, $signature)) {
                $this->logger->error('Invalid Stripe signature');
                return new Response('Invalid signature', 403);
            }
            
            // Log de base
            $this->logger->info('Stripe Webhook received', [
                'payload_length' => strlen($payload),
                'signature_present' => $request->headers->has('stripe-signature')
            ]);

            if (empty($payload)) {
                $this->logger->error('Empty payload received');
                return new Response('Empty payload', 400);
            }

            $data = json_decode($payload, true, 512, JSON_THROW_ON_ERROR);
            
            // Gestion des événements
            switch ($data['type'] ?? null) {
                case 'montant.payment_succeeded':
                    $this->handleInvoicePayment($data);
                    break;
                    
                case 'payment_intent.succeeded':
                    $this->handlePaymentIntentSucceeded($data);
                    break;
                    
                default:
                    $this->logger->info('Unhandled event type', ['type' => $data['type'] ?? 'unknown']);
            }

            return new Response('Event processed: ' . ($data['type'] ?? 'unknown'), 200);

        } catch (\JsonException $e) {
            $this->logger->error('Invalid JSON payload', ['error' => $e->getMessage()]);
            return new Response('Invalid JSON', 400);
        } catch (\Exception $e) {
            $this->logger->error('Webhook processing failed', ['error' => $e->getMessage()]);
            return new Response('Server Error', 500);
        }
    }

    private function verifyStripeSignature(string $payload, ?string $signature): bool
    {
        if (empty($signature)) {
            return false;
        }

        try {
            // 1. Récupère le secret depuis les variables d'environnement
            $endpointSecret = $this->getParameter('stripe_webhook_secret');
            
            // 2. Utilise la librairie Stripe pour vérifier
            \Stripe\Webhook::constructEvent(
                $payload,
                $signature,
                $endpointSecret
            );
            
            return true;
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            $this->logger->error('Stripe signature verification failed', [
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    private function handlePaymentIntentSucceeded(array $data): void
    {
        $paymentIntent = $data['data']['object'];
        
        // Vérifier si le paiement existe déjà
        $existingPayment = $this->entityManager->getRepository(StripePayment::class)
            ->findOneBy(['paymentIntentId' => $paymentIntent['id']]);
            
        if ($existingPayment) {
            $this->logger->info('Payment already processed', ['payment_intent_id' => $paymentIntent['id']]);
            return;
        }

        // Créer un nouveau paiement
        $payment = new StripePayment();
        $payment->setPaymentIntentId($paymentIntent['id']);
        $payment->setAmount($paymentIntent['amount']);
        $payment->setCurrency(strtoupper($paymentIntent['currency']));
        $payment->setStatus($paymentIntent['status']);
        $payment->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($payment);
        $this->entityManager->flush();
        
        $this->logger->info('Payment saved successfully', [
            'payment_id' => $payment->getId(),
            'amount' => $payment->getAmount()
        ]);
    }


    private function handleInvoicePayment(array $data): void
    {
        $montant = $data['data']['object'];
        $customerId = $montant['customer'];
        
        $user = $this->entityManager->getRepository(Utilisateur::class)
            ->findOneBy(['stripeCustomerId' => $customerId]);

        if ($user) {
            $user->setAmountPaid($montant['amount_paid'] / 100);
            $this->entityManager->flush();
        }
    }


}


//Pour tester :
// bash
//stripe listen --forward-to https://localhost:8000/webhooks/stripe
//stripe trigger payment_intent.succeeded

//Tunnel de communication :
//Stripe ne peut pas atteindre directement votre localhost (votre machine n'est pas accessible depuis internet)
//La CLI Stripe crée un tunnel sécurisé entre leurs serveurs et votre machine locale

// !!! Sans stripe listen, les événements Stripe n'ont aucun chemin pour atteindre votre application locale

// EN PRODUCTION IL FAUDRA UN URL PUBLIC EN HTTPS (ex: https://votresite.com/webhooks/stripe)

// methode ::: pour ajouter https public dans stripe 
// 1 ) aller en bas à gauche developper *
// 2 ) choisir webhooks 
// 3 ) en haut à droite choisir + ajouter destination 
// 4 ) dans select events choisir stripe trigger payment_intent.succeeded 
// 5 ) inscrire l'url public en https 
// ...

// ! créer compte cloudflare avec nom de domaine gratuit pour avoir un https public gratuit 
