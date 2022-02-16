-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2022 at 07:25 PM
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
-- Table structure for table `cookies`
--

DROP TABLE IF EXISTS `cookies`;
CREATE TABLE IF NOT EXISTS `cookies` (
  `cookie_name` varchar(20) NOT NULL,
  `cookie_value` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `username`, `content`, `timestamp`, `mainid`) VALUES
(4, '', 'John Doe', ' rrdxfgcvh', '2022-02-16 22:15:36', NULL),
(3, 'wesrdt', 'John Doe', 'awesrdt', '2022-02-16 21:13:12', NULL),
(5, '', 'John Doe', ' aweesrc', '2022-02-16 22:16:42', NULL),
(6, '', 'John Doe', ' qwiuheui', '2022-02-16 22:20:32', NULL),
(7, '', 'John Doe', ' uygwb', '2022-02-16 22:22:32', 4),
(8, '', '', '', '2022-02-16 22:51:49', NULL),
(9, 'eswsrt', 'John Doe', 'rtvghb', '2022-02-16 22:55:04', NULL),
(10, 'ddfcgv', 'John Doe', 'zxdfcg', '2022-02-16 23:07:51', NULL),
(11, NULL, 'John Doe', ' qwertfg', '2022-02-16 23:14:10', 4),
(12, NULL, 'John Doe', ' wesrdt', '2022-02-17 00:11:49', 4),
(13, NULL, 'John Doe', ' srdfgh', '2022-02-17 00:39:19', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_list`
--

INSERT INTO `items_list` (`id`, `item_name`, `description`, `price`, `username`, `image_path`) VALUES
(5, 'qjwie', 'qwe', 12, 'John Doe', 'itemImages/infoBlack.png'),
(4, 'help', 'sos', 505, 'John Doe', 'itemImages/'),
(6, 'help', 'sos', 505, 'John Doe', 'itemImages/infoBlack.png'),
(7, 'thing', 'help', 505, 'John Doe', 'itemImages/infoBlack.png'),
(8, 'qwe', 'qwert', 1, 'John Doe', 'itemImages/infoBlack.png');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `email`, `password`, `profile_picture`) VALUES
(1, 'John Doe', 'johndoe12345@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', ''),
(2, 'Marcus Tan', 'marcustan@123.com', '8cb2237d0679ca88db6464eac60da96345513964', ''),
(3, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(4, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(5, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(6, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(7, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(8, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(9, 'joseph', 'YIQUAN.20@ichat.sp.edu.sg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(10, 'joseph', 'tanyiquan@live.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'math book.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

DROP TABLE IF EXISTS `user_ratings`;
CREATE TABLE IF NOT EXISTS `user_ratings` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `comments` varchar(10000) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
