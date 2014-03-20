<?php

/*
 * Observer which hooks into the magento catalog_product_new_action event and sets default values.
 * @author Jamie McKenzie <jamie@agentdesign.co.uk>
 */
class Agent_Catalog_Model_Product_Observer
{
	public function catalog_product_new_action($observer) {

		$product = $observer->getEvent()->getProduct();
		$product->setStatus(1); // Active = Yes
		$product->setTaxClassId(2); // Taxable Goods

		$stockItem = Mage::getModel('cataloginventory/stock_item');
		$stockItem->assignProduct($product);
		$stockItem->setData('is_in_stock', 1); // Stockable = true
		//$stockItem->setData('qty', 1); // Default Quantity = 1

		$product->setStockItem($stockItem);
	}
}