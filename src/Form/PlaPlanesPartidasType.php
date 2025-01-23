<?php

namespace App\Form;

use App\Entity\PlaPlanesPartidas;
use App\Entity\PlaPlanesProcesos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaPlanesPartidasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('compromisoMes1')
            ->add('compromisoOrigMes1')
            ->add('importeNoProgramadoOrig')
            ->add('importeNoProgramado')
            ->add('compromisoMes2')
            ->add('compromisoOrigMes2')
            ->add('compromisoMes3')
            ->add('compromisoOrigMes3')
            ->add('compromisoMes4')
            ->add('compromisoOrigMes4')
            ->add('compromisoMes5')
            ->add('compromisoOrigMes5')
            ->add('compromisoMes6')
            ->add('compromisoOrigMes6')
            ->add('compromisoMes7')
            ->add('compromisoOrigMes7')
            ->add('compromisoMes8')
            ->add('compromisoOrigMes8')
            ->add('compromisoMes9')
            ->add('compromisoOrigMes9')
            ->add('compromisoMes10')
            ->add('compromisoOrigMes10')
            ->add('compromisoMes11')
            ->add('compromisoOrigMes11')
            ->add('compromisoMes12')
            ->add('compromisoOrigMes12')
            ->add('devengadoMes1')
            ->add('devengadoOrigMes1')
            ->add('devengadoMes2')
            ->add('devengadoOrigMes2')
            ->add('devengadoMes3')
            ->add('devengadoOrigMes3')
            ->add('devengadoMes4')
            ->add('devengadoOrigMes4')
            ->add('devengadoMes5')
            ->add('devengadoOrigMes5')
            ->add('devengadoMes6')
            ->add('devengadoOrigMes6')
            ->add('devengadoMes7')
            ->add('devengadoOrigMe7')
            ->add('devengadoMes8')
            ->add('devengadoOrigMe8')
            ->add('devengadoMes9')
            ->add('devengadoOrigMe9')
            ->add('devengadoMes10')
            ->add('devengadoOrigMe10')
            ->add('devengadoMes11')
            ->add('devengadoOrigMe11')
            ->add('devengadoMes12')
            ->add('devengadoOrigMe12')
            ->add('subClase')
            ->add('plaPlanesProcesos', EntityType::class, [
                'class' => PlaPlanesProcesos::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlaPlanesPartidas::class,
        ]);
    }
}
