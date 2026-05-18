<?php
// src/Form/JourHoraireType.php
namespace App\Form;

use App\Entity\JourHoraire;
use App\Entity\Module; // Assurez-vous que cette entité existe
use App\Form\Type\SessionModuleType; // Assurez-vous que cette entité existe
use App\Entity\UtilisateurInstitutionSessionModule; // Assurez-vous que cette entité existe
use App\Entity\SessionModule; // Assurez-vous que cette entité existe
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Pour le champ EntityType

class JourHoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('UtilisateurInstitutionSessionModule', EntityType::class, [
            'label' => 'UtilisateurInstitutionSessionModule',
            'class' => UtilisateurInstitutionSessionModule::class,
            'choice_label' => function(UtilisateurInstitutionSessionModule $utilisateurinstitutionsessionModule) {
            // Récupère la session module associée
            $sessionModule = $utilisateurinstitutionsessionModule->getSessionModule();

            // Puis récupère le module associé à cette session module
            $module = $sessionModule ? $sessionModule->getModule() : null;

            // Retourne le nom du module s'il existe, sinon une chaîne vide ou autre valeur par défaut
            return $module ? $module->getNom() : '';
                },
                'placeholder' => 'Sélectionnez un des modules associé à des utilisateurs',
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('jour', ChoiceType::class, [
                'label' => 'Jour de la semaine',
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Dimanche' => 'Dimanche',
                ],
                'placeholder' => 'Choisissez un jour',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('datePrecise', DateType::class, [
                'label' => 'Date précise',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'required' => false,
                'help' => 'Si une date précise est sélectionnée, elle prendra priorité sur le jour de la semaine',
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                'input' => 'datetime',
                'attr' => ['class' => 'form-control']
            ])
            ->add('heureFin', TimeType::class, [
                'label' => 'Heure de fin',
                'widget' => 'single_text',
                'input' => 'datetime',
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JourHoraire::class,
        ]);
    }
}