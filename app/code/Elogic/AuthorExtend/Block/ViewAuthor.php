<?php

namespace Elogic\AuthorExtend\Block;

use Elogic\Author\Api\Data\AuthorInterface;
use Elogic\Author\Block\ViewAuthor as OriginalViewAuthor;
use Magento\Framework\Exception\NoSuchEntityException;

class ViewAuthor extends OriginalViewAuthor
{
    public function getAuthor(): ?AuthorInterface
    {
        try {
            return parent::getAuthor();
        } catch (NoSuchEntityException $exception)
        {
            echo __("Author NOT FOUND");
        }
        return null;
    }
}