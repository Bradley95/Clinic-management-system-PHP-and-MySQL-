-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2019 at 03:44 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `app_no` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `speciality` varchar(55) NOT NULL,
  `medical_condition` text NOT NULL,
  PRIMARY KEY (`app_no`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_no`, `patient_id`, `speciality`, `medical_condition`) VALUES
(1, 1, 'Dermatologist', 'Skin irritations.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `speciality` varchar(55) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`email`, `password`, `fullname`, `speciality`) VALUES
('aubrey@gmail.com', 'admin', 'Aubrey Saili', 'Cardiologist');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

DROP TABLE IF EXISTS `patient_info`;
CREATE TABLE IF NOT EXISTS `patient_info` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `phone_no` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `fullname`, `age`, `weight`, `phone_no`, `address`) VALUES
(1, 'Bradley Saili', 23, 89, '0962232943', 'H4-37, Chamboli kitwe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `fullname`) VALUES
('bradleysaili@outlook.com', '94ecb203e6457d6c95e0c08b22b33e3a', 'Bradley Saili');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
