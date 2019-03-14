-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Septembre 2016 à 22:15
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `freichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `frei_banned_users`
--

DROP TABLE IF EXISTS `frei_banned_users`;
CREATE TABLE IF NOT EXISTS `frei_banned_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frei_chat`
--

DROP TABLE IF EXISTS `frei_chat`;
CREATE TABLE IF NOT EXISTS `frei_chat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL,
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` double(15,4) NOT NULL,
  `GMT_time` bigint(20) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `frei_chat`
--

INSERT INTO `frei_chat` (`id`, `from`, `from_name`, `to`, `to_name`, `message`, `sent`, `recd`, `time`, `GMT_time`, `message_type`, `room_id`) VALUES
(1, 1473478677, 'Guest-am', 1473366037, 'Moudi (guest)', 'hi', '2016-09-06 11:37:22', 1, 14731618420.3970, 1473151042386, 0, -1),
(2, 1473366037, 'Moudi (guest)', 1473478677, 'Guest-am', '<img id="smile__1473478677" src="http://localhost/freichat/client/themes/smileys/dull55062.gif" alt="smile" />', '2016-09-06 11:37:30', 1, 14731618500.8995, 1473151050890, 0, -1),
(3, 1473571077, 'Guest-an6', 1, '1', '<span style="color:grey"><span style=''color:grey''>hi</span></span>', '2016-09-06 11:45:06', 1, 14731623060.1415, 1473151506133, 1, 1),
(5, 1, 'علي_الأدريس', 4, 'ماهر_العلي', 'File uploaded: <a target=\\''_blank\\'' href=http://localhost/freichat/client/plugins/upload/download.php?filename=147316384040.png>Capture.PNG</a>', '2016-09-06 12:10:40', 1, 14731638400.2936, 1473163840, 0, -1),
(6, 4, 'ماهر_العلي', 1, 'علي_الأدريس', 'hello kifak ?', '2016-09-06 12:56:02', 1, 14731665620.8523, 1473155762828, 0, -1),
(7, 1, 'علي_الأدريس', 4, 'ماهر_العلي', 'ca va man  ???', '2016-09-06 12:56:16', 1, 14731665760.8691, 1473155776860, 0, -1),
(8, 1, 'علي_الأدريس', 4, 'ماهر_العلي', 'miss you', '2016-09-06 12:56:25', 1, 14731665850.5966, 1473155785581, 0, -1),
(9, 4, 'ماهر_العلي', 1, 'علي_الأدريس', 'thanks''', '2016-09-06 12:57:01', 1, 14731666210.6447, 1473155821619, 0, -1),
(10, 1, 'علي_الأدريس', 4, 'ماهر_العلي', '<img id="smile__4" src="http://localhost/freichat/client/themes/smileys/smile54593.gif" alt="smile" />', '2016-09-06 12:58:47', 1, 14731667270.2227, 1473155927212, 0, -1),
(11, 1, 'علي_الأدريس', 2, 'محمد_نجم', 'hello', '2016-09-06 13:07:18', 1, 14731672380.1272, 1473156438119, 0, -1),
(12, 2, 'محمد_نجم', 1, 'علي_الأدريس', 'hello', '2016-09-06 13:09:21', 1, 14731673610.7886, 1473156561789, 0, -1),
(13, 1, 'علي_الأدريس', 2, 'محمد_نجم', 'hi', '2016-09-06 13:09:30', 1, 14731673700.3997, 1473156570389, 0, -1),
(14, 2, 'محمد_نجم', 1, 'علي_الأدريس', 'hello', '2016-09-06 13:10:53', 1, 14731674530.7864, 1473156653786, 0, -1),
(15, 1, 'علي_الأدريس', 2, 'محمد_نجم', 'hi najem', '2016-09-06 13:11:09', 1, 14731674690.0036, 1473156669004, 0, -1),
(16, 1, 'علي_الأدريس', 4, 'ماهر_العلي', 'hello', '2016-09-07 10:39:59', 1, 14732447990.4920, 1473233999484, 0, -1);

-- --------------------------------------------------------

--
-- Structure de la table `frei_config`
--

DROP TABLE IF EXISTS `frei_config`;
CREATE TABLE IF NOT EXISTS `frei_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) DEFAULT 'NULL',
  `cat` varchar(20) DEFAULT 'NULL',
  `subcat` varchar(20) DEFAULT 'NULL',
  `val` varchar(500) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `frei_config`
--

INSERT INTO `frei_config` (`id`, `key`, `cat`, `subcat`, `val`) VALUES
(1, 'PATH', 'NULL', 'NULL', 'freichat/'),
(2, 'show_name', 'NULL', 'NULL', 'guest'),
(3, 'displayname', 'NULL', 'NULL', 'username'),
(4, 'chatspeed', 'NULL', 'NULL', '5000'),
(5, 'fxval', 'NULL', 'NULL', 'true'),
(6, 'draggable', 'NULL', 'NULL', 'enable'),
(7, 'conflict', 'NULL', 'NULL', 'true'),
(8, 'msgSendSpeed', 'NULL', 'NULL', '1000'),
(9, 'show_avatar', 'NULL', 'NULL', 'none'),
(10, 'debug', 'NULL', 'NULL', 'false'),
(11, 'freichat_theme', 'NULL', 'NULL', 'basic'),
(12, 'lang', 'NULL', 'NULL', 'english'),
(13, 'load', 'NULL', 'NULL', 'hide'),
(14, 'time', 'NULL', 'NULL', '7'),
(15, 'JSdebug', 'NULL', 'NULL', 'false'),
(16, 'busy_timeOut', 'NULL', 'NULL', '500'),
(17, 'offline_timeOut', 'NULL', 'NULL', '1000'),
(18, 'cache', 'NULL', 'NULL', 'enabled'),
(19, 'GZIP_handler', 'NULL', 'NULL', 'ON'),
(20, 'plugins', 'file_sender', 'show', 'true'),
(21, 'plugins', 'file_sender', 'file_size', '20000'),
(22, 'plugins', 'file_sender', 'expiry', '300'),
(23, 'plugins', 'file_sender', 'valid_exts', 'jpeg,jpg,png,gif,zip'),
(24, 'plugins', 'send_conv', 'show', 'true'),
(25, 'plugins', 'send_conv', 'mailtype', 'smtp'),
(26, 'plugins', 'send_conv', 'smtp_server', 'smtp.gmail.com'),
(27, 'plugins', 'send_conv', 'smtp_port', '465'),
(28, 'plugins', 'send_conv', 'smtp_protocol', 'ssl'),
(29, 'plugins', 'send_conv', 'from_address', 'mohammad.a.kassab@gmail.com'),
(30, 'plugins', 'send_conv', 'from_name', 'Naddoucha150888;'),
(31, 'playsound', 'NULL', 'NULL', 'true'),
(32, 'ACL', 'filesend', 'user', 'allow'),
(33, 'ACL', 'filesend', 'guest', 'noallow'),
(34, 'ACL', 'chatroom', 'user', 'noallow'),
(35, 'ACL', 'chatroom', 'guest', 'noallow'),
(36, 'ACL', 'mail', 'user', 'allow'),
(37, 'ACL', 'mail', 'guest', 'noallow'),
(38, 'ACL', 'save', 'user', 'allow'),
(39, 'ACL', 'save', 'guest', 'noallow'),
(40, 'ACL', 'smiley', 'user', 'allow'),
(41, 'ACL', 'smiley', 'guest', 'noallow'),
(42, 'polling', 'NULL', 'NULL', 'disabled'),
(43, 'polling_time', 'NULL', 'NULL', '30'),
(44, 'link_profile', 'NULL', 'NULL', 'disabled'),
(46, 'sef_link_profile', 'NULL', 'NULL', 'disabled'),
(47, 'plugins', 'chatroom', 'location', 'bottom'),
(48, 'plugins', 'chatroom', 'autoclose', 'false'),
(49, 'content_height', 'NULL', 'NULL', '200px'),
(50, 'chatbox_status', 'NULL', 'NULL', 'false'),
(51, 'BOOT', 'NULL', 'NULL', 'yes'),
(52, 'exit_for_guests', 'NULL', 'NULL', 'yes'),
(53, 'plugins', 'chatroom', 'offset', '50px'),
(54, 'plugins', 'chatroom', 'label_offset', '0.8%'),
(55, 'addedoptions_visibility', 'NULL', 'NULL', 'SHOWN'),
(56, 'ug_ids', 'NULL', 'NULL', ''),
(57, 'ACL', 'chat', 'user', 'allow'),
(58, 'ACL', 'chat', 'guest', 'noallow'),
(59, 'plugins', 'chatroom', 'override_positions', 'yes'),
(60, 'ACL', 'video', 'user', 'noallow'),
(61, 'ACL', 'video', 'guest', 'noallow'),
(62, 'ACL', 'chatroom_crt', 'user', 'allow'),
(63, 'ACL', 'chatroom_crt', 'guest', 'noallow'),
(64, 'plugins', 'chatroom', 'chatroom_expiry', '3600'),
(65, 'chat_time_shown_always', 'NULL', 'NULL', 'no'),
(66, 'allow_guest_name_change', 'NULL', 'NULL', 'no'),
(67, 'ACL', 'groupchat', 'user', 'noallow'),
(68, 'ACL', 'groupchat', 'guest', 'noallow');

-- --------------------------------------------------------

--
-- Structure de la table `frei_groupchat`
--

DROP TABLE IF EXISTS `frei_groupchat`;
CREATE TABLE IF NOT EXISTS `frei_groupchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `group_author` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `group_created` int(11) NOT NULL,
  `group_participants` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `frei_rooms`
--

DROP TABLE IF EXISTS `frei_rooms`;
CREATE TABLE IF NOT EXISTS `frei_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_author` varchar(100) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` tinyint(4) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `room_created` int(11) NOT NULL,
  `room_last_active` int(11) NOT NULL,
  `room_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_name` (`room_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `frei_rooms`
--

INSERT INTO `frei_rooms` (`id`, `room_author`, `room_name`, `room_type`, `room_password`, `room_created`, `room_last_active`, `room_order`) VALUES
(1, 'admin', 'Fun Talk', 0, '', 1373557250, 1473162306, 1),
(2, 'admin', 'Crazy chat', 0, '', 1373557260, 1373557260, 5),
(3, 'admin', 'Think out loud', 0, '', 1373557872, 1373557872, 2),
(4, 'admin', 'Talk to me ', 0, '', 1373558017, 1373558017, 3),
(5, 'admin', 'Talk innovative', 0, '', 1373558039, 1373799404, 4);

-- --------------------------------------------------------

--
-- Structure de la table `frei_session`
--

DROP TABLE IF EXISTS `frei_session`;
CREATE TABLE IF NOT EXISTS `frei_session` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permanent_id` (`permanent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frei_smileys`
--

DROP TABLE IF EXISTS `frei_smileys`;
CREATE TABLE IF NOT EXISTS `frei_smileys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `frei_smileys`
--

INSERT INTO `frei_smileys` (`id`, `symbol`, `image_name`) VALUES
(1, ':S', 'worried55231.gif'),
(2, '(wasntme)', 'itwasntme55198.gif'),
(3, 'x(', 'angry55174.gif'),
(4, '(doh)', 'doh55146.gif'),
(5, '|-()', 'yawn55117.gif'),
(6, ']:)', 'evilgrin55088.gif'),
(7, '|(', 'dull55062.gif'),
(8, '|-)', 'sleepy55036.gif'),
(9, '(blush)', 'blush54981.gif'),
(10, ':P', 'tongueout54953.gif'),
(11, '(:|', 'sweat54888.gif'),
(12, ';(', 'crying54854.gif'),
(13, ':)', 'smile54593.gif'),
(14, ':(', 'sad54749.gif'),
(15, ':D', 'bigsmile54781.gif'),
(16, '8)', 'cool54801.gif'),
(17, ':o', 'wink54827.gif'),
(18, '(mm)', 'mmm55255.gif'),
(19, ':x', 'lipssealed55304.gif');

-- --------------------------------------------------------

--
-- Structure de la table `frei_video_session`
--

DROP TABLE IF EXISTS `frei_video_session`;
CREATE TABLE IF NOT EXISTS `frei_video_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL COMMENT 'unique room id',
  `from_id` int(11) NOT NULL,
  `msg_type` varchar(10) NOT NULL,
  `msg_label` int(2) NOT NULL,
  `msg_data` varchar(3000) NOT NULL,
  `msg_time` decimal(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frei_webrtc`
--

DROP TABLE IF EXISTS `frei_webrtc`;
CREATE TABLE IF NOT EXISTS `frei_webrtc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_info`
--

INSERT INTO `user_info` (`userid`, `username`) VALUES
(4, 'ماهر_العلي'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(4, 'ماهر_العلي'),
(1, 'علي_الأدريس'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(2, 'محمد_نجم'),
(4, 'ماهر_العلي'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(2, 'محمد_نجم'),
(5, 'rabih_kassab'),
(2, 'محمد_نجم'),
(12, 'موديد_kasab'),
(1, 'علي_الأدريس'),
(4, 'ماهر_العلي'),
(2, 'محمد_نجم'),
(1, 'علي_الأدريس');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
