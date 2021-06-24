<?php

declare(strict_types=1);

namespace Elogic\Author\Model;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Api\Data\AuthorInterface;
use Elogic\Author\Model\ResourceModel\AuthorFactory as AuthorResourceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * @var AuthorResourceFactory
     */
    private $authorResourceFactory;
    /**
     * @var \Elogic\Author\Model\AuthorFactory
     */
    private $authorFactory;

    /**
     * AuthorRepository constructor.
     * @param \Elogic\Author\Model\AuthorFactory $authorFactory
     * @param AuthorResourceFactory $authorResourceFactory
     */
    public function __construct(
        AuthorFactory $authorFactory,
        AuthorResourceFactory $authorResourceFactory
    )
    {
        $this->authorResourceFactory = $authorResourceFactory;
        $this->authorFactory = $authorFactory;
    }

    /**
     * @param int $id
     * @return AuthorInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id) : AuthorInterface
    {
        $author = $this->authorFactory->create();
        $this->authorResourceFactory->create()->load($author, $id);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__("There is no Author with this ID"));
        }
        return $author;
    }

    /**
     * @param AuthorInterface $author
     * @return void
     */
    public function save(AuthorInterface $author) : void
    {
        $this->authorResourceFactory->create()->save($author);
    }

    /**
     * @param AuthorInterface $author
     * @return void
     */
    public function delete(AuthorInterface $author) : void
    {
        $this->authorResourceFactory->create()->delete($author);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id) : void
    {
        $author = $this->getById($id);
        $this->delete($author);
    }
}
