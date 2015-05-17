<?php

/**
 * Statuses model
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_Statuses extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('dailydeals/statuses');
    }

    public function getOptionsStatusArray()
    {
        $statuses = array();
        $collection = Mage::getModel('dailydeals/statuses')->getCollection()->getData();
        foreach ($collection as $item) {
            $statuses[$item['code']] = $item['title'];
        }

        return $statuses;

    }

}