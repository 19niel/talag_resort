-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 11:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis202`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `contact_Person` varchar(200) NOT NULL,
  `street_Address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `zip` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone_Number` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `company_name`, `contact_Person`, `street_Address`, `city`, `region`, `zip`, `country`, `phone_Number`, `email`, `inquiry`, `created_at`) VALUES
(1, 'Talags', 'Nathaniel Talag', 'Maayong Tanan', 'Bulacan', 'NCR', '6969', 'Pilipins', 2147483647, 'nathtalag@gmail.com', 'This is just a tes', '2024-02-11 22:10:13'),
(2, '123', '123', '123', 'asd123', 'asd123', 'asd', 'asdasd', 123, 'asd123', 'asd', '2024-02-12 00:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `resort_book`
--

CREATE TABLE `resort_book` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `phoneNum` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `package` varchar(200) NOT NULL,
  `chckIndate` varchar(200) NOT NULL,
  `chckOutdate` varchar(200) NOT NULL,
  `other_request` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resort_book`
--

INSERT INTO `resort_book` (`id`, `firstName`, `lastName`, `phoneNum`, `email`, `package`, `chckIndate`, `chckOutdate`, `other_request`) VALUES
(1, 'Nathaniel', 'Talag', 2147483647, 'nathtalag@gmail.com', 'peasant class', '01-01-2024', '01-09-2024', 'akin to boss'),
(2, 'NICE', 'NICE', 919, 'nice@gmail.com', 'Peasant Class', '01-20-2024', '01-31-2024', 'Bago lang to boi'),
(3, '123', '123', 123, '123', 'Middle Class', '123', '123', '123'),
(4, 'test', 'test', 123123, 'test@gmail.com', 'Peasant Class ', '2024-02-13', '2024-02-14', 'this is a test this should appear in the CRUD System');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `resort_book`
--
ALTER TABLE `resort_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resort_book`
--
ALTER TABLE `resort_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
