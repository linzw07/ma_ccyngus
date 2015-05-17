<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
$installer = new Mage_Catalog_Model_Resource_Setup('core_setup');
$installer->startSetup();
$entityTypeId = Mage::getModel('eav/entity')
    ->setType('catalog_product')
    ->getTypeId();
$attributesCode = array(
    'deal_price',
    'deal_start_time',
    'deal_end_time',
    'deal_qty',
    'deal_bought',
    'deal_status',
    'deal_statuses',
    'old_special_price',
    'old_special_date_from',
    'old_special_date_to',
);
foreach ($attributesCode as $attribute){
    $installer->updateAttribute($entityTypeId, $attribute, 'apply_to', 'downloadable,simple,virtual');
}
$installer->endSetup();