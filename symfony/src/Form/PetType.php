<?php

namespace App\Form;

use App\Entity\Pet;
use App\Entity\Customer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du chat',
            ])
            ->add('image', FileType::class, [
                'label' => 'Image du chat',
                'mapped' => false,
                'required' => false,
            ])
            ->add('sex', ChoiceType::class, [
                'label' => 'Sexe',
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ],
            ])
            ->add('birth', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('race', TextType::class, [
                'label' => 'Race',
            ])
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.id', 'ASC');
                },
                'choice_label' => 'name', // Use the 'name' field as the label
                'label' => 'Propriétaire',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}