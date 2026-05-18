<?php

namespace App\Form;

use App\Entity\Institution;
use App\Entity\Invitation;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints as Assert;

class InvitationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('email', EmailType::class, [
            'label' => 'Adresse email du destinataire',
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'L\'email est obligatoire'
                ]),
                new Assert\Email([
                    'message' => 'Veuillez saisir un email valide'
                ])
            ],
            'attr' => [
                'required' => true
            ]
        ])
            ->add('token')
            ->add('expiresAt', null, [
                'widget' => 'single_text',
            ])
            ->add('createdAt', DateTimeType::class, [
                'label' => 'Créé le',
                'data' => new \DateTime(), // Date automatique d'aujourd'hui
                'widget' => 'single_text',
                'attr' => [
                    'readonly' => true,
                ],
                'disabled' => false, // Pour que la valeur soit soumise
            ])
            ->add('institution', EntityType::class, [
                'class' => Institution::class,
                'choice_label' => 'nom',
                'placeholder' => 'Sélectionnez une institution...',
                'required' => true,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('i')
                        ->innerJoin('i.utilisateurs', 'u') // Maintenant ça marche avec la relation ManyToMany
                        ->where('u.id = :userId')
                        ->setParameter('userId', $options['current_user']->getId())
                        ->orderBy('i.nom', 'ASC');
                },
            ])
            ->add('invitedBy', HiddenType::class, [ // Champ caché car valeur automatique
                'data' => $options['current_user']->getId(),
                'mapped' => false // Important car ce n'est pas un champ de l'entité
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invitation::class,
            'institution' => [], // Définit l'option avec une valeur par défaut
            'utilisateur_institution' => [], // Valeur par défaut
            'current_user' => null,


        ]);    $resolver->setRequired('current_user');

    }
}
