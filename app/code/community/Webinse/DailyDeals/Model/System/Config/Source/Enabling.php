<?php

/**
 * Model for enabling and disabling
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_System_Config_Source_Enabling
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => true, 'label' => Mage::helper('adminhtml')->__('Enabled')),
            array('value' => false, 'label' => Mage::helper('adminhtml')->__('Disabled')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            1 => Mage::helper('adminhtml')->__('Enabled'),
            0 => Mage::helper('adminhtml')->__('Disabled'),

        );
    }

}
