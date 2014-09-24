-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: slip_generator
-- ------------------------------------------------------
-- Server version	5.6.16-log

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
-- Table structure for table `pay_details`
--

DROP TABLE IF EXISTS `pay_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_info_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `payable_or_deductible` varchar(45) NOT NULL,
  `annual_value` decimal(10,2) DEFAULT NULL,
  `one_time_value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pay_details_1` (`pay_info_id`),
  KEY `FK_pay_details_2` (`type_id`),
  CONSTRAINT `FK_pay_details_1` FOREIGN KEY (`pay_info_id`) REFERENCES `pay_info` (`id`),
  CONSTRAINT `FK_pay_details_2` FOREIGN KEY (`type_id`) REFERENCES `pay_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_details`
--

LOCK TABLES `pay_details` WRITE;
/*!40000 ALTER TABLE `pay_details` DISABLE KEYS */;
INSERT INTO `pay_details` VALUES (1,1,1,'deductible',15000.00,10000.00),(2,1,2,'payablexxxx',1000.00,1000.00),(5,1,3,'payable',500.00,500.00),(6,1,7,'e3q',200.00,200.00),(7,1,6,'pp',700.00,700.00),(8,1,5,'Payable',300.00,300.00),(9,1,8,'payable',0.00,1200.00),(16,1,9,'',500.00,500.00),(17,2,1,'p',165000.00,13750.00),(18,2,2,'p',66000.00,5500.00),(19,2,3,'p',74404.00,NULL),(20,2,5,'p',9600.00,800.00),(21,2,6,'p',15000.00,1250.00),(22,2,7,'d',2400.00,200.00),(23,2,8,'d',3760.00,313.00),(24,2,9,'d',6000.00,NULL),(25,4,1,'p',240000.00,NULL),(26,4,2,'p',96000.00,NULL),(27,4,5,'p',9600.00,NULL),(28,4,6,'p',15000.00,NULL),(29,4,3,'p',119400.00,NULL),(30,4,7,'d',2400.00,NULL),(31,4,8,'d',12072.00,NULL),(32,4,9,'d',6000.00,NULL),(33,5,1,'p',210000.00,NULL),(34,5,2,'p',84000.00,NULL),(35,5,5,'p',9600.00,NULL),(36,5,6,'p',15000.00,NULL),(37,5,3,'p',106900.00,NULL),(38,5,7,'d',2400.00,NULL),(39,5,8,'d',9952.00,NULL),(40,5,9,'d',6000.00,NULL),(41,6,1,'p',388700.00,NULL),(42,6,2,'p',155480.00,NULL),(43,6,5,'p',9600.00,NULL),(44,6,6,'p',15000.00,NULL),(45,6,3,'p',208620.00,NULL),(46,6,7,'d',2400.00,NULL),(47,6,9,'d',6000.00,NULL),(48,6,8,'d',40620.00,NULL),(49,7,1,'p',135000.00,NULL),(50,7,2,'p',54000.00,NULL),(51,7,3,'p',56400.00,NULL),(52,7,5,'p',9600.00,NULL),(53,7,6,'p',15000.00,NULL),(54,7,7,'d',2400.00,NULL),(55,7,9,'d',6000.00,NULL),(56,8,1,'p',240000.00,NULL),(57,8,2,'p',96000.00,NULL),(58,8,5,'p',9600.00,NULL),(59,8,6,'p',15000.00,NULL),(60,8,3,'p',119400.00,NULL),(61,8,7,'d',2400.00,NULL),(62,8,8,'d',16176.00,NULL),(63,3,1,'p',180000.00,NULL),(64,3,2,'p',72000.00,NULL),(65,3,5,'p',9600.00,NULL),(66,3,6,'p',15000.00,NULL),(67,3,3,'p',83400.00,NULL),(68,3,7,'d',2400.00,NULL),(69,3,8,'d',6292.00,NULL),(70,9,1,'p',240000.00,NULL),(71,9,2,'p',96000.00,NULL),(72,9,5,'p',9600.00,NULL),(73,9,6,'p',15000.00,NULL),(74,9,3,'p',119344.00,NULL),(75,9,7,'d',2400.00,NULL),(76,9,8,'d',16120.00,NULL),(77,10,1,'P',120000.00,NULL),(78,10,5,'P',9600.00,NULL),(79,10,2,'P',32727.00,NULL),(80,10,6,'P',15000.00,NULL),(81,10,7,'D',2400.00,NULL),(82,10,3,'P',65073.00,NULL),(83,10,4,'P',12000.00,NULL);
/*!40000 ALTER TABLE `pay_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_info`
--

DROP TABLE IF EXISTS `pay_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `effective_date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pay_info_1` (`user_id`),
  CONSTRAINT `FK_pay_info_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_info`
--

LOCK TABLES `pay_info` WRITE;
/*!40000 ALTER TABLE `pay_info` DISABLE KEYS */;
INSERT INTO `pay_info` VALUES (1,'2012-01-02 00:00:00',1,0),(2,'2011-05-05 00:00:00',5,1),(3,'2012-01-01 00:00:00',2,1),(4,'2012-01-01 00:00:00',7,1),(5,'2012-01-01 00:00:00',6,1),(6,'2012-01-01 00:00:00',11,1),(7,'2012-01-01 00:00:00',8,1),(8,'2013-02-01 00:00:00',4,1),(9,'2013-01-01 00:00:00',8,1),(10,'2014-01-01 00:00:00',12,1);
/*!40000 ALTER TABLE `pay_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_types`
--

DROP TABLE IF EXISTS `pay_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) NOT NULL,
  `recurring` tinyint(1) NOT NULL,
  `taxable` tinyint(1) NOT NULL,
  `payable_or_deductible` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_types`
--

LOCK TABLES `pay_types` WRITE;
/*!40000 ALTER TABLE `pay_types` DISABLE KEYS */;
INSERT INTO `pay_types` VALUES (1,'Basic Pay',1,1,'P'),(2,'HRA',1,1,'P'),(3,'Allowances',1,1,'P'),(4,'Reimbursements',0,0,'P'),(5,'Conveyence',1,1,'P'),(6,'Medical',1,1,'P'),(7,'Professional Tax',1,0,'D'),(8,'Income Tax',1,0,'D'),(9,'Lunch',1,0,'D');
/*!40000 ALTER TABLE `pay_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'SE'),(2,'HR'),(3,'Admin'),(4,'Auditor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emp_id` varchar(50) NOT NULL,
  `pan_number` varchar(45) NOT NULL,
  `bank_account` varchar(45) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Maruthi','maruthi@leviossa.com','01','2010-03-11 18:30:00','01','CSD2012','2433487633','SBI','aa','IT'),(2,'Mahesh Badiger','mahesh@leviossa.com','mahesh123','2011-01-17 18:30:00','005','AYHPB3080E','20086724989','State Bank Of India','Software Engineer','IT'),(4,'Vikash Kumar Singh','vikash.k@leviossa.com','vikash123','2011-02-22 18:30:00','007','BGSPS1222D','20063359456','State Bank Of India','Software Engineer','IT'),(5,'Subrat Kumar Sahu','subratkumar@leviossa.com','subrat123','2010-01-05 18:30:00','004','CADPS1448D','20085040922','State Bank Of India','Software Engineer','IT'),(6,'Ganesh. N','ganesh@leviossa.com','ganesh123','2010-03-22 18:30:00','003','AJWPN1902D','031129343691','State Bank Of India','Software Engineer','IT'),(7,'Punit Morabashetti',' punit@leviossa.com','punit123','2011-01-04 18:30:00','006','AQEPP4560A','20076738745','State Bank Of India','Software Engineer','IT'),(8,'Pankaj Bharti','pankajb@leviossa.com','pankaj123','2011-09-06 18:30:00','008','AYVPB5514H','537102010008786','Union bank of india','Software Engineer','IT'),(10,'Shashwat kumar pandey','shashwat.pandey@leviossa.com','shashwat123','2011-10-31 18:30:00','010','BERPP5574E','20110845842','State Bank Of India','Software Engineer','IT'),(11,'Ekta Vadlamudi','ekta@leviossa.com','password','2010-12-31 18:30:00','011','AFCPV7318F','00531610018578','HDFC','Test & Delivery Manager',''),(12,'Ashutosh Singh','ashutosh@leviossa.com','abc','2011-08-30 18:30:00','14','NA','30857912259','SBI','Software Engineer','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-22 11:20:20
