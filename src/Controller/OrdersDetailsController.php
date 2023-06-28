<?php

namespace App\Controller;

use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\OrdersDetails;


class OrdersDetailsController extends AbstractController
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    
    /**
     * @Route("/orders/{orderId}/details", name="orders_details")
     */   
    public function index($orderId): Response
    {
        $orderDetails = $this->orderService->getOrdersDetailsByOrder($orderId);

        return $this->render('orders_details/index.html.twig', [
            'orderDetails' => $orderDetails,
        ]);
    }
}
