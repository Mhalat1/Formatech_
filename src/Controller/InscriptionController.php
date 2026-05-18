<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\Institution;
use App\Entity\Invitation;
use App\Form\RegistrationFormType;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class InscriptionController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
public function register(
    Request $request,
    UserPasswordHasherInterface $userPasswordHasher,
    Security $security,
    EntityManagerInterface $entityManager
): Response {
    $user = new Utilisateur();
    $form = $this->createForm(RegistrationFormType::class, $user);

    // Gestion de l'invitation
    $token = $request->query->get('token') ?? $request->getSession()->get('invitation_token');
    $invitationData = $request->getSession()->get('invitation_institution');
    $invitation = null;
    
    if ($token) {
        $invitation = $entityManager->getRepository(Invitation::class)->findValidInvitation($token);
        
        if ($invitation) {
            // Pré-remplir l'email et masquer les champs d'institution
            $user->setCourriel($invitation->getEmail());
            
            // Utiliser les données de session si disponibles, sinon celles de l'invitation
            $institutionNom = $invitationData['nom'] ?? $invitation->getInstitution()->getNom();
            $institutionAdresse = $invitationData['adresse'] ?? $invitation->getInstitution()->getAdresse();
            $institutionTelephone = $invitationData['telephone'] ?? $invitation->getInstitution()->getTelephone();
            $institutionCourriel = $invitationData['courriel'] ?? $invitation->getInstitution()->getCourriel();
            
            // Pré-remplir les données de l'institution dans le formulaire
            $form->get('institutionNom')->setData($institutionNom);
            $form->get('institutionAdresse')->setData($institutionAdresse);
            $form->get('institutionTelephone')->setData($institutionTelephone);
            $form->get('institutionCourriel')->setData($institutionCourriel);
            

        }
    }

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

// LOGIQUER POUR DONNER ROLE USER AU INVITER ET ROEL ADMIN AU CREATEUR
        // Vérifier si c'est une inscription via invitation
        if ($token) {
            $user->setRoles(['ROLE_USER']); // Seulement le rôle USER pour les invités
        } else {
            // Vérifier si c'est le premier utilisateur (créateur de l'institution)
            $userCount = $entityManager->getRepository(Utilisateur::class)->count([]);
            // attribution de role ternaire vrai admin et user faux seuelement user
            $user->setRoles($userCount === 0 ? ['ROLE_ADMIN', 'ROLE_USER'] : ['ROLE_USER']);
        }


        // Cas d'une invitation
        if ($invitation) {
            $institution = $invitation->getInstitution();
            $user->setInstitution($institution);
            $entityManager->remove($invitation);
            
            // Nettoyer la session
            $request->getSession()->remove('invitation_token');
            $request->getSession()->remove('invitation_institution');
        } 
        // Cas d'une inscription normale
        else {
            // Récupérer les données de l'institution
            $institutionNom = $form->get('institutionNom')->getData();
            $institutionAdresse = $form->get('institutionAdresse')->getData();
            $institutionTelephone = $form->get('institutionTelephone')->getData();
            $institutionCourriel = $form->get('institutionCourriel')->getData();
            
            // Vérifier si l'institution existe déjà
            $institution = $entityManager->getRepository(Institution::class)
                ->findOneBy(['nom' => $institutionNom]);
            
            // Si elle n'existe pas, la créer
            if (!$institution) {
                $institution = new Institution();
                $institution->setNom($institutionNom);
                $institution->setAdresse($institutionAdresse);
                $institution->setTelephone($institutionTelephone);
                $institution->setCourriel($institutionCourriel);
                $entityManager->persist($institution);
            }
            
            $user->setInstitution($institution);
        }

        // Encoder le mot de passe
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $form->get('plainPassword')->getData()
            )
        );

        $entityManager->persist($user);
        $entityManager->flush();

        return $security->login($user, UsersAuthenticator::class, 'main');
    }

    return $this->render('inscription/inscription.html.twig', [
        'registrationForm' => $form->createView(),
        'isInvitation' => $invitation !== null,
        'invitation' => $invitation,
        'invitationData' => $invitationData // Passer aussi les données de session au template
    ]);
}}