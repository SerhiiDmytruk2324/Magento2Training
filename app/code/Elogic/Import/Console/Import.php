<?php
namespace Elogic\Import\Console;

use Elogic\Import\Api\Service\ImportInterface;
use Elogic\Import\Service\GenericCSVImport;
use Elogic\Import\Service\Importer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Import
 */
class Import extends Command
{
    /**
     * @var Importer
     */
    private $importer;

    /**
     * Import constructor.
     * @param null $name
     * @param Importer $importer
     * @internal param array $importers
     */
    public function __construct(
        $name = null,
        Importer $importer
    )
    {
        parent::__construct($name);
        $this->importer = $importer;
    }


    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('elogic:import');
        $this->setDescription('Elogic DI confoguration demo.');

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->importer->execute();




//        $output->writeln('<info>Success Message.</info>');
//        $output->writeln('<error>An error encountered.</error>');
//        $output->writeln('<comment>Some Comment.</comment>');
    }
}