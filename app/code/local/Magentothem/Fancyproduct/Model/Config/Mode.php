<?php
class Magentothem_Fancyproduct_Model_Config_Mode
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'lastest', 'label'=>Mage::helper('adminhtml')->__('Lastest Products')),
            array('value'=>'bestseller', 'label'=>Mage::helper('adminhtml')->__('BestSeller Products')),
            array('value'=>'featured', 'label'=>Mage::helper('adminhtml')->__('Featured Products')),
            array('value'=>'mostviewed', 'label'=>Mage::helper('adminhtml')->__('MostViewed Products')),
            array('value'=>'new', 'label'=>Mage::helper('adminhtml')->__('New Products'))
        );
    }

}
