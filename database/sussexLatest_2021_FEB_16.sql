-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 06:31 PM
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
-- Database: `sussex`
--
CREATE DATABASE IF NOT EXISTS `sussex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sussex`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getcat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` ()  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address_line1` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `personality` varchar(255) DEFAULT 'No Data',
  `user_type` tinyint(1) NOT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `email`, `mobile`, `address_line1`, `city`, `postal_code`, `country`, `personality`, `user_type`, `registration_date`) VALUES
(29, 'Thulara', 'Desilva', '2000-05-28', 'F', 'thurala@gmail.com', '0800882408', 'Flower Road', 'Wolverhampton', '01902', 'England', 'I\'m a girl who thinks positive and accept challengers. I like to enjoy the nature and like to travel around the world.', 1, '2021-01-28'),
(30, 'Nishra', 'Nasar', '2000-01-28', 'F', 'nishra@gmail.com', '083456789', 'Beach Road', 'Wolverhampton', '01902', 'England', 'I\'m a girl who is energitic and thinks positive and accept challengers. I like to enjoy the reading books, nature and like to travel around the world.', 1, '2020-01-28'),
(31, 'Aasif', 'Ahamed', '2001-08-24', 'Male', 'asifnawasdeen@gmail.com', '0769833732', '53B, Temple Road, Beruwala', 'Beruwala', '12070', 'Sri Lanka', 'No Data', 1, '2021-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `client_hobbies`
--

DROP TABLE IF EXISTS `client_hobbies`;
CREATE TABLE IF NOT EXISTS `client_hobbies` (
  `client_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  KEY `client_id` (`client_id`),
  KEY `hobby_id` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_hobbies`
--

INSERT INTO `client_hobbies` (`client_id`, `hobby_id`) VALUES
(29, 1),
(29, 2),
(30, 6),
(30, 1),
(29, 1),
(29, 2),
(30, 6),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_membership`
--

DROP TABLE IF EXISTS `client_membership`;
CREATE TABLE IF NOT EXISTS `client_membership` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `penalty` decimal(10,0) DEFAULT NULL,
  `payment_type` char(50) NOT NULL,
  `paid_date` date NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `email_info`;
CREATE TABLE IF NOT EXISTS `email_info` (
  `email_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `event_categories`;
CREATE TABLE IF NOT EXISTS `event_categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
-- Table structure for table `event_details`
--

DROP TABLE IF EXISTS `event_details`;
CREATE TABLE IF NOT EXISTS `event_details` (
  `Event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Event_Name` varchar(100) NOT NULL,
  `Event_Catergory_ID` int(11) NOT NULL,
  `Event_Date` varchar(100) NOT NULL,
  `Venue` varchar(200) NOT NULL,
  `Price` varchar(100) NOT NULL DEFAULT 'Not Set',
  `Event_End` varchar(100) NOT NULL,
  `Event_Desc` mediumtext NOT NULL,
  `Participant_Number` int(11) NOT NULL,
  PRIMARY KEY (`Event_ID`),
  KEY `Event_Catergory_ID` (`Event_Catergory_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`Event_ID`, `Event_Name`, `Event_Catergory_ID`, `Event_Date`, `Venue`, `Price`, `Event_End`, `Event_Desc`, `Participant_Number`) VALUES
(1, 'Free Webinar - Web Development', 3, '2020-02-20', 'Online', 'Free', '2020-02-20', 'A free webinar for the web development enthusiasts to be done by the industry experts. ', 100),
(2, 'Project Management Crash Course', 3, '2020-02-12', 'Online', '2500', '2020-02-15', 'A course for the project management enthusiasts conducted by the industry experts.  ', 50),
(3, 'C# Crash Course', 3, '2020-02-11', 'Online', 'Free', '2020-02-11', 'A full coverup of C# basics for beginners', 20),
(4, 'Indoor Futsal Tournment', 1, '2020-02-22', 'England Public Auditorium ', '4000', '2020-02-24', 'Sussex clubs proudly present you the 2021 Indoor Futsal Tournament\r\n\r\nAge Limit = 14+\r\n\r\nRegistration Fee - Rs.4000 Per Team\r\n\r\n7 Members Per Team', 7),
(5, 'Sky Diving', 5, '2020.02.15', 'England Airport Ground', 'Not Set', '2020.02.14', 'This is the outdoor event for sky diving enthusiastic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

DROP TABLE IF EXISTS `friendship`;
CREATE TABLE IF NOT EXISTS `friendship` (
  `client_id` int(11) NOT NULL,
  `friends_id` int(11) NOT NULL,
  `friendship_date` date NOT NULL,
  KEY `client_id` (`client_id`),
  KEY `friends_id` (`friends_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`client_id`, `friends_id`, `friendship_date`) VALUES
(29, 30, '2021-01-28'),
(29, 30, '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE IF NOT EXISTS `hobbies` (
  `hobby_id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(100) NOT NULL,
  PRIMARY KEY (`hobby_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_category` varchar(100) NOT NULL,
  `payment_name` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_category`, `payment_name`, `amount`) VALUES
(1, 'Membership Fee', 'Online Membership', '5');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Client_ID` varchar(100) NOT NULL,
  `Event_ID` varchar(100) NOT NULL,
  `Payment_Type` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
