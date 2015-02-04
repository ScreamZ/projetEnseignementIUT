<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use KMGH\UserBundle\Entity\Enseignant;

/**
 * Attribution
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\AttributionRepository")
 */
class Attribution
{
    /**
     * @var float
     *
     * @ORM\Column(name="nombreHeures", type="float")
     */
    private $nombreHeures;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="datetime")
     */
    private $annee;

    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="KMGH\UserBundle\Entity\Enseignant", inversedBy="lesAttributions")
     * @ORM\Id()
     */
    private $enseignant;

    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\Enseignement",inversedBy="lesAttributions")
     * @ORM\Id()
     */
    private $enseignement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enseignant = new ArrayCollection();
        $this->enseignement = new ArrayCollection();
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
     * Get nombreHeures
     *
     * @return float
     */
    public function getNombreHeures()
    {
        return $this->nombreHeures;
    }

    /**
     * Set nombreHeures
     *
     * @param float $nombreHeures
     *
     * @return Attribution
     */
    public function setNombreHeures($nombreHeures)
    {
        $this->nombreHeures = $nombreHeures;

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
     * Add enseignant
     *
     * @param Enseignant $enseignant
     *
     * @return Attribution
     */
    public function addEnseignant(Enseignant $enseignant)
    {
        $this->enseignant[] = $enseignant;

        return $this;
    }

    /**
     * Remove enseignant
     *
     * @param Enseignant $enseignant
     */
    public function removeEnseignant(Enseignant $enseignant)
    {
        $this->enseignant->removeElement($enseignant);
    }

    /**
     * Get enseignant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * Add enseignement
     *
     * @param \KMGH\AppBundle\Entity\Enseignement $enseignement
     *
     * @return Attribution
     */
    public function addEnseignement(\KMGH\AppBundle\Entity\Enseignement $enseignement)
    {
        $this->enseignement[] = $enseignement;

        return $this;
    }

    /**
     * Remove enseignement
     *
     * @param \KMGH\AppBundle\Entity\Enseignement $enseignement
     */
    public function removeEnseignement(\KMGH\AppBundle\Entity\Enseignement $enseignement)
    {
        $this->enseignement->removeElement($enseignement);
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
}
