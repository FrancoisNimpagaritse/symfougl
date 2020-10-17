<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantityInStock;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $stockMin;

    /**
     * @ORM\ManyToOne(targetEntity=UnityMeasure::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unitemeasure;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryArticle::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryarticle;

    /**
     * @ORM\OneToMany(targetEntity=SortieStockDetail::class, mappedBy="article", orphanRemoval=true)
     */
    private $sortieStockDetails;

    /**
     * @ORM\OneToMany(targetEntity=PurchaseDetail::class, mappedBy="article", orphanRemoval=true)
     */
    private $purchaseDetails;

    /**
     * @ORM\OneToMany(targetEntity=StockTransferDetail::class, mappedBy="article", orphanRemoval=true)
     */
    private $stockTransferDetails;

    public function __construct()
    {
        $this->sortieStockDetails = new ArrayCollection();
        $this->purchaseDetails = new ArrayCollection();
        $this->stockTransferDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantityInStock(): ?float
    {
        return $this->quantityInStock;
    }

    public function setQuantityInStock(?float $quantityInStock): self
    {
        $this->quantityInStock = $quantityInStock;

        return $this;
    }

    public function getStockMin(): ?float
    {
        return $this->stockMin;
    }

    public function setStockMin(?float $stockMin): self
    {
        $this->stockMin = $stockMin;

        return $this;
    }

    public function getUnitemeasure(): ?UnityMeasure
    {
        return $this->unitemeasure;
    }

    public function setUnitemeasure(?UnityMeasure $unitemeasure): self
    {
        $this->unitemeasure = $unitemeasure;

        return $this;
    }

    public function getCategoryarticle(): ?CategoryArticle
    {
        return $this->categoryarticle;
    }

    public function setCategoryarticle(?CategoryArticle $categoryarticle): self
    {
        $this->categoryarticle = $categoryarticle;

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
            $sortieStockDetail->setArticle($this);
        }

        return $this;
    }

    public function removeSortieStockDetail(SortieStockDetail $sortieStockDetail): self
    {
        if ($this->sortieStockDetails->contains($sortieStockDetail)) {
            $this->sortieStockDetails->removeElement($sortieStockDetail);
            // set the owning side to null (unless already changed)
            if ($sortieStockDetail->getArticle() === $this) {
                $sortieStockDetail->setArticle(null);
            }
        }

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
            $purchaseDetail->setArticle($this);
        }

        return $this;
    }

    public function removePurchaseDetail(PurchaseDetail $purchaseDetail): self
    {
        if ($this->purchaseDetails->contains($purchaseDetail)) {
            $this->purchaseDetails->removeElement($purchaseDetail);
            // set the owning side to null (unless already changed)
            if ($purchaseDetail->getArticle() === $this) {
                $purchaseDetail->setArticle(null);
            }
        }

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
            $stockTransferDetail->setArticle($this);
        }

        return $this;
    }

    public function removeStockTransferDetail(StockTransferDetail $stockTransferDetail): self
    {
        if ($this->stockTransferDetails->contains($stockTransferDetail)) {
            $this->stockTransferDetails->removeElement($stockTransferDetail);
            // set the owning side to null (unless already changed)
            if ($stockTransferDetail->getArticle() === $this) {
                $stockTransferDetail->setArticle(null);
            }
        }

        return $this;
    }
}
