<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\LanguageRepository;
use App\Repository\PictureRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/portfolio", name="portfolio_")
 *
 */

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProjectRepository $projectRepository): Response
    {


        return $this->render('portfolio/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/project/{id}", name="project", methods={"GET", "POST"})
     */
    public function project(Project $project, PictureRepository $pictureRepository): Response
    {

        return $this->render('portfolio/_project.html.twig', [
            'project' => $project,
        ]);
    }

}
