<?php

namespace Migration\Command;

use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

/**
 * HelpCommand displays the help for a given command.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MigrateCommand extends Command
{
    private $command;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('migration:migrate')
//            ->setDefinition([
//                new InputArgument('command_name', InputArgument::OPTIONAL, 'The command name', 'help'),
//                new InputOption('format', null, InputOption::VALUE_REQUIRED, 'The output format (txt, xml, json, or md)', 'txt'),
//                new InputOption('raw', null, InputOption::VALUE_NONE, 'To output raw command help'),
//            ])
            ->setDescription('Migration help for a migrate')
            ->setHelp(<<<'EOF'
HHHOHOOIOI
EOF
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        if (null === $this->command) {
//            $this->command = $this->getApplication()->find($input->getArgument('command_name'));
//        }
//
//        $helper = new DescriptorHelper();
//        $helper->describe($output, $this->command, [
//            'format' => $input->getOption('format'),
//            'raw_text' => $input->getOption('raw'),
//        ]);
//
//        $this->command = null;

        return 0;
    }
}
