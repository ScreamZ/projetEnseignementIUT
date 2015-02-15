<?php
/**
 * Created by PhpStorm.
 * User: Mourad
 * Date: 12/02/2015
 * Time: 13:05
 */

namespace KMGH\AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MatiereType extends AbstractType
{

    /**
     * Permet de créer un formulaire de type "entity"("select") avec des "choices"
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            "typeDiplome",
            'entity',
            array(
                'class' => 'KMGH\AppBundle\Entity\TypeDiplome',
                'property' => 'nom',
                'placeholder' => '-- Type Diplôme --'
            )
        )
            ->add(
                'diplome',
                'choice',
                array(
                    'expanded' => false,
                    'multiple' => false
                )
            )
            ->add(
                'enseignement',
                'choice',
                array(
                    'expanded' => false,
                    'multiple' => false
                )
            )
            ->add(
                'periode',
                'choice',
                array(
                    'expanded' => false,
                    'multiple' => false
                )
            );
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "kmgh_app_enseignement";
    }


}