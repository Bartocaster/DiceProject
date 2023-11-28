<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RollDiceController extends AbstractController
{
    #[Route('/dice', name: 'rollDice')]
    public function index(): Response
    {
        $diceNumber = rand(1,6);

        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => 'RollDiceController',
            'dice' => $diceNumber,
        ]);
    }
}
