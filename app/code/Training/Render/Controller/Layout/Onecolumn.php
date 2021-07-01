<?php

namespace Training\Render\Controller\Layout;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Onecolumn implements HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->pageFactory->create();
        echo "dqdq";
    }
}
