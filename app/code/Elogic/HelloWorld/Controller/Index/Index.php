<?php

namespace Elogic\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Index extends Action implements HttpGetActionInterface, HttpPostActionInterface
{
    public function execute()
    {
        echo "Index Index";
    }
}