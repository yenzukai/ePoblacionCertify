-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2023 at 07:03 PM
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
-- Database: `epoblacioncertify`
--

-- --------------------------------------------------------

--
-- Table structure for table `requester`
--

DROP TABLE IF EXISTS `requester`;
CREATE TABLE IF NOT EXISTS `requester` (
  `requester_id` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `house_no` varchar(25) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `certificate_type` varchar(25) NOT NULL,
  `business_name` varchar(50) DEFAULT NULL,
  `business_number` varchar(50) DEFAULT NULL,
  `pick_up_date` varchar(25) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `reference_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `support_doc` blob,
  PRIMARY KEY (`requester_id`),
  UNIQUE KEY `reference_number` (`reference_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requester`
--

INSERT INTO `requester` (`requester_id`, `first_name`, `middle_name`, `last_name`, `house_no`, `street_name`, `barangay`, `municipality`, `province`, `zip_code`, `email`, `phone_number`, `certificate_type`, `business_name`, `business_number`, `pick_up_date`, `payment_method`, `reference_number`, `purpose`, `support_doc`) VALUES
('1700047217236-7330', 'Martin James', 'Pasabillo ', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'rinkashixd@gmail.com', '09664809996', 'Barangay Clearance', NULL, NULL, '2023-11-20', 'gcash', '0013249058749', 'It\'s a requirement in order to apply for a job in my desire company.', 0x524541442620575249544520284170706c69636174696f6e204c6574746572292e646f6378),
('1700051936215-5199', 'Cherielyn', 'Pastrana', 'Encinas', '290', 'Sta. Cruz', 'Tibgao', 'Canaman', 'Camarines Sur', '4402', 'yen.encinas@yahoo.com', '09279774505', 'Barangay Clearance', NULL, NULL, '2023-11-17', 'gcash', '0010978242981', 'It is for educational assistance', 0x4c45545445522d4f462d434f4e53454e542d415050454e4449582d412e646f6378),
('1700052401984-6394', 'Jhon Mark', 'Pasabillo ', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'clumsydude34@gmail.com', '09188391001', 'Barangay Clearance', NULL, NULL, '2023-11-17', 'paymaya', '110299101045', 'It is for my job application', 0x524541442620575249544520284170706c69636174696f6e204c6574746572292e646f6378),
('1700052757184-9550', 'Jhon David', 'Villaflores', 'Plaza', '103', 'Relloso St.', 'San Francisco', 'Lagonoy', 'Camarines Sur', '4425', 'jdavid1990@gmail.com', '09188291029', 'Certificate of Residency', NULL, NULL, '2023-11-19', 'gcash', '00129318489102', 'It is for educational assistance', 0x52454144265752495445202850726f6a6563742050726f706f73616c292e646f6378),
('1700053982665-2658', 'Maricel', 'Pasabillo', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'rojasmaricel10@gmail.com', '09506968439', 'Business Permit', 'Moises Telecommunication Services', '1216874', '2023-11-18', 'gcash', '0013010974620', 'For the renewal of business permits', 0x4454495f466f726d732e6a7067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
