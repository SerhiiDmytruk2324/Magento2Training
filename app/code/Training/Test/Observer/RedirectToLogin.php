<?php

namespace Training\Test\Observer;
use Magento\Framework\Event\ObserverInterface;
class RedirectToLogin implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    private $redirect;
    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    private $actionFlag;
    private $customerSession;

    /**
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param \Magento\Framework\App\ActionFlag $actionFlag
     */
    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    )
    {
        $this->customerSession = $customerSession;
        $this->redirect = $redirect;
        $this->actionFlag = $actionFlag;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');
//        if ($request->getModuleName() == 'catalog'
//            && $request->getControllerName() == 'product'
//            && $request->getActionName() == 'view'
//        ) {
//        if ($request->getFullActionName() == 'controller_action_predispatch') { // altenative way
            $controller = $observer->getEvent()->getData('controller_action');
            $this->actionFlag->set('', \Magento\Framework\App\ActionInterface::FLAG_NO_DISPATCH,

                true);
//            $this->redirect->redirect($controller->getResponse(), 'customer/account/login');
            if (!$this->customerSession->isLoggedIn()) {
                return $this->redirect->redirect($controller->getResponse(), 'customer/account/login');
            }
        }
}
