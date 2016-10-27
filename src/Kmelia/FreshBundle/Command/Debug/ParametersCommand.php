<?php

namespace Kmelia\FreshBundle\Command\Debug;

use AppBundle\Command\AbstractKmeliaCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class ParametersCommand extends AbstractKmeliaCommand
{
    const
        CONSOLE_WIDTH = 90;
    
    private
        $input,
        $output;
    
    protected function configure()
    {
        $this
            ->enableLocking()
            ->setName('kmelia:debug:parameters')
            ->setDescription('Debug the parameters per environment without launching it!')
            ->addArgument('environments', InputArgument::REQUIRED, 'List separate by comma')
            ->addOption('filter', 'f', InputOption::VALUE_OPTIONAL, 'Filter the parameters with this regexp')
            ->addOption('expand', 'x', InputOption::VALUE_NONE, 'Expand all the truncated values');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $environments = explode(',', $input->getArgument('environments'));
        
        $table = (new Table($output))
            ->setHeaders(['env', 'key', 'type', 'value']);
        
        $isTruncated = false;
        
        foreach ($environments as $key => $environment) {
            if ($key > 0) {
                $table->addRow(new TableSeparator());
            }
            
            $environmentKernel = new \AppKernel($environment, false);
            $environmentKernel->initializeWithoutCaching();
            
            foreach ($environmentKernel->getContainer()->getParameterBag()->all() as $parameter => $value) {
                if ($input->getOption('filter') !== null) {
                    $pattern = sprintf(
                        '~%s~',
                        $input->getOption('filter')
                    );
                    
                    if (!preg_match($pattern, $parameter)) {
                        continue;
                    }
                }
                
                $type = gettype($value);
                
                if (is_array($value)) {
                    $value = json_encode($value);
                }
                
                if ($input->getOption('expand') === false && strlen($value) >= self::CONSOLE_WIDTH) {
                    $showMoreMessage = ' [truncated]';
                    
                    $value = sprintf(
                        '%s%s',
                        substr(substr($value, 0, self::CONSOLE_WIDTH), 0, - strlen($showMoreMessage)),
                        $showMoreMessage
                    );
                    
                    $isTruncated = true;
                }
                
                $table->addRow([$environment, $parameter, $type, $value]);
            }
        }
        
        if ($isTruncated) {
            $table->setColumnWidths([0, 0, 0, self::CONSOLE_WIDTH]);
        }
        
        $table->render();
    }
}
