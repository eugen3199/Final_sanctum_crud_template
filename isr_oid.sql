-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: isr_oid
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `batchName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batchClassID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (1,'Intake 2','1','2023-02-07 03:52:51','2023-02-07 03:52:51'),(2,'Intake 2','2','2023-02-07 03:53:41','2023-02-07 03:53:41'),(3,'None','3','2023-02-07 03:54:03','2023-02-07 03:54:03'),(4,'Intake 4','4','2023-02-07 03:54:40','2023-02-07 03:54:40'),(5,'Intake 4','5','2023-02-07 03:55:00','2023-02-07 03:55:00'),(6,'Intake 3','6','2023-02-07 03:55:26','2023-02-07 03:55:26');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campuses`
--

DROP TABLE IF EXISTS `campuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CampusName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campuses`
--

LOCK TABLES `campuses` WRITE;
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` VALUES (1,'ISR1','2023-02-22 05:23:00','2023-02-22 05:23:00');
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `className` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classPrefixID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,'Primary 1','1','2023-02-07 03:34:27','2023-02-07 03:34:27'),(2,'Secondary 2','1','2023-02-07 03:47:42','2023-02-07 03:47:42'),(3,'Primary 5','1','2023-02-07 03:48:28','2023-02-07 03:48:28'),(4,'Pre IGCSE','1','2023-02-07 03:48:39','2023-02-07 03:48:39'),(5,'IGCSE','1','2023-02-07 03:48:51','2023-02-07 03:48:51'),(6,'GED','1','2023-02-07 03:48:58','2023-02-07 03:48:58'),(7,'Primary 3','1','2023-02-15 06:49:45','2023-02-15 06:49:45');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `deptName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deptPrefixID` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'IT',7,'2023-02-14 09:20:22','2023-02-14 09:20:22'),(2,'Admin',7,'2023-02-14 09:22:01','2023-02-14 09:22:01'),(3,'HR',7,'2023-02-14 09:22:30','2023-02-14 09:22:30'),(4,'Academic',7,'2023-02-14 09:22:52','2023-02-14 09:22:52'),(5,'Sales and Consultancy',7,'2023-02-14 09:23:44','2023-02-14 09:23:44'),(6,'Finance',7,'2023-02-14 09:24:10','2023-02-14 09:24:10'),(7,'Student Affairs and Operation',7,'2023-02-14 09:24:52','2023-02-14 09:24:52'),(8,'Marketing',7,'2023-02-14 09:25:17','2023-02-14 09:25:17');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empCardID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empPosID` int NOT NULL,
  `empDeptID` int NOT NULL,
  `empJoinDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empNRC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empEmgcPerson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empEmgcPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empCampusID` int NOT NULL,
  `empKey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empStatus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empProfileImg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empQR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (2,'ISR-EMP-00001','Kyi Cin Thant/D',7,4,'9-Jun-22','14/KaKhaNa(N)003738','09-783052140','none','09-43027689',1,'NkYg5LeVi3h9nZP6MrwSyTXcz082mR',1,'2023-02-04 09:21:47','2023-02-04 09:21:47',NULL,'ISR-EMP-00001.png'),(3,'ISR-EMP-00002','Thel Hsu Hlaing/D',8,4,'1-Jul-22','12/LaKhaNa(N)214297','09-425827262','none','09-790157197',1,'SrHKQTOgCDukz4YFiNtlbwaEn61fX5',1,'2023-02-04 09:23:53','2023-02-04 09:23:53',NULL,'ISR-EMP-00002.png'),(6,'ISR-EMP-00004','Su Nwe Ni Win/D',1,4,'19-May-22','8/MaBaNa(N)135123','09-260134332','none','09-258090454',1,'DAi8mNPgQWfaxsXoRE0wHercbCBqlp',1,'2023-02-04 09:47:25','2023-02-04 09:47:25',NULL,'ISR-EMP-00004.png'),(7,'ISR-EMP-00021','Toe Toe Myint/D',10,4,'24-Jun-22','12/DaGaTa(N)004052','09-2026837','None','None',1,'uCcUJrfV6bZKnQ0hPRoX39jqiGEOge',1,'2023-02-04 09:49:00','2023-02-04 09:49:00',NULL,'ISR-EMP-00021.png'),(8,'ISR-EMP-00005','Yin Yin Mon/D',10,4,'1-Mar-22','8/KaMaNa(N)046014','09-250013670','none','09-5170217',1,'lie2ANZh5cxEtoLRXOw3pFSBk8b17G',1,'2023-02-04 09:52:40','2023-02-04 09:52:40',NULL,'ISR-EMP-00005.png'),(9,'ISR-EMP-00050','Khine Soe Linn /U',1,3,'4-Oct-22','12/BaHaNa(N)104061','09-967676567','None','None',1,'Lyix7D6QkojlRmIB1U2SuzEsZJXG98',1,'2023-02-04 09:53:32','2023-02-04 09:53:32',NULL,'ISR-EMP-00050.png'),(10,'ISR-EMP-00051','Kyawt Su Thar/D',1,3,'4-Oct-22','12/Ookama(N)2357115','09-967216458','None','None',1,'5cZFwhe8iJ4Pfgytsaq67kHMOWxQbz',1,'2023-02-04 09:54:18','2023-02-04 09:54:18',NULL,'ISR-EMP-00051.png'),(11,'ISR-EMP-00006','Yamin Inzalli/D',14,4,'1-Mar-22','12/TaMaNa©115325','09-422860439','none','09-450838391',1,'vqUbQXKEcNz8Sm2CJ3aFBVIlhj9nO4',1,'2023-02-04 09:54:28','2023-02-04 09:54:28',NULL,'ISR-EMP-00006.png'),(12,'ISR-EMP-00041','Thwin No No Zin/D',10,4,'9-Sep-22','12/AaSaNa(N)247789','09-776386769','None','09-420072363',1,'UaukO7xs01ibRtmBYf4CVQFEgp68AD',1,'2023-02-04 09:54:44','2023-02-22 08:07:46',NULL,'ISR-EMP-00041.png'),(13,'ISR-EMP-00052','Thwe Thwe Tun/D',5,2,'14-Mar-22','12/Ookama(N)244806','09-792829679','None','09-956827980',1,'ETQ2t3Gb6wkWHDUaxgeRhnu04rqPjK',1,'2023-02-04 09:55:41','2023-02-04 09:55:41',NULL,'ISR-EMP-00052.png'),(14,'ISR-EMP-00007','Ei Ei Myat /D',12,4,'19-Apr-22','12/AhSaNa(N)237886','09-969828404','none','09-250684027',1,'ONCus92mU0vlpXgKFe1L6Rkx83ziPE',1,'2023-02-04 09:56:13','2023-02-04 09:56:13',NULL,'ISR-EMP-00007.png'),(15,'ISR-EMP-00061','Htet Thiha Aung /U',1,5,'27-Jun-22','Pending','09-781960814','None','09-790704114',1,'fACIo7ahYktiXVbcNmFLgs1TD9y5pZ',1,'2023-02-04 09:56:28','2023-02-04 09:56:28',NULL,'ISR-EMP-00061.png'),(16,'ISR-EMP-00053','Win Htut Oo/U',1,2,'4-Oct-22','12/MaYaKa(N)160539','09-752545268','None','09-76063302',1,'Erz23hUCmQFvIqlTOVxXfWui05bBRD',1,'2023-02-04 09:56:30','2023-02-04 09:56:30',NULL,'ISR-EMP-00053.png'),(17,'ISR-EMP-00008','Aye Thu Hlaing/D',10,4,'2-May-22','7/TaNgaNa(N)118011','09-792472241','none','09-428111347',1,'eLzJUnsxyhjuaNRcrTI5oGbkvMA3wF',1,'2023-02-04 09:57:00','2023-02-04 09:57:00',NULL,'ISR-EMP-00008.png'),(18,'ISR-EMP-00022','Hnin Aye Wai/D',12,4,'24-Jun-22','12/ThaGaKa(N)174539','09-421039151','None','None',1,'vrjAIxkhc24QwVMNTfum5pb19RU0Yt',1,'2023-02-04 09:57:20','2023-02-04 09:57:20',NULL,'ISR-EMP-00022.png'),(19,'ISR-EMP-00011','Kay Thwe Khine/D',8,4,'6-Jun-22','12/ThaGaKa(N)002999','09-799539824','None','09-782792114',1,'2qGEuVQcXh18PkapDeT6lRmtAgC9BJ',1,'2023-02-04 09:57:48','2023-02-22 05:23:34',NULL,'ISR-EMP-00011.png'),(20,'ISR-EMP-00054','Wai Wai Thin/D',18,2,'21-Jan-22','12/DaGaMa(N)014888','09-420144141','None','09-254410502',1,'yEuDvP3YL8a6RVqkItUMCihcBrjx0l',1,'2023-02-04 09:57:52','2023-02-04 09:57:52',NULL,'ISR-EMP-00054.png'),(21,'ISR-EMP-00062','Shwe Yee Win Lai /D',1,5,'19-May-22','12/TAGaKa(N)188154','09-421024356','None','09-799576690',1,'mzWfQNSqb6ZkCMc4TO17VwuoBaLgY8',1,'2023-02-04 09:58:14','2023-02-04 09:58:14',NULL,'ISR-EMP-00062.png'),(22,'ISR-EMP-00009','Hnin Oo Hlaing/D',13,4,'2-May-22','12/TaMaNa(N)124684','09-781998149','none','09-771474834',1,'AlSQXcPvLgMbJ98CGwZ2stphz1iuNH',1,'2023-02-04 09:58:25','2023-02-04 09:58:25',NULL,'ISR-EMP-00009.png'),(23,'ISR-EMP-00042','Pwint Phyu Aye/D',10,4,'1-Nov-22','12/BaTaHta( N) 033017','09-974867751','None','09-973067944',1,'DrX3ZAmihb7RqEykCW8nsFjTH0fYQc',1,'2023-02-04 09:58:30','2023-02-04 09:58:30',NULL,'ISR-EMP-00042.png'),(24,'ISR-EMP-00055','Ei Phyu Sin /D',19,6,'10-Mar-22','7/TaNgaNa(N)203081','09-445544307','None','09-754621184',1,'hf3cErXLwS1J74myqo9vIVxgUjeKPF',1,'2023-02-04 09:59:01','2023-02-22 08:08:46',NULL,'ISR-EMP-00055.png'),(25,'ISR-EMP-00010','Htoo Nantha Win/D',10,4,'18-May-22','12/KaTaTa(N)031459','09-767267684','none','09-785051904',1,'pI2aNs63x78ArBQiS49Ev0bzDXM1TP',1,'2023-02-04 09:59:07','2023-02-22 09:02:06',NULL,'ISR-EMP-00010.png'),(26,'ISR-EMP-00023','Kyawt Mon Yee/D',11,4,'24-Jun-22','12/AuKaMa(N)214834','09-420029739','None','None',1,'vpoHiq4jhUC5fR9bNgKJeTyzPcQmXr',1,'2023-02-04 09:59:08','2023-02-04 09:59:08',NULL,'ISR-EMP-00023.png'),(27,'ISR-EMP-00071','Thinzar Win/D',1,7,'13-Jun-22','12/LaMaNa(C)159206','09-254872441','None','09-425809684',1,'Koxvhg0psXqa27InrZVceStClkG5A8',1,'2023-02-04 09:59:09','2023-02-22 08:12:40',NULL,'ISR-EMP-00071.png'),(28,'ISR-EMP-00012','Eaint Mhu Thwe De/D',12,4,'6-Jun-22','12/OuKaMa(N)232043','09-970607453','None','09-967557474',1,'obvAaLt4mBicFVluR051jDSMexgW9C',1,'2023-02-04 09:59:15','2023-02-04 09:59:15',NULL,'ISR-EMP-00012.png'),(29,'ISR-EMP-00063','Hein Myat Zaw/U',23,8,'23-Jan-23','12/TaMaNa(N)128371','09-960497076','None','09-254554301',1,'jXnCNyoJmeWD9utxBYVSkHI1FLwTrq',1,'2023-02-04 10:00:21','2023-02-04 10:00:21',NULL,'ISR-EMP-00063.png'),(30,'ISR-EMP-00056','San Wutt Yie Tint /D',19,6,'10-Mar-22','12/LaMaNa(N)155442','09-972707476','None','09-964707475',1,'47uNpWqK5mhPbTEv1oiO3wsfGDXUyk',1,'2023-02-04 10:00:30','2023-02-04 10:00:30',NULL,'ISR-EMP-00056.png'),(31,'ISR-EMP-00020','Tin Tin Myo/D',8,4,'23-Jun-22','12/MaGaDa(N)082707','09-43176624','none','09-971124451',1,'JgWew1Ai6RnI93vhZB4kzbpmE8LcxT',1,'2023-02-04 10:00:32','2023-02-22 05:34:04',NULL,'ISR-EMP-00020.png'),(32,'ISR-EMP-00057','Aung Pyae Paing/U',3,1,'27-Jun-22','12/DaGaMa(N)032843','09-951108296','None','09-897226868',1,'hqGz98Iv7Ak5YtM3jgQpHN4lxC1mbn',1,'2023-02-04 10:01:18','2023-02-04 10:01:18',NULL,'ISR-EMP-00057.png'),(33,'ISR-EMP-00072','Thet Myat Noe Hsu/D',1,7,'7-Jun-22','12/DaGaMa(N)030825','09-43132968','None','09-796348264',1,'KlIRsiut7QaH1nF9Cf64WeNTO0LmkD',1,'2023-02-04 10:01:18','2023-02-04 10:01:18',NULL,'ISR-EMP-00072.png'),(34,'ISR-EMP-00019','Arkar Linn/U',11,4,'22-Jun-22','12/Tha La Na(N)092753','09-799674036','none','09-448044457',1,'qBUWvzbLaFE9cSAHDw6YQtP02CZmGe',1,'2023-02-04 10:01:23','2023-02-04 10:01:23',NULL,'ISR-EMP-00019.png'),(35,'ISR-EMP-00013','Hnin Nu Nu Aye/D',14,4,'6-Jun-22','12/ThaGaKa(N)187903','09-978169562','None','09-799342067',1,'9bHSQUe4Pzrjp8Ktn1v5G3D6YugNwT',1,'2023-02-04 10:01:25','2023-02-04 10:01:25',NULL,'ISR-EMP-00013.png'),(36,'ISR-EMP-00024','Soe Ohnmar Aung/D',10,4,'24-Jun-22','12/AuKaTa(N)003657','09-43143718','None','09-421046042',1,'PiN9K4kfvOjWExVTRr7DULFtHyeS2A',1,'2023-02-04 10:01:39','2023-02-22 08:56:58',NULL,'ISR-EMP-00024.png'),(37,'ISR-EMP-00043','Aung Htet Lu/ U',12,4,'12-Nov-22','12/DaGaMa(N)048355','09-979147096','None','0943107131',1,'vypiufcMJAwbE5RDWX8BQ6lGLzH4xa',1,'2023-02-04 10:01:40','2023-02-04 10:01:40',NULL,'ISR-EMP-00043.png'),(38,'ISR-EMP-00064','Theint Thu Thu Win /D',5,7,'9-Jan-23','12/SaKaNa(N)072957','09-765198954','None','09-750401264',1,'J3UaIpnbsw1jTxVCvhfkXGAROYLBum',1,'2023-02-04 10:02:05','2023-02-04 10:02:05',NULL,'ISR-EMP-00064.png'),(39,'ISR-EMP-00018','Ni Lin Thant/D',12,4,'22-Jun-22','12/TaMaNa(N) 121392','09-969899839','none','09-5048211',1,'5mhLrCOV91HUFZnWxsRuANqTEX8M4b',1,'2023-02-04 10:02:12','2023-02-04 10:02:12',NULL,'ISR-EMP-00018.png'),(40,'ISR-EMP-00058','Bo Bo Tun Zaw/U',1,1,'29-Jul-22','12/OuKaTa(N)190652','09-795865251','None','09-421010115',1,'78ASuMbmXjRQO2Y0JlqkivFzUHVBoe',1,'2023-02-04 10:02:13','2023-02-22 08:51:37',NULL,'ISR-EMP-00058.png'),(41,'ISR-EMP-00014','Thandar Min/D',10,4,'17-Jun-22','12/BaTaHla(N)000442','09-5051904','None','09-7850551904',1,'ob5QmqtX2ghElNOy804i9TIk1nVrjZ',1,'2023-02-04 10:02:46','2023-02-04 10:02:46',NULL,'ISR-EMP-00014.png'),(42,'ISR-EMP-00073','Khine Zin Linn/D',1,7,'20-Jun-22','12/ThaGaKa(N)192934','09-757048042','None','09-73041510',1,'qTWf3JlKS6DwsXUnVL0I9MpQ1zCZ5c',1,'2023-02-04 10:02:53','2023-02-04 10:02:53',NULL,'ISR-EMP-00073.png'),(43,'ISR-EMP-00065','Pyae Phyo Kyaw/U',1,7,'25-Mar-22','9/LaWaNa(N)252213','09-751241438','None','09-770548197',1,'5NgW8iLDlzCKvyuTR19AqGI7Bj0Ue6',1,'2023-02-04 10:03:38','2023-02-04 10:03:38',NULL,'ISR-EMP-00065.png'),(44,'ISR-EMP-00044','Zar Chi Kyaw/D',14,4,'2-Dec-22','12/Y‌aKaNa(N)058997','09-795416805','None','09-799769094',1,'UOy5E2Ci1Mauf9rpowGnlJYT64jgRe',1,'2023-02-04 10:03:40','2023-02-04 10:03:40',NULL,'ISR-EMP-00044.png'),(45,'ISR-EMP-00059','Zwe Pyae Aung / D',1,5,'25-Jun-22','7/TaNgaNa(N)243125','09-754621184','None','09-783047583',1,'6UMIDvupHGY8acPL9FesKNA5mkECbr',1,'2023-02-04 10:03:48','2023-02-04 10:03:48',NULL,'ISR-EMP-00059.png'),(47,'ISR-EMP-00015','Moe Sandar Naing/D',8,4,'20-Jun-22','12/HtaKaNa(N)002955','09-775541300','None','09-795919226',1,'4ShGcToatu5BCMY2E3WReNL0is1yg8',1,'2023-02-04 10:04:28','2023-02-22 05:33:16',NULL,'ISR-EMP-00015.png'),(48,'ISR-EMP-00074','Ei Chaw Khin/D',1,7,'20-Jun-22','12/OuKaTa(N)200884','09-763789332','None','09-795151281',1,'O4AwCxIug7QBcsS2JRtim0nNjh5lbU',1,'2023-02-04 10:04:33','2023-02-04 10:04:33',NULL,'ISR-EMP-00074.png'),(49,'ISR-EMP-00045','Saung Nadi Zin/D',1,1,'5-Jan-23','12/KaSaKa(N)072091','09-791933021','None','09-773430606',1,'XxvpjR9uZfJKDPOYq5sNQ3zVbMnU7r',1,'2023-02-04 10:04:34','2023-02-04 10:04:34',NULL,'ISR-EMP-00045.png'),(50,'ISR-EMP-00066','Kaung Htet San/U',1,7,'4-May-22','14/PaTaNa(N)281258','09-677138957','None','09-894573043',1,'TR1VJeqEL0KkgrcMoAGXvUFIynO6tH',1,'2023-02-04 10:05:00','2023-02-04 10:05:00',NULL,'ISR-EMP-00066.png'),(51,'ISR-EMP-00025','Aye Thida Soe/D',10,4,'28-Jun-22','12/ThaGaKa(N)163216','09-444404021','None','None',1,'AWUKsgIqGjOD9T5VEur6QHkpvt3NJ0',1,'2023-02-04 10:05:13','2023-02-04 10:05:13',NULL,'ISR-EMP-00025.png'),(52,'ISR-EMP-00016','Ko Ko Maung/U',11,4,'20-Jun-22','12/OuKaTa(N)183906','09-767243723','none','09-421690838',1,'ifmjvDVbtlH5OJFEKZqzMLc2UCT804',1,'2023-02-04 10:05:15','2023-02-04 10:05:15',NULL,'ISR-EMP-00016.png'),(53,'ISR-EMP-00046','Mu Mu Naing/D',10,4,'9-Jan-23','8/PaKaU(N)196347','09-420008831','None','09-794365902',1,'VBLnGZx0ktYSU83IqfueFCXlv19g6H',1,'2023-02-04 10:05:40','2023-02-04 10:05:40',NULL,'ISR-EMP-00046.png'),(54,'ISR-EMP-00075','Thin Zar Thet Wai/D',1,7,'20-Jun-22','12/ThaGaTa(N)205698','09-252512750','None','09-250146452',1,'9xi2p8zYOG1e3HWPfJR7ADVnjtQwaZ',1,'2023-02-04 10:06:06','2023-02-04 10:06:06',NULL,'ISR-EMP-00075.png'),(55,'ISR-EMP-00067','May Thu Kyaw/D',1,7,'28-May-22','12/ThaLaNa(N)146465','09-798004794','None','09-798004794',1,'Tm4fLCeVU0A1qu76jYctoIDvg3la2W',1,'2023-02-04 10:06:17','2023-02-04 10:06:17',NULL,'ISR-EMP-00067.png'),(56,'ISR-EMP-00026','Ohnmar Win/D',10,4,'28-Jun-22','12/TaGaKa(N)041875','09-5019851','None','None',1,'I4Mt9KNcH7DZUC3QBmYx5qL1VsihXP',1,'2023-02-04 10:06:33','2023-02-04 10:06:33',NULL,'ISR-EMP-00026.png'),(57,'ISR-EMP-00047','Myo Ye Naing/U',10,4,'16-Jan-23','12/OuKaMa(N)105329','09-444696760','None','09-458222503',1,'qc1CKb3nFNeGizJBlyELsRhQSkTWVu',1,'2023-02-04 10:07:42','2023-02-04 10:07:42',NULL,'ISR-EMP-00047.png'),(58,'ISR-EMP-00027','Shwe Poe Au/D',14,4,'28-Jun-22','12/OuKaMa(N)239120','09-943807704','None','09-781314474',1,'0xhF7KC3aeRNm9DErSI2YtPUpQGBjq',1,'2023-02-04 10:07:47','2023-02-22 08:58:43',NULL,'ISR-EMP-00027.png'),(59,'ISR-EMP-00068','Kay Thi Khin Win/D',1,7,'28-May-22','12/OuKaTa(N)205843','09-784560899','None','09-799587133',1,'EhWzUcHRxmCA0gyLqfjwo5rFVZQ3vt',1,'2023-02-04 10:07:51','2023-02-04 10:07:51',NULL,'ISR-EMP-00068.png'),(61,'ISR-EMP-00076','Zon Myat Noe Oo',1,7,'21-Jun-22','12/DaGaMa(N)0405338','09-795740595','None','09-770534500',1,'QzvOE546pmfYJDeSa9871Ash2wIobr',1,'2023-02-04 10:08:15','2023-02-04 10:08:15',NULL,'ISR-EMP-00076.png'),(62,'ISR-EMP-00081','Kyaw Swar/U',26,2,'17-Oct-22','5/DaPaYa(N)077717','09-761098448','None','09-5111031',1,'FjM68RnIJ7DWTbPmXEoq4QVpOHhL12',1,'2023-02-04 10:08:35','2023-02-04 10:08:35',NULL,'ISR-EMP-00081.png'),(63,'ISR-EMP-00048','Theint Thu Thu Han/D',11,4,'24-Jan-23','12/thakata(N)184883','09-963356020','None','0',1,'wIG2Akpi7nCQz3R85t0Hyh6LsNZDfq',1,'2023-02-04 10:08:47','2023-02-04 10:08:47',NULL,'ISR-EMP-00048.png'),(64,'ISR-EMP-00069','Eain Dray Kyaw Min/D',1,7,'28-May-22','9/AhMaZa(N)089291','09-958853649','None','09-785582843',1,'gaBEOHUT9l5i01fjAkWI8qZSnxXoGp',1,'2023-02-04 10:09:24','2023-02-04 10:09:24',NULL,'ISR-EMP-00069.png'),(65,'ISR-EMP-00028','May Thae Oo /D',12,4,'1-Jul-22','12/AuKaMa(N)233901','09-765190898','None','None',1,'aAWXOxb1LKkM0GVsc3PEJN7iwjTzDt',1,'2023-02-04 10:09:39','2023-02-04 10:09:39',NULL,'ISR-EMP-00028.png'),(66,'ISR-EMP-00049','Nway Nine/D',1,3,'22-Jun-22','12/DaGaTa(N) 090175','09-760963302','None','09-253675332',1,'EiYI4Ro7gnJQPjOeFBs8qpyC6WGLMa',1,'2023-02-04 10:10:00','2023-02-04 10:10:00',NULL,'ISR-EMP-00049.png'),(67,'ISR-EMP-00077','Zin Mon/U',1,7,'26-Sep-22','12/ThaLaNa(N)131943','09-799460050','None','09-799460051',1,'ImcHO9TGMt3kFoesBNzYbqxpwjrQh7',1,'2023-02-04 10:10:04','2023-02-04 10:10:04',NULL,'ISR-EMP-00077.png'),(68,'ISR-EMP-00070','Thae Su Ko Ko/D',1,7,'28-May-22','8/PaKaOu(N)295919','09-424947868','None','09-2018287',1,'QKxWGfmhBNRoFJep6byzTDqg25uwXL',1,'2023-02-04 10:10:39','2023-02-04 10:10:39',NULL,'ISR-EMP-00070.png'),(69,'ISR-EMP-00029','Tin Nandar Win Aung /D',14,4,'1-Jul-22','12/OuKaMa(N)251495','09-251025004','None','None',1,'cz5FVRXaj2DLi7lEfMJHnAOI8CtpWP',1,'2023-02-04 10:11:00','2023-02-04 10:11:00',NULL,'ISR-EMP-00029.png'),(70,'ISR-EMP-00078','Soe Thet Naung/U',1,7,'17-Oct-22','7/KaLaKha(N)189167','09-788190797','None','09-254023820',1,'VSfAO2C3owxXc8I60ymRvLWG9jYuPQ',1,'2023-02-04 10:11:34','2023-02-04 10:11:34',NULL,'ISR-EMP-00078.png'),(71,'ISR-EMP-00030','Nilar Oo/D',10,4,'1-Jul-22','12/ThaKhaNa(N)082604','09-758743171','None','None',1,'XGRzpS8wbMgcBrQV5v09TxuYaHWUmZ',1,'2023-02-04 10:12:14','2023-02-04 10:12:14',NULL,'ISR-EMP-00030.png'),(72,'ISR-EMP-00060','Aye Htet Htet Thu /D',1,5,'3-May-22','12/TaGaKa(N)188370','09-750351937','None','09-795279842',1,'947GEuNmcXYQS8LKnxVPr35opj2aAF',1,'2023-02-04 10:12:39','2023-02-22 08:55:24',NULL,'ISR-EMP-00060.png'),(73,'ISR-EMP-00031','Yin Mon Aung/D',12,4,'1-Jul-22','12/KaYaNa(N)104645','09-43029628','None','None',1,'jRWrpfUMeuvh4IqPwTm6COFKG82k3l',1,'2023-02-04 10:14:15','2023-02-04 10:14:15',NULL,'ISR-EMP-00031.png'),(74,'ISR-EMP-00032','San Thawdar Wint/D',10,4,'4-Jul-22','14/KaKhaNa(N)094337','09-953840443','None','None',1,'yMo1kGNq08ZvEuL9BsFRrmgH2lcnJS',1,'2023-02-04 10:15:15','2023-02-04 10:15:15',NULL,'ISR-EMP-00032.png'),(75,'ISR-EMP-00033','May Thandar Win/D',10,4,'8-Jul-22','12/BaHaNa(N)088332','09-963206693','None','None',1,'Ba8eZ4nMJU5k9SgvIO7HicoYzNLTGA',1,'2023-02-04 10:16:18','2023-02-04 10:16:18',NULL,'ISR-EMP-00033.png'),(76,'ISR-EMP-00034','Aye Aye Mar/D',10,4,'8-Jul-22','12/KhaYaNa(N)041565','09-5057756','None','None',1,'46jnucWKeGEz8XTwSiJ0vtp3DHa7FQ',1,'2023-02-04 10:17:15','2023-02-04 10:17:15',NULL,'ISR-EMP-00034.png'),(77,'ISR-EMP-00035','Yin Lwin Lwin Htoo/D',12,4,'11-Jul-22','7/PaKhaMa(N)224830','09-450046587','None','None',1,'QG3ltbpznMu9hNsD2Y7OK4PUZwogcy',1,'2023-02-04 10:18:20','2023-02-04 10:18:20',NULL,'ISR-EMP-00035.png'),(78,'ISR-EMP-00036','Tim Robinson/Mr',10,4,'20-Jul-22','HG101187','09-951507481','None','None',1,'P2CBHejlVALvIZJExgkOrFo3QXnW9T',1,'2023-02-04 10:19:33','2023-02-04 10:19:33',NULL,'ISR-EMP-00036.png'),(79,'ISR-EMP-00037','Ei Ei Swe/D',12,4,'20-Jul-22','7/KaPaKa(N)109234','09-787069927','None','None',1,'IJDG07YORNZl5cHjn6xMompShFXCya',1,'2023-02-04 10:21:38','2023-02-04 10:21:38',NULL,'ISR-EMP-00037.png'),(80,'ISR-EMP-00038','Htoo Khant Kyaw/U',12,4,'5-Aug-22','12/TaMaNa (N)129231','09-458606882','None','None',1,'BrZkUKYIEibRP9LAJFTSge1sVhfwXn',1,'2023-02-04 10:22:42','2023-02-04 10:22:42',NULL,'ISR-EMP-00038.png'),(81,'ISR-EMP-00039','Khin Me Me Thein/D',10,4,'20-Aug-22','11/SaTaNa(N)061830','09-955589336','None','None',1,'jtRpg95mJ6NofW23FIOiSM4uKwqv8n',1,'2023-02-04 10:23:51','2023-02-04 10:23:51',NULL,'ISR-EMP-00039.png'),(83,'ISR-EMP-00040','Win Naing Oo/U',10,4,'29-Aug-22','12/KaTaTa( N)017393','09-785051904','None','None',1,'JEOQwz52bpUhFri01n7om9egVkL8Yc',1,'2023-02-04 10:25:12','2023-02-04 10:25:12',NULL,'ISR-EMP-00040.png'),(86,'ISR-EMP-00079','Yinmon Htet/D',1,5,'16-Jan-23','12/ThaGaNa(N)200973','09-42749625','none','09-963739236',1,'cxakwu1VLb4nR6WeKTiI3PshYoG2Mt',1,'2023-02-04 10:34:01','2023-02-04 10:34:01',NULL,'ISR-EMP-00079.png'),(87,'ISR-EMP-00080','Naing Win/U',26,2,'1-May-22','12/ThaKaTa(N)102913','09-254497896','none','09-250896624',1,'G0vmg8NEKUQzJ4C5H7yh1rnwWVZxYP',1,'2023-02-04 10:34:55','2023-02-04 10:34:55',NULL,'ISR-EMP-00080.png'),(90,'ISR-EMP-00003','Hay Mar Lwin/D',9,4,'5-Dec-21','12/YaPaTa(C) 106486','09-425302746','none','09-423744417',1,'123asdzxcqweasd',1,'2023-02-04 11:42:37','2023-02-04 11:42:37',NULL,'ISR-EMP-00003.png'),(92,'ISR-EMP-00017','Phyo Yee Mon/D',14,4,'20-Jun-22','7/ZaKaNa(N)067135','09-774424175','none','09-956378168',1,'siBt36Q7V4IfWPZaND5O0MbAp1mYlJ',1,'2023-02-04 12:11:39','2023-02-04 12:11:39',NULL,'ISR-EMP-00017.png');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `posName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Associate','2023-02-14 08:47:23','2023-02-14 08:47:23'),(3,'Senior Associate','2023-02-14 08:48:49','2023-02-14 08:48:49'),(5,'Supervisor','2023-02-14 08:51:53','2023-02-14 08:51:53'),(7,'Principal','2023-02-14 08:52:30','2023-02-14 08:52:30'),(8,'Manager','2023-02-14 08:53:05','2023-02-14 08:53:05'),(9,'Senior Associate','2023-02-14 08:53:27','2023-02-14 08:53:27'),(10,'Lecturer','2023-02-14 08:54:03','2023-02-14 08:54:03'),(11,'Assistant Lecturer','2023-02-14 08:54:33','2023-02-14 08:54:33'),(12,'Main Teacher','2023-02-14 08:54:56','2023-02-14 08:54:56'),(13,'Language Teacher','2023-02-14 08:55:27','2023-02-14 08:55:27'),(14,'Assistant Teacher','2023-02-14 08:56:12','2023-02-14 08:56:12'),(18,'Office Staff','2023-02-14 08:57:16','2023-02-14 08:57:16'),(19,'Accountant','2023-02-14 08:58:03','2023-02-14 08:58:03'),(23,'Graphic Designer','2023-02-14 09:00:14','2023-02-14 09:00:14'),(26,'Security','2023-02-14 09:15:32','2023-02-14 09:15:32');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prefixes`
--

DROP TABLE IF EXISTS `prefixes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prefixes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prefixName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prefixes`
--

LOCK TABLES `prefixes` WRITE;
/*!40000 ALTER TABLE `prefixes` DISABLE KEYS */;
INSERT INTO `prefixes` VALUES (1,'STU','2023-02-07 03:34:27','2023-02-07 03:34:27'),(7,'EMP','2023-02-14 09:20:22','2023-02-14 09:20:22');
/*!40000 ALTER TABLE `prefixes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `studCardID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studClassID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studBatchID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studGuardName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studDoB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studEmgcPhone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studEmgcPhone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SchoolEmgcCall` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studKey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studStatus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `studQR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studProfileImg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (77,'ISR-STU-000331','Thae Honey Zaw','1','1','Daw Kyin Su , U Aung Nay Lin','30.11.2015','09450599460','0','0','ewNlpnCrq8HvR1JZa3Y79mb2yu4iDh',1,'2023-02-06 10:18:23','2023-02-08 08:10:46','ISR-STU-000331.png',NULL),(78,'ISR-STU-000332','Kyal Sin Linn','1','1','U Tin Myo Lwin','8.10.2013','09755001699','09799576690','0','N1jJXle2HUpP8TgRiw9GoMtqbxfSEV',1,'2023-02-06 10:19:06','2023-02-08 08:11:12','ISR-STU-000332.png',NULL),(79,'ISR-STU-000351','Ma Phoo Pyae Yati','6','6','Daw San San Yin','3.3.2005','09-770022005','09-788822006','0','lvhCHNoTzcjBSiwYm12XOZxunfqJKe',1,'2023-02-06 10:19:16','2023-02-08 08:11:38','ISR-STU-000351.png',NULL),(80,'ISR-STU-000333','Su Myat Eain Daray Naing','2','2','Daw Lae Lae Khine','7.4.2009','09880633285','09250261233','0','q3IlvOpRnom4z9iZNfr7FVCMTUak1L',1,'2023-02-06 10:19:51','2023-02-06 10:19:51','ISR-STU-000333.png',NULL),(81,'ISR-STU-000341','Mg Min Khant Zaw','5','5','U Zaw Myo Khant Daw Hninn Pwint Wai','25.12.2007','09-265683253','09-5039366','0','QmcSxCKqNkMW8VJwzZyeRBo1jDO3gn',1,'2023-02-06 10:20:12','2023-02-08 08:15:37','ISR-STU-000341.png',NULL),(82,'ISR-STU-000334','Ye Mann Aung','3','3','Daw Thidar Soe','6.12.2008','943021079','0','0','x08GFHnVLDpzr9cjXQgkBbAPt4evfZ',1,'2023-02-06 10:20:39','2023-02-06 10:20:39','ISR-STU-000334.png',NULL),(83,'ISR-STU-000352','Ma Hsu Nandar Htun','6','6','Daw Aye Aye Thi','21.2.2006','09-955895736','09-420112684','0','VEomLYGHplPTUvhcreu1J70stQCxjO',1,'2023-02-06 10:21:03','2023-02-08 08:12:51','ISR-STU-000352.png',NULL),(84,'ISR-STU-000335','Ma Kyal Sin Thoon','4','4','Daw Thandar Soe','8.6.2006','09-759400315','09-780457686','0','YAlrs6ChBn5EN0QDVIeHtx9pibuSy4',1,'2023-02-06 10:21:28','2023-02-06 10:21:28','ISR-STU-000335.png',NULL),(85,'ISR-STU-000336','Mg Thu Ta','5','4','Daw Khine Khine Lwin','11.11.2005','09-943848593','09-43134297','0','U2FeDNoiy3kfbStXCwH48ZrcaMYKEA',1,'2023-02-06 10:22:31','2023-02-06 10:22:31','ISR-STU-000336.png',NULL),(86,'ISR-STU-000342','Ma Hsu Luck Yadana','5','5','Daw Wai Wai Phyo','11.4.2008','09-445321442','09-965143255,09-5143255','0','jboBwyHJ3n1Tq8RUCIfYvLQAgZrM40',1,'2023-02-06 10:22:38','2023-02-08 08:16:03','ISR-STU-000342.png',NULL),(87,'ISR-STU-000353','Mg Swan Paing Moe','4','4','U S Tin Aung Moe','29.1.2008','09-963440804','09-789568589','0','CwyszcaAv4XEj2WiIeFMKJOq1T5u39',1,'2023-02-06 10:22:50','2023-02-06 10:22:50','ISR-STU-000353.png',NULL),(88,'ISR-STU-000337','Mg Thu Htoo Nyan','5','5','U Auing Thu, Daw Zin Mar Phyo Wai','11.11.2005','09-976404285','09-43134297','0','Gw7B14Eb8zO3QYFgJjZHnLhfDKtvCP',1,'2023-02-06 10:23:13','2023-02-08 08:12:14','ISR-STU-000337.png',NULL),(89,'ISR-STU-000338','Ma Htoo Nandar','6','6','Daw Mar Mar Aye','4.10.2004','09-965967630','09-421034375 , 09-43056562','0','hVfZ4Nng91ER83PBGuseo02rzC5mtQ',1,'2023-02-06 10:24:02','2023-02-08 08:12:52','ISR-STU-000338.png',NULL),(90,'ISR-STU-000343','Ma Aye Myat Theingi Zaw','4','4','Daw Theingi Shwe','13.1.2008','09-259820467','09-254256715','0','mSypbHVJ896tvB5REzYGQPekCOAxW3',1,'2023-02-06 10:24:04','2023-02-06 10:24:04','ISR-STU-000343.png',NULL),(91,'ISR-STU-000354','Ma Tay Cho Linn','4','4','Daw Khin Myo Myint','7.9.2008','09421088410','09404231391','0','Zf1a39ulosJA4pt8mCvKzhNjQ67wiG',1,'2023-02-06 10:24:08','2023-02-06 10:24:08','ISR-STU-000354.png',NULL),(92,'ISR-STU-000339','Mg Win Aung','6','6','U Min Thein Daw Nwe Nwe Win','21.9.2005','09-772572640','09-5031493 , 09-262978399','0','13VcBOZfquQlhjXD0NCpn7PLU6gobr',1,'2023-02-06 10:25:01','2023-02-08 08:13:23','ISR-STU-000339.png',NULL),(93,'ISR-STU-000355','Ma Phoo Pyae Pyae Kyaw','4','4','Daw Thinzar Win','15.11.2007','09-420885622','0','0','MjPlnQt5Fc1ITiphUyZDRf9NkJsvY3',1,'2023-02-06 10:25:13','2023-02-06 10:25:13','ISR-STU-000355.png',NULL),(94,'ISR-STU-000344','Ma Shan Phyo Thadar','4','4','Daw Aye Myat Mon Kyaw','27.10.2006','09-943161716','09-791238711,09-779228628','0','E5xY2ripj0cZHCaM7Lm1Q83Nq9ODek',1,'2023-02-06 10:25:30','2023-02-06 10:25:30','ISR-STU-000344.png',NULL),(95,'ISR-STU-000340','Ma Saung Thondari','6','6','Daw Nan Kay Thi Oo','10.12.2004','09777655669','09697482220','0','eNXOiCKL0pHrVFbfnYTEt3zxhUWwPl',1,'2023-02-06 10:25:43','2023-02-22 09:24:34','ISR-STU-000340.png',NULL),(96,'ISR-STU-000367','Mg Aung Khant Zin','5','5','U Myint Hlaing','26.2.2008','09-750623317','09-750623317','0','4Ahmunx5eGi8C36Z0pOgUQNazXKY9J',1,'2023-02-06 10:25:43','2023-02-08 08:23:31','ISR-STU-000367.png',NULL),(98,'ISR-STU-000356','Ma Thet Hnin Aye','5','5','U Zaw Min Nyunt','26.3.2006','09-678500060','09-400720400','0','PexHpB2KqfOE1ubVJ9o6RU4AZNr37F',1,'2023-02-06 10:28:18','2023-02-08 08:15:40','ISR-STU-000356.png',NULL),(99,'ISR-STU-000361','Mg Kaung Linn Thant','5','5','U Thant Sinn, Daw Myint Myint Nwe','11.12.2006','09-974746197','09-421159285','0','VeIROXfPGkmB1itbs93QzH2MC0EgYS',1,'2023-02-06 10:28:22','2023-02-08 08:18:42','ISR-STU-000361.png',NULL),(101,'ISR-STU-000357','Mg Tayza Phone Myint','5','5','Daw Khin Thuzar Kyaw','19.4.2008','09-255800100','095350004','0','B6W0LkN4xhfbJUqY1riAvntVXey3ZM',1,'2023-02-06 10:29:50','2023-02-08 08:16:18','ISR-STU-000357.png',NULL),(102,'ISR-STU-000362','Mg Shar Htet Aung','5','5','U Tin Maung Zaw, Daw San San Maw','4.8.2007','09-757113129','09-254178722','0','IwGVXZlAoSuRjt7pBKxe1r09F8kv42',1,'2023-02-06 10:29:53','2023-02-08 08:19:15','ISR-STU-000362.png',NULL),(103,'ISR-STU-000345','Mg Htoo Khant Naing','4','4','Daw Ei Ei Thet Naing','1.3.2006','09-755005377','09-5089457','0','UAV8IWGlra4qtPeJELy9C70zBZk526',1,'2023-02-06 10:30:13','2023-02-22 08:30:06','ISR-STU-000345.png',NULL),(104,'ISR-STU-000358','Ma Poe Akari Win','5','5','U Aung Nyi Nyi Win, Daw Thiri Nwe','11.10.2007','09-775578889','09-5168675','0','VWTAyECNnXtbeKOoa627umkphrQMPF',1,'2023-02-06 10:31:10','2023-02-22 08:36:01','ISR-STU-000358.png',NULL),(105,'ISR-STU-000363','Ma Hsu Ei Ko Ko','5','5','U Myo Ko Ko Maung','22.5.2007','09-882333393','09-441317176','0','5RZBF7aQ1oCtX6jqSVLwUPM3rAzDmg',1,'2023-02-06 10:31:23','2023-02-08 08:20:54','ISR-STU-000363.png',NULL),(106,'ISR-STU-000346','Ma Moe Han Cho','6','6','Daw Aye Win Thein','22.1.2006','09-774129676','09-763773686,09-250664896','0','1YgOF9aJCVeUL7iBXM3Dqok5njKfut',1,'2023-02-06 10:32:02','2023-02-08 08:16:59','ISR-STU-000346.png',NULL),(107,'ISR-STU-000359','Ma Htet Inzale','5','5','U Hlwan Kyi, Daw Htay Htay','1.5.2007','09-960695517','09-799846602','0','2KRm17I8scLGjiMQPonXehDbYW06tH',1,'2023-02-06 10:32:21','2023-02-08 08:17:35','ISR-STU-000359.png',NULL),(108,'ISR-STU-000347','Mg Wai Yan Paing','5','5','U Myint Paing','2.5.2007','09-752920249','09-740915735','0','sCNqUF2knivz8cXKHDR4LhmJVZlpjy',1,'2023-02-06 10:33:48','2023-02-08 08:17:19','ISR-STU-000347.png',NULL),(109,'ISR-STU-000360','Mg Minn Hein Thant','5','5','U San Yu , Daw Htwe Htwe Thein','1.9.2005','09-887002424','09-5087724','0','AmbcxMj3XkEhiNoZVI5WJfzSlFpHgU',1,'2023-02-06 10:34:13','2023-02-08 08:18:11','ISR-STU-000360.png',NULL),(110,'ISR-STU-000364','Mg Linn Thu Aung','5','5','Daw Nway Nway Latt','25.1.2006','09-788156762','09-787405636','0','nDukH8ylMSKZa3Nh7TbEoVqjOQB2vs',1,'2023-02-06 10:34:31','2023-02-08 08:21:56','ISR-STU-000364.png',NULL),(111,'ISR-STU-000365','Ma Thiri Yadanar Saw','6','6','U Saw Min Than','9.9.2007','09-967710067','09-957560965','0','gYQxmC3yPD1WvhjU6E2HTbGr4awVSR',1,'2023-02-06 10:35:57','2023-02-08 08:22:27','ISR-STU-000365.png',NULL),(112,'ISR-STU-000368','Ma Hsu Hlaing Hnin','5','5','U Zaw Aung, Daw Su Win Win Toe','9.6.2006','09-898624652','09-444327702/09-421172430','0','NCe8izxH1wn07DrTuLPqB4pGMXQ2kU',1,'2023-02-06 10:36:21','2023-02-08 08:24:38','ISR-STU-000368.png',NULL),(113,'ISR-STU-000348','Mg Si Thant Ko','5','5','U Kyaw Thet Oo, Daw Thi Da Tun','6.3.2007','09-756600423','09-420167240','0','fpXqMgRm8YyI6hnti7usQ0akcJwSUB',1,'2023-02-06 10:37:00','2023-02-08 08:17:37','ISR-STU-000348.png',NULL),(114,'ISR-STU-000366','Mg Phone Myat Thu','6','6','U Min Thu Swe','16.9.2004','09-254408294','09-403773775','0','tI1xhFNpsk4jiWZm9rGDlRycC3H8fS',1,'2023-02-06 10:37:26','2023-02-08 08:22:47','ISR-STU-000366.png',NULL),(115,'ISR-STU-000349','Ma Akari Moe','5','5','U Toe Toe, Daw Aye Aye Htwe','17.9.2006','09-255180919','09-892723251','0','6xPHNtKLRjvA3Wk9pUOeEaFcJMnhlC',1,'2023-02-06 10:38:05','2023-02-08 08:18:22','ISR-STU-000349.png',NULL),(116,'ISR-STU-000350','Ma Feoru Dawt Hlei Lang','4','4','Ma Missamar(sister)','8.9.2007','09-267336060','09-892723251','0','v2fGNLzgjre9HmyFbaJwW371XApYlD',1,'2023-02-06 10:39:12','2023-02-06 10:39:12','ISR-STU-000350.png',NULL),(117,'ISR-STU-000369','Mg Shin Htet Aung','4','4','Daw Thin Thin Ei','9.8.2006','09-976882981','09-763202915','0','ATaMstXufCnw45DWSPZJ8EKz6YIx1b',1,'2023-02-06 10:40:55','2023-02-06 10:40:55','ISR-STU-000369.png',NULL),(118,'ISR-STU-000370','Mg San Lin Htet','5','5','Daw Khin Yu Swe','16.1.2007','09-763677897','09-448043624','0','LP79Of8J2zXTYWalwUQCbRN5sHj4yv',1,'2023-02-06 10:43:38','2023-02-08 08:22:15','ISR-STU-000370.png',NULL),(119,'ISR-STU-000372','Ma Khwar Nyo Thinn','5','5','Daw Kay Thi Lwin','25.8.2005','09-269757771','09-254312074','0','UO8x4Q9ag2yfXvY3qmteSziuo15VFN',1,'2023-02-06 10:45:41','2023-02-08 08:21:37','ISR-STU-000372.png',NULL),(120,'ISR-STU-000371','Mg Zaw Wai Htoo','5','5','Daw Khin Hla Hla Htay, U Kyaw San Linn','12.12.2003','09-254006463','09-977838945','0','KzfGlJHRyhQBjLEDNkaUCx3YV2ATO1',1,'2023-02-06 10:46:44','2023-02-08 08:21:54','ISR-STU-000371.png',NULL),(121,'ISR-STU-000373','Ma Thoon Hay Thi','4','4','Daw Soe Soe Nwe','2.6.2006','09-775492949','09-968087449','0','DOgo51nWKYR2rHFBJcsyZaIE0xi7jl',1,'2023-02-06 10:46:54','2023-02-06 10:46:54','ISR-STU-000373.png',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-22  9:57:11
