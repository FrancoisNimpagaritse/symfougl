<?php

namespace App\Entity;

use App\Repository\EcheanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcheanceRepository::class)
 */
class Echeance
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
    private $libelleEcheance;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNextEcheance;

    /**
     * @ORM\ManyToOne(targetEntity=Asset::class, inversedBy="echeances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $asset;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleEcheance(): ?string
    {
        return $this->libelleEcheance;
    }

    public function setLibelleEcheance(string $libelleEcheance): self
    {
        $this->libelleEcheance = $libelleEcheance;

        return $this;
    }

    public function getDateNextEcheance(): ?\DateTimeInterface
    {
        return $this->dateNextEcheance;
    }

    public function setDateNextEcheance(\DateTimeInterface $dateNextEcheance): self
    {
        $this->dateNextEcheance = $dateNextEcheance;

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
}
