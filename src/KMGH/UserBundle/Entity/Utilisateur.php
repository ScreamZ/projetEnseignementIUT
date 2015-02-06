<?php

namespace KMGH\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\UserBundle\Entity\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="KMGH\UserBundle\Entity\Enseignant", inversedBy="utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
     **/
    private $enseignant;

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
     * Get enseignant
     *
     * @return \KMGH\UserBundle\Entity\Enseignant
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * Set enseignant
     *
     * @param \KMGH\UserBundle\Entity\Enseignant $enseignant
     *
     * @return Utilisateur
     */
    public function setEnseignant(\KMGH\UserBundle\Entity\Enseignant $enseignant = null)
    {
        $this->enseignant = $enseignant;

        return $this;
    }
}
