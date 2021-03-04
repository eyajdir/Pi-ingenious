<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Candidate;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Form\EditCType;
use App\Form\EditEType;
use App\Form\RegisterType;
use App\Form\RegisterCType;
use App\Form\RegisterEType;
use App\Repository\BlogRepository;
use App\Repository\CandidateRepository;
use App\Repository\CommentaireRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\EventRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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
        return $this->render('for_candidates/browse-company.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/browse-jobs", name="browse-jobs")
     */
    public function browse_jobs(): Response
    {
        return $this->render('for_candidates/browse-jobs.html.twig', [
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

        /*$user=$this->getDoctrine()->getRepository(Candidate::
        class)->findOneBy(array(id));
        console.log($user);*/
        return $this->render('for_candidates/candidate-profile.html.twig', [
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
        return $this->render('for_candidates/create-resume.html.twig', [
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
        return $this->render('for_candidates/resume-detail.html.twig', [
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
     * @Route("/search-new", name="search-new")
     */
    public function search_new(): Response
    {
        return $this->render('for_candidates/search-new.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/signin-signup", name="signin-signup")
     */
    public function signin_signup()
    {

        return $this->render('main_pages/signin-signup.html.twig'
            );
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
    public function blog( BlogRepository  $blog): Response
    {
        return $this->render('blog.html.twig', [
            'blog' => $blog->findAll(),
        ]);
    }
    /**
     * @Route("/blog-detail/{id}", name="blog-detail")
     */
    public function blog_detail(BlogRepository $blog,CommentaireRepository $co,$id): Response
    {
        $comm=$co->findAll();
        return $this->render('blog-detail.html.twig', [
            'blog' => $blog->find($id),
            'comments'=>$comm
        ]);
    }
    /**
     * @Route("/create-job", name="create-job")
     */
    public function create_job(): Response
    {
        return $this->render('for_employer/create-job.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/chat", name="chat")
     */
    public function chat(): Response
    {
        return $this->render('chat.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/company-detail", name="chat")
     */
    public function company_detail(): Response
    {
        return $this->render('for_candidates/company-detail.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
    /**
     * @Route("/signup-candidate", name="signup-candidate")
     */
    public function signup_candidate(Request $request , UserPasswordEncoderInterface $passwordEncoder ,AuthenticationUtils $utils): Response
    {
        $error=$utils->getLastAuthenticationError();

        $user= new Candidate() ;
        $form = $this->createForm(RegisterCType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            if($request->query->has('profilPic')) {
                $file = $request->files->get('register_c')['profilePic'];
                $uploads_directory = $this->getParameter('uploads_directory');
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $uploads_directory,
                    $filename
                );
                $user->setProfilePic('uploads/'.$filename);

            }
            $passwordH = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordH);
            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($user);
            $entitymanager->flush();
            return $this->redirectToRoute('login');
        }



        return $this->render('login_singup/signup-candidate.html.twig',
            array('form'=> $form->createView())

        );
    }
    /**
     * @Route("/signup-entreprise", name="signup-entreprise")
     */
    public function signup_entreprise(Request $request , UserPasswordEncoderInterface $passwordEncoder ): Response
    {

       $user= new Entreprise() ;
        $form = $this->createForm(RegisterEType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            if($request->query->has('profilPic')) {
                $file = $request->files->get('register_e')['profilPic'];
                $uploads_directory = $this->getParameter('uploads_directory');
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $uploads_directory,
                    $filename
                );
                $user->setProfilPic('uploads/'.$filename);
            }
            $passwordH = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordH);

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($user);
            $entitymanager->flush();
            return $this->redirectToRoute('login');
        }



        return $this->render('login_singup/signup-entreprise.html.twig' ,
            array('form'=> $form->createView())

        );
    }

    /**
     * @Route("/edit-profil/{id}/{i}", name="editC")
     */
    public function edit_profil(CandidateRepository $repository , Request $request , $i ,UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user=$repository->find($i);
        $form = $this->createForm(EditCType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          /*  echo "<pre>";
            var_dump($request); die ;*/
            if($request->query->has('profilePic'))
            {$file = $request->files->get('edit_c')['profilePic'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $user->setProfilePic('uploads/' . $filename);
            }
            $passwordH = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordH);
            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->flush();
            return $this->redirectToRoute('candidate-profile');
        }

        return $this->render('for_candidates/edit-profil.html.twig',
            array('form'=> $form->createView())
        );
    }
    /**
     * @Route("/DeleteC/{i}", name="DeleteC")
     */
    public function DeleteC(CandidateRepository $repository , Request $request , $i ): Response
    {

        $user=$repository->find($i);

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->remove($user);
            $entitymanager->flush();
            return $this->redirectToRoute('routes');


    }
    /**
     * @Route("/edit-profilE/{id}/{i}", name="editE")
     */
    public function edit_profilE(EntrepriseRepository $repository , Request $request , $i ,UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user=$repository->find($i);
        $form = $this->createForm(EditEType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*  echo "<pre>";
              var_dump($request); die ;*/
            if($request->query->has('profilPic'))
            {$file = $request->files->get('edit_e')['profilPic'];
                $uploads_directory = $this->getParameter('uploads_directory');
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $uploads_directory,
                    $filename
                );
                $user->setProfilePic('uploads/' . $filename);
            }
            $passwordH = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordH);
            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->flush();
            return $this->redirectToRoute('employer-profile');
        }

        return $this->render('for_employer/edit-profilE.html.twig',
            array('form'=> $form->createView())
        );
    }
    /**
     * @Route("/DeleteE/{i}", name="DeleteE")
     */
    public function DeleteE(EntrepriseRepository $repository , Request $request , $i ): Response
    {

        $user=$repository->find($i);

        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->remove($user);
        $entitymanager->flush();
        return $this->redirectToRoute('routes');


    }

    /**
     * @Route("/cv", name="cv")
     */
    public function cv()
    {

        return $this->render('for_candidates/cv-temp.html.twig');


    }
    /**
     * @Route("/backend", name="template")
     */
    public function indexb(): Response
    {
        return $this->render('backend/dashboard-1.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @Route("/user-profile", name="user_profile")
     */
    public function user_profile(): Response
    {
        return $this->render('backend/user_profile.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @Route("/user-profile-edit", name="user-profile-edit")
     */
    public function user_profile_edit(): Response
    {
        return $this->render('backend/user-profile-edit.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @Route("/user-privacy", name="user-privacy")
     */
    public function user_privacy(): Response
    {
        return $this->render('backend/user-privacy-setting.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/user-list",name="user-list")
     */
    public function user_list(): Response
    {
        return $this->render('backend/user-list.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/user-add",name="user-add")
     */
    public function user_add(): Response
    {
        return $this->render('backend/user-add.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/user-account",name="user-account")
     */
    public function user_acc(): Response
    {
        return $this->render('backend/user-account-setting.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/todo",name="todo")
     */
    public function todo(): Response
    {
        return $this->render('backend/todo.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/email_compose",name="email_compose")
     */
    public function email_compose(): Response
    {
        return $this->render('backend/email-compose.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/email",name="email")
     */
    public function email(): Response
    {
        return $this->render('backend/email.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/chatback",name="chatback")
     */
    public function chatback(): Response
    {
        return $this->render('backend/chat.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/auth-confirm-mail
    ",name="auth-confirm-mail
    ")
     */
    public function auth_confirm_mail(): Response
    {
        return $this->render('backend/auth-confirm-mail.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/auth-lock-screen
    ",name="auth-lock-screen
    ")
     */
    public function auth_lock_screen(): Response
    {
        return $this->render('backend/auth-lock-screen.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/auth-recoverpw
    ",name="auth-recoverpw
    ")
     */
    public function auth_recoverpw(): Response
    {
        return $this->render('backend/auth-recoverpw.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/auth-sign-in",name="auth-sign-in")
     */
    public function auth_sign_in(): Response
    {
        return $this->render('backend/auth-sign-in .html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/auth-sign-up
    ",name="auth-sign-up
    ")
     */
    public function auth_sign_up(): Response
    {
        return $this->render('backend/auth-sign-up.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/chart
    ",name="chart
    ")
     */
    public function chart(): Response
    {
        return $this->render('backend/chart.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/chart_high
    ",name="chart_high
    ")
     */
    public function chart_high(): Response
    {
        return $this->render('backend/chart_high.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/chart_morris
    ",name="chart_morris
    ")
     */
    public function chart_morris(): Response
    {
        return $this->render('backend/chart_morris.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/tables_basic
    ",name="tables_basic
    ")
     */
    public function table_basic(): Response
    {
        return $this->render('backend/tables-basic.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/tables_data
    ",name="tables_data
    ")
     */
    public function data_table(): Response
    {
        return $this->render('backend/table-data.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/tables_tree
    ",name="tables_tree
    ")
     */
    public function tree_table(): Response
    {
        return $this->render('backend/table_tree.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/table_edit
    ",name="table_edit
    ")
     */
    public function edit_table(): Response
    {
        return $this->render('backend/table_edit.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/error
    ",name="error
    ")
     */
    public function error(): Response
    {
        return $this->render('backend/error.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/error500
    ",name="error500
    ")
     */
    public function error500(): Response
    {
        return $this->render('backend/error500.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/pricingb
    ",name="pricingb
    ")
     */
    public function pricingback(): Response
    {
        return $this->render('backend/pricing.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/inovice
    ",name="inovice
    ")
     */
    public function inovice(): Response
    {
        return $this->render('backend/inovice.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/faqback
    ",name="faqback
    ")
     */
    public function faqback(): Response
    {
        return $this->render('backend/faq.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/main
    ",name="main
    ")
     */
    public function main(): Response
    {
        return $this->render('backend/maintament.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/cms
    ",name="cms
    ")
     */
    public function cms(): Response
    {
        return $this->render('backend/cms.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/blank
    ",name="blank
    ")
     */
    public function blank(): Response
    {
        return $this->render('backend/blankpage.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/ex
    ",name="ex
    ")
     */
    public function ex(): Response
    {
        return $this->render('backend/codeex.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @return Response
     * @Route("/blogdetail
    ",name="ex
    ")
     */
    public function blogdet(): Response
    {
        return $this->render('blogdetail.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @Route("/events", name="events")
     */
    public function browse_event(EventRepository $eventRepository): Response
    {
        return $this->render('for_candidates/browse-events.html.twig', [
            'events' => $eventRepository->findAll(),
        ]);

    }

    /**
     * @Route("/eventdetail/{id}", name="eventdetail")
     */
    public function event_detail(EventRepository $eventRepository, $id): Response
    {

        return $this->render('for_candidates/event-detail.html.twig', [
            'events' => $eventRepository->find($id),
        ]);
    }


}
