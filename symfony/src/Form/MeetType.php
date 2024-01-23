<?php

namespace App\Form;

use App\Entity\Meet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Pet;

class MeetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du rendez-vous',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
            ])
            ->add('date', DateType::class, [
                'label' => 'Date du rendez-vous',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('pet', EntityType::class, [
                'label' => 'Chat associé',
                'class' => Pet::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meet::class,
        ]);
    }
}
