-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 07, 2018 at 04:58 PM
-- Server version: 10.2.15-MariaDB-10.2.15+maria~jessie
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `Address_id` int(11) NOT NULL,
  `Address_name` text CHARACTER SET utf8 NOT NULL,
  `Address_telephone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Address_Student_name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`Address_id`, `Address_name`, `Address_telephone`, `Address_Student_name`) VALUES
(1, '56/16\r\nถ.บางแสนสาย 4 (ใต้) ตำบลแสนสุข', '0927381976', 'ศานติกร อภัย');

-- --------------------------------------------------------

--
-- Table structure for table `Month`
--

CREATE TABLE `Month` (
  `Month_id` int(11) NOT NULL COMMENT 'ไอดี เดือน',
  `Month_title` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT 'หัวข้อ',
  `Month_date` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ปี/เดือน/วัน'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ตารางเดือน';

--
-- Dumping data for table `Month`
--

INSERT INTO `Month` (`Month_id`, `Month_title`, `Month_date`) VALUES
(2, 'มิถุนายน 2561', '2018-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Student_id` int(11) NOT NULL COMMENT 'ไอดี',
  `Student_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ชื่อ',
  `Student_status` int(11) DEFAULT 0 COMMENT 'สเตตัส',
  `Month_Month_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ตาราง นักเรียน';

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Student_id`, `Student_name`, `Student_status`, `Month_Month_id`) VALUES
(13, 'ศานติกร อภัย', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`Address_id`);

--
-- Indexes for table `Month`
--
ALTER TABLE `Month`
  ADD PRIMARY KEY (`Month_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_id`,`Month_Month_id`),
  ADD KEY `fk_Student_Month_idx` (`Month_Month_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `Address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Month`
--
ALTER TABLE `Month`
  MODIFY `Month_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี เดือน', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `fk_Student_Month` FOREIGN KEY (`Month_Month_id`) REFERENCES `Month` (`Month_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
