<?php
namespace Abelbm\DisableFrontend\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Backend\Helper\Data;
use Abelbm\DisableFrontend\Helper\Data as DisableFrontendHelper;

class DisableFrontend implements ObserverInterface{

    protected   $_actionFlag;
    protected   $redirect;
    private     $helperBackend;
    private     $logger;
    private     $disableFrontendHelper;

    /**
     * DisableFrontend constructor.
     *
     * @author Abel Bolanos Martinez <abelbmartinez@gmail.com>
     * @param ActionFlag $actionFlag
     * @param RedirectInterface $redirect
     * @param Data $helperBackend
     * @param DisableFrontendHelper $disableFrontendHelper
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        ActionFlag $actionFlag,
        RedirectInterface $redirect,
        Data $helperBackend,
        DisableFrontendHelper $disableFrontendHelper,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_actionFlag = $actionFlag;
        $this->redirect = $redirect;
        $this->helperBackend = $helperBackend;
        $this->logger = $logger;
        $this->disableFrontendHelper = $disableFrontendHelper;
    }
    
    /**
     * Show an empty page(default) or redirect to Admin site.
     * Depend in the config in
     * Stores > Configuration > Advanced > Admin > Disable Frontend
     *
     * @author Abel Bolanos Martinez <abelbmartinez@gmail.com>
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer){

        //$this->logger->info('TEST');
        
        $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
        
        if($this->disableFrontendHelper->getConfigValue()){//redirect to Admin
            $controller = $observer->getControllerAction();
            $this->redirect->redirect($controller->getResponse(),$this->helperBackend->getHomePageUrl());
        }
    }
}