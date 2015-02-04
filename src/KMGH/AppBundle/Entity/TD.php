<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TD
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\TDRepository")
 */
class TD
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
     * @ORM\Column(name="denomination", type="string", length=255)
     */
    private $denomination;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text")
     */
    private $details;


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
     * Get denomination
     *
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * Set denomination
     *
     * @param string $denomination
     *
     * @return TD
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return TD
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}
