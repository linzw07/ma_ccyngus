<?php
/**
 * Adminhtml
 *
 * @category   Webinse
 * @package    Webinse_DailyDeals
 * @author     Webinse Team <info@webinse.com.com>
 */
class Webinse_DailyDeals_Block_Adminhtml_Category_Renderer_ParentCategory extends
    Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $categoryId = $row->getId();
        $collection = Mage::getResourceModel('catalog/category_collection');

        foreach($collection as $value){
            if($value->getId() == $categoryId){
                $parentName = $value->getParentCategory()->getName();

                return $parentName;
            }
        }
    }
}