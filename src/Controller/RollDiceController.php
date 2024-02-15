<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;

class RollDiceController extends AbstractController
{   

    #[Route('/Dice', name: 'roll_dice')]
    public function rollDice(Request $request): Response
    {
        // $amountOfDice = $request->query->getInt('amountOfDice', 1);
        $countsJson = $request->query->get('counts');
        $dNumDice = json_decode($countsJson, true);
        $diceResults = [];
        $total = 0; 

        $ranNumDiceGen = $this->randNumDiceGenerator($dNumDice);
        $diceResults = $ranNumDiceGen['diceResults'];
        $total = $ranNumDiceGen['total']; 
        $individualRolls = $ranNumDiceGen['individualRolls'];

        $noDice = "No dice. You gotte choose them.";
        $dice = implode(' + ', $diceResults); // Combine the dice results into a string
        $combine = $individualRolls . ' total = ' . $total;
        if (count($diceResults) === 1 ) {
            return new JsonResponse([
                'dice' => $individualRolls,
                'choseDice' => $dNumDice,
                // 'typeOfDice' => $individualRolls,
            ]);
        } elseif (count($diceResults) === 0 ) {
            return new JsonResponse([
                'dice' => $noDice,
            ]);
        } else {   
            return new JsonResponse([
                'dice' => $combine,
                // 'results' => $diceResults,
                // 'choseDice' => $dNumDice,
                'typeOfDice' => $individualRolls,
            ]);
        }

    }

    public function randNumDiceGenerator($dNumDice)
    {
        $diceResults = [];
        $total = 0;
        $individualRolls = [];
    
        // Iterate over each dice type in the $dNumDice array
        foreach ($dNumDice as $diceType => $count) {
            // Skip dice types with a count of 0
            if ($count <= 0) {
                continue;
            }
            $diceTotal = 0;
            $diceRolls = [];
            // Roll the dice $count times and add the results to $diceResults
            for ($i = 0; $i < $count; $i++) {
                // Generate a random number based on the dice type
                switch ($diceType) {
                    case 'D4':
                        $result = rand(1, 4);
                        break;
                    case 'D6':
                        $result = rand(1, 6);
                        break;
                    case 'D8':
                        $result = rand(1, 8);
                        break;
                    case 'D10':
                        $result = rand(1, 10);
                        break;
                    case 'D12':
                        $result = rand(1, 12);
                        break;
                    case 'D20':
                        $result = rand(1, 20);
                        break;
                    case 'D100':
                        $result = rand(1, 100);
                        break;
                    default:
                        $result = 0; // Invalid die type
                }
                // Add the result to the total and store it in $diceResults
                $total += $result;
                $diceResults[] = $result;
                $diceTotal += $result;
                $diceRolls[] = $result;
            }
            $individualRolls[] = "$count$diceType (" . implode(' + ', $diceRolls) . " = $diceTotal)";
        }
    
        // Return an array containing the individual dice rolls and the total
        return ['diceResults' => $diceResults, 'total' => $total, 'individualRolls' => implode(' + ', $individualRolls)];
    }


    #[Route('/D6', name: 'roll_dice_D6')]
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
