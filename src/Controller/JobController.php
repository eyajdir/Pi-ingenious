<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * @Route("/job", name="job")
     */
    public function index( OffreRepository  $offreRepository): Response
    {
        return $this->render('offrefront/addoffre.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }
}
