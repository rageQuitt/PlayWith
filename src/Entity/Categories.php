<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private ?string $name = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="categories")
     */
    private ?self $parent = null;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Categories", mappedBy="parent")
     */
    private Collection $categories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="categories")
     */
    private $products;


    // ...
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection|Product[]
     */
    public function getProducts(): \Doctrine\Common\Collections\Collection
    {
    return $this->products;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection|Product[] $products
     * @return Categories
     */
    public function setProducts(\Doctrine\Common\Collections\Collection $products): self
    {
    $this->products = $products;

    return $this;
    }

    public function getImagesPath()
    {
       return $this -> imagePath;
    }

    
}

