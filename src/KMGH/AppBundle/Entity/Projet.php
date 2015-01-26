<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * Projet
 *
 * @ORM\Table(name="Projet")
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\ProjetRepository")
 * @InheritanceType("JOINED")
 */
class Projet extends Enseignement
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
