<?php

namespace Dmytruk\Blog\Api;

use Dmytruk\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 */
interface PostRepositoryInterface
{
    /**
     * @return PostInterface
     */
    public function get();

    /**
     * @param int $pageId
     * @return PostInterface
     */
    public function getByPageId($pageId): PostInterface;
}
