<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 02.06.18
 * Time: 16:28
 */

namespace Solovyov\Vendors\Model\Attribute\Source;


use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Vendor extends AbstractSource
{
    /**
     * @var \Solovyov\Vendors\Model\Vendor
     */
    protected $_model;

    /**
     * Vendor constructor.
     * @param \Solovyov\Vendors\Model\Vendor $model
     */
    public function __construct(\Solovyov\Vendors\Model\Vendor $model)
    {
        $this->_model = $model;
    }

    /**
     * Create options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        $options = [];
        $modelCollection = $this->_model->getCollection()
            ->addFieldToSelect('entity_id')
            ->addFieldToSelect('name');

            foreach ($modelCollection as $item){
                $options[] = [
                    'label' => $item->getName(),
                    'value' => $item->getId(),
                ];
            }

        return $options;
    }
}