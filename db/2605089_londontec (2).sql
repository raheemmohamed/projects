-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb19.awardspace.net
-- Generation Time: Apr 04, 2018 at 03:05 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2605089_londontec`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(100) NOT NULL,
  `activity_log_activity` varchar(500) NOT NULL,
  `activity_date` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `activity_log_activity`, `activity_date`, `user_id`) VALUES
(1, 'Add new Courses BTEC HND in Computing & System Development', '2018-02-02 09:35:55:pm', 15),
(2, 'Add new Courses Bsc(Hons) in Computing', '2018-02-02 09:37:00:pm', 15),
(3, 'Add new Courses BTEC HND In Business Management ', '2018-02-02 09:37:55:pm', 15),
(4, 'Add new Courses subjects forBTEC HND in Computing & System Development', '2018-02-02 09:41:47:pm', 15),
(5, 'Add new Courses subjects forBsc(Hons) in Computing', '2018-02-02 09:42:45:pm', 15),
(6, 'Add new Courses subjects forBTEC HND In Business Management ', '2018-02-02 09:43:33:pm', 15),
(7, 'Add new Knowledge box for BTEC HND in Computing & System Development', '2018-02-02 09:43:59:pm', 15),
(8, 'Add new Instructions Network Technology Module', '2018-02-02 09:50:51:pm', 15),
(9, 'Add new londontec user Akeel Afridi', '2018-02-02 09:52:12:pm', 15),
(10, 'Lecture Meterials Programming .Net  Uploaded', '2018-02-02 09:55:04:pm', 15),
(11, 'One of course deleted', '2018-02-04 02:16:41:pm', 1),
(12, 'Add new Courses subjects forBTEC HND in Computing & System Development', '2018-02-04 02:17:29:pm', 1),
(13, 'Add new Courses Diploma in IT & Software Development', '2018-02-04 03:43:09:pm', 1),
(14, 'Add new Courses subjects forDiploma in IT & Software Development', '2018-02-04 03:44:42:pm', 1),
(15, 'One of course deleted', '2018-02-04 03:45:14:pm', 1),
(16, 'Add new Courses subjects forDiploma in IT & Software Development', '2018-02-04 03:46:00:pm', 1),
(17, 'Add new Knowledge box for BTEC HND In Business Management ', '2018-02-04 03:46:52:pm', 1),
(18, 'Add new Knowledge box for Diploma in IT & Software Development', '2018-02-04 03:47:32:pm', 1),
(19, 'Add new Studentstudent', '2018-02-04 03:49:38:pm', 1),
(20, 'Lecture Meterials Database Management Lecture notes Uploaded', '2018-02-04 03:52:22:pm', 1),
(21, 'Add new Instructions Diploma in IT Guide Book', '2018-02-04 03:54:41:pm', 1),
(22, 'One Instruction deleted', '2018-02-04 04:14:02:pm', 1),
(23, 'Add new Instructions Check plagiarism', '2018-02-04 04:14:57:pm', 1),
(24, 'One Instruction deleted', '2018-02-17 06:31:30:pm', 15),
(25, 'Add new Instructions plagiarism checking', '2018-02-17 06:50:53:pm', 15),
(26, 'Add new londontec user sanjeewa ', '2018-02-18 04:46:48:pm', 15),
(27, 'Add new StudentYounus', '2018-03-03 08:46:42:pm', 15),
(28, 'Add new londontec user younus', '2018-03-03 08:50:07:pm', 15),
(29, 'Add new londontec user younus', '2018-03-03 08:55:37:pm', 15),
(30, 'Add new londontec user younus', '2018-03-03 09:01:19:pm', 15),
(31, 'Add new londontec user younus', '2018-03-03 09:04:20:pm', 15),
(32, 'Add new londontec user you', '2018-03-03 09:05:52:pm', 15),
(33, 'Add new londontec user younus', '2018-03-03 09:07:54:pm', 15),
(34, 'Add new londontec user younus', '2018-03-03 09:11:46:pm', 15),
(35, 'Add new Studentyounus', '2018-03-03 09:17:59:pm', 15),
(36, 'Add new Studentyounus', '2018-03-11 04:21:39:pm', 15),
(37, 'Add new londontec user admin', '2018-03-31 03:58:28:pm', 15),
(38, 'Add new londontec user admin', '2018-03-31 03:59:44:pm', 15),
(39, 'Add new londontec user lecture', '2018-03-31 04:02:25:pm', 26),
(40, 'Add new Studentstudent', '2018-03-31 04:05:51:pm', 26),
(41, 'Add new Studentprogrammer', '2018-04-03 02:02:43:pm', 15),
(42, 'Add new londontec user zuffer', '2018-04-03 08:46:42:pm', 15),
(43, 'Add new Instructions ', '2018-04-03 09:41:15:pm', 15),
(44, 'Lecture Meterials  Uploaded', '2018-04-03 09:42:53:pm', 15);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(100) NOT NULL,
  `course_title` varchar(300) NOT NULL,
  `course_duration` varchar(100) NOT NULL,
  `course_fees` text NOT NULL,
  `course_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_duration`, `course_fees`, `course_description`) VALUES
(1, 'BTEC HND in Computing & System Development', '16 Month', 'Rs 225000', '<div align="left"><span class="st">HND (Higher National Diploma) in Computing\r\n &amp; Systems Development- Networking. The course is offered by Edexcel\r\n (Pearson) – UK, a world leading education, training and examination \r\nbody. Edexcel qualifications are accepted by over 115 Universities \r\naround the world</span></div>'),
(2, 'Bsc(Hons) in Computing', '12 Month', 'Rs 389000', 'The main aim of this course is to provide students with a general \r\neducation in the area of Computing. The course is designed for those \r\nstudents who wish to specialise in the development and maintenance of \r\nmodern computer based systems. There are four areas that characterise \r\nthe course.<br>\r\nThese are: Software development, Information systems, Networks and \r\ndistributed systems, and Internet Computing Systems. The course develops\r\n technical and non-technical skills necessary for the graduate to \r\ndemonstrate a professional attitude and work successfully in the above \r\nareas.'),
(3, 'BTEC HND In Business Management ', '16 Month', 'Rs 250000', 'This programme is designed to introduce aspiring managers to the \r\nfundamentals of business and covers a diverse range of related topics \r\nincluding Marketing, Economics, Communication, HR, Law, Accountancy, \r\nStrategic Management etc. It aims to equip learners with the skills and \r\nknowledge to successfully manage different functions in an organisation \r\nand to have a holistic view of all the functional areas of a business. \r\nThe successful completion of this programme can open doors for further \r\nstudies starting from an HND up to Degree and even MBA level'),
(4, 'Diploma in IT & Software Development', '4 Month', 'Rs 24000', 'This is a Foundation course for every student. once completed student will be go forward to study BTEC HND in Computing and system development');

-- --------------------------------------------------------

--
-- Table structure for table `course_meterials`
--

CREATE TABLE `course_meterials` (
  `meterial_id` int(100) NOT NULL,
  `meterial_title` varchar(200) NOT NULL,
  `meterial_description` text NOT NULL,
  `meterial_year` varchar(100) NOT NULL,
  `upload_date` varchar(200) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_meterials`
--

INSERT INTO `course_meterials` (`meterial_id`, `meterial_title`, `meterial_description`, `meterial_year`, `upload_date`, `course_id`) VALUES
(1, 'Programming .Net ', 'This is a Programming .Net course module Today Lecture notes<br>', '2018', 'February 2, 2018, 9:55 pm', 1),
(2, 'Database Management Lecture notes', 'Lecture notes of today classs', '2018', 'February 4, 2018, 3:52 pm', 4),
(3, '', '<br>', '2018', 'April 3, 2018, 9:42 pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_meterial_upload`
--

CREATE TABLE `course_meterial_upload` (
  `meterial_upload_id` int(100) NOT NULL,
  `meterial_upload_name` text NOT NULL,
  `meterial_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_meterial_upload`
--

INSERT INTO `course_meterial_upload` (`meterial_upload_id`, `meterial_upload_name`, `meterial_id`) VALUES
(1, '1517588704relational-model-100326082243-phpapp02 (1).pdf', 1),
(2, '1517588704slide_13.jpg', 1),
(3, '1517588704WBS-software-upgrade.jpg', 1),
(4, '1517588704Feasibility Report (1).ppt', 1),
(5, '1517739735ADVANCE NETWORKING.pptx', 2),
(6, '1517739741Student Guide to ICA _1718.pptx', 2),
(7, '1522771973', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_module_subject`
--

CREATE TABLE `course_module_subject` (
  `module_id` int(100) NOT NULL,
  `module_subjects` text NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_module_subject`
--

INSERT INTO `course_module_subject` (`module_id`, `module_subjects`, `course_id`) VALUES
(2, 'Advance Server Side Technology,Advance Network,Advance Database,ICT Service Management ,Final Year Project', 2),
(3, 'Strategic Management,Business Communication,Accounting and Financial Management ,Principles of Economics ', 3),
(4, 'Employbility Information Technology Computer programming Web development Programming.NET', 1),
(6, 'Fundamental_of_ICT Java_programming Database_management ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `instruct_id` int(100) NOT NULL,
  `Instruc_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`instruct_id`, `Instruc_title`, `description`, `course_id`) VALUES
(2, 'Diploma in IT Guide Book', 'This is a Guide book free for diploma in IT course student', 4),
(4, 'plagiarism checking', 'Checking plagiarism', 1),
(5, '', '<br>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instruction_image`
--

CREATE TABLE `instruction_image` (
  `instruction_img_id` int(100) NOT NULL,
  `image` text NOT NULL,
  `instruction_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruction_image`
--

INSERT INTO `instruction_image` (`instruction_img_id`, `image`, `instruction_id`) VALUES
(7, '1517739880londontec.lk-Diploma in IT  Software Development.pdf', 2),
(9, '1518873653londontec.lk-Diploma in IT  Software Development.pdf', 4),
(10, '1518873653mvc-structure.png', 4),
(11, '1518873653smallseotools-1510925169.pdf', 4),
(12, '1522771875', 5);

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_box`
--

CREATE TABLE `knowledge_box` (
  `knoledge_box_id` int(100) NOT NULL,
  `message` text NOT NULL,
  `users_id` int(100) DEFAULT NULL,
  `course_id` int(100) DEFAULT NULL,
  `message_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge_box`
--

INSERT INTO `knowledge_box` (`knoledge_box_id`, `message`, `users_id`, `course_id`, `message_date`) VALUES
(1, 'Hii This is a Knowledge share box. if any doubt other student can help you<br>', 2, 1, 'February 2, 2018, 9:57 pm'),
(2, 'Hello Raheem. Nice Work really i like this LMS', 1, 1, 'February 4, 2018, 3:59 pm'),
(3, 'Hello kasun', 2, 1, 'February 4, 2018, 4:00 pm'),
(4, 'Hii Raheem', 1, 1, 'February 4, 2018, 4:01 pm'),
(5, 'hi raheem .i will kill you', 2, 1, 'February 5, 2018, 12:09 pm'),
(6, 'test', 2, 1, 'February 18, 2018, 4:39 pm'),
(7, 'hiii', 51, 1, 'March 3, 2018, 9:20 pm'),
(8, 'i am new here', 51, 1, 'March 3, 2018, 9:20 pm'),
(9, 'This application is pretty good', 51, 1, 'March 3, 2018, 9:21 pm'),
(12, 'Hii', 2, 1, 'April 3, 2018, 10:13 pm');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_box_main`
--

CREATE TABLE `knowledge_box_main` (
  `knowledge_box_main_id` int(100) NOT NULL,
  `title` text NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge_box_main`
--

INSERT INTO `knowledge_box_main` (`knowledge_box_main_id`, `title`, `created_date`, `course_id`) VALUES
(1, 'BTEC HND knowledge share', '2018/02/02', 1),
(2, 'HND Business management chat share', '2018/02/04', 3),
(3, 'Diploma in IT knwoledge share', '2018/02/04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `londontec_events`
--

CREATE TABLE `londontec_events` (
  `event_id` int(100) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `londontec_events`
--

INSERT INTO `londontec_events` (`event_id`, `event_title`, `event_description`, `event_date`) VALUES
(2, 'Student Meeting', 'This is only for londontec students please come', '01/28/2018'),
(3, 'Leave anouncment', 'Hello dear the londontec closed on Thursday', '01/28/2018');

-- --------------------------------------------------------

--
-- Table structure for table `londontec_users`
--

CREATE TABLE `londontec_users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `verification_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `londontec_users`
--

INSERT INTO `londontec_users` (`user_id`, `username`, `gender`, `email`, `password`, `user_type`, `verification_status`) VALUES
(1, 'Raheem Mohamed', '1', 'raheem@londontec.lk', '202cb962ac59075b964b07152d234b70', '1', 1),
(15, 'abdul raheem', '1', 'mohamedraheem0555@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 1),
(16, 'Akeel Afridi', '1', 'afridilk@gmail.com', '68743a4c66f7993b609947ee1cfc29a6', '1', 0),
(17, 'sanjeewa ', '1', 'sanjeewa7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(26, 'admin', '1', 'admin@londonteclms.com', '43f3707b8aaca104be65b48d274baa54', '1', 1),
(27, 'lecture', '1', 'lecture@londonteclms.com', '745e9e1f735333f91e585fa97e11d555', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(100) NOT NULL,
  `message_subject` varchar(100) NOT NULL,
  `message_description` text NOT NULL,
  `student_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `message_date` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_subject`, `message_description`, `student_id`, `user_id`, `message_date`) VALUES
(1, 'Hello world', 'Hello sir i want some help for assignments', 2, 15, 'February 4, 2018, 2:29 pm'),
(2, 'hi', '<br>', 2, 1, 'February 17, 2018, 6:16 pm'),
(3, '', 'Hi', 2, 15, 'February 17, 2018, 6:21 pm'),
(4, 'test', 'hello', 2, 15, 'February 18, 2018, 4:40 pm'),
(5, 'hello', 'hii this raheem', 2, 15, 'March 3, 2018, 8:22 pm'),
(6, 'Regarding to the LMS', 'Dear sir finally i did&nbsp;', 2, 17, 'April 3, 2018, 4:28 pm');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(100) NOT NULL,
  `student_name` text NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Registered_date` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `NIC` varchar(12) NOT NULL,
  `phone` int(12) NOT NULL,
  `verification_status` int(10) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `Gender`, `Registered_date`, `email`, `password`, `NIC`, `phone`, `verification_status`, `course_id`) VALUES
(1, 'Kasun Mahesh', '1', '2017/10/17', 'studentHND@gmail.com', '202cb962ac59075b964b07152d234b70', '581515521', 721983016, 1, 1),
(2, 'Mohamed Raheem', '1', '02/02/2018', 'mohamedraheem0666@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '84548525X', 721983016, 1, 1),
(3, 'student', '1', '02/04/2018', 'student@gmail.com', '202cb962ac59075b964b07152d234b70', '78965412X', 789361242, 0, 4),
(50, 'Younus', '1', '03/03/2018', 'mohamedyounus0666@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123232322', 721983016, 1, 1),
(51, 'younus', '1', '03/03/2018', 'mohamedyounus0666@gmail.com', 'f64121c7bdf8c1918a53d5fd5892687b', '27398273 X', 73782388, 1, 1),
(52, 'younus', '1', '03/11/2018', 'mohamedyounus0666@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '72382382 X', 721818293, 0, 1),
(53, 'student', '1', '03/31/2018', 'student@londonteclms.com', '9afbcb63e49d4b593bd7584d821f74d8', '18789412 X', 721986341, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_meterials`
--
ALTER TABLE `course_meterials`
  ADD PRIMARY KEY (`meterial_id`);

--
-- Indexes for table `course_meterial_upload`
--
ALTER TABLE `course_meterial_upload`
  ADD PRIMARY KEY (`meterial_upload_id`);

--
-- Indexes for table `course_module_subject`
--
ALTER TABLE `course_module_subject`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`instruct_id`);

--
-- Indexes for table `instruction_image`
--
ALTER TABLE `instruction_image`
  ADD PRIMARY KEY (`instruction_img_id`);

--
-- Indexes for table `knowledge_box`
--
ALTER TABLE `knowledge_box`
  ADD PRIMARY KEY (`knoledge_box_id`);

--
-- Indexes for table `knowledge_box_main`
--
ALTER TABLE `knowledge_box_main`
  ADD PRIMARY KEY (`knowledge_box_main_id`);

--
-- Indexes for table `londontec_events`
--
ALTER TABLE `londontec_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `londontec_users`
--
ALTER TABLE `londontec_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course_meterials`
--
ALTER TABLE `course_meterials`
  MODIFY `meterial_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_meterial_upload`
--
ALTER TABLE `course_meterial_upload`
  MODIFY `meterial_upload_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_module_subject`
--
ALTER TABLE `course_module_subject`
  MODIFY `module_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `instruct_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instruction_image`
--
ALTER TABLE `instruction_image`
  MODIFY `instruction_img_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `knowledge_box`
--
ALTER TABLE `knowledge_box`
  MODIFY `knoledge_box_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `knowledge_box_main`
--
ALTER TABLE `knowledge_box_main`
  MODIFY `knowledge_box_main_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `londontec_events`
--
ALTER TABLE `londontec_events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `londontec_users`
--
ALTER TABLE `londontec_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
