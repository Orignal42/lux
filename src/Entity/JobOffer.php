<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobOffer
 *
 * @ORM\Table(name="job_offer", indexes={@ORM\Index(name="IDX_288A3A4EDC2902E0", columns={"client_id_id"})})
 * @ORM\Entity
 */
class JobOffer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="closing_date", type="date", nullable=true)
     */
    private $closingDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="salary", type="string", length=255, nullable=true)
     */
    private $salary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_creation", type="datetime", nullable=false)
     */
    private $dateDeCreation;

    /**
     * @var \JobType
     *
     * @ORM\ManyToOne(targetEntity="JobType",cascade={"persist", "remove"}))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_type_id_id", referencedColumnName="id")
     * })
     */
    private $jobTypeId;

    /**
     * @var \JobCategory
     *
     * @ORM\ManyToOne(targetEntity="JobCategory",cascade={"persist", "remove"}))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_category_id_id", referencedColumnName="id")
     * })
     */
    private $jobCategoryId;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client",cascade={"persist", "remove"}))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id_id", referencedColumnName="id")
     * })
     */
    private $clientId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->closingDate;
    }

    public function setClosingDate(?\DateTimeInterface $closingDate): self
    {
        $this->closingDate = $closingDate;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getJobTypeId(): ?JobType
    {
        return $this->jobTypeId;
    }

    public function setJobTypeId(?JobType $jobTypeId): self
    {
        $this->jobTypeId = $jobTypeId;

        return $this;
    }

    public function getJobCategoryId(): ?JobCategory
    {
        return $this->jobCategoryId;
    }

    public function setJobCategoryId(?JobCategory $jobCategoryId): self
    {
        $this->jobCategoryId = $jobCategoryId;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->clientId;
    }

    public function setClientId(?Client $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }


}
