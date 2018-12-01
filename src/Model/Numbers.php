<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Numbers
{
    /**
     * @Assert\Count(min=1)
     * @var int[]
     */
    public $numbers = [];
}
