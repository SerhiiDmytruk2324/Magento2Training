<?php

namespace Elogic\Author\Model\ResourceModel\Author;

use Elogic\Author\Model\Author;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Elogic\Author\Model\ResourceModel\Author as AuthorResource;

class Collection extends AbstractCollection
{
    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(Author::class, AuthorResource::class);
    }
}
