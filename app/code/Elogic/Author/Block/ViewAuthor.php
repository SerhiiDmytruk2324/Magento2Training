<?php

namespace Elogic\Author\Block;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Api\Data\AuthorInterface;
use Elogic\Author\Model\AuthorFactory;
use Elogic\Author\Model\AuthorRepository;
use Elogic\Author\Model\ResourceModel\Author\Collection;
use Elogic\Author\Model\ResourceModel\Author\CollectionFactory as AuthorCollectionFactory;
use Magento\Framework\View\Element\Template;
use Elogic\Author\Model\ResourceModel\AuthorFactory as AuthorResourceFactory;

class ViewAuthor extends Template
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * Authors constructor.
     * @param Template\Context $context
     * @param AuthorRepositoryInterface $authorRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AuthorRepositoryInterface $authorRepository,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->authorRepository = $authorRepository;
    }

    public function getAuthor() : ?AuthorInterface
    {
        $id = $this->getRequest()->getParam("id");
        return $this->authorRepository->getById($id);
    }
}