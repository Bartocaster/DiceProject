<?php
// src/Entity/RacialTrait.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RacialTraitRepository")
 */
class RacialTrait
{
    #[ORM\Column(length: 50)]
    private ?string $Race = null;

    #[ORM\Column(length: 50)]
    private ?string $Size = null;

    #[ORM\Column(length: 50)]
    private ?string $Speed = null;

    #[ORM\Column(length: 255)]
    private ?string $ExtraLanguage = null;

    // Define properties and mapping annotations

    public function getRace(): ?string
    {
        return $this->Race;
    }

    public function setRace(string $Race): static
    {
        $this->Race = $Race;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->Size;
    }

    public function setSize(string $Size): static
    {
        $this->Size = $Size;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->Speed;
    }

    public function setSpeed(string $Speed): static
    {
        $this->Speed = $Speed;

        return $this;
    }

    public function getExtraLanguage(): ?string
    {
        return $this->ExtraLanguage;
    }

    public function setExtraLanguage(string $ExtraLanguage): static
    {
        $this->ExtraLanguage = $ExtraLanguage;

        return $this;
    }
}
