<?php

namespace Kmelia\FreshBundle\Tests\Command;

use AppBundle\Tests\WebTestCase;
use Kmelia\FreshBundle\Command\Test\SleeperCommand;
use Symfony\Component\Process\Process;

class LockingTest extends WebTestCase
{
    public function testSleeperCommand()
    {
        // init
        $sleeperCommand = new SleeperCommand();
        $commandline = sprintf(
            'php app/console --env=%s %s',
            $this->getClient()->getKernel()->getEnvironment(),
            $sleeperCommand->getName()
        );
        
        // first run the command with the locking mechanism
        $process = new Process($commandline);
        $process->start();
        
        // the second run of this command is invalid
        $process = new Process($commandline);
        $process->run();
        $this->assertSame(2, $process->getExitCode());
        $this->assertContains('This runtime will not be started', $process->getOutput());
        $this->assertContains('The locking is activated for this command and an instance is already launched', $process->getOutput());
        
        // the third run of this command after sleeping is valid
        sleep(SleeperCommand::SLEEPING_TIME);
        $process = new Process($commandline);
        $process->run();
        $this->assertSame(0, $process->getExitCode());
        $this->assertContains('starting test', $process->getOutput());
        $this->assertContains('test ending', $process->getOutput());
    }
}
