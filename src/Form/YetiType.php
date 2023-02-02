<?php

namespace App\Form;

use App\Entity\Yeti;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YetiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',  TextType::class, ['label' => 'Jméno'])
            ->add('height',NumberType::class, ['label' => 'Výška'])
            ->add('weight',NumberType::class, ['label' => 'Váha'])
            ->add('age',NumberType::class, ['label' => 'Věk'])
            ->add('location',TextType::class, ['label' => 'Lokace'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Yeti::class,
        ]);
    }
}
