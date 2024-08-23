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
}
