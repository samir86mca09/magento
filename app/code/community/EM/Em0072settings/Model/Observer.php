<?php
class EM_Em0072settings_Model_Observer {
	
	public function beforeGenerateBlocks(Varien_Event_Observer $observer) {
	
		# Disable default magento navigation
		if (Mage::helper('em0072settings')->getGeneral_DisableDefaultNav()) {
			$blocks = $observer->getLayout()->getXpath('//block[@name="tensite.catalog.topnav"]');
			if (!empty($blocks))
				$blocks[0]->addAttribute('ignore', true);
		}
		
		# Disable EM variation module on frontend
		if (Mage::helper('em0072settings')->getGeneral_DisableFrontendVariation()) {
			$blocks = $observer->getLayout()->getXpath('//block[@name="em_variation_tpl" or @name="mobile_view"]');
			foreach ($blocks as $block)
				$block->addAttribute('ignore', true);
		}
		
		# Disable default Magento footer links
		if (Mage::helper('em0072settings')->getGeneral_DisableFooterLinks()) {
			$blocks = $observer->getLayout()->getXpath('//block[@name="footer_links"]');
			if (!empty($blocks))
				$blocks[0]->addAttribute('ignore', true);
		}
	}
	
	public function beforeCatalogProductCollectionLoad(Varien_Event_Observer $observer) {
		$alt_img = Mage::helper('em0072settings')->getProductsGrid_AltImg();
		if ($alt_img == 'image')
			$observer->getEvent()->getCollection()->addAttributeToSelect('image');
	}
}
