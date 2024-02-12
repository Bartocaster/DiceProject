<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TableRollController extends AbstractController
{
    #[Route('/table', name: 'table')]
    public function index(): Response
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableRollController',
        ]);
    }
    #[Route('/D4', name: 'roll_dice_D4')]
    public function rollD4(Request $request): Response
    {
        $D4 = rand(1, 4);
        return new JsonResponse(['dice' => $D4]);
    }
}
