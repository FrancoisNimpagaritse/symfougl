<?php

namespace App\Entity;

use App\Repository\StockTransferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockTransferRepository::class)
 */
class StockTransfer
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
    private $dateTransfer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=StockTransferDetail::class, mappedBy="stocktransfer", orphanRemoval=true)
     */
    private $stockTransferDetails;

    /**
     * @ORM\ManyToOne(targetEntity=Campus::class, inversedBy="originStockTransfers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campusorigin;

    /**
     * @ORM\ManyToOne(targetEntity=Campus::class, inversedBy="destinationStockTransfers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campusdestination;

    public function __construct()
    {
        $this->stockTransferDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTransfer(): ?\DateTimeInterface
    {
        return $this->dateTransfer;
    }

    public function setDateTransfer(\DateTimeInterface $dateTransfer): self
    {
        $this->dateTransfer = $dateTransfer;

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
     * @return Collection|StockTransferDetail[]
     */
    public function getStockTransferDetails(): Collection
    {
        return $this->stockTransferDetails;
    }

    public function addStockTransferDetail(StockTransferDetail $stockTransferDetail): self
    {
        if (!$this->stockTransferDetails->contains($stockTransferDetail)) {
            $this->stockTransferDetails[] = $stockTransferDetail;
            $stockTransferDetail->setStocktransfer($this);
        }

        return $this;
    }

    public function removeStockTransferDetail(StockTransferDetail $stockTransferDetail): self
    {
        if ($this->stockTransferDetails->contains($stockTransferDetail)) {
            $this->stockTransferDetails->removeElement($stockTransferDetail);
            // set the owning side to null (unless already changed)
            if ($stockTransferDetail->getStocktransfer() === $this) {
                $stockTransferDetail->setStocktransfer(null);
            }
        }

        return $this;
    }

    public function getCampusorigin(): ?Campus
    {
        return $this->campusorigin;
    }

    public function setCampusorigin(?Campus $campusorigin): self
    {
        $this->campusorigin = $campusorigin;

        return $this;
    }

    public function getCampusdestination(): ?Campus
    {
        return $this->campusdestination;
    }

    public function setCampusdestination(?Campus $campusdestination): self
    {
        $this->campusdestination = $campusdestination;

        return $this;
    }
}
