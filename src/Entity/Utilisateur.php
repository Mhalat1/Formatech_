<?php
// src/Entity/Utilisateur.php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Index(name: 'idx_prenom', columns: ['prenom'])]
#[ORM\Index(name: 'idx_nom', columns: ['nom'])]
#[ORM\Index(name: 'idx_courriel', columns: ['courriel'])]
#[ORM\Index(name: 'idx_commentaire', columns: ['commentaire'])]
#[ORM\Index(name: 'idx_note', columns: ['note'])]
#[ORM\Index(name: 'idx_telephone', columns: ['telephone'])]
#[ORM\Index(name: 'idx_date_naissance', columns: ['date_naissance'])]
#[UniqueEntity(fields: ['courriel'], message: 'There is already an account with this courriel')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct()
    {
        $this->trialEndsAt = (new \DateTime())->add(new \DateInterval('P90D'));
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $courriel = null;

    #[ORM\Column(length: 255)]
    private ?string $motdepasse = null;

    #[ORM\Column(type: 'json')]
    private array $roles = ['ROLE_USER'];

    #[ORM\Column(length: 255)]
    private ?string $commentaire = "ajouter commentaire";

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?string $note = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $abonnement_id = null;

    #[ORM\Column(type: 'integer')]
    private int $subscriptionCount = 0;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'trial_ends_at')]
    private ?\DateTimeInterface $trialEndsAt = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?Institution $institution = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $invitations = 0;












    #[ORM\Column(name: 'nombre_institutions', type: 'integer')]
    private int $nombreInstitutions = 0;

    // ... autres champs

    public function incrementCompteur(): self  // Retourne $this pour le chaînage
    {
        $this->nombreInstitutions++;
        return $this;
    }
    public function getNombreInstitutions(): int {
        return $this->nombreInstitutions;
    }









#[ORM\Column(length: 255, nullable: true)]
private ?string $stripeCustomerId = null;

public function getStripeCustomerId(): ?string
{
    return $this->stripeCustomerId;
}

public function setStripeCustomerId(?string $stripeCustomerId): self
{
    $this->stripeCustomerId = $stripeCustomerId;
    return $this;
}

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subscriptionType = null; // 'monthly' ou 'yearly'
        
    public function getSubscriptionType(): ?string
    {
        return $this->subscriptionType;
    }

    public function setSubscriptionType(?string $type): self
    {
        $this->subscriptionType = $type;
        return $this;
    }
    


    public function getInvitations(): int
    {
        return $this->invitations;
    }

    // Setter (utilisé par le listener)
    public function setInvitations(int $invitations): self
    {
        $this->invitations = $invitations;
        return $this;
    }

public function countInvitations(): int
{
    return $this->invitations;
}



    public function isNewUser(): bool
    {
        return $this->subscriptionCount === 0;
    }

    public function getSubscriptionCount(): int
    {
        return $this->subscriptionCount;
    }

    public function setSubscriptionCount(int $count): self
    {
        $this->subscriptionCount = $count;
        return $this;
    }

    public function getAbonnementId(): ?string
    {
        return $this->abonnement_id;
    }

    public function setAbonnementId(?string $abonnement_id): self
    {
        $this->abonnement_id = $abonnement_id;
        return $this;
    }

    // Getters et Setters pour trial
    public function getTrialEndsAt(): ?\DateTimeInterface
    {
        return $this->trialEndsAt;
    }

    public function setTrialEndsAt(?\DateTimeInterface $trialEndsAt): self
    {
        $this->trialEndsAt = $trialEndsAt;
        return $this;
    }

    public function isTrialActive(): bool
    {
        if ($this->trialEndsAt === null) {
            return false;
        }
        return $this->trialEndsAt > new \DateTime();
    }

    // Méthodes UserInterface
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->motdepasse;
    }

    public function setPassword(string $motdepasse): static
    {
        $this->motdepasse = $motdepasse;
        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->courriel;
    }

    public function eraseCredentials(): void
    {
        // Nothing to do here
    }

    // Getters and setters standards
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(string $courriel): static
    {
        $this->courriel = $courriel;
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getInstitution(): ?Institution
    {
        return $this->institution;
    }

    public function setInstitution(?Institution $institution): static
    {
        $this->institution = $institution;
        return $this;
    }


}