<?php

namespace App\Controller;

use App\Entity\Categorieoffre;
use App\Form\CategorieoffreType;
use App\Repository\CategorieoffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorieoffre")
 */
class CategorieoffreController extends AbstractController
{
    /**
     * @Route("/", name="categorieoffre_index", methods={"GET"})
     */
    public function index(CategorieoffreRepository $categorieoffreRepository): Response
    {
        return $this->render('admin/categorieoffre/index.html.twig', [
            'categorieoffres' => $categorieoffreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorieoffre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categorieoffre = new Categorieoffre();
        $form = $this->createForm(CategorieoffreType::class, $categorieoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $uploadedFile = $form['logo']->getData();
            $filename = md5(uniqid()).'.'.$uploadedFile->guessExtension();
            $uploadedFile->move($this->getParameter('upload_directory'),$filename);
            $categorieoffre->setLogo($filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorieoffre);
            $entityManager->flush();

            return $this->redirectToRoute('categorieoffre_index');
        }

        return $this->render('/admin/categorieoffre/new.html.twig', [
            'categorieoffre' => $categorieoffre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorieoffre_show", methods={"GET"})
     */
    public function show(Categorieoffre $categorieoffre): Response
    {
        return $this->render('categorieoffre/show.html.twig', [
            'categorieoffre' => $categorieoffre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorieoffre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Categorieoffre $categorieoffre): Response
    {
        $form = $this->createForm(CategorieoffreType::class, $categorieoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieoffre_index');
        }

        return $this->render('/admin/categorieoffre/edit.html.twig', [
            'categorieoffre' => $categorieoffre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorieoffre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categorieoffre $categorieoffre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieoffre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorieoffre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin/categorieoffre_index');
    }

}