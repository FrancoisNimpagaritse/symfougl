<?php

namespace App\Entity;

use App\Repository\PurchaseDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurchaseDetailRepository::class)
 */
class PurchaseDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $unityPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="purchaseDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=Purchase::class, inversedBy="purchaseDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $purchase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnityPrice(): ?float
    {
        return $this->unityPrice;
    }

    public function setUnityPrice(float $unityPrice): self
    {
        $this->unityPrice = $unityPrice;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPurchase(): ?Purchase
    {
        return $this->purchase;
    }

    public function setPurchase(?Purchase $purchase): self
    {
        $this->purchase = $purchase;

        return $this;
    }
}
