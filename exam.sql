-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2014 at 10:18 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `distancelearningdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `examCode` int(11) NOT NULL,
  `programme` varchar(255) NOT NULL,
  `modules` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `question1Answer` text NOT NULL,
  `question2Answer` text NOT NULL,
  `question3Answer` text NOT NULL,
  `question4Answer` text,
  `question5Answer` text,
  `studentID` int(11) NOT NULL,
  `courseworkmark` float DEFAULT '0',
  `exammark` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`examCode`, `programme`, `modules`, `semester`, `question1Answer`, `question2Answer`, `question3Answer`, `question4Answer`, `question5Answer`, `studentID`, `courseworkmark`, `exammark`) VALUES
(1, 'MSc in Internet Systems', 'Object Oriented Programming in Java and UML', 'Semester A', 'It is used to place a global constraint on a system in VDM-SL', 'We have two type of function in VDM-SL they are Implicit and explicit functions', 'Formal method is used for modelling critical systems while informal method is used for modelling non critical systems', NULL, '', 14002, 80, 85);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `examCode` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(255) NOT NULL,
  `modules` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `question3` varchar(255) NOT NULL,
  `question4` varchar(255) DEFAULT NULL,
  `question5` varchar(255) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `examDate` varchar(50) NOT NULL,
  PRIMARY KEY (`examCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examCode`, `programme`, `modules`, `semester`, `question1`, `question2`, `question3`, `question4`, `question5`, `duration`, `examDate`) VALUES
(1, 'MSc in Internet Systems', 'Object Oriented Programming in Java and UML', 'Semester A', 'Explain the use of state invariance in VDM-SL', 'List the types of functions in VDM-SL with examples', 'Explain the difference between formal and informal software specification', '', '', 60, '10-April-2014'),
(2, 'MSc in Internet Systems', 'Distributed Computing', 'Semester A', 'What are the advantages of distributed computing?', 'Why would you design a system as a distributed system? List some advantages of distributed systems.', 'List three properties of distributed systems', NULL, 'Give a definition of middle-ware and show in a small diagram where it is positioned.', 90, '12-April-2014');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
