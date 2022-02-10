-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2022 at 03:06 AM
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
  `image` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `isComment` tinyint(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `content` varchar(50000) NOT NULL,
  `timestamp` datetime NOT NULL,
  `mainid` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `image_path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `email`, `password`) VALUES
(1, 'John Doe', 'johndoe12345@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'Marcus Tan', 'marcustan@123.com', '8cb2237d0679ca88db6464eac60da96345513964');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
