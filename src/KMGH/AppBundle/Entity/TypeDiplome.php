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
     * Constructor
     *
     * @param String $nom Type du diplome
     */
    public function __construct($nom = null)
    {
        $this->nom = $nom;
        $this->lesDiplomes = new ArrayCollection();
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
     * @return TypeDiplome
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Add lesDiplomes
     *
     * @param Diplome $lesDiplomes
     *
     * @return TypeDiplome
     */
    public function addLesDiplome(Diplome $lesDiplomes)
    {
        $this->lesDiplomes[] = $lesDiplomes;

        return $this;
    }

    /**
     * Remove lesDiplomes
     *
     * @param Diplome $lesDiplomes
     */
    public function removeLesDiplome(Diplome $lesDiplomes)
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

    /**
     * Calcule la somme des heures de chaque diplome de ce type de diplome.
     *
     * @return float La somme des heures de CM, TD et TP
     */
    public function getSommeHeuresTypeDiplome()
    {
        $somme = 0.0;
        foreach ($this->lesDiplomes as $diplome) {
            /**
             * @var Diplome $diplome
             */
            $somme += $diplome->getSommeHeuresDiplomes();
        }

        return $somme;
    }
}
