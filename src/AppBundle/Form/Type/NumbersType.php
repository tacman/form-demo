<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NumbersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numbers', CollectionType::class, [
            'entry_type'     => NumberType::class,
            'allow_add'      => true,
            'allow_delete'   => true,
            'error_bubbling' => false,
        ]);
    }

    public function getBlockPrefix()
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
