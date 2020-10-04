<?php

namespace App\Entity;

use App\Repository\CoursesperiodRepository;
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
}
