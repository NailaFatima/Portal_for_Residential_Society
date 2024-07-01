-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 08:49 PM
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
  `status` varchar(20) NOT NULL DEFAULT 'Active',
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
(5, 'maz@gmail.com', '123', 'Mazhar', 'Ali', 104, 'c', 'Active', 'Rented', NULL, NULL, NULL, '564764', NULL, 'mem_5.jpg'),
(8, 'rajesh@gmail.com', '', 'Rajesh', 'Yadav', 202, 'a', 'Active', 'Owner', '2016-12-02', '2019-03-13', NULL, '5896321', NULL, 'face-3.jpg'),
(9, 'rajesh@gmail.com', '', 'Rajesh', 'Yadav', 202, 'a', 'Active', 'Owner', '2016-12-02', '2019-03-13', NULL, '5896321', NULL, 'face-4.jpg'),
(11, 'janvi@gmail.com', '', 'Janvi', 'Shinde', 303, 'c', 'Active', 'Owner', '2019-03-06', '2019-03-13', NULL, '89632541', NULL, 'chanal.jpg'),
(12, 'janvi@gmail.com', '', 'Janvi', 'Shinde', 303, 'c', 'Active', 'Owner', '2019-03-06', '2019-03-13', NULL, '89632541', NULL, 'face-1.jpg'),
(13, 'kamalabai@yahoo.com', '', 'Kamlesh', 'Rai', 503, 'a', 'Active', 'Owner', '2019-03-05', '2019-03-13', NULL, '598623', NULL, 'anne.jpg'),
(14, 'kamlabai@gmail.com', '', 'Kamla', 'Bai', 502, 'c', 'Active', 'Rented', '2019-03-07', '2019-03-13', NULL, '789630', NULL, 'chanal.jpg'),
(15, 'tripti@yahoo.com', '', 'Tripti', 'khanna', 603, 'a', 'Active', 'Rented', '2019-03-07', '2019-03-13', NULL, '4456982', NULL, 'mem_15.jpg'),
(17, 'rozy@rediff.com', '', 'Rozy', 'Disilva', 601, 'c', 'Active', 'Owner', '2017-06-02', '2019-03-13', NULL, '7896541', NULL, 'mem_17.jpg'),
(18, 'upasna@yahoo.com', '', 'Upasana', 'Sharma', 604, 'b', 'Active', 'Owner', '2019-01-01', '2019-03-13', NULL, '12365089', NULL, 'img1.jpeg');

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
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
