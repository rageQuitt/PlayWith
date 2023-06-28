<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $description = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $price = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $stock = null;

    /**
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?\DateTimeImmutable $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;


    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="products", orphanRemoval=true)
     */
    private Collection $images;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="products")
     */
    private Collection $ordersDetails;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasSizes = false;


    // Add the constructor to initialize the collections
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->ordersDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @return Collection|OrdersDetails[]
     */
    public function getOrdersDetails(): Collection
    {
        return $this->ordersDetails;
    }

    // ... (other methods and getters/setters for relationships)
    /**
     * @Route("/ajouter-au-panier/{id}", name="add_to_cart", methods={"POST"})
     */
    public function addToCart($id) {
    // Logique pour ajouter un produit au panier
    // 
    }
    public function setStock(int $stock): self
    {
    $this->stock = $stock;

    return $this;
    }

    public function getHasSizes(): ?bool
    {
    return $this->hasSizes;
    }

    public function setHasSizes(bool $hasSizes): self
    {
    $this->hasSizes = $hasSizes;

    return $this;
    }



}
