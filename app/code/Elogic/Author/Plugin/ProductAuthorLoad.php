<?php

declare(strict_types=1);

namespace Elogic\Author\Plugin;

use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Magento\Catalog\Api\Data\ProductExtensionInterface;
use Magento\Catalog\Api\Data\ProductInterface;

class ProductAuthorLoad
{
    /**
     * @var ProductExtensionFactory
     */
    private $productExtensionFactory;

    /**
     * ProductAuthorLoad constructor.
     * @param ProductExtensionFactory $productExtensionFactory
     */
    public function __construct(
        ProductExtensionFactory $productExtensionFactory
    )
    {
        $this->productExtensionFactory = $productExtensionFactory;
    }

    /**
     * Loads product entity extension attributes
     *
     * @param ProductInterface $entity
     * @param ProductExtensionInterface|null $extension
     * @return ProductExtensionInterface
     */
    public function afterGetExtensionAttributes(
        ProductInterface $entity,
        ProductExtensionInterface $extension = null
    ) {
        if ($extension === null) {
            $extension = $this->productExtensionFactory->create();
        }

        return $extension;
    }
}
