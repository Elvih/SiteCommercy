<?php

namespace App\Form;

use App\Entity\Type;
use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



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
            ->add('Datedebut',DateType::class,[
                'format'=>'d-M-y'
            ])
            ->add('Datefin',DateType::class,[
                'format'=>'d-M-y'
            ])
            ->add('imageFile',FileType::class,[
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
