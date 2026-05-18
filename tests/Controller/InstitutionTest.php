<?php
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Utilisateur;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InstitutionTest extends WebTestCase
{
    /**
     * Crée un client authentifié avec un utilisateur test
     */
    private function createAuthenticatedClient()
    {
        $client = static::createClient();  //Cette ligne crée un client HTTP simulé
        $container = static::getContainer();  //Cette ligne permet d’accéder aux services enregistrés, comme Doctrine, le gestionnaire d'authentification
        $entityManager = $container->get('doctrine')->getManager(); //Effectuer des requêtes sur la base de données 

        // Création d'un utilisateur de test
        $user = new Utilisateur();
        $user->setCourriel('test@example.com');
        $user->setPrenom('John');
        $user->setNom('Doe');
        $user->setTelephone('1234567890');
        $user->setDateNaissance(new \DateTime('1990-01-01'));

        // Hachage du mot de passe
        $passwordHasher = $container->get(UserPasswordHasherInterface::class);
        $user->setPassword($passwordHasher->hashPassword($user, 'password123'));

        // Sauvegarde de l'utilisateur en base de données
        $entityManager->persist($user);
        $entityManager->flush();

        // Connexion de l'utilisateur au client
        $client->loginUser($user);

        return $client;
    }

    /**
     * Teste l'accès à la page /infoinstitution et vérifie si la réponse est correcte
     */
    public function testIndexEtAjouter(): void
    {
        $client = $this->createAuthenticatedClient();
        $client->request('GET', '/infoinstitution');

        // Vérifie que la requête a bien réussi (code 200)
        $this->assertResponseIsSuccessful();
    }

    /**
     * Teste la suppression d'une institution
     */
    public function testDeleteInstitution()
    {
        $client = $this->createAuthenticatedClient(); //Crée un utilisateur authntifié de test.

        // Envoie une requête POST pour supprimer une institution avec l'ID 1
        $client->request('POST', '/infoinstitution', ['delete_Institution_id' => 1]);

        // Vérifie que la requête redirige bien après suppression
        $this->assertResponseRedirects('/infoinstitution');
    }
}
