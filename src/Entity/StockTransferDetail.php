<?php

namespace App\Entity;

use App\Repository\StockTransferDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockTransferDetailRepository::class)
 */
class StockTransferDetail
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
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="stockTransferDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=StockTransfer::class, inversedBy="stockTransferDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stocktransfer;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStocktransfer(): ?StockTransfer
    {
        return $this->stocktransfer;
    }

    public function setStocktransfer(?StockTransfer $stocktransfer): self
    {
        $this->stocktransfer = $stocktransfer;

        return $this;
    }
}
