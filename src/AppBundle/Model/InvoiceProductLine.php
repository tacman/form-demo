<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InvoiceProductLine extends AbstractInvoiceLine
{
    /**
     * @Assert\NotBlank
     * @var string
     */
    protected $productName;

    /**
     * @Assert\NotBlank
     * @var float
     */
    protected $quantity;

    /**
     * @Assert\NotBlank
     * @var float
     */
    protected $unitPrice;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->productName;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }
}
