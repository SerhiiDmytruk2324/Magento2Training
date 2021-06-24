<?php

declare(strict_types=1);

namespace Elogic\Author\Model;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Model\ResourceModel\Author\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;

class DataProvider extends ModifierPoolDataProvider
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var AuthorRepositoryInterface
     */
    private $authorRepository;
    /**
     * @var AuthorFactory
     */
    private $authorFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     * @param null $pool
     * @param RequestInterface $request
     * @param AuthorRepositoryInterface $authorRepository
     * @param AuthorFactory $authorFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [],
        $pool = null,
        RequestInterface $request,
        AuthorRepositoryInterface $authorRepository,
        AuthorFactory $authorFactory,
        CollectionFactory $collectionFactory
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
        $this->request = $request;
        $this->authorRepository = $authorRepository;
        $this->authorFactory = $authorFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        $authorId = $this->request->getParam($this->requestFieldName);
        try {
            $author = $this->authorRepository->getById((int)$authorId);
        } catch (NoSuchEntityException $exception) {
            $author = $this->authorFactory->create();
        }
        $this->loadedData[$author->getId()] = $author->getData();
        return $this->loadedData;
    }
}