-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 04:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legal`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester_id` varchar(50) NOT NULL,
  `requester_title` varchar(50) DEFAULT NULL,
  `requester_name` varchar(300) DEFAULT NULL,
  `requester_dept` varchar(100) DEFAULT NULL,
  `other_party_title` varchar(50) DEFAULT NULL,
  `other_party_name` varchar(300) DEFAULT NULL,
  `service_location` varchar(100) DEFAULT NULL,
  `authorized_signatory` varchar(50) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `contract_duration` varchar(50) DEFAULT NULL,
  `proposed_start_date` date DEFAULT NULL,
  `proposed_end_date` date DEFAULT NULL,
  `proposal_agreed_upon` varchar(300) DEFAULT NULL,
  `termination_notice` varchar(100) DEFAULT NULL,
  `payment_term` varchar(100) DEFAULT NULL,
  `sale_of_equipment` varchar(200) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `review_comment` varchar(800) NOT NULL,
  `validation_comment` varchar(800) NOT NULL,
  `signoff_comment` varchar(800) NOT NULL,
  `date_created` date NOT NULL,
  `last_modified` date NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `requester_id`, `requester_title`, `requester_name`, `requester_dept`, `other_party_title`, `other_party_name`, `service_location`, `authorized_signatory`, `phone_no`, `email`, `address`, `contract_duration`, `proposed_start_date`, `proposed_end_date`, `proposal_agreed_upon`, `termination_notice`, `payment_term`, `sale_of_equipment`, `status`, `review_comment`, `validation_comment`, `signoff_comment`, `date_created`, `last_modified`, `modified_by`) VALUES
(11, '9', 'Mr', 'Victor Obibi', 'Systems', 'Mr', 'Adewale Adebayo', 'Ibadan', '1', '07084702123', 'adewale@gmail.com', '64B Nosamu street off bandry ajegunle apapa lagos', '4', '2021-08-12', '2025-08-11', 'uploads/contracts/1628759942Summary.2021-08-11-09-29UTC.pdf', '1 week before', 'monthly', 'None', 'Signed_Off', '', '', '', '2021-08-12', '2021-08-12', '9'),
(12, '10', 'Mr', 'Ifeoluwa OLoyede', 'Systems', 'Mrs', 'Bisola Tijani', 'Lagos', '1', '09084702950', 'bisola@gmail.com', '64B Nosamu street off bandry ajegunle apapa lagos', '2', '2021-08-14', '2023-08-12', 'uploads/contracts/1628938174Executive summary.2021-08-12-14-30UTC.pdf', '1 week before', 'monthly', 'None', 'Signed_Off', '', '', '', '2021-08-12', '2021-08-14', '10'),
(13, '9', 'Mr', 'Victor Obibi', 'BDD', 'Mr', 'Nnamso Jacob', 'Kaduna', '1', '08033085091', 'n.jacob@netcomafrica.com', '53 Haruna cresent, divine estate off orege, Ajegunle Lagos', '4', '2021-08-28', '2025-08-28', 'uploads/contracts/16299879141628759942Summary.2021-08-11-09-29UTC.pdf', '1 Week before', 'monthly Installmental payment', 'none', 'Fail_Review', 'minimum duration is 1 years', '', '', '2021-08-26', '2021-08-26', '9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `profile_image` varchar(300) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `date_created` date NOT NULL,
  `last_modified` date NOT NULL,
  `action_type` varchar(50) NOT NULL,
  `action_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `role`, `username`, `password`, `profile_image`, `is_active`, `date_created`, `last_modified`, `action_type`, `action_user`) VALUES
(7, 'Ralph Harding', 'r.harding@netcomafrica.com', 'Legal Officer', 'r.harding@netcomafrica.com', '$2y$10$538xx4C5M/oiQ7KkWyx2YugZfY/D9a2OT5gn/hf9wsrjTMFCAsF1u', 'uploads/pimages/1628338659ralph.jfif', '1', '2021-08-07', '2021-08-07', 'insert', ''),
(8, 'Dauda Musideen', 'muziyindojava@gmail.com', 'Admin', 'muziyindojava@gmail.com', '$2y$10$jxYoBREHdO9A2XI0cUl9eubpXvBHVaJBV6bgAM.B5e39fI6LzJFv6', 'uploads/pimages/1628340107Inst_Pic.png', '1', '2021-08-07', '2021-08-07', 'insert', ''),
(9, 'Victor Obibi', 'v.obibi@netcomafrica.com', 'Contract Requester', 'v.obibi@netcomafrica.com', '$2y$10$AgYVcLvwpJcCgvd9yrQiSeOSwn0yyVQmuNUubGCzmZqduri.EGWeW', 'uploads/pimages/1628544068victorProfile.jpg', '1', '2021-08-09', '2021-08-09', 'insert', ''),
(10, 'Ifeoluwa OLoyede', 'i.oloyede@netcomafrica.com', 'Contract Requester', 'i.oloyede@netcomafrica.com', '$2y$10$HJHsZPyiAFI4ephR/WULB.8K7S3gvXdhfKc8z0sC1m0n7HL0FLxYG', 'uploads/pimages/1628754887ife.jpg', '1', '2021-08-12', '2021-08-12', 'insert', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
