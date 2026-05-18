<?php

// src/Form/UtilisateurCommentaireType.php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert; // Importing Assert constraints

class UtilisateurCommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentaire', TextareaType::class, [ 
                'label' => 'Commentaire',
                'required' => false,
                'constraints' => [
                    new Assert\Length([ 
                        'max' => 255,
                        'maxMessage' => 'Le commentaire ne peut pas dépasser 255 caractères.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class, // Ensure data class is correctly set
        ]);
    }
}
