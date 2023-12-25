-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 10:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_c`
--

CREATE TABLE `all_c` (
  `price` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `tata` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id` int(20) NOT NULL,
  `all_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_c`
--

INSERT INTO `all_c` (`price`, `image`, `Type`, `tata`, `name`, `id`, `all_id`) VALUES
('000 LY', '../images/3.jpeg', 'استراحة', 'Verona', 'test 1', 0, 1),
('111 LY', '../images/blam.jpeg', 'غرف', 'Blam', 'test 2', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `blam`
--

CREATE TABLE `blam` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blam`
--

INSERT INTO `blam` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'test 2', '111 LY', '../images/blam.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `image`) VALUES
('3QhBDSFSGzqi2s8pjMZc', 'maram', 'marammilod@gmail.com', '$2y$10$rhpW/XnLAmXfNrIdsRkOMuuK6LqAaKKx.bEKADkQe1bP2Mq1Y5Cyq', 'YKPFuXGbtuClRI5pucM9.png');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

CREATE TABLE `hosts` (
  `ID` int(11) NOT NULL,
  `Table_Name` varchar(20) NOT NULL,
  `Image` varchar(40) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `Phone_Number` varchar(14) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`ID`, `Table_Name`, `Image`, `Location`, `Phone_Number`, `Email`, `Password`, `Type`) VALUES
(1, 'Verona', '../images/1.jpeg', '32.930407, 12.060052', '218918868883', 'marammilod@gmail.com', '321', 'Room'),
(3, 'administrator', '../images/blamlogo_540x540_490x490.jpeg', '', '', 'marammilod03@gmail.com', 'maramilod', ''),
(15, 'Orange', '../images/orange_720x540.jpeg', '11111111111', '***********', 'marammilod03@gmail.com', '1', 'غرف'),
(16, 'Blam', '../images/blamlogo_540x540_490x490.jpeg', '22222', '***********', 'marammilod03@gmail.com', 'maram', 'غرف');

-- --------------------------------------------------------

--
-- Table structure for table `orange`
--

CREATE TABLE `orange` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(20) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
('mU3Xj0IfLy2LMyFNPaSf', '1', '3QhBDSFSGzqi2s8pjMZc', '5', 'test', 'bla bla bla', '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `Offer_ID` int(11) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `About` varchar(20) NOT NULL,
  `Offer_Price` varchar(11) NOT NULL,
  `Offer_Start_Date` date NOT NULL,
  `Offer_End_Date` date NOT NULL,
  `table` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`Offer_ID`, `Image`, `About`, `Offer_Price`, `Offer_Start_Date`, `Offer_End_Date`, `table`) VALUES
(1, '../images/5.jpeg', '00%', '000 LY', '0000-00-00', '0000-00-00', 'verona'),
(2, '../images/10.jpeg', '00%', '000 LY', '0000-00-00', '0000-00-00', 'verona'),
(3, '../images/9.jpeg', '00%', '000 LY', '0000-00-00', '0000-00-00', 'verona');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verona`
--

CREATE TABLE `verona` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verona`
--

INSERT INTO `verona` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'test 1', '000 LY', '../images/3.jpeg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_c`
--
ALTER TABLE `all_c`
  ADD PRIMARY KEY (`all_id`);

--
-- Indexes for table `blam`
--
ALTER TABLE `blam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orange`
--
ALTER TABLE `orange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`Offer_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verona`
--
ALTER TABLE `verona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_c`
--
ALTER TABLE `all_c`
  MODIFY `all_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blam`
--
ALTER TABLE `blam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hosts`
--
ALTER TABLE `hosts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orange`
--
ALTER TABLE `orange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `Offer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verona`
--
ALTER TABLE `verona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
