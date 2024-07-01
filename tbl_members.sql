-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 05:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aht_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `member_id` int(5) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `flatno` int(11) NOT NULL,
  `bldno` varchar(2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `ac_type` enum('Owner','Rented') NOT NULL DEFAULT 'Owner',
  `arrival_date` date DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `total_mem_house` int(20) DEFAULT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(100) NOT NULL DEFAULT 'nopic.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`member_id`, `email_id`, `password`, `fname`, `lname`, `flatno`, `bldno`, `status`, `ac_type`, `arrival_date`, `registered_date`, `total_mem_house`, `phone1`, `phone2`, `profile_pic`) VALUES
(2, 'irfan@gmail.com', '123', 'Irfan', 'Khan', 101, 'A', 'Active', 'Owner', '2018-12-07', NULL, NULL, '12345', NULL, 'nopic.jpg'),
(3, 'singh@yahoo.com', '123', 'Chhara', 'Kuler', 102, 'c', 'Active', 'Owner', NULL, NULL, NULL, '35698', NULL, ''),
(4, 'prashant@gmail.com', '123', 'Prashant', 'Char', 103, 'c', 'Active', 'Owner', NULL, NULL, NULL, '547894', NULL, ''),
(5, 'maz@gmail.com', '123', 'Mazhar', 'Ali', 104, 'c', 'Active', 'Rented', NULL, NULL, NULL, '564764', NULL, 'nopic.jpg'),
(6, 'John@gmail.com', '', 'John', 'Jow', 106, 'a', 'Active', 'Owner', '2019-03-05', '2019-03-12', NULL, '23456', NULL, 'nopic.jpg'),
(7, 'nehat@gmail.com', '', 'Neha', 'Toshniwal', 202, 'a', 'Active', 'Rented', '2018-05-11', '2019-03-12', NULL, '985632', NULL, 'nopic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
