<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Candidate
 *
 * @ORM\Table(name="candidate", indexes={@ORM\Index(name="IDX_C8B28E441C16E241", columns={"experience_id_id"})})
 * @ORM\Entity
 */
class Candidate
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
     * @ORM\Column(name="gender", type="boolean", nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="passport", type="string", length=255, nullable=true)
     */
    private $passport;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_picture", type="string", length=255, nullable=true)
     */
    private $profilPicture;

    /**
     * @var string
     *
     * @ORM\Column(name="current_location", type="string", length=255, nullable=true)
     */
    private $currentLocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="place_of_birth", type="string", length=255, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \Experience
     *
     * @ORM\ManyToOne(targetEntity="Experience",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="experience_id_id", referencedColumnName="id")
     * })
     */
    private $experienceId;

    /**
     * @var \InfoAdminCandidat
     *
     * @ORM\ManyToOne(targetEntity="InfoAdminCandidat",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="info_admin_candidat_id_id", referencedColumnName="id")
     * })
     */
    private $infoAdminCandidatId;

    /**
     * @var \JobCategory
     *
     * @ORM\ManyToOne(targetEntity="JobCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_category_id_id", referencedColumnName="id")
     * })
     */
    private $jobCategoryId;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="candidate", cascade={"persist", "remove"})
     */
    private $user;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

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

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(string $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(string $profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(string $currentLocation): self
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getExperienceId(): ?Experience
    {
        return $this->experienceId;
    }

    public function setExperienceId(?Experience $experienceId): self
    {
        $this->experienceId = $experienceId;

        return $this;
    }

    public function getInfoAdminCandidatId(): ?InfoAdminCandidat
    {
        return $this->infoAdminCandidatId;
    }

    public function setInfoAdminCandidatId(?InfoAdminCandidat $infoAdminCandidatId): self
    {
        $this->infoAdminCandidatId = $infoAdminCandidatId;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getCandidate() !== $this) {
            $user->setCandidate($this);
        }

        $this->user = $user;

        return $this;
    }
    public function toArray(){
        return ['gender'=>$this->getGender(),
                'firstName'=>$this->getFirstName(), 
                'lastName'=>$this->getLastName(), 
                'Adress' => $this->getAdress(), 
                'Country' => $this->getCountry(),
                'nationality' => $this->getNationality(),
                'cv' => $this->getCv(),
                'profilPicture' => $this->getProfilPicture(),
                'currentLocation' => $this->getCurrentLocation(),
                'dateOfBirth' => $this->getDateOfBirth(),
                'placeOfBirthh' => $this->getPlaceOfBirth(),
                'Description' => $this->getDescription(),
                'experience_id' => $this->getExperienceId(),
                'jobCategory_id' => $this->getJobCategoryId(),
                'passport' => $this->getPassport()
            
            ];
    }
    public function __toString(): string
    {
        return $this->getLastName();
    }


}