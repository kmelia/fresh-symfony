<?php

namespace Kmelia\FreshBundle\Tests;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testAddition()
    {
        $result = 1 + 1;
        
        $this->assertEquals(2, $result);
    }
    
    public function testFile()
    {
        $this->assertFileExists('./vendor/autoload.php');
    }
}
