<?php

// src/Controller/adminController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class adminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // ...
        return $this->render('admin/admin.html.twig', ['controller_name'=>'adminController']);
    
    }
};