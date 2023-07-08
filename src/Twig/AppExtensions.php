<?php

// src/Twig/AppExtension.php

namespace App\Twig;

use App\Services\OrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_order', [$this, 'getOrder']),
        ];
    }

    public function getOrder(int $orderId)
    {
        return $this->orderService->getOrderById($orderId);
    }
    
}