<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceProductLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productName', TextType::class);
        $builder->add('unitPrice', NumberType::class);
        $builder->add('quantity', NumberType::class);

        $builder->add('_type', HiddenType::class, array(
            'data'   => $this->getBlockPrefix(),
            'mapped' => false
        ));
    }

    public function getBlockPrefix()
    {
        return 'invoice_product_line';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Model\InvoiceProductLine',
            'model_class' => 'AppBundle\Model\InvoiceProductLine',
        ]);
    }
}
