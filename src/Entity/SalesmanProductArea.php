<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A mapping that represents that a specific salesman can sell a specific product in a specific area.
 *
 * @ORM\Entity
 */
class SalesmanProductArea
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumn(onDelete="CASCADE")
     *
     * @var Area
     */
    protected $areaServiced;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @ORM\JoinColumn(onDelete="CASCADE")
     *
     * @var Salesman
     */
    protected $productSold;

    /**
     * @ORM\ManyToOne(targetEntity="Salesman", inversedBy="productAreas")
     * @ORM\JoinColumn(onDelete="CASCADE")
     *
     * @var Salesman
     */
    protected $salesman;

    public function getAreaServiced()
    {
        return $this->areaServiced;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProductSold()
    {
        return $this->productSold;
    }

    public function getSalesman()
    {
        return $this->salesman;
    }

    public function setAreaServiced(Area $areaServiced)
    {
        $this->areaServiced = $areaServiced;
    }

    public function setProductSold(Product $productSold)
    {
        $this->productSold = $productSold;
    }

    public function setSalesman(Salesman $salesman)
    {
        $this->salesman = $salesman;
    }
}
