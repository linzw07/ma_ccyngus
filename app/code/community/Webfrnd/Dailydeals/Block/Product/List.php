<?php

/**
 * Products list
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webfrnd_DailyDeals_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    /**
     * Retrieve loaded category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        return;
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
        $collection->getSelect()->order('rand()');
        $collection->setPage(1, $this->getData('numbers_item'));
        return $collection;
    }


}
