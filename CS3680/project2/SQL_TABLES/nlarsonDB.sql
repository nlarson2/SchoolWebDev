-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: nlarson
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_img` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_description` varchar(511) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_price` decimal(10,2) DEFAULT NULL,
  `prod_rating` tinyint(3) unsigned DEFAULT NULL,
  `prod_sku` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_stock` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (2,'Apple','apple.jpg','A delicious red apple',0.98,2,'58697',0),(3,'Banana','banana.jpeg','Great source of potassiumm',0.79,3,'24370',1),(4,'Broccoli','broccoli.jpeg','Honestly I dont know whey we sell this stuff.. is it even good for you??',1.99,1,'17348',1),(5,'Chips','chips.jpeg','Crunchy salty goodness: Updated through Admin Item Management System',3.99,5,'95163',1),(6,'Orange','orange.jpg','Boot your immune system with this super fruit',1.56,3,'73859',1),(17,'Almonds','almonds.jpg','High in fiber and PROTEIN',4.00,4,'6576979',20),(18,'Chicken and Waffles','chickenWaffles.jpeg','Nothing better than chicken and waffles...NOTHING!!!',5.65,5,'5465478',5);
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_fName` varchar(255) NOT NULL,
  `c_lName` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pw` varchar(255) NOT NULL,
  `c_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'nickolas','larson','nlarson@yahoo.com','$2y$10$00uqgPYz.t0Jrc3gvJrp9ee/TfQCVqnMYvS7Ej3Q.S9FH2AsRfBMi',0),(3,'nick','larson','nlarson1@yahoo.com','$2y$10$EOFV2xz1m4rE6hrLiSCVuesdZxo7j/JzCS4ERzWqF0Pnobe/aekN2',0),(4,'nickolas','larsontest','nlarson1@gmail.com','$2y$10$C5o0wLVpKsVakcngzj7KeuA.QbMovgGEZPXdHHQg4w4wS5L3W.On.',0),(5,'nickolas','larson','test@test.com','$2y$10$20guaJSEwzUA0.wdESODueZ3GIFPcRXa/B7LMcdzMH51X0Ga.g1ba',0),(6,'test','test','test2@email.com','$2y$10$TEao/GmcEtlmeeFB4IDlz.8Gjmiq5EC7wN/EExLbGnzxnQQhQPmFq',0),(7,'testagain','testagain','test2@test.com','$2y$10$/a3kjfB0bMpcArnN05I74ecoeFhKmDvnqui4gOM6Aczgnk4VAGUFq',0),(8,'nick','nick','nick@nick.com','$2y$10$qercHE9AL74LUpBrawptieECQNaPiZvOUVR5xy8PulOsk8JQzX3ya',0);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-25  1:21:42
