<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Diplome
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\DiplomeRepository")
 */
class Diplome
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Enseignement", mappedBy="diplome")
     */
    private $lesEnseignements;

    /**
     * @var TypeDiplome
     *
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\TypeDiplome", inversedBy="lesDiplomes")
     */
    private $typeDiplome;

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
     * Set nom
     *
     * @param string $nom
     * @return Diplome
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add lesEnseignements
     *
     * @param \KMGH\UserBundle\Entity\Enseignement $lesEnseignements
     * @return Diplome
     */
    public function addLesEnseignement(\KMGH\UserBundle\Entity\Enseignement $lesEnseignements)
    {
        $this->lesEnseignements[] = $lesEnseignements;

        return $this;
    }

    /**
     * Remove lesEnseignements
     *
     * @param \KMGH\UserBundle\Entity\Enseignement $lesEnseignements
     */
    public function removeLesEnseignement(\KMGH\UserBundle\Entity\Enseignement $lesEnseignements)
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
