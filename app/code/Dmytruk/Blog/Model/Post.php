<?php


namespace Dmytruk\Blog\Model;


use Dmytruk\Blog\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;
use Dmytruk\Blog\Model\ResourceModel\Post as PostResource;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }
}
