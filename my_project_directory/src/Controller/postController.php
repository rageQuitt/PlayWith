<?php

// src/Controller/articleController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class postController extends AbstractController
{
    #[Route('/article/{_locale}/{year}/{title}', name: 'article')]
    public function index(): Response
    {
        // ...
        return $this->render('post_show/post_show.html.twig', ['controller_name'=>'postController']);
    
    }
};