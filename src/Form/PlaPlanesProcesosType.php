<?php

namespace App\Form;

use App\Entity\PlaConfTipoPlanes;
use App\Entity\PlaPlanesCabecera;
use App\Entity\PlaPlanesProcesos;
use App\Entity\SiafMoneda;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaPlanesProcesosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nroLinea')
            ->add('descripcion')
            ->add('nombre')
            ->add('identificacion')
            ->add('esPlurianual')
            ->add('esMonedaExtranjera')
            ->add('estaPresupuestado')
            ->add('tipoTasa')
            ->add('tasaConversion')
            ->add('importeTotal')
            ->add('importeTotalOrig')
            ->add('importeEjercicio')
            ->add('importeEjercicioOrig')
            ->add('importeAnteriorOrig')
            ->add('importeProximoEjercicioOrig')
            ->add('expedienteImpulso')
            ->add('tipoRegistro')
            ->add('referenciaLineaProceso')
            ->add('plaPlanesCabecera', EntityType::class, [
                'class' => PlaPlanesCabecera::class,
                'choice_label' => 'id',
            ])
            ->add('plaConfTipoPlanes', EntityType::class, [
                'class' => PlaConfTipoPlanes::class,
                'choice_label' => 'id',
            ])
            ->add('SiafMoneda', EntityType::class, [
                'class' => SiafMoneda::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlaPlanesProcesos::class,
        ]);
    }
}
