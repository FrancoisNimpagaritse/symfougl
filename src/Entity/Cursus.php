<?php

namespace App\Entity;

use App\Repository\CursusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CursusRepository::class)
 */
class Cursus
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
    private $typedivision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $appelationdivision;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="cursus", orphanRemoval=true)
     */
    private $registrations;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
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

    public function getTypedivision(): ?string
    {
        return $this->typedivision;
    }

    public function setTypedivision(string $typedivision): self
    {
        $this->typedivision = $typedivision;

        return $this;
    }

    public function getAppelationdivision(): ?string
    {
        return $this->appelationdivision;
    }

    public function setAppelationdivision(string $appelationdivision): self
    {
        $this->appelationdivision = $appelationdivision;

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
            $registration->setCursus($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getCursus() === $this) {
                $registration->setCursus(null);
            }
        }

        return $this;
    }
}
