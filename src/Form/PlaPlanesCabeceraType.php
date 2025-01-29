<?php

namespace App\Form;

use App\Entity\PlaConfPlanes;
use App\Entity\PlaPlanesCabecera;
use App\Entity\SiafAperturasProgramaticas;
use App\Entity\SiafEjercicios;
use App\Entity\SiafUnidades;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('plaConfPlanes', EntityType::class, [
                'class' => PlaConfPlanes::class,
                'choice_label' => 'id',
            ])
            ->add('SiafAperturasProgramaticas', EntityType::class, [
                'class' => SiafAperturasProgramaticas::class,
                'choice_label' => 'id',
            ])
            ->add('SiafEjercicios', EntityType::class, [
                'class' => SiafEjercicios::class,
                'choice_label' => 'id',
            ])
            ->add('SiafUnidades', EntityType::class, [
                'class' => SiafUnidades::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlaPlanesCabecera::class,
        ]);
    }
}
