<?php

namespace KMGH\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KMGH\AppBundle\Entity\ModuleRepository")
 */
class Module extends Enseignement
{

    /**
     * @var string
     *
     * @ORM\Column(name="denomination", type="string", length=255)
     */
    private $denomination;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreSceancesParGroupesParSemaines", type="integer")
     */
    private $nombreSceancesParGroupesParSemaines;

    /**
     * @var float
     *
     * @ORM\Column(name="dureeSceanceParSemaine", type="float")
     */
    private $dureeSceanceParSemaine;

    /**
     * @var string
     *
     * @ORM\Column(name="ressourcesAnnexes", type="text")
     */
    private $ressourcesAnnexes;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="evaluation", type="text")
     */
    private $evaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="bibliographie", type="text")
     */
    private $bibliographie;

    /**
     * @var string
     * @ORM\Column(name="materiel", type="text")
     */
    private $materiels;

    /**
     * @var string
     * @ORM\Column(name="objectif_pedagogique", type="text")
     */
    private $objectifPedagogique;

    /**
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\CompositionModule")
     * @ORM\JoinColumn(nullable=true)
     */
    private $compositionRecommandee;

    /**
     * @ORM\ManyToOne(targetEntity="KMGH\AppBundle\Entity\CompositionModule")
     * @ORM\JoinColumn(nullable=true)
     */
    private $compositionChoisie;


    /**
     * @var Module
     *
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Module", mappedBy="preRequisDe")
     */
    private $modulesPreRequis;

    /**
     * @ORM\ManyToMany(targetEntity="KMGH\AppBundle\Entity\Module", inversedBy="modulesPreRequis")
     * @ORM\JoinTable(name="module_pre_requis",
     *      joinColumns={@ORM\JoinColumn(name="module_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pre_requis_module_id", referencedColumnName="id")}
     *      )
     **/
    private $preRequisDe;

    /**
     * @ORM\Column(name="date_demarrage",type="date")
     */
    private $dateDemarrage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modulesPreRequis = new ArrayCollection();
        $this->preRequisDe = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getDateDemarrage()
    {
        return $this->dateDemarrage;
    }

    /**
     * @param mixed $dateDemarrage
     */
    public function setDateDemarrage($dateDemarrage)
    {
        $this->dateDemarrage = $dateDemarrage;
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
     * @return Module
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get nombreSceancesParGroupesParSemaines
     *
     * @return integer
     */
    public function getNombreSceancesParGroupesParSemaines()
    {
        return $this->nombreSceancesParGroupesParSemaines;
    }

    /**
     * Set nombreSceancesParGroupesParSemaines
     *
     * @param integer $nombreSceancesParGroupesParSemaines
     *
     * @return Module
     */
    public function setNombreSceancesParGroupesParSemaines($nombreSceancesParGroupesParSemaines)
    {
        $this->nombreSceancesParGroupesParSemaines = $nombreSceancesParGroupesParSemaines;

        return $this;
    }

    /**
     * Get dureeSceanceParSemaine
     *
     * @return float
     */
    public function getDureeSceanceParSemaine()
    {
        return $this->dureeSceanceParSemaine;
    }

    /**
     * Set dureeSceanceParSemaine
     *
     * @param float $dureeSceanceParSemaine
     *
     * @return Module
     */
    public function setDureeSceanceParSemaine($dureeSceanceParSemaine)
    {
        $this->dureeSceanceParSemaine = $dureeSceanceParSemaine;

        return $this;
    }

    /**
     * Get ressourcesAnnexes
     *
     * @return string
     */
    public function getRessourcesAnnexes()
    {
        return $this->ressourcesAnnexes;
    }

    /**
     * Set ressourcesAnnexes
     *
     * @param string $ressourcesAnnexes
     *
     * @return Module
     */
    public function setRessourcesAnnexes($ressourcesAnnexes)
    {
        $this->ressourcesAnnexes = $ressourcesAnnexes;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Module
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return string
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set evaluation
     *
     * @param string $evaluation
     *
     * @return Module
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get bibliographie
     *
     * @return string
     */
    public function getBibliographie()
    {
        return $this->bibliographie;
    }

    /**
     * Set bibliographie
     *
     * @param string $bibliographie
     *
     * @return Module
     */
    public function setBibliographie($bibliographie)
    {
        $this->bibliographie = $bibliographie;

        return $this;
    }

    /**
     * Add compositionRecommandee
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee
     *
     * @return Module
     */
    public function addCompositionRecommandee(\KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee)
    {
        $this->compositionRecommandee[] = $compositionRecommandee;

        return $this;
    }

    /**
     * Remove compositionRecommandee
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee
     */
    public function removeCompositionRecommandee(\KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee)
    {
        $this->compositionRecommandee->removeElement($compositionRecommandee);
    }

    /**
     * Get compositionRecommandee
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompositionRecommandee()
    {
        return $this->compositionRecommandee;
    }

    /**
     * Set compositionRecommandee
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee
     *
     * @return Module
     */
    public function setCompositionRecommandee(\KMGH\AppBundle\Entity\CompositionModule $compositionRecommandee = null)
    {
        $this->compositionRecommandee = $compositionRecommandee;

        return $this;
    }

    /**
     * Add compositionChoisie
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionChoisie
     *
     * @return Module
     */
    public function addCompositionChoisie(\KMGH\AppBundle\Entity\CompositionModule $compositionChoisie)
    {
        $this->compositionChoisie[] = $compositionChoisie;

        return $this;
    }

    /**
     * Remove compositionChoisie
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionChoisie
     */
    public function removeCompositionChoisie(\KMGH\AppBundle\Entity\CompositionModule $compositionChoisie)
    {
        $this->compositionChoisie->removeElement($compositionChoisie);
    }

    /**
     * Get compositionChoisie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompositionChoisie()
    {
        return $this->compositionChoisie;
    }

    /**
     * Set compositionChoisie
     *
     * @param \KMGH\AppBundle\Entity\CompositionModule $compositionChoisie
     *
     * @return Module
     */
    public function setCompositionChoisie(\KMGH\AppBundle\Entity\CompositionModule $compositionChoisie = null)
    {
        $this->compositionChoisie = $compositionChoisie;

        return $this;
    }

    /**
     * Get materiels
     *
     * @return string
     */
    public function getMateriels()
    {
        return $this->materiels;
    }

    /**
     * Set materiels
     *
     * @param string $materiels
     *
     * @return Module
     */
    public function setMateriels($materiels)
    {
        $this->materiels = $materiels;

        return $this;
    }

    /**
     * Get objectifPedagogique
     *
     * @return string
     */
    public function getObjectifPedagogique()
    {
        return $this->objectifPedagogique;
    }

    /**
     * Set objectifPedagogique
     *
     * @param string $objectifPedagogique
     *
     * @return Module
     */
    public function setObjectifPedagogique($objectifPedagogique)
    {
        $this->objectifPedagogique = $objectifPedagogique;

        return $this;
    }
}
