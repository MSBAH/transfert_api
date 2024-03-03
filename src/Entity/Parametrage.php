<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ParametrageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametrageRepository::class)]
#[ApiResource]
class Parametrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $codeAgence = null;

    #[ORM\Column(nullable: true)]
    private ?float $commissionEnvoie = null;

    #[ORM\Column(nullable: true)]
    private ?float $commissionRemise = null;

    #[ORM\Column(nullable: true)]
    private ?float $fraieEnvoie = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $rattacherA = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creerLe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCodeAgence(): ?string
    {
        return $this->codeAgence;
    }

    public function setCodeAgence(string $codeAgence): static
    {
        $this->codeAgence = $codeAgence;

        return $this;
    }

    public function getCommissionEnvoie(): ?float
    {
        return $this->commissionEnvoie;
    }

    public function setCommissionEnvoie(?float $commissionEnvoie): static
    {
        $this->commissionEnvoie = $commissionEnvoie;

        return $this;
    }

    public function getCommissionRemise(): ?float
    {
        return $this->commissionRemise;
    }

    public function setCommissionRemise(?float $commissionRemise): static
    {
        $this->commissionRemise = $commissionRemise;

        return $this;
    }

    public function getFraieEnvoie(): ?float
    {
        return $this->fraieEnvoie;
    }

    public function setFraieEnvoie(?float $fraieEnvoie): static
    {
        $this->fraieEnvoie = $fraieEnvoie;

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

    public function getCreerLe(): ?\DateTimeImmutable
    {
        return $this->creerLe;
    }

    public function setCreerLe(\DateTimeImmutable $creerLe): static
    {
        $this->creerLe = $creerLe;

        return $this;
    }
}
