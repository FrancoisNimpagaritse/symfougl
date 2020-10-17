<?php

namespace App\Entity;

use App\Repository\AcademicyearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcademicyearRepository::class)
 */
class Academicyear
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
     * @ORM\Column(type="integer")
     */
    private $registrationFees;

    /**
     * @ORM\Column(type="integer")
     */
    private $insuranceFees;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $yearStatus;

    /**
     * @ORM\OneToMany(targetEntity=Coursesperiod::class, mappedBy="academicyear", orphanRemoval=true)
     */
    private $coursesperiods;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="academicyear")
     */
    private $registrations;

    public function __construct()
    {
        $this->coursesperiods = new ArrayCollection();
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

    public function getRegistrationFees(): ?int
    {
        return $this->registrationFees;
    }

    public function setRegistrationFees(int $registrationFees): self
    {
        $this->registrationFees = $registrationFees;

        return $this;
    }

    public function getInsuranceFees(): ?int
    {
        return $this->insuranceFees;
    }

    public function setInsuranceFees(int $insuranceFees): self
    {
        $this->insuranceFees = $insuranceFees;

        return $this;
    }

    public function getYearStatus(): ?string
    {
        return $this->yearStatus;
    }

    public function setYearStatus(string $yearStatus): self
    {
        $this->yearStatus = $yearStatus;

        return $this;
    }

    /**
     * @return Collection|Coursesperiod[]
     */
    public function getCoursesperiods(): Collection
    {
        return $this->coursesperiods;
    }

    public function addCoursesperiod(Coursesperiod $coursesperiod): self
    {
        if (!$this->coursesperiods->contains($coursesperiod)) {
            $this->coursesperiods[] = $coursesperiod;
            $coursesperiod->setAcademicyear($this);
        }

        return $this;
    }

    public function removeCoursesperiod(Coursesperiod $coursesperiod): self
    {
        if ($this->coursesperiods->contains($coursesperiod)) {
            $this->coursesperiods->removeElement($coursesperiod);
            // set the owning side to null (unless already changed)
            if ($coursesperiod->getAcademicyear() === $this) {
                $coursesperiod->setAcademicyear(null);
            }
        }

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
            $registration->setAcademicyear($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getAcademicyear() === $this) {
                $registration->setAcademicyear(null);
            }
        }

        return $this;
    }
}
