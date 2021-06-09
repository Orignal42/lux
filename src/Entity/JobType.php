<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobType
 *
 * @ORM\Table(name="job_type")
 * @ORM\Entity
 */
class JobType
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
     * @ORM\Column(name="job_type", type="string", length=255, nullable=false)
     */
    private $jobType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(string $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }


}
