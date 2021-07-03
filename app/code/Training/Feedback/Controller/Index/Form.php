<?php

namespace Training\Feedback\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Form implements HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageResultFactory;

    public function __construct(
        PageFactory $pageResultFactory
    ) {
        $this->pageResultFactory = $pageResultFactory;
    }
    public function execute()
    {
        return $this->pageResultFactory->create();
    }
}
