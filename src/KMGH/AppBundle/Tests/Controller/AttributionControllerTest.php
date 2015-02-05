<?php

namespace KMGH\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AttributionControllerTest extends WebTestCase
{
    public function testUdpate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/udpate');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

    public function testInsert()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/insert');
    }

}
