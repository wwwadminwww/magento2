<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 30.05.18
 * Time: 02:48
 */

namespace Solovyov\Vendors\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     *
     */
    const ADMIN_RESOURCE = 'Solovyov_Vendors::vendor';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Solovyov_Vendors::vendor');
        $resultPage->addBreadcrumb(__('Vendors'), __('Vendors'));
        $resultPage->addBreadcrumb(__('Manage Vendor'), __('Manage Vendor'));
        $resultPage->getConfig()->getTitle()->prepend(__('Vendor'));

        return $resultPage;
    }
}