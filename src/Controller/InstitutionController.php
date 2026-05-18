<?php

namespace App\Controller;

use App\Repository\InstitutionRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\ModuleRepository;
use App\Repository\SessionRepository;
use App\Repository\SessionModuleRepository;

use App\Repository\UtilisateurInstitutionSessionModuleRepository;  // Ajoute cette ligne
use App\Entity\Utilisateur;  // Ensure that the entity is correctly imported
use App\Entity\Institution;  // Ensure that the entity is correctly imported 
use App\Entity\Session;  // Ensure that the entity is correctly imported
use App\Entity\Module;  // Ensure that the entity is correctly imported
use App\Entity\SessionModule;  // Ensure that the entity is correctly 


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UtilisateurType;
use App\Form\InstitutionType;
use App\Form\ModuleType;
use App\Form\SessionType;  // Ensure that the form is correctly imported
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Form\UtilisateurRoleType;  // Ensure that the form is correctly imported
use App\Form\UtilisateurInstitutionSessionModuleType;  // Ensure that the form is correctly imported
use App\Form\CommentaireModuleType;
use App\Form\UtilisateurCommentaireType;

use App\Service\PdfGenerator;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

use App\Traits\CommonDataTrait;
use Doctrine\Persistence\ManagerRegistry;

class InstitutionController extends AbstractController
{
    use CommonDataTrait;



    // Route to display institutions and add a user on the same route
    #[Route('/infoinstitution', name: 'institution_index_ajouter')]
    public function indexEtAjouter(
        Request $request,
        InstitutionRepository $institutionRepository,
        UtilisateurRepository $utilisateurRepository,
        SessionRepository $sessionRepository,
        UtilisateurInstitutionSessionModuleRepository $utilisateurInstitutionSessionModuleRepository,
        ModuleRepository $moduleRepository,  // Ensure that the entity is correctly imported
        EntityManagerInterface $em,

        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""

    ): Response {
        $commonData = $this->getCommonData($doctrine);
        // Retrieve all institutions 
        $utilisateurInstitutionSessionModule = $utilisateurInstitutionSessionModuleRepository;
        $institutions = $institutionRepository->findAll();
        $sessions = $sessionRepository->findAll();
        $modules = $moduleRepository->findAll();
        $utilisateurs_liste = $utilisateurRepository->findAll();



        // PARTIE CREATIONS //

        // Create a new Session object
        $session = new Session();
        $form_session = $this->createForm(SessionType::class, $session, [
            'data_class' => Session::class,  // Assurez-vous que le formulaire est lié à la bonne entité
        ]);
        $form_session->handleRequest($request);

        // If the session form is submitted and valid
        if ($form_session->isSubmitted() && $form_session->isValid()) {
            // Save the session in the database
            $em->persist($session);
            $em->flush();
            // Add a success flash message
            $this->addFlash('success', 'Session ajoutée avec succès!');
            // Redirect to the same page to display changes
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Créer un nouvel objet Module
        $module = new Module();
        $form_module = $this->createForm(ModuleType::class, $module,  [
            'data_class' => Module::class,  // Assurez-vous que le formulaire est lié à la bonne entité
        ]);
        $form_module->handleRequest($request);

        // Si le formulaire du module est soumis et valide
        if ($form_module->isSubmitted() && $form_module->isValid()) {
            // Sauvegarder le module dans la base de données
            $em->persist($module);
            $em->flush();
            // Ajouter un message flash de succès
            $this->addFlash('success', 'Module ajouté avec succès!');
            // Rediriger vers la même page pour afficher les changements
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Create a new Institution object
        $institution = new Institution();
        $form_institution = $this->createForm(InstitutionType::class, $institution);
        $form_institution->handleRequest($request);
        // If the institution form is submitted and valid
        if ($form_institution->isSubmitted() && $form_institution->isValid()) {
            // Save the institution in the database
            $em->persist($institution);
            $em->flush();
            // Add a success flash message
            $this->addFlash('success', 'Institution ajoutée avec succès!');
            // Redirect to the same page to display changes
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // PARTIE SUPPRESIONS //


        // Handle the deletion of an institution
        $deleteInstitutionId = $request->get('delete_Institution_id');
        if ($deleteInstitutionId) {
            $institutionToDelete = $institutionRepository->find($deleteInstitutionId);

            if ($institutionToDelete) {
                // Remove the institution
                $em->remove($institutionToDelete);
                $em->flush();
                // Add a success flash message
                $this->addFlash('success', 'Institution supprimée avec succès!');
            } else {
                // If the institution doesn't exist
                $this->addFlash('error', 'Institution non trouvée!');
            }
            // Redirect to the same page
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Gérer la suppression d'un module
        $deleteModuleId = $request->get('delete_Module_id');
        if ($deleteModuleId) {
            $moduleToDelete = $moduleRepository->find($deleteModuleId);

            if ($moduleToDelete) {
                // Supprimer le module
                $em->remove($moduleToDelete);
                $em->flush();
                // Ajouter un message flash de succès
                $this->addFlash('success', 'Module supprimé avec succès!');
            } else {
                // Si le module n'existe pas
                $this->addFlash('error', 'Module non trouvé!');
            }
            // Rediriger vers la même page
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Handle the deletion of a session
        $deleteSessionId = $request->get('delete_Session_id');
        if ($deleteSessionId) {
            $sessionToDelete = $sessionRepository->find($deleteSessionId);

            if ($sessionToDelete) {
                // Remove the session
                $em->remove($sessionToDelete);
                $em->flush();
                // Add a success flash message
                $this->addFlash('success', 'Session supprimée avec succès!');
            } else {
                // If the session doesn't exist
                $this->addFlash('error', 'Session non trouvée!');
            }
            // Redirect to the same page
            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Gérer la suppression d'un utilisateur
        $deleteUtilisateurId = $request->get('delete_Utilisateur_id');
        if ($deleteUtilisateurId) {
            $UtilisateurToDelete = $utilisateurRepository->find($deleteUtilisateurId);

            if ($UtilisateurToDelete) {
                $em->remove($UtilisateurToDelete);
                $em->flush();
                $this->addFlash('success', 'Utilisateur supprimé avec succès!');
            } else {
                $this->addFlash('error', 'Utilisateur non trouvé!');
            }

            return $this->redirectToRoute('institution_index_ajouter');
        }


        // Render the view with the list of institutions and the add forms
        return $this->render('Pages_principaux/page_utilisateur.html.twig', [
            'utilisateurs_liste' => $utilisateurs_liste,
            'institutions' => $institutions,
            'sessions' => $sessions,
            'modules' => $modules,
            'form_institution' => $form_institution->createView(),
            'form_session' => $form_session->createView(),
            'form_module' => $form_module->createView(),
            'utilisateurInstitutionSessionModule' => $utilisateurInstitutionSessionModule,
            ...$commonData,
        ],);
    }



    #[Route("/infoutilisateur/{id}/liste", name: 'utilisateur_liste', methods: ['GET'])]
    public function liste(
        Utilisateur $utilisateur,
        UtilisateurInstitutionSessionModuleRepository $uisRepo,
        ManagerRegistry $doctrine
    ): Response {
        $uisEntities = $uisRepo->findBy(['utilisateur' => $utilisateur]);
        $sessions = [];

        foreach ($uisEntities as $entity) {
            $sessionModule = $entity->getSessionModule();
            if ($sessionModule && $session = $sessionModule->getSession()) {
                $session->__load();
                $sessions[] = $session;
            }
        }

        return $this->render('Pages_principaux/page_utilisateur_info.html.twig', [
            'utilisateur' => $utilisateur,
            'utilisateurInstitutionSessionModules' => $uisEntities,
            'session_liee' => $sessions,
            ...$this->getCommonData($doctrine),
        ]);
    }




    #[Route("/utilisateur/{id}/modifier-roles", name: 'utilisateur_modifier_roles')]
    public function modifierRoles(
        Request $request,
        Utilisateur $utilisateur,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
    ): Response {
        $commonData = $this->getCommonData($doctrine);

        // Create the form for updating roles and email
        $form = $this->createForm(UtilisateurRoleType::class, $utilisateur);

        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the updated roles and email (flush to save changes)
            $em->flush();

            // Flash message to indicate success
            $this->addFlash('success', 'Les rôles et le courriel de l\'utilisateur ont été mis à jour.');

            // Redirect back to the user list or another page
            return $this->redirectToRoute('institution_index_ajouter');
        }

        // Render the form
        return $this->render('Pages_modifications/modifier_roles.html.twig', [
            'form' => $form->createView(),
            'utilisateur' => $utilisateur,
            ...$commonData,
        ]);
    }




    #[Route("/utilisateur/{id}/modifiercommentaire", name: 'utilisateur_modifier')]
    public function modifier(
        int $id,
        UtilisateurRepository $utilisateurRepository,
        Request $request,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""

    ): Response {
        $commonData = $this->getCommonData($doctrine);

        // Récupérer l'utilisateur en fonction de l'ID
        $utilisateur = $utilisateurRepository->find($id);
        // Vérifier si l'utilisateur existe
        if (!$utilisateur) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Créer un formulaire pour modifier uniquement le champ commentaire 
        $form = $this->createForm(UtilisateurCommentaireType::class, $utilisateur);

        // Traiter le formulaire lorsque celui-ci est soumis
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder les modifications en base de données
            $em->persist($utilisateur);
            $em->flush();

            $this->addFlash('success', 'Le commentaire de l\'utilisateur a été modifié avec succès!');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
        }

        // Passer le formulaire à la vue Twig
        return $this->render('Pages_modifications/modifier_commentaire_utilisateur.html.twig', [
            'form' => $form->createView(),
            'utilisateur' => $utilisateur,
            'id' => $id,
            ...$commonData,
        ]);
    }


    #[Route("/utilisateur/{id}/modulecommentaire", name: 'module_commentaire')]
    public function modifiermodulecommentaire(
        int $id,
        UtilisateurInstitutionSessionModuleRepository $utilisateurInstitutionSessionModulesRepository,
        UtilisateurRepository $utilisateurRepository,
        Request $request,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
    ): Response {

        $commonData = $this->getCommonData($doctrine);

        // Récupérer le module en fonction de l'ID
        $utilisateurInstitutionSessionModule = $utilisateurInstitutionSessionModulesRepository->find($id);

        // Vérifier si le module existe
        if (!$utilisateurInstitutionSessionModule) {
            throw $this->createNotFoundException('Module non trouvé');
        }

        // Récupérer l'utilisateur associé au module
        $utilisateur = $utilisateurInstitutionSessionModule->getUtilisateur();

        // Créer le formulaire pour le commentaire et la note du module
        $formcommentairemodule = $this->createForm(CommentaireModuleType::class, $utilisateurInstitutionSessionModule);

        // Gérer la soumission du formulaire
        $formcommentairemodule->handleRequest($request);

        if ($formcommentairemodule->isSubmitted() && $formcommentairemodule->isValid()) {
            // Sauvegarder les modifications en base de données
            $em->persist($utilisateurInstitutionSessionModule);  // Persister l'entité, pas le formulaire
            $em->flush();

            // Rediriger vers la même page, mais avec l'ID de l'utilisateur
            return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
        }

        // Passer le formulaire à la vue Twig
        return $this->render('Pages_modifications/modifier_module_commentairenote.html.twig', [
            'id' => $id,  // Utilise l'ID du module
            'formcommentairemodule' => $formcommentairemodule->createView(),
            ...$commonData,
        ]);
    }
}
