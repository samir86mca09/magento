<?php
/**
 * Layer filter price rewrite.
 *
 * @category    Bubble
 * @package     Bubble_SearchLayer
 * @version     1.1.0
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_SearchLayer_Model_Catalog_Layer_Filter_Price extends Bubble_Search_Model_Catalog_Layer_Filter_Price
{
    /**
     * @return string
     */
    public function getRequestVar()
    {
        return $this->_helper()->getPriceRequestVar();
    }

    /**
     * @return Bubble_Layer_Helper_Data
     */
    protected function _helper()
    {
        return Mage::helper('bubble_layer');
    }

    /**
     * Retrieves current items data.
     *
     * @return array
     */
    protected function _getItemsData()
    {
        if (Mage::app()->getStore()->getConfig(self::XML_PATH_RANGE_CALCULATION) == self::RANGE_CALCULATION_IMPROVED) {
            return $this->_getCalculatedItemsData();
        } elseif ($this->getInterval() && !$this->_helper()->isPriceSliderEnabled()
            || !$this->_helper()->canShowFilter($this)
        ) {
            return array();
        }

        $data = array();
        $facets = $this->getLayer()->getProductCollection()->getFacetedData($this->_getFilterField());
        if (!empty($facets)) {
            foreach ($facets as $key => $count) {
                if (!$count) {
                    unset($facets[$key]);
                }
            }
            $i = 0;
            foreach ($facets as $key => $count) {
                $i++;
                preg_match('/^\[(\d*) TO (\d*)\]$/', $key, $rangeKey);
                $fromPrice = $rangeKey[1];
                $toPrice = ($i < count($facets)) ? $rangeKey[2] : '';
                $data[] = array(
                    'label' => $this->_renderRangeLabel($fromPrice, $toPrice),
                    'value' => $fromPrice . '-' . $toPrice,
                    'count' => $count
                );
            }
        }

        return $data;
    }
}