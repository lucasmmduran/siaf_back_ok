<?php

namespace App\Controller;

use App\Entity\PlaPlanesPartidas;
use App\Form\PlaPlanesPartidasType;
use App\Repository\PlaPlanesPartidasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pla/planes/partidas')]
final class PlaPlanesPartidasController extends AbstractController
{
    #[Route(name: 'app_pla_planes_partidas_index', methods: ['GET'])]
    public function index(PlaPlanesPartidasRepository $plaPlanesPartidasRepository): Response
    {
        return $this->render('pla_planes_partidas/index.html.twig', [
            'pla_planes_partidas' => $plaPlanesPartidasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pla_planes_partidas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plaPlanesPartida = new PlaPlanesPartidas();
        $form = $this->createForm(PlaPlanesPartidasType::class, $plaPlanesPartida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plaPlanesPartida);
            $entityManager->flush();

            return $this->redirectToRoute('app_pla_planes_partidas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_partidas/new.html.twig', [
            'pla_planes_partida' => $plaPlanesPartida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pla_planes_partidas_show', methods: ['GET'])]
    public function show(PlaPlanesPartidas $plaPlanesPartida): Response
    {
        return $this->render('pla_planes_partidas/show.html.twig', [
            'pla_planes_partida' => $plaPlanesPartida,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pla_planes_partidas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlaPlanesPartidas $plaPlanesPartida, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaPlanesPartidasType::class, $plaPlanesPartida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pla_planes_partidas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pla_planes_partidas/edit.html.twig', [
            'pla_planes_partida' => $plaPlanesPartida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pla_planes_partidas_delete', methods: ['POST'])]
    public function delete(Request $request, PlaPlanesPartidas $plaPlanesPartida, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plaPlanesPartida->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plaPlanesPartida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pla_planes_partidas_index', [], Response::HTTP_SEE_OTHER);
    }
}
