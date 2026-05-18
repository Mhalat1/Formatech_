<?php

namespace App\EventListener;

use App\Entity\Utilisateur;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;

#[AsEventListener(event: KernelEvents::REQUEST, priority: -10)]
class TrialPeriodCheckListener
{
    private const ALLOWED_ROUTES = [
        '',
        'payment_required',
        'payment_success', // Ajouté
        'app_logout',
        'app_login',
        'app_register',
        'homepage',
        'verification_verify',
        '_wdt',
        '_profiler',
        '_profiler_search',
        '_profiler_search_bar',
        '_profiler_phpinfo',
        '_profiler_search_results',
        '_profiler_open_file',
        '_error'
    ];

    public function __construct(
        private Security $security,
        private RouterInterface $router,
        private ?LoggerInterface $logger = null
    ) {}

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $route = $request->attributes->get('_route');

        if ($this->logger) {
            $this->logger->debug('TrialPeriodCheck - Route: '.$route);
        }

        // Vérifier si la route est autorisée
        if ($this->isRouteAllowed($route)) {
            return;
        }

        $user = $this->security->getUser();

        // Si l'utilisateur est connecté et est un Utilisateur
        if ($user instanceof Utilisateur) {
            // Si l'utilisateur a payé OU est en période d'essai active
            if ( $user->isTrialActive()) {
                if ($this->logger) {
                    $this->logger->debug('TrialPeriodCheck - Accès autorisé (payé ou essai actif)');
                }
                return;
            }

            // Redirection si ni payé ni en essai actif
            if ($this->logger) {
                $this->logger->debug('TrialPeriodCheck - Redirection vers payment_required');
            }
            $event->setResponse(
                new RedirectResponse($this->router->generate('payment_required'))
            );
        }
    }

    private function isRouteAllowed(?string $route): bool
    {
        if (!$route) {
            return false;
        }

        // Routes explicitement autorisées
        if (in_array($route, self::ALLOWED_ROUTES, true)) {
            return true;
        }

        // Routes internes Symfony
        if (str_starts_with($route, '_')) {
            return true;
        }

        return false;
    }
}