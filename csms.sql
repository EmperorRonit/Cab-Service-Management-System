-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2022 at 10:41 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabtb`
--

INSERT INTO `cabtb` (`cab_id`, `rg_no`, `model_name`, `model_year`, `purchase_date`, `image`) VALUES
(1, 'MH12AQ2578', 'Swift Dezier', '2022', '2022-02-15', '131094-Screenshot (719).png'),
(2, 'MH12TR2575', 'Ertica', '2022', '2022-01-08', 'Screenshot (724).png');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customertb`
--

INSERT INTO `customertb` (`customer_id`, `name`, `email`, `phone_no`, `dob`, `date`) VALUES
(1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', '2001-03-11', '2022-02-21 14:30:54'),
(3, 'Ram shshtri', 'xyz@gmail.com', '9823698774', '2003-07-24', '2022-02-23 12:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `drivertb`
--

DROP TABLE IF EXISTS `drivertb`;
CREATE TABLE IF NOT EXISTS `drivertb` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Street_addr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Zip_code` varchar(20) NOT NULL,
  `Phone_no` varchar(20) NOT NULL,
  `Email_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Work_exp` int(11) NOT NULL,
  `Bank_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivertb`
--

INSERT INTO `drivertb` (`driver_id`, `Name`, `Street_addr`, `City`, `State`, `Zip_code`, `Phone_no`, `Email_id`, `Birth_date`, `Work_exp`, `Bank_name`, `Account_no`, `IFSC`, `Driving_licenses_no`, `Driving_licenses`, `Adhaar_no`, `Adhaar`, `Joining_date`, `Driver_image`, `Gender`, `Age`, `Education`, `Rge_date`) VALUES
(1, 'Ram Navnath Pawar', 'Flat no 420, Mahi Colony, Swarget', 'Pune', 'Maharastra', '411010', '8521478569', 'ram2014@gmail.com', '1998-06-26', 3, 'HDFC Bank', '456321785025415', 'HD0075', 'GF4521FG', '507225-Final End Assignment(Aniket Digge).pdf', '8965 5236 8547', '', '2022-02-11', 'Screenshot (723).png', 'Male', 24, 'HSC', '2022-02-11 16:56:20');

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
  PRIMARY KEY (`attendance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_attendancetb`
--

INSERT INTO `driver_attendancetb` (`attendance_id`, `driver_id`, `driver_name`, `source`, `destination`, `trip_date`, `duration`) VALUES
(6, 1, 'Ram Navnath Pawar', 'Pune', 'Mumbai', '2022-02-25', 16),
(5, 4, 'Ram Navnath dfgsg', 'Pune', 'Mumbai', '2022-02-16', 24);

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
  PRIMARY KEY (`driver_pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_payment`
--

INSERT INTO `driver_payment` (`driver_pay_id`, `driver_id`, `driver_name`, `trip_desc`, `pay_per_hr`, `duration`, `gross`, `pf`, `net`, `payment_method`, `date_of_slip`) VALUES
(1, 1, 'Ram Navnath Pawar', '', '100.00', 80, '8000.00', '160.00', '7840.00', 'NEFT', '2022-02-19 13:28:52'),
(2, 1, 'Ram Navnath Pawar', 'Pune to mumbai', '100.00', 80, '8000.00', '160.00', '7840.00', '', '2022-02-19 13:31:40'),
(3, 1, 'Ram Navnath Pawar', '', '100.00', 80, '8000.00', '160.00', '7840.00', 'Cash', '2022-02-19 13:32:02'),
(4, 1, 'Ram Navnath Pawar', 'Pune to mumbai', '100.00', 80, '8000.00', '160.00', '7840.00', 'Online', '2022-02-19 13:32:09');

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
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employeetb`
--

INSERT INTO `employeetb` (`employee_id`, `name`, `phone`, `email`, `dob`, `work_exp`, `photo`, `address`, `city`, `state`, `zip_code`, `education`, `percentage`, `designation`, `bank_name`, `ac_no`, `ifsc`, `adhaar_no`, `adhaar`, `pan_no`, `pan`, `resume`, `joining_date`, `rg_date`, `gender`, `age`) VALUES
(1, 'Aniket Pandurang Digge', '8390299832', 'kccaniketd2016@gmail.com', '2001-03-11', 0, '', 'House no 42A, Line no 48, Janata Vasahat, Parvati Gao', 'Satara', 'Maharastra', '411009', 'BCA', '78.25', 'Data entry operator', 'Bank of Maharastra', '052145875654235', 'BKI0075', '9545 8547 8547', '', 'MWPD7545D85', '', '934215-', '2022-02-17', '2022-02-11 17:15:11', 'Male', 20);

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
  PRIMARY KEY (`attendance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_attendancetb`
--

INSERT INTO `employee_attendancetb` (`attendance_id`, `employeeid`, `employee_name`, `designation`, `attendance`, `date`) VALUES
(4, 1, 'Aniket Pandurang Digge', 'Data entry operator', 'Present', '2022-02-15 16:14:06'),
(3, 1, 'Aniket Pandurang Digge', 'Data entry operator', 'Present', '2022-02-15 15:45:18');

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
  PRIMARY KEY (`emp_payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`emp_payment_id`, `employee_id`, `employee_name`, `designation`, `salary_per_day`, `present_days`, `gross`, `tds`, `pf`, `net`, `pyment_method`, `date_of_slip`) VALUES
(1, 1, 'Aniket Pandurang Digge', 'Data entry operator', 1000, 30, '30000.00', '1500.00', '600.00', '27900.00', 'NEFT', '2022-02-18 19:40:58');

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
  PRIMARY KEY (`eq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquirytb`
--

INSERT INTO `enquirytb` (`eq_id`, `customer_id`, `customer_name`, `email`, `phone_no`, `enquiry`, `status`, `date`) VALUES
(1, 1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Did you proivde buses', 'Cleared', '2022-02-25 12:08:13'),
(2, 1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'abc dkslkfasdfksdkfsldfkk kkdkkd', 'Unclear', '2022-02-25 12:42:47');

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
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacktb`
--

INSERT INTO `feedbacktb` (`feedback_id`, `customer_id`, `customer_name`, `email`, `phone_no`, `review`, `comment`, `date`) VALUES
(1, 1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Very Good', 'very good service but reuired more ', '2022-02-24 16:18:05'),
(2, 1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Normal', 'Good services', '2022-02-24 16:18:56'),
(3, 1, 'Aniket Pandurang Digge', 'aniket@gmail.com', '8390299832', 'Poor', 'Bad experiance', '2022-02-24 17:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

DROP TABLE IF EXISTS `logintb`;
CREATE TABLE IF NOT EXISTS `logintb` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` varchar(20) NOT NULL DEFAULT 'Customer',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`UserID`, `UserName`, `Password`, `UserType`) VALUES
(1, 'Aniket', 'aniket1131', 'Admin'),
(4, 'aniket@gmail.com', '1131', 'Customer'),
(10, 'Ronit', '1131', 'Employee');

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
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `normal_bookingtb`
--

INSERT INTO `normal_bookingtb` (`booking_id`, `customer_id`, `name`, `no_of_persons`, `phone_no`, `email`, `pickup_point`, `drop_point`, `cab_type`, `trip_date`, `date`, `status`, `payment_st`, `drviver_id`, `driver_name`, `driver_ph_no`, `vehical_no`) VALUES
(1, 1, 'Aniket Pandurang Digge', 2, '8390299832', 'aniket@gmail.com', 'swarget', 'Ktraj', 'Sadan', '2022-02-25', '2022-02-23 14:01:20', 'Booked', 'After Trip', 1, 'Ram Navnath Pawar', '8521478569', 'MH12TR2575'),
(2, 1, 'Aniket Pandurang Digge', 3, '8390299832', 'aniket@gmail.com', 'Swarget', 'Katraj', 'Sadan', '2022-02-25', '2022-02-23 14:06:08', 'Unbooked', 'Unpaid', NULL, NULL, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packagetb`
--

INSERT INTO `packagetb` (`package_id`, `package_dec`, `cab_type`, `capacity`, `package_price`, `date`) VALUES
(1, 'Pune to mumbai', 'hatchabck', 4, '5000.00', '2022-02-17 14:43:20');

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
  PRIMARY KEY (`pkg_b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_bookingtb`
--

INSERT INTO `package_bookingtb` (`pkg_b_id`, `package_id`, `package_desc`, `cab_type`, `capacity`, `package_price`, `customer_id`, `name`, `no_of_persons`, `phone_no`, `email`, `pickup_point`, `drop_point`, `trip_date`, `date`, `status`, `drviver_id`, `driver_name`, `driver_ph_no`, `vehical_no`, `payment_st`) VALUES
(2, 1, 'Pune to mumbai', 'hatchabck', 4, '5000.00', 1, 'Aniket Pandurang Digge', 3, '8390299832', 'aniket@gmail.com', 'Swarget', 'Shivaji Chowl', '2022-02-24', '2022-02-22 16:24:22', 'Booked', 2, 'Ram Navnath', '8521478569', 'MH12AQ2578', ''),
(3, 1, 'Pune to mumbai', 'hatchabck', 4, '5000.00', 1, 'Aniket Pandurang Digge', 2, '8390299832', 'aniket@gmail.com', 'Swarget', 'Dadar', '2022-02-25', '2022-02-22 17:13:21', 'Booked', 2, 'Ram Navnath', '8521478569', 'MH12AQ2578', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
