<?php

namespace App\Entity;

use App\Repository\CoursesperiodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursesperiodRepository::class)
 */
class Coursesperiod
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
    private $trimestre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSart;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="float")
     */
    private $dueAmount;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $enumNiveau;

    /**
     * @ORM\ManyToOne(targetEntity=Academicyear::class, inversedBy="coursesperiods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $academicyear;

    /**
     * @ORM\OneToMany(targetEntity=Minervalpayment::class, mappedBy="coursesperiod", orphanRemoval=true)
     */
    private $minervalpayments;

    public function __construct()
    {
        $this->minervalpayments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrimestre(): ?string
    {
        return $this->trimestre;
    }

    public function setTrimestre(string $trimestre): self
    {
        $this->trimestre = $trimestre;

        return $this;
    }

    public function getDateSart(): ?\DateTimeInterface
    {
        return $this->dateSart;
    }

    public function setDateSart(\DateTimeInterface $dateSart): self
    {
        $this->dateSart = $dateSart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getDueAmount(): ?float
    {
        return $this->dueAmount;
    }

    public function setDueAmount(float $dueAmount): self
    {
        $this->dueAmount = $dueAmount;

        return $this;
    }

    public function getEnumNiveau(): ?string
    {
        return $this->enumNiveau;
    }

    public function setEnumNiveau(string $enumNiveau): self
    {
        $this->enumNiveau = $enumNiveau;

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
            $minervalpayment->setCoursesperiod($this);
        }

        return $this;
    }

    public function removeMinervalpayment(Minervalpayment $minervalpayment): self
    {
        if ($this->minervalpayments->contains($minervalpayment)) {
            $this->minervalpayments->removeElement($minervalpayment);
            // set the owning side to null (unless already changed)
            if ($minervalpayment->getCoursesperiod() === $this) {
                $minervalpayment->setCoursesperiod(null);
            }
        }

        return $this;
    }
}
