<?php
/**
 * Display suggestions in catalog search results.
 *
 * @category    Bubble
 * @package     Bubble_Search
 * @version     1.2.1
 * @copyright   Copyright (c) 2014 BubbleCode (http://www.bubbleshop.net)
 */
class Bubble_Search_Block_Catalogsearch_Suggest extends Mage_CatalogSearch_Block_Result
{
    /**
     * @var array Suggestion list.
     */
    protected $_suggestions = null;

    /**
     * Builds search URL for specified text query.
     *
     * @param $q
     * @return string
     */
    public function getQueryUrl($q)
    {
        return $this->getUrl('catalogsearch/result', array('_query' => array('q' => $q)));
    }

    /**
     * Returns one suggestion.
     *
     * @return string
     */
    public function getSuggestion()
    {
        $suggestions = $this->getSuggestions();

        return !empty($suggestions) ? $suggestions[0] : '';
    }

    /**
     * Suggests better queries based on current text query.
     *
     * @return array
     */
    public function getSuggestions()
    {
        if (is_array($this->_suggestions)) {
            return $this->_suggestions;
        }

        $suggestions = array();
        $engine = $this->_getEngine();
        if ($engine instanceof Bubble_Search_Model_Resource_Engine_Abstract) {
            $q = $this->helper('catalogsearch')->getQueryText();
            $suggestions = $engine->suggest($q);
        }

        $this->_suggestions = $suggestions;

        return $this->_suggestions;
    }

    /**
     * Returns search engine object.
     *
     * @return Bubble_Search_Model_Resource_Engine_Abstract
     */
    protected function _getEngine()
    {
        return $this->helper('catalogsearch')->getEngine();
    }
}