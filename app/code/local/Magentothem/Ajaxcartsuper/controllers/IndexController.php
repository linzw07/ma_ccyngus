<?php
require_once "Mage/Catalog/controllers/ProductController.php";
class Magentothem_Ajaxcartsuper_IndexController extends Mage_Catalog_ProductController
{
    public function indexAction()
    {
    	
		$this->loadLayout();     
		$this->renderLayout();
    }
    
        protected function _initProduct()
    {
      $categoryId = Mage::getSingleton('catalog/layer')
               ->getCurrentCategory()
               ->getId();
        $productId  = $this->getRequest()->getParam('id');

        $params = new Varien_Object();
        $params->setCategoryId($categoryId);

        return Mage::helper('catalog/product')->initProduct($productId, $this, $params);
    }
    
    public function productviewAction()
    { 
        if ($product = $this->_initProduct()) {

            if ($this->getRequest()->getParam('options')) {
                $notice = $product->getTypeInstance(true)->getSpecifyOptionMessage();
                Mage::getSingleton('catalog/session')->addNotice($notice);
            }

            Mage::getSingleton('catalog/session')->setLastViewedProductId($product->getId());
            $this->_initProductLayout($product);
            $this->_initLayoutMessages('catalog/session');
            $this->_initLayoutMessages('tag/session');
            $this->_initLayoutMessages('checkout/session');
            $this->renderLayout();
        }
        else {
            if (isset($_GET['store'])  && !$this->getResponse()->isRedirect()) {
                $this->_redirect('');
            } elseif (!$this->getResponse()->isRedirect()) {
                $this->_forward('noRoute');
            }
        }
    }
    
      public function cartdeleteAction() {
        $id = $this->getRequest()->getParam('id');
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                Mage::getSingleton('checkout/cart')->removeItem($id)
                        ->save();
            } catch (Exception $e) {
                Mage::getSingleton('checkout/session')->addError($this->__('Cannot remove item'));
            }
        }
        $this->loadLayout();
        $this->_initLayoutMessages('checkout/session');

        $this->renderLayout();
    }
}