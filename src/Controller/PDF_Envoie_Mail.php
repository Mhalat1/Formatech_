<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use App\Repository\SessionRepository;

use App\Repository\UtilisateurInstitutionSessionModuleRepository;  // Ajoute cette ligne
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\PdfGenerator;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\SendUserPdfMessage; // Ensure the SendUserPdfMessage class is imported


use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\Utilisateur;
use Psr\Log\LoggerInterface;

use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;


class PDF_Envoie_Mail extends AbstractController
{
    // Injection des différents factories

    public function __construct(
        #[Autowire(service: 'limiter.pdf_generation_short')]
        private RateLimiterFactory $shortLimiter,

        #[Autowire(service: 'limiter.pdf_generation_medium')]
        private RateLimiterFactory $mediumLimiter,

        #[Autowire(service: 'limiter.pdf_generation_long')]
        private RateLimiterFactory $longLimiter
    ) {}

    #[Route('/export/{id}/pdf', name: 'app_export_pdf', methods: ['POST'])]
    public function handlePdfRequest(
        Request $request,
        Utilisateur $utilisateur,
        UtilisateurInstitutionSessionModuleRepository $uisRepo,
        PdfGenerator $pdfGenerator,
        MailerInterface $mailer,
        LoggerInterface $logger,
        UtilisateurRepository $utilisateurRepo,


    ): Response {
        $currentUser = $this->getUser();


        // SÉCURITÉ 1/9 - Vérification Surcharge serveur (Mémoire)
        // Récupérer la limite mémoire (ex: '128M', '2G', etc.)
        $memoryLimit = ini_get('memory_limit');

        // Extraire la valeur numérique et convertir en octets
        $memoryLimitInBytes = (int)$memoryLimit;
        if (stripos($memoryLimit, 'M') !== false) {
            $memoryLimitInBytes *= 1024 * 1024; // Convertir en octets (si en M)
        } elseif (stripos($memoryLimit, 'G') !== false) {
            $memoryLimitInBytes *= 1024 * 1024 * 1024; // Convertir en octets (si en G)
        }

        // Calculer le seuil de 80% de la mémoire
        $threshold = $memoryLimitInBytes * 0.8;

        // Vérification de l'utilisation mémoire
        $usedMemory = memory_get_usage(true); // Utilisation mémoire actuelle

        // Si l'utilisation mémoire dépasse 80% de la limite
        if ($usedMemory > $threshold) {
            throw new ServiceUnavailableHttpException(300, 'Mémoire serveur presque pleine - Opération reportée de 5min');
        }



        // SÉCURITÉ 2/9 - Rate Limiting renforcé
        $limitKey = sprintf(
            '%s_%s',
            $currentUser->getId(),
            $request->getClientIp()
        );

        $limiter = $this->shortLimiter->create($limitKey);
        if (false === $limiter->consume()->isAccepted()) {
            $logger->info('Rate limit atteint pour envoi massif PDF', [
                'user_id' => $currentUser?->getId(),
                'ip' => $request->getClientIp(),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            $this->addFlash('error', 'Vous ne pouvez générer cette action qu\'une fois par minute.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
        }
        // SÉCURITÉ 3/9  Controle d'acces par role

        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SUPERADMIN') && !$this->isGranted('ROLE_ENSEIGNANT')) {
            $logger->warning('Tentative d\'accès non autorisé à l\'export PDF individuel', [
                'user_id' => $this->getUser()?->getId(),
                'target_user_id' => $utilisateur->getId(),
                'ip' => $request->getClientIp(),
                'user_agent' => $request->headers->get('User-Agent'),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            throw $this->createAccessDeniedException();
        }

        // SÉCURITÉ 4/9 - Validation du token CSRF
        if (!$this->isCsrfTokenValid('app_export_pdf', $request->request->get('_token'))) {
            $logger->warning('Token CSRF invalide pour l\'export PDF', [
                'user_id' => $currentUserId,
                'target_user_id' => $utilisateur->getId(),
                'ip' => $request->getClientIp()
            ]);
            $this->addFlash('error', 'Token de sécurité invalide.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
        }

        // SÉCURITÉ 5/9  Validation stricte des actions
        $action = $request->request->get('action', 'email');
        if ($action !== 'email' && $action !== 'download') {
            $logger->warning('Action non autorisée tentée', [
                'action' => $action,
                'user_id' => $this->getUser()?->getId(),
                'ip' => $request->getClientIp()
            ]);
            return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
        }
        $currentUserId = $this->getUser()?->getId();
        $currentUser = $utilisateurRepo->find($currentUserId);



        // SÉCURITÉ 6/9 - pas besoin d'augmentation des ressoruces alouées pour un seul envoie de pdf



        $utilisateurInstitutionSessionModules = $uisRepo->createQueryBuilder('uism')
            ->where('uism.utilisateur = :utilisateur')
            ->setParameter('utilisateur', $utilisateur) // Protection contre les injections SQL
            ->getQuery()
            ->getResult();


        $html = $this->renderView('pdf/export.html.twig', [
            'utilisateur' => $utilisateur,
            'utilisateurInstitutionSessionModules' => $utilisateurInstitutionSessionModules,
            'pdf_mode' => true,
            'date' => new \DateTime(),
            'generated_by' => $currentUser->getId() // Traçabilité
        ]);

        $pdfContent = $pdfGenerator->generateFromHtml($html);

        // SÉCURITÉ 7/9 -  Pas besoin de fichier temporaire téléchargement direct en mémoire sans fichiers temporaires


        // SÉCURITÉ 8/9 - Validation de la taille du PDF
        if (strlen($pdfContent) > 1 * 1024 * 1024) { // 1Mo max par PDF
            throw new \RuntimeException('PDF trop volumineux');
        }


        if ($action === 'download') {
            $logger->info('PDF généré pour téléchargement', [
                'target_user_id' => $utilisateur->getId(),
                'user_id' => $currentUserId,
                'action' => 'download'
            ]);

            $fileName = sprintf(
                'releve_%s_%s.pdf',
                $utilisateur->getNom(),
                date('Y-m-d')
            );




            // SÉCURITÉ 9/9 - Pas besoin de Suppression automatique après téléchargement téléchargement direct en mémoire sans fichiers temporaires

            return new Response(
                $pdfContent,
                Response::HTTP_OK,
                [
                    'Content-Type' => 'application/pdf',  //force l'interprétation comme fichier PDF
                    'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName), //empêche l'exécution dans le navigateur
                    'Content-Length' => strlen($pdfContent), //Empêche les attaques (fichier corrompu si la taille annoncée ne correspond pas au contenu réel
                    'Cache-Control' => 'no-cache, no-store' //empêche le stockage non autorisé
                ]
            );
        } else {
            try {
                $email = (new TemplatedEmail())
                    ->from(new Address('muttalip.pro@gmail.com', 'Formatech'))
                    ->to($utilisateur->getCourriel())
                    ->subject('📄 Votre relevé de notes - ' . date('d/m/Y'))
                    ->htmlTemplate('model_emails/releve_notes_unique.html.twig')
                    ->context([
                        'utilisateur' => $utilisateur,
                        'date_envoi' => new \DateTime(),
                    ])
                    ->attach(
                        $pdfContent,
                        sprintf('releve_notes_%s_%s_%s.pdf', $utilisateur->getNom(), $utilisateur->getPrenom(), date('Y-m-d')),
                        'application/pdf'
                    );
                    
                    $mailer->send($email);
                $this->addFlash('success', 'PDF envoyé avec succès à ' . $utilisateur->getCourriel());

                return $this->redirectToRoute('utilisateur_liste', ['id' => $utilisateur->getId()]);
            } catch (\Exception $e) {
                // Loggez l'erreur précise
                error_log('Erreur envoi email: ' . $e->getMessage());
                throw $e;
            }
        }
    }
















    #[Route("/send-session-pdfs", name: 'send_session_pdfs', methods: ['POST'])]
    public function sendSessionPdfs(
        Request $request,
        SessionRepository $sessionRepository,
        UtilisateurInstitutionSessionModuleRepository $uismRepo,
        PdfGenerator $pdfGenerator,
        MailerInterface $mailer,
        LoggerInterface $logger,
    ): Response {

        $currentUser = $this->getUser();
        $id = $this->getUser()?->getId();

        // SÉCURITÉ 1/9 - Vérification Surcharge serveur (Mémoire)
        // Récupérer la limite mémoire (ex: '128M', '2G', etc.)
        $memoryLimit = ini_get('memory_limit');

        // Extraire la valeur numérique et convertir en octets
        $memoryLimitInBytes = (int)$memoryLimit;
        if (stripos($memoryLimit, 'M') !== false) {
            $memoryLimitInBytes *= 1024 * 1024; // Convertir en octets (si en M)
        } elseif (stripos($memoryLimit, 'G') !== false) {
            $memoryLimitInBytes *= 1024 * 1024 * 1024; // Convertir en octets (si en G)
        }

        // Calculer le seuil de 80% de la mémoire
        $threshold = $memoryLimitInBytes * 0.8;

        // Vérification de l'utilisation mémoire
        $usedMemory = memory_get_usage(true); // Utilisation mémoire actuelle

        // Si l'utilisation mémoire dépasse 80% de la limite
        if ($usedMemory > $threshold) {
            throw new ServiceUnavailableHttpException(300, 'Mémoire serveur presque pleine - Opération reportée de 5min');
        }



        // SÉCURITÉ 2/9 - Rate Limiting renforcé
        $limitKey = sprintf(
            '%s_%s',
            $currentUser->getId(),
            $request->getClientIp()
        );

        $limiter = $this->mediumLimiter->create($limitKey);
        if (false === $limiter->consume()->isAccepted()) {
            $logger->info('Rate limit atteint pour envoi massif PDF', [
                'user_id' => $currentUser->getId(),
                'ip' => $request->getClientIp(),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            $this->addFlash('error', 'Vous ne pouvez générer cette action qu\'une fois par heure.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
        }

        // SÉCURITÉ 3/9 - Contrôle d'accès renforcé
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SUPERADMIN') && !$this->isGranted('ROLE_ENSEIGNANT')) {
            $logger->warning('Tentative d\'accès non autorisé à l\'envoi par session des PDF', [
                'user_id' => $this->getUser()?->getId(),
                'ip' => $request->getClientIp(),
                'user_agent' => $request->headers->get('User-Agent'),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            throw $this->createAccessDeniedException();
        }

        // SÉCURITÉ 4/9 - Validation du token CSRF
        if (!$this->isCsrfTokenValid('send_session_pdfs', $request->request->get('_token'))) {
            $logger->warning('Token CSRF invalide pour l\'envoi de PDFs par session', [
                'user_id' => $id,
                'ip' => $request->getClientIp()
            ]);
            $this->addFlash('error', 'Token de sécurité invalide.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
        }

        // SÉCURITÉ 5/9  Validation stricte des actions
        $action = $request->request->get('action', 'email');
        if ($action !== 'email' && $action !== 'download') {
            $logger->warning('Action non autorisée tentée', [
                'action' => $action,
                'user_id' => $this->getUser()?->getId(),
                'ip' => $request->getClientIp()
            ]);
            return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
        }


        try {
            $sessionId = $request->request->get('session_id');
            $session = $sessionRepository->find((int)$sessionId);
            $action = $request->request->get('action');
            $sessionNom = $session->getNom(); // Supposant que votre entité a une méthode getNom()


            // SÉCURITÉ 6/9 - augmentation des ressoruces alouées pour pas avoir prblm limites de ressources 
            set_time_limit(360); // 6 minutes max pour traitement massif
            ini_set('memory_limit', '512M'); // Augmenté pour traitement massif

            $uismEntities = $uismRepo->createQueryBuilder('uism')
                ->join('uism.sessionModule', 'sm')
                ->join('uism.utilisateur', 'u')
                ->where('sm.session = :session')
                ->setParameter('session', $session) // Protection contre les injections SQL
                ->getQuery()
                ->getResult();

            if (empty($uismEntities)) {
                $logger->info('Aucun utilisateur trouvé pour la session', [
                    'session_id' => $sessionId,
                    'user_id' => $id
                ]);
                $this->addFlash('warning', 'Aucun utilisateur trouvé pour cette session.');
                return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
            }

            $failedUsers = [];
            $successCount = 0;
            $zip = null;

            // SÉCURITÉ 7/9 - Stockage sécurisé des fichiers temporaires
            $zipFileName = sys_get_temp_dir() . bin2hex(random_bytes(16)) . '.zip';

            if ($action === 'download') {

                $zip = new \ZipArchive();
                if ($zip->open($zipFileName, \ZipArchive::CREATE) !== TRUE) {
                    $logger->error('Impossible de créer l\'archive ZIP', [
                        'zip_file' => $zipFileName
                    ]);
                    $this->addFlash('error', 'Erreur lors de la création de l\'archive.');
                    return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
                }
            }

            foreach ($uismEntities as $uisEntity) {
                try {
                    $targetUser = $uisEntity->getUtilisateur();

                    // Génération sécurisée du PDF
                    $html = $this->renderView('pdf/export.html.twig', [
                        'utilisateur' => $targetUser,
                        'utilisateurInstitutionSessionModules' => $uismRepo->findBy(['utilisateur' => $targetUser]),
                        'pdf_mode' => true,
                        'date' => new \DateTime(),
                        'session' => $session // Ajout de la session pour le contexte
                    ]);

                    $pdfContent = $pdfGenerator->generateFromHtml($html);

                    // SÉCURITÉ 8/9 - Validation de la taille du PDF
                    if (strlen($pdfContent) > 1 * 1024 * 1024) { // 1Mo max par PDF
                        throw new \RuntimeException('PDF trop volumineux');
                    }


                    // Validation du contenu PDF généré
                    if (empty($pdfContent)) {
                        $failedUsers[] = $targetUser->getId() . ' (PDF vide)';
                        continue;
                    }

                    if ($action === 'email') {
                    $email = (new TemplatedEmail())
                        ->from(new Address('muttalip.pro@gmail.com', 'Formatech'))
                        ->to($targetUser->getCourriel())
                        ->subject('📄 Votre relevé de notes - Session ' . $sessionId)
                        ->htmlTemplate('model_emails/releve_notes_session.html.twig')
                        ->context([
                            'utilisateur' => $targetUser,
                            'sessionId' => $sessionId,
                            'date_envoi' => new \DateTime(),
                        ])
                        ->attach(
                            $pdfContent,
                            sprintf('releve_notes_%s_%s_%s.pdf', $sessionNom, $targetUser->getNom(), $targetUser->getPrenom()),
                            'application/pdf'
                        );


                    $mailer->send($email);
                        $this->addFlash('success', 'PDF envoyé avec succès à ' . $targetUser->getCourriel());
                        $successCount++;

                    } else if ($action === 'download') {
                        $fileName = sprintf('releve_user_%s.pdf', $targetUser->getNom());
                        $zip->addFromString($fileName, $pdfContent);
                        $successCount++;
                    }
                } catch (\RuntimeException $e) {
                    $logger->error('Erreur lors du traitement d\'un utilisateur', [
                        'user_id' => $targetUser?->getId(),
                        'error' => $e->getMessage(),
                        'session_id' => $sessionId
                    ]);
                    $failedUsers[] = ($targetUser?->getId() ?? 'inconnu') . ' (' . $e->getMessage() . ')';
                } catch (\Exception $e) {
                    $logger->error('Erreur inattendue lors du traitement d\'un utilisateur', [
                        'user_id' => $targetUser?->getId(),
                        'error' => $e->getMessage(),
                        'session_id' => $sessionId
                    ]);
                    $failedUsers[] = ($targetUser?->getId() ?? 'inconnu') . ' (erreur système)';
                }
            }

            if ($action === 'email') {
                // Messages de résultat pour l'envoi par email
                if ($successCount > 0) {
                    $logger->info('Envoi groupé de PDFs par email terminé', [
                        'success_count' => $successCount,
                        'failed_count' => count($failedUsers),
                        'session_id' => $sessionId
                    ]);
                    $this->addFlash('success', sprintf('PDFs envoyés avec succès : %d/%d', $successCount, count($uismEntities)));
                }

                if (!empty($failedUsers)) {
                    $this->addFlash('warning', 'Échecs d\'envoi : ' . implode(', ', array_slice($failedUsers, 0, 5)));
                }
            } else if ($action === 'download') {
                if ($zip) {
                    $zip->close();

                    if ($successCount > 0) {
                        $response = new BinaryFileResponse($zipFileName);
                        $response->setContentDisposition(
                            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                            sprintf(
                                'export_session_%s_%s.zip',
                                ($session->getNom()),
                                date('Y-m-d')
                            )
                        );
                        // SÉCURITÉ 9/9 - Suppression automatique du fichier après téléchargement pour éviter les fuites
                        $response->deleteFileAfterSend(true);


                        $logger->info('Archive ZIP générée et envoyée', [
                            'success_count' => $successCount,
                            'failed_count' => count($failedUsers),
                            'session_id' => $sessionId
                        ]);

                        return $response;
                    } else {
                        // Suppression du fichier ZIP vide
                        if (file_exists($zipFileName)) {
                            unlink($zipFileName);
                        }
                        $this->addFlash('error', 'Aucun PDF n\'a pu être généré.');
                    }
                }
            }
        } catch (\Exception $e) {
            $logger->error('Erreur critique lors de l\'envoi des PDFs', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $id,
                'session_id' => $sessionId ?? null
            ]);
            $this->addFlash('error', 'Erreur lors de l\'envoi des PDFs : ' . $e->getMessage());

            // Nettoyage en cas d'erreur
            if (isset($zipFileName) && file_exists($zipFileName)) {
                unlink($zipFileName);
            }
        }
        return $this->redirectToRoute('utilisateur_liste', ['id' => $id]);
    }































    #[Route("/send-all-pdfs", name: 'send_all_pdfs', methods: ['POST'])]
    public function sendAllPdfs(
        Request $request,
        UtilisateurRepository $utilisateurRepo,
        UtilisateurInstitutionSessionModuleRepository $uisRepo,
        PdfGenerator $pdfGenerator,
        LoggerInterface $logger,
        MailerInterface $mailer
    ): Response {
        $currentUser = $this->getUser();


        // SÉCURITÉ 1/9 - Vérification Surcharge serveur (Mémoire)
        $memoryLimit = ini_get('memory_limit');
        // Extraire la valeur numérique et convertir en octets
        $memoryLimitInBytes = (int)$memoryLimit;
        if (stripos($memoryLimit, 'M') !== false) {
            $memoryLimitInBytes *= 1024 * 1024; // Convertir en octets (si en M)
        } elseif (stripos($memoryLimit, 'G') !== false) {
            $memoryLimitInBytes *= 1024 * 1024 * 1024; // Convertir en octets (si en G)
        }

        // Calculer le seuil de 80% de la mémoire
        $threshold = $memoryLimitInBytes * 0.8;
        $usedMemory = memory_get_usage(true);

        if ($usedMemory > $threshold) {
            throw new ServiceUnavailableHttpException(300, 'Mémoire serveur presque pleine - Opération reportée de 5min');
        }

        // SÉCURITÉ 2/9 - Rate Limiting renforcé
        $limitKey = sprintf('%s_%s', $currentUser->getId(), $request->getClientIp());
        $limiter = $this->longLimiter->create($limitKey);

        if (false === $limiter->consume()->isAccepted()) {
            $logger->info('Rate limit atteint pour envoi massif PDF', [
                'user_id' => $currentUser->getId(),
                'ip' => $request->getClientIp(),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            $this->addFlash('error', 'Vous ne pouvez générer cette action qu\'une fois par jour.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $currentUser->getId()]);
        }

        // SÉCURITÉ 3/9 - Contrôle d'accès renforcé
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SUPERADMIN')) {
            $logger->warning('Tentative d\'accès non autorisé à l\'envoi massif PDF', [
                'user_id' => $this->getUser()?->getId(),
                'ip' => $request->getClientIp(),
                'user_agent' => $request->headers->get('User-Agent'),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            throw $this->createAccessDeniedException();
        }

        // SÉCURITÉ 4/9 - Protection CSRF
        if (!$this->isCsrfTokenValid('send_all_pdfs', $request->request->get('_token'))) {
            $logger->warning('Token CSRF invalide', [
                'user_id' => $currentUser->getId(),
                'ip' => $request->getClientIp(),
                'timestamp' => (new \DateTimeImmutable())->format('c')
            ]);
            return $this->redirectToRoute('utilisateur_liste', ['id' => $currentUser->getId()]);
        }

        // SÉCURITÉ 5/9 - Validation stricte des actions
        $action = $request->request->get('action', 'email');
        if (!in_array($action, ['email', 'download'], true)) {
            $logger->warning('Action non autorisée tentée', [
                'action' => $action,
                'user_id' => $currentUser->getId(),
                'ip' => $request->getClientIp()
            ]);
            return $this->redirectToRoute('utilisateur_liste', ['id' => $currentUser->getId()]);
        }

        // SÉCURITÉ 6/9 - Augmentation des ressources allouées
        set_time_limit(180);
        ini_set('memory_limit', '256M');

        // Récupération des utilisateurs
        $userIds = $utilisateurRepo->createQueryBuilder('u')
            ->select('u.id')
            ->getQuery()
            ->getSingleColumnResult();

        if (empty($userIds)) {
            $this->addFlash('warning', 'Aucun utilisateur trouvé.');
            return $this->redirectToRoute('utilisateur_liste', ['id' => $currentUser->getId()]);
        }

        // Log de l'opération pour audit
        $logger->info('Début envoi massif PDF', [
            'user_id' => $currentUser->getId(),
            'action' => $action,
            'user_count' => count($userIds),
            'ip' => $request->getClientIp(),
            'timestamp' => (new \DateTimeImmutable())->format('c')
        ]);

        // SÉCURITÉ 7/9 - Stockage temporaire sécurisé
        $zipFileName = sys_get_temp_dir() . DIRECTORY_SEPARATOR . bin2hex(random_bytes(16)) . '.zip';

        $successCount = 0;
        $errorCount = 0;
        $failedUsers = [];

        try {
            if ($action === 'download') {
                // Traitement pour téléchargement ZIP
                $zip = new \ZipArchive();
                if ($zip->open($zipFileName, \ZipArchive::CREATE) !== true) {
                    throw new \RuntimeException('Impossible de créer l\'archive ZIP');
                }

                foreach ($userIds as $userId) {
                    try {
                        $user = $utilisateurRepo->find($userId);
                        if (!$user) {
                            continue;
                        }

                        $pdfContent = $this->generateUserPdf($user, $uisRepo, $pdfGenerator);

                        // SÉCURITÉ 8/9 - Validation de la taille du PDF
                        if (strlen($pdfContent) > 1 * 1024 * 1024) { // 1Mo max par PDF
                            throw new \RuntimeException('PDF trop volumineux');
                        }

                        $zip->addFromString(
                            sprintf('releve_%s_%s.pdf', $user->getNom(), date('Y-m-d')),
                            $pdfContent
                        );
                        $successCount++;
                    } catch (\Exception $e) {
                        $errorCount++;
                        $failedUsers[] = $user->getCourriel() ?? "Utilisateur {$userId}";

                        $logger->error('Erreur génération PDF utilisateur', [
                            'user_id' => $userId,
                            'error' => $e->getMessage(),
                            'current_user_id' => $currentUser->getId(),
                            'timestamp' => (new \DateTimeImmutable())->format('c')
                        ]);

                        // Arrêt si trop d'erreurs
                        if ($errorCount > 10) {
                            $logger->error('Trop d\'erreurs lors de la génération, arrêt du processus');
                            break;
                        }
                    }
                }

                $zip->close();

                // Log du résultat
                $logger->info('Fin génération ZIP', [
                    'success_count' => $successCount,
                    'error_count' => $errorCount,
                    'user_id' => $currentUser->getId()
                ]);

                if ($successCount > 0) {
                    $response = new BinaryFileResponse($zipFileName);
                    $response->setContentDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        sprintf('export_all_%s.zip', date('Y-m-d_H-i-s'))
                    );
                    $response->deleteFileAfterSend(true);
                    return $response;
                } else {
                    if (file_exists($zipFileName)) {
                        unlink($zipFileName);
                    }
                    $this->addFlash('error', 'Aucun PDF n\'a pu être généré.');
                }
            } elseif ($action === 'email') {
                // Traitement pour envoi par email
                foreach ($userIds as $userId) {
                    try {
                        $user = $utilisateurRepo->find($userId);
                        if (!$user || !$user->getCourriel()) {
                            continue;
                        }

                        $pdfContent = $this->generateUserPdf($user, $uisRepo, $pdfGenerator);

                        //                         // SÉCURITÉ 8/9 -Validation de la taille du PDF
                        if (strlen($pdfContent) > 1 * 1024 * 1024) {
                            throw new \RuntimeException('PDF trop volumineux');
                        }

                        $email = (new TemplatedEmail())
                            ->from(new Address('muttalip.pro@gmail.com', 'Formatech'))
                            ->to($user->getCourriel())
                            ->subject('📄 Votre relevé de notes')
                            ->htmlTemplate('model_emails/releve_notes_total.html.twig')
                            ->context([
                                'utilisateur' => $user,
                                'date_envoi' => new \DateTime(),
                            ])
                            ->attach(
                                $pdfContent,
                                sprintf('releve_notes_%s_%s_%s.pdf', $user->getNom(), $user->getPrenom(), date('Y-m-d')),
                                'application/pdf'
                            );
                        $mailer->send($email);

                        $successCount++;

                        $logger->info('PDF envoyé par email avec succès', [
                            'user_id' => $user->getId(),
                            'email' => $user->getCourriel()
                        ]);
                    } catch (\Exception $e) {
                        $errorCount++;
                        $failedUsers[] = $user->getCourriel() ?? "Utilisateur {$userId}";

                        $logger->error('Erreur envoi PDF par email', [
                            'user_id' => $userId,
                            'error' => $e->getMessage(),
                            'current_user_id' => $currentUser->getId()
                        ]);

                        if ($errorCount > 10) {
                            $logger->error('Trop d\'erreurs lors de l\'envoi, arrêt du processus');
                            break;
                        }
                    }
                }

                // Messages de résultat pour l'envoi par email
                if ($successCount > 0) {
                    $logger->info('Envoi groupé de PDFs par email terminé', [
                        'success_count' => $successCount,
                        'failed_count' => count($failedUsers)
                    ]);
                    $this->addFlash('success', sprintf('PDFs envoyés avec succès : %d/%d', $successCount, count($userIds)));
                }

                if (!empty($failedUsers)) {
                    $this->addFlash('warning', 'Échecs d\'envoi : ' . implode(', ', array_slice($failedUsers, 0, 5)));
                }
            }
        } catch (\Exception $e) {
            // Nettoyage en cas d'erreur
            if (file_exists($zipFileName)) {
                unlink($zipFileName);
            }

            $logger->error('Erreur lors du traitement massif', [
                'error' => $e->getMessage(),
                'user_id' => $currentUser->getId()
            ]);

            $this->addFlash('error', 'Erreur lors du traitement de la demande.');
        }

        return $this->redirectToRoute('utilisateur_liste', ['id' => $currentUser->getId()]);
    }

    private function generateUserPdf(
        $user,
        UtilisateurInstitutionSessionModuleRepository $uisRepo,
        PdfGenerator $pdfGenerator
    ): string {
        $html = $this->renderView('pdf/export.html.twig', [
            'utilisateur' => $user,
            'utilisateurInstitutionSessionModules' => $uisRepo->findBy(['utilisateur' => $user]),
            'pdf_mode' => true,
            'date' => new \DateTime(),
        ]);

        return $pdfGenerator->generateFromHtml($html);
    }
}
