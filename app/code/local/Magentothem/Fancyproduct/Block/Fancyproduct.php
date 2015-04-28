<?php
class Magentothem_Fancyproduct_Block_Fancyproduct extends Mage_Catalog_Block_Product_Abstract
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getFancyproduct()     
     { 
        if (!$this->hasData('fancyproduct')) {
            $this->setData('fancyproduct', Mage::registry('fancyproduct'));
        }
        return $this->getData('fancyproduct');
    }
	public function getProducts()
	{
		$products = null;
		$mode = $this->getConfig('mode');
		switch( $mode ) {
			case 'lastest':
				$products = $this->getLastestProducts();
				break;
			case 'bestseller':
				$products = $this->getBestSellerProducts();
				break;
			case 'featured':
				$products = $this->getFeaturedProducts();
				break;
			case 'mostviewed':
				$products = $this->getMostViewedProducts();
				break;
			case 'new':
				$products = $this->getNewProducts();
				break;
		}
		return $products;
	}
	public function getLastestProducts($fieldorder = 'updated_at', $order = 'desc')
    {
	$_rootcatID = Mage::app()->getStore()->getRootCategoryId();
    	$storeId    = Mage::app()->getStore()->getId();
		$products = Mage::getResourceModel('catalog/product_collection')
			->joinField('category_id','catalog/category_product','category_id','product_id=entity_id',null,'left')
			->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
			->addMinimalPrice()
			->addUrlRewrite()
			->addTaxPercents()
			->addStoreFilter()
			 ->addAttributeToFilter('category_id', array('in' => $_rootcatID))
			->setOrder ($fieldorder,$order);
		Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products);
    }
	public function getBestSellerProducts()
    {
    	$storeId    = Mage::app()->getStore()->getId();
    	$products = Mage::getResourceModel('reports/product_collection')
    		->addOrderedQty()
            ->addAttributeToSelect('*')
			->addMinimalPrice()
			->addUrlRewrite()
			->addTaxPercents()
            ->addAttributeToSelect(array('name', 'price', 'small_image'))
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder('ordered_qty', 'desc');
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products);
    }
	public function getFeaturedProducts()
    {
    	$storeId    = Mage::app()->getStore()->getId();
		$products = Mage::getResourceModel('catalog/product_collection')
			->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
			->addMinimalPrice()
			->addUrlRewrite()
			->addTaxPercents()			
			->addStoreFilter()
			//->setOrder($this->getConfig('sort'),$this->getConfig('direction'))
			->addAttributeToFilter("featured", 1);		
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products);
    }
	public function getMostViewedProducts()
    {
    	$storeId    = Mage::app()->getStore()->getId();
		$products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
			->addMinimalPrice()
			->addUrlRewrite()
			->addTaxPercents()			
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addViewsCount()
            ;			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);
        $this->setProductCollection($products);
    }
	public function getNewProducts()
    {
	$_rootcatID = Mage::app()->getStore()->getRootCategoryId();
    	$storeId    = Mage::app()->getStore()->getId();
		$products = Mage::getResourceModel('reports/product_collection')
		->joinField('category_id','catalog/category_product','category_id','product_id=entity_id',null,'left')
		->addAttributeToSelect('*')
		->addMinimalPrice()
		->addUrlRewrite()
		->addTaxPercents()			
		->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
		->setStoreId($storeId)
		->addStoreFilter($storeId)
		->addAttributeToFilter('category_id', array('in' => $_rootcatID))
		->addViewsCount();			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->setPageSize($this->getConfig('qty'))->setCurPage(1);
	Mage::log($products->getData(), null, 'p.log');
        $this->setProductCollection($products);
    }
	public function getConfig($att) 
	{
		$config = Mage::getStoreConfig('fancyproduct');
		if (isset($config['fancyproduct_config']) ) {
			$value = $config['fancyproduct_config'][$att];
			return $value;
		} else {
			throw new Exception($att.' value not set');
		}
	}
}