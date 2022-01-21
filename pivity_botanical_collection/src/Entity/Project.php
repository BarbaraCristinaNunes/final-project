<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $coordinator;

    #[ORM\Column(type: 'string', length: 255)]
    private $funding_institution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCoordinator(): ?string
    {
        return $this->coordinator;
    }

    public function setCoordinator(string $coordinator): self
    {
        $this->coordinator = $coordinator;

        return $this;
    }

    public function getFundingInstitution(): ?string
    {
        return $this->funding_institution;
    }

    public function setFundingInstitution(string $funding_institution): self
    {
        $this->funding_institution = $funding_institution;

        return $this;
    }
}
