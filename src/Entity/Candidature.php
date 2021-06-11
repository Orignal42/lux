<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature")})
 * @ORM\Entity
 */
class Candidature
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
     * @var \Candidate
     *
     * @ORM\ManyToOne(targetEntity="Candidate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_candidat_id", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $idCandidat;

    /**
     * @var \JobOffer
     *
     * @ORM\ManyToOne(targetEntity="JobOffer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offer_id", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $idOffer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCandidat(): ?Candidate
    {
        return $this->idCandidat;
    }

    public function setIdCandidat(?Candidate $idCandidat): self
    {
        $this->idCandidat = $idCandidat;

        return $this;
    }

    public function getIdOffer(): ?JobOffer
    {
        return $this->idOffer;
    }

    public function setIdOffer(?JobOffer $idOffer): self
    {
        $this->idOffer = $idOffer;

        return $this;
    }


}
