<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A product that we sell.
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @var float
     */
    protected $cost;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @var float
     */
    protected $sellPrice;

    public function getCost()
    {
        return $this->cost;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSellPrice($sellPrice)
    {
        $this->sellPrice = $sellPrice;
    }

    public function __toString()
    {
        return $this->name;
    }
}
