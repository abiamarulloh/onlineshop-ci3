-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: onlineShop
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `ceo` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'Wagiman Supply','wagiman_supply.jpeg','Andi Setiawan','<h1>Sejarah Wagiman Supply</h1>\r\n\r\n<blockquote>\r\n<pre>\r\n<em>Hello, Ini adalah Awal ceritaku</em></pre>\r\n</blockquote>\r\n','KP.PANUNGGANGAN BARAT KEL.PANUNGGANGAN BARAT KEC.CIBODAS KOTA TANGERANG','083159313115','hello@wagimansupply.com',3,456,1591583866);
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_actived` tinyint(1) NOT NULL,
  `last_login` int(11) NOT NULL,
  `address` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

LOCK TABLES `auth` WRITE;
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES (9,1,'Andi Setiawan','Mask_Group.jpg','hello@wagimansupply.com','6283893504806','$2y$10$lwuS4f2dxXNxFEdvO.ST6.FolGxLfAs4A4v5hhnhL01rlSTLw.x2C',1,1591667644,' KP.PANUNGGANGAN BARAT KEL.PANUNGGANGAN BARAT KEC.CIBODAS KOTA TANGERANG',1590213690,1590213876),(11,2,'Abi Amarulloh','ig.png','abiamarulloh06@gmail.com','6283159313115','$2y$10$DCjfDsE0VywEXUSXM.gb8e43MTbfMn0./ZehG0RN5N7xJXCil0QUu',1,1591583969,'Jl. Kh. Maulana Hasanudin Kel.Porisgaga Kec. batu ceper, Gg.pintu air No 50, kodepos. 15122',1590373922,1591599498);
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_token`
--

DROP TABLE IF EXISTS `auth_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_token`
--

LOCK TABLES `auth_token` WRITE;
/*!40000 ALTER TABLE `auth_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_payment`
--

DROP TABLE IF EXISTS `bank_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(250) NOT NULL,
  `on_behalf_of_the` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_payment`
--

LOCK TABLES `bank_payment` WRITE;
/*!40000 ALTER TABLE `bank_payment` DISABLE KEYS */;
INSERT INTO `bank_payment` VALUES (1,'BCA','Andi Setiawan','8102910291201'),(2,'BRI','Andi Setiawan','0210291289192');
/*!40000 ALTER TABLE `bank_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (6,'Honhon Solution Aja','Screenshot_from_2020-05-22_07-13-03.jpg','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n',9,12,1590216568,1590216590),(7,'Suwito','Screenshot_from_2020-05-09_15-03-56.png','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n',9,9,1590216662,NULL),(8,'Malam Santai','abstract-art-black-background-blur-1040499.jpg','<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<blockquote>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</blockquote>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<ul>\r\n <li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</li>\r\n</ul>\r\n\r\n<p> </p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n',9,14,1591256939,1591256960);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (9,'Kisah Pribadi',1589982095),(12,'Orang Sukses',1590034758),(13,'Vespa Jadul',1591256724),(14,'Kelana Malam',1591256731);
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (17,'Grab-logo-social.png','Grab',9,1590207445,1590894021),(18,'bukalapak-apa-itu-startup-pengertian-cara-memulai-dan-0-removebg-preview.png','Bukalapak',9,1590866986,1590894341),(19,'jalur-nugraha-ekakurir-logo-vector-graphics-courier-portable-network-graphics-png-favpng-RgxLByRHZsFLc9rzSBYZA4Lkv-removebg-preview.png','JNE',9,1590894530,0),(20,'kisspng-logo-vector-graphics-indofood-brand-font-salim-group-logo-www-pixshark-com-images-galleri-5b6d61932a4a02-removebg-preview.png','Indofood',9,1590894547,0),(21,'kisspng-nike-logo-image-swoosh-brand-nike-made-a-micro-climate-chair-that-will-help-kee-5ba33e2711a2f2-removebg-preview.png','Nike',9,1590894571,0),(22,'png-transparent-google-logo-google-doodle-google-search-google-company-text-logo-thumbnail-removebg-preview.png','Google',9,1590894592,0),(23,'png-transparent-responsive-web-design-bootstrap-front-end-web-development-logo-design-purple-template-web-design-removebg-preview.png','Bootstrap',9,1590894605,0);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = belum bayar , 1 = proses, 2 = dikirim, 3= selesai',
  `resi` varchar(250) NOT NULL,
  `image_payment` varchar(250) NOT NULL,
  `province_sender` int(11) NOT NULL,
  `city_sender` int(11) NOT NULL,
  `province_receiver` int(11) NOT NULL,
  `city_receiver` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `ekspedisi` varchar(250) NOT NULL,
  `sub_ekspedisi` varchar(250) NOT NULL,
  `date_buyying` int(11) NOT NULL,
  `dateline_buyying` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (7,11,1,'','Screenshot_from_2020-06-06_11-28-13.png',3,456,12,61,3661,'jne','OKE',1591593366,1591766166);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `grand_qty` int(11) NOT NULL,
  `grand_price` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (14,17,7,11,'Helm Pro Max',1,300000,1591593366),(15,13,7,11,'Adidas X Pro',1,100000,1591593366),(16,15,7,11,'T-shirt DJango',1,40000,1591593366);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (12,'sepedalipat1.jpeg','Nike','<p>Sepeda Lipat yang paling banyak digandrungi oleh para Pembalap Santai</p>\r\n',2,150000,1,1050,9,21,1591086432,1591361688),(13,'sepatu1.jpg','Adidas X Pro','<p>Sepatu anak Milenial</p>\r\n',1,100000,100,2133,9,21,1591100110,0),(14,'laptop1.jpg','Hp Frozen','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n',5,5000000,20,1092,9,18,1591100238,0),(15,'clarisse-meyer-5xbdx3TqPnw-unsplash.jpg','T-shirt DJango','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was populari<strong>sed in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</strong></p>\r\n',3,40000,10,1028,9,21,1591339248,0),(16,'mohammad-faruque-SpIKPT8zeAs-unsplash.jpg','Baju Marley Dark Pro','<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',3,39000,19,1000,9,19,1591340287,0),(17,'neonbrand-209FvE_57H8-unsplash.jpg','Helm Pro Max','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',10,300000,18,500,9,17,1591340749,0),(18,'semi-opened-laptop-computer-turned-on-on-table-2047905.jpg','Laptop Sigle Asus duo','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',5,10000000,80,1500,9,22,1591340827,0),(19,'taylor-xW4cBp9LoBM-unsplash.jpg','Rambo T-shirt','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',3,200000,20,2000,9,17,1591341348,0),(20,'jonathan-borba-Hnws8oSFcgU-unsplash.jpg','Google Hek','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',3,100000,10,1000,9,22,1591360617,1591410278),(21,'','Oli samping angin ribut','<p>Ini oli bukan sembarang oli boskqyu</p>\r\n',10,100000,1,1000,9,20,1591626811,0),(22,'1CF6A149-8D08-416F-BBFF-FD14206CEFF4.png','R9 exhause','<p>kenalpot kolong buangan kanan premium untuk vespa  series</p>\r\n',10,1000000,1,2000,9,21,1591626995,0),(23,'5C394F01-B31F-45A6-B230-E2E4054577FE.jpeg','Oli orange','<p>oli samping</p>\r\n',10,500000,1,400,9,21,1591627343,0),(24,'5A0BC920-F24C-492D-9E45-89D706395383.jpeg','Inoda motors','<p>jacket means</p>\r\n',3,1000000,1,400,9,19,1591629163,0),(25,'ABF8480D-38F9-4A9A-8FCF-55C6EAE15A19.jpeg','Inoda motors','<p>T-shirt </p>\r\n',3,100000,1,400,9,17,1591629246,0),(26,'A396C3B1-C915-4C19-8696-92F58D0265C8.jpeg','Inoda motors','<p>long </p>\r\n',3,100000,1,1000,9,17,1591629352,0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'sepatu',20200524),(2,'sepeda',1590316751),(3,'Baju',1590316760),(4,'Celana',1590316768),(5,'Laptop',1590321403),(6,'HP',1590321635),(7,'Ipad',1590321656),(8,'Topi',1591340192),(9,'Dasi',1591340195),(10,'Helm',1591340209);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-09 15:24:35
