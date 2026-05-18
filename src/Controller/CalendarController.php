<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurInstitutionSessionModuleRepository;
use App\Repository\SessionModuleRepository;
use App\Repository\JourHoraireRepository;
use App\Traits\CommonDataTrait;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\SessionModule;

class CalendarController extends AbstractController
{
    use CommonDataTrait;

    #[Route('/calendrier/{id}', name: 'calendrier')]
    public function index(
        int $id,
        Request $request,
        SessionModuleRepository $sessionModuleRepository,
        UtilisateurInstitutionSessionModuleRepository $utilisateurInstitutionSessionModuleRepository,
        JourHoraireRepository $jourHoraireRepository,
        ManagerRegistry $doctrine
    ): Response {
        $commonData = $this->getCommonData($doctrine);

        $user = $this->getUser();

        // ✅ Correction ici : pas ['utilisateur_id' => ...]
        $userAssociations = $utilisateurInstitutionSessionModuleRepository->findBy([
            'utilisateur' => $user
        ]);

        // Récupérer tous les session_modules
        $sessionModules = $sessionModuleRepository->createQueryBuilder('sm')
            ->leftJoin('sm.module', 'm')
            ->leftJoin('sm.session', 's')
            ->leftJoin('sm.institution', 'i')
            ->addSelect('m', 's', 'i')
            ->getQuery()
            ->getResult();

        $results = [];

        foreach ($sessionModules as $sessionModule) {
            $module = $sessionModule->getModule();
            $session = $sessionModule->getSession();
            $institution = $sessionModule->getInstitution();

            // ✅ Trouver les associations utilisateur–sessionModule pour cet utilisateur
            $uismList = $utilisateurInstitutionSessionModuleRepository->findBy([
                'utilisateur' => $user,
                'sessionModule' => $sessionModule,
            ]);

            $horairesData = [];

            foreach ($uismList as $uism) {
                $horaires = $jourHoraireRepository->findBy([
                    'utilisateurinstitutionsessionmodule' => $uism
                ]);

                foreach ($horaires as $horaire) {
                    $horairesData[] = [
                        'jour' => $horaire->getJour(),
                        'heure_debut' => $horaire->getHeureDebut()->format('H:i'),
                        'heure_fin' => $horaire->getHeureFin()->format('H:i'),
                        'date_precise' => $horaire->getDatePrecise() ? $horaire->getDatePrecise()->format('Y-m-d') : null
                    ];
                }
            }

            $results[] = [
                'session_module_id' => $sessionModule->getId(),
                'module_id' => $module->getId(),
                'module_nom' => $module->getNom(),
                'module_description' => $module->getDescription(),
                'module_date_debut' => $module->getDateDebut()?->format('Y-m-d'),
                'module_date_fin' => $module->getDateFin()?->format('Y-m-d'),
                'session_id' => $session->getId(),
                'session_nom' => $session->getNom(),
                'session_type' => $session->getType(),
                'session_date_debut' => $session->getDateDebut()?->format('Y-m-d'),
                'session_date_fin' => $session->getDateFin()?->format('Y-m-d'),
                'session_description' => $session->getDescription(),
                'institution_id' => $institution?->getId(),
                'institution_nom' => $institution?->getNom(),
                'institution_adresse' => $institution?->getAdresse(),
                'institution_telephone' => $institution?->getTelephone(),
                'institution_courriel' => $institution?->getCourriel(),
                'horaires' => $horairesData,
                'is_user_associated' => count($uismList) > 0,
            ];
        }

        return $this->render('Pages_principaux/page_emploidutemps.html.twig', [
            'results' => $results,
            'userAssociations' => $userAssociations,
            ...$commonData,
        ]);
    }
}
