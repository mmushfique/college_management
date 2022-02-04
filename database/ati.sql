-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 06:34 PM
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
-- Database: `ati`
--
CREATE DATABASE IF NOT EXISTS `ati` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ati`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('user', 'user', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `dur`) VALUES
(1, 'HNDIT', '2 ½ years'),
(2, 'HNDE', '2 ½ years');

-- --------------------------------------------------------

--
-- Table structure for table `hnde`
--

CREATE TABLE `hnde` (
  `yearno` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `EN 1111-Reading & Vocabulary` varchar(10) DEFAULT NULL,
  `EN 1112-Effective Communication Skills I` varchar(10) DEFAULT NULL,
  `EN 1113-Listening Skills I` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hnde`
--

INSERT INTO `hnde` (`yearno`, `semester`, `studentID`, `EN 1111-Reading & Vocabulary`, `EN 1112-Effective Communication Skills I`, `EN 1113-Listening Skills I`) VALUES
('First year', 'First semester', 'KEG/EN/2020/0001', 'A', 'C', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `hndit`
--

CREATE TABLE `hndit` (
  `yearno` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `HNDIT11012-Personal Computer Applications` varchar(10) DEFAULT NULL,
  `HNDIT11023-Computer Hardware` varchar(10) DEFAULT NULL,
  `HNDIT11034-Structured Programming` varchar(10) DEFAULT NULL,
  `HNDIT11042-DRO` varchar(10) DEFAULT NULL,
  `HNDIT11052-DBMS` varchar(10) DEFAULT NULL,
  `HNDIT12094-Object Oriented Programming` varchar(10) DEFAULT NULL,
  `HNDIT12103-Graphics and Multimedia` varchar(10) DEFAULT NULL,
  `HNDIT12112-DSA` varchar(10) DEFAULT NULL,
  `HNDIT12123-SAD` varchar(10) DEFAULT NULL,
  `111111111-dfd` varchar(10) DEFAULT NULL,
  `1102-sdsd` varchar(10) DEFAULT NULL,
  `fd-fv` varchar(10) DEFAULT NULL,
  `dsfs-dsf` varchar(10) DEFAULT NULL,
  `eqeq-eref` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hndit`
--

INSERT INTO `hndit` (`yearno`, `semester`, `studentID`, `HNDIT11012-Personal Computer Applications`, `HNDIT11023-Computer Hardware`, `HNDIT11034-Structured Programming`, `HNDIT11042-DRO`, `HNDIT11052-DBMS`, `HNDIT12094-Object Oriented Programming`, `HNDIT12103-Graphics and Multimedia`, `HNDIT12112-DSA`, `HNDIT12123-SAD`, `111111111-dfd`, `1102-sdsd`, `fd-fv`, `dsfs-dsf`, `eqeq-eref`) VALUES
('First year', 'First semester', 'KEG/IT/2020/0001', 'S', 'C', 'C', 'A', 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('First year', 'First semester', 'KEG/IT/2020/0002', 'C', 'S', 'A', 'A', 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('First year', 'First semester', 'KEG/IT/2020/0003', 'A', 'S', 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Pasindu', 'pasindu@gmail.com', 'pasindu', 1),
(2, 'lec1', 'lec1@gmail.com', 'lec1', 1),
(3, 'lec2', 'lec2@gmail.com', 'lec2', 0),
(4, 'Jhon', 'jhon@gmail.com', 'jhon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `course`) VALUES
('KEG/EN/2020/0001', 'Steve', 'HNDE'),
('KEG/EN/2020/0002', 'Thomson', 'HNDE'),
('KEG/IT/2020/0001', 'Martin', 'HNDIT'),
('KEG/IT/2020/0002', 'Jhon', 'HNDIT'),
('KEG/IT/2020/0003', 'Ewe', 'HNDIT');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `code` varchar(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `credits` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `yearno` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `name`, `credits`, `course`, `yearno`, `semester`) VALUES
('EN 1111', 'Reading & Vocabulary', 2, 'HNDE', 'First year', 'First semester'),
('EN 1112', 'Effective Communication Skills I', 3, 'HNDE', 'First year', 'First semester'),
('EN 1113', 'Listening Skills I', 1, 'HNDE', 'First year', 'First semester'),
('HNDIT11012', 'Personal Computer Applications', 3, 'HNDIT', 'First year', 'First semester'),
('HNDIT11023', 'Computer Hardware', 3, 'HNDIT', 'First year', 'First semester'),
('HNDIT11034', 'Structured Programming', 4, 'HNDIT', 'First year', 'First semester'),
('HNDIT11042', 'DRO', 2, 'HNDIT', 'First year', 'First semester'),
('HNDIT11052', 'DBMS', 2, 'HNDIT', 'First year', 'First semester'),
('HNDIT12094', 'Object Oriented Programming', 4, 'HNDIT', 'First year', 'Second semester'),
('HNDIT12103', 'Graphics and Multimedia', 3, 'HNDIT', 'First year', 'Second semester'),
('HNDIT12112', 'DSA', 2, 'HNDIT', 'First year', 'Second semester'),
('HNDIT12123', 'SAD', 3, 'HNDIT', 'First year', 'Second semester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `hnde`
--
ALTER TABLE `hnde`
  ADD PRIMARY KEY (`yearno`,`semester`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `hndit`
--
ALTER TABLE `hndit`
  ADD PRIMARY KEY (`yearno`,`semester`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`code`),
  ADD KEY `course` (`course`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course`) REFERENCES `course` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
