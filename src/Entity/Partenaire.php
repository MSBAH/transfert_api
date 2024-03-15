<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PartenaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireRepository::class)]
#[ApiResource]
class Partenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $commissionNation = null;

    #[ORM\Column]
    private ?float $commissionInter = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creerLe = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\Column(length: 50)]
    private ?string $agence = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $rattacherA = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommissionNation(): ?float
    {
        return $this->commissionNation;
    }

    public function setCommissionNation(float $commissionNation): static
    {
        $this->commissionNation = $commissionNation;

        return $this;
    }

    public function getCommissionInter(): ?float
    {
        return $this->commissionInter;
    }

    public function setCommissionInter(float $commissionInter): static
    {
        $this->commissionInter = $commissionInter;

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

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): static
    {
        $this->agence = $agence;

        return $this;
    }

    public function getRattacherA(): ?string
    {
        return $this->rattacherA;
    }

    public function setRattacherA(?string $rattacherA): static
    {
        $this->rattacherA = $rattacherA;

        return $this;
    }
}
