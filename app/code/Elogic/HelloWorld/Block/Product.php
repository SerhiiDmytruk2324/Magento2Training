<?php

namespace Elogic\HelloWorld\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class Product extends Template
{
    protected $_template = "index.phtml";

    /**
     * @var \Magento\Catalog\Model\Product
     */
    private $product;

    /**
     * Product constructor.
     * @param Template\Context $context
     * @param ProductRepositoryInterface $product
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $product,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
       $collection = $this->product->getCollection();


       $collection->addFilter("full_name", ["eq"=>"Seneca"]);
       $collection->addFieldToSelect("full_name");

       $collection->addAttributeToSelect();
       $collection->addAttributeToFilter();



       return $this->product;
    }

    public function toHtml()
    {
        return parent::toHtml(); // TODO: Change the autogenerated stub
    }
}