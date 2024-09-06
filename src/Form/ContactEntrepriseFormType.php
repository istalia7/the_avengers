<?php

namespace App\Form;

use App\Entity\ContactEntreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactEntrepriseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('numTel', TelType::class)
            ->add('nomEntreprise', TextType::class)
            ->add('raison', ChoiceType::class, [
                'label' => 'Raison :',
                'placeholder' => 'Sélectionnez un motif',
                'required' => true,
                'choices' => [
                    'Raison' => [
                        'Renseignement' => 'renseignement',
                        'Réservation' => 'réservation',
                        'Aide' => 'aide',
                    ]
                ]
            ])
            ->add('message', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactEntreprise::class,
        ]);
    }
}
