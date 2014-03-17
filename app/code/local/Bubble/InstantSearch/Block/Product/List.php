<?php
/**
 * Product list block override.
 *
 * @category    Bubble
 * @package     Bubble_InstantSearch
 * @version     1.1.0
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_InstantSearch_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    protected function _loadCache()
    {
        $this->_beforeToHtml(); // Fix for product collection not being filtered correctly when block is cached
        $this->addData(array(
            'cache_lifetime'    => 3600 * 24 * 7,
            'cache_tags'        => array(Mage_Core_Block_Abstract::CACHE_GROUP, Mage_Catalog_Model_Product::CACHE_TAG),
            'cache_key'         => $this->getCacheKey(),
        ));

        return parent::_loadCache();
    }

    public function getCacheKeyInfo()
    {
        $info = parent::getCacheKeyInfo();
        $info[] = $this->getRequest()->getRequestUri();
        $info[] = $this->getRequest()->getRequestString();
        $info[] = Mage::app()->getStore()->getCurrentCurrencyCode();
        $info[] = Mage::getSingleton('customer/session')->getCustomerGroupId();

        return $info;
    }

    protected function _beforeToHtml()
    {
        parent::_beforeToHtml();
        $this->setTemplate('bubble/instant/product/list.phtml');
    }

    public function getProductHtml(Mage_Catalog_Model_Product $product, $mode)
    {
        return $this->getLayout()
            ->createBlock('bubble_instant/product_block')
            ->setProduct($product)
            ->setTemplate('bubble/instant/product/block/'. $mode .'.phtml')
            ->toHtml();
    }
}
