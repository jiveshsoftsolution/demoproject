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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
