<?php

namespace Training\TestOM\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;

class Index implements HttpGetActionInterface
{
    private \Training\TestOM\Model\Test $test;

    public function __construct
    (
        \Training\TestOM\Model\Test $test
    )
    {
        $this->test = $test;
    }

    public function execute()
    {
        $this->test->log();
        exit();
    }
}
