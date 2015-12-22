<?php

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;

class WebTestCase extends BaseWebTestCase
{
    private
        $client;
    
    protected function getClient()
    {
        if (!$this->client instanceof Client) {
            $this->overrideKernelDirectory();
            $this->client = static::createClient();
        }
        
        return $this->client;
    }
    
    private function overrideKernelDirectory()
    {
        if (getenv('PHPUNIT_SYMFONY_KERNEL_DIRECTORY') !== false) {
            $_SERVER['KERNEL_DIR'] = getenv('PHPUNIT_SYMFONY_KERNEL_DIRECTORY');
        }
    }
}
