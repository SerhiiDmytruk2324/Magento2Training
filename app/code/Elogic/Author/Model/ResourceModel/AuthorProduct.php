<?php

namespace Elogic\Author\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AuthorProduct extends AbstractDb
{
    public function _construct()
    {
        $this->_init("author_product","id");
    }
}
