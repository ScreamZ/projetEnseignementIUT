<?php

namespace KMGH\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeDiplomeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nom',
                'text',
                array(
                    'label' => 'Nom du diplome'
                )
            )
            ->add('Creer le diplome', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'KMGH\AppBundle\Entity\TypeDiplome'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kmgh_appbundle_typediplome';
    }
}
