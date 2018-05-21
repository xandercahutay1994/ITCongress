-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 04:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcongress`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_code`, `course_name`) VALUES
(14, 'BSIT', 'Bachelor of Science in Information Technology'),
(22, 'ACT', 'Associate in Computer Technology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_receipt_id` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tshirt` float NOT NULL,
  `ticket` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_receipt_id`, `student_id`, `tshirt`, `ticket`) VALUES
(55, '252', 64, 200, 200),
(58, '23224', 65, 200, 200),
(69, '8284', 66, 200, 200),
(71, '88924', 71, 200, 200),
(76, '2784982', 72, 200, 200),
(77, '892748', 73, 200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_idno` varchar(10) NOT NULL,
  `student_familyname` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_givenname` varchar(100) NOT NULL,
  `student_course_id` int(11) NOT NULL,
  `student_level` int(11) NOT NULL,
  `student_tshirt` float NOT NULL,
  `student_ticket` float NOT NULL,
  `student_attended` int(11) NOT NULL,
  `student_card_code` varchar(255) NOT NULL,
  `student_tshirt_size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_idno`, `student_familyname`, `student_id`, `student_givenname`, `student_course_id`, `student_level`, `student_tshirt`, `student_ticket`, `student_attended`, `student_card_code`, `student_tshirt_size`) VALUES
('10929867', 'CAHUTAY', 64, 'Alexander Alan', 14, 4, 200, 200, 0, '24J2JK4HJ2', 'Medium'),
('12345678', 'DURANO', 65, 'DENNIS', 14, 4, 200, 200, 0, '24JKH2JK4KJ2K4K2H', 'Large'),
('7665441', 'ALIGUEN', 66, 'ANGELICA', 14, 2, 200, 2, 0, '98892JKKJKLJLK242', 'Small'),
('87654321', 'Antipala', 71, 'Jo', 14, 4, 200, 200, 0, '9834lklkjkjkkj3', 'Large'),
('15368913', 'CAMENTO', 72, 'CHRISTIAN PAUL', 14, 4, 200, 200, 0, '234LK2JKJKLKJ2L4L', 'Medium'),
('13874217', 'SUMANTING', 73, 'BENZ', 14, 3, 200, 200, 0, '234JLKJKLKLLK234', 'Large'),
('1321345', 'Barot', 74, 'Josh', 22, 2, 0, 0, 0, '342lljjk243', 'Medium'),
('8909', 'Tyne', 75, 'Nalo', 14, 2, 0, 0, 0, '99283fsskj', 'Medium'),
('089982', 'Demetrio', 76, 'Aliguen', 14, 2, 0, 0, 0, '320402', 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_email`, `user_password`) VALUES
(61, 'Cahutay', 'alex@gmail.com', 'alex'),
(68, 'Durano Dennis', 'dennis@gmail.com', 'klsfskjfsk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
