-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2023 at 05:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `activity_detail` varchar(255) DEFAULT NULL,
  `activity_top` varchar(10) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `activity_active` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `image`, `activity_name`, `activity_detail`, `activity_top`, `price`, `activity_active`) VALUES
(7, 'category_564.jpg', 'Bungee', 'Looking for an adventure that will take your breath away? Try our zipline service! Soar high above the treetops and take in the stunning scenery like never before. Our zipline experience is perfect for thrill-seekers and nature lovers alike. Book your adv', 'Yes', '2500', 'Yes'),
(8, 'category_762.jpg', 'Paragliding', 'Experience the thrill of flying high in the sky with our professional paragliding services! Enjoy the scenic beauty of nature from a bird\'s-eye view and feel the wind rushing through your hair. Our expert pilots will ensure your safety while you soar thro', 'Yes', '3000', 'Yes'),
(11, 'category_666.jpg', 'Zipline', 'Looking for an adventure that will take your breath away? Try our zipline service! Soar high above the treetops and take in the stunning scenery like never before. Our zipline experience is perfect for thrill-seekers and nature lovers alike. Book your adv', 'Yes', '6500', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(80) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_pass`, `fullname`) VALUES
(8, 'aaryak_2059', 'aaryak123', 'Aaryak Pradhan'),
(11, 'Light', 'toor', 'Yagami Light'),
(17, 'new1', 'password', 'new1'),
(18, 'baki', '$2y$10$AeP5Ia8ToKICJWtleKSCPex/6r7SLSRbWx1M3WfRi6732YLMRn.BG', 'testtest');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_phone` int(10) NOT NULL,
  `u_activity` varchar(255) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `u_price` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `canceledby` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `u_name`, `u_email`, `u_phone`, `u_activity`, `Message`, `u_price`, `status`, `canceledby`) VALUES
(2, '2023-08-25', 'Baki Hanma', 'baki@gmail.com', 234893247, 'Bungee', 'sdkajfkasdhfjks', 2500, 'Cancled', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Baki Hanma', 'hanma', 'baki@gmail.com', '9192631770');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;