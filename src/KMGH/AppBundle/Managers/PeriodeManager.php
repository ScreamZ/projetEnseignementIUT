<?php
/**
 * Created by PhpStorm.
 * User: Mourad
 * Date: 12/02/2015
 * Time: 18:13
 */

namespace KMGH\AppBundle\Managers;

use KMGH\AppBundle\Entity\Periode;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class PeriodeManager extends BaseManager
{

    private $container;

    /**
     * @param EntityManager $em
     * @param Container     $container
     *
     */
    function __construct(EntityManager $em, Container $container)
    {
        parent::__construct($em);
        $this->container = $container;

    }

    /**
     * @param $id
     *
     * @return mixed
     *
     */
    public function jsonFindPeriodeByEnseignementId($id)
    {
        $enseignement = $this->container->get('kmgh_app.enseignement_manager')->getRepository()->find($id);
        $lesPeriodes = $this->getRepository()->findPeriodeByEnseignementId($enseignement);
        $serializer = $this->container->get('jms_serializer');
        return $serializer->serialize($lesPeriodes, 'json');
    }


    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:Periode');
    }
}