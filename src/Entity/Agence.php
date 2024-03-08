<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
#[ApiResource]
class Agence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $codeAgence = null;

    #[ORM\Column(length: 150)]
    private ?string $telephone = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $estPartenaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creeLe = null;

    #[ORM\Column(length: 100)]
    private ?string $pays = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'agence', targetEntity: User::class, orphanRemoval: true)]
    private Collection $agents;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'agences')]
    private ?self $partenaierDe = null;

    #[ORM\OneToMany(mappedBy: 'partenaierDe', targetEntity: self::class)]
    private Collection $agences;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
        $this->agences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isEstPartenaire(): ?bool
    {
        return $this->estPartenaire;
    }

    public function setEstPartenaire(bool $estPartenaire): static
    {
        $this->estPartenaire = $estPartenaire;

        return $this;
    }

    public function getCreeLe(): ?\DateTimeInterface
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTimeInterface $creeLe): static
    {
        $this->creeLe = $creeLe;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(User $agent): static
    {
        if (!$this->agents->contains($agent)) {
            $this->agents->add($agent);
            $agent->setAgence($this);
        }

        return $this;
    }

    public function removeUser(User $agent): static
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getAgence() === $this) {
                $agent->setAgence(null);
            }
        }

        return $this;
    }

    public function getPartenaierDe(): ?self
    {
        return $this->partenaierDe;
    }

    public function setPartenaierDe(?self $partenaierDe): static
    {
        $this->partenaierDe = $partenaierDe;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAgences(): Collection
    {
        return $this->agences;
    }

    public function addAgence(self $agence): static
    {
        if (!$this->agences->contains($agence)) {
            $this->agences->add($agence);
            $agence->setPartenaierDe($this);
        }

        return $this;
    }

    public function removeAgence(self $agence): static
    {
        if ($this->agences->removeElement($agence)) {
            // set the owning side to null (unless already changed)
            if ($agence->getPartenaierDe() === $this) {
                $agence->setPartenaierDe(null);
            }
        }

        return $this;
    }
}
