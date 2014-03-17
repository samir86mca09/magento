<?php
/**
 * Layer filter price block rewrite.
 *
 * @category    Bubble
 * @package     Bubble_SearchLayer
 * @version     1.1.0
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_SearchLayer_Block_Catalog_Layer_Filter_Price
    extends Bubble_Search_Block_Catalog_Layer_Filter_Price
{
    protected $_prices;

    public function getMinMaxPrices()
    {
        if (null === $this->_prices) {
            $collection = $this->getLayer()->getProductCollection();
            $collection->addCategoryFilter($this->getLayer()->getCurrentCategory());
            $this->_prices = Mage::getResourceModel('bubble_layer/catalog_layer_filter_price')
                ->getMinMaxPrices($collection);
        }

        return $this->_prices;
    }

    public function getMin()
    {
        $prices = $this->getMinMaxPrices();

        return $prices[0];
    }

    public function getMax()
    {
        $prices = $this->getMinMaxPrices();

        return $prices[1];
    }

    public function getValues()
    {
        $min = $this->getMin();
        $max = $this->getMax();
        $values = array($min, $max);
        foreach ($this->getLayer()->getState()->getFilters() as $filter) {
            if ($filter->getFilter() instanceof Mage_Catalog_Model_Layer_Filter_Price) {
                if ($filter->getFilter()->getInterval()) {
                    $interval = $filter->getFilter()->getInterval();
                    $values = array(
                        (int) max($min, $interval[0] ? $interval[0] : ''),
                        (int) min($max, $interval[1] ? $interval[1] : $max));
                }
            }
        }

        return $values;
    }

    public function getCurrentCurrency()
    {
        return Mage::app()->getStore()->getCurrentCurrency();
    }

    public function getJsPriceFormat()
    {
        $format = Mage::app()->getLocale()->getJsPriceFormat();
        $format['requiredPrecision'] = 0;

        return $format;
    }

    public function addFacetCondition()
    {
        if (!$this->getRequest()->getParam('price') || Mage::getStoreConfigFlag('bubble_layer/general/enable_price_slider')) {
            $this->_filter->addFacetCondition();
        }

        return $this;
    }
}