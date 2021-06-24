<?php

declare(strict_types=1);

namespace Elogic\Author\Api\Data;

/**
 * Interface AuthorInterface
 * @package Elogic\Author\Api\Data
 */
interface AuthorProductInterface
{
    CONST ID = "id";
    CONST AUTHOR_ID = "author_id";
    CONST PRODUCT_ID = "product_id";

    /**
     * @return int|null
     */
    public function getAuthorId() : ?int;

    /**
     * @return int|null
     */
    public function getProductId() : ?int;

    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function setAuthorId(int $id) : AuthorProductInterface;

    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function setProductId(int $id) : AuthorProductInterface;

}
