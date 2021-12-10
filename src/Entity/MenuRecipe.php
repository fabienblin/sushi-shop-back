<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource
 */
class MenuRecipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="Recipe", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     * @Assert\NotNull
     */
    public ?Recipe $recipe;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
     * @Assert\NotNull
     */
    public ?Menu $menu;


    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    public int $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }
}
