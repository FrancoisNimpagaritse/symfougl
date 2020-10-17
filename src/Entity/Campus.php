<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
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
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOpen;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="campus")
     */
    private $registrations;

    /**
     * @ORM\OneToMany(targetEntity=StockTransfer::class, mappedBy="campusorigin")
     */
    private $originStockTransfers;

    /**
     * @ORM\OneToMany(targetEntity=StockTransfer::class, mappedBy="campusdestination")
     */
    private $destinationStockTransfers;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
        $this->originStockTransfers = new ArrayCollection();
        $this->destinationStockTransfers = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDateOpen(): ?\DateTimeInterface
    {
        return $this->dateOpen;
    }

    public function setDateOpen(\DateTimeInterface $dateOpen): self
    {
        $this->dateOpen = $dateOpen;

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registration $registration): self
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations[] = $registration;
            $registration->setCampus($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getCampus() === $this) {
                $registration->setCampus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StockTransfer[]
     */
    public function getOriginStockTransfers(): Collection
    {
        return $this->originStockTransfers;
    }

    public function addOriginStockTransfer(StockTransfer $originStockTransfer): self
    {
        if (!$this->originStockTransfers->contains($originStockTransfer)) {
            $this->originStockTransfers[] = $originStockTransfer;
            $originStockTransfer->setCampusorigin($this);
        }

        return $this;
    }

    public function removeOriginStockTransfer(StockTransfer $originStockTransfer): self
    {
        if ($this->originStockTransfers->contains($originStockTransfer)) {
            $this->originStockTransfers->removeElement($originStockTransfer);
            // set the owning side to null (unless already changed)
            if ($originStockTransfer->getCampusorigin() === $this) {
                $originStockTransfer->setCampusorigin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StockTransfer[]
     */
    public function getDestinationStockTransfers(): Collection
    {
        return $this->destinationStockTransfers;
    }

    public function addDestinationStockTransfer(StockTransfer $destinationStockTransfer): self
    {
        if (!$this->destinationStockTransfers->contains($destinationStockTransfer)) {
            $this->destinationStockTransfers[] = $destinationStockTransfer;
            $destinationStockTransfer->setCampusdestination($this);
        }

        return $this;
    }

    public function removeDestinationStockTransfer(StockTransfer $destinationStockTransfer): self
    {
        if ($this->destinationStockTransfers->contains($destinationStockTransfer)) {
            $this->destinationStockTransfers->removeElement($destinationStockTransfer);
            // set the owning side to null (unless already changed)
            if ($destinationStockTransfer->getCampusdestination() === $this) {
                $destinationStockTransfer->setCampusdestination(null);
            }
        }

        return $this;
    }
}
