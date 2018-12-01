<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Paints
{
    /**
     * @Assert\Count(min=1)
     * @var array
     */
    public $paints;
}
