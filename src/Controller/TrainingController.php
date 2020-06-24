<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    /**
     * @Route("/mon-parcours", name="training")
     */
    public function index()
    {
        return $this->render('training/index.html.twig', [
            'controller_name' => 'TrainingController',
        ]);
    }
}
