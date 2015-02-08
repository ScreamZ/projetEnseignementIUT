<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 12:15
 */

namespace KMGH\AppBundle\Managers;


use KMGH\AppBundle\Entity\Enseignement;
use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\Projet;
use KMGH\AppBundle\Entity\Stage;
use Symfony\Component\Process\Exception\LogicException;

class TypeDiplomeManager extends BaseManager
{
    /**
     * Récupère la liste des diplômes et effectue une jointure de type innerjoin afin d'éviter le LAZY Loading
     *
     * @return array
     */
    public function findAll()
    {
        return $this->getRepository()->findAllWithJoin();
    }

    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:TypeDiplome');
    }
}