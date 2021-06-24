<?php

declare(strict_types=1);

namespace Elogic\Author\Api\Data;

/**
 * Interface AuthorInterface
 * @package Elogic\Author\Api\Data
 */
interface AuthorInterface
{
    CONST AUTHOR_ID = "author_id";
    CONST FULL_NAME = "full_name";
    CONST LIVING_YEARS = "living_years";
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';

    /**
     * @return int|null
     */
    public function getAuthorId() : ?int;

    /**
     * @return null|string
     */
    public function getFullName() : ?string;

    /**
     * @return null|string
     */
    public function getLivingYears() : ?string;

    /**
     * @return null|string
     */
    public function getCreationTime() : ?string;

    /**
     * @return null|string
     */
    public function getUpdateTime() : ?string;

    /**
     * @param int $id
     * @return AuthorInterface
     */
    public function setAuthorId(int $id) : AuthorInterface;

    /**
     * @param string $name
     * @return AuthorInterface
     */
    public function setFullName(string $name) : AuthorInterface;

    /**
     * @param string $years
     * @return AuthorInterface
     */
    public function setLivingYears(string $years) : AuthorInterface;

    /**
     * @param string $creationTime
     * @return AuthorInterface
     */
    public function setCreationTime(string $creationTime) : AuthorInterface;

    /**
     * @param string $updateTime
     * @return AuthorInterface
     */
    public function setUpdateTime(string $updateTime) : AuthorInterface;
}
