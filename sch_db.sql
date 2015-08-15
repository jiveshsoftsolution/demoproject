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
-- Dumping data for table school_gyan.emsparent: ~13 rows (approximately)
/*!40000 ALTER TABLE `emsparent` DISABLE KEYS */;
INSERT INTO `emsparent` (`parent_id`, `student_id`, `father_salutation_id`, `father_first_name`, `father_middle_name`, `father_last_name`, `mother_salutation_id`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `father_photo_url`, `mother_photo_url`, `mother_salutation`, `father_salutation`, `mail_to`, `parent_mobile`, `login_id`, `password`, `parent_email`) VALUES
	(1, 1, 1, 'Shailendra', '', 'Mishra', 2, 'Amrita', 'Mishra', '', NULL, NULL, NULL, NULL, '', '8750953636', 'testId', '123789', NULL),
	(2, 2, 1, 'Amit', '', 'Kumar', 2, 'Pooja', 'Joshi', '', NULL, NULL, NULL, NULL, 'ffg', '8750953636', 'testId', '123789', NULL),
	(3, 3, 1, 'Rahul', '', 'Solanki', 2, 'Poonam', 'Soni', NULL, NULL, NULL, NULL, NULL, NULL, '8750953636', 'testId', '123789', NULL),
	(4, 4, 1, 'Shiv', '', 'Soni', 2, 'Rati', 'Mehra', '', '140389394162314_Chrysanthemum.jpg', '14038939416528_Tulips.jpg', NULL, NULL, '', '8750953636', 'testId', '123789', NULL),
	(5, 5, 1, 'Rajan', '', 'Pandey', 2, 'Ankita', 'Pandey', NULL, NULL, NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(6, 6, 1, 'Amit', '', 'Rawat', 2, 'Anamika', 'Singh', NULL, NULL, NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(7, 7, 1, 'Amar', '', 'Singh', 2, 'Monika', 'Mehra', NULL, NULL, NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(8, 8, 1, 'Vinod', '', 'Pandey', 2, 'Shweta', 'Kishore', NULL, NULL, NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(9, 9, 1, 'N', 'P', 'Tripathi', 2, 'Sumitra', 'Tiwari', 'Devi', '143275047661062_download.png', NULL, NULL, NULL, 'jiveshp12@gmail.com', '8750953636', 'testId', '123789', NULL),
	(10, 10, 1, 'N.', 'P', 'Mishra', 1, 'Mk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8750953636', 'testId', '123789', NULL),
	(11, 11, 1, 'sasa', 'sasa', 'sdsa', 1, 'sad', 'sd', 'sds', '143793318253770_download.png', '143793318238636_download.png', NULL, NULL, 'jiveshp12@gmail.com', '321323', 'testId', '123789', NULL),
	(12, 12, 1, '233223', '2323', '23', 1, '2332', '231', '2123', NULL, NULL, NULL, NULL, 'sds', '3213', 'testId', '123789', NULL),
	(13, 13, 1, '233223', '2323', '23', 1, '2332', '231', '2123', NULL, NULL, NULL, NULL, 'sds', '3213', 'testId', '123789', NULL),
	(14, 14, 1, '233223', '2323', '23', 1, '2332', '231', '2123', NULL, NULL, NULL, NULL, 'sds', '3213', 'testId', '123789', NULL),
	(15, 15, 1, '233223', '2323', '23', 1, '2332', '231', '2123', NULL, NULL, NULL, NULL, 'sds', '3213', 'testId', '123789', NULL),
	(16, 4, 1, 'nbt', NULL, 'nbt', 2, 'nbt', NULL, 'nbt', NULL, NULL, NULL, NULL, 'nbt', 'nbt', 'testId', '123789', NULL);
/*!40000 ALTER TABLE `emsparent` ENABLE KEYS */;

-- Dumping data for table school_gyan.emsstudent: ~3 rows (approximately)
/*!40000 ALTER TABLE `emsstudent` DISABLE KEYS */;
INSERT INTO `emsstudent` (`student_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `dob`, `login_id`, `password`, `photo_url`, `admission_number`, `created_by`, `created_date`, `updated_by`, `updated_date`, `created_by_type`, `updated_by_type`) VALUES
	(1, 1, 'Amit', '', 'Tiwari', NULL, 'M', '2015-08-09 00:00:00', 'S_Amit', '123789', '1.jpg', NULL, 11, NULL, 11, '2014-06-28 16:05:13', NULL, NULL),
	(2, 1, 'Rahul', '', 'Gupta', NULL, 'M', '2015-08-09 00:00:00', 'S_ftf', '123789', NULL, NULL, 11, NULL, 1, '2015-05-27 20:15:46', NULL, 0),
	(3, 1, 'Piyush', '', 'Pandey', NULL, 'F', '2015-08-06 00:00:00', 'S_gh', '123789', '2.jpg', NULL, 11, NULL, NULL, NULL, NULL, NULL),
	(4, 1, 'nbt', NULL, 'nbt', NULL, 'M', '2015-08-26 00:00:00', 'S_nbt', '123789', NULL, NULL, 1, '2015-08-12 20:54:07', NULL, NULL, 0, NULL);
/*!40000 ALTER TABLE `emsstudent` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_attendance: 10 rows
/*!40000 ALTER TABLE `ems_attendance` DISABLE KEYS */;
INSERT INTO `ems_attendance` (`attendance_id`, `student_teacher_class_id`, `type`, `attendance_date`, `attendance_time`, `attendance_update_date`, `attendance_update_time`, `approve_date`, `approve_time`, `is_send`, `attendance_status`, `attendance_approve_by_type`, `attendance_taken_by`, `attendance_approve_by`, `attendance_taken_by_type`, `attendance_updated_by`, `attendance_updated_by_type`) VALUES
	(25, 27, 'morning', '2015-09-29 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0),
	(24, 35, 'morning', '2015-06-26 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', '2015-07-26 00:00:00', '20:53:00', 1, 'A', 'A', 1, 1, 0, 1, 0),
	(23, 35, 'morning', '2015-06-27 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', '2015-07-26 00:00:00', '20:53:00', 1, 'A', 'A', 1, 1, 0, 1, 0),
	(22, 35, 'morning', '2015-07-27 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', '2015-07-26 00:00:00', '20:53:00', 1, 'A', 'A', 1, 1, 0, 1, 0),
	(21, 27, 'morning', '2015-07-28 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0),
	(20, 27, 'morning', '2015-08-28 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0),
	(18, 34, 'morning', '2015-08-29 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0),
	(19, 35, 'morning', '2015-09-29 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', '2015-07-26 00:00:00', '20:53:00', 1, 'A', 'A', 1, 1, 0, 1, 0),
	(17, 27, 'morning', '2015-09-29 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0),
	(26, 27, 'morning', '2015-09-29 00:00:00', '0000-00-00 00:00:00', '2015-07-26 00:00:00', '20:52:22', NULL, NULL, 0, 'P', '', 1, NULL, 0, 1, 0);
/*!40000 ALTER TABLE `ems_attendance` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_city: 3 rows
/*!40000 ALTER TABLE `ems_city` DISABLE KEYS */;
INSERT INTO `ems_city` (`city_id`, `city_name`, `state_id`) VALUES
	(1, 'Allahabad', '1'),
	(2, 'Lucknow', '1'),
	(3, 'Varansi', '2');
/*!40000 ALTER TABLE `ems_city` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_class: ~12 rows (approximately)
/*!40000 ALTER TABLE `ems_class` DISABLE KEYS */;
INSERT INTO `ems_class` (`class_id`, `class_name`) VALUES
	(1, 'I'),
	(2, 'II'),
	(3, 'III'),
	(4, 'IV'),
	(5, 'V'),
	(6, 'VI'),
	(7, 'VII'),
	(8, 'VIII'),
	(9, 'IX'),
	(10, 'X'),
	(11, 'XI'),
	(12, 'XII');
/*!40000 ALTER TABLE `ems_class` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_class_section: ~12 rows (approximately)
/*!40000 ALTER TABLE `ems_class_section` DISABLE KEYS */;
INSERT INTO `ems_class_section` (`class_section_id`, `class_id`, `section_id`, `sequence`) VALUES
	(1, 1, 2, 1),
	(2, 2, 2, 2),
	(3, 3, 2, 3),
	(4, 4, 2, 4),
	(5, 5, 2, 5),
	(6, 6, 2, 6),
	(7, 7, 2, 7),
	(8, 8, 2, 8),
	(9, 9, 2, 9),
	(10, 10, 2, 10),
	(11, 11, 2, 11),
	(12, 12, 2, 12);
/*!40000 ALTER TABLE `ems_class_section` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_country: 2 rows
/*!40000 ALTER TABLE `ems_country` DISABLE KEYS */;
INSERT INTO `ems_country` (`country_id`, `country_name`) VALUES
	(1, 'INDIA'),
	(2, 'Singapore');
/*!40000 ALTER TABLE `ems_country` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_daily_timetable: ~3 rows (approximately)
/*!40000 ALTER TABLE `ems_daily_timetable` DISABLE KEYS */;
INSERT INTO `ems_daily_timetable` (`daily_timetable_id`, `session_id`, `season_id`, `teacher_id`, `paper_id`, `class_section_id`, `period_id`, `week_day`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(1, 1, NULL, 1, 1, 6, 1, 'monday', 0, '0000-00-00 00:00:00', NULL, NULL),
	(2, 1, NULL, 1, 2, 6, 1, 'wednesday', 11, '2014-04-05 18:26:41', NULL, NULL),
	(3, 1, 1, 0, 2, 2, 7, 'monday', 11, '2014-05-24 11:43:43', NULL, NULL);
/*!40000 ALTER TABLE `ems_daily_timetable` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_exam: 1 rows
/*!40000 ALTER TABLE `ems_exam` DISABLE KEYS */;
INSERT INTO `ems_exam` (`exam_id`, `exam_name`) VALUES
	(1, 'Half Yearly');
/*!40000 ALTER TABLE `ems_exam` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_exam_period: 1 rows
/*!40000 ALTER TABLE `ems_exam_period` DISABLE KEYS */;
INSERT INTO `ems_exam_period` (`exam_period_id`, `exam_id`, `session_id`, `start_date`, `end_date`) VALUES
	(1, 1, 1, '2015-05-23 18:39:21', '2015-05-23 18:39:22');
/*!40000 ALTER TABLE `ems_exam_period` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_exam_schedule: 1 rows
/*!40000 ALTER TABLE `ems_exam_schedule` DISABLE KEYS */;
INSERT INTO `ems_exam_schedule` (`exam_schedule_id`, `exam_period_id`, `exam_date`, `time_from`, `time_to`, `paper_id`, `sequence`) VALUES
	(1, 1, '2015-05-23 18:39:29', '18:39:30', '18:39:32', 1, 1);
/*!40000 ALTER TABLE `ems_exam_schedule` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_exam_to_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_exam_to_marks` DISABLE KEYS */;
INSERT INTO `ems_exam_to_marks` (`exam_period_id`, `paper_id`, `max_marks`) VALUES
	(0, 1, 50);
/*!40000 ALTER TABLE `ems_exam_to_marks` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_fee_amount: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_amount` DISABLE KEYS */;
INSERT INTO `ems_fee_amount` (`amount_id`, `class_section_id`, `session_id`, `month_id`, `created_date`, `amount`, `fee_type_id`) VALUES
	(5, '19,20', 1, '1,2', '2014-04-09 22:55:07', 100, 1),
	(6, '19,20,38', 2, '1,2,5', '2014-04-10 00:36:33', 1000, 1);
/*!40000 ALTER TABLE `ems_fee_amount` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_fee_submission: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_submission` DISABLE KEYS */;
INSERT INTO `ems_fee_submission` (`submission_id`, `student_id`, `session_id`, `month_id`, `amount`, `balance`, `fine`, `submitted_date`) VALUES
	(1, 1, 1, 1, 300, 600, NULL, '2014-03-02 23:08:22');
/*!40000 ALTER TABLE `ems_fee_submission` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_fee_type: ~8 rows (approximately)
/*!40000 ALTER TABLE `ems_fee_type` DISABLE KEYS */;
INSERT INTO `ems_fee_type` (`fee_type_id`, `fee_type_name`, `refundable`, `created_date`, `is_active`) VALUES
	(1, 'Tuition Fee', 0, '2014-02-23 10:40:26', 0),
	(2, 'Supw', 0, '2014-02-23 10:41:08', 0),
	(3, 'tyyy', 1, '2014-02-23 10:45:07', 1),
	(4, 'tyyy', 1, '2014-02-23 10:45:15', 1),
	(5, 'tyyy', 0, '2014-02-23 10:46:02', 1),
	(7, 'Sports Fee', 0, '2014-03-03 22:35:22', 1),
	(8, 'new exam', 0, '2014-04-09 20:17:00', 0),
	(9, 'new Exam 1', 1, '2014-04-09 20:17:35', 1);
/*!40000 ALTER TABLE `ems_fee_type` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_grade_to_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_grade_to_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_grade_to_marks` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_landmark: 0 rows
/*!40000 ALTER TABLE `ems_landmark` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_landmark` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_login: ~35 rows (approximately)
/*!40000 ALTER TABLE `ems_login` DISABLE KEYS */;
INSERT INTO `ems_login` (`user_login_id`, `user_login_type`, `login_id`, `password`, `user_id`) VALUES
	(2, 'A', 'Admin', 'admin', 1),
	(3, 'S', 'S_Amit', '123789', 1),
	(4, 'P', 'Ptes1400', '8RAefCBo', 1),
	(5, 'S', 'Sftf2305', 'NosJhR2t', 2),
	(6, 'P', 'Pfg22496', 'RZLaN#x7', 2),
	(7, 'S', 'Sgh32314', 'Mus2thST', 3),
	(8, 'P', 'Ptes3600', 'g3v#u9f!', 3),
	(9, 'T', 'Th464483', '3bSdh0Vk', 46),
	(10, 'T', 'Tghg47716', 'N@tXmiSh', 47),
	(11, 'S', 'Suiu5827', 'Z$XhbvEp', 5),
	(12, 'P', 'Pjk51910', 'OtT8sLgB', 5),
	(13, 'S', 'Suiu63400', '#anv562I', 6),
	(14, 'P', 'Pjk6832', 'MBi4r79C', 6),
	(15, 'S', 'Suiu74559', '6#SyapjP', 7),
	(16, 'P', 'Pjk73566', 'Ndq0HJcP', 7),
	(17, 'S', 'Suiu84149', 'wlIic#CA', 8),
	(18, 'P', 'Pjk83716', 'txCIOB!a', 8),
	(19, 'T', 'Tn484509', 'qf!ukdH#', 48),
	(20, 'T', 'Tn491283', 'OF134KQR', 49),
	(21, 'T', 'Tn502341', 'Oh2mNFw6', 50),
	(22, 'T', 'TRam514237', 'CvyGjwmz', 51),
	(23, 'S', 'SJee91565', 'W!HzM8fx', 9),
	(24, 'P', 'PN91101', 'usqnfCH@', 9),
	(25, 'S', 'SAmi103219', 'c$L0iXIM', 10),
	(26, 'P', 'PN.104801', 'xRBNwdsm', 10),
	(27, 'T', 'TAma523934', '7guxQEmG', 52),
	(28, 'S', 'Sak114606', 'iZrXegF2', 11),
	(29, 'P', 'Psas114147', 'WlD2pAda', 11),
	(30, 'S', 'Scfg122444', '$ctgUqSa', 12),
	(31, 'P', 'P233123556', '3eJ$LQU6', 12),
	(32, 'S', 'Scfg13630', 'AlfdwS3D', 13),
	(33, 'P', 'P233131055', 'UATZOr#F', 13),
	(34, 'S', 'Scfg142082', 'XOG2ynuH', 14),
	(35, 'P', 'P233144549', 'Ysixjyvu', 14),
	(36, 'S', 'Scfg151652', '6lUgdNaO', 15),
	(37, 'P', 'P233152652', 'LSERw42O', 15),
	(38, 'S', 'Snbt4453', '12NAtj3Z', 4),
	(39, 'P', 'Pnbt162247', 'VBy1!oPw', 16);
/*!40000 ALTER TABLE `ems_login` ENABLE KEYS */;

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

-- Dumping data for table school_gyan.ems_menu: ~14 rows (approximately)
/*!40000 ALTER TABLE `ems_menu` DISABLE KEYS */;
INSERT INTO `ems_menu` (`menu_id`, `menu_name`) VALUES
	(1, 'General SMS'),
	(2, 'Attendance'),
	(5, 'Registration'),
	(6, 'Notice'),
	(7, 'Class'),
	(8, 'Sesssion'),
	(9, 'Subject'),
	(14, 'Profile'),
	(23, 'Fees'),
	(24, 'Exam'),
	(210, 'Online Exam'),
	(211, 'Access Right'),
	(212, 'Time Table'),
	(213, 'Result');
/*!40000 ALTER TABLE `ems_menu` ENABLE KEYS */;

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

-- Dumping data for table school_gyan.ems_news_events: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_news_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_news_events` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_notice: ~1 rows (approximately)
/*!40000 ALTER TABLE `ems_notice` DISABLE KEYS */;
INSERT INTO `ems_notice` (`notice_id`, `notice`, `notice_for`, `class_section_id`, `class_id`, `created_date`, `post_to_web`, `notice_subject`, `updated_date`) VALUES
	(2, 'Today is holiday', 2, 1, NULL, '2014-06-28 21:52:41', 1, 'Holiday News', '2015-06-17 00:03:09'),
	(10, 'New1', 1, NULL, NULL, '2015-06-16 20:37:41', 1, 'New1', '2015-06-17 00:07:41');
/*!40000 ALTER TABLE `ems_notice` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_online_exam: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_online_exam_que_marks: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam_que_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam_que_marks` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_online_exam_student_ans: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_exam_student_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_exam_student_ans` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_online_question_ans: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_online_question_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_online_question_ans` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_paper: 0 rows
/*!40000 ALTER TABLE `ems_paper` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_paper` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_paper_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_paper_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_paper_details` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_parent_detail: 0 rows
/*!40000 ALTER TABLE `ems_parent_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_parent_detail` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_period_time: 3 rows
/*!40000 ALTER TABLE `ems_period_time` DISABLE KEYS */;
INSERT INTO `ems_period_time` (`period_id`, `period_num`, `description`, `session_id`, `start_time`, `end_time`, `season_id`) VALUES
	(8, 12, 'jivesh', 2, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 5),
	(7, 0, 'sssasa', 1, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 1),
	(6, 1, 'qw', 1, '2014-02-02 00:00:00', '2014-02-02 00:00:00', 1);
/*!40000 ALTER TABLE `ems_period_time` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_result: 0 rows
/*!40000 ALTER TABLE `ems_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_result` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_salutation: 2 rows
/*!40000 ALTER TABLE `ems_salutation` DISABLE KEYS */;
INSERT INTO `ems_salutation` (`salutation_id`, `salutation`) VALUES
	(1, 'Mr.'),
	(2, 'Mrs.');
/*!40000 ALTER TABLE `ems_salutation` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_schedule: 0 rows
/*!40000 ALTER TABLE `ems_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_schedule` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_school_profile: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_school_profile` DISABLE KEYS */;
INSERT INTO `ems_school_profile` (`school_id`, `school_name`, `school_logo`) VALUES
	(2, 'UDT eSchool', 'assets/assets/img/school_logo.png'),
	(3, 'UDT eSchool', 'assets/assets/img/L_15236.gif');
/*!40000 ALTER TABLE `ems_school_profile` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_school_user_type: 2 rows
/*!40000 ALTER TABLE `ems_school_user_type` DISABLE KEYS */;
INSERT INTO `ems_school_user_type` (`school_user_type_id`, `user_type`) VALUES
	(1, 'Teacher'),
	(2, 'Principal');
/*!40000 ALTER TABLE `ems_school_user_type` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_season: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_season` DISABLE KEYS */;
INSERT INTO `ems_season` (`season_id`, `season_name`, `start_date`, `end_date`) VALUES
	(1, 'winter', '2015-07-03 22:40:38', '2016-08-02 22:40:39');
/*!40000 ALTER TABLE `ems_season` ENABLE KEYS */;

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

-- Dumping data for table school_gyan.ems_sent_messages: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_sent_messages` DISABLE KEYS */;
INSERT INTO `ems_sent_messages` (`sms_id`, `message_content`, `sender_id`, `receiver_id`, `mobile_no`, `created_date`) VALUES
	(1, 'This is a test transaction sms', 1, 9, '8750953636', '2015-06-27 16:34:40'),
	(2, 'This is a test transaction sms', 1, 10, '8750953636', '2015-06-27 16:34:40'),
	(3, 'Dear Parent, Your child Amit is absent today. Hope everything is fine. Regards eSchool', 1, 10, '8750953636', '2015-07-27 00:23:01');
/*!40000 ALTER TABLE `ems_sent_messages` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_session: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_session` DISABLE KEYS */;
INSERT INTO `ems_session` (`session_id`, `session_name`, `start_date`, `end_date`) VALUES
	(1, '2014-15', '2014-04-01 00:02:49', '2015-04-01 00:03:05');
/*!40000 ALTER TABLE `ems_session` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_session_season: ~2 rows (approximately)
/*!40000 ALTER TABLE `ems_session_season` DISABLE KEYS */;
INSERT INTO `ems_session_season` (`session_id`, `season_id`) VALUES
	(1, 1),
	(1, 2);
/*!40000 ALTER TABLE `ems_session_season` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_sms_api: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_sms_api` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_sms_api` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_sms_template: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_sms_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_sms_template` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_staff: 7 rows
/*!40000 ALTER TABLE `ems_staff` DISABLE KEYS */;
INSERT INTO `ems_staff` (`staff_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `school_user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(49, 1, 'A.', 'K.', 'Agrawal', 'M', '2014-06-25 00:00:00', '8750953636', '89898', 1, 'kjk', NULL, NULL, NULL, 11, '2014-06-08 16:12:08', NULL, NULL),
	(50, 1, 'Naina', '', 'Mishra', 'F', '2014-06-25 00:00:00', '8750953636', '89898', 1, 'kjk', NULL, NULL, NULL, 11, '0000-00-00 00:00:00', NULL, NULL),
	(48, 1, 'Pooja', '', 'Joshi', 'F', '2014-06-25 00:00:00', '8750953636', '89898', 1, 'kjk', NULL, NULL, NULL, 11, '2014-06-08 16:11:08', NULL, NULL),
	(46, 1, 'Rakesh', 'N.', 'Tiwari', 'M', '2015-08-09 00:00:00', '8750953636', '123456789', 1, 'jiveshp12@gmail.com', '1.jpg', NULL, NULL, 11, '0000-00-00 00:00:00', NULL, NULL),
	(47, 1, 'Sanjay', '', 'Singh', 'M', '2015-08-09 00:00:00', '8750953636', '121212', 1, 'jiveshp12@gmail.com', '2.jpg', NULL, NULL, 11, '2014-06-21 15:44:21', NULL, NULL),
	(51, 1, 'Ajay', '', 'Kumar', 'M', '2015-08-09 00:00:00', '8750953636', '1212', 2, 'jiveshp12@gmail.com', '3.jpg', NULL, NULL, 11, '2014-06-02 17:09:02', NULL, NULL),
	(52, 1, 'Amar', NULL, 'Singh', 'M', '2015-06-08 00:00:00', '8750953636', NULL, 1, 'jiveshp12@gmail.com', NULL, NULL, NULL, 11, '0000-00-00 00:00:00', NULL, NULL);
/*!40000 ALTER TABLE `ems_staff` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_staff_address: 7 rows
/*!40000 ALTER TABLE `ems_staff_address` DISABLE KEYS */;
INSERT INTO `ems_staff_address` (`staff_address_id`, `staff_id`, `address1`, `address2`, `address3`, `city_id`, `state_id`, `country_id`, `pincode`) VALUES
	(32, 51, 'Allahabad', 'Allahabad', 'Allahabad', '1', '1', '1', '12121'),
	(31, 50, 'kmk', 'm', 'm', '1', '1', '1', '45454'),
	(30, 49, 'kmk', 'm', 'm', '1', '1', '1', '45454'),
	(28, 47, 'jkksa', NULL, NULL, '1', '1', '1', '1221'),
	(29, 48, 'kmk', 'm', 'm', '1', '1', '1', '45454'),
	(27, 46, 'Allahabad', 'Allahabad', 'Allahabad', '3', '2', '1', '212405'),
	(33, 52, 'Delhi', NULL, NULL, '1', '1', '1', NULL);
/*!40000 ALTER TABLE `ems_staff_address` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_state: 2 rows
/*!40000 ALTER TABLE `ems_state` DISABLE KEYS */;
INSERT INTO `ems_state` (`state_id`, `state_name`, `country_id`) VALUES
	(1, 'Utter Pradesh', 1),
	(2, 'Madhya Pradesh', 1);
/*!40000 ALTER TABLE `ems_state` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_student_address: 16 rows
/*!40000 ALTER TABLE `ems_student_address` DISABLE KEYS */;
INSERT INTO `ems_student_address` (`address_id`, `student_id`, `address1`, `address2`, `address3`, `city_id`, `state_id`, `country_id`, `pincode`, `landmark_id`) VALUES
	(1, 1, '', '', '', 1, 1, 1, '', NULL),
	(2, 2, '', '', '', 1, 1, 1, '', NULL),
	(3, 3, NULL, NULL, NULL, 1, 1, 1, NULL, NULL),
	(4, 4, '', '', '', 1, 1, 1, '212405', NULL),
	(5, 5, 'klk', NULL, 'k', 1, 1, 1, '212405', NULL),
	(6, 6, 'klk', NULL, 'k', 1, 1, 1, '212405', NULL),
	(7, 7, 'klk', NULL, 'k', 1, 1, 1, '212405', NULL),
	(8, 8, 'klk', NULL, 'k', 1, 1, 1, '212405', NULL),
	(9, 9, 'ashok nagar', 'new delhi', 'delhi', 1, 1, 1, '212402', NULL),
	(10, 10, NULL, NULL, NULL, 1, 1, 1, '201210', NULL),
	(11, 11, 'da', 'ass', 'dsad', 1, 1, 1, '211', NULL),
	(12, 12, 'dsssds', 'dss', 'ssd', 1, 1, 1, 'eww', NULL),
	(13, 13, 'dsssds', 'dss', 'ssd', 1, 1, 1, 'eww', NULL),
	(14, 14, 'dsssds', 'dss', 'ssd', 1, 1, 1, 'eww', NULL),
	(15, 15, 'dsssds', 'dss', 'ssd', 1, 1, 1, 'eww', NULL),
	(16, 4, NULL, NULL, NULL, 1, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `ems_student_address` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_student_optional_paper: ~3 rows (approximately)
/*!40000 ALTER TABLE `ems_student_optional_paper` DISABLE KEYS */;
INSERT INTO `ems_student_optional_paper` (`st_class_id`, `paper_id`) VALUES
	(20, 1),
	(20, 2),
	(20, 3);
/*!40000 ALTER TABLE `ems_student_optional_paper` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_student_teacher_class: ~20 rows (approximately)
/*!40000 ALTER TABLE `ems_student_teacher_class` DISABLE KEYS */;
INSERT INTO `ems_student_teacher_class` (`student_teacher_class_id`, `student_id`, `session_id`, `roll_number`, `house_id`, `class_section_id`) VALUES
	(20, 58, 1, 3323, 3232, 2),
	(21, 57, 1, 3323, 3232, 38),
	(22, 59, 1, 3323, 3232, 2),
	(23, 60, 2, 3323, 3232, 20),
	(24, 61, 1, 3323, 3232, 2),
	(25, 64, 1, NULL, NULL, 2),
	(26, 1, 1, 3323, 3232, 5),
	(27, 2, 1, 3323, 3232, 1),
	(28, 3, 1, NULL, NULL, 2),
	(29, 4, 1, 3323, 3232, 2),
	(30, 5, 1, NULL, NULL, 2),
	(31, 6, 1, NULL, NULL, 2),
	(32, 7, 1, NULL, NULL, 2),
	(33, 8, 1, NULL, NULL, 2),
	(34, 9, 1, 3323, 3232, 1),
	(35, 10, 1, NULL, NULL, 1),
	(36, 11, 1, NULL, NULL, 2),
	(37, 12, 1, NULL, NULL, 2),
	(38, 13, 1, NULL, NULL, 2),
	(39, 14, 1, NULL, NULL, 2),
	(40, 15, 1, NULL, NULL, 2),
	(41, 4, 1, NULL, NULL, 5);
/*!40000 ALTER TABLE `ems_student_teacher_class` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_subject: 2 rows
/*!40000 ALTER TABLE `ems_subject` DISABLE KEYS */;
INSERT INTO `ems_subject` (`subject_id`, `subject_name`, `description`) VALUES
	(1, 'hindi', 'dss'),
	(2, 'Hindi', NULL);
/*!40000 ALTER TABLE `ems_subject` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_sub_menu: ~35 rows (approximately)
/*!40000 ALTER TABLE `ems_sub_menu` DISABLE KEYS */;
INSERT INTO `ems_sub_menu` (`sub_menu_id`, `sub_menu_name`, `sub_menu_url`, `user_type`, `menu_id`) VALUES
	(1, 'Student SMS', 'sms/sms/general_sms', 'A', 1),
	(2, 'Teacher SMS', 'sms/sms/general_sms', 'A', 1),
	(3, 'Student Attendance', 'student/student_attendance/get_attendance', 'A', 2),
	(4, 'Teacher Attendance', 'student/student_attendance/get_attendance', 'A', 2),
	(5, 'Fee Type', 'fee/fee/add_fee_type', 'A', 3),
	(6, 'Fee Setting', 'fee/fee/add_fee_setting', 'A', 3),
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
	(37, 'Staff List', 'staff/staff/staff_list', 'A', 5);
/*!40000 ALTER TABLE `ems_sub_menu` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_teacher_expertise: ~0 rows (approximately)
/*!40000 ALTER TABLE `ems_teacher_expertise` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_teacher_expertise` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_teacher_subject: 0 rows
/*!40000 ALTER TABLE `ems_teacher_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_teacher_subject` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_user: 1 rows
/*!40000 ALTER TABLE `ems_user` DISABLE KEYS */;
INSERT INTO `ems_user` (`user_id`, `salutation_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mobile`, `phone`, `user_type_id`, `email`, `photo_url`, `login_id`, `password`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
	(1, 0, 'Rahul', NULL, 'Sharma', 'M', '2013-10-18 06:51:48', '89923232', NULL, 1, 'er.rahul18mca@gmail.com', '', 'A_admin', 'admin', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `ems_user` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_user_address: 0 rows
/*!40000 ALTER TABLE `ems_user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `ems_user_address` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_user_menu_access: ~1 rows (approximately)
/*!40000 ALTER TABLE `ems_user_menu_access` DISABLE KEYS */;
INSERT INTO `ems_user_menu_access` (`sub_menu_id`, `user_id`) VALUES
	(26, 2);
/*!40000 ALTER TABLE `ems_user_menu_access` ENABLE KEYS */;

-- Dumping data for table school_gyan.ems_user_type: 2 rows
/*!40000 ALTER TABLE `ems_user_type` DISABLE KEYS */;
INSERT INTO `ems_user_type` (`user_type_id`, `user_type`) VALUES
	(1, 'Admin'),
	(2, 'Accountent');
/*!40000 ALTER TABLE `ems_user_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
