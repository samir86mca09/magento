<?php
/**
 * @category    Bubble
 * @package     Bubble_Layer
 * @version     1.3.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Layer_Model_Resource_Catalog_Layer_Filter_Price extends Mage_Catalog_Model_Resource_Layer_Filter_Price
{
    public function getMinMaxPrices($collection)
    {
        $select = clone $collection->getSelect();
        $select->reset(Zend_Db_Select::WHERE);
        $select->reset(Zend_Db_Select::COLUMNS);
        $select->reset(Zend_Db_Select::LIMIT_COUNT);
        $select->reset(Zend_Db_Select::LIMIT_OFFSET);
        $select->columns(
            array(
                'min' => new Zend_Db_Expr('MIN(price_index.min_price)'),
                'max' => new Zend_Db_Expr('MAX(price_index.max_price)'),
            )
        );
        $row = $this->_getReadAdapter()->fetchRow($select);

        return array(floor($row['min']),  round($row['max']));
    }
}