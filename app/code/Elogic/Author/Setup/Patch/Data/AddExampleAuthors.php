<?php

namespace Elogic\Author\Setup\Patch\Data;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Api\Data\AuthorInterface;
use Elogic\Author\Model\AuthorFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddExampleAuthors implements DataPatchInterface
{
    /**
     * @var AuthorRepositoryInterface
     */
    private $authorRepository;
    /**
     * @var AuthorFactory
     */
    private $authorFactory;

    /**
     * AddExampleAuthors constructor.
     * @param AuthorRepositoryInterface $authorRepository
     * @param AuthorFactory $authorFactory
     */
    public function __construct(
        AuthorRepositoryInterface $authorRepository,
        AuthorFactory $authorFactory
    )
    {
        $this->authorRepository = $authorRepository;
        $this->authorFactory = $authorFactory;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function apply()
    {
        /** @var AuthorInterface $firstAuthor */
        $firstAuthor = $this->authorFactory->create();
        $firstAuthor->setFullName("Seneca");
        $this->authorRepository->save($firstAuthor);

        /** @var AuthorInterface $secondAuthor */
        $secondAuthor = $this->authorFactory->create();
        $secondAuthor->setFullName("Homer");
        $this->authorRepository->save($secondAuthor);
    }

    public function getAliases()
    {
        return [];
    }
}
