<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/listbackend", name="blog_index_backend", methods={"GET"})
     */
    public function indexbackend(BlogRepository $blogRepository): Response
    {
        return $this->render('backend/blog/index.html.twig', [
            'blogs' => $blogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newbackend", name="blog_new_backend", methods={"GET","POST"})
     */
    public function newbackend(Request $request): Response
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('blog')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $blog->setImage('uploads/' . $filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blog);
            $entityManager->flush();

            return $this->redirectToRoute('blog_index_backend');
        }

        return $this->render('backend/blog/new.html.twig', [
            'blog' => $blog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/backend{id}", name="blog_show_backend", methods={"GET"})
     */
    public function showbackend(Blog $blog): Response
    {
        return $this->render('backend/blog/show.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/{id}/editbackend", name="blog_edit_backend", methods={"GET","POST"})
     */
      public function editbackend(BlogRepository $blogr ,Request $request, Blog $blog,$id): Response
      {
          $form = $this->createForm(BlogType::class, $blog);
          $form->handleRequest($request);
          $user = $blogr->find($id);
          if ($form->isSubmitted() && $form->isValid()) {
              $user = $blog->find($id);
              if ($form->isSubmitted() && $form->isValid()) {
                  $file = $request->files->get('blog')['image'];
                  $uploads_directory = $this->getParameter('uploads_directory');
                  $filename = md5(uniqid()) . '.' . $file->guessExtension();
                  $file->move(
                      $uploads_directory,
                      $filename
                  );
                  $user->setImage('uploads/' . $filename);
                  $this->getDoctrine()->getManager()->flush();

                  return $this->redirectToRoute('blog_index_backend');
              }
          }
      }

    /**
     * @Route("/backend{id}", name="blog_delete_backend", methods={"DELETE"})
     */
    public function deletebackend(Request $request, Blog $blog): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blog->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blog);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blog_index_backend');
    }
    /**
     * @Route("/list", name="blog_index", methods={"GET"})
     */
    public function index(BlogRepository $blogRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'blogs' => $blogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="blog_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('blog')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $blog->setImage('uploads/' . $filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blog);
            $entityManager->flush();

            return $this->redirectToRoute('blog_index');
        }

        return $this->render('blog/new.html.twig', [
            'blog' => $blog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_show", methods={"GET"})
     */
    public function show(Blog $blog): Response
    {
        return $this->render('blog/show.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blog_edit", methods={"GET","POST"})
     */
    public function edit(BlogRepository $blogr ,Request $request, Blog $blog,$id): Response
    {
        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request);
        $user=$blogr->find($id);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $blog->find($id);
            if ($form->isSubmitted() && $form->isValid()) {
                $file = $request->files->get('blog')['image'];
                $uploads_directory = $this->getParameter('uploads_directory');
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $uploads_directory,
                    $filename
                );
                $user->setImage('uploads/' . $filename);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('blog_index');
            }
        }

        return $this->render('blog/edit.html.twig', [
            'blog' => $blog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Blog $blog): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blog->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blog);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blog_index');
    }
}
