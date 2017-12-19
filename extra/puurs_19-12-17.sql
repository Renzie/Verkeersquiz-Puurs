-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2017 at 12:04 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `puurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `questionId`, `correct`, `category`) VALUES
(1, 'Ja, Dit is de perfecte systeem', 3, b'0', 0),
(2, 'Nee', 3, b'1', 0),
(3, 'Maybe', 3, b'0', 0),
(19, 'Mag je op straat spelen', 5, b'0', 3),
(20, 'Mogen er geen zebrapaden gemarkeerd worden', 5, b'0', 3),
(21, 'Mag een fietser niet sneller dan 30 rijden', 5, b'1', 3),
(22, 'Dit is geen afbeelding van een verkeersbord', 6, b'0', 3),
(23, 'Dit duidt de voorrang aan bij het eerstvolgende kruispunt', 6, b'1', 3),
(24, 'Op deze weg moet je voorrang geven', 6, b'0', 3),
(25, 'Fietsers', 7, b'0', 3),
(26, 'Fietsers en bromfietsers A (geel plaatje)', 7, b'0', 3),
(27, 'Fietsers, bromfietsers A en bromfietsers B', 7, b'1', 3),
(55, 'new answer', 23, b'0', 3),
(60, 'new answer', 23, b'0', 3),
(61, 'new answer', 23, b'0', 3),
(62, 'new answer', 23, b'0', 3),
(68, 'new answer', 25, b'0', 3),
(69, 'new answer', 25, b'0', 3),
(70, 'new answer', 25, b'0', 3),
(71, 'new answer', 25, b'0', 3),
(73, '1', 26, b'0', 3),
(74, '2', 26, b'0', 3),
(75, '3', 26, b'1', 3),
(76, 'new answer', 28, b'0', 3),
(77, 'new answerfff', 28, b'1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Verkeersborden'),
(2, 'Situaties'),
(3, 'Allerlei'),
(6, 'nieuwe categ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `organizationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `organizationId`) VALUES
(2, 'ICTC', 1),
(3, 'CCCP', 1),
(5, 'SSE', 1),
(7, 'aa', 2),
(8, 'bb', 2);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL,
  `difficulty` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`id`, `difficulty`) VALUES
(1, 'Makkelijk'),
(2, 'Gemiddeld'),
(3, 'Moeilijk');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Maxime', 'password'),
(2, 'Renzie', '$2y$10$HxR/xDXO3.BlUuKGTuwwOuTsPsR0fHchcx.LrTUkI105l4qsXWtAy'),
(3, 'Arthur', '$2y$10$zHh3FtXoWLFkB2M4qWvbJ.MC13TJmVt6g4Bq.eCTXkVajfeJV3w9y');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `timestamp`, `message`) VALUES
(1, '2017-10-26 12:50:33', 'Test'),
(2, '2017-10-26 12:50:33', 'Test2'),
(3, '2017-10-26 12:50:33', 'Tets3'),
(4, '2017-10-26 12:50:33', 'Test4');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `extraInfo`) VALUES
(1, 'HoWest', ''),
(2, 'Vives', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) NOT NULL,
  `imageLink` blob,
  `time` time DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `difficulty`, `imageLink`, `time`, `category`) VALUES
(3, 'Is dit een goeie quiz system', 2, 0x696d6167655175657374696f6e5f332e706e67, '00:00:00', 2),
(4, 'Is dit een goeie admin panel', 1, NULL, '00:00:30', 3),
(5, 'In een Zone 30', 1, '', '00:00:00', 3),
(6, 'Wat betekent dit bord', 1, 0x696d6167655175657374696f6e5f362e706e67, '00:00:00', 3),
(7, 'Wie mag gebruik maken van een fietspad aangeduid met dit bord', 1, 0x696d6167655175657374696f6e5f372e706e67, '00:00:00', 3),
(8, 'Je mag dit verbodsbord voorbij fietsen als', 1, 0x696d6167655175657374696f6e5f382e706e67, '00:00:00', 3),
(23, 'nieuwe vraag', 1, '', '00:00:00', NULL),
(24, 'nieuwe vraag', 1, '', '00:00:00', NULL),
(25, 'nieuwe vraag', 2, '', '00:00:00', NULL),
(26, 'blabla', 2, 0x696d6167655175657374696f6e5f32362e706e67, '00:00:00', NULL),
(27, 'nieuwe vraag', 1, '', '00:00:00', NULL),
(28, 'aaa', 1, '', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `extraInfo`) VALUES
(1, 'Howest Quiz', 'Dit is een dummy quiz'),
(3, 'Verkeersquiz Puurs', 'Quiz van 2015');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizId`, `questionId`) VALUES
(1, 3),
(1, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_template`
--

CREATE TABLE `quiz_template` (
  `id` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_template`
--

INSERT INTO `quiz_template` (`id`, `quizId`, `name`, `template`) VALUES
(6, 1, 'zzzz', '{\"Verkeersborden\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Situaties\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Allerlei\":{\"Makkelijk\":\"1\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"nieuwe categ\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `familyName`, `departmentId`) VALUES
(1, 'Arthur', 'Saprunov', 1),
(2, 'Renzie', 'Oma?a', 1),
(3, 'Maxime', 'Mylle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Question_idx` (`questionId`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Student_idx` (`userId`),
  ADD KEY `Answer_idx` (`awnserId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `School_idx` (`organizationId`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Diff_idx` (`difficulty`),
  ADD KEY `Cat_idx` (`category`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quizId`,`questionId`),
  ADD KEY `_idx` (`questionId`);

--
-- Indexes for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templatequizid` (`quizId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Class_idx` (`departmentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz_template`
--
ALTER TABLE `quiz_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `QuestionForAwnser` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `Answer` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Diff` FOREIGN KEY (`difficulty`) REFERENCES `difficulty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Question_Cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD CONSTRAINT `templatequizid` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`);
