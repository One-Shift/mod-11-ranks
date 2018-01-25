INSERT INTO `{c2r-prefix}_modules` (`name`, `folder`, `code`, `sort`) VALUES ("{c2r-mod-name}", "{c2r-mod-folder}", "{c2r-mod-code}", 0);

CREATE TABLE `{c2r-prefix}_ranks` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`code` text NOT NULL,
	`sort` int(11) NOT NULL,
	`date` datetime NOT NULL,
	`date_update` datetime NOT NULL,
	`status` tinyint(1) NOT NULL,
	`user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
