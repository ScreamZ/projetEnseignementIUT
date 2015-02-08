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
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->lesEnseignements = new ArrayCollection();
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
     * @return TypeDiplome
     */
    public function getTypeDiplome()
    {
        return $this->typeDiplome;
    }

    /**
     * @param TypeDiplome $typeDiplome
     */
    public function setTypeDiplome($typeDiplome)
    {
        $this->typeDiplome = $typeDiplome;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Diplome
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Add enseignement
     *
     * @param Enseignement $lesEnseignements
     *
*@return Diplome
     */
    public function addLesEnseignement(Enseignement $lesEnseignements)
    {
        $this->lesEnseignements[] = $lesEnseignements;

        return $this;
    }

    /**
     * Remove enseignement
     *
     * @param Enseignement $lesEnseignements
     */
    public function removeLesEnseignement(Enseignement $lesEnseignements)
    {
        $this->lesEnseignements->removeElement($lesEnseignements);
    }

    /**
     * Get enseignement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLesEnseignements()
    {
        return $this->lesEnseignements;
    }
}
