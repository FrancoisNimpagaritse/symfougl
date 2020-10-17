<?php

namespace App\Entity;

use App\Repository\SortieStockDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieStockDetailRepository::class)
 */
class SortieStockDetail
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
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="sortieStockDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=SortieStock::class, inversedBy="sortieStockDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sortiestock;

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

    public function getSortiestock(): ?SortieStock
    {
        return $this->sortiestock;
    }

    public function setSortiestock(?SortieStock $sortiestock): self
    {
        $this->sortiestock = $sortiestock;

        return $this;
    }
}
