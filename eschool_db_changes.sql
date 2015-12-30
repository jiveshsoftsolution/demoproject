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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table eschool.ems_teacher_feedback: ~30 rows (approximately)
/*!40000 ALTER TABLE `ems_teacher_feedback` DISABLE KEYS */;
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(38, 1, NULL, 1, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:03');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(39, 1, NULL, 3, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:03');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(40, 1, NULL, 2, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:04');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(41, 1, NULL, 3, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:04');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(42, 1, NULL, 4, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:04');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(43, 1, NULL, 2, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:04');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(44, 1, NULL, 2, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:04');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(45, 1, NULL, 2, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:05');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(46, 1, NULL, 4, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:05');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(47, 1, NULL, 4, NULL, NULL, 'S', '2015-11-28', '2015-11-28 11:46:05');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(48, 1, 0, 1, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:00');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(49, 1, 1, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:00');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(50, 1, 2, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:00');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(51, 1, 3, 3, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:00');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(52, 1, 4, 4, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:00');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(53, 1, 5, 4, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:01');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(54, 1, 6, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:01');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(55, 1, 7, 3, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:01');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(56, 1, 8, 3, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:01');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(57, 1, 9, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:04:01');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(58, 2, 0, 1, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:22');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(59, 2, 1, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:22');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(60, 2, 2, 3, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:22');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(61, 2, 3, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:22');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(62, 2, 4, 4, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:22');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(63, 2, 5, 1, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:23');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(64, 2, 6, 4, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:23');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(65, 2, 7, 1, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:23');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(66, 2, 8, 2, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:23');
INSERT INTO `ems_teacher_feedback` (`id`, `staff_id`, `ques_id`, `ans`, `user_id`, `class_section_id`, `user_type`, `created_date`, `updated_date`) VALUES
	(67, 2, 9, 4, NULL, 1, 'S', '2015-11-28', '2015-11-28 12:05:23');
/*!40000 ALTER TABLE `ems_teacher_feedback` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

ALTER TABLE `ems_fee_submission`
	DROP COLUMN `month_id`;

CREATE TABLE `ems_fee_month` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`submission_id` INT NULL,
	`month` VARCHAR(200) NULL,
	`created_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

ALTER TABLE `ems_fee_submission`
	CHANGE COLUMN `roll_number` `card_number` INT(11) NULL DEFAULT NULL AFTER `session_id`;
	
	ALTER TABLE `ems_fee_submission`
	CHANGE COLUMN `card_number` `card_number` VARCHAR(50) NULL DEFAULT NULL AFTER `session_id`;
	ALTER TABLE `ems_school_profile`
	ADD COLUMN `school_contact_no` VARCHAR(100) NULL AFTER `school_address`,
	ADD COLUMN `school_website` VARCHAR(500) NULL AFTER `school_contact_no`;