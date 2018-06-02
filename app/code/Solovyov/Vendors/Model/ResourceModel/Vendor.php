<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 30.05.18
 * Time: 01:22
 */

namespace Solovyov\Vendors\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('solovyov_vendors', 'entity_id');
    }
}