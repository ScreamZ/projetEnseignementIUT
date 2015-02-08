<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 08/02/2015
 * Time: 12:09
 */

namespace KMGH\AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KMGH\AppBundle\Entity\Diplome;
use KMGH\AppBundle\Entity\TypeDiplome;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadDiplomeAndType implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    function load(ObjectManager $manager)
    {
        // DUT
        $dut = new TypeDiplome('DUT');
        $diplomesDUT = array('Informatique');
        $this->createDiplome($dut, $diplomesDUT, $manager);

        // Licence Pro
        $lp = new TypeDiplome('Licence Profesionnelle');
        $diplomesLP = array('API-DAE', 'ACPI', 'PSGI');
        $this->createDiplome($lp, $diplomesLP, $manager);

        // Année spéciale
        $as = new TypeDiplome('Année Spéciale');
        $diplomesAS = array('Informatique');
        $this->createDiplome($as, $diplomesAS, $manager);

    }

    private function createDiplome($typeDiplome, $diplomes, ObjectManager $manager)
    {
        $manager->persist($typeDiplome);

        foreach ($diplomes as $diplome) {
            $diplome = new Diplome($diplome);
            $diplome->setTypeDiplome($typeDiplome);
            $manager->persist($diplome);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
}