<?php

namespace App\Services;

use App\Repository\ProductsRepository;

class CartService
{
    private $productRepository;

    public function __construct(ProductsRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getCartDetails(array $cart)
    {
    
        // Log the cart content
        error_log(print_r($cart, true));
    
        $cartDetails = [];
            
        foreach($cart as $productId => $quantity) {
            $product = $this->productRepository->find($productId);
            var_dump($product); // Ajoutez ceci
            // Log the product
            error_log(print_r($product, true));
                
            if($product) {
                $cartDetails[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $product->getPrice() * $quantity
                ];
            }
        }
    
        // Log the cart details
        error_log(print_r($cartDetails, true));
            
        return $cartDetails;
    }
    
    // Add other methods like addToCart(), removeFromCart() etc.
}
