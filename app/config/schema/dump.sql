[H[2J
Welcome to CakePHP v1.3.2 Console
---------------------------------------------------------------
App : app
Path: /home/steven/work/apache/todo/app
---------------------------------------------------------------
Cake Schema Shell
---------------------------------------------------------------
#App sql generated on: 2010-07-25 15:06:32 : 1280066792

DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `todos`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `tasks` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`todo_id` int(11) NOT NULL,
	`description` text DEFAULT NULL,
	`important` tinyint(1) DEFAULT NULL,
	`urgent` tinyint(1) DEFAULT NULL,
	`created` datetime DEFAULT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `todos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`created` datetime DEFAULT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) DEFAULT NULL,
	`openid` varchar(255) DEFAULT NULL,
	`password` varchar(255) DEFAULT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;


