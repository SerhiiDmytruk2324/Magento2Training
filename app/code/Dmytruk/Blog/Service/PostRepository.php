<?php


namespace Dmytruk\Blog\Service;


use Dmytruk\Blog\Api\Data\PostInterface;
use Dmytruk\Blog\Api\PostManagementInterface;
use Dmytruk\Blog\Api\PostRepositoryInterface;
use Dmytruk\Blog\Model\Post;
use Dmytruk\Blog\Model\ResourceModel\Post as PostResource;
use Dmytruk\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Dmytruk\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use Magento\Cms\Api\Data\PageSearchResultsInterface;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class PostRepository
 * @package Dmytruk\Blog\Service
 */
class PostRepository implements PostRepositoryInterface
{
    private $pageRepository;

    private $searchCriteriaBuilder;
    /**
     * @var Post
     */
    private $resource;

    /**
     * @var PostManagementInterface
     */
    private $postManagement;

    /**
     * @var PostCollectionFactory
     */
    private $postCollectionFactory;

    /**
     * PostRepository constructor.
     * @param PageRepositoryInterface $pageRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PostResource $resource
     * @param PostManagementInterface $postManagement
     * @param PostCollectionFactory $postCollectionFactory
     */
    public function __construct
    (
        PageRepositoryInterface $pageRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        PostResource $resource,
        PostManagementInterface $postManagement,
        PostCollectionFactory $postCollectionFactory
    )
    {
        $this->pageRepository = $pageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->resource = $resource;
        $this->postManagement = $postManagement;
        $this->postCollectionFactory = $postCollectionFactory;

    }

    /**
     * @return PageSearchResultsInterface
     * @throws LocalizedException
     */
    public function get()
    {
        $postCollection = $this->postCollectionFactory->create();
        $postCollection->addFieldToFilter('is_post', ['eq'=>1]);

        $pageIds = [];

        /** @var Post $post */
        foreach ($postCollection->getItems() as $post) {
            $pageIds[] = $post->getData('page_id');
        }

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('page_id', $pageIds, 'in')
            ->create();

        return $this->pageRepository->getList($searchCriteria);
    }

    /**
     * @param int $pageId
     * @return PostInterface|Post
     */
    public function getByPageId($pageId): PostInterface
    {
        $post = $this->postManagement->getEmptyObject();
        $this->resource->load($post, $pageId, 'page_id');

        return $post;
    }
}
