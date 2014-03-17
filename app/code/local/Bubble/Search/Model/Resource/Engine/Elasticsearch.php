<?php
/**
 * Elasticsearch engine.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Model_Resource_Engine_Elasticsearch extends Bubble_Search_Model_Resource_Engine_Abstract
{
    const CACHE_INDEX_PROPERTIES_ID = 'elasticsearch_index_properties';

    /**
     * Initializes search engine.
     *
     * @see Bubble_Search_Model_Resource_Engine_Elasticsearch_Client
     */
    public function __construct()
    {
        $this->_client = Mage::getResourceSingleton('bubble_search/engine_elasticsearch_client');
    }

    /**
     * Cleans caches.
     *
     * @return Bubble_Search_Model_Resource_Engine_Elasticsearch
     */
    public function cleanCache()
    {
        Mage::app()->removeCache(self::CACHE_INDEX_PROPERTIES_ID);

        return $this;
    }

    /**
     * Cleans index.
     *
     * @param int $storeId
     * @param int $id
     * @param string $type
     * @return Bubble_Search_Model_Resource_Engine_Elasticsearch
     */
    public function cleanIndex($storeId = null, $id = null, $type = 'product')
    {
        $this->_client->cleanIndex($storeId, $id, $type);

        return $this;
    }

    /**
     * Deletes index.
     *
     * @return mixed
     */
    public function deleteIndex()
    {
        return $this->_client->deleteIndex();
    }

    /**
     * @return array
     */
    public function getGlobalFilters($query = null)
    {
        $filters = array();

        if (!Mage::helper('cataloginventory')->isShowOutOfStock()) {
            $filters['in_stock'] = '1';
        }

        if (!empty($query)) {
            $visibility = Mage::getSingleton('catalog/product_visibility')->getVisibleInSearchIds();
        } else {
            $visibility = Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds();
        }
        $filters['visibility'] = $visibility;

        return $filters;
    }

    /**
     * Retrieves stats for specified query.
     *
     * @param string $query
     * @param array $params
     * @param string $type
     * @return array
     */
    public function getStats($query, $params = array(), $type = 'product')
    {
        $stats = $this->_search($query, $params, $type);

        return isset($stats['facets']['stats']) ? $stats['facets']['stats'] : array();
    }

    /**
     * Saves products data in index.
     *
     * @param int $storeId
     * @param array $indexes
     * @param string $type
     * @return Bubble_Search_Model_Resource_Engine_Elasticsearch
     */
    public function saveEntityIndexes($storeId, $indexes, $type = 'product')
    {
        $indexes = $this->addAdvancedIndex($indexes, $storeId, array_keys($indexes));

        $helper = $this->_getHelper();
        $store = Mage::app()->getStore($storeId);
        $localeCode = $helper->getLocaleCode($store);
        $languageCode = $helper->getLanguageCodeByStore($store);
        $searchables = $helper->getSearchableAttributes();
        $sortables = $helper->getSortableAttributes();

        foreach ($indexes as &$data) {
            foreach ($data as $key => &$value) {
                if (is_array($value)) {
                    $value = array_values(array_filter(array_unique($value)));
                }
                if (array_key_exists($key, $searchables)) {
                    /** @var $attribute Mage_Catalog_Model_Resource_Eav_Attribute */
                    $attribute = $searchables[$key];
                    if ($attribute->getBackendType() == 'datetime') {
                        foreach ($value as &$date) {
                            $date = $this->_getDate($store->getId(), $date);
                        }
                        unset($date);
                    } elseif ($attribute->usesSource() && !empty($value)) {
                        $val = is_array($value) ? $value[0] : $value;
                        if ($attribute->getFrontendInput() == 'multiselect') {
                            $val = explode(',', $val);
                        }
                        if ($helper->isAttributeUsingOptions($attribute)) {
                            $value = (array) $val;
                            $data[$key . '_' . $languageCode] = $value;
                            foreach ($data[$key . '_' . $languageCode] as &$val) {
                                $val = $attribute->setStoreId($store->getId())
                                    ->getFrontend()
                                    ->getOption($val);
                            }
                            unset($val);
                        }
                    }
                }
                if (array_key_exists($key, $sortables)) {
                    $val = is_array($value) ? $value[0] : $value;
                    /** @var $attribute Mage_Catalog_Model_Resource_Eav_Attribute */
                    $attribute = $sortables[$key];
                    $attribute->setStoreId($store->getId());
                    $key = $helper->getSortableAttributeFieldName($sortables[$key], $localeCode);
                    if ($attribute->usesSource()) {
                        $val = $attribute->getFrontend()->getOption($val);
                    } elseif ($attribute->getBackendType() == 'decimal') {
                        $val = (double) $val;
                    }
                    $data[$key] = $val;
                }
            }
            unset($value);
            $data['store_id'] = $store->getId();
        }
        unset($data);

        $docs = $this->_prepareDocs($indexes, $type, $localeCode);
        $this->_addDocs($docs);

        return $this;
    }

    /**
     * Checks Elasticsearch availability.
     *
     * @return bool
     */
    public function test()
    {
        if (null !== $this->_test) {
            return $this->_test;
        }

        try {
            $this->_client->getStatus();
            $this->_test = true;
        } catch (Exception $e) {
            if ($this->_getHelper()->isDebugEnabled()) {
                $this->_getHelper()->showError('Elasticsearch engine is not available');
            }
            $this->_test = false;
        }

        return $this->_test;
    }

    /**
     * Adds documents to index.
     *
     * @param array $docs
     * @return Bubble_Search_Model_Resource_Engine_Elasticsearch
     */
    protected function _addDocs($docs)
    {
        if (!empty($docs)) {
            $this->_client->addDocuments($docs);
        }
        $this->_client->refreshIndex();

        return $this;
    }

    /**
     * Creates and prepares document for indexation.
     *
     * @param int $entityId
     * @param array $index
     * @param string $type
     * @return mixed
     */
    protected function _createDoc($entityId, $index, $type = 'product')
    {
        return $this->_client->createDoc($index[self::UNIQUE_KEY], $index, $type);
    }

    /**
     * Returns search helper.
     *
     * @return Bubble_Search_Helper_Elasticsearch
     */
    protected function _getHelper()
    {
        return Mage::helper('bubble_search/elasticsearch');
    }

    /**
     * Prepares facets query response.
     *
     * @param mixed $response
     * @return array
     */
    protected function _prepareFacetsQueryResponse($response)
    {
        $result = array();
        foreach ($response as $attr => $data) {
            if (isset($data['terms'])) {
                foreach ($data['terms'] as $value) {
                    $result[$attr][$value['term']] = $value['count'];
                }
            } elseif (isset($data['_type']) && $data['_type'] == 'statistical') {
                $result['stats'][$attr] = $data;
            } elseif (isset($data['ranges'])) {
                foreach ($data['ranges'] as $range) {
                    $from = isset($range['from_str']) ? $range['from_str'] : '';
                    $to = isset($range['to_str']) ? $range['to_str'] : '';
                    $result[$attr]["[$from TO $to]"] = $range['total_count'];
                }
            } elseif (preg_match('/\(categories:(\d+) OR show_in_categories\:\d+\)/', $attr, $matches)) {
                $result['categories'][$matches[1]] = $data['count'];
            }
        }

        return $result;
    }

    /**
     * Prepares query response.
     *
     * @param \Elastica\ResultSet $response
     * @return array
     */
    protected function _prepareQueryResponse($response)
    {
        /* @var $response \Elastica\ResultSet */
        if (!$response instanceof \Elastica\ResultSet || $response->getResponse()->hasError() || !$response->count()) {
            return array();
        }
        $this->_lastNumFound = (int) $response->getTotalHits();
        $result = array();
        foreach ($response->getResults() as $doc) {
            $result[] = $this->_objectToArray($doc->getSource());
        }

        return $result;
    }

    /**
     * Performs search and facetting.
     *
     * @param string $query
     * @param array $params
     * @param string $type
     * @return array
     */
    protected function _search($query, $params = array(), $type = 'product')
    {
        $_params = $this->_defaultQueryParams;
        if (is_array($params) && !empty($params)) {
            $_params = array_intersect_key($params, $_params) + array_diff_key($_params, $params);
        }

        $searchParams = array();
        $searchParams['offset'] = isset($_params['offset']) ? (int) $_params['offset'] : 0;
        $searchParams['limit'] = isset($_params['limit']) ? (int) $_params['limit'] : self::DEFAULT_ROWS_LIMIT;

        if (!is_array($_params['params'])) {
            $_params['params'] = array($_params['params']);
        }

        $searchParams['sort'] = $this->_getHelper()->prepareSortFields($_params['sort_by']);

        $useFacetSearch = (isset($params['facets']) && !empty($params['facets']));
        if ($useFacetSearch) {
            $searchParams['facets'] = $params['facets'];
        }

        if (!empty($_params['params'])) {
            foreach ($_params['params'] as $name => $value) {
                $searchParams[$name] = $value;
            }
        }

        $_params['filters'] = array_merge($_params['filters'], $this->getGlobalFilters($query));

        if ($_params['store_id'] > 0) {
            $_params['filters']['store_id'] = $_params['store_id'];
        }

        $searchParams['filters'] = $_params['filters'];

        if (!empty($params['range_filters'])) {
            $searchParams['range_filters'] = $params['range_filters'];
        }

        if (!empty($params['stats'])) {
            $searchParams['stats'] = $params['stats'];
            $useFacetSearch = true;
        }

        $data = $this->_client->search($query, $searchParams, $type);

        if (!$data instanceof \Elastica\ResultSet) {
            return array();
        }

        $result = array();
        /* @var $data \Elastica\ResultSet */
        if (!isset($params['params']['stats']) || $params['params']['stats'] != 'true') {
            $result = array(
                'ids' => $this->_prepareQueryResponse($data),
                'total_count' => $data->getTotalHits()
            );
            if ($useFacetSearch) {
                $result['facets'] = $this->_prepareFacetsQueryResponse($data->getFacets());
            }
        }

        return $result;
    }

    /**
     * Returns suggestions based on specfied query.
     *
     * @param string $query
     * @return array
     */
    protected function _suggest($query)
    {
        /* @var $result \Elastica\Response */
        $result = $this->_client->suggest($query);
        $data = $result->getData();
        $suggestions = array();
        if (isset($data['simple_phrase']) && isset($data['simple_phrase'][0]['options'])) {
            foreach ($data['simple_phrase'][0]['options'] as $suggest) {
                $suggestions[] = $suggest['text'];
            }
        }

        return $suggestions;
    }
}
