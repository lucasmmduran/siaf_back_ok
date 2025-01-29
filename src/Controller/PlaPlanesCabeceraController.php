<?php

namespace App\Controller;

use App\Entity\PlaConfTipoPlanes;
use App\Entity\PlaConfPlanes;
use App\Entity\PlaPlanesCabecera;
use App\Entity\SiafEjercicios;
use App\Entity\SiafUnidades;
use App\Form\PlaPlanesCabeceraType;
use App\Repository\PlaPlanesCabeceraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/pla/planes/cabecera')]
final class PlaPlanesCabeceraController extends AbstractController
{
    private $serializer;
    
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    #[Route(name: 'app_pla_planes_cabecera_index', methods: ['GET'])]
    public function index(PlaPlanesCabeceraRepository $plaPlanesCabeceraRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $planes = $entityManager->getRepository(PlaPlanesCabecera::class)->findAll();
        $data = array_map(function ($plan) {
            return [
                'id' => $plan->getId(),
                'ejercicio' => $plan->getSiafEjercicios()->getId(),
                'unidad' => $plan->getSiafUnidades()->getUnidad(),
                'plan' => $plan->getPlaConfPlanes()->getPlan(),
                'tipo_plan' => $plan->getPlaConfPlanes()->getPlaConfTipoPlan()->getTipoPlan(),
                'fecha_ingreso' => $plan->getFechaIngreso(),
                'fecha_ult_actualizacion' => $plan->getFechaUltActualizacion(),
            ];
        }, $planes);
        return new JsonResponse(['data' => $data], JsonResponse::HTTP_OK);
    }

    #[Route('/selectores', name: 'app_pla_planes_cabecera_selectores', methods: ['GET'])]
    public function selectores(EntityManagerInterface $entityManager): JsonResponse
    {
        $ejercicios = $entityManager->getRepository(SiafEjercicios::class)->findAll();
        $dataEjercicios = array_map(function ($ejercicio) {
            return [
                'id' => $ejercicio->getId(),
            ];
        }, $ejercicios);

        $unidades = $entityManager->getRepository(SiafUnidades::class)->findAll();
        $dataUnidades = array_map(function ($unidad) {
            return [
                'id' => $unidad->getId(),
                'unidad' => $unidad->getUnidad(),
            ];
        }, $unidades);

        $planes = $entityManager->getRepository(PlaConfPlanes::class)->findAll();
        $dataPlanes = array_map(function ($plan) {
            return [
                'id' => $plan->getId(),
                'plan' => $plan->getPlan(),
            ];
        }, $planes);

        $tipoPlanes = $entityManager->getRepository(PlaConfTipoPlanes::class)->findAll();
        $dataTipoPlanes = array_map(function ($tipoPlan) {
            return [
                'id' => $tipoPlan->getId(),
                'tipo_plan' => $tipoPlan->getTipoPlan(),
            ];
        }, $tipoPlanes);

        $data = [
            "ejercicios" => $dataEjercicios,
            "unidades" => $dataUnidades,
            "planes" => $dataPlanes,
            "tipo_planes" =>$dataTipoPlanes,
        ];
    
        return new JsonResponse([
            'data' => $data
        ], JsonResponse::HTTP_OK);
    }

    #[Route('/new', name: 'app_pla_planes_cabecera_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, PlaPlanesCabeceraRepository $plaPlanesCabeceraRepository): JsonResponse
    {
        $plaPlanesCabecera = new PlaPlanesCabecera();
        $form = $this->createForm(PlaPlanesCabeceraType::class, $plaPlanesCabecera);
        $form->handleRequest($request);

        /* if ($form->isSubmitted() && $form->isValid()) { */
            $data = json_decode($request->getContent(), true);

            $plaPlanesCabecera->setNroPlan($data['plan']);
            $plaPlanesCabecera->setIdentificacionPlan($data['tipo_plan']);

            $planConfPlanes = $entityManager->getRepository(PlaConfPlanes::class)->find($data['plan']);
            if (!$planConfPlanes) {
                return new JsonResponse(['error' => 'planConfPlanes no encontrado'], JsonResponse::HTTP_NOT_FOUND);
            }
            $plaPlanesCabecera->setPlaConfPlanes($planConfPlanes);
            
            $siafEjercicios = $entityManager->getRepository(SiafEjercicios::class)->find($data['siaf_ejercicios_id']);
            if (!$siafEjercicios) {
                return new JsonResponse(['error' => 'SiafEjercicios no encontrado'], JsonResponse::HTTP_NOT_FOUND);
            }
            $plaPlanesCabecera->setSiafEjercicios($siafEjercicios);
            
            $siafUnidades = $entityManager->getRepository(SiafUnidades::class)->find($data['siaf_unidades_id']);
            if (!$siafUnidades) {
                return new JsonResponse(['error' => 'siafUnidades no encontrado'], JsonResponse::HTTP_NOT_FOUND);
            }
            $plaPlanesCabecera->setSiafUnidades($siafUnidades);
            
            $plaPlanesCabecera->setVersion(1);
            $plaPlanesCabecera->setFechaIngreso(new \DateTime());
            $plaPlanesCabecera->setFechaUltActualizacion(new \DateTime());

            $entityManager->persist($plaPlanesCabecera);
            $entityManager->flush();

            /* 
                Refactorizar, mismo codigo que en app_pla_planes_cabecera_index
                Una vez insertado el plan, muestro todos los planes
             */
            $planes = $entityManager->getRepository(PlaPlanesCabecera::class)->findAll();
            $data = array_map(function ($plan) {
                return [
                    'id' => $plan->getId(),
                    'ejercicio' => $plan->getSiafEjercicios()->getId(),
                    'unidad' => $plan->getSiafUnidades()->getUnidad(),
                    'plan' => $plan->getPlaConfPlanes()->getPlan(),
                    'tipo_plan' => $plan->getPlaConfPlanes()->getPlaConfTipoPlan()->getTipoPlan(),
                    'fecha_ingreso' => $plan->getFechaIngreso(),
                    'fecha_ult_actualizacion' => $plan->getFechaUltActualizacion(),
                ];
            }, $planes);
            
            return new JsonResponse(['data' => $data], JsonResponse::HTTP_OK);
        /* }  */
        
        return new JsonResponse(['errors' => 'mensaje error'], 500);
        /* else {
            $errors = [];
            foreach ($form->getErrors(true) as $error) {
                $errors[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST);
        } */

        /* return $this->render('pla_planes_cabecera/new.html.twig', [
            'pla_planes_cabecera' => $plaPlanesCabecera,
            'form' => $form,
        ]); */
    }

    #[Route('/{id}', name: 'app_pla_planes_cabecera_show', methods: ['GET'])]
    public function show(PlaPlanesCabecera $plaPlanesCabecera): Response
    {
        return $this->render('pla_planes_cabecera/show.html.twig', [
            'pla_planes_cabecera' => $plaPlanesCabecera,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pla_planes_cabecera_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlaPlanesCabecera $plaPlanesCabecera, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaPlanesCabeceraType::class, $plaPlanesCabecera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pla_planes_cabecera_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_cabecera/edit.html.twig', [
            'pla_planes_cabecera' => $plaPlanesCabecera,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pla_planes_cabecera_delete', methods: ['POST'])]
    public function delete(Request $request, PlaPlanesCabecera $plaPlanesCabecera, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plaPlanesCabecera->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plaPlanesCabecera);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pla_planes_cabecera_index', [], Response::HTTP_SEE_OTHER);
    }
}
