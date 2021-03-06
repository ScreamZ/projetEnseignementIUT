<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PeriodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PeriodeRepository extends EntityRepository
{
    /**
     * Permet de récupéer un ensemble de périodes correspondant à un enseignement donné passé en paramètre.
     *
     * @param $enseignement est un objet enseignement
     *
     * @return array listes des périodes
     */
    public function findPeriodeByEnseignementId(Enseignement $enseignement)
    {
        $qb = $this->createQueryBuilder('p')
            ->innerJoin('p.lesEnseignements','enseignement')
            ->where('enseignement = :enseignement')
            ->setParameter('enseignement',$enseignement);

        return $qb->getQuery()->getResult();
    }

}
