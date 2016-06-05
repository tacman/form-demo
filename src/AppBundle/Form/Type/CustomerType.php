<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('addresses', 'collection', array(
            'type'         => 'address',
            'allow_add'    => true,
            'allow_delete' => true,
            'error_bubbling' => false,
        ));
    }

    public function getName()
    {
        return 'customer';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Customer',
        ));
    }
}
