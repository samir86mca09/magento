<?php
/**
 * Defines list of available search engines.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Model_Adminhtml_System_Config_Source_Engine
{
    /**
     * Return liste of search engines for config.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $engines = array(
            'catalogsearch/fulltext_engine'  => Mage::helper('adminhtml')->__('MySQL'),
            'bubble_search/engine_elasticsearch' => Mage::helper('adminhtml')->__('Elasticsearch'),
        );

        $options = array();
        foreach ($engines as $k => $v) {
            $options[] = array(
                'value' => $k,
                'label' => $v
            );
        }

        return $options;
    }
}
