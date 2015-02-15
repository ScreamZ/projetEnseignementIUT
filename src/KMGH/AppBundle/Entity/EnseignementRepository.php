<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EnseignementRepository extends EntityRepository
{

    /**
     * Permet de récupéer un ensemble d'enseignements correspondant à un diplome donné passé en paramètre.
     *
     * @param Diplome $diplome
     *
     * @return array liste des enseignements
     */
    public function findEnseignementByDiplomeId(Diplome $diplome)
    {
        $qb = $this->createQueryBuilder('e')
            ->where('e.diplome = :enseignement')
            ->setParameter('enseignement',$diplome);

        return $qb->getQuery()->getResult();
    }

}
