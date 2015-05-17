<?php
/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
$installer = $this;
$installer->startSetup();
Mage::getModel('dailydeals/statuses')
    ->addData(
        array(
            'code' => 'disabled',
            'title' => 'Disabled',
        ))
    ->save();
$installer->endSetup();