<?php

/*
 * @copyright  Copyright (c) 2012 by  ESS-UA.
 */

class Ess_M2ePro_Model_Connector_Play_Product_List_Multiple
    extends Ess_M2ePro_Model_Connector_Play_Product_Requester
{
    // ########################################

    private $skusToCheck = array();

    // ########################################

    public function getCommand()
    {
        return array('product','update','entities');
    }

    // ########################################

    protected function getActionIdentifier()
    {
        return 'list';
    }

    protected function getResponserModel()
    {
        return 'Play_Product_List_MultipleResponser';
    }

    protected function getListingsLogsCurrentAction()
    {
        return Ess_M2ePro_Model_Listing_Log::ACTION_LIST_PRODUCT_ON_COMPONENT;
    }

    // ########################################

    protected function prepareListingsProducts($listingProducts)
    {
        foreach ($listingProducts as $key => $listingProduct) {

            /** @var $listingProduct Ess_M2ePro_Model_Listing_Product */

            if (!$listingProduct->isNotListed()) {

                // Parser hack -> Mage::helper('M2ePro')->__('Item is already on Play.com, or not available.');
                $this->addListingsProductsLogsMessage($listingProduct,
                                                      'Item is already on Play.com, or not available.',
                                                      Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                                                      Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM);

                unset($listingProducts[$key]);
                continue;
            }

            $addingSku = $listingProduct->getChildObject()->getSku();
            empty($addingSku) && $addingSku = $listingProduct->getChildObject()->getAddingSku();

            if (!$this->validateSku($addingSku,$listingProduct)) {
                unset($listingProducts[$key]);
                continue;
            }

            if ($this->isSkuExistsInM2ePro($addingSku,$listingProduct)) {

                if ($listingProduct->getChildObject()->getPlayListing()->isGenerateSkuModeNo()) {
                    unset($listingProducts[$key]);
                    continue;
                }

                $addingSku = $this->generateSku($listingProduct);

                if ($addingSku === false) {
                    // -> Mage::helper('M2ePro')->__('Can\'t generate SKU.');
                    $this->addListingsProductsLogsMessage(
                        $listingProduct, 'Can\'t generate SKU.',
                        Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                        Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                    );

                    unset($listingProducts[$key]);
                    continue;
                }
            }

            $this->skusToCheck[$addingSku] = true;
            $listingProduct->setData('sku',$addingSku);
        }

        $this->checkSkuExistance($listingProducts);

        foreach ($listingProducts as $key => $listingProduct) {

            // exception happened
            if (is_null($listingProduct->getData('found_on_play'))) {
                unset($listingProducts[$key]);
                continue;
            }

            if ($listingProduct->getData('found_on_play')) {
                $this->linkItem($listingProduct);
                unset($listingProducts[$key]);
                continue;
            }

            if (!$this->checkGeneralConditions($listingProduct)) {
                unset($listingProducts[$key]);
                continue;
            }
        }

        return array_values($listingProducts);
    }

    // ########################################

    protected function getRequestData()
    {
        $tempSkus = array();

        $requestData = array(
            'items' => array()
        );

        foreach ($this->listingsProducts as $listingProduct) {

            $tempSkus[] = $listingProduct->getData('sku');

            /** @var $listingProduct Ess_M2ePro_Model_Listing_Product */

            $nativeData = Mage::getModel('M2ePro/Connector_Play_Product_Helper')
                                         ->getListRequestData($listingProduct,$this->params);

            $sendedData = $nativeData;
            $sendedData['id'] = $listingProduct->getId();

            $this->listingProductRequestsData[$listingProduct->getId()] = array(
                'native_data' => $nativeData,
                'sended_data' => $sendedData
            );

            $requestData['items'][] = $sendedData;
        }

        $this->addSkusToQueue($tempSkus);

        return $requestData;
    }

    // ########################################

    private function checkGeneralConditions(Ess_M2ePro_Model_Listing_Product $listingProduct)
    {
        $addingGeneralId = $listingProduct->getChildObject()->getGeneralId();
        $addingGeneralIdType = $listingProduct->getChildObject()->getGeneralIdType();

        if ($this->params['status_changer'] == Ess_M2ePro_Model_Listing_Product::STATUS_CHANGER_USER &&
            (empty($addingGeneralId) || empty($addingGeneralIdType))) {

        $message  = 'You can list a product only with assigned Play.com Identifier. ';
        $message .= 'Please, use the Search Play.com Identifier tool:  ';
        $message .= 'press the icon in Play.com Identifier column or choose appropriate command in the Actions dropdown.';
        $message .= ' Assigned Play.com Identifier will be displayed in Play.com Identifier column.';

            $this->addListingsProductsLogsMessage($listingProduct, $message,
                                                  Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                                                  Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM);

            return false;
        }

        empty($addingGeneralId) && $addingGeneralId = $listingProduct->getChildObject()->getAddingGeneralId();
        empty($addingGeneralIdType) && $addingGeneralIdType = $listingProduct->getChildObject()->getAddingGeneralIdType();

        if (empty($addingGeneralId) || empty($addingGeneralIdType)) {

            // Parser hack -> Mage::helper('M2ePro')->__('Identifier is not provided. Please, check Listing settings.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'Identifier is not provided. Please, check Listing settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        $addingCondition = $listingProduct->getChildObject()->getCondition();
        empty($addingCondition) && $addingCondition = $listingProduct->getChildObject()->getAddingCondition();

        $validConditions = $listingProduct->getListing()->getChildObject()->getConditionValues();

        if (empty($addingCondition) || !in_array($addingCondition,$validConditions)) {

            // ->__('Condition is invalid or missed. Please, check Listing Channel and product settings.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'Condition is invalid or missed. Please, check Listing Channel and product settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        $addingConditionNote = $listingProduct->getChildObject()->getConditionNote();
        if (is_null($addingConditionNote)) {
            $addingConditionNote = $listingProduct->getChildObject()->getAddingConditionNote();
        }

        if (is_null($addingConditionNote)) {

            // ->__('Comment is invalid or missed. Please, check Listing Channel and product settings.');
            $this->addListingsProductsLogsMessage(
            $listingProduct, 'Comment is invalid or missed. Please, check Listing Channel and product settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        if (!empty($addingConditionNote) && strlen($addingConditionNote) > 1000) {

            // ->__('The length of comment must be less than 1000 characters.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'The length of comment must be less than 1000 characters.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        $dispatchTo = $listingProduct->getChildObject()->getAddingDispatchTo();
        empty($dispatchTo) && $dispatchTo = $listingProduct->getChildObject()->getDispatchTo();

        $validDispatchTo = array(
            Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_BOTH,
            Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_UK,
            Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_EUROPA,
        );

        if (empty($dispatchTo) || !in_array($dispatchTo,$validDispatchTo)) {

            // ->__('Delivery Region is invalid or missed. Please, check Listing Channel and product settings.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'Delivery Region is invalid or missed. Please, check Listing Channel and product settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        $dispatchFrom = $listingProduct->getChildObject()->getAddingDispatchFrom();
        empty($dispatchFrom) && $dispatchFrom = $listingProduct->getChildObject()->getDispatchFrom();

        if (empty($dispatchFrom)) {

            // ->__('Dispatch Country is invalid or missed. Please, check Listing Channel and product settings.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'Dispatch Country is invalid or missed. Please, check Listing Channel and product settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        if ($dispatchTo == Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_BOTH ||
            $dispatchTo == Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_UK) {

            $priceGbr = $listingProduct->getChildObject()->getPriceGbr(true);

            if ($priceGbr <= 0) {

            // ->__('The price GBP must be greater than 0. Please, check the Selling Format Template and Product settings.');
                $this->addListingsProductsLogsMessage(
                    $listingProduct,
                    'The price GBP must be greater than 0. Please, check the Selling Format Template and Product settings.',
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );

                return false;
            }
        }

        if ($dispatchTo == Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_BOTH ||
            $dispatchTo == Ess_M2ePro_Model_Play_Listing::DISPATCH_TO_EUROPA) {

            $priceEuro = $listingProduct->getChildObject()->getPriceEuro(true);

            if ($priceEuro <= 0) {

            // ->__('The price EUR must be greater than 0. Please, check the Selling Format Template and Product settings.');
                $this->addListingsProductsLogsMessage(
                    $listingProduct,
                    'The price EUR must be greater than 0. Please, check the Selling Format Template and Product settings.',
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );

                return false;
            }
        }

        return true;
    }

    // ########################################

    private function validateSku($sku, Ess_M2ePro_Model_Listing_Product $listingProduct)
    {
        if (empty($sku)) {

            // -> Mage::helper('M2ePro')->__('Reference Code is not provided. Please, check Listing settings.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'Reference Code is not provided. Please, check Listing settings.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        if (strlen($sku) > Ess_M2ePro_Model_Play_Listing_Product::SKU_MAX_LENGTH) {

       // Parser hack -> Mage::helper('M2ePro')->__('The length of Reference Code must be less than 26 characters.');
            $this->addListingsProductsLogsMessage(
                $listingProduct, 'The length of Reference Code must be less than 26 characters.',
                Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
            );

            return false;
        }

        return true;
    }

    // ########################################

    private function checkSkuExistance($listingProducts)
    {
        $listingProductsPacks = array_chunk($listingProducts,5,true);

        foreach ($listingProductsPacks as $listingProductsPack) {

            $skus = array();

            /* @var $listingProduct Ess_M2ePro_Model_Listing_Product */

            foreach ($listingProductsPack as $key => $listingProduct) {
                $skus[$key] = $listingProduct->getData('sku');
            }

            try {

                /** @var $dispatcherObject Ess_M2ePro_Model_Connector_Play_Dispatcher */
                $dispatcherObject = Mage::getModel('M2ePro/Connector_Play_Dispatcher');
                $response = $dispatcherObject->processVirtual(
                    'product','search','generalIdBySku',
                    array('items' => $skus),'items',
                    $this->account->getId()
                );

            } catch (Exception $exception) {

                Mage::helper('M2ePro/Module_Exception')->process($exception);

                $this->addListingsLogsMessage(
                    reset($listingProductsPack), Mage::helper('M2ePro')->__($exception->getMessage()),
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );

                continue;
            }

            foreach($response as $key => $value) {
                if ($value === false || empty($value['general_id']) ) {
                    $listingProductsPack[$key]->setData('found_on_play',false);
                } else {
                    $listingProductsPack[$key]->setData('found_on_play',true);
                    $listingProductsPack[$key]->setData('general_id',$value['general_id']);
                    $listingProductsPack[$key]->setData('general_id_type',$value['general_id_type']);
                }
            }
        }

        return $listingProducts;
    }

    // ----------------------------------------

    private function isSkuExistsInM2ePro($sku, Ess_M2ePro_Model_Listing_Product $listingProduct)
    {
        // check in 3rd party by account and marketplace

        $listingOtherCollection = Mage::helper('M2ePro/Component_Play')
            ->getCollection('Listing_Other')
            ->addFieldToFilter('sku',$sku)
            ->addFieldToFilter('account_id',$this->account->getId())
            ->addFieldToFilter('marketplace_id',Ess_M2ePro_Helper_Component_Play::MARKETPLACE_ID);

        if ($listingOtherCollection->getSize() > 0) {

            if ($listingProduct->getChildObject()->getPlayListing()->isGenerateSkuModeNo()) {
                $this->addListingsProductsLogsMessage(
                    $listingProduct,
'The same Reference Code was found among 3rd Party Listings. Reference Code must be unique the product to be listed.',
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );
            }

            return true;
        }

        // check in M2ePro listings by account and marketplace

        $listingProductCollection = Mage::helper('M2ePro/Component_Play')
            ->getCollection('Listing_Product');

        $listingTable = Mage::getResourceModel('M2ePro/Listing')->getMainTable();

        $listingProductCollection
            ->getSelect()
            ->join(array('l'=>$listingTable),'`main_table`.`listing_id` = `l`.`id`',array());

        $listingProductCollection
            ->addFieldToFilter('sku',$sku)
            ->addFieldToFilter('account_id',$this->account->getId())
            ->addFieldToFilter('marketplace_id',Ess_M2ePro_Helper_Component_Play::MARKETPLACE_ID);

        if ($listingProductCollection->getSize() > 0) {

            if ($listingProduct->getChildObject()->getPlayListing()->isGenerateSkuModeNo()) {
//->__('The same Reference Code was found among M2E Listings. Reference Code must be unique the product to be listed.');
                $this->addListingsProductsLogsMessage(
                    $listingProduct,
        'The same Reference Code was found among M2E Listings. Reference Code must be unique the product to be listed.',
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );
            }

            return true;
        }

        // check in queue of SKUs by account and marketplace

        $queue = $this->getQueueOfSkus();
        if (in_array($sku,$queue) || isset($this->skusToCheck[$sku])) {

            if ($listingProduct->getChildObject()->getPlayListing()->isGenerateSkuModeNo()) {
                $this->addListingsProductsLogsMessage(
                    $listingProduct,
'The product with the same Reference Code is being listed now. Reference Code must be unique the product to be listed.',
                    Ess_M2ePro_Model_Log_Abstract::TYPE_ERROR,
                    Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
                );
            }

            return true;
        }

        return false;
    }

    // ########################################

    private function generateSku(Ess_M2ePro_Model_Listing_Product $listingProduct)
    {
        $countTriedTemp = 0;
        do {
            $newSku  = $listingProduct->getChildObject()->getAddingSku();
            $newSku .= '_' . $listingProduct->getProductId() . '_' . $listingProduct->getId();

            if (strlen($newSku) >= (Ess_M2ePro_Model_Play_Listing_Product::SKU_MAX_LENGTH - 5)) {
                $newSku = 'SKU_' . $listingProduct->getProductId() . '_' .$listingProduct->getId();
            }

            $newSku = $listingProduct->getChildObject()->createRandomSku($newSku);

        } while ($this->isSkuExistsInM2ePro($newSku,$listingProduct) && ++$countTriedTemp <= 5);

        if ($countTriedTemp >= 5) {
            return false;
        }

        return $newSku;
    }

    // ########################################

    private function linkItem(Ess_M2ePro_Model_Listing_Product $listingProduct)
    {
        $data = array(
            'general_id' => $listingProduct->getData('general_id'),
            'general_id_type' => $listingProduct->getData('general_id_type'),
            'sku' => $listingProduct->getData('sku'),
            'status' => Ess_M2ePro_Model_Listing_Product::STATUS_STOPPED
        );

        $listingProduct->addData($data)->save();

        $dataForAdd = array(
            'account_id' => $listingProduct->getListing()->getAccountId(),
            'marketplace_id' => $listingProduct->getListing()->getMarketplaceId(),
            'sku' => $listingProduct->getData('sku'),
            'product_id' => $listingProduct->getProductId(),
            'store_id' => $listingProduct->getListing()->getStoreId()
        );

        Mage::getModel('M2ePro/Play_Item')->setData($dataForAdd)->save();

        $message = Mage::helper('M2ePro')->__(
            'The product was found in your Play.com inventory and linked by Reference Code.'
        );

        $this->addListingsProductsLogsMessage(
            $listingProduct, $message,
            Ess_M2ePro_Model_Log_Abstract::TYPE_SUCCESS,
            Ess_M2ePro_Model_Log_Abstract::PRIORITY_MEDIUM
        );
    }

    // ########################################

    private function addSkusToQueue($skus)
    {
        $lockItem = Mage::getModel('M2ePro/LockItem')->load(
            'play_list_skus_queue_' . $this->account->getId(),
            'nick'
        );

        $tempSkus = array();

        if ($lockItem->getId()) {
            $tempSkus = json_decode($lockItem->getData('data'),true);
            !is_array($tempSkus) && $tempSkus = array();
        }

        $skus = array_merge($tempSkus,$skus);

        $lockItem->setData('nick','play_list_skus_queue_' . $this->account->getId())
                 ->setData('data',json_encode(array_unique($skus)))
                 ->save();
    }

    private function getQueueOfSkus()
    {
        $lockItem = Mage::getModel('M2ePro/LockItem')->load(
            'play_list_skus_queue_' . $this->account->getId(),
            'nick'
        );

        if (!$lockItem->getId()) {
            return array();
        }

        return json_decode($lockItem->getData('data'),true);
    }

    // ########################################
}