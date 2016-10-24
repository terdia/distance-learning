-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2014 at 06:59 AM
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
CREATE DATABASE `distancelearningdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `distancelearningdb`;

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
(1, 'MSc in Internet Systems', 'Object Oriented Programming in Java and UML', 'Semester A', 'It is used to place a global constraint on a system in VDM-SL', 'We have two type of function in VDM-SL they are Implicit and explicit functions', 'Formal method is used for modelling critical systems while informal method is used for modelling non critical systems', NULL, '', 14002, 80, 85),
(1, 'MSc in Internet Systems', 'Object Oriented Programming ', 'Semester A', 'It is used to place a global constraint on a system in VDM-SL', 'We have two type of function in VDM-SL they are Implicit and explicit functions', 'Formal method is used for modelling critical systems while informal method is used for modelling non critical systems', NULL, '', 14002, 80, 56),
(2, 'MSc in Internet Systems', 'Distributed Computing', 'Semester A', 'Lets seet this fuctioj', 'Lets seet this fuctioj', 'Lets seet this fuctioj', NULL, 'Lets seet this fuctioj', 14002, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `modulename` varchar(255) NOT NULL,
  `topic` varchar(250) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`upload_id`, `programme`, `semester`, `modulename`, `topic`) VALUES
(1, 'MSc in Internet Systems', 'Semester A', 'Distributed Computing', 'Building_Computer_systems'),
(2, 'MSc in Internet Systems', 'Semester A', 'Software Engineering for the Internet', 'intro_to_internet'),
(3, 'MSc in Internet Systems', 'Semester A', 'Object Oriented Programming in Java and UML', 'uml_diagrams'),
(4, 'MSc in Software Engineering', 'Semester A', 'Mobile Application Development', 'Andriod_app_development'),
(5, 'MSc in Software Engineering', 'Semester A', 'Software Components ', 'voting_system_development'),
(6, 'MSc in Software Engineering', 'Semester A', 'Advanced Software Engineering', 'formal_specification_VDM');

-- --------------------------------------------------------

--
-- Table structure for table `course_request`
--

CREATE TABLE IF NOT EXISTS `course_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(50) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `age_group` varchar(20) NOT NULL,
  `work_experience` varchar(20) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course_request`
--

INSERT INTO `course_request` (`request_id`, `programme`, `firstname`, `lastname`, `email`, `phone`, `city`, `country`, `age_group`, `work_experience`) VALUES
(1, 'Masters of Business Administration', 'Ogbemudia', 'Terry', 'terrymarcy@yahoo.com', '0122729684', 'Oredo', 'NG', 'Age 26 to 30', '2'),
(2, 'Master of Science in Computer Security', 'Solomon', 'Osayawe', 'terdia4christ@gmail.com', '0122729684', 'Bini', 'AU', 'Age 36 and over', '10-15'),
(3, 'Masters of Business Administration', 'Ogbemudia', 'Tanta', 'terdis4christ@live.com', '0122729684', 'KL', 'FM', 'Age 26 to 30', '5'),
(4, 'Masters of Business Administration', 'Ogbemudia', 'Terry', 'test@yahoo.com', '0122729684', 'Oredo', 'AO', 'Age 31 to 35', '16-20'),
(5, 'Masters of Business Administration', 'Ogbemudia', 'Terry', 'terdia@yahoo.com', '01133037042', 'Oredo', 'AG', 'Age 31 to 35', '16-20'),
(6, 'Masters of Business Administration', 'Ogbemudia', 'Osayawe', 'terdia@yahoo.com', '01133037042', 'Oredo', 'AD', 'Age 26 to 30', '10-15'),
(7, 'Master of Science in Software Engineering', 'Osayawe', 'Tanda', 'test@yahoo.com', '0122729684', 'Oredo', 'AO', 'Age 31 to 35', '21-30'),
(8, 'Master of Science in Computer Security', 'Ogbemudia', 'Chimbwanda', 'terdia@yahoo.com', '01133037042', 'Oredo dd', 'AO', 'Age 26 to 30', '16-20');

-- --------------------------------------------------------

--
-- Table structure for table `coursematerial`
--

CREATE TABLE IF NOT EXISTS `coursematerial` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(254) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `modulename` varchar(255) NOT NULL,
  `week` varchar(30) NOT NULL,
  `topic` varchar(250) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coursematerial`
--

INSERT INTO `coursematerial` (`upload_id`, `programme`, `semester`, `modulename`, `week`, `topic`) VALUES
(1, 'MSc in Internet Systems', 'Semester A', 'Object Oriented Programming in Java and UML', 'Week 1', 'uml_diagrams'),
(2, 'MSc in Internet Systems', 'Semester A', 'Software Engineering for the Internet', 'Week 1', 'intro_to_internet'),
(3, 'MSc in Internet Systems', 'Semester A', 'Distributed Computing', 'Week 1', 'intro_computing'),
(4, 'MSc in Software Engineering', 'Semester A', 'Mobile Application Development', 'Week 1', 'Activity'),
(7, 'MSc in Software Engineering', 'Semester A', 'Advanced Software Engineering', 'Week 1', 'intro_to_csharp');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_code` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `school` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `credit` varchar(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `module_code`, `semester`, `school`, `programme`, `course_title`, `credit`) VALUES
(1, 'SD4041', 'Semester A', 'Computer Science', 'MSc in Software Engineering', 'Advanced Software Engineering', '20'),
(2, 'SD4042', 'Semester A', 'Computer Science', 'MSc in Software Engineering', 'Software Components ', '20'),
(3, 'IM4054', 'Semester A', 'Computer Science', 'MSc in Software Engineering', 'Mobile Application Development', '20'),
(4, 'SD4012', 'Semester B', 'Computer Science', 'MSc in Software Engineering', 'Service Oriented Architecture', '20'),
(5, 'IM4084', 'Semester B', 'Computer Science', 'MSc in Software Engineering', 'Web Software Engineering', '20'),
(6, 'CN4031', 'Semester B', 'Computer Science', 'MSc in Software Engineering', 'Research Practice', '20'),
(7, 'CN4082', 'Semester C', 'Computer Science', 'MSc in Software Engineering', 'Master Project ', '20'),
(8, 'EL4021', 'Semester C', 'Computer Science', 'MSc in Software Engineering', 'Elective module', '20'),
(9, 'GK5109', 'Semester A', 'Computer Science', 'MSc in Internet Systems', 'Object Oriented Programming in Java and UML', '20'),
(10, 'GK5187', 'Semester A', 'Computer Science', 'MSc in Internet Systems', 'Software Engineering for the Internet', '20'),
(11, 'GK2098', 'Semester A', 'Computer Science', 'MSc in Internet Systems', 'Distributed Computing', '20'),
(12, 'IS4093', 'Semester B', 'Computer Science', 'MSc in Internet Systems', 'Enterprise and Distributed Systems', '20'),
(13, 'IS4120', 'Semester B', 'Computer Science', 'MSc in Internet Systems', 'Research Methods and Professional Issues', '20'),
(14, 'IS4531', 'Semester B', 'Computer Science', 'MSc in Internet Systems', 'Web Technology', '20'),
(15, 'SD9082', 'Semester C', 'Computer Science', 'MSc in Internet Systems', 'Digital Imaging', '20'),
(17, 'SD8765', 'Semester C', 'Computer Science', 'MSc in Internet Systems', 'Dissertation', '20'),
(18, 'CS8102', 'Semester A', 'Computer Science', 'MSc in Computer Security', 'System Security', '20'),
(19, 'CS8105', 'Semester A', 'Computer Science', 'MSc in Computer Security', 'System Validation', '20'),
(20, 'CS8201', 'Semester A', 'Computer Science', 'MSc in Computer Security', 'The Challenge of Dependable Systems', '20'),
(21, 'CS8202', 'Semester B', 'Computer Science', 'MSc in Computer Security', ' Information Security and Trust', '20'),
(22, 'CS8203', 'Semester B', 'Computer Science', 'MSc in Computer Security', ' Human Factors Engineering', '20'),
(23, 'CS8205', 'Semester B', 'Computer Science', 'MSc in Computer Security', ' Research Skills', '20'),
(24, 'CS8404', 'Semester C', 'Computer Science', 'MSc in Computer Security', ' Advanced Programming in Java', '20'),
(25, 'CS8299', 'Semester C', 'Computer Science', 'MSc in Computer Security', 'Project and Dissertation', '20');

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
(2, 'MSc in Internet Systems', 'Distributed Computing', 'Semester A', 'What are the advantages of distributed computing?', 'Why would you design a system as a distributed system? List some advantages of distributed systems.', 'List three properties of distributed systems', NULL, 'Give a definition of middle-ware and show in a small diagram where it is positioned.', 90, '5-May-2014');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_userid` int(11) NOT NULL,
  `post_username` varchar(60) NOT NULL,
  `the_post` text NOT NULL,
  `post_time` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`post_id`, `post_userid`, `post_username`, `the_post`, `post_time`) VALUES
(1, 14002, 'Joy', 'Hello please when is the final presentation for Distributed Learning?', '2014-03-13 10:59:20'),
(2, 14004, 'Franklin', 'I want tip on Object Oriented programming Assignment, can anyone help?', '2014-03-13 11:00:58'),
(6, 14005, 'Christain ', 'I love online learning, so much what do you guys think', '2014-03-13 11:31:05'),
(7, 14002, 'Joy', 'Can anyone connect with me on ec2 server for the assignment ', '2014-03-14 15:05:43'),
(8, 14001, 'Jude ', 'Online education is definitely the order of the day. Lecturers simply compile lesson note / video and upload ', '2014-03-14 15:08:37'),
(9, 14002, 'Joy', 'Assignment has been uploaded ', '2014-04-03 22:25:13'),
(10, 10001, 'Riyaz', 'All MSc in Internet Systems student should please note that the deadline for assignment submission has been extended by one week.', '2014-05-08 10:09:22'),
(11, 10001, 'Riyaz', 'Yes Joy please include all source code but you do not need to submit your source code to turnitin', '2014-05-08 10:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ic` varchar(25) NOT NULL,
  `amount_due` float NOT NULL,
  `amount_paid` float NOT NULL,
  `balance` float NOT NULL,
  `pay_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`),
  UNIQUE KEY `ic` (`ic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `ic`, `amount_due`, `amount_paid`, `balance`, `pay_date`) VALUES
(1, 'A02764362', 24900, 24900, 0, '2014-02-21 17:46:28'),
(4, 'A01982221', 23000, 23000, 0, '2014-03-11 07:45:08'),
(5, 'A01982222', 22000, 22000, 0, '2014-03-11 07:58:27'),
(6, 'A01272221', 21000, 21000, 0, '2014-03-11 08:27:24'),
(7, 'A01560926', 23000, 23000, 0, '2014-04-12 17:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `coursename`, `description`) VALUES
(1, 'MSc in Computer Security', '<p>\nThe 100% online MSc in Computer Security from FTMS College aims to equip students with the knowledge and skills to handle the challenges of this fast-expanding area. Students examine the global threats to electronically stored and transmitted information, and the countermeasures that can be used against them. The programme covers a wide variety of technologies and disciplines, including cryptography, forensics, network design and programming the internet, along with an examination of commercial and legal considerations that influence security policy. \n</p>\n\n\n<h5>Become an expert in your field</h5>\n\nGraduates leave the programme with the technical and commercial expertise that is increasingly in demand in today''s information-dependent world. This advanced, specialist qualification can provide the foundation for a senior career as a computer security expert in a dynamic global organization.\n\n<h5>Earn your MSc in Computer Security online</h5>\n\nStudy online and enjoy:\n\n<p> \n<ul class="list">\n<li>The flexibility to study while you work</li>\n\n<li>Collaborative online learning with other professionals in your field</li>\n\n<li>Sharing of best computer security practices around the world</li>\n\n<li>100% online assessment, no traveling to campus</li>\n\n<li>Knowledge you can apply immediately</li>\n</ul>  \n</p>\n\n<p>\nUnlike traditional ''distance learning'', the online MSc in Computer Security from FTMS College offers you a highly interactive experience and the opportunity to build your international network as well as enhance your knowledge of global IT trends.\n</p>'),
(2, 'MSc in Software Engineering', '<p>\nThe 100% online MSc in Software Engineering is designed to provide students with a complete understanding of every aspect of the development process, from concept and design to testing, QA and implementation. In addition, students can customize their degree by choosing from a variety of elective modules; XML, e-commerce, security engineering and more. \n</p>\n\n\n<h5>Become an expert in your field</h5>\n\nGraduates develop the theoretical knowledge and technical and project management skills required to manage even the most complex software development projects. On leaving the course, students can move ahead in senior careers in the field of software engineering, one of the most exacting and dynamic areas in IT.\n\n<h5>Earn your MSc in Software Engineering online</h5>\n\nStudy online and enjoy:\n\n<p>  \n<ul class="list">\n<li>The flexibility to study while you work</li>\n\n<li>Collaborative online learning with other professionals in your field</li>\n\n<li>Sharing of best computer security practices around the world</li>\n\n<li>100% online assessment, no traveling to campus</li>\n\n<li>Knowledge you can apply immediately</li>\n</ul>  \n</p>\n\n<p>\nUnlike traditional ''distance learning'', the online MSc in Software Engineering from FTMS College offers you a highly interactive experience and the opportunity to build your international network as well as enhance your knowledge of global IT trends.\n</p>'),
(3, 'MSc in Internet Systems', '<p>\nThe 100% online MSc in Internet Systems from FTMS College offers ambitious web developers the opportunity to amass high-level technical skills and knowledge that will enable them to master the most complex internet projects. It offers the theoretical and practical expertise needed to produce better functioning, scalable systems in a wide variety of commercial and other contexts. The online format makes the programme perfectly suited to the subject matter, with students interacting across the globe in the international virtual classroom. \n</p>\n\n\n<h5>Become an expert in your field</h5>\n\nGraduates leave the programme equipped with leading-edge technical knowledge as well as an awareness of the commercial and other imperatives that influence the development and success of today''s internet systems. They should be ideally placed for a variety of high-level careers in professional web development.\n\n<h5>Earn your MSc in Internet Systems online</h5>\n\nStudy online and enjoy:\n\n<p> \n<ul  class="list">\n<li>The flexibility to study while you work</li>\n\n<li>Collaborative online learning with other professionals in your field</li>\n\n<li>Sharing of best computer security practices around the world</li>\n\n<li>100% online assessment, no traveling to campus</li>\n\n<li>Knowledge you can apply immediately</li>\n</ul>  \n</p>\n\n<p>\nUnlike traditional ''distance learning'', the online MSc in Internet Systems from FTMS College offers you a highly interactive experience and the opportunity to build your international network as well as enhance your knowledge of global IT trends. \n</p>'),
(4, 'Admission and Financing', '<p>\nThe tuition and fees for each FTMS College online postgraduate degree vary, as the programmes are tailored to the specific needs of professionals in each field. To learn more about tuition costs, please complete the information request form and an Enrolment Advisor will be in touch with you.\n</p>\n\n\n<h5>Monthly payment plans</h5>\n\nTo help you manage the costs of your University of Liverpool degree programme, we offer a number of tuition payment options, including:\n\n<p>  \n<ul class="list">\n<li>A single instalment to give you the best possible savings.</li>\n\n<li>A monthly payment plan to spread your tuition fees over 36 or 45 months.</li>\n\n<li>A pay-as-you-go plan so you pay as you progress through your degree.</li>\n\n<li>A three-instalment plan that lowers the cost of your tuition.</li>\n</ul>  \n</p>\n\n<h5>General admission requirements</h5>\n\nThe admission requirements for FTMS College online program vary depending on the programme you choose. They include:\n\n<p>  \n<ul class="list">\n<li>Education level, usually a bachelors degree, depending on the study for which you are applying; vocational and professional qualifications can also count.</li>\n\n<li>Work experience, you may be expected to have a minimum amount of relevant working experience.</li>\n\n<li>English proficiency, If English is not your native language, you will be asked to demonstrate a particular level of English proficiency.</li>\n</ul>  \n</p>\n\n\n<p>\nTo find out if you meet the admission requirements of the programme of your choice, please complete the information request form and an Enrolment Advisor will be in touch.\n</p>'),
(5, 'Online Learning', '<p>\nToday''s organisations require profound specialist knowledge, but also flexible thinking, subtle management skills, practical expertise and the ability to work with a diverse group of people.\n</p>\n\n\n<h5>A new way of learning</h5>\n\nThese demands are way beyond the capabilities of traditional classroom and distance learning methods. By bringing like minded professionals together in our unique 100% online learning environment, we enable them to share the latest thinking from the real world.\n\n<h5>A degree that fits into your life</h5>\n\nAll of your coursework, class discussions and group projects take place in an online environment which is ''asynchronous''. There are no fixed lecture times, the classroom is always open and you don''t need to synchronize your study with anyone else. You can interact with your instructors and fellow students whenever and wherever you want\n\n<h5>Family, friends and work</h5>\n\n<p>\nFor most of our students, a programme is a joint undertaking outside the virtual classroom too. You will need the full support of your family, friends and employer if you are to surmount the many challenges of this holistic experience. But, as you steadily transform your professional knowledge and skills into a respected qualification, you can expect the rewards of an unparalleled sense of satisfaction, renewed confidence and increased effectiveness in your job.\n</p>'),
(6, 'Privacy Policy', '<p>\nFTMS College Online Education presents this Statement of Privacy to you in order to demonstrate its firm commitment to privacy. The following information discloses FTMS College Online Education''s data collection, maintaining, processing and transfer practices with relation to this website <a href="http://54.254.219.40" target="_blank"> ftms-distance-learning-portal</a>.\n</p>\n\n<p>FTMS College Online Education values each and every one of its website''s visitors and their privacy. However, please note that this website may contain links to other websites. Naturally, FTMS College Online Education is not responsible for the privacy practices or the content of such other websites. </p>\n\n\n<h5>Information we collect</h5>\n\nThe registration process to services provided by FTMS College Online Education on its web-site requires you to provide it with your personal information. Such information, as well as other information which may be gathered while you are visiting FTMS College Online Education''s website, may be used by FTMS College Online Education and its affiliates  to various ends, such as: (a) to contact you in order to confirm your registration; (b) to provide you with further information about our programmes at FTMS and other FTMS College affiliated institutions ; (c) to execute and apply your agreement(s) with FTMS College Online Education; (d) to properly administer FTMS Online Education activities; (e) to contact consumers for marketing and operational purposes as you may receive telephone or email contact from us with information regarding special promotions, new products and services, or upcoming events and (f) to allow FTMS College Online Education to fully provide you with the services offered by it.\n\n<h5>Security of personal information</h5>\n\nOur personal information is stored on servers, which are protected by security measures to protect the data against access by unauthorized individuals.\n\n<h5>Contact us</h5>\n\n<p>\nShould you have any questions or comments regarding this Statement of Privacy, please do not hesitate to <a href="contact"> contact us </a>\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `replythread`
--

CREATE TABLE IF NOT EXISTS `replythread` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `reply_userID` int(11) NOT NULL,
  `reply_username` varchar(60) NOT NULL,
  `reply` text NOT NULL,
  `reply_time` datetime NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `replythread`
--

INSERT INTO `replythread` (`reply_id`, `post_id`, `reply_userID`, `reply_username`, `reply`, `reply_time`) VALUES
(1, 6, 14002, 'Joy', 'Online eduction is simply wonderful!', '2014-03-13 18:14:41'),
(3, 6, 14004, 'Franklin', 'That is a good one, though I still prefer traditional class room learning.', '2014-03-13 19:21:08'),
(6, 2, 14001, 'Jude ', 'You can get it from the school library', '2014-03-13 20:01:43'),
(7, 6, 14001, 'Jude ', 'Now I can learn from the comfort of my home', '2014-03-13 20:03:29'),
(8, 10, 14002, 'Joy', 'Sir, do we need to also include the source code?', '2014-05-08 10:16:19'),
(9, 10, 14001, 'Jude ', '@Joy, I guess we are suppose to include everything related to the task and that includes the source code ', '2014-05-08 10:19:37'),
(12, 10, 10001, 'Riyaz', 'Yes Joy please include all source code but you do not need to submit your source code to turnitin.', '2014-05-08 10:28:56'),
(13, 10, 14002, 'Joy', 'Ok sir, thanks', '2014-05-08 10:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `semester_registration`
--

CREATE TABLE IF NOT EXISTS `semester_registration` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(11) NOT NULL,
  `ic` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `outstanding_due` int(11) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `modules` varchar(255) NOT NULL,
  `academic_year` varchar(25) NOT NULL,
  `registeration_date` datetime NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `semester_registration`
--

INSERT INTO `semester_registration` (`semester_id`, `matric_no`, `ic`, `fullname`, `outstanding_due`, `programme`, `semester`, `modules`, `academic_year`, `registeration_date`) VALUES
(1, '14000', 'A02764362', 'Efosa Osayawe', 0, 'MSc in Software Engineering', 'Semester A', 'Advanced Software Engineering,Software Components ,Mobile Application Development', '2014/15', '2014-02-23 14:59:46'),
(2, '14002', 'A01982221', 'Joy David', 0, 'MSc in Internet Systems', 'Semester A', 'Object Oriented Programming in Java and UML,Software Engineering for the Internet,Distributed Computing', '2014/15', '2014-03-11 07:45:27'),
(3, '14003', 'A01982222', 'Emmanuel Moses Osayawe', 0, 'MSc in Software Engineering', 'Semester A', 'Advanced Software Engineering,Software Components ,Mobile Application Development', '2014/15', '2014-03-11 07:58:49'),
(4, '14005', 'A01272221', 'Christain  Emmanuel', 0, 'MSc in Computer Security', 'Semester A', 'System Security,System Validation,The Challenge of Dependable Systems', '2014/15', '2014-03-11 08:27:40'),
(5, 'u14006', 'A01560926', 'Freds Cosmos', 0, 'MSc in Internet Systems', 'Semester A', 'Object Oriented Programming in Java and UML,Distributed Computing', '2014/15', '2014-04-12 17:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(25) NOT NULL AUTO_INCREMENT,
  `ic` varchar(25) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(17) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(10) DEFAULT NULL,
  `department` varchar(30) NOT NULL,
  `course` varchar(30) DEFAULT NULL,
  `qualification` varchar(69) NOT NULL,
  `designation` varchar(69) DEFAULT NULL,
  `profile` varchar(15) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `employ_date` datetime DEFAULT NULL,
  `registered_from` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10004 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `ic`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `gender`, `nationality`, `department`, `course`, `qualification`, `designation`, `profile`, `status`, `employ_date`, `registered_from`, `last_login`, `last_login_ip`) VALUES
(10000, 'A02764362', 'Terry', 'Osayawe', 'terrymarcy2000@yahoo.com', '17-May-1983', '01133037042', 'Taman LTAT Bukit Jalil Indah 4', 'Male', 'Nigerian', '', NULL, '', NULL, 'Admin', 'Active', NULL, '192.168.6.1', '2014-04-12 17:39:13', '127.0.0.1'),
(10001, 'A02764361', 'Riyaz', 'Ah Ahmed', 'riyaz@ftms.edu.my', 'testing', '01133037042', 'Jalan Amapuri Ampang Point', 'Male', 'Indian', 'Computer Science', 'MSc in Internet Systems', 'Master in Computing', 'Programme Leader', 'Lecturer', 'Active', '2014-02-16 00:00:05', '192.168.6.1', '2014-05-08 10:20:25', '127.0.0.1'),
(10002, 'M01562221', 'Kinn', 'Abbass', 'kinn@ftms.edu.my', 'testing', '0122729684', 'Batu 12 Negari Senbilan', 'Male', 'Ghanian', 'Computer Science', 'MSc in Software Engineering', 'Masters in Information System Management', 'Senior Lecturer', 'Lecturer', 'Active', '2014-02-15 16:23:13', '192.168.6.1', '2014-04-05 10:44:20', '127.0.0.1'),
(10003, 'A222222222', 'ftms', 'ftms', 'ftms@yahoo.com', 'A222222222', '01133037042', 'FTMS COLLEGE', 'Female', 'ftms', 'Computer Science', 'MSc in Computer Security', 'Msc Somethin', 'Module leader', 'Lecturer', 'Active', '2014-04-11 15:10:54', '127.0.0.1', '2014-04-11 15:13:03', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `modulename` varchar(255) NOT NULL,
  `submitID` int(50) NOT NULL,
  `submit_date` datetime NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`upload_id`, `programme`, `semester`, `modulename`, `submitID`, `submit_date`) VALUES
(1, 'MSc in Internet Systems', 'Semester A', 'Distributed Computing', 14002, '2014-04-04 17:43:53'),
(2, 'MSc in Internet Systems', 'Semester A', 'Software Engineering for the Internet', 14002, '2014-04-04 17:44:03'),
(3, 'MSc in Internet Systems', 'Semester A', 'Distributed Computing', 14002, '2014-04-13 20:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `subscriber_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `ip` varchar(25) NOT NULL DEFAULT '192.168.0.1',
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`subscriber_id`, `email`, `ip`) VALUES
(2, 'terrymarcy2000@yahoo.com', '192.168.0.1'),
(4, 'liza@yahoo.com', '192.168.0.1'),
(5, 'marklee@yahoo.com', '192.168.0.1'),
(6, 'marcylives@yahoo.com', '192.168.0.1'),
(7, 'terrymarcy2000 @@yy.com', '192.168.0.1'),
(9, 'felicai@gmail.com', '192.168.0.1'),
(10, 'grace2@gmail.com', '175.142.23.154'),
(11, 'victor@gmail.com', '175.142.23.154'),
(13, 'sandragold@gmail.com', '175.142.23.154'),
(14, 'sandragold@gmail.com', '175.142.23.154'),
(15, 'marcylives@yahoo.com', '115.164.186.221'),
(16, 'ridwa@ftms.edu.my', '27.131.41.50'),
(17, 'jude@yahoo.com', '127.0.0.1'),
(18, 'terrymarcy2000@yahoo.com', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `matric_no` int(25) NOT NULL AUTO_INCREMENT,
  `ic` varchar(25) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(17) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(10) DEFAULT NULL,
  `department` varchar(30) NOT NULL,
  `course` varchar(30) DEFAULT NULL,
  `intake` varchar(35) DEFAULT NULL,
  `last_school_year` varchar(20) DEFAULT NULL,
  `next_kin_name` varchar(40) DEFAULT NULL,
  `next_kin_phone` varchar(17) DEFAULT NULL,
  `next_kin_occupation` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `profile` varchar(15) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `enroll_date` datetime DEFAULT NULL,
  `registered_from` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`matric_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14009 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matric_no`, `ic`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `dob`, `gender`, `nationality`, `department`, `course`, `intake`, `last_school_year`, `next_kin_name`, `next_kin_phone`, `next_kin_occupation`, `avatar`, `profile`, `twitter`, `status`, `enroll_date`, `registered_from`, `last_login`, `last_login_ip`) VALUES
(14000, 'A02764362', 'Efosa', 'Osayawe', 'efosa@yahoo.com', '2-January-1985', '01133037042', '20 Dawson Road Off Mission Road, Benin City', '2-January-1985', 'Male', 'Nigerian', 'Computer Science', 'MSc in Software Engineering', '100100', '2004', 'Emmanuel Osayawe', '0122729684', 'Electrical Engineer', '537185868.jpg', 'Student', NULL, 'Active', '2014-02-15 16:37:54', '54.254.219.40', '2014-04-05 11:16:57', '127.0.0.1'),
(14001, 'A02764361', 'Jude ', 'Nwanfada', 'jude@yahoo.com', '5-May-1982', '0122729684', 'Technology Park Malaysia ', '5-May-1982', 'Male', 'Nigerian', 'Computer Science', 'MSc in Internet Systems', '100101', '2011', 'Micheal Nwanfada', '0122729684', 'Senator', '75300602.jpg', 'Student', NULL, 'Active', '2014-02-24 06:56:58', '54.254.219.40', '2014-05-08 10:18:27', '127.0.0.1'),
(14002, 'A01982221', 'Joy', 'David', 'joy@yahoo.com', 'testing', '01133037042', 'Taman LTAT Bukit Jalil', '13-October-1985', 'Female', 'Nigerian', 'Computer Science', 'MSc in Internet Systems', '101298', '2012', 'Blessing David', '0122729684', 'Nysc', '-516162354.jpg', 'Student', NULL, 'Active', '2014-03-11 07:43:48', '175.145.120.209', '2014-05-08 10:15:33', '127.0.0.1'),
(14003, 'A01982222', 'Emmanuel Moses', 'Osayawe', 'emma@hotmail.com', '9-September-1988', '01133037042', 'Taman LTAT', '9-September-1988', 'Male', 'Ghanian', 'Computer Science', 'MSc in Software Engineering', '109262', '2011', 'Osayawe Uyi', '0122729684', 'Student', '-129648951.jpg', 'Student', NULL, 'Active', '2014-03-11 07:55:05', '175.145.120.209', '2014-03-11 08:42:07', '175.145.120.209'),
(14004, 'A01982223', 'Franklin', 'Ochudeo', 'frank@yahoo.com', '9-November-1983', '01133037042', 'Jalan 1234 Util 3', '9-November-1983', 'Male', 'Malaysia', 'Computer Science', 'MSc in Internet Systems', '100927', '2012', 'Jude Azike', '0122729684', 'Lecturer', '-499393824.jpg', 'Student', NULL, 'Active', '2014-03-11 08:01:11', '175.145.120.209', '2014-03-13 20:50:27', '127.0.0.1'),
(14005, 'A01272221', 'Christain ', 'Emmanuel', 'chris@hotmail.com', '5-March-1982', '01133037042', '20 Dawson Road', '5-March-1982', 'Male', 'Nigerian', 'Computer Science', 'MSc in Computer Security', '100192', '2013', 'Jude Akpos', '0122729684', 'Engineer', '-222917526.jpg', 'Student', NULL, 'Active', '2014-03-11 08:26:46', '175.145.120.209', '2014-03-13 11:30:01', '127.0.0.1'),
(14006, 'A01560926', 'Freds', 'Cosmos', 'fred@yahoo.com', '2-April-1990', '01133037042', '20 Dawson road, off mission road Benin City', '2-April-1990', 'Male', 'Nigerian', 'Computer Science', 'MSc in Internet Systems', '291620', '2012', 'Marcus Fidel', '0122729684', 'Engineer', '685612986.jpg', 'Student', NULL, 'Active', '2014-04-12 16:25:15', '127.0.0.1', '2014-04-12 21:34:24', '127.0.0.1'),
(14007, 'S201982221', 'Mark', 'Lewis', NULL, '1-January-1995', NULL, NULL, '1-January-1995', 'Male', 'India', 'Computer Science', 'MSc in Internet Systems', '887407', '2014', NULL, NULL, NULL, NULL, 'Student', NULL, 'Active', NULL, NULL, NULL, NULL),
(14008, 'A01562289', 'tetsss', 'sssssss', 'testing@y.com', '10-July-1992', '01133037042', 'taman ltat', '10-July-1992', 'Male', 'sssssss', 'Computer Science', 'MSc in Internet Systems', '606577', '2012', 'rtyyyuy', '0987766666', 'rttttyyyyyyy', NULL, 'Student', NULL, 'Active', '2014-04-14 15:51:22', '127.0.0.1', '2014-04-14 15:52:27', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
