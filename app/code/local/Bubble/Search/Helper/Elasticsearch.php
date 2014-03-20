<?php
/**
 * Elasticsearch helper.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Helper_Elasticsearch extends Bubble_Search_Helper_Data
{
    /**
     * Returns Elasticsearch engine config data.
     *
     * @param string $prefix
     * @param mixed $store
     * @return array
     */
    public function getEngineConfigData($prefix = '', $store = null)
    {
        $config = parent::getEngineConfigData('elasticsearch_', $store);
        $servers = array();
        foreach (explode(',', $config['servers']) as $server) {
            $pieces = explode(':', $server);
            $host = trim($pieces[0]);
            $port = (int) trim($pieces[1]);
            $servers[] = array('host' => $host, 'port' => $port);
        }
        $config['servers'] = $servers;

        return $config;
    }

    /**
     * Escapes specified value.
     *
     * @link http://lucene.apache.org/core/4_7_0/queryparser/index.html
     * @param string $value
     * @return mixed
     */
    public function escape($value)
    {
        $pattern = '/(\+|-|&&|\|\||!|\(|\)|\{|}|\[|]|\^|"|~|\*|\?|:|\\\)/';
        $replace = '\\\$1';

        $value = preg_replace($pattern, $replace, $value);
        $value = str_replace('/', '\\\/', $value);

        return $value;
    }

    /**
     * Escapes specified phrase.
     *
     * @param string $value
     * @return string
     */
    public function escapePhrase($value)
    {
        $pattern = '/("|\\\)/';
        $replace = '\\\$1';

        return preg_replace($pattern, $replace, $value);
    }

    /**
     * Phrases specified value.
     *
     * @param string $value
     * @return string
     */
    public function phrase($value)
    {
        return '"' . $this->escapePhrase($value) . '"';
    }

    /**
     * @param $query
     * @return string
     */
    public function prepareFacetQuery($field, $query)
    {
        return $this->prepareFieldCondition($field, $this->prepareQueryText($query));
    }

    /**
     * @param array $ranges
     * @return array
     */
    public function prepareFacetRanges(array $ranges)
    {
        foreach ($ranges as &$range) {
            if (isset($range['from']) && isset($range['to'])) {
                $from = (isset($range['from']) && strlen(trim($range['from'])))
                    ? $this->prepareQueryText($range['from'])
                    : '';
                $to = (isset($range['to']) && strlen(trim($range['to'])))
                    ? $this->prepareQueryText($range['to'])
                    : '';
                if (!$from) {
                    unset($range['from']);
                } else {
                    $range['from'] = $from;
                }
                if (!$to) {
                    unset($range['to']);
                } else {
                    $range['to'] = $to;
                }
            }
        }

        return $ranges;
    }

    /**
     * Prepares field condition.
     *
     * @param string $field
     * @param string $value
     * @return string
     */
    public function prepareFieldCondition($field, $value)
    {
        if ($field == 'categories') {
            $fieldCondition = "(categories:{$value} OR show_in_categories:{$value})";
        } else {
            $fieldCondition = $field . ':' . $value;
        }

        return $fieldCondition;
    }

    /**
     * Prepares filter query text.
     *
     * @param string $text
     * @return mixed|string
     */
    public function prepareFilterQueryText($text)
    {
        $words = explode(' ', $text);
        if (count($words) > 1) {
            $text = $this->phrase($text);
        } else {
            $text = $this->escape($text);
        }

        return $text;
    }

    /**
     * Prepares filters.
     *
     * @param array $filters
     * @return array
     */
    public function prepareFilters($filters, $asString = true)
    {
        $result = array();
        if (is_array($filters) && !empty($filters)) {
            foreach ($filters as $field => $value) {
                if (is_array($value)) {
                    if ($field == 'price' || isset($value['from']) || isset($value['to'])) {
                        $from = (isset($value['from']))
                            ? $this->prepareFilterQueryText($value['from'])
                            : '';
                        $to = (isset($value['to']))
                            ? $this->prepareFilterQueryText($value['to'])
                            : '';
                        $fieldCondition = "$field:[$from TO $to]";
                    } else {
                        $fieldCondition = array();
                        foreach ($value as $part) {
                            $part = $this->prepareFilterQueryText($part);
                            $fieldCondition[] = $this->prepareFieldCondition($field, $part);
                        }
                        $fieldCondition = '(' . implode(' OR ', $fieldCondition) . ')';
                    }
                } else {
                    $value = $this->prepareFilterQueryText($value);
                    $fieldCondition = $this->prepareFieldCondition($field, $value);
                }
                $result[] = $fieldCondition;
            }
        }

        return $asString ? implode(' AND ', $result) : $result;
    }

    /**
     * Prepares query text.
     *
     * @param $text
     * @return string
     */
    public function prepareQueryText($text)
    {
        $words = explode(' ', $text);
        if (count($words) > 1) {
            foreach ($words as $key => &$val) {
                if (!empty($val)) {
                    $val = $this->escape($val);
                } else {
                    unset($words[$key]);
                }
            }
            $text = '(' . implode(' ', $words) . ')';
        } else {
            $text = $this->escape($text);
        }

        return $text;
    }

    /**
     * Prepares search conditions.
     *
     * @param mixed $query
     * @return string
     */
    public function prepareSearchQuery($query)
    {
        if (!is_array($query)) {
            $searchConditions = $this->prepareQueryText($query);
        } else {
            $searchConditions = array();
            foreach ($query as $field => $value) {
                if (is_array($value)) {
                    if ($field == 'price' || isset($value['from']) || isset($value['to'])) {
                        $from = (isset($value['from']) && strlen(trim($value['from'])))
                            ? $this->prepareQueryText($value['from'])
                            : '';
                        $to = (isset($value['to']) && strlen(trim($value['to'])))
                            ? $this->prepareQueryText($value['to'])
                            : '';
                        $fieldCondition = "$field:[$from TO $to]";
                    } else {
                        $fieldCondition = array();
                        foreach ($value as $part) {
                            $part = $this->prepareFilterQueryText($part);
                            $fieldCondition[] = $field .':'. $part;
                        }
                        $fieldCondition = '('. implode(' OR ', $fieldCondition) .')';
                    }
                } else {
                    if ($value != '*') {
                        $value = $this->prepareQueryText($value);
                    }
                    $fieldCondition = $field .':'. $value;
                }
                $searchConditions[] = $fieldCondition;
            }
            $searchConditions = implode(' AND ', $searchConditions);
        }

        return $searchConditions;
    }

    /**
     * Prepares sort fields.
     *
     * @param array $sortBy
     * @return array
     */
    public function prepareSortFields($sortBy)
    {
        $result = array();
        foreach ($sortBy as $sort) {
            $_sort = each($sort);
            $sortField = $_sort['key'];
            $sortType = $_sort['value'];
            if ($sortField == 'relevance') {
                $sortField = '_score';
            } elseif ($sortField == 'position') {
                $sortField = 'position_category_' . Mage::registry('current_category')->getId();
            } elseif ($sortField == 'price') {
                $websiteId = Mage::app()->getStore()->getWebsiteId();
                $customerGroupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
                $sortField = 'price_'. $customerGroupId .'_'. $websiteId;
            } else {
                $sortField = $this->getSortableAttributeFieldName($sortField);
            }
            $result[] = array($sortField => trim(strtolower($sortType)));
        }

        return $result;
    }
}