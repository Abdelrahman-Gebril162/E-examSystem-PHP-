-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 03:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `credit_hours` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `chaptersNum` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `credit_hours`, `level`, `chaptersNum`, `faculty_id`, `prof_id`) VALUES
(8, 'ss', 'ss', 6, 2, 5, 6, 8),
(17, 'h', 'In this department  you can learn how to design and build software', 2, 2, 2, 6, 21),
(18, 'hopa', 'hhhhhh', 2, 2, 2, 6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `course_chapter`
--

CREATE TABLE `course_chapter` (
  `id (pk)` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_chapter`
--

INSERT INTO `course_chapter` (`id (pk)`, `title`, `course_id`) VALUES
(17, 'sssss', 8),
(18, 'ggg', 8),
(21, 'hello', 18),
(22, 'saw', 17);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `faculty_id`) VALUES
(1, 'masterDep', 'master department needed for university', 1),
(4, 'it', 'ttttttttttttt', 6),
(5, 'nour', 'vision', 6);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `question_num` int(11) DEFAULT NULL,
  `num_hard_question` int(11) DEFAULT NULL,
  `num_medium_question` int(11) DEFAULT NULL,
  `num_easy_question` int(11) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `numOfStudent` int(11) DEFAULT NULL,
  `student_pass` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `need_revision` tinyint(1) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `title`, `created_at`, `question_num`, `num_hard_question`, `num_medium_question`, `num_easy_question`, `startDate`, `endTime`, `numOfStudent`, `student_pass`, `status`, `type`, `need_revision`, `course_id`, `prof_id`) VALUES
(73, 'se', '2021-06-13 01:10:33', 2, 0, 1, 1, '2021-06-13 01:10:00', '2021-06-13 01:22:00', 1, 0, 'complete', 'finall', 0, 8, 8),
(76, 'hopa', '2021-06-13 02:09:41', 1, 0, 0, 1, '2021-06-13 02:09:00', '2021-06-13 02:21:00', 1, 0, 'created', 'finall', 0, 18, 22),
(79, 'saw', '2021-06-13 02:27:58', 1, 0, 0, 1, '2021-06-13 02:27:00', '2021-06-13 02:39:00', 1, 0, 'complete', 'finall', 0, 17, 21),
(80, 'TEST', '2021-06-13 03:22:53', 2, 0, 1, 1, '2021-06-13 03:22:00', '2021-06-13 03:34:00', 1, 0, 'complete', 'finall', 0, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id (pk)` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id (pk)`, `exam_id`, `question_id`) VALUES
(11196, 73, 16),
(11197, 73, 17),
(11201, 79, 20),
(11202, 80, 16),
(11203, 80, 17);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `levelsNum` int(11) DEFAULT NULL,
  `specialYear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `description`, `createdAt`, `logo`, `background`, `levelsNum`, `specialYear`) VALUES
(1, 'university', 'online university is created to serve student and professor all around the world', '2021-05-24', '../../../upload/profImages/1102782386.png', '../../../upload/profImages/1102782386.png', 0, 0),
(6, 'computer', 'vision', '2021-06-03', '../../../upload/facultyImages/440510316.png', '../../../upload/facultyImages/440510316.png', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `N_id` bigint(20) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `mobileN` varchar(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `N_id`, `fname`, `lname`, `gender`, `birthdate`, `mobileN`, `country`, `city`, `picture`, `faculty_id`, `account_id`, `dept_id`) VALUES
(8, 11111111111111, 'master', 'admin', 'male', '2000-06-01', '01277613449', 'egypt', 'alex', '../../../upload/profImages/871156435.png', 1, 13, 1),
(21, 30006010206238, 'abdelrahman', 'gebril', 'male', '2000-06-01', '01277613442', 'egypt', 'alex', '../../../upload/profImages/B612_20170704_180040.jpg', 6, 62, 4),
(22, 30006000006238, 'Amr', 'AboHany', 'male', '1988-01-05', '01277613441', 'egypt', 'alex', '../../../upload/profImages/871156435.png', 6, 63, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `id` int(11) NOT NULL,
  `header` text DEFAULT NULL,
  `va` text DEFAULT NULL,
  `answerA` varchar(50) DEFAULT NULL,
  `answerB` varchar(50) DEFAULT NULL,
  `answerC` varchar(50) DEFAULT NULL,
  `answerD` varchar(50) DEFAULT NULL,
  `correctAnswer` varchar(50) DEFAULT NULL,
  `question_mark` int(11) DEFAULT NULL,
  `difficulty` varchar(50) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `header_type` varchar(50) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `header`, `va`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `question_mark`, `difficulty`, `question_type`, `header_type`, `course_id`, `chapter_id`) VALUES
(16, 'هل المغني حسن شاكوش ', '../../../upload/questionBank/vaSource/yt1s.com - Amr Diab  Wana Maak عمرو دياب  وأنا معاك.mp3', 'True', 'False', '', '', '2', 1, '1', 'tf', 'a', 8, 17),
(17, 'whatch this video', '../../../upload/questionBank/vaSource/٢٠١٨١٠٠٩_٠٠٠٧٠٢.mp4', '1', '2', 'a', 'b', '1', 2, '2', 'mcq', 'v', 8, 18),
(19, '1+1', NULL, 'True', 'False', '', '', '1', 1, '1', 'tf', 'snt', 18, 21),
(20, '1+1=1', NULL, 'True', 'False', '', '', '1', 1, '1', 'tf', 'snt', 17, 22);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `N_id` bigint(20) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `mobileN` varchar(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `level` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `N_id`, `fname`, `lname`, `gender`, `birthdate`, `mobileN`, `country`, `city`, `picture`, `level`, `faculty_id`, `account_id`, `dept_id`) VALUES
(1, 1, 'master', 'student', 'male', '2000-06-01', '01277613449', 'egypt', 'alex', NULL, 1, 1, NULL, NULL),
(100, 12345678942544, 'amira', 'rr', 'male', '2021-06-24', '01244152366', 'e', 'rr', '../../../upload/studentImages/1836995109.jpg', 2, 6, 61, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_course_enroll`
--

CREATE TABLE `student_course_enroll` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course_enroll`
--

INSERT INTO `student_course_enroll` (`id`, `student_id`, `course_id`, `grade`) VALUES
(7, 100, 8, 1),
(8, 100, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_answer`
--

CREATE TABLE `student_exam_answer` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `student_answer` varchar(50) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam_answer`
--

INSERT INTO `student_exam_answer` (`id`, `student_id`, `exam_id`, `question_id`, `student_answer`, `mark`) VALUES
(151, 100, 79, 20, 'True', 1),
(153, 100, 80, 16, 'False', 1),
(154, 100, 80, 17, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studen_exam_enroll`
--

CREATE TABLE `studen_exam_enroll` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `totalScore` int(11) DEFAULT NULL,
  `attendance_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studen_exam_enroll`
--

INSERT INTO `studen_exam_enroll` (`id`, `student_id`, `exam_id`, `totalScore`, `attendance_status`) VALUES
(42, 100, 73, 0, 1),
(43, 100, 79, 1, 1),
(44, 100, 80, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) NOT NULL DEFAULT 0,
  `professor_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `email`, `password`, `created_at`, `student_id`, `professor_id`) VALUES
(13, 'admin@gmail.com', '111111', '2021-05-24 19:57:44', 1, 8),
(61, 'a@gmail.com', '123456', '2021-06-04 01:54:53', 100, 8),
(62, 'abdo@gmail.com', '111111', '2021-06-04 11:49:47', 1, 21),
(63, 'amr@gmail.com', '111111', '2021-06-04 11:53:32', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(48, 61, 2),
(49, 13, 1),
(50, 13, 3),
(51, 62, 3),
(52, 63, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof_id` (`prof_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `course_chapter`
--
ALTER TABLE `course_chapter`
  ADD PRIMARY KEY (`id (pk)`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `prof_id` (`prof_id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id (pk)`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `N_id` (`N_id`),
  ADD UNIQUE KEY `mobileN` (`mobileN`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `N_id` (`N_id`),
  ADD UNIQUE KEY `mobileN` (`mobileN`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `student_course_enroll`
--
ALTER TABLE `student_course_enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_exam_answer`
--
ALTER TABLE `student_exam_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studen_exam_enroll`
--
ALTER TABLE `studen_exam_enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_chapter`
--
ALTER TABLE `course_chapter`
  MODIFY `id (pk)` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id (pk)` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11204;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `student_course_enroll`
--
ALTER TABLE `student_course_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_exam_answer`
--
ALTER TABLE `student_exam_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `studen_exam_enroll`
--
ALTER TABLE `studen_exam_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_chapter`
--
ALTER TABLE `course_chapter`
  ADD CONSTRAINT `course_chapter_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_question_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD CONSTRAINT `question_bank_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_bank_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `course_chapter` (`id (pk)`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student_course_enroll`
--
ALTER TABLE `student_course_enroll`
  ADD CONSTRAINT `student_course_enroll_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_enroll_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_exam_answer`
--
ALTER TABLE `student_exam_answer`
  ADD CONSTRAINT `student_exam_answer_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_exam_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_exam_answer_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studen_exam_enroll`
--
ALTER TABLE `studen_exam_enroll`
  ADD CONSTRAINT `studen_exam_enroll_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studen_exam_enroll_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_account_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
