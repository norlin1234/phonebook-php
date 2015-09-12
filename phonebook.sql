-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 02:27 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `admin_user_id` int(11) NOT NULL,
  `reg_name` varchar(256) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_user_id`, `reg_name`, `email_id`, `mobile`, `username`, `password`, `ip`, `profile_pic`) VALUES
(15, 'user2', 'user2@gmail.com', '0912345679', 'user2', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-54.jpg'),
(16, 'user3', 'user3@gmail.com', '0912345671', 'user3', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-02.jpg'),
(17, 'user4', 'user4@gmail.com', '0912345672', 'user4', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_users`
--

CREATE TABLE IF NOT EXISTS `contact_users` (
  `reg_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(256) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_mobile` varchar(200) NOT NULL,
  `contact_address` varchar(200) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_users`
--

INSERT INTO `contact_users` (`reg_id`, `contact_id`, `contact_name`, `contact_email`, `contact_mobile`, `contact_address`, `profile_pic`) VALUES
(25, 16, 'swati', 'swati@gmail.com', '1234567890', 'swati house', 'career-advancement-thumb.jpg'),
(17, 17, 'rehana', 'rehana@gmail.com', '1234567890', 'rehana house', 'covering-1.png'),
(23, 18, 'sheeba', 'sheeba@gmail.com', '1234567890', 'sheeba house', 'forest-staff-main.jpg'),
(24, 19, 'shweta', 'shweta@gmail.com', '1234567890', 'shweta house', 'counting-tigers-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `log_id` int(11) NOT NULL,
  `log_user` varchar(150) NOT NULL,
  `log_pass` varchar(50) NOT NULL,
  `log_stat` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `log_user`, `log_pass`, `log_stat`) VALUES
(1, 'admin', 'password', 0),
(22, 'user1', 'password', 1),
(23, 'user2', 'password', 1),
(24, 'user3', 'password', 1),
(25, 'user4', 'password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `reg_id` int(11) NOT NULL,
  `reg_name` varchar(256) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `log_user` varchar(150) NOT NULL,
  `log_pass` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `reg_name`, `email_id`, `mobile`, `address1`, `address2`, `street`, `city`, `state`, `country`, `log_user`, `log_pass`, `ip`, `profile_pic`) VALUES
(15, 'user1', 'user1@gmail.com', '9012345678', 'user1 house', 'user1 bldng', 'user1 street', 'mumbai', 'maharashtra', 'india', 'user1', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-40.jpg'),
(16, 'user2', 'user2@gmail.com', '0912345679', 'user2 house', 'user2 bldng', 'user2 street', 'mumbai', 'maharashtra', 'india', 'user2', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-54.jpg'),
(17, 'user3', 'user3@gmail.com', '0912345671', 'user3 house', 'user3 bldng', 'user3 street', 'mumbai', 'maharashtra', 'india', 'user3', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-02.jpg'),
(18, 'user4', 'user4@gmail.com', '0912345672', 'user4 house', 'user4 bldng', 'user4 street', 'mumbai', 'maharashtra', 'india', 'user4', 'password', '::1', 'images/thumbs/img__2015-09-10-14-09-01.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `contact_users`
--
ALTER TABLE `contact_users`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contact_users`
--
ALTER TABLE `contact_users`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
