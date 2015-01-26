<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Enseignement
{
    protected $id;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Attribution")
     * @ORM\JoinTable(name="enseignements_attributions")
     */
    private $lesAttributions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesAttributions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \KMGH\AppBundle\Entity\Attribution $lesAttributions
     *
     * @return Enseignement
     */
    public function addLesAttribution(\KMGH\AppBundle\Entity\Attribution $lesAttributions)
    {
        $this->lesAttributions[] = $lesAttributions;

        return $this;
    }

    /**
     * Remove lesAttributions
     *
     * @param \KMGH\AppBundle\Entity\Attribution $lesAttributions
     */
    public function removeLesAttribution(\KMGH\AppBundle\Entity\Attribution $lesAttributions)
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
}
