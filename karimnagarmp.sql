-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2013 at 11:26 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karimnagarmp`
--
CREATE DATABASE IF NOT EXISTS `karimnagarmp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `karimnagarmp`;

-- --------------------------------------------------------

--
-- Table structure for table `castemaster`
--

CREATE TABLE IF NOT EXISTS `castemaster` (
  `casteid` int(11) NOT NULL AUTO_INCREMENT,
  `castename` varchar(50) NOT NULL,
  PRIMARY KEY (`casteid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `castemaster`
--

INSERT INTO `castemaster` (`casteid`, `castename`) VALUES
(1, 'ST'),
(2, 'Oc');

-- --------------------------------------------------------

--
-- Table structure for table `contractormaster`
--

CREATE TABLE IF NOT EXISTS `contractormaster` (
  `contractorid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `concernedperson` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adress` text NOT NULL,
  PRIMARY KEY (`contractorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contractormaster`
--

INSERT INTO `contractormaster` (`contractorid`, `name`, `concernedperson`, `mobile`, `email`, `adress`) VALUES
(1, 'test', 'demo', '8099595943', 'pavan.arutla@gmail.com', ' hyderabad');

-- --------------------------------------------------------

--
-- Table structure for table `letterrecievermaster`
--

CREATE TABLE IF NOT EXISTS `letterrecievermaster` (
  `recieverid` int(11) NOT NULL AUTO_INCREMENT,
  `recievername` text NOT NULL,
  PRIMARY KEY (`recieverid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `letterrecievermaster`
--

INSERT INTO `letterrecievermaster` (`recieverid`, `recievername`) VALUES
(1, 'Hon''ble Chief Minister Peshi'),
(2, 'Hon''ble Minister of M.A & UD Peshi'),
(3, 'Hon''lbe Other Ministers Peshi'),
(4, 'MPs / MLC / MLAs'),
(5, 'Government (MA & UD)'),
(6, 'overnment (Others Departments)'),
(7, 'Commissioner & Director of Municipal Administratio'),
(8, 'Director of Town & Country Planning'),
(9, 'Director of Health'),
(10, 'Directors of Other Departments'),
(11, 'Engineer-in Chief, Public Health'),
(12, 'Regional Director-cum-Appellate Commissioner'),
(13, 'Regional Director of Town & Country Planning'),
(14, 'Regional Director of Health'),
(15, 'Superintending Engineer (PH)'),
(16, 'MEPMA'),
(17, 'APUFIDC'),
(18, 'APMDP'),
(19, 'District Collector'),
(20, 'Joint Collector'),
(21, 'Vigilance Department'),
(22, 'Supreme Court'),
(23, 'High Court'),
(24, 'Lokayuktha'),
(25, 'Other Courts'),
(26, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE IF NOT EXISTS `letters` (
  `letterid` int(11) NOT NULL AUTO_INCREMENT,
  `receivedfrom` text NOT NULL,
  `sendername` varchar(50) NOT NULL,
  `senderaddress` text NOT NULL,
  `receiveddate` varchar(20) NOT NULL,
  `receivedthrough` varchar(20) NOT NULL,
  `lrno` varchar(20) NOT NULL,
  `lrdate` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `enclosures` varchar(50) NOT NULL,
  `mpcomments` text NOT NULL,
  `actiontaken` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `letterdate` varchar(20) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  PRIMARY KEY (`letterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`letterid`, `receivedfrom`, `sendername`, `senderaddress`, `receiveddate`, `receivedthrough`, `lrno`, `lrdate`, `description`, `enclosures`, `mpcomments`, `actiontaken`, `status`, `letterdate`, `timestamp`) VALUES
(1, 'Hon''ble Chief Minister Peshi', 'fdref', 'fdsfdsdsf', '02/03/1997', 'Regd Post', 'fdsfds', '15/10/2013', 'dfsdsfds', 'dsfds', 'dsfdf', 'fdsfds', 'No Action Taken', '24/10/2013', '1382597824'),
(2, 'Hon''ble Chief Minister Peshi', 'fdsfddsfdsf', 'dfsfdsds', '15/10/2013', 'Post', 'dsfd', '02/10/2013', 'dfssfdsfdsf', 'dsfdsfds', 'fdsfdsfdsdfgfdsfdsfdsfdsfdsfdssdfds\r\nfdsfdsfdsfdsfdsfds\r\n', 'dsgfdsgdsfdsfgds', ' Action Under Progress', '24/10/2013', '1382602407');

-- --------------------------------------------------------

--
-- Table structure for table `localitymaster`
--

CREATE TABLE IF NOT EXISTS `localitymaster` (
  `localityid` int(11) NOT NULL AUTO_INCREMENT,
  `localityname` varchar(50) NOT NULL,
  PRIMARY KEY (`localityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `localitymaster`
--

INSERT INTO `localitymaster` (`localityid`, `localityname`) VALUES
(1, 'sc locality');

-- --------------------------------------------------------

--
-- Table structure for table `mandalmaster`
--

CREATE TABLE IF NOT EXISTS `mandalmaster` (
  `mandalid` int(11) NOT NULL AUTO_INCREMENT,
  `mandalname` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `constituency` varchar(50) NOT NULL,
  PRIMARY KEY (`mandalid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `mandalmaster`
--

INSERT INTO `mandalmaster` (`mandalid`, `mandalname`, `type`, `constituency`) VALUES
(1, 'Karimnagar', 'town', 'karimnagar'),
(2, 'Karimnagar', 'mandal', 'karimnagar'),
(3, 'Manakondur', 'mandal', 'manakondur'),
(4, 'Shankarapatnam', 'mandal', 'manakondur'),
(5, 'Thimmapur', 'mandal', 'manakondur'),
(6, 'Bejjanki', 'mandal', 'manakondur'),
(7, 'Ellanthakunta', 'mandal', 'manakondur'),
(8, 'Siricilla', 'town', 'siricilla'),
(9, 'Siricilla', 'mandal', 'siricilla'),
(10, 'Musthabad', 'mandal', 'siricilla'),
(11, 'Yellareddipeta', 'mandal', 'siricilla'),
(12, 'Gambhiraopet', 'mandal', 'siricilla'),
(13, 'Husnabad', 'mandal', 'husnabad'),
(14, 'Elakturthi', 'mandal', 'husnabad'),
(15, 'Koheda', 'mandal', 'husnabad'),
(16, 'Saidapur', 'mandal', 'husnabad'),
(17, 'BD Palli', 'mandal', 'husnabad'),
(18, 'Chigurumamidi', 'mandal', 'husnabad'),
(19, 'Choppadandi', 'mandal', 'choppadandi'),
(20, 'Gangadhara', 'mandal', 'choppadandi'),
(21, 'Boinpalli', 'mandal', 'choppadandi'),
(22, 'Ramdugu', 'mandal', 'choppadandi'),
(23, 'Mallial', 'mandal', 'choppadandi'),
(24, 'kodimyal', 'mandal', 'choppadandi'),
(25, 'Huzurabad', 'mandal', 'huzurabad'),
(26, 'Kamalapur', 'mandal', 'huzurabad'),
(27, 'Jammikunta', 'mandal', 'huzurabad'),
(28, 'Veenavanka', 'mandal', 'huzurabad'),
(29, 'Vemulawada', 'mandal', 'vemulawada'),
(30, 'Chandurthi', 'mandal', 'vemulawada'),
(31, 'kathlapur', 'mandal', 'vemulawada'),
(32, 'Medipalli', 'mandal', 'vemulawada'),
(33, 'Konaraopet', 'mandal', 'vemulawada');

-- --------------------------------------------------------

--
-- Table structure for table `petitionmaster`
--

CREATE TABLE IF NOT EXISTS `petitionmaster` (
  `petitionid` int(11) NOT NULL AUTO_INCREMENT,
  `petitionname` varchar(50) NOT NULL,
  PRIMARY KEY (`petitionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petitionmaster`
--

INSERT INTO `petitionmaster` (`petitionid`, `petitionname`) VALUES
(1, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `positionmaster`
--

CREATE TABLE IF NOT EXISTS `positionmaster` (
  `positionid` int(11) NOT NULL AUTO_INCREMENT,
  `positiontype` varchar(50) NOT NULL,
  `positionlevel` varchar(50) NOT NULL,
  `positionname` varchar(50) NOT NULL,
  PRIMARY KEY (`positionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `positionmaster`
--

INSERT INTO `positionmaster` (`positionid`, `positiontype`, `positionlevel`, `positionname`) VALUES
(1, 'general', 'village', 'test'),
(2, 'party', 'mandal', 'youthleader'),
(3, 'party', 'constituency', 'youthleader');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `registerid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `fhname` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `birthyear` varchar(20) NOT NULL,
  `education` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `hno` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `constituency` varchar(50) NOT NULL,
  `mandal` varchar(20) NOT NULL,
  `village` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `generalcurrentpositionlevel` varchar(50) NOT NULL,
  `generalcurrentpositionname` varchar(50) NOT NULL,
  `partycurrentpositionlevel` varchar(50) NOT NULL,
  `partycurrentpositionname` varchar(50) NOT NULL,
  `pastpositions` text NOT NULL,
  `otherdetails` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `registerdate` varchar(20) NOT NULL,
  PRIMARY KEY (`registerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`registerid`, `name`, `gender`, `fhname`, `dob`, `birthyear`, `education`, `religion`, `caste`, `hno`, `street`, `constituency`, `mandal`, `village`, `mobile`, `phone`, `email`, `generalcurrentpositionlevel`, `generalcurrentpositionname`, `partycurrentpositionlevel`, `partycurrentpositionname`, `pastpositions`, `otherdetails`, `image`, `registerdate`) VALUES
(1, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(2, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(3, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(4, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(5, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(6, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(7, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(8, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504679Jellyfish.jpg', '23/10/2013'),
(9, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(10, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(11, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(12, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(13, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(14, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(15, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(16, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(17, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(18, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(19, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(20, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(21, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(22, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(23, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(24, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(25, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(26, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(27, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(28, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(29, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(30, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(31, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(32, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(33, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(34, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(35, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(36, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(37, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(38, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(39, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(40, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(41, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(42, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(43, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(44, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(45, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(46, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(47, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(48, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(49, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(50, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(51, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(52, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(53, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(54, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(55, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(56, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(57, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(58, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(59, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(60, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(61, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(62, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(63, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(64, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(65, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(66, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(67, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(68, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(69, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(70, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(71, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(72, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(73, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(74, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(75, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(76, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(77, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(78, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(79, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(80, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(81, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(82, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(83, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(84, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(85, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(86, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(87, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(88, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(89, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(90, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(91, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(92, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(93, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(94, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(95, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(96, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(97, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(98, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(99, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(100, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(101, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(102, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(103, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(104, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(105, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(106, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(107, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(108, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(109, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(110, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(111, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(112, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(113, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(114, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(115, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(116, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(117, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(118, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(119, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(120, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013'),
(121, 'testing', 'male', 'demo ', '25/10/1995', '1995', 'P.hd', '1', '2', '11111', 'sadsds', 'karimnagar', '1', '19', '9666088290', '12345679890', 'testing@vtpl.co.in', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'test position', 'demo position', '1382454912Lighthouse.jpg', '22/10/2013'),
(122, 'Vishal Manchala', 'male', 'Jagan', '08/10/1980', '1980', 'Post Graduate', '1', '2', '1-1-1011', 'default', 'karimnagar', '2', '51', '9700087878', '11111111111111111111', 'vishalmanchala@gmail.com', 'constituency', 'M.L.A', 'mandal', 'Secretary', 'nnnp', 'nothing', '1382458301vast_logo.jpg', '22/10/2013'),
(123, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504661Jellyfish.jpg', '23/10/2013'),
(124, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504663Jellyfish.jpg', '23/10/2013'),
(125, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504665Jellyfish.jpg', '23/10/2013'),
(126, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504666Jellyfish.jpg', '23/10/2013'),
(127, 'pavan', 'male', 'sampath', '01/11/1988', '1988', 'Graduate', '1', '2', '2313', 'test', 'karimnagar', '1', '19', '8099595943', '1234567890', 'pavan@vtpl.co.in', 'village', 'test', 'constituency', 'youthleader', 'vvchghjkj,mm,m', 'bohhlklkjlkmlkk', '1382504668Jellyfish.jpg', '23/10/2013');

-- --------------------------------------------------------

--
-- Table structure for table `religionmaster`
--

CREATE TABLE IF NOT EXISTS `religionmaster` (
  `religionid` int(11) NOT NULL AUTO_INCREMENT,
  `religionname` varchar(50) NOT NULL,
  PRIMARY KEY (`religionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `religionmaster`
--

INSERT INTO `religionmaster` (`religionid`, `religionname`) VALUES
(1, 'Hindhu'),
(6, 'Muslim'),
(7, 'Test'),
(10, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `schememaster`
--

CREATE TABLE IF NOT EXISTS `schememaster` (
  `schemeid` int(11) NOT NULL AUTO_INCREMENT,
  `schemename` varchar(50) NOT NULL,
  `funds` varchar(50) NOT NULL,
  `fundtype` varchar(50) NOT NULL,
  PRIMARY KEY (`schemeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schememaster`
--

INSERT INTO `schememaster` (`schemeid`, `schemename`, `funds`, `fundtype`) VALUES
(1, 'testing', '100000', 'One time');

-- --------------------------------------------------------

--
-- Table structure for table `statusmaster`
--

CREATE TABLE IF NOT EXISTS `statusmaster` (
  `statusid` int(11) NOT NULL AUTO_INCREMENT,
  `statusname` varchar(50) NOT NULL,
  PRIMARY KEY (`statusid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `statusmaster`
--

INSERT INTO `statusmaster` (`statusid`, `statusname`) VALUES
(1, 'under process');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `villagemaster`
--

CREATE TABLE IF NOT EXISTS `villagemaster` (
  `villageid` int(11) NOT NULL AUTO_INCREMENT,
  `villagename` varchar(50) NOT NULL,
  `mandalid` int(11) NOT NULL,
  PRIMARY KEY (`villageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=603 ;

--
-- Dumping data for table `villagemaster`
--

INSERT INTO `villagemaster` (`villageid`, `villagename`, `mandalid`) VALUES
(1, '1ST  WARD', 1),
(2, '2ND  WARD', 1),
(3, '3RD  WARD', 1),
(4, '4TH  WARD', 1),
(5, '5TH  WARD', 1),
(6, '6TH  WARD', 1),
(7, '7TH  WARD', 1),
(8, '8TH  WARD', 1),
(9, '9TH  WARD', 1),
(10, '10TH WARD', 1),
(11, '11TH WARD', 1),
(12, '12TH WARD', 1),
(13, '13TH WARD', 1),
(14, '14TH WARD', 1),
(15, '15TH WARD', 1),
(16, '16TH WARD', 1),
(17, '17TH WARD', 1),
(18, '18TH WARD', 1),
(19, '19TH WARD', 1),
(20, '20TH WARD', 1),
(21, '21ST WARD', 1),
(22, '22ND WARD', 1),
(23, '23RD WARD', 1),
(24, '24TH WARD', 1),
(25, '25TH WARD', 1),
(26, '26TH WARD', 1),
(27, '27TH WARD', 1),
(28, '28TH WARD', 1),
(29, '29TH WARD', 1),
(30, '30TH WARD', 1),
(31, '31ST WARD', 1),
(32, '32ND WARD', 1),
(33, 'BADDIPALLY', 2),
(34, 'NAGULAMALIAL', 2),
(35, 'ASIFNAGAR (BAHUPET)', 2),
(36, 'KHAJIPUR', 2),
(37, 'ELGANDAL', 2),
(38, 'KAMANPUR', 2),
(39, 'MALKAPUR', 2),
(40, 'LAKSHMIPUR', 2),
(41, 'REKURTHI', 2),
(42, 'KOTHAPALLI (HAVELI)', 2),
(43, 'NAGUNUR', 2),
(44, 'JUBLINAGAR', 2),
(45, 'FAKIRPET', 2),
(46, 'CHAMANPALLE', 2),
(47, 'TAHARAKONDAPUR', 2),
(48, 'CHERLABUTHKUR', 2),
(49, 'MAQDUMPUR', 2),
(50, 'IRUKULLA', 2),
(51, 'ELBOTHARAM', 2),
(52, 'WALLAMPAHAD', 2),
(53, 'AREPALLE', 2),
(54, 'SEETHARAMPUR', 2),
(55, 'CHINTAKUNTA', 2),
(56, 'HASNAPUR', 2),
(57, 'POTHGAL', 2),
(58, 'BOMMAKAL', 2),
(59, 'DURSHED', 2),
(60, 'CHEGURTI', 2),
(61, 'LINGAPUR', 3),
(62, 'VELDI', 3),
(63, 'VEGURUPALLE', 3),
(64, 'UTOOR', 3),
(65, 'PACHCHUNUR', 3),
(66, 'MADDIKUNTA', 3),
(67, 'KALLEDA', 3),
(68, 'DEVAMPALLE', 3),
(69, 'LALITHAPUR', 3),
(70, 'ANNARAM', 3),
(71, 'MANAKONDUR', 3),
(72, 'MUNJAMPALLE', 3),
(73, 'EDULAGATEPALLE', 3),
(74, 'CHENGERLA', 3),
(75, 'GATTUDUDDENAPALLE', 3),
(76, 'VANNARAM', 3),
(77, 'GANGIPALLE', 3),
(78, 'KONDAPALKALA', 3),
(79, 'YERADPALLE', 4),
(80, 'ARKANDLA', 4),
(81, 'GADDAPAKA', 4),
(82, 'KALAVALA', 4),
(83, 'KACHAPUR', 4),
(84, 'RAJAPUR', 4),
(85, 'DHARMARAM', 4),
(86, 'KANNAPUR', 4),
(87, 'MUTHARAM', 4),
(88, 'THADIKAL', 4),
(89, 'MOLANGUR', 4),
(90, 'AMUDALAPALLE', 4),
(91, 'METPALLE', 4),
(92, 'KOTHAGHAT', 4),
(93, 'KESAVAPATNAM', 4),
(94, 'AMBALPUR', 4),
(95, 'KAREEMPETA', 4),
(96, 'ALUGUNUR', 5),
(97, 'THIMMAPUR', 5),
(98, 'PORANDLA', 5),
(99, 'MANNEMPALLE', 5),
(100, 'NUSTULAPUR', 5),
(101, 'VACHUNUR', 5),
(102, 'NEDUNUR', 5),
(103, 'RENIKUNTA', 5),
(104, 'KOTHAPALLE (P.N)', 5),
(105, 'NALLAGONDA', 5),
(106, 'MALLAPUR', 5),
(107, 'POLAMPALLE', 5),
(108, 'PARLAPALLE', 5),
(109, 'MOGILIPALEM', 5),
(110, 'GANNERVARAM', 6),
(111, 'YASWADA', 6),
(112, 'PANTHULUKONDAPUR', 6),
(113, 'CHERLAPUR', 6),
(114, 'GOPALPUR', 6),
(115, 'SANGAM (HANMAJIPALLE)', 6),
(116, 'MYLARAM', 6),
(117, 'MADHAPUR', 6),
(118, 'KHASIMPET', 6),
(119, 'PARVELLA', 6),
(120, 'VADLUR BEGUMPET', 6),
(121, 'JANGAPALLE', 6),
(122, 'GUNKULKONDAPUR', 6),
(123, 'DEVAKKAPALLE', 6),
(124, 'THOTAPALLE', 6),
(125, 'VEERAPUR', 6),
(126, 'KALLEPALLY', 6),
(127, 'BEJJANKI', 6),
(128, 'DACHARAM', 6),
(129, 'GAGILLAPUR', 6),
(130, 'GUGGILLA', 6),
(131, 'MUTHANNAPET', 6),
(132, 'POTHARAM', 6),
(133, 'CHEELAPUR', 6),
(134, 'REGULAPALLE', 6),
(135, 'KANDIKATKOOR', 7),
(136, 'POTTUR', 7),
(137, 'JAWAHARPET', 7),
(138, 'GALIPALLE', 7),
(139, 'VANTHADUPULA', 7),
(140, 'VALLAMPATLA', 7),
(141, 'OBULAPURAM(P.A)', 7),
(142, 'VELJIPURAM', 7),
(143, 'RAHIMKHANPET', 7),
(144, 'THALLAPALLE', 7),
(145, 'MUSKANIPET', 7),
(146, 'ELLANTHAKUNTA', 7),
(147, 'JANGAMREDDIPALLE', 7),
(148, 'ANANTHARAM', 7),
(149, 'RAMAJIPETA', 7),
(150, 'PEDDALINGAPURAM', 7),
(151, 'DACHARAM', 7),
(152, 'SIRIKONDA', 7),
(153, 'ANANTHAGIRI', 7),
(154, 'THIPPAPURAM(P.A)', 7),
(155, 'REPAKA', 7),
(156, 'GUNDARAM(P.S.)', 7),
(157, '1ST  WARD', 8),
(158, '2ND  WARD', 8),
(159, '3RD  WARD', 8),
(160, '4TH  WARD', 8),
(161, '5TH  WARD', 8),
(162, '6TH  WARD', 8),
(163, '7TH  WARD', 8),
(164, '8TH  WARD', 8),
(165, '9TH  WARD', 8),
(166, '10TH WARD', 8),
(167, '11TH WARD', 8),
(168, '12TH WARD', 8),
(169, '13TH WARD', 8),
(170, '14TH WARD', 8),
(171, '15TH WARD', 8),
(172, '16TH WARD', 8),
(173, '17TH WARD', 8),
(174, '18TH WARD', 8),
(175, '19TH WARD', 8),
(176, '20TH WARD', 8),
(177, '21ST WARD', 8),
(178, '22ND WARD', 8),
(179, '23RD WARD', 8),
(180, '24TH WARD', 8),
(181, 'SARDAPUR', 9),
(182, 'PEDDUR', 9),
(183, 'BONALA', 9),
(184, 'MUSTIPALLI', 9),
(185, 'SIRSILLA (R)', 9),
(186, 'CHINTALTHANA', 9),
(187, 'CHEERLAVANCHA', 9),
(188, 'THADUR', 9),
(189, 'THANGALLAPALLE', 9),
(190, 'MANDEPALLE', 9),
(191, 'KASBEKATKUR', 9),
(192, 'VENUGOPALPUR', 9),
(193, 'GANDILACHAPET', 9),
(194, 'OBLAPUR(PK)', 9),
(195, 'SARAMPALLE', 9),
(196, 'BADDENAPALLY', 9),
(197, 'BASWAPURAM', 9),
(198, 'NARSIMHULAPALLE', 9),
(199, 'NERELLA', 9),
(200, 'JILLELLA', 9),
(201, 'RAMCHANDRAPUR', 9),
(202, 'KONDAPUR', 10),
(203, 'AUNOOR', 10),
(204, 'TURKAPALLE', 10),
(205, 'GUDEM', 10),
(206, 'NAMAPUR', 10),
(207, 'GUDUR', 10),
(208, 'POTHUGAL', 10),
(209, 'TERLUMADDI', 10),
(210, 'MUSTABAD', 10),
(211, 'MORAIPALLY', 10),
(212, 'CHIPPALAPALLE', 10),
(213, 'CHEEKOD', 10),
(214, 'MADDIKUNTA', 10),
(215, 'MOINKUNTA', 10),
(216, 'BANDANKAL', 10),
(217, 'MORRAPUR', 10),
(218, 'VANAPALLE', 11),
(219, 'GARJANPALLE', 11),
(220, 'ADIVIPADIRA', 11),
(221, 'KANCHERLA', 11),
(222, 'VEERNAPALLE', 11),
(223, 'MADDIMALLA', 11),
(224, 'GUNDARAM(PATTI RACHERLA', 11),
(225, 'TIMMAPURAM', 11),
(226, 'GOLLAPALLE', 11),
(227, 'RAJANNAPETA', 11),
(228, 'ALMASPUR', 11),
(229, 'AKKAPALLE', 11),
(230, 'POTHAREDDIPALLE', 11),
(231, 'VENKATAPURAM', 11),
(232, 'PADIRA', 11),
(233, 'NARAYANAPURAM(PATTIRACH', 11),
(234, 'DUMALA', 11),
(235, 'BOPPAPURAM', 11),
(236, 'KORUTLAPETA', 11),
(237, 'SARVAIPALLE', 11),
(238, 'SINGARAM', 11),
(239, 'BANDALINGAMPALLE', 11),
(240, 'YELLAREDDIPETA', 11),
(241, 'GAJASINGARAM', 12),
(242, 'GORANTIAL', 12),
(243, 'SAMUDRALINGAPURAM', 12),
(244, 'DAMMANNAPETA', 12),
(245, 'KHURDU LINGAMPALLY', 12),
(246, 'LAXMIPURAM', 12),
(247, 'RAMANUJAPURAM', 12),
(248, 'MALLAREDDIPET', 12),
(249, 'SRINIVASAPURAM', 12),
(250, 'GAMBHIRAOPET', 12),
(251, 'MUSTAFANAGAR', 12),
(252, 'NARMAL', 12),
(253, 'DESAIPETA', 12),
(254, 'KOLLAMADDI', 12),
(255, 'SRIGADHA', 12),
(256, 'KOTHAPALLE', 12),
(257, 'LINGANNAPETA', 12),
(258, 'MUCHERLA', 12),
(259, 'POTLAPALLE', 13),
(260, 'PANDILLA', 13),
(261, 'KUCHANPALLE', 13),
(262, 'HUSNABAD', 13),
(263, 'MADUDHA', 13),
(264, 'MOHAMMADAPUR', 13),
(265, 'NAGARAM', 13),
(266, 'UMMAPUR', 13),
(267, 'MIRZAPUR', 13),
(268, 'POTHARAM (S)', 13),
(269, 'THOTAPALLE (S)', 13),
(270, 'JANGAON', 13),
(271, 'REGONDA', 13),
(272, 'DHARMARAM', 13),
(273, 'NANDARAM', 13),
(274, 'GOURAVELLI', 13),
(275, 'ANTHAKKAPETA', 13),
(276, 'CHOUTAPALLE', 13),
(277, 'KESAVAPUR', 13),
(278, 'MALLAMPALLE', 13),
(279, 'AKKANNAPETA', 13),
(280, 'GANDIPALLE', 13),
(281, 'RAMAVARAM', 13),
(282, 'POTHARAM (J)', 13),
(283, 'PENCHAKALPETA', 14),
(284, 'JEELGUL', 14),
(285, 'GOPALPUR', 14),
(286, 'DAMERA', 14),
(287, 'ELKATHURTHI', 14),
(288, 'SURARAM', 14),
(289, 'VALLABHAPUR', 14),
(290, 'KOTHULNADUMA', 14),
(291, 'VEERANARAYANAPUR', 14),
(292, 'DANDEPALLE', 14),
(293, 'BAOPET', 14),
(294, 'THIMMAPUR', 14),
(295, 'KESHWAPUR', 14),
(296, 'VARIKOLU', 15),
(297, 'RAMACHANDRAPUR', 15),
(298, 'VINJAPALLE', 15),
(299, 'SANIGARAM', 15),
(300, 'GUNDAREDDIPALLE', 15),
(301, 'THANGALLAPALLE', 15),
(302, 'KURELLA', 15),
(303, 'KOHEDA', 15),
(304, 'GOTTALAMITTA', 15),
(305, 'NARAYANAPUR', 15),
(306, 'SRIRAMULAPALLE', 15),
(307, 'NAKKIRA KOMMULA', 15),
(308, 'PARIVEDA', 15),
(309, 'KACHAPUR', 15),
(310, 'SAMUDRALA', 15),
(311, 'BASWAPUR', 15),
(312, 'EKLASPUR', 16),
(313, 'SOMARAM', 16),
(314, 'VENNAMPALLE', 16),
(315, 'RAMCHANDRAPUR', 16),
(316, 'ELABOTHARAM', 16),
(317, 'GODISALA', 16),
(318, 'SAIDAPUR', 16),
(319, 'VENKEPALLE', 16),
(320, 'DUDDENAPALLE', 16),
(321, 'AKUNUR', 16),
(322, 'GHANPUR', 16),
(323, 'RAIKAL', 16),
(324, 'BOMMAKAL', 16),
(325, 'AMMANAGURTHI', 16),
(326, 'VANGARA', 17),
(327, 'RATNAGIRI', 17),
(328, 'MANIKYAPUR', 17),
(329, 'KOPPUR', 17),
(330, 'BHEEMADEVARPALLE', 17),
(331, 'GATLANARSINGAPUR', 17),
(332, 'MUSTAFAPUR', 17),
(333, 'MUTHARAM (P.K)', 17),
(334, 'MULKANOOR', 17),
(335, 'KOTHAPALLE', 17),
(336, 'ERRABALLE', 17),
(337, 'KOTHAKONDA', 17),
(338, 'MALLARAM', 17),
(339, 'KATKUR', 17),
(340, 'KANNARAM', 17),
(341, 'MUDIMANIKYAM', 18),
(342, 'RAMANCHA', 18),
(343, 'MULKANOOR', 18),
(344, 'CHIGURUMAMIDI', 18),
(345, 'REKONDA', 18),
(346, 'BOMMANAPALLE', 18),
(347, 'SUNDARAGIRI', 18),
(348, 'INDURTHY', 18),
(349, 'NAWABPETA', 18),
(350, 'KONDAPOOR', 18),
(351, 'ULLAMPALLY', 18),
(352, 'RAGAMPETA', 19),
(353, 'CHITYALPALLE', 19),
(354, 'ARNAKONDA', 19),
(355, 'BHUPALAPATNAM', 19),
(356, 'CHOPPADANDI', 19),
(357, 'GUMLAPUR', 19),
(358, 'KATNEPALLE', 19),
(359, 'KONERUPALLY', 19),
(360, 'RUKMAPUR', 19),
(361, 'KOLIMIKUNTA', 19),
(362, 'CHAKUNTA', 19),
(363, 'VEDURUGATTA', 19),
(364, 'VENKATAIPALLE', 20),
(365, 'RYALAPALLE', 20),
(366, 'KACHIREDDIPALLE', 20),
(367, 'KONDAIPALLE', 20),
(368, 'BURGUPALLE', 20),
(369, 'NARASIMHULAPALLE', 20),
(370, 'SARVAREDDIPALLE', 20),
(371, 'NAGIREDDIPUR', 20),
(372, 'GANGADHARA', 20),
(373, 'NARAYANPUR', 20),
(374, 'ISLAMPUR', 20),
(375, 'MALLAPUR', 20),
(376, 'UPPARA MALLIAL', 20),
(377, 'KURIKIAL', 20),
(378, 'NAYALAKONDA PALLE', 20),
(379, 'GATTUBOOTHKUR', 20),
(380, 'GARSEKURTHI', 20),
(381, 'ACHAMPALLE', 20),
(382, 'VADDYARAM', 20),
(383, 'MALKAPUR', 21),
(384, 'ANANTHAPALLE (P.R)', 21),
(385, 'DUNDRAPALLE', 21),
(386, 'KOREM', 21),
(387, 'THADAGONDA', 21),
(388, 'BURGUPALLE', 21),
(389, 'STHAMBHAMPALLE', 21),
(390, 'BOINPALLE', 21),
(391, 'VILASAGAR', 21),
(392, 'VARDAVELLI', 21),
(393, 'SHABASHPALLE', 21),
(394, 'KODURUPAKA', 21),
(395, 'NARSINGAPUR', 21),
(396, 'KOTHAPETA', 21),
(397, 'MANWADA', 21),
(398, 'MALLAPUR', 21),
(399, 'THIRMALAPUR', 22),
(400, 'SRIRAMULAPALLE', 22),
(401, 'CHIPPAKURTHI', 22),
(402, 'GUNDI', 22),
(403, 'LAKSHMIPUR', 22),
(404, 'DATHOJIPET', 22),
(405, 'RAMADUGU', 22),
(406, 'SHANAGAR', 22),
(407, 'FAKEERPET', 22),
(408, 'GOPALRAOPETA', 22),
(409, 'KORATPALLE', 22),
(410, 'RUDRARAM', 22),
(411, 'MOTHE', 22),
(412, 'KISTAPUR', 22),
(413, 'VEDIRA', 22),
(414, 'VELICHAL', 22),
(415, 'DESHRAJPALLE', 22),
(416, 'KOKKERAKUNTA', 22),
(417, 'VANNARAM', 22),
(418, 'RAMPUR', 23),
(419, 'OBULAPUR', 23),
(420, 'GORREGUNDAM', 23),
(421, 'MADDUTLA', 23),
(422, 'POTHARAM', 23),
(423, 'RAJARAM', 23),
(424, 'NOOKAPALLE', 23),
(425, 'MALLIAL', 23),
(426, 'MANALA', 23),
(427, 'MYADAMPALLE', 23),
(428, 'THAKKALLAPALLE', 23),
(429, 'THATIPALLE', 23),
(430, 'SARVAPUR', 23),
(431, 'MUTHYAMPETA', 23),
(432, 'BALWANTHAPUR', 23),
(433, 'KATHALAPUR', 23),
(434, 'SANIVARAMPETA', 24),
(435, 'POTHARAM', 24),
(436, 'KONAPUR', 24),
(437, 'SURAMPETA', 24),
(438, 'THIRAMALAPUR', 24),
(439, 'RAMSAGAR', 24),
(440, 'NACHUPALLE', 24),
(441, 'PUDUR', 24),
(442, 'GOURAPUR', 24),
(443, 'NAMILIKONDA', 24),
(444, 'CHEPPIAL', 24),
(445, 'KODIMIAL', 24),
(446, 'KONDAPUR', 24),
(447, 'NALLAGONDA', 24),
(448, 'THIPPAIPALLE', 24),
(449, 'SINGAPUR', 25),
(450, 'THUMMANAPALLE', 25),
(451, 'SIRSAPALLE', 25),
(452, 'POTHAREDDIPETA', 25),
(453, 'CHELPUR', 25),
(454, 'JUPAK', 25),
(455, 'DHARMARAJU PALLE', 25),
(456, 'KANDUGULA', 25),
(457, 'KANUKULAGIDDA', 25),
(458, 'HUZURABAD', 25),
(459, 'BORNAPALLE', 25),
(460, 'KATREPALLE', 25),
(461, 'BHIMPALLE', 26),
(462, 'KANNUR', 26),
(463, 'GUNDED', 26),
(464, 'MARRIPALLIGUDEM', 26),
(465, 'JUJNOOR', 26),
(466, 'SANIGARAM', 26),
(467, 'VANGAPALLE', 26),
(468, 'KAMALAPUR', 26),
(469, 'UPPAL', 26),
(470, 'DESHARAJPALLE', 26),
(471, 'KANIPARTHI', 26),
(472, 'GUDUR', 26),
(473, 'AMBALA', 26),
(474, 'NERELLA', 26),
(475, 'MADANNAPETA', 26),
(476, 'GUNIPARTHI', 26),
(477, 'VILASAGAR', 27),
(478, 'THANGULA', 27),
(479, 'VAVILALA', 27),
(480, 'VANTHADUPULA', 27),
(481, 'BUJUNOOR', 27),
(482, 'RACHAPALLI', 27),
(483, 'BIJGIRISHAREEF', 27),
(484, 'KORAPALLI', 27),
(485, 'SAIDABAD', 27),
(486, 'JAMMIKUNTA', 27),
(487, 'DHARMARAM (P.B)', 27),
(488, 'ELLANTHAKUNTA', 27),
(489, 'CHINNA KOMATIPALLI', 27),
(490, 'TEKURTHI', 27),
(491, 'SIRSEDU', 27),
(492, 'PATHARLAPALLI', 27),
(493, 'MALLIAL', 27),
(494, 'KANAGARTHI', 27),
(495, 'MADIPALLI', 27),
(496, 'CHALLOOR', 28),
(497, 'MAMIDALAPALLE', 28),
(498, 'ELBAK', 28),
(499, 'BONTHUPALLE', 28),
(500, 'GHANMUKLA', 28),
(501, 'KORKAL(JANGAMPALLE)', 28),
(502, 'KONDAPAKA', 28),
(503, 'POTHIREDDIPALLE', 28),
(504, 'REDDIPALLE', 28),
(505, 'BRAHMANPALLE', 28),
(506, 'VEENAVANKA', 28),
(507, 'VALBAPUR', 28),
(508, 'KANPARTHI', 28),
(509, 'BETHGAL', 28),
(510, 'VENKATAMPALLE', 29),
(511, 'NOOKALAMARRI', 29),
(512, 'VATTEMLA', 29),
(513, 'FAZIL NAGAR', 29),
(514, 'SATRAJUPALLE', 29),
(515, 'EDURUGATLA', 29),
(516, 'CHEKKAPALLE', 29),
(517, 'MARRIPALLE', 29),
(518, 'HANUMAJIPET', 29),
(519, 'BOLLARAM', 29),
(520, 'MALLARAM', 29),
(521, 'LINGAMPALLE', 29),
(522, 'JAYAVARAM', 29),
(523, 'VEMULAWADA (R)', 29),
(524, 'SANKEPALLE', 29),
(525, 'NAMPALLE', 29),
(526, 'THIPPAPURAM', 29),
(527, 'MARUPAKA', 29),
(528, 'CHANDRAGIRI', 29),
(529, 'THETTAKUNTA', 29),
(530, 'KODUMUNJA', 29),
(531, 'ANUPURAM', 29),
(532, 'RUDRARAM', 29),
(533, 'RUDRANGI', 30),
(534, 'MALLIAL', 30),
(535, 'CHANDURTHI', 30),
(536, 'THIMMAPURAM(PN)', 30),
(537, 'ANANTHAPALLE(PK)', 30),
(538, 'MOODEPALLE', 30),
(539, 'MARRIGADDA', 30),
(540, 'JOGAPURAM', 30),
(541, 'LINGAMPETA', 30),
(542, 'SANGULA', 30),
(543, 'BANDAPALLE', 30),
(544, 'YANGAL', 30),
(545, 'PEGGERLA', 31),
(546, 'OOTPALLE', 31),
(547, 'BHUSHANRAO PETA', 31),
(548, 'KATHLAPUR', 31),
(549, 'NAGAMALLAPPA KUNTA', 31),
(550, 'SIRKONDA', 31),
(551, 'THAKKALLAPALLE', 31),
(552, 'BOMMENA', 31),
(553, 'DULUR', 31),
(554, 'DUMPETA', 31),
(555, 'CHINTHAKUNTA', 31),
(556, 'POSANIPETA', 31),
(557, 'GAMBHIRPUR', 31),
(558, 'THANDRIYAL', 31),
(559, 'IPPAPALLE', 31),
(560, 'POTHARAM', 31),
(561, 'KALIKOTA', 31),
(562, 'AMBARIPET', 31),
(563, 'THURTHI', 31),
(564, 'PORMALLA', 32),
(565, 'KATLAKUNTA', 32),
(566, 'THOMBARAO PETA', 32),
(567, 'MEDIPALLE', 32),
(568, 'KONDAPUR', 32),
(569, 'VALLAMPALLE', 32),
(570, 'MACHAPUR', 32),
(571, 'DAMMANNAPETA', 32),
(572, 'KALVAKOTA', 32),
(573, 'RANGAPUR', 32),
(574, 'KACHARAM', 32),
(575, 'VENKATARAOPETA', 32),
(576, 'RAGHOJIPETA', 32),
(577, 'BHEEMARAM', 32),
(578, 'MANNNEGUDEM', 32),
(579, 'LINGAMPETA', 32),
(580, 'GOVINDARAM', 32),
(581, 'VODDEDU', 32),
(582, 'PASNOOR', 32),
(583, 'MARRIMADLA', 33),
(584, 'VATTIMALLA', 33),
(585, 'NIMMAPALLE', 33),
(586, 'LACHCHAPETA', 33),
(587, 'KONDAPURAM', 33),
(588, 'BAUSAIPETA', 33),
(589, 'MAMIDIPALLE', 33),
(590, 'VENKATRAOPETA', 33),
(591, 'KONARAOPETA', 33),
(592, 'SIVANGALAPALLE', 33),
(593, 'NIZAMABAD', 33),
(594, 'KANAGARTHI', 33),
(595, 'PALLE(MAKTA)', 33),
(596, 'SUDDALA', 33),
(597, 'RAMANNAPETA', 33),
(598, 'NAGARAM', 33),
(599, 'MALKAPETA', 33),
(600, 'DHARMARAM', 33),
(601, 'MARTHANPETA', 33),
(602, 'KOLANUR', 33);

-- --------------------------------------------------------

--
-- Table structure for table `wardmaster`
--

CREATE TABLE IF NOT EXISTS `wardmaster` (
  `wardid` int(11) NOT NULL AUTO_INCREMENT,
  `wardname` varchar(50) NOT NULL,
  `mandalid` varchar(20) NOT NULL,
  PRIMARY KEY (`wardid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wardmaster`
--

INSERT INTO `wardmaster` (`wardid`, `wardname`, `mandalid`) VALUES
(1, '1', '59');

-- --------------------------------------------------------

--
-- Table structure for table `workmanagement`
--

CREATE TABLE IF NOT EXISTS `workmanagement` (
  `workid` int(11) NOT NULL AUTO_INCREMENT,
  `scheme` varchar(50) NOT NULL,
  `constituency` varchar(50) NOT NULL,
  `mandal` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `nameofthework` varchar(100) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `typeofwork` varchar(50) NOT NULL,
  `estimatecost` varchar(50) NOT NULL,
  `adminsancationdate` varchar(20) NOT NULL,
  `adminsanctionno` varchar(50) NOT NULL,
  `uploadcopyoftheletter` text NOT NULL,
  `contractor` varchar(50) NOT NULL,
  `dateoffoundationstonelayed` varchar(50) NOT NULL,
  `sitephotosbeforeworkstarted` text NOT NULL,
  `currentstatus` varchar(20) NOT NULL,
  `dateofcompletion` varchar(20) NOT NULL,
  `photosoncompletion` text NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`workid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `workmanagement`
--

INSERT INTO `workmanagement` (`workid`, `scheme`, `constituency`, `mandal`, `village`, `nameofthework`, `locality`, `typeofwork`, `estimatecost`, `adminsancationdate`, `adminsanctionno`, `uploadcopyoftheletter`, `contractor`, `dateoffoundationstonelayed`, `sitephotosbeforeworkstarted`, `currentstatus`, `dateofcompletion`, `photosoncompletion`, `remarks`) VALUES
(1, '1', 'karimnagar', '1', '2', 'testing123', '1', '1', '122222', '12/11/2013', '12332', '1384597488Jellyfish.jpg,1384597488Koala.jpg,1384597488Penguins.jpg', '1', '13/11/2013', '1384597488Chrysanthemum.jpg,1384597488Jellyfish.jpg', '1', '08/11/2013', '1384597488contractormaster.sql,1384597488localitymaster.sql,1384597488schememaster.sql,1384597488workmanagement.sql', 'ewdrwfrdewfexsaxsawdsfdsfsqwdsadac');

-- --------------------------------------------------------

--
-- Table structure for table `worktypemaster`
--

CREATE TABLE IF NOT EXISTS `worktypemaster` (
  `worktypeid` int(11) NOT NULL AUTO_INCREMENT,
  `worktypename` varchar(100) NOT NULL,
  PRIMARY KEY (`worktypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `worktypemaster`
--

INSERT INTO `worktypemaster` (`worktypeid`, `worktypename`) VALUES
(1, 'Test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
