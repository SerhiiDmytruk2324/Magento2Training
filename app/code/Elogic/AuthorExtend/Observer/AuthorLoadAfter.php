<?php

namespace Elogic\AuthorExtend\Observer;

use Elogic\Author\Api\Data\AuthorInterface;
use Magento\Framework\Event\ObserverInterface;

class AuthorLoadAfter implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var AuthorInterface $author */
        $author = $observer->getAuthor();
        $author->setLivingYears($author->getLivingYears()."???");
    }
}
