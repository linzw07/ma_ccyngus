<?php

/**
 * Adminhtml Dels Edit form
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Deals_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _construct()
    {
        parent::_construct();

    }

    /**
     * Prepare student form
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm() {
        $data = Mage::registry('current_product');
        $helper = Mage::helper('dailydeals');
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
        ));


        $fieldset = $form->addFieldset('deals_form', array(
            'legend' => $helper->__('Product Information')
        ));

        if (!is_null($data->getId())) {
            // If edit add id
            $form->addField('entity_id', 'hidden', array(
                    'name' => 'entity_id',
                    'value' => $data->getId())
            );
        }

        $fieldset->addField('name', 'label', array(
            'label' => $helper->__('Product Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name'
        ));

        $fieldset->addField('price', 'label', array(
            'label' => $helper->__('Original Price'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'price',
        ));

        if ($data->getStockItem()->getQty()){
            $data->setNewQty((int)$data->getStockItem()->getQty());
        $fieldset->addField('new_qty', 'label', array(
            'label' => $helper->__('Qty'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'new_qty',
        ));


        }

        $fieldset->addField('deal_price', 'text', array(
            'label' => $helper->__('Deal Price'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'deal_price',
        ));

        $qty = (int)Mage::getModel('catalog/product')->load($data->getId())->getData('stock_item')->getQty();
        if (!$qty) {
            $fieldset->addField('deal_qty', 'text', array(
                'label' => $helper->__('Deal Qty'),
                'class' => $helper->returnProductQtyFieldParams(null, $data->getId()),
                'name' => 'deal_qty',
                'required' => true,
                'note' => $helper->__('Quantity products with special price'),
                'disabled' => true,
            ));
        } else {
            $fieldset->addField('deal_qty', 'text', array(
                'label' => $helper->__('Deal Qty'),
                'class' => $helper->returnProductQtyFieldParams(null, $data->getId()),
                'name' => 'deal_qty',
                'required' => true,
                'note' => $helper->__('Quantity products with special price'),
            ));
        }
        $dateStrFormat = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);

        $fieldset->addField('deal_start_time', 'date', array(
            'name' => 'deal_start_time',
            'label' => $helper->__('Start Time'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'class' => 'validate-date validate-date-range date-range-deal_start_time',
            'required' => true,
            'format' => $dateStrFormat,
            'no_span' => true,
        ));

        $fieldset->addField('deal_end_time', 'date', array(
            'name' => 'deal_end_time',
            'label' => $helper->__('End Time'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'class' => 'validate-date validate-date-range date-range-deal_end_time',
            'required' => true,
            'format' => $dateStrFormat,
            'no_span' => true,
        ));


        $fieldset->addField('deal_status', 'select', array(
            'label' => $helper->__('Status'),
            'name' => 'deal_status',
            'values' => Mage::getModel('dailydeals/System_Config_Source_Enabling')->toArray(),
            'value' => true,
        ));

        $form->setValues($data);

        $form->setUseContainer(true);
        $form->setId('edit_form');
        $this->setForm($form);
    }
}