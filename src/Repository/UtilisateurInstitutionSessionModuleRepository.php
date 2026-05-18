<?php

namespace App\Repository;

use App\Entity\UtilisateurInstitutionSessionModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UtilisateurInstitutionSessionModule>
 */
class UtilisateurInstitutionSessionModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateurInstitutionSessionModule::class);
    }

public function countUsersPerSessionModule(): array
{
    return $this->createQueryBuilder('uism')
        ->select([
            'IDENTITY(uism.sessionModule) as session_module_id',
            'i.nom as institution_nom',  // Nom du module
            'COUNT(DISTINCT IDENTITY(uism.utilisateur)) as user_count'
        ])
        ->join('uism.sessionModule', 'sm')  // Jointure vers SessionModule
        ->join('sm.institution', 'i')           // Jointure vers Module
        ->groupBy('uism.sessionModule', 'i.nom')  // Groupement
        ->orderBy('i.nom')                 // Tri par nom de module
        ->getQuery()
        ->getResult();
}


}
