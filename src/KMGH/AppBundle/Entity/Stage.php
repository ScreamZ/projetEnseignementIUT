<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="Stage")
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\StageRepository")
 */
class Stage extends Enseignement
{
}
