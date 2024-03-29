<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

/**
 * @method Ess_M2ePro_Model_Listing_Product_Variation_Option getParentObject()
 */
class Ess_M2ePro_Model_Play_Listing_Product_Variation_Option extends Ess_M2ePro_Model_Component_Child_Play_Abstract
{
    // ########################################

    public function _construct()
    {
        parent::_construct();
        $this->_init('M2ePro/Play_Listing_Product_Variation_Option');
    }

    // ########################################

    /**
     * @return Ess_M2ePro_Model_Magento_Product
     */
    public function getMagentoProduct()
    {
        return $this->getParentObject()->getMagentoProduct();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Listing
     */
    public function getListing()
    {
        return $this->getParentObject()->getListing();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Listing
     */
    public function getPlayListing()
    {
        return $this->getListing()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Listing_Product
     */
    public function getListingProduct()
    {
        return $this->getParentObject()->getListingProduct();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Listing_Product
     */
    public function getPlayListingProduct()
    {
        return $this->getListingProduct()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Listing_Product_Variation
     */
    public function getListingProductVariation()
    {
        return $this->getParentObject()->getListingProductVariation();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Listing_Product_Variation
     */
    public function getPlayListingProductVariation()
    {
        return $this->getListingProductVariation()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Account
     */
    public function getAccount()
    {
        return $this->getParentObject()->getAccount();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Account
     */
    public function getPlayAccount()
    {
        return $this->getAccount()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Marketplace
     */
    public function getMarketplace()
    {
        return $this->getParentObject()->getMarketplace();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Marketplace
     */
    public function getPlayMarketplace()
    {
        return $this->getMarketplace()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Template_SellingFormat
     */
    public function getSellingFormatTemplate()
    {
        return $this->getPlayListingProductVariation()->getSellingFormatTemplate();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Template_SellingFormat
     */
    public function getPlaySellingFormatTemplate()
    {
        return $this->getSellingFormatTemplate()->getChildObject();
    }

    //-----------------------------------------

    /**
     * @return Ess_M2ePro_Model_Template_Synchronization
     */
    public function getSynchronizationTemplate()
    {
        return $this->getPlayListingProductVariation()->getSynchronizationTemplate();
    }

    /**
     * @return Ess_M2ePro_Model_Play_Template_Synchronization
     */
    public function getPlaySynchronizationTemplate()
    {
        return $this->getSynchronizationTemplate()->getChildObject();
    }

    // ########################################

    public function getSku()
    {
        $src = $this->getPlayListing()->getSkuSource();

        if ($src['mode'] == Ess_M2ePro_Model_Play_Listing::SKU_MODE_PRODUCT_ID) {
            return (string)$this->getParentObject()->getProductId();
        }

        if ($src['mode'] == Ess_M2ePro_Model_Play_Listing::SKU_MODE_CUSTOM_ATTRIBUTE) {
            return $this->getMagentoProduct()->getAttributeValue($src['attribute']);
        }

        if (!$this->getListingProduct()->getMagentoProduct()->isSimpleTypeWithCustomOptions()) {
            return $this->getMagentoProduct()->getSku();
        }

        $tempSku = '';

        $mainProduct = $this->getListingProduct()->getMagentoProduct()->getProduct();
        $simpleAttributes = $mainProduct->getOptions();

        foreach ($simpleAttributes as $tempAttribute) {

            if (!(bool)(int)$tempAttribute->getData('is_require')) {
                continue;
            }

            if (!in_array($tempAttribute->getType(), array('drop_down', 'radio', 'multiple', 'checkbox'))) {
                continue;
            }

            $attribute = strtolower($this->getParentObject()->getAttribute());

            if (strtolower($tempAttribute->getData('default_title')) != $attribute &&
                strtolower($tempAttribute->getData('store_title')) != $attribute &&
                strtolower($tempAttribute->getData('title')) != $attribute) {
                continue;
            }

            foreach ($tempAttribute->getValues() as $tempOption) {

                $option = strtolower($this->getParentObject()->getOption());

                if (strtolower($tempOption->getData('default_title')) != $option &&
                    strtolower($tempOption->getData('store_title')) != $option &&
                    strtolower($tempOption->getData('title')) != $option) {
                    continue;
                }

                if (!is_null($tempOption->getData('sku')) &&
                    $tempOption->getData('sku') !== false) {
                    $tempSku = $tempOption->getData('sku');
                }

                break 2;
            }
        }

        return trim($tempSku);
    }

    public function getQty()
    {
        $qty = 0;

        $src = $this->getPlaySellingFormatTemplate()->getQtySource();

        switch ($src['mode']) {
            case Ess_M2ePro_Model_Play_Template_SellingFormat::QTY_MODE_SINGLE:
                $qty = 1;
                break;

            case Ess_M2ePro_Model_Play_Template_SellingFormat::QTY_MODE_NUMBER:
                $qty = (int)$src['value'];
                break;

            case Ess_M2ePro_Model_Play_Template_SellingFormat::QTY_MODE_ATTRIBUTE:
                $qty = (int)$this->getMagentoProduct()->getAttributeValue($src['attribute']);
                break;

            default:
            case Ess_M2ePro_Model_Play_Template_SellingFormat::QTY_MODE_PRODUCT:
                $qty = (int)$this->getMagentoProduct()->getQty();
                break;
        }

//        if (!$this->getListingProduct()->getMagentoProduct()->isSimpleTypeWithCustomOptions()) {
//            if (!$this->getMagentoProduct()->getStockAvailability() ||
//                $this->getMagentoProduct()->getStatus() == Mage_Catalog_Model_Product_Status::STATUS_DISABLED)  {
//                // Out of stock or disabled Item? Set QTY = 0
//                $qty = 0;
//            }
//        }

        $qty < 0 && $qty = 0;

        return (int)floor($qty);
    }

    // ########################################

    public function getPrice($src, $currency)
    {
        $price = 0;

        // Configurable product
        if ($this->getListingProduct()->getMagentoProduct()->isConfigurableType()) {

            if ($this->getPlaySellingFormatTemplate()->isPriceVariationModeParent()) {
                $price = $this->getConfigurablePriceParent($src, $currency);
            } else {
                $price = $this->getBaseProductPrice($src, $currency);
            }

        // Bundle product
        } else if ($this->getListingProduct()->getMagentoProduct()->isBundleType()) {

            if ($this->getPlaySellingFormatTemplate()->isPriceVariationModeParent()) {
                $price = $this->getBundlePriceParent($src, $currency);
            } else {
                $price = $this->getBaseProductPrice($src, $currency);
            }

        // Simple with custom options
        } else if ($this->getListingProduct()->getMagentoProduct()->isSimpleTypeWithCustomOptions()) {
            $price = $this->getSimpleWithCustomOptionsPrice($src, $currency);
        // Grouped product
        } else if ($this->getListingProduct()->getMagentoProduct()->isGroupedType()) {
            $price = $this->getBaseProductPrice($src, $currency);
        }

        return $price;
    }

    // ########################################

    protected function getConfigurablePriceParent($src, $currency)
    {
        $price = 0;

        $mainProduct = $this->getListingProduct()->getMagentoProduct()->getProduct();
        $mainProductInstance = $mainProduct->getTypeInstance()->setStoreFilter($this->getListing()->getStoreId());

        $productAttributes = $mainProductInstance->getUsedProductAttributes();
        $configurableAttributes = $mainProductInstance->getConfigurableAttributesAsArray();

        $attribute = strtolower($this->getParentObject()->getAttribute());
        $option = strtolower($this->getParentObject()->getOption());

        foreach ($configurableAttributes as $configurableAttribute) {

            $label = isset($configurableAttribute['label']) ? strtolower($configurableAttribute['label']) : '';
            $frontLabel = isset($configurableAttribute['frontend_label']) ?
                                strtolower($configurableAttribute['frontend_label']) : '';
            $storeLabel = isset($configurableAttribute['store_label']) ?
                                strtolower($configurableAttribute['store_label']) : '';

            if ($label != $attribute && $frontLabel != $attribute && $storeLabel != $attribute) {
                continue;
            }

            if (!isset($productAttributes[(int)$configurableAttribute['attribute_id']])) {
                continue;
            }

            $productAttribute = $productAttributes[(int)$configurableAttribute['attribute_id']];
            $productAttribute->setStoreId($this->getListing()->getStoreId());

            $productAttributesOptions = $productAttribute->getSource()->getAllOptions(false);

            foreach ($configurableAttribute['values'] as $configurableOption) {

                $label = isset($configurableOption['label']) ? strtolower($configurableOption['label']) : '';
                $defaultLabel = isset($configurableOption['default_label']) ?
                                    strtolower($configurableOption['default_label']) : '';
                $storeLabel = isset($configurableOption['store_label']) ?
                                    strtolower($configurableOption['store_label']) : '';

                foreach ($productAttributesOptions as $productAttributesOption) {
                    if ((int)$productAttributesOption['value'] == (int)$configurableOption['value_index']) {
                        $storeLabel = strtolower($productAttributesOption['label']);
                        break;
                    }
                }

                if ($label != $option && $defaultLabel != $option && $storeLabel != $option) {
                    continue;
                }

                if ((bool)(int)$configurableOption['is_percent']) {
                    // Base Price of Main product.

                    $basePrice = $this->getPlayListingProduct()->getBaseProductPrice($src['mode'],
                                                                                     $src['attribute'],
                                                                                     $currency);

                    $price = ($basePrice * (float)$configurableOption['pricing_value']) / 100;
                } else {
                    $price = (float)$configurableOption['pricing_value'];
                    $price = $this->getPlayListing()->convertPriceFromStoreToMarketplace($price,$currency);
                }

                break 2;
            }
        }

        return $price;
    }

    protected function getBundlePriceParent($src, $currency)
    {
        $price = 0;

        $mainProduct = $this->getListingProduct()->getMagentoProduct()->getProduct();
        $mainProductInstance = $mainProduct->getTypeInstance()->setStoreFilter($this->getListing()->getStoreId());
        $bundleAttributes = $mainProductInstance->getOptionsCollection($mainProduct);

        $attribute = strtolower($this->getParentObject()->getAttribute());

        foreach ($bundleAttributes as $tempAttribute) {

            if (!(bool)(int)$tempAttribute->getData('required')) {
                continue;
            }

            if ((is_null($tempAttribute->getData('title')) ||
                 strtolower($tempAttribute->getData('title')) != $attribute) &&
                (is_null($tempAttribute->getData('default_title')) ||
                 strtolower($tempAttribute->getData('default_title')) != $attribute)) {
                continue;
            }

            $tempOptions = $mainProductInstance
                ->getSelectionsCollection(array(0 => $tempAttribute->getId()), $mainProduct)
                ->getItems();

            foreach ($tempOptions as $tempOption) {

                if ((int)$tempOption->getId() != $this->getParentObject()->getProductId()) {
                    continue;
                }

                if ((bool)(int)$tempOption->getData('selection_price_type')) {
                    // Base Price of Main product.

                    $basePrice = $this->getPlayListingProduct()->getBaseProductPrice($src['mode'],
                                                                                     $src['attribute'],
                                                                                     $currency);

                    $price = ($basePrice * (float)$tempOption->getData('selection_price_value')) / 100;
                } else {
                    $price = (float)$tempOption->getData('selection_price_value');
                    $price = $this->getPlayListing()->convertPriceFromStoreToMarketplace($price,$currency);
                }

                break 2;
            }
        }

        return $price;
    }

    protected function getSimpleWithCustomOptionsPrice($src, $currency)
    {
        $price = 0;

        $mainProduct = $this->getListingProduct()->getMagentoProduct()->getProduct();
        $simpleAttributes = $mainProduct->getOptions();

        $attribute = strtolower($this->getParentObject()->getAttribute());
        $option = strtolower($this->getParentObject()->getOption());

        foreach ($simpleAttributes as $tempAttribute) {

            if (!(bool)(int)$tempAttribute->getData('is_require')) {
                continue;
            }

            if (!in_array($tempAttribute->getType(), array('drop_down', 'radio', 'multiple', 'checkbox'))) {
                continue;
            }

            $defaultTitle = $tempAttribute->getData('default_title');
            $storeTitle = $tempAttribute->getData('store_title');
            $title = $tempAttribute->getData('title');

            if ((is_null($defaultTitle) || strtolower($defaultTitle) != $attribute) &&
                (is_null($storeTitle) || strtolower($storeTitle) != $attribute) &&
                (is_null($title) || strtolower($title) != $attribute)) {
                continue;
            }

            foreach ($tempAttribute->getValues() as $tempOption) {

                $defaultTitle = $tempOption->getData('default_title');
                $storeTitle = $tempOption->getData('store_title');
                $title = $tempOption->getData('title');

                if ((is_null($defaultTitle) || strtolower($defaultTitle) != $option) &&
                    (is_null($storeTitle) || strtolower($storeTitle) != $option) &&
                    (is_null($title) || strtolower($title) != $option)) {
                    continue;
                }

                if (!is_null($tempOption->getData('price_type')) &&
                    $tempOption->getData('price_type') !== false) {

                    switch ($tempOption->getData('price_type')) {
                        case 'percent':
                            $basePrice = $this->getPlayListingProduct()->getBaseProductPrice($src['mode'],
                                                                                             $src['attribute'],
                                                                                             $currency);
                            $price = ($basePrice * (float)$tempOption->getData('price')) / 100;
                            break;
                        case 'fixed':
                            $price = (float)$tempOption->getData('price');
                            $price = $this->getPlayListing()->convertPriceFromStoreToMarketplace($price,$currency);
                            break;
                    }
                }

                break 2;
            }
        }

        return $price;
    }

    //-----------------------------------------

    protected function getBaseProductPrice($src, $currency)
    {
        $price = 0;

        switch ($src['mode']) {

            case Ess_M2ePro_Model_Play_Template_SellingFormat::PRICE_NONE:
                $price = 0;
                break;

            case Ess_M2ePro_Model_Play_Template_SellingFormat::PRICE_SPECIAL:
                $price = $this->getMagentoProduct()->getSpecialPrice();
                $price <= 0 && $price = $this->getMagentoProduct()->getPrice();
                $price = $this->getPlayListing()->convertPriceFromStoreToMarketplace($price,$currency);
                break;

            case Ess_M2ePro_Model_Play_Template_SellingFormat::PRICE_ATTRIBUTE:
                $price = $this->getMagentoProduct()->getAttributeValue($src['attribute']);
                break;

            default:
            case Ess_M2ePro_Model_Play_Template_SellingFormat::PRICE_PRODUCT:
                $price = $this->getMagentoProduct()->getPrice();
                $price = $this->getPlayListing()->convertPriceFromStoreToMarketplace($price,$currency);
                break;
        }

        $price < 0 && $price = 0;

        return $price;
    }

    // ########################################
}