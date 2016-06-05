<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Address
{
    /**
     * @Assert\NotBlank
     * @var string
     */
    public $line1;

    /**
     * @var string
     */
    public $line2;

    /**
     * @var string
     */
    public $line3;

    /**
     * @Assert\NotBlank
     * @var string
     */
    public $postcode;
}
