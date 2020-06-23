<?php

namespace App\Controller;

use App\Entity\Portfolio;
use App\Form\PortfolioType;
use App\Repository\PortfolioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PortfolioController extends AbstractController
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function index(PortfolioRepository $repo)
    {
        $portfolios = $repo->findAll();

        return $this->render('portfolio/index.html.twig', [
            'controller_name' => 'PortfolioController',
            'portfolios'      => $portfolios

        ]);
    }
    /**
     * @Route("/portfolio/new", name="portfolio_create")
     */
    public function form(Request $request, EntityManagerInterface $manager)
    {
        $portfolio = new Portfolio();

        $form = $this->createForm(PortfolioType::class, $portfolio);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $portfolio;

            $manager->persist($portfolio);
            $manager->flush();

            return $this->redirecttoRoute('portfolio');
        }



        return $this->render('portfolio/create.html.twig', [
            'formPortfolio' => $form->createView()
        ]);
    }

    /**
     * @Route("/portfolio/info/{id}", name="portfolio_info")
     */
    public function getInfo($id, PortfolioRepository $repo)
    {

        $portfolio = $repo->find($id);
        return $this->json($portfolio);
    }
}
