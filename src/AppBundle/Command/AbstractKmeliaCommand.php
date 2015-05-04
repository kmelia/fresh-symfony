<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractKmeliaCommand extends ContainerAwareCommand
{
    private
        $locking,
        $lockResource;
    
    /**
     * Locking mechanism
     * @return \AppBundle\Command\AbstractKmeliaCommand
     */
    protected function enableLocking()
    {
        $this->locking = true;
        
        return $this;
    }
    
    protected function disableLocking()
    {
        $this->locking = false;
        
        return $this;
    }
    
    protected function isLockingEnabled()
    {
        if ($this->locking !== true) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Locking initialization
     * @see \Symfony\Component\Console\Command\Command::initialize()
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        if ($this->isLockingEnabled()) {
            if ($this->isThatCommandLocked()) {
                $output->writeln(sprintf(
                    '[Command <comment>%s</comment>] The locking is activated for this command and an instance is already launched.',
                    $this->getName()
                ));
                
                $output->writeln(sprintf(
                    '[Command <comment>%s</comment>] This runtime will not be started.',
                    $this->getName()
                ));
                
                exit(2);
            }
        }
    }
    
    /**
     * Locking destruction
     */
    public function __destruct()
    {
        if ($this->isLockingEnabled()) {
            $this->releaseLockResource();
        }
    }
    
    /**
     * TODO use a Symfony\Component\Filesystem\LockHandler on the next LTS
     * @see http://symfony.com/doc/current/components/filesystem/lock_handler.html
     */
    private function isThatCommandLocked()
    {
        $this->lockResource = fopen($this->getLockFilePath(), 'w+');
        
        if (flock($this->lockResource, LOCK_EX | LOCK_NB)) {
            return false;
        }
        
        return true;
    }
    
    private function releaseLockResource()
    {
        if (is_resource($this->lockResource)) {
            // release the lock
            flock($this->lockResource, LOCK_UN);
            fclose($this->lockResource);
            
            // remove the empty file
            unlink($this->getLockFilePath());
        }
    }
    
    private function getLockFilePath()
    {
        return sprintf(
            '%s/lock_command_%s',
            $this->getContainer()->get('kernel')->getCacheDir(),
            str_replace(':', '_', $this->getName())
        );
    }
}
