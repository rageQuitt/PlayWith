-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: playwith
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CD8737FAF675F31B` (`author_id`),
  CONSTRAINT `FK_CD8737FAF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'Les tendances de la mode 2023: Un regard vers l\'avenir','La mode est un domaine en constante ├®volution, avec de nouvelles tendances qui surgissent constamment. Dans cet article, nous allons jeter un coup d\'┼ôil aux tendances de la mode qui dominent l\'ann├®e 2023. Des accessoires minimalistes aux v├¬tements de seconde main, en passant par les nuances audacieuses de couleurs - nous couvrirons tout. Soyez pr├¬ts ├á actualiser votre garde-robe et ├á vous lancer dans une nouvelle aventure stylistique.',1),(2,'V├®ganisme et mode: Les v├¬tements respectueux des animaux gagnent du terrain','La mode n\'est pas seulement une question de style, mais elle refl├¿te ├®galement nos valeurs et nos croyances. Dans cet article, nous explorons comment le v├®ganisme influence le monde de la mode et comment de plus en plus de marques adoptent des pratiques respectueuses des animaux. Qu\'il s\'agisse de chaussures sans cuir ou de manteaux sans fourrure, la mode v├®gane est l├á pour rester.',1),(3,'L\'entra├«nement ├á intervalles ├á haute intensit├® (HIIT): Pourquoi est-ce si populaire?\"','La popularit├® de l\'entra├«nement ├á intervalles ├á haute intensit├® (HIIT) a explos├® au cours des derni├¿res ann├®es. Qu\'est-ce qui rend ce type d\'entra├«nement si attrayant pour tant de gens? Dans cet article, nous examinerons les avantages du HIIT, comment le mettre en ┼ôuvre dans votre routine d\'entra├«nement, et pourquoi il pourrait ├¬tre l\'option parfaite pour votre prochain entra├«nement.',2),(4,'Sport et bien-├¬tre mental: Le lien ins├®parable','L\'impact du sport sur notre bien-├¬tre physique est bien connu, mais qu\'en est-il de notre sant├® mentale? Cet article explore comment l\'activit├® physique peut contribuer ├á am├®liorer notre humeur, ├á r├®duire le stress et l\'anxi├®t├®, et ├á renforcer notre estime de soi. D├®couvrez pourquoi le sport est un outil puissant pour maintenir non seulement un corps sain, mais aussi un esprit sain.',2),(5,'Alimentation et performance sportive : Les secrets dÔÇÖune nutrition optimale','Une nutrition ad├®quate peut faire toute la diff├®rence dans vos performances sportives. Que vous soyez un athl├¿te professionnel ou un amateur de fitness, comprendre comment votre alimentation influence vos performances est essentiel. Dans cet article, nous explorons les nutriments cl├®s, le moment id├®al des repas et les aliments sp├®cifiques qui peuvent vous aider ├á atteindre vos objectifs de fitness.',3),(6,'Le r├®gime m├®diterran├®en : Un alli├® pour la sant├® et la long├®vit├®','Le r├®gime m├®diterran├®en est souvent cit├® comme l\'un des r├®gimes alimentaires les plus sains au monde. Riche en fruits, l├®gumes, grains entiers, huile d\'olive et poissons gras, il est associ├® ├á une multitude de bienfaits pour la sant├®. Dans cet article, d├®couvrez pourquoi le r├®gime m├®diterran├®en pourrait ├¬tre le secret de la long├®vit├® et comment l\'adopter dans votre vie quotidienne.',3),(7,'Mode ├®coresponsable : Comment faire des choix de mode plus durables?','L\'industrie de la mode est l\'une des plus polluantes au monde, mais il existe des moyens de rendre votre garde-robe plus ├®cologique. Cet article propose des conseils pratiques pour faire des choix de mode plus durables, des v├¬tements de seconde main aux marques ├®coresponsables. D├®couvrez comment vous pouvez allier style et respect de l\'environnement.',4),(8,'Le sport au travail : Comment int├®grer l\'activit├® physique ├á votre journ├®e de travail','La s├®dentarit├® est un probl├¿me majeur de notre ├®poque, en particulier pour ceux qui travaillent ├á un bureau toute la journ├®e. Cet article offre des conseils sur la mani├¿re d\'int├®grer l\'activit├® physique dans votre journ├®e de travail, de la marche pendant vos pauses ├á l\'usage d\'un bureau debout. Il est temps de bouger plus et de vivre mieux !',4);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Sophie Martin'),(2,'Lucas Durand'),(3,'M├®lanie Moreau'),(4,'Pierre Leclerc');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3B24E2CF4584665A` (`product_id`),
  KEY `IDX_3B24E2CF1AD5CDBF` (`cart_id`),
  CONSTRAINT `FK_3B24E2CF1AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  CONSTRAINT `FK_3B24E2CF4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartitem`
--

LOCK TABLES `cartitem` WRITE;
/*!40000 ALTER TABLE `cartitem` DISABLE KEYS */;
INSERT INTO `cartitem` VALUES (1,2,1,1),(2,2,1,1),(3,2,1,1),(4,2,1,1),(5,2,1,1),(6,2,1,1),(7,2,1,1),(8,2,1,1),(9,2,1,1),(10,2,1,1),(11,2,1,1),(12,2,1,1),(13,2,1,1),(14,3,1,1),(15,3,1,1),(16,3,1,1),(17,3,1,1),(18,3,1,1),(19,3,1,1),(20,3,1,1),(21,3,1,1),(22,3,1,1),(23,3,1,1),(24,2,1,1),(25,2,1,1),(26,2,1,1),(27,2,1,1),(28,2,1,1),(29,2,1,1),(30,2,1,1),(31,2,1,1),(32,5,1,1);
/*!40000 ALTER TABLE `cartitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75AE45B8727ACA70` (`parent_id`),
  CONSTRAINT `FK_75AE45B8727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'Compl├®ments alimentaires'),(2,NULL,'Shakers - Whey et Prot├®ine'),(3,NULL,'Smarts Drugs'),(4,NULL,'V├¬tements');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupons_types_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `discount` int(11) NOT NULL,
  `max_usage` int(11) NOT NULL,
  `validity` datetime NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3AD9288477153098` (`code`),
  KEY `IDX_3AD928843DDD47B7` (`coupons_types_id`),
  CONSTRAINT `FK_3AD928843DDD47B7` FOREIGN KEY (`coupons_types_id`) REFERENCES `couponstypes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couponstypes`
--

DROP TABLE IF EXISTS `couponstypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `couponstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couponstypes`
--

LOCK TABLES `couponstypes` WRITE;
/*!40000 ALTER TABLE `couponstypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `couponstypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230618175812','2023-06-18 19:58:33',100);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E7B3BB5C6C8A81A9` (`products_id`),
  CONSTRAINT `FK_E7B3BB5C6C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (20,20,'AFTERPARTY','SmartsDrugs/AFTERPARTY_SD.png'),(21,21,'MINDLAB','SmartsDrugs/Ce_MINDLABPRO.png'),(22,22,'NEUROFORCE','SmartsDrugs/NEURO_FORCE.jpg'),(23,23,'NUZENA','SmartsDrugs/NUZENA_40E.jpg'),(30,30,'BCAA','Shakers/bcaa_70E.jpg'),(31,31,'VEGGIE','Shakers/PROTEIN_VEGAN_11E.jpg'),(33,33,'WHEY','Shakers/Whey_40e.jpg'),(40,1,'3JEANS','Vetements/3_jeans_30e.jpg'),(41,2,'ADASCA','Vetements/Adasca100.jpg'),(42,3,'JOGGING ADASCA','Vetements/ensemble_F_200e.jpg'),(43,4,'ENSEMBLE JAUNE','Vetements/Ensemble_sport_F_45e.jpg'),(44,5,'ENSEMBLE TSHIRT','Vetements/Ensemble_Tshirt_35e.jpg'),(45,6,'ENSEMBLE JOGGING BLANC','Vetements/ensemble.jpg'),(46,7,'CAMAIEU DE JEANS','Vetements/jean.jpg'),(47,8,'JOGGING GRIS','Vetements/Joggin_ F_gris_70e.jpg'),(48,9,'LOT JEANS CINTRE','Vetements/lots_de_jean_20e.jpg'),(49,101,'JOGGING MAUVE','Vetements/Tenue_sport_F_65e.jpg'),(50,102,'TSHIRTS BLANC','Vetements/Tshirt_blanc_H_15E.jpg'),(51,103,'TSHIRT JAUNE','Vetements/Tshirt_Jaune_H_15e.jpg'),(52,104,'TSHIRT ROSE','Vetements/Tshirt_rose_H_15e.jpg'),(70,70,'cm','Compl├®ments Alimentaires\\Citrus Marvelus.jpg'),(71,71,'MAGLEK','Compl├®ments Alimentaires\\Maglek.jpg'),(73,73,'SALVEO HEMP OIL','Compl├®ments Alimentaires\\Salveo Hemp Oil.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupons_id` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E283F8D8AEA34913` (`reference`),
  KEY `IDX_E283F8D86D72B15C` (`coupons_id`),
  KEY `IDX_E283F8D867B3B43D` (`users_id`),
  CONSTRAINT `FK_E283F8D867B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_E283F8D86D72B15C` FOREIGN KEY (`coupons_id`) REFERENCES `coupons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,NULL,2,'','2023-06-17 11:05:03');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordersdetails`
--

DROP TABLE IF EXISTS `ordersdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordersdetails` (
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`orders_id`,`products_id`),
  KEY `IDX_5646A7B1CFFE9AD6` (`orders_id`),
  KEY `IDX_5646A7B16C8A81A9` (`products_id`),
  CONSTRAINT `FK_5646A7B16C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_5646A7B1CFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordersdetails`
--

LOCK TABLES `ordersdetails` WRITE;
/*!40000 ALTER TABLE `ordersdetails` DISABLE KEYS */;
INSERT INTO `ordersdetails` VALUES (1,1,50,150);
/*!40000 ALTER TABLE `ordersdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `hasSizes` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4ACC380CA21214B7` (`categories_id`),
  CONSTRAINT `FK_4ACC380CA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,4,'3 Jeans ','3 jeans',30,18,'2023-06-16 15:31:34',1),(2,4,'Adasca','Veste d\'adasca',100,847,'2023-06-16 15:31:34',1),(3,4,'Ensemble Jogging Adasca','Ensemble jogging marque adasca',200,1000,'2023-06-16 15:31:34',1),(4,4,'Ensemble Jogging Jaune','Ensemble Jogging Jaune',200,1000,'2023-06-16 15:31:34',1),(5,4,'ENSEMBLE TSHIRT','ENSEMBLE TSHIRT',30,993,'2023-06-16 15:31:34',1),(6,4,'ENSEMBLE JOGGING BLANC','ENSEMBLE JOGGING BLANC',200,1000,'2023-06-16 15:31:34',1),(7,4,'CAMAIEU DE JEANS',' LOT DE CAMAIEU DE JEANS',30,50,'2023-06-16 15:31:34',1),(8,4,'ENSEMBLE GRIS','ENSEMBLE ENSEMBLE ENSEMBLE VENSEMBLE ',200,1000,'2023-06-16 15:31:34',1),(9,4,'JEANS','JEANSJEANSJEANSJEANSJEANS',50,70,'2023-06-16 15:31:34',1),(20,3,'AFTERPARTY_SD','lorem ipsum ',40,200,'2023-06-18 16:12:32',0),(21,3,'MINDLABPRO','LOREM IPSUM',60,100,'2023-06-18 16:12:32',0),(22,3,'NEUROFORCE','LOREM IPSUM',70,50,'2023-06-18 16:12:32',0),(23,3,'NUZENA','LOREM IPSUM',45,100,'2023-06-18 16:12:32',0),(30,2,'BCAA','LOREM',60,200,'2023-06-18 16:22:12',0),(31,2,'PROTEINE VEGAN','LOREM',55,100,'2023-06-18 16:22:12',0),(33,2,'WHEY','LOREM',40,1000,'2023-06-18 16:22:12',0),(70,1,'Citrus Marvelus','Lorem ipsum ...',10,1000,'2023-06-21 13:46:14',0),(71,1,'Maglek','Loremp ipsum bla blabla',15,1000,'2023-06-21 13:46:14',0),(73,1,'Salveo Hemp Oil','Lolorem ipipsum',25,2500,'2023-06-21 13:46:14',0),(101,4,'JOGGING MAUVES','JOGGING MAUVESJOGGING MAUVESJOGGING MAUVESJOGGING MAUVESJOGGING MAUVES',50,20,'2023-06-16 15:31:34',1),(102,4,'TSHIRTS BLANC','TSHIRTS BLANCTSHIRTS BLANCTSHIRTS BLANCTSHIRTS BLANCTSHIRTS BLANCTSHIRTS BLANC',50,1000,'2023-06-16 15:31:34',1),(103,4,' TSHIRT JAUNE ','TSHIRT JAUNE TSHIRT JAUNE TSHIRT JAUNE TSHIRT JAUNE TSHIRT JAUNE TSHIRT JAUNE ',50,1000,'2023-06-16 15:31:34',1),(104,4,'TSHIRTS ROSE','TSHIRTS ROSETSHIRTS ROSETSHIRTS ROSETSHIRTS ROSETSHIRTS ROSETSHIRTS ROSETSHIRTS ROSE',50,67,'2023-06-16 15:31:34',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `cart_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D5428AEDE7927C74` (`email`),
  UNIQUE KEY `UNIQ_D5428AED1AD5CDBF` (`cart_id`),
  CONSTRAINT `FK_D5428AED1AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'azelel@gmail.com','a:0:{}','$2y$13$RSCNoeejg56kb3sjZYyiv.DrTtBIaJ8VI88t/kNTHQjBztDXOpjtS','azerty','Pierre','bd victor hugo','44800','Nantes','2023-06-17 11:57:19',1),(3,'admin@admin.com','[\"ROLE_ADMIN\"]','$2y$13$ITTIiBBsB8PkSIRSOmFpaubaWtxKVptfOi3E6kgebkCI3laAq9sGK','Doe','John',NULL,NULL,NULL,'2023-06-22 14:18:41',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-22 14:13:27
