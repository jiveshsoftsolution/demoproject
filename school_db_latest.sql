-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table school_gyan.emsparent
CREATE TABLE IF NOT EXISTS `emsparent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `father_salutation_id` int(11) NOT NULL,
  `father_first_name` varchar(50) NOT NULL,
  `father_middle_name` varchar(50) DEFAULT NULL,
  `father_last_name` varchar(50) DEFAULT NULL,
  `mother_salutation_id` int(11) NOT NULL,
  `mother_first_name` varchar(50) NOT NULL,
  `mother_middle_name` varchar(50) DEFAULT NULL,
  `mother_last_name` varchar(50) DEFAULT NULL,
  `father_photo_url` longtext,
  `mother_photo_url` longtext,
  `mother_salutation` varchar(50) DEFAULT NULL,
  `father_salutation` varchar(50) DEFAULT NULL,
  `mail_to` varchar(200) DEFAULT NULL,
  `parent_mobile` varchar(50) DEFAULT NULL,
  `login_id` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `parent_email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.emsparent: ~4 rows (approximately)
/*!40000 ALTER TABLE `emsparent` DISABLE KEYS */;
INSERT INTO `emsparent` (`parent_id`, `student_id`, `father_salutation_id`, `father_first_name`, `father_middle_name`, `father_last_name`, `mother_salutation_id`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `father_photo_url`, `mother_photo_url`, `mother_salutation`, `father_salutation`, `mail_to`, `parent_mobile`, `login_id`, `password`, `parent_email`) VALUES
	(21, 6, 1, 'A1', NULL, 'A1', 2, 'A1', NULL, 'A1', NULL, NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(22, 7, 1, 'B1', NULL, 'B1', 2, 'B1', NULL, 'B1', NULL, NULL, NULL, NULL, NULL, '8750953636', 'testId', '123789', NULL),
	(23, 8, 1, 'C1', NULL, 'C1', 2, 'C1', NULL, 'C1', NULL, NULL, NULL, NULL, 'C1', '8750953636', 'testId', '123789', NULL),
	(24, 9, 1, 'D1', NULL, 'D1', 2, 'D1', NULL, 'D1', NULL, NULL, NULL, NULL, 'D1', '8750953636', 'testId', '123789', NULL),
	(25, 10, 1, 'E1', NULL, 'E1', 2, 'E1', NULL, 'E1', NULL, NULL, NULL, NULL, 'E1', '8750953636', 'testId', '123789', NULL);
/*!40000 ALTER TABLE `emsparent` ENABLE KEYS */;


-- Dumping structure for table school_gyan.emsstudent
CREATE TABLE IF NOT EXISTS `emsstudent` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `login_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo_url` longtext,
  `admission_number` varchar(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by_type` int(11) DEFAULT NULL,
  `updated_by_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.emsstudent: ~4 rows (approximately)
/*!40000 ALTER TABLE `emsstudent` DISABLE KEYS */;
INSERT INTO `emsstudent` (`student_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `dob`, `login_id`, `password`, `photo_url`, `admission_number`, `created_by`, `created_date`, `updated_by`, `updated_date`, `created_by_type`, `updated_by_type`) VALUES
	(6, 1, 'A1', NULL, 'A1', NULL, 'M', '2015-08-19 00:00:00', 'S_A1', '123789', NULL, NULL, 1, '2015-08-19 20:23:00', NULL, NULL, 0, NULL),
	(7, 1, 'B1', NULL, 'B1', NULL, 'M', '2015-08-19 00:00:00', 'S_B1', '123789', NULL, NULL, 1, '2015-08-19 20:23:44', NULL, NULL, 0, NULL),
	(8, 1, 'C1', NULL, 'C1', NULL, 'M', '2015-08-19 00:00:00', 'S_C1', '123789', NULL, NULL, 1, '2015-08-19 20:24:22', NULL, NULL, 0, NULL),
	(9, 1, 'D1', NULL, 'D1', NULL, 'M', '2015-08-19 00:00:00', 'S_D1', '123789', NULL, NULL, 1, '2015-08-19 20:24:57', NULL, NULL, 0, NULL),
	(10, 1, 'E1', NULL, 'E1', NULL, 'M', '2015-08-19 00:00:00', 'S_E1', '123789', NULL, NULL, 1, '2015-08-19 20:25:33', NULL, NULL, 0, NULL);
/*!40000 ALTER TABLE `emsstudent` ENABLE KEYS */;


-- Dumping structure for table school_gyan.emsstudent_old
CREATE TABLE IF NOT EXISTS `emsstudent_old` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `login_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo_url` longtext,
  `admission_number` varchar(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by_type` int(11) DEFAULT NULL,
  `updated_by_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.emsstudent_old: ~2 rows (approximately)
/*!40000 ALTER TABLE `emsstudent_old` DISABLE KEYS */;
INSERT INTO `emsstudent_old` (`student_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `dob`, `login_id`, `password`, `photo_url`, `admission_number`, `created_by`, `created_date`, `updated_by`, `updated_date`, `created_by_type`, `updated_by_type`) VALUES
	(1, 1, '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 1, 'amit', '', 'mishra', NULL, 'M', '2015-08-26 00:00:00', 'S_amit', '123789', '143967252361234_download.jpg', NULL, 1, '2015-08-15 22:41:43', 1, '2015-08-15 23:02:03', 0, 0);
/*!40000 ALTER TABLE `emsstudent_old` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_attendance
CREATE TABLE IF NOT EXISTS `ems_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_teacher_class_id` int(11) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `attendance_date` datetime DEFAULT NULL,
  `attendance_time` datetime DEFAULT NULL,
  `attendance_update_date` datetime DEFAULT NULL,
  `attendance_update_time` time DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `is_send` tinyint(1) NOT NULL DEFAULT '0',
  `card_no` varchar(50) DEFAULT NULL,
  `attendance_status` varchar(5) NOT NULL,
  `attendance_approve_by_type` varchar(5) NOT NULL,
  `attendance_taken_by` int(11) DEFAULT NULL,
  `attendance_approve_by` int(11) DEFAULT NULL,
  `attendance_taken_by_type` varchar(5) DEFAULT NULL,
  `attendance_updated_by` int(11) DEFAULT NULL,
  `attendance_updated_by_type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_attendance: 5 rows
/*!40000 ALTER TABLE `ems_attendance` DISABLE KEYS */;
INSERT INTO `ems_attendance` (`attendance_id`, `student_teacher_class_id`, `type`, `attendance_date`, `attendance_time`, `attendance_update_date`, `attendance_update_time`, `approve_date`, `approve_time`, `is_send`, `card_no`, `attendance_status`, `attendance_approve_by_type`, `attendance_taken_by`, `attendance_approve_by`, `attendance_taken_by_type`, `attendance_updated_by`, `attendance_updated_by_type`) VALUES
	(210, 48, 'morning', '2015-09-05 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2015-09-05 00:46:56', '23:26:05', 0, NULL, 'A', '', 1, NULL, 'A', NULL, NULL),
	(211, 49, 'morning', '2015-09-05 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2015-09-05 00:46:58', '23:26:07', 0, NULL, 'P', '', 1, NULL, 'A', NULL, NULL),
	(212, 50, 'morning', '2015-09-05 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2015-09-05 00:46:59', '23:26:08', 0, NULL, 'P', '', 1, NULL, 'A', NULL, NULL),
	(208, 46, 'morning', '2015-09-05 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2015-09-05 00:47:13', '23:26:09', 0, NULL, 'P', '', 1, NULL, 'A', NULL, NULL),
	(209, 47, 'morning', '2015-09-05 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '2015-09-05 00:47:15', '23:26:10', 0, NULL, 'A', '', 1, NULL, 'A', NULL, NULL);
/*!40000 ALTER TABLE `ems_attendance` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_city
CREATE TABLE IF NOT EXISTS `ems_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `state_id` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_city: 69 rows
/*!40000 ALTER TABLE `ems_city` DISABLE KEYS */;
INSERT INTO `ems_city` (`city_id`, `city_name`, `state_id`) VALUES
	(8, 'Agra', '37'),
	(7, 'Ghaziabad', '37'),
	(6, 'Lucknow', '37'),
	(5, 'Kanpur', '37'),
	(9, 'Varanasi', '37'),
	(10, 'Meerut', '37'),
	(11, 'Allahabad', '37'),
	(12, 'Bareilly', '37'),
	(13, 'Aligarh', '37'),
	(14, 'Moradabad', '37'),
	(15, 'Saharanpur', '37'),
	(16, 'Gorakhpur', '37'),
	(17, 'Noida', '37'),
	(18, 'Jhansi', '37'),
	(19, 'Muzaffarnagar', '37'),
	(20, 'Mathura', '37'),
	(21, 'Badaun', '37'),
	(22, 'Rampur', '37'),
	(23, 'Shahjahanpur', '37'),
	(24, 'Farrukhabad', '37'),
	(25, 'Mau', '37'),
	(26, 'Hapur', '37'),
	(27, 'Faizabad', '37'),
	(28, 'Etawah', '37'),
	(29, 'Mirzapur', '37'),
	(30, 'Bulandshahr', '37'),
	(31, 'Bhimnagar', '37'),
	(32, 'Amroha', '37'),
	(33, 'Hardoi', '37'),
	(34, 'Fatehpur', '37'),
	(35, 'Raebareli', '37'),
	(36, 'Orai', '37'),
	(37, 'Sitapur', '37'),
	(38, 'Bahraich', '37'),
	(39, 'Ghaziabad', '37'),
	(40, 'Unnao', '37'),
	(41, 'Jaunpur', '37'),
	(42, 'Lakhimpur Kheri', '37'),
	(43, 'Hathras', '37'),
	(44, 'Banda', '37'),
	(45, 'Pilibhit', '37'),
	(46, 'Mughalsarai	', '37'),
	(47, 'Barabanki', '37'),
	(48, 'Bulandshahr', '37'),
	(49, 'Gonda', '37'),
	(50, 'Mainpuri', '37'),
	(51, 'Lalitpur', '37'),
	(52, 'Etah', '37'),
	(53, 'Deoria', '37'),
	(54, 'Ujhan', '37'),
	(55, 'Ghazipur', '37'),
	(56, 'Sultanpur', '37'),
	(57, 'Azamgarh', '37'),
	(58, 'Bijnor', '37'),
	(59, 'Sahaswan', '37'),
	(60, 'Basti', '37'),
	(61, 'Chandausi', '37'),
	(62, 'Ambedkar Nagar', '37'),
	(63, 'Ballia', '37'),
	(64, 'Mubarakpur', '37'),
	(65, 'Gautam Budh Nagar', '37'),
	(66, 'Firozabad', '37'),
	(67, 'Shamli', '37'),
	(68, 'Aligarh', '37'),
	(69, 'Kanshi Ram Nagar', '37'),
	(70, 'East Delhi', '9'),
	(71, 'West Delhi', '9'),
	(72, 'North Delhi', '9'),
	(73, 'South Delhi', '9');
/*!40000 ALTER TABLE `ems_city` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_class
CREATE TABLE IF NOT EXISTS `ems_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_class: ~14 rows (approximately)
/*!40000 ALTER TABLE `ems_class` DISABLE KEYS */;
INSERT INTO `ems_class` (`class_id`, `class_name`) VALUES
	(1, 'LKG'),
	(2, 'UKG'),
	(3, 'I'),
	(4, 'II'),
	(5, 'III'),
	(6, 'IV'),
	(7, 'V'),
	(8, 'VI'),
	(9, 'VII'),
	(10, 'VIII'),
	(11, 'IX'),
	(12, 'X'),
	(13, 'XI'),
	(14, 'XII');
/*!40000 ALTER TABLE `ems_class` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_class_section
CREATE TABLE IF NOT EXISTS `ems_class_section` (
  `class_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`class_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_class_section: ~12 rows (approximately)
/*!40000 ALTER TABLE `ems_class_section` DISABLE KEYS */;
INSERT INTO `ems_class_section` (`class_section_id`, `class_id`, `section_id`, `sequence`) VALUES
	(1, 1, 2, 3),
	(2, 2, 2, 4),
	(3, 3, 2, 5),
	(4, 4, 2, 6),
	(5, 5, 2, 7),
	(6, 6, 2, 8),
	(7, 7, 2, 9),
	(8, 8, 2, 10),
	(9, 9, 2, 11),
	(10, 10, 2, 12),
	(11, 11, 2, 13),
	(12, 12, 2, 14),
	(13, 13, 2, 1),
	(14, 14, 2, 2);
/*!40000 ALTER TABLE `ems_class_section` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_country
CREATE TABLE IF NOT EXISTS `ems_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_country: 1 rows
/*!40000 ALTER TABLE `ems_country` DISABLE KEYS */;
INSERT INTO `ems_country` (`country_id`, `country_name`) VALUES
	(1, 'INDIA');
/*!40000 ALTER TABLE `ems_country` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_daily_timetable
CREATE TABLE IF NOT EXISTS `ems_daily_timetable` (
  `daily_timetable_id` int(55) NOT NULL AUTO_INCREMENT,
  `session_id` int(55) NOT NULL,
  `season_id` int(11) DEFAULT NULL,
  `teacher_id` int(55) NOT NULL,
  `paper_id` int(55) NOT NULL,
  `class_section_id` int(55) NOT NULL,
  `period_id` int(55) NOT NULL,
  `week_day` varchar(250) DEFAULT NULL,
  `created_by` int(55) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`daily_timetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_daily_timetable: ~3 rows (approximately)
/*!40000 ALTER TABLE `ems_daily_timetable` DISABLE KEYS */;
INSERT INTO `ems_daily_timetable` (`daily_timetable_id`, `session_id`, `season_id`, `teacher_id`, `paper_id`, `class_section_id`, `period_id`, `week_day`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(1, 1, NULL, 1, 1, 6, 1, 'monday', 0, '0000-00-00 00:00:00', NULL, NULL),
	(2, 1, NULL, 1, 2, 6, 1, 'wednesday', 11, '2014-04-05 18:26:41', NULL, NULL),
	(3, 1, 1, 0, 2, 2, 7, 'monday', 11, '2014-05-24 11:43:43', NULL, NULL);
/*!40000 ALTER TABLE `ems_daily_timetable` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_exam
CREATE TABLE IF NOT EXISTS `ems_exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_exam: 1 rows
/*!40000 ALTER TABLE `ems_exam` DISABLE KEYS */;
INSERT INTO `ems_exam` (`exam_id`, `exam_name`) VALUES
	(1, 'Half Yearly');
/*!40000 ALTER TABLE `ems_exam` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_exam_period
CREATE TABLE IF NOT EXISTS `ems_exam_period` (
  `exam_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`exam_period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_exam_period: 1 rows
/*!40000 ALTER TABLE `ems_exam_period` DISABLE KEYS */;
INSERT INTO `ems_exam_period` (`exam_period_id`, `exam_id`, `session_id`, `start_date`, `end_date`) VALUES
	(1, 1, 1, '2015-05-23 18:39:21', '2015-05-23 18:39:22');
/*!40000 ALTER TABLE `ems_exam_period` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_exam_schedule
CREATE TABLE IF NOT EXISTS `ems_exam_schedule` (
  `exam_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_period_id` int(11) NOT NULL,
  `exam_date` datetime NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `paper_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`exam_schedule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_exam_schedule: 1 rows
/*!40000 ALTER TABLE `ems_exam_schedule` DISABLE KEYS */;
INSERT INTO `ems_exam_schedule` (`exam_schedule_id`, `exam_period_id`, `exam_date`, `time_from`, `time_to`, `paper_id`, `sequence`) VALUES
	(1, 1, '2015-05-23 18:39:29', '18:39:30', '18:39:32', 1, 1);
/*!40000 ALTER TABLE `ems_exam_schedule` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_exam_to_marks
CREATE TABLE IF NOT EXISTS `ems_exam_to_marks` (
  `exam_period_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `max_marks` float DEFAULT NULL,
  PRIMARY KEY (`exam_period_id`,`paper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_exam_to_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_exam_to_marks` DISABLE KEYS */;
INSERT INTO `ems_exam_to_marks` (`exam_period_id`, `paper_id`, `max_marks`) VALUES
	(0, 1, 50);
/*!40000 ALTER TABLE `ems_exam_to_marks` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_fee_amount
CREATE TABLE IF NOT EXISTS `ems_fee_amount` (
  `amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_section_id` varchar(50) NOT NULL,
  `session_id` int(11) NOT NULL,
  `month_id` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  PRIMARY KEY (`amount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_fee_amount: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_amount` DISABLE KEYS */;
INSERT INTO `ems_fee_amount` (`amount_id`, `class_section_id`, `session_id`, `month_id`, `created_date`, `amount`, `fee_type_id`) VALUES
	(5, '19,20', 1, '1,2', '2014-04-09 22:55:07', 100, 1),
	(6, '19,20,38', 2, '1,2,5', '2014-04-10 00:36:33', 1000, 1);
/*!40000 ALTER TABLE `ems_fee_amount` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_fee_submission
CREATE TABLE IF NOT EXISTS `ems_fee_submission` (
  `submission_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `month_id` varchar(50) DEFAULT NULL,
  `tuition_fee` int(11) DEFAULT NULL,
  `transport_fee` int(11) DEFAULT NULL,
  `miscellaneous_fee` int(11) DEFAULT NULL,
  `total_fee` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`submission_id`),
  KEY `submission_id` (`submission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_fee_submission: ~11 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_submission` DISABLE KEYS */;
INSERT INTO `ems_fee_submission` (`submission_id`, `student_id`, `class_section_id`, `session_id`, `roll_number`, `submission_date`, `month_id`, `tuition_fee`, `transport_fee`, `miscellaneous_fee`, `total_fee`, `created_date`, `updated_date`) VALUES
	(12, 6, 1, 1, 12, '2015-08-30', '8', 100, 200, 300, 0, '2015-08-30 00:00:00', '2015-08-30 10:52:15'),
	(13, 6, 1, 1, 12, '2015-08-30', '1', 200, 200, 200, 0, '2015-08-30 00:00:00', '2015-08-30 10:53:29'),
	(14, 6, 1, 1, 12, '2015-08-30', '2', 200, 200, 200, 0, '2015-08-30 00:00:00', '2015-08-30 10:53:29'),
	(15, 6, 1, 1, 122, '2015-08-31', '1', 212, 2112, 2121, 0, '2015-08-31 00:00:00', '2015-08-31 22:50:33'),
	(16, 6, 1, 1, 100, '2015-08-31', '1', 12121, 2, 1, 0, '2015-08-31 20:24:05', '2015-08-31 23:54:05'),
	(17, 6, 1, 1, 100, '2015-08-31', '5', 12121, 2, 1, 0, '2015-08-31 20:24:05', '2015-08-31 23:54:05'),
	(18, 6, 1, 1, 123, '2015-08-31', '1', 100, 100, 200, 0, '2015-08-31 20:25:37', '2015-08-31 23:55:37'),
	(19, 6, 1, 1, 123, '2015-08-31', '2', 100, 100, 200, 0, '2015-08-31 20:25:37', '2015-08-31 23:55:37'),
	(20, 6, 1, 1, 100, '2015-08-31', '1', 200, 200, 200, 0, '2015-08-31 20:30:55', '2015-09-01 00:00:55'),
	(21, 6, 1, 1, 100, '2015-08-31', '2', 200, 200, 200, 0, '2015-08-31 20:30:55', '2015-09-01 00:00:55'),
	(22, 6, 1, 1, 100, '2015-09-01', '3', 200, 200, 200, 0, '2015-08-31 20:30:55', '2015-09-01 09:02:04'),
	(23, 6, 1, 1, 3432, '2015-09-01', '1', 343, 342, 43, 0, '2015-09-01 05:32:53', '2015-09-01 09:02:53');
/*!40000 ALTER TABLE `ems_fee_submission` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_fee_submission_old
CREATE TABLE IF NOT EXISTS `ems_fee_submission_old` (
  `submission_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `balance` float DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `submitted_date` datetime NOT NULL,
  PRIMARY KEY (`submission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_fee_submission_old: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_submission_old` DISABLE KEYS */;
INSERT INTO `ems_fee_submission_old` (`submission_id`, `student_id`, `session_id`, `month_id`, `amount`, `balance`, `fine`, `submitted_date`) VALUES
	(1, 1, 1, 1, 300, 600, NULL, '2014-03-02 23:08:22');
/*!40000 ALTER TABLE `ems_fee_submission_old` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_fee_type
CREATE TABLE IF NOT EXISTS `ems_fee_type` (
  `fee_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type_name` varchar(200) NOT NULL,
  `refundable` enum('0','1') NOT NULL DEFAULT '0',
  `is_active` enum('0','1') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fee_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_fee_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_type` DISABLE KEYS */;
INSERT INTO `ems_fee_type` (`fee_type_id`, `fee_type_name`, `refundable`, `is_active`, `created_date`) VALUES
	(1, 'Tuition Fee', '0', '1', '2014-02-23 10:40:26'),
	(2, 'Transport Fee', '0', '1', '2014-02-23 10:41:08'),
	(3, 'Miscellaneous Fee', '0', '1', '2014-02-23 10:45:07'),
	(11, 'Demo1', '0', '1', '2015-08-22 18:20:26');
/*!40000 ALTER TABLE `ems_fee_type` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_grade_to_marks
CREATE TABLE IF NOT EXISTS `ems_grade_to_marks` (
  `grade_id` int(11) NOT NULL,
  `min_limit` float NOT NULL,
  `max_limit` float NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_grade_to_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_grade_to_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_grade_to_marks` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_landmark
CREATE TABLE IF NOT EXISTS `ems_landmark` (
  `landmark_id` int(11) NOT NULL AUTO_INCREMENT,
  `landmark_name` varchar(100) NOT NULL,
  PRIMARY KEY (`landmark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_landmark: 0 rows
/*!40000 ALTER TABLE `ems_landmark` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_landmark` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_login
CREATE TABLE IF NOT EXISTS `ems_login` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login_type` varchar(20) NOT NULL COMMENT 'A="Admin" S="Student" T="Techer C="Coordinator""',
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'PK of ems_student, ems_parent, ems_teacher, ems_user',
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_login: ~17 rows (approximately)
/*!40000 ALTER TABLE `ems_login` DISABLE KEYS */;
INSERT INTO `ems_login` (`user_login_id`, `user_login_type`, `login_id`, `password`, `user_id`) VALUES
	(2, 'A', 'Admin', 'admin', 1),
	(40, 'S', 'Sami23735', 'Q!ig2FeO', 2),
	(41, 'P', 'PF171478', 'l0W7Ibzu', 17),
	(42, 'T', 'Taa532101', '5ftRiYEN', 1),
	(43, 'S', 'Sama3703', 'ZKLVv4JX', 3),
	(44, 'P', 'Pa21184988', 'tm!PS4Od', 18),
	(45, 'S', 'Sssd42077', 'zFTm1dZP', 4),
	(46, 'P', 'Pbh19294', 'EiuVKfIR', 19),
	(47, 'S', 'Smjj54669', 'hoHMUY6N', 5),
	(48, 'P', 'Pvft202869', 'wjdy107l', 20),
	(49, 'S', 'SA162977', '0lE13rai', 6),
	(50, 'P', 'PA1211932', '@410G!Bc', 21),
	(51, 'S', 'SB172757', 'daXwc@Bk', 7),
	(52, 'P', 'PB1223326', 'EoUvsyjX', 22),
	(53, 'S', 'SC18110', 'b8ZeEXD1', 8),
	(54, 'P', 'PC1231902', 'yXMqWeRH', 23),
	(55, 'S', 'SD19322', 'DUiYjQb8', 9),
	(56, 'P', 'PD1243934', 'dhOtK35c', 24),
	(57, 'S', 'SE1102768', '5D#u!@QL', 10),
	(58, 'P', 'PE1252028', 'SPzf3DQM', 25);
/*!40000 ALTER TABLE `ems_login` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_marks
CREATE TABLE IF NOT EXISTS `ems_marks` (
  `marks_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_period_id` int(11) NOT NULL,
  `st_class_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  PRIMARY KEY (`marks_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_marks: 6 rows
/*!40000 ALTER TABLE `ems_marks` DISABLE KEYS */;
INSERT INTO `ems_marks` (`marks_id`, `exam_period_id`, `st_class_id`, `paper_id`, `obtained_marks`) VALUES
	(23, 1, 20, 1, 50),
	(22, 1, 21, 2, 60),
	(48, 1, 20, 2, 50),
	(47, 1, 20, 1, 50),
	(49, 9, 21, 1, 45),
	(50, 9, 21, 2, 89);
/*!40000 ALTER TABLE `ems_marks` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_menu
CREATE TABLE IF NOT EXISTS `ems_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_menu: ~14 rows (approximately)
/*!40000 ALTER TABLE `ems_menu` DISABLE KEYS */;
INSERT INTO `ems_menu` (`menu_id`, `menu_name`) VALUES
	(1, 'General SMS'),
	(2, 'Attendance'),
	(3, 'Fees'),
	(5, 'Registration'),
	(6, 'Notice'),
	(14, 'Profile'),
	(24, 'Exam'),
	(210, 'Online Exam'),
	(211, 'Access Right'),
	(212, 'Time Table'),
	(213, 'Result');
/*!40000 ALTER TABLE `ems_menu` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_month
CREATE TABLE IF NOT EXISTS `ems_month` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(50) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_month: ~12 rows (approximately)
/*!40000 ALTER TABLE `ems_month` DISABLE KEYS */;
INSERT INTO `ems_month` (`month_id`, `month`) VALUES
	(1, 'January'),
	(2, 'Febuary'),
	(3, 'March'),
	(4, 'April'),
	(5, 'May'),
	(6, 'June'),
	(7, 'July'),
	(8, 'August'),
	(9, 'September'),
	(10, 'October'),
	(11, 'Novermber'),
	(12, 'December');
/*!40000 ALTER TABLE `ems_month` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_news_events
CREATE TABLE IF NOT EXISTS `ems_news_events` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text NOT NULL,
  `news_description` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_news_events: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_news_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_news_events` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_notice
CREATE TABLE IF NOT EXISTS `ems_notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice` text NOT NULL,
  `notice_for` int(11) NOT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `post_to_web` enum('0','1') NOT NULL DEFAULT '0',
  `notice_subject` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_notice: ~1 rows (approximately)
/*!40000 ALTER TABLE `ems_notice` DISABLE KEYS */;
INSERT INTO `ems_notice` (`notice_id`, `notice`, `notice_for`, `class_section_id`, `class_id`, `post_to_web`, `notice_subject`, `created_date`, `updated_date`) VALUES
	(4, 'notice1323234', 4, 0, NULL, '1', 'title132433545434', '2015-09-05 17:19:17', '2015-09-05 19:06:16');
/*!40000 ALTER TABLE `ems_notice` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_online_exam
CREATE TABLE IF NOT EXISTS `ems_online_exam` (
  `online_exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_section_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `exam_period_id` int(11) NOT NULL,
  `no_of_question` int(11) DEFAULT NULL,
  `exam_duration` time NOT NULL,
  `exam_date` datetime DEFAULT NULL,
  PRIMARY KEY (`online_exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_online_exam: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_online_exam_que_marks
CREATE TABLE IF NOT EXISTS `ems_online_exam_que_marks` (
  `que_marks_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_exam_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `que_no` int(11) NOT NULL,
  `que_marks` float NOT NULL,
  `segment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`que_marks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_online_exam_que_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam_que_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam_que_marks` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_online_exam_student_ans
CREATE TABLE IF NOT EXISTS `ems_online_exam_student_ans` (
  `que_marks_id` int(11) NOT NULL,
  `student_teacher_class_id` int(11) NOT NULL,
  `student_ans` varchar(5) NOT NULL,
  `ans_status` varchar(5) DEFAULT NULL,
  `ans_date` datetime DEFAULT NULL,
  PRIMARY KEY (`que_marks_id`,`student_teacher_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_online_exam_student_ans: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam_student_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam_student_ans` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_online_question_ans
CREATE TABLE IF NOT EXISTS `ems_online_question_ans` (
  `que_ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `que_marks_id` int(11) NOT NULL,
  `answer_a` longtext NOT NULL,
  `answer_b` longtext NOT NULL,
  `answer_c` longtext NOT NULL,
  `answer_d` longtext NOT NULL,
  `answer_e` longtext,
  `correct_ans` longtext NOT NULL,
  PRIMARY KEY (`que_ans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_online_question_ans: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_question_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_question_ans` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_paper
CREATE TABLE IF NOT EXISTS `ems_paper` (
  `paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_name` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `max_marks` int(11) DEFAULT NULL,
  `passing_marks` int(11) DEFAULT NULL,
  `inr` binary(1) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`paper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_paper: 0 rows
/*!40000 ALTER TABLE `ems_paper` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_paper` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_paper_details
CREATE TABLE IF NOT EXISTS `ems_paper_details` (
  `paper_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_id`,`class_section_id`,`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_paper_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_paper_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_paper_details` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_parent_detail
CREATE TABLE IF NOT EXISTS `ems_parent_detail` (
  `parent_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `m_qualification` varchar(50) DEFAULT NULL,
  `f_qualification` varchar(50) DEFAULT NULL,
  `m_occupation` varchar(50) DEFAULT NULL,
  `f_occupation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`parent_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_parent_detail: 0 rows
/*!40000 ALTER TABLE `ems_parent_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_parent_detail` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_period_time
CREATE TABLE IF NOT EXISTS `ems_period_time` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_num` int(11) NOT NULL,
  `description` longtext,
  `session_id` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `season_id` int(11) NOT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_period_time: 3 rows
/*!40000 ALTER TABLE `ems_period_time` DISABLE KEYS */;
INSERT INTO `ems_period_time` (`period_id`, `period_num`, `description`, `session_id`, `start_time`, `end_time`, `season_id`) VALUES
	(8, 12, 'jivesh', 2, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 5),
	(7, 0, 'sssasa', 1, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 1),
	(6, 1, 'qw', 1, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 1);
/*!40000 ALTER TABLE `ems_period_time` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_result
CREATE TABLE IF NOT EXISTS `ems_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_result: 0 rows
/*!40000 ALTER TABLE `ems_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_result` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_salutation
CREATE TABLE IF NOT EXISTS `ems_salutation` (
  `salutation_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`salutation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_salutation: 4 rows
/*!40000 ALTER TABLE `ems_salutation` DISABLE KEYS */;
INSERT INTO `ems_salutation` (`salutation_id`, `salutation`) VALUES
	(1, 'Mr.'),
	(2, 'Mrs.'),
	(3, 'Prof.'),
	(4, 'Dr.');
/*!40000 ALTER TABLE `ems_salutation` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_schedule
CREATE TABLE IF NOT EXISTS `ems_schedule` (
  `schdule_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  `period_type` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `session_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`schdule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_schedule: 0 rows
/*!40000 ALTER TABLE `ems_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_schedule` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_school_profile
CREATE TABLE IF NOT EXISTS `ems_school_profile` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(500) DEFAULT NULL,
  `school_address` text,
  `school_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_school_profile: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_school_profile` DISABLE KEYS */;
INSERT INTO `ems_school_profile` (`school_id`, `school_name`, `school_address`, `school_logo`) VALUES
	(2, 'UDT eSchool', 'New Delhi-1110004', 'assets/assets/img/school_logo.png');
/*!40000 ALTER TABLE `ems_school_profile` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_school_user_type
CREATE TABLE IF NOT EXISTS `ems_school_user_type` (
  `school_user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`school_user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_school_user_type: 3 rows
/*!40000 ALTER TABLE `ems_school_user_type` DISABLE KEYS */;
INSERT INTO `ems_school_user_type` (`school_user_type_id`, `user_type`) VALUES
	(1, 'Teacher'),
	(2, 'Principal'),
	(3, 'Other Category');
/*!40000 ALTER TABLE `ems_school_user_type` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_season
CREATE TABLE IF NOT EXISTS `ems_season` (
  `season_id` int(11) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(100) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`season_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_season: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_season` DISABLE KEYS */;
INSERT INTO `ems_season` (`season_id`, `season_name`, `start_date`, `end_date`) VALUES
	(1, 'winter', '2015-07-03 22:40:38', '2016-08-02 22:40:39');
/*!40000 ALTER TABLE `ems_season` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_section
CREATE TABLE IF NOT EXISTS `ems_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_section: ~6 rows (approximately)
/*!40000 ALTER TABLE `ems_section` DISABLE KEYS */;
INSERT INTO `ems_section` (`section_id`, `section_name`) VALUES
	(2, 'A'),
	(3, 'B'),
	(4, 'C'),
	(5, 'D'),
	(6, 'E'),
	(7, 'F');
/*!40000 ALTER TABLE `ems_section` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_sent_messages
CREATE TABLE IF NOT EXISTS `ems_sent_messages` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` varchar(500) NOT NULL DEFAULT '0',
  `sender_id` int(11) NOT NULL DEFAULT '0',
  `receiver_id` int(11) NOT NULL DEFAULT '0',
  `mobile_no` varchar(50) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_sent_messages: ~12 rows (approximately)
/*!40000 ALTER TABLE `ems_sent_messages` DISABLE KEYS */;
INSERT INTO `ems_sent_messages` (`sms_id`, `message_content`, `sender_id`, `receiver_id`, `mobile_no`, `created_date`) VALUES
	(3, 'Dear Parent, Your child Amit is absent today. Hope everything is fine. Regards eSchool', 1, 10, '8750953636', '2015-07-27 00:23:01'),
	(7, 'Dear Parent, Your child C1 is absent today. Hope everything is fine. Regards eSchool', 1, 8, '8750953636', '2015-08-20 00:03:52'),
	(8, 'Dear Parent, Your child D1 is absent today. Hope everything is fine. Regards eSchool', 1, 9, '8750953636', '2015-08-20 00:03:52'),
	(9, 'Dear Parent, Your child E1 is absent today. Hope everything is fine. Regards eSchool', 1, 10, '8750953636', '2015-08-20 00:03:54'),
	(10, 'Dear Parent, Your child C1 is absent today. Hope everything is fine. Regards eSchool', 1, 8, '8750953636', '2015-08-20 00:05:09'),
	(11, 'Dear Parent, Your child D1 is absent today. Hope everything is fine. Regards eSchool', 1, 9, '8750953636', '2015-08-20 00:05:10'),
	(12, 'Dear Parent, Your child E1 is absent today. Hope everything is fine. Regards eSchool', 1, 10, '8750953636', '2015-08-20 00:05:11'),
	(13, 'Dear Parent, sdfffafaf Thanks Admin', 5, 6, '8750953636', '2015-09-03 23:30:38'),
	(14, 'Dear Parent, sdfffafaf Thanks Admin', 5, 7, '8750953636', '2015-09-03 23:30:39'),
	(15, 'Dear Parent, sdfffafaf Thanks Admin', 5, 8, '8750953636', '2015-09-03 23:30:40'),
	(16, 'Dear Parent, sdfffafaf Thanks Admin', 5, 9, '8750953636', '2015-09-03 23:30:41'),
	(17, 'Dear Parent, sdfffafaf Thanks Admin', 5, 10, '8750953636', '2015-09-03 23:30:41'),
	(18, '0', 5, 10, '8750953636', '2015-09-03 23:56:27'),
	(19, 'Dear Staff, gfdggfd -1 -1', 5, 54, '8750953636', '2015-09-04 00:39:14');
/*!40000 ALTER TABLE `ems_sent_messages` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_session
CREATE TABLE IF NOT EXISTS `ems_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_session: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_session` DISABLE KEYS */;
INSERT INTO `ems_session` (`session_id`, `session_name`, `start_date`, `end_date`) VALUES
	(1, '2015-16', '2014-04-01 00:02:49', '2015-04-01 00:03:05');
/*!40000 ALTER TABLE `ems_session` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_session_season
CREATE TABLE IF NOT EXISTS `ems_session_season` (
  `session_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`,`season_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_session_season: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_session_season` DISABLE KEYS */;
INSERT INTO `ems_session_season` (`session_id`, `season_id`) VALUES
	(1, 1),
	(1, 2);
/*!40000 ALTER TABLE `ems_session_season` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_sms_api
CREATE TABLE IF NOT EXISTS `ems_sms_api` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_url` varchar(500) NOT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_sms_api: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_sms_api` DISABLE KEYS */;
INSERT INTO `ems_sms_api` (`api_id`, `api_url`) VALUES
	(1, 'http://alerts.sinfini.com/web2sms.php');
/*!40000 ALTER TABLE `ems_sms_api` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_sms_template
CREATE TABLE IF NOT EXISTS `ems_sms_template` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_content` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `api_id` int(11) DEFAULT NULL COMMENT 'identify the api for the template',
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_sms_template: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_sms_template` DISABLE KEYS */;
INSERT INTO `ems_sms_template` (`template_id`, `template_content`, `is_active`, `api_id`) VALUES
	(1, 'Tomorrow will be holiday', 1, 1),
	(2, 'Tomorrow will be College Annual Function Day', 1, 1);
/*!40000 ALTER TABLE `ems_sms_template` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_staff
CREATE TABLE IF NOT EXISTS `ems_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation_id` int(11) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `school_user_type_id` int(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `photo_url` varchar(250) DEFAULT NULL,
  `login_id` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_staff: 2 rows
/*!40000 ALTER TABLE `ems_staff` DISABLE KEYS */;
INSERT INTO `ems_staff` (`staff_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(54, 1, 'Jeevesh', NULL, 'Tiwari', 'M', '2015-08-17 00:00:00', '8750953636', '3232', 1, 'jeevesh@gmail.com', '143968453149552_download (1).jpg', NULL, NULL, 11, '2015-08-16 02:22:11', NULL, NULL),
	(1, 1, 'Jeevesh', NULL, 'Tiwari', 'M', '2015-08-18 00:00:00', '1211', '3232', 1, 'jeevesh@gmail.com', '143968453149552_download (1).jpg', NULL, NULL, 11, '2015-08-16 02:22:11', NULL, NULL);
/*!40000 ALTER TABLE `ems_staff` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_staff_address
CREATE TABLE IF NOT EXISTS `ems_staff_address` (
  `staff_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `address3` varchar(250) DEFAULT NULL,
  `city_id` varchar(11) DEFAULT NULL,
  `state_id` varchar(11) DEFAULT NULL,
  `country_id` varchar(11) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staff_address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_staff_address: 1 rows
/*!40000 ALTER TABLE `ems_staff_address` DISABLE KEYS */;
INSERT INTO `ems_staff_address` (`staff_address_id`, `staff_id`, `address1`, `address2`, `address3`, `city_id`, `state_id`, `country_id`, `pincode`) VALUES
	(34, 1, '12', NULL, '12', '2', '1', '1', '121');
/*!40000 ALTER TABLE `ems_staff_address` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_staff_attendance
CREATE TABLE IF NOT EXISTS `ems_staff_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `attendance_date` datetime DEFAULT NULL,
  `attendance_time` datetime DEFAULT NULL,
  `attendance_update_date` datetime DEFAULT NULL,
  `attendance_update_time` time DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `attendance_status` varchar(5) NOT NULL,
  `attendance_approve_by_type` varchar(5) NOT NULL,
  `attendance_taken_by` int(11) DEFAULT NULL,
  `attendance_approve_by` int(11) DEFAULT NULL,
  `attendance_taken_by_type` int(11) DEFAULT NULL,
  `attendance_updated_by` int(11) DEFAULT NULL,
  `attendance_updated_by_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_staff_attendance: 4 rows
/*!40000 ALTER TABLE `ems_staff_attendance` DISABLE KEYS */;
INSERT INTO `ems_staff_attendance` (`attendance_id`, `staff_id`, `type`, `attendance_date`, `attendance_time`, `attendance_update_date`, `attendance_update_time`, `approve_date`, `approve_time`, `attendance_status`, `attendance_approve_by_type`, `attendance_taken_by`, `attendance_approve_by`, `attendance_taken_by_type`, `attendance_updated_by`, `attendance_updated_by_type`) VALUES
	(1, 1, 'morning', '2015-08-16 22:41:21', '2015-08-16 22:41:29', '2015-08-16 22:41:30', '22:41:31', '2015-08-16 22:41:32', '22:41:32', 'P', '12', 1, 2, 12, 12, 12),
	(31, 1, 'morning', '2015-08-17 22:41:21', '2015-08-16 22:41:29', '2015-08-16 22:41:30', '22:41:31', '2015-08-16 22:41:32', '22:41:32', 'P', '12', 1, 2, 12, 12, 12),
	(32, 1, 'morning', '2015-08-18 22:41:21', '2015-08-16 22:41:29', '2015-08-16 22:41:30', '22:41:31', '2015-08-16 22:41:32', '22:41:32', 'A', '12', 1, 2, 12, 12, 12),
	(33, 1, 'morning', '2015-08-19 22:41:21', '2015-08-16 22:41:29', '2015-08-16 22:41:30', '22:41:31', '2015-08-16 22:41:32', '22:41:32', 'L', '12', 1, 2, 12, 12, 12);
/*!40000 ALTER TABLE `ems_staff_attendance` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_state
CREATE TABLE IF NOT EXISTS `ems_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_id` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_state: 36 rows
/*!40000 ALTER TABLE `ems_state` DISABLE KEYS */;
INSERT INTO `ems_state` (`state_id`, `state_name`, `country_id`) VALUES
	(5, 'Chandigarh', 1),
	(4, 'Andaman and Nicobar', 1),
	(6, 'Dadra and Nagar Haveli', 1),
	(7, 'Daman and Diu', 1),
	(8, 'Lakshadweep', 1),
	(9, 'New Delhi', 1),
	(10, 'Puducherry', 1),
	(11, 'Andhra Pradesh', 1),
	(12, 'Arunachal Pradesh', 1),
	(13, 'Assam', 1),
	(14, 'Bihar', 1),
	(15, 'Chhattisgarh', 1),
	(16, 'Goa', 1),
	(17, 'Gujarat', 1),
	(18, 'Haryana', 1),
	(19, 'Himachal Pradesh', 1),
	(20, 'Jammu and Kashmir', 1),
	(21, 'Jharkhand', 1),
	(22, 'Karnataka', 1),
	(23, 'Kerala', 1),
	(24, 'Madhya', 1),
	(25, 'Maharashtra', 1),
	(26, 'Manipur', 1),
	(27, 'Meghalaya', 1),
	(28, 'Mizoram', 1),
	(29, 'Nagaland', 1),
	(30, 'Odisha', 1),
	(31, 'Punjab', 1),
	(32, 'Rajasthan', 1),
	(33, 'Sikkim', 1),
	(34, 'Tamil Nadu', 1),
	(35, 'Telangana', 1),
	(36, 'Tripura', 1),
	(37, 'Uttar Pradesh', 1),
	(38, 'Uttarakhand', 1),
	(39, 'West Bengal', 1);
/*!40000 ALTER TABLE `ems_state` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_student_address
CREATE TABLE IF NOT EXISTS `ems_student_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `landmark_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_student_address: 5 rows
/*!40000 ALTER TABLE `ems_student_address` DISABLE KEYS */;
INSERT INTO `ems_student_address` (`address_id`, `student_id`, `address1`, `address2`, `address3`, `city_id`, `state_id`, `country_id`, `pincode`, `landmark_id`) VALUES
	(25, 10, 'E1', NULL, NULL, 1, 1, 1, 'E1', NULL),
	(24, 9, NULL, NULL, NULL, 1, 1, 1, 'D1', NULL),
	(23, 8, 'C1', NULL, NULL, 1, 1, 1, 'C1', NULL),
	(22, 7, 'B1', NULL, NULL, 1, 1, 1, 'B1', NULL),
	(21, 6, 'A1', NULL, NULL, 1, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `ems_student_address` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_student_optional_paper
CREATE TABLE IF NOT EXISTS `ems_student_optional_paper` (
  `st_class_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  PRIMARY KEY (`st_class_id`,`paper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_student_optional_paper: ~3 rows (approximately)
/*!40000 ALTER TABLE `ems_student_optional_paper` DISABLE KEYS */;
INSERT INTO `ems_student_optional_paper` (`st_class_id`, `paper_id`) VALUES
	(20, 1),
	(20, 2),
	(20, 3);
/*!40000 ALTER TABLE `ems_student_optional_paper` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_student_teacher_class
CREATE TABLE IF NOT EXISTS `ems_student_teacher_class` (
  `student_teacher_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `card_no` varchar(50) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_teacher_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_student_teacher_class: ~4 rows (approximately)
/*!40000 ALTER TABLE `ems_student_teacher_class` DISABLE KEYS */;
INSERT INTO `ems_student_teacher_class` (`student_teacher_class_id`, `student_id`, `session_id`, `roll_number`, `house_id`, `card_no`, `class_section_id`) VALUES
	(46, 6, 1, NULL, NULL, 'c1', 1),
	(47, 7, 1, NULL, NULL, 'c2', 1),
	(48, 8, 1, NULL, NULL, 'c3', 2),
	(49, 9, 1, NULL, NULL, 'c4', 3),
	(50, 10, 1, NULL, NULL, 'c5', 1);
/*!40000 ALTER TABLE `ems_student_teacher_class` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_subject
CREATE TABLE IF NOT EXISTS `ems_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `description` longtext,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_subject: 2 rows
/*!40000 ALTER TABLE `ems_subject` DISABLE KEYS */;
INSERT INTO `ems_subject` (`subject_id`, `subject_name`, `description`) VALUES
	(1, 'hindi', 'dss'),
	(2, 'Hindi', NULL);
/*!40000 ALTER TABLE `ems_subject` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_sub_menu
CREATE TABLE IF NOT EXISTS `ems_sub_menu` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(300) NOT NULL,
  `sub_menu_url` varchar(500) DEFAULT NULL,
  `user_type` varchar(5) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_sub_menu: ~35 rows (approximately)
/*!40000 ALTER TABLE `ems_sub_menu` DISABLE KEYS */;
INSERT INTO `ems_sub_menu` (`sub_menu_id`, `sub_menu_name`, `sub_menu_url`, `user_type`, `menu_id`) VALUES
	(1, 'Student SMS', 'sms/sms/general_sms', 'A', 1),
	(2, 'Teacher SMS', 'sms/sms/general_sms', 'A', 1),
	(3, 'Student Attendance', 'student/student_attendance/get_attendance', 'A', 2),
	(7, 'Exam Type', 'exam/exam/add_exam', 'A', 4),
	(8, 'Exam Period', 'exam/exam/add_exam_period', 'A', 4),
	(9, 'Student Registration', 'student/student/student_registraton', 'A', 5),
	(10, 'Staff Registration', 'staff/staff/staff_registration', 'A', 5),
	(11, 'Notice', 'notice/notice/add_notice', 'A', 6),
	(12, 'Class', 'class-section/class_section/add_class', 'A', 7),
	(13, 'Section', 'class-section/class_section/add_section', 'A', 7),
	(14, 'Class Section', 'class-section/class_section/add_class_section', 'A', 7),
	(15, 'Session', 'session/session/add_session', 'A', 8),
	(18, 'Subject', 'subject/subject/add_subject', 'A', 9),
	(19, 'Create Online Exam', 'onlineexam/online_exam/add_online_exam', 'A', 10),
	(20, 'Search Paper', 'onlineexam/online_exam/get_question_answer_list', 'A', 10),
	(21, 'Online Exam Result', 'onlineexam/online_exam/online_exam_result', 'A', 10),
	(22, 'Access Right', 'menu/menu/student_list', 'A', 11),
	(23, 'Time Table', 'timetable/timetable/createdailytimetable', 'A', 12),
	(24, 'My Time Table', 'dashboard/dashboard/student#', 'S', 12),
	(26, 'Online Exam Result', 'dashboard/dashboard/student#', 'S', 13),
	(27, 'Offline Result', 'dashboard/dashboard/student#', 'S', 13),
	(28, 'Attendance', 'dashboard/dashboard/student#', 'T1', 2),
	(29, 'Time Table', 'dashboard/dashboard/student#', 'T1', 12),
	(30, 'Profile', 'dashboard/dashboard/student#', 'T1', 14),
	(31, 'Report Card', 'exam/exam/add_insert_marks', 'A', 4),
	(32, 'Online Exam Result', 'dashboard/dashboard/student#', 'A', 13),
	(33, 'Offline Result', 'dashboard/dashboard/student#', 'A', 13),
	(34, 'Attandence approve', 'student/student_attendance/approve_attendance', 'A', 2),
	(35, 'Season', 'session/session/add_season', 'A', 8),
	(36, 'Student List', 'student/student/student_list', 'A', 5),
	(37, 'Staff List', 'staff/staff/staff_list', 'A', 5),
	(38, 'Fee Submission', 'fee/fee/fee_submission_add', 'A', 3);
/*!40000 ALTER TABLE `ems_sub_menu` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_teacher_expertise
CREATE TABLE IF NOT EXISTS `ems_teacher_expertise` (
  `teacher_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`,`paper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_teacher_expertise: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_teacher_expertise` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_teacher_expertise` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_teacher_subject
CREATE TABLE IF NOT EXISTS `ems_teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_teacher_subject: 0 rows
/*!40000 ALTER TABLE `ems_teacher_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_teacher_subject` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_user
CREATE TABLE IF NOT EXISTS `ems_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL COMMENT '1 for admin ,2 for coordinator, 3 for teacher',
  `email` varchar(50) NOT NULL,
  `photo_url` varchar(100) NOT NULL,
  `login_id` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_user: 1 rows
/*!40000 ALTER TABLE `ems_user` DISABLE KEYS */;
INSERT INTO `ems_user` (`user_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(1, 0, 'Rahul', NULL, 'Sharma', 'M', '2013-08-16 06:51:48', '89923232', NULL, 1, 'er.rahul18mca@gmail.com', '143914428139884_download.png', 'A_admin', 'admin', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `ems_user` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_user_address
CREATE TABLE IF NOT EXISTS `ems_user_address` (
  `user_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address1` varchar(225) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `address3` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`user_address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_user_address: 0 rows
/*!40000 ALTER TABLE `ems_user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_user_address` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_user_menu_access
CREATE TABLE IF NOT EXISTS `ems_user_menu_access` (
  `sub_menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_menu_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_user_menu_access: ~1 rows (approximately)
/*!40000 ALTER TABLE `ems_user_menu_access` DISABLE KEYS */;
INSERT INTO `ems_user_menu_access` (`sub_menu_id`, `user_id`) VALUES
	(26, 2);
/*!40000 ALTER TABLE `ems_user_menu_access` ENABLE KEYS */;


-- Dumping structure for table school_gyan.ems_user_type
CREATE TABLE IF NOT EXISTS `ems_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(225) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table school_gyan.ems_user_type: 2 rows
/*!40000 ALTER TABLE `ems_user_type` DISABLE KEYS */;
INSERT INTO `ems_user_type` (`user_type_id`, `user_type`) VALUES
	(1, 'Admin'),
	(2, 'Accountent');
/*!40000 ALTER TABLE `ems_user_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
