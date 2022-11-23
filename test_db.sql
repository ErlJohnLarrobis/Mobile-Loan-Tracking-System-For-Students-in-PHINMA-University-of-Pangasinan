-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'Admin', 'Admin', 'Main Admin');

-- --------------------------------------------------------

--
-- Table structure for table `applicationform_tbl`
--

CREATE TABLE `applicationform_tbl` (
  `id` int(11) NOT NULL,
  `school_lvl` varchar(255) NOT NULL,
  `school_cat` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `IDNum` varchar(255) NOT NULL,
  `Campus` varchar(255) NOT NULL,
  `YearLevel` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `ActiveNum` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Guardian_Name` varchar(255) NOT NULL,
  `Relationship` varchar(255) NOT NULL,
  `Guardian_Num` varchar(255) NOT NULL,
  `Guardian_Occupation` varchar(255) NOT NULL,
  `Amount_Due` int(255) NOT NULL,
  `Partial_Payment` int(255) NOT NULL,
  `ReceiptPartial_Payment` varchar(255) NOT NULL,
  `Date_PartialPayment` varchar(255) NOT NULL,
  `Reason_Application` varchar(255) NOT NULL,
  `Promissory_Note` varchar(255) NOT NULL,
  `ORF` varchar(255) NOT NULL,
  `Valid_ID` varchar(255) NOT NULL,
  `balance` decimal(11,0) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicationform_tbl`
--

INSERT INTO `applicationform_tbl` (`id`, `school_lvl`, `school_cat`, `FirstName`, `LastName`, `IDNum`, `Campus`, `YearLevel`, `Course`, `ActiveNum`, `Email`, `Guardian_Name`, `Relationship`, `Guardian_Num`, `Guardian_Occupation`, `Amount_Due`, `Partial_Payment`, `ReceiptPartial_Payment`, `Date_PartialPayment`, `Reason_Application`, `Promissory_Note`, `ORF`, `Valid_ID`, `balance`, `Fname`, `fee`) VALUES
(189, 'Tertiary Level (College)', 'NON-TES', 'Jimmy', 'Damance', '03-1718-1111', 'PHINMA UPang Dagupan', 'Fourth Year College', 'Bachelor of Secondary Education major in Biological Science', '09474578152', 'Damance@gmail.com', 'James Damance', 'FATHER', '09445545211', 'Businessman ', 7800, 5500, '12321', '2022-04-08', 'Delayed Salary', 'Formal_Letter.jpg', 'ID.jpg', 'Valid ID.jpg', '2300', 'Damance, Jimmy', ''),
(190, 'Grad School', 'NON-TES', 'Mark Jason', 'Sibunga', '03-1718-0011', 'PHINMA UPang Dagupan', 'Second Year College', 'Bachelor of Secondary Education major in English', '0999999099', 'sibunga@gmail.com', 'James Sibunga', 'Father', '097894524', 'Businessman ', 5000, 2500, '12347', '2022-04-08', 'Delayed Salary', 'Formal_Letter.jpg', 'ID.jpg', 'Valid ID.jpg', '2500', 'Mark Jason Sibunga', '');

-- --------------------------------------------------------

--
-- Table structure for table `approve_tbl`
--

CREATE TABLE `approve_tbl` (
  `id` int(30) NOT NULL,
  `student_num` varchar(255) NOT NULL,
  `Amount_loan` int(255) NOT NULL,
  `date_loan` varchar(255) NOT NULL,
  `partial` int(255) NOT NULL,
  `Balance` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `fee` int(255) NOT NULL,
  `partialdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve_tbl`
--

INSERT INTO `approve_tbl` (`id`, `student_num`, `Amount_loan`, `date_loan`, `partial`, `Balance`, `fullname`, `fee`, `partialdate`) VALUES
(181, '03-1718-1111 ', 7800, '2022-04-08 ', 7800, 0, 'Damance, Jimmy ', 2300, '2022-04-08'),
(182, '03-1718-0011 ', 5000, '2022-04-08 ', 10000, -5000, 'Mark Jason Sibunga ', 5000, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `id` int(10) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `DOP` varchar(255) NOT NULL,
  `ORNUMBER` int(255) NOT NULL,
  `Receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`id`, `studentnumber`, `Fname`, `Lname`, `DOP`, `ORNUMBER`, `Receipt`) VALUES
(38, '03-1718-1111', 'Jimmy', 'Damance', '2022-04-08', 124578, 'resibo.jpg'),
(39, '03-1718-0011', 'Mark Jason', 'Sibunga', '2022-04-08', 258963, 'resibo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requestnumber_tbl`
--

CREATE TABLE `requestnumber_tbl` (
  `id` int(30) NOT NULL,
  `Number_request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approved`
--

CREATE TABLE `tbl_approved` (
  `a_id` int(200) NOT NULL,
  `a_first_name` varchar(200) NOT NULL,
  `a_last_name` varchar(200) NOT NULL,
  `a_address` varchar(200) NOT NULL,
  `a_event` varchar(200) NOT NULL,
  `a_event_start` date NOT NULL,
  `a_event_end` date NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_contact` varchar(200) NOT NULL,
  `a_message` varchar(200) NOT NULL,
  `a_category` text NOT NULL,
  `a_type` text NOT NULL,
  `a_status` varchar(100) NOT NULL,
  `a_approve` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_approved`
--

INSERT INTO `tbl_approved` (`a_id`, `a_first_name`, `a_last_name`, `a_address`, `a_event`, `a_event_start`, `a_event_end`, `a_email`, `a_contact`, `a_message`, `a_category`, `a_type`, `a_status`, `a_approve`) VALUES
(51, 'juan', 'pedro', 'ph', 'ph', '2020-03-13', '2020-03-14', 'juan@gmail.com', '12312312313', '', 'BIRTHDAY PACKAGE', 'SWEET 16', 'Pending', 'Approved'),
(52, 'Jake', 'Ryan', 'Bugallon', 'Bugallon', '2020-03-12', '2020-03-12', 'jake@gmail.com', '09090909090', 'jajsdjasdjasjdajsdjasd', 'BIRTHDAY PACKAGE', 'SWEET 16', 'Pending', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birthdayphotos`
--

CREATE TABLE `tbl_birthdayphotos` (
  `id` int(11) NOT NULL,
  `imageBD` varchar(200) NOT NULL,
  `image_textBD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_birthdayphotos`
--

INSERT INTO `tbl_birthdayphotos` (`id`, `imageBD`, `image_textBD`) VALUES
(17, 'liquid backgound 1.jpg', 'BIRTHDAY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birthdayvideos`
--

CREATE TABLE `tbl_birthdayvideos` (
  `id` int(11) NOT NULL,
  `videos` varchar(100) NOT NULL,
  `video_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_birthdayvideos`
--

INSERT INTO `tbl_birthdayvideos` (`id`, `videos`, `video_text`) VALUES
(17, 'sample.mp4', 'assss'),
(18, 'SAMPLE2.mp4', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_christeningphotos`
--

CREATE TABLE `tbl_christeningphotos` (
  `id` int(11) NOT NULL,
  `imageCH` varchar(200) NOT NULL,
  `image_textCH` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_christeningphotos`
--

INSERT INTO `tbl_christeningphotos` (`id`, `imageCH`, `image_textCH`) VALUES
(39, 'BGR.jpg', 'CHRISTENING');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_christeningvideos`
--

CREATE TABLE `tbl_christeningvideos` (
  `id` int(11) NOT NULL,
  `videos` varchar(100) NOT NULL,
  `video_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_christeningvideos`
--

INSERT INTO `tbl_christeningvideos` (`id`, `videos`, `video_text`) VALUES
(19, 'SAMPLE2.mp4', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debutphotos`
--

CREATE TABLE `tbl_debutphotos` (
  `id` int(11) NOT NULL,
  `imageDB` varchar(200) NOT NULL,
  `image_textDB` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_debutphotos`
--

INSERT INTO `tbl_debutphotos` (`id`, `imageDB`, `image_textDB`) VALUES
(22, 'IMG_20200101_205423.jpg', 'DEBUT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debutvideos`
--

CREATE TABLE `tbl_debutvideos` (
  `id` int(11) NOT NULL,
  `videos` varchar(100) NOT NULL,
  `video_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_debutvideos`
--

INSERT INTO `tbl_debutvideos` (`id`, `videos`, `video_text`) VALUES
(18, 'SAMPLE2.mp4', 'asssss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(100) NOT NULL,
  `p_category` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `p_price` decimal(11,0) NOT NULL,
  `p_content` text NOT NULL,
  `imagePackage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `p_category`, `p_type`, `p_price`, `p_content`, `imagePackage`) VALUES
(83, 'BIRTHDAY PACKAGE', 'SWEET 16', '10000', 'lorem ipsumlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum\r\nlorem ipsum', 'patrick-tomasso-59247-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `r_id` int(200) NOT NULL,
  `r_first_name` varchar(200) NOT NULL,
  `r_last_name` varchar(200) NOT NULL,
  `r_address` varchar(200) NOT NULL,
  `r_event` varchar(200) NOT NULL,
  `r_event_start` date NOT NULL,
  `r_event_end` date NOT NULL,
  `r_email` varchar(200) NOT NULL,
  `r_contact` varchar(11) NOT NULL,
  `r_message` varchar(200) NOT NULL,
  `r_category` text NOT NULL,
  `r_type` text NOT NULL,
  `r_status` varchar(100) NOT NULL,
  `r_approve` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`r_id`, `r_first_name`, `r_last_name`, `r_address`, `r_event`, `r_event_start`, `r_event_end`, `r_email`, `r_contact`, `r_message`, `r_category`, `r_type`, `r_status`, `r_approve`) VALUES
(110, 'Pedro', 'juan', 'dagupan', 'dagupan', '2020-03-12', '2020-03-12', 'a@gmail.com', '12312312312', 'hellooo', 'BIRTHDAY PACKAGE', 'SWEET 16', 'Pending', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reunionphotos`
--

CREATE TABLE `tbl_reunionphotos` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reunionphotos`
--

INSERT INTO `tbl_reunionphotos` (`id`, `image`, `image_text`) VALUES
(290, 'ch.png', 'REUNIONs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reunionvideos`
--

CREATE TABLE `tbl_reunionvideos` (
  `id` int(100) NOT NULL,
  `videos` varchar(100) NOT NULL,
  `video_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reunionvideos`
--

INSERT INTO `tbl_reunionvideos` (`id`, `videos`, `video_text`) VALUES
(73, 'sample.mp4', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `u_id` int(100) NOT NULL,
  `u_Fname` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_Lname` varchar(100) NOT NULL,
  `u_Email` varchar(100) NOT NULL,
  `u_Cnumber` varchar(100) NOT NULL,
  `u_Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_Fname`, `u_Lname`, `u_Email`, `u_Cnumber`, `u_Password`, `u_type`) VALUES
(55, 'Jake', 'Ryan', 'jake@gmail.com', '2133123123', '$2y$10$0TPKmRt0dQr2HaLT6/yKCulErUrIW7uNCc2N9r/nrAXyzWimrvg9.', 'SuperAdmin'),
(67, 'Admin', 'Admin', 'Admin@gmail.com', '12345667888', '$2y$10$1OPvdr5Ty6IGZj.ugEozQuZpEKe9PZpIuv4W5Oy/mEjnYKsTCaXbG', 'Admin'),
(68, 'SuperAdmin', 'SuperAdmin', 'SuperAdmin@gmail.com', '1234567899', '$2y$10$FVyHNoy0m4fTDOhNQKsSb.BFHFx2dXrI/Z1vWvcX0kRwy56JEFhDW', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weddingphotos`
--

CREATE TABLE `tbl_weddingphotos` (
  `id` int(11) NOT NULL,
  `imageWED` varchar(200) NOT NULL,
  `image_textWED` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_weddingphotos`
--

INSERT INTO `tbl_weddingphotos` (`id`, `imageWED`, `image_textWED`) VALUES
(22, '5399643221_45e08b5550_b.jpg', 'WEDDING');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weddingvideos`
--

CREATE TABLE `tbl_weddingvideos` (
  `id` int(11) NOT NULL,
  `videos` varchar(100) NOT NULL,
  `video_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_weddingvideos`
--

INSERT INTO `tbl_weddingvideos` (`id`, `videos`, `video_text`) VALUES
(25, 'sample.mp4', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `studentnum` varchar(255) NOT NULL,
  `yearlvl` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `course`, `status`, `sy`, `studentnum`, `yearlvl`, `section`, `semester`) VALUES
(1, '03-1718-0000', 'SAPLAN', 'SAPLAN, DHIVEN PAUL', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'Continuing (Regular) ( 16 Unit(s) Allowed )', '2021-2022', '03-0000-0000', 'Third Year', 'B1-3BSIT-0', 'Second Semester'),
(5, '03-1718-00990', 'FRONDA', 'ALEXANDER FRONDA', 'BSIT', 'Continuing (Regular) ( 16 Unit(s) Allowed )', '2021-2022', '03-1718-00990', '3rd Year', '3 BSIT-06', '2nd Semester'),
(7, '03-0000-0001', 'DOE', 'JOHN DOE', 'BSIT', 'Continuing (Regular) ( 16 Unit(s) Allowed )', '2021-2022', '03-0000-0001', 'THIRD YEAR', '3-BLOCK 6', '2ND SEMESTER'),
(11, '03-1718-1111', '1111', 'Jimmy Damance', 'Bachelor of Secondary Education major in Biological Science', 'Regular', '2020-2021', '03-1718-1111', 'Fourth Year College', 'block 6', 'Second Semester'),
(12, '03-1718-2222', '2222', 'Allan Patrick Garcia', 'Bachelor of Education major in Pre-School Education', 'Regular', '2020-2021', '03-1718-222', 'Third Year College', '3-BSIT 06 ', 'Second Semester'),
(13, '03-1718-3333', '3333', 'Cardo dalisay', 'Bachelor of Secondary Education major in English', 'Regular', '2020-2021', '03-1718-3333', 'First Year College', '3 -GHT-03A', 'Second Semester'),
(15, '03-1718-1010', '1010', 'Mark Terrence Solomon', 'Bachelor of Secondary Education major in Mathematics', 'Regular', '2020-2021', '03-1718-1010', 'Third Year College', '3 BSIT-06', 'Second Semester'),
(16, '03-1718-0011', '0011', 'Mark Jason Sibunga', 'Bachelor of Secondary Education major in English', 'Regular', '2020-2021', '03-1718-0011', 'Second Year College', '3 -GHT-03A', 'Second Semester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicationform_tbl`
--
ALTER TABLE `applicationform_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Number_request` (`id`);

--
-- Indexes for table `approve_tbl`
--
ALTER TABLE `approve_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestnumber_tbl`
--
ALTER TABLE `requestnumber_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_approved`
--
ALTER TABLE `tbl_approved`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_birthdayphotos`
--
ALTER TABLE `tbl_birthdayphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_birthdayvideos`
--
ALTER TABLE `tbl_birthdayvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_christeningphotos`
--
ALTER TABLE `tbl_christeningphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_christeningvideos`
--
ALTER TABLE `tbl_christeningvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_debutphotos`
--
ALTER TABLE `tbl_debutphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_debutvideos`
--
ALTER TABLE `tbl_debutvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_reunionphotos`
--
ALTER TABLE `tbl_reunionphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reunionvideos`
--
ALTER TABLE `tbl_reunionvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_weddingphotos`
--
ALTER TABLE `tbl_weddingphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_weddingvideos`
--
ALTER TABLE `tbl_weddingvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationform_tbl`
--
ALTER TABLE `applicationform_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `approve_tbl`
--
ALTER TABLE `approve_tbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `requestnumber_tbl`
--
ALTER TABLE `requestnumber_tbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_approved`
--
ALTER TABLE `tbl_approved`
  MODIFY `a_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_birthdayphotos`
--
ALTER TABLE `tbl_birthdayphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_birthdayvideos`
--
ALTER TABLE `tbl_birthdayvideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_christeningphotos`
--
ALTER TABLE `tbl_christeningphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_christeningvideos`
--
ALTER TABLE `tbl_christeningvideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_debutphotos`
--
ALTER TABLE `tbl_debutphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_debutvideos`
--
ALTER TABLE `tbl_debutvideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `r_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_reunionphotos`
--
ALTER TABLE `tbl_reunionphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `tbl_reunionvideos`
--
ALTER TABLE `tbl_reunionvideos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_weddingphotos`
--
ALTER TABLE `tbl_weddingphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_weddingvideos`
--
ALTER TABLE `tbl_weddingvideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
