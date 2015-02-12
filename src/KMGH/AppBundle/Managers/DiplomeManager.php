<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 20:35
 */

namespace KMGH\AppBundle\Managers;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class DiplomeManager extends BaseManager
{
    private $container;

    function __construct(EntityManager $em, Container $container)
    {
        parent::__construct($em);
        $this->container = $container;

    }

    public function jsonFindDiplomeByTypeDiplomeId($id)
    {
        $lesDiplomes = $this->getRepository()->findDiplomeByTypeDiplomeId($id);
        $serializer = $this->container->get('jms_serializer');
        return $serializer->serialize($lesDiplomes, 'json');
    }

    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:Diplome');
    }


}