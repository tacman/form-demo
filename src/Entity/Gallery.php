<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     * @var null|int
     */
    protected $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string")
     * @var string
     */
    protected $title = '';

    /**
     * @ORM\OneToMany(targetEntity="GalleryItem", mappedBy="gallery", cascade={"persist"}, orphanRemoval=true)
     * @var Collection|GalleryItem[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = new ArrayCollection;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title !== null ? $title : '';
    }

    /**
     * @return GalleryItem[]|Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    public function addItem(GalleryItem $galleryItem)
    {
        $this->items->add($galleryItem);
        $galleryItem->setGallery($this);
    }

    public function removeItem(GalleryItem $galleryItem)
    {
        $this->items->removeElement($galleryItem);
    }
}
