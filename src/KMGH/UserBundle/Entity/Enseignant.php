<?php

namespace KMGH\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use KMGH\AppBundle\Entity\Attribution;
use KMGH\AppBundle\Entity\Module;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Enseignant
 *
 * @ORM\Table(name="Enseignant")
 * @ORM\Entity(repositoryClass="KMGH\UserBundle\Entity\EnseignantRepository")
 */
class Enseignant
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
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $prenom;

    /**
     * @ORM\OneToOne(targetEntity="KMGH\UserBundle\Entity\Utilisateur", mappedBy="enseignant")
     * @ORM\JoinColumn(name="utilisateur_id", nullable=true)
     */
    private $utilisateur;

    /**
     * @var Statut
     * @ORM\ManyToOne(targetEntity="KMGH\UserBundle\Entity\Statut")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Attribution",mappedBy="enseignant")
     * @ORM\JoinTable(name="enseignants_attributions")
     */
    private $lesAttributions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesAttributions = new ArrayCollection();
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
     * @return Enseignant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Enseignant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Enseignant
     */
    public function setUtilisateur(Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }


    /**
     * Add lesAttributions
     *
     * @param Attribution $lesAttributions
     *
     * @return Enseignant
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
     * Get statut
     *
     * @return Statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set statut
     *
     * @param Statut $statut
     *
     * @return Enseignant
     */
    public function setStatut(Statut $statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Calcule la somme des heures pour un enseignant, soit la somme des heures des attributions.
     *
     * @return float Le nombre d'heures enseignées (Somme des attributions)
     */
    public function getSommeHeuresEnseignant()
    {
        $somme = 0.0;

        foreach ($this->lesAttributions as $attribution) {
            /**
             * @var Attribution $attribution
             */
            $somme += $attribution->getSommeHeureAttribution();
        }

        return $somme;
    }
}
