<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressBirth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currentAddress;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $matricule;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHired;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEndedHire;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typeContrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $niveauQualification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(\DateTimeInterface $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getAddressBirth(): ?string
    {
        return $this->addressBirth;
    }

    public function setAddressBirth(?string $addressBirth): self
    {
        $this->addressBirth = $addressBirth;

        return $this;
    }

    public function getCurrentAddress(): ?string
    {
        return $this->currentAddress;
    }

    public function setCurrentAddress(string $currentAddress): self
    {
        $this->currentAddress = $currentAddress;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getDateHired(): ?\DateTimeInterface
    {
        return $this->dateHired;
    }

    public function setDateHired(\DateTimeInterface $dateHired): self
    {
        $this->dateHired = $dateHired;

        return $this;
    }

    public function getDateEndedHire(): ?\DateTimeInterface
    {
        return $this->dateEndedHire;
    }

    public function setDateEndedHire(?\DateTimeInterface $dateEndedHire): self
    {
        $this->dateEndedHire = $dateEndedHire;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getNiveauQualification(): ?string
    {
        return $this->niveauQualification;
    }

    public function setNiveauQualification(?string $niveauQualification): self
    {
        $this->niveauQualification = $niveauQualification;

        return $this;
    }
}
