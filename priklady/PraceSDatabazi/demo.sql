CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `demo` (`id`, `name`, `date`) VALUES
(1, 'Item', '2019-10-05 17:49:26'),
(2, 'Item', '2019-10-05 17:49:35');
