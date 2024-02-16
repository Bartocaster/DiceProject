<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvantagedDisadvantageController extends AbstractController
{
    #[Route('/adv_Dis', name: 'AdvantagedAndDisadvantage')]
    public function index(): Response
    {
        return $this->render('advantaged_disadvantage/index.html.twig', [
            'controller_name' => 'Advantaged & Disadvantage',
        ]);
    }
}
