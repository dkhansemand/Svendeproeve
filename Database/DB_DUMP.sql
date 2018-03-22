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
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `albumId` int(11) NOT NULL AUTO_INCREMENT,
  `albumName` varchar(45) NOT NULL,
  `albumCoverId` int(11) NOT NULL,
  `albumEventId` int(11) DEFAULT NULL,
  PRIMARY KEY (`albumId`),
  KEY `fkCOverAlbumId_idx` (`albumCoverId`),
  KEY `fkEventAlbumId_idx` (`albumEventId`),
  CONSTRAINT `fkCOverAlbumId` FOREIGN KEY (`albumCoverId`) REFERENCES `media` (`mediaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkEventAlbumId` FOREIGN KEY (`albumEventId`) REFERENCES `events` (`eventsId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (10,'Sommerafsluning',171,5),(12,'Kajakker',185,5),(13,'kaj',208,NULL);
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `contactId` int(11) NOT NULL AUTO_INCREMENT,
  `contactName` varchar(45) NOT NULL,
  `contactEmail` varchar(128) NOT NULL,
  `contactMobile` int(8) DEFAULT NULL,
  `contactMessage` text NOT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `eventsId` int(11) NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(55) NOT NULL,
  `eventStartDate` date NOT NULL,
  `eventDescription` text NOT NULL,
  `eventCover` int(11) DEFAULT NULL,
  PRIMARY KEY (`eventsId`),
  KEY `fkEventCoverMedia_idx` (`eventCover`),
  CONSTRAINT `fkEventCoverMedia` FOREIGN KEY (`eventCover`) REFERENCES `media` (`mediaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (5,'Sommerafslutning','2018-03-24','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;',153),(6,'Familiesejllads i sommerferien','2018-03-30','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;',155);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventsubscribers`
--

DROP TABLE IF EXISTS `eventsubscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventsubscribers` (
  `eventSubscriberId` int(11) NOT NULL AUTO_INCREMENT,
  `fkEventSubUserId` int(11) NOT NULL,
  `fkEventId` int(11) NOT NULL,
  PRIMARY KEY (`eventSubscriberId`),
  KEY `fkSubEventId_idx` (`fkEventId`),
  KEY `fkUserSuEventbId_idx` (`fkEventSubUserId`),
  CONSTRAINT `fkSubEventId` FOREIGN KEY (`fkEventId`) REFERENCES `events` (`eventsId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkUserSuEventbId` FOREIGN KEY (`fkEventSubUserId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventsubscribers`
--

LOCK TABLES `eventsubscribers` WRITE;
/*!40000 ALTER TABLE `eventsubscribers` DISABLE KEYS */;
INSERT INTO `eventsubscribers` VALUES (7,5,5);
/*!40000 ALTER TABLE `eventsubscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `galleryId` int(11) NOT NULL AUTO_INCREMENT,
  `fkGalleryMediaId` int(11) NOT NULL,
  `fkAlbumId` int(11) NOT NULL,
  PRIMARY KEY (`galleryId`),
  KEY `fkMediaGalleryId_idx` (`fkGalleryMediaId`),
  KEY `fkIdAlbum_idx` (`fkAlbumId`),
  CONSTRAINT `fkIdAlbum` FOREIGN KEY (`fkAlbumId`) REFERENCES `albums` (`albumId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkMediaGalleryId` FOREIGN KEY (`fkGalleryMediaId`) REFERENCES `media` (`mediaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (59,156,10),(60,157,10),(61,158,10),(62,159,10),(63,160,10),(64,161,10),(65,162,10),(66,163,10),(69,166,10),(70,167,10),(71,168,10),(72,169,10),(73,170,10),(74,171,10),(87,184,12),(88,185,12),(89,186,12),(90,187,12),(93,190,12),(94,191,12),(95,192,12),(96,193,12),(97,194,12),(98,195,12),(99,207,13),(100,208,13),(101,209,13),(102,210,13),(103,211,13),(104,212,13);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kajaks`
--

DROP TABLE IF EXISTS `kajaks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kajaks` (
  `kajakId` int(11) NOT NULL AUTO_INCREMENT,
  `kajakName` varchar(52) NOT NULL,
  `kajakStock` int(11) NOT NULL,
  `fkKajakType` int(11) NOT NULL,
  `fkKajakMedia` int(11) NOT NULL,
  PRIMARY KEY (`kajakId`),
  KEY `fkTypeKajak_idx` (`fkKajakType`),
  KEY `fkMediaKajak_idx` (`fkKajakMedia`),
  CONSTRAINT `fkMediaKajak` FOREIGN KEY (`fkKajakMedia`) REFERENCES `media` (`mediaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkTypeKajak` FOREIGN KEY (`fkKajakType`) REFERENCES `kajaktypes` (`kajakTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kajaks`
--

LOCK TABLES `kajaks` WRITE;
/*!40000 ALTER TABLE `kajaks` DISABLE KEYS */;
INSERT INTO `kajaks` VALUES (1,'Tracer',2,5,197),(2,'Seabird K1',5,3,137),(4,'Hasle Explorer med finne',2,3,196),(5,'Hasle Explorer med ror',1,4,198);
/*!40000 ALTER TABLE `kajaks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kajaktypes`
--

DROP TABLE IF EXISTS `kajaktypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kajaktypes` (
  `kajakTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `kajakTypeName` varchar(45) NOT NULL,
  `kajakTypeLevel` int(2) NOT NULL,
  PRIMARY KEY (`kajakTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kajaktypes`
--

LOCK TABLES `kajaktypes` WRITE;
/*!40000 ALTER TABLE `kajaktypes` DISABLE KEYS */;
INSERT INTO `kajaktypes` VALUES (3,'Turkajakker',11),(4,'Havkajakker',1),(5,'Kapkajakker',7);
/*!40000 ALTER TABLE `kajaktypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `mediaId` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(96) NOT NULL,
  `filepath` varchar(45) NOT NULL,
  `mime` varchar(16) NOT NULL,
  PRIMARY KEY (`mediaId`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (2,'1521064925_62774473.j.jpeg','','image/jpeg'),(3,'1521105444_55077575.j.jpeg','','image/jpeg'),(6,'1521105834_66136966.j.jpeg','','image/jpeg'),(132,'1200x800_1521242791_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(133,'200x150_1521242791_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(134,'1200x800_1521242792_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(135,'200x150_1521242792_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(137,'1521305455_3a2c95b438b7617ebfd773c38c9b4fd09e989084842ceba49.jpeg','','image/jpeg'),(141,'1521390901_95a1206495a9b012cd23e71d9f32520745f5de8c512352674.jpeg','','image/jpeg'),(142,'1521390934_95a1206495a9b012cd23e71d9f32520745f5de8c512352674.jpeg','','image/jpeg'),(143,'1200x800_1521412904_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','test-galleri','image/jpeg'),(144,'200x150_1521412904_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','test-galleri','image/jpeg'),(145,'1200x800_1521412905_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','test-galleri','image/jpeg'),(146,'200x150_1521412905_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','test-galleri','image/jpeg'),(147,'1200x800_1521412905_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','test-galleri','image/jpeg'),(148,'200x150_1521412905_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','test-galleri','image/jpeg'),(149,'1200x800_1521412905_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(150,'200x150_1521412905_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','test-galleri','image/jpeg'),(151,'1200x800_1521412906_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(152,'200x150_1521412906_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','test-galleri','image/jpeg'),(153,'1521463565_a77a8281bf06d9ae5f7d26aa8a66ae3d423531fabfdc39c1d.jpeg','','image/jpeg'),(154,'1521463628_359165884044405ea604122599e447e6d7432319903e619fc.jpeg','','image/jpeg'),(155,'1521463716_359165884044405ea604122599e447e6d7432319903e619fc.jpeg','','image/jpeg'),(156,'1200x800_1521464088_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Sommerafsluning','image/jpeg'),(157,'200x150_1521464088_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Sommerafsluning','image/jpeg'),(158,'1200x800_1521464088_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','Sommerafsluning','image/jpeg'),(159,'200x150_1521464088_be71abc2a9fb13be16b80704c117d381a3b302f9454752092.jpeg','Sommerafsluning','image/jpeg'),(160,'1200x800_1521464088_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','Sommerafsluning','image/jpeg'),(161,'200x150_1521464088_71577e6785a0a993ffb343e66329ce9f1d9237591ab76dced.jpeg','Sommerafsluning','image/jpeg'),(162,'1200x800_1521464089_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','Sommerafsluning','image/jpeg'),(163,'200x150_1521464089_32cd88b51e283efc5a6c30b561c7792f27c742d529ccf0788.jpeg','Sommerafsluning','image/jpeg'),(166,'1200x800_1521464089_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','Sommerafsluning','image/jpeg'),(167,'200x150_1521464089_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','Sommerafsluning','image/jpeg'),(168,'1200x800_1521464090_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','Sommerafsluning','image/jpeg'),(169,'200x150_1521464090_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','Sommerafsluning','image/jpeg'),(170,'1200x800_1521464090_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','Sommerafsluning','image/jpeg'),(171,'200x150_1521464090_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','Sommerafsluning','image/jpeg'),(183,'200x150_1521464124_6ba9dd08db3ec602fa98017368b051808c730881b31db9f54.jpeg','Kajakker','image/jpeg'),(184,'1200x800_1521464204_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','Kajakker','image/jpeg'),(185,'200x150_1521464204_0516fd37a208ad06f4213a3eab1b8cb962a80146d2e205754.jpeg','Kajakker','image/jpeg'),(186,'1200x800_1521464204_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Kajakker','image/jpeg'),(187,'200x150_1521464204_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Kajakker','image/jpeg'),(190,'1200x800_1521464205_eeccc3d129c6706ab3dfbf6dfb8c40f00ef6caac22d22be71.jpeg','Kajakker','image/jpeg'),(191,'200x150_1521464205_eeccc3d129c6706ab3dfbf6dfb8c40f00ef6caac22d22be71.jpeg','Kajakker','image/jpeg'),(192,'1200x800_1521464205_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','Kajakker','image/jpeg'),(193,'200x150_1521464205_bbb2eb260d4feaceaae8997a5420a1d20dca154bfbe9a5939.jpeg','Kajakker','image/jpeg'),(194,'1200x800_1521464206_6ba9dd08db3ec602fa98017368b051808c730881b31db9f54.jpeg','Kajakker','image/jpeg'),(195,'200x150_1521464206_6ba9dd08db3ec602fa98017368b051808c730881b31db9f54.jpeg','Kajakker','image/jpeg'),(196,'1521464379_aa94e58035e541cec96d85b3aae127603f21f798deefa9f71.jpeg','','image/jpeg'),(197,'1521464621_ecdad79a511800be03dec71f1ca1a2d0f34eb568a3dc41df8.jpeg','','image/jpeg'),(198,'1521464676_d4186704c70d26d45d09d36d4d62525cd0a78f135938e59d8.jpeg','','image/jpeg'),(199,'1200x800_1521532302_a77a8281bf06d9ae5f7d26aa8a66ae3d423531fabfdc39c1d.jpeg','Kaj','image/jpeg'),(200,'200x150_1521532302_a77a8281bf06d9ae5f7d26aa8a66ae3d423531fabfdc39c1d.jpeg','Kaj','image/jpeg'),(201,'1200x800_1521532302_359165884044405ea604122599e447e6d7432319903e619fc.jpeg','Kaj','image/jpeg'),(202,'200x150_1521532302_359165884044405ea604122599e447e6d7432319903e619fc.jpeg','Kaj','image/jpeg'),(203,'1200x800_1521532302_301a44f2ca5899572a191c548530477b47e644c37a80946b1.jpeg','Kaj','image/jpeg'),(204,'200x150_1521532302_301a44f2ca5899572a191c548530477b47e644c37a80946b1.jpeg','Kaj','image/jpeg'),(205,'1200x800_1521532303_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Kaj','image/jpeg'),(206,'200x150_1521532303_71eb97d6860263b45f9368a96a92d6a3429665eabe7d7585e.jpeg','Kaj','image/jpeg'),(207,'1200x800_1521532357_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','kaj','image/jpeg'),(208,'200x150_1521532357_80a24ca9a246c4bdeee608fd1de59a8593516a558552c31db.jpeg','kaj','image/jpeg'),(209,'1200x800_1521532357_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','kaj','image/jpeg'),(210,'200x150_1521532357_3e974945c5a070d810d7c701b69153f47dea83e8c9606ae09.jpeg','kaj','image/jpeg'),(211,'1200x800_1521532358_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','kaj','image/jpeg'),(212,'200x150_1521532358_20ab5d31f8251c962e6a0b25befce607eac106b79cc85a6bb.jpeg','kaj','image/jpeg');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(45) NOT NULL,
  `newsContent` text NOT NULL,
  `newsStartDate` date NOT NULL,
  `newsEndDate` date NOT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (15,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-19','2018-03-31'),(16,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-20','2018-03-29'),(17,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-01','2018-03-18'),(18,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-15','2018-03-30'),(19,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-15','2018-03-30'),(20,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-15','2018-03-31'),(21,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-09','2018-03-22'),(22,'Lorem','&#60;p&#62;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, mollitia. Quo distinctio minus asperiores molestiae aut eos, porro beatae eum voluptate est nisi, officiis qui corrupti necessitatibus dolore quas doloribus rem quaerat. Dolores excepturi sed reprehenderit mollitia aperiam sit? Fugiat laboriosam laborum dolores iure perferendis architecto necessitatibus natus temporibus eum adipisci quaerat commodi sunt qui suscipit doloremque maiores rerum inventore nihil, animi voluptatum ab expedita ratione neque voluptate! Sequi eos eum atque id, assumenda earum aperiam, ratione hic magnam explicabo commodi doloremque tempore voluptatem quisquam alias repellat dicta quos molestias culpa facere iure? Perspiciatis, totam neque ipsa ducimus vero minus non, rem dolores perferendis reprehenderit quo in atque voluptatem mollitia id? Dolor quisquam modi recusandae praesentium ab odio eius deserunt dicta ipsa blanditiis labore, sit quod eum distinctio tempore maxime commodi nemo doloremque in repudiandae voluptate! Veritatis a, culpa, eum ducimus enim odit officiis quo quia nostrum, neque nisi praesentium et perspiciatis. Tenetur aspernatur laboriosam suscipit asperiores cumque dolore sequi sunt quod perferendis, recusandae, amet quaerat! Est, fuga, quia ab error consequuntur reiciendis voluptatum, eligendi fugit minus voluptates reprehenderit at suscipit illum eaque cumque. Unde excepturi odit vel, ipsa provident quia maiores reiciendis adipisci ratione voluptas, quidem beatae iusto quae!&#60;/p&#62;','2018-03-08','2018-03-29'),(23,'Tirsdag','&#60;p&#62;Det er tirsdag i dag&#60;/p&#62;','2018-03-20','2018-03-23');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newslettersubscribers`
--

DROP TABLE IF EXISTS `newslettersubscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newslettersubscribers` (
  `newsLetterSubscribersId` int(11) NOT NULL AUTO_INCREMENT,
  `subscriberEmail` varchar(128) NOT NULL,
  PRIMARY KEY (`newsLetterSubscribersId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newslettersubscribers`
--

LOCK TABLES `newslettersubscribers` WRITE;
/*!40000 ALTER TABLE `newslettersubscribers` DISABLE KEYS */;
INSERT INTO `newslettersubscribers` VALUES (1,'test@test.dk'),(2,'dkhansemand@gmail.com'),(3,'dkhansemand@gmail.dk'),(4,'kajak@pagaj.dk'),(5,'svl@rts.dk'),(6,'3941133@rts-3655.dk');
/*!40000 ALTER TABLE `newslettersubscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `fkUserRole` int(11) NOT NULL,
  `fkRoleType` int(11) NOT NULL,
  PRIMARY KEY (`roleId`),
  KEY `fk_userRole_idx` (`fkUserRole`),
  KEY `fk_roleType_idx` (`fkRoleType`),
  CONSTRAINT `fk_roleType` FOREIGN KEY (`fkRoleType`) REFERENCES `roletypes` (`roleTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userRole` FOREIGN KEY (`fkUserRole`) REFERENCES `userroles` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11),(12,1,12),(13,1,13),(14,1,14),(15,1,15),(16,1,16),(17,1,17),(18,2,2),(19,2,3),(20,2,11),(21,2,12),(22,2,13),(23,2,1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roletypes`
--

DROP TABLE IF EXISTS `roletypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roletypes` (
  `roleTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `roleTypeName` varchar(64) NOT NULL,
  `roleTypeInt` int(11) NOT NULL,
  PRIMARY KEY (`roleTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roletypes`
--

LOCK TABLES `roletypes` WRITE;
/*!40000 ALTER TABLE `roletypes` DISABLE KEYS */;
INSERT INTO `roletypes` VALUES (1,'PERM_ADMIN_PANEL_ACCESS',0),(2,'PERM_ADMIN_CREATE_USER',1),(3,'PERM_ADMIN_UPDATE_USER',2),(4,'PERM_ADMIN_DELETE_USER',3),(5,'PERM_ADMIN_NEWS_CREATE',4),(6,'PERM_ADMIN_NEWS_UPDATE',5),(7,'PERM_ADMIN_NEWS_DELETE',6),(8,'PERM_ADMIN_EVENT_CREATE',7),(9,'PERM_ADMIN_EVENT_UPDATE',8),(10,'PERM_ADMIN_EVENT_DELETE',9),(11,'PERM_ADMIN_PRODUCT_CREATE',10),(12,'PERM_ADMIN_PRODUCT_UPDATE',11),(13,'PERM_ADMIN_PRODUCT_DELETE',12),(14,'PERM_ADMIN_GALLERY_CREATE',13),(15,'PERM_ADMIN_GALLERY_UPDATE',14),(16,'PERM_ADMIN_GALLERY_DELETE',15),(17,'PERM_ADMIN_MESSAGE_DELETE',16);
/*!40000 ALTER TABLE `roletypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL AUTO_INCREMENT,
  `salesKajakId` int(11) NOT NULL,
  `salesPrice` int(11) NOT NULL,
  PRIMARY KEY (`salesId`),
  KEY `fkKajakSalesId_idx` (`salesKajakId`),
  CONSTRAINT `fkKajakSalesId` FOREIGN KEY (`salesKajakId`) REFERENCES `kajaks` (`kajakId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,4,0),(3,2,1500);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlevels`
--

DROP TABLE IF EXISTS `userlevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlevels` (
  `userLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `userLevelName` varchar(25) NOT NULL,
  `userLevelReqKm` int(11) NOT NULL,
  PRIMARY KEY (`userLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlevels`
--

LOCK TABLES `userlevels` WRITE;
/*!40000 ALTER TABLE `userlevels` DISABLE KEYS */;
INSERT INTO `userlevels` VALUES (1,'Begynder',0),(2,'Øvet',60),(3,'Rutineret',100);
/*!40000 ALTER TABLE `userlevels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userroles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(15) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES (1,'administrator'),(2,'instruktør'),(3,'medlem');
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `userRole` int(11) NOT NULL,
  `userEmail` varchar(64) NOT NULL,
  `avatar` int(11) DEFAULT NULL,
  `userKm` int(11) DEFAULT '0',
  `userPhone` int(8) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `fkUserRole_idx` (`userRole`),
  KEY `fkUserAvatar_idx` (`avatar`),
  CONSTRAINT `fkUserAvatar` FOREIGN KEY (`avatar`) REFERENCES `media` (`mediaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkUserRole` FOREIGN KEY (`userRole`) REFERENCES `userroles` (`roleId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$12$ArO0r/vF0f0LxTR.HP..j.VZTgA8ROVB8oI8srf7z3khPDAzNVuw.','Kajakklub Admin',1,'admin@kajakklubben.dk',NULL,0,NULL),(4,'instruktoer','$2y$10$Uu2MuLJwWEWzhToph.nvgulgKiJTdbZWHR.Qru.hyt0ZXijys68Ri','Søren instruktør',2,'instruktoer@kajakklubben.dk',NULL,0,NULL),(5,'medlem','$2y$10$3DHJr7GuBmdGxkmknxW8JOxBiF9i.XajqMGRIwW0AJkG58kVnx5Ru','Brian test',3,'medlem@kajakklubben.dk',NULL,66,NULL);
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

-- Dump completed on 2018-03-22 20:11:29
