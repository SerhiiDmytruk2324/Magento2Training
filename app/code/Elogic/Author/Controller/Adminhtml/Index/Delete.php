<?php

namespace Elogic\Author\Controller\Adminhtml\Index;

use Elogic\Author\Api\AuthorRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Delete extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elogic_Author::delete';
    /**
     * @var AuthorRepositoryInterface
     */
    private $authorRepository;

    /**
     * Delete constructor.
     * @param Context $context
     * @param AuthorRepositoryInterface $authorRepository
     */
    public function __construct(
        Context $context,
        AuthorRepositoryInterface $authorRepository
    )
    {
        parent::__construct($context);
        $this->authorRepository = $authorRepository;
    }

    public function execute()
    {
        $authorId = $this->getRequest()->getParam('author_id');
        if (!$authorId) {
            $this->messageManager->addErrorMessage("No author Specified");
        }

        try {
            $this->authorRepository->deleteById($authorId);
            $this->messageManager->addSuccessMessage("Author Removed");
        } catch (NoSuchEntityException $exception) {
            $this->messageManager->addErrorMessage("Can not find author to delete");
        }

        $redirect = $this->resultRedirectFactory->create();

        return $redirect->setPath("*/*/index");
    }
}