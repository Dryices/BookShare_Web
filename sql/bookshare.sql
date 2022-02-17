-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2022 at 02:13 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagepath` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `imagepath`) VALUES
(1, 'announcements/announcement1.jpg'),
(2, 'announcements/announcement2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `content` varchar(50000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mainid` mediumint(8) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `username`, `content`, `timestamp`, `mainid`) VALUES
(20, NULL, 'Marcus Tan', ' awsdfgh\r\n', '2022-02-17 10:05:33', 18),
(19, NULL, 'John Doe', ' ghvjbkn\r\n', '2022-02-17 10:03:06', 18),
(18, 'serxfcgvhjn', 'John Doe', 'xfcghvjbn', '2022-02-17 10:02:59', NULL),
(17, NULL, 'John Doe', ' rdfghj', '2022-02-17 10:02:46', 15),
(16, NULL, 'John Doe', ' drrcgvhjbkkm\r\n', '2022-02-17 10:02:18', 15),
(15, 'sredtfghj', 'John Doe', 'rcgvhbjn', '2022-02-17 10:02:12', NULL),
(14, 'ahhhhhhhhhhh', 'John Doe', 'heeeeeeeeeeeeeeelp', '2022-02-17 10:02:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_list`
--

DROP TABLE IF EXISTS `items_list`;
CREATE TABLE IF NOT EXISTS `items_list` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `username` varchar(20) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_list`
--

INSERT INTO `items_list` (`id`, `item_name`, `description`, `price`, `username`, `image_path`) VALUES
(10, 'wserdtftgh', 'esrdfgh', 1234, 'John Doe', 'itemImages/image 3.png'),
(9, 'help me please', 'sos', 505, 'John Doe', 'itemImages/phisherman.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  `profile_picture` varchar(1000) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `email`, `password`, `profile_picture`, `datecreated`) VALUES
(3, 'John Doe', 'johndoe12345@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'profilepics/infoBlack.png', '2022-02-17 10:06:24'),
(4, 'Joseph', 'joseph@joseph.com', '92005ecf3788faea8346a7919fba0232188561ab', NULL, '2022-02-17 10:06:24'),
(5, 'Marcus Tan', 'marcustan@123.com', '8cb2237d0679ca88db6464eac60da96345513964', 'profilepics/loading.png', '2022-02-17 10:06:24'),
(6, 'Help Me', 'help@help.com', '70ffc281dbec8dacf4e02e879c6e20a93b1acd59', NULL, '2022-02-17 10:06:24'),
(7, 'AHHHHH', 'ah@help.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2022-02-17 10:06:24'),
(8, 'Yiquan', 'yiquan@sucks.haha.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2022-02-17 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

DROP TABLE IF EXISTS `user_reviews`;
CREATE TABLE IF NOT EXISTS `user_reviews` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `review` varchar(10000) NOT NULL,
  `rating` float NOT NULL,
  `item_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_feedback`
--

DROP TABLE IF EXISTS `website_feedback`;
CREATE TABLE IF NOT EXISTS `website_feedback` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
