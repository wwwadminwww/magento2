<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 30.05.18
 * Time: 01:26
 */

namespace Solovyov\Vendors\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = \Solovyov\Vendors\Model\Vendor::VENDORS_ID;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Solovyov\Vendors\Model\Vendor', 'Solovyov\Vendors\Model\ResourceModel\Vendor');
    }
}