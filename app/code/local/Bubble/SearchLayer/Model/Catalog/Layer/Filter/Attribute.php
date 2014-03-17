<?php
/**
 * Handles attribute filtering in layered navigation.
 *
 * @category    Bubble
 * @package     Bubble_SearchLayer
 * @version     1.1.0
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_SearchLayer_Model_Catalog_Layer_Filter_Attribute extends Bubble_Search_Model_Catalog_Layer_Filter_Attribute
{
    /**
     * @var string
     */
    protected $_optionsSeparator;

    /**
     * @var array
     */
    protected $_appliedOptionIds = array();

    /**
     * Define options separator
     */
    public function __construct()
    {
        parent::__construct();
        $this->_optionsSeparator = Bubble_Layer_Helper_Data::OPTIONS_SEPARATOR;
    }

    /**
     * @param Zend_Controller_Request_Abstract $request
     * @param Varien_Object $filterBlock
     * @return Bubble_Layer_Model_Catalog_Layer_Filter_Attribute
     */
    public function apply(Zend_Controller_Request_Abstract $request, $filterBlock)
    {
        $param = $request->getParam($this->getRequestVar());
        if (null !== $param && '' !== $param) {
            $filter = explode($this->_optionsSeparator, $param);
            $applyOptionIds = array();
            foreach ($filter as $optionId) {
                // Transform keywords to ids
                if ($this->_helper()->isSeoEnabled()) {
                    $attrCode = $this->getAttributeModel()->getAttributeCode();
                    $optionId = $this->_helper()->getOptionId($attrCode, $optionId);
                }
                $text = $this->_getOptionText($optionId);
                if (null !== $optionId && strlen($text)) {
                    $applyOptionIds[] = $optionId;
                    $item = $this->_createItem($text, $optionId);
                    $this->getLayer()->getState()->addFilter($item);
                }
            }

            $this->_appliedOptionIds = $applyOptionIds;

            if (!empty($applyOptionIds)) {
                $this->applyFilterToCollection($this, $applyOptionIds);
            }
        }

        return $this;
    }

    /**
     * @return array|null
     */
    protected function _getItemsData()
    {
        if (!$this->_helper()->canShowFilter($this)) {
            return array();
        }

        /** @var $attribute Mage_Catalog_Model_Resource_Eav_Attribute */
        $attribute = $this->getAttributeModel();
        $this->_requestVar = $attribute->getAttributeCode();

        $layer = $this->getLayer();
        $key = $layer->getStateKey() . '_' . $this->_requestVar;
        $data = $layer->getAggregator()->getCacheData($key);

        if ($data === null) {
            $facets = $this->_getFacets();
            $data = array();
            if (array_sum($facets) > 0) {
                if ($attribute->getFrontendInput() != 'text') {
                    $options = $attribute->getFrontend()->getSelectOptions();
                } else {
                    $options = array();
                    foreach ($facets as $label => $count) {
                        $options[] = array(
                            'label' => $label,
                            'value' => $label,
                            'count' => $count,
                        );
                    }
                }
                foreach ($options as $option) {
                    if (is_array($option['value']) || !Mage::helper('core/string')->strlen($option['value'])) {
                        continue;
                    }
                    $count = 0;
                    $label = $option['label'];
                    if (isset($facets[$option['value']])) {
                        $count = (int) $facets[$option['value']];
                    }
                    if (!$count &&
                        $this->_getIsFilterableAttribute($attribute) == self::OPTIONS_ONLY_WITH_RESULTS &&
                        !in_array($option['value'], $this->_appliedOptionIds)
                    ) {
                        continue;
                    }
                    $data[] = array(
                        'label' => $label,
                        'value' => $option['value'],
                        'count' => (int) $count,
                    );
                }
            }

            $tags = array(
                Mage_Eav_Model_Entity_Attribute::CACHE_TAG . ':' . $attribute->getId()
            );

            $tags = $layer->getStateTags($tags);
            $layer->getAggregator()->saveCacheData($data, $key, $tags);
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getRequestVar()
    {
        return $this->_helper()->getAttributeRequestVar($this->getAttributeCode(), $this->getStoreId());
    }

    /**
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->getAttributeModel()->getAttributeCode();
    }

    /**
     * @return Bubble_Layer_Helper_Data
     */
    protected function _helper()
    {
        return Mage::helper('bubble_layer');
    }
}