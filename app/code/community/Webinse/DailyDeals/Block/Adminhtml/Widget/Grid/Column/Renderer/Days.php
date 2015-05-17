<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Widget_Grid_Column_Renderer_Days extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        if ($row->getDealUpdateDays()) {
            $days = array(1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday',
                5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday');
            $daysString = $row->getDealUpdateDays();
            $daysArray = explode(',', $daysString);
            $result = array();
            foreach ($daysArray as $dayNumber) {
                $result[] = $days[$dayNumber];
            }
            return implode(',',$result);
        }
    }
}