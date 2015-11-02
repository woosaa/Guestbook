CREATE DATABASE `guestbook`; 

USE `guestbook`;

CREATE TABLE `entry` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL,
 `content` text NOT NULL,
 `createdAt` datetime NOT NULL,
 `author` varchar(255) NOT NULL,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;