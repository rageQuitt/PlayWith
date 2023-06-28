<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CategoriesController extends AbstractController
{
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository, productsRepository $productsRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->productsRepository = $productsRepository;
    }


    /**
     * @Route("/api/categories", name="api_categories_list", methods={"GET"})
     */
    public function apiList(ProductsRepository $productsRepository)
{
    $categories = $this->categoriesRepository->findAll();
    $data = [];
    foreach ($categories as $category) {
        $product = $productsRepository->findFirstProductInCategories($category);

        if ($product) {
            $images = $product->getImages();
            $firstImage = $images->first();  // This will get the first Image object in the collection
        
            if ($firstImage) {
                $imagePath = $firstImage->getimagePath();
            } else {
                $imagePath = 'path/to/default/image.jpg'; // Default image if none is found
            }
        
            $data[] = [
                'name' => $category->getName(),
                'image' => $imagePath,
            ];
        }
        
    }

    return $this->json($data);
}


    /**
     * @Route("/categories", name="categories_list")
     */
    public function list(SessionInterface $session): Response
    {
        $categories = $this->categoriesRepository->findAll();

        $selected = $session->get('selected');


        return $this->render('categories/list.html.twig', [
            'categories' => $categories,
            'selected' => $selected,

        ]);
    }



    /**
     * @Route("/categories/{id}", name="categories_show")
     */
    public function show($id)
    {
        $category = $this->categoriesRepository->find($id);

        return $this->render('categories/show.html.twig', [
            'categories' => [$category] // array containing the category
        ]);
    }



     /**
     * @Route("/categories/index", name="categories_index")
     */
    public function index()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/api/categories');

        $categories = $response->toArray();

        return $this->render('categories/list.html.twig', [
            'categories' => $categories,
        ]);
    }

}
