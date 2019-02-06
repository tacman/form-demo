<?php

namespace App\Form\Type;

use App\Entity\GalleryItem;
use Infinite\FormBundle\Form\Type\AttachmentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, [
            'required' => false, // For demonstration purposes
        ]);
    }

    public function getBlockPrefix()
    {
        return 'gallery_item';
    }

    public function getParent()
    {
        return AttachmentType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'allowed_mime_types' => ['image/jpeg', 'image/png'],
            'data_class' => GalleryItem::class,
        ]);
    }
}
