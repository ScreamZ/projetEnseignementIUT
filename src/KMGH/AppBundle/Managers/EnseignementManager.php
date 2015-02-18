<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 05/02/2015
 * Time: 12:15
 */

namespace KMGH\AppBundle\Managers;


use Doctrine\ORM\EntityManager;
use KMGH\AppBundle\Entity\Enseignement;
use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\Projet;
use KMGH\AppBundle\Entity\Stage;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Process\Exception\LogicException;

class EnseignementManager extends BaseManager
{
    private $container;

    function __construct(EntityManager $em, Container $container)
    {
        parent::__construct($em);
        $this->container = $container;
    }

    /**
     * Une factory permettant de créer un objet qui étend la classe <strong>Enseignement</strong>.
     *
     * @param String $type Le type d'enseignement parmis les valeurs possibles
     *
     * @return Enseignement L'instance d'enseignement
     */
    public function createEnseignement($type)
    {
        switch (strtolower($type)) {
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

    /**
     * Permet de retrouver l'ensemble des enseignements à partir
     * d'un id d'un diplome donné.
     *
     * @param $id pour un diplome
     *
     * @return mixed
     */
    public function jsonFindEnseignementByDiplomeId($id)
    {
        $diplome = $this->container->get('kmgh_app.diplome_manager')->getRepository()->find($id);
        $lesEnseignements = $this->getRepository()->findEnseignementByDiplomeId($diplome);
        $serializer = $this->container->get('jms_serializer');
        return $serializer->serialize($lesEnseignements, 'json');
    }

    /**
     * @param $idsObjDdata
     *
     * @return array
     */
    public function findAllByIdsSelected($idsObjDdata)
    {
        if(!is_array($idsObjDdata)) throw new LogicException('Veuillez passer un tableau de valeurs');
        $lesObjetsEnseignements = $this->getRepository()->findEnseignementsByIdsSelected($idsObjDdata);


        return $lesObjetsEnseignements;
    }

    /**
     *
     *
     * @return \KMGH\AppBundle\Entity\EnseignementRepository
     *
     */
    public function getRepository()
    {
        return $this->em->getRepository('KMGHAppBundle:Enseignement');
    }
}