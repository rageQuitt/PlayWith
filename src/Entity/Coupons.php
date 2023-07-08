<?php

namespace App\Entity;

use App\Repository\CouponsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CouponsRepository::class)
 */
class Coupons
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    private ?string $code = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $description = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $discount = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $max_usage = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $validity = null;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $is_valid = null;

    /**
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?\DateTimeImmutable $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=CouponsTypes::class, inversedBy="coupons")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?CouponsTypes $coupons_types = null;

    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="coupons")
     */
    private Collection $orders;

    // ...
}
