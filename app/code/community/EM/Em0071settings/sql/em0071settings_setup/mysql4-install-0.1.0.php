<?php

$installer = $this;

$installer->startSetup();

####################################################################################################
# ADD THEMEFRAMEWORK LAYOUT
####################################################################################################

$model = Mage::getModel('themeframework/area');
	
$data = array(
	'package_theme'  => 'default/em0071',
	'layout'         => '1column',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:5:{i:0;a:7:{s:10:"custom_css";s:11:"area-header";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:7:{s:10:"custom_css";s:13:"area-top-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:12:"em-area-main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:8:"em_area1";i:1;s:8:"em_area2";i:2;s:8:"em_area3";i:3;s:8:"em_area4";}}i:1;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}}}i:2;a:7:{s:10:"custom_css";s:9:"area-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:11:"em-col-main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:6:{i:0;s:11:"breadcrumbs";i:1;s:15:"global_messages";i:2;s:8:"em_area8";i:3;s:7:"content";i:4;s:8:"em_area9";i:5;s:8:"em_area6";}}}}i:3;a:7:{s:10:"custom_css";s:11:"area-footer";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area7";}}i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}}}i:4;a:7:{s:10:"custom_css";s:15:"area-footer-end";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0071',
	'layout'         => '3columns',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:5:{i:0;a:7:{s:10:"custom_css";s:11:"area-header";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:7:{s:10:"custom_css";s:13:"area-top-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:12:"em-area-main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:8:"em_area1";i:1;s:8:"em_area2";i:2;s:8:"em_area3";i:3;s:8:"em_area4";}}i:1;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}}}i:2;a:7:{s:10:"custom_css";s:9:"area-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:3:{i:0;a:11:{s:6:"column";s:2:"13";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:18:"em-col-main pull_5";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:6:{i:0;s:11:"breadcrumbs";i:1;s:15:"global_messages";i:2;s:8:"em_area8";i:3;s:7:"content";i:4;s:8:"em_area9";i:5;s:8:"em_area6";}}i:1;a:11:{s:6:"column";s:1:"5";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:19:"em-col-left pull_13";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:4:"left";}}i:2;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:12:"em-col-right";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"right";}}}}i:3;a:7:{s:10:"custom_css";s:11:"area-footer";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area7";}}i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}}}i:4;a:7:{s:10:"custom_css";s:15:"area-footer-end";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0071',
	'layout'         => '2columns-left',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:5:{i:0;a:7:{s:10:"custom_css";s:11:"area-header";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:7:{s:10:"custom_css";s:13:"area-top-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:12:"em-area-main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:8:"em_area1";i:1;s:8:"em_area2";i:2;s:8:"em_area3";i:3;s:8:"em_area4";}}i:1;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}}}i:2;a:7:{s:10:"custom_css";s:9:"area-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"19";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:18:"em-col-main pull_5";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:6:{i:0;s:11:"breadcrumbs";i:1;s:15:"global_messages";i:2;s:8:"em_area8";i:3;s:7:"content";i:4;s:8:"em_area9";i:5;s:8:"em_area6";}}i:1;a:11:{s:6:"column";s:1:"5";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:19:"em-col-left pull_19";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:4:"left";}}}}i:3;a:7:{s:10:"custom_css";s:11:"area-footer";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area7";}}i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}}}i:4;a:7:{s:10:"custom_css";s:15:"area-footer-end";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/em0071',
	'layout'         => '2columns-right',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:5:{i:0;a:7:{s:10:"custom_css";s:11:"area-header";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:7:{s:10:"custom_css";s:13:"area-top-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:24:"em-col-main em-area-main";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:9:{i:0;s:8:"em_area1";i:1;s:8:"em_area2";i:2;s:8:"em_area3";i:3;s:15:"global_messages";i:4;s:11:"breadcrumbs";i:5;s:8:"em_area8";i:6;s:7:"content";i:7;s:8:"em_area9";i:8;s:8:"em_area4";}}i:1;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:12:"em-col-right";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:8:"em_area5";i:1;s:5:"right";}}}}i:2;a:7:{s:10:"custom_css";s:9:"area-main";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:1:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area6";}}}}i:3;a:7:{s:10:"custom_css";s:11:"area-footer";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area7";}}i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}}}i:4;a:7:{s:10:"custom_css";s:15:"area-footer-end";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:5:"fluid";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();


####################################################################################################
# ADD MEGAMENU PRO
####################################################################################################

$installer->run("

CREATE TABLE IF NOT EXISTS {$this->getTable('megamenupro')} (
  `megamenupro_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `type` smallint(6) NOT NULL default '0',
  `content` text NOT NULL default '', 
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`megamenupro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

####################################################################################################
# ADD EM Slideshow2
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

$helper = Mage::helper('em0071settings');
$helperSample = Mage::helper('em0071settings/sample');
$helperSample->importSampleData();
$installer->endSetup(); 
unlink($pathFile);