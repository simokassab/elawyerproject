<?php
ini_set('max_execution_time', 0);
include ('constants.php');

if (isset($_POST['create'])){

require('config.php');
require('func.php');

$dbname = sanitize($_POST['db']);

if ($conn->query("CREATE DATABASE elawyer_$dbname") === TRUE) {
	$s= $conn->query("CREATE DATABASE freichat_$dbname");	
	if ($conn->query("USE elawyer_$dbname") === TRUE){

		$createAccountTable = "CREATE TABLE IF NOT EXISTS `account` (
  			`ID` int(11) NOT NULL AUTO_INCREMENT,
  			`date` date NOT NULL,
  			`customer_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  			PRIMARY KEY (`ID`)
			);";

		$createAccountActionTable = "CREATE TABLE IF NOT EXISTS `account_action` (
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
			);";

			$createArchiveCases = "CREATE TABLE IF NOT EXISTS `archive_cases` (
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
			);";

			$createUsers = "CREATE TABLE IF NOT EXISTS `users` (
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
			);";

			$createTblUser = "CREATE TABLE IF NOT EXISTS `tbl_user` (
		  	`id` int(11) NOT NULL AUTO_INCREMENT,
		  	`username` varchar(45) NOT NULL,
		  	`password` varchar(45) NOT NULL,
		  	`name` varchar(45) NOT NULL,
		  	`token` char(16) DEFAULT NULL,
		  	`token_expire` datetime DEFAULT NULL,
		  	PRIMARY KEY (`id`),
		  	UNIQUE KEY `username_UNIQUE` (`username`)
			);";

			$createBreakStatus = "CREATE TABLE IF NOT EXISTS `break_status` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`value` varchar(100) NOT NULL,
		  	PRIMARY KEY (`ID`),
		  	KEY `value` (`value`)
			);";

			$createCalender = "CREATE TABLE IF NOT EXISTS `calendar` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`consultation_ID` int(11) DEFAULT NULL,
		  	`start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	`end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	`title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
		  	`description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createCases = "CREATE TABLE IF NOT EXISTS `cases` (
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
			);";

			$createCaseType = "CREATE TABLE IF NOT EXISTS `case_type` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`ctype` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";


			$createConsultation = "CREATE TABLE IF NOT EXISTS `consultation` (
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
			);";

			$createContact = "CREATE TABLE IF NOT EXISTS `contract` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`account_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
		  	`contract_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`case_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createCustomers = "CREATE TABLE IF NOT EXISTS `customers` (
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
			);";

			$createEvents = "CREATE TABLE IF NOT EXISTS `events` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`datee` date NOT NULL,
		  	`case_ID` int(11) NOT NULL,
		  	`event` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`starttime` datetime NOT NULL,
		  	`endtime` datetime NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createForms = "CREATE TABLE IF NOT EXISTS `form` (
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
			);";

			$createKitchen = "CREATE TABLE IF NOT EXISTS `kitchen` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`user_ID` int(11) NOT NULL,
		  	`orderr` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`datetimee` datetime NOT NULL,
		  	`statuss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	`comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createLawyerType = "CREATE TABLE IF NOT EXISTS `lawyer_type` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`trule` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createLevels = "CREATE TABLE IF NOT EXISTS `level` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`rule` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createLogs = "CREATE TABLE IF NOT EXISTS `logs` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`user_ID` int(11) DEFAULT NULL,
		  	`date` date DEFAULT NULL,
		  	`login` timestamp NULL DEFAULT NULL,
		  	`logout` timestamp NULL DEFAULT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createMissions = "CREATE TABLE IF NOT EXISTS `missions` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`from_user_id` int(11) NOT NULL,
		  	`to_user_id` int(11) NOT NULL,
		  	`mtype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	`startdate` date NOT NULL,
		  	`enddate` date NOT NULL,
		  	`case_id` int(11) NOT NULL,
		  	`comments` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	`priority` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createNotifications = "CREATE TABLE IF NOT EXISTS `notification` (
		  	`id` int(11) NOT NULL AUTO_INCREMENT,
		  	`from` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
		  	`to` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
		  	`url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
		  	`title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
		  	`status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  	PRIMARY KEY (`id`)
			);";

			$createOnlineUsers  = "CREATE TABLE IF NOT EXISTS `online_users` (
		  	`ID` int(11) NOT NULL AUTO_INCREMENT,
		  	`user_ID` int(11) NOT NULL,
		  	`date` date NOT NULL,
		  	`firstlogin` time DEFAULT NULL,
		  	`status` int(11) NOT NULL,
		  	`break_status` varchar(100) NOT NULL,
		  	PRIMARY KEY (`ID`)
			);";

			$createOpponent = "CREATE TABLE IF NOT EXISTS `opponent` (
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
			);";

			$conn->query($createAccountTable);
			$conn->query($createAccountActionTable);			
			$conn->query($createArchiveCases);
			$conn->query($createUsers);
			$conn->query($createTblUser);
			$conn->query($createBreakStatus);
			$conn->query($createCalender);
			$conn->query($createCases);
			$conn->query($createCaseType);
			$conn->query($createConsultation);
			$conn->query($createContact);
			$conn->query($createCustomers);
			$conn->query($createEvents);
			$conn->query($createForms);
			$conn->query($createKitchen);
			$conn->query($createLawyerType);
			$conn->query($createLevels);
			$conn->query($createLogs);
			$conn->query($createMissions);
			$conn->query($createNotifications);
			$conn->query($createOnlineUsers);
			$conn->query($createOpponent);
			if($_SERVER["SERVER_ADDR"]=="::1") {
				mkdir(PATH_URL."elfinder/files/$dbname", 0777, true);
				recurse_copy (PATH_URL."/freichat_techoffice/", PATH_URL."freichat_".$dbname."/");
			}
			else {
				
				mkdir($_SERVER['DOCUMENT_ROOT']."/elfinder/files/$dbname", 0777, true);
				recurse_copy ($_SERVER['DOCUMENT_ROOT']."/freichat_techoffice/", $_SERVER['DOCUMENT_ROOT']."freichat_".$dbname."/");
			}
			echo "<script>window.location = \" index.php?success=1 \"</script>";
		}
}else {
    echo "<script>window.alert(\"Error creating database: $conn->error\")</script>";
    echo "<script>window.location = \" index.php \"</script>";
}


$conn->close();
}