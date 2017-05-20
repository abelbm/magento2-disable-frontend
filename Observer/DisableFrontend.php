<?php
namespace Abelbm\DisableFrontend\Observer;
use Magento\Framework\Event\ObserverInterface;

class DisableFrontend implements ObserverInterface{

    protected   $_actionFlag;
    protected   $redirect;
    private     $HelperBackend;
    private     $logger;
    
    /**
     * 
     * @author Abel Bolanos Martinez <abelbmartinez@gmail.com> 
     * @param \Magento\Framework\App\ActionFlag $actionFlag
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param \Magento\Backend\Helper\Data $HelperBackend
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\ActionFlag $actionFlag,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Backend\Helper\Data $HelperBackend,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_actionFlag = $actionFlag;
        $this->redirect = $redirect;
        $this->HelperBackend = $HelperBackend;
        $this->logger = $logger;
    }
    
    /**
     *
     * @author Abel Bolanos Martinez <abelbmartinez@gmail.com>
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer){
        
        //$this->logger->info('TEST LOGGER');
        
        $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
        
        //custom redirect
        //$controller = $observer->getControllerAction();
        //$this->redirect->redirect($controller->getResponse(),$this->HelperBackend->getHomePageUrl());
    }
}