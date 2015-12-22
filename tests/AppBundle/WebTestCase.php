<?php

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

class WebTestCase extends BaseWebTestCase
{
    private
        $client;
    
    protected function getClient()
    {
        if (!$this->client instanceof \AppKernel) {
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
