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


   protected function persistAndFlush($entity)
   {
      $this->em->persist($entity);
      $this->em->flush();
   }

   abstract protected function getRepository();
}