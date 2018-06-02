<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 30.05.18
 * Time: 01:15
 */

namespace Solovyov\Vendors\Model;

use Magento\Framework\Model\AbstractModel;

class Vendor extends AbstractModel
{
    /**
     *
     */
    const VENDORS_ID = 'entity_id';

    /**
     * @var string
     */
    protected $_eventPrefix = 'vendors';

    /**
     * @var string
     */
    protected $_eventObject = 'vendor';

    /**
     * @var string
     */
    protected $_idFieldName = self::VENDORS_ID;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Solovyov\Vendors\Model\ResourceModel\Vendor');
    }
}