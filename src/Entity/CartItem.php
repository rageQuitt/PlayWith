<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartItemRepository::class)
 */
class CartItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private Products $product;

    /**
     * @ORM\Column(type="integer")
     */
    private int $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Cart $cart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): Products
    {
        return $this->product;
    }

    public function setProduct(Products $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="cartItems")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Orders $orders;

    // ...

    public function getOrder(): ?Orders
    {
        return $this->orders;
    }

    public function setOrder(?Orders $orders): self
    {
        $this->order = $orders;

        return $this;
    }
}
