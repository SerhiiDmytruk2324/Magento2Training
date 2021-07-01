<?php

namespace Training\Test\Controller\Block;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    private $layoutFactory;

    /**
     * @var \Magento\Framework\Controller\Result\RawFactory
     */
    private $resultRawFactory;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->layoutFactory = $layoutFactory;
        $this->resultRawFactory = $resultRawFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $layoutFactory = $this->layoutFactory->create();
        $block = $layoutFactory->createBlock('Training\Test\Block\Test');
        $this->getResponse()->appendBody($block->_toHtml());

        $resultRaw = $this->resultRawFactory->create();
        return $resultRaw->setContents($block->toHtml());
    }
}
