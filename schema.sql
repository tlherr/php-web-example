
CREATE DATABASE IF NOT EXISTS php_web_example;

USE php_web_example;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`username`, `email`, `password`,`active`) 
VALUES('user', 'user@domain.com',  SHA('password'), 1);

INSERT INTO `users` (`username`, `email`, `password`,`active`)
VALUES('user1', 'user1@domain.com',  SHA('password1'), 1);