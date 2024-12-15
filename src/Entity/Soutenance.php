<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoutenanceRepository::class)]
class Soutenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numjury = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_soutenance = null;

    #[ORM\Column]
    private ?float $note = null;

    // Relation ManyToOne : Une soutenance est supervisée par un enseignant
    #[ORM\ManyToOne(targetEntity: Enseignant::class, inversedBy: 'soutenances')]
    #[ORM\JoinColumn(nullable: false)]
    private $enseignant;

    // Relation OneToOne : Une soutenance est liée à un étudiant
    #[ORM\OneToOne(targetEntity: Etudiantt::class, inversedBy: 'soutenance')]
    #[ORM\JoinColumn(nullable: false)]
    private $etudiantt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumjury(): ?int
    {
        return $this->numjury;
    }

    public function setNumjury(int $numjury): static
    {
        $this->numjury = $numjury;

        return $this;
    }

    public function getDateSoutenance(): ?\DateTimeInterface
    {
        return $this->date_soutenance;
    }

    public function setDateSoutenance(\DateTimeInterface $date_soutenance): static
    {
        $this->date_soutenance = $date_soutenance;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }
    // Getter et Setter pour la propriété Enseignant
    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): static
    {
        $this->enseignant = $enseignant;
        return $this;
    }

    // Getter et Setter pour la propriété Etudiantt
    public function getEtudiantt(): ?Etudiantt
    {
        return $this->etudiantt;
    }

    public function setEtudiantt(?Etudiantt $etudiantt): static
    {
        $this->etudiantt = $etudiantt;
        return $this;
    }
}
