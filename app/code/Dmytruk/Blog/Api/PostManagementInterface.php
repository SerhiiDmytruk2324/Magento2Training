<?php

namespace Dmytruk\Blog\Api;

use Dmytruk\Blog\Api\Data\PostInterface;

/**
 * Interface PostManagementInterface
 * @api
 * @package Dmytruk\Blog\Api
 */
interface PostManagementInterface
{
    /**
     * @return PostInterface
     */
    public function getEmptyObject();

    /**
     * @param PostInterface $post
     * @return void
     */
    public function save(PostInterface $post);
}
