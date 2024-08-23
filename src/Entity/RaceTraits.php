<?php

namespace App\Entity;

use App\Repository\RaceTraitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceTraitsRepository::class)]
class RaceTraits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300, nullable: true)]
    private ?string $Human = null;

    #[ORM\Column(length: 255)]
    private ?string $Halfling = null;

    #[ORM\Column(length: 255)]
    private ?string $Dwarf = null;

    #[ORM\Column(length: 255)]
    private ?string $elf = null;

    #[ORM\Column(length: 255)]
    private ?string $Dragonborn = null;

    #[ORM\Column(length: 255)]
    private ?string $Tiefling = null;

    #[ORM\Column(length: 255)]
    private ?string $HalfElf = null;

    #[ORM\Column(length: 255)]
    private ?string $HalfOrc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHuman(): ?string
    {
        return $this->Human;
    }

    public function setHuman(?string $Human): static
    {
        $this->Human = $Human;

        return $this;
    }

    public function getHalfling(): ?string
    {
        return $this->Halfling;
    }

    public function setHalfling(string $Halfling): static
    {
        $this->Halfling = $Halfling;

        return $this;
    }

    public function getDwarf(): ?string
    {
        return $this->Dwarf;
    }

    public function setDwarf(string $Dwarf): static
    {
        $this->Dwarf = $Dwarf;

        return $this;
    }

    public function getElf(): ?string
    {
        return $this->elf;
    }

    public function setElf(string $elf): static
    {
        $this->elf = $elf;

        return $this;
    }

    public function getDragonborn(): ?string
    {
        return $this->Dragonborn;
    }

    public function setDragonborn(string $Dragonborn): static
    {
        $this->Dragonborn = $Dragonborn;

        return $this;
    }

    public function getTiefling(): ?string
    {
        return $this->Tiefling;
    }

    public function setTiefling(string $Tiefling): static
    {
        $this->Tiefling = $Tiefling;

        return $this;
    }

    public function getHalfElf(): ?string
    {
        return $this->HalfElf;
    }

    public function setHalfElf(string $HalfElf): static
    {
        $this->HalfElf = $HalfElf;

        return $this;
    }

    public function getHalfOrc(): ?string
    {
        return $this->HalfOrc;
    }

    public function setHalfOrc(string $HalfOrc): static
    {
        $this->HalfOrc = $HalfOrc;

        return $this;
    }
}
