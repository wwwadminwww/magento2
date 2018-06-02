<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 02.06.18
 * Time: 12:50
 */

namespace Solovyov\Vendors\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Solovyov\Vendors\Model\Vendor
     */
    protected $_model;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param \Solovyov\Vendors\Model\Vendor $model
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Solovyov\Vendors\Model\Vendor $model
    ) {
        $this->_coreRegistry = $registry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_model = $model;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Solovyov_Denis::vendor_save');
    }

    /**
     * Init actions
     *
     * @return \Magento\Framework\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Solovyov_Vendors::vendor')
            ->addBreadcrumb(__('Vendor'), __('Vendor'))
            ->addBreadcrumb(__('Manage Vendors'), __('Manage Vendors'));
        return $resultPage;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_model;

        if($id){
            $model->load($id);
            if(!$model->getId()){
                $this->messageManager->addError(__('This vendor not exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if(!empty($data)){
            $model->setData($data);
        }
        $this->_coreRegistry->register('vendors_vendor', $model);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Vendor') : __('New Vendor'),
            $id ? __('Edit Vendor') : __('New Vendor')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Vendors'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Vendor'));

        return $resultPage;
    }
}