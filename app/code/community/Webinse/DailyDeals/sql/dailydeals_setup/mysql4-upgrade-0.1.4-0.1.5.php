<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */


$installer = new Mage_Sales_Model_Resource_Setup('core_setup');
$conn = $installer->getConnection();
$installer->addAttribute('order_item', 'deal_stat', array());
