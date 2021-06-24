<?php

declare(strict_types=1);

namespace Elogic\Author\Plugin;

use Elogic\Author\Api\AuthorProductRepositoryInterface;
use Elogic\Author\Model\AuthorProductFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductRepositoryExtension
{
    /**
     * @var AuthorProductRepositoryInterface
     */
    private $authorProductRepository;
    /**
     * @var AuthorProductFactory
     */
    private $authorProductFactory;

    /**
     * ProductRepositoryExtension constructor.
     * @param AuthorProductRepositoryInterface $authorProductRepository
     * @param AuthorProductFactory $authorProductFactory
     */
    public function __construct(
        AuthorProductRepositoryInterface $authorProductRepository,
        AuthorProductFactory $authorProductFactory
    )
    {

        $this->authorProductRepository = $authorProductRepository;
        $this->authorProductFactory = $authorProductFactory;
    }

    public function afterGet
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $entity
    ) {
        try {

            $author = $this->authorProductRepository->getByProductId((int)$entity->getId());

            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setAuthorId($author->getAuthorId());
            $entity->setExtensionAttributes($extensionAttributes);
        } catch (NoSuchEntityException $exception) {

        }

        return $entity;
    }

    public function afterGetById
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $entity
    ) {
        try {

            $author = $this->authorProductRepository->getByProductId((int)$entity->getId());

            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setAuthorId($author->getAuthorId());
            $entity->setExtensionAttributes($extensionAttributes);
        } catch (NoSuchEntityException $exception) {

        }

        return $entity;
    }

    public function afterSave
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $result, /** result from the save call **/
        \Magento\Catalog\Api\Data\ProductInterface $entity  /** original parameter to the call **/
        /** other parameter not required **/
    ) {
        $extensionAttributes = $entity->getExtensionAttributes(); /** get original extension attributes from entity **/
        $authorId = $extensionAttributes->getAuthorId();

        try {
            $authorProduct = $this->authorProductRepository->getByProductId((int)$entity->getId());
        } catch (NoSuchEntityException $exception) {
            $authorProduct = $this->authorProductFactory->create();
            $authorProduct->setProductId((int)$entity->getId());
        }

        $authorProduct->setAuthorId((int)$authorId);

        $this->authorProductRepository->save($authorProduct);

        return $result;
    }
}
