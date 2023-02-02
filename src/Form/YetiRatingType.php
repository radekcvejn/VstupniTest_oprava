<?php

namespace App\Form;

use App\Entity\YetiRating;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class YetiRatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value',  ChoiceType::class,
            [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5
                ],
                'expanded' => false,
                'multiple' => false,
                'label' => 'hodnoceni'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver -> setDefaults([
           'data_class' => YetiRating::class,
       ]);
    }

}