-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 09:05 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `enrollment_no` bigint(15) NOT NULL,
  `name` varchar(17) DEFAULT NULL,
  `py_int` varchar(4) DEFAULT NULL,
  `py_cec` varchar(4) DEFAULT NULL,
  `py_ext` varchar(4) DEFAULT NULL,
  `py_total` int(2) DEFAULT NULL,
  `cc_int` varchar(4) DEFAULT NULL,
  `cc_cec` varchar(4) DEFAULT NULL,
  `cc_ext` varchar(4) DEFAULT NULL,
  `cc_total` int(2) DEFAULT NULL,
  `grand_total` int(3) DEFAULT NULL,
  `percentage` decimal(3,1) DEFAULT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`enrollment_no`, `name`, `py_int`, `py_cec`, `py_ext`, `py_total`, `cc_int`, `cc_cec`, `cc_ext`, `cc_total`, `grand_total`, `percentage`, `result`) VALUES
(201900819010001, 'Rohan Paryani', '19', '29', '49', 97, '19', '28', '49', 96, 193, '96.5', 'pass'),
(201900819010002, 'Ankit Adeshra ', '15', '28', '40', 83, '15', '30', '40', 75, 158, '79.0', 'pass'),
(201900819010003, 'Prakash Parmar', '18', '21', '41', 80, '18', '21', '41', 80, 160, '80.0', 'pass'),
(201900819010004, 'Dipesh Mali ', '2', '2', '4', 8, '20', '22', '42', 84, 92, '46.0', 'fail'),
(201900819010005, 'Anjana Arora ', '12', '26', '45', 83, '12', '26', '45', 83, 166, '83.0', 'pass'),
(201900819010006, 'Divyesh Vyas', '16', '27', '46', 89, '16', '27', '46', 89, 178, '89.0', 'pass'),
(201900819010007, 'Vyom Bhavsar', '17', '26', '47', 90, '17', '26', '47', 90, 180, '90.0', 'pass'),
(201900819010008, 'Kavya Joshi ', '18', '25', '46', 89, '7', '2', '11', 20, 109, '54.5', 'fail'),
(201900819010009, 'Kashish Vyas ', '14', '24', '47', 85, '14', '24', '47', 85, 170, '85.0', 'pass'),
(201900819010010, 'Omkar Sharma ', '19', '23', '48', 90, '19', '23', '48', 90, 180, '90.0', 'pass'),
(201900819010011, 'Aniket Bodana ', '20', '23', '34', 77, '20', '23', '34', 77, 154, '77.0', 'pass'),
(201900819010012, 'Mandana Bhimjiyan', '17', '25', '46', 88, '17', '25', '46', 88, 176, '88.0', 'pass'),
(201900819010013, 'Abhishek Jain ', '15', '27', '47', 89, '15', '27', '47', 89, 178, '89.0', 'pass'),
(201900819010014, 'Reema Sen', '17', '28', '33', 78, '17', '28', '33', 78, 156, '78.0', 'pass'),
(201900819010015, 'Kaushal Dabgar', '5', '0', '10', 15, '14', '26', '32', 72, 87, '43.5', 'fail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD UNIQUE KEY `enrollment_no` (`enrollment_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
