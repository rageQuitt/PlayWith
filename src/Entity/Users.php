<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface{
   /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
 * @ORM\Column(type="string", length=180, unique=true)
 */
private ?string $email = null;

/**
 * @ORM\Column(type="json")
 */
private $roles = [];

/**
 * @var string The hashed password
 * @ORM\Column(type="string")
 */
private ?string $password = null;

/**
 * @ORM\Column(type="string", length=100)
 */
private ?string $lastname = null;

/**
 * @ORM\Column(type="string", length=100)
 */
private ?string $firstname = null;

/**
 * @ORM\Column(type="string", length=255)
 */
private ?string $address = null;

/**
 * @ORM\Column(type="string", length=5)
 */
private ?string $zipcode = null;

/**
 * @ORM\Column(type="string", length=150)
 */
private ?string $city = null;


    /**
     * @ORM\Column(type="datetime_immutable", nullable=true, name="created_at")
     */
    private ?\DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="users")
     */
    private Collection $orders;

    public function __construct(?DateTimeImmutable $createdAt = null, UserPasswordHasherInterface $passwordHasher) {
        $this->createdAt = $createdAt ? $createdAt : new DateTimeImmutable();
        $this->orders = new ArrayCollection();
        $this->passwordHasher = $passwordHasher;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    
    public function getRoles(): array
    {
    $roles = $this->roles;
    // guarantee every user at least has ROLE_USER
    $roles[] = 'ROLE_USER';

    return array_unique($roles);
    }


    public function setRoles(array $roles): self
    {
    $this->roles = $roles;

    return $this;
    }
    
    function convertSerializedToJson($serialized) {
        $array = unserialize($serialized);
        $json = json_encode($array);
        return $json;
    }
    
    
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @ORM\OneToOne(targetEntity=Cart::class, cascade={"persist", "remove"})
     */
    private $cart;

    // Other properties and methods...

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
     * @return Collection<int, Orders>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setUsers($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUsers() === $this) {
                $order->setUsers(null);
            }
        }

        return $this;
    }
    
}
