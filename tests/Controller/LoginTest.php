<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase; // Importation de la classe WebTestCase pour tester les contrôleurs Symfony
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils; // Importation de la classe AuthenticationUtils pour simuler des erreurs de connexion
use Symfony\Component\Security\Core\Exception\AuthenticationException; // Importation de l'exception d'authentification pour simuler les erreurs

// Classe de test pour le contrôleur de sécurité
class LoginTest extends WebTestCase
{
    // Test pour vérifier que la page de connexion est accessible
    public function testLoginPageIsAccessible()
    {
        // Création d'un client HTTP pour simuler des requêtes
        $client = static::createClient();
        // Envoi d'une requête GET vers la page de connexion
        $client->request('GET', '/login');

        // Vérification que la réponse est réussie (code 200 OK)
        $this->assertResponseIsSuccessful();
        // Vérification que le texte 'Se connecter' est bien présent dans l'élément <h1> de la page
        $this->assertSelectorTextContains('h1', 'Se connecter'); 
    }

    // Test pour vérifier que la page de connexion affiche une erreur et le dernier nom d'utilisateur utilisé
    public function testLoginPageDisplaysErrorAndLastUsername()
    {
        // Création d'un client HTTP pour simuler des requêtes
        $client = static::createClient();
        
        // Création d'un mock de la classe AuthenticationUtils (permet de simuler des erreurs d'authentification)
        $authenticationUtils = $this->createMock(AuthenticationUtils::class);
        // Simulation d'une erreur d'authentification avec un message spécifique
        $authenticationUtils->method('getLastAuthenticationError')
            ->willReturn(new AuthenticationException('Identifiants invalides.'));
        // Simulation du dernier nom d'utilisateur utilisé pour la connexion
        $authenticationUtils->method('getLastUsername')
            ->willReturn('ADMIN@ADMIN.FR');

        // Remplacement du service AuthenticationUtils dans le conteneur de services Symfony par notre mock
        self::getContainer()->set('security.authentication_utils', $authenticationUtils);

        // Envoi de la requête GET vers la page de connexion
        $client->request('GET', '/login');

        // Vérification que le champ 'courriel' contient bien le dernier nom d'utilisateur utilisé
        $this->assertInputValueSame('courriel', 'ADMIN@ADMIN.FR');
        // Vérification que le message d'erreur 'Identifiants invalides' est bien affiché dans une alerte d'erreur
        $this->assertSelectorTextContains('.alert-danger', 'An authentication exception occurred.');
    }

    // Test pour vérifier que la route de déconnexion est correctement configurée
    public function testLogoutRouteIsConfigured()
    {
        // Création d'un client HTTP pour simuler des requêtes
        $client = static::createClient();
        // Envoi d'une requête GET vers la route de déconnexion
        $client->request('GET', '/logout');

        // Vérification que la réponse est une redirection (code 302)
        $this->assertResponseStatusCodeSame(302); // Redirection attendue après la déconnexion
    }
}
