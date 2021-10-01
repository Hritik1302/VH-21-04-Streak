-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 01, 2021 at 06:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `Bill_No` varchar(22) NOT NULL,
  `Bill_Category` varchar(200) NOT NULL,
  `Bill_Amount` int(200) NOT NULL,
  `Create_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_Delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masters_profile`
--

CREATE TABLE `masters_profile` (
  `Profile_Id` int(20) NOT NULL,
  `Users_Id` int(20) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Contact_Number` bigint(12) NOT NULL,
  `Last_Update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_Delete` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masters_users`
--

CREATE TABLE `masters_users` (
  `Users_Id` int(20) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Create_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_Delete` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_data`
--
ALTER TABLE `bill_data`
  ADD PRIMARY KEY (`Bill_Id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_data`
--
ALTER TABLE `bill_data`
  MODIFY `Bill_Id` int(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters_profile`
--
ALTER TABLE `masters_profile`
  MODIFY `Profile_Id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters_users`
--
ALTER TABLE `masters_users`
  MODIFY `Users_Id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
