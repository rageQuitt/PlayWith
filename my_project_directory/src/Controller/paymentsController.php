<?php

// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class paymentsController extends AbstractController
{
    #[Route('/facturation', name: 'billing')]
    public function index(): Response
    {
        // ...
        return $this->render('payments/payments.html.twig', ['controller_name'=>'paymentsController']);
    
    }
};