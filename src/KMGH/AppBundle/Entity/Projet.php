<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="Projet")
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\ProjetRepository")
 */
class Projet extends Enseignement
{
}
