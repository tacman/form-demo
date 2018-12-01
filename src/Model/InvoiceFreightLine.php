<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InvoiceFreightLine extends AbstractInvoiceLine
{
    /**
     * @Assert\NotBlank
     * @var string
     */
    protected $courier;

    /**
     * @Assert\NotBlank
     * @var float
     */
    protected $unitPrice;

    /**
     * @return string
     */
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return 'Shipping: ' . $this->courier;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return 1;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param string $courier
     */
    public function setCourier($courier)
    {
        $this->courier = $courier;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }
}
