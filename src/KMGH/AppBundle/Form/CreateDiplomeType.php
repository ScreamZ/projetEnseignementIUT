<?php

namespace KMGH\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreateDiplomeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            "diplome",
            'text'
        )
            ->add('Créer', 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kmgh_appbundle_diplome_creer';
    }
}
