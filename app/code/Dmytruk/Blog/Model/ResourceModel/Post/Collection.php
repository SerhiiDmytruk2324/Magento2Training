<?php


namespace Dmytruk\Blog\Model\ResourceModel\Post;

use Dmytruk\Blog\Model\ResourceModel\Post as PostResource;
use Dmytruk\Blog\Model\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Dmytruk\Blog\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, PostResource::class);
    }
}
