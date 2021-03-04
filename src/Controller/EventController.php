<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/event")
 */
class EventController extends AbstractController
{
    /**
     * @Route("/listbackend", name="event_index_backend", methods={"GET"})
     */
    public function indexbackend(EventRepository $eventRepository): Response
    {
        return $this->render('backend/event/index.html.twig', [
            'events' => $eventRepository->findAll(),
        ]);
    }
    /**
     * @Route("/newbackend", name="event_new_backend", methods={"GET","POST"})
     */
    public function newbackend(Request $request): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('event')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $event->setImage('uploads/' . $filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('event_index_backend');
        }

        return $this->render('backend/event/new.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/backend", name="event_show_backend", methods={"GET"})
     */
    public function showbackend(Event $event): Response
    {
        return $this->render('backend/event/show.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/{id}/editbackend", name="event_edit_backend", methods={"GET","POST"})
     */
    public function editbackend(EventRepository $eventr,Request $request2, Event $event2,$id): Response
    {
        $form = $this->createForm(EventType::class, $event2);
        $form->handleRequest($request2);
        $user=$eventr->find($id);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request2->files->get('event')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $user->setImage('uploads/' . $filename);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_index_backend');
        }

        return $this->render('backend/event/edit.html.twig', [
            'event' => $event2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}dbackend", name="event_delete_backend", methods={"DELETE"})
     */
    public function deletebackend(Request $request, Event $event): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('event_index_backend');
    }

    /**
     * @Route("/list", name="event_index", methods={"GET"})
     */
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'events' => $eventRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="event_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('event')['image'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $event->setImage('uploads/' . $filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('event_index');
        }

        return $this->render('event/new.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="event_show", methods={"GET"})
     */
    public function show(Event $event): Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"})
     */
    public function edit(EventRepository $eventr ,Request $request, Event $event, $id): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
$user=$eventr->find($id);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('event')['image'];
                $uploads_directory = $this->getParameter('uploads_directory');
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $uploads_directory,
                    $filename
                );
                $user->setImage('uploads/' . $filename);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_index');
        }

        return $this->render('event/edit.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="event_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Event $event): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($event);
            $entityManager->flush();
            return $this->redirectToRoute('event_index');

        }


    }
}
