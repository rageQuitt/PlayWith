<?php

// src/Controller/ProductController.php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ImagesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use App\Entity\Cart;



class ProductController extends AbstractController
{

    /**
 * @Route("/products/{id}", name="product_show", requirements={"id"="\d+"}, methods={"GET"})
 */
public function show(int $id, ProductsRepository $productsRepository, ImagesRepository $imagesRepository, LoggerInterface $logger): Response
{
    $product = $productsRepository->find($id);

    if (!$product) {
        throw $this->createNotFoundException('No product found for id '.$id);
    }

    $images = $imagesRepository->findBy(['products' => $product]);

    $logger->info('Product ID: ' . $product->getId() . ', Number of Images: ' . count($images));

    return $this->render('products/show.html.twig', [
        'product' => $product,
        'images' => $images,
    ]);
}



    
/**
 * @Route("/products", name="products_list", methods={"GET"})
 */
public function list(ProductsRepository $productsRepository, ImagesRepository $imagesRepository): Response
{
    $products = $productsRepository->findAll();
    $images = $imagesRepository->findAll();

    // Initialize the panier variable
    $panier = 0;

    return $this->render('products/list.html.twig', [
        'products' => $products,
        'panier' => $panier,
        'images' => $images,
    ]);

}
// ...

/**
 * @Route("/ajouter-au-panier/{id}", name="add_to_cart", methods={"POST"})
 */
public function addToCart(int $id, Request $request, SessionInterface $session): Response
{
    $logger->info();
    
    $quantity = json_decode($request->getContent(), true)['quantity'];
    $logger->info("Ajout au panier: produit $id, quantité $quantity");
    // Récupérez le panier de la session
    $cart = $session->get('cart', []);
    // Mettez à jour la quantité du produit
    $cart[$id] = $quantity;
    // Enregistrez le panier dans la session
    $session->set('cart', $cart);
    
    return $this->json(['success' => true]);
}

/**
 * @Route("/retirer-du-panier/{id}", name="remove_from_cart", methods={"POST"})
 */
public function removeFromCart(int $id, Request $request, SessionInterface $session): Response
{
    $logger->info();
    $quantity = json_decode($request->getContent(), true)['quantity'];
    $logger->info("Retrait du panier: produit $id, quantité $quantity");
    // Récupérez le panier de la session
    $cart = $session->get('cart', []);
    if ($quantity <= 0) {
        // Si la quantité est inférieure ou égale à 0, supprimez le produit du panier
        unset($cart[$id]);
    } else {
        // Sinon, mettez à jour la quantité du produit
        $cart[$id] = $quantity;
    }
    // Enregistrez le panier dans la session
    $session->set('cart', $cart);

    return $this->json(['success' => true]);
}

// ...

}
