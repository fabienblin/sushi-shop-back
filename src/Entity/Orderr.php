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
class Orderr
{
    const STATUS = [
        "Saved",
        "Payed",
        "Preparation",
        "Prepared",
        "Delivering",
        "Delivered"
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orderr")
     */
    public ?Customer $customer = null;

    /**
     * @ORM\OneToMany(targetEntity="OrderrMenu", mappedBy="orderr")
     */
    public iterable $menues;

    public function __construct()
    {
        $this->menues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
