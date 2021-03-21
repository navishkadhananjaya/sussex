-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 06:56 PM
-- Server version: 5.7.33-log
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sussex`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address_line1` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `personality` text NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `date_of_birth`, `email`, `mobile`, `address_line1`, `city`, `postal_code`, `country`, `personality`, `user_type`, `registration_date`) VALUES
(29, 'Thulara', 'Desilva', '2000-05-28', 'thurala@gmail.com', '0800882408', 'Flower Road', 'Wolverhampton', '01902', 'England', 'I''m a girl who thinks positive and accept challengers. I like to enjoy the nature and like to travel around the world.', 1, '2021-01-28'),
(30, 'Nishra', 'Nasar', '2000-01-28', 'nishra@gmail.com', '083456789', 'Beach Road', 'Wolverhampton', '01902', 'England', 'I''m a girl who is energitic and thinks positive and accept challengers. I like to enjoy the reading books, nature and like to travel around the world.', 1, '2020-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `client_hobbies`
--

CREATE TABLE `client_hobbies` (
  `client_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_hobbies`
--

INSERT INTO `client_hobbies` (`client_id`, `hobby_id`) VALUES
(29, 1),
(29, 2),
(30, 6),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_membership`
--

CREATE TABLE `client_membership` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `penalty` decimal(10,0) DEFAULT NULL,
  `payment_type` char(50) NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_membership`
--

INSERT INTO `client_membership` (`payment_id`, `client_id`, `paid_amount`, `penalty`, `payment_type`, `paid_date`) VALUES
(1, 29, '5', NULL, 'card', '2021-01-28'),
(2, 30, '12', NULL, 'cash', '2020-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(6, 'nishranasar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`cat_id`, `cat_title`) VALUES
(1, 'Indoor Games'),
(2, 'Outdoor Games'),
(3, 'Educational Meetups'),
(4, 'Collections'),
(5, 'Art'),
(6, 'Cooking'),
(7, 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `client_id` int(11) NOT NULL,
  `friends_id` int(11) NOT NULL,
  `friendship_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`client_id`, `friends_id`, `friendship_date`) VALUES
(29, 30, '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `hobby_id` int(11) NOT NULL,
  `hobby_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hobby_id`, `hobby_name`) VALUES
(1, 'Sky Diving'),
(2, 'Rock Climbing'),
(3, 'Coding Challengers'),
(4, 'Online Games'),
(5, 'Painting'),
(6, 'Baking Cakes'),
(7, 'Collect Historical Coins '),
(8, 'Collecting Stamps');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_category` varchar(100) NOT NULL,
  `payment_name` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_category`, `payment_name`, `amount`) VALUES
(1, 'Membership Fee', 'Online Membership', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'admin', 'admin@sussex.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'receptionist', 'receptionist@sussex.com', '202cb962ac59075b964b07152d234b70', 'receptionist'),
(3, 'finance manager', 'financemanager@sussex.com', '202cb962ac59075b964b07152d234b70', 'finance manager'),
(4, 'senioragent', 'senioragent@sussex.com', '202cb962ac59075b964b07152d234b70', 'senior client service agent'),
(5, 'client service agent', 'serviceagent@sussex.com', '202cb962ac59075b964b07152d234b70', 'client service agent'),
(6, 'thulara', 'thulara@gmail.com', '202cb962ac59075b964b07152d234b70', 'online client'),
(7, 'Nishra', 'nishra@gmail.com', '202cb962ac59075b964b07152d234b70', 'online client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_hobbies`
--
ALTER TABLE `client_hobbies`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `hobby_id` (`hobby_id`);

--
-- Indexes for table `client_membership`
--
ALTER TABLE `client_membership`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `friends_id` (`friends_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hobby_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `client_membership`
--
ALTER TABLE `client_membership`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hobby_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_hobbies`
--
ALTER TABLE `client_hobbies`
  ADD CONSTRAINT `foreign_key_client_id_hobbies` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `foreign_key_hobbies_id` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`hobby_id`);

--
-- Constraints for table `client_membership`
--
ALTER TABLE `client_membership`
  ADD CONSTRAINT `foreign_key_client_id_membership` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `foreign_key_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `foreign_key_friends_id` FOREIGN KEY (`friends_id`) REFERENCES `client` (`client_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
