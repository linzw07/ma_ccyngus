<?php

/**
 * Services
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_Services
{
    /**
     * Array for widget options
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'dotted', 'label' => 'dotted'),
            array('value' => 'dashed', 'label' => 'dashed'),
            array('value' => 'solid', 'label' => 'solid'),
            array('value' => 'double', 'label' => 'double'),
            array('value' => 'groove', 'label' => 'groove'),
            array('value' => 'ridge', 'label' => 'ridge'),
            array('value' => 'inset', 'label' => 'inset'),
            array('value' => 'outset', 'label' => 'outset'),
        );
    }
}