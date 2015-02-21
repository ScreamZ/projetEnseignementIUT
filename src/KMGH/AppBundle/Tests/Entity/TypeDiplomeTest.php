<?php
/**
 * Created by PhpStorm.
 * User: ScreamZ
 * Date: 21/02/2015
 * Time: 15:49
 */

namespace KMGH\AppBundle\Tests\Entity;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeDiplomeTest extends WebTestCase
{

    /** @var \Doctrine\ORM\EntityManager */
    private $enseignement;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->enseignement = null;
    }
}