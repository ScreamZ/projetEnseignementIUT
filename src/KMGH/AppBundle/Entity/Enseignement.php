<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"module" = "KMGH\AppBundle\Entity\Module", "stage" = "KMGH\AppBundle\Entity\Stage","projet" = "KMGH\AppBundle\Entity\Projet"})
 */
class Enseignement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Attribution",mappedBy="enseignement")
     * @ORM\JoinTable(name="enseignements_attributions")
     */
    protected $lesAttributions;

    /**
     * @var Periode
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Periode",mappedBy="id")
     */
    protected $periodes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesAttributions = new ArrayCollection();
        $this->periodes = new ArrayCollection();
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
     * Add lesAttributions
     *
     * @param Attribution $lesAttributions
     *
     * @return Enseignement
     */
    public function addLesAttribution(Attribution $lesAttributions)
    {
        $this->lesAttributions[] = $lesAttributions;

        return $this;
    }

    /**
     * Remove lesAttributions
     *
     * @param Attribution $lesAttributions
     */
    public function removeLesAttribution(Attribution $lesAttributions)
    {
        $this->lesAttributions->removeElement($lesAttributions);
    }

    /**
     * Get lesAttributions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesAttributions()
    {
        return $this->lesAttributions;
    }


    /**
     * Add periodes
     *
     * @param Periode $periode
     *
     * @return Enseignement
     */
    public function addPeriodes(Periode $periode)
    {
        $this->periodes[] = $periode;

        return $this;
    }

    /**
     * Remove periodes
     *
     * @param Periode $periode
     */
    public function removePeriodes(Periode $periode)
    {
        $this->periodes->removeElement($periode);
    }

    /**
     * Get periodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeriodes()
    {
        return $this->periodes;
    }
}
