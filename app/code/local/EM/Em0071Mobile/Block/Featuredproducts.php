<?php
class EM_Em0071Mobile_Block_Featuredproducts
extends Mage_Catalog_Block_Product_Abstract
implements Mage_Widget_Block_Interface
{
	 protected function getProductCollection()
	{
		$pageSize=10;
		 
		$products= Mage::getModel('catalog/product')->getCollection()
		//->setStoreId($storeId) // check lai trong multi store
		//->addStoreFilter($store_id) //lay cac san pham trong store hien tai
		->addAttributeToFilter('status', array('neq' => Mage_Catalog_Model_Product_Status::STATUS_DISABLED))
		/*
		->joinField(
			    'qty',
			    'cataloginventory/stock_item',
			    'qty',
			    'product_id=entity_id',
			    '{{table}}.stock_id=1',
			    'left'
			    )
			    ->addAttributeToFilter('qty', array('gt' => 0))//*/
			    ->addAttributeToFilter('visibility',array("neq"=>1))
			     ->addAttributeToFilter("emmobile_featured_product", array('gt' => 0)); 
		//Sort		 
		
		$products->addAttributeToSort('name', 'asc');
		
		
			$curPage = 1;
			
            $products->setPageSize($pageSize);
    
    	    $products->setCurPage($curPage);
        	
    	    $products->addAttributeToSelect('*');
            
        $this->_addProductAttributesAndPrices($products);
		return $products;

	}
}
?>