<?php

namespace Elogic\AuthorExtend\Plugin;

use Elogic\Author\Api\Data\AuthorInterface;

class AuthorPlugin
{
    public function afterGetFullName(AuthorInterface $author, string $result)
    {
        return $result."!!!";
    }
}
