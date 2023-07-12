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
            $firstImage = $images->first();
        
            if ($firstImage) {
                $imagePath = $firstImage->getimagePath();
            } else {
                $imagePath = 'https://previews.123rf.com/images/photoplotnikov/photoplotnikov1703/photoplotnikov170300032/74051448-ic%C3%B4ne-d-image-de-profil-avatar-m%C3%A2le-par-d%C3%A9faut-grey-homme-photo-placeholder-illustration.jpg'; 
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
     * @Route("/categories", name="categories_index")
     */
    public function list(SessionInterface $session, ProductsRepository $productsRepository): Response
    {
        $categories = $this->categoriesRepository->findAll();
    
        $selected = $session->get('selected');
    
        $product = [];
        foreach ($categories as $category) {
            $product[] = $productsRepository->findFirstProductInCategories($category);
        }
    
        return $this->render('categories/list.html.twig', [
            'categories' => $categories,
            'selected' => $selected,
            'products' => $product,
        ]);
    }


/**
 * @Route("/categories/{id}", name="categories_show")
 */
public function show($id, ProductsRepository $productsRepository)
{
    // Use find($id) instead of findAll() to get a single Category
    $category = $this->categoriesRepository->find($id);
    $product = $productsRepository->findOneBy(['categories' => $category]);

    // Check if the category exists
    if (!$category) {
        throw $this->createNotFoundException(
            'No category found for id '.$id
        );
    }

    return $this->render('categories/show.html.twig', [
        'category' => $category,
        'product' => $product
    ]);
}





     /**
     * @Route("/categories/indexexe", name="categoriesindex" )
     */
    public function index()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/api/categories');

        $categories = $response->toArray();


    }

    

}
