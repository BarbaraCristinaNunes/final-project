<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $adm;

    #[ORM\Column(type: 'boolean')]
    private $online;
    
    #[ORM\Column(type: 'integer')]
    private $institution_id;

    public function __construct(string $username, string $email, string $password, bool $adm, bool $online, int $institution_id)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->adm = $adm;
        $this->online = $online;
        $this->institution_id = $institution_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdm(): ?bool
    {
        return $this->adm;
    }

    public function setAdm(string $adm): self
    {
        $this->adm = $adm;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }
    
    public function getInstituitionId(): ?string
    {
        return $this->instituition;
    }

    public function setInstituitionId(string $institution_id): self
    {
        $this->instituition = $instituition;

        return $this;
    }
}
