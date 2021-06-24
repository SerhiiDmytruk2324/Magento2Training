<?php

declare(strict_types=1);

namespace Elogic\Author\Model;

use Elogic\Author\Api\Data\AuthorInterface;
use Magento\Framework\Model\AbstractModel;
use Elogic\Author\Model\ResourceModel\Author as AuthorResource;

class Author extends AbstractModel implements AuthorInterface
{
    protected $_eventPrefix = "author";

    protected $_eventObject = "author";

    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(AuthorResource::class);
    }

    /**
     * @return int|null
     */
    public function getAuthorId() : ?int
    {
        $id = (int)$this->getData(self::AUTHOR_ID);
        return $id;
    }

    /**
     * @return null|string
     */
    public function getFullName() : ?string
    {
        return $this->getData(self::FULL_NAME);
    }

    /**
     * @return null|string
     */
    public function getLivingYears() : ?string
    {
        return $this->getData(self::LIVING_YEARS);
    }

    /**
     * @return null|string
     */
    public function getCreationTime() : ?string
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @return null|string
     */
    public function getUpdateTime() : ?string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @param int $id
     * @return AuthorInterface
     */
    public function setAuthorId(int $id) : AuthorInterface
    {
        return $this->setData(self::AUTHOR_ID, $id);
    }

    /**
     * @param string $name
     * @return AuthorInterface
     */
    public function setFullName(string $name) : AuthorInterface
    {
        return $this->setData(self::FULL_NAME, $name);
    }

    /**
     * @param string $years
     * @return AuthorInterface
     */
    public function setLivingYears(string $years) : AuthorInterface
    {
        return $this->setData(self::LIVING_YEARS, $years);
    }

    /**
     * @param string $creationTime
     * @return AuthorInterface
     */
    public function setCreationTime(string $creationTime) : AuthorInterface
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * @param string $updateTime
     * @return AuthorInterface
     */
    public function setUpdateTime(string $updateTime) : AuthorInterface
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}
