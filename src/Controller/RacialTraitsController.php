<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RacialTraitsController extends AbstractController
{
    #[Route('/traits', name: 'racial_traits')]
    public function index(): Response
    {
        return $this->render('racial_traits/index.html.twig', [
            'controller_name' => 'RacialTraitsController',
        ]);
    }
}
