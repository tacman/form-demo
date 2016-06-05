<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('line1', 'text');
        $builder->add('line2', 'text', array('required' => false));
        $builder->add('line3', 'text', array('required' => false));
        $builder->add('postcode', 'text');
    }

    public function getName()
    {
        return 'address';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Address',
        ));
    }
}
