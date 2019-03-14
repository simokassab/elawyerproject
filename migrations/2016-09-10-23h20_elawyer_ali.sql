-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 05:22 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elawyer_ali`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_action`
--

DROP TABLE IF EXISTS `account_action`;
CREATE TABLE IF NOT EXISTS `account_action` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contract_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remaining` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ac_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fees_cost` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `paid_fees` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remaining_fees` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_action`
--

INSERT INTO `account_action` (`ID`, `contract_ID`, `paid`, `remaining`, `details`, `ac_date`, `fees_cost`, `paid_fees`, `remaining_fees`, `comments`) VALUES
(63, '54', ' 1000', '3000', 'اتعاب العقد', '2016-09-07', '0', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `user_id`, `start`, `end`, `title`, `description`, `privilege`) VALUES
(110, 4, '2016-09-09', '2016-09-10', 'New Mission', 'أسد -<b>مرتفع-', ''),
(109, 4, '2016-09-10', '2016-09-17', 'New Mission', 'وو -<b>مرتفع-', '');

-- --------------------------------------------------------

--
-- Table structure for table `archive_case`
--

DROP TABLE IF EXISTS `archive_case`;
CREATE TABLE IF NOT EXISTS `archive_case` (
  `ID` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_desc` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `casetype_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `opponent_id` int(11) NOT NULL,
  `opponent_desc` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `archive_cases`
--

DROP TABLE IF EXISTS `archive_cases`;
CREATE TABLE IF NOT EXISTS `archive_cases` (
  `ID` int(11) NOT NULL,
  `customer_id` varchar(11) DEFAULT NULL,
  `customer_desc` varchar(100) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `casetype_id` varchar(50) DEFAULT NULL,
  `lawyer_id` varchar(11) DEFAULT NULL,
  `consultant_id` varchar(11) DEFAULT NULL,
  `opponent_id` varchar(11) DEFAULT NULL,
  `opponent_desc` varchar(100) DEFAULT NULL,
  `price` varchar(11) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `break_status`
--

DROP TABLE IF EXISTS `break_status`;
CREATE TABLE IF NOT EXISTS `break_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `value` (`value`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `break_status`
--

INSERT INTO `break_status` (`ID`, `value`) VALUES
(1, 'إجتماع'),
(2, 'محكمة'),
(3, 'طعام'),
(4, 'صلاة'),
(5, 'متصل'),
(6, 'قهوة'),
(7, 'تدخين'),
(8, 'استاذان');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `consultation_ID` int(11) DEFAULT NULL,
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`ID`, `consultation_ID`, `start`, `end`, `title`, `url`, `description`) VALUES
(103, 116, '٢٠١٦-٠٩-٠٣T٠٨:٣٠:٠٠', '٢٠١٦-٠٩-٠٣T١٠:٣٠:٠٠', 'عبدالله عطية-تهديد', 'http://localhost/DEVE/index.php?action=consultation/request&id=116', 'تهديد'),
(102, 115, '٢٠١٦-٠٩-٠٤T٠٨:٠٠:٠٠', '٢٠١٦-٠٩-٠٤T١١:٠٠:٠٠', 'عبدالله شعبان محمد محمود-أسد', 'http://localhost/DEVE/index.php?action=consultation/request&id=115', 'أسد');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `casetype_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lawyer_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consultant_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opponent_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opponent_desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`ID`, `customer_id`, `customer_desc`, `startdate`, `casetype_id`, `lawyer_id`, `consultant_id`, `opponent_id`, `opponent_desc`, `price`, `subject`, `description`, `status`) VALUES
(78, '48', 'modda3i', '2016-09-07', '5', '2', '', '55', 'modda3a', '4000', 'أسد', ' adsadsa', 'WON');

-- --------------------------------------------------------

--
-- Table structure for table `case_type`
--

DROP TABLE IF EXISTS `case_type`;
CREATE TABLE IF NOT EXISTS `case_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ctype` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `case_type`
--

INSERT INTO `case_type` (`ID`, `ctype`) VALUES
(1, 'جزائي'),
(2, 'مدني'),
(4, 'إداري'),
(5, 'أحوال شخصية'),
(6, 'تجاري');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `consult_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appoint` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lawyer_ID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`ID`, `firstname`, `lastname`, `customer`, `consult_type`, `subject`, `description`, `appoint`, `lawyer_ID`, `status`) VALUES
(115, '', '', '48', '5', 'أسد', 'أسد', '2', '', 'LAWYER'),
(116, 'عبدالله', 'عطية', 'null', '5', 'تهديد', 'تهديد', '2', '', 'LAWYER');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `contract_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `case_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ID`, `account_ID`, `contract_type`, `case_id`) VALUES
(54, '', 'cash', '78');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cfname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `csname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `ctname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `clname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `cuser` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpassword` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `caddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cstreet` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ckasima` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chouse_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chouse_nb` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfloor` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ceaddress` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CID_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cphone6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cemail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbirth` date DEFAULT NULL,
  `ccompany` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VIP` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `cfname`, `csname`, `ctname`, `clname`, `cuser`, `cpassword`, `caddress`, `cstreet`, `ckasima`, `chouse_type`, `chouse_nb`, `cfloor`, `ceaddress`, `CID_number`, `cphone1`, `cphone2`, `cphone3`, `cphone4`, `cphone5`, `cphone6`, `cemail`, `cfax`, `cbirth`, `ccompany`, `status`, `VIP`) VALUES
(50, 'Souheil', 'abed', 'salam', 'Diab', '', '', 'myeh w myeh', 'hamchary', '1', 'shekka', '3', '4', '3424234', '435345', '2343', '23423423', '23423', '', '', '', 'souheil.diab@gmail.com', '32423', '1988-06-17', 'FNB', 'ACTIVE', ''),
(48, 'عبدالله', 'شعبان', 'محمد', 'محمود', '', '', 'kuwait', '123', '123', '123', '2', '4', '767611', '987987', '9879879879', '98798798798', '9898798', '', '79', '', 'm.abdallah@gmail.com', '123', '1976-12-05', 'elawyer', 'ACTIVE', 'YES'),
(47, 'محمد', 'شعبان', 'شعبان', 'قصبر', '', '', 'kuwait', '123', '123', '123', '2', '4', '767611', '987987', '9879879879', '98798798798', '9898798', '', '', '', 'm.abdallah@gmail.com', '', '1960-12-12', 'elawyer', 'ACTIVE', ''),
(51, 'ahmad', 'ddd', 'dd', 'kassab', '', '', '4234', '32423', '23423', '324234', '32423', '342', '767611', '232', '9879879879', '98798798798', '9898798', '', '', '', 'reerer', '123', '1960-12-20', 'elawyer', 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_password`
--

DROP TABLE IF EXISTS `email_password`;
CREATE TABLE IF NOT EXISTS `email_password` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `datee` date NOT NULL,
  `case_ID` int(11) NOT NULL,
  `event` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `datee`, `case_ID`, `event`, `comments`, `starttime`, `endtime`) VALUES
(1, '2016-09-14', 78, 'test connection and cases view', 'test', '2016-09-09 16:11:00', '2016-09-09 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `customer2` varchar(100) DEFAULT NULL,
  `customer3` varchar(100) DEFAULT NULL,
  `customer4` varchar(100) DEFAULT NULL,
  `IDNUMBER` varchar(50) DEFAULT NULL,
  `t1` varchar(50) DEFAULT NULL,
  `t2` varchar(50) DEFAULT NULL,
  `t3` varchar(50) DEFAULT NULL,
  `t4` varchar(50) DEFAULT NULL,
  `t5` varchar(50) DEFAULT NULL,
  `t6` varchar(50) DEFAULT NULL,
  `customer_desc` varchar(50) DEFAULT NULL,
  `opponentid` varchar(11) NOT NULL,
  `opponent` varchar(100) DEFAULT NULL,
  `opponent2` varchar(100) DEFAULT NULL,
  `opponent3` varchar(100) DEFAULT NULL,
  `opponent4` varchar(100) DEFAULT NULL,
  `OPIDNUMBER` varchar(50) DEFAULT NULL,
  `opt1` varchar(50) DEFAULT NULL,
  `opt2` varchar(50) DEFAULT NULL,
  `opt3` varchar(50) DEFAULT NULL,
  `opponent_desc` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `price` varchar(60) DEFAULT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `remaining` varchar(50) DEFAULT NULL,
  `p_type` varchar(100) DEFAULT NULL,
  `lawyer_ID` varchar(50) DEFAULT NULL,
  `consultant_ID` varchar(50) DEFAULT NULL,
  `assigned` varchar(100) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`ID`, `customerID`, `date`, `customer`, `customer2`, `customer3`, `customer4`, `IDNUMBER`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `customer_desc`, `opponentid`, `opponent`, `opponent2`, `opponent3`, `opponent4`, `OPIDNUMBER`, `opt1`, `opt2`, `opt3`, `opponent_desc`, `subject`, `type`, `details`, `price`, `paid`, `remaining`, `p_type`, `lawyer_ID`, `consultant_ID`, `assigned`, `comments`, `status`) VALUES
(48, '48', '2016-09-07', '', '', '', '', '0', '', '', '', '', '', '', 'modda3i', '0', 'qweqw', 'qwewq', 'wqewq', 'wqewq', '123123', '123123', '12312321', '2143113213', 'modda3a', 'أسد', '5', 'adsadsa', '4000', '1000', '3000', 'cash', '2', '', ' ', 'أسدسد', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

DROP TABLE IF EXISTS `kitchen`;
CREATE TABLE IF NOT EXISTS `kitchen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `orderr` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datetimee` datetime NOT NULL,
  `statuss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_type`
--

DROP TABLE IF EXISTS `lawyer_type`;
CREATE TABLE IF NOT EXISTS `lawyer_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `trule` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lawyer_type`
--

INSERT INTO `lawyer_type` (`ID`, `trule`) VALUES
(1, 'محكمة كلية'),
(2, 'دستورية'),
(3, 'تمييز '),
(4, 'مدني');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rule` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`ID`, `rule`) VALUES
(1, 'مدير مكتب'),
(2, 'محامي'),
(3, 'مستشار'),
(4, 'سكرتير'),
(5, 'محاسب'),
(6, 'مندوب'),
(7, 'مطبخ');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

DROP TABLE IF EXISTS `login_admin`;
CREATE TABLE IF NOT EXISTS `login_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`ID`, `user`, `password`) VALUES
(1, 'elawyer', 'elawyer');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `login` timestamp NULL DEFAULT NULL,
  `logout` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `mtype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `participants` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`ID`, `from_user_id`, `to_user_id`, `mtype`, `startdate`, `enddate`, `case_id`, `comments`, `status`, `participants`, `priority`) VALUES
(35, 4, 2, 'خاص', '2016-09-09', '2016-09-16', 0, 'أسد ', 'PENDING', 'علي الأدريس', 'مرتفع');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_notifications`
--

DROP TABLE IF EXISTS `mobile_notifications`;
CREATE TABLE IF NOT EXISTS `mobile_notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(20) NOT NULL,
  `device_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `device_type` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobile_notifications`
--

INSERT INTO `mobile_notifications` (`ID`, `userID`, `device_token`, `device_type`) VALUES
(2, 4, 'dasd76d7a6d87s6d87a', 'IOS');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=297 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

DROP TABLE IF EXISTS `online_users`;
CREATE TABLE IF NOT EXISTS `online_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `firstlogin` time DEFAULT NULL,
  `status` int(11) NOT NULL,
  `break_status` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`ID`, `user_ID`, `date`, `firstlogin`, `status`, `break_status`) VALUES
(79, 5, '2016-04-19', '11:46:01', 0, 'غير متصل'),
(80, 1, '2016-04-19', '11:46:37', 1, 'متصل'),
(81, 2, '2016-04-19', '15:49:40', 1, 'متصل'),
(82, 1, '2016-04-21', '01:13:59', 0, 'غير متصل'),
(83, 8, '2016-04-21', '16:03:39', 0, 'غير متصل'),
(84, 1, '2016-04-23', '00:36:35', 0, 'متصل'),
(85, 2, '2016-04-23', '15:14:50', 1, 'صلاة'),
(86, 1, '2016-04-24', '00:17:24', 1, 'متصل'),
(87, 1, '2016-04-25', '02:44:26', 1, 'متصل'),
(88, 4, '2016-04-25', '02:45:50', 0, 'غير متصل'),
(89, 2, '2016-04-25', '03:29:01', 1, 'متصل'),
(90, 1, '2016-04-28', '14:28:51', 1, 'متصل'),
(91, 2, '2016-04-28', '14:29:18', 0, 'غير متصل'),
(92, 2, '2016-04-29', '00:30:30', 0, 'متصل'),
(93, 1, '2016-04-29', '00:32:43', 1, 'متصل'),
(94, 1, '2016-05-02', '15:55:23', 1, 'Online'),
(95, 1, '2016-05-03', '12:44:58', 0, 'غير Online'),
(96, 4, '2016-05-03', '15:46:55', 1, 'Online'),
(97, 3, '2016-05-03', '15:49:33', 1, 'Online'),
(98, 9, '2016-05-03', '15:51:20', 0, 'غير Online'),
(99, 4, '2016-05-05', '10:33:51', 0, 'غير Online'),
(100, 1, '2016-05-05', '10:34:56', 0, 'غير Online'),
(101, 3, '2016-05-05', '10:35:40', 1, 'Online'),
(102, 5, '2016-05-05', '10:36:56', 1, 'Online'),
(103, 1, '2016-05-06', '11:41:21', 1, 'Online'),
(104, 2, '2016-05-06', '11:54:28', 0, 'غير Online'),
(105, 3, '2016-05-06', '11:56:56', 1, 'متصل'),
(106, 1, '2016-05-10', '12:55:02', 1, 'Online'),
(107, 5, '2016-05-10', '13:39:54', 0, 'غير Online'),
(108, 4, '2016-05-10', '13:49:06', 0, 'غير Online'),
(109, 3, '2016-05-10', '13:53:00', 1, 'Online'),
(110, 8, '2016-05-10', '14:01:49', 0, 'غير متصل'),
(111, 1, '2016-05-11', '12:20:31', 0, 'غير Online'),
(112, 4, '2016-05-11', '12:33:00', 0, 'غير Online'),
(113, 9, '2016-05-11', '12:37:02', 0, 'غير Online'),
(114, 5, '2016-05-11', '12:39:53', 1, 'Online'),
(115, 8, '2016-05-11', '13:15:55', 0, 'غير Online'),
(116, 3, '2016-05-11', '13:20:22', 1, 'Online'),
(117, 1, '2016-05-15', '12:46:24', 1, 'Online'),
(118, 1, '2016-05-16', '13:19:49', 1, 'متصل'),
(119, 8, '2016-05-16', '13:29:24', 1, 'undefined'),
(120, 1, '2016-05-17', '12:28:32', 1, 'متصل'),
(121, 1, '2016-05-24', '12:50:07', 0, 'متصل'),
(122, 5, '2016-05-24', '14:30:33', 0, 'غير متصل'),
(123, 5, '2016-05-26', '12:19:27', 0, 'غير متصل'),
(124, 1, '2016-05-26', '12:19:37', 0, 'غير متصل'),
(125, 1, '2016-05-28', '14:08:31', 1, 'متصل'),
(126, 1, '2016-06-01', '17:20:33', 1, 'متصل'),
(127, 1, '2016-06-02', '12:13:47', 1, 'متصل'),
(128, 1, '2016-06-03', '13:22:55', 1, 'متصل'),
(129, 1, '2016-06-04', '12:03:32', 1, 'متصل'),
(130, 4, '2016-06-12', '14:04:01', 1, 'متصل'),
(131, 1, '2016-06-14', '10:55:38', 1, 'متصل'),
(132, 1, '2016-06-16', '03:17:51', 1, 'متصل'),
(133, 1, '2016-06-25', '15:07:22', 1, 'متصل'),
(134, 4, '2016-06-25', '15:08:12', 0, 'متصل'),
(135, 1, '2016-06-29', '16:04:46', 1, 'متصل'),
(136, 1, '2016-07-03', '04:02:51', 1, 'متصل'),
(137, 1, '2016-07-13', '02:24:30', 1, 'متصل'),
(138, 1, '2016-07-15', '01:16:21', 1, 'متصل'),
(139, 1, '2016-07-16', '01:30:47', 1, 'متصل'),
(140, 1, '2016-07-17', '00:45:56', 0, 'غير متصل'),
(141, 10, '2016-07-17', '00:56:55', 0, 'غير متصل'),
(142, 11, '2016-07-17', '01:05:05', 0, 'غير متصل'),
(143, 4, '2016-07-17', '01:32:24', 0, 'غير متصل'),
(144, 2, '2016-07-17', '01:34:33', 1, 'متصل'),
(145, 5, '2016-07-17', '01:37:00', 1, 'متصل'),
(146, 5, '2016-07-19', '12:32:40', 0, 'غير متصل'),
(147, 1, '2016-07-19', '15:35:39', 1, 'متصل'),
(148, 4, '2016-07-20', '15:31:44', 1, 'متصل'),
(149, 4, '2016-07-24', '23:03:56', 1, 'متصل'),
(150, 1, '2016-07-24', '23:17:03', 1, 'متصل'),
(151, 4, '2016-07-26', '01:02:14', 0, 'غير Online'),
(152, 1, '2016-07-26', '01:14:37', 1, 'متصل'),
(153, 2, '2016-07-26', '01:19:23', 1, 'متصل'),
(154, 4, '2016-07-27', '00:35:04', 1, 'متصل'),
(155, 2, '2016-07-27', '01:00:57', 1, 'متصل'),
(156, 4, '2016-08-01', '13:45:23', 1, 'متصل'),
(157, 4, '2016-08-19', '02:19:08', 1, 'إجتماع'),
(158, 1, '2016-08-19', '02:20:04', 1, 'متصل'),
(159, 1, '2016-08-22', '10:16:11', 1, 'متصل'),
(160, 4, '2016-08-22', '10:26:28', 1, 'متصل'),
(161, 4, '2016-08-23', '15:55:35', 0, 'غير متصل'),
(162, 1, '2016-08-23', '15:56:41', 1, 'متصل'),
(163, 1, '2016-08-25', '13:05:15', 1, 'متصل'),
(164, 1, '2016-08-26', '15:45:57', 1, 'متصل'),
(165, 1, '2016-08-30', '09:24:23', 1, 'متصل'),
(166, 1, '2016-09-02', '09:53:28', 0, 'غير متصل'),
(167, 1, '2016-09-06', '14:29:48', 1, 'متصل'),
(168, 4, '2016-09-06', '14:37:10', 1, 'متصل'),
(169, 2, '2016-09-06', '15:59:23', 0, 'غير متصل'),
(170, 1, '2016-09-07', '12:55:49', 0, 'غير متصل'),
(171, 4, '2016-09-07', '13:39:39', 1, 'متصل'),
(172, 2, '2016-09-07', '13:40:23', 1, 'متصل'),
(173, 5, '2016-09-07', '18:25:31', 0, 'غير متصل'),
(174, 12, '2016-09-07', '18:41:30', 0, 'غير متصل'),
(175, 1, '2016-09-08', '00:11:28', 1, 'متصل'),
(176, 4, '2016-09-08', '12:03:15', 1, 'متصل'),
(177, 4, '2016-09-09', '00:30:49', 0, 'غير متصل'),
(178, 1, '2016-09-09', '00:52:40', 0, 'غير متصل'),
(179, 1, '2016-09-14', '19:46:11', 0, 'غير متصل');

-- --------------------------------------------------------

--
-- Table structure for table `opponent`
--

DROP TABLE IF EXISTS `opponent`;
CREATE TABLE IF NOT EXISTS `opponent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ofname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `osname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ogender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OID_number` int(11) DEFAULT NULL,
  `ophone1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ophone2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ophone3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ophone4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ohpone5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ophone6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opponent`
--

INSERT INTO `opponent` (`ID`, `ofname`, `osname`, `otname`, `olname`, `ogender`, `OID_number`, `ophone1`, `ophone2`, `ophone3`, `ophone4`, `ohpone5`, `ophone6`) VALUES
(53, 'ali', 'ali', 'aloush', 'kassab', '', 5345345, '34543534', '', '43535435345', '', '', ''),
(52, 'mohamad', 'ahmad', 'joe', 'obama', '', 987987987, '987987979', '', '987987', '', '', ''),
(50, 'جمال', 'جمال', 'شعبان', 'شعبان', '', 987987987, '987987979', '', '987987', '', '', ''),
(51, 'جمال', 'محمد', 'محمد', 'جمال', '', 987987987, '987987979', '', '987987', '', '', ''),
(54, 'efdd', 'dfd', 'dfd', 'dfd', '', 987987987, '987987979', '345345353', '987987', '', '', ''),
(55, 'qweqw', 'qwewq', 'wqewq', 'wqewq', '', 123123, '123123', '12312321', '2143113213', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `superevents`
--

DROP TABLE IF EXISTS `superevents`;
CREATE TABLE IF NOT EXISTS `superevents` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_ID` int(11) NOT NULL,
  `hidden` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=356 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='For Main Office';

--
-- Dumping data for table `superevents`
--

INSERT INTO `superevents` (`ID`, `date`, `event`, `user_ID`, `hidden`) VALUES
(355, '2016-09-07 19:06:24', 'السكرتير أرسل البيان الإستشاري للمحامي', 4, 'NO'),
(354, '2016-09-07 19:05:56', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(353, '2016-09-07 19:05:40', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(352, '2016-09-07 18:59:35', 'المحامي كم بفتح القضية: أسد', 2, 'NO'),
(351, '2016-09-07 18:56:11', 'قسم التدقيق أرسل الملف إلى المحامي', 5, 'NO'),
(350, '2016-09-07 18:42:36', 'تم إرسال الملف إلى قسم التدقيق', 2, 'NO'),
(349, '2016-09-07 18:32:12', 'السكرتير أرسل البيان الإستشاري للمحامي', 4, 'NO'),
(348, '2016-09-07 18:28:02', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(347, '2016-09-07 18:27:32', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(346, '2016-09-07 18:26:48', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(345, '2016-09-07 18:25:02', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(344, '2016-09-07 14:35:28', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(343, '2016-09-07 14:35:19', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(342, '2016-09-07 14:34:00', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(341, '2016-09-07 14:27:54', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(340, '2016-09-07 14:26:17', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(339, '2016-09-07 14:22:14', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(338, '2016-09-07 14:20:58', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(337, '2016-09-07 14:19:39', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(336, '2016-09-07 14:17:30', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO'),
(335, '2016-09-07 14:15:15', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 4, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket`
--

DROP TABLE IF EXISTS `support_ticket`;
CREATE TABLE IF NOT EXISTS `support_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 : opened / 2: closed / 3:blocked',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_ticket`
--

INSERT INTO `support_ticket` (`id`, `title`, `description`, `user_email`, `status`) VALUES
(1, 'test', 'test test', 'm.kassab@techoffice.co', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `active`) VALUES
(1, 1, 2005),
(2, 11, 59),
(3, 10, 133);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `user` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ID_number` int(11) NOT NULL,
  `ID_member` int(11) NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kasima` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_nb` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `eaddress` int(11) DEFAULT NULL,
  `phone1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_ID` int(11) DEFAULT NULL,
  `lawyer_type_ID` int(11) DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user` (`user`),
  KEY `fname` (`fname`),
  KEY `sname` (`sname`),
  KEY `tname` (`tname`),
  KEY `lname` (`lname`),
  KEY `user_2` (`user`),
  KEY `ID_number` (`ID_number`),
  KEY `phone1` (`phone1`),
  KEY `phone2` (`phone2`),
  KEY `phone3` (`phone3`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `fname`, `sname`, `tname`, `lname`, `user`, `password`, `gender`, `ID_number`, `ID_member`, `address`, `street`, `kasima`, `house_type`, `house_nb`, `floor`, `eaddress`, `phone1`, `phone2`, `phone3`, `email`, `fax`, `room`, `photo`, `description`, `level_ID`, `lawyer_type_ID`, `color`, `status`) VALUES
(4, 'ماهر', 'أحمد', 'توفيق', 'العلي', 'm.kassab@gmail.com', 'hola', 'male', 1223, 1223, 'sdfdf', 'sdfsd', 'صيدا', 'صيدا', 1, 2, 345344, '23423', '234234', '23234234', 'm.kassab@techoffice.co', '32423423', '3', 'secr.JPG', 'rwerwerwe', 4, 0, 'red', 1),
(2, 'محمد', '', '', 'نجم', 'm.najem@techoffice.co', 'm.najem', 'male', 1223, 122222222, 'sdfdf', 'sdfsd', 'kuwait', 'kuwait', 1, 2, 345344, '23423', '234234', '23234234', 'm.najem@techoffice.co', '32423423', '3', 'nodata.jpg', 'rwerwerwe', 2, 0, 'blue', 1),
(1, 'علي', 'علي', 'علي', 'الأدريس', 'm.aljassem@techoffice.co', 'm.aljassem', 'male', 1223, 1223, 'sdfdf', 'sdfsd', 'kuwait', 'kuwait', 1, 2, 345344, '23423', '234234', '23234234', 'm.aljassem@techoffice.co', '32423423', '3', 'manager.JPG', 'rwerwerwe', 1, 0, 'green', 1),
(5, 'rabih', 'a', 'a', 'kassab', 'r.kassab@techoffice.co', 'r.kassab', 'male', 1223, 122222222, 'sdfdf', 'sdfsd', 'kuwait', 'kuwait', 1, 2, 345344, '23423', '234234', '23234234', 'r.kassab@techoffice.co', '32423423', '3', 'nodata.jpg', 'rwerwerwe', 1, 0, 'yellow', 1),
(12, 'موديد', 'm', 'ض', 'kasab', 'moudi.kassab@gmail.com', 'moudikassab', 'male', 2342342, 32423, '234234 فسدف ', 'werwer ', '3', 'rwer', 3, 3, 34234234, '3243423', '98798', '77879879', 'moudi.kassab@gmail.com', '32423423', '2', '', 'rwerwe', 5, -1, '#0dd409', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE IF NOT EXISTS `user_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `timee` timestamp NULL DEFAULT NULL,
  `duration` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`ID`, `user_ID`, `status`, `timee`, `duration`) VALUES
(1, 1, 'إجتماع', '2016-08-25 10:26:21', 1502),
(2, 1, 'محكمة', '2016-05-24 09:56:12', 86),
(3, 1, 'طعام', NULL, 0),
(4, 1, 'صلاة', '2016-07-14 22:50:13', 493),
(5, 1, 'متصل', '2016-09-14 16:57:48', 80188),
(6, 1, 'قهوة', '2016-05-26 09:55:27', 1461),
(7, 1, 'تدخين', NULL, 0),
(8, 1, 'استاذان', NULL, 0),
(9, 2, 'إجتماع', '2016-04-23 12:15:09', 5),
(10, 2, 'محكمة', NULL, 0),
(11, 2, 'طعام', NULL, 0),
(12, 2, 'صلاة', '2016-04-23 12:15:40', 0),
(13, 2, 'متصل', '2016-09-07 16:08:41', 14093),
(14, 2, 'قهوة', '2016-04-23 12:15:40', 31),
(15, 2, 'تدخين', NULL, 0),
(16, 2, 'استاذان', NULL, 0),
(17, 3, 'إجتماع', NULL, 0),
(18, 3, 'محكمة', NULL, 0),
(19, 3, 'طعام', NULL, 0),
(20, 3, 'صلاة', NULL, 0),
(21, 3, 'متصل', '2016-05-06 09:33:07', 2136),
(22, 3, 'قهوة', NULL, 0),
(23, 3, 'تدخين', NULL, 0),
(24, 3, 'استاذان', NULL, 0),
(25, 4, 'إجتماع', '2016-08-18 23:25:14', 66),
(26, 4, 'محكمة', NULL, 0),
(27, 4, 'طعام', NULL, 0),
(28, 4, 'صلاة', NULL, 0),
(29, 4, 'متصل', '2016-09-09 13:11:16', 34632),
(30, 4, 'قهوة', NULL, 0),
(31, 4, 'تدخين', NULL, 0),
(32, 4, 'استاذان', NULL, 0),
(33, 5, 'إجتماع', '2016-07-19 12:44:29', 406),
(34, 5, 'محكمة', NULL, 0),
(35, 5, 'طعام', NULL, 0),
(36, 5, 'صلاة', NULL, 0),
(37, 5, 'متصل', '2016-09-07 15:27:41', 5707),
(38, 5, 'قهوة', NULL, 0),
(39, 5, 'تدخين', NULL, 0),
(40, 5, 'استاذان', NULL, 0),
(41, 8, 'إجتماع', NULL, 0),
(42, 8, 'محكمة', NULL, 0),
(43, 8, 'طعام', NULL, 0),
(44, 8, 'صلاة', NULL, 0),
(45, 8, 'متصل', '2016-05-16 10:29:25', 1),
(46, 8, 'قهوة', NULL, 0),
(47, 8, 'تدخين', NULL, 0),
(48, 8, 'استاذان', NULL, 0),
(49, 9, 'إجتماع', NULL, 0),
(50, 9, 'محكمة', NULL, 0),
(51, 9, 'طعام', NULL, 0),
(52, 9, 'صلاة', NULL, 0),
(53, 9, 'متصل', NULL, 0),
(54, 9, 'قهوة', NULL, 0),
(55, 9, 'تدخين', NULL, 0),
(56, 9, 'استاذان', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

DROP TABLE IF EXISTS `user_stats`;
CREATE TABLE IF NOT EXISTS `user_stats` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timee` int(11) NOT NULL,
  `datee` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`ID`, `user`, `status`, `timee`, `datee`) VALUES
(9, 2, 'إجتماع', 5, '2016-04-23'),
(8, 1, 'استاذان', 0, '2016-04-23'),
(7, 1, 'تدخين', 0, '2016-04-23'),
(6, 1, 'قهوة', 3, '2016-04-23'),
(49, 9, 'إجتماع', 0, '2016-04-23'),
(10, 2, 'محكمة', 0, '2016-04-23'),
(11, 2, 'طعام', 0, '2016-04-23'),
(12, 2, 'صلاة', 0, '2016-04-23'),
(13, 2, 'متصل', 14, '2016-04-23'),
(14, 2, 'قهوة', 31, '2016-04-23'),
(15, 2, 'تدخين', 0, '2016-04-23'),
(16, 2, 'استاذان', 0, '2016-04-23'),
(17, 3, 'إجتماع', 0, '2016-04-23'),
(18, 3, 'محكمة', 0, '2016-04-23'),
(19, 3, 'طعام', 0, '2016-04-23'),
(20, 3, 'صلاة', 0, '2016-04-23'),
(21, 3, 'متصل', 0, '2016-04-23'),
(22, 3, 'قهوة', 0, '2016-04-23'),
(23, 3, 'تدخين', 0, '2016-04-23'),
(24, 3, 'استاذان', 0, '2016-04-23'),
(25, 4, 'إجتماع', 0, '2016-04-23'),
(26, 4, 'محكمة', 0, '2016-04-23'),
(27, 4, 'طعام', 0, '2016-04-23'),
(28, 4, 'صلاة', 0, '2016-04-23'),
(29, 4, 'متصل', 0, '2016-04-23'),
(30, 4, 'قهوة', 0, '2016-04-23'),
(31, 4, 'تدخين', 0, '2016-04-23'),
(32, 4, 'استاذان', 0, '2016-04-23'),
(33, 5, 'إجتماع', 0, '2016-04-23'),
(34, 5, 'محكمة', 0, '2016-04-23'),
(35, 5, 'طعام', 0, '2016-04-23'),
(36, 5, 'صلاة', 0, '2016-04-23'),
(37, 5, 'متصل', 0, '2016-04-23'),
(38, 5, 'قهوة', 0, '2016-04-23'),
(39, 5, 'تدخين', 0, '2016-04-23'),
(40, 5, 'استاذان', 0, '2016-04-23'),
(41, 8, 'إجتماع', 0, '2016-04-23'),
(42, 8, 'محكمة', 0, '2016-04-23'),
(43, 8, 'طعام', 0, '2016-04-23'),
(44, 8, 'صلاة', 0, '2016-04-23'),
(45, 8, 'متصل', 0, '2016-04-23'),
(46, 8, 'قهوة', 0, '2016-04-23'),
(47, 8, 'تدخين', 0, '2016-04-23'),
(48, 8, 'استاذان', 0, '2016-04-23'),
(5, 1, 'متصل', 3134, '2016-04-23'),
(4, 1, 'صلاة', 2, '2016-04-23'),
(3, 1, 'طعام', 0, '2016-04-23'),
(2, 1, 'محكمة', 21, '2016-04-23'),
(1, 1, 'إجتماع', 28, '2016-04-23'),
(50, 9, 'محكمة', 0, '2016-04-23'),
(51, 9, 'طعام', 0, '2016-04-23'),
(52, 9, 'صلاة', 0, '2016-04-23'),
(53, 9, 'متصل', 0, '2016-04-23'),
(54, 9, 'قهوة', 0, '2016-04-23'),
(55, 9, 'تدخين', 0, '2016-04-23'),
(56, 9, 'استاذان', 0, '2016-04-23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
