<?php
/**
 * Created by PhpStorm.
 * User: denissolovyov
 * Date: 30.05.18
 * Time: 01:31
 */

namespace Solovyov\Vendors\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Solovyov\Vendors\Model\Vendor;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var Vendor
     */
    protected $_vendor;

    /**
     * UpgradeData constructor.
     * @param Vendor $vendor
     */
    public function __construct(Vendor $vendor)
    {
        $this->_vendor = $vendor;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.0.1') < 0) {
            $vendors = [
                ['name' => 'Adidas'],
                ['name' => 'Nike'],
                ['name' => 'Puma'],
                ['name' => 'Reebok'],
                ['name' => 'Armani'],
            ];

            $vendorsIds = [];
            foreach ($vendors as $data) {
                $vendor = $this->_vendor->setData($data)->save();
                $vendorsIds[] = $vendor->getId();
            }
        }

        $setup->endSetup();
    }
}