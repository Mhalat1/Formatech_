<?php
// SOLUTION 1: Avec Doctrine Events (Symfony 7)
// src/EventListener/InvitationListener.php

namespace App\EventListener;

use App\Entity\Invitation;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: Invitation::class)]
#[AsEntityListener(event: Events::postRemove, method: 'postRemove', entity: Invitation::class)]
#[AsEntityListener(event: Events::postUpdate, method: 'postUpdate', entity: Invitation::class)]
class InvitationListener
{
    public function postPersist(Invitation $invitation, PostPersistEventArgs $event): void
    {
        $this->updateUserInvitationCount($invitation->getInvitedBy(), $event);
    }

    public function postRemove(Invitation $invitation, PostRemoveEventArgs $event): void
    {
        $this->updateUserInvitationCount($invitation->getInvitedBy(), $event);
    }

    public function postUpdate(Invitation $invitation, PostUpdateEventArgs $event): void
    {
        $this->updateUserInvitationCount($invitation->getInvitedBy(), $event);
    }

    
//Recalcul du compteur
    private function updateUserInvitationCount(?Utilisateur $user, $event): void
    {
        if (!$user) return;

        $entityManager = $event->getObjectManager();
        
        // Compter les invitations directement en BDD
        $count = $entityManager->getRepository(Invitation::class)
            ->count(['invitedBy' => $user]);

        // Mettre à jour la colonne
        $user->setInvitations($count);
        $entityManager->persist($user);
        $entityManager->flush();
    }
}
