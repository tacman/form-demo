<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Customer
{
    /**
     * @Assert\Valid
     * @Assert\Count(min=1)
     * @var Address[]
     */
    public $addresses;

    /**
     * @Assert\NotBlank
     * @var string
     */
    public $name;
}
