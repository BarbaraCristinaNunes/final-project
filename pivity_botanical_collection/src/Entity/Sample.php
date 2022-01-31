<?php

namespace App\Entity;

use App\Repository\SampleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SampleRepository::class)]
class Sample
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $institution_id;

    #[ORM\Column(type: 'integer')]
    private $species_id;

    #[ORM\Column(type: 'integer')]
    private $location_id;

    #[ORM\Column(type: 'integer')]
    private $project_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $subproject_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $collection_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $field_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $collector_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $taxonomist_name;

    #[ORM\Column(type: 'datetime')]
    private $data_collect;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $extra_informmation;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $image;

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

    public function getSpeciesId(): ?int
    {
        return $this->species_id;
    }

    public function setSpeciesId(int $species_id): self
    {
        $this->species_id = $species_id;

        return $this;
    }

    public function getLocationId(): ?int
    {
        return $this->location_id;
    }

    public function setLocationId(int $location_id): self
    {
        $this->location_id = $location_id;

        return $this;
    }

    public function getProjectId(): ?int
    {
        return $this->project_id;
    }

    public function setProjectId(int $project_id): self
    {
        $this->project_id = $project_id;

        return $this;
    }

    public function getSubprojectId(): ?int
    {
        return $this->subproject_id;
    }

    public function setSubprojectId(?int $subproject_id): self
    {
        $this->subproject_id = $subproject_id;

        return $this;
    }

    public function getCollectionId(): ?int
    {
        return $this->collection_id;
    }

    public function setCollectionId(?int $collection_id): self
    {
        $this->collection_id = $collection_id;

        return $this;
    }

    public function getFieldId(): ?int
    {
        return $this->field_id;
    }

    public function setFieldId(?int $field_id): self
    {
        $this->field_id = $field_id;

        return $this;
    }

    public function getCollectorName(): ?string
    {
        return $this->collector_name;
    }

    public function setCollectorName(string $collector_name): self
    {
        $this->collector_name = $collector_name;

        return $this;
    }

    public function getTaxonomistName(): ?string
    {
        return $this->taxonomist_name;
    }

    public function setTaxonomistName(string $taxonomist_name): self
    {
        $this->taxonomist_name = $taxonomist_name;

        return $this;
    }

    public function getDataCollect(): ?\DateTimeInterface
    {
        return $this->data_collect;
    }

    public function setDataCollect(\DateTimeInterface $data_collect): self
    {
        $this->data_collect = $data_collect;

        return $this;
    }

    public function getExtraInformmation(): ?string
    {
        return $this->extra_informmation;
    }

    public function setExtraInformmation(?string $extra_informmation): self
    {
        $this->extra_informmation = $extra_informmation;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }
}
