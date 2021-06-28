<?php


namespace Dmytruk\Blog\Service;

use Dmytruk\Blog\Api\Data\PostInterface;
use Dmytruk\Blog\Api\PostManagementInterface;
use Dmytruk\Blog\Model\PostFactory;
use Dmytruk\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Exception\AlreadyExistsException;

/**
 * Class PostManagement
 */
class PostManagement implements PostManagementInterface
{
    /**
     * @var PostFactory
     */
    private $postFactory;

    /**
     * @var PostResource
     */
    private $resource;

    /**
     * PostManagement constructor.
     * @param PostFactory $postFactory
     * @param PostResource $resource
     */
    public function __construct
    (
        PostFactory $postFactory,
        PostResource $resource
    )
    {
        $this->postFactory = $postFactory;
        $this->resource = $resource;
    }

    /**
     * @return PostInterface
     */
    public function getEmptyObject(): PostInterface
    {
        return $this->postFactory->create();
    }

    /**
     * @param PostInterface $post
     * @throws AlreadyExistsException
     */
    public function save(PostInterface $post)
    {
        $this->resource->save($post);
    }
}
