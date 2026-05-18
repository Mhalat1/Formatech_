<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\ConnexionController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\ConnexionController::logout'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\InscriptionController::register'], null, null, null, false, false, null]],
        '/infoinstitution' => [[['_route' => 'institution_index_ajouter', '_controller' => 'App\\Controller\\InstitutionController::indexEtAjouter'], null, null, null, false, false, null]],
        '/admin/invite' => [[['_route' => 'app_invite', '_controller' => 'App\\Controller\\InvitationController::invite'], null, null, null, false, false, null]],
        '/send-session-pdfs' => [[['_route' => 'send_session_pdfs', '_controller' => 'App\\Controller\\PDF_Envoie_Mail::sendSessionPdfs'], null, ['POST' => 0], null, false, false, null]],
        '/send-all-pdfs' => [[['_route' => 'send_all_pdfs', '_controller' => 'App\\Controller\\PDF_Envoie_Mail::sendAllPdfs'], null, ['POST' => 0], null, false, false, null]],
        '/payment-required' => [[['_route' => 'payment_required', '_controller' => 'App\\Controller\\PaymentController::paymentRequired'], null, null, null, false, false, null]],
        '/create-checkout-session' => [[['_route' => 'create_checkout_session', '_controller' => 'App\\Controller\\PaymentController::createCheckoutSession'], null, ['POST' => 0], null, false, false, null]],
        '/payment/success' => [[['_route' => 'payment_success', '_controller' => 'App\\Controller\\PaymentController::paymentSuccess'], null, null, null, false, false, null]],
        '/payment/cancel' => [[['_route' => 'payment_cancel', '_controller' => 'App\\Controller\\PaymentController::paymentCancel'], null, null, null, false, false, null]],
        '/infosessionmodule' => [[['_route' => 'app_Session_Module', '_controller' => 'App\\Controller\\SessionModuleController::index'], null, null, null, false, false, null]],
        '/webhooks/stripe' => [[['_route' => 'app_stripe_webhook', '_controller' => 'App\\Controller\\StripeWebhookController::index'], null, ['POST' => 0], null, false, false, null]],
        '/subscribe' => [[['_route' => 'subscribe', '_controller' => 'App\\Controller\\SubscriptionController::subscribe'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/calendrier/([^/]++)(*:222)'
                .'|/in(?'
                    .'|foutilisateur/([^/]++)/liste(*:264)'
                    .'|vitation/accept/([^/]++)(*:296)'
                    .'|stitution/([^/]++)/modifier(*:331)'
                .')'
                .'|/utilisateur(?'
                    .'|/([^/]++)/mod(?'
                        .'|ifier(?'
                            .'|\\-roles(*:386)'
                            .'|commentaire(*:405)'
                        .')'
                        .'|ulecommentaire(*:428)'
                    .')'
                    .'|sessionmodule/modifier/([^/]++)(*:468)'
                .')'
                .'|/export/([^/]++)/pdf(*:497)'
                .'|/session(?'
                    .'|module/modifier/([^/]++)(*:540)'
                    .'|/([^/]++)/modifier(*:566)'
                .')'
                .'|/module/([^/]++)/modifier(*:600)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        222 => [[['_route' => 'calendrier', '_controller' => 'App\\Controller\\CalendarController::index'], ['id'], null, null, false, true, null]],
        264 => [[['_route' => 'utilisateur_liste', '_controller' => 'App\\Controller\\InstitutionController::liste'], ['id'], ['GET' => 0], null, false, false, null]],
        296 => [[['_route' => 'app_invitation_accept', '_controller' => 'App\\Controller\\InvitationController::acceptInvitation'], ['token'], null, null, false, true, null]],
        331 => [[['_route' => 'institution_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierInstitution'], ['id'], null, null, false, false, null]],
        386 => [[['_route' => 'utilisateur_modifier_roles', '_controller' => 'App\\Controller\\InstitutionController::modifierRoles'], ['id'], null, null, false, false, null]],
        405 => [[['_route' => 'utilisateur_modifier', '_controller' => 'App\\Controller\\InstitutionController::modifier'], ['id'], null, null, false, false, null]],
        428 => [[['_route' => 'module_commentaire', '_controller' => 'App\\Controller\\InstitutionController::modifiermodulecommentaire'], ['id'], null, null, false, false, null]],
        468 => [[['_route' => 'modifier_utilisateur_institution_session_module', '_controller' => 'App\\Controller\\SessionModuleController::modifierUtilisateurInstitutionSessionModule'], ['id'], null, null, false, true, null]],
        497 => [[['_route' => 'app_export_pdf', '_controller' => 'App\\Controller\\PDF_Envoie_Mail::handlePdfRequest'], ['id'], ['POST' => 0], null, false, false, null]],
        540 => [[['_route' => 'modifier_session_module', '_controller' => 'App\\Controller\\SessionModuleController::modifierSessionModule'], ['id'], null, null, false, true, null]],
        566 => [[['_route' => 'session_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierSession'], ['id'], null, null, false, false, null]],
        600 => [
            [['_route' => 'module_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierModule'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
