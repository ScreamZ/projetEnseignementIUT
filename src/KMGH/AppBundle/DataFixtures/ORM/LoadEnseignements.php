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
use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\Projet;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadEnseignements implements FixtureInterface, ContainerAwareInterface
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
        $enseignementManager = $this->container->get('kmgh_app.enseignement_manager');
        $userManager = $this->container->get('fos_user.user_manager');
        $diplomeManager = $this->container->get('doctrine.orm.entity_manager')->getRepository('KMGHAppBundle:Diplome');

        $module = $enseignementManager->createEnseignement('module');
        /**
         * @var Module $module
         */
        $module->setEnseignantResponsable($userManager->findUserBy(array('username' => 'toto')));
        $module->setDiplome($diplomeManager->findOneBy(array('nom' => 'ACPI')));
        $module->setDenomination('Base de donnée');
        $manager->persist($module);

        $module = $enseignementManager->createEnseignement('module');
        $module->setEnseignantResponsable($userManager->findUserBy(array('username' => 'titi')));
        $module->setDiplome($diplomeManager->findOneBy(array('nom' => 'API-DAE')));
        $module->setDenomination('Programmation Objet');
        $manager->persist($module);

        $projet = $enseignementManager->createEnseignement('projet');
        /**
         * @var Projet $projet
         */
        /*$projet->setEnseignantResponsable($userManager->findUserBy(array('username' => 'toto')));
        $projet->setDiplome($diplomeManager->findOneBy(array('nom' => 'API-DAE')));
        $projet->setNbEtudiants(3);
        $projet->setNbHeuresParEtudiants(5);
        $manager->persist($projet);*/

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // l'ordre dans lequel les fichiers sont chargés
    }
}