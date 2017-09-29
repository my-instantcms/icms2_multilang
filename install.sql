CREATE TABLE IF NOT EXISTS `{#}multilang_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_ctypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `labels` text,
  `seo_keys` text,
  `seo_desc` text,
  `seo_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_datasets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(40) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `seo_keys` text,
  `seo_desc` text,
  `seo_title` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(40) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `hint` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(60) NOT NULL,
  `links` text,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DELETE FROM `{#}widgets` WHERE `controller` = 'multilang';
INSERT INTO `{#}widgets` (`controller`, `name`, `title`, `author`, `url`, `version`) VALUES
('multilang', 'switch', 'Переключатель языка', 'My-InstantCMS.Ru', 'http://my-instantcms.ru/', '1.0.0');