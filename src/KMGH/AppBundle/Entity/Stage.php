<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * Stage
 *
 * @ORM\Table(name="Stage")
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\StageRepository")
 * @InheritanceType("JOINED")
 */
class Stage extends Enseignement
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
