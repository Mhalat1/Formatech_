<?php

namespace App\Scheduler;

use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\Messenger\Transport\TransportInterface; // Correction ici
use Symfony\Component\Scheduler\Messenger\ScheduledMessage; // Ajout pour CallbackMessage
use Symfony\Component\Scheduler\Trigger\CallbackTrigger;


use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Console\Messenger\RunCommandMessage;

//
// Importation des classes nécessaires pour la planification

// Déclare une classe MainSchedule avec l'attribut AsSchedule('default') 
// qui indique que c'est un fournisseur de planification par défaut
#[AsSchedule('default')] 
// La classe est déclarée comme finale (ne peut pas être héritée) et implémente ScheduleProviderInterface
final class MainSchedule implements ScheduleProviderInterface {     
    // Constructeur qui injecte une dépendance CacheInterface
    public function __construct(
        // Propriété privée pour le cache
        private CacheInterface $cache
    ) {
    }

//    public function getSchedule(): Schedule {
//     return (new Schedule())
//         ->add(
//             RecurringMessage::cron(
//                 '* * * * *',
//                 new RunCommandMessage(
//                     'messenger:consume async -vv --limit=100 --time-limit=50',
//                     true
//                 )
//             )
//         )
//         ->stateful($this->cache);
// }

public function getSchedule(): Schedule {

    return (new Schedule())
        ->add(
            RecurringMessage::cron('* * * * *',  // Format spécial : Minute(50) Heure(19) Jour(26) Mois(5) *(tout les ans)
            new RunCommandMessage(
                    'messenger:consume async -vv ',

                    // -- [ les 4 elements suivant font la même chose au final une fois la limite atteitne le script s'arrête ] --

                    //--limit=100 :Traite maximum 100 messages avant de s'arrêter
                    //--memory-limit=100M :Limite la mémoire à 100 Mo

                    //--stop-when-empty (Option cruciale) :Arrête le worker immédiatement quand la queue est vide
                    //--time-limit=30 :Temps maximum d'exécution (30 secondes) le script s'arrêtera après 30 secondes et ne se relance plus 

                    // -v ou -vv ou -vvv  définit le niveaude de tails pour le déboguage 
                    true
                ),
            new \DateTimeZone('Europe/Paris')
            )
        )
        ->stateful($this->cache);
}

//$ Symfony console messenger:consume scheduler_default   cette commande permet de consommer les messages planifiés


}