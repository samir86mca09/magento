<?php
/**
 * Layer filter attribute rewrite.
 *
 * @category    Bubble
 * @package     Bubble_SearchLayer
 * @version     1.1.0
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_SearchLayer_Model_CatalogSearch_Layer_Filter_Attribute
    extends Bubble_SearchLayer_Model_Catalog_Layer_Filter_Attribute
{
    /**
     * Check whether specified attribute can be used in LN
     *
     * @param Mage_Catalog_Model_Resource_Eav_Attribute  $attribute
     * @return bool
     */
    protected function _getIsFilterableAttribute($attribute)
    {
        return $attribute->getIsFilterableInSearch();
    }
}