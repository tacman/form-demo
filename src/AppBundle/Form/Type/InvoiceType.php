<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recipient', 'text', array(
            'required' => false,
        ));

        $builder->add('lines', 'infinite_form_polycollection', array(
            'required' => false,
            'types' => array(
                'invoice_freight_line',
                'invoice_product_line',
                'invoice_service_line',
            ),
            'allow_add'    => true,
            'allow_delete' => true,
        ));
    }

    public function getName()
    {
        return 'invoice';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Invoice',
        ));
    }
}
