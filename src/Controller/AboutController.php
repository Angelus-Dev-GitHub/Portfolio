<?php

namespace App\Controller;

use App\Repository\ContentManagementSystemRepository;
use App\Repository\DesignPatternRepository;
use App\Repository\FrameworkRepository;
use App\Repository\LanguageRepository;
use App\Repository\LibrairieRepository;
use App\Repository\MethodRepository;
use App\Repository\PictureRepository;
use App\Repository\SoftwareRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    public function index(UserRepository $userRepository,
                          LanguageRepository $languageRepository,
                          LibrairieRepository $librairieRepository,
                          FrameworkRepository $frameworkRepository,
                          DesignPatternRepository $designPatternRepository,
                          SoftwareRepository $softwareRepository,
                          MethodRepository $methodRepository,
                          ContentManagementSystemRepository $contentManagementSystemRepository,
                          PictureRepository $pictureRepository): Response
    {
        $user = $userRepository->findOneBy(['lastname' => 'DUFOSSE']);

        $cv = $pictureRepository->findOneBy(['name' => 'Thierry_DUFOSSE_CV_DeveloppeurWeb.pdf']);


        return $this->render('about/index.html.twig', [
            'user' => $user,
            'cv' => $cv,
            'languages' => $languageRepository->findAll(),
            'librairies' => $librairieRepository->findAll(),
            'frameworks' => $frameworkRepository->findAll(),
            'designPatterns' => $designPatternRepository->findAll(),
            'softwares' => $softwareRepository->findAll(),
            'methods' => $methodRepository->findAll(),
            'contentManagementSystems' => $contentManagementSystemRepository->findAll(),

        ]);
    }
}
