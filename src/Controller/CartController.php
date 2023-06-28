<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Products;
use App\Entity\Cart;
use App\Entity\CartItem; // Ajoutez cette ligne


class CartController extends AbstractController
{/**
 * @Route("/ajouter-au-panier/{productId}", name="ajouter_au_panier", methods={"POST"})
 */
public function ajouterAuPanier($productId, Request $request, EntityManagerInterface $em)
{
    // Récupère le produit
    $product = $em->getRepository(Products::class)->find($productId);

    if (!$product) {
        throw $this->createNotFoundException('Le produit demandé n\'existe pas');
    }

    // Récupère l'utilisateur
    $user = $this->getUser();

    // Récupère le panier de l'utilisateur, ou crée un nouveau si aucun n'existe
    $cart = $user->getCart() ?? new Cart();

    // Crée un nouvel élément de panier pour le produit
    $item = (new CartItem())
        ->setProduct($product)
        ->setQuantity(1) // Ou une autre quantité en fonction de vos besoins
        ->setCart($cart);

    $cart->addItem($item);

    // Persiste le nouvel élément de panier et le panier (si nouveau) dans la base de données
    $em->persist($item);
    if (!$user->getCart()) {
        $em->persist($cart);
        $user->setCart($cart);
    }

    $em->flush();

    return $this->redirectToRoute('orders_index');
}


    /**
     * @Route("/retirer-du-panier/{productId}", name="retirer_du_panier", methods={"POST"})
     */
    public function retirerDuPanier($productId, Request $request)
    {
        // Récupère le panier de la session.
        $cart = $request->getSession()->get('cart', []);

        // Supprime le produit du panier.
        unset($cart[$productId]);

        // Stocke le panier mis à jour dans la session.
        $request->getSession()->set('cart', $cart);

        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/confirmer-commande/{productId}/{quantity}", name="confirmer_commande", methods={"POST"})
     */
    public function confirmerCommande($productId, $quantity, EntityManagerInterface $em)
    {
        // On récupère le produit dont l'ID correspond à $productId.
        $product = $em->getRepository(Products::class)->find($productId);

        if (!$product) {
            return new JsonResponse(['error' => 'Le produit demandé n\'existe pas'], 404);
        }

        // On vérifie si le stock est suffisant.
        if ($product->getStock() < $quantity) {
            return new JsonResponse(['error' => 'Stock insuffisant'], 400);
        }

        // On décrémente le stock du produit.
        $product->setStock($product->getStock() - $quantity);

        // On applique les changements à la base de données.
        $em->flush();

        return new JsonResponse(['success' => true]);
    }
}
