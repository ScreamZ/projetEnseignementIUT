<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 19:34
 */

namespace KMGH\AppBundle\Managers;


class AttributionManager extends BaseManager
{

    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:Attribution');
    }
}