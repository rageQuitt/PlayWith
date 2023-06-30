<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


    /**
     * @ORM\Entity(repositoryClass=OrdersRepository::class)
     * @ORM\HasLifecycleCallbacks()
     */
    class Orders
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private ?int $id = null;
    
        /**
         * @ORM\Column(type="string", length=20, unique=true, nullable=true)
         */
        private ?string $reference = null;

    
        /**
         * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
         */
        private ?\DateTimeImmutable $createdAt;
    
        /**
         * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="orders")
         * @ORM\JoinColumn(nullable=false)
         */
        private ?Users $users = null;
    
        /**
         * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="orders", orphanRemoval=true)
         */
        private Collection $ordersDetails;
    
        /**
         * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="orders")
         * @ORM\JoinColumn(nullable=false)
         */
        private ?Cart $cart = null;

        /**
     * @ORM\ManyToOne(targetEntity=Coupons::class)
     */
    private $coupons;


    
    // ...

    public function getCoupons(): ?Coupons
    {
        return $this->coupons;
    }

    public function setCoupons(?Coupons $coupons): self
    {
        $this->coupons = $coupons;

        return $this;
    }
    
        public function __construct()
        {
            $this->ordersDetails = new ArrayCollection();
            $this->orderItems = new ArrayCollection();
            $this->cartItems = new ArrayCollection();


        }
    
        // Rest of your properties and methods...
    
        public function getCart(): ?Cart
        {
            return $this->cart;
        }
    
        public function setCart(?Cart $cart): self
        {
            $this->cart = $cart;
    
            return $this;
        }


    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
{
    return $this->createdAt;
}

public function setCreatedAt(?\DateTimeImmutable $createdAt): self
{
    $this->createdAt = $createdAt;

    return $this;
}
/**
     * @ORM\OneToMany(targetEntity=CartItem::class, mappedBy="order", orphanRemoval=true)
     */
    private Collection $orderItems;
    

    public function addOrderItem(CartItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->setOrder($this);
        }

        return $this;
    }

    public function removeOrderItem(CartItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrder() === $this) {
                $orderItem->setOrder(null);
            }
        }

        return $this;
    }
    /**
     * @ORM\OneToMany(targetEntity=CartItem::class, mappedBy="order")
     */
    private $cartItems;


    // ...

    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function addCartItem(CartItem $cartItem): self
    {
        if (!$this->cartItems->contains($cartItem)) {
            $this->cartItems[] = $cartItem;
            $cartItem->setOrder($this);
        }

        return $this;
    }

    public function removeCartItem(CartItem $cartItem): self
    {
        if ($this->cartItems->removeElement($cartItem)) {
            // set the owning side to null (unless already changed)
            if ($cartItem->getOrder() === $this) {
                $cartItem->setOrder(null);
            }
        }

        return $this;
    }

}

