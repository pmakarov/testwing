-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2014 at 03:14 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcma`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 240),
(2, 1, NULL, NULL, 'Groups', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Pages', 14, 17),
(9, 8, NULL, NULL, 'display', 15, 16),
(10, 1, NULL, NULL, 'Posts', 18, 29),
(11, 10, NULL, NULL, 'index', 19, 20),
(12, 10, NULL, NULL, 'view', 21, 22),
(13, 10, NULL, NULL, 'add', 23, 24),
(14, 10, NULL, NULL, 'edit', 25, 26),
(15, 10, NULL, NULL, 'delete', 27, 28),
(16, 1, NULL, NULL, 'Users', 30, 61),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 16, NULL, NULL, 'login', 41, 42),
(23, 16, NULL, NULL, 'logout', 43, 44),
(24, 1, NULL, NULL, 'Widgets', 62, 73),
(25, 24, NULL, NULL, 'index', 63, 64),
(26, 24, NULL, NULL, 'view', 65, 66),
(27, 24, NULL, NULL, 'add', 67, 68),
(28, 24, NULL, NULL, 'edit', 69, 70),
(29, 24, NULL, NULL, 'delete', 71, 72),
(30, 1, NULL, NULL, 'AclExtras', 74, 75),
(31, 1, NULL, NULL, 'Batches', 76, 87),
(32, 31, NULL, NULL, 'index', 77, 78),
(33, 31, NULL, NULL, 'view', 79, 80),
(34, 31, NULL, NULL, 'add', 81, 82),
(35, 31, NULL, NULL, 'edit', 83, 84),
(36, 31, NULL, NULL, 'delete', 85, 86),
(37, 1, NULL, NULL, 'Contacts', 88, 93),
(38, 37, NULL, NULL, 'send', 89, 90),
(39, 37, NULL, NULL, 'index', 91, 92),
(41, 1, NULL, NULL, 'Uploads', 94, 95),
(42, 1, NULL, NULL, 'Customers', 96, 107),
(43, 42, NULL, NULL, 'index', 97, 98),
(44, 42, NULL, NULL, 'view', 99, 100),
(45, 42, NULL, NULL, 'add', 101, 102),
(46, 42, NULL, NULL, 'edit', 103, 104),
(47, 42, NULL, NULL, 'delete', 105, 106),
(48, 1, NULL, NULL, 'Uploads', 108, 109),
(49, 1, NULL, NULL, 'Uploads', 110, 125),
(51, 49, NULL, NULL, 'index', 111, 112),
(52, 49, NULL, NULL, 'view', 113, 114),
(53, 49, NULL, NULL, 'add', 115, 116),
(54, 49, NULL, NULL, 'edit', 117, 118),
(55, 49, NULL, NULL, 'delete', 119, 120),
(56, 16, NULL, NULL, 'install', 45, 46),
(57, 16, NULL, NULL, 'register', 47, 48),
(58, 16, NULL, NULL, 'recover', 49, 50),
(59, 16, NULL, NULL, 'verify', 51, 52),
(60, 16, NULL, NULL, 'account', 53, 54),
(61, 16, NULL, NULL, 'dashboard', 55, 56),
(62, 16, NULL, NULL, 'dashboard_administrators', 57, 58),
(63, 16, NULL, NULL, 'dashboard_users', 59, 60),
(64, 1, NULL, NULL, 'TwitterBootstrap', 126, 127),
(65, 1, NULL, NULL, 'EdiTypes', 128, 139),
(66, 65, NULL, NULL, 'index', 129, 130),
(67, 65, NULL, NULL, 'view', 131, 132),
(68, 65, NULL, NULL, 'add', 133, 134),
(69, 65, NULL, NULL, 'edit', 135, 136),
(70, 65, NULL, NULL, 'delete', 137, 138),
(71, 49, NULL, NULL, 'uploadFile', 121, 122),
(72, 49, NULL, NULL, 'rrmdir', 123, 124),
(73, 1, NULL, NULL, 'Comments', 140, 151),
(74, 73, NULL, NULL, 'index', 141, 142),
(75, 73, NULL, NULL, 'view', 143, 144),
(76, 73, NULL, NULL, 'add', 145, 146),
(77, 73, NULL, NULL, 'edit', 147, 148),
(78, 73, NULL, NULL, 'delete', 149, 150),
(79, 1, NULL, NULL, 'TransactionStatuses', 152, 163),
(80, 79, NULL, NULL, 'index', 153, 154),
(81, 79, NULL, NULL, 'view', 155, 156),
(82, 79, NULL, NULL, 'add', 157, 158),
(83, 79, NULL, NULL, 'edit', 159, 160),
(84, 79, NULL, NULL, 'delete', 161, 162),
(85, 1, NULL, NULL, 'Transactions', 164, 179),
(86, 85, NULL, NULL, 'index', 165, 166),
(87, 85, NULL, NULL, 'view', 167, 168),
(88, 85, NULL, NULL, 'add', 169, 170),
(89, 85, NULL, NULL, 'edit', 171, 172),
(90, 85, NULL, NULL, 'delete', 173, 174),
(91, 85, NULL, NULL, 'get_transactions_by_upload_id', 175, 176),
(92, 1, NULL, NULL, 'TransactionRejectionTypes', 180, 191),
(93, 92, NULL, NULL, 'index', 181, 182),
(94, 92, NULL, NULL, 'view', 183, 184),
(95, 92, NULL, NULL, 'add', 185, 186),
(96, 92, NULL, NULL, 'edit', 187, 188),
(97, 92, NULL, NULL, 'delete', 189, 190),
(98, 1, NULL, NULL, 'TransactionRejections', 192, 203),
(99, 98, NULL, NULL, 'index', 193, 194),
(100, 98, NULL, NULL, 'view', 195, 196),
(101, 98, NULL, NULL, 'add', 197, 198),
(102, 98, NULL, NULL, 'edit', 199, 200),
(103, 98, NULL, NULL, 'delete', 201, 202),
(104, 85, NULL, NULL, 'set_transaction_data', 177, 178),
(105, 1, NULL, NULL, 'CommentTypes', 204, 215),
(106, 105, NULL, NULL, 'index', 205, 206),
(107, 105, NULL, NULL, 'view', 207, 208),
(108, 105, NULL, NULL, 'add', 209, 210),
(109, 105, NULL, NULL, 'edit', 211, 212),
(110, 105, NULL, NULL, 'delete', 213, 214),
(111, 1, NULL, NULL, 'CommentsTags', 216, 227),
(112, 111, NULL, NULL, 'index', 217, 218),
(113, 111, NULL, NULL, 'view', 219, 220),
(114, 111, NULL, NULL, 'add', 221, 222),
(115, 111, NULL, NULL, 'edit', 223, 224),
(116, 111, NULL, NULL, 'delete', 225, 226),
(117, 1, NULL, NULL, 'Tags', 228, 239),
(118, 117, NULL, NULL, 'index', 229, 230),
(119, 117, NULL, NULL, 'view', 231, 232),
(120, 117, NULL, NULL, 'add', 233, 234),
(121, 117, NULL, NULL, 'edit', 235, 236),
(122, 117, NULL, NULL, 'delete', 237, 238);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, NULL, 'Group', 2, NULL, 5, 8),
(3, NULL, 'Group', 3, NULL, 9, 12),
(4, 1, 'User', 1, NULL, 2, 3),
(5, 2, 'User', 2, NULL, 6, 7),
(6, 3, 'User', 3, NULL, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 10, '1', '1', '1', '1'),
(4, 2, 24, '1', '1', '1', '1'),
(5, 3, 1, '-1', '-1', '-1', '-1'),
(6, 3, 13, '1', '1', '1', '1'),
(7, 3, 14, '1', '1', '1', '1'),
(8, 3, 27, '1', '1', '1', '1'),
(9, 3, 28, '1', '1', '1', '1'),
(10, 3, 23, '1', '1', '1', '1'),
(11, 1, 31, '1', '1', '1', '1'),
(12, 1, 41, '1', '1', '1', '1'),
(13, 1, 42, '1', '1', '1', '1'),
(14, 1, 48, '1', '1', '1', '1'),
(15, 1, 49, '1', '1', '1', '1'),
(16, 1, 92, '1', '1', '1', '1'),
(17, 1, 98, '1', '1', '1', '1'),
(18, 1, 105, '1', '1', '1', '1'),
(19, 1, 111, '1', '1', '1', '1'),
(20, 1, 117, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `window` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `comment_type_id` int(11) NOT NULL,
  `primary` tinyint(1) NOT NULL,
  `transaction_rejection_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `transaction_id`, `text`, `comment_type_id`, `primary`, `transaction_rejection_type_id`) VALUES
(1, 20, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(2, 3, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(3, 39, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(4, 24, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(5, 24, 'Reveal reports:006 DUPLICATE RECORD', 2, 0, 0),
(6, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(7, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(8, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(9, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(10, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(11, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(12, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(13, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(14, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(15, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(16, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(17, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(18, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(19, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(20, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(21, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(22, 24, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(23, 7, 'Reveal reports:272 F/C-INV DEL,QTY SHPD NOT ZERO', 2, 0, 0),
(24, 7, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(25, 7, 'Reveal reports:B84 STR-ACRN', 2, 0, 0),
(26, 7, 'Reveal reports:692 R/D-NAL-NAC/PAC ACRN', 2, 0, 0),
(27, 38, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(28, 41, 'Reveal reports:681 R/D-NAH/PAH-NAC/PAC AT ACRN', 2, 0, 0),
(29, 41, 'Reveal reports:006 DUPLICATE RECORD', 2, 0, 0),
(30, 41, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(31, 43, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(32, 12, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(33, 12, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(34, 12, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(35, 12, 'Reveal reports:840 BAL-U/P X ORD QTY=TOT-ITM-AMT', 2, 0, 0),
(36, 12, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(37, 12, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(38, 12, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(39, 12, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(40, 12, 'Reveal reports:840 BAL-U/P X ORD QTY=TOT-ITM-AMT', 2, 0, 0),
(41, 12, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(42, 45, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(43, 47, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(44, 34, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(45, 34, 'Reveal reports:417 STR-PQA SITE', 2, 0, 0),
(46, 34, 'Reveal reports:442 STR-ACPT SITE', 2, 0, 0),
(47, 34, 'Reveal reports:681 R/D-NAH/PAH-NAC/PAC AT ACRN', 2, 0, 0),
(48, 21, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(49, 13, 'Reveal reports:394 CONTRR-FACIL NOT A VALID CAGE', 2, 0, 0),
(50, 13, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(51, 17, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(52, 17, 'Reveal reports:006 DUPLICATE RECORD', 2, 0, 0),
(53, 6, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(54, 6, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(55, 4, 'Reveal reports:001 DUP SCHED DATA IN ABSTR', 2, 0, 0),
(56, 4, 'Reveal reports:006 DUPLICATE RECORD', 2, 0, 0),
(57, 4, 'Reveal reports:068 *INVALID ADD TRANS', 2, 0, 0),
(58, 18, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(59, 32, 'Reveal reports:002 DUP LINE ITEM DATA IN ABSTR', 2, 0, 0),
(60, 32, 'Reveal reports:B85 STR-INSP/ACCPT CODE', 2, 0, 0),
(61, 32, 'Reveal reports:692 R/D-NAL-NAC/PAC ACRN', 2, 0, 0),
(62, 37, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(63, 37, 'Reveal reports:417 STR-PQA SITE', 2, 0, 0),
(64, 37, 'Reveal reports:442 STR-ACPT SITE', 2, 0, 0),
(65, 37, 'Reveal reports:681 R/D-NAH/PAH-NAC/PAC AT ACRN', 2, 0, 0),
(66, 5, 'Reveal reports:002 DUP LINE ITEM DATA IN ABSTR', 2, 0, 0),
(67, 5, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(68, 5, 'Reveal reports:B85 STR-INSP/ACCPT CODE', 2, 0, 0),
(69, 22, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(70, 22, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(71, 22, 'Reveal reports:B85 STR-INSP/ACCPT CODE', 2, 0, 0),
(72, 22, 'Reveal reports:692 R/D-NAL-NAC/PAC ACRN', 2, 0, 0),
(73, 19, 'Reveal reports:841 BAL-ORD-QTY-(CLIN/ELIN)', 2, 0, 0),
(74, 19, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(75, 42, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(76, 36, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(77, 16, 'Reveal reports:001 DUP SCHED DATA IN ABSTR', 2, 0, 0),
(78, 15, 'Reveal reports:002 DUP LINE ITEM DATA IN ABSTR', 2, 0, 0),
(79, 15, 'Reveal reports:B85 STR-INSP/ACCPT CODE', 2, 0, 0),
(80, 11, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(81, 8, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(82, 23, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(83, 23, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(84, 23, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(85, 14, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(86, 48, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(87, 48, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(88, 48, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(89, 31, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(90, 31, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(91, 31, 'Reveal reports:073 * UNMATCHED DELETE TRAN', 2, 0, 0),
(92, 9, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(93, 9, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(94, 46, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(95, 46, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(96, 46, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(97, 46, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(98, 30, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(99, 30, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(100, 10, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(101, 28, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(102, 44, 'Reveal reports:012 *F/C-MOD/CORR/NET W/OUT BASIC', 2, 0, 0),
(103, 44, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0),
(104, 44, 'Reveal reports:067 * UNMATCHED CHANGE TRAN', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments_tags`
--

CREATE TABLE IF NOT EXISTS `comments_tags` (
  `comment_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_types`
--

CREATE TABLE IF NOT EXISTS `comment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment_types`
--

INSERT INTO `comment_types` (`id`, `name`) VALUES
(1, 'STANDARD'),
(2, 'ERROR');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `created`, `modified`) VALUES
('533d8452-d488-483f-8f5b-1f58fe516296', 'Navy SPS', 'test@navy.mail.mil', '2014-04-03 15:54:58', '2014-04-03 17:13:35'),
('533d96ca-b418-4de7-8938-1f58fe516296', 'Navy ITIIMP', 'test@navy.mail.mil', '2014-04-03 17:13:46', '2014-04-03 17:13:46'),
('533d96df-3ad4-4149-8c2e-1f58fe516296', 'Army PADDS', 'test@army.mail.mil', '2014-04-03 17:14:07', '2014-04-03 17:14:07'),
('533d96f8-ae3c-422f-9846-1f58fe516296', 'Army SPS', 'test@army.mail.mil', '2014-04-03 17:14:32', '2014-04-03 17:14:32'),
('533d972c-4fe0-4fdd-82f3-1f58fe516296', 'USMC SPS', 'test@marines.mail.mil', '2014-04-03 17:15:24', '2014-04-03 17:15:24'),
('5343511d-4398-4291-9778-137cfe516296', 'Navy Seaport', 'test@navy.mail.mil', '2014-04-08 01:30:05', '2014-04-08 01:30:05'),
('5350053a-bbd0-45a1-9d08-0294fe516296', 'DLA eProcurement', 'test@gov.gov', '2014-04-17 16:45:46', '2014-04-17 16:45:46'),
('53500574-2e04-4d1b-a724-0294fe516296', 'OSD', 'bruce@osd.mil', '2014-04-17 16:46:44', '2014-04-17 16:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `edi_types`
--

CREATE TABLE IF NOT EXISTS `edi_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `edi_types`
--

INSERT INTO `edi_types` (`id`, `name`) VALUES
(1, '850'),
(2, '860');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2014-03-30 19:25:03', '2014-03-30 19:25:03'),
(2, 'managers', '2014-03-30 19:25:14', '2014-03-30 19:25:14'),
(3, 'users', '2014-03-30 19:25:19', '2014-03-30 19:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created`, `modified`) VALUES
(1, 3, '1st post', 'this is a sample first post by this user.', '2014-03-30 22:28:25', '2014-03-30 22:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created`, `modified`) VALUES
(1, 'MOCAS', '2014-04-22 02:57:25', '2014-04-22 02:57:25'),
(2, 'User', '2014-04-22 02:57:35', '2014-04-22 02:57:35'),
(3, 'Known Issue', '2014-04-22 02:58:10', '2014-04-22 02:58:10'),
(4, 'Test Bed', '2014-04-22 02:58:47', '2014-04-22 02:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `upload_id` int(11) NOT NULL,
  `xmlfile` varchar(255) DEFAULT NULL,
  `edifile` varchar(255) DEFAULT NULL,
  `udffile` varchar(255) DEFAULT NULL,
  `transaction_status_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `upload_id`, `xmlfile`, `edifile`, `udffile`, `transaction_status_id`, `created`, `modified`) VALUES
(1, 'SPM7L413M0238P00002', 1, 'IPR-INT-14396_MOCAS_I00053418.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053418.20140415165916_1.edi', '20140415-XCWT860.DT_EP1893.IPR-INT-14396_MOCAS_I00053418.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(2, 'SPRPA109G004YZ62R02', 1, 'IPR-INT-14396_MOCAS_I00053422.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053422.20140415165916_1.edi', '20140415-XCWT860.DT_EP1888.IPR-INT-14396_MOCAS_I00053422.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(3, 'SPM5E414M0109P00001', 1, 'IPR-INT-14396_MOCAS_I00053423.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053423.20140415165916_1.edi', '20140415-XCWT860.DT_EP1889.IPR-INT-14396_MOCAS_I00053423.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(4, 'SPM7LA13M3763P00001', 1, 'IPR-INT-14396_MOCAS_I00053424.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053424.20140415165916_1.edi', '20140415-XCWT860.DT_EP1898.IPR-INT-14396_MOCAS_I00053424.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(5, 'SPE4A713M6270P00003', 1, 'IPR-INT-14396_MOCAS_I00053425.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053425.20140415165916_1.edi', '20140415-XCWT860.DT_EP1902.IPR-INT-14396_MOCAS_I00053425.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(6, 'SPE4A713M1562P00002', 1, 'IPR-INT-14396_MOCAS_I00053434.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053434.20140415165916_1.edi', '20140415-XCWT860.DT_EP1907.IPR-INT-14396_MOCAS_I00053434.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(7, 'SPM5L509D0016002201', 1, 'IPR-INT-14396_MOCAS_I00053439.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053439.20140415165916_1.edi', '20140415-XCWT860.DT_EP1911.IPR-INT-14396_MOCAS_I00053439.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(8, 'SPE7L414M1612P00002', 1, 'IPR-INT-14396_MOCAS_I00053442.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053442.20140415165916_1.edi', '20140415-XCWT860.DT_EP1896.IPR-INT-14396_MOCAS_I00053442.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(9, 'SPM7LX11D015783PH01', 1, 'IPR-INT-14396_MOCAS_I00053447.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053447.20140415165916_1.edi', '20140415-XCWT860.DT_EP1917.IPR-INT-14396_MOCAS_I00053447.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(10, 'SPE7L514M1382P00002', 1, 'IPR-INT-14396_MOCAS_I00053461.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053461.20140415165916_1.edi', '20140415-XCWT860.DT_EP1932.IPR-INT-14396_MOCAS_I00053461.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(11, 'SPRTA112G0006U35001', 1, 'IPR-INT-14396_MOCAS_I00053463.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053463.20140415165916_1.edi', '20140415-XCWT860.DT_EP1929.IPR-INT-14396_MOCAS_I00053463.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(12, 'SPM1C113D1025000902', 1, 'IPR-INT-14396_MOCAS_I00053468.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053468.20140415165916_1.edi', '20140415-XCWT860.DT_EP1940.IPR-INT-14396_MOCAS_I00053468.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(13, 'SPM7LX11D015781RC01', 1, 'IPR-INT-14396_MOCAS_I00053469.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053469.20140415165916_1.edi', '20140415-XCWT860.DT_EP1935.IPR-INT-14396_MOCAS_I00053469.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(14, 'SPE7L014V2729P00001', 1, 'IPR-INT-14396_MOCAS_I00053470.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053470.20140415165916_1.edi', '20140415-XCWT860.DT_EP1938.IPR-INT-14396_MOCAS_I00053470.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(15, 'SPE4A713M9597P00001', 1, 'IPR-INT-14396_MOCAS_I00053472.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053472.20140415165916_1.edi', '20140415-XCWT860.DT_EP1948.IPR-INT-14396_MOCAS_I00053472.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(16, 'SPE4A414M0692P00003', 1, 'IPR-INT-14396_MOCAS_I00053479.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053479.20140415165916_1.edi', '20140415-XCWT860.DT_EP1950.IPR-INT-14396_MOCAS_I00053479.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(17, 'SPE4A712M6460P00001', 1, 'IPR-INT-14396_MOCAS_I00053486.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053486.20140415165916_1.edi', '20140415-XCWT860.DT_EP1976.IPR-INT-14396_MOCAS_I00053486.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(18, 'SPE4A614M9563P00001', 1, 'IPR-INT-14396_MOCAS_I00053489.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053489.20140415165916_1.edi', '20140415-XCWT860.DT_EP1958.IPR-INT-14396_MOCAS_I00053489.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(19, 'SPE4A413M1078P00001', 1, 'IPR-INT-14396_MOCAS_I00053493.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053493.20140415165916_1.edi', '20140415-XCWT860.DT_EP1960.IPR-INT-14396_MOCAS_I00053493.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 18:13:50'),
(20, 'SPM4AX13D9401060501', 1, 'IPR-INT-14396_MOCAS_I00053497.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053497.20140415165916_1.edi', '20140415-XCWT860.DT_EP1962.IPR-INT-14396_MOCAS_I00053497.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(21, 'SPM7LX11D015778HL01', 1, 'IPR-INT-14396_MOCAS_I00053505.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053505.20140415165916_1.edi', '20140415-XCWT860.DT_EP1969.IPR-INT-14396_MOCAS_I00053505.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(22, 'SPM4A711MC976P00002', 1, 'IPR-INT-14396_MOCAS_I00053512.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053512.20140415165916_1.edi', '20140415-XCWT860.DT_EP1992.IPR-INT-14396_MOCAS_I00053512.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(23, 'SPM5L509D0016002101', 1, 'IPR-INT-14396_MOCAS_I00053513.20140415165916.xml', 'IPR-INT-14396_MOCAS_I00053513.20140415165916_1.edi', '20140415-XCWT860.DT_EP1993.IPR-INT-14396_MOCAS_I00053513.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(24, 'SPM7L413C0012P00004', 1, 'IPR-INT-14396_MOCAS_P00203231.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203231.20140415170202_1.edi', '20140415-XCWT860.DT_EP1985.IPR-INT-14396_MOCAS_P00203231.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(25, 'SPE5E914V1481P00001', 1, 'IPR-INT-14396_MOCAS_P00203233.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203233.20140415170202_1.edi', '20140415-XCWT860.DT_EP2012.IPR-INT-14396_MOCAS_P00203233.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(26, 'SPE4A614C0172P00001', 1, 'IPR-INT-14396_MOCAS_P00203234.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203234.20140415170202_1.edi', '20140415-XCWT860.DT_EP1983.IPR-INT-14396_MOCAS_P00203234.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(27, 'SPE7M814M1543P00001', 1, 'IPR-INT-14396_MOCAS_P00203237.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203237.20140415170202_1.edi', '20140415-XCWT860.DT_EP1987.IPR-INT-14396_MOCAS_P00203237.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(28, 'SPE4A613D0186002101', 1, 'IPR-INT-14396_MOCAS_P00203238.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203238.20140415170202_1.edi', '20140415-XCWT860.DT_EP1991.IPR-INT-14396_MOCAS_P00203238.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(29, 'SPE7L414M1339P00001', 1, 'IPR-INT-14396_MOCAS_P00203240.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203240.20140415170202_1.edi', '20140415-XCWT860.DT_EP1988.IPR-INT-14396_MOCAS_P00203240.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(30, 'SPE4A614M8681P00001', 1, 'IPR-INT-14396_MOCAS_P00203241.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203241.20140415170202_1.edi', '20140415-XCWT860.DT_EP1994.IPR-INT-14396_MOCAS_P00203241.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(31, 'SPE4A614MC351P00001', 1, 'IPR-INT-14396_MOCAS_P00203249.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203249.20140415170202_1.edi', '20140415-XCWT860.DT_EP2014.IPR-INT-14396_MOCAS_P00203249.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(32, 'SPE4A613MR065P00001', 1, 'IPR-INT-14396_MOCAS_P00203254.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203254.20140415170202_1.edi', '20140415-XCWT860.DT_EP2013.IPR-INT-14396_MOCAS_P00203254.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(33, 'SPE7M014M0963P00001', 1, 'IPR-INT-14396_MOCAS_P00203258.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203258.20140415170202_1.edi', '20140415-XCWT860.DT_EP2010.IPR-INT-14396_MOCAS_P00203258.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(34, 'SPE4A613MM344P00001', 1, 'IPR-INT-14396_MOCAS_P00203260.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203260.20140415170202_1.edi', '20140415-XCWT860.DT_EP2025.IPR-INT-14396_MOCAS_P00203260.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(35, 'SPE4A414V4754P00001', 1, 'IPR-INT-14396_MOCAS_P00203264.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203264.20140415170202_1.edi', '20140415-XCWT860.DT_EP2016.IPR-INT-14396_MOCAS_P00203264.20.udf', 1, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(36, 'SPM7MC13M7684P00001', 1, 'IPR-INT-14396_MOCAS_P00203267.20140415170202.xml', 'IPR-INT-14396_MOCAS_P00203267.20140415170202_1.edi', '20140415-XCWT860.DT_EP2017.IPR-INT-14396_MOCAS_P00203267.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(37, 'SPM4A712M5566P00001', 1, 'IPR-INT-14396_MOCAS_P00203631.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203631.20140415170321_1.edi', '20140415-XCWT860.DT_EP2035.IPR-INT-14396_MOCAS_P00203631.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(38, 'SPE4A613MF620P00002', 1, 'IPR-INT-14396_MOCAS_P00203646.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203646.20140415170321_1.edi', '20140415-XCWT860.DT_EP2048.IPR-INT-14396_MOCAS_P00203646.20.udf', 2, '2014-04-23 14:41:30', '2014-04-23 14:41:31'),
(39, 'SPM4A111G001010J301', 1, 'IPR-INT-14396_MOCAS_P00203653.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203653.20140415170321_1.edi', '20140415-XCWT860.DT_EP2038.IPR-INT-14396_MOCAS_P00203653.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(40, 'SPE4A614M3294P00001', 1, 'IPR-INT-14396_MOCAS_P00203657.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203657.20140415170321_1.edi', '20140415-XCWT860.DT_EP2055.IPR-INT-14396_MOCAS_P00203657.20.udf', 1, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(41, 'SPE4A713M2123P00002', 1, 'IPR-INT-14396_MOCAS_P00203658.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203658.20140415170321_1.edi', '20140415-XCWT860.DT_EP2053.IPR-INT-14396_MOCAS_P00203658.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(42, 'SPE4A614M4379P00001', 1, 'IPR-INT-14396_MOCAS_P00203666.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203666.20140415170321_1.edi', '20140415-XCWT860.DT_EP2047.IPR-INT-14396_MOCAS_P00203666.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(43, 'SPE5E914M0124P00001', 1, 'IPR-INT-14396_MOCAS_P00203668.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203668.20140415170321_1.edi', '20140415-XCWT860.DT_EP2043.IPR-INT-14396_MOCAS_P00203668.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(44, 'SPE4A714M7587P00001', 1, 'IPR-INT-14396_MOCAS_P00203673.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203673.20140415170321_1.edi', '20140415-XCWT860.DT_EP2071.IPR-INT-14396_MOCAS_P00203673.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(45, 'SPE4A613C0029P00002', 1, 'IPR-INT-14396_MOCAS_P00203674.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203674.20140415170321_1.edi', '20140415-XCWT860.DT_EP2069.IPR-INT-14396_MOCAS_P00203674.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(46, 'SPE4A713M2263P00001', 1, 'IPR-INT-14396_MOCAS_P00203678.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203678.20140415170321_1.edi', '20140415-XCWT860.DT_EP2072.IPR-INT-14396_MOCAS_P00203678.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(47, 'SPE4A713MB443P00001', 1, 'IPR-INT-14396_MOCAS_P00203679.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203679.20140415170321_1.edi', '20140415-XCWT860.DT_EP2075.IPR-INT-14396_MOCAS_P00203679.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31'),
(48, 'SPE7M014M3042P00001', 1, 'IPR-INT-14396_MOCAS_P00203685.20140415170321.xml', 'IPR-INT-14396_MOCAS_P00203685.20140415170321_1.edi', '20140415-XCWT860.DT_EP2077.IPR-INT-14396_MOCAS_P00203685.20.udf', 2, '2014-04-23 14:41:31', '2014-04-23 14:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_rejections`
--

CREATE TABLE IF NOT EXISTS `transaction_rejections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `transaction_rejection_type_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction_rejections`
--

INSERT INTO `transaction_rejections` (`id`, `transaction_id`, `transaction_rejection_type_id`, `text`) VALUES
(1, 24, 2, 'MOCAS sucks, Carrol did it.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_rejection_types`
--

CREATE TABLE IF NOT EXISTS `transaction_rejection_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaction_rejection_types`
--

INSERT INTO `transaction_rejection_types` (`id`, `name`) VALUES
(1, 'USER'),
(2, 'MOCAS'),
(3, 'MAP'),
(4, 'KNOWN ISSUE'),
(5, 'TEST BED'),
(6, 'REPORT'),
(7, 'DATA');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_statuses`
--

CREATE TABLE IF NOT EXISTS `transaction_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction_statuses`
--

INSERT INTO `transaction_statuses` (`id`, `name`) VALUES
(1, 'ACCEPTED'),
(2, 'REJECTED'),
(3, 'RETEST');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `window` int(11) NOT NULL,
  `customer_id` char(36) NOT NULL,
  `edi_type_id` int(11) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(11) unsigned NOT NULL DEFAULT '0',
  `filemime` varchar(45) NOT NULL DEFAULT 'text/plain',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `title`, `description`, `window`, `customer_id`, `edi_type_id`, `filepath`, `filename`, `filesize`, `filemime`, `created`, `modified`) VALUES
(1, 1, 'DLA Day 2', 'whateves', 1, '5350053a-bbd0-45a1-9d08-0294fe516296', 2, 'C:\\xampp\\htdocs\\testwing\\app\\webroot\\files\\uploads\\test_batches\\5357d116-4a9c-4394-9871-0294fe516296', '20140415.zip', 158326, 'application/zip', '2014-04-23 14:41:30', '2014-04-23 14:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `uploads_customers`
--

CREATE TABLE IF NOT EXISTS `uploads_customers` (
  `id` char(36) NOT NULL,
  `upload_id` char(36) NOT NULL,
  `customer_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_users`
--

CREATE TABLE IF NOT EXISTS `uploads_users` (
  `id` char(36) NOT NULL,
  `upload_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `lastlogin` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `group_id`, `timezone`, `created`, `modified`, `lastlogin`) VALUES
(1, 'admin', 'c15ff37b0178f1a6fbec89bbd60c348999260c7a', 'subv14@hotmail.com', 1, -4, '2014-03-30 19:53:00', '2014-04-03 17:51:09', '2014-04-24'),
(2, 'pmakarov', 'bb92420ce0e0a5fa0b281ef5c9e4d8e7edf0a309', 'makarov9mm@gmail.com', 2, 0, '2014-03-30 19:53:31', '2014-03-31 13:49:09', '2014-03-31'),
(3, 'dcmauser', 'bac8108839d1dcd39ecd0d5574a969dfb5cc694c', 'subv14@hotmail.com', 3, -4, '2014-03-30 19:54:12', '2014-04-03 17:45:11', '2014-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
