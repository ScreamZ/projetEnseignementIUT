<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 12:34
 */

namespace KMGH\AppBundle\Managers;


use Doctrine\ORM\EntityManager;

abstract class BaseManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function persist($entity, $andFlush = true)
    {
        $this->em->persist($entity);
        if ($andFlush) {
            $this->em->flush();
        }
    }

    public function remove($entity, $andFlush = true)
    {
        $this->em->remove($entity);
        if ($andFlush) {
            $this->em->flush();
        }
    }

    abstract public function getRepository();
}