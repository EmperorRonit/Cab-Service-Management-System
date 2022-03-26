-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2022 at 03:41 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabtb`
--

DROP TABLE IF EXISTS `cabtb`;
CREATE TABLE IF NOT EXISTS `cabtb` (
  `cab_id` int(11) NOT NULL AUTO_INCREMENT,
  `rg_no` varchar(20) NOT NULL,
  `model_name` varchar(20) NOT NULL,
  `model_year` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cab_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabtb`
--

INSERT INTO `cabtb` (`cab_id`, `rg_no`, `model_name`, `model_year`, `purchase_date`, `image`) VALUES
(1, 'MH12TR2577', 'Swift', '2015', '2015-03-11', 'Swift.jpg'),
(2, 'MH12AQ2256', 'Swift Dzire', '2019', '2019-04-18', 'Swift_Dzire.jpg'),
(3, 'MH12AQ2578', 'Ertiga', '2020', '2020-08-09', 'Ertiga.jfif'),
(4, 'MH12TR2575', 'MPV Mini Van', '2016', '2016-06-17', 'MPV_minivan.jpg'),
(5, 'MH12TR2584', 'Omini Van', '2011', '2011-04-13', 'Omini_Van.jfif'),
(6, 'MH12AQ2585', 'Mercedes Coupe', '2020', '2020-04-16', 'Mercides_Coupe.jfif'),
(7, 'MH12FM8564', 'Rolls Royce', '2021', '2021-01-14', 'Rollsroyels_luxary.jfif'),
(8, 'MH12PG8564', 'TATA Electric Car', '2021', '2021-08-05', 'TATA Electric Car.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `customertb`
--

DROP TABLE IF EXISTS `customertb`;
CREATE TABLE IF NOT EXISTS `customertb` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customertb`
--

INSERT INTO `customertb` (`customer_id`, `name`, `email`, `phone_no`, `dob`, `date`) VALUES
(2, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', '2001-03-11', '2022-03-22 18:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `drivertb`
--

DROP TABLE IF EXISTS `drivertb`;
CREATE TABLE IF NOT EXISTS `drivertb` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Street_addr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Zip_code` varchar(20) NOT NULL,
  `Phone_no` varchar(20) NOT NULL,
  `Email_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Work_exp` int(11) NOT NULL,
  `Bank_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Account_no` varchar(20) NOT NULL,
  `IFSC` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Driving_licenses_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Driving_licenses` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adhaar_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Adhaar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Joining_date` date NOT NULL,
  `Driver_image` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Age` int(11) NOT NULL,
  `Education` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Rge_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivertb`
--

INSERT INTO `drivertb` (`driver_id`, `Name`, `Street_addr`, `City`, `State`, `Zip_code`, `Phone_no`, `Email_id`, `Birth_date`, `Work_exp`, `Bank_name`, `Account_no`, `IFSC`, `Driving_licenses_no`, `Driving_licenses`, `Adhaar_no`, `Adhaar`, `Joining_date`, `Driver_image`, `Gender`, `Age`, `Education`, `Rge_date`) VALUES
(1, 'Jay Ravinath Shastri', 'Flat no 51, Om Colony, Swarget', 'Pune', 'Maharashtra', '411009', '9875236412', 'jay12@gmail.com', '1995-05-17', 2, 'Bank of India', '051175236547854', 'BKI0075', 'MH12 19850034761', 'LicensePDF.pdf', '8965 5236 7458', 'AdhaarPDF.pdf', '2022-03-14', 'driverImage.png', 'Male', 27, 'BCom', '2022-03-22 17:20:11'),
(2, 'Ram Anant Jadhav', 'House no 41, Janak Soc. Katraj', 'Pune', 'Maharastra', '411023', '8521478569', 'ram85@gmail.com', '1992-07-16', 0, 'Bank of Baroda', '456321785025415', 'HD0075', 'MH12 19850034578', 'LicensePDF.pdf', '7458 5236 8547', 'AdhaarPDF.pdf', '2022-03-08', 'driverImage.png', 'Male', 30, 'HSC', '2022-03-22 17:25:14'),
(3, 'Raj Laxman Deshmukha', 'Flat no 21, Jain Soc. Dhayri', 'Pune', 'Maharashtra', '411041', '7456214589', 'raj74@gmail.com', '1996-07-19', 5, 'HDFC Bank', '456321455025415', 'HD0078', 'MH12 19857434761', 'LicensePDF.pdf', '9565 5236 7458', 'AdhaarPDF.pdf', '2021-11-03', 'driverImage.png', 'Male', 26, 'SSC', '2022-03-22 17:31:52'),
(4, 'Sham Ramnath Bhosale', 'House no. 12, Ram Soc., Narhe', 'Pune', 'Maharashtra', '411041', '8523698745', 'sham85@gmail.com', '1990-07-21', 0, 'AXIS Bank', '056321785025415', 'AX7512', 'MH12 19850034578', 'LicensePDF.pdf', '9565 5236 7458', 'AdhaarPDF.pdf', '2020-07-09', 'driverImage.png', 'Male', 32, 'SSC', '2022-03-22 17:36:30'),
(5, 'Tukaram Uddhav Chavan', 'House no 21., Anjali Soc., Katraj', 'Pune', 'Maharashtra', '411025', '7528496385', 'tukaram75@gmail.com', '1982-06-10', 5, 'ICICI Bank', '051175236548514', 'ICIC4521', 'MH12 19850044578', 'LicensePDF.pdf', '9565 8536 7458', 'AdhaarPDF.pdf', '2022-03-10', '', 'Male', 30, '9th', '2022-03-22 17:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `driver_attendancetb`
--

DROP TABLE IF EXISTS `driver_attendancetb`;
CREATE TABLE IF NOT EXISTS `driver_attendancetb` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trip_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `driver_id` (`driver_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_attendancetb`
--

INSERT INTO `driver_attendancetb` (`attendance_id`, `driver_id`, `driver_name`, `source`, `destination`, `trip_date`, `duration`) VALUES
(1, 1, 'Jay Ravinath Shastri', 'Pune', 'Mumbai', '2022-03-24', 6),
(2, 2, 'Ram Anant Jadhav', 'Pune', 'Goa', '2022-03-25', 20),
(3, 3, 'Raj Laxman Deshmukha', 'Pune', 'Solapur', '2022-03-24', 13),
(4, 4, 'Sham Ramnath Bhosale', 'Pune', 'Satara', '2022-03-25', 15),
(5, 5, 'Tukaram Uddhav Chavan', 'Pune', 'Satara', '2022-03-27', 14);

-- --------------------------------------------------------

--
-- Table structure for table `driver_payment`
--

DROP TABLE IF EXISTS `driver_payment`;
CREATE TABLE IF NOT EXISTS `driver_payment` (
  `driver_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trip_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay_per_hr` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `gross` decimal(10,2) NOT NULL,
  `pf` decimal(10,2) NOT NULL,
  `net` decimal(10,2) NOT NULL,
  `payment_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_slip` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`driver_pay_id`),
  KEY `driver_id` (`driver_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_payment`
--

INSERT INTO `driver_payment` (`driver_pay_id`, `driver_id`, `driver_name`, `trip_desc`, `pay_per_hr`, `duration`, `gross`, `pf`, `net`, `payment_method`, `date_of_slip`) VALUES
(1, 1, 'Jay Ravinath Shastri', 'Pune to mumbai', '100.00', 120, '12000.00', '240.00', '11760.00', 'Cheque', '2022-03-22 19:04:16'),
(2, 2, 'Ram Anant Jadhav', 'Pune to mumbai', '150.00', 240, '36000.00', '720.00', '35280.00', 'Cash', '2022-03-22 20:12:11'),
(3, 3, 'Raj Laxman Deshmukha', 'Pune to mumbai', '100.00', 360, '36000.00', '720.00', '35280.00', 'Cash', '2022-03-22 20:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `employeetb`
--

DROP TABLE IF EXISTS `employeetb`;
CREATE TABLE IF NOT EXISTS `employeetb` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `work_exp` int(11) NOT NULL,
  `photo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ac_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adhaar_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adhaar` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pan_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `resume` varchar(50) CHARACTER SET latin1 NOT NULL,
  `joining_date` date NOT NULL,
  `rg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employeetb`
--

INSERT INTO `employeetb` (`employee_id`, `name`, `phone`, `email`, `dob`, `work_exp`, `photo`, `address`, `city`, `state`, `zip_code`, `education`, `percentage`, `designation`, `bank_name`, `ac_no`, `ifsc`, `adhaar_no`, `adhaar`, `pan_no`, `pan`, `resume`, `joining_date`, `rg_date`, `gender`, `age`) VALUES
(1, 'Aatish Suresh Ichale', '8390298554', 'aatish83@gmail.com', '1999-04-04', 1, 'driverImage.png', 'House 42, Ravi Soc., Parvati Gao', 'Pune', 'Maharashtra', '411009', 'Bcom', '70.25', 'Booking admin', 'Bank of India', '052145875654235', 'BKI0075', '9545 8547 7236', 'AdhaarPDF.pdf', 'MWPDD7545D', 'panPDF.pdf', 'resume.pdf', '2021-08-05', '2022-03-22 17:56:06', 'Male', 23),
(2, 'Nikhil Javant Jambhale', '8541236974', 'nikhil85@gmail.com', '1997-07-17', 3, 'driverImage.png', 'Flat no 101, Naam Soc., Shivaji Nagar', 'Pune ', 'Maharashtra', '411023', 'BA', '72.21', 'Call Handler', 'Bank of Maharastra', '052145875654235', 'BOM5478', '9535 8547 8547', 'AdhaarPDF.pdf', 'MGPDS7845D', 'panPDF.pdf', 'resume.pdf', '2021-02-10', '2022-03-22 18:00:14', 'Male', 25),
(3, 'Avdut Ram Jagtap', '8390299832', 'avdut83@gmail.com', '2001-03-11', 1, 'driverImage.png', 'House no 42A, JM Soc., Parvati Gao', 'Pune', 'Maharastra', '411009', 'BCA', '5.2', 'IT Consultant', 'HDFC Bank', '112145875654235', 'HDF8563', '8545 8547 8547', 'AdhaarPDF.pdf', 'MVPDQ7545D', 'panPDF.pdf', 'resume.pdf', '2021-11-24', '2022-03-22 18:03:31', 'Male', 21),
(4, 'Neha Ajit Jadhav', '8412365784', 'neha84@gmail.com', '2002-04-10', 0, 'driverImage.png', 'Flat no 102, Swami Soc., Bibewadi', 'Pune', 'Maharastra', '411053', 'Bcom', '69.23', 'Receptionist', 'AXIS Bank', '112855875654235', 'AXI5214', '8845 8547 7236', 'AdhaarPDF.pdf', 'FMWPD7545D', 'panPDF.pdf', 'resume.pdf', '2020-12-17', '2022-03-22 18:16:09', 'Female', 20),
(5, 'Ravina Namdev Landge', '7453214524', 'ravina74@gmail.com', '1998-07-16', 1, 'driverImage.png', 'House no 85, ND colony, Swarget', 'Pune ', 'Maharastra', '411009', 'MCom', '78.25', 'Booking Admin', 'Bank Of Baroda', '112145875654235', 'BOB5874', '8545 8857 8547', 'AdhaarPDF.pdf', 'NHWPD7545D', 'panPDF.pdf', 'resume.pdf', '2021-03-10', '2022-03-22 18:19:56', 'Female', 24);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendancetb`
--

DROP TABLE IF EXISTS `employee_attendancetb`;
CREATE TABLE IF NOT EXISTS `employee_attendancetb` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `employeeid` int(11) NOT NULL,
  `employee_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`attendance_id`),
  KEY `employeeid` (`employeeid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_attendancetb`
--

INSERT INTO `employee_attendancetb` (`attendance_id`, `employeeid`, `employee_name`, `designation`, `attendance`, `date`) VALUES
(1, 5, 'Ravina Namdev Landge', 'Booking Admin', 'Present', '2022-03-22 20:07:51'),
(2, 1, 'Aatish Suresh Ichale', 'Booking admin', 'Present', '2022-03-22 20:08:20'),
(3, 2, 'Nikhil Javant Jambhale', 'Call Handler', 'Present', '2022-03-22 20:08:38'),
(4, 3, 'Avdut Ram Jagtap', 'IT Consultant', 'Present', '2022-03-22 20:08:45'),
(5, 4, 'Neha Ajit Jadhav', 'Receptionist', 'Present', '2022-03-22 20:08:51'),
(6, 5, 'Ravina Namdev Landge', 'Booking Admin', 'Absent', '2022-03-22 20:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

DROP TABLE IF EXISTS `employee_payment`;
CREATE TABLE IF NOT EXISTS `employee_payment` (
  `emp_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salary_per_day` int(11) NOT NULL,
  `present_days` int(11) NOT NULL,
  `gross` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `pf` decimal(10,2) NOT NULL,
  `net` decimal(10,2) NOT NULL,
  `pyment_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_slip` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_payment_id`),
  KEY `employee_id` (`employee_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`emp_payment_id`, `employee_id`, `employee_name`, `designation`, `salary_per_day`, `present_days`, `gross`, `tds`, `pf`, `net`, `pyment_method`, `date_of_slip`) VALUES
(1, 3, 'Avdut Ram Jagtap', 'IT Consultant', 500, 20, '10000.00', '500.00', '200.00', '9300.00', 'NEFT', '2022-03-22 20:12:48'),
(2, 1, 'Aatish Suresh Ichale', 'Booking admin', 500, 26, '13000.00', '650.00', '260.00', '12090.00', 'Cash', '2022-03-22 20:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `enquirytb`
--

DROP TABLE IF EXISTS `enquirytb`;
CREATE TABLE IF NOT EXISTS `enquirytb` (
  `eq_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `enquiry` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unclear',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eq_id`),
  KEY `customer_id` (`customer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquirytb`
--

INSERT INTO `enquirytb` (`eq_id`, `customer_id`, `customer_name`, `email`, `phone_no`, `enquiry`, `status`, `date`) VALUES
(1, 2, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Did you provide buses', 'Unclear', '2022-03-22 19:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktb`
--

DROP TABLE IF EXISTS `feedbacktb`;
CREATE TABLE IF NOT EXISTS `feedbacktb` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `customer_id` (`customer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacktb`
--

INSERT INTO `feedbacktb` (`feedback_id`, `customer_id`, `customer_name`, `email`, `phone_no`, `review`, `comment`, `date`) VALUES
(1, 2, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Good', 'Good service', '2022-03-22 19:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

DROP TABLE IF EXISTS `logintb`;
CREATE TABLE IF NOT EXISTS `logintb` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` varchar(20) NOT NULL DEFAULT 'Customer',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`UserID`, `UserName`, `Password`, `UserType`) VALUES
(1, 'digge@gmail.com', 'aniket1131', 'Admin'),
(2, 'aniket@gmail.com', '1131', 'Customer'),
(3, 'ronit@gmail.com', '1131', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `normal_bookingtb`
--

DROP TABLE IF EXISTS `normal_bookingtb`;
CREATE TABLE IF NOT EXISTS `normal_bookingtb` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_persons` int(11) NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pickup_point` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `drop_point` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cab_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trip_date` date NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unbooked',
  `payment_st` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `drviver_id` int(11) DEFAULT NULL,
  `driver_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_ph_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehical_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `drviver_id` (`drviver_id`),
  KEY `customer_id` (`customer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `normal_bookingtb`
--

INSERT INTO `normal_bookingtb` (`booking_id`, `customer_id`, `name`, `no_of_persons`, `phone_no`, `email`, `pickup_point`, `drop_point`, `cab_type`, `trip_date`, `date`, `status`, `payment_st`, `drviver_id`, `driver_name`, `driver_ph_no`, `vehical_no`) VALUES
(1, 2, 'Aniket Pandurang Digge', 3, '8390299832', 'aniket@gmail.com', 'Sinhagad Road, Pune', 'Dadar, Mumbai', 'Sadan', '2022-03-24', '2022-03-22 18:59:55', 'Unbooked', 'Unpaid', NULL, NULL, NULL, NULL),
(9, 2, 'Aniket Pandurang Digge', 3, '8390299832', 'aniket@gmail.com', 'Sinhagad Road, Pune', 'Shivaji Chowk, Solapur', 'Hactback', '2022-03-25', '2022-03-22 19:50:59', 'Unbooked', 'Unpaid', NULL, NULL, NULL, NULL),
(10, 2, 'Aniket Pandurang Digge', 5, '8390299832', 'aniket@gmail.com', 'Sinhagad Road, Pune', 'Panji, Goa', 'Mini Van', '2022-03-27', '2022-03-22 19:51:49', 'Unbooked', 'Unpaid', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packagetb`
--

DROP TABLE IF EXISTS `packagetb`;
CREATE TABLE IF NOT EXISTS `packagetb` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_dec` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cab_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packagetb`
--

INSERT INTO `packagetb` (`package_id`, `package_dec`, `cab_type`, `capacity`, `package_price`, `date`) VALUES
(1, 'Pune to Mumbai', 'Sadan', 3, '5000.00', '2022-03-22 18:23:00'),
(2, 'Pune to Solapur', 'Hatchback', 3, '4500.00', '2022-03-22 18:23:31'),
(3, 'Pune Tour', 'Mini Van', 6, '7500.00', '2022-03-22 18:25:07'),
(4, 'Mumbai Tour ', 'Van', 5, '7000.00', '2022-03-22 18:25:35'),
(5, 'Maharastra Tour', 'SUV', 6, '20000.00', '2022-03-22 18:26:29'),
(6, 'Pune to Goa', 'Mini Van', 7, '8000.00', '2022-03-22 18:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `package_bookingtb`
--

DROP TABLE IF EXISTS `package_bookingtb`;
CREATE TABLE IF NOT EXISTS `package_bookingtb` (
  `pkg_b_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `package_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cab_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_persons` int(11) NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pickup_point` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `drop_point` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trip_date` date NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unbooked',
  `drviver_id` int(11) DEFAULT NULL,
  `driver_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_ph_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehical_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_st` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  PRIMARY KEY (`pkg_b_id`),
  KEY `customer_id` (`customer_id`) USING BTREE,
  KEY `drviver_id` (`drviver_id`) USING BTREE,
  KEY `package_id` (`package_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_bookingtb`
--

INSERT INTO `package_bookingtb` (`pkg_b_id`, `package_id`, `package_desc`, `cab_type`, `capacity`, `package_price`, `customer_id`, `name`, `no_of_persons`, `phone_no`, `email`, `pickup_point`, `drop_point`, `trip_date`, `date`, `status`, `drviver_id`, `driver_name`, `driver_ph_no`, `vehical_no`, `payment_st`) VALUES
(1, 3, 'Pune Tour', 'Mini Van', 6, '7500.00', 2, 'Aniket Pandurang Digge', 5, '8390299832', 'aniket@gmail.com', 'sinhagad road', 'sinhagad road', '2022-03-24', '2022-03-22 19:00:53', 'Unbooked', NULL, NULL, NULL, NULL, 'Unpaid'),
(3, 2, 'Pune to Solapur', 'Hatchback', 3, '4500.00', 2, 'Aniket Pandurang Digge', 3, '8390299832', 'aniket@gmail.com', 'Sinhagad Road', 'Shivaji Chowk', '2022-03-26', '2022-03-22 20:02:16', 'Unbooked', NULL, NULL, NULL, NULL, 'Unpaid'),
(4, 3, 'Pune Tour', 'Mini Van', 6, '7500.00', 2, 'Aniket Pandurang Digge', 6, '8390299832', 'aniket@gmail.com', 'Sinhagad Road', 'Sinhagad Road', '2022-03-26', '2022-03-22 20:04:16', 'Unbooked', NULL, NULL, NULL, NULL, 'Unpaid'),
(5, 4, 'Mumbai Tour ', 'Van', 5, '7000.00', 2, 'Aniket Pandurang Digge', 5, '8390299832', 'aniket@gmail.com', 'Swarget', 'Swarget', '2022-04-12', '2022-03-22 20:04:57', 'Unbooked', NULL, NULL, NULL, NULL, 'Unpaid');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver_attendancetb`
--
ALTER TABLE `driver_attendancetb`
  ADD CONSTRAINT `driver_id_da_fk` FOREIGN KEY (`driver_id`) REFERENCES `drivertb` (`driver_id`);

--
-- Constraints for table `driver_payment`
--
ALTER TABLE `driver_payment`
  ADD CONSTRAINT `driver_id_fk` FOREIGN KEY (`driver_id`) REFERENCES `drivertb` (`driver_id`);

--
-- Constraints for table `employee_attendancetb`
--
ALTER TABLE `employee_attendancetb`
  ADD CONSTRAINT `employeeid_ea_fk` FOREIGN KEY (`employeeid`) REFERENCES `employeetb` (`employee_id`);

--
-- Constraints for table `employee_payment`
--
ALTER TABLE `employee_payment`
  ADD CONSTRAINT `employee_id_ep_fk` FOREIGN KEY (`employee_id`) REFERENCES `employeetb` (`employee_id`);

--
-- Constraints for table `enquirytb`
--
ALTER TABLE `enquirytb`
  ADD CONSTRAINT `customerid_enquiry_fk` FOREIGN KEY (`customer_id`) REFERENCES `customertb` (`customer_id`);

--
-- Constraints for table `feedbacktb`
--
ALTER TABLE `feedbacktb`
  ADD CONSTRAINT `customerid_feedback_fk` FOREIGN KEY (`customer_id`) REFERENCES `customertb` (`customer_id`);

--
-- Constraints for table `normal_bookingtb`
--
ALTER TABLE `normal_bookingtb`
  ADD CONSTRAINT `customerid_normalbooking_fk` FOREIGN KEY (`customer_id`) REFERENCES `customertb` (`customer_id`),
  ADD CONSTRAINT `driverid_normalbook_fk` FOREIGN KEY (`drviver_id`) REFERENCES `drivertb` (`driver_id`);

--
-- Constraints for table `package_bookingtb`
--
ALTER TABLE `package_bookingtb`
  ADD CONSTRAINT `customerid_packbooking_fk` FOREIGN KEY (`customer_id`) REFERENCES `customertb` (`customer_id`),
  ADD CONSTRAINT `driverid_packbook_fk` FOREIGN KEY (`drviver_id`) REFERENCES `drivertb` (`driver_id`),
  ADD CONSTRAINT `packageid_packbooking_fk` FOREIGN KEY (`package_id`) REFERENCES `packagetb` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
