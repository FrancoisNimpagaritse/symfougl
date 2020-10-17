<?php

namespace App\Entity;

use App\Repository\RegistrationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegistrationRepository::class)
 */
class Registration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasChoiceInfo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $choiceExterneInterne;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRegistration;

    /**
     * @ORM\ManyToOne(targetEntity=University::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $university;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Campus::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campus;

    /**
     * @ORM\ManyToOne(targetEntity=Cursus::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cursus;

    /**
     * @ORM\ManyToOne(targetEntity=Academicyear::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $academicyear;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=EnumNiveau::class, inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=Minervalpayment::class, mappedBy="inscription")
     */
    private $minervalpayments;

    /**
     * @ORM\OneToMany(targetEntity=Registrationfeespayment::class, mappedBy="registration")
     */
    private $registrationfeespayments;

    public function __construct()
    {
        $this->minervalpayments = new ArrayCollection();
        $this->registrationfeespayments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHasChoiceInfo(): ?bool
    {
        return $this->hasChoiceInfo;
    }

    public function setHasChoiceInfo(bool $hasChoiceInfo): self
    {
        $this->hasChoiceInfo = $hasChoiceInfo;

        return $this;
    }

    public function getChoiceExterneInterne(): ?string
    {
        return $this->choiceExterneInterne;
    }

    public function setChoiceExterneInterne(string $choiceExterneInterne): self
    {
        $this->choiceExterneInterne = $choiceExterneInterne;

        return $this;
    }

    public function getDateRegistration(): ?\DateTimeInterface
    {
        return $this->dateRegistration;
    }

    public function setDateRegistration(\DateTimeInterface $dateRegistration): self
    {
        $this->dateRegistration = $dateRegistration;

        return $this;
    }

    public function getUniversity(): ?University
    {
        return $this->university;
    }

    public function setUniversity(?University $university): self
    {
        $this->university = $university;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getCampus(): ?Campus
    {
        return $this->campus;
    }

    public function setCampus(?Campus $campus): self
    {
        $this->campus = $campus;

        return $this;
    }

    public function getCursus(): ?Cursus
    {
        return $this->cursus;
    }

    public function setCursus(?Cursus $cursus): self
    {
        $this->cursus = $cursus;

        return $this;
    }

    public function getAcademicyear(): ?Academicyear
    {
        return $this->academicyear;
    }

    public function setAcademicyear(?Academicyear $academicyear): self
    {
        $this->academicyear = $academicyear;

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

    public function getNiveau(): ?EnumNiveau
    {
        return $this->niveau;
    }

    public function setNiveau(?EnumNiveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|Minervalpayment[]
     */
    public function getMinervalpayments(): Collection
    {
        return $this->minervalpayments;
    }

    public function addMinervalpayment(Minervalpayment $minervalpayment): self
    {
        if (!$this->minervalpayments->contains($minervalpayment)) {
            $this->minervalpayments[] = $minervalpayment;
            $minervalpayment->setRegistration($this);
        }

        return $this;
    }

    public function removeMinervalpayment(Minervalpayment $minervalpayment): self
    {
        if ($this->minervalpayments->contains($minervalpayment)) {
            $this->minervalpayments->removeElement($minervalpayment);
            // set the owning side to null (unless already changed)
            if ($minervalpayment->getRegistration() === $this) {
                $minervalpayment->setRegistration(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Registrationfeespayment[]
     */
    public function getRegistrationfeespayments(): Collection
    {
        return $this->registrationfeespayments;
    }

    public function addRegistrationfeespayment(Registrationfeespayment $registrationfeespayment): self
    {
        if (!$this->registrationfeespayments->contains($registrationfeespayment)) {
            $this->registrationfeespayments[] = $registrationfeespayment;
            $registrationfeespayment->setRegistration($this);
        }

        return $this;
    }

    public function removeRegistrationfeespayment(Registrationfeespayment $registrationfeespayment): self
    {
        if ($this->registrationfeespayments->contains($registrationfeespayment)) {
            $this->registrationfeespayments->removeElement($registrationfeespayment);
            // set the owning side to null (unless already changed)
            if ($registrationfeespayment->getRegistration() === $this) {
                $registrationfeespayment->setRegistration(null);
            }
        }

        return $this;
    }
}
