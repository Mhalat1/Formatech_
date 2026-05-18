<?php
// src/Traits/CommonDataTrait.php
namespace App\Traits;

use App\Entity\Utilisateur;
use App\Entity\Institution;
use App\Entity\Module;
use Doctrine\Persistence\ManagerRegistry;

trait CommonDataTrait
{
    protected function getCommonData(ManagerRegistry $doctrine): array
    {
        return [
            'utilisateurs_liste_haut_de_page' => $doctrine->getRepository(Utilisateur::class)->findAll(),
            'institutions_haut_de_page' => $doctrine->getRepository(Institution::class)->findAll(),
            'modules_haut_de_page' => $doctrine->getRepository(Module::class)->findAll(),
        ];
    }
}