<?php
/**
 * DiplomeTest.php
 */

namespace KMGH\AppBundle\Tests\Entity;

use KMGH\AppBundle\Entity\Attribution;
use KMGH\AppBundle\Entity\Diplome;
use KMGH\AppBundle\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DiplomeTest extends WebTestCase
{
    /** @var \Doctrine\ORM\EntityManager */
    private $diplome;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }

    public function testSommeHeuresDiplomes()
    {
        /**
         * @var Module $module
         */
        $module = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement('module');
        $this->diplome = new Diplome('Informatique');
        $this->diplome->addLesEnseignement($module);

        $this->assertEquals(0, $this->diplome->getSommeHeuresDiplomes());

        $attribution = new Attribution();
        $attribution->setNombreHeuresCM(15);
        $attribution->setNombreHeuresTD(35.5);
        $module->addLesAttribution($attribution);

        $this->assertEquals(50.5, $this->diplome->getSommeHeuresDiplomes());
    }
}
