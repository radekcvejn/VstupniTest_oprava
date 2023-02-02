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
            ->add('name',  TextType::class)
            ->add('height',NumberType::class)
            ->add('weight',NumberType::class)
            ->add('age',NumberType::class)
            ->add('location',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Yeti::class,
        ]);
    }
}
