<?php

namespace AppBundle\Form\Type;

use Entity\Area;
use Entity\Product;
use Infinite\FormBundle\Form\Type\EntityCheckboxGridType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SalesmanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'required' => false,
        ]);

        $builder->add('productAreas', EntityCheckboxGridType::class, [
            'class' => 'Entity\SalesmanProductArea',
            'x_path' => 'productSold',
            'y_path' => 'areaServiced',
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix()
    {
        return 'salesman';
    }
}
