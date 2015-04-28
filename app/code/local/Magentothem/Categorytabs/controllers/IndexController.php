<?php

class Magentothem_Categorytabs_IndexController extends Mage_Core_Controller_Front_Action {

    public function ajaxAction() {
        $cateId = $this->getRequest()->getParam('cateId');
        $typeProduct = $this->getRequest()->getParam('type_product');
        $result = $this->getProductCate($cateId, $typeProduct);
        $this->renderLayout();
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
    }

    function getProductCate($id, $typeProduct = NULL) {
        $storeId = Mage::app()->getStore()->getId();
        $_category = Mage::getModel('catalog/category')->load($id);
        $product = Mage::getModel('catalog/product');
        $json_products = array();
        //load the category's products as a collection
        $_productCollection = $product->getCollection()
                ->addAttributeToSelect('*')
                ->addCategoryFilter($_category);
				Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($_productCollection);
				Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($_productCollection);
        $status = true;
        $_productCollection->setPageSize(100);
        $_productCollection->load();
			$addToCartUrl = "";
            foreach ($_productCollection as $_product) {
                //$_product->getData();
                // var_dump($_product); die;
				 if($_product->isSaleable()) {
					if($_product->getTypeId() =='simple')  {
						$addToCartUrl = Mage::helper('checkout/cart')->getAddUrl($_product) ;
					
						$addToCartButton = '<p><button type="button" title='.$this->__("Add to Cart") .' class="button btn-cart" onclick="'.$addToCartUrl.'"><span><span>'.$this->__('Add to Cart') .'</span></span></button></p>';
					} else {
						$addToCartUrl = $_product->getProductUrl();
						$addToCartButton = '<p><button type="button" title='.$this->__("Add to Cart") .' class="button btn-cart" onclick="'.$addToCartUrl.'"><span><span>'.$this->__('Add to Cart') .'</span></span></button></p>';
					
					}

				} else {
					$addToCartButton = '<p class="availability out-of-stock"><span>'.$this->__("Out of stock").'</span></p>';
				}
				$addToWishlistLink  = Mage::helper('wishlist')->getAddUrl($_product);
				$compareLink  = Mage::helper('catalog/product_compare')->getAddUrl($_product) ;
				$addToWishlist = '<li><a href="'.$addToWishlistLink.'" class="link-wishlist"  title = "'.$this->__('Add to Wishlist') .'" >'.$this->__('Add to Wishlist').'</a></li>';
				$addToCompare = '<li><a href="'.$compareLink.'" class="link-compare"  title = "'.$this->__('Add to Compare') .'" >'.$this->__('Add to Compare').'</a></li>';
				//$product_block = new Mage_Catalog_Block_Product;
			//$product is product object
				//$priceHtml = $product_block->getPriceHtml(Mage::getModel('catalog/product')->load($_product->getId()));
                $json_products[] = array(
                    'name' => $_product->getName(),
                    'url' => '' . $_product->getProductUrl() . '',
                    'description' => '' . nl2br($_product->getShortDescription()) . '',
                    'price' => '' . $_product->getFormatedPrice() . '',
                    'image' => '<img src ="' . (string) Mage::helper('catalog/image')->init($_product, 'small_image')->resize(150) . '">',
					'addToCartUrl' => $addToCartButton,
					'addToWishlistLink' => $addToWishlist,
					'addtoCompare' => $addToCompare
                );
            }
        

        // build an array for conversion

        $data = json_encode($json_products);
        if ($data)
            return $data;
        return NULL;
    }

}