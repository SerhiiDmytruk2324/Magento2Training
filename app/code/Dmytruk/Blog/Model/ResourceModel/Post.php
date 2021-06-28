<?php


namespace Dmytruk\Blog\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Post
 * @package Dmytruk\Blog\Model\ResourceModel
 */
class Post extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('dmytruk_blog_page_post', 'post_id');
    }
}
