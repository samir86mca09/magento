<?php
/**
 * Handles category filtering in layered navigation.
 *
 * @category    Bubble
 * @package     Bubble_SearchLayer
 * @version     1.1.0
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_SearchLayer_Model_Catalog_Layer_Filter_Category extends Bubble_Search_Model_Catalog_Layer_Filter_Category
{
    /**
     * @var array
     */
    protected $_appliedCategoryIds = array();

    /**
     * Apply category filter to layer
     *
     * @param   Zend_Controller_Request_Abstract $request
     * @param   Mage_Core_Block_Abstract $filterBlock
     * @return  Mage_Catalog_Model_Layer_Filter_Category
     */
    public function apply(Zend_Controller_Request_Abstract $request, $filterBlock)
    {
        $category = $this->getCategory();
        if (!Mage::registry('current_category_filter')) {
            Mage::register('current_category_filter', $category);
        }

        $param = $request->getParam($this->getRequestVar());
        if (null === $param || '' === $param) {
            $this->addCategoryFilter($category);

            return $this;
        }

        $categoryIds = explode(Bubble_Layer_Helper_Data::OPTIONS_SEPARATOR, $param);
        if (!empty($categoryIds)) {
            if ($this->_helper()->isSeoEnabled()) {
                $currentCategory = $this->getLayer()->getCurrentCategory();
                // If SEO is enabled, category id has been transformed to category key
                foreach ($categoryIds as &$categoryId) {
                    $categoryId = $this->_helper()->getCategoryId($categoryId, $currentCategory);
                }
                unset($categoryId);
            }

            foreach ($categoryIds as $categoryId) {
                $category = Mage::getModel('catalog/category')
                    ->setStoreId(Mage::app()->getStore()->getId())
                    ->load($categoryId);
                $this->addCategoryFilter($category);
                $this->getLayer()->getState()->addFilter(
                    $this->_createItem($category->getName(), $categoryId)
                );
            }

            $this->_appliedCategoryIds = $categoryIds;
        }

        return $this;
    }

    /**
     * Retrieves current items data.
     *
     * @return array
     */
    protected function _getItemsData()
    {
        $layer = $this->getLayer();
        $key = $layer->getStateKey().'_SUBCATEGORIES';
        $data = $layer->getCacheData($key);

        if ($data === null) {
            $categories = $this->getCategory()->getChildrenCategories();

            /** @var $productCollection Bubble_Search_Model_Resource_Catalog_Product_Collection */
            $productCollection = $layer->getProductCollection();
            $facets = $productCollection->getFacetedData('categories');

            $data = array();
            foreach ($categories as $category) {
                /** @var $category Mage_Catalog_Model_Category */
                $categoryId = $category->getId();
                if (isset($facets[$categoryId])) {
                    $category->setProductCount($facets[$categoryId]);
                } else {
                    $category->setProductCount(0);
                }
                if (in_array($category->getId(), $this->_appliedCategoryIds) ||
                    $category->getIsActive() && $category->getProductCount())
                {
                    $data[] = array(
                        'label' => Mage::helper('core')->escapeHtml($category->getName()),
                        'value' => $categoryId,
                        'count' => $category->getProductCount(),
                    );
                }
            }
            $tags = $layer->getStateTags();
            $layer->getAggregator()->saveCacheData($data, $key, $tags);
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getRequestVar()
    {
        return $this->_helper()->getCategoryRequestVar();
    }

    /**
     * @return Bubble_Layer_Helper_Data
     */
    protected function _helper()
    {
        return Mage::helper('bubble_layer');
    }
}
