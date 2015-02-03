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
}
