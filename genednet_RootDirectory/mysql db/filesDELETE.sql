-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 25, 2014 at 04:30 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gen_ed`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `filename2` varchar(30) NOT NULL,
  `filename3` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `gradeLevel` varchar(30) NOT NULL,
  `chapter` varchar(30) NOT NULL,
  `alt` varchar(60) NOT NULL,
  `title` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `filename2`, `filename3`, `type`, `gradeLevel`, `chapter`, `alt`, `title`, `score`, `description`) VALUES
(1, 'lc_m6_ch1a.docx', 'lc_m6_ch', 'a.docx', 'lc', '6', '1', '', 'Learning Check Ch1a', 0.00, ''),
(2, 'lc_m6_ch1a_key.pdf', 'lc_m6_ch', 'a_key.pdf', 'lc', '6', '1', '', 'Learning Check Ch1a Key', 0.00, ''),
(3, 'lc- m6 ch1b.docx', '', '', 'lc', '6', '1', '', 'Learning Check Ch1b', 0.00, ''),
(4, 'lc- m6 ch1b key.pdf', '', '', 'lc', '6', '1', '', 'Learning Check Ch1b Key', 0.00, ''),
(5, 'lc_m6_ch1b_key.pdf', '', '', 'lc', '6', '1', '', 'Learning Check Ch1b Key', 0.00, ''),
(6, 'lc- m6 ch1c.docx', '', '', 'lc', '6', '1', '', 'Learning Check Ch1c', 0.00, ''),
(7, 'lc- m6 ch1d', '', '', 'lc', '6', '1', '', 'Learning Check Ch1d', 0.00, ''),
(8, 'lc- m6 ch2a', '', '', 'lc', '6', '2', '', 'Learning Check Ch2a', 0.00, ''),
(9, 'lc- m6 ch2a key', '', '', 'lc', '6', '2', '', 'Learning Check Ch2a Key', 0.00, ''),
(10, 'lc- m6 ch2a.pdf', '', '', 'lc', '6', '2', '', 'Learning Check Ch2a', 0.00, ''),
(11, 'lc_m6_ch2a_key.pdf', 'lc_m6_ch', 'a_key.pdf', 'lc', '6', '2', '', 'Learning Check Ch2a Key', 0.00, ''),
(12, 'lc- m6 ch2a key.pdf', '', '', 'lc', '6', '2', '', 'Learning Check Ch2a Key', 0.00, ''),
(13, 'lc- m6 ch2b', '', '', 'lc', '6', '2', '', 'Learning Check Ch2b', 0.00, ''),
(14, 'lc- m6 ch2b key', '', '', 'lc', '6', '2', '', 'Learning Check Ch2b Key', 0.00, ''),
(15, 'lc_m6_ch4d_key.pdf', '', '', 'lc', '6', '4', '', 'Learning Check Ch4d Key', 0.00, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
