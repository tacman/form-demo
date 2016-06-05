<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('line1', TextType::class);
        $builder->add('line2', TextType::class, array('required' => false));
        $builder->add('line3', TextType::class, array('required' => false));
        $builder->add('postcode', TextType::class);
    }

    public function getBlockPrefix()
    {
        return 'address';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Address',
        ));
    }
}
