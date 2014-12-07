CREATE TABLE `posts` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(1000) NOT NULL DEFAULT '',
  `content` text,
  `digg_count` int(11) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;