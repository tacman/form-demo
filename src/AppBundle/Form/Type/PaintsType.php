<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ArrayKeyChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaintsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paints', 'infinite_form_checkbox_grid', array(
            'x_choices' => array(
                'white' => 'White',
                'beige' => 'Beige',
                'yellow' => 'Yellow',
            ),
            'x_path' => '[color]',
            'y_choices' => array(
                'matte' => 'Matte',
                'satin' => 'Satin',
                'gloss' => 'Gloss',
                'high_gloss' => 'High gloss',
            ),
            'y_path' => '[finish]',
        ));
    }

    public function getName()
    {
        return 'paints';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Model\Paints',
        ));
    }
}
