-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2024 at 08:32 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahana_medic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `symptom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `taking_medications` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL,
  `medication_details` text COLLATE utf8mb4_general_ci,
  `contact_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` int NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `patient_name`, `symptom`, `appointment_date`, `appointment_time`, `taking_medications`, `medication_details`, `contact_no`, `created_at`, `isActive`) VALUES
(49, 7, 'xdbb', 'vxvxv', '2024-05-19', '00:58:00', 'no', '', '345345', '2024-05-13 17:29:03', 1),
(46, 5, 'qwe123', 'qwe', '2024-05-17', '12:04:00', 'no', '', '123', '2024-05-13 13:30:14', 1),
(42, 5, 'gfd', 'fds', '2024-05-14', '19:10:00', 'no', '', '33333333', '2024-05-13 12:58:04', 1),
(48, 5, 'sdfsdf', 'sdfsdf', '2024-05-16', '20:13:00', 'no', '', '213123', '2024-05-13 13:33:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `full_name`, `email`, `password`, `specialization`, `join_date`) VALUES
(1, 'K S P Fernando', 'sanath@gmail.com', '1111', 'All', '2024-03-30 01:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `full_name`, `email`, `password`, `date_of_birth`, `address`, `join_date`) VALUES
(1, 'Hiru Rajapaksha', 'hiru@gmail.com', 'hiru1111', '2014-03-19', 'Airport Road,', '0000-00-00 00:00:00'),
(4, 'Minura', 'minura@gmail.com', '123', '2024-03-28', 'Balangoda.', '2024-05-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `message`, `rating`, `created_at`) VALUES
(5, 'Denuwan', 'Good Serive', 5, '2024-04-01 03:47:33'),
(8, 'minura', 'Best Place !', 5, '2024-04-27 15:13:15'),
(9, 'senan', 'Sick', 5, '2024-05-02 03:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `allergies` text COLLATE utf8mb4_general_ci,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `date_of_birth`, `weight`, `gender`, `address`, `allergies`, `join_date`) VALUES
(5, 'Kottawa Gamage Gayan Sachintha', 'gayan.huslter@gmail.com', '$2y$10$t55Plo92fIdIbA/m6mc.sOGMQbxJBAXPbY0XYPrBtjoCgsbdyuwSW', '1945-03-05', '344.00', 'Female', 'Mihira,Harumalgoda west', 's@gmail.com', '2024-03-30 02:29:11'),
(6, 'FANTA', 'fanta.hustler@gmail.com', '$2y$10$Hiu75qAfo1RYiBpa15TiZeAo1odiIum0gRDeHklZ4hs.G3kj5DbRK', '2024-04-29', '34.00', 'Male', 'Mihira,Harumalgoda west', 'f@gmail.com', '2024-05-11 18:09:57'),
(7, 'zcvzxcv', 'udaya@gmail.com', '$2y$10$t55Plo92fIdIbA/m6mc.sOGMQbxJBAXPbY0XYPrBtjoCgsbdyuwSW', NULL, '4.00', 'Male', NULL, 'asd cl axkxjc ZJKLX cjk ', '2024-05-13 14:08:40'),
(8, 'FANTA', 'fantaa.hustler@gmail.com', '$2y$10$ZXUx.4IxTA1UVJsn.0TvtOg0V5z15smz9fSYbSJZVOT02Dteclbo2', '2024-05-14', '34.00', 'Male', 'Mihira,Harumalgoda west', 'hiru@gmail.com', '2024-05-13 20:29:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
