<?php

namespace Edureka\CustomerAttributes\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Config;

class AddNewAttributes implements DataPatchInterface
{
    private $customerSetupFactory;
    private $eavConfig;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        Config $eavConfig
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create();

        // Add Hobby attribute
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'hobby',
            [
                'type' => 'varchar',
                'label' => 'Hobby',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'system' => false,
                'position' => 100
            ]
        );

        $hobby = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'hobby');
        $hobby->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $hobby->save();

        // Add Anniversary attribute
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'anniversary',
            [
                'type' => 'datetime',
                'label' => 'Anniversary',
                'input' => 'date',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'system' => false,
                'position' => 110
            ]
        );

        $anniversary = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'anniversary');
        $anniversary->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $anniversary->save();
        
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
