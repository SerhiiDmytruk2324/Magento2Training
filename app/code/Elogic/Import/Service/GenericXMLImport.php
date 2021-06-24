<?php

declare(strict_types=1);

namespace Elogic\Import\Service;

use Elogic\Import\Api\Service\ImportInterface;

class GenericXMLImport implements ImportInterface
{
    /**
     * @var null|string
     */
    private $fileName;

    /**
     * GenericCSVImport constructor.
     * @param string|null $fileName
     */
    public function __construct(
        string $fileName = null
    )
    {
        $this->fileName = $fileName;
    }

    public function execute()
    {
        if (!$this->fileName) {
            return false;
        }

        echo "\n";
        echo $this->fileName;
        echo "\n";

        //TODO process file;

        return true;
    }

}
