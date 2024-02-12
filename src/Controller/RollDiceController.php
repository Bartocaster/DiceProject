<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RollDiceController extends AbstractController
{
    #[Route('/D4', name: 'roll_dice_D4')]
    public function rollD4(Request $request): Response
    {
        $D4 = rand(1, 4);
        return new JsonResponse(['dice' => $D4]);
    }
    #[Route('/D6', name: 'roll_dice_D6')]
    public function rollD6(Request $request): Response
    {
        $numDice = $request->query->getInt('numDice', 1);
        $diceResults = [];
        for ($i = 0; $i < $numDice; $i++) {
            $diceResults[] = rand(1, 6);
        }
        $dice = implode(', ', $diceResults); // Combine the dice results into a string
    
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '6 SideDice',
            'dice' => $dice,
            'numDice' => $numDice, // Pass numDice to the template
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
