<?php

/**
 * Widget Block
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Widget
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{


    protected function _toHtml()
    {
        $block = $this->getLayout()->createBlock('dailydeals/product_list', null, $this->getData())->setTemplate('deals/widget/link/widget.phtml');
        return $block->toHtml();
    }


}