<?php

namespace Training\Test\Observer;
use Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\App\Action\HttpPostActionInterface;

class LogPageHtml implements ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
//        $response = $observer->getEvent()->getData('request');
//        $this->logger->debug($response->getBody());
        $this->logger->debug('qwerty');
    }
}
