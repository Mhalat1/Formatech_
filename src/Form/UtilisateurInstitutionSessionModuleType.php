<?php

namespace App\Form;

use App\Entity\SessionModule;
use App\Entity\Utilisateur;

use App\Entity\UtilisateurInstitutionSessionModule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UtilisateurInstitutionSessionModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('SessionModule', EntityType::class, [
                'class' => SessionModule::class,
                'choice_label' => function (SessionModule $sessionModule) {
                    return $sessionModule->getInstitution()->getNom(). ' - ' . $sessionModule->getSession()->getNom(). ' - ' . $sessionModule->getModule()->getNom(); // Retourne le nom de la session associée
                },
                'placeholder' => 'Choisir un module', // Si tu veux un placeholder
            ])
            
            ->add('Utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'nom',
                'placeholder' => 'Choisir un utilisateur', // Si tu veux un placeholder
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UtilisateurInstitutionSessionModule::class,
        ]);
    }
}
