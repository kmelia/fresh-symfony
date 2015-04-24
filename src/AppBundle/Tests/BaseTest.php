<?php

namespace AppBundle\Tests;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoloadFile()
    {
        $this->assertFileExists('./vendor/autoload.php');
    }
}
