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
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (6,'test galleri2',99,NULL),(7,'Mere test',107,NULL);
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `events` VALUES (2,'Test Arragenment','2018-03-29','&#60;p&#62;asdfghjgf&#60;/p&#62;',2),(3,'Test Arragenment 2 upload','2018-03-30','&#60;p&#62;Virker det nu igen?&#60;/p&#62;&#13;&#10;&#60;p&#62;med upload&#60;/p&#62;',6);
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
INSERT INTO `gallery` VALUES (17,96,6),(18,97,6),(19,98,6),(20,99,6),(21,100,6),(22,101,6),(23,102,6),(24,103,6),(25,104,6),(26,105,6),(27,106,7),(28,107,7),(29,108,7),(30,109,7),(31,110,7),(32,111,7),(33,112,7),(34,113,7),(35,114,7),(36,115,7);
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
INSERT INTO `media` VALUES (2,'1521064925_62774473.j.jpeg','','image/jpeg'),(3,'1521105444_55077575.j.jpeg','','image/jpeg'),(6,'1521105834_66136966.j.jpeg','','image/jpeg'),(96,'1200x800_1521189020_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','test-galleri','image/jpeg'),(97,'200x150_1521189020_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','test-galleri','image/jpeg'),(98,'1200x800_1521189021_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','test-galleri','image/jpeg'),(99,'200x150_1521189021_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','test-galleri','image/jpeg'),(100,'1200x800_1521189021_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','test-galleri','image/jpeg'),(101,'200x150_1521189021_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','test-galleri','image/jpeg'),(102,'1200x800_1521189022_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(103,'200x150_1521189022_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(104,'1200x800_1521189023_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(105,'200x150_1521189023_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(106,'1200x800_1521189086_c1d8d105c5189e5ef276164f28ccaa1b5550cafe36b652b19.jpeg','Mere-test','image/jpeg'),(107,'200x150_1521189086_c1d8d105c5189e5ef276164f28ccaa1b5550cafe36b652b19.jpeg','Mere-test','image/jpeg'),(108,'1200x800_1521189088_eeccc3d129c6706ab3dfbf6dfb8c40f00ef6caac22d22be71.jpeg','Mere-test','image/jpeg'),(109,'200x150_1521189088_eeccc3d129c6706ab3dfbf6dfb8c40f00ef6caac22d22be71.jpeg','Mere-test','image/jpeg'),(110,'1200x800_1521189088_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','Mere-test','image/jpeg'),(111,'200x150_1521189088_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','Mere-test','image/jpeg'),(112,'1200x800_1521189089_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','Mere-test','image/jpeg'),(113,'200x150_1521189089_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','Mere-test','image/jpeg'),(114,'1200x800_1521189089_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','Mere-test','image/jpeg'),(115,'200x150_1521189089_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','Mere-test','image/jpeg'),(116,'1200x800_1521238560_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg'),(117,'200x150_1521238560_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg'),(118,'1200x800_1521238583_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg'),(119,'200x150_1521238583_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg'),(120,'1200x800_1521238698_c1d8d105c5189e5ef276164f28ccaa1b5550cafe36b652b19.jpeg','test-galleri2','image/jpeg'),(121,'200x150_1521238698_c1d8d105c5189e5ef276164f28ccaa1b5550cafe36b652b19.jpeg','test-galleri2','image/jpeg'),(122,'1200x800_1521239030_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg'),(123,'200x150_1521239030_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','test-galleri2','image/jpeg');
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

-- Dump completed on 2018-03-16 23:31:53
