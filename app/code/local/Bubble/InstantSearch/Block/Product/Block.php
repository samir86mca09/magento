<?php
/**
 * Product block view (grid and list mode).
 *
 * @category    Bubble
 * @package     Bubble_InstantSearch
 * @version     1.1.0
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_InstantSearch_Block_Product_Block extends Mage_Catalog_Block_Product_Abstract
{
    protected function _loadCache()
    {
        $this->addData(array(
            'cache_lifetime'    => 3600 * 24 * 7,
            'cache_tags'        => array(
                Mage_Core_Block_Abstract::CACHE_GROUP,
                'catalog_product_' . $this->getProduct()->getId(),
            ),
            'cache_key'         => $this->getCacheKey(),
        ));

        return parent::_loadCache();
    }

    public function getCacheKeyInfo()
    {
        $info = parent::getCacheKeyInfo();
        $info[] = Mage::app()->getStore()->getCurrentCurrencyCode();
        $info[] = Mage::getSingleton('customer/session')->getCustomerGroupId();
        $info[] = $this->getProduct()->getId();

        return $info;
    }
}