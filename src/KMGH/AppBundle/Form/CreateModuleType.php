<?php

namespace KMGH\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreateModuleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'denomination',
                'text',
                array(
                    'label' => 'Nom du module'
                )
            )
            ->add('Creer le module', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'KMGH\AppBundle\Entity\Module'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kmgh_appbundle_module';
    }
}
