<?php

namespace Training\Test\App;

class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var \Magento\Framework\App\RouterListInterface
     */
    protected $routerList;
    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $response;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @param \Magento\Framework\App\RouterListInterface $routerList
     * @param \Magento\Framework\App\ResponseInterface $response
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\RouterListInterface $routerList,
        \Magento\Framework\App\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
        parent::__construct($routerList, $response);
    }
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}
