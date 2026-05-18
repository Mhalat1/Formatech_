<?php

namespace App\Controller;

use App\Entity\SessionModule;
use App\Entity\Utilisateur;
use App\Entity\UtilisateurInstitutionSessionModule;
use App\Entity\Institution;
use App\Entity\Session;
use App\Entity\Module;
use App\Entity\JourHoraire;

use App\Form\UtilisateurInstitutionSessionModuleType;
use App\Form\SessionModuleType;

use App\Form\InstitutionCreationType;
use App\Form\SessionCreationType;
use App\Form\ModuleCreationType;
use App\Form\JourHoraireType;

use App\Repository\SessionModuleRepository;
use App\Repository\UtilisateurInstitutionSessionModuleRepository; // Ajoutez cette ligne
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ModuleRepository; // Ajoutez cette ligne
use App\Repository\SessionRepository; // Ajoutez cette ligne
use App\Repository\InstitutionRepository; // Ajoutez cette ligne
use App\Repository\UtilisateurRepository; // Ajoutez cette ligne



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\UtilisateurType;
use App\Form\InstitutionType;
use App\Form\ModuleType;
use App\Form\SessionType;  // Ensure that the form is correctly imported
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


use App\Traits\CommonDataTrait;
use Doctrine\Persistence\ManagerRegistry;


class SessionModuleController extends AbstractController
{
    use CommonDataTrait;

    #[Route('/infosessionmodule', name: 'app_Session_Module')]
    public function index(
        ModuleRepository $ModuleRepository, // Ajoutez cette ligne
        SessionRepository $SessionRepository, // Ajoutez cette ligne
        InstitutionRepository $InstitutionRepository, // Ajoutez cette ligne
        SessionModuleRepository $sessionModuleRepository,
        UtilisateurInstitutionSessionModuleRepository $utilisateurInstitutionSessionModuleRepository, // Ajoutez cette ligne
        UtilisateurRepository $UtilisateurRepository, // Ajoutez cette ligne pour injecter le repository
        Request $request,
        EntityManagerInterface $em,
        SessionModuleRepository $sessionModuleRepo,
        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""

        ): Response{

        $commonData = $this->getCommonData($doctrine);
        // Récupérer toutes les associations existantes de SessionModule et UtilisateurInstitutionSessionModule
        $utilisateurInstitutionSessionModules = $utilisateurInstitutionSessionModuleRepository->findAll();
        // Récupérer les modules et sessions (inchangé)
        $modulesandsessions = $sessionModuleRepository->findAll();



                    // PARTIE CREATION //

// Créer un nouvel objet SessionModule pour l'ajout (inchangé)
        $sessionModule = new SessionModule();
        $form = $this->createForm(SessionModuleType::class, $sessionModule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($sessionModule);
            $em->flush();
            $this->addFlash('success', 'Votre combinaisson Institution Session Module a bien été crée !');
            return $this->redirectToRoute('app_Session_Module');
        }



// Créer une nouvelle instance de UtilisateurInstitutionSessionModule pour l'ajouter
    $stats = $utilisateurInstitutionSessionModuleRepository->countUsersPerSessionModule();
        $utilisateurInstitutionSessionModule = new UtilisateurInstitutionSessionModule();
        $formUtilisateurInstitutionSessionModule = $this->createForm(UtilisateurInstitutionSessionModuleType::class, $utilisateurInstitutionSessionModule);
        $formUtilisateurInstitutionSessionModule->handleRequest($request);

        // Vérifier si le formulaire UtilisateurInstitutionSessionModule est soumis et valide
        if ($formUtilisateurInstitutionSessionModule->isSubmitted() && $formUtilisateurInstitutionSessionModule->isValid()) {
            $em->persist($utilisateurInstitutionSessionModule);
            $em->flush();


            $this->addFlash('success', 'Votre combinaisson Utilisateur Module a bien été crée !');
            return $this->redirectToRoute('app_Session_Module');
                }


// création d'une nouvelle institution
$formInstitutionEntité = new Institution();
$formInstitution = $this->createForm(InstitutionCreationType::class, $formInstitutionEntité);

$formInstitution->handleRequest($request);
if ($formInstitution->isSubmitted() && $formInstitution->isValid()) {
    // Récupérer l'utilisateur connecté (version complète de l'entité)
    /** @var \App\Entity\Utilisateur $utilisateur */
    $utilisateur = $this->getUser();
    
    if (!$utilisateur instanceof \App\Entity\Utilisateur) {
        $utilisateur = $em->getRepository(Utilisateur::class)->find($utilisateur->getId());
    }

    if (!$utilisateur) {
        $this->addFlash('error', 'Aucun utilisateur connecté !');
        return $this->redirectToRoute('app_Session_Module');
    }

    // 1. Définir le créateur
    $formInstitutionEntité->setCreateurId($utilisateur->getId());
    
    // 2. Incrémenter le compteur de l'utilisateur
    $utilisateur->incrementCompteur();

    // Enregistrement en base de données
    $em->persist($formInstitutionEntité);
    $em->persist($utilisateur);
    $em->flush();
    
    $this->addFlash('success', 'Votre Institution a bien été créée !');
    return $this->redirectToRoute('app_Session_Module');
}


        
// création d'une nouvelle SESSION
        $formSessionEntité = new Session();
        $formSession = $this->createForm(SessionCreationType::class, $formSessionEntité);


        $formSession->handleRequest($request);
        if ($formSession->isSubmitted() && $formSession->isValid()) {
            // Enregistrement en base de données
            $em->persist($formSessionEntité);
            $em->flush();
            
            // Ajout d'un message flash
            $this->addFlash('success', 'Votre Session a bien été crée !');
            return $this->redirectToRoute('app_Session_Module');
        };


                
// création d'une nouvelle MODULE
        $formModuleEntité = new Module();
        $formModule = $this->createForm(ModuleCreationType::class, $formModuleEntité);

        $formModule->handleRequest($request);
        if ($formModule->isSubmitted() && $formModule->isValid()) {
            // Enregistrement en base de données
            $em->persist($formModuleEntité);
            $em->flush();
            
            // Ajout d'un message flash
            $this->addFlash('success', 'Votre Module a bien été crée !');
            return $this->redirectToRoute('app_Session_Module');
        };






$jourHoraire = new JourHoraire();
$formHoraire = $this->createForm(JourHoraireType::class, $jourHoraire);

$formHoraire->handleRequest($request);

if ($formHoraire->isSubmitted() && $formHoraire->isValid()) {
    // Récupérer le champ UtilisateurInstitutionSessionModule depuis le formulaire
    $uisModule = $formHoraire->get('UtilisateurInstitutionSessionModule')->getData();

if ($uisModule) {
    $jourHoraire->setUtilisateurInstitutionSessionModule($uisModule);
} else {
    $this->addFlash('error', 'Impossible de récupérer le UtilisateurInstitutionSessionModule associé.');
    return $this->redirectToRoute('app_Session_Module');
}

    $em->persist($jourHoraire);
    $em->flush();

    $this->addFlash('success', 'Votre association horaires au module a bien été créée !');
    return $this->redirectToRoute('app_Session_Module');
}




                    // PARTIE SUPPRESION //

        // SUPPRIMER UN MODULE //

        $deleteModule = $request->get('delete_Module_id');
        if ($deleteModule) {
            $ModuleToDelete = $ModuleRepository->find($deleteModule);
            if ($ModuleToDelete) {
                $em->remove($ModuleToDelete);
                $em->flush();
            }
            $this->addFlash('success', 'Module Supprimé !');
                        return $this->redirectToRoute('app_Session_Module');

        }


        // SUPPRIMER UN SESSION //

        $deleteSession = $request->get('delete_Session_id');
        if ($deleteSession) {
            $SessionToDelete = $SessionRepository->find($deleteSession);
            if ($SessionToDelete) {
                $em->remove($SessionToDelete);
                $em->flush();
            }
            $this->addFlash('success', 'Session Supprimé !');
                        return $this->redirectToRoute('app_Session_Module');

        }


        // SUPPRIMER UN INSTITUTION //

        $deleteInstitution = $request->get('delete_Institution_id');
        if ($deleteInstitution) {
            $InstitutionToDelete = $InstitutionRepository->find($deleteInstitution);
            if ($InstitutionToDelete) {
                $em->remove($InstitutionToDelete);
                $em->flush();
            }
            $this->addFlash('success', 'Institution Supprimé !');
                        return $this->redirectToRoute('app_Session_Module');

        }








        // SUPPRIMER LA COMBINAISON iNSTITUTION SESSION MODULE //

        $deleteId = $request->get('delete_id');
        if ($deleteId) {
            $sessionModuleToDelete = $sessionModuleRepository->find($deleteId);
            if ($sessionModuleToDelete) {
                $em->remove($sessionModuleToDelete);
                $em->flush();
            }
            $this->addFlash('success', 'SessionModule Supprimé !');
                        return $this->redirectToRoute('app_Session_Module');

        }


        // SUPPRIMER LA COMBINAISON UTILISATEUR INSTITUTION SESSION MODULE // 

        $deleteUtilisateurId = $request->get('deleteUtilisateurId');
        if ($deleteUtilisateurId) {
            $UtilisateurToDelete = $utilisateurInstitutionSessionModuleRepository->find($deleteUtilisateurId);
            if ($UtilisateurToDelete) {
                $em->remove($UtilisateurToDelete);
                $em->flush();
            }
            return $this->redirectToRoute('app_Session_Module');

        }

        // Préparer les résultats pour la vue
        $results = [];
        foreach ($modulesandsessions as $moduleandsession) {
            $results[] = [
                'moduleId' => $moduleandsession->getId(),
                'moduleNom' => $moduleandsession->getModule()->getNom(),
                'moduleDescription' => $moduleandsession->getModule()->getDescription(),
                'moduleDateDebut' => $moduleandsession->getModule()->getDateDebut(),
                'moduleDateFin' => $moduleandsession->getModule()->getDateFin(),
                'sessionId' => $moduleandsession->getSession()->getId(),
                'sessionNom' => $moduleandsession->getSession()->getNom(),
                'sessionType' => $moduleandsession->getSession()->getType(),
                'sessionDateDebut' => $moduleandsession->getSession()->getDateDebut(),
                'sessionDateFin' => $moduleandsession->getSession()->getDateFin(),
                'sessionDescription' => $moduleandsession->getSession()->getDescription(),
                'institutionId' => $moduleandsession->getInstitution()->getId(),
                'institutionNom' => $moduleandsession->getInstitution()->getNom(),
                'institutionAdresse' => $moduleandsession->getInstitution()->getAdresse(),
                'institutionTelephone' => $moduleandsession->getInstitution()->getTelephone(),
                'institutionCourriel' => $moduleandsession->getInstitution()->getCourriel(),


            ];
        }
            $modules = $ModuleRepository->findAll();
            $sessions = $SessionRepository->findAll();
            $institutions = $InstitutionRepository->findAll();
            $utilisateurs = $UtilisateurRepository->findAll();


            //dd($utilisateurs);

        // Rendre la vue avec les données et le formulaire
        return $this->render('Pages_principaux/page_sessionmodule.html.twig', [
            'results' => $results,
            'form' => $form->createView(),
            'formUtilisateurInstitutionSessionModule' => $formUtilisateurInstitutionSessionModule->createView(),
            'utilisateurInstitutionSessionModules' => $utilisateurInstitutionSessionModules, // Passer les données récupérées
            'formInstitution' => $formInstitution->createView(),
            'formSession' => $formSession->createView(),
            'formModule' => $formModule->createView(),
            'formHoraire'   => $formHoraire->createView(),
            'modules' => $modules,
            'sessions' => $sessions,
            'institutions' => $institutions,
            'utilisateurs' => $utilisateurs,
            ...$commonData,
            'stats' => $stats,
        ]);
    }


    #[Route('/sessionmodule/modifier/{id}', name: 'modifier_session_module')]
    public function modifierSessionModule(
        int $id,
        SessionModuleRepository $sessionModuleRepository,
        Request $request,
        EntityManagerInterface $em,

            ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
        
            ): Response {
            $commonData = $this->getCommonData($doctrine);
        $sessionModule = $sessionModuleRepository->find($id);
        if (!$sessionModule) {
            throw $this->createNotFoundException('SessionModule non trouvé');
        }

        // Créer et gérer le formulaire de modification
        $form = $this->createForm(SessionModuleType::class, $sessionModule);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();  // Enregistrer les modifications

            $this->addFlash('success', 'SessionModule modifié avec succès!');
            return $this->redirectToRoute('app_Session_Module');  // Rediriger vers la page principale
        }

        // Passer le formulaire au template Twig pour le rendu
        return $this->render('Pages_modifications/modifier_sessionmodule.html.twig', [
            'form' => $form->createView(),
            'sessionModule' => $sessionModule,
            ...$commonData,
        ]);
    }



    // Nouvelle route pour modifier un UtilisateurInstitutionSessionModule
    #[Route('/utilisateursessionmodule/modifier/{id}', name: 'modifier_utilisateur_institution_session_module')]
    public function modifierUtilisateurInstitutionSessionModule(
        int $id,
        UtilisateurInstitutionSessionModuleRepository $utilisateurInstitutionSessionModuleRepository,
        SessionModuleRepository $sessionModuleRepository,
        Request $request,
        EntityManagerInterface $em,
            ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
        
            ): Response {
            $commonData = $this->getCommonData($doctrine);
        // Récupérer l'instance du module utilisateur en fonction de l'ID
        $utilisateurInstitutionSessionModule = $utilisateurInstitutionSessionModuleRepository->find($id);

        // Vérifier si l'élément existe
        if (!$utilisateurInstitutionSessionModule) {
            throw $this->createNotFoundException('UtilisateurInstitutionSessionModule non trouvé');
        }

        // Créer le formulaire pour la modification
        $form_modif = $this->createForm(UtilisateurInstitutionSessionModuleType::class, $utilisateurInstitutionSessionModule);
        $form_modif->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form_modif->isSubmitted() && $form_modif->isValid()) {
            // Sauvegarder les modifications
            $em->persist($utilisateurInstitutionSessionModule);
            $em->flush();

            // Ajouter un message de succès et rediriger vers la page de la session module
            $this->addFlash('success', 'UtilisateurInstitutionSessionModule modifié avec succès!');
            return $this->redirectToRoute('app_Session_Module');
        }

        // Rendre la vue avec le formulaire
        return $this->render('Pages_modifications/liaison_utilisateur_sessionmodule.html.twig', [
            'form_modif' => $form_modif->createView(),
            'utilisateurInstitutionSessionModule' => $utilisateurInstitutionSessionModule,
            ...$commonData,
        ]);
    }

    




















    
 // _________Parites modifications Institutions Session Module___________  //


    #[Route('/session/{id}/modifier', name: 'session_modifier')]
    public function modifierSession(
        Request $request,
        Session $session,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine, // _ utilisée pour récupérer common data pour le twig commun __""
        SessionModuleRepository $sessionModuleRepository,
        int $id,  // L'ID de la session à modifier
        SessionRepository $sessionRepository
            ): Response {
            $commonData = $this->getCommonData($doctrine);
        $sessionModule = $sessionModuleRepository->find($id);
        $commonData = $this->getCommonData($doctrine);
        // Create the form for modifying the session
        $form_session_modifier = $this->createForm(SessionType::class, $session, [
            'data_class' => Session::class,  // Assurez-vous que le formulaire est lié à la bonne entité
        ]);
        $form_session_modifier->handleRequest($request);

        // If the session form is submitted and valid
        if ($form_session_modifier->isSubmitted() && $form_session_modifier->isValid()) {
            $em->flush();  // Save the modified session

            $this->addFlash('success', 'Session modifiée avec succès!');  // Success message
            return $this->redirectToRoute('institution_index_ajouter');  // Redirect after update
        }

        return $this->render('Pages_modifications/modifier_session.html.twig', [
            'form_session_modifier' => $form_session_modifier->createView(),
            'session' => $session,
            ...$commonData,
        ]);
    }


    #[Route('/institution/{id}/modifier', name: 'institution_modifier')]
    public function modifierInstitution(
        int $id,
        Request $request,
        Institution $institution,
        EntityManagerInterface $em,
        ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
    ): Response {
                $commonData = $this->getCommonData($doctrine);
        $form_institution = $this->createForm(InstitutionType::class, $institution);
        $form_institution->handleRequest($request);

        // If the institution form is submitted and valid
        if ($form_institution->isSubmitted() && $form_institution->isValid()) {
            $em->flush();  // Save the modified institution

            $this->addFlash('success', 'Institution modifiée avec succès!');  // Success message
            return $this->redirectToRoute('institution_index_ajouter');  // Redirect after update
        }

        return $this->render('Pages_modifications/modifier_institution.html.twig', [
            'form_institution' => $form_institution->createView(),
            'institution' => $institution,
                        ...$commonData,
        ]);
    }


    

    #[Route('/module/{id}/modifier', name: 'module_modifier')]
        public function modifierModule(
            int $id,
            ModuleRepository $moduleRepository,
            Request $request,
            EntityManagerInterface $em,
            ManagerRegistry $doctrine // _ utilisée pour récupérer common data pour le twig commun __""
        
            ): Response {
            $commonData = $this->getCommonData($doctrine);

            // Récupérer le module en fonction de l'ID
            $module = $moduleRepository->find($id);

            // Vérifier si le module existe
            if (!$module) {
                throw $this->createNotFoundException('Module non trouvé');
            }

            // Créer un formulaire pour modifier le module avec les données existantes
            $form_module = $this->createForm(ModuleType::class, $module, [
                'data_class' => Module::class,  // Assurez-vous que le formulaire est lié à la bonne entité
            ]);
            $form_module->handleRequest($request);

            // Si le formulaire est soumis et valide
            if ($form_module->isSubmitted() && $form_module->isValid()) {
                // Sauvegarder les modifications du module dans la base de données
                $em->persist($module);
                $em->flush();

                // Ajouter un message flash de succès
                $this->addFlash('success', 'Module modifié avec succès!');
                return $this->redirectToRoute('app_Session_Module');
            }

            // Passer le formulaire à la vue Twig
            return $this->render('Pages_modifications/modifier_module.html.twig', [
                'form_module' => $form_module->createView(),
                'module' => $module,  // Passer le module pour afficher ses détails si nécessaire
                ...$commonData,
            ]);
        }

}