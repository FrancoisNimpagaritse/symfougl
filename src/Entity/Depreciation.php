<?php

namespace App\Entity;

use App\Repository\DepreciationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepreciationRepository::class)
 */
class Depreciation
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
    private $dateDeprec;

    /**
     * @ORM\Column(type="float")
     */
    private $deprecAmount;

    /**
     * @ORM\Column(type="float")
     */
    private $bookValue;

    /**
     * @ORM\ManyToOne(targetEntity=Asset::class, inversedBy="depreciations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $asset;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="depreciations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeprec(): ?\DateTimeInterface
    {
        return $this->dateDeprec;
    }

    public function setDateDeprec(\DateTimeInterface $dateDeprec): self
    {
        $this->dateDeprec = $dateDeprec;

        return $this;
    }

    public function getDeprecAmount(): ?float
    {
        return $this->deprecAmount;
    }

    public function setDeprecAmount(float $deprecAmount): self
    {
        $this->deprecAmount = $deprecAmount;

        return $this;
    }

    public function getBookValue(): ?float
    {
        return $this->bookValue;
    }

    public function setBookValue(float $bookValue): self
    {
        $this->bookValue = $bookValue;

        return $this;
    }

    public function getAsset(): ?Asset
    {
        return $this->asset;
    }

    public function setAsset(?Asset $asset): self
    {
        $this->asset = $asset;

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
