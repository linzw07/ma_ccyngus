<?php

/**
 * Renderer deal's sstatus row
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Widget_Grid_Column_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        switch ($row->getDealStatuses()) {
            case 'Disabled':
                return '<div class="disabled_deal">DISABLED</div>';
                break;
            case 'Pending':
                return '<div class="pending">PENDING</div>';
                break;
            case 'Running':
                return '<div class="running">RUNNING</div>';
                break;
            case 'Ended':
                return '<div class="ended">ENDED</div>';
                break;
            case 'Running Automatically':
                return '<div class="automatically">RUNNING AUTOMATICALLY</div>';
                break;
        }
    }

}