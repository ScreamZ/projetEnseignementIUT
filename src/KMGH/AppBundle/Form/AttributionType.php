<?php

namespace KMGH\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttributionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enseignant', 'entity', array(
                'class' => 'KMGH\UserBundle\Entity\Enseignant', // TODO : Faire une reqûete pour éviter d'ajouter quelqu'un déjà existant + gérer ça en JS
            ))
            ->add('enseignement', 'entity',
                array(
                    'class' => 'KMGH\AppBundle\Entity\Module' // FIXME : Gérer le distinct pour duplicate module ? Gérer Projet et Stage ?
                ))
            ->add('nombreHeuresCM', 'number', array(
                'precision' => 1,

            ))
            ->add('nombreHeuresTD', 'number', array(
                'precision' => 1,

            ))
            ->add('nombreHeuresTP', 'number', array(
                'precision' => 1,

            ))
            ->add('submit', 'submit');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KMGH\AppBundle\Entity\Attribution',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kmgh_appbundle_attribution';
    }
}
