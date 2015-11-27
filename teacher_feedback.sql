-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for eschool
CREATE DATABASE IF NOT EXISTS `eschool` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eschool`;


-- Dumping structure for table eschool.ems_staff
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table eschool.ems_staff: 4 rows
/*!40000 ALTER TABLE `ems_staff` DISABLE KEYS */;
INSERT INTO `ems_staff` ( `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(1, 1, 'Jeevesh', 'N', 'Tiwari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ems_staff` ( `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(2, 1, 'Amit', NULL, 'Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ems_staff` ( `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(3, 1, 'Sandeep', NULL, 'Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ems_staff` ( `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(4, 1, 'Himansh', NULL, 'Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `ems_staff` ENABLE KEYS */;


-- Dumping structure for table eschool.ems_teacher_feedback
CREATE TABLE IF NOT EXISTS `ems_teacher_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `ques_id` int(11) DEFAULT NULL,
  `ans` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `user_type` enum('S','P') DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table eschool.ems_teacher_feedback: ~15 rows (approximately)
/*!40000 ALTER TABLE `ems_teacher_feedback` DISABLE KEYS */;
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(2, 1, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(3, 1, 1, 1, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(4, 2, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(5, 1, 1, 3, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(6, 1, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(7, 2, 1, 3, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(8, 1, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(9, 4, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(10, 1, 1, 3, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(11, 1, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(12, 1, 1, 4, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(13, 3, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(14, 2, 1, 1, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(15, 5, 1, 1, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(16, 2, 1, 2, 1, 1, 'S', '2015-11-22', '2015-11-24 23:00:45');
/*!40000 ALTER TABLE `ems_teacher_feedback` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
