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

class EnseignementManager extends BaseManager
{
    /**
     * Une factory permettant de créer un objet qui étend la classe <strong>Enseignement</strong>.
     *
     * @param String $type Le type d'enseignement parmis les valeurs possibles
     *
     * @return Enseignement L'instance d'enseignement
     */
    public function createEnseignement($type)
    {
        switch ($type) {
            case 'module':
                return new Module();
            case 'projet':
                return new Projet();
            case 'stage':
                return new Stage();
            default:
                throw new LogicException("Vous ne pouvez pas créer un enseignement de type : $type");
        }
    }

    public function getRepository()
    {
        return $this->em->getRepository('KMGHUserBundle:Enseignement');
    }
}