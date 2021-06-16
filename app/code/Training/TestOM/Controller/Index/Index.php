<?php

namespace Training\TestOM\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Training\TestOM\Model\PlayWithTest;
use \Training\TestOM\Model\Test;

class Index implements HttpGetActionInterface
{
    private $test;
    private $playtest;

    public function __construct
    (
        Test $test,
        PlayWithTest $playtest
    )
    {
        $this->test = $test;
        $this->playtest = $playtest;
    }

    public function execute()
    {
        $this->playtest->run();
        exit();
    }
}
