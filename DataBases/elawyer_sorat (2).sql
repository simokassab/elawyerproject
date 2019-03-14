-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 15 Décembre 2016 à 16:35
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elawyer_sorat`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`ID`, `date`, `customer_ID`) VALUES
(35, '2016-11-24', '56'),
(36, '2016-10-25', '57'),
(37, '2016-10-25', '58'),
(38, '2016-10-25', '59'),
(39, '2016-10-25', '60');

-- --------------------------------------------------------

--
-- Structure de la table `account_action`
--

CREATE TABLE `account_action` (
  `ID` int(11) NOT NULL,
  `contract_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remaining` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ac_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fees_cost` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `paid_fees` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remaining_fees` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `account_action`
--

INSERT INTO `account_action` (`ID`, `contract_ID`, `paid`, `remaining`, `details`, `ac_date`, `fees_cost`, `paid_fees`, `remaining_fees`, `comments`) VALUES
(141, '105', ' 2222', '1778', 'اتعاب العقد', '2016-11-06 03:03:50', '0', '0', '0', '');

-- --------------------------------------------------------

--
-- Structure de la table `alarm`
--

CREATE TABLE `alarm` (
  `ID` int(11) NOT NULL,
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
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `alarm_consultation`
--

CREATE TABLE `alarm_consultation` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `consult_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appoint` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lawyer_ID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `alarm_form`
--

CREATE TABLE `alarm_form` (
  `ID` int(11) NOT NULL,
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
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appointment`
--

INSERT INTO `appointment` (`ID`, `user_id`, `start`, `end`, `title`, `description`, `privilege`) VALUES
(117, 21, '2016-10-24', '2016-10-25', 'New Mission', 'تجربة النظام -<b>متوسط-', ''),
(118, 21, '2016-10-25', '2016-10-27', 'New Mission', '13212313-<b>متوسط-', ''),
(119, 1, '2016-10-25', '2016-10-26', 'New Mission', 'sadfcsfc-<b>مرتفع-', ''),
(120, 22, '2016-10-28', '2016-10-28', 'New Mission', 'لا شيء-<b>مرتفع-', ''),
(121, 1, '2016-10-26 12:30:00', '2016-10-26 13:00:00', 'a', 'a', 'عام'),
(122, 1, '2016-11-01', '2016-11-08', 'New Mission', 'asd -<b>مرتفع-', '');

-- --------------------------------------------------------

--
-- Structure de la table `archive_alarm`
--

CREATE TABLE `archive_alarm` (
  `ID` int(11) NOT NULL,
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
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `archive_cases`
--

CREATE TABLE `archive_cases` (
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
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `break_status`
--

CREATE TABLE `break_status` (
  `ID` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `break_status`
--

INSERT INTO `break_status` (`ID`, `value`, `photo`) VALUES
(1, 'إجتماع', 'Meeting.png'),
(2, 'محكمة', 'Court.png'),
(4, 'صلاة', 'Prayer.png'),
(5, 'متصل', 'Online.png'),
(6, 'قهوة', 'Coffee.png'),
(10, 'إجازة مرضية', 'Sick Leave.png'),
(11, 'تدخين', 'Cigarette.png'),
(12, 'دورة مياه', 'Bathroom.png');

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `ID` int(11) NOT NULL,
  `consultation_ID` int(11) DEFAULT NULL,
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `calendar`
--

INSERT INTO `calendar` (`ID`, `consultation_ID`, `start`, `end`, `title`, `url`, `description`) VALUES
(113, 3, '2016-11-09T08:00:00', '2016-11-09T10:00:00', 'ايمان ناصر الناصر الصباح-قتل ت', 'http://localhost/elawyer/index.php?action=consultation/request&id=3', 'قتل');

-- --------------------------------------------------------

--
-- Structure de la table `cases`
--

CREATE TABLE `cases` (
  `ID` int(11) NOT NULL,
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
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cases`
--

INSERT INTO `cases` (`ID`, `customer_id`, `customer_desc`, `startdate`, `casetype_id`, `lawyer_id`, `consultant_id`, `opponent_id`, `opponent_desc`, `price`, `subject`, `description`, `status`) VALUES
(117, '56', 'متهم', '2016-11-06', '5', '22', '', '64', 'مدعي', '4000', 'قتل ت', ' قتل', 'PENDING');

-- --------------------------------------------------------

--
-- Structure de la table `cases_execution`
--

CREATE TABLE `cases_execution` (
  `ID` int(11) NOT NULL,
  `case_ID` int(11) NOT NULL,
  `execution` text COLLATE utf8mb4_unicode_ci,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `date` datetime DEFAULT NULL,
  `nextdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `cases_execution`
--

INSERT INTO `cases_execution` (`ID`, `case_ID`, `execution`, `comments`, `date`, `nextdate`) VALUES
(1, 110, 'test 1', '1', '2016-11-22 00:00:00', '2016-11-30'),
(2, 110, 'tttttttttt', 'ttttttttttttttttttt', '2016-11-05 01:27:54', '2016-11-05'),
(3, 110, 'lkhjlkjljlkjlj', 'kj;lk;lk;lk;k;lk;k;', '2016-11-05 01:31:09', '2016-11-04');

-- --------------------------------------------------------

--
-- Structure de la table `case_type`
--

CREATE TABLE `case_type` (
  `ID` int(11) NOT NULL,
  `ctype` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `case_type`
--

INSERT INTO `case_type` (`ID`, `ctype`) VALUES
(1, 'جزائي'),
(2, 'مدني'),
(4, 'إداري'),
(5, 'أحوال شخصية'),
(6, 'تجاري');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `consult_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appoint` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lawyer_ID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `consultation`
--

INSERT INTO `consultation` (`ID`, `firstname`, `lastname`, `customer`, `consult_type`, `subject`, `description`, `appoint`, `lawyer_ID`, `status`) VALUES
(3, '', '', '56', '5', 'قتل ت', 'قتل', '22', '', 'LAWYER');

-- --------------------------------------------------------

--
-- Structure de la table `contract`
--

CREATE TABLE `contract` (
  `ID` int(11) NOT NULL,
  `account_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `contract_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `case_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contract`
--

INSERT INTO `contract` (`ID`, `account_ID`, `contract_type`, `case_id`) VALUES
(105, '35', '', '117');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
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
  `VIP` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`ID`, `cfname`, `csname`, `ctname`, `clname`, `cuser`, `cpassword`, `caddress`, `cstreet`, `ckasima`, `chouse_type`, `chouse_nb`, `cfloor`, `ceaddress`, `CID_number`, `cphone1`, `cphone2`, `cphone3`, `cphone4`, `cphone5`, `cphone6`, `cemail`, `cfax`, `cbirth`, `ccompany`, `status`, `VIP`) VALUES
(56, 'ايمان', 'ناصر', 'الناصر', 'الصباح', 'iman@hotmail.com', 'alsarat123', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '1', ''),
(57, 'بدور', 'ناصر', 'ايمان', 'زنكوي', '1', '8A&LpV', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '0000-00-00', '1', '1', ''),
(58, 'فجر', 'عبدالغني', 'السيد', 'خضير', '2', 'OBJUjB', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '0000-00-00', '2', '1', ''),
(59, 'شبيب', 'ناصر', 'فراج', 'السبيعي', '3', 'MVoCFL', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '0000-00-00', '3', '1', ''),
(60, 'زينب', 'سليمان', 'ابراهيم', 'المسلم', '4', 'Snk_;8', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '0000-00-00', '4', '1', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `email_password`
--

CREATE TABLE `email_password` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `datee` date DEFAULT NULL,
  `case_ID` int(11) DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `starttime` time DEFAULT NULL,
  `nextdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`ID`, `datee`, `case_ID`, `event`, `starttime`, `nextdate`) VALUES
(31, '2016-11-01', 110, 'أول جلسة', '12:54:24', '2016-11-01'),
(32, '2016-11-01', 110, 'مد أجل الحكم', '12:57:42', '2016-11-02');

-- --------------------------------------------------------

--
-- Structure de la table `event_type`
--

CREATE TABLE `event_type` (
  `ID` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `event_type`
--

INSERT INTO `event_type` (`ID`, `name`) VALUES
(4, 'مد أجل الحكم'),
(3, 'أول جلسة');

-- --------------------------------------------------------

--
-- Structure de la table `execution`
--

CREATE TABLE `execution` (
  `ID` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1- monafeth & 2- Monafath didaho',
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `execution`
--

INSERT INTO `execution` (`ID`, `type`, `customer_id`, `name`, `status`, `date`) VALUES
(5, 2, 57, 'as', 'OPEN', '2016-11-04 14:15:27'),
(4, 2, 57, 'as', 'OPEN', '2016-11-04 14:10:43');

-- --------------------------------------------------------

--
-- Structure de la table `exec_action`
--

CREATE TABLE `exec_action` (
  `ID` int(11) NOT NULL,
  `exec_ID` int(11) NOT NULL,
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `followdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `exec_action`
--

INSERT INTO `exec_action` (`ID`, `exec_ID`, `result`, `comments`, `date`, `followdate`) VALUES
(1, 12, '12', '12', '2016-11-03', '2016-11-03');

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `ID` int(11) NOT NULL,
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
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form`
--

INSERT INTO `form` (`ID`, `customerID`, `date`, `customer`, `customer2`, `customer3`, `customer4`, `IDNUMBER`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `customer_desc`, `opponentid`, `opponent`, `opponent2`, `opponent3`, `opponent4`, `OPIDNUMBER`, `opt1`, `opt2`, `opt3`, `opponent_desc`, `subject`, `type`, `details`, `price`, `paid`, `remaining`, `p_type`, `lawyer_ID`, `consultant_ID`, `assigned`, `comments`, `status`) VALUES
(66, '56', '2016-11-06 03:03:50', '', '', '', '', '0', '', '', '', '', '', '', 'متهم', '0', 'عبدالله', '', '', 'عبدالله', '', '', '', '', 'مدعي', 'قتل ت', '5', 'قتل', '4000', '2222', '1778', '', '22', '', ' ', '', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Structure de la table `kitchen`
--

CREATE TABLE `kitchen` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `orderr` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datetimee` datetime NOT NULL,
  `statuss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lawyer_type`
--

CREATE TABLE `lawyer_type` (
  `ID` int(11) NOT NULL,
  `trule` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lawyer_type`
--

INSERT INTO `lawyer_type` (`ID`, `trule`) VALUES
(1, 'محكمة كلية'),
(2, 'دستورية'),
(3, 'تمييز '),
(4, 'مدني');

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE `level` (
  `ID` int(11) NOT NULL,
  `rule` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `level`
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
-- Structure de la table `login_admin`
--

CREATE TABLE `login_admin` (
  `ID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `login_admin`
--

INSERT INTO `login_admin` (`ID`, `user`, `password`) VALUES
(1, 'elawyer', 'elawyer');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `login` timestamp NULL DEFAULT NULL,
  `logout` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `ID` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `mtype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `participants` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `missions`
--

INSERT INTO `missions` (`ID`, `from_user_id`, `to_user_id`, `mtype`, `startdate`, `enddate`, `case_id`, `comments`, `status`, `participants`, `priority`) VALUES
(42, 1, 21, 'خاص', '2016-10-24', '2016-10-25', 0, 'تجربة النظام ', 'DONE', 'خالد العتال,علي القديري', 'متوسط'),
(43, 25, 21, 'تكليف', '2016-10-25', '2016-10-27', 0, '13212313', 'PENDING', 'علي القديري', 'متوسط'),
(46, 1, 1, 'قضية', '2016-11-01', '2016-11-08', 110, 'asd ', 'PENDING', 'خالد العتال', 'مرتفع');

-- --------------------------------------------------------

--
-- Structure de la table `mobile_notifications`
--

CREATE TABLE `mobile_notifications` (
  `ID` int(11) NOT NULL,
  `userID` int(20) NOT NULL,
  `device_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `device_type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `from` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `from`, `to`, `url`, `title`, `status`, `date_`) VALUES
(366, '1', '21', 'index.php?action=mainpage', 'مهمة جديدة', 'READ', '2016-10-24 17:14:43'),
(367, '25', '21', 'index.php?action=mainpage', 'مهمة جديدة', 'READ', '2016-10-25 15:35:31'),
(368, '25', '1', 'index.php?action=mainpage', 'مهمة جديدة', 'READ', '2016-10-25 15:37:36'),
(369, '22', '22', 'index.php?action=mainpage', 'مهمة جديدة', 'READ', '2016-10-28 23:02:49'),
(370, '1', '1', 'index.php?action=mainpage', 'مهمة جديدة من: admin admin', 'READ', '2016-11-01 12:16:22'),
(371, '21', '23', 'index.php?action=consultation/super_request&id=3&from=21', 'بيان إستشاري جديد محمد المصري', 'READ', '2016-11-06 02:14:31'),
(372, '23', '21', 'index.php?action=calendar/index&id=3&response=yes', 'رسالة من مدير المكتب علي القديري', 'READ', '2016-11-06 02:22:10'),
(373, '23', '21', 'index.php?action=calendar/index&id=3&response=yes&nextdate=', 'رسالة من مدير المكتب علي القديري', 'READ', '2016-11-06 02:33:38'),
(374, '23', '21', 'index.php?action=calendar/index&id=3&response=yes&nextdate=2016-11-10 01:36:28', 'رسالة من مدير المكتب علي القديري', 'READ', '2016-11-06 02:36:31'),
(375, '21', '22', 'index.php?action=consultation/request&id=3&act=lawyer', 'بيان إستشاري من السكرتير محمد المصري', 'READ', '2016-11-06 02:40:44'),
(376, '22', '20', 'index.php?action=NEWFile/request&id=66&from=22', 'رسالة من المحامي خالد العتال', 'READ', '2016-11-06 03:00:28'),
(377, '20', '22', 'index.php?action=NEWFile/request&act=sendToLawyer&id=66&res=لقد تم تدقيق كل من الموكل والخصم بنجاح', 'رسالة من قسم التدقيق ', 'READ', '2016-11-06 03:04:15');

-- --------------------------------------------------------

--
-- Structure de la table `notifications_customer`
--

CREATE TABLE `notifications_customer` (
  `id` int(11) NOT NULL,
  `from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `notifications_customer`
--

INSERT INTO `notifications_customer` (`id`, `from`, `to`, `url`, `title`, `status`, `date_`) VALUES
(379, '26', '57', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  قتل', 'NOTREAD', '2016-10-26 02:11:55'),
(380, '26', '57', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  قتل', 'NOTREAD', '2016-10-26 02:13:46'),
(381, '26', '57', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  قتل', 'NOTREAD', '2016-10-26 02:16:18'),
(382, '26', '57', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  قتل', 'NOTREAD', '2016-10-26 02:16:32'),
(383, '26', '57', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  قتل', 'NOTREAD', '2016-10-26 02:16:51'),
(384, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:18:16'),
(385, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:18:28'),
(386, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:18:33'),
(387, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:19:06'),
(388, '26', '', 'index.php?action=viewCase&id=98', 'لقد تم إضافة القضية:  ', 'NOTREAD', '2016-10-26 02:19:18'),
(389, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:19:23'),
(390, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:20:43'),
(391, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:21:33'),
(392, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:21:51'),
(393, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:23:16'),
(394, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:24:15'),
(395, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:24:19'),
(396, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:28'),
(397, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:29'),
(398, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:29'),
(399, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:30'),
(400, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:30'),
(401, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:31'),
(402, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:33'),
(403, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:57'),
(404, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:58'),
(405, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:25:59'),
(406, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:26:02'),
(407, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:27:44'),
(408, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:34:27'),
(409, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:34:28'),
(410, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:34:30'),
(411, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:38:29'),
(412, '26', '57', 'index.php?action=viewCase&id=99', 'لقد تم إضافة القضية:  قتل متعمد', 'NOTREAD', '2016-10-26 02:39:43'),
(413, '26', '56', 'index.php?action=viewCase&id=100', 'لقد تم إضافة القضية:  أسدسد', 'NOTREAD', '2016-10-26 02:40:44'),
(414, '1', '57', 'index.php?action=viewCase&id=110', 'لقد تم إضافة القضية:  أسد', 'NOTREAD', '2016-10-28 01:32:12'),
(415, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:13:12'),
(416, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:14:34'),
(417, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:14:43'),
(418, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:15:40'),
(419, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:16:27'),
(420, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:16:47'),
(421, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:17:21'),
(422, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:17:34'),
(423, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:18:18'),
(424, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:19:49'),
(425, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:20:28'),
(426, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:20:39'),
(427, '22', '56', 'index.php?action=viewCase&id=116', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:21:42'),
(428, '22', '56', 'index.php?action=viewCase&id=117', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:24:25'),
(429, '22', '56', 'index.php?action=viewCase&id=117', 'لقد تم إضافة القضية:  قتل ت', 'NOTREAD', '2016-11-06 03:24:54');

-- --------------------------------------------------------

--
-- Structure de la table `online_users`
--

CREATE TABLE `online_users` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `firstlogin` time DEFAULT NULL,
  `status` int(11) NOT NULL,
  `break_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `online_users`
--

INSERT INTO `online_users` (`ID`, `user_ID`, `date`, `firstlogin`, `status`, `break_status`) VALUES
(1, 1, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(2, 20, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(3, 22, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(4, 21, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(5, 23, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(6, 24, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(7, 25, '2016-11-24', '00:00:00', 0, 'غير متصل'),
(8, 26, '2016-11-24', '00:00:00', 0, 'غير متصل');

-- --------------------------------------------------------

--
-- Structure de la table `opponent`
--

CREATE TABLE `opponent` (
  `ID` int(11) NOT NULL,
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
  `ophone6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `opponent`
--

INSERT INTO `opponent` (`ID`, `ofname`, `osname`, `otname`, `olname`, `ogender`, `OID_number`, `ophone1`, `ophone2`, `ophone3`, `ophone4`, `ohpone5`, `ophone6`) VALUES
(63, 'الادعاء العام', '', '', 'جهه التحقيق', '', 0, '', '', '', '', '', ''),
(64, 'عبدالله', '', '', 'عبدالله', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE `rights` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `cust` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `even` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arch` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cons` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rights`
--

INSERT INTO `rights` (`ID`, `userID`, `cust`, `staf`, `even`, `arch`, `acct`, `supe`, `cons`, `news`) VALUES
(2, 1, 'N', 'N', 'RW', 'W', 'N', 'N', 'R', 'N'),
(3, 20, 'N', 'R', 'RW', 'N', 'N', 'N', 'R', 'N'),
(4, 22, 'RW', 'N', 'RW', 'RW', 'RW', 'N', 'W', 'N'),
(5, 21, 'RW', 'N', 'N', 'RW', 'N', 'N', 'W', 'RW'),
(6, 23, 'W', 'N', 'N', 'N', 'RW', 'RW', 'RW', 'N'),
(7, 24, 'RW', 'N', 'N', 'N', 'N', 'RW', 'W', 'RW'),
(8, 25, 'RW', 'N', 'RW', 'N', 'N', 'RW', 'N', 'N'),
(9, 26, 'RW', 'N', 'RW', 'N', 'N', 'RW', 'N', 'RW');

-- --------------------------------------------------------

--
-- Structure de la table `superevents`
--

CREATE TABLE `superevents` (
  `ID` int(11) NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_ID` int(11) NOT NULL,
  `hidden` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='For Main Office';

--
-- Contenu de la table `superevents`
--

INSERT INTO `superevents` (`ID`, `date`, `event`, `user_ID`, `hidden`) VALUES
(439, '2016-10-24 06:17:29', 'المحامي كم بفتح القضية: خيانه امانه', 22, 'YES'),
(440, '2016-10-25 06:32:41', 'المحامي كم بفتح القضية: اثبات حضانه', 0, 'NO'),
(441, '2016-10-25 06:55:29', 'المحامي كم بفتح القضية: اثبات حضانه', 22, 'YES'),
(442, '2016-10-25 06:59:43', 'المحامي كم بفتح القضية: رؤيه / اشكال مستعجل الاحمدي', 0, 'NO'),
(443, '2016-10-25 07:02:11', 'المحامي كم بفتح القضية: مخدرات', 0, 'NO'),
(444, '2016-10-25 07:10:21', 'المحامي كم بفتح القضية: زيادة اجره', 0, 'NO'),
(445, '2016-10-26 01:11:48', 'المحامي كم بفتح القضية: قتل', 22, 'YES'),
(446, '2016-10-26 01:18:08', 'المحامي كم بفتح القضية: قتل متعمد', 22, 'YES'),
(447, '2016-10-26 01:40:37', 'المحامي كم بفتح القضية: أسدسد', 22, 'YES'),
(448, '2016-10-26 01:44:57', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(449, '2016-10-26 01:45:56', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(450, '2016-10-26 01:47:13', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(451, '2016-10-26 01:47:57', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(452, '2016-10-26 01:48:00', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(453, '2016-10-26 01:48:16', 'المحامي كم بفتح القضية: أساس', 22, 'YES'),
(454, '2016-10-26 01:52:35', 'المحامي كم بفتح القضية: قتل', 22, 'YES'),
(455, '2016-10-26 01:54:04', 'المحامي كم بفتح القضية: قتل', 22, 'YES'),
(456, '2016-10-26 01:55:11', 'المحامي كم بفتح القضية: قتل', 22, 'YES'),
(457, '2016-10-27 15:32:07', 'المحامي كم بفتح القضية: أسد ', 22, 'YES'),
(458, '2016-11-06 01:14:31', 'السكرتير أرسل بيان إستشاري لمدير المكتب', 21, 'NO'),
(459, '2016-11-06 01:22:10', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(460, '2016-11-06 01:33:38', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(461, '2016-11-06 01:36:31', 'مدير المكتب أرسل الموافقة للسكرتير ', 1, 'NO'),
(462, '2016-11-06 01:40:44', 'السكرتير أرسل البيان الإستشاري للمحامي', 4, 'NO'),
(463, '2016-11-06 02:00:28', 'تم إرسال الملف إلى قسم التدقيق', 22, 'NO'),
(464, '2016-11-06 02:04:15', 'قسم التدقيق أرسل الملف إلى المحامي', 5, 'NO'),
(465, '2016-11-06 02:04:30', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(466, '2016-11-06 02:05:09', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(467, '2016-11-06 02:09:55', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(468, '2016-11-06 02:11:15', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(469, '2016-11-06 02:12:23', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(470, '2016-11-06 02:13:07', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO'),
(471, '2016-11-06 02:24:21', 'المحامي كم بفتح القضية: قتل ت', 22, 'NO');

-- --------------------------------------------------------

--
-- Structure de la table `support_ticket`
--

CREATE TABLE `support_ticket` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 : opened / 2: closed / 3:blocked'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
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
  `facebook` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `snapchat` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `fname`, `sname`, `tname`, `lname`, `user`, `password`, `gender`, `ID_number`, `ID_member`, `address`, `street`, `kasima`, `house_type`, `house_nb`, `floor`, `eaddress`, `phone1`, `phone2`, `phone3`, `email`, `fax`, `room`, `photo`, `description`, `level_ID`, `lawyer_type_ID`, `color`, `status`, `facebook`, `twitter`, `linkedin`, `instagram`, `snapchat`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@techoffice.co', 'admin', 'male', 1223, 1223, 'sdfdf', 'sdfsd', 'kuwait', 'ttttkuwait', 1, 2, 345344, '23423', '234234', '23234234', 'admin@techoffice.co', '32423423', '3', 'TechOffice-logo.jpg', 'rwerwerwe', 1, 0, 'green', 1, '', '', '', '', ''),
(20, 'هيثم', '', '', 'الجمل', 'dandana55055_55055@YAHOO.COM', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'dandana55055_55055@YAHOO.COM', '', '', '', '', 5, 0, '#c3b4e2', 1, '', '', '', '', ''),
(22, 'خالد', '', '', 'العتال', 'khaled.alattal@hotmail.com', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'hotmail.com@khaled.alattal', '', '', '', '', 2, 1, '#f07f1d', 1, '', '', '', '', ''),
(21, 'محمد', '', '', 'المصري', 'elmasry490@gmail.com', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'elmasry490@gmail.com', '', '', '', '', 4, 0, '#c9e86d', 1, '', '', '', '', ''),
(23, 'علي', '', '', 'القديري', 'ali@alsarat.com', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'ali@alsarat.com', '', '', '', '', 1, 0, '#b6f224', 1, '', '', '', '', ''),
(24, 'مصباح', '', '', 'عبدالشافي', 'mosbah1979@yahoo.com', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'mosbah1979@yahoo.com', '', '', '', '', 1, 0, '#f63703', 1, '', '', '', '', ''),
(25, 'شهد', 'شهد', 'شهد', 'الزعابي', 'alzaabi@alsarat.com', 'alsarat123', 'female', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'alzaabi@alsarat.com', '', '', '', '', 1, 0, '#d6540c', 1, '', '', '', '', ''),
(26, 'عبدالله', '', '', 'المطر', 'contact@alsarat.com', 'alsarat123', 'male', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', 'contact@alsarat.com', '', '', '', '', 2, 1, '#b84aa3', 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_active`
--

CREATE TABLE `user_active` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_active`
--

INSERT INTO `user_active` (`id`, `user_id`, `active`, `date`) VALUES
(1, 1, 0, '2016-11-24'),
(2, 20, 0, '2016-11-24'),
(3, 22, 0, '2016-11-24'),
(4, 21, 0, '2016-11-24'),
(5, 23, 0, '2016-11-24'),
(6, 24, 0, '2016-11-24'),
(7, 25, 0, '2016-11-24'),
(8, 26, 0, '2016-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `user_logs_daily`
--

CREATE TABLE `user_logs_daily` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `timee` timestamp NULL DEFAULT NULL,
  `duration` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_logs_daily`
--

INSERT INTO `user_logs_daily` (`ID`, `user_ID`, `status`, `timee`, `duration`) VALUES
(1, 1, 'إجازة مرضية', NULL, 0),
(2, 1, 'إجتماع', NULL, 0),
(3, 1, 'تدخين', NULL, 0),
(4, 1, 'دورة مياه', NULL, 0),
(5, 1, 'صلاة', NULL, 0),
(6, 1, 'قهوة', NULL, 0),
(7, 1, 'متصل', NULL, 0),
(8, 1, 'محكمة', NULL, 0),
(9, 20, 'إجازة مرضية', NULL, 0),
(10, 20, 'إجتماع', NULL, 0),
(11, 20, 'تدخين', NULL, 0),
(12, 20, 'دورة مياه', NULL, 0),
(13, 20, 'صلاة', NULL, 0),
(14, 20, 'قهوة', NULL, 0),
(15, 20, 'متصل', NULL, 0),
(16, 20, 'محكمة', NULL, 0),
(17, 22, 'إجازة مرضية', NULL, 0),
(18, 22, 'إجتماع', NULL, 0),
(19, 22, 'تدخين', NULL, 0),
(20, 22, 'دورة مياه', NULL, 0),
(21, 22, 'صلاة', NULL, 0),
(22, 22, 'قهوة', NULL, 0),
(23, 22, 'متصل', NULL, 0),
(24, 22, 'محكمة', NULL, 0),
(25, 21, 'إجازة مرضية', NULL, 0),
(26, 21, 'إجتماع', NULL, 0),
(27, 21, 'تدخين', NULL, 0),
(28, 21, 'دورة مياه', NULL, 0),
(29, 21, 'صلاة', NULL, 0),
(30, 21, 'قهوة', NULL, 0),
(31, 21, 'متصل', NULL, 0),
(32, 21, 'محكمة', NULL, 0),
(33, 23, 'إجازة مرضية', NULL, 0),
(34, 23, 'إجتماع', NULL, 0),
(35, 23, 'تدخين', NULL, 0),
(36, 23, 'دورة مياه', NULL, 0),
(37, 23, 'صلاة', NULL, 0),
(38, 23, 'قهوة', NULL, 0),
(39, 23, 'متصل', '2016-11-29 18:34:05', 0),
(40, 23, 'محكمة', NULL, 0),
(41, 24, 'إجازة مرضية', NULL, 0),
(42, 24, 'إجتماع', NULL, 0),
(43, 24, 'تدخين', NULL, 0),
(44, 24, 'دورة مياه', NULL, 0),
(45, 24, 'صلاة', NULL, 0),
(46, 24, 'قهوة', NULL, 0),
(47, 24, 'متصل', NULL, 0),
(48, 24, 'محكمة', NULL, 0),
(49, 25, 'إجازة مرضية', NULL, 0),
(50, 25, 'إجتماع', NULL, 0),
(51, 25, 'تدخين', NULL, 0),
(52, 25, 'دورة مياه', NULL, 0),
(53, 25, 'صلاة', NULL, 0),
(54, 25, 'قهوة', NULL, 0),
(55, 25, 'متصل', NULL, 0),
(56, 25, 'محكمة', NULL, 0),
(57, 26, 'إجازة مرضية', NULL, 0),
(58, 26, 'إجتماع', NULL, 0),
(59, 26, 'تدخين', NULL, 0),
(60, 26, 'دورة مياه', NULL, 0),
(61, 26, 'صلاة', NULL, 0),
(62, 26, 'قهوة', NULL, 0),
(63, 26, 'متصل', NULL, 0),
(64, 26, 'محكمة', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_stats`
--

CREATE TABLE `user_stats` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timee` int(11) NOT NULL,
  `datee` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `account_action`
--
ALTER TABLE `account_action`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `alarm_consultation`
--
ALTER TABLE `alarm_consultation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `alarm_form`
--
ALTER TABLE `alarm_form`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `archive_alarm`
--
ALTER TABLE `archive_alarm`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `archive_cases`
--
ALTER TABLE `archive_cases`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `break_status`
--
ALTER TABLE `break_status`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `value` (`value`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `cases_execution`
--
ALTER TABLE `cases_execution`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `case_type`
--
ALTER TABLE `case_type`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `email_password`
--
ALTER TABLE `email_password`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `execution`
--
ALTER TABLE `execution`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `exec_action`
--
ALTER TABLE `exec_action`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `lawyer_type`
--
ALTER TABLE `lawyer_type`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mobile_notifications`
--
ALTER TABLE `mobile_notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications_customer`
--
ALTER TABLE `notifications_customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `opponent`
--
ALTER TABLE `opponent`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `superevents`
--
ALTER TABLE `superevents`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `fname` (`fname`),
  ADD KEY `sname` (`sname`),
  ADD KEY `tname` (`tname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `user_2` (`user`),
  ADD KEY `ID_number` (`ID_number`),
  ADD KEY `phone1` (`phone1`),
  ADD KEY `phone2` (`phone2`),
  ADD KEY `phone3` (`phone3`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `user_active`
--
ALTER TABLE `user_active`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_logs_daily`
--
ALTER TABLE `user_logs_daily`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `account_action`
--
ALTER TABLE `account_action`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT pour la table `alarm`
--
ALTER TABLE `alarm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `alarm_consultation`
--
ALTER TABLE `alarm_consultation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT pour la table `alarm_form`
--
ALTER TABLE `alarm_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `archive_alarm`
--
ALTER TABLE `archive_alarm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `break_status`
--
ALTER TABLE `break_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT pour la table `cases`
--
ALTER TABLE `cases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT pour la table `cases_execution`
--
ALTER TABLE `cases_execution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `case_type`
--
ALTER TABLE `case_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `contract`
--
ALTER TABLE `contract`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `email_password`
--
ALTER TABLE `email_password`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `execution`
--
ALTER TABLE `execution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `exec_action`
--
ALTER TABLE `exec_action`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT pour la table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `lawyer_type`
--
ALTER TABLE `lawyer_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `mobile_notifications`
--
ALTER TABLE `mobile_notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;
--
-- AUTO_INCREMENT pour la table `notifications_customer`
--
ALTER TABLE `notifications_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;
--
-- AUTO_INCREMENT pour la table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `opponent`
--
ALTER TABLE `opponent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `rights`
--
ALTER TABLE `rights`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `superevents`
--
ALTER TABLE `superevents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;
--
-- AUTO_INCREMENT pour la table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `user_active`
--
ALTER TABLE `user_active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user_logs_daily`
--
ALTER TABLE `user_logs_daily`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `user_stats`
--
ALTER TABLE `user_stats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
