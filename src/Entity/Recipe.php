<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ApiResource
 */
class Recipe
{
    const TYPES = [
        "Starter",
        "Maki",
        "Sushi",
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
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    public string $name = "";

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices=Recipe::TYPES)
     * @Assert\NotBlank
     */
    public string $type;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    public ?Customer $customer = null;

    /**
     * @ORM\OneToMany(targetEntity="MenuRecipe", mappedBy="recipe")
     */
    public iterable $menues;

    /**
     * @ORM\ManyToMany(targetEntity="Product")
     */
    public iterable $products;

    public function __construct()
    {
        $this->menues = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
