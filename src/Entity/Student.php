<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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
     * @ORM\Column(type="string", length=50)
     */
    private $placeBirth;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $CommuneBirth;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ProvinceBirth;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $etatCivil;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parentAddress;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tutorLastname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tutorFirstname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tutorPhone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nationalIdNumber;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fatherFirstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fatherLastname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $motherFirstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $motherLastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fatherProfession;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $motherProfession;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $studentConjoint;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasSecondaryCertificate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isHomologue;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $secondaryCertificateType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secondarySchool;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateIssued;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $yearObtention;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mention;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gradePercentage;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dpe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasPostSecondaryCertificate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $instute;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplomaCertificate;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $yearObtentionUniv;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasAttestationFrequentation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $interruptionPeriod;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $interruptionOccupation;

    /**
     * @ORM\OneToMany(targetEntity=Registration::class, mappedBy="student", orphanRemoval=true)
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

    public function getPlaceBirth(): ?string
    {
        return $this->placeBirth;
    }

    public function setPlaceBirth(string $placeBirth): self
    {
        $this->placeBirth = $placeBirth;

        return $this;
    }

    public function getCommuneBirth(): ?string
    {
        return $this->CommuneBirth;
    }

    public function setCommuneBirth(string $CommuneBirth): self
    {
        $this->CommuneBirth = $CommuneBirth;

        return $this;
    }

    public function getProvinceBirth(): ?string
    {
        return $this->ProvinceBirth;
    }

    public function setProvinceBirth(string $ProvinceBirth): self
    {
        $this->ProvinceBirth = $ProvinceBirth;

        return $this;
    }

    public function getEtatCivil(): ?string
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(string $etatCivil): self
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

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

    public function getParentAddress(): ?string
    {
        return $this->parentAddress;
    }

    public function setParentAddress(?string $parentAddress): self
    {
        $this->parentAddress = $parentAddress;

        return $this;
    }

    public function getTutorLastname(): ?string
    {
        return $this->tutorLastname;
    }

    public function setTutorLastname(?string $tutorLastname): self
    {
        $this->tutorLastname = $tutorLastname;

        return $this;
    }

    public function getTutorFirstname(): ?string
    {
        return $this->tutorFirstname;
    }

    public function setTutorFirstname(?string $tutorFirstname): self
    {
        $this->tutorFirstname = $tutorFirstname;

        return $this;
    }

    public function getTutorPhone(): ?string
    {
        return $this->tutorPhone;
    }

    public function setTutorPhone(?string $tutorPhone): self
    {
        $this->tutorPhone = $tutorPhone;

        return $this;
    }

    public function getNationalIdNumber(): ?string
    {
        return $this->nationalIdNumber;
    }

    public function setNationalIdNumber(string $nationalIdNumber): self
    {
        $this->nationalIdNumber = $nationalIdNumber;

        return $this;
    }

    public function getFatherFirstname(): ?string
    {
        return $this->fatherFirstname;
    }

    public function setFatherFirstname(?string $fatherFirstname): self
    {
        $this->fatherFirstname = $fatherFirstname;

        return $this;
    }

    public function getFatherLastname(): ?string
    {
        return $this->fatherLastname;
    }

    public function setFatherLastname(string $fatherLastname): self
    {
        $this->fatherLastname = $fatherLastname;

        return $this;
    }

    public function getMotherFirstname(): ?string
    {
        return $this->motherFirstname;
    }

    public function setMotherFirstname(?string $motherFirstname): self
    {
        $this->motherFirstname = $motherFirstname;

        return $this;
    }

    public function getMotherLastname(): ?string
    {
        return $this->motherLastname;
    }

    public function setMotherLastname(string $motherLastname): self
    {
        $this->motherLastname = $motherLastname;

        return $this;
    }

    public function getFatherProfession(): ?string
    {
        return $this->fatherProfession;
    }

    public function setFatherProfession(string $fatherProfession): self
    {
        $this->fatherProfession = $fatherProfession;

        return $this;
    }

    public function getMotherProfession(): ?string
    {
        return $this->motherProfession;
    }

    public function setMotherProfession(?string $motherProfession): self
    {
        $this->motherProfession = $motherProfession;

        return $this;
    }

    public function getStudentConjoint(): ?string
    {
        return $this->studentConjoint;
    }

    public function setStudentConjoint(?string $studentConjoint): self
    {
        $this->studentConjoint = $studentConjoint;

        return $this;
    }

    public function getHasSecondaryCertificate(): ?bool
    {
        return $this->hasSecondaryCertificate;
    }

    public function setHasSecondaryCertificate(bool $hasSecondaryCertificate): self
    {
        $this->hasSecondaryCertificate = $hasSecondaryCertificate;

        return $this;
    }

    public function getIsHomologue(): ?bool
    {
        return $this->isHomologue;
    }

    public function setIsHomologue(bool $isHomologue): self
    {
        $this->isHomologue = $isHomologue;

        return $this;
    }

    public function getSecondaryCertificateType(): ?string
    {
        return $this->secondaryCertificateType;
    }

    public function setSecondaryCertificateType(string $secondaryCertificateType): self
    {
        $this->secondaryCertificateType = $secondaryCertificateType;

        return $this;
    }

    public function getSecondarySchool(): ?string
    {
        return $this->secondarySchool;
    }

    public function setSecondarySchool(string $secondarySchool): self
    {
        $this->secondarySchool = $secondarySchool;

        return $this;
    }

    public function getDateIssued(): ?\DateTimeInterface
    {
        return $this->dateIssued;
    }

    public function setDateIssued(?\DateTimeInterface $dateIssued): self
    {
        $this->dateIssued = $dateIssued;

        return $this;
    }

    public function getYearObtention(): ?string
    {
        return $this->yearObtention;
    }

    public function setYearObtention(?string $yearObtention): self
    {
        $this->yearObtention = $yearObtention;

        return $this;
    }

    public function getMention(): ?string
    {
        return $this->mention;
    }

    public function setMention(?string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getGradePercentage(): ?float
    {
        return $this->gradePercentage;
    }

    public function setGradePercentage(?float $gradePercentage): self
    {
        $this->gradePercentage = $gradePercentage;

        return $this;
    }

    public function getDpe(): ?string
    {
        return $this->dpe;
    }

    public function setDpe(?string $dpe): self
    {
        $this->dpe = $dpe;

        return $this;
    }

    public function getHasPostSecondaryCertificate(): ?bool
    {
        return $this->hasPostSecondaryCertificate;
    }

    public function setHasPostSecondaryCertificate(?bool $hasPostSecondaryCertificate): self
    {
        $this->hasPostSecondaryCertificate = $hasPostSecondaryCertificate;

        return $this;
    }

    public function getInstute(): ?string
    {
        return $this->instute;
    }

    public function setInstute(?string $instute): self
    {
        $this->instute = $instute;

        return $this;
    }

    public function getDiplomaCertificate(): ?string
    {
        return $this->diplomaCertificate;
    }

    public function setDiplomaCertificate(?string $diplomaCertificate): self
    {
        $this->diplomaCertificate = $diplomaCertificate;

        return $this;
    }

    public function getYearObtentionUniv(): ?string
    {
        return $this->yearObtentionUniv;
    }

    public function setYearObtentionUniv(?string $yearObtentionUniv): self
    {
        $this->yearObtentionUniv = $yearObtentionUniv;

        return $this;
    }

    public function getHasAttestationFrequentation(): ?bool
    {
        return $this->hasAttestationFrequentation;
    }

    public function setHasAttestationFrequentation(?bool $hasAttestationFrequentation): self
    {
        $this->hasAttestationFrequentation = $hasAttestationFrequentation;

        return $this;
    }

    public function getInterruptionPeriod(): ?string
    {
        return $this->interruptionPeriod;
    }

    public function setInterruptionPeriod(?string $interruptionPeriod): self
    {
        $this->interruptionPeriod = $interruptionPeriod;

        return $this;
    }

    public function getInterruptionOccupation(): ?string
    {
        return $this->interruptionOccupation;
    }

    public function setInterruptionOccupation(?string $interruptionOccupation): self
    {
        $this->interruptionOccupation = $interruptionOccupation;

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
            $registration->setStudent($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getStudent() === $this) {
                $registration->setStudent(null);
            }
        }

        return $this;
    }
}
