<?php

namespace Elogic\Author\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Author extends AbstractDb
{
    public function _construct()
    {
        $this->_init("author","author_id");
    }
}
