<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 * fields={"email"},
 * message="Cet adresse email est déjà utilisée, merci de choisir une autre !"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre prénom !")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre nom de famille !")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Veuillez renseigner une adresse email valide !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $hash;

    /**
     * @Assert\EqualTo(propertyPath="hash", message="Les deux mots de passe ne sont pas identiques !")
     *
     */
    public $passwordConfirm;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, mappedBy="users")
     */
    private $userRoles;

    /**
     * @ORM\OneToMany(targetEntity=Depreciation::class, mappedBy="user")
     */
    private $depreciations;

    /**
     * @ORM\OneToMany(targetEntity=Expense::class, mappedBy="user")
     */
    private $expenses;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="user")
     */
    private $registrations;

    /**
     * @ORM\OneToMany(targetEntity=Minervalpayment::class, mappedBy="user")
     */
    private $minervalpayments;

    /**
     * @ORM\OneToMany(targetEntity=Registrationfeespayment::class, mappedBy="user")
     */
    private $registrationfeespayments;

    /**
     * @ORM\OneToMany(targetEntity=SortieStock::class, mappedBy="user")
     */
    private $sortieStocks;

    /**
     * @ORM\OneToMany(targetEntity=Purchase::class, mappedBy="user")
     */
    private $purchases;

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
        $this->depreciations = new ArrayCollection();
        $this->expenses = new ArrayCollection();
        $this->registrations = new ArrayCollection();
        $this->minervalpayments = new ArrayCollection();
        $this->registrationfeespayments = new ArrayCollection();
        $this->sortieStocks = new ArrayCollection();
        $this->purchases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
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

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->userRoles->map(function($role){
            return $role->getTitle();
        })->toArray();

        $roles[] = 'ROLE_USER';

        return $roles;
    }

    public function getPassword()
    {
        return $this->hash;
    }

    public function getSalt(){}

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials(){}

    /**
     * @return Collection|Role[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(Role $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->addUser($this);
        }

        return $this;
    }

    public function removeUserRole(Role $userRole): self
    {
        if ($this->userRoles->contains($userRole)) {
            $this->userRoles->removeElement($userRole);
            $userRole->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Depreciation[]
     */
    public function getDepreciations(): Collection
    {
        return $this->depreciations;
    }

    public function addDepreciation(Depreciation $depreciation): self
    {
        if (!$this->depreciations->contains($depreciation)) {
            $this->depreciations[] = $depreciation;
            $depreciation->setUser($this);
        }

        return $this;
    }

    public function removeDepreciation(Depreciation $depreciation): self
    {
        if ($this->depreciations->contains($depreciation)) {
            $this->depreciations->removeElement($depreciation);
            // set the owning side to null (unless already changed)
            if ($depreciation->getUser() === $this) {
                $depreciation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Expense[]
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expense $expense): self
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses[] = $expense;
            $expense->setUser($this);
        }

        return $this;
    }

    public function removeExpense(Expense $expense): self
    {
        if ($this->expenses->contains($expense)) {
            $this->expenses->removeElement($expense);
            // set the owning side to null (unless already changed)
            if ($expense->getUser() === $this) {
                $expense->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registration $registration): self
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations[] = $registration;
            $registration->setUser($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getUser() === $this) {
                $registration->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Minervalpayment[]
     */
    public function getMinervalpayments(): Collection
    {
        return $this->minervalpayments;
    }

    public function addMinervalpayment(Minervalpayment $minervalpayment): self
    {
        if (!$this->minervalpayments->contains($minervalpayment)) {
            $this->minervalpayments[] = $minervalpayment;
            $minervalpayment->setUser($this);
        }

        return $this;
    }

    public function removeMinervalpayment(Minervalpayment $minervalpayment): self
    {
        if ($this->minervalpayments->contains($minervalpayment)) {
            $this->minervalpayments->removeElement($minervalpayment);
            // set the owning side to null (unless already changed)
            if ($minervalpayment->getUser() === $this) {
                $minervalpayment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Registrationfeespayment[]
     */
    public function getRegistrationfeespayments(): Collection
    {
        return $this->registrationfeespayments;
    }

    public function addRegistrationfeespayment(Registrationfeespayment $registrationfeespayment): self
    {
        if (!$this->registrationfeespayments->contains($registrationfeespayment)) {
            $this->registrationfeespayments[] = $registrationfeespayment;
            $registrationfeespayment->setUser($this);
        }

        return $this;
    }

    public function removeRegistrationfeespayment(Registrationfeespayment $registrationfeespayment): self
    {
        if ($this->registrationfeespayments->contains($registrationfeespayment)) {
            $this->registrationfeespayments->removeElement($registrationfeespayment);
            // set the owning side to null (unless already changed)
            if ($registrationfeespayment->getUser() === $this) {
                $registrationfeespayment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SortieStock[]
     */
    public function getSortieStocks(): Collection
    {
        return $this->sortieStocks;
    }

    public function addSortieStock(SortieStock $sortieStock): self
    {
        if (!$this->sortieStocks->contains($sortieStock)) {
            $this->sortieStocks[] = $sortieStock;
            $sortieStock->setUser($this);
        }

        return $this;
    }

    public function removeSortieStock(SortieStock $sortieStock): self
    {
        if ($this->sortieStocks->contains($sortieStock)) {
            $this->sortieStocks->removeElement($sortieStock);
            // set the owning side to null (unless already changed)
            if ($sortieStock->getUser() === $this) {
                $sortieStock->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Purchase[]
     */
    public function getPurchases(): Collection
    {
        return $this->purchases;
    }

    public function addPurchase(Purchase $purchase): self
    {
        if (!$this->purchases->contains($purchase)) {
            $this->purchases[] = $purchase;
            $purchase->setUser($this);
        }

        return $this;
    }

    public function removePurchase(Purchase $purchase): self
    {
        if ($this->purchases->contains($purchase)) {
            $this->purchases->removeElement($purchase);
            // set the owning side to null (unless already changed)
            if ($purchase->getUser() === $this) {
                $purchase->setUser(null);
            }
        }

        return $this;
    }
}
