<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RollDiceController extends AbstractController
{
    #[Route('/D6', name: 'roll_dice_D6')]
    public function rollD6(): Response
    {
        $D6 = rand(1, 6);
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '6 SideDice',
            'dice' => $D6,
        ]);
    }
    
    #[Route('/D8', name: 'roll_dice_D8')]
    public function rollD8(): Response
    {
        $D8 = rand(1, 8);
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '8 SideDice',
            'dice' => $D8,
        ]);
    }
    
    #[Route('/D20', name: 'roll_dice_D20')]
    public function rollD20(): Response
    {
        $D20 = rand(1, 20);
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '20 SideDice',
            'dice' => $D20,
        ]);
    }
    public function index2(): Response
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
