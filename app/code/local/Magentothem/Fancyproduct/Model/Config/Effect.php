<?php
class Magentothem_Fancyproduct_Model_Config_Effect
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'swing', 'label'=>Mage::helper('adminhtml')->__('Swing')),
            array('value'=>'easeOutBounce', 'label'=>Mage::helper('adminhtml')->__('EaseOutBounce')),
            array('value'=>'easeInBounce', 'label'=>Mage::helper('adminhtml')->__('EaseInBounce'))
        );
    }

}
