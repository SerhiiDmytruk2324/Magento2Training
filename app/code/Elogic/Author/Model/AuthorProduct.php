<?php

declare(strict_types=1);

namespace Elogic\Author\Model;

use Elogic\Author\Api\Data\AuthorProductInterface;
use Magento\Framework\Model\AbstractModel;
use Elogic\Author\Model\ResourceModel\AuthorProduct as AuthorProductResource;

class AuthorProduct extends AbstractModel implements AuthorProductInterface
{
    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(AuthorProductResource::class);
    }

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return (int)$this->getData(self::AUTHOR_ID);
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return (int)$this->getData(self::PRODUCT_ID);
    }

    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function setAuthorId(int $id): AuthorProductInterface
    {
        return $this->setData(self::AUTHOR_ID, $id);
    }

    /**
     * @param int $id
     * @return AuthorProductInterface
     */
    public function setProductId(int $id): AuthorProductInterface
    {
        return $this->setData(self::PRODUCT_ID, $id);
    }
}
