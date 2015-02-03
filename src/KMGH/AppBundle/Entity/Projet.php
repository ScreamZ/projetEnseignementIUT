<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="Projet")
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\ProjetRepository")
 */
class Projet extends Enseignement
{
    /**
     * @var Integer
     * @ORM\Column(name="nb_heures_par_etudiants", type="integer")
     */
    private $nbHeuresParEtudiants;

    /**
     * @var Integer
     * @ORM\Column(name="nb_etudiants",type="integer")
     */
    private $nbEtudiants;

    /**
     * Multiplie le nombre d'heures par étudiant par le nombre d'étudiants afin d'obtenir le nombre d'heure total pour le projet
     *
     * @return int Le nombre total heure pour le projet
     */
    private function getNbTotalHeureProjet()
    {
        return $this->getNbEtudiants() * $this->getNbHeuresParEtudiants();
    }

    /**
     * Get nbEtudiants
     *
     * @return integer
     */
    public function getNbEtudiants()
    {
        return $this->nbEtudiants;
    }

    /**
     * Set nbEtudiants
     *
     * @param integer $nbEtudiants
     *
     * @return Projet
     */
    public function setNbEtudiants($nbEtudiants)
    {
        $this->nbEtudiants = $nbEtudiants;

        return $this;
    }

    /**
     * Get nbHeuresParEtudiants
     *
     * @return integer
     */
    public function getNbHeuresParEtudiants()
    {
        return $this->nbHeuresParEtudiants;
    }

    /**
     * Set nbHeuresParEtudiants
     *
     * @param integer $nbHeuresParEtudiants
     *
     * @return Projet
     */
    public function setNbHeuresParEtudiants($nbHeuresParEtudiants)
    {
        $this->nbHeuresParEtudiants = $nbHeuresParEtudiants;

        return $this;
    }
}
