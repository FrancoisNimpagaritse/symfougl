<?php

namespace App\Entity;

use App\Repository\AcademicyearRepository;
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
}
