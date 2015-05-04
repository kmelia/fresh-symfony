<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

class WebTestCase extends BaseWebTestCase
{
    private
        $client;
    
    protected function getClient()
    {
        if (!$this->client instanceof \AppKernel) {
            $this->client = static::createClient();
        }
        
        return $this->client;
    }
}
