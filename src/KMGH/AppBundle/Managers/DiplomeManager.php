<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 20:35
 */

namespace KMGH\AppBundle\Managers;


class DiplomeManager extends BaseManager{

    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:Diplome');
    }
}