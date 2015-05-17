<?php
/**
 * Model with options "You save in"
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_System_Config_Source_SaveInOptions
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'money', 'label' => Mage::helper('adminhtml')->__('Money')),
            array('value' => 'percentage', 'label' => Mage::helper('adminhtml')->__('Percent')),
        );
    }
}