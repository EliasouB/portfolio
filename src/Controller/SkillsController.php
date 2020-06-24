<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    /**
     * @Route("/competences", name="skills")
     */
    public function index()
    {
        return $this->render('skills/index.html.twig');
    }
}
