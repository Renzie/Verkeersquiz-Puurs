-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: verkeersquiz.eu.mysql:3306
-- Generation Time: Mar 16, 2018 at 07:21 PM
-- Server version: 10.1.30-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `verkeersquiz_eu`
--
CREATE DATABASE `verkeersquiz_eu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `verkeersquiz_eu`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Question_idx` (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE IF NOT EXISTS `answer_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Student_idx` (`userId`),
  KEY `Answer_idx` (`awnserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `organisationId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `School_idx` (`organisationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Thomas', '$2y$10$Aq9tfASpWfKvLqYNKpJxyOCALSsnN48MKtmb5TOutd/1W3uvkHTTi');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;


--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `imageLink` longtext,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Diff_idx` (`difficulty`),
  KEY `Cat_idx` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`quizId`,`questionId`),
  KEY `_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_template`
--

CREATE TABLE IF NOT EXISTS `quiz_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatequizid` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `template_department`
--

CREATE TABLE IF NOT EXISTS `template_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemaId` int(11) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_idx` (`departmentId`),
  KEY `shema_idx` (`schemaId`),
  KEY `quizId` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `template_question`
--

CREATE TABLE IF NOT EXISTS `template_question` (
  `templateId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`templateId`,`questionId`),
  KEY `question_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Class_idx` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_user_ibfk_1` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `oragnisation` FOREIGN KEY (`organisationId`) REFERENCES `organisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Diff` FOREIGN KEY (`difficulty`) REFERENCES `difficulty` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Question_Cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD CONSTRAINT `quiz_template_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_department`
--
ALTER TABLE `template_department`
  ADD CONSTRAINT `department` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shema` FOREIGN KEY (`schemaId`) REFERENCES `quiz_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_department_ibfk_2` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_question`
--
ALTER TABLE `template_question`
  ADD CONSTRAINT `question` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_question_ibfk_1` FOREIGN KEY (`templateId`) REFERENCES `template_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
