<?php

$installer = $this;

$installer->startSetup();


####################################################################################################
# ADD THEMEFRAMEWORK LAYOUT
####################################################################################################

$model = Mage::getModel('themeframework/area');
	
$data = array(
	'package_theme'  => 'default/em0072',
	'layout'         => '1column',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:5:{i:0;a:6:{s:10:"custom_css";s:6:"span24";s:10:"inner_html";s:0:"";s:10:"outer_html";s:49:"<div class="wraper-top-header"> {{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:8:"em_area2";}}i:1;a:6:{s:10:"custom_css";s:6:"span24";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wraper-header"> {{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:3:{i:0;s:6:"header";i:1;s:17:"topMenuHorizontal";i:2;s:8:"em_area6";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:7:"em_main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:8:{i:0;s:8:"em_area3";i:1;s:15:"global_messages";i:2;s:11:"breadcrumbs";i:3;s:8:"em_area4";i:4;s:7:"content";i:5;s:8:"em_area5";i:6;s:8:"em_area7";i:7;s:8:"em_area8";}}}}i:3;a:6:{s:10:"custom_css";s:6:"span24";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="footer-wrapper"> {{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:2:{i:0;s:8:"em_area1";i:1;s:6:"footer";}}i:4;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}i:1;s:5:"clear";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0072',
	'layout'         => '3columns',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:3:{i:0;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"left-container";s:10:"inner_html";s:51:"<div class="inner-left-container">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:5:{i:0;s:6:"header";i:1;s:19:"topMenuVerticalLeft";i:2;s:8:"em_area6";i:3;s:4:"left";i:4;s:8:"em_area1";}}i:1;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:7:"em_main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:8:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";i:2;s:15:"global_messages";i:3;s:11:"breadcrumbs";i:4;s:8:"em_area4";i:5;s:7:"content";i:6;s:8:"em_area5";i:7;s:8:"em_area8";}}i:2;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:5:"right";i:1;s:8:"em_area7";}}}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"footer";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0072',
	'layout'         => '2columns-left',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"left-container";s:10:"inner_html";s:51:"<div class="inner-left-container">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:5:{i:0;s:6:"header";i:1;s:19:"topMenuVerticalLeft";i:2;s:8:"em_area6";i:3;s:4:"left";i:4;s:8:"em_area1";}}i:1;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:7:"em_main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:8:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";i:2;s:15:"global_messages";i:3;s:11:"breadcrumbs";i:4;s:8:"em_area4";i:5;s:7:"content";i:6;s:8:"em_area5";i:7;s:8:"em_area8";}}}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"footer";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0072',
	'layout'         => '2columns-right',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:7:"em_main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:8:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";i:2;s:15:"global_messages";i:3;s:11:"breadcrumbs";i:4;s:8:"em_area4";i:5;s:7:"content";i:6;s:8:"em_area5";i:7;s:8:"em_area8";}}i:1;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"left-container";s:10:"inner_html";s:51:"<div class="inner-left-container">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:6:{i:0;s:6:"header";i:1;s:20:"topMenuVerticalRight";i:2;s:8:"em_area6";i:3;s:5:"right";i:4;s:8:"em_area7";i:5;s:8:"em_area1";}}}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"footer";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();




####################################################################################################
# INSERT Product Attribute
####################################################################################################

$installer->addAttribute('catalog_product', 'big_product', array(
        'group'             => 'General',
        'type'              => 'int',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Big Product',
        'input'             => 'boolean',
        'class'             => '',
        'source'            => '',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible'           => true,
        'required'          => false,
        'user_defined'      => true,
        'default'           => '0',
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

####################################################################################################
# INSERT STATIC BLOCKS
####################################################################################################
$helper = Mage::helper('em0072settings');
$block = Mage::getModel('cms/block');
$stores = array(0);
$prefixBlock = 'em0072_';

// EM0072 - Area 3 - Banners
$dataBlock = array(
	'title' => 'EM0072 - Area 3 - Banners',
	'identifier' => $prefixBlock.'area3_banners',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="row">
<div class="span6">
<p><a href="#"><img class="fluid" src="{{skin url='images/media/area2_banner1.png'}}" alt="" /></a></p>
</div>
<div class="span6">
<p><a href="#"><img class="fluid" src="{{skin url='images/media/area2_banner2.png'}}" alt="" /></a></p>
</div>
<div class="span6">
<p><a href="#"><img class="fluid" src="{{skin url='images/media/area2_banner3.png'}}" alt="" /></a></p>
</div>
</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area3_banners'] = $block->getId();

// EM0072 - Area 8 - Blog
$dataBlock = array(
	'title' => 'EM0072 - Area 8 - Blog',
	'identifier' => $prefixBlock.'area8_blog',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div>{{block type="blog/post_list_recent" name="erea8.blog" template="em_blog/post/list/area8_recent.phtml"}}</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area8_blog'] = $block->getId();

// EM0072 - Product Collateral Sample
$dataBlock = array(
	'title' => 'EM0072 - Product Collateral Sample',
	'identifier' => $prefixBlock.'product_collateral_sample',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<p>A sample of additional collateral tabs that you can insert as a widget in static the backend.</p>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['product_collateral_sample'] = $block->getId();

// EM0072 - Area 4 - Sample Block
$dataBlock = array(
	'title' => 'EM0072 - Area 4 - Sample Block',
	'identifier' => $prefixBlock.'area4_sample_block',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="box">This is a sample content in position <strong>Area 4</strong>. You can add your own content by insert widget into position <strong>Area 4</strong>.</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area4_sample_block'] = $block->getId();

// EM0072 - Area 5 - Sample Block
$dataBlock = array(
	'title' => 'EM0072 - Area 5 - Sample Block',
	'identifier' => $prefixBlock.'area5_sample_block',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="box">This is a sample content in position <strong>Area 5</strong>. You can add your own content by insert widget into position <strong>Area 5</strong>.</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area5_sample_block'] = $block->getId();

// EM0072 - Extra Hint
$dataBlock = array(
	'title' => 'EM0072 - Extra Hint',
	'identifier' => $prefixBlock.'extra_hint',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="box">This is a sample content in position <strong>Extra Hint</strong>. You can add your own content by insert widget into position <strong>Extra Hint</strong>.</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['extra_hint'] = $block->getId();

// EM0072 - Alert Urls
$dataBlock = array(
	'title' => 'EM0072 - Alert Urls',
	'identifier' => $prefixBlock.'alert_urls',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="box">This is a sample content in position <strong>Alert Urls</strong>. You can add your own content by insert widget into position <strong>Alert Urls</strong>.</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['alert_urls'] = $block->getId();

// EM0072 - Product View Short Description After
$dataBlock = array(
	'title' => 'EM0072 - Product View Short Description After',
	'identifier' => $prefixBlock.'product_view_short_description_after',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="box">This is a sample content in position <strong>Product View Short Description After</strong>. You can add your own content by insert widget into position <strong>Product View Short Description After</strong>.</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['product_view_short_description_after'] = $block->getId();

// EM0072 - Area 1 - Links
$dataBlock = array(
	'title' => 'EM0072 - Area 1 - Links',
	'identifier' => $prefixBlock.'area1_links',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div>{{block type="newsletter/subscribe" name="area1.newsletter" template="newsletter/subscribe.phtml"}}</div>
<div>
<p style="margin-bottom: 25px;"><span class="icon facebook">facebook</span> <span class="icon twitter">twitter</span> <span class="icon flickr">Flickr</span> <span class="icon rss">rss</span></p>
<p style="margin-bottom: 13px;"><span class="icon visa">visa</span> <span class="icon mastercard">mastercard</span> <span class="icon paypal">paypal</span> <span class="icon express">express</span></p>
</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area1_links'] = $block->getId();

####################################################################################################
# INSERT PAGE
####################################################################################################
 
$prefixPage = 'em0072_';
$page = Mage::getModel('cms/page');

// Home
$dataPage = array(
	'title'				=> 'EM0072 Fashionist Magento Theme - Homepage',
	'identifier' 		=> $prefixPage.'home',
	'stores'			=> $stores,
	'content_heading'	=> '',
	'root_template'		=> 'two_columns_left',
	'content'			=> <<<EOB
<!-- empty -->
EOB
);
$helper->insertPage($dataPage);

// Typography
$dataPage = array(
	'title'				=> 'Typography',
	'identifier' 		=> $prefixPage.'typography',
	'stores'			=> $stores,
	'content_heading'	=> 'Typography',
	'root_template'		=> 'one_column',
	'content'			=> <<<EOB
<div class="blog-content">
<h2>General Elements</h2>
<h1>Heading 1</h1>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<ul>
<li>Bullet List 1
<ul>
<li>Bullet List 1.1</li>
<li>Bullet List 1.2</li>
<li>Bullet List 1.3</li>
<li>Bullet List 1.4</li>
</ul>
</li>
<li>Bullet List 2</li>
<li>Bullet List 3</li>
<li>Bullet List 4</li>
</ul>
<ol>
<li>Number List 1<ol>
<li>Number List 1.1</li>
<li>Number List 1.2</li>
<li>Number List 1.3</li>
<li>Number List 1.4</li>
</ol></li>
<li>Number List 2</li>
<li>Number List 3</li>
<li>Number List 4</li>
</ol><dl><dt>Definition title dt</dt><dd>Defination description dd</dd><dt>Definition title dt</dt><dd>Defination description dd</dd></dl>
<p><code>Code tag:&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</code></p>
<blockquote>
<p>block quote&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</blockquote>
<div class="box f-left">element with class <strong>.f-left</strong></div>
<div class="box f-right">element with class <strong>.f-right</strong></div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<h2>Tables</h2>
<p>Table with class <strong>.data-table</strong></p>
<table class="data-table" style="width: 100%;" border="0">
<thead>
<tr><th>thead th1</th><th>thead th2</th><th>thead th3</th><th>thead th4</th><th>thead th5</th></tr>
</thead>
<tbody>
<tr>
<td>tbody td 1.1</td>
<td>tbody td 2.1</td>
<td>tbody td 3.1</td>
<td>tbody td 4.1</td>
<td>tbody td 5.1</td>
</tr>
<tr>
<td>tbody td 1.1</td>
<td>tbody td 2.1</td>
<td>tbody td 3.1</td>
<td>tbody td 4.1</td>
<td>tbody td 5.1</td>
</tr>
<tr>
<td>tbody td 1.1</td>
<td>tbody td 2.1</td>
<td>tbody td 3.1</td>
<td>tbody td 4.1</td>
<td>tbody td 5.1</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<h2>Custom CSS Classes</h2>
<p class="normal">this is a paragraph with class <strong>.normal</strong></p>
<p class="primary">this is a paragraph with class <strong>.primary</strong></p>
<p class="secondary">this is a paragraph with class <strong>.secondary</strong></p>
<p class="secondary2">this is a paragraph with class <strong>.secondary2</strong></p>
<p class="small">tag <strong>small</strong> and class <strong>.small</strong></p>
<p class="underline">element with class <strong>.underline</strong></p>
<p><strong>ul.none</strong> and <strong>ol.none</strong>:</p>
<ul class="none">
<li>Bullet List 1</li>
<ul>
<li>Bullet List 1.1</li>
<li>Bullet List 1.2</li>
<li>Bullet List 1.3</li>
<li>Bullet List 1.4</li>
</ul>
<li>Bullet List 2</li>
<li>Bullet List 3</li>
<li>Bullet List 4</li>
</ul>
<p><strong>ul.hoz</strong> and <strong>ol.hoz</strong>:</p>
<ul class="hoz">
<li>Bullet List 1</li>
<li>Bullet List 2</li>
<li>Bullet List 3</li>
<li>Bullet List 4</li>
</ul>
<div class="box">
<p>paragraph with class <strong>.box</strong>:</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<p class="bottom">Paragraph with class <strong>.bottom</strong> always has margin-bottom = 0.</p>
<p>Add class <strong>.hide-lte2</strong> to hide element when screen's width less than 1280px.</p>
<p class="box hide-lte2">This block will disappear when resize window less than 1280px</p>
<p>Add class <strong>.hide-lte1</strong> to hide element when screen's width less than 980px.</p>
<p class="box hide-lte1">This block will disappear when resize window less than 980px</p>
<p>Add class <strong>.hide-lte0</strong> to hide element when screen's width less than 760px.</p>
<p class="box hide-lte0">This block will disappear when resize window less than 760px</p>
<h2>Icons</h2>
<table class="data-table" border="0">
<tbody>
<tr>
<td align="center" valign="top">
<p>.icon.facebook</p>
<p><span class="icon facebook">span.icon.facebook</span></p>
</td>
<td align="center" valign="top">
<p>.icon.twitter</p>
<p><span class="icon twitter ">span.icon.twitter </span></p>
</td>
<td align="center" valign="top">
<p>.icon.flickr</p>
<p><span class="icon flickr">span.icon.flickr</span></p>
</td>
<td align="center" valign="top">
<p>.icon.rss</p>
<p><span class="icon rss">span.icon.rss</span></p>
</td>
</tr>
<tr>
<td align="center" valign="top">
<p>.icon.visa</p>
<p><span class="icon visa">span.icon.visa</span></p>
</td>
<td align="center" valign="top">
<p>.icon.mastercard</p>
<p><span class="icon mastercard">span.icon.mastercard</span></p>
</td>
<td align="center" valign="top">
<p>.icon.paypal</p>
<p><span class="icon paypal">span.icon.paypal</span></p>
</td>
<td align="center" valign="top">
<p>.icon.express</p>
<p><span class="icon express">span.icon.express</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<h2>Brands</h2>
<table class="data-table" border="0">
<tbody>
<tr>
<td align="center" valign="top">
<p>.brand-logo.chanel</p>
<p><span class="brand-logo chanel">span.brand-logo.chanel</span></p>
</td>
<td align="center" valign="top">
<p>.brand-logo.puma</p>
<p><span class="brand-logo puma">span.brand-logo.puma</span></p>
</td>
<td align="center" valign="top">
<p>.brand-logo.versace</p>
<p><span class="brand-logo versace">span.brand-logo.versace</span></p>
</td>
</tr>
<tr>
<td align="center" valign="top">
<p>.brand-logo.lacoste</p>
<p><span class="brand-logo locoste">span.brand-logo.locoste</span></p>
</td>
<td align="center" valign="top">
<p>.brand-logo.levis</p>
<p><span class="brand-logo levis">span.brand-logo.levis</span></p>
</td>
<td align="center" valign="top">
<p>.brand-logo.adidas</p>
<p><span class="brand-logo adidas">span.brand-logo.adidas</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>image with class <strong>.fluid</strong>:</p>
<p><img class="fluid" title="image with class .fluid" src="{{skin url="images/media/slide3.jpg"}}" alt="image with class .fluid" /></p>
</div>
EOB
);
$helper->insertPage($dataPage);

// Widgets
$dataPage = array(
	'title'				=> 'Widgets',
	'identifier' 		=> $prefixPage.'widgets',
	'stores'			=> $stores,
	'content_heading'	=> '',
	'root_template'		=> 'one_column',
	'content'			=> <<<EOB
<h2>Demo EM Slideshow Widget</h2>
<p>{{widget type="slideshow2/slideshow2" slideshow="1"}}</p>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM Featured Products Widget</h2>
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 50%;" valign="top">
<h3>Grid View</h3>
<p>{{widget type="dynamicproducts/dynamicproducts" featured_choose="em_featured" limit_count="4" order_by="name asc" item_class="span8" thumbnail_width="326" thumbnail_height="460" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_featured_products/featured_grid.phtml"}}</p>
</td>
<td style="width: 50%;" valign="top">
<h3>Grid View with column count = 2</h3>
<p>{{widget type="dynamicproducts/dynamicproducts" featured_choose="em_featured" limit_count="10" column_count="2" order_by="name asc" item_class="span4" thumbnail_width="326" thumbnail_height="460" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_featured_products/featured_grid.phtml"}}</p>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 50%; padding-right: 15px;" valign="top">
<h3>List View</h3>
<p>{{widget type="dynamicproducts/dynamicproducts" featured_choose="em_featured" limit_count="4" order_by="name asc" thumbnail_width="170" thumbnail_height="239" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_featured_products/featured_list.phtml"}}</p>
</td>
<td style="width: 50%; padding-left: 15px;" valign="top">
<h3>List View with column count = 2</h3>
<p>{{widget type="dynamicproducts/dynamicproducts" featured_choose="em_featured" limit_count="4" column_count="2" order_by="name asc" thumbnail_width="170" thumbnail_height="239" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_featured_products/featured_list.phtml"}}</p>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM Bestseller Products Widget</h2>
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 50%;" valign="top">
<h3>Grid View</h3>
<p>{{widget type="bestsellerproducts/list" order_by="name asc" limit_count="6" column_count="2" frontend_title="Bestseller Products" item_class="span4" thumbnail_width="326" thumbnail_height="460" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_bestseller_products/bestseller_grid.phtml"}}</p>
</td>
<td style="width: 50%;" valign="top">
<h3>List View</h3>
<p>{{widget type="bestsellerproducts/list" order_by="name asc" limit_count="4" column_count="2" frontend_title="Bestseller Products" thumbnail_width="170" thumbnail_height="239" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_bestseller_products/bestseller_list.phtml"}}</p>
<div>&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM New Products Widget</h2>
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 50%;" valign="top">
<h3>Grid View</h3>
<p>{{widget type="newproducts/list" limit_count="4" column_count="2" order_by="name asc" frontend_title="New Products" item_class="span4" thumbnail_width="326" thumbnail_height="460" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_new_products/new_grid.phtml"}}</p>
</td>
<td style="width: 50%;" valign="top">
<h3>List View</h3>
<p>{{widget type="newproducts/list" limit_count="4" column_count="4" order_by="name asc" frontend_title="New Products" thumbnail_width="170" thumbnail_height="239" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_new_products/new_list.phtml"}}</p>
<div>&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM Sale Products Widget</h2>
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 50%;" valign="top">
<h3>Grid View</h3>
<p>{{widget type="saleproducts/list" order_by="name asc" limit_count="6" column_count="2" frontend_title="Sale Products" item_class="span8" thumbnail_width="326" thumbnail_height="460" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_sale_products/sale_grid.phtml"}}</p>
</td>
<td style="width: 50%;" valign="top">
<h3>List View</h3>
<p>{{widget type="saleproducts/list" order_by="name asc" limit_count="3" column_count="1" frontend_title="Sale Products" thumbnail_width="170" thumbnail_height="239" show_product_name="true" show_thumbnail="true" show_description="true" show_price="true" show_reviews="true" show_addtocart="true" show_addto="true" show_label="true" choose_template="em_sale_products/sale_list.phtml"}}</p>
<div>&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM Slider Widget</h2>
<div class="grid_12">
<h3>Vertical Sliding</h3>
<p>{{widget type="sliderwidget/slide" instance="16" direction="1" container=".products-list" slider_height="582" items_per_slide="2"}}</p>
</div>
<div class="grid_12">
<h3>Horizontal Sliding</h3>
<p>{{widget type="sliderwidget/slide" instance="16" container=".products-list" items_per_slide="3"}}</p>
</div>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Demo EM Tabs Widget</h2>
<p>{{widget type="tabs/group" title_1="YTo0OntpOjA7czo1OiJUYWIgMSI7aToxO3M6MDoiIjtpOjM7czowOiIiO2k6MjtzOjA6IiI7fQ==" block_1="6" title_2="YTo0OntpOjA7czo1OiJUYWIgMiI7aToxO3M6MDoiIjtpOjM7czowOiIiO2k6MjtzOjA6IiI7fQ==" block_2="5" title_3="YTo0OntpOjA7czo1OiJUYWIgMyI7aToxO3M6MDoiIjtpOjM7czowOiIiO2k6MjtzOjA6IiI7fQ==" block_3="15" template="emtabs/group.phtml"}}</p>
<p>&nbsp;</p>
EOB
);
$helper->insertPage($dataPage);

####################################################################################################
# INSERT WIDGET INSTANCE
####################################################################################################

$widgetInstance = Mage::getModel('widget/widget_instance');
$package_theme  = 'default/em0072';

// EM0072 - Area 3 - Banners
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Area 3 - Banners',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"6";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:4:{s:7:"page_id";s:1:"2";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:8:"em_area3";}s:5:"pages";a:3:{s:7:"page_id";s:1:"2";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['area3_banners']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Main Content - Featured Product
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Main Content - Featured Product',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:22:{s:15:"featured_choose";s:11:"em_featured";s:11:"limit_count";s:2:"20";s:12:"column_count";s:0:"";s:8:"order_by";s:8:"name asc";s:12:"custom_class";s:17:"category-products";s:14:"frontend_title";s:0:"";s:20:"frontend_description";s:0:"";s:10:"item_class";s:0:"";s:11:"item_height";s:0:"";s:15:"thumbnail_width";s:3:"158";s:16:"thumbnail_height";s:3:"230";s:17:"show_product_name";s:4:"true";s:14:"show_thumbnail";s:4:"true";s:16:"show_description";s:4:"true";s:10:"show_price";s:4:"true";s:12:"show_reviews";s:4:"true";s:14:"show_addtocart";s:4:"true";s:10:"show_addto";s:4:"true";s:10:"show_label";s:4:"true";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:51:"em_featured_products/featured_products_custom.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:4:{s:7:"page_id";s:1:"4";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:7:"content";}}}
EOB
	)
);
$widgetInstance->setData($widget)->setType('dynamicproducts/dynamicproducts')->setPackageTheme($package_theme)->save();

// EM0072 - Area 8 - Blog
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Area 8 - Blog',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"7";s:12:"custom_class";s:9:"area-blog";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:4:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:8:"em_area8";}s:5:"pages";a:3:{s:7:"page_id";s:1:"5";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['area8_blog']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Left - Latest Review
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Left - Latest Review',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:18:{s:8:"order_by";s:8:"name asc";s:11:"limit_count";s:1:"2";s:15:"thumbnail_width";s:2:"80";s:12:"column_count";s:1:"2";s:16:"thumbnail_height";s:3:"113";s:12:"custom_class";s:0:"";s:14:"frontend_title";s:11:"Latest View";s:10:"item_width";s:0:"";s:11:"item_height";s:0:"";s:12:"item_spacing";s:0:"";s:14:"show_addtocart";s:4:"true";s:10:"show_label";s:4:"true";s:17:"show_product_name";s:4:"true";s:14:"show_thumbnail";s:4:"true";s:10:"show_price";s:4:"true";s:10:"show_addto";s:4:"true";s:14:"cache_lifetime";s:0:"";s:15:"choose_template";s:46:"em_recentviewproducts/list_products_full.phtml";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:4:{i:3;a:12:{s:10:"page_group";s:20:"notanchor_categories";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:7:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"14";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:2;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"13";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:1;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:4:{s:7:"page_id";s:2:"12";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:4:"left";}}i:0;a:12:{s:10:"page_group";s:17:"anchor_categories";s:17:"anchor_categories";a:7:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"11";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"11";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
$widgetInstance->setData($widget)->setType('recentreviewproducts/list')->setPackageTheme($package_theme)->save();

// EM0072 - Product Collateral Sample 1
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Product Collateral Sample 1',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"8";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:12:"Custom Tab 1";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:33:"product.info.additonal_collateral";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"15";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['product_collateral_sample']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Product Collateral Sample 2
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Product Collateral Sample 2',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"8";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:12:"Custom Tab N";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:33:"product.info.additonal_collateral";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"16";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['product_collateral_sample']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Area 4 - Sample Block
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Area 4 - Sample Block',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"9";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:8:"em_area4";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"17";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['area4_sample_block']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Area 5 - Sample Block
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Area 5 - Sample Block',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:2:"10";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:8:"em_area5";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"18";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['area5_sample_block']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Extra Hint
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Extra Hint',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:2:"11";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:22:"product.info.extrahint";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"19";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['extra_hint']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Alert Urls
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Alert Urls',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:2:"12";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:10:"alert.urls";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"20";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['alert_urls']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Product View Short Description After
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Product View Short Description After',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:2:"13";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:18:"product.info.other";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"21";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['product_view_short_description_after']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Area 1 - Links
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Area 1 - Links',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:2:"14";s:12:"custom_class";s:0:"";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:4:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:8:"em_area1";}s:5:"pages";a:3:{s:7:"page_id";s:2:"23";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
	)
);
em0072_install_fix_widget_block_id($widget, $block_id['area1_links']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

// EM0072 - Widget - Demo - Slider
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'EM0072 - Widget - Demo - Slider',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:23:{s:12:"new_category";a:1:{i:0;s:1:"3";}s:15:"featured_choose";s:8:"em_featured";s:11:"limit_count";s:2:"10";s:12:"column_count";s:0:"";s:8:"order_by";s:8:"name asc";s:12:"custom_class";s:0:"";s:14:"frontend_title";s:0:"";s:20:"frontend_description";s:0:"";s:10:"item_class";s:5:"span8";s:11:"item_height";s:0:"";s:15:"thumbnail_width";s:3:"170";s:16:"thumbnail_height";s:3:"239";s:17:"show_product_name";s:4:"true";s:14:"show_thumbnail";s:4:"true";s:16:"show_description";s:4:"true";s:10:"show_price";s:4:"true";s:12:"show_reviews";s:4:"true";s:14:"show_addtocart";s:4:"true";s:10:"show_addto";s:4:"true";s:10:"show_label";s:4:"true";s:15:"choose_template";s:40:"em_featured_products/featured_list.phtml";s:12:"custom_theme";s:0:"";s:14:"cache_lifetime";s:0:"";}
EOB
);
$widgetInstance->setData($widget)->setType('dynamicproducts/dynamicproducts')->setPackageTheme($package_theme)->save();


function em0072_install_fix_widget_block_id(&$widget, $block_id) {
	$params = unserialize($widget['widget_parameters']);
	$params['block_id'] = $block_id;
	$widget['widget_parameters'] = serialize($params);
}

function em0072_install_fix_widget_instance_id(&$widget, $instance_id) {
	$params = unserialize($widget['widget_parameters']);
	$params['instance'] = $instance_id;
	$widget['widget_parameters'] = serialize($params);
}


####################################################################################################
# ADD MEGAMENU PRO
####################################################################################################

$installer->run("

CREATE TABLE  IF NOT EXISTS {$this->getTable('megamenupro')} (
  `megamenupro_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `type` smallint(6) NOT NULL default '0',
  `content` text NOT NULL default '',
  `css_class` varchar(255) NULL,
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`megamenupro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

# create menu of theme EM0067
$model = Mage::getModel('em0072settings/megamenupro');
$model->setData(array(
	'name' => "Main Menu",
	'type' => "1",
	'content' => <<<EOB
a:52:{i:0;a:8:{s:4:"type";s:4:"link";s:5:"label";s:13:"New this week";s:8:"sublabel";s:0:"";s:3:"url";s:47:"{{store direct_url='electronics/cameras.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:1;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:2;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"span10";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:3;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:4;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:5;a:5:{s:4:"type";s:4:"text";s:4:"text";s:320:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:6;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:7;a:5:{s:4:"type";s:4:"text";s:4:"text";s:752:"PGg0PlN1c3BlbmRpc3NlIHJpc3VzPC9oND4KPHA+e3t3aWRnZXQgdHlwZT0ibWVnYW1lbnVwcm8vY2F0YWxvZ25hdmlnYXRpb24iIGNhdGVnb3J5X2lkPSJjYXRlZ29yeS8xMiIgZGlyZWN0aW9uPSJ2ZXJ0aWNhbCJ9fTwvcD4KPGRpdiBjbGFzcz0ibm9fcXVpY2tzaG9wIj57e3dpZGdldCB0eXBlPSJuZXdwcm9kdWN0cy9saXN0IiBuZXdfY2F0ZWdvcnk9IjMiIGxpbWl0X2NvdW50PSIxIiBvcmRlcl9ieT0ibmFtZSBhc2MiIGl0ZW1fY2xhc3M9InNwYW40IiB0aHVtYm5haWxfd2lkdGg9IjM1NiIgdGh1bWJuYWlsX2hlaWdodD0iNTAwIiBzaG93X3Byb2R1Y3RfbmFtZT0idHJ1ZSIgc2hvd190aHVtYm5haWw9InRydWUiIHNob3dfZGVzY3JpcHRpb249InRydWUiIHNob3dfcHJpY2U9InRydWUiIHNob3dfcmV2aWV3cz0idHJ1ZSIgc2hvd19hZGR0b2NhcnQ9InRydWUiIHNob3dfYWRkdG89InRydWUiIHNob3dfbGFiZWw9InRydWUiIGNob29zZV90ZW1wbGF0ZT0iY3VzdG9tX3RlbXBsYXRlIiBjdXN0b21fdGhlbWU9ImVtX25ld19wcm9kdWN0cy9uZXdfZ3JpZF9tZW51LnBodG1sIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:8;a:8:{s:4:"type";s:4:"link";s:5:"label";s:5:"Woman";s:8:"sublabel";s:0:"";s:3:"url";s:34:"{{store direct_url='apparel.hml'}}";s:6:"target";s:0:"";s:9:"css_class";s:5:"woman";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:9;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:10;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"span10";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:11;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:12;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:13;a:5:{s:4:"type";s:4:"text";s:4:"text";s:384:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlBlbGxlbnRlc3F1ZTwvaDQ+CjxoND5NYWVjZW5hcyBkaWduaXNpbTwvaDQ+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:14;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:15;a:5:{s:4:"type";s:4:"text";s:4:"text";s:752:"PGg0PlN1c3BlbmRpc3NlIHJpc3VzPC9oND4KPHA+e3t3aWRnZXQgdHlwZT0ibWVnYW1lbnVwcm8vY2F0YWxvZ25hdmlnYXRpb24iIGNhdGVnb3J5X2lkPSJjYXRlZ29yeS8xMiIgZGlyZWN0aW9uPSJ2ZXJ0aWNhbCJ9fTwvcD4KPGRpdiBjbGFzcz0ibm9fcXVpY2tzaG9wIj57e3dpZGdldCB0eXBlPSJuZXdwcm9kdWN0cy9saXN0IiBuZXdfY2F0ZWdvcnk9IjMiIGxpbWl0X2NvdW50PSIxIiBvcmRlcl9ieT0ibmFtZSBhc2MiIGl0ZW1fY2xhc3M9InNwYW40IiB0aHVtYm5haWxfd2lkdGg9IjM1NiIgdGh1bWJuYWlsX2hlaWdodD0iNTAwIiBzaG93X3Byb2R1Y3RfbmFtZT0idHJ1ZSIgc2hvd190aHVtYm5haWw9InRydWUiIHNob3dfZGVzY3JpcHRpb249InRydWUiIHNob3dfcHJpY2U9InRydWUiIHNob3dfcmV2aWV3cz0idHJ1ZSIgc2hvd19hZGR0b2NhcnQ9InRydWUiIHNob3dfYWRkdG89InRydWUiIHNob3dfbGFiZWw9InRydWUiIGNob29zZV90ZW1wbGF0ZT0iY3VzdG9tX3RlbXBsYXRlIiBjdXN0b21fdGhlbWU9ImVtX25ld19wcm9kdWN0cy9uZXdfZ3JpZF9tZW51LnBodG1sIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:16;a:8:{s:4:"type";s:4:"link";s:5:"label";s:3:"Man";s:8:"sublabel";s:0:"";s:3:"url";s:35:"{{store direct_url='apparel.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:3:"man";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:17;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:18;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"span10";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:19;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:20;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:21;a:5:{s:4:"type";s:4:"text";s:4:"text";s:320:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:22;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span5";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:23;a:5:{s:4:"type";s:4:"text";s:4:"text";s:648:"PGRpdiBjbGFzcz0ibm9fcXVpY2tzaG9wIj57e3dpZGdldCB0eXBlPSJiZXN0c2VsbGVycHJvZHVjdHMvbGlzdCIgbmV3X2NhdGVnb3J5PSIzIiBvcmRlcl9ieT0ibmFtZSBhc2MiIGxpbWl0X2NvdW50PSIxIiBmcm9udGVuZF90aXRsZT0iQmVzdCBzZWxsZXIiIGl0ZW1fY2xhc3M9InNwYW40IiB0aHVtYm5haWxfd2lkdGg9IjM1NiIgdGh1bWJuYWlsX2hlaWdodD0iNTAwIiBzaG93X3Byb2R1Y3RfbmFtZT0idHJ1ZSIgc2hvd190aHVtYm5haWw9InRydWUiIHNob3dfZGVzY3JpcHRpb249InRydWUiIHNob3dfcHJpY2U9InRydWUiIHNob3dfcmV2aWV3cz0idHJ1ZSIgc2hvd19hZGR0b2NhcnQ9InRydWUiIHNob3dfYWRkdG89InRydWUiIHNob3dfbGFiZWw9InRydWUiIGNob29zZV90ZW1wbGF0ZT0iY3VzdG9tX3RlbXBsYXRlIiBjdXN0b21fdGhlbWU9ImVtX2Jlc3RzZWxsZXJfcHJvZHVjdHMvYmVzdHNlbGxlcl9ncmlkX21lbnUucGh0bWwifX08L2Rpdj4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:24;a:8:{s:4:"type";s:4:"link";s:5:"label";s:4:"Kids";s:8:"sublabel";s:0:"";s:3:"url";s:64:"{{store direct_url='electronics/computers/build-your-own.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:4:"kids";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:25;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:26;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:27;a:5:{s:4:"type";s:4:"text";s:4:"text";s:320:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:28;a:8:{s:4:"type";s:4:"link";s:5:"label";s:4:"APPS";s:8:"sublabel";s:0:"";s:3:"url";s:49:"{{store direct_url='furniture/living-room.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:3:"app";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:29;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:30;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span8";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:31;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:32;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:33;a:5:{s:4:"type";s:4:"text";s:4:"text";s:636:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlN1c3BlbmRpc3NlIHJpc3VzPC9oND4KPHVsPgo8bGk+PGEgaHJlZj0ie3tzdG9yZSBkaXJlY3RfdXJsPSdlbGVjdHJvbmljcy5odG1sJ319Ij5FdGlhbSBzZWRkdWl0IDwvYT48L2xpPgo8bGk+PGEgaHJlZj0ie3tzdG9yZSBkaXJlY3RfdXJsPSdlbGVjdHJvbmljcy5odG1sJ319Ij5Mb3JlbSBpc3B1bXM8L2E+PC9saT4KPGxpPjxhIGhyZWY9Int7c3RvcmUgZGlyZWN0X3VybD0nYXBwYXJlbC5odG1sJ319Ij5OdWxsYSBlbmltIGVsaXQgbG9yZW08L2E+PC9saT4KPGxpPjxhIGhyZWY9Int7c3RvcmUgZGlyZWN0X3VybD0nYXBwYXJlbC9zaGlydHMuaHRtbCd9fSI+U3VzcGVuZGlzc2UgbnVsbGE8L2E+PC9saT4KPC91bD4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:34;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:35;a:5:{s:4:"type";s:4:"text";s:4:"text";s:636:"PGg0PlZlc3RpYnVsdW0gbG9yZTwvaDQ+Cnt7d2lkZ2V0IHR5cGU9Im1lZ2FtZW51cHJvL2NhdGFsb2duYXZpZ2F0aW9uIiBjYXRlZ29yeV9pZD0iY2F0ZWdvcnkvMTUiIGRpcmVjdGlvbj0idmVydGljYWwifX0KPGg0PlN1c3BlbmRpc3NlIHJpc3VzPC9oND4KPHVsPgo8bGk+PGEgaHJlZj0ie3tzdG9yZSBkaXJlY3RfdXJsPSdlbGVjdHJvbmljcy5odG1sJ319Ij5FdGlhbSBzZWRkdWl0IDwvYT48L2xpPgo8bGk+PGEgaHJlZj0ie3tzdG9yZSBkaXJlY3RfdXJsPSdlbGVjdHJvbmljcy5odG1sJ319Ij5Mb3JlbSBpc3B1bXM8L2E+PC9saT4KPGxpPjxhIGhyZWY9Int7c3RvcmUgZGlyZWN0X3VybD0nYXBwYXJlbC5odG1sJ319Ij5OdWxsYSBlbmltIGVsaXQgbG9yZW08L2E+PC9saT4KPGxpPjxhIGhyZWY9Int7c3RvcmUgZGlyZWN0X3VybD0nYXBwYXJlbC9zaGlydHMuaHRtbCd9fSI+U3VzcGVuZGlzc2UgbnVsbGE8L2E+PC9saT4KPC91bD4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:36;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:37;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span8";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:38;a:5:{s:4:"type";s:4:"text";s:4:"text";s:208:"PGEgaHJlZj0iIyIgdGl0bGU9IiIgc3R5bGUgPSAibWFyZ2luLWJvdHRvbTo1cHg7IGRpc3BsYXk6YmxvY2siPjxpbWcgY2xhc3M9ImZsdWlkICIgc3JjPSJ7e3NraW4gdXJsPSJpbWFnZXMvbWVkaWEvbWVnYW1lbnUvaW1nX21lbnUxLmpwZyJ9fSIgYWx0PSIiIC8+PC9hPg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:39;a:8:{s:4:"type";s:4:"link";s:5:"label";s:8:"Campaign";s:8:"sublabel";s:0:"";s:3:"url";s:37:"{{store direct_url='furniture.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:6:"campai";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:40;a:5:{s:4:"type";s:4:"text";s:4:"text";s:124:"e3t3aWRnZXQgdHlwZT0ibWVnYW1lbnVwcm8vY2F0YWxvZ25hdmlnYXRpb24iIGNhdGVnb3J5X2lkPSJjYXRlZ29yeS8zIiBkaXJlY3Rpb249InZlcnRpY2FsIn19";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:41;a:8:{s:4:"type";s:4:"link";s:5:"label";s:10:"Top brands";s:8:"sublabel";s:0:"";s:3:"url";s:39:"{{store direct_url='electronics.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:6:"brands";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:42;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:43;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span8";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:44;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:3:"row";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:45;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:46;a:5:{s:4:"type";s:4:"text";s:4:"text";s:648:"PGEgaHJlZj0iIyIgdGl0bGU9IiI+PGltZyBzcmM9Int7c2tpbiB1cmw9ImltYWdlcy9tZWRpYS9tZWdhbWVudS9pbWdfbWVudTIucG5nIn19IiBhbHQ9IiIgLz48L2E+CjxhIGhyZWY9IiMiIHRpdGxlPSIiPjxpbWcgc3JjPSJ7e3NraW4gdXJsPSJpbWFnZXMvbWVkaWEvbWVnYW1lbnUvaW1nX21lbnUzLnBuZyJ9fSIgYWx0PSIiIC8+PC9hPgo8YSBocmVmPSIjIiB0aXRsZT0iIj48aW1nIHNyYz0ie3tza2luIHVybD0iaW1hZ2VzL21lZGlhL21lZ2FtZW51L2ltZ19tZW51NC5wbmcifX0iIGFsdD0iIiAvPjwvYT4KPGEgaHJlZj0iIyIgdGl0bGU9IiI+PGltZyBzcmM9Int7c2tpbiB1cmw9ImltYWdlcy9tZWRpYS9tZWdhbWVudS9pbWdfbWVudTUucG5nIn19IiBhbHQ9IiIgLz48L2E+CjxhIGhyZWY9IiMiIHRpdGxlPSIiPjxpbWcgc3JjPSJ7e3NraW4gdXJsPSJpbWFnZXMvbWVkaWEvbWVnYW1lbnUvaW1nX21lbnU2LnBuZyJ9fSIgYWx0PSIiIC8+PC9hPg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:47;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:5:"span4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:48;a:5:{s:4:"type";s:4:"text";s:4:"text";s:648:"PGEgaHJlZj0iIyIgdGl0bGU9IiI+PGltZyBzcmM9Int7c2tpbiB1cmw9ImltYWdlcy9tZWRpYS9tZWdhbWVudS9pbWdfbWVudTIucG5nIn19IiBhbHQ9IiIgLz48L2E+CjxhIGhyZWY9IiMiIHRpdGxlPSIiPjxpbWcgc3JjPSJ7e3NraW4gdXJsPSJpbWFnZXMvbWVkaWEvbWVnYW1lbnUvaW1nX21lbnUzLnBuZyJ9fSIgYWx0PSIiIC8+PC9hPgo8YSBocmVmPSIjIiB0aXRsZT0iIj48aW1nIHNyYz0ie3tza2luIHVybD0iaW1hZ2VzL21lZGlhL21lZ2FtZW51L2ltZ19tZW51NC5wbmcifX0iIGFsdD0iIiAvPjwvYT4KPGEgaHJlZj0iIyIgdGl0bGU9IiI+PGltZyBzcmM9Int7c2tpbiB1cmw9ImltYWdlcy9tZWRpYS9tZWdhbWVudS9pbWdfbWVudTUucG5nIn19IiBhbHQ9IiIgLz48L2E+CjxhIGhyZWY9IiMiIHRpdGxlPSIiPjxpbWcgc3JjPSJ7e3NraW4gdXJsPSJpbWFnZXMvbWVkaWEvbWVnYW1lbnUvaW1nX21lbnUxMC5wbmcifX0iIGFsdD0iIiAvPjwvYT4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:49;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:10:"span8 link";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:50;a:5:{s:4:"type";s:4:"text";s:4:"text";s:76:"PGEgY2xhc3M9InRleHQiIGhyZWY9IiMiPjxzcGFuPlNob3AgQnkgQnJhbmRzPC9zcGFuPjwvYT4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"5";}i:51;a:8:{s:4:"type";s:4:"link";s:5:"label";s:22:"+ Shop by all category";s:8:"sublabel";s:0:"";s:3:"url";s:35:"{{store direct_url='apparel.html'}}";s:6:"target";s:0:"";s:9:"css_class";s:4:"last";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}}
EOB
	,
	'status' => "1",
	'css_class' => ''
))->setCreatedTime(now())->setUpdateTime(now())->save();
$menu_id = $model->getId();

# Mega Menu widget instance
$widget = array(
	'title' => 'Mega Menu',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> serialize(array(
		'menu' => $menu_id
	)),	
	'page_groups' => array(
		array(
			'page_group' => 'all_pages',
			'all_pages' => array(
				'page_id' => 0,
				'layout_handle' => 'default',
				'for' => 'all',
				'block' => 'top.menu'
			)
		)
	),
);
$widgetInstance->setData($widget)->setType('megamenupro/megamenupro')->setPackageTheme($package_theme)->save();

####################################################################################################
# ADD SLIDESHOW
####################################################################################################

/**
 * Create table 'slideshow2/slider'
 */
if(!$installer->tableExists($installer->getTable('slideshow2/slider'))){
$table = $installer->getConnection()
    ->newTable($installer->getTable('slideshow2/slider'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Slideshow ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        ), 'Slideshow name')
	->addColumn('images', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'images')
	->addColumn('slider_type', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array(
        ), 'Slideshow type')
	->addColumn('slider_params', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Slideshow params')
	->addColumn('delay', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
        ), 'Slideshow delay')
	->addColumn('touch', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow touch')
	->addColumn('stop_hover', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop hover')
	->addColumn('shuffle_mode', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow shuffle mode')
	->addColumn('stop_slider', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop slider')
	->addColumn('stop_after_loop', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop after loop')
	->addColumn('stop_at_slide', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop at slide')
	->addColumn('position', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'position')
	->addColumn('appearance', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'appearance')
	->addColumn('navigation', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'navigation')
	->addColumn('thumbnail', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'thumbnail')
	->addColumn('visibility', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'visibility')
	->addColumn('trouble', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'trouble')
    ->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Slideshow Creation Time')
    ->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Slideshow Modification Time')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Is Slideshow Active')
    ->setComment('EM Slideshow2 Slider Table');
$installer->getConnection()->createTable($table);
}

# create slideshow of theme EM0067
$model = Mage::getModel('em0072settings/slider');
$model->setData(array(
	'name' => "EM0072-MainSlideshow",
	'images' => <<<EOB
YTozOntpOjA7YTo2OntzOjM6InVybCI7czoyMToiMTM2NDI2ODIxN19zbGlkZTEuanBnIjtzOjU6InRyYW5zIjtzOjQ6ImRlbW8iO3M6MTA6InNsb3RhbW91bnQiO3M6MToiNyI7czo0OiJsaW5rIjtzOjA6IiI7czo4OiJwb3NpdGlvbiI7czoxOiIwIjtzOjQ6ImluZm8iO2E6MTp7aTowO2E6OTp7czo0OiJ0ZXh0IjtzOjExMzoiPGgxPnNwcmluZyBjb2xsZWN0aW9uPC9oMT4gPHA+Q2xhcml0YXMgZXN0ZXJpYW0g4oGEIHByb2Nlc3N1cyBkeW5hbWljdXMsIHF1aSBzZXF1aXR1ciBtdXRhdGlvbmVtIGNvbnN1ZXR1ZGl1bTwvcD4iO3M6NToiY2xhc3MiO3M6MDoiIjtzOjU6InN0YXJ0IjtzOjQ6IjIwMDAiO3M6MzoiZW5kIjtzOjA6IiI7czo2OiJkYXRhX3giO3M6MzoiMTIwIjtzOjY6ImRhdGFfeSI7czozOiIyMjAiO3M6OToiYW5pbWF0aW9uIjtzOjQ6ImZhZGUiO3M6NjoiZWFzaW5nIjtzOjExOiJlYXNlT3V0QmFjayI7czo1OiJzcGVlZCI7czozOiIzMDAiO319fWk6MTthOjY6e3M6MzoidXJsIjtzOjIxOiIxMzY0MjY4MjE3X3NsaWRlMi5qcGciO3M6NToidHJhbnMiO3M6NDoiZGVtbyI7czoxMDoic2xvdGFtb3VudCI7czoxOiI3IjtzOjQ6ImxpbmsiO3M6MDoiIjtzOjg6InBvc2l0aW9uIjtzOjE6IjAiO3M6NDoiaW5mbyI7YToxOntpOjA7YTo5OntzOjQ6InRleHQiO3M6MTEzOiI8aDE+c3ByaW5nIGNvbGxlY3Rpb248L2gxPiA8cD5DbGFyaXRhcyBlc3RlcmlhbSDigYQgcHJvY2Vzc3VzIGR5bmFtaWN1cywgcXVpIHNlcXVpdHVyIG11dGF0aW9uZW0gY29uc3VldHVkaXVtPC9wPiI7czo1OiJjbGFzcyI7czowOiIiO3M6NToic3RhcnQiO3M6NDoiMjAwMCI7czozOiJlbmQiO3M6MDoiIjtzOjY6ImRhdGFfeCI7czozOiIxMjAiO3M6NjoiZGF0YV95IjtzOjM6IjIyMCI7czo5OiJhbmltYXRpb24iO3M6NDoiZmFkZSI7czo2OiJlYXNpbmciO3M6MTE6ImVhc2VPdXRCYWNrIjtzOjU6InNwZWVkIjtzOjM6IjMwMCI7fX19aToyO2E6Njp7czozOiJ1cmwiO3M6MjE6IjEzNjQyNjgyMTdfc2xpZGUzLmpwZyI7czo1OiJ0cmFucyI7czo0OiJkZW1vIjtzOjEwOiJzbG90YW1vdW50IjtzOjE6IjciO3M6NDoibGluayI7czowOiIiO3M6ODoicG9zaXRpb24iO3M6MToiMCI7czo0OiJpbmZvIjthOjE6e2k6MDthOjk6e3M6NDoidGV4dCI7czoxMTM6IjxoMT5zcHJpbmcgY29sbGVjdGlvbjwvaDE+IDxwPkNsYXJpdGFzIGVzdGVyaWFtIOKBhCBwcm9jZXNzdXMgZHluYW1pY3VzLCBxdWkgc2VxdWl0dXIgbXV0YXRpb25lbSBjb25zdWV0dWRpdW08L3A+IjtzOjU6ImNsYXNzIjtzOjA6IiI7czo1OiJzdGFydCI7czo0OiIyMDAwIjtzOjM6ImVuZCI7czowOiIiO3M6NjoiZGF0YV94IjtzOjM6IjEyMCI7czo2OiJkYXRhX3kiO3M6MzoiMjIwIjtzOjk6ImFuaW1hdGlvbiI7czo0OiJmYWRlIjtzOjY6ImVhc2luZyI7czoxMToiZWFzZU91dEJhY2siO3M6NToic3BlZWQiO3M6MzoiMzAwIjt9fX19
EOB
	,
	'slider_type' => 'fullwidth',
	'slider_params' => <<<EOB
a:14:{s:10:"size_width";s:3:"885";s:11:"size_height";s:3:"350";s:14:"screen_width_1";s:4:"1200";s:14:"slider_width_1";s:3:"710";s:14:"screen_width_2";s:3:"980";s:14:"slider_width_2";s:3:"548";s:14:"screen_width_3";s:3:"768";s:14:"slider_width_3";s:3:"518";s:14:"screen_width_4";s:3:"516";s:14:"slider_width_4";s:3:"440";s:14:"screen_width_5";s:3:"321";s:14:"slider_width_5";s:3:"280";s:14:"screen_width_6";s:0:"";s:14:"slider_width_6";s:0:"";}
EOB
	,
	'delay' =>'10000',
	'touch' =>'on',
	'stop_hover' =>'on',
	'shuffle_mode' =>'off',
	'stop_slider' =>'off',
	'stop_after_loop' =>'0',
	'stop_at_slide' =>'2',
	'position' => <<<EOB
a:5:{s:4:"type";s:6:"center";s:6:"mg_top";s:1:"5";s:9:"mg_bottom";s:2:"10";s:7:"mg_left";s:1:"0";s:8:"mg_right";s:1:"0";}
EOB
	,
	'appearance' => <<<EOB
a:7:{s:11:"shadow_type";s:1:"0";s:9:"show_time";s:4:"true";s:13:"time_position";s:3:"top";s:8:"bg_color";s:0:"";s:7:"padding";s:1:"0";s:11:"show_bg_img";s:5:"false";s:6:"bg_img";s:0:"";}
EOB
	,
	'navigation' => <<<EOB
a:7:{s:8:"nav_type";s:4:"none";s:10:"nav_arrows";s:13:"nexttobullets";s:9:"nav_style";s:5:"round";s:14:"nav_offset_hor";s:1:"0";s:15:"nav_offset_vert";s:2:"20";s:13:"nav_always_on";s:5:"false";s:11:"hide_thumbs";s:3:"200";}
EOB
	,
	'thumbnail' => <<<EOB
a:3:{s:11:"thumb_width";s:3:"100";s:12:"thumb_height";s:2:"50";s:12:"thumb_amount";s:1:"5";}
EOB
	,
	'visibility' => <<<EOB
a:3:{s:17:"hide_slider_under";s:1:"0";s:25:"hide_defined_layers_under";s:1:"0";s:21:"hide_all_layers_under";s:1:"0";}
EOB
	,
	'trouble' => <<<EOB
a:2:{s:17:"jquery_noconflict";s:2:"on";s:10:"js_to_body";s:5:"false";}
EOB
	,
	'status' => "1"
))->setCreatedTime(now())->setUpdateTime(now())->save();
$slideshow_id = $model->getId();

# Slider widget instance
$widget = array(
	'title' => 'EM0072 - Area 3 - Slideshow2',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> serialize(array(
		'slideshow' => $slideshow_id
	)),
	'page_groups' => array(
		array(
			'page_group' => 'pages',
			'pages' => array(
				'page_id' => 22,
				'layout_handle' => 'cms_index_index',
				'for' => 'all',
				'block' => 'em_area3'
			)
		)
	),
);
$widgetInstance->setData($widget)->setType('slideshow2/slideshow2')->setPackageTheme($package_theme)->save();

$installer->endSetup(); 
