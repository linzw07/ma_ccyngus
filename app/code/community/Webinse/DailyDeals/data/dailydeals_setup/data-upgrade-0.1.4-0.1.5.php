<?php
/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */

$installer = $this;
$installer->startSetup();


$packageTheme = Mage::getDesign()->getPackageName() . '/' . Mage::getDesign()->getTheme('frontend');
$storeId = Mage::app()->getStore()->getId();
$params = array(
    'numbers_item' => 2,
    'border_size' => 1,
    'border_style' => 'solid',
    'border_color' => '#ffffff',
    'countdown_color' => '#2e8ab8',
    'countdown_width' => 180,
    'countdown_height' => 40,
);
Mage::getModel('widget/widget_instance')->setData(array(
    'type' => 'dailydeals/widget',
    'package_theme' => $packageTheme,
    'title' => 'Daily Deals',
    'store_ids' => $storeId,
    'widget_parameters' => serialize($params),
    'page_groups' => array(array(
        'page_group' => 'all_pages',
        'all_pages' => array(
            'page_id' => null,
            'group' => 'all_pages',
            'layout_handle' => 'default',
            'block' => 'left',
            'for' => 'all',
            'template' => '',
        )
    ))
))
    ->save();
$installer->endSetup();


