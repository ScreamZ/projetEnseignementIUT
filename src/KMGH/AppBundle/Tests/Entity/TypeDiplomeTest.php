<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 21/02/2015
 * Time: 15:49
 */

namespace KMGH\AppBundle\Tests\Entity;


use KMGH\AppBundle\Entity\Attribution;
use KMGH\AppBundle\Entity\Diplome;
use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\TypeDiplome;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeDiplomeTest extends WebTestCase
{

    /** @var Diplome */
    private $diplome;

    /** @var Module */
    private $module;

    /** @var TypeDiplome */
    private $typeDiplome;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->module = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement(
            'module'
        );
        $this->diplome = new Diplome('Informatique');
        $this->typeDiplome = new TypeDiplome('DUT');
    }

    public function testSommeHeuresTypeDiplomes()
    {
        $this->diplome->addLesEnseignement($this->module);
        $this->typeDiplome->addLesDiplome($this->diplome);

        $this->assertEquals(0, $this->typeDiplome->getSommeHeuresTypeDiplome());

        $attribution = new Attribution();
        $attribution->setNombreHeuresCM(15);
        $attribution->setNombreHeuresTD(35.5);
        $this->module->addLesAttribution($attribution);

        $this->assertEquals(50.5, $this->typeDiplome->getSommeHeuresTypeDiplome());
    }

    protected function tearDown()
    {
        $this->module = null;
        $this->diplome = null;
        $this->typeDiplome = null;
        parent::tearDown();
    }
}