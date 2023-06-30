<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\OneToMany(targetEntity=CartItem::class, mappedBy="cart")
     */
    private Collection $items;


    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="cart")
     */
    private $orders;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(CartItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCart($this);
        }

        return $this;
    }

    public function removeItem(CartItem $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // check if the cart in the item is the same as the current cart
            if ($item->getCart() === $this) {
                // if it's true then we remove the cart from the item
                $item->setCart(null);
            }
        }

        return $this;
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

}


