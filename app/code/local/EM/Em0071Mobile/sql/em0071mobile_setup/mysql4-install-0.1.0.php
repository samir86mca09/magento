<?php

$installer = $this;

$installer->startSetup();

$block = Mage::getModel('cms/block');
$page = Mage::getModel('cms/page');
//$stores = array_keys(Mage::getSingleton('adminhtml/system_store')->getStoreOptionHash());

$stores = array(0);


####################################################################################################
# INSERT STATIC BLOCKS MOBILE
####################################################################################################
//1.Main Slideshow Mobile
$dataBlock = array(
	'title' => 'Em0071 Main Slideshow Mobile',
	'identifier' => 'em0071_main_slideshow_mobile',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
		<ul>
		<li class="item" style="display: block;"><a title="" href="furniture.html"><img src="{{media url='em0071_slideshow_mobile/slide-1.jpg'}}" alt="" /></a><a href="#"><span>off</span><span>50%</span><span>Ullamcor tristi tempor</span></a></li>
		<li class="item" style="display: block;"><a title="" href="furniture.html"><img src="{{media url='em0071_slideshow_mobile/slide-2.jpg'}}" alt="" /></a><a href="#"><span>off</span><span>50%</span><span>Ullamcor tristi tempor</span></a></li>
		<li class="item" style="display: block;"><a title="" href="furniture.html"><img src="{{media url='em0071_slideshow_mobile/slide-3.jpg'}}" alt="" /></a><a href="#"><span>off</span><span>50%</span><span>Ullamcor tristi tempor</span></a></li>
		</ul>
EOB
);
$block->setData($dataBlock)->save();


//2. New Arrivals Home Mobile 
$dataBlock = array(
	'title' => 'Em0071 New Arrivals Home Mobile',
	'identifier' => 'em0071_new_arrivals_home_mobile',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
		<div class="new_arrivals_home_mobile">{{widget type="catalog/product_widget_new" products_count="20" template="catalog/product/widget/new/content/new_grid.phtml"}}</div>
EOB
);
$block->setData($dataBlock)->save();

//3. Footer Account Mobile
$dataBlock = array(
	'title' => 'Em0071 Footer Account Mobile',
	'identifier' => 'em0071_footer_account_mobile',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
		<div class="footer_account">
		<h3>Your Account</h3>
		<ul>
		<li><a title="" href="{{store direct_url="customer/account/create/"}}">Register</a></li>
		<li><a title="" href="{{store direct_url="customer/account/"}}">My Account</a></li>
		<li><a title="" href="{{store direct_url="checkout/cart/"}}">View Cart</a></li>
		<li><a title="" href="{{store direct_url="checkout/onepage/"}}">Checkout</a></li>
		</ul>
		</div>
EOB
);
$block->setData($dataBlock)->save();

//4. Footer Store Links Mobile
$dataBlock = array(
	'title' => 'Em0071 Footer Store Links Mobile',
	'identifier' => 'em0071_footer_store_links_mobile',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
		<div class="footer_store_link">
		<h3>Store Links</h3>
		<ul>
		<li><a title="" href="{{store direct_url='catalog/seo_sitemap/category'}}">Site Map</a></li>
		<li><a title="" href="{{store direct_url='catalogsearch/term/popular/'}}">Search Terms</a></li>
		<li><a title="" href="{{store direct_url='catalogsearch/advanced/'}}">Advanced Search</a></li>
		<li><a title="" href="{{store direct_url='contacts'}}">Contact Us</a></li>
		</ul>
		</div>
EOB
);
$block->setData($dataBlock)->save();

//5. Footer About Store Mobile 
$dataBlock = array(
	'title' => 'Em0071 Footer About Store Mobile ',
	'identifier' => 'em0071_footer_about_store_mobile',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
		<div class="about-store-mobile">
		<h3>About Store</h3>
		<p>Fusce luctus dictum lacus in aliquam libero porttitor quis maecenas commodo sagittis tellus del adipiscing ante laoreet eget. Integer non dolor justo mauris...</p>
		</div>
EOB
);
$block->setData($dataBlock)->save();	

$installer->endSetup(); 