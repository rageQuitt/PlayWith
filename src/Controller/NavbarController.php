<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\OrderService;
use Symfony\Component\Security\Core\Security;

class NavbarController extends AbstractController
{
    private $orderService;
    private $security;

    public function __construct(OrderService $orderService, Security $security)
    {
        $this->orderService = $orderService;
        $this->security = $security;
    }

    #[Route('/navbar', name: 'app_navbar')]
    public function index(): Response
    {
        // get current user
        $users = $this->security->getUser();
        
        // Ensure we have a logged-in user
        if (!$users) {
            throw $this->createNotFoundException('No user logged in');
        }

        $users = $users->getId(); // or $user->getUsersId(), depending on your User entity getter method name

        // Use your OrderService here to get the order
        $order = $this->orderService->getOrderById($users);

        if ($order && $order->getUser()) {
            // La commande existe et a un utilisateur associé
        } else {
            // La commande n'existe pas ou n'a pas d'utilisateur associé
        }

        // suppose $orders is defined here, you would need to fetch it appropriately
        $orders = $this->orderService->getOrders();
        return $this->render('navbar/navbar.html.twig', [
            'controller_name' => 'NavbarController',
            'orders' => $orders,
            'orderService' => $this->orderService,
            'users'=> $users,
        ]);
    }
}
