<?php
// src/Entity/RacialTrait.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'racial_traits')]
class RacialTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $size = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $speed = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $extraLanguage = null;

    #[ORM\Column(type: 'string', length: 70)]
    private ?string $abilityBonus = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $racialAbility = null;

    #[ORM\ManyToOne(targetEntity: Race::class, inversedBy: 'racialTraits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    // Getters and Setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getExtraLanguage(): ?string
    {
        return $this->extraLanguage;
    }

    public function setExtraLanguage(string $extraLanguage): self
    {
        $this->extraLanguage = $extraLanguage;

        return $this;
    }

    public function getAbilityBonus(): ?string
    {
        return $this->abilityBonus;
    }

    public function setAbilityBonus(string $abilityBonus): self
    {
        $this->abilityBonus = $abilityBonus;

        return $this;
    }

    public function getRacialAbility(): ?string
    {
        return $this->racialAbility;
    }

    public function setRacialAbility(?string $racialAbility): self
    {
        $this->racialAbility = $racialAbility;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(Race $race): self
    {
        $this->race = $race;

        return $this;
    }
}
