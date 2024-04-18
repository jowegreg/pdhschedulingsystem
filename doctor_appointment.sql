-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 07:54 AM
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
-- Database: `doctor_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email_address` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_address` mediumtext NOT NULL,
  `hospital_contact_no` varchar(30) NOT NULL,
  `hospital_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email_address`, `admin_password`, `admin_name`, `hospital_name`, `hospital_address`, `hospital_contact_no`, `hospital_logo`) VALUES
(1, 'pdhopdadmin@gmail.com', 'pdhadmin', 'PDH Admin', 'Pinamalayan Doctors&amp;amp;amp;amp;amp;amp;amp;amp;amp;#039; Hospital', 'Francisco St., Marfrancisco, Pinamalayan', '0917-3247424', '../images/403452208.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_schedule_id` int(11) NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `reason_for_appointment` mediumtext NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(30) NOT NULL,
  `patient_come_into_hospital` enum('No','Yes') NOT NULL,
  `doctor_comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`appointment_id`, `doctor_id`, `patient_id`, `doctor_schedule_id`, `appointment_number`, `reason_for_appointment`, `appointment_time`, `status`, `patient_come_into_hospital`, `doctor_comment`) VALUES
(3, 1, 3, 2, 1000, 'Pain in Stomach', '09:00:00', 'Cancel', 'No', ''),
(4, 1, 3, 2, 1001, 'Paint in stomach', '09:00:00', 'Booked', 'No', ''),
(5, 1, 4, 2, 1002, 'For Delivery', '09:30:00', 'Completed', 'Yes', 'She gave birth to boy baby.'),
(6, 5, 3, 7, 1003, 'Fever and cold.', '18:00:00', 'In Process', 'Yes', ''),
(7, 6, 5, 13, 1004, 'Pain in Stomach.', '15:30:00', 'Completed', 'Yes', 'Acidity Problem. '),
(8, 7, 6, 15, 1005, 'Headache', '09:00:00', 'Cancel', 'Yes', ''),
(9, 8, 6, 23, 1006, 'hjghj', '09:00:00', 'Cancel', 'No', ''),
(10, 7, 6, 16, 1007, 'may sayad', '09:00:00', 'Cancel', 'No', ''),
(11, 7, 7, 18, 1008, 'may sakit sa utak', '09:00:00', 'Completed', 'No', 'Mental kailangan nyan haha'),
(12, 7, 8, 16, 1009, 'inuubo sinisipon', '09:40:00', 'In Process', 'Yes', ''),
(13, 8, 8, 22, 1010, 'paga ', '09:00:00', 'In Process', '', ''),
(14, 7, 13, 17, 1011, 'fever', '09:00:00', 'Booked', 'No', ''),
(15, 7, 6, 18, 1012, 'trast', '09:40:00', 'Booked', 'No', ''),
(16, 8, 6, 24, 1013, '2024-04-04', '09:00:00', 'Booked', 'No', ''),
(17, 7, 6, 27, 1014, 'TEST 1', '09:00:00', 'Booked', 'No', ''),
(19, 8, 6, 28, 1015, 'rte', '09:00:00', 'Booked', 'No', ''),
(20, 7, 6, 29, 1016, 'fdgefa', '09:00:00', 'Booked', 'No', ''),
(21, 8, 6, 30, 1017, 'dsgsd', '09:00:00', 'Booked', 'No', ''),
(22, 8, 13, 23, 1018, 'dgsdg', '09:40:00', 'Booked', 'No', ''),
(23, 7, 17, 16, 1019, 'headache', '10:20:00', 'Booked', 'No', ''),
(24, 8, 17, 22, 1020, 'fever', '09:40:00', 'Booked', 'No', ''),
(25, 8, 17, 30, 1021, 'fever', '09:40:00', 'Cancel', 'No', ''),
(26, 7, 17, 29, 1022, 'fever', '09:40:00', 'In Process', 'Yes', ''),
(27, 7, 17, 18, 1023, 'fwegs', '10:20:00', 'Booked', 'No', ''),
(28, 7, 21, 17, 1024, 'fever', '09:40:00', 'Cancel', 'No', ''),
(29, 9, 25, 78, 1025, 'Dizziness', '09:00:00', 'Booked', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule_table`
--

CREATE TABLE `doctor_schedule_table` (
  `doctor_schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_schedule_date` date NOT NULL,
  `doctor_schedule_day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `doctor_schedule_start_time` varchar(20) NOT NULL,
  `doctor_schedule_end_time` varchar(20) NOT NULL,
  `average_consulting_time` int(5) NOT NULL,
  `doctor_schedule_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_schedule_table`
--

INSERT INTO `doctor_schedule_table` (`doctor_schedule_id`, `doctor_id`, `doctor_schedule_date`, `doctor_schedule_day`, `doctor_schedule_start_time`, `doctor_schedule_end_time`, `average_consulting_time`, `doctor_schedule_status`) VALUES
(31, 7, '2024-04-08', 'Monday', '09:00', '16:00', 40, 'Active'),
(32, 7, '2024-04-09', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(33, 7, '2024-04-10', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(34, 7, '2024-04-11', 'Thursday', '09:00', '16:00', 40, 'Active'),
(35, 7, '2024-04-12', 'Friday', '09:00', '16:00', 40, 'Active'),
(36, 7, '2024-04-13', 'Saturday', '09:00', '16:00', 40, 'Active'),
(37, 7, '2024-04-15', 'Monday', '09:00', '16:00', 40, 'Active'),
(38, 7, '2024-04-16', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(39, 7, '2024-04-17', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(40, 7, '2024-04-18', 'Thursday', '09:00', '16:00', 40, 'Active'),
(41, 7, '2024-04-19', 'Friday', '09:00', '16:00', 40, 'Active'),
(42, 7, '2024-04-20', 'Saturday', '09:00', '16:00', 40, 'Active'),
(43, 7, '2024-04-22', 'Monday', '09:00', '16:00', 40, 'Active'),
(44, 7, '2024-04-23', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(45, 7, '2024-04-24', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(46, 7, '2024-04-25', 'Thursday', '09:00', '16:00', 40, 'Active'),
(47, 7, '2024-04-26', 'Friday', '09:00', '16:00', 40, 'Active'),
(48, 7, '2024-04-27', 'Saturday', '09:00', '16:00', 40, 'Active'),
(49, 7, '2024-04-29', 'Monday', '09:00', '16:00', 40, 'Active'),
(50, 7, '2024-04-30', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(51, 8, '2024-04-08', 'Monday', '09:00', '16:00', 40, 'Active'),
(52, 8, '2024-04-09', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(53, 8, '2024-04-10', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(54, 8, '2024-04-11', 'Thursday', '09:00', '16:00', 40, 'Active'),
(55, 8, '2024-04-12', 'Friday', '09:00', '16:00', 40, 'Active'),
(56, 8, '2024-04-13', 'Saturday', '09:00', '16:00', 40, 'Active'),
(57, 8, '2024-04-15', 'Monday', '09:00', '16:00', 40, 'Active'),
(58, 8, '2024-04-16', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(59, 8, '2024-04-17', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(60, 8, '2024-04-18', 'Thursday', '09:00', '16:00', 40, 'Active'),
(61, 8, '2024-04-19', 'Friday', '09:00', '16:00', 40, 'Active'),
(62, 8, '2024-04-20', 'Saturday', '09:00', '16:00', 40, 'Active'),
(63, 8, '2024-04-22', 'Monday', '09:00', '16:00', 40, 'Active'),
(64, 8, '2024-04-23', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(65, 8, '2024-04-24', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(66, 8, '2024-04-25', 'Thursday', '09:00', '16:00', 40, 'Active'),
(67, 8, '2024-04-26', 'Friday', '09:00', '16:00', 40, 'Active'),
(68, 8, '2024-04-27', 'Saturday', '09:00', '16:00', 40, 'Active'),
(69, 8, '2024-04-29', 'Monday', '09:00', '16:00', 40, 'Active'),
(70, 8, '2024-04-30', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(71, 9, '2024-04-13', 'Saturday', '09:00', '16:00', 40, 'Active'),
(72, 9, '2024-04-15', 'Monday', '09:00', '16:00', 40, 'Active'),
(73, 9, '2024-04-16', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(74, 9, '2024-04-17', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(75, 9, '2024-04-18', 'Thursday', '09:00', '16:00', 40, 'Active'),
(76, 9, '2024-04-19', 'Friday', '09:00', '16:00', 40, 'Active'),
(77, 9, '2024-04-20', 'Saturday', '09:00', '16:00', 40, 'Active'),
(78, 9, '2024-04-22', 'Monday', '09:00', '16:00', 40, 'Active'),
(79, 9, '2024-04-23', 'Tuesday', '09:00', '16:00', 40, 'Active'),
(80, 9, '2024-04-24', 'Wednesday', '09:00', '16:00', 40, 'Active'),
(81, 9, '2024-04-25', 'Thursday', '09:00', '16:00', 40, 'Active'),
(82, 9, '2024-04-26', 'Friday', '09:00', '16:00', 40, 'Active'),
(83, 9, '2024-04-27', 'Saturday', '09:00', '16:00', 40, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `doctor_id` int(11) NOT NULL,
  `doctor_email_address` varchar(200) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_profile_image` varchar(100) NOT NULL,
  `doctor_phone_no` varchar(30) NOT NULL,
  `doctor_address` mediumtext NOT NULL,
  `doctor_date_of_birth` date NOT NULL,
  `doctor_degree` varchar(200) NOT NULL,
  `doctor_expert_in` varchar(100) NOT NULL,
  `doctor_status` enum('Active','Inactive') NOT NULL,
  `doctor_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`doctor_id`, `doctor_email_address`, `doctor_password`, `doctor_name`, `doctor_profile_image`, `doctor_phone_no`, `doctor_address`, `doctor_date_of_birth`, `doctor_degree`, `doctor_expert_in`, `doctor_status`, `doctor_added_on`) VALUES
(7, 'enm@gmail.com', 'enmpdh', 'Eloisa Ng-Mambil', '../images/1097882946.jpg', 'n/a', 'PDH', '1984-02-14', 'MD', 'General Medicine', 'Active', '2024-03-22 17:51:39'),
(8, 'jhm@gmail.com', 'jhmpdh', 'June Harris Marinas', '../images/2004661477.jpg', 'n/a', 'PDH', '1986-07-16', 'MD', 'General Medicine', 'Active', '2024-03-22 17:52:42'),
(9, 'rng@gmail.com', 'rngpdh', 'Romina Ng', '../images/1976798389.jpg', 'n/a', 'PDH', '1985-04-18', 'MD', 'General Medicine', 'Active', '2024-04-05 16:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `patient_id` int(11) NOT NULL,
  `patient_email_address` varchar(200) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `patient_first_name` varchar(100) NOT NULL,
  `patient_last_name` varchar(100) NOT NULL,
  `patient_mid_name` varchar(100) NOT NULL,
  `patient_suffix` varchar(100) NOT NULL,
  `patient_date_of_birth` date NOT NULL,
  `patient_gender` enum('Male','Female','Other') NOT NULL,
  `patient_address` mediumtext NOT NULL,
  `patient_phone_no` varchar(30) NOT NULL,
  `patient_maritial_status` varchar(30) NOT NULL,
  `patient_added_on` datetime NOT NULL,
  `patient_verification_code` varchar(100) NOT NULL,
  `email_verify` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`patient_id`, `patient_email_address`, `patient_password`, `patient_first_name`, `patient_last_name`, `patient_mid_name`, `patient_suffix`, `patient_date_of_birth`, `patient_gender`, `patient_address`, `patient_phone_no`, `patient_maritial_status`, `patient_added_on`, `patient_verification_code`, `email_verify`) VALUES
(8, 'shoultz@gmail.com', '0912', 'shoultz', 'nunao', '', '', '2024-01-09', 'Male', 'sta ana Cacawan', '09209126680265', 'Married', '2024-03-23 08:27:37', '08fcfb3045c9700e5fed145e44eb877d', 'Yes'),
(21, 'joegreg046@gmail.com', 'jowe2931', 'JOWELYN', 'GREGORIO', 'HERNANDEZ', '', '1994-03-20', 'Female', 'Sitio chico, Inclanay, Pinamalayan', '+639981535118', 'Married', '2024-03-27 09:40:05', '7f89df5971857a1086a69153f6354c7a', 'Yes'),
(24, 'capstone02pdh@gmail.com', 'rhian2931', 'RHIAN JANE', 'GREGORIO', 'HERNANDEZ', '', '2013-04-29', 'Female', 'pinamalayan', '+639383513324', 'Single', '2024-04-06 07:04:28', '4fbaa888ff9655e65299a1b18f5f37fe', 'Yes'),
(25, 'jowelyngregorio394@gmail.com', 'Gregorio@2931', 'RAILEY JADE', 'GREGORIO', 'HERNANDEZ', '', '2020-01-31', 'Male', 'inclanay pinamalayan', '+639383513324', 'Single', '2024-04-18 06:57:38', '4a8583ef6712029f73f4318cf07843cc', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  ADD PRIMARY KEY (`doctor_schedule_id`);

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  MODIFY `doctor_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `doctor_table`
--
ALTER TABLE `doctor_table`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
