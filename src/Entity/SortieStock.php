<?php

namespace App\Entity;

use App\Repository\SortieStockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieStockRepository::class)
 */
class SortieStock
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
    private $dateSortie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $receiver;

    /**
     * @ORM\OneToMany(targetEntity=SortieStockDetail::class, mappedBy="sortiestock", orphanRemoval=true)
     */
    private $sortieStockDetails;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sortieStocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->sortieStockDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

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

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(?string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return Collection|SortieStockDetail[]
     */
    public function getSortieStockDetails(): Collection
    {
        return $this->sortieStockDetails;
    }

    public function addSortieStockDetail(SortieStockDetail $sortieStockDetail): self
    {
        if (!$this->sortieStockDetails->contains($sortieStockDetail)) {
            $this->sortieStockDetails[] = $sortieStockDetail;
            $sortieStockDetail->setSortiestock($this);
        }

        return $this;
    }

    public function removeSortieStockDetail(SortieStockDetail $sortieStockDetail): self
    {
        if ($this->sortieStockDetails->contains($sortieStockDetail)) {
            $this->sortieStockDetails->removeElement($sortieStockDetail);
            // set the owning side to null (unless already changed)
            if ($sortieStockDetail->getSortiestock() === $this) {
                $sortieStockDetail->setSortiestock(null);
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
