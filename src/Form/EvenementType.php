<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Description',TextareaType::class)
            ->add('Type',EntityType::class,[
                'class' =>Type::class,
                'choice_label' =>'Nom'
            ])
            ->add('Datedebut',DateTimeType::class)
            ->add('Datefin',DateTimeType::class)
            ->add('Fichierimage',FileType::class,[
                'required' =>false
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class
        ]);
    }


}
