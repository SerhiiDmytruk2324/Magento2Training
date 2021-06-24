<?php
namespace Elogic\Import\Cron;

use Elogic\Import\Service\Importer;

class Import
{
    /**
     * @var Importer
     */
    private $importer;

    /**
     * Import constructor.
     * @param Importer $importer
     */
    public function __construct(
        Importer $importer
    )
    {
        $this->importer = $importer;
    }

    /**
     *
     */
    public function execute()
    {
        $this->importer->execute();
    }
}
