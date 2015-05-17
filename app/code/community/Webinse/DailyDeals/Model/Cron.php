<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_Cron
{

    public function updateDealCategory()
    {
        $dealCategoryModel = Mage::getModel('dailydeals/dealCategory');
        //array With Categories of deal status set in $this->_dealCategoryAtt
        $allDealCategory = $dealCategoryModel->getAllDealCategory();
        if ($allDealCategory) {
            //array with category to update today
            $toDayUpdateCategory = $dealCategoryModel->getArrayUpdateCategory();
            if (!empty($toDayUpdateCategory)) {
                //update deal status on products
                $dealCategoryModel->updateCategoryDealStatusInProduct($toDayUpdateCategory);
            }
        }
    }
}