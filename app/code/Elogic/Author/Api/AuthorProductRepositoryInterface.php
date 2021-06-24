<?php

declare(strict_types=1);

namespace Elogic\Author\Api;

use Elogic\Author\Api\Data\AuthorProductInterface;

interface AuthorProductRepositoryInterface
{
    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function getById(int $id) : AuthorProductInterface;

    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function getByProductId(int $id) : AuthorProductInterface;

    /**
     * @param AuthorProductInterface $author
     * @return void
     */
    public function save(AuthorProductInterface $author) : void;

    /**
     * @param AuthorProductInterface $author
     * @return void
     */
    public function delete(AuthorProductInterface $author) : void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id) : void;
}
