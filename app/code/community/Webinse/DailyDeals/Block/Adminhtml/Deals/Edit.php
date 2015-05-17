<?php

/**
 * Adminhtml Edit Deals
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Deals_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected $_blockGroup = 'dailydeals';

    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_deals';
        $this->_updateButton('save', 'label', Mage::helper('dailydeals')->__('Save'));
        $this->_removeButton('delete', 'label', Mage::helper('dailydeals')->__('Delete User'));
        $this->_updateButton('back', 'label', Mage::helper('dailydeals')->__('Back'));
        $this->_updateButton('back', 'onclick', 'setLocation(\'' . $this->getUrl('*/*/new') . '\')');
        $this->_addButton('back_grid', array(
                'label' => Mage::helper('dailydeals')->__('Back to deals'),
                'onclick' => 'setLocation(\'' . $this->getUrl('*/*/list') . '\')')
        );
    }

    public function getHeaderText()
    {
        return Mage::helper('dailydeals')->__('Edit Deal Product');
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-products';
    }

}

