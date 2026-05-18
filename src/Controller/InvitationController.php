<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Invitation;
use App\Entity\Utilisateur;
use App\Form\InvitationType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Psr\Log\LoggerInterface;

class InvitationController extends AbstractController
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;
    private const MAX_INVITATIONS_PER_ADMIN = 50;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    #[Route('/admin/invite', name: 'app_invite')]
    public function invite(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        /** @var Utilisateur $user */
        $user = $this->getUser();
        $institution = $user->getInstitution();
        
        if (!$institution) {
            $this->addFlash('error', 'Vous n\'administrez aucune institution');
            return $this->redirectToRoute('app_dashboard');
        }

        $invitationCount = $user->countInvitations();

        if ($invitationCount >= self::MAX_INVITATIONS_PER_ADMIN) {
            $this->addFlash('error', sprintf('Limite de %d invitations atteinte', self::MAX_INVITATIONS_PER_ADMIN));
            return $this->render('invitation/limit_reached.html.twig', [
                'maxInvitations' => self::MAX_INVITATIONS_PER_ADMIN
            ]);
        }
        
        $invitation = new Invitation();
        $form = $this->createForm(InvitationType::class, $invitation, [
            'current_user' => $user
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $invitation
                    ->setExpiresAt(new \DateTimeImmutable('+7 days'))
                    ->setCreatedAt(new \DateTimeImmutable())
                    ->setInvitedBy($user)
                    ->setInstitution($institution);
                
                $em->persist($invitation);
                $em->flush();
                
                $this->sendInvitationEmail($invitation);
                $this->addFlash('success', 'Invitation envoyée avec succès');
                
                return $this->redirectToRoute('app_invite');
                
            } catch (TransportExceptionInterface $e) {
                $this->logger->error('Erreur envoi email: '.$e->getMessage());
                $this->addFlash('error', 'Erreur lors de l\'envoi de l\'invitation');
            } catch (\Exception $e) {
                $this->logger->error('Erreur invitation: '.$e->getMessage());
                $this->addFlash('error', 'Une erreur est survenue');
            }
        }
        
        return $this->render('invitation/new.html.twig', [
            'form' => $form->createView(),
            'invitationCount' => $invitationCount,
            'remainingInvitations' => self::MAX_INVITATIONS_PER_ADMIN - $invitationCount,
        ]);
    }

    private function sendInvitationEmail(Invitation $invitation): void
    {
        try {
            $email = (new Email())
                ->from('no-reply@votre-domaine.com')
                ->to($invitation->getEmail())
                ->subject('Invitation à rejoindre notre plateforme')
                ->html($this->renderView('emails/invitation.html.twig', [
                    'invitation' => $invitation,
                    'expires_at' => $invitation->getExpiresAt()->format('Y-m-d H:i:s'),
                    'institution' => $invitation->getInstitution(),
                ]));

            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Erreur envoi email: '.$e->getMessage());
            throw $e;
        }
    }

    #[Route('/invitation/accept/{token}', name: 'app_invitation_accept')]
    public function acceptInvitation(string $token, EntityManagerInterface $em, Request $request): Response
    {
        // Debug: Vérifier d'abord si l'invitation existe (sans vérifier l'expiration)
        $invitationExists = $em->getRepository(Invitation::class)->findOneBy(['token' => $token]);
        
        if (!$invitationExists) {
            $this->addFlash('error', 'Token d\'invitation non trouvé');
            return $this->redirectToRoute('app_home');
        }
        
        // Debug: Vérifier si elle est expirée
        if ($invitationExists->isExpired()) {
            $this->addFlash('error', sprintf(
                'Invitation expirée le %s', 
                $invitationExists->getExpiresAt()->format('d/m/Y H:i')
            ));
            return $this->redirectToRoute('app_home');
        }
        
        // L'invitation est valide
        $invitation = $invitationExists;
        
        if ($this->getUser()) {
            return $this->processInvitation($invitation, $em);
        }
        
        $request->getSession()->set('invitation_token', $token);
        return $this->redirectToRoute('app_register', [
            'email' => $invitation->getEmail(),
            'institution' => $invitation->getInstitution()->getId()
        ]);
    }
    
    private function processInvitation(Invitation $invitation, EntityManagerInterface $em): Response
    {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        
        if ($user->getInstitution()) {
            $this->addFlash('warning', 'Vous appartenez déjà à une institution');
            return $this->redirectToRoute('app_home');
        }

        try {
            $user->setInstitution($invitation->getInstitution());
            
            $em->remove($invitation);
            $em->flush();
            
            $this->addFlash('success', 'Vous avez rejoint l\'institution avec succès');
            return $this->redirectToRoute('app_dashboard');
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors du traitement de l\'invitation');
            return $this->redirectToRoute('app_home');
        }
    }
}