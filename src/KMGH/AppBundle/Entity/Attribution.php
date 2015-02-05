<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use KMGH\UserBundle\Entity\Enseignant;

/**
 * Attribution
 *
 * @ORM\Table(uniqueConstraints={
 *      @ORM\UniqueConstraint(name="unique_attribution", columns={"enseignant_id","enseignement_id"})
 * })
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\AttributionRepository")
 */
class Attribution
{

    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="nombreHeuresCM", type="float")
     */
    private $nombreHeuresCM;

    /**
     * @var float
     *
     * @ORM\Column(name="nombreHeuresTD", type="float")
     */
    private $nombreHeuresTD;

    /**
     * @var float
     *
     * @ORM\Column(name="nombreHeuresTP", type="float")
     */
    private $nombreHeuresTP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="datetime")
     */
    private $annee;

    /**
     * @ORM\ManyToOne(targetEntity="KMGH\UserBundle\Entity\Enseignant", inversedBy="lesAttributions")
     * @ORM\JoinColumn(name="enseignant_id")
     */
    private $enseignant;

    /**
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\Enseignement",inversedBy="lesAttributions")
     * @ORM\JoinColumn(name="enseignement_id")
     */
    private $enseignement;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Get nombreHeuresCM
     *
     * @return float
     */
    public function getNombreHeuresCM()
    {
        return $this->nombreHeuresCM;
    }

    /**
     * Set nombreHeuresCM
     *
     * @param float $nombreHeuresCM
     *
     * @return Attribution
     */
    public function setNombreHeuresCM($nombreHeuresCM)
    {
        $this->nombreHeuresCM = $nombreHeuresCM;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return Attribution
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * @param mixed $enseignant
     */
    public function setEnseignant($enseignant)
    {
        $this->enseignant = $enseignant;
    }

    /**
     * Get enseignement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnseignement()
    {
        return $this->enseignement;
    }

    /**
     * Set nombreHeuresTD
     *
     * @param float $nombreHeuresTD
     * @return Attribution
     */
    public function setNombreHeuresTD($nombreHeuresTD)
    {
        $this->nombreHeuresTD = $nombreHeuresTD;

        return $this;
    }

    /**
     * Get nombreHeuresTD
     *
     * @return float 
     */
    public function getNombreHeuresTD()
    {
        return $this->nombreHeuresTD;
    }

    /**
     * Set nombreHeuresTP
     *
     * @param float $nombreHeuresTP
     * @return Attribution
     */
    public function setNombreHeuresTP($nombreHeuresTP)
    {
        $this->nombreHeuresTP = $nombreHeuresTP;

        return $this;
    }

    /**
     * Get nombreHeuresTP
     *
     * @return float 
     */
    public function getNombreHeuresTP()
    {
        return $this->nombreHeuresTP;
    }

    /**
     * Set enseignement
     *
     * @param \KMGH\AppBundle\Entity\Enseignement $enseignement
     * @return Attribution
     */
    public function setEnseignement(\KMGH\AppBundle\Entity\Enseignement $enseignement)
    {
        $this->enseignement = $enseignement;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
