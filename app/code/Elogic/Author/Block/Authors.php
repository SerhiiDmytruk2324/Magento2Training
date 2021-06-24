<?php

namespace Elogic\Author\Block;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Model\AuthorFactory;
use Elogic\Author\Model\AuthorRepository;
use Elogic\Author\Model\ResourceModel\Author\Collection;
use Elogic\Author\Model\ResourceModel\Author\CollectionFactory as AuthorCollectionFactory;
use Magento\Framework\View\Element\Template;
use Elogic\Author\Model\ResourceModel\AuthorFactory as AuthorResourceFactory;

class Authors extends Template
{
    /**
     * @var AuthorFactory
     */
    private $authorFactory;
    /**
     * @var AuthorResourceFactory
     */
    private $authorResourceFactory;
    /**
     * @var CollectionFactory
     */
    private $authorCollectionFactory;
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * Authors constructor.
     * @param Template\Context $context
     * @param AuthorFactory $authorFactory
     * @param AuthorResourceFactory $authorResourceFactory
     * @param AuthorCollectionFactory $authorCollectionFactory
     * @param AuthorRepositoryInterface $authorRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AuthorFactory $authorFactory,
        AuthorResourceFactory $authorResourceFactory,
        AuthorCollectionFactory $authorCollectionFactory,
        AuthorRepositoryInterface $authorRepository,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->authorFactory = $authorFactory;
        $this->authorResourceFactory = $authorResourceFactory;
        $this->authorCollectionFactory = $authorCollectionFactory;
        $this->authorRepository = $authorRepository;
    }

    public function getAuthor()
    {
        return $this->authorRepository->getById(1);
    }

    public function getAuthors()
    {
        /** @var Collection $collection */
        $collection = $this->authorCollectionFactory->create();

        $collection->addFieldToFilter("author_id", [
            "gt" => 3
        ]);
        return $collection;
    }

}