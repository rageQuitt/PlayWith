<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
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
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private ?string $reference = null;

    /**
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?\DateTimeImmutable $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Coupons::class, inversedBy="orders")
     */
    private ?Coupons $coupons = null;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Users $users = null;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="orders", orphanRemoval=true)
     */
    private Collection $ordersDetails;

    public function __construct()
    {
        $this->ordersDetails = new ArrayCollection();
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }
    
    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    
    // D'autres méthodes vont ici.

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    // Calcul pour la facture 
    
    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->ordersDetails as $detail) {
            $total += $detail->getQuantity() * $detail->getPrice();
        }

        return $total;
    }

    
}
