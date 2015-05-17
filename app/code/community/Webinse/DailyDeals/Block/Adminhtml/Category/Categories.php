<?php

/**
 * Adminhtml new deals grid
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Category_Categories extends Mage_Adminhtml_Block_Widget_Grid
{

    /**
     * Set some default on the grid
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('dealsCategoryGrid');
        $this->setDefaultSort('identifier');
        $this->setDefaultDir('ASC');
        $this->setUseAjax(true);
//        $this->setSaveParametersInSession(true);
    }

    /**
     * Set the desired collection on our grid
     * @return Mage_Adminhtml_Block_Widget_Grid
     */

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('catalog/category_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('name', array("nin" => array('Root Catalog', 'Default Category')))
            ->addAttributeToFilter('children_count','0')
            ->addAttributeToFilter('page_layout','three_columns');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function getStore() {
        $storeId = (int)$this->getRequest()->getParam('store', 0);
        return Mage::app()->getStore($storeId);
    }

//$this->getCollection()->getSize()
    /**
     *  Set columns on our grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $store = $this->getStore();
        $helper = Mage::helper('dailydeals');

        $this->addColumn('parent_category_name', array(
            'header' => $helper->__('Parent Category Name'),
            'width'=>'60px',
            'index' => 'parent_category_name',
            'filter'  => false,
            'renderer'  => 'Webinse_DailyDeals_Block_Adminhtml_Category_Renderer_ParentCategory',
        ));

        $this->addColumn('category_name', array(
            'header' => $helper->__('Category Name'),
            'index' => 'name',
        ));

        $this->addColumn(count('qty_category_product'), array(
            'align' => 'center',
            'width'=>'50px',
            'header' => $helper->__('Qty Products'),
            'index' => 'qty_category_product',
            'renderer' => 'Webinse_DailyDeals_Block_Adminhtml_Category_Renderer_QtyProduct',
        ));

        $this->addColumn('is_active', array(
            'width'=>'50px',
            'align' => 'center',
            'header' => $helper->__('Is Active'),
            'index' => 'is_active',
            'type' => 'options',
            'options'   => array(
                '1' => Mage::helper('catalog')->__('Active'),
                '0' => Mage::helper('catalog')->__('Disabled')),

        ));

        $this->addColumn('include_in_menu', array(
            'width'=>'50px',
            'align' => 'center',
            'header' => $helper->__('Include in Navigation Menu'),
            'index' => 'include_in_menu',
            'type' => 'options',
             'options'   => array(
                 '1' => Mage::helper('catalog')->__('Yes'),
                 '0' => Mage::helper('catalog')->__('No')),

        ));

        $this->addColumn('view_deal_category', array(
            'width'=>'50px',
            'header' => $helper->__('Add Category to Deal'),
            'type' => 'action',
            'getter' => 'getId',
            'filter' => false,
            'is_system' => true,
            'actions' => array(
                array(
                    'caption' => $helper->__('Add Deal'),
                    'url' => array('base' => '*/*/editcategory/'),
                    'field' => 'entity_id')),
            'sortable' => false,
//            'index' => 'stores',
        ));

        return parent::_prepareColumns();
    }

    /**
     * Get url for row
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/editcategory', array('entity_id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/categories', array('_current' => true));
    }

}