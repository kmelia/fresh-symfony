<?php

namespace Tests\AppBundle\Composer;

class ComposerTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoloadFile()
    {
        $this->assertFileExists('vendor/autoload.php');
    }
}
