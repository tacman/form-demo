<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An employee who works in sales.
 *
 * @ORM\Entity
 */
class Salesman
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
     * @Assert\NotBlank
     *
     * @ORM\Column(type="string", length=50)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="SalesmanProductArea", mappedBy="salesman", cascade={"all"}, orphanRemoval=true)
     *
     * @var ArrayCollection|SalesmanProductArea[]
     */
    protected $productAreas;

    public function __construct()
    {
        $this->productAreas = new ArrayCollection;
    }

    public function addProductArea(SalesmanProductArea $productArea)
    {
        $this->productAreas->add($productArea);
        $productArea->setSalesman($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProductAreas()
    {
        return $this->productAreas;
    }

    public function removeProductArea(SalesmanProductArea $productArea)
    {
        $this->productAreas->removeElement($productArea);
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
