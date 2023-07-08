<?php

namespace App\Controller;

use App\Services\CartService;
use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;


class OrdersController extends AbstractController
{
    private $orderService;
    private $cartService;
    private $entityManager;

    public function __construct(OrderService $orderService, CartService $cartService, EntityManagerInterface $entityManager)
    {
    $this->orderService = $orderService;
    $this->cartService = $cartService;
    $this->entityManager = $entityManager;
    }

    /**
     * @Route("/orders", name="orders_index")
     */
    public function index(): Response
    {
    $orders = $this->orderService->getOrders();

    return $this->render('orders/index.html.twig', [
        'orders' => $orders,
    ]);
    }

    /**
     * @Route("/orders/{orderId}", name="orders_show")
     */
    public function showOrder($orderId)
    {
    $orderId = (int) $orderId;
    $orders = $this->orderService->getOrderById($orderId);

    // Then pass the $order object to your view
    return $this->render('orders/show.html.twig', [
    'orders' => $orders,
    ]);
    }

    /**
     * @Route("/orders/{orderId}/details", name="orders_details_show")
     */
    public function showOrderDetails($orderId)
    {
    $orderId = (int) $orderId;
    $ordersDetails = $this->orderService->getOrdersDetailsByOrder($orderId);

    if ($ordersDetails === null) {
    throw $this->createNotFoundException('No order details found for order id '.$orderId);
    }

    // Ensuite, vous pouvez passer le tableau $ordersDetails à votre vue
    return $this->render('orders/confirm.html.twig', [
    'ordersDetails' => $ordersDetails,
    ]);
    }

    /**
     * @Route("/confirmer-commande/{productId}/{quantity}", name="confirm_order_ajax",  methods={"GET","POST"})
     */
    public function confirmOrderAjax($productId, $quantity, Request $request)
    {
    $session = $request->getSession();

    // Ajouter ou mettre à jour la quantité du produit dans le panier de la session
    $cart = $session->get('cart', []);
    $cart[$productId] = $quantity;
    $session->set('cart', $cart);

    var_dump($cart);
    error_log('Cart in confirmOrderAjax: ' . print_r($cart, true)); 

    // Ici, nous générons une réponse JSON avec un message de succès
    return $this->json([
        'success' => true,
        'message' => 'La commande a été confirmée avec succès.',
        'productId' => $productId,
        'quantity' => $quantity
    ]);

    error_log('Cart stored in session: ' . print_r($session->get('cart'), true));
    }
/**
 * @Route("/confirm_order", name="confirm_order")
 */
public function confirmOrder(Request $request)
{
    $session = $request->getSession();

    $cart = $session->get('cart', []);

    // Log the cart retrieved from session
    error_log('Cart retrieved from session: ' . print_r($cart, true));

    $cartDetails = $this->cartService->getCartDetails($cart);

    if (empty($cartDetails)) {
        // Cart is empty. Handle this situation as you see fit, e.g. throw an exception
        throw new \Exception('Cart is empty');
    }

    $session->set('cartDetails', $cartDetails);

    return $this->render('orders/confirm.html.twig', [ 'cart' => $cart,]);
}



/**
 * @Route("/confirmation", name="order_confirmation")
 */
public function confirmationAction(Request $request) {
    $session = $request->getSession();

    // Retrieving cart details, for example from the session.
    $cartDetails = $this->cartService->getCartDetails($session->get('cart', []));

    
    // Rendering the view passing the cart details
    return $this->render('orders/confirm.html.twig', ['cartDetails' => $cartDetails,]);
}



}
