<?php

namespace App\Controller;

use App\Entity\PlaPlanesProcesos;
use App\Form\PlaPlanesProcesosType;
use App\Repository\PlaPlanesProcesosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pla/planes/procesos')]
final class PlaPlanesProcesosController extends AbstractController
{
    #[Route(name: 'app_pla_planes_procesos_index', methods: ['GET'])]
    public function index(PlaPlanesProcesosRepository $plaPlanesProcesosRepository): Response
    {
        return $this->render('pla_planes_procesos/index.html.twig', [
            'pla_planes_procesos' => $plaPlanesProcesosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pla_planes_procesos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plaPlanesProceso = new PlaPlanesProcesos();
        $form = $this->createForm(PlaPlanesProcesosType::class, $plaPlanesProceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plaPlanesProceso);
            $entityManager->flush();

            return $this->redirectToRoute('app_pla_planes_procesos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_procesos/new.html.twig', [
            'pla_planes_proceso' => $plaPlanesProceso,
            'form' => $form,
        ]);
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
