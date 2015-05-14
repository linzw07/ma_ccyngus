<?php
 
class Webfrnd_Dailydeals_IndexController extends Mage_Core_Controller_Front_Action
{
	private $module_enable;
	
    public function indexAction()
    {
 		 $this->loadLayout();
         $this->renderLayout();
		//$this->module_enable = Mage::getStoreConfig('webfrnd_dailydeal_options/general/module_enable',Mage::app()->getStore());
		//if($this->module_enable)
	        //echo 'Hello developer...';
			
    }
 
    public function sayHelloAction()
    {
        echo 'Hello one more time...';
    }
}
?>