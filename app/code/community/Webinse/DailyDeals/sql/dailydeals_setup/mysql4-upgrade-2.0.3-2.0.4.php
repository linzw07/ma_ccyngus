<?php
/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
$installer = new Mage_Catalog_Model_Resource_Setup('core_setup');
$installer->startSetup();
$entityTypeId = Mage::getModel('eav/entity')
    ->setType('catalog_category')
    ->getTypeId();

$installer->addAttribute($entityTypeId, 'deal_qty_product_percent', array(
    'type' => 'int',
    'label' => 'Qty Deal Product (depends on availability in stock)',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => "",
    'group' => "General Information"

));
$installer->addAttribute($entityTypeId, 'deal_discount_percent', array(
    'type' => 'int',
    'label' => 'Deal Discount Percent',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => "",
    'group' => "General Information"

));
$attributesCode = array(
    'deal_qty_product_percent',
    'deal_discount_percent',
);

$attributeSetCollection = Mage::getResourceModel('eav/entity_attribute_set_collection')
    ->setEntityTypeFilter(Mage::getModel('catalog/category')->getResource()->getTypeId());

foreach ($attributeSetCollection as $attribute) {
    $name = $attribute->getAttributeSetName();
    $installer->addAttributeGroup($entityTypeId, $name, 'Daily Deals', 100);

    foreach ($attributesCode as $code) {
        $installer->addAttributeToSet($entityTypeId, $name, 'Daily Deals', $code);
    }
}

$installer->endSetup();