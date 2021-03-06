<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TypeDiplomeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TypeDiplomeRepository extends EntityRepository
{
    /**
     * Récupère la liste des types de diplomes et effectue une jointure pour éviter le LAZY LOADING.
     *
     * <h3>Parametrage</h3>
     * <ul>
     *  <li><strong>innerJoin</strong> : Force la présence d'un tuple pour afficher.</li>
     *  <li><strong>leftJoin</strong> : Affiche même si il n'y a pas de tuples.</li>
     * </ul>
     *
     * @return array
     */
    public function findAllWithJoin()
    {
        return $this->createQueryBuilder('type_diplome')
            ->innerJoin('type_diplome.lesDiplomes', 'les_diplomes')
            ->addSelect('les_diplomes')
            ->innerJoin('les_diplomes.lesEnseignements', 'les_enseignements')
            ->addSelect('les_enseignements')
            ->leftJoin('les_enseignements.lesAttributions', 'les_attributions')
            ->addSelect('les_attributions')->getQuery()->getResult();
    }
}
