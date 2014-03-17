<?php
/**
 * Handles boolean attribute filtering in layered navigation.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Block_Catalog_Layer_Filter_Boolean extends Bubble_Search_Block_Catalog_Layer_Filter_Attribute
{
    /**
     * Defines specific filter model name.
     *
     * @see Bubble_Search_Model_Catalog_Layer_Filter_Boolean
     */
    public function __construct()
    {
        parent::__construct();
        $this->_filterModelName = 'bubble_search/catalog_layer_filter_boolean';
    }
}
