<?php

namespace App\Controller;

use App\Entity\ContentManagementSystem;
use App\Entity\DesignPattern;
use App\Entity\Framework;
use App\Entity\Language;
use App\Entity\Librairie;
use App\Entity\Method;
use App\Entity\Software;
use App\Form\ContentManagementSystemType;
use App\Form\DesignPatternType;
use App\Form\FrameworkType;
use App\Form\LanguageType;
use App\Form\LibrairieType;
use App\Form\MethodType;
use App\Form\SoftwareType;
use App\Repository\ContentManagementSystemRepository;
use App\Repository\DesignPatternRepository;
use App\Repository\FrameworkRepository;
use App\Repository\LanguageRepository;
use App\Repository\LibrairieRepository;
use App\Repository\MethodRepository;
use App\Repository\SoftwareRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          LanguageRepository $languageRepository,
                          LibrairieRepository $librairieRepository,
                          FrameworkRepository $frameworkRepository,
                          DesignPatternRepository $designPatternRepository,
                          SoftwareRepository $softwareRepository,
                          MethodRepository $methodRepository,
                          ContentManagementSystemRepository $contentManagementSystemRepository): Response
    {
        $language = new Language();
        $formLanguage = $this->createForm(LanguageType::class, $language);
        $formLanguage->handleRequest($request);
        if ($formLanguage->isSubmitted() && $formLanguage->isValid()) {
            $entityManager->persist($language);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $librairie = new Librairie();
        $formLibrairie = $this->createForm(LibrairieType::class, $librairie);
        $formLibrairie->handleRequest($request);
        if ($formLibrairie->isSubmitted() && $formLibrairie->isValid()) {
            $entityManager->persist($librairie);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $framework = new Framework();
        $formFramework = $this->createForm(FrameworkType::class, $framework);
        $formFramework->handleRequest($request);
        if ($formFramework->isSubmitted() && $formFramework->isValid()) {
            $entityManager->persist($framework);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $designPattern = new DesignPattern();
        $formDesignPattern = $this->createForm(DesignPatternType::class, $designPattern);
        $formDesignPattern->handleRequest($request);
        if ($formDesignPattern->isSubmitted() && $formDesignPattern->isValid()) {
            $entityManager->persist($designPattern);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $software = new Software();
        $formSoftware = $this->createForm(SoftwareType::class, $software);
        $formSoftware->handleRequest($request);
        if ($formSoftware->isSubmitted() && $formSoftware->isValid()) {
            $entityManager->persist($software);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $method = new Method();
        $formMethod = $this->createForm(MethodType::class, $method);
        $formMethod->handleRequest($request);
        if ($formMethod->isSubmitted() && $formMethod->isValid()) {
            $entityManager->persist($method);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        $contentManagementSystem = new ContentManagementSystem();
        $formCMS = $this->createForm(ContentManagementSystemType::class, $contentManagementSystem);
        $formCMS->handleRequest($request);
        if ($formCMS->isSubmitted() && $formCMS->isValid()) {
            $entityManager->persist($contentManagementSystem);
            $entityManager->flush();
            $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/index.html.twig', [
            'languages' => $languageRepository->findAll(),
            'librairies' => $librairieRepository->findAll(),
            'frameworks' => $frameworkRepository->findAll(),
            'designPatterns' => $designPatternRepository->findAll(),
            'softwares' => $softwareRepository->findAll(),
            'methods' => $methodRepository->findAll(),
            'contentManagementSystems' => $contentManagementSystemRepository->findAll(),
            'formLanguage' => $formLanguage->createView(),
            'formLibrairie' => $formLibrairie->createView(),
            'formFramework' => $formFramework->createView(),
            'formDesignPattern' => $formDesignPattern->createView(),
            'formSoftware' => $formSoftware->createView(),
            'formMethod' => $formMethod->createView(),
            'formCMS' => $formCMS->createView(),
        ]);

    }

    /**
     * @Route("/edit/language/{id}", methods={"GET", "POST"}, name="edit_language")
     * @return Response
     */

    public function editLanguage(Request $request,
                                 int $id,
                                 LanguageRepository $languageRepository): Response
    {
        $language = $languageRepository->findOneBy(['id' => $id]);

        $formEditLanguage = $this->createForm(LanguageType::class, $language);
        $formEditLanguage->handleRequest($request);
        if ($formEditLanguage->isSubmitted() && $formEditLanguage->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditLanguage->createView(),
        ]);

    }

    /**
     * @Route("/edit/librairie/{id}", methods={"GET", "POST"}, name="edit_librairie")
     * @return Response
     */

    public function editLibrairie(Request $request,
                                 int $id,
                                 LibrairieRepository $librairieRepository): Response
    {
        $librairie = $librairieRepository->findOneBy(['id' => $id]);

        $formEditLibrairie = $this->createForm(LibrairieType::class, $librairie);
        $formEditLibrairie->handleRequest($request);
        if ($formEditLibrairie->isSubmitted() && $formEditLibrairie->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditLibrairie->createView(),
        ]);

    }

    /**
     * @Route("/edit/framework/{id}", methods={"GET", "POST"}, name="edit_framework")
     * @return Response
     */

    public function editFramework(Request $request,
                                  int $id,
                                  FrameworkRepository $frameworkRepository): Response
    {
        $framework = $frameworkRepository->findOneBy(['id' => $id]);

        $formEditFramework = $this->createForm(FrameworkType::class, $framework);
        $formEditFramework->handleRequest($request);
        if ($formEditFramework->isSubmitted() && $formEditFramework->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditFramework->createView(),
        ]);

    }

    /**
     * @Route("/edit/designPattern/{id}", methods={"GET", "POST"}, name="edit_designPattern")
     * @return Response
     */

    public function editDesignPattern(Request $request,
                                  int $id,
                                  DesignPatternRepository $designPatternRepository): Response
    {
        $designPattern = $designPatternRepository->findOneBy(['id' => $id]);

        $formEditDesignPattern = $this->createForm(DesignPatternType::class, $designPattern);
        $formEditDesignPattern->handleRequest($request);
        if ($formEditDesignPattern->isSubmitted() && $formEditDesignPattern->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditDesignPattern->createView(),
        ]);

    }

    /**
     * @Route("/edit/software/{id}", methods={"GET", "POST"}, name="edit_software")
     * @return Response
     */

    public function editSoftware(Request $request,
                                      int $id,
                                      SoftwareRepository $softwareRepository): Response
    {
        $software = $softwareRepository->findOneBy(['id' => $id]);

        $formEditSoftware = $this->createForm(SoftwareType::class, $software);
        $formEditSoftware->handleRequest($request);
        if ($formEditSoftware->isSubmitted() && $formEditSoftware->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditSoftware->createView(),
        ]);

    }

    /**
     * @Route("/edit/method/{id}", methods={"GET", "POST"}, name="edit_method")
     * @return Response
     */

    public function editMethod(Request $request,
                                 int $id,
                                 MethodRepository $methodRepository): Response
    {
        $method = $methodRepository->findOneBy(['id' => $id]);

        $formEditMethod = $this->createForm(MethodType::class, $method);
        $formEditMethod->handleRequest($request);
        if ($formEditMethod->isSubmitted() && $formEditMethod->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditMethod->createView(),
        ]);

    }

    /**
     * @Route("/edit/cms/{id}", methods={"GET", "POST"}, name="edit_cms")
     * @return Response
     */

    public function editContentManagementSystem(Request $request,
                               int $id,
                               ContentManagementSystemRepository $contentManagementSystemRepository): Response
    {
        $contentManagementSystem = $contentManagementSystemRepository->findOneBy(['id' => $id]);

        $formEditCMS = $this->createForm(ContentManagementSystemType::class, $contentManagementSystem);
        $formEditCMS->handleRequest($request);
        if ($formEditCMS->isSubmitted() && $formEditCMS->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_index', [
            ]);
        }

        return $this->render('component/_edit.html.twig', [
            'form' => $formEditCMS->createView(),
        ]);
    }

    /**
     * @Route("/language/{id}", name="delete_language", methods={"DELETE"})
     */
    public function deleteLanguage(
        Request $request,
        Language $language
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $language->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($language);
            $entityManager->flush();
            return $this->redirectToRoute('admin_index');
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/librairie/{id}", name="delete_librairie", methods={"DELETE"})
     */
    public function deleteLibrairie(
        Request $request,
        Librairie $librairie
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $librairie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($librairie);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/framework/{id}", name="delete_framework", methods={"DELETE"})
     */
    public function deleteFramework(
        Request $request,
        Framework $framework
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $framework->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($framework);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/designPattern/{id}", name="delete_designPattern", methods={"DELETE"})
     */
    public function deleteDesignPattern(
        Request $request,
        DesignPattern $designPattern
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $designPattern->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($designPattern);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/software/{id}", name="delete_software", methods={"DELETE"})
     */
    public function deleteSoftware(
        Request $request,
        Software $software
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $software->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($software);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/method/{id}", name="delete_method", methods={"DELETE"})
     */
    public function deleteMethod(
        Request $request,
        Method $method
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $method->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($method);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }

    /**
     * @Route("/delete/cms/{id}", name="delete_cms", methods={"DELETE"})
     */
    public function deleteContentManagementSystem(
        Request $request,
        ContentManagementSystem $contentManagementSystem
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contentManagementSystem->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contentManagementSystem);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_index');
    }
}
