-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 05:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadhaar_image`
--

CREATE TABLE `aadhaar_image` (
  `aadhar_id` int(11) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `aadhaar_front` varchar(250) NOT NULL,
  `aadhaar_back` varchar(250) NOT NULL,
  `aadhaaar_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aadhaar_image`
--

INSERT INTO `aadhaar_image` (`aadhar_id`, `vendor_id`, `aadhaar_front`, `aadhaar_back`, `aadhaaar_date`) VALUES
(1, '2', '5f3fbbc41c3903.85043544.jpg', '5f3fbbc41c39a2.71750805.jpg', '2020-08-21 12:19:16'),
(2, '1', '5f3fbcc2e79ab9.74863751.jpg', '5f3fbcc2e79b63.63904118.jpg', '2020-08-21 12:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `admin_gms`
--

CREATE TABLE `admin_gms` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_registration_number` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_gms`
--

INSERT INTO `admin_gms` (`admin_id`, `admin_name`, `admin_registration_number`, `admin_email`, `admin_password`, `admin_reg_date`) VALUES
(1, 'Navjot Singh', '12000610', 'navjot.s.ota456@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '2020-07-24 14:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_image`
--

CREATE TABLE `cheque_image` (
  `c_id` int(11) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `cancle_cheque_image` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cheque_image`
--

INSERT INTO `cheque_image` (`c_id`, `vendor_id`, `cancle_cheque_image`, `date`) VALUES
(1, '1', '5f3beba2877877.35236713.png', '2020-08-18 14:54:26'),
(7, '13', '5f3e2d497b5003.74046790.jpg', '2020-08-20 07:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `contact_gym_query`
--

CREATE TABLE `contact_gym_query` (
  `contact_id` int(11) NOT NULL,
  `registration_number` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(600) NOT NULL,
  `reply` varchar(250) DEFAULT NULL,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_gym_query`
--

INSERT INTO `contact_gym_query` (`contact_id`, `registration_number`, `name`, `email`, `subject`, `message`, `reply`, `contact_date`) VALUES
(1, 'Customer', 'Navjot Singh', 'enridise@gmail.com', 'Test Last', 'This mail is only for Testing Last Time.\r\nThanking You.', 'Done Bro!', '2020-07-24 08:33:57'),
(2, 'vndr1001', 'Navjot Singh', 'vinestechofficial@gmail.com', 'Vendor Test Mailer', 'Vendor Test Mailer for testing and reply', 'Reply Done', '2020-07-24 08:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `o_id` int(11) NOT NULL,
  `orderId` varchar(250) NOT NULL,
  `orderAmount` varchar(250) NOT NULL,
  `servicePlan` varchar(250) NOT NULL,
  `serviceId` varchar(250) NOT NULL,
  `vendorId` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `withdraw_status` varchar(300) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`o_id`, `orderId`, `orderAmount`, `servicePlan`, `serviceId`, `vendorId`, `mobile`, `user_id`, `order_date`, `withdraw_status`) VALUES
(12, 'ORDS9540031537', '19999', '30', '5', '2', '8873185425', 9, '2020-08-21 04:39:43', '17999.1'),
(13, 'ORDS9540031538', '19999', '30', '5', '2', '9097904372', 8, '2020-08-21 06:55:04', '17999.1'),
(14, 'ORDS9540031539', '19999', '30', '5', '2', '9097904372', 8, '2020-08-21 07:00:56', '17999.1'),
(17, 'ORDS9540031540', '9', '7', '2', '1', '9097904372', 8, '2020-08-21 07:06:16', '8.1\r\n'),
(18, 'ORDS9540031541', '9', '7', '2', '1', '9097904372', 8, '2020-08-21 07:10:09', '8.1');

-- --------------------------------------------------------

--
-- Table structure for table `gst_image`
--

CREATE TABLE `gst_image` (
  `g_id` int(11) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `gst_certificate` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst_image`
--

INSERT INTO `gst_image` (`g_id`, `vendor_id`, `gst_certificate`, `date`) VALUES
(1, '1', '5f3bf34c32e9d9.90980965.pdf', '2020-08-18 15:27:08'),
(2, '13', '5f3d4b4c28d070.61364425.pdf', '2020-08-19 15:54:52'),
(6, '2', '5f3fafc0de8287.90805452.pdf', '2020-08-21 11:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `gym_application`
--

CREATE TABLE `gym_application` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gym_name` varchar(500) NOT NULL,
  `gym_type` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `pan_detail` varchar(350) NOT NULL,
  `gst_detail` varchar(350) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'New',
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_application`
--

INSERT INTO `gym_application` (`id`, `name`, `gym_name`, `gym_type`, `email`, `mobile`, `address`, `city`, `pincode`, `state`, `pan_detail`, `gst_detail`, `status`, `apply_date`) VALUES
(1, 'Navjot Singh', 'Navjot Singh GYM', '', 'navjot.s.ota456@gmail.com', '7033034637', 'Harimandir Gali', 'Patna City', '800008', 'Bihar', '', '', 'New', '2020-08-17 03:58:11'),
(2, 'The Foremost Creators', 'The Foremost Creators', 'Unisex', 'vinestechofficial@gmail.com', '7033034637', 'Opposite LIC Office near Lucky Bescuit', 'Patna', '800008', 'Bihar', 'KHOPS4916L', '', 'New', '2020-08-18 07:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `payments_id` int(11) NOT NULL,
  `orderId` varchar(500) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `transaction_amount` varchar(250) NOT NULL,
  `transaction_status` varchar(250) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`payments_id`, `orderId`, `transaction_id`, `transaction_amount`, `transaction_status`, `transaction_date`) VALUES
(13, 'ORDS9540031537', '496167', '19999.00', 'SUCCESS', '2020-08-21 04:40:27'),
(18, 'ORDS9540031538', '496413', '19999.00', 'SUCCESS', '2020-08-21 07:00:14'),
(19, 'ORDS9540031539', '496431', '19999.00', 'SUCCESS', '2020-07-20 07:04:41'),
(20, 'ORDS9540031540', '496451', '9.00', 'SUCCESS', '2020-08-13 07:06:28'),
(21, 'ORDS9540031541', '496461', '9.00', 'SUCCESS', '2020-08-13 07:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `pan_image`
--

CREATE TABLE `pan_image` (
  `p_id` int(11) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `pan_card_image` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pan_image`
--

INSERT INTO `pan_image` (`p_id`, `vendor_id`, `pan_card_image`, `date`) VALUES
(1, '1', '5f3bebae0a5886.78946331.png', '2020-08-18 14:54:38'),
(2, '13', '5f3d4b371bd439.47456928.jpg', '2020-08-19 15:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` text NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(19, 'enridise@gmail.com', '5a378f8490c8d6af8647a753812f6e31', '7fd77a078a082d0684657c2e8869afcf', '1596456132');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(300) NOT NULL,
  `sub_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `sub_email`, `sub_date`) VALUES
(17, 'eisagar333@gmail.com', '2020-08-22 08:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `fid` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `vid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `coment` varchar(250) NOT NULL,
  `feedbackDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`fid`, `order_id`, `vid`, `sid`, `uid`, `name`, `email`, `rating`, `coment`, `feedbackDate`) VALUES
(1, 'ORDS9540031541', 1, 2, 8, 'Sagar Shukla', 'eisagar333@gmail.com', 'good', 'Good', '2020-08-23 14:11:48'),
(4, 'ORDS9540031540', 0, 2, 8, 'Sagar Shukla', 'eisagar333@gmail.com', 'Good', 'Good', '2020-08-23 14:29:46'),
(6, 'ORDS9540031539', 2, 5, 8, 'Sagar Shukla', 'eisagar333@gmail.com', 'Good', 'Good', '2020-08-23 15:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_dob` varchar(250) NOT NULL,
  `user_mobile` varchar(250) NOT NULL,
  `user_otp` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT '0',
  `user_registration_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `user_name`, `user_email`, `user_password`, `user_dob`, `user_mobile`, `user_otp`, `status`, `user_registration_date`) VALUES
(1, 'Navjot Singh', 'enridise@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '31/01/2001', '7033034637', '', '1', '2020-07-23 05:30:26'),
(5, 'Navjot Singh', 'navjot.s.ota456@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '31/01/2001', '9113764578', '', '1', '2020-07-28 17:12:25'),
(6, 'musicaindustry@gmail.com', 'musicaindustry@gmail.com', 'b870c638be7e97dd061085613c99dc71', '31/01/2000', '8873185425', '', '1', '2020-07-28 17:15:07'),
(8, 'Sagar Shukla', 'eisagar333@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '20/08/1997', '9097904372', '', '1', '2020-07-28 17:21:31'),
(9, 'Sagar Insomniac', 'sagarinsomniac305@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '31/01/2001', '8873185425', '', '1', '2020-08-03 11:53:40'),
(12, 'The Foremost Creator', 'vinestechofficial@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', '2001-01-31', '7033034637', '', '1', '2020-08-21 16:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_balance`
--

CREATE TABLE `vendor_balance` (
  `b_id` int(11) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_total_balance` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_balance`
--

INSERT INTO `vendor_balance` (`b_id`, `vendor_id`, `vendor_total_balance`) VALUES
(1, '2', '0'),
(2, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_details`
--

CREATE TABLE `vendor_bank_details` (
  `v_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_registration_number` varchar(250) NOT NULL,
  `vendor_account_number` varchar(250) NOT NULL,
  `vendor_account_name` varchar(250) NOT NULL,
  `vendor_ifsc_code` varchar(250) NOT NULL,
  `vendor_bank_name` varchar(250) NOT NULL,
  `bank_update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_bank_details`
--

INSERT INTO `vendor_bank_details` (`v_id`, `vendor_id`, `vendor_registration_number`, `vendor_account_number`, `vendor_account_name`, `vendor_ifsc_code`, `vendor_bank_name`, `bank_update_date`) VALUES
(1, 1, 'vndr1001', '919113764578', 'Navjot Singh', 'PYTM0123456', 'Paytm Payments Bank', '2020-07-23 10:34:43'),
(3, 1, '20201001', '7870773603', 'BBB', 'PYTM0123456', 'A B C Bank', '2020-08-20 12:25:26'),
(4, 2, '20201002', '917033034637', 'Enridise', 'PYTM0123456', 'PAYTM PAYMENTS BANK', '2020-08-21 07:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_gym_add_service`
--

CREATE TABLE `vendor_gym_add_service` (
  `vendor_add_service_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_registration_number` varchar(250) NOT NULL,
  `vendor_service_name` varchar(250) NOT NULL,
  `vendor_service_plan` varchar(250) NOT NULL,
  `vendor_service_offered1` varchar(250) NOT NULL,
  `vendor_service_offered2` varchar(250) NOT NULL,
  `vendor_service_offered3` varchar(250) NOT NULL,
  `vendor_service_offered4` varchar(250) DEFAULT NULL,
  `vendor_service_offered5` varchar(250) DEFAULT NULL,
  `vendor_service_offered6` varchar(250) DEFAULT NULL,
  `vendor_service_offered7` varchar(250) DEFAULT NULL,
  `vendor_service_offered8` varchar(250) DEFAULT NULL,
  `vendor_service_price` varchar(250) NOT NULL,
  `vendor_add_service_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_gym_add_service`
--

INSERT INTO `vendor_gym_add_service` (`vendor_add_service_id`, `vendor_id`, `vendor_registration_number`, `vendor_service_name`, `vendor_service_plan`, `vendor_service_offered1`, `vendor_service_offered2`, `vendor_service_offered3`, `vendor_service_offered4`, `vendor_service_offered5`, `vendor_service_offered6`, `vendor_service_offered7`, `vendor_service_offered8`, `vendor_service_price`, `vendor_add_service_date`) VALUES
(2, 1, 'vndr1001', 'Test', '7', '11', '22', '33', '44', '', '66', '', '88', '9', '2020-07-23 06:41:47'),
(3, 1, 'vndr1001', 'Test', '30', '11', '22', '33', '44', '', '66', '', '88', '19999', '2020-07-23 06:41:47'),
(5, 2, 'vndr1001', 'Test', '30', '11', '22', '33', '44', '', '66', '', '88', '19999', '2020-07-23 06:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_gym_registration`
--

CREATE TABLE `vendor_gym_registration` (
  `vendor_id` int(11) NOT NULL,
  `vendor_registration_number` varchar(150) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_business_name` varchar(250) NOT NULL,
  `vendor_business_description` varchar(800) NOT NULL,
  `vendor_gym_sex` varchar(250) NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_password` varchar(250) NOT NULL,
  `vendor_status` varchar(250) NOT NULL DEFAULT 'Active',
  `vendor_mobile_number` varchar(250) NOT NULL,
  `vendor_address` varchar(250) NOT NULL,
  `vendor_landmark` varchar(250) NOT NULL,
  `vendor_city` varchar(250) NOT NULL,
  `vendor_pincode` varchar(250) NOT NULL,
  `vendor_state` varchar(250) NOT NULL,
  `vendor_pan_detail` varchar(250) NOT NULL,
  `vendor_gst_detail` varchar(250) DEFAULT NULL,
  `vendor_gym_main_img` varchar(250) DEFAULT NULL,
  `vendor_gym_service_img` varchar(250) DEFAULT NULL,
  `vendor_registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_gym_registration`
--

INSERT INTO `vendor_gym_registration` (`vendor_id`, `vendor_registration_number`, `vendor_name`, `vendor_business_name`, `vendor_business_description`, `vendor_gym_sex`, `vendor_email`, `vendor_password`, `vendor_status`, `vendor_mobile_number`, `vendor_address`, `vendor_landmark`, `vendor_city`, `vendor_pincode`, `vendor_state`, `vendor_pan_detail`, `vendor_gst_detail`, `vendor_gym_main_img`, `vendor_gym_service_img`, `vendor_registration_date`) VALUES
(1, '20201001', 'Navjot Singh', 'The City Gym', 'Don’t count the days, make the days count. If you want something you’ve never had, you must be willing to do something you’ve never done.\r\nDon’t count the days, make the days count. If you want something you’ve never had, you must be willing to do something you’ve never done.\r\nDon’t count the days, make the days count. If you want something you’ve never had, you must be willing to do something you’ve never done.\r\nDon’t count the days, make the days count. If you want something you’ve never had, you must be willing to do something you’ve never done.', 'Unisex', 'enridise@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', 'Active', '7033034637', 'Harimandir Gali', 'Near Mahavir Mandir', 'Patna', '800008', 'Bihar', 'KHOPS4916L', NULL, '5f3be5583555a2.89439039.png', '5f3be8262e3b42.03342783.png', '2020-07-23 05:39:38'),
(2, '20201002', 'ENRIDISE', 'ENRIDISE Gym', '', 'Unisex', 'support@enridise.in', 'a90b86d07e38c0fcd44fada077924f66', 'Active', '7033034637', 'Harimandir Gali', 'Near Mahavir Mandir', 'Patna', '800008', 'Bihar', 'KHOPS4916L', NULL, '5f3be5583555a2.89439039.png', '5f3be8262e3b42.03342783.png', '2020-07-23 05:39:38'),
(13, '20201003', 'MY GYM', 'MY GYM', '', 'Male', 'shodinavjot@gmail.com', 'a90b86d07e38c0fcd44fada077924f66', 'Active', '7033034637', 'kdkdn', '', 'dmvdkv', '800008', 'bihar', 'khops4916l', '', '5f3d4a9a797722.64378843.jpg', '5f3d4aa71bfef1.62123776.jpg', '2020-08-19 15:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_withdraw`
--

CREATE TABLE `vendor_withdraw` (
  `w_id` int(11) NOT NULL,
  `w_vendoe_id` varchar(250) NOT NULL,
  `w_vendor_amount` varchar(250) NOT NULL,
  `w_vendor_details` varchar(350) NOT NULL,
  `w_vendor_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_withdraw`
--

INSERT INTO `vendor_withdraw` (`w_id`, `w_vendoe_id`, `w_vendor_amount`, `w_vendor_details`, `w_vendor_date`) VALUES
(2, '1', '16.2', 'Withdraw Success.\r\nTransaction Id: 496461', '2020-08-21 07:45:21'),
(3, '2', '359998.2', 'Withdraw Success for Transaction id: 496431 and 496413.\r\nThe amount will be reflected in your bank account within 5-7 working days.', '2020-08-21 08:00:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadhaar_image`
--
ALTER TABLE `aadhaar_image`
  ADD PRIMARY KEY (`aadhar_id`);

--
-- Indexes for table `admin_gms`
--
ALTER TABLE `admin_gms`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cheque_image`
--
ALTER TABLE `cheque_image`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact_gym_query`
--
ALTER TABLE `contact_gym_query`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `gst_image`
--
ALTER TABLE `gst_image`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `gym_application`
--
ALTER TABLE `gym_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`payments_id`);

--
-- Indexes for table `pan_image`
--
ALTER TABLE `pan_image`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor_balance`
--
ALTER TABLE `vendor_balance`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vendor_gym_add_service`
--
ALTER TABLE `vendor_gym_add_service`
  ADD PRIMARY KEY (`vendor_add_service_id`);

--
-- Indexes for table `vendor_gym_registration`
--
ALTER TABLE `vendor_gym_registration`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_withdraw`
--
ALTER TABLE `vendor_withdraw`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aadhaar_image`
--
ALTER TABLE `aadhaar_image`
  MODIFY `aadhar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_gms`
--
ALTER TABLE `admin_gms`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cheque_image`
--
ALTER TABLE `cheque_image`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_gym_query`
--
ALTER TABLE `contact_gym_query`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gst_image`
--
ALTER TABLE `gst_image`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gym_application`
--
ALTER TABLE `gym_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `payments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pan_image`
--
ALTER TABLE `pan_image`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor_balance`
--
ALTER TABLE `vendor_balance`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_gym_add_service`
--
ALTER TABLE `vendor_gym_add_service`
  MODIFY `vendor_add_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_gym_registration`
--
ALTER TABLE `vendor_gym_registration`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor_withdraw`
--
ALTER TABLE `vendor_withdraw`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
