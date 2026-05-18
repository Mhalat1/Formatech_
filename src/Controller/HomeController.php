<?php

namespace App\Controller;

use App\Entity\FormContact;
use App\Entity\Utilisateur;
use App\Form\FormContactType;
use App\Repository\InstitutionRepository;
use App\Repository\ModuleRepository;
use App\Repository\SessionRepository;
use App\Repository\FormContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Psr\Log\LoggerInterface;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class HomeController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'limiter.pdf_generation_short')]
        private RateLimiterFactory $shortLimiter,
    ) {}

    #[Route('/', name: 'app_home')]
    public function index(
        Request $request,
        InstitutionRepository $institutionRepository,
        SessionRepository $sessionRepository,
        ModuleRepository $moduleRepository,
        FormContactRepository $formContactRepository,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        LoggerInterface $logger

    ): Response {

    // SÉCURITÉ 1/9 - Vérification Surcharge serveur (Mémoire)

        $memoryLimit = ini_get('memory_limit');
        $usedMemory = memory_get_usage(true);
        // Extraire la valeur numérique et convertir en octets
        $memoryLimitInBytes = (int)$memoryLimit;
        if (stripos($memoryLimit, 'M') !== false) {
            $memoryLimitInBytes *= 1024 * 1024; // Convertir en octets (si en M)
        } elseif (stripos($memoryLimit, 'G') !== false) {
            $memoryLimitInBytes *= 1024 * 1024 * 1024; // Convertir en octets (si en G)
        }

        // Calculer le seuil de 80% de la mémoire
        $threshold = $memoryLimitInBytes * 0.8;

        if ($usedMemory > $threshold) {
            throw new ServiceUnavailableHttpException(360, 'Mémoire serveur presque pleine - Opération reportée de 6min');
        }

        // 2. Récupération des données pour la page
        $institutions = $institutionRepository->findAll();
        $sessions = $sessionRepository->findAll();
        $modules = $moduleRepository->findAll();
        $contacts = $formContactRepository->findAll();

        // 3. Gestion du statut d'essai utilisateur
        $trialStatus = null;
        if ($this->getUser() instanceof Utilisateur) {
            $user = $this->getUser();
            $trialStatus = [
                'active' => $user->isTrialActive(),
                'ends_at' => $user->getTrialEndsAt()
            ];
        }

        // 4. Création et traitement du formulaire de contact
        $formContact = new FormContact();
        $form = $this->createForm(FormContactType::class, $formContact);
        $form->handleRequest($request);

        // SÉCURITÉ 3/9  pas besoin de Controle d'acces par role

        // SÉCURITÉ 4/9 - Validation du token CSRF
        if ($form->isSubmitted() && $form->isValid()) {

            // Verification du CSRF recue 
            
        // $allData = $request->request->all();
        // $formData = $allData['form_contact'] ?? [];
        // $submittedToken = $formData['_token'] ?? null;

        // dd([
        //     'submitted_token' => $submittedToken,
        //     'form_data' => $request->request->all(),
        // ]);



        // SÉCURITÉ 5/9  Validation stricte des actions
            $action = $request->request->get('action');
            if ($action !== 'email') {
                $logger->warning('Action invalide dans le formulaire de contact', [
                    'action' => $action,
                    'ip' => $request->getClientIp(),
                    'timestamp' => (new \DateTimeImmutable())->format('c')
                ]);
                $this->addFlash('error', 'Action non autorisée.');
                return $this->redirectToRoute('app_home');
            }
            

        // SÉCURITÉ 2/9 - Rate Limiting renforcé
            $limiter = $this->shortLimiter->create($request->getClientIp());
            if (!$limiter->consume()->isAccepted()) {
                $logger->info('Rate limit atteint pour formulaire contact', [
                    'ip' => $request->getClientIp(),
                    'timestamp' => (new \DateTimeImmutable())->format('c')
                ]);
                $this->addFlash('error', 'Trop de soumissions. Veuillez patienter une minute.');
                return $this->redirectToRoute('app_home');
            }

            try {
                // si on veut faire Enregistrement en base 
                // $em->persist($formContact);
                // $em->flush();

                // Envoi de l'email
                $this->sendContactEmail($mailer, $formContact);

                $this->addFlash('success', 'Votre message a bien été envoyé !');
                return $this->redirectToRoute('app_home');

            } catch (\Exception $e) {
                $logger->error('Erreur lors de l\'envoi du formulaire de contact', [
                    'error' => $e->getMessage(),
                    'ip' => $request->getClientIp()
                ]);
                $this->addFlash('error', 'Une erreur est survenue. Veuillez réessayer.');
            }
        }

        return $this->render('Pages_principaux/page_accueil.html.twig', [
            'institutions' => $institutions,
            'sessions' => $sessions,
            'modules' => $modules,
            'contacts' => $contacts,
            'form' => $form->createView(),
            'trial_status' => $trialStatus,
        ]);
    }


    private function sendContactEmail(MailerInterface $mailer, FormContact $formContact): void
    {
        $email = (new TemplatedEmail())
            ->from(new Address('muttalip.pro@gmail.com', 'Formatech'))
            ->to('halat@outlook.fr')
            ->subject('📬 Nouveau contact client')
            ->htmlTemplate('model_emails/new_contact.html.twig')
            ->context([
                'contact' => $formContact,
                'date' => new \DateTime(),
            ]);

        $mailer->send($email);
    }


    // SÉCURITÉ 6/9 - pas besoin d'augmentation des ressoruces alouées pour un seul envoie de mail
    // SÉCURITÉ 7/9 -  Pas besoin de fichier temporaire téléchargement 
    // SÉCURITÉ 8/9 - Pas besoin Validation de la taille du PDF
    // SÉCURITÉ 9/9 - Pas besoin de Suppression automatique après téléchargement 


}