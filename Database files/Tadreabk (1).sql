-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 02:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tadreabk`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annID` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `reqGPA` double NOT NULL,
  `compID` int(11) NOT NULL,
  `trainingType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appID`, `name`, `description`, `reqGPA`, `compID`, `trainingType`) VALUES
(1, 'Web Development', 'Train on web development for 8 weeks in the summer. Skills required: HTML, PHP, Bootstrap.', 2.3, 1, 'summer'),
(2, 'Web Development', 'Train on web development for a term. Skills: PHP, HTML, Bootstrap.', 2, 1, 'COOP'),
(3, 'Industrial Engineering Opportunity', 'Train on how to control and maintain a product.', 2, 4, 'summer'),
(4, 'App Development', 'Train on app development throughout the summer', 2.5, 3, 'summer'),
(5, 'Electrical Engineer Opportunity', 'CO-OP training for electrical engineers.', 2.75, 5, 'COOP'),
(6, 'Mechanical Engineer Opportunity', 'CO-OP training for mechanical engineers', 2.75, 5, 'COOP'),
(7, 'Computer Science Opportunity', 'CO-OP training for computer science.', 2.75, 5, 'COOP'),
(8, 'Accounting', 'Get real experience in accounting by training in the summer.', 2.5, 6, 'summer'),
(9, 'Summer Training on Networks', 'Train on how to set up networks, and how to make them secure....', 2, 3, 'summer');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `compID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(200) NOT NULL,
  `website` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compID`, `name`, `description`, `location`, `website`, `status`) VALUES
(1, 'STC', 'Saudi Telecom Company, is a Saudi Arabia-based Digital Company that offers telecommunications services, landline, mobile, Internet services, enterprise digital solutions, entertainment, fintech, and cooperation amusing developments.', 'Riyadh', 'www.stc.com', 'available'),
(2, 'Mobily', 'Saudi Mobily Company. is a Saudi Arabian telecommunications services company that offers fixed line, mobile telephony, and Internet services under the brand name Mobily. The company was established in', 'Jeddah', 'www.mobile.com', 'available'),
(3, 'Zain KSA', 'Mobile Telecommunications Company K.S.C.P., doing business as Zain, is a Kuwaiti mobile telecommunications company founded in 1983 in Kuwait as MTC, and later rebranded as Zain in 2007. Zain has a commercial presence in eight countries across the Middle East with 49.5 million active customers as of 31 December 2019.', 'Riyadh', 'www.zain.com', 'available'),
(4, 'Microsoft KSA', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports, and sells computer software, consumer electronics, personal computers, and related services.', 'Riyadh', 'https://www.microsoft.com/en-sa', 'available'),
(5, 'Aramco', 'We Believe In The Power Of Energy To Transform Lives And Sustain Our Planet. Find Out More. Were Committed To Driving Energy Efficiency And Addressing The Global Emission Challenge. Explore Our Products. Read News. 87 Years Of Experience.', 'Dhahran', 'www.aramco.com', 'dissociated'),
(6, 'Elm', 'Elm is a Saudi Joint Stock Company owned by the Public Investment Fund, which is the investment arm of the Saudi Ministry of Finance. Elm services are provided to all forms of beneficiaries, including government, corporate sector and individuals.', 'Riyadh', 'https://www.elm.sa/', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `companyrep`
--

CREATE TABLE `companyrep` (
  `userID` int(11) NOT NULL,
  `repID` int(11) NOT NULL,
  `compID` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyrep`
--

INSERT INTO `companyrep` (`userID`, `repID`, `compID`, `type`) VALUES
(48, 1, 1, 1),
(49, 2, 2, 1),
(50, 3, 3, 1),
(51, 4, 4, 1),
(52, 5, 5, 1),
(53, 6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event1`
--

CREATE TABLE `event1` (
  `eventID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `userID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `MID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`MID`, `name`) VALUES
(1, 'Software Engineering'),
(2, 'Computer Science'),
(3, 'Mechanical Engineering'),
(4, 'Electrical  Engineering'),
(5, 'Computer Engineering'),
(6, 'Industrial Engineering'),
(7, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `performancefeedback`
--

CREATE TABLE `performancefeedback` (
  `PFID` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progressreport`
--

CREATE TABLE `progressreport` (
  `RID` int(11) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `fileRef` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requiredmajors`
--

CREATE TABLE `requiredmajors` (
  `appID` int(11) NOT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requiredmajors`
--

INSERT INTO `requiredmajors` (`appID`, `MID`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 6),
(4, 1),
(4, 2),
(5, 4),
(6, 3),
(7, 2),
(8, 7),
(9, 2),
(9, 4),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RID` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `compID` int(11) NOT NULL,
  `studentName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`RID`, `text`, `date`, `compID`, `studentName`) VALUES
(1, 'Good', '2021-03-23', 1, 'Mohammad Fahd');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `userID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phoneNum` int(11) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `picRef` varchar(100) DEFAULT NULL,
  `CVFileRef` varchar(100) DEFAULT NULL,
  `compID` int(11) DEFAULT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`userID`, `studentID`, `name`, `email`, `phoneNum`, `gpa`, `picRef`, `CVFileRef`, `compID`, `MID`) VALUES
(72, 201363870, 'Mohammad Owaidah', NULL, NULL, 2.13, NULL, NULL, NULL, 1),
(70, 201599800, ' Mohammad Ali', NULL, NULL, 2.01, NULL, NULL, NULL, 2),
(69, 201711000, ' Faisel Saleh', NULL, NULL, 3.8, NULL, NULL, NULL, 7),
(67, 201722300, ' Ibrahim Ali', NULL, NULL, 3.33, NULL, NULL, NULL, 1),
(68, 201722366, ' Yosif Ali', NULL, NULL, 3.8, NULL, NULL, NULL, 3),
(71, 201830240, ' Omar Mohammad', NULL, NULL, 3.5, NULL, NULL, NULL, 1),
(54, 201954980, 'Ahmad Omar', NULL, NULL, 2.52, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `studentrequest`
--

CREATE TABLE `studentrequest` (
  `appID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `rejectionNote` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tadreabkuser`
--

CREATE TABLE `tadreabkuser` (
  `userID` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tadreabkuser`
--

INSERT INTO `tadreabkuser` (`userID`, `username`, `password`, `type`) VALUES
(1, 'admin', '$2y$10$FRoT.V7Qkp6WQnzAUCLfAenVH6oCLqCiQAE9MWoSr28k7KLRVCQgK', 'admin'),
(2, 'mohammad1', '$2y$10$H7bLBei8ifDT51YeCKDFuOPUYmS9fmieX4nvuOQ2RBQ9BK/0sExFW', 'student'),
(48, 'stc1', '$2y$10$/ryNLP7XbAtiL801PxmYZOOLBg6gEGY6JBy5l.EDKbYNe0FHYFYtO', 'representative'),
(49, 'mobily21', '$2y$10$G0YlknM705BePWmo/yVAq.l.ufnDCjQ0mj/X5ZchRO6RJOaYEBaxa', 'representative'),
(50, 'zain13', '$2y$10$O7ISyt5a4FKDiI7qSBZFJOI14/BGKjP4etB76sSHQ0OfwwC5957U2', 'representative'),
(51, 'microsoft01', '$2y$10$PLxRt3JIi/5pM6vTlxwEC.bS9bYcJIOSL5uwW69fkiiEWr5fW3SDO', 'representative'),
(52, 'aramco3', '$2y$10$/rzr0pkuKSRkpNWOuNJEb.vE/40RLCpsciyRaGtB8.dtwwRzZy7Xa', 'representative'),
(53, 'Elm200', '$2y$10$MQ424.VAb8yacHX276wgiuZcTIp9Unf7Je0E3BdCYCfRsJY1Lgp9m', 'representative'),
(54, 's201954980', '$2y$10$k0oA6mgrrtbq/BDNi/v.FuNvy8XKQMnLY8f3i/W679hCRwyTB/fcO', 'student'),
(67, 's201722300', '$2y$10$kp8ZV4BbGPDP9lJJrzVeTOItp3v8VbbbEmO7eLLtVGDtekjXGDrDG', 'student'),
(68, 's201722366', '$2y$10$LrU/Bhk.67v./7cpc4NLU.e18rx.8DTcwQ4F0a5SSTMtS.GBCSUZ6', 'student'),
(69, 's201711000', '$2y$10$pJG7J4/c3eAMMUoq8HopVOjUO4LazvlcO1odoygbRPnPtTpcYIDD2', 'student'),
(70, 's201599800', '$2y$10$AiOtAHAwfd2XxHc4Yh5NveBI7tuWLXxvQM9qY24e4ErliavAm9hWm', 'student'),
(71, 's201830240', '$2y$10$RPwdFsppMfBaSulMWzr6deJHkdnJtiWMjlGZT1mU29aCkYPG93kQm', 'student'),
(72, 's201363870', '$2y$10$fGbjTe2bY/f.cbbodtc8x.7qXT4mLuVGwb1J0Mt.4kRtwhCQpxiD6', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annID`),
  ADD KEY `compID` (`compID`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `compID` (`compID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`compID`);

--
-- Indexes for table `companyrep`
--
ALTER TABLE `companyrep`
  ADD PRIMARY KEY (`repID`),
  ADD KEY `compID` (`compID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `event1`
--
ALTER TABLE `event1`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `compID` (`compID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `MID` (`MID`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `performancefeedback`
--
ALTER TABLE `performancefeedback`
  ADD PRIMARY KEY (`PFID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `requiredmajors`
--
ALTER TABLE `requiredmajors`
  ADD PRIMARY KEY (`appID`,`MID`),
  ADD KEY `MID` (`MID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `MID` (`MID`),
  ADD KEY `compID` (`compID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `studentrequest`
--
ALTER TABLE `studentrequest`
  ADD PRIMARY KEY (`appID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `tadreabkuser`
--
ALTER TABLE `tadreabkuser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `companyrep`
--
ALTER TABLE `companyrep`
  MODIFY `repID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event1`
--
ALTER TABLE `event1`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `performancefeedback`
--
ALTER TABLE `performancefeedback`
  MODIFY `PFID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progressreport`
--
ALTER TABLE `progressreport`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tadreabkuser`
--
ALTER TABLE `tadreabkuser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`compID`) REFERENCES `company` (`compID`) ON DELETE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`compID`) REFERENCES `company` (`compID`) ON DELETE CASCADE;

--
-- Constraints for table `companyrep`
--
ALTER TABLE `companyrep`
  ADD CONSTRAINT `companyrep_ibfk_1` FOREIGN KEY (`compID`) REFERENCES `company` (`compID`) ON DELETE CASCADE,
  ADD CONSTRAINT `companyrep_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tadreabkuser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `event1`
--
ALTER TABLE `event1`
  ADD CONSTRAINT `event1_ibfk_1` FOREIGN KEY (`compID`) REFERENCES `company` (`compID`) ON DELETE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE,
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tadreabkuser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `performancefeedback`
--
ALTER TABLE `performancefeedback`
  ADD CONSTRAINT `performancefeedback_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE;

--
-- Constraints for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD CONSTRAINT `progressreport_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE;

--
-- Constraints for table `requiredmajors`
--
ALTER TABLE `requiredmajors`
  ADD CONSTRAINT `requiredmajors_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE,
  ADD CONSTRAINT `requiredmajors_ibfk_2` FOREIGN KEY (`appID`) REFERENCES `application` (`appID`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`compID`) REFERENCES `company` (`compID`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `tadreabkuser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `studentrequest`
--
ALTER TABLE `studentrequest`
  ADD CONSTRAINT `studentrequest_ibfk_1` FOREIGN KEY (`appID`) REFERENCES `application` (`appID`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentrequest_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
