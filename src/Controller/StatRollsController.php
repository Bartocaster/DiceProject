<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;
use App\Controller\RollDiceController;

class StatRollsController extends AbstractController
{
    

    #[Route('/stat', name: 'stat_roll')]
    public function statRoll(Request $request): Response
    {
        $countsJson = $request->query->get('counts');
        $dNumDice = json_decode($countsJson, true);
     
        $rolls = $this->subtract1D6($dNumDice);
        $dice = $rolls['dice'];
        $total = $rolls['total'];
        $modifier = $this->AbilityModifiersChart($total); 
       

        return new JsonResponse([
            'dice' => $dice,
            'total' => $total,
            'modifier' => $modifier,
            'test' => $modifier,
        ]);
    }
    
    public function subtract1D6($dNumDice)
    {
        $diceResults = [];
        $total = 0; 
        $individualRolls = [];
    
        foreach ($dNumDice as $diceType => $count) {
   
            $diceRolls = [];
            // Roll the dice $count times and add the results to $diceResults
            for ($i = 0; $i < $count; $i++) {
                // Generate a random number based on the dice type
    
                $result = rand(1, 6);
                $diceResults[] = $result;
                $diceRolls[] = $result;
            }
            // If rolling 4D6, subtract the lowest roll and add the total of the remaining three
            if ($count === 4 && $diceType === 'D6') {
                sort($diceRolls); // Sort the rolls in ascending order
                $lowestRoll = $diceRolls[0]; // Get the lowest roll
                $total += array_sum(array_slice($diceRolls, 1)); // Sum the remaining three rollsxs
                $individualRolls[] = "4D6 (" . implode(' + ', $diceRolls) . " = " . ($total - $lowestRoll) . " ( $lowestRoll Subtracted ) ";
                $total = $total - $lowestRoll;
            } else {
                $total += array_sum($diceRolls);
                $individualRolls[] = "$count$diceType (" . implode(' + ', $diceRolls) . " = " . array_sum($diceRolls) . ")";
            }
            $diceResults = array_merge($diceResults, $diceRolls);
        }
        $dice = implode(' + ', $individualRolls);
        return [ 'dice' => $dice, 'total' => $total];
    }

    public function AbilityModifiersChart($total)
    {
        $modifiers = [ 
            3 => -4,
            4 => -3,
            5 => -3,
            6 => -2,
            7 => -2,
            8 => -1,
            9 => -1,
            10 => 0,
            11 => 0,
            12 => 1,
            13 => 1,
            14 => 2,
            15 => 2,
            16 => 3,
            17 => 3,
            18 => 4,
            19 => 5,
            20 => 5,
        ];
            // $Attribute = 10;
            // $floor = floor($Attribute - 10)
            // $diveded = $floor / 2;
        //  example $modifier = floor($Attribute - 10) / 2
        // Determine the modifier and add "+" or "-"
        $modifier = $modifiers[$total] ?? null;
        if ($modifier !== null) {
            $modifier = $modifier >= 0 ? '+' . $modifier : $modifier;
        }
    
        // Return the modifier
        return $modifier ?? 'Modifier not found';
    }
    

    #[Route('/statRolls', name: 'stat_rolls')]
    public function index(): Response
    {
        return $this->render('stat_rolls/index.html.twig', [
            'controller_name' => 'Charachter Stat Rolls',
            
        ]);
    }
}
