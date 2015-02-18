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

    public function findEnseignementsByIdsSelected($idsObjDdata){
        $qb = $this->createQueryBuilder('e')
            ->innerJoin('e.diplome','diplome')
            ->addSelect('diplome')
            ->innerJoin('diplome.typeDiplome','typeDiplome')
            ->addSelect('typeDiplome')
            ->innerJoin('typeDiplome.lesDiplomes','lesDiplomes')
            ->addSelect('lesDiplomes')
            ->innerJoin('lesDiplomes.lesEnseignements','lesEnseignements')
            ->addSelect('lesEnseignements')
            ->innerJoin('lesEnseignements.periodes','periodes')
            ->where('typeDiplome = :typeDiplome')
            ->andWhere('diplome = :diplome')
            ->andWhere('lesEnseignements = :enseignement')
            ->andWhere('periodes = :periode')
            ->andWhere('e.id = :identifier')
            ->setParameters(array(
                'typeDiplome' => $idsObjDdata['typeDiplome'],
                'diplome' => $idsObjDdata["diplome"],
                'enseignement' => $idsObjDdata["enseignement"],
                'identifier' => $idsObjDdata["enseignement"],
                'periode' => $idsObjDdata["periode"]
                )) ;

        return $qb->getQuery()->getResult();

    }

}
