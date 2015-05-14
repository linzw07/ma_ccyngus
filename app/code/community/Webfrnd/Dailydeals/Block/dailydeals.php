<?php
 
class Webfrnd_Dailydeals_Block_Dailydeals extends Mage_Catalog_Block_Product_View

{
	

	public function BlockData()
     {
		 $currentCurrencySymbol = Mage::app()->getLocale()->currency(Mage::app()->getStore()->getCurrentCurrencyCode())->getSymbol();
         return $currentCurrencySymbol ;
     }


}

?>