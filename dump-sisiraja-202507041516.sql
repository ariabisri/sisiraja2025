-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: sisiraja
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `published_at` date DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (3,'123','1212','2024-09-03 21:24:33','2024-09-03 21:24:33','',NULL,'draft');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `layer_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `latlng` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_layer_id_foreign` (`layer_id`),
  CONSTRAINT `features_layer_id_foreign` FOREIGN KEY (`layer_id`) REFERENCES `layers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (2,9,'masjid','judul_feature','masjiddd','-6.169568990105866,106.45294167101385',NULL,'2025-02-20 03:04:14','2025-02-20 03:04:14'),(8,9,'SD 1','judul_feature','asdsd','-6.929948666331498,107.29339577257635','feature_icon/q0d5SJb6WskbXhhzzBMcK9MBGj1gktO2xU1GXVLl.png','2025-02-21 04:04:56','2025-02-21 04:04:56'),(9,9,'SD','judul_feature','SD Cibadak','-6.921342074507283,107.59888887318085',NULL,'2025-02-24 23:51:28','2025-02-24 23:51:28'),(10,9,'SD Serang','judul_feature','SD di serang','-6.122775673506061,106.16935716010633',NULL,'2025-02-25 00:41:14','2025-02-25 00:41:14'),(11,9,'SD Bogor','judul_feature','SD di Bogor','-6.659037815326187,106.85943581163885',NULL,'2025-02-25 00:52:46','2025-02-25 00:52:46');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeris`
--

DROP TABLE IF EXISTS `galeris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeris`
--

LOCK TABLES `galeris` WRITE;
/*!40000 ALTER TABLE `galeris` DISABLE KEYS */;
INSERT INTO `galeris` VALUES (1,'aa','aa','images/E0qvzTRryyMZB8gLuAdDlz4xA7RJdn51lieHmiNm.jpg','2024-09-02 21:19:41','2024-09-03 00:55:16'),(2,'12','1212','images/8YACAy1nlFGyHwrenud2Ih068S7LFAi38gt9D89O.jpg','2024-09-03 00:17:08','2024-09-03 00:51:36'),(3,'as','ad','galeri_images/QCqFjfdxTU3AMCZbS5rdpTmY3nXYsGf9VmAnMYHX.jpg','2024-09-03 00:51:58','2024-09-03 00:51:58');
/*!40000 ALTER TABLE `galeris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layer_map`
--

DROP TABLE IF EXISTS `layer_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layer_map` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `map_id` bigint(20) unsigned NOT NULL,
  `layer_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `layer_map_map_id_foreign` (`map_id`),
  KEY `layer_map_layer_id_foreign` (`layer_id`),
  CONSTRAINT `layer_map_layer_id_foreign` FOREIGN KEY (`layer_id`) REFERENCES `layers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `layer_map_map_id_foreign` FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layer_map`
--

LOCK TABLES `layer_map` WRITE;
/*!40000 ALTER TABLE `layer_map` DISABLE KEYS */;
INSERT INTO `layer_map` VALUES (1,4,10,NULL,NULL),(2,5,10,NULL,NULL),(3,6,9,NULL,NULL),(4,6,10,NULL,NULL),(5,7,9,NULL,NULL),(6,7,10,NULL,NULL);
/*!40000 ALTER TABLE `layer_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layers`
--

DROP TABLE IF EXISTS `layers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_layer` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `json` longtext DEFAULT NULL,
  `geojson_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layers`
--

LOCK TABLES `layers` WRITE;
/*!40000 ALTER TABLE `layers` DISABLE KEYS */;
INSERT INTO `layers` VALUES (9,'Sekolah','Sekolah di lembang','marker',NULL,NULL,'2025-02-11 02:50:12','2025-02-11 02:50:12'),(10,'RS','rumah sakit','marker',NULL,NULL,'2025-02-11 03:09:37','2025-02-11 03:09:37'),(21,'kab jabar','kab jabar','Polygon','C:\\Users\\BIT-aria\\AppData\\Local\\Temp\\phpC137.tmp','json/Q51x2JK6B1C9e38TfaXPdzUleGIwjPAGTgLuhQon.txt','2025-03-11 02:02:24','2025-03-11 02:02:24'),(22,'patahan','patahan indonesia','Line','C:\\Users\\BIT-aria\\AppData\\Local\\Temp\\phpBF8D.tmp','json/liqfkHFItqs9g1M9RPWj7qYwlB480URpq31dvrZM.json','2025-03-11 02:39:32','2025-03-11 02:39:32'),(24,'kabupaten jabar','kabupaten jabar','Polygon','C:\\Users\\BIT-aria\\AppData\\Local\\Temp\\php45E.tmp','json/zrs0nG0fjQpzxXCrhGsE40IqayT1yv2yYqPJd5G0.txt','2025-03-11 02:42:00','2025-03-11 02:42:00');
/*!40000 ALTER TABLE `layers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maps`
--

DROP TABLE IF EXISTS `maps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `map_type` varchar(255) DEFAULT NULL,
  `polygon` longtext DEFAULT NULL,
  `marker_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maps`
--

LOCK TABLES `maps` WRITE;
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;
INSERT INTO `maps` VALUES (1,'bandung',-6.9400910,107.7238660,12,'Peta Bandung','roadmap','{\r\n    \"type\": \"FeatureCollection\",\r\n    \"features\": [\r\n        {\r\n            \"type\": \"Feature\",\r\n            \"geometry\": {\r\n                \"type\": \"Polygon\",\r\n                \"coordinates\": [\r\n                    [\r\n                        [\r\n                            107.55984306466418,\r\n                            -6.929713414108384\r\n                        ],\r\n                        [\r\n                            107.55984306466418,\r\n                            -6.919772878745623\r\n                        ],\r\n                        [\r\n                            107.575120927213,\r\n                            -6.919772878745623\r\n                        ],\r\n                        [\r\n                            107.575120927213,\r\n                            -6.929713414108384\r\n                        ]\r\n                    ]\r\n                ]\r\n            },\r\n            \"properties\": {\r\n                \"name\": \"badnung\",\r\n                \"description\": \"bandung kota\"\r\n            }\r\n        },\r\n        {\r\n            \"type\": \"Feature\",\r\n            \"geometry\": {\r\n                \"type\": \"Point\",\r\n                \"coordinates\": [\r\n                    107.56725311235643,\r\n                    -6.923039077177542\r\n                ]\r\n            },\r\n            \"properties\": {\r\n                \"name\": \"sekolah\",\r\n                \"description\": \"sekolah\"\r\n            }\r\n        },\r\n        {\r\n            \"type\": \"Feature\",\r\n            \"geometry\": {\r\n                \"type\": \"LineString\",\r\n                \"coordinates\": [\r\n                    [\r\n                        107.5553226466582,\r\n                        -6.927952535484249\r\n                    ],\r\n                    [\r\n                        107.58502006749042,\r\n                        -6.921476984021265\r\n                    ]\r\n                ]\r\n            },\r\n            \"properties\": {\r\n                \"name\": \"patahan\",\r\n                \"description\": \"patahan\"\r\n            }\r\n        }\r\n    ]\r\n}','red','2025-01-21 21:06:29','2025-01-21 21:06:29'),(2,'Framework Microsoft',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-03-07 01:32:40','2025-03-07 01:32:40'),(3,'Framework Microsoft',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-03-07 01:33:02','2025-03-07 01:33:02'),(4,'transportasi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-03-10 00:20:17','2025-03-10 00:20:17'),(5,'dfsf',NULL,NULL,NULL,'ffff',NULL,NULL,NULL,'2025-03-10 00:22:15','2025-03-10 00:22:15'),(6,'arunika',NULL,NULL,NULL,'ffff',NULL,NULL,NULL,'2025-03-10 00:27:16','2025-03-10 00:27:16'),(7,'Thesis',NULL,NULL,NULL,'fsdf',NULL,NULL,NULL,'2025-03-10 00:30:27','2025-03-10 00:30:27');
/*!40000 ALTER TABLE `maps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_08_29_094544_create_articles_table',2),(5,'2024_08_29_074539_create_galeris_table',3),(6,'2024_09_06_090701_add_author_published_at_status_to_articles_table',4),(7,'2024_10_26_125421_create_maps_table',5),(8,'2024_10_26_151753_modify_latitude_longitude_in_maps_table',5),(9,'2024_10_28_074946_add_marker_color_to_maps_table',5),(10,'2025_01_22_073622_create_maps_table',6),(11,'2025_02_10_080457_create_layers_table',6),(12,'2025_02_10_080506_create_features_table',6),(13,'2025_02_11_085344_add_feature_to_layers_table',7),(14,'2025_02_25_091012_create_layer_map_table',8),(15,'2025_03_11_042531_add_geojson_path_to_layers',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('p5o0VFKGmxmIXksEIHi2U2FgqQtGXhX7JACEm8cr',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXh6U25BTTBoUWVHeHhWYTdzSWN3b0tqcUY4TUt5Q1R2VHhNaUlnQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXAvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9',1751517918);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'user2','user2@mail.com',NULL,'$2y$12$ejoMzErsIfhYMzE7z5tZROjFlxcfLh1C7ublzGl65RTMA8OTEEVne','admin',1,NULL,'2024-09-03 21:17:24','2024-09-03 21:17:24'),(4,'admin','admin@admin.com',NULL,'$2y$12$Jj90KKjK/Qqlg9VcmlLki.GjuSk/2UA.b9XQ6kU2lKfDLXF7FW18G','admin',1,NULL,'2024-09-09 23:04:19','2024-09-09 23:04:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sisiraja'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-04 15:16:03
