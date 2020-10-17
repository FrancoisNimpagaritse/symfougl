<?php

namespace App\Entity;

use App\Repository\MinervalpaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MinervalpaymentRepository::class)
 */
class Minervalpayment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datePaid;

    /**
     * @ORM\Column(type="integer")
     */
    private $paidAmount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voucher;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Coursesperiod::class, inversedBy="minervalpayments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coursesperiod;

    /**
     * @ORM\ManyToOne(targetEntity=Registration::class, inversedBy="minervalpayments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $registration;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="minervalpayments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePaid(): ?\DateTimeInterface
    {
        return $this->datePaid;
    }

    public function setDatePaid(\DateTimeInterface $datePaid): self
    {
        $this->datePaid = $datePaid;

        return $this;
    }

    public function getPaidAmount(): ?int
    {
        return $this->paidAmount;
    }

    public function setPaidAmount(int $paidAmount): self
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    public function getVoucher(): ?string
    {
        return $this->voucher;
    }

    public function setVoucher(string $voucher): self
    {
        $this->voucher = $voucher;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCoursesperiod(): ?Coursesperiod
    {
        return $this->coursesperiod;
    }

    public function setCoursesperiod(?Coursesperiod $coursesperiod): self
    {
        $this->coursesperiod = $coursesperiod;

        return $this;
    }

    public function getRegistration(): ?Registration
    {
        return $this->registration;
    }

    public function setRegistration(?Registration $registration): self
    {
        $this->registration = $registration;

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
}
