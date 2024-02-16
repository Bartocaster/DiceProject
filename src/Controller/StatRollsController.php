<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatRollsController extends AbstractController
{
    #[Route('/statRolls', name: 'stat_rolls')]
    public function index(): Response
    {
        return $this->render('stat_rolls/index.html.twig', [
            'controller_name' => 'Charachter Stat Rolls',
        ]);
    }
}
