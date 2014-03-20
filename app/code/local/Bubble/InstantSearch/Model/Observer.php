<?php
/**
 * Global module observer.
 *
 * @category    Bubble
 * @package     Bubble_InstantSearch
 * @version     1.1.0
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_InstantSearch_Model_Observer
{
    /**
     * These blocks can be removed for ajax instant search
     *
     * @var array
     */
    protected $_remove = array(
        'head', 'header', 'footer', 'right', 'after_body_start', 'before_body_end', 'core_profiler'
    );

    /**
     * @return string
     */
    protected function _getCacheId()
    {
        $info = array(
            Mage::app()->getStore()->getCode(),
            Mage::app()->getRequest()->getRequestUri(),
            Mage::app()->getStore()->getCurrentCurrencyCode(),
            Mage::getSingleton('customer/session')->getCustomerGroupId(),
        );

        return md5(serialize($info));
    }

    protected function _loadCache($cacheId)
    {
        return Mage::app()->loadCache($cacheId);
    }

    /**
     * @return bool
     */
    public function handleAjaxSearch()
    {
        $request = Mage::app()->getRequest();
        if (!$request->isXmlHttpRequest() || !$request->getHeader('X-Instant-Search')) {
            return false;
        }

        $start = microtime(true);
        $cacheId = $this->_getCacheId();
        if (!$html = $this->_loadCache($cacheId)) {
            $layout = Mage::app()->getLayout();
            foreach ($this->_remove as $block) {
                $layout->removeOutputBlock($block);
            }
            $html = $layout->getOutput();
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $element = $this->getFirstElementByClassName($doc, 'main-container', 'div');
            $html = $element ? $element->ownerDocument->saveXML($element) : '';
            Mage::app()->saveCache($html, $cacheId, array(Mage_Core_Block_Abstract::CACHE_GROUP), 3600);
        }
        $took = microtime(true) - $start;

        $output = array(
            'success'   => true,
            'content'   => $html,
            'took'      => round($took, 4),
        );

        Mage::app()->getResponse()
            ->setHeader('Content-Type', 'application/json')
            ->setBody(Mage::helper('core')->jsonEncode($output))
            ->sendResponse();
        exit;
    }

    /**
     * @param DOMDocument $doc
     * @param $class
     * @param string $tag
     * @return array
     */
    public function getFirstElementByClassName(DOMDocument $doc, $class, $tag = '*')
    {
        $elements = $doc->getElementsByTagName($tag);
        foreach ($elements as $node) {
            /** @var $node DOMNode */
            if (!$node->hasAttributes()) {
                continue;
            }

            $classAttribute = $node->attributes->getNamedItem('class');
            if (!$classAttribute) {
                continue;
            }

            $classes = explode(' ', $classAttribute->nodeValue);
            if (in_array($class, $classes)) {
                return $node;
            }
        }

        return null;
    }
}