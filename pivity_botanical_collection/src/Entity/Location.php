<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $institution_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    private $locality;

    #[ORM\Column(type: 'string', length: 255)]
    private $municipality;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $latitude_s;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $longitude_w;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstituitionId(): ?int
    {
        return $this->institution_id;
    }

    public function setInstituitionId(int $institution_id): self
    {
        $this->institution_id = $institution_id;

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

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }

    public function setMunicipality(string $municipality): self
    {
        $this->municipality = $municipality;

        return $this;
    }

    public function getLatitudeS(): ?string
    {
        return $this->latitude_s;
    }

    public function setLatitudeS(string $latitude_s): self
    {
        $this->latitude_s = $latitude_s;

        return $this;
    }

    public function getLongitudeW(): ?string
    {
        return $this->longitude_w;
    }

    public function setLongitudeW(string $longitude_w): self
    {
        $this->longitude_w = $longitude_w;

        return $this;
    }
}
