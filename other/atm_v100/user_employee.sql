-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 05:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm_v100`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_employee`
--

CREATE TABLE `user_employee` (
  `user_employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `alt_contactno` varchar(50) DEFAULT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `pan_number` varchar(20) DEFAULT NULL,
  `aadhar_number` varchar(20) DEFAULT NULL,
  `address` text NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_employee_custom_id` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_employee`
--

INSERT INTO `user_employee` (`user_employee_id`, `branch_id`, `department_id`, `designation_id`, `name`, `contactno`, `alt_contactno`, `personal_email`, `company_email`, `birthday`, `joining_date`, `pan_number`, `aadhar_number`, `address`, `profile_image`, `user_employee_custom_id`, `start_time`, `end_time`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 1, 1, 1, 'ram gurav', '1234567890', '1234567890', 'ram@gmail.com', 'company@gmail.com', '2024-07-01', '2024-07-09', '12431243', '124312431234', 'asdf asd fasdf ', 'pic.jpg', 'emp1', '05:00:00', '16:00:00', '1', '2024-07-13 19:18:07', NULL, '2024-07-13 20:32:18', NULL, '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_employee`
--
ALTER TABLE `user_employee`
  ADD PRIMARY KEY (`user_employee_id`),
  ADD UNIQUE KEY `id_of_employee` (`user_employee_custom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_employee`
--
ALTER TABLE `user_employee`
  MODIFY `user_employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
