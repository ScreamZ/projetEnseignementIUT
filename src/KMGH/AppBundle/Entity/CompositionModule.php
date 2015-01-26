<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompositionModule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\CompositionModuleRepository")
 */
class CompositionModule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreHeuresCoursMagistraux", type="integer")
     */
    private $nombreHeuresCoursMagistraux;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreHeuresTD", type="integer")
     */
    private $nombreHeuresTD;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreHeuresTP", type="integer")
     */
    private $nombreHeuresTP;


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
     * Get nombreHeuresCoursMagistraux
     *
     * @return integer
     */
    public function getNombreHeuresCoursMagistraux()
    {
        return $this->nombreHeuresCoursMagistraux;
    }

    /**
     * Set nombreHeuresCoursMagistraux
     *
     * @param integer $nombreHeuresCoursMagistraux
     *
     * @return CompositionModule
     */
    public function setNombreHeuresCoursMagistraux($nombreHeuresCoursMagistraux)
    {
        $this->nombreHeuresCoursMagistraux = $nombreHeuresCoursMagistraux;

        return $this;
    }

    /**
     * Get nombreHeuresTD
     *
     * @return integer
     */
    public function getNombreHeuresTD()
    {
        return $this->nombreHeuresTD;
    }

    /**
     * Set nombreHeuresTD
     *
     * @param integer $nombreHeuresTD
     *
     * @return CompositionModule
     */
    public function setNombreHeuresTD($nombreHeuresTD)
    {
        $this->nombreHeuresTD = $nombreHeuresTD;

        return $this;
    }

    /**
     * Get nombreHeuresTP
     *
     * @return integer
     */
    public function getNombreHeuresTP()
    {
        return $this->nombreHeuresTP;
    }

    /**
     * Set nombreHeuresTP
     *
     * @param integer $nombreHeuresTP
     *
     * @return CompositionModule
     */
    public function setNombreHeuresTP($nombreHeuresTP)
    {
        $this->nombreHeuresTP = $nombreHeuresTP;

        return $this;
    }
}
