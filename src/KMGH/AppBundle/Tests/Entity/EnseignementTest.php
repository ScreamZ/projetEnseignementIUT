<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 21/02/2015
 * Time: 15:10
 */

namespace KMGH\AppBundle\Tests\Entity;


use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\Projet;
use KMGH\AppBundle\Entity\Stage;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EnseignementTest extends WebTestCase
{

    /** @var \Doctrine\ORM\EntityManager */
    private $enseignement;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->enseignement = null;
    }

    public function testTypeEnseignementEstModule()
    {
        $this->enseignement = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement(
            'module'
        );
        $this->assertTrue(
            $this->enseignement instanceof Module,
            "Ce n'est pas un module mais un : " . get_class($this->enseignement)
        );
    }

    public function testTypeEnseignementEstStage()
    {
        $this->enseignement = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement(
            'projet'
        );
        $this->assertTrue(
            $this->enseignement instanceof Projet,
            "Ce n'est pas un module mais un : " . get_class($this->enseignement)
        );
    }

    public function testTypeEnseignementEstProjet()
    {
        $this->enseignement = static::$kernel->getContainer()->get('kmgh_app.enseignement_manager')->createEnseignement(
            'stage'
        );
        $this->assertTrue(
            $this->enseignement instanceof Stage,
            "Ce n'est pas un module mais un : " . get_class($this->enseignement)
        );
    }
}
