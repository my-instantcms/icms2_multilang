CREATE TABLE IF NOT EXISTS `{#}multilang_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `{#}multilang_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `title` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Объекты для перевода' AUTO_INCREMENT=1;

DELETE FROM `{#}widgets` WHERE `controller` = 'multilang';
INSERT INTO `{#}widgets` (`controller`, `name`, `title`, `author`, `url`, `version`) VALUES
('multilang', 'switch', 'Переключатель языка', 'My-InstantCMS.Ru', 'http://my-instantcms.ru/', '1.0.0');


