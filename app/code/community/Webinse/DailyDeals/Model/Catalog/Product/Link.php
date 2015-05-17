<?php

/**
 * Product link
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Model_Catalog_Product_Link extends Mage_Catalog_Model_Product_Link
{
    const LINK_TYPE_CUSTOM   = 6;
    /**
     * @return Mage_Catalog_Model_Product_Link
     */
    public function useCustomLinks()
    {
        $this->setLinkTypeId(self::LINK_TYPE_CUSTOM);
        return $this;
    }
    /**
     * Save data for product relations
     *
     * @param   Mage_Catalog_Model_Product $product
     * @return  Mage_Catalog_Model_Product_Link
     */
    public function saveProductRelations($product)
    {
        parent::saveProductRelations($product);
        $data = $product->getCustomLinkData();
        if (!is_null($data)) {
            $this->_getResource()->saveProductLinks($product, $data, self::LINK_TYPE_CUSTOM);
        }
    }

}