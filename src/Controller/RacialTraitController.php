<?php

namespace App\Controller;

use App\Entity\RacialTrait;
use App\Form\RacialTraitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/racial/trait')]
class RacialTraitController extends AbstractController
{
    #[Route('/', name: 'app_racial_trait_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $racialTraits = $entityManager
            ->getRepository(RacialTrait::class)
            ->findAll();

        return $this->render('racial_trait/index.html.twig', [
            'racial_traits' => $racialTraits,
        ]);
    }

    #[Route('/new', name: 'app_racial_trait_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $racialTrait = new RacialTrait();
        $form = $this->createForm(RacialTraitType::class, $racialTrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($racialTrait);
            $entityManager->flush();

            return $this->redirectToRoute('app_racial_trait_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('racial_trait/new.html.twig', [
            'racial_trait' => $racialTrait,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_racial_trait_show', methods: ['GET'])]
    public function show(RacialTrait $racialTrait): Response
    {
        return $this->render('racial_trait/show.html.twig', [
            'racial_trait' => $racialTrait,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_racial_trait_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RacialTrait $racialTrait, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RacialTraitType::class, $racialTrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_racial_trait_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('racial_trait/edit.html.twig', [
            'racial_trait' => $racialTrait,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_racial_trait_delete', methods: ['POST'])]
    public function delete(Request $request, RacialTrait $racialTrait, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$racialTrait->getId(), $request->request->get('_token'))) {
            $entityManager->remove($racialTrait);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_racial_trait_index', [], Response::HTTP_SEE_OTHER);
    }
}
