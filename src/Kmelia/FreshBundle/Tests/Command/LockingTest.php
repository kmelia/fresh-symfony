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
        $sleeperCommandLockFilePath = sprintf(
            '%s/lock_command_%s',
            $this->getClient()->getKernel()->getCacheDir(),
            str_replace(':', '_', $sleeperCommand->getName())
        );
        $commandline = sprintf(
            'php app/console --env=%s %s',
            $this->getClient()->getKernel()->getEnvironment(),
            $sleeperCommand->getName()
        );
        
        // the lock does not exists
        $this->assertFileNotExists($sleeperCommandLockFilePath);
        
        // the first run of this command with the locking mechanism
        $process = new Process($commandline);
        $process->start();
        
        // the second run of this command is invalid: the lock is created
        $process = new Process($commandline);
        $process->run();
        
        $this->assertFileExists($sleeperCommandLockFilePath);
        $this->assertSame(2, $process->getExitCode());
        $this->assertContains('This runtime will not be started', $process->getOutput());
        $this->assertContains('The locking is activated for this command and an instance is already launched', $process->getOutput());
        
        // after the sleeping, the lock is released
        sleep(SleeperCommand::SLEEPING_TIME);
        $this->assertFileNotExists($sleeperCommandLockFilePath);
        
        // the third run of this command, after the sleeping, is valid
        $process = new Process($commandline);
        $process->run();
        
        $this->assertSame(0, $process->getExitCode());
        $this->assertContains('starting test', $process->getOutput());
        $this->assertContains('test ending', $process->getOutput());
        $this->assertFileNotExists($sleeperCommandLockFilePath);
    }
}
