<?php
/**
 * Query default operator configuration.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Model_System_Config_Source_Query_Operator
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'OR', 'label' => 'OR'),
            array('value' => 'AND', 'label' => 'AND'),
        );
    }
}