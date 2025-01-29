<?php

namespace App\Controller;

use App\Entity\PlaConfPlanConcepto;
use App\Entity\PlaConfTipoPlanes;
use App\Entity\PlaPlanesCabecera;
use App\Entity\PlaPlanesProcesos;
use App\Entity\SiafMoneda;
use App\Form\PlaPlanesProcesosType;
use App\Repository\PlaPlanesProcesosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/pla/planes/procesos')]
final class PlaPlanesProcesosController extends AbstractController
{
    #[Route(name: 'app_pla_planes_procesos_index', methods: ['GET'])]
    public function index(PlaPlanesProcesosRepository $plaPlanesProcesosRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $procesos = $entityManager->getRepository(PlaPlanesProcesos::class)->findAll();
        $data = array_map(function ($plan) {
            return [
                'id' => $plan->getId(),
                'concepto' => $plan->getNombre(),
                'identificacion' => $plan->getIdentificacion(),
                'descripcion' => $plan->getDescripcion(),
                'monto_anual' => '', // harcodeado, falta dato o ver de donde se forma
            ];
        }, $procesos);
        return new JsonResponse(['data' => $data], JsonResponse::HTTP_OK);
        
        /* return $this->render('pla_planes_procesos/index.html.twig', [
            'pla_planes_procesos' => $plaPlanesProcesosRepository->findAll(),
        ]); */
    }

    #[Route('/selectores', name: 'app_pla_planes_procesos_selectores', methods: ['GET'])]
    public function selectores(EntityManagerInterface $entityManager): JsonResponse
    {
        $monedas = $entityManager->getRepository(SiafMoneda::class)->findAll();
        $dataMonedas = array_map(function ($moneda) {
            return [
                'id' => $moneda->getId(),
                'cod_moneda' => $moneda->getCodMoneda(),
            ];
        }, $monedas);

        $conceptos = $entityManager->getRepository(PlaConfPlanConcepto::class)->findAll();
        $dataConceptos = array_map(function ($concepto) {
            return [
                'id' => $concepto->getId(),
                'concepto' => $concepto->getPlanConcepto(),
            ];
        }, $conceptos);

        $data = [
            "monedas" => $dataMonedas,
            "conceptos" => $dataConceptos,
        ];
    
        return new JsonResponse([
            'data' => $data
        ], JsonResponse::HTTP_OK);
    }

    #[Route('/new', name: 'app_pla_planes_procesos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $plaPlanesProceso = new PlaPlanesProcesos();
        $form = $this->createForm(PlaPlanesProcesosType::class, $plaPlanesProceso);
        $form->handleRequest($request);

        /* if ($form->isSubmitted() && $form->isValid()) { */
            $data = json_decode($request->getContent(), true);

            $plaPlanesCabecera = $entityManager->getRepository(PlaPlanesCabecera::class)->find($data['plan_id']);
            if (!$plaPlanesCabecera) {
                return new JsonResponse(['error' => 'plaPlanesCabecera no encontrado'], JsonResponse::HTTP_NOT_FOUND);
            }
            $plaPlanesProceso->setPlaPlanesCabecera($plaPlanesCabecera);

            $plaConfTipoPlanes = $entityManager->getRepository(PlaConfTipoPlanes::class)->find($plaPlanesCabecera->getPlaConfPlanes()->getId());
            $plaPlanesProceso->setPlaConfTipoPlanes($plaConfTipoPlanes);

            $siafMoneda = $entityManager->getRepository(SiafMoneda::class)->find($data['siaf_moneda']);
            if (!$siafMoneda) {
                return new JsonResponse(['error' => 'siafMoneda no encontrado'], JsonResponse::HTTP_NOT_FOUND);
            }
            $plaPlanesProceso->setSiafMoneda($siafMoneda);
            
            $plaPlanesProceso->setNroLinea(0); // harcodeado - no esta campo en formu agregar proceso
            $plaPlanesProceso->setDescripcion($data['descripcion']);
            $plaPlanesProceso->setNombre($data['nombre']);
            $plaPlanesProceso->setIdentificacion($data['identificacion']);
            $plaPlanesProceso->setEsPlurianual($data['es_plurianual']);
            $plaPlanesProceso->setEsMonedaExtranjera($data['es_moneda_extranjera']);
            $plaPlanesProceso->setEstaPresupuestado($data['esta_presupuestado']);
            $plaPlanesProceso->setTipoTasa([]); // harcodeado, falta dato
            $plaPlanesProceso->setTasaConversion(0); // harcodeado, falta dato
            $plaPlanesProceso->setImporteTotal(0);
            $plaPlanesProceso->setImporteTotalOrig(0);
            $plaPlanesProceso->setImporteEjercicio(0);
            $plaPlanesProceso->setImporteEjercicioOrig(0);
            $plaPlanesProceso->setImporteAnteriorOrig(0);
            $plaPlanesProceso->setImporteProximoEjercicioOrig(0);
            $plaPlanesProceso->setExpedienteImpulso($data['expediente_impulso']);
            $plaPlanesProceso->setTipoRegistro([]); // harcodeado, falta dato
            $plaPlanesProceso->setReferenciaLineaProceso($data['referencia_linea_proceso']);



            $entityManager->persist($plaPlanesProceso);
            $entityManager->flush();

            $procesos = $entityManager->getRepository(PlaPlanesProcesos::class)->findAll();
            $data = array_map(function ($d) {
                return [
                    'id' => $d->getId(),
                    'concepto' => $d->getNombre(), // estimo que sera Concepto
                    'identificacion_proceso' => $d->getIdentificacion(),
                    'descripcion' => $d->getDescripcion(),
                    //'monto_anual' => 100, // no se cual es en la tabla
                ];
            }, $procesos);
            
            return new JsonResponse(['data' => $data], JsonResponse::HTTP_OK);
        /* }  */
        
        return new JsonResponse(['errors' => 'mensaje error'], 500);

            /* return $this->redirectToRoute('app_pla_planes_procesos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_procesos/new.html.twig', [
            'pla_planes_proceso' => $plaPlanesProceso,
            'form' => $form,
        ]); */
    }

    #[Route('/{id}', name: 'app_pla_planes_procesos_show', methods: ['GET'])]
    public function show(PlaPlanesProcesos $plaPlanesProceso): Response
    {
        return $this->render('pla_planes_procesos/show.html.twig', [
            'pla_planes_proceso' => $plaPlanesProceso,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pla_planes_procesos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlaPlanesProcesos $plaPlanesProceso, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaPlanesProcesosType::class, $plaPlanesProceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pla_planes_procesos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_procesos/edit.html.twig', [
            'pla_planes_proceso' => $plaPlanesProceso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pla_planes_procesos_delete', methods: ['POST'])]
    public function delete(Request $request, PlaPlanesProcesos $plaPlanesProceso, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plaPlanesProceso->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plaPlanesProceso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pla_planes_procesos_index', [], Response::HTTP_SEE_OTHER);
    }
}
