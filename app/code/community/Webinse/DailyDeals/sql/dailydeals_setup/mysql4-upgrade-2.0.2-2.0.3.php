<?php
/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
$installer = $this;
$installer->startSetup();
Mage::getModel('dailydeals/statuses')
    ->setData(array(
        'code' => 'automatically',
        'title' => 'Running Automatically',
    ))
    ->save();
$installer->endSetup();