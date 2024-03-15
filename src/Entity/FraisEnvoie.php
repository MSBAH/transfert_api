<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FraisEnvoieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FraisEnvoieRepository::class)]
#[ApiResource]
class FraisEnvoie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $fraisNatiion = null;

    #[ORM\Column]
    private ?float $fraisInter = null;

    #[ORM\Column(length: 50)]
    private ?string $agence = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creerLe = null;

    #[ORM\Column]
    private ?bool $actif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFraisNatiion(): ?float
    {
        return $this->fraisNatiion;
    }

    public function setFraisNatiion(float $fraisNatiion): static
    {
        $this->fraisNatiion = $fraisNatiion;

        return $this;
    }

    public function getFraisInter(): ?float
    {
        return $this->fraisInter;
    }

    public function setFraisInter(float $fraisInter): static
    {
        $this->fraisInter = $fraisInter;

        return $this;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): static
    {
        $this->agence = $agence;

        return $this;
    }

    public function getCreerLe(): ?\DateTimeInterface
    {
        return $this->creerLe;
    }

    public function setCreerLe(\DateTimeInterface $creerLe): static
    {
        $this->creerLe = $creerLe;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }
}
