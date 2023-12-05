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
        // $diceNumber = rand(1,6);
        function rollDice(){
            $diceNumber = rand(1,6); 
    
            return $diceNumber;
        }

        $rollDice = rollDice();
        $coolname = "or DND group is awesome";

        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => 'RollDiceController',
            'dice' => $rollDice,
            'coolname' => $coolname,
        ]);
    }

   
}
