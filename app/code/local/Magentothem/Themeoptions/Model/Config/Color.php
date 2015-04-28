<?php
/*------------------------------------------------------------------------
# Websites: http://www.plazathemes.com/
-------------------------------------------------------------------------*/ 
class Magentothem_Themeoptions_Model_Config_Color
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'blue', 'label'=>Mage::helper('adminhtml')->__('blue')),
            array('value'=>'orange', 'label'=>Mage::helper('adminhtml')->__('orange')),
            array('value'=>'green', 'label'=>Mage::helper('adminhtml')->__('green')),
            array('value'=>'pink', 'label'=>Mage::helper('adminhtml')->__('pink')),
            array('value'=>'red', 'label'=>Mage::helper('adminhtml')->__('red')),
            array('value'=>'brown', 'label'=>Mage::helper('adminhtml')->__('brown')),
            array('value'=>'sea_green', 'label'=>Mage::helper('adminhtml')->__('sea_green')),
            array('value'=>'shamrock', 'label'=>Mage::helper('adminhtml')->__('shamrock'))
        );
    }

}
