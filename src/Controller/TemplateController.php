<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    /**
     * @Route("/admindash", name="template")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard-1.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @Route("/user-profile", name="user_profile")
     */
    public function user_profile(): Response
    {
        return $this->render('admin/user_profile.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @Route("/user-profile-edit", name="user-profile-edit")
     */
    public function user_profile_edit(): Response
    {
        return $this->render('admin/user-profile-edit.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @Route("/user-privacy", name="user-privacy")
     */
    public function user_privacy(): Response
    {
        return $this->render('admin/user-privacy-setting.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/user-list",name="user-list")
     */
    public function user_list(EntrepriseRepository $repository1 , CandidateRepository $repository): Response
    {
        $candidates=$repository->findAll();
        $entreprises=$repository1->findAll();
        return $this->render('admin/user-list.html.twig',
            array('candidates'=>$candidates,'entreprises'=>$entreprises)
        );
    }
    /**
     * @return Response
     * @Route("/admin/user-add",name="user-add")
     */
    public function user_add(): Response
    {
        return $this->render('admin/admin/user-add.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @return Response
     * @Route("/user-account",name="user-account")
     */
    public function user_acc(): Response
    {
        return $this->render('admin/user-account-setting.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @return Response
     * @Route("/todo",name="todo")
     */
    public function todo(): Response
    {
        return $this->render('admin/todo.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/email_compose",name="email_compose")
     */
    public function email_compose(): Response
    {
        return $this->render('admin/email-compose.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/email",name="email")
     */
    public function email(): Response
    {
        return $this->render('admin/email.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/chat",name="chat")
     */
    public function chat(): Response
    {
        return $this->render('admin/chat.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }





    /**
     * @return Response
     * @Route("/auth-confirm-mail
    ",name="auth-confirm-mail
    ")
     */
    public function auth_confirm_mail (): Response
    {
        return $this->render('admin/auth-confirm-mail.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

    /**
     * @return Response
     * @Route("/auth-lock-screen
    ",name="auth-lock-screen
    ")
     */
    public function auth_lock_screen (): Response
    {
        return $this->render('admin/auth-lock-screen.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }



    /**
     * @return Response
     * @Route("/auth-recoverpw
    ",name="auth-recoverpw
    ")
     */
    public function auth_recoverpw (): Response
    {
        return $this->render('admin/auth-recoverpw.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @return Response
     * @Route("/auth-sign-in",name="auth-sign-in")
     */
    public function auth_sign_in (): Response
    {
        return $this->render('admin/auth-sign-in .html.twig', [
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
        return $this->render('admin/auth-sign-up.html.twig', [
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
        return $this->render('admin/chart.html.twig', [
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
        return $this->render('admin/chart_high.html.twig', [
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
        return $this->render('admin/chart_morris.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }



    /**
     * @return Response
     * @Route("admin/tables_basic",name="offre")
     */
    public function table_basic(): Response
    {
        return $this->render('admin/admin/tables-basic.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }
    /**
     * @return Response
     * @Route("/admin/tables_data",name="tables_data")
     */
    public function data_table(): Response
    {
        return $this->render('admin/admin/table-data.html.twig', [
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
        return $this->render('admin/table_tree.html.twig', [
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
        return $this->render('admin/table_edit.html.twig', [
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
        return $this->render('admin/error.html.twig', [
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
        return $this->render('admin/error500.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }


    /**
     * @return Response
     * @Route("/pricing
    ",name="pricing
    ")
     */
    public function pricing(): Response
    {
        return $this->render('admin/pricing.html.twig', [
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
        return $this->render('admin/inovice.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }



    /**
     * @return Response
     * @Route("/faq
    ",name="faq
    ")
     */
    public function faq(): Response
    {
        return $this->render('admin/faq.html.twig', [
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
        return $this->render('admin/maintament.html.twig', [
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
        return $this->render('admin/cms.html.twig', [
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
        return $this->render('admin/blankpage.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }






}
