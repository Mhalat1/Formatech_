<?php
// src/Security/InstitutionVoter.php

namespace App\Security;

use App\Entity\Institution;
use App\Entity\Utilisateur;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class InstitutionVoter extends Voter
{
    public const VIEW = 'view';
    public const EDIT = 'edit';
    public const DELETE = 'delete';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [self::VIEW, self::EDIT, self::DELETE])
            && $subject instanceof Institution;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof Utilisateur) {
            return false;
        }

        /** @var Institution $institution */
        $institution = $subject;

        switch ($attribute) {
            case self::VIEW:
            case self::EDIT:
            case self::DELETE:
                return $this->canAccess($institution, $user);
        }

        return false;
    }

    private function canAccess(Institution $institution, Utilisateur $user): bool
    {
        // Vérifier si l'utilisateur appartient à cette institution
        return $user->getInstitution()->contains($institution);
    }
}