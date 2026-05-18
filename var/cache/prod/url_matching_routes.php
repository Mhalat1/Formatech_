<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
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
                .'|/calendrier/([^/]++)(*:27)'
                .'|/in(?'
                    .'|foutilisateur/([^/]++)/liste(*:68)'
                    .'|vitation/accept/([^/]++)(*:99)'
                    .'|stitution/([^/]++)/modifier(*:133)'
                .')'
                .'|/utilisateur(?'
                    .'|/([^/]++)/mod(?'
                        .'|ifier(?'
                            .'|\\-roles(*:188)'
                            .'|commentaire(*:207)'
                        .')'
                        .'|ulecommentaire(*:230)'
                    .')'
                    .'|sessionmodule/modifier/([^/]++)(*:270)'
                .')'
                .'|/export/([^/]++)/pdf(*:299)'
                .'|/session(?'
                    .'|module/modifier/([^/]++)(*:342)'
                    .'|/([^/]++)/modifier(*:368)'
                .')'
                .'|/module/([^/]++)/modifier(*:402)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [[['_route' => 'calendrier', '_controller' => 'App\\Controller\\CalendarController::index'], ['id'], null, null, false, true, null]],
        68 => [[['_route' => 'utilisateur_liste', '_controller' => 'App\\Controller\\InstitutionController::liste'], ['id'], ['GET' => 0], null, false, false, null]],
        99 => [[['_route' => 'app_invitation_accept', '_controller' => 'App\\Controller\\InvitationController::acceptInvitation'], ['token'], null, null, false, true, null]],
        133 => [[['_route' => 'institution_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierInstitution'], ['id'], null, null, false, false, null]],
        188 => [[['_route' => 'utilisateur_modifier_roles', '_controller' => 'App\\Controller\\InstitutionController::modifierRoles'], ['id'], null, null, false, false, null]],
        207 => [[['_route' => 'utilisateur_modifier', '_controller' => 'App\\Controller\\InstitutionController::modifier'], ['id'], null, null, false, false, null]],
        230 => [[['_route' => 'module_commentaire', '_controller' => 'App\\Controller\\InstitutionController::modifiermodulecommentaire'], ['id'], null, null, false, false, null]],
        270 => [[['_route' => 'modifier_utilisateur_institution_session_module', '_controller' => 'App\\Controller\\SessionModuleController::modifierUtilisateurInstitutionSessionModule'], ['id'], null, null, false, true, null]],
        299 => [[['_route' => 'app_export_pdf', '_controller' => 'App\\Controller\\PDF_Envoie_Mail::handlePdfRequest'], ['id'], ['POST' => 0], null, false, false, null]],
        342 => [[['_route' => 'modifier_session_module', '_controller' => 'App\\Controller\\SessionModuleController::modifierSessionModule'], ['id'], null, null, false, true, null]],
        368 => [[['_route' => 'session_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierSession'], ['id'], null, null, false, false, null]],
        402 => [
            [['_route' => 'module_modifier', '_controller' => 'App\\Controller\\SessionModuleController::modifierModule'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
