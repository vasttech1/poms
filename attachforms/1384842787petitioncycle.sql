-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2013 at 04:23 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vtplc276_karimnagarmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `petitioncycle`
--

CREATE TABLE IF NOT EXISTS `petitioncycle` (
  `cycleid` int(11) NOT NULL AUTO_INCREMENT,
  `petitionid` varchar(10) NOT NULL,
  `forwarded` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `dateoffollowup` varchar(20) NOT NULL,
  `relateddocument` text NOT NULL,
  PRIMARY KEY (`cycleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
