<?php

namespace App\Form;

use App\Entity\PlaPlanesCabecera;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaPlanesCabeceraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fechaIngreso', null, [
                'widget' => 'single_text',
            ])
            ->add('fechaUltActualizacion', null, [
                'widget' => 'single_text',
            ])
            ->add('nroPlan')
            ->add('identificacionPlan')
            ->add('version')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlaPlanesCabecera::class,
        ]);
    }
}
