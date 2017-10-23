DROP TABLE IF EXISTS `#__nok_extensions`;

CREATE TABLE `#__nok_extensions` (
	`id` integer NOT NULL auto_increment,
	`asset_id` INT(255) UNSIGNED NOT NULL DEFAULT '0',
	`name` varchar(50) NOT NULL default '',
	`contains_components` int(1) default 0,
	`contains_modules` int(1) default 0,
	`contains_plugins` int(1) default 0,
	`contains_templates` int(1) default 0,
	`update_url` text NULL default NULL,
	`owner` varchar(50) NULL default '',
	`createdby` varchar(50) NULL default '',
	`createddate` datetime NULL default '0000-00-00 00:00:00',
	`modifiedby` varchar(50) NOT NULL default '',
	`modifieddate` datetime NOT NULL default '0000-00-00 00:00:00',
	PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;
