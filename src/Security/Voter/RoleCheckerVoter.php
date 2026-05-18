<?php

// src/Security/Voter/RoleCheckerVoter.php
namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RoleCheckerVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        // Vérifie si l'attribut est l'un des rôles définis
        return in_array($attribute, ['ROLE_USER_ADMIN', 'ROLE_USER_ENSEIGNANT', 'ROLE_USER_SUPERADMIN']);
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false; // L'utilisateur n'est pas authentifié
        }

        // Utilisation de la méthode getRoles() pour récupérer les rôles
        $roles = $user->getRoles();

        switch ($attribute) {
            case 'ROLE_USER_ADMIN':
                // Vérifie si l'utilisateur a les deux rôles : ROLE_USER et ROLE_ADMIN
                return in_array('ROLE_USER', $roles) && in_array('ROLE_ADMIN', $roles);

            case 'ROLE_USER_ENSEIGNANT':
                // Vérifie si l'utilisateur a les deux rôles : ROLE_USER et ROLE_ENSEIGNANT
                return in_array('ROLE_USER', $roles) && in_array('ROLE_ENSEIGNANT', $roles);

            case 'ROLE_USER_SUPERADMIN':
                // Vérifie si l'utilisateur a les deux rôles : ROLE_USER et ROLE_ENSEIGNANT
                return in_array('ROLE_USER', $roles) && in_array('ROLE_SUPERADMIN', $roles);
        }

        return false;
    }
}

