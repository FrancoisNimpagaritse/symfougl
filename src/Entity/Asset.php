<?php

namespace App\Entity;

use App\Repository\AssetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssetRepository::class)
 */
class Asset
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
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $datePurchase;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSold;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $deprecbalancesheetaccount;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $assetaccount;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $profitlossaccount;

    /**
     * @ORM\Column(type="float")
     */
    private $deprecRate;

    /**
     * @ORM\Column(type="float")
     */
    private $purchasePrice;

    /**
     * @ORM\Column(type="float")
     */
    private $bookValue;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateLastDeprec;

    /**
     * @ORM\ManyToOne(targetEntity=AssetGroup::class, inversedBy="assets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assetgroup;

    /**
     * @ORM\OneToMany(targetEntity=Depreciation::class, mappedBy="asset", orphanRemoval=true)
     */
    private $depreciations;

    /**
     * @ORM\OneToMany(targetEntity=Echeance::class, mappedBy="asset", orphanRemoval=true)
     */
    private $echeances;

    public function __construct()
    {
        $this->depreciations = new ArrayCollection();
        $this->echeances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

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

    public function getDatePurchase(): ?\DateTimeInterface
    {
        return $this->datePurchase;
    }

    public function setDatePurchase(\DateTimeInterface $datePurchase): self
    {
        $this->datePurchase = $datePurchase;

        return $this;
    }

    public function getDateSold(): ?\DateTimeInterface
    {
        return $this->dateSold;
    }

    public function setDateSold(?\DateTimeInterface $dateSold): self
    {
        $this->dateSold = $dateSold;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDeprecbalancesheetaccount(): ?string
    {
        return $this->deprecbalancesheetaccount;
    }

    public function setDeprecbalancesheetaccount(string $deprecbalancesheetaccount): self
    {
        $this->deprecbalancesheetaccount = $deprecbalancesheetaccount;

        return $this;
    }

    public function getAssetaccount(): ?string
    {
        return $this->assetaccount;
    }

    public function setAssetaccount(string $assetaccount): self
    {
        $this->assetaccount = $assetaccount;

        return $this;
    }

    public function getProfitlossaccount(): ?string
    {
        return $this->profitlossaccount;
    }

    public function setProfitlossaccount(string $profitlossaccount): self
    {
        $this->profitlossaccount = $profitlossaccount;

        return $this;
    }

    public function getDeprecRate(): ?float
    {
        return $this->deprecRate;
    }

    public function setDeprecRate(float $deprecRate): self
    {
        $this->deprecRate = $deprecRate;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): self
    {
        $this->purchasePrice = $purchasePrice;

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

    public function getDateLastDeprec(): ?\DateTimeInterface
    {
        return $this->dateLastDeprec;
    }

    public function setDateLastDeprec(?\DateTimeInterface $dateLastDeprec): self
    {
        $this->dateLastDeprec = $dateLastDeprec;

        return $this;
    }

    public function getAssetgroup(): ?AssetGroup
    {
        return $this->assetgroup;
    }

    public function setAssetgroup(?AssetGroup $assetgroup): self
    {
        $this->assetgroup = $assetgroup;

        return $this;
    }

    /**
     * @return Collection|Depreciation[]
     */
    public function getDepreciations(): Collection
    {
        return $this->depreciations;
    }

    public function addDepreciation(Depreciation $depreciation): self
    {
        if (!$this->depreciations->contains($depreciation)) {
            $this->depreciations[] = $depreciation;
            $depreciation->setAsset($this);
        }

        return $this;
    }

    public function removeDepreciation(Depreciation $depreciation): self
    {
        if ($this->depreciations->contains($depreciation)) {
            $this->depreciations->removeElement($depreciation);
            // set the owning side to null (unless already changed)
            if ($depreciation->getAsset() === $this) {
                $depreciation->setAsset(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Echeance[]
     */
    public function getEcheances(): Collection
    {
        return $this->echeances;
    }

    public function addEcheance(Echeance $echeance): self
    {
        if (!$this->echeances->contains($echeance)) {
            $this->echeances[] = $echeance;
            $echeance->setAsset($this);
        }

        return $this;
    }

    public function removeEcheance(Echeance $echeance): self
    {
        if ($this->echeances->contains($echeance)) {
            $this->echeances->removeElement($echeance);
            // set the owning side to null (unless already changed)
            if ($echeance->getAsset() === $this) {
                $echeance->setAsset(null);
            }
        }

        return $this;
    }
}
