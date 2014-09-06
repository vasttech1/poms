-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2013 at 01:40 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vtplc276_workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `minorheads`
--

CREATE TABLE IF NOT EXISTS `minorheads` (
  `minorheadid` int(11) NOT NULL AUTO_INCREMENT,
  `majorhead` int(11) NOT NULL,
  `minorheadcode` varchar(50) NOT NULL,
  `minorheadname` varchar(100) NOT NULL,
  PRIMARY KEY (`minorheadid`),
  KEY `majorhead` (`majorhead`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `minorheads`
--

INSERT INTO `minorheads` (`minorheadid`, `majorhead`, `minorheadcode`, `minorheadname`) VALUES
(1, 1, '10', 'Salaries, Wages and Bonus'),
(2, 1, '20', 'Benefits and Allowances'),
(3, 1, '30', 'Pension'),
(4, 1, '40', 'Other Terminal & Retirement Benefits'),
(5, 2, '10', 'Rent, Rates and Taxes'),
(6, 2, '11', 'Office maintenance'),
(7, 2, '12', 'Communication Expenses'),
(8, 2, '20', 'Books & Periodicals'),
(9, 2, '21', 'Printing and Stationery'),
(10, 2, '30', 'Traveling & Conveyance'),
(11, 2, '40', 'Insurance'),
(12, 2, '50', 'Audit Fees'),
(13, 2, '51', 'Legal Expenses'),
(14, 2, '52', 'Professional and other Fees'),
(15, 2, '60', 'Advertisement and Publicity'),
(16, 2, '61', 'Membership & subscriptions'),
(17, 2, '80', 'Others'),
(18, 3, '10', 'Power & Fuel'),
(19, 3, '20', 'Bulk Purchases'),
(20, 3, '30', 'Consumption of Stores'),
(21, 3, '40', 'Hire Charges'),
(22, 3, '50', 'Repairs & maintenance Infrastructure Assets'),
(23, 3, '51', 'Repairs & maintenance â€“ Civic Amenities'),
(24, 3, '52', 'Repairs & maintenance â€“ Buildings'),
(25, 3, '53', 'Repairs & maintenance â€“ Vehicles'),
(26, 3, '59', 'Repairs & maintenance â€“ Others'),
(27, 3, '80', 'Other operating & maintenance expenses'),
(28, 4, '10', 'Interest on Loans from Central Government'),
(29, 4, '20', 'Interest on Loans from State  Government'),
(30, 4, '30', 'Interest on Loans from Government Bodies & Associations '),
(31, 4, '40', 'Interest on Loans from International Agencies'),
(32, 4, '50', 'Interest on Loans from Banks & Other Financial Institutions'),
(33, 4, '60', 'Other Interest '),
(34, 4, '70', 'Bank Charges'),
(35, 4, '80', 'Other Finance Expenses'),
(36, 5, '10', 'Election Expenses'),
(37, 5, '20', 'Own Programme'),
(38, 5, '30', 'Share in Programme of others'),
(39, 6, '10', 'Grants'),
(40, 6, '20', 'Contributions'),
(41, 6, '30', 'Subsidies'),
(42, 7, '10', 'Provisions for Doubtful receivables'),
(43, 7, '20', 'Provision for other Assets'),
(44, 7, '30', 'Revenues written off'),
(45, 7, '40', 'Assets written off'),
(46, 7, '50', 'Miscellaneous Expense written off'),
(47, 8, '10', 'Loss on disposal of Assets'),
(48, 8, '20', 'Loss on disposal of Investments'),
(49, 8, '30', 'Decline in Value of Investments'),
(50, 8, '80', 'Other miscellaneous expenditure'),
(51, 9, '20', 'Buildings'),
(52, 9, '30', 'Roads & Bridges'),
(53, 9, '31', 'Sewerage and Drainage'),
(54, 9, '32', 'Waterworks'),
(55, 9, '33', 'Public Lighting'),
(56, 9, '40', 'Plant & machinery'),
(57, 9, '50', 'Vehicles'),
(58, 9, '60', 'Office & Other Equipments'),
(59, 9, '70', 'Furniture Fixtures  Fittings & Electrical Appliances'),
(60, 9, '80', 'Other Fixed Assets'),
(61, 10, '10', 'Taxes'),
(62, 10, '20', 'Other Revenues'),
(63, 10, '30', 'Recovery of revenues written off'),
(64, 10, '40', 'Other Income Expenses'),
(65, 10, '50', 'Refund of Taxes'),
(66, 10, '60', 'Refund of Other Revenues'),
(67, 10, '80', 'Other Expenses'),
(68, 11, '10', 'Transfer to Capital Funds'),
(69, 11, '20', 'Transfer to Earmarked Funds'),
(70, 11, '30', 'Revenue Surplus'),
(71, 12, '10', 'Land'),
(72, 12, '20', 'Buildings'),
(73, 12, '30', 'Roads & Bridges'),
(74, 12, '31', 'Sewerage and Drainage'),
(75, 12, '32', 'Water works'),
(76, 12, '33', 'Public Lighting'),
(77, 12, '40', 'Plant & Machinery'),
(78, 12, '50', 'Vehicles'),
(79, 12, '60', 'Office & Other Equipments'),
(80, 12, '70', 'Furniture, Fixtures, Fittings and Electrical Appliances'),
(81, 12, '80', 'Other Fixed Assets'),
(82, 12, '90', 'Assets under Disposal'),
(83, 13, '20', 'Buildings'),
(84, 13, '30', 'Roads & Bridges'),
(85, 13, '31', 'Sewerage and Drainage'),
(86, 13, '32', 'Water Works'),
(87, 13, '33', 'Public Lighting'),
(88, 13, '40', 'Plant & Machinery'),
(89, 13, '50', 'Vehicles'),
(90, 13, '60', 'Office & Other Equipments'),
(91, 13, '70', 'Furniture, Fixtures, Fittings and Electrical Appliances'),
(92, 13, '80', 'Other Fixed Assets'),
(93, 14, '20', 'Capital work in Progress - Buildings'),
(94, 14, '30', 'Roads & Bridges'),
(95, 14, '31', 'Sewerage and Drainage'),
(96, 14, '32', 'Water Works'),
(97, 14, '33', 'Public Lighting'),
(98, 14, '40', 'Plant & Machinery'),
(99, 14, '50', 'Vehicles'),
(100, 14, '70', 'Furniture, Fixtures, Fittings and Electrical Appliances'),
(101, 14, '80', 'Other Fixed Assets'),
(102, 15, '10', 'Central Government Securities'),
(103, 15, '20', 'State Government Securities'),
(104, 15, '30', 'Debentures and Bonds'),
(105, 15, '40', 'Preference Shares'),
(106, 15, '50', 'Equity Shares'),
(107, 15, '60', 'Units of Mutual Funds'),
(108, 15, '80', 'Other Investments'),
(109, 15, '90', 'Accumulated Provision'),
(110, 16, '10', 'Central Government Securities'),
(111, 16, '20', 'State Government Securities'),
(112, 16, '30', 'Debentures and Bonds'),
(113, 16, '40', 'Preference Shares'),
(114, 16, '50', 'Equity Shares'),
(115, 16, '60', 'Units of Mutual Funds '),
(116, 16, '80', 'Other Investments'),
(117, 16, '90', 'Accumulated Provision'),
(118, 17, '10', 'Stores'),
(119, 17, '20', 'Loose Tools'),
(120, 17, '80', 'Others'),
(121, 18, '10', 'Receivables for Property Taxes'),
(122, 18, '19', 'Receivable for Other Taxes'),
(123, 18, '20', 'Receivables for Cess'),
(124, 18, '30', 'Receivable for Fees & User Charges'),
(125, 18, '40', 'Receivable from other sources'),
(126, 18, '50', 'Receivable from Government'),
(127, 18, '80', 'Receivables control accounts'),
(128, 18, '91', 'State Govt Cess/ levies in Property Taxes - Control account'),
(129, 18, '92', 'State Govt Cess/ levies in Water Taxes - Control account'),
(130, 18, '99', 'State Govt Cess/ levies in Other Taxes - Control account'),
(131, 19, '10', 'Provision for outstanding  Property Taxes'),
(132, 19, '11', 'Provision for outstanding  Water Taxes'),
(133, 19, '12', 'Provision for outstanding  Other Taxes'),
(134, 19, '20', 'Provision for outstanding  Cess'),
(135, 19, '30', 'Provision for outstanding Fees & User Charges'),
(136, 19, '40', 'Provision for outstanding other receivable'),
(137, 19, '91', 'State Govt Cess/ levies in Property Taxes - Provision account'),
(138, 19, '92', 'State Govt Cess/ levies in Water Taxes - Provision account'),
(139, 19, '99', 'State Govt Cess/ levies in Other Taxes - Provision account'),
(140, 20, '10', 'Establishment'),
(141, 20, '20', 'Administration'),
(142, 20, '30', 'Operations & Maintenance'),
(143, 21, '10', 'Cash Balance with Bank - Municipal Fund'),
(144, 21, '21', 'Nationalised Banks'),
(145, 21, '22', 'Other Scheduled Banks'),
(146, 21, '23', 'Scheduled Co-operative Banks'),
(147, 21, '24', 'Post Office Balance with Bank - Special Funds'),
(148, 21, '41', 'Nationalised Banks'),
(149, 21, '42', 'Other Scheduled Banks'),
(150, 21, '43', 'Scheduled Co-operative Banks'),
(151, 21, '44', 'Post Office Balance with Bank - Grant Funds'),
(152, 21, '61', 'Nationalized Banks'),
(153, 21, '62', 'Other Scheduled Banks'),
(154, 21, '63', 'Scheduled Co-operative Banks'),
(155, 21, '64', 'Post Office'),
(156, 22, '10', 'Loans and advances to employees'),
(157, 22, '20', 'Employee Provident Fund Loans'),
(158, 22, '30', 'Loans to Others'),
(159, 22, '40', 'Advance to Suppliers and contractors'),
(160, 22, '50', 'Advance to others'),
(161, 22, '60', 'Deposits with external Agencies'),
(162, 22, '80', 'Other Current Assets'),
(163, 23, '10', 'Loans to Others'),
(164, 23, '20', 'Advances'),
(165, 23, '30', 'Deposits'),
(166, 24, '10', 'Deposit Works – Expenditure'),
(167, 24, '20', 'Inter Unit Accounts'),
(168, 24, '30', 'Interest Control Payable'),
(169, 25, '10', 'Loan Issue Expenses'),
(170, 25, '20', 'Discount on Issue of loans'),
(171, 25, '30', 'Others');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `minorheads`
--
ALTER TABLE `minorheads`
  ADD CONSTRAINT `minorheads_ibfk_1` FOREIGN KEY (`majorhead`) REFERENCES `majorheads` (`majorheadid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
