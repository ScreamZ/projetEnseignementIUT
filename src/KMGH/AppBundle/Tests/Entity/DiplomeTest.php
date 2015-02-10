<?php
/**
 * DiplomeTest.php
 */

namespace KMGH\AppBundle\Tests\Entity;

use KMGH\AppBundle\Entity\Diplome;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DiplomeTest extends WebTestCase
{
    /** @var \Doctrine\ORM\EntityManager */
    private $em;
    private $diplome;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }


    public function testSommeHeuresDiplomes()
    {
        $module = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement('module');
        $this->diplome = new Diplome('DUT');
        $this->diplome->addLesEnseignement($module);

        $this->assertEquals(0, $this->diplome->getSommeHeuresDiplomes());
    }
}
