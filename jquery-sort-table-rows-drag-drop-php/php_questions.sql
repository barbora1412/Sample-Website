CREATE TABLE IF NOT EXISTS `php_questions` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `display_order` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `php_questions` (`id`, `question`, `answer`, `display_order`) VALUES
(1, 'What is PHP?', 'PHP (Hypertext Preprocessor) is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.', '4'),
(2, ' What is the purpose of php.ini file?', ' It is a PHP configuration file that controls and effect PHP’s functionality. The php.ini file is read each time when PHP is initialized. You can check settings of php.ini by calling phpinfo() function in PHP script.', '1'),
(3, 'What are the differences between PHP constants and variables?', '', '5'),
(4, 'How will you find the length of a string in PHP?', '', '2'),
(5, 'What is the difference between single quoted string and double quoted string?', '', '0'),
(6, 'How do you create a cookie, add data to it, and remove data from a cookie?', '', '3');


