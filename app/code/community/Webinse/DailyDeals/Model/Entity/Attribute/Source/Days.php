<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_Entity_Attribute_Source_Days extends Mage_Eav_Model_Entity_Attribute_Source_Abstract{

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        return array(
            array('value'=>'0', 'label'=>'Sunday'),
            array('value'=>'1', 'label'=>'Monday'),
            array('value'=>'2', 'label'=>'Tuesday'),
            array('value'=>'3', 'label'=>'Wednesday'),
            array('value'=>'4', 'label'=>'Thursday'),
            array('value'=>'5', 'label'=>'Friday'),
            array('value'=>'6', 'label'=>'Saturday'),
        );
    }
}