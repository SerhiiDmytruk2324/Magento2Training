<?php

declare(strict_types=1);

namespace Elogic\Author\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    const IS_AUTHOR_ENABLED_CONFIG_PATH = "author/general/enabled";
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * Data constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    /**
     * @return bool
     */
    public function isEnabled() : bool
    {
        return $this->scopeConfig->isSetFlag(
            self::IS_AUTHOR_ENABLED_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()
        );
    }
}