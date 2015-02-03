<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periode
 *
 * @ORM\Table(uniqueConstraints={
 *      @ORM\UniqueConstraint(name="unique_periode", columns={"annee","semestre"})
 * })
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\PeriodeRepository")
 */
class Periode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="semestre", type="integer")
     */
    private $semestre;

    /**
     * @var Enseignement
     *
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Enseignement", inversedBy="periodes")
     */
    private $lesEnseignements;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesEnseignements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get annee
     *
     * @return integer
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Periode
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return integer
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set semestre
     *
     * @param integer $semestre
     *
     * @return Periode
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Add lesEnseignements
     *
     * @param \KMGH\AppBundle\Entity\Enseignement $lesEnseignements
     *
     * @return Periode
     */
    public function addLesEnseignement(\KMGH\AppBundle\Entity\Enseignement $lesEnseignements)
    {
        $this->lesEnseignements[] = $lesEnseignements;

        return $this;
    }

    /**
     * Remove lesEnseignements
     *
     * @param \KMGH\AppBundle\Entity\Enseignement $lesEnseignements
     */
    public function removeLesEnseignement(\KMGH\AppBundle\Entity\Enseignement $lesEnseignements)
    {
        $this->lesEnseignements->removeElement($lesEnseignements);
    }

    /**
     * Get lesEnseignements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesEnseignements()
    {
        return $this->lesEnseignements;
    }
}
