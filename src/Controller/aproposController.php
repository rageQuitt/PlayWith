<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class aproposController extends AbstractController
{
    #[Route('/a_propos', name: 'a_propos')]
    public function index(): Response
    {
        return $this->render('apropos/apropos.html.twig', [
            'controller_name' => 'aproposController',
        ]);
    }
}
