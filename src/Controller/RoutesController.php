<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\User;
use App\Form\OffreType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoutesController extends AbstractController
{
    /**
     * @Route("/", name="routes")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }

    /**
     * @Route("/accordion", name="accordion")
     */
    public function accordion(): Response
    {
        return $this->render('main_pages/accordion.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/browsecompany", name="browsecompany")
     */
    public function browsecompany(): Response
    {
        return $this->render('offrefront/browse-company.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/browse-jobs", name="browse-jobs")
     */
    public function browse_jobs(): Response
    {
        return $this->render('offrefront/browse-jobs.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/browse-resume", name="browse-resume")
     */
    public function browse_resume(): Response
    {
        return $this->render('for_employer/browse-resume.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/candidate-profile", name="candidate-profile")
     */
    public function candidate_profile(): Response
    {
        return $this->render('offrefront/candidate-profile.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/create-resume", name="create-resume")
     */
    public function create_resume(): Response
    {
        return $this->render('offrefront/create-resume.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/employer-profile", name="employer-profile")
     */
    public function employer_profile(): Response
    {
        return $this->render('for_employer/employer-profile.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/faq", name="faq")
     */
    public function faq(): Response
    {
        return $this->render('faq.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/freelancer-detail", name="freelancer-detail")
     */
    public function freelancer_detail(): Response
    {
        return $this->render('freelance_space/freelancer-detail.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/freelancers", name="freelancers")
     */
    public function freelancers(): Response
    {
        return $this->render('freelance_space/freelancers.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/freelancing", name="freelancing")
     */
    public function freelancing(): Response
    {
        return $this->render('main_pages/freelancing.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/freelancing-jobs", name="freelancing-jobs")
     */
    public function freelancing_jobs(): Response
    {
        return $this->render('freelance_space/freelancing-jobs.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/job-apply-detail", name="job-apply-detail")
     */
    public function job_apply_detail(): Response
    {
        return $this->render('for_employer/job-apply-detail.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/job-detail", name="job-detail")
     */
    public function job_detail(): Response
    {
        return $this->render('for_employer/job-detail.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('login_singup/login.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/lost-password", name="lost-password")
     */
    public function lost_password(): Response
    {
        return $this->render('login_singup/lost-password.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/manage-candidate", name="manage-candidate")
     */
    public function manage_candidate(): Response
    {
        return $this->render('for_employer/manage-candidate.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/new-login-signup", name="new-login-signup")
     */
    public function new_login_signup(): Response
    {
        return $this->render('login_singup/new-login-signup.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("pricing", name="pricing")
     */
    public function pricing(): Response
    {
        return $this->render('pricing.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/resume-detail", name="resume-detail")
     */
    public function resume_detail(): Response
    {
        return $this->render('offrefront/resume-detail.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/search-job", name="search-job")
     */
    public function search_job(): Response
    {
        return $this->render('search-job.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }

    /**
     * @Route("/signin-signup", name="signin-signup")
     */
    public function signin_signup(): Response
    {
        return $this->render('main_pages/signin-signup.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/signup", name="signup")
     */
    public function signup(): Response
    {
        return $this->render('login_singup/new-login-signup.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function blog(): Response
    {
        return $this->render('blog.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/create-job", name="create-job")
     */
    public function create_job(Request $request , UserRepository $userRepository): Response
    {
        $user=new User();
        $user=$userRepository->findOneBy(['id'=>'1']);
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $uploadedFile = $form['logo']->getData();
            $filename = md5(uniqid()).'.'.$uploadedFile->guessExtension();
            $uploadedFile->move($this->getParameter('upload_directory'),$filename);
            $offre->setLogo($filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('job');
        }

        return $this->render('for_employer/create-job.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }




}
