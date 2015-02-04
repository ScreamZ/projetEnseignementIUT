<?php

namespace KMGH\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statut
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\UserBundle\Entity\StatutRepository")
 */
class Statut
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
     * @ORM\Column(name="nomStatut", type="string", length=255)
     */
    private $nomStatut;

    /**
     * @var integer
     *
     * @ORM\Column(name="quotaHeureEnseignement", type="integer")
     */
    private $quotaHeureEnseignement;


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
     * Get nomStatut
     *
     * @return string
     */
    public function getNomStatut()
    {
        return $this->nomStatut;
    }

    /**
     * Set nomStatut
     *
     * @param string $nomStatut
     *
     * @return Statut
     */
    public function setNomStatut($nomStatut)
    {
        $this->nomStatut = $nomStatut;

        return $this;
    }

    /**
     * Get quotaHeureEnseignement
     *
     * @return integer
     */
    public function getQuotaHeureEnseignement()
    {
        return $this->quotaHeureEnseignement;
    }

    /**
     * Set quotaHeureEnseignement
     *
     * @param integer $quotaHeureEnseignement
     *
     * @return Statut
     */
    public function setQuotaHeureEnseignement($quotaHeureEnseignement)
    {
        $this->quotaHeureEnseignement = $quotaHeureEnseignement;

        return $this;
    }
}
