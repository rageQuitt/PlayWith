<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{

    /**
     * @Route("/images", name="image_index")
     */
    public function index(): Response
    {
        // code to retrieve and display images
        return $this->render('image/index.html.twig', [
            'controller_name' => 'ImageController',
        ]);
    }

    /**
     * @Route("/images/{id}", name="image_show")
     */
    public function show(int $id): Response
    {
        // code to retrieve and display a specific image
    }

 

}
