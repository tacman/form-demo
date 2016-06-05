<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NumbersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numbers', 'collection', array(
            'type'         => 'number',
            'allow_add'    => true,
            'allow_delete' => true,
            'error_bubbling' => false,
        ));
    }

    public function getName()
    {
        return 'numbers';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Numbers',
        ));
    }
}
