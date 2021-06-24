<?php

namespace Elogic\Author\Controller\Index;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class GetAuthor extends Action implements HttpPostActionInterface, HttpGetActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * SetAuthor constructor.
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository
    )
    {
        parent::__construct($context);
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        $product = $this->productRepository->get("test");

        echo $product->getExtensionAttributes()->getAuthorId();
//        $this->productRepository->save($product);
//        echo  "ok";
    }
}
