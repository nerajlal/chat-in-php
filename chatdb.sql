-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2023 at 03:14 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `recipient` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `message`, `created_at`, `recipient`) VALUES
(34, 'me', 'but y', '0000-00-00 00:00:00', ''),
(33, 'you', 'nothing', '0000-00-00 00:00:00', ''),
(32, 'me', 'whats up', '0000-00-00 00:00:00', ''),
(31, 'you', 'yes', '0000-00-00 00:00:00', ''),
(30, 'me', 'are u here', '0000-00-00 00:00:00', ''),
(29, 'me', 'ok', '0000-00-00 00:00:00', ''),
(28, 'you', 'fine', '0000-00-00 00:00:00', ''),
(27, 'me', 'how are you', '0000-00-00 00:00:00', ''),
(26, 'you', 'hi', '0000-00-00 00:00:00', ''),
(25, 'me', 'hello', '0000-00-00 00:00:00', '');
