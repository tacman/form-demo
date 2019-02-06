<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Infinite\FormBundle\Attachment\Attachment;

/**
 * @ORM\Entity
 */
class ApplianceManual extends Attachment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     * @var null|int
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
