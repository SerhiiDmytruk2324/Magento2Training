<?php

namespace Elogic\Author\Controller\Adminhtml\Index;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Elogic\Author\Model\AuthorFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends Action implements HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elogic_Author::author';
    /**
     * @var AuthorRepositoryInterface
     */
    private $authorRepository;
    /**
     * @var AuthorFactory
     */
    private $authorFactory;
    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param AuthorRepositoryInterface $authorRepository
     * @param AuthorFactory $authorFactory
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        Context $context,
        AuthorRepositoryInterface $authorRepository,
        AuthorFactory $authorFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->authorRepository = $authorRepository;
        $this->authorFactory = $authorFactory;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $authorData = $this->getRequest()->getParams();

        $author = $this->authorFactory->create();

        $author->setData($authorData);

        if(!$author->getData("author_id")) {
            $author->unsetData("author_id");
        }

        $this->authorRepository->save($author);

        return $this->redirectFactory->create()->setPath("*/*/index");
    }
}