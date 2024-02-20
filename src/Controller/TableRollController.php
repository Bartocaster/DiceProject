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
            'controller_name' => 'Table Roll',
        ]);
    }
}
