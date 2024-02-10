<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RollDiceController extends AbstractController
{
    #[Route('/D6', name: 'roll_dice_D6')]
    public function index(): Response
    {
        // $diceNumber = rand(1,6);
        function rollDice(){
            $diceNumber = rand(1,6); 
    
            return $diceNumber;
        }

        $rollDice = rollDice();
        

        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => 'RollDiceController',
            'dice' => $rollDice,
        ]);
    }

    

   
}
