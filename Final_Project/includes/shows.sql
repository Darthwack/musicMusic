-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2013 at 04:19 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indymusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `show_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`show_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`show_id`, `artist_id`, `venue_id`, `show_date`, `time`) VALUES
(1, 4, 1, '2013-11-21', '07:30:00'),
(2, 6, 3, '2013-11-21', NULL),
(3, 1, 4, '2013-11-21', '08:00:00'),
(4, 7, 5, '2013-11-22', '06:00:00'),
(5, 8, 6, '2013-11-22', NULL),
(6, 9, 7, '2013-11-22', NULL),
(7, 10, 8, '2013-11-22', '09:00:00'),
(8, 11, 9, '2013-11-22', NULL),
(9, 12, 10, '2013-11-22', NULL),
(10, 14, 11, '2013-11-22', NULL),
(11, 15, 12, '2013-11-22', '08:00:00'),
(12, 16, 4, '2013-11-22', '08:30:00'),
(13, 18, 2, '2013-11-23', '09:00:00'),
(14, 19, 13, '2013-11-23', NULL),
(15, 36, 21, '2013-11-23', NULL),
(16, 21, 11, '2013-11-23', '09:00:00'),
(17, 21, 14, '2013-11-26', NULL),
(18, 10, 15, '2013-11-27', '09:30:00'),
(19, 37, 11, '2013-11-27', NULL),
(20, 24, 16, '2013-11-27', '10:00:00'),
(21, 25, 4, '2013-11-28', '10:00:00'),
(22, 27, 17, '2013-11-29', NULL),
(23, 28, 18, '2013-11-29', '08:00:00'),
(24, 29, 5, '2013-11-29', '06:00:00'),
(25, 30, 2, '2013-11-29', '09:00:00'),
(26, 31, 19, '2013-11-29', '08:00:00'),
(27, 39, 11, '2013-11-29', NULL),
(28, 33, 4, '2013-11-29', NULL),
(29, 24, 16, '2013-11-29', '10:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
