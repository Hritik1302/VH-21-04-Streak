-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 05:45 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vh21`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_data`
--

CREATE TABLE `bill_data` (
  `Bill_Id` int(22) NOT NULL,
  `User_Id` int(22) NOT NULL,
  `Bill_Vendor` varchar(22) NOT NULL,
  `Bill_Date` varchar(30) NOT NULL,
  `Bill_Category` varchar(200) NOT NULL,
  `Bill_Amount` int(200) NOT NULL,
  `Currency` varchar(20) NOT NULL,
  `Amount_INR` int(20) NOT NULL,
  `Create_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Is_Delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`Bill_Id`, `User_Id`, `Bill_Vendor`, `Bill_Date`, `Bill_Category`, `Bill_Amount`, `Currency`, `Amount_INR`, `Create_At`, `Is_Delete`) VALUES
(1, 44, 'NULL', '2021-10-01', 'Grocery', 12165, 'INR', 12165, '2021-10-02 01:49:05', 1),
(2, 44, 'NULL', '2021-10-01', 'Grocery', 132456, 'INR', 132456, '2021-10-02 01:49:19', 1),
(3, 44, 'NULL', '2021-10-01', 'Grocery', 2135, 'INR', 2135, '2021-10-02 01:49:19', 1),
(4, 44, 'NULL', '2021-10-01', 'Grocery', 321321, 'INR', 321321, '2021-10-02 01:49:19', 1),
(5, 44, 'NULL', '2021-10-01', 'Grocery', 321321, 'INR', 321321, '2021-10-02 01:49:19', 1),
(6, 44, 'sdad', '2021-10-01', 'Grocery', 13254, 'INR', 13254, '2021-10-02 01:49:19', 1),
(7, 44, 'NULL', '2021-10-01', 'Grocery', 132456, 'INR', 132456, '2021-10-02 01:49:19', 1),
(8, 44, 'Dmart', '2021-10-01', 'Grocery', 123456, 'INR', 123456, '2021-10-02 01:49:19', 1),
(9, 44, 'NULL', '2021-10-01', 'Health Care', 123456, 'INR', 123456, '2021-10-02 01:49:19', 1),
(10, 44, 'Dmart', '2021-10-01', 'Utility', 213246, 'INR', 213246, '2021-10-02 01:49:19', 1),
(11, 44, 'Dmart', '2021-10-01', 'Utility', 123456, 'INR', 123456, '2021-10-02 01:49:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `Category_Id` int(20) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Is_Delete` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`Category_Id`, `User_Id`, `Category`, `Is_Delete`) VALUES
(1, 44, 'Grocery', 1),
(2, 44, 'Health Care', 1),
(3, 44, 'Utility', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masters_profile`
--

CREATE TABLE `masters_profile` (
  `Profile_Id` int(20) NOT NULL,
  `Users_Id` int(10) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Monthly_Inc` bigint(100) NOT NULL,
  `Currency` varchar(6) NOT NULL,
  `Contact_Number` bigint(12) NOT NULL,
  `Last_Update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Is_Delete` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_profile`
--

INSERT INTO `masters_profile` (`Profile_Id`, `Users_Id`, `User_Name`, `Monthly_Inc`, `Currency`, `Contact_Number`, `Last_Update`, `Is_Delete`) VALUES
(7, 36, 'dasd', 4654654, 'INR', 77, '2021-10-01 11:06:27', 1),
(8, 37, 'dad', 3, 'INR', 44, '2021-10-01 11:08:58', 1),
(9, 38, 'da', 3, 'INR', 132, '2021-10-01 11:09:34', 1),
(10, 39, 'full', 123123, 'INR', 7710087750, '2021-10-01 12:08:52', 1),
(11, 40, 'abc', 465465, 'INR', 4654, '2021-10-01 12:09:12', 1),
(12, 41, 'Yash', 12145, 'INR', 123456789, '2021-10-01 13:13:32', 1),
(13, 42, 'Hritik', 10000, 'INR', 7506211129, '2021-10-02 00:57:08', 1),
(14, 43, 'ABC', 10000, 'INR', 123456789, '2021-10-02 01:02:32', 1),
(15, 44, 'ABC', 10000, 'INR', 123456789, '2021-10-02 01:03:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masters_users`
--

CREATE TABLE `masters_users` (
  `Users_Id` int(20) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Create_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Is_Delete` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_users`
--

INSERT INTO `masters_users` (`Users_Id`, `Email_Id`, `Password`, `Create_Date`, `Is_Delete`) VALUES
(41, 'abc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-10-02 00:57:36', 1),
(42, 'hritikkanojiya13@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-02 00:57:08', 1),
(44, 'abcxyz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-02 01:03:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_list`
--

CREATE TABLE `vendor_list` (
  `Vendor_Id` int(20) NOT NULL,
  `User_Id` int(20) NOT NULL,
  `Vendor` varchar(20) NOT NULL,
  `Is_Delete` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_list`
--

INSERT INTO `vendor_list` (`Vendor_Id`, `User_Id`, `Vendor`, `Is_Delete`) VALUES
(1, 36, 'Dmart', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_data`
--
ALTER TABLE `bill_data`
  ADD PRIMARY KEY (`Bill_Id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `masters_profile`
--
ALTER TABLE `masters_profile`
  ADD PRIMARY KEY (`Profile_Id`);

--
-- Indexes for table `masters_users`
--
ALTER TABLE `masters_users`
  ADD PRIMARY KEY (`Users_Id`);

--
-- Indexes for table `vendor_list`
--
ALTER TABLE `vendor_list`
  ADD PRIMARY KEY (`Vendor_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_data`
--
ALTER TABLE `bill_data`
  MODIFY `Bill_Id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `Category_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `masters_profile`
--
ALTER TABLE `masters_profile`
  MODIFY `Profile_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `masters_users`
--
ALTER TABLE `masters_users`
  MODIFY `Users_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `vendor_list`
--
ALTER TABLE `vendor_list`
  MODIFY `Vendor_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
