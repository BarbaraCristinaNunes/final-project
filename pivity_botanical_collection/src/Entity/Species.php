<?php

namespace App\Entity;

use App\Repository\SpeciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
class Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $kingdom;

    #[ORM\Column(type: 'string', length: 255)]
    private $phylum;

    #[ORM\Column(type: 'string', length: 255)]
    private $class;

    #[ORM\Column(type: 'string', length: 255)]
    private $order_plant;

    #[ORM\Column(type: 'string', length: 255)]
    private $family;

    #[ORM\Column(type: 'string', length: 255)]
    private $genus;

    #[ORM\Column(type: 'string', length: 255)]
    private $species;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKingdom(): ?string
    {
        return $this->kingdom;
    }

    public function setKingdom(string $kingdom): self
    {
        $this->kingdom = $kingdom;

        return $this;
    }

    public function getPhylum(): ?string
    {
        return $this->phylum;
    }

    public function setPhylum(string $phylum): self
    {
        $this->phylum = $phylum;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getOrderPlant(): ?string
    {
        return $this->order_plant;
    }

    public function setOrderPlant(string $order_plant): self
    {
        $this->order_plant = $order_plant;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;

        return $this;
    }
}
