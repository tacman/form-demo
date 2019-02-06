<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Appliance
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     *
     * @var int
     */
    protected $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=200)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="ApplianceManual", cascade={"persist"}, orphanRemoval=true)
     * @var ApplianceManual|null
     */
    protected $manual;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ApplianceManual|null
     */
    public function getManual(): ?ApplianceManual
    {
        return $this->manual;
    }

    /**
     * @param ApplianceManual|null $manual
     */
    public function setManual(?ApplianceManual $manual): void
    {
        $this->manual = $manual;
    }
}
