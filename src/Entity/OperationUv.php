<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OperationUvRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationUvRepository::class)]
#[ApiResource]
class OperationUv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $codeAgence = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(length: 50)]
    private ?string $devise = null;

    #[ORM\Column(length: 50)]
    private ?string $typeOperation = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creeLe = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $libelleOperation = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $recharge = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $codeTransaction = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $provenance = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $realisePar = null;

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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDevise(): ?string
    {
        return $this->devise;
    }

    public function setDevise(string $devise): static
    {
        $this->devise = $devise;

        return $this;
    }

    public function getTypeOperation(): ?string
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(string $typeOperation): static
    {
        $this->typeOperation = $typeOperation;

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

    public function getLibelleOperation(): ?string
    {
        return $this->libelleOperation;
    }

    public function setLibelleOperation(?string $libelleOperation): static
    {
        $this->libelleOperation = $libelleOperation;

        return $this;
    }

    public function getRecharge(): ?string
    {
        return $this->recharge;
    }

    public function setRecharge(?string $recharge): static
    {
        $this->recharge = $recharge;

        return $this;
    }

    public function getCodeTransaction(): ?string
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(?string $codeTransaction): static
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(?string $provenance): static
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getRealisePar(): ?string
    {
        return $this->realisePar;
    }

    public function setRealisePar(?string $realisePar): static
    {
        $this->realisePar = $realisePar;

        return $this;
    }
}
