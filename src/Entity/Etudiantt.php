<?php

namespace App\Entity;

use App\Repository\EtudianttRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudianttRepository::class)]
class Etudiantt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $nce = null;

    // Relation OneToOne : Un étudiant peut avoir une seule soutenance
    #[ORM\OneToOne(mappedBy: 'etudiantt', targetEntity: Soutenance::class)]
    private $soutenance;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNce(): ?int
    {
        return $this->nce;
    }

    public function setNce(int $nce): static
    {
        $this->nce = $nce;

        return $this;
    }

    public function getSoutenance(): ?Soutenance
    {
        return $this->soutenance;
    }

    public function setSoutenance(?Soutenance $soutenance): self
    {
        $this->soutenance = $soutenance;
        return $this;
    }

}
