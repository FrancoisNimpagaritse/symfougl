<?php

namespace App\Entity;

use App\Repository\PurchaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurchaseRepository::class)
 */
class Purchase
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datePurchase;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=PurchaseDetail::class, mappedBy="purchase", orphanRemoval=true)
     */
    private $purchaseDetails;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->purchaseDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePurchase(): ?\DateTimeInterface
    {
        return $this->datePurchase;
    }

    public function setDatePurchase(\DateTimeInterface $datePurchase): self
    {
        $this->datePurchase = $datePurchase;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|PurchaseDetail[]
     */
    public function getPurchaseDetails(): Collection
    {
        return $this->purchaseDetails;
    }

    public function addPurchaseDetail(PurchaseDetail $purchaseDetail): self
    {
        if (!$this->purchaseDetails->contains($purchaseDetail)) {
            $this->purchaseDetails[] = $purchaseDetail;
            $purchaseDetail->setPurchase($this);
        }

        return $this;
    }

    public function removePurchaseDetail(PurchaseDetail $purchaseDetail): self
    {
        if ($this->purchaseDetails->contains($purchaseDetail)) {
            $this->purchaseDetails->removeElement($purchaseDetail);
            // set the owning side to null (unless already changed)
            if ($purchaseDetail->getPurchase() === $this) {
                $purchaseDetail->setPurchase(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
