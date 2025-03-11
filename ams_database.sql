-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2024 at 04:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `assign_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `sub_id` int NOT NULL,
  `assign_date` date NOT NULL,
  `submi_date` date NOT NULL,
  `assign_topic` varchar(300) NOT NULL,
  `t_id` int NOT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `cou` (`course_id`),
  KEY `seme` (`sem_id`),
  KEY `teach` (`t_id`),
  KEY `sb` (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `course_id`, `sem_id`, `sub_id`, `assign_date`, `submi_date`, `assign_topic`, `t_id`) VALUES
(1, 27, 7, 21, '2024-01-01', '2024-02-12', '1.explain IOT and end to end communication.\r\n2.explain any 2 IOT communication model in detail.\r\n3.discuss functional block of IOT system.\r\n4.discuss difference between IOT and M2M.\r\n', 10),
(2, 27, 7, 22, '2024-01-01', '2024-02-13', '1.explain thread lifecycle.\r\n2.explain thread extend stop pause with example.\r\n3.define applet explain applet lifecycle and its steps.\r\n4.explain button event with syntax and example.\r\n', 10),
(3, 27, 7, 20, '2024-01-08', '2024-02-13', '1.Explain place and grid method of geometry management in detail.\r\n2.Explain pack method of geometry management giving suitable Example.\r\n3.Explain entry,checkbox and radiobutton widget in detail.\r\n4.Explain Button Widget & how to handle click event of Button widget?\r\n', 1),
(4, 27, 7, 23, '2024-01-09', '2024-02-14', '1.Explain Architecture of Android Operating System.\r\n2.Explain Life cycle of Android Application.\r\n3.Features of Android\r\n4.Explain OHA.\r\n', 1),
(5, 27, 7, 20, '2024-04-08', '2024-04-09', 'Explain Tkinter Widget', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

DROP TABLE IF EXISTS `assignment_submission`;
CREATE TABLE IF NOT EXISTS `assignment_submission` (
  `as_id` int NOT NULL AUTO_INCREMENT,
  `assign_id` int NOT NULL,
  `s_id` int NOT NULL,
  `sub_date` date NOT NULL,
  `assignment_file` varchar(50) NOT NULL,
  `marks` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`as_id`),
  KEY `assign` (`assign_id`),
  KEY `stud` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`as_id`, `assign_id`, `s_id`, `sub_date`, `assignment_file`, `marks`) VALUES
(1, 1, 11, '2024-02-26', '1-11.pdf', 5),
(2, 2, 11, '2024-02-26', '2-11.pdf', 0),
(3, 1, 15, '2024-02-27', '1-15.pdf', 5),
(4, 2, 15, '2024-02-29', '2-15.pdf', 0),
(5, 1, 7, '2024-03-04', '1-7.pdf', 5),
(6, 3, 7, '2024-03-04', '3-7.pdf', 0),
(7, 3, 11, '2024-03-25', '3-11.pdf', 0),
(8, 2, 7, '2024-03-28', '2-7.pdf', 0),
(9, 4, 15, '2024-03-28', '4-15.pdf', 5),
(10, 1, 9, '2024-04-08', '1-9.pdf', 5),
(11, 3, 9, '2024-04-08', '3-9.pdf', 0),
(12, 5, 9, '2024-04-08', '5-9.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_type` varchar(10) NOT NULL,
  `course_sem` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_id` (`course_id`),
  UNIQUE KEY `course_name` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_type`, `course_sem`) VALUES
(25, 'BCA', 'UG', '6'),
(26, 'MCA', 'PG', '4'),
(27, 'B.Sc. Computer Science', 'UG', '6'),
(28, 'M.Sc. Computer Application', 'PG', '4'),
(29, 'BBA', 'UG', '6'),
(30, 'MBA', 'PG', '4'),
(31, 'Bsc Chemistry', 'UG', '6'),
(33, 'Msc Chimestry', 'PG', '6');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `des_id` int NOT NULL AUTO_INCREMENT,
  `des_name` varchar(50) NOT NULL,
  PRIMARY KEY (`des_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`des_id`, `des_name`) VALUES
(1, 'Assistant Professor'),
(2, 'Associate Professor'),
(3, 'Teaching Assistant'),
(4, 'Visiting'),
(5, 'Principal');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `sub_id` int NOT NULL,
  `exam_date` date NOT NULL,
  `exam_title` varchar(25) NOT NULL,
  `no_question` int NOT NULL,
  `que_ids` varchar(100) NOT NULL,
  `t_id` int NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `cor` (`course_id`),
  KEY `subjec` (`sub_id`),
  KEY `smmm` (`sem_id`),
  KEY `ttt` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `course_id`, `sem_id`, `sub_id`, `exam_date`, `exam_title`, `no_question`, `que_ids`, `t_id`) VALUES
(3, 27, 7, 20, '2024-03-11', 'Python Exam 1', 5, '14,16,18,20,22', 1),
(4, 27, 7, 21, '2024-03-11', 'IOT', 5, '1,4,6,9,11', 10),
(5, 27, 7, 20, '2024-03-28', 'Python Exam 3', 5, '1,3,4,5,6,7,9,10,11,12,14,16,18,20,22', 1),
(6, 27, 7, 21, '2024-04-08', 'IOT 2', 5, '3,5,7,10,12,13,14,15,16,17,18,19,20,21,22', 10),
(7, 27, 7, 20, '2024-04-08', 'Python 3', 5, '1,3,4,5,6,7,9,10,11,12,14,16,18,20,22', 1),
(8, 27, 7, 20, '2024-09-28', 'Python Exam 3', 5, '1,3,4,5,6,7,9,10,11,12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_submission`
--

DROP TABLE IF EXISTS `exam_submission`;
CREATE TABLE IF NOT EXISTS `exam_submission` (
  `ex_id` int NOT NULL AUTO_INCREMENT,
  `e_id` int NOT NULL,
  `s_id` int NOT NULL,
  `ans_opt` varchar(100) NOT NULL,
  `point` int NOT NULL,
  PRIMARY KEY (`ex_id`),
  KEY `ee` (`e_id`),
  KEY `ss` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam_submission`
--

INSERT INTO `exam_submission` (`ex_id`, `e_id`, `s_id`, `ans_opt`, `point`) VALUES
(1, 3, 11, ',a,b,c,b,b', 3),
(2, 4, 11, ',a,a,a,c,b', 1),
(3, 4, 7, ',a,a,b,b,a', 4),
(4, 6, 9, ',b,b,b,b,b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lec_info`
--

DROP TABLE IF EXISTS `lec_info`;
CREATE TABLE IF NOT EXISTS `lec_info` (
  `lec_id` int NOT NULL AUTO_INCREMENT,
  `lec_date` date NOT NULL,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `lec_no` varchar(20) NOT NULL,
  `proxy_status` varchar(20) NOT NULL,
  `sub_id` int NOT NULL,
  `t_id` int NOT NULL,
  `lect_topic` varchar(30) NOT NULL,
  `lect_method` varchar(30) NOT NULL,
  PRIMARY KEY (`lec_id`),
  KEY `cos` (`course_id`),
  KEY `sms` (`sem_id`),
  KEY `subject` (`sub_id`),
  KEY `teacher` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lec_info`
--

INSERT INTO `lec_info` (`lec_id`, `lec_date`, `course_id`, `sem_id`, `lec_no`, `proxy_status`, `sub_id`, `t_id`, `lect_topic`, `lect_method`) VALUES
(39, '2023-12-11', 27, 7, '1', 'Own', 21, 10, 'introduction of iot', 'ppt'),
(41, '2023-12-12', 27, 7, '3', 'Own', 21, 10, 'Characteristics', 'ppt'),
(42, '2023-12-13', 27, 7, '4', 'Own', 21, 10, 'introduction of iot', 'ppt'),
(43, '2023-12-14', 27, 7, '3', 'Own', 22, 10, 'introduction of Java', 'ppt'),
(44, '2023-12-15', 27, 7, '1', 'Own', 22, 10, 'Thread', 'ppt'),
(45, '2023-12-16', 27, 7, '2', 'Own', 22, 10, 'Applet', 'ppt'),
(46, '2023-12-18', 27, 7, '2', 'Own', 21, 10, 'introduction of M2M', 'ppt'),
(47, '2023-12-19', 27, 7, '4', 'Own', 21, 10, 'Security for IOT', 'ppt'),
(48, '2023-12-20', 27, 7, '3', 'Own', 22, 10, 'JDBC', 'ppt'),
(49, '2023-12-21', 27, 7, '2', 'Own', 22, 10, 'UI controls', 'ppt'),
(52, '2023-12-12', 27, 7, '3', 'Own', 23, 1, 'Android Framework ', 'ppt'),
(56, '2023-12-13', 27, 7, '4', 'Own', 20, 1, 'Data Mining', 'ppt'),
(58, '2023-12-14', 27, 7, '6', 'Own', 23, 1, 'Android Features', 'ppt'),
(59, '2023-12-15', 27, 7, '4', 'Own', 20, 1, 'dump file', 'ppt'),
(61, '2023-12-16', 27, 7, '1', 'Own', 23, 1, 'Intent', 'ppt'),
(65, '2024-01-01', 27, 7, '4', 'Own', 23, 1, 'spinner widget', 'ppt'),
(66, '2023-12-17', 27, 7, '3', 'Own', 20, 1, 'django', 'ppt'),
(68, '2024-01-03', 27, 7, '3', 'Own', 23, 1, 'connectivity', 'ppt'),
(69, '2024-01-02', 27, 7, '3', 'Own', 20, 1, 'flask', 'ppt'),
(70, '2024-01-05', 27, 7, '1', 'Own', 23, 1, 'MongoDB', 'ppt'),
(71, '2024-02-28', 27, 7, '1', 'Own', 20, 1, 'aaa', 'ppt'),
(73, '2024-03-01', 27, 7, '1', 'Own', 20, 1, 'MongoDB Connectivity', 'ppt'),
(74, '0000-00-00', 27, 7, '1', 'Own', 22, 10, 'Inheritance', 'ppt'),
(78, '2024-02-14', 27, 7, '1', 'Own', 13, 10, 'aaa', 'ppt'),
(79, '2024-03-28', 27, 7, '1', 'Own', 20, 1, 'Python features', 'ppt'),
(82, '2024-09-03', 27, 7, '1', 'Own', 22, 1, 'List', 'ppt');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `que_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `sub_id` int NOT NULL,
  `que` varchar(100) NOT NULL,
  `oa` varchar(50) NOT NULL,
  `ob` varchar(50) NOT NULL,
  `oc` varchar(50) NOT NULL,
  `od` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `t_id` int NOT NULL,
  PRIMARY KEY (`que_id`),
  KEY `cour` (`course_id`),
  KEY `subj` (`sub_id`),
  KEY `teac` (`t_id`),
  KEY `semes` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`que_id`, `course_id`, `sem_id`, `sub_id`, `que`, `oa`, `ob`, `oc`, `od`, `ans`, `t_id`) VALUES
(1, 27, 7, 21, ' What is the full form of IoT?', 'Internet Of Technology', 'Incorporate Of Things', 'Internet Of Things', 'Incorporate Of Technology', 'Internet Of Things', 10),
(3, 27, 7, 21, 'An IoT network is a collection of ______ devices.', 'Signal', 'Machine to Machine', 'Interconnected', 'Network to Network', 'Interconnected', 10),
(4, 27, 7, 21, 'What is IoT?', 'network of physical objects embedded with sensors', 'network of virtual objects', 'network of objects in the ring structure', 'network of sensors', 'network of physical objects embedded with sensors', 10),
(5, 27, 7, 21, 'M2M stands for ________.', 'Machine to Machine', 'Man to Machine', 'Message to Message', 'Mobile to Mobile', 'Machine to Machine', 10),
(6, 27, 7, 21, 'Which of the following is the way in which an IOT devices is associated with data?', 'Internet', 'Cloud', 'Automata', 'OS', 'Cloud', 10),
(7, 27, 7, 21, 'What is the role of Big Data in IOTs Smart Grid architecture?', 'Filter the data', 'Locked the data', 'Store data', 'None of the these', 'Store data', 10),
(9, 27, 7, 21, 'The automation of communication between devices, which no human intervention.', 'Sensor', 'Machine to Machine(M2M)', 'Big data', 'Wearables', 'Machine to Machine(M2M)', 10),
(10, 27, 7, 21, 'Which of the following is not an IOT platform?', 'Amazon Web Services ', 'Microsoft Azure', 'Salesforce', 'Flipkart', 'Flipkart', 10),
(11, 27, 7, 21, 'Which of the following is used to capture data from the physical world in IOT devices?', 'Sensors', 'Actuators', 'Microprocessors', 'Microcontrollers', 'Sensors', 10),
(12, 27, 7, 21, 'Electric motor protection has which sensor?', 'Pressure sensor', 'Touch sensor', 'Temperature sensor', 'Humidity sensor', 'Temperature sensor', 10),
(13, 27, 7, 20, 'From which keyword we import the Tkinter in program?', 'call', 'from', 'import', 'All of the above', 'import', 1),
(14, 27, 7, 20, 'For user Entry data, which widget we use in tkinter ?', 'Entry', 'Text', 'Both of the above', 'None of the above', 'Text', 1),
(15, 27, 7, 20, 'How pack() function works on tkinter widget ?', 'According to x, y coordinate', 'According to row and column vise', 'According to left, right, up, down', 'None of the above', 'According to left, right, up, down', 1),
(16, 27, 7, 20, 'How the grid() function put the widget on the screen ?', 'According to x, y coordinate', 'According to row and column vise', 'According to left, right, up, down', 'None of the above', 'According to row and column vise', 1),
(17, 27, 7, 20, 'How the place() function put the widget on the screen ?', 'According to x, y coordinate', 'According to row and column vise', 'According to left, right, up, down', 'None of the above', 'According to x, y coordinate', 1),
(18, 27, 7, 20, 'How we import a tkinter in python program ?', 'import tkinter', 'import tkinter as t.t', 'from tkinter import *', 'All of the above', 'from tkinter import *', 1),
(19, 27, 7, 20, 'Tkinter tool in python provide the', 'Database', 'OS commands', 'GUI', 'All of the above', 'GUI', 1),
(20, 27, 7, 20, 'Which character is used in Python to make a single line comment?', '/', '//', '#', '!', '#', 1),
(21, 27, 7, 20, 'SQLite is -', 'Data-based', 'File-based', 'Structure-based', 'None of the above', 'File-based', 1),
(22, 27, 7, 20, 'Flask framework is written in which of the following language?', 'Java', 'Python', 'JavaScript', 'PHP', 'Python', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(1, 'SEM-I'),
(2, 'SEM-II'),
(3, 'SEM-III'),
(4, 'SEM-IV'),
(6, 'SEM-V'),
(7, 'SEM-VI'),
(8, 'SEM-VII'),
(9, 'SEM-VIII');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_fname` varchar(20) NOT NULL,
  `s_mname` varchar(40) NOT NULL,
  `s_lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gr_no` varchar(20) NOT NULL,
  `en_no` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `p_contact` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `doa` date NOT NULL,
  `password` varchar(30) NOT NULL,
  `roll_no` int NOT NULL DEFAULT '0',
  `approval_status` tinyint(1) NOT NULL DEFAULT '0',
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `css` (`course_id`),
  KEY `smm` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_fname`, `s_mname`, `s_lname`, `dob`, `gender`, `address`, `gr_no`, `en_no`, `contact`, `p_contact`, `email`, `doa`, `password`, `roll_no`, `approval_status`, `course_id`, `sem_id`) VALUES
(1, 'Ayush', 'Arjun', 'Bhusara', '2003-08-07', 'Male', '', 'B101', 'C111', '9876543217', '', 'ayush11@gmail.com', '0000-00-00', 'ayush123', 1, 1, 27, 7),
(2, 'Deep', 'Manaharbhai', 'Lad', '2003-07-29', 'Male', '', 'B102', 'C112', '7897564321', '', 'deep11@gmail.com', '0000-00-00', 'deep123', 2, 1, 27, 7),
(3, 'Zeel', 'Bhupendrabhai', 'Merai', '2004-08-05', 'Female', '', 'B103', 'C113', '9846758103', '', 'zeel11@gmail.com', '0000-00-00', 'zeel123', 4, 1, 27, 7),
(4, 'Kris', 'Kamlesh', 'Mistry', '2004-08-12', 'Male', '', 'B104', 'C114', '9876505431', '', 'kris11@gmail.com', '0000-00-00', 'kris123', 6, 1, 27, 7),
(5, 'Archana', 'Surendra', 'Nayak', '2004-06-21', 'Female', '', 'B105', 'C115', '7869534298', '', 'archana11@gmail.com', '0000-00-00', 'archana123', 7, 1, 27, 7),
(6, 'Virang', 'Arvindkumar', 'Oza', '2003-10-17', 'Male', '', 'B106', 'C116', '9846758346', '', 'virang11@gmail.com', '0000-00-00', 'virang123', 8, 1, 27, 7),
(7, 'Diya', 'Upendrabhai', 'Patel', '2003-12-02', 'Female', '', 'B107', 'C117', '6789754327', '', 'diya11@gmail.com', '0000-00-00', 'diya123', 9, 1, 27, 7),
(8, 'Keval', 'Kinnarkumar', 'Patel', '2003-11-07', 'Male', '', 'B108', 'C118', '7689564367', '', 'keval11@gmail.com', '0000-00-00', 'kevak123', 10, 1, 27, 7),
(9, 'Khushi', 'Pravinbhai', 'Patel', '2003-10-05', 'Female', '', 'B109', 'C118', '9878967854', '', 'khushi11@gmail.com', '0000-00-00', 'khushi123', 11, 1, 27, 7),
(10, 'Mohini', 'Nareshbhai', 'Patel', '2003-11-14', 'Female', '', 'B110', 'C120', '6875942315', '', 'mohini11@gmail.com', '0000-00-00', 'mohini123', 12, 1, 27, 7),
(11, 'Nishtha', 'Sunilbhai', 'Patel', '2003-07-11', 'Female', '', 'B111', 'C121', '8799256767', '', 'nishtha11@gmail.com', '0000-00-00', 'nishtha123', 13, 1, 27, 7),
(12, 'Priya', 'Bharatbhai', 'Patel', '2003-04-16', 'Female', '', 'B112', 'C122', '6789678967', '', 'priya11@gmail.com', '0000-00-00', 'priya123', 14, 1, 27, 7),
(13, 'Riya', 'Jayeshbhai', 'Patel', '2003-06-29', 'Female', '', 'B113', 'C123', '7896875467', '', 'riya11@gmail.com', '0000-00-00', 'riya123', 15, 1, 27, 7),
(14, 'Tirth', 'Jayeshbhai', 'Patel', '2003-01-25', 'Male', '', 'B114', 'C124', '9878965745', '', 'tirth11@gmail.com', '0000-00-00', 'tirth123', 16, 1, 27, 7),
(15, 'Darpan', 'Prakashbhai', 'Rana', '2004-06-12', 'Male', '', 'B115', 'C118', '6356346785', '', 'darpan11@gmail.com', '0000-00-00', 'darpan123', 18, 1, 27, 7),
(16, 'Divyanshi', 'Anilkumar', 'Singh', '2003-01-02', 'Female', '', 'B119', 'C129', '7898765467', '', 'divyanshi11@gmail.com', '0000-00-00', 'divyanshi123', 20, 1, 27, 7),
(17, 'Parth', 'Jayeshbhai', 'Rathod', '2002-11-20', 'Male', '', 'B120', 'C130', '8679567847', '', 'parth11@gmail.com', '0000-00-00', 'parth123', 19, 1, 27, 7),
(18, 'Megh', 'Manilal ', 'Tandel', '2003-01-11', 'Female', '', 'B121', 'C131', '6789567489', '', 'megh11@gmail.com', '0000-00-00', 'megh123', 21, 1, 27, 7),
(19, 'Khushi', 'Mukesh', 'Lad', '2003-10-07', 'Female', '', 'B122', 'C132', '8796789567', '', 'khushi123@gmai.com', '0000-00-00', 'khushi123', 3, 1, 27, 7),
(20, 'Sandhya', 'Kiran', 'Tandel', '2002-11-15', 'Female', '', 'B123', 'C132', '9876789654', '', 'sandhya11@gmail.com', '0000-00-00', 'sandhya123', 22, 1, 27, 7),
(21, 'Ankit', 'Omprakash', 'Mishra', '2002-05-16', 'Male', '', 'B117', 'C118', '9878976875', '', 'ankit11@gmail.com', '0000-00-00', 'ankit123', 5, 1, 27, 7),
(22, 'Tushar', 'Kiranbhai', 'Patel', '2002-08-21', 'Male', '', 'B119', 'C120', '7898678956', '', 'tushar11@gmail.com', '0000-00-00', 'tushar123', 17, 1, 27, 7),
(23, 'Ayushi', 'Rakesh', 'Singh', '2002-02-11', 'Female', '', 'B120', 'C130', '9898989796', '', 'ayushi11@gmail.com', '0000-00-00', 'ayushi123', 0, 1, 27, 6),
(24, 'Raj', 'Manishbhai', 'Patel', '2003-02-13', 'Male', '', 'B121', 'C131', '8789878656', '', 'raj11@gmail.com', '0000-00-00', 'raj123', 0, 0, 27, 7),
(25, 'Yashvi', 'Sunilbhai', 'Patel', '2004-08-31', 'Female', '', 'B124', 'C133', '6765678952', '', 'yashvi11@gmail.com', '0000-00-00', 'yashvi123', 0, 1, 27, 6);

-- --------------------------------------------------------

--
-- Table structure for table `stud_attend`
--

DROP TABLE IF EXISTS `stud_attend`;
CREATE TABLE IF NOT EXISTS `stud_attend` (
  `lec_id` int NOT NULL,
  `s_id` int NOT NULL,
  `p_flag` varchar(1) NOT NULL,
  KEY `li` (`lec_id`),
  KEY `si` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stud_attend`
--

INSERT INTO `stud_attend` (`lec_id`, `s_id`, `p_flag`) VALUES
(39, 1, 'P'),
(39, 2, 'P'),
(39, 3, 'P'),
(39, 4, 'A'),
(39, 5, 'P'),
(39, 6, 'P'),
(39, 7, 'P'),
(39, 8, 'P'),
(39, 9, 'P'),
(39, 10, 'P'),
(39, 11, 'P'),
(39, 12, 'A'),
(39, 13, 'P'),
(39, 14, 'P'),
(39, 15, 'P'),
(39, 16, 'P'),
(39, 17, 'P'),
(39, 18, 'P'),
(41, 1, 'P'),
(41, 2, 'P'),
(41, 3, 'P'),
(41, 4, 'A'),
(41, 5, 'P'),
(41, 6, 'P'),
(41, 7, 'P'),
(41, 8, 'P'),
(41, 9, 'P'),
(41, 10, 'A'),
(41, 11, 'P'),
(41, 12, 'P'),
(41, 13, 'A'),
(41, 14, 'A'),
(41, 15, 'P'),
(41, 16, 'A'),
(41, 17, 'P'),
(41, 18, 'P'),
(42, 1, 'P'),
(42, 2, 'P'),
(42, 3, 'P'),
(42, 4, 'P'),
(42, 5, 'P'),
(42, 6, 'A'),
(42, 7, 'P'),
(42, 8, 'P'),
(42, 9, 'P'),
(42, 10, 'P'),
(42, 11, 'P'),
(42, 12, 'P'),
(42, 13, 'P'),
(42, 14, 'A'),
(42, 15, 'P'),
(42, 16, 'A'),
(42, 17, 'P'),
(42, 18, 'P'),
(43, 1, 'P'),
(43, 2, 'P'),
(43, 3, 'P'),
(43, 4, 'A'),
(43, 5, 'P'),
(43, 6, 'P'),
(43, 7, 'P'),
(43, 8, 'A'),
(43, 9, 'P'),
(43, 10, 'P'),
(43, 11, 'P'),
(43, 12, 'P'),
(43, 13, 'P'),
(43, 14, 'P'),
(43, 15, 'P'),
(43, 16, 'P'),
(43, 17, 'P'),
(43, 18, 'P'),
(44, 1, 'P'),
(44, 2, 'P'),
(44, 3, 'P'),
(44, 4, 'A'),
(44, 5, 'P'),
(44, 6, 'P'),
(44, 7, 'P'),
(44, 8, 'P'),
(44, 9, 'P'),
(44, 10, 'P'),
(44, 11, 'P'),
(44, 12, 'A'),
(44, 13, 'P'),
(44, 14, 'P'),
(44, 15, 'P'),
(44, 16, 'P'),
(44, 17, 'P'),
(44, 18, 'P'),
(45, 1, 'P'),
(45, 2, 'P'),
(45, 3, 'P'),
(45, 4, 'P'),
(45, 5, 'P'),
(45, 6, 'A'),
(45, 7, 'P'),
(45, 8, 'P'),
(45, 9, 'P'),
(45, 10, 'P'),
(45, 11, 'P'),
(45, 12, 'A'),
(45, 13, 'P'),
(45, 14, 'P'),
(45, 15, 'P'),
(45, 16, 'P'),
(45, 17, 'A'),
(45, 18, 'P'),
(46, 1, 'P'),
(46, 2, 'A'),
(46, 3, 'P'),
(46, 4, 'A'),
(46, 5, 'P'),
(46, 6, 'P'),
(46, 7, 'P'),
(46, 8, 'A'),
(46, 9, 'P'),
(46, 10, 'P'),
(46, 11, 'P'),
(46, 12, 'P'),
(46, 13, 'A'),
(46, 14, 'P'),
(46, 15, 'P'),
(46, 16, 'P'),
(46, 17, 'P'),
(46, 18, 'P'),
(47, 1, 'A'),
(47, 2, 'P'),
(47, 3, 'A'),
(47, 4, 'P'),
(47, 5, 'P'),
(47, 6, 'P'),
(47, 7, 'P'),
(47, 8, 'P'),
(47, 9, 'P'),
(47, 10, 'A'),
(47, 11, 'P'),
(47, 12, 'P'),
(47, 13, 'A'),
(47, 14, 'A'),
(47, 15, 'A'),
(47, 16, 'P'),
(47, 17, 'A'),
(47, 18, 'A'),
(48, 1, 'P'),
(48, 2, 'P'),
(48, 3, 'A'),
(48, 4, 'A'),
(48, 5, 'A'),
(48, 6, 'P'),
(48, 7, 'P'),
(48, 8, 'A'),
(48, 9, 'P'),
(48, 10, 'A'),
(48, 11, 'P'),
(48, 12, 'P'),
(48, 13, 'P'),
(48, 14, 'P'),
(48, 15, 'P'),
(48, 16, 'P'),
(48, 17, 'P'),
(48, 18, 'P'),
(49, 1, 'P'),
(49, 2, 'A'),
(49, 3, 'P'),
(49, 4, 'P'),
(49, 5, 'A'),
(49, 6, 'A'),
(49, 7, 'P'),
(49, 8, 'P'),
(49, 9, 'P'),
(49, 10, 'P'),
(49, 11, 'P'),
(49, 12, 'P'),
(49, 13, 'P'),
(49, 14, 'A'),
(49, 15, 'P'),
(49, 16, 'P'),
(49, 17, 'P'),
(49, 18, 'A'),
(52, 1, 'P'),
(52, 2, 'P'),
(52, 3, 'P'),
(52, 4, 'A'),
(52, 5, 'P'),
(52, 6, 'P'),
(52, 7, 'P'),
(52, 8, 'P'),
(52, 9, 'P'),
(52, 10, 'A'),
(52, 11, 'P'),
(52, 12, 'P'),
(52, 13, 'A'),
(52, 14, 'P'),
(52, 15, 'P'),
(52, 16, 'P'),
(52, 17, 'P'),
(52, 18, 'P'),
(56, 1, 'P'),
(56, 2, 'P'),
(56, 3, 'A'),
(56, 4, 'P'),
(56, 5, 'A'),
(56, 6, 'P'),
(56, 7, 'P'),
(56, 8, 'P'),
(56, 9, 'P'),
(56, 10, 'P'),
(56, 11, 'P'),
(56, 12, 'P'),
(56, 13, 'P'),
(56, 14, 'A'),
(56, 15, 'P'),
(56, 16, 'P'),
(56, 17, 'P'),
(56, 18, 'P'),
(58, 1, 'P'),
(58, 2, 'P'),
(58, 3, 'P'),
(58, 4, 'A'),
(58, 5, 'P'),
(58, 6, 'P'),
(58, 7, 'P'),
(58, 8, 'A'),
(58, 9, 'P'),
(58, 10, 'A'),
(58, 11, 'P'),
(58, 12, 'P'),
(58, 13, 'A'),
(58, 14, 'A'),
(58, 15, 'A'),
(58, 16, 'P'),
(58, 17, 'P'),
(58, 18, 'P'),
(59, 1, 'A'),
(59, 2, 'P'),
(59, 3, 'P'),
(59, 4, 'A'),
(59, 5, 'P'),
(59, 6, 'P'),
(59, 7, 'P'),
(59, 8, 'P'),
(59, 9, 'P'),
(59, 10, 'P'),
(59, 11, 'P'),
(59, 12, 'A'),
(59, 13, 'A'),
(59, 14, 'A'),
(59, 15, 'P'),
(59, 16, 'P'),
(59, 17, 'P'),
(59, 18, 'P'),
(61, 1, 'P'),
(61, 2, 'A'),
(61, 3, 'P'),
(61, 4, 'A'),
(61, 5, 'P'),
(61, 6, 'P'),
(61, 7, 'P'),
(61, 8, 'A'),
(61, 9, 'P'),
(61, 10, 'P'),
(61, 11, 'P'),
(61, 12, 'P'),
(61, 13, 'P'),
(61, 14, 'P'),
(61, 15, 'P'),
(61, 16, 'P'),
(61, 17, 'A'),
(61, 18, 'P'),
(65, 1, 'P'),
(65, 2, 'P'),
(65, 3, 'P'),
(65, 4, 'A'),
(65, 5, 'P'),
(65, 6, 'P'),
(65, 7, 'P'),
(65, 8, 'P'),
(65, 9, 'P'),
(65, 10, 'P'),
(65, 11, 'P'),
(65, 12, 'P'),
(65, 13, 'P'),
(65, 14, 'A'),
(65, 15, 'P'),
(65, 16, 'P'),
(65, 17, 'P'),
(65, 18, 'A'),
(66, 1, 'P'),
(66, 2, 'P'),
(66, 3, 'P'),
(66, 4, 'A'),
(66, 5, 'P'),
(66, 6, 'A'),
(66, 7, 'P'),
(66, 8, 'P'),
(66, 9, 'A'),
(66, 10, 'P'),
(66, 11, 'P'),
(66, 12, 'P'),
(66, 13, 'P'),
(66, 14, 'P'),
(66, 15, 'A'),
(66, 16, 'P'),
(66, 17, 'A'),
(66, 18, 'P'),
(68, 1, 'P'),
(68, 2, 'A'),
(68, 3, 'P'),
(68, 4, 'A'),
(68, 5, 'P'),
(68, 6, 'P'),
(68, 7, 'P'),
(68, 8, 'P'),
(68, 9, 'P'),
(68, 10, 'P'),
(68, 11, 'P'),
(68, 12, 'P'),
(68, 13, 'P'),
(68, 14, 'P'),
(68, 15, 'P'),
(68, 16, 'P'),
(68, 17, 'P'),
(68, 18, 'P'),
(69, 1, 'P'),
(69, 2, 'P'),
(69, 3, 'P'),
(69, 4, 'A'),
(69, 5, 'P'),
(69, 6, 'P'),
(69, 7, 'P'),
(69, 8, 'P'),
(69, 9, 'A'),
(69, 10, 'P'),
(69, 11, 'P'),
(69, 12, 'P'),
(69, 13, 'P'),
(69, 14, 'P'),
(69, 15, 'P'),
(69, 16, 'P'),
(69, 17, 'A'),
(69, 18, 'P'),
(70, 1, 'P'),
(70, 2, 'P'),
(70, 3, 'P'),
(70, 4, 'A'),
(70, 5, 'P'),
(70, 6, 'P'),
(70, 7, 'P'),
(70, 8, 'P'),
(70, 9, 'P'),
(70, 10, 'P'),
(70, 11, 'P'),
(70, 12, 'P'),
(70, 13, 'A'),
(70, 14, 'A'),
(70, 15, 'P'),
(70, 16, 'P'),
(70, 17, 'P'),
(70, 18, 'A'),
(71, 1, 'P'),
(71, 2, 'P'),
(71, 3, 'P'),
(71, 4, 'P'),
(71, 5, 'P'),
(71, 6, 'P'),
(71, 7, 'A'),
(71, 8, 'P'),
(71, 9, 'P'),
(71, 10, 'P'),
(71, 11, 'P'),
(71, 12, 'P'),
(71, 13, 'A'),
(71, 14, 'P'),
(71, 15, 'P'),
(71, 16, 'P'),
(71, 17, 'P'),
(71, 18, 'P'),
(73, 1, 'P'),
(73, 2, 'P'),
(73, 3, 'P'),
(73, 4, 'P'),
(73, 5, 'A'),
(73, 6, 'P'),
(73, 7, 'P'),
(73, 8, 'P'),
(73, 9, 'P'),
(73, 10, 'P'),
(73, 11, 'P'),
(73, 12, 'P'),
(73, 13, 'P'),
(73, 14, 'A'),
(73, 15, 'P'),
(73, 16, 'P'),
(73, 17, 'P'),
(73, 18, 'P'),
(73, 19, 'P'),
(73, 20, 'P'),
(73, 21, 'A'),
(73, 22, 'P'),
(74, 1, 'P'),
(74, 2, 'P'),
(74, 3, 'P'),
(74, 4, 'P'),
(74, 5, 'P'),
(74, 6, 'P'),
(74, 7, 'P'),
(74, 8, 'P'),
(74, 9, 'P'),
(74, 10, 'A'),
(74, 11, 'P'),
(74, 12, 'P'),
(74, 13, 'A'),
(74, 14, 'P'),
(74, 15, 'P'),
(74, 16, 'P'),
(74, 17, 'P'),
(74, 18, 'P'),
(74, 19, 'A'),
(74, 20, 'P'),
(74, 21, 'P'),
(74, 22, 'P'),
(78, 1, 'P'),
(78, 2, 'P'),
(78, 3, 'P'),
(78, 4, 'P'),
(78, 5, 'P'),
(78, 6, 'A'),
(78, 7, 'P'),
(78, 8, 'P'),
(78, 9, 'P'),
(78, 10, 'P'),
(78, 11, 'P'),
(78, 12, 'P'),
(78, 13, 'A'),
(78, 14, 'A'),
(78, 15, 'P'),
(78, 16, 'P'),
(78, 17, 'P'),
(78, 18, 'P'),
(78, 19, 'P'),
(78, 20, 'P'),
(78, 21, 'P'),
(78, 22, 'A'),
(79, 1, 'P'),
(79, 2, 'A'),
(79, 3, 'P'),
(79, 4, 'P'),
(79, 5, 'P'),
(79, 6, 'P'),
(79, 7, 'P'),
(79, 8, 'P'),
(79, 9, 'P'),
(79, 10, 'P'),
(79, 11, 'P'),
(79, 12, 'P'),
(79, 13, 'P'),
(79, 14, 'A'),
(79, 15, 'P'),
(79, 16, 'P'),
(79, 17, 'P'),
(79, 18, 'A'),
(79, 19, 'P'),
(79, 20, 'A'),
(79, 21, 'A'),
(79, 22, 'P'),
(82, 1, 'P'),
(82, 2, 'P'),
(82, 3, 'P'),
(82, 4, 'A'),
(82, 5, 'P'),
(82, 6, 'P'),
(82, 7, 'P'),
(82, 8, 'A'),
(82, 9, 'P'),
(82, 10, 'P'),
(82, 11, 'P'),
(82, 12, 'P'),
(82, 13, 'P'),
(82, 14, 'P'),
(82, 15, 'P'),
(82, 16, 'A'),
(82, 17, 'A'),
(82, 18, 'A'),
(82, 19, 'A'),
(82, 20, 'A'),
(82, 21, 'P'),
(82, 22, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `cs` (`course_id`),
  KEY `sm` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `course_id`, `sem_id`, `sub_code`, `sub_name`) VALUES
(11, 27, 6, 'B501', 'Software Engineering'),
(12, 27, 6, 'B502', 'Computer Networking'),
(13, 27, 6, 'B503', 'Computer Graphics'),
(14, 27, 6, 'B504', 'Java Programming I'),
(15, 27, 6, 'B505', 'PHP Programming I'),
(16, 27, 6, 'B506', 'Python Programming I'),
(17, 27, 6, 'B507', 'DWDM'),
(18, 27, 6, 'B508', 'English'),
(19, 27, 7, 'B601', 'Cloud Computing Fundamental'),
(20, 27, 7, 'B602', 'Python Programming II'),
(21, 27, 7, 'B603', 'IOT'),
(22, 27, 7, 'B604', 'Java Programming II'),
(23, 27, 7, 'B605', 'Fundamentals of Mobile Programming'),
(24, 27, 7, 'B606', 'Operating System'),
(25, 27, 7, 'B607', 'IDS'),
(26, 27, 7, 'B608', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `sub_allot`
--

DROP TABLE IF EXISTS `sub_allot`;
CREATE TABLE IF NOT EXISTS `sub_allot` (
  `sa_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `sem_id` int NOT NULL,
  `sub_id` int NOT NULL,
  `t_id` int NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  PRIMARY KEY (`sa_id`),
  KEY `course` (`course_id`),
  KEY `sem` (`sem_id`),
  KEY `sub` (`sub_id`),
  KEY `user` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_allot`
--

INSERT INTO `sub_allot` (`sa_id`, `course_id`, `sem_id`, `sub_id`, `t_id`, `academic_year`) VALUES
(6, 27, 6, 11, 13, '2022-23'),
(7, 27, 6, 12, 13, '2022-23'),
(8, 27, 6, 13, 10, '2022-23'),
(9, 27, 6, 14, 1, '2022-23'),
(10, 27, 6, 15, 10, '2022-23'),
(11, 27, 6, 16, 1, '2022-23'),
(12, 27, 6, 17, 1, '2022-23'),
(13, 27, 7, 19, 13, '2022-24'),
(14, 27, 7, 20, 1, '2022-24'),
(15, 27, 7, 21, 10, '2022-24'),
(16, 27, 6, 22, 10, '2022-24'),
(17, 27, 7, 23, 1, '2022-24'),
(18, 27, 7, 24, 13, '2022-24'),
(19, 27, 7, 25, 10, '2022-24'),
(20, 27, 7, 26, 15, '2022-24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `u_type` tinyint(1) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `qulification` varchar(40) NOT NULL,
  `des_id` int NOT NULL,
  `doj` date NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `u_type`, `fname`, `mname`, `lname`, `gender`, `dob`, `qulification`, `des_id`, `doj`, `contact`, `email`, `password`) VALUES
(1, 0, 'Manish', '.', 'dodia', 'Male', '1995-06-03', 'PHD', 1, '2023-08-29', '9876543221', 'manish05@gmail.com', 'manish123'),
(10, 0, 'Nirav', '.', 'Desai', 'Male', '1980-09-13', 'PHD', 1, '2023-09-16', '6789654321', 'nirav10@gmail.com', 'nirav123'),
(13, 0, 'Yatin', '.', 'Sholanki', 'Male', '1982-11-08', 'PHD', 1, '2001-07-08', '9846758103', 'yatin12@gmail.com', 'yatin123'),
(14, 1, 'Snehal', '.', 'Joshi', 'Male', '1978-08-08', 'PHD', 2, '1999-06-08', '7869534567', 'snehal11@gmail.com', 'snehal123'),
(15, 0, 'Pratiksha', '.', 'Parekh', 'Male', '1984-10-08', 'PHD', 1, '2005-10-06', '6789564398', 'partiksa34@gmail.com', 'pariksa123'),
(16, 1, 'Admin', '.', '.', 'Male', '2019-02-08', 'PHD', 2, '2016-06-15', '6789654322', 'admin11@gmail.com', 'admin123'),
(17, 1, 'Admin', '.', '.', 'Male', '2024-09-01', 'PHD', 5, '2024-09-18', '9876543210', 'admin11@gmail.com', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `cou` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sb` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seme` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teach` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assign` FOREIGN KEY (`assign_id`) REFERENCES `assign` (`assign_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stud` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `cor` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `smmm` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjec` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ttt` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_submission`
--
ALTER TABLE `exam_submission`
  ADD CONSTRAINT `ee` FOREIGN KEY (`e_id`) REFERENCES `exam` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ss` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lec_info`
--
ALTER TABLE `lec_info`
  ADD CONSTRAINT `cos` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sms` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `cour` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semes` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subj` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teac` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `css` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `smm` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_attend`
--
ALTER TABLE `stud_attend`
  ADD CONSTRAINT `li` FOREIGN KEY (`lec_id`) REFERENCES `lec_info` (`lec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `si` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `cs` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sm` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_allot`
--
ALTER TABLE `sub_allot`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sem` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
