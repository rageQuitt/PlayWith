<?php

namespace App\Services;

use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrdersRepository;
use App\Repository\OrdersDetailsRepository;
use App\Repository\ProductsRepository;
use App\Services\CartService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderService
{
    private $ordersRepository;
    private $ordersDetailsRepository;
    private $productsRepository;
    private $entityManager;
    private $cartService;

    public function __construct(OrdersRepository $ordersRepository,OrdersDetailsRepository $ordersDetailsRepository, ProductsRepository $productsRepository, EntityManagerInterface $entityManager, CartService $cartService)
    {
        $this->ordersRepository = $ordersRepository;
        $this->ordersDetailsRepository = $ordersDetailsRepository;
        $this->productsRepository = $productsRepository;
        $this->entityManager = $entityManager;
        $this->cartService = $cartService;
    }

    public function instanceGroup(int $ordersId, int $productsId) {
        // Obtenez les instances pour chaque entité
        $orders = $this->ordersRepository->find($ordersId);
        if (!$orders) {
            throw new NotFoundHttpException('No Orders found for id '.$ordersId);
        }

        $products = $this->productsRepository->find($productsId);
        if (!$products) {
            throw new NotFoundHttpException('No Products found for id '.$productsId);
        }

        // Créez une nouvelle instance de OrdersDetails et définissez les relations
        $ordersDetails = new OrdersDetails();
        $ordersDetails->setOrders($orders);
        $ordersDetails->setProducts($products);

        // Persistez et enregistrez l'entité
        $this->entityManager->persist($ordersDetails);
        $this->entityManager->flush();
    }

    // ... autres méthodes ...

    public function getOrderById(int $orderId): ?Orders
{
    return $this->ordersRepository->find($orderId);
}
public function getOrdersDetailsByOrder(int $orderId): array
{
    $orderDetails = $this->ordersDetailsRepository->findBy(['orders' => $orderId]);
    return $orderDetails;
}

public function getOrders(): array
{
    return $this->ordersRepository->findAll();
}

}
