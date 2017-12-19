-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: puurs
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `Question_idx` (`questionId`),
  CONSTRAINT `QuestionForAwnser` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Ja, Dit is de perfecte systeem',3,'\0',0),(2,'Nee',3,'',0),(3,'Maybe',3,'\0',0),(19,'Mag je op straat spelen',5,'\0',3),(20,'Mogen er geen zebrapaden gemarkeerd worden',5,'\0',3),(21,'Mag een fietser niet sneller dan 30 rijden',5,'',3),(22,'Dit is geen afbeelding van een verkeersbord',6,'\0',3),(23,'Dit duidt de voorrang aan bij het eerstvolgende kruispunt',6,'',3),(24,'Op deze weg moet je voorrang geven',6,'\0',3),(25,'Fietsers',7,'\0',3),(26,'Fietsers en bromfietsers A (geel plaatje)',7,'\0',3),(27,'Fietsers, bromfietsers A en bromfietsers B',7,'',3),(55,'new answer',23,'\0',3),(60,'new answer',23,'\0',3),(61,'new answer',23,'\0',3),(62,'new answer',23,'\0',3),(68,'new answer',25,'\0',3),(69,'new answer',25,'\0',3),(70,'new answer',25,'\0',3),(71,'new answer',25,'\0',3),(73,'1',26,'\0',3),(74,'2',26,'\0',3),(75,'3',26,'',3),(76,'new answer',28,'\0',3),(77,'new answerfff',28,'',3);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer_user`
--

DROP TABLE IF EXISTS `answer_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Student_idx` (`userId`),
  KEY `Answer_idx` (`awnserId`),
  CONSTRAINT `Answer` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_user`
--

LOCK TABLES `answer_user` WRITE;
/*!40000 ALTER TABLE `answer_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Verkeersborden'),(2,'Situaties'),(3,'Allerlei'),(6,'nieuwe categ');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `organizationId` int(11) NOT NULL,
  `schemeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `School_idx` (`organizationId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (2,'ICTC',1,7),(3,'CCCP',1,7),(5,'SSE',1,NULL),(7,'aa',2,NULL),(8,'bb',2,NULL);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `difficulty`
--

DROP TABLE IF EXISTS `difficulty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difficulty`
--

LOCK TABLES `difficulty` WRITE;
/*!40000 ALTER TABLE `difficulty` DISABLE KEYS */;
INSERT INTO `difficulty` VALUES (1,'Makkelijk'),(2,'Gemiddeld'),(3,'Moeilijk');
/*!40000 ALTER TABLE `difficulty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Maxime','password'),(2,'Renzie','$2y$10$HxR/xDXO3.BlUuKGTuwwOuTsPsR0fHchcx.LrTUkI105l4qsXWtAy'),(3,'Arthur','$2y$10$zHh3FtXoWLFkB2M4qWvbJ.MC13TJmVt6g4Bq.eCTXkVajfeJV3w9y');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'2017-10-26 12:50:33','Test'),(2,'2017-10-26 12:50:33','Test2'),(3,'2017-10-26 12:50:33','Tets3'),(4,'2017-10-26 12:50:33','Test4');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'HoWest',''),(2,'Vives',NULL);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) NOT NULL,
  `imageLink` blob,
  `time` time DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Diff_idx` (`difficulty`),
  KEY `Cat_idx` (`category`),
  CONSTRAINT `Diff` FOREIGN KEY (`difficulty`) REFERENCES `difficulty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Question_Cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (3,'Is dit een goeie quiz system',2,'imageQuestion_3.png','00:00:00',2),(4,'Is dit een goeie admin panel',1,NULL,'00:00:30',3),(5,'In een Zone 30',1,'','00:00:00',3),(6,'Wat betekent dit bord',1,'imageQuestion_6.png','00:00:00',3),(7,'Wie mag gebruik maken van een fietspad aangeduid met dit bord',1,'imageQuestion_7.png','00:00:00',3),(8,'Je mag dit verbodsbord voorbij fietsen als',1,'imageQuestion_8.png','00:00:00',3),(23,'nieuwe vraag',1,'','00:00:00',NULL),(24,'nieuwe vraag',1,'','00:00:00',NULL),(25,'nieuwe vraag',2,'','00:00:00',NULL),(26,'blabla',2,'imageQuestion_26.png','00:00:00',NULL),(27,'nieuwe vraag',1,'','00:00:00',NULL),(28,'aaa',1,'','00:00:00',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Howest Quiz','Dit is een dummy quiz'),(3,'Verkeersquiz Puurs','Quiz van 2015');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`quizId`,`questionId`),
  KEY `_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (1,3),(1,4),(3,5),(3,6),(3,7),(3,8),(3,9),(3,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28);
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_template`
--

DROP TABLE IF EXISTS `quiz_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatequizid` (`quizId`),
  CONSTRAINT `templatequizid` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_template`
--

LOCK TABLES `quiz_template` WRITE;
/*!40000 ALTER TABLE `quiz_template` DISABLE KEYS */;
INSERT INTO `quiz_template` VALUES (6,1,'zzzz','{\"Verkeersborden\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Situaties\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Allerlei\":{\"Makkelijk\":\"1\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"nieuwe categ\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"}}'),(7,1,'nvjdksnls','{\"Verkeersborden\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Situaties\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Allerlei\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"nieuwe categ\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"}}'),(8,1,'Test','{\"Verkeersborden\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Situaties\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"Allerlei\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"},\"nieuwe categ\":{\"Makkelijk\":\"0\",\"Gemiddeld\":\"0\",\"Moeilijk\":\"0\"}}');
/*!40000 ALTER TABLE `quiz_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Class_idx` (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Arthur','Saprunov',1),(2,'Renzie','Oma?a',1),(3,'Maxime','Mylle',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-19 14:46:29
