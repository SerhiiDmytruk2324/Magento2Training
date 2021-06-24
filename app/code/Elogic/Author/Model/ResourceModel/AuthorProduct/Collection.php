<?php

namespace Elogic\Author\Model\ResourceModel\AuthorProduct;

use Elogic\Author\Model\AuthorProduct;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Elogic\Author\Model\ResourceModel\AuthorProduct as AuthorProductResource;

class Collection extends AbstractCollection
{
    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(AuthorProduct::class, AuthorProductResource::class);
    }
}
