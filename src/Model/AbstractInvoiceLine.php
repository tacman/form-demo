<?php

namespace App\Model;

abstract class AbstractInvoiceLine
{
    /**
     * @return string
     */
    public abstract function getDescription();

    /**
     * @return float
     */
    public abstract function getQuantity();

    /**
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->getQuantity() * $this->getUnitPrice();
    }

    /**
     * @return float
     */
    public abstract function getUnitPrice();
}
