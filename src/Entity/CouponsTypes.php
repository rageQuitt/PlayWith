<?php

namespace App\Entity;

use App\Repository\CouponsTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CouponsTypesRepository::class)
 */
class CouponsTypes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private ?string $name = null;

    /**
     * @ORM\OneToMany(targetEntity=Coupons::class, mappedBy="coupons_types", orphanRemoval=true)
     */
    private Collection $coupons;

    // ...
}
