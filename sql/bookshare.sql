-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2022 at 03:47 PM
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
CREATE DATABASE IF NOT EXISTS `bookshare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookshare`;

-- --------------------------------------------------------

--
-- Table structure for table `items_list`
--

DROP TABLE IF EXISTS `items_list`;
CREATE TABLE IF NOT EXISTS `items_list` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_review`
--

DROP TABLE IF EXISTS `item_review`;
CREATE TABLE IF NOT EXISTS `item_review` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `review` varchar(10000) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote_list`
--

DROP TABLE IF EXISTS `quote_list`;
CREATE TABLE IF NOT EXISTS `quote_list` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
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
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_reviews`
--

DROP TABLE IF EXISTS `website_reviews`;
CREATE TABLE IF NOT EXISTS `website_reviews` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `comments` varchar(10000) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
