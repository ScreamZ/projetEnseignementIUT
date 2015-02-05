<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDiplome
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\TypeDiplomeRepository")
 */
class TypeDiplome
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
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Diplome", mappedBy="typeDiplome")
     */
    private $lesDiplomes;

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
     * @return TypeDiplome
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
     * Constructor
     */
    public function __construct()
    {
        $this->lesDiplomes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lesDiplomes
     *
     * @param \KMGH\AppBundle\Entity\Diplome $lesDiplomes
     * @return TypeDiplome
     */
    public function addLesDiplome(\KMGH\AppBundle\Entity\Diplome $lesDiplomes)
    {
        $this->lesDiplomes[] = $lesDiplomes;

        return $this;
    }

    /**
     * Remove lesDiplomes
     *
     * @param \KMGH\AppBundle\Entity\Diplome $lesDiplomes
     */
    public function removeLesDiplome(\KMGH\AppBundle\Entity\Diplome $lesDiplomes)
    {
        $this->lesDiplomes->removeElement($lesDiplomes);
    }

    /**
     * Get lesDiplomes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLesDiplomes()
    {
        return $this->lesDiplomes;
    }
}
