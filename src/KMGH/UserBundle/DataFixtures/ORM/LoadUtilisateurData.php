<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 06/02/2015
 * Time: 11:01
 */

namespace KMGH\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KMGH\UserBundle\Entity\Enseignant;
use KMGH\UserBundle\Entity\Statut;
use KMGH\UserBundle\Entity\Utilisateur;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUtilisateurData implements FixtureInterface, ContainerAwareInterface
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
        $statut = new Statut();
        $statut->setNomStatut('Vaccataire')->setQuotaHeureEnseignement(rand(1, 100));
        $manager->persist($statut);

        $this->createData('toto', 'toto', $statut, "Miklos", 'Molnar');
        $this->createData('titi', 'titi', $statut, "Stéphanie", 'Metz');

        $manager->flush();
    }

    private function createData($username, $password, $statut, $prenom, $nom)
    {
        $userManager = $this->container->get('fos_user.util.user_manipulator');
        /**
         * @var Utilisateur $user
         */
        $user = $userManager->create($username, $password, "$username@gmail.com", true, false);
        $enseignant = new Enseignant();
        $enseignant->setPrenom($prenom)->setNom($nom)->setUtilisateur($user)->setStatut($statut);
        $user->setEnseignant($enseignant);
        $this->container->get('fos_user.user_manager')->updateUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }


}