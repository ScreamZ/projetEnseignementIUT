<?php

namespace KMGH\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
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
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Attribution",mappedBy="enseignant")
     * @ORM\JoinTable(name="enseignants_attributions")
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
     * @param \KMGH\AppBundle\Entity\Attribution $lesAttributions
     *
     * @return Enseignant
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
