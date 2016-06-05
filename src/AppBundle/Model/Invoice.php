<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Invoice
{
    /**
     * @Assert\Valid
     * @Assert\Count(min=1)
     * @var AbstractInvoiceLine[]
     */
    public $lines;

    /**
     * @Assert\NotBlank
     * @var string
     */
    public $recipient;

    public function getTotal()
    {
        $total = 0;

        foreach ($this->lines as $line) {
            $total += $line->getTotalPrice();
        }

        return $total;
    }
}
