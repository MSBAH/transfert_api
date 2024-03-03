<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ApiResource]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creeLe = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $modifieLe = null;

    #[ORM\Column]
    private ?float $montantEnvoyer = null;

    #[ORM\Column(length: 50)]
    private ?string $deviseEnvoie = null;

    #[ORM\Column(length: 50)]
    private ?string $code = null;

    #[ORM\Column]
    private ?float $montantReception = null;

    #[ORM\Column(length: 50)]
    private ?string $deviseReception = null;

    #[ORM\Column(length: 50)]
    private ?string $effectuerPar = null;

    #[ORM\Column(length: 50)]
    private ?string $agenceEffectuerPar = null;

    #[ORM\Column(length: 50)]
    private ?string $payerPar = null;

    #[ORM\Column(length: 50)]
    private ?string $agencePayerPar = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $payerLe = null;

    #[ORM\Column(length: 50)]
    private ?string $paysDepart = null;

    #[ORM\Column(length: 50)]
    private ?string $villeDepart = null;

    #[ORM\Column(length: 50)]
    private ?string $PaysDestination = null;

    #[ORM\Column(length: 50)]
    private ?string $villeDestination = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Expediteur $expediteur = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Destinataire $destinataire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

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

    public function getModifieLe(): ?\DateTimeImmutable
    {
        return $this->modifieLe;
    }

    public function setModifieLe(?\DateTimeImmutable $modifieLe): static
    {
        $this->modifieLe = $modifieLe;

        return $this;
    }

    public function getMontantEnvoyer(): ?float
    {
        return $this->montantEnvoyer;
    }

    public function setMontantEnvoyer(float $montantEnvoyer): static
    {
        $this->montantEnvoyer = $montantEnvoyer;

        return $this;
    }

    public function getDeviseEnvoie(): ?string
    {
        return $this->deviseEnvoie;
    }

    public function setDeviseEnvoie(string $deviseEnvoie): static
    {
        $this->deviseEnvoie = $deviseEnvoie;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getMontantReception(): ?float
    {
        return $this->montantReception;
    }

    public function setMontantReception(float $montantReception): static
    {
        $this->montantReception = $montantReception;

        return $this;
    }

    public function getDeviseReception(): ?string
    {
        return $this->deviseReception;
    }

    public function setDeviseReception(string $deviseReception): static
    {
        $this->deviseReception = $deviseReception;

        return $this;
    }

    public function getEffectuerPar(): ?string
    {
        return $this->effectuerPar;
    }

    public function setEffectuerPar(string $effectuerPar): static
    {
        $this->effectuerPar = $effectuerPar;

        return $this;
    }

    public function getAgenceEffectuerPar(): ?string
    {
        return $this->agenceEffectuerPar;
    }

    public function setAgenceEffectuerPar(string $agenceEffectuerPar): static
    {
        $this->agenceEffectuerPar = $agenceEffectuerPar;

        return $this;
    }

    public function getPayerPar(): ?string
    {
        return $this->payerPar;
    }

    public function setPayerPar(string $payerPar): static
    {
        $this->payerPar = $payerPar;

        return $this;
    }

    public function getAgencePayerPar(): ?string
    {
        return $this->agencePayerPar;
    }

    public function setAgencePayerPar(string $agencePayerPar): static
    {
        $this->agencePayerPar = $agencePayerPar;

        return $this;
    }

    public function getPayerLe(): ?\DateTimeInterface
    {
        return $this->payerLe;
    }

    public function setPayerLe(?\DateTimeInterface $payerLe): static
    {
        $this->payerLe = $payerLe;

        return $this;
    }

    public function getPaysDepart(): ?string
    {
        return $this->paysDepart;
    }

    public function setPaysDepart(string $paysDepart): static
    {
        $this->paysDepart = $paysDepart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getPaysDestination(): ?string
    {
        return $this->PaysDestination;
    }

    public function setPaysDestination(string $PaysDestination): static
    {
        $this->PaysDestination = $PaysDestination;

        return $this;
    }

    public function getVilleDestination(): ?string
    {
        return $this->villeDestination;
    }

    public function setVilleDestination(string $villeDestination): static
    {
        $this->villeDestination = $villeDestination;

        return $this;
    }

    public function getExpediteur(): ?Expediteur
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Expediteur $expediteur): static
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getDestinataire(): ?Destinataire
    {
        return $this->destinataire;
    }

    public function setDestinataire(?Destinataire $destinataire): static
    {
        $this->destinataire = $destinataire;

        return $this;
    }
}
