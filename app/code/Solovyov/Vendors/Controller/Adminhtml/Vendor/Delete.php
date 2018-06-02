<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 02.06.18
 * Time: 14:16
 */

namespace Solovyov\Vendors\Controller\Adminhtml\Vendor;


use Magento\Backend\App\Action;

class Delete extends Action
{
    /**
     * @var \Solovyov\Vendors\Model\Vendor
     */
    protected $_model;

    /**
     * @param Action\Context $context
     * @param \Solovyov\Vendors\Model\Vendor $model
     */
    public function __construct(
        Action\Context $context,
        \Solovyov\Vendors\Model\Vendor $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Solovyov_Vendors::vendor_delete');
    }

    /**
     * Delete action
     *
     * @return $this|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccess(__('Vendor deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }

            $this->messageManager->addError(__('Vendor does not exist'));
            return $resultRedirect->setPath('*/*/');
        }
    }
}