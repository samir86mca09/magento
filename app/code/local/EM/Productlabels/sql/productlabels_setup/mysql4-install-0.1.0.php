<?php

$installer = $this;

$installer->startSetup();

$installer->run("
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS {$this->getTable('productlabels/css')};
DROP TABLE IF EXISTS {$this->getTable('productlabels/type_varchar')};
DROP TABLE IF EXISTS {$this->getTable('productlabels/type_text')};
DROP TABLE IF EXISTS {$this->getTable('productlabels/type_int')};
DROP TABLE IF EXISTS {$this->getTable('productlabels/attribute')};
DROP TABLE IF EXISTS {$this->getTable('productlabels/productlabels')};

CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/productlabels')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `actions` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;


CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/attribute')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_attribute` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `scope_global` smallint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `require` tinyint(1) NOT NULL DEFAULT '0',
  `class` varchar(255) NOT NULL,
  `type_backend` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/css')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `store` smallint(5) NOT NULL,
  `scope_global` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `store_id` (`store`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/type_varchar')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  `value` varchar(555) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `store_id` (`store_id`),
  KEY `label_id` (`label_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;


CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/type_text')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `store_id` (`store_id`),
  KEY `label_id` (`label_id`,`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;


CREATE TABLE IF NOT EXISTS {$this->getTable('productlabels/type_int')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `store_id` (`store_id`),
  KEY `label_id` (`label_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;




ALTER TABLE {$this->getTable('productlabels/type_varchar')}
  ADD CONSTRAINT {$this->getTable('productlabels/type_varchar')} FOREIGN KEY (`store_id`) REFERENCES {$this->getTable('core_store')} (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `{$this->getTable('productlabels/type_varchar')}_ibfk_1` FOREIGN KEY (`label_id`) REFERENCES {$this->getTable('productlabels/productlabels')} (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE {$this->getTable('productlabels/type_text')}
  ADD CONSTRAINT {$this->getTable('productlabels/type_text')} FOREIGN KEY (`store_id`) REFERENCES {$this->getTable('core_store')} (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `{$this->getTable('productlabels/type_text')}_ibfk_1` FOREIGN KEY (`label_id`) REFERENCES {$this->getTable('productlabels/productlabels')} (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE {$this->getTable('productlabels/type_int')}
  ADD CONSTRAINT {$this->getTable('productlabels/type_int')} FOREIGN KEY (`store_id`) REFERENCES {$this->getTable('core_store')} (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `{$this->getTable('productlabels/type_int')}_ibfk_1` FOREIGN KEY (`label_id`) REFERENCES {$this->getTable('productlabels/productlabels')} (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO {$this->getTable('productlabels/productlabels')} (`id`, `name`, `actions`) VALUES
(1, 'Sale off', 'a:7:{s:4:\"type\";s:40:\"salesrule/rule_condition_product_combine\";s:9:\"attribute\";N;s:8:\"operator\";N;s:5:\"value\";s:1:\"1\";s:18:\"is_value_processed\";N;s:10:\"aggregator\";s:3:\"all\";s:10:\"conditions\";a:1:{i:0;a:5:{s:4:\"type\";s:32:\"salesrule/rule_condition_product\";s:9:\"attribute\";s:13:\"special_price\";s:8:\"operator\";s:1:\">\";s:5:\"value\";d:0;s:18:\"is_value_processed\";b:0;}}}'),
(2, 'Hot deal', 'a:7:{s:4:\"type\";s:40:\"salesrule/rule_condition_product_combine\";s:9:\"attribute\";N;s:8:\"operator\";N;s:5:\"value\";s:1:\"1\";s:18:\"is_value_processed\";N;s:10:\"aggregator\";s:3:\"all\";s:10:\"conditions\";a:1:{i:0;a:5:{s:4:\"type\";s:32:\"salesrule/rule_condition_product\";s:9:\"attribute\";s:5:\"price\";s:8:\"operator\";s:2:\">=\";s:5:\"value\";d:50;s:18:\"is_value_processed\";b:0;}}}');
  
INSERT INTO {$this->getTable('productlabels/attribute')} (`id`, `name_attribute`, `type`, `scope_global`, `title`, `require`, `class`, `type_backend`) VALUES
(1, 'name', '', 1, 'Label Name', 1, 'required-entry', 'text'),
(2, 'image', 'varchar', 0, 'Image', 0, '', 'file'),
(3, 'background', 'varchar', 0, 'Background', 0, '', 'file'),
(4, 'texthtml', 'text', 0, 'Text', 0, '', 'editor'),
(5, 'css_class', 'varchar', 0, 'Css Class', 0, '', 'text'),
(6, 'enable', 'int', 2, 'Enable', 0, '', 'checkbox');

INSERT INTO {$this->getTable('productlabels/type_varchar')} (`id`, `label_id`, `attribute_id`, `store_id`, `value`) VALUES
(NULL, 1, 2, 0, 'store_0_saleof.png'),
(NULL, 2, 2, 0, 'store_0_hotdeal.png');

INSERT INTO {$this->getTable('productlabels/type_int')} (`id`, `label_id`, `attribute_id`, `store_id`, `value`) VALUES
(NULL, 1, 6, 0, 1),
(NULL, 2, 6, 0, 1);

");



$installer->endSetup(); 