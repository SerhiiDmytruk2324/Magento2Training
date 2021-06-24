<?php

declare(strict_types=1);

namespace Elogic\AuthorExtend\ViewModel;

use Elogic\Author\Helper\Data;

class AuthorViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var Data
     */
    private $authorHelper;

    /**
     * AuthorViewModel constructor.
     * @param Data $authorHelper
     */
    public function __construct(
        Data $authorHelper
    )
    {
        $this->authorHelper = $authorHelper;
    }

    /**
     * @return bool
     */
    public function isAuthorModuleEnabled() : bool
    {
        return $this->authorHelper->isEnabled();
    }
}
