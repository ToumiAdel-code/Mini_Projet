<?php

namespace App\Controller;

use App\Entity\Etudiantt;
use App\Form\EtudianttType;
use App\Repository\EtudianttRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/etudiantt')]
final class EtudianttController extends AbstractController
{
    #[Route(name: 'app_etudiantt_index', methods: ['GET'])]
    public function index(EtudianttRepository $etudianttRepository): Response
    {
        return $this->render('etudiantt/index.html.twig', [
            'etudiantts' => $etudianttRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etudiantt_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etudiantt = new Etudiantt();
        $form = $this->createForm(EtudianttType::class, $etudiantt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($etudiantt);
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiantt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiantt/new.html.twig', [
            'etudiantt' => $etudiantt,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiantt_show', methods: ['GET'])]
    public function show(Etudiantt $etudiantt): Response
    {
        return $this->render('etudiantt/show.html.twig', [
            'etudiantt' => $etudiantt,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etudiantt_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etudiantt $etudiantt, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtudianttType::class, $etudiantt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiantt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiantt/edit.html.twig', [
            'etudiantt' => $etudiantt,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiantt_delete', methods: ['POST'])]
    public function delete(Request $request, Etudiantt $etudiantt, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudiantt->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($etudiantt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_etudiantt_index', [], Response::HTTP_SEE_OTHER);
    }
}
