<?php

namespace Elogic\Author\Block;

use Elogic\Author\Api\Data\AuthorInterface;
use Elogic\Author\Model\Author;
use Magento\Framework\View\Element\Template;
use Elogic\Author\Model\ResourceModel\Author as ResourceAuthor;

class DiImplement extends Template
{
    /**
     * @var Author
     */
    private $author;
    /**
     * @var ResourceAuthor
     */
    private $authorResource;

    public function __construct(
        Template\Context $context,
        AuthorInterface $author,
        ResourceAuthor $authorResource,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->author = $author;
        $this->authorResource = $authorResource;
    }

    public function getAuthor()
    {
        echo get_class($this->author);die;
        return $this->author->load(2);
    }
}