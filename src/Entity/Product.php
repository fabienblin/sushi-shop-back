<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource
 */
class Product
{
    const TYPES = [
        "Starter",
        "Maki & Sushi",
        "Maki Only",
        "Sushi Only",
        "Condiment",
        "Dessert",
        "Drink"
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\NotBlank
     */
    public string $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices=Product::TYPES)
     * @Assert\NotBlank
     */
    public string $type;

    public function getId(): ?int
    {
        return $this->id;
    }
}
