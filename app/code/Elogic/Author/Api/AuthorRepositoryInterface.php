<?php

declare(strict_types=1);

namespace Elogic\Author\Api;

use Elogic\Author\Api\Data\AuthorInterface;

interface AuthorRepositoryInterface
{
    /**
     * @param int $id
     * @return AuthorInterface
     */
    public function getById(int $id) : AuthorInterface;

    /**
     * @param AuthorInterface $author
     * @return void
     */
    public function save(AuthorInterface $author) : void;

    /**
     * @param AuthorInterface $author
     * @return void
     */
    public function delete(AuthorInterface $author) : void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id) : void;
}
