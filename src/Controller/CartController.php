<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Products;
use App\Entity\Cart;
use App\Entity\CartItem;
use App\Entity\Orders;
use Symfony\Component\Security\Core\Security;



/**
 * @Route("/cart", name="cart_")
 */
class CartController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    /**
     * @Route("/", name="cart_index")
     */
     public function index(SessionInterface $session, EntityManagerInterface $em)
     {
        $user = $this->security->getUser();

        $cart = $session->get("cart", []);


        //On fabrique les données
        $dataCart = [];
        $total = 0;

        foreach($cart as $id => $quantity)
        {
            //Je recupère un produit
            $product = $em->getRepository(Products::class)->find($id);

            $dataCart[] = [

                "product"=> $product,
                "name" => $product->getName(), 
                "quantity"=>$quantity
            ];

            $total += $product ->getPrice() * $quantity;
        }

        return $this->render('cart/cart.html.twig',compact("dataCart", "total"));
     }

    /**
 * @Route("/add/{id}", name="add")
 */
public function add($id, EntityManagerInterface $em, SessionInterface $session, Request $request)
{
    $product = $em->getRepository(Products::class)->find($id);

    //on récupére le panier actuel - On commence la session avec le panier où bien un tableau vide
    $cart = $session->get("cart", []);

    if(!empty($cart[$id])){
        $cart[$id]++;
    }else{
        $cart[$id]=1;
    }

    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');
    }

    //on sauvegarde dans la session
    $session->set("cart",$cart);

    // dd($session); // Comment out or delete this line

    return $this->redirect($request->server->get('HTTP_REFERER'));

}

/**
 * @Route("/remove/{id}", name="remove")
 */
public function remove($id, EntityManagerInterface $em, SessionInterface $session, Request $request)
{
    $product = $em->getRepository(Products::class)->find($id);

    //on récupére le panier actuel - On commence la session avec le panier où bien un tableau vide
    $cart = $session->get("cart", []);

    if(!empty($cart[$id])){
        if($cart[$id] > 1){
            
            $cart[$id]--;
        
    }else{
       unset($cart[$id]);
    }
    }else{

        $cart[$id] = 1;
    }

    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');
    }

    //on sauvegarde dans la session
    $session->set("cart",$cart);

    // dd($session); // Comment out or delete this line

    return $this->redirect($request->server->get('HTTP_REFERER'));

}



/**
 * @Route("/delete/{id}", name="delete")
 */
public function delete($id, EntityManagerInterface $em, SessionInterface $session)
{
    $product = $em->getRepository(Products::class)->find($id);

    //on récupére le panier actuel - On commence la session avec le panier où bien un tableau vide
    $cart = $session->get("cart", []);

    if(!empty($cart[$id])){
    
       unset($cart[$id]);
    }

    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');
    }

    //on sauvegarde dans la session
    $session->set("cart",$cart);

    // dd($session); // Comment out or delete this line

    return $this->redirectToRoute("cart_cart_index");
}



/**
 * @Route("/delete", name="delete_all")
 */
public function deleteAll( SessionInterface $session)
{
    //on récupére le panier actuel - On commence la session avec le panier où bien un tableau vide
    $session->remove("cart");

    // dd($session); 

    return $this->redirectToRoute("cart_cart_index");
}

}
