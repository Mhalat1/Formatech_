<?php
// src/Form/UtilisateurRoleType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Validator\Constraints as Assert; 


class UtilisateurRoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Enseignant' => 'ROLE_ENSEIGNANT',
                    'Etudiant' => 'ROLE_ETUDIANT',
                    'Administrateur' => 'ROLE_ADMIN',
                    'SuperAdministrateur' => 'ROLE_SUPERADMIN',
                    // Add more roles here if necessary
                ],
                'multiple' => true,  // Multiple roles can be selected
                'expanded' => true,  // Display the options as checkboxes
            ])
            ->add('courriel', EmailType::class, [
                'label' => 'Adresse email',
                'constraints' => [
                    new Assert\Email([
                        'message' => 'Veuillez entrer une adresse email valide.',
                    ]), // assure l'envoie d'un mail valide
                    new Assert\NotBlank([
                        'message' => 'L\'email ne peut pas être vide.',
                    ]), //assure qu'une valeur vide ne soit pas envoyé 
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'telephone',
                'constraints' => [
                    new Assert\Regex([
                        'pattern' => '/^\+?[0-9]{8,10}$/',  // assure que seul les valeurs inscrite soient entre 0 et 9 et qu'il y'a entre 10 et 15 valeurs, on accepte aussi le signe +
                        'message' => 'Le numéro de téléphone doit être valide (ex. : +1234567890).'
                    ]),
                    new Assert\NotBlank([
                        'message' => 'Le numéro de téléphone ne peut pas être vide.',
                    ]), //assure qu'une valeur vide ne soit pas envoyé 
                ]
            ])
            ->add('dateNaissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',  // Affiche la date sous forme d'un champ unique (peut être modifié selon vos besoins)
                'format' => 'yyyy-MM-dd',   // Format de la date
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \App\Entity\Utilisateur::class,  // Set the entity for the form
        ]);
    }
}
