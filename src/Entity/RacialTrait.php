<?php
// src/Entity/RacialTrait.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RacialTraitRepository")
 *  @ORM\Table(name="racial_traits") // Specify the custom table name here
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

    #[ORM\Column(length: 70)]
    private ?string $AbilityBonus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RacialAbility = null;

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

    public function getAbilityBonus(): ?string
    {
        return $this->AbilityBonus;
    }

    public function setAbilityBonus(string $AbilityBonus): static
    {
        $this->AbilityBonus = $AbilityBonus;

        return $this;
    }

    public function getRacialAbility(): ?string
    {
        return $this->RacialAbility;
    }

    public function setRacialAbility(?string $RacialAbility): static
    {
        $this->RacialAbility = $RacialAbility;

        return $this;
    }
}
