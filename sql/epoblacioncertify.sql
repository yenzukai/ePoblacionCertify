-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2023 at 10:30 PM
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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `message`) VALUES
(44, 'Gerald Pano', 'gepano12910@gmail.com', 'Why is my certificate request not submitting properly?'),
(43, 'Jayson Roxas', 'rapakista@gmail.com', 'There is something wrong with the certificate that I have obtained.'),
(42, 'Martin James Rojas', 'rinkashixd@gmail.com', 'Hello! I want to reach out to an administrator and I want to know if there is a problem with its services right now.'),
(41, 'Maricel P Rojas', 'rojasmaricelp2019@gmail.com', 'I think there is something going on with the certificate you\'ve released to me. There is a missing statement.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `rating` varchar(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `rating`, `comment`) VALUES
(1, '4', 'I love it!'),
(2, '4', 'The transaction is very smooth and simple!'),
(3, '5', 'I have a blast in my transaction. Thank you so much! '),
(4, '3', 'My experience is fairly good with the transaction.'),
(5, '5', 'I have very very satisfying experience with the transaction.'),
(6, '2', 'I didn\'t get much of the transaction process.');

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
  `support_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `certification_status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `date_requested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`requester_id`),
  UNIQUE KEY `reference_number` (`reference_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requester`
--

INSERT INTO `requester` (`requester_id`, `first_name`, `middle_name`, `last_name`, `house_no`, `street_name`, `barangay`, `municipality`, `province`, `zip_code`, `email`, `phone_number`, `certificate_type`, `business_name`, `business_number`, `pick_up_date`, `payment_method`, `reference_number`, `purpose`, `support_doc`, `certification_status`, `date_requested`) VALUES
('1701012445300-7873', 'Martin James', 'Pasabillo ', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'rinkashixd@gmail.com', '09664809996', 'Certificate of Residency', NULL, NULL, '2023-11-27', 'gcash', '0010978242980', 'I would like to request a certificate because it is for my job application.', 'uploads/656363dd57dda.docx', 'Pending', '2023-11-26 15:27:25'),
('1700711671084-9071', 'Jhon Mark', 'Pasabillo ', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'clumsydude34@gmail.com', '09188391001', 'Certificate of Residency', NULL, NULL, '2023-11-26', 'paymaya', '110299101045', 'It is a requirement for my university application.', 'uploads/655eccf72e8b9.jpg', 'Approved', '2023-11-23 03:54:31'),
('1700830601767-4936', 'Jhon David', 'Dadis', 'Plaza', '20', 'Relloso St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'jdavid1990@gmail.com', '09188291029', 'Certificate of Residency', NULL, NULL, '2023-11-27', 'gcash', '00129318489102', 'It is for educational assistance.', 'uploads/65609d89c1638.jpg', 'Processing', '2023-11-20 12:56:41'),
('1700378320172-9561', 'Jose', 'Protacio', 'Rizal', '20', 'Evangelista St.', 'Santa Rosa', 'Calamba', 'Laguna', '4029', 'pepe1861@gmail.com', '09293810298', 'Barangay Clearance', NULL, NULL, '2023-11-21', 'gcash', '0001928834171', 'It is to claim my death certificate and my pension.', 'uploads/6559b774abaf7.pdf', 'Pending', '2023-11-21 10:26:39'),
('1700898234280-8780', 'Maricel', 'Pasabillo ', 'Rojas', '108', 'Pedro Israel St.', 'San Vicente', 'Lagonoy', 'Camarines Sur', '4425', 'rinkashixd@gmail.com', '09506968439', 'Business Permit', 'Moises Telecommunication Services', '1216874', '2023-11-27', 'gcash', '0013010974620', 'It is for the renewal of my business permits.', 'uploads/6561a5c4c55b0.jpg', 'Approved', '2023-11-25 07:44:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
