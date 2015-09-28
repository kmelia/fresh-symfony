<?php

namespace Kmelia\FreshBundle\Tests;

use AppBundle\Tests\WebTestCase;

class BaseFunctionalTest extends WebTestCase
{
    public function testHomepage()
    {
        $client = $this->getClient();
        
        $crawler  = $client->request('GET', '/');
        $response = $client->getResponse();
        
        // content
        $this->assertGreaterThan(0, $crawler->filter('html:contains("fresh-symfony")')->count(), 'Word "fresh-symfony"');
        
        // headers
        $this->assertTrue($response->isOk(), 'Http code 200');
        $this->assertTrue($response->headers->contains('Content-Type', 'text/html; charset=UTF-8'), 'Html utf-8 page');
        $this->assertTrue($response->headers->hasCacheControlDirective('max-age'), 'Cache control max-age');
        $this->assertTrue($response->headers->hasCacheControlDirective('s-maxage'), 'Cache control s-maxage');
        $this->assertTrue($response->headers->hasCacheControlDirective('must-revalidate'), 'Cache control must-revalidate');
        $this->assertTrue($response->headers->has('Expires'), 'Header expires');
    }
    
    public function testNoHttpCacheHomepage()
    {
        $client = $this->getClient();
        
        $client->request('GET', '/no-http-cache');
        $response = $client->getResponse();
        
        // headers
        $this->assertTrue($response->isOk(), 'Http code 200');
        $this->assertFalse($response->isCacheable(), 'Response cacheable');
        $this->assertTrue($response->headers->contains('Cache-Control', 'no-cache'), 'Header cache control no-cache');
        $this->assertFalse($response->headers->has('Expires'), 'Header expires');
    }
}
