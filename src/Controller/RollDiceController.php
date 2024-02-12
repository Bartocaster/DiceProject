<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $amountOfDice = $request->query->getInt('amountOfDice', 1);
        $diceResults = [];
        for ($i = 0; $i < $amountOfDice; $i++) {
            $diceResults[] = rand(1, 6);
        }
        $dice = implode(', ', $diceResults); // Combine the dice results into a string
    
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '6 SideDice',
            'dice' => $dice,
            'amountOfDice' => $amountOfDice, // Pass numDice to the template
        ]);
    }

    
    #[Route('/D8', name: 'roll_dice_D8')]
    public function rollD8(Request $request): Response
    {
        $amountOfDice = $request->query->getInt('amountOfDice', 1);
        
        $diceResults = [];
        $total = 0; 
        
        for ($i = 0; $i < $amountOfDice; $i++) {
            $result = rand(1, 8);
            $diceResults[] = $result;
            $total += $result;
        }
        $dice = implode(', + ', $diceResults); // Combine the dice results into a string
        // not sure wy i cannot add 2 vaulue in the JsonResponse having them combined soves the issue
        $combine = $dice . ' = ' . $total;
        return new JsonResponse([
            'dice' => $combine,
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
