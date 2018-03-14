CREATE DATABASE  IF NOT EXISTS `kajakklubben` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kajakklubben`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kajakklubben
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Dumping data for table `contacs`
--

LOCK TABLES `contacs` WRITE;
/*!40000 ALTER TABLE `contacs` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eventsubscribers`
--

LOCK TABLES `eventsubscribers` WRITE;
/*!40000 ALTER TABLE `eventsubscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventsubscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kajaks`
--

LOCK TABLES `kajaks` WRITE;
/*!40000 ALTER TABLE `kajaks` DISABLE KEYS */;
/*!40000 ALTER TABLE `kajaks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kajaktypes`
--

LOCK TABLES `kajaktypes` WRITE;
/*!40000 ALTER TABLE `kajaktypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `kajaktypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (2,'Test','&#60;p&#62;tester&#60;br /&#62;Test&#60;/p&#62;','2018-03-14','2018-03-29'),(3,'test 2','&#60;p&#62;tester&#60;br /&#62;tester&#60;/p&#62;&#13;&#10;&#60;p&#62;&#38;aelig;lk&#60;/p&#62;','2018-03-01','2018-03-15'),(4,'Tester 4','&#60;p&#62;sdklfsf&#60;br /&#62;sdf&#60;br /&#62;asdd&#60;/p&#62;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;','2018-03-15','2018-03-29'),(11,'200 tegn','&#60;p&#62;sdf&#38;aelig;lsdkf&#38;aelig;lsdkf&#38;aelig;lsdkf&#60;/p&#62;&#13;&#10;&#60;p&#62;sdf&#38;aelig;lsdkfsd&#38;aelig;lfksd&#38;aelig;lfksdf&#60;/p&#62;','2018-03-07','2018-03-22'),(12,'ælsdkfælsdkf','&#60;p&#62;flskf&#38;aelig;lks&#60;/p&#62;&#13;&#10;&#60;p&#62;sfsdfsdfsdf&#60;/p&#62;&#13;&#10;&#60;p&#62;sdfsdfsf&#60;/p&#62;','2018-03-07','2018-03-15'),(13,'200 tegn, no problem 23','&#60;p&#62;ldsfk&#38;aelig;lsdfksld&#38;aelig;fksldfksd&#38;aelig;lfksdf&#60;/p&#62;&#13;&#10;&#60;p&#62;sdfsdfsdf&#60;/p&#62;&#13;&#10;&#60;p&#62;sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsd&#60;/p&#62;&#13;&#10;&#60;p&#62;sdfsdfsfsdfsdfsfsdfsdfsdfsdfsf&#60;/p&#62;','2018-03-08','2018-03-25'),(14,'ældfksælfksdælfksdælf','&#60;p&#62;sd&#38;aelig;flskd&#38;aelig;flsdk&#38;aelig;flsdksd&#38;aelig;flk&#60;/p&#62;','2018-03-01','2018-03-31');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `newslettersubscribers`
--

LOCK TABLES `newslettersubscribers` WRITE;
/*!40000 ALTER TABLE `newslettersubscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `newslettersubscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roletypes`
--

LOCK TABLES `roletypes` WRITE;
/*!40000 ALTER TABLE `roletypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `roletypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userlevels`
--

LOCK TABLES `userlevels` WRITE;
/*!40000 ALTER TABLE `userlevels` DISABLE KEYS */;
INSERT INTO `userlevels` VALUES (1,'Begynder',0),(2,'Øvet',60),(3,'Rutineret',100);
/*!40000 ALTER TABLE `userlevels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES (1,'administrator'),(2,'instruktør'),(3,'medlem');
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$12$ArO0r/vF0f0LxTR.HP..j.VZTgA8ROVB8oI8srf7z3khPDAzNVuw.','Kajakklub Admin',1,'admin@kajakklubben.dk',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'kajakklubben'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-14 22:27:08
