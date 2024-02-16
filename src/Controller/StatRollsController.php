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
    private $rollDiceController;

    public function __construct(RollDiceController $rollDiceController)
    {
        $this->rollDiceController = $rollDiceController;
    }

    #[Route('/stat', name: 'stat_roll')]
    public function statRoll(Request $request): Response
    {
        $countsJson = $request->query->get('counts');
        $dNumDice = json_decode($countsJson, true);
  
        $dice = $this->subtract1D6($dNumDice);


        return new JsonResponse([
            'dice' => $dice,
            // 'total' => $total,
            'test' => $dNumDice,

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
                $total += array_sum(array_slice($diceRolls, 1)); // Sum the remaining three rolls
                $individualRolls[] = "4D6 (" . implode(' + ', $diceRolls) . " = " . ($total - $lowestRoll) . " ( $lowestRoll Subtracted ) ";
            } else {
                $total += array_sum($diceRolls);
                $individualRolls[] = "$count$diceType (" . implode(' + ', $diceRolls) . " = " . array_sum($diceRolls) . ")";
            }
            $diceResults = array_merge($diceResults, $diceRolls);
        }
        $dice = implode(' + ', $individualRolls);
        return $dice;
    }

    #[Route('/statRolls', name: 'stat_rolls')]
    public function index(): Response
    {
        return $this->render('stat_rolls/index.html.twig', [
            'controller_name' => 'Charachter Stat Rolls',
        ]);
    }
}
