<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource
 */
class Menu
{
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
    public string $name = "";

    /**
     * @ORM\OneToMany(targetEntity="OrderrMenu", mappedBy="menu")
     */
    public iterable $orderrs;

    /**
     * @ORM\OneToMany(targetEntity="MenuRecipe", mappedBy="menu")
     */
    public iterable $recipies;

    public function __construct()
    {
        $this->recipies = new ArrayCollection();
        $this->orderrs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
