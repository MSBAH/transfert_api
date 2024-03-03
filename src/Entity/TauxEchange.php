<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TauxEchangeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TauxEchangeRepository::class)]
#[ApiResource]
class TauxEchange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $deviseSource = null;

    #[ORM\Column(length: 50)]
    private ?string $deviseCible = null;

    #[ORM\Column]
    private ?float $taux = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creeLe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeviseSource(): ?string
    {
        return $this->deviseSource;
    }

    public function setDeviseSource(string $deviseSource): static
    {
        $this->deviseSource = $deviseSource;

        return $this;
    }

    public function getDeviseCible(): ?string
    {
        return $this->deviseCible;
    }

    public function setDeviseCible(string $deviseCible): static
    {
        $this->deviseCible = $deviseCible;

        return $this;
    }

    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): static
    {
        $this->taux = $taux;

        return $this;
    }

    public function getCreeLe(): ?\DateTimeImmutable
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTimeImmutable $creeLe): static
    {
        $this->creeLe = $creeLe;

        return $this;
    }
}
