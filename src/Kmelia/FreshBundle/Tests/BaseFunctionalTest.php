<?php

namespace Kmelia\FreshBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseFunctionalTest extends WebTestCase
{
    public function testHomepage()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/');
        
        $this->assertGreaterThan(0, $crawler->filter('html:contains("fresh")')->count());
    }
}
