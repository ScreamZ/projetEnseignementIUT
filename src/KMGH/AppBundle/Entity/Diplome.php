<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * Diplome
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\DiplomeRepository")
 * @ExclusionPolicy("none")
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
     * @Exclude()
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Enseignement", mappedBy="diplome", cascade={"all"})
     */
    private $lesEnseignements;

    /**
     * @var TypeDiplome
     *
     * @Exclude()
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\TypeDiplome", inversedBy="lesDiplomes")
     */
    private $typeDiplome;

    /**
     * Constructor
     *
     * @param $nom String Le nom du diplome
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->lesEnseignements = new ArrayCollection();
    }

    function __toString()
    {
        return $this->nom;
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
     * @return Diplome
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

    /**
     * Calcule la somme des heures de chaque enseignement de ce diplome.
     *
     * @return float La somme des heures de CM, TD et TP
     */
    public function getSommeHeuresDiplomes()
    {
        $somme = 0.0;
        if (null == $this->lesEnseignements) {
            return $somme;
        }

        foreach ($this->lesEnseignements as $enseignement) {
            /**
             * @var Module $enseignement FIXME : Faire pour enseignement et pas module et donc bouger la méthode dans la superclasse
             */
            $somme += $enseignement->getSommeHeuresModules();
        }

        return $somme;
    }
}
