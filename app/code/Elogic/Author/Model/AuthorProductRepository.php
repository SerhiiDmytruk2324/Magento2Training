<?php

declare(strict_types=1);

namespace Elogic\Author\Model;

use Elogic\Author\Api\AuthorProductRepositoryInterface;
use Elogic\Author\Api\Data\AuthorProductInterface;
use Elogic\Author\Model\ResourceModel\AuthorProductFactory as AuthorProductResourceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class AuthorProductRepository implements AuthorProductRepositoryInterface
{
    /**
     * @var AuthorProductFactory
     */
    private $authorProductFactory;
    /**
     * @var AuthorProductResourceFactory
     */
    private $authorProductResourceFactory;

    /**
     * AuthorProductRepository constructor.
     * @param AuthorProductFactory $authorProductFactory
     * @param AuthorProductResourceFactory $authorProductResourceFactory
     */
    public function __construct(
        AuthorProductFactory $authorProductFactory,
        AuthorProductResourceFactory $authorProductResourceFactory
    )
    {
        $this->authorProductFactory = $authorProductFactory;
        $this->authorProductResourceFactory = $authorProductResourceFactory;
    }

    /**
     * @param int $id
     * @return AuthorProductInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): AuthorProductInterface
    {
        $author = $this->authorProductFactory->create();
        $this->authorProductResourceFactory->create()->load($author, $id);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__("There is no Author with this ID"));
        }
        return $author;
    }

    /**
     * @param int $id
     * @return AuthorProductInterface
     * @throws NoSuchEntityException
     */
    public function getByProductId(int $id): AuthorProductInterface
    {
        $author = $this->authorProductFactory->create();
        $this->authorProductResourceFactory->create()->load($author, $id, AuthorProductInterface::PRODUCT_ID);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__("There is no Author with this ID"));
        }
        return $author;
    }

    /**
     * @param AuthorProductInterface $author
     */
    public function save(AuthorProductInterface $author): void
    {
        $this->authorProductResourceFactory->create()->save($author);
    }

    /**
     * @param AuthorProductInterface $author
     */
    public function delete(AuthorProductInterface $author): void
    {
        $this->authorProductResourceFactory->create()->delete($author);
    }

    /**
     * @param int $id
     */
    public function deleteById(int $id): void
    {
        $author = $this->getById($id);
        $this->delete($author);
    }
}
