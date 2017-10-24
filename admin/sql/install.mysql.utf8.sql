DROP TABLE IF EXISTS `#__nok_extension_medias`;
DROP TABLE IF EXISTS `#__nok_extensions`;

CREATE TABLE `#__nok_extensions` (
	`id` integer NOT NULL auto_increment,
	`asset_id` INT(255) UNSIGNED NOT NULL DEFAULT '0',
	`name` varchar(50) NOT NULL default '',
	`alias` varchar(50) NOT NULL default '',
	`description` text NULL default NULL,
	`catid` int(11) NOT NULL DEFAULT '0',
	`contains_components` int(1) default 0,
	`contains_modules` int(1) default 0,
	`contains_plugins` int(1) default 0,
	`contains_templates` int(1) default 0,
	`main_url` text NULL default NULL,
	`doc_url` text NULL default NULL,
	`download_url` text NULL default NULL,
	`download_type` varchar(50) NULL default NULL,
	`demo_url` text NULL default NULL,
	`licence_url` text NULL default NULL,
	`licence_type` text NULL default NULL,
	`support_url` text NULL default NULL,
	`update_url` text NULL default NULL,
	`owner` varchar(50) NULL default '',
	`state` varchar(50) NULL default '',
	`version` varchar(10) NULL default '',
	`createdby` varchar(50) NULL default '',
	`createddate` datetime NULL default '0000-00-00 00:00:00',
	`modifiedby` varchar(50) NOT NULL default '',
	`modifieddate` datetime NOT NULL default '0000-00-00 00:00:00',
	PRIMARY KEY  (`id`),
	CONSTRAINT UC_extension_alias UNIQUE (`alias`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__nok_extension_medias` (
	`id` integer NOT NULL auto_increment,
	`extension_id`  integer NOT NULL DEFAULT 0,
	`filename` varchar(255) NOT NULL default '',
	`filetype` varchar(50) NOT NULL default '',
	`category` varchar(50) NOT NULL default '',
	`createdby` varchar(50) NULL default '',
	`createddate` datetime NULL default '0000-00-00 00:00:00',
	`modifiedby` varchar(50) NOT NULL default '',
	`modifieddate` datetime NOT NULL default '0000-00-00 00:00:00',
	PRIMARY KEY  (`id`),
	CONSTRAINT UC_extension_alias UNIQUE (`extension_id`, `filename`)
) DEFAULT CHARSET=utf8;

