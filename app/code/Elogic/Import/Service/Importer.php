<?php

declare(strict_types=1);

namespace Elogic\Import\Service;

use Symfony\Component\Console\Output\OutputInterface;

class Importer
{
    /**
     * @var array
     */
    private $importers;
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Importer constructor.
     * @param array $importers
     */
    public function __construct(
//        OutputInterface $output,
        array $importers = []
    )
    {
        $this->importers = $importers;
//        $this->output = $output;
    }

    public function execute()
    {
        foreach ($this->importers as $importer) {
            $result = $importer->execute();

            if ($result) {
//                $this->output->writeln('<info>Imported!</info>');
            } else {
//                $this->output->writeln('<error>Failed</error>');
            }
        }
    }
}