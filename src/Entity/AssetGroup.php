<?php

namespace App\Entity;

use App\Repository\AssetGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssetGroupRepository::class)
 */
class AssetGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $groupeName;

    /**
     * @ORM\OneToMany(targetEntity=Asset::class, mappedBy="assetgroup", orphanRemoval=true)
     */
    private $assets;

    public function __construct()
    {
        $this->assets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupeName(): ?string
    {
        return $this->groupeName;
    }

    public function setGroupeName(string $groupeName): self
    {
        $this->groupeName = $groupeName;

        return $this;
    }

    /**
     * @return Collection|Asset[]
     */
    public function getAssets(): Collection
    {
        return $this->assets;
    }

    public function addAsset(Asset $asset): self
    {
        if (!$this->assets->contains($asset)) {
            $this->assets[] = $asset;
            $asset->setAssetgroup($this);
        }

        return $this;
    }

    public function removeAsset(Asset $asset): self
    {
        if ($this->assets->contains($asset)) {
            $this->assets->removeElement($asset);
            // set the owning side to null (unless already changed)
            if ($asset->getAssetgroup() === $this) {
                $asset->setAssetgroup(null);
            }
        }

        return $this;
    }
}
