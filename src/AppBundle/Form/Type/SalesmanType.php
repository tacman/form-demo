<?php

namespace AppBundle\Form\Type;

use Entity\Area;
use Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SalesmanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'required' => false,
        ));

        $builder->add('productAreas', 'infinite_form_entity_checkbox_grid', array(
            'class' => 'Entity\SalesmanProductArea',
            'x_path' => 'productSold',
            'y_path' => 'areaServiced',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'salesman';
    }
}
