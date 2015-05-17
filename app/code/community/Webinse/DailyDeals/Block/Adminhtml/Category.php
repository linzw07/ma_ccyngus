<?php

/**
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
//        $this->_blockGroup = 'dealsCategoryGrid';
        $this->_blockGroup = 'dailydeals';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = Mage::helper('dailydeals')->__('Deals Category');

        parent::__construct();
        $this->_removeButton('add');
        $this->_addButton('add', array(
            'label'   => 'Add New Category',
            'onclick' => 'setLocation(\'' . $this->getUrl('*/*/newCategory') . '\')',
            'class'   => 'add',
        ));
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-products';
    }
}