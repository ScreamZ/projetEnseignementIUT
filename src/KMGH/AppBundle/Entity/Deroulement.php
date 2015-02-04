<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deroulement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\DeroulementRepository")
 */
class Deroulement
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Module
     * @ORM\OneToMany(targetEntity="KMGH\AppBundle\Entity\Module", mappedBy="id")
     */
    private $module;

    private $semaine;

    /**
     * @var TD
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\TD")
     */
    private $td;
    /**
     * @var string
     * @ORM\Column(name="remarque", type="text")
     */
    private $remarque;


}
