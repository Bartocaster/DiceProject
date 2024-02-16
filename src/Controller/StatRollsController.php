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
        // $amountOfDice = $request->query->getInt('amountOfDice', 1);
        $countsJson = $request->query->get('counts');
        $dNumDice = json_decode($countsJson, true);
        $diceResults = [];
        $total = 0; 
        
        $ranNumDiceGen = $this->rollDiceController->randNumDiceGenerator($dNumDice);
        
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
   

    #[Route('/statRolls', name: 'stat_rolls')]
    public function index(): Response
    {
        return $this->render('stat_rolls/index.html.twig', [
            'controller_name' => 'Charachter Stat Rolls',
        ]);
    }
}
