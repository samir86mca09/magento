<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Model_Connector_Amazon_Orders_Update_ItemsResponser
    extends Ess_M2ePro_Model_Connector_Amazon_Responser
{
    // Parser hack -> Mage::helper('M2ePro')->__('Amazon Order status was not updated. Reason: %msg%');
    // Parser hack -> Mage::helper('M2ePro')->__('Amazon Order status was updated to Shipped.');
    // Parser hack -> Mage::helper('M2ePro')->__('Tracking number "%num%" for "%code%" has been sent to Amazon.');

    private $orders = NULL;

    // ########################################

    protected function unsetLocks($fail = false, $message = NULL)
    {
        $logs = array();
        $currentDate = Mage::helper('M2ePro')->getCurrentGmtDate();

        $logMessage = Mage::getSingleton('M2ePro/Log_Abstract')->encodeDescription(
            'Amazon Order status was not updated. Reason: %msg%', array('msg' => $message)
        );

        foreach ($this->getOrders() as $order) {
            $order->deleteObjectLocks('update_shipping_status', $this->hash);

            if ($fail) {
                $logs[] = array(
                    'order_id'       => $order->getId(),
                    'message'        => $logMessage,
                    'type'           => Ess_M2ePro_Model_Order_Log::TYPE_ERROR,
                    'component_mode' => Ess_M2ePro_Helper_Component_Amazon::NICK,
                    'initiator'      => Ess_M2ePro_Model_Order_Log::INITIATOR_EXTENSION,
                    'create_date'    => $currentDate
                );
            }
        }

        if (count($logs) > 0) {
            $this->createLogEntries($logs);
        }
    }

    // ########################################

    protected function validateResponseData($response)
    {
        return true;
    }

    protected function processResponseData($response)
    {
        $logs = array();
        $currentDate = Mage::helper('M2ePro')->getCurrentGmtDate();

        // Check global messages
        //----------------------
        $globalMessages = $this->messages;
        if (isset($response['messages']['0-id']) && is_array($response['messages']['0-id'])) {
            $globalMessages = array_merge($globalMessages,$response['messages']['0-id']);
        }

        if (count($globalMessages) > 0) {
            foreach ($this->getOrders() as $order) {
                foreach ($globalMessages as $message) {
                    $text = $message[Ess_M2ePro_Model_Connector_Protocol::MESSAGE_TEXT_KEY];

                    $logMessage = Mage::getSingleton('M2ePro/Log_Abstract')->encodeDescription(
                        'Amazon Order status was not updated. Reason: %msg%', array('msg' => $text)
                    );

                    $logs[] = array(
                        'order_id'       => $order->getId(),
                        'message'        => $logMessage,
                        'type'           => Ess_M2ePro_Model_Order_Log::TYPE_ERROR,
                        'component_mode' => Ess_M2ePro_Helper_Component_Amazon::NICK,
                        'initiator'      => Ess_M2ePro_Model_Order_Log::INITIATOR_EXTENSION,
                        'create_date'    => $currentDate
                    );
                }
            }

            $this->createLogEntries($logs);

            return;
        }
        //----------------------

        // Check separate messages
        //----------------------
        $failedOrdersIds = array();

        foreach ($response['messages'] as $changeId => $messages) {
            $changeId = (int)$changeId;

            if ($changeId <= 0) {
                continue;
            }

            $orderId = $this->getOrderIdByChangeId($changeId);

            if (!is_numeric($orderId)) {
                continue;
            }

            $failedOrdersIds[] = $orderId;

            foreach ($messages as $message) {
                $text = $message[Ess_M2ePro_Model_Connector_Protocol::MESSAGE_TEXT_KEY];

                $logMessage = Mage::getSingleton('M2ePro/Log_Abstract')->encodeDescription(
                    'Amazon Order status was not updated. Reason: %msg%', array('msg' => $text)
                );

                $logs[] = array(
                    'order_id'       => $orderId,
                    'message'        => $logMessage,
                    'type'           => Ess_M2ePro_Model_Order_Log::TYPE_ERROR,
                    'component_mode' => Ess_M2ePro_Helper_Component_Amazon::NICK,
                    'initiator'      => Ess_M2ePro_Model_Order_Log::INITIATOR_EXTENSION,
                    'create_date'    => $currentDate
                );
            }
        }
        //----------------------

        //----------------------
        foreach ($this->params as $changeId => $requestData) {
            $orderId = $this->getOrderIdByChangeId($changeId);

            if (in_array($orderId, $failedOrdersIds)) {
                continue;
            }

            if (!is_numeric($orderId)) {
                continue;
            }

            $logs[] = array(
                'order_id'       => (int)$orderId,
                'message'        => 'Amazon Order status was updated to Shipped.',
                'type'           => Ess_M2ePro_Model_Order_Log::TYPE_SUCCESS,
                'component_mode' => Ess_M2ePro_Helper_Component_Amazon::NICK,
                'initiator'      => Ess_M2ePro_Model_Order_Log::INITIATOR_EXTENSION,
                'create_date'    => $currentDate
            );

            if (empty($requestData['tracking_number']) || empty($requestData['carrier_name'])) {
                continue;
            }

            $logMessage = Mage::getSingleton('M2ePro/Log_Abstract')->encodeDescription(
                'Tracking number "%num%" for "%code%" has been sent to Amazon.', array(
                    '!num' => $requestData['tracking_number'],
                    'code' => $requestData['carrier_name']
                )
            );

            $logs[] = array(
                'order_id'       => (int)$orderId,
                'message'        => $logMessage,
                'type'           => Ess_M2ePro_Model_Order_Log::TYPE_SUCCESS,
                'component_mode' => Ess_M2ePro_Helper_Component_Amazon::NICK,
                'initiator'      => Ess_M2ePro_Model_Order_Log::INITIATOR_EXTENSION,
                'create_date'    => $currentDate
            );
        }
        //----------------------

        $this->createLogEntries($logs);
    }

    // ########################################

    /**
     * @throws LogicException
     * @return Ess_M2ePro_Model_Order[]
     */
    private function getOrders()
    {
        if (!is_null($this->orders)) {
            return $this->orders;
        }

        $ordersIds = array();

        foreach ($this->params as $update) {
            if (!isset($update['order_id'])) {
                throw new LogicException('Order ID is not defined.');
            }

            $ordersIds[] = (int)$update['order_id'];
        }

        $this->orders = Mage::getModel('M2ePro/Order')
            ->getCollection()
                ->addFieldToFilter('component_mode', Ess_M2ePro_Helper_Component_Amazon::NICK)
                ->addFieldToFilter('id', array('in' => $ordersIds))
                ->getItems();

        return $this->orders;
    }

    private function getOrderIdByChangeId($changeId)
    {
        foreach ($this->params as $requestChangeId => $requestData) {
            if ($changeId == $requestChangeId && isset($requestData['order_id'])) {
                return $requestData['order_id'];
            }
        }

        return NULL;
    }

    // ########################################

    private function createLogEntries(array $data)
    {
        if (count($data) == 0) {
            throw new InvalidArgumentException('Number of log entries cannot be zero.');
        }

        /** @var $writeConnection Varien_Db_Adapter_Interface */
        $writeConnection = Mage::getSingleton('core/resource')->getConnection('core_write');
        $writeConnection->insertMultiple(Mage::getResourceModel('M2ePro/Order_Log')->getMainTable(), $data);
    }

    // ########################################
}