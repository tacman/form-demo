<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InvoiceServiceLine extends AbstractInvoiceLine
{
    /**
     * @Assert\NotBlank
     * @var string
     */
    protected $description;

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
        return $this->description;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }
}
