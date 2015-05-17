<?php
/**
 * AddDealsLink Block
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Links extends Mage_Core_Block_Template
{

    public function addDealLink()
    {
        $parentBlock = $this->getParentBlock();
        $text = $this->helper('dailydeals')->getDealsConfig('dailydeals_group/label_deals_link');
        $parentBlock->addLink($text, 'dailydeals/', $text, true, array(), 1, null, 'class="top-link-deals"');

        return $this;
    }
}