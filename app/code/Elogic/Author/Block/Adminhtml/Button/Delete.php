<?php

namespace Elogic\Author\Block\Adminhtml\Button;

use Magento\Backend\App\Action\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    private $context;
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * Save constructor.
     * @param Context $context
     * @param UrlInterface $url
     */
    public function __construct(
        Context $context,
        UrlInterface $url
    )
    {

        $this->context = $context;
        $this->url = $url;
    }

    public function getButtonData()
    {
        $data = [];
        if ($this->getAuthorId()) {
            $data = [
                'label' => __('Delete Author'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    private function getAuthorId()
    {
        return $this->context->getRequest()->getParam("author_id");
    }

    private function getDeleteUrl()
    {
        return $this->url->getUrl("*/*/delete", ["author_id" => $this->getAuthorId()]);
    }
}