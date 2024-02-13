<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class RollDiceController extends AbstractController
{  
    #[Route('/Dice', name: 'roll_dice')]
    public function rollDice(Request $request): Response
    {
        $amountOfDice = $request->query->getInt('amountOfDice', 1);
        $countsJson = $request->query->get('counts');
        $dNumDice = json_decode($countsJson, true);

        $diceResults = [];
        $total = 0; 
        
        for ($i = 0; $i < $amountOfDice; $i++) {
            $result = rand(1, 8); // results are imported.
            $diceResults[] = $result;
            $total += $result;
        }
        
        $dice = implode(' + ', $diceResults); // Combine the dice results into a string
        // not sure wy I cannot add 2 vaulue in the JsonResponse having them combined soves the issue of sending with ajax.
        $combine = $dice . ' = ' . $total;
        if (count($diceResults) === 1 ) {
            return new JsonResponse([
                'dice' => $dice,
                'choseDice' => $dNumDice,
            ]);
        } else {  
            return new JsonResponse([
                'dice' => $combine,
                'results' => $diceResults,
                'choseDice' => $dNumDice,
            ]);
        }

    }
    
    #[Route('/D26', name: 'roll_dice_D6')]
    public function rollD6(): Response
    {
        $D6 = rand(1, 6);
        return $this->render('roll_dice/index.html.twig', [
            'controller_name' => '6 SideDice',
            'dice' => $D6,
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
    
}
