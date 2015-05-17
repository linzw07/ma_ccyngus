<?php

/**
 * Products list
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    /**
     * Retrieve loaded category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        $collection = Mage::helper('dailydeals')
            ->filterRunningWithProductCollection(
	            Mage::getResourceModel('catalog/product_collection')
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('visibility', array('neq' => 1))
                ->addAttributeToFilter('deal_status', true));
        return $collection;
    }

    /**
     * Retrieve loaded category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getLoadedProductCollection()
    {
        return $this->_getProductCollection();
    }

    public function getProductsForBar()
    {
        $collection = $this->getLoadedProductCollection();
        $collection->getSelect()
            ->order('rand()');
        $collection->setPage(1, $this->getData('numbers_item'));
        return $collection;
    }


}
