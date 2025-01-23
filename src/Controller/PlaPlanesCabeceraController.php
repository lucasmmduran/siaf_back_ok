<?php

namespace App\Controller;

use App\Entity\PlaPlanesCabecera;
use App\Form\PlaPlanesCabeceraType;
use App\Repository\PlaPlanesCabeceraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/pla/planes/cabecera')]
final class PlaPlanesCabeceraController extends AbstractController
{
    #[Route(name: 'app_pla_planes_cabecera_index', methods: ['GET'])]
    public function index(PlaPlanesCabeceraRepository $plaPlanesCabeceraRepository): JsonResponse
    {
        $plans = $plaPlanesCabeceraRepository->findAll();
        return new JsonResponse(['data' => $plans], JsonResponse::HTTP_OK);

        /* return $this->render('pla_planes_cabecera/index.html.twig', [
            'pla_planes_cabeceras' => $plaPlanesCabeceraRepository->findAll(),
        ]); */
    }

    #[Route('/new', name: 'app_pla_planes_cabecera_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, PlaPlanesCabeceraRepository $plaPlanesCabeceraRepository): Response
    {
        $plaPlanesCabecera = new PlaPlanesCabecera();
        $form = $this->createForm(PlaPlanesCabeceraType::class, $plaPlanesCabecera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($plaPlanesCabecera);
                $entityManager->flush();
                $plans = $plaPlanesCabeceraRepository->findAll();
                return new JsonResponse(['data' => $plans], JsonResponse::HTTP_OK);
            } catch (\Exception $e) {
                return new JsonResponse(['error' => 'Ocurrió un error al guardar el plan'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
            //return $this->redirectToRoute('app_pla_planes_cabecera_index', [], Response::HTTP_SEE_OTHER);
        } else {
            $errors = [];
            foreach ($form->getErrors(true) as $error) {
                $errors[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST);
        }

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
