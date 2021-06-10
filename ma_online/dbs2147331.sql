-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: database-5002697668.webspace-host.com    Database: dbs2147331
-- ------------------------------------------------------
-- Server version	5.7.33-log

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) unsigned NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_video_id_foreign` (`video_id`),
  CONSTRAINT `comments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (13,25,'Ma Online','Wij hopen dat deze intro een goed beeld geeft, met wat wij willen bereiken op Ma Online.','2021-06-02 21:36:19','2021-06-02 21:36:19'),(15,25,'Dani Rumping','Gave intro, ziet er strak uit!','2021-06-03 05:09:16','2021-06-03 05:09:16'),(19,27,'Rowan van Zijl','Wat een leuke video!','2021-06-09 06:19:10','2021-06-09 06:19:10');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2021_04_14_130619_create_sessions_table',1),(7,'2021_04_21_122457_create_videos_table',1),(8,'2021_05_18_123746_create_tags_table',1),(9,'2021_05_31_142849_create_roles_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL),(2,'Docent',NULL,NULL),(3,'Student',NULL,NULL),(4,'Gebruiker',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('4pD7j8kOew4WIFhovtoIG8TFygUwnU8tMiwGwZve',NULL,'109.38.135.78','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibDhvOE9JMFZLVHJrbm1JVXJ3czJ4TGowZGl3Q0NQaVB3VlFXeEgwTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9fQ==',1623234219),('69q0jV0nhKsdR9t5OswVE5MJScO6O4qjWS3OiNmv',NULL,'109.38.135.78','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiczhqWUtGUkhlZUJYYUlPeDBhS3BUb1BnQ0ZUTVBvRTdEOXgwd3hMdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9fQ==',1623227625),('6dvSYMf603WUiLBdRWTylAeu3ZtPMu6jRcEcrBsU',NULL,'84.241.202.133','Mozilla/5.0 (Linux; Android 11; SAMSUNG SM-G996B) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/14.0 Chrome/87.0.4280.141 Mobile Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ2trc2JmRjlnZU5obVJzenJ2aHhnS2lTY3o4U2lnZkxUcUF6RGU2SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovL3N0ZXBpbmluLnB2Yi1wcm90b3R5cGUubmwvdmlkZW8vMjciO319',1623228392),('6koYHMcPD1iZzdOOV389B5yfwbpBlyhNoXJkFiGW',1,'109.38.135.78','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMWR0d1Y1eHp0MlMxZnZ6OXAyb0pRRjBQVWtuSmxkSjVCQVJLc2xpUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3ZpZGVvLzI1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFFIbXlqb1FjaEszc2EvYXJKcUMuQy5RS0ZoSHgyTWhZLlVjM2FkV0Q1THByL2pWTnRwUVJxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRRSG15am9RY2hLM3NhL2FySnFDLkMuUUtGaEh4Mk1oWS5VYzNhZFdENUxwci9qVk50cFFScSI7fQ==',1623228756),('cdIaD5L39qLRfMW9HUwqXh8vXUf3L1AskCDHZnyi',NULL,'109.38.134.103','Mozilla/5.0 (Linux; Android 11; SAMSUNG SM-G780F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/14.0 Chrome/87.0.4280.141 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiem9LWTR1d3dmQVdvWXNuQVhUNjZGNzR3dTM5U2xaVHp5VVpDZENGTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623226593),('EHbdC52AQB3hUrZRcN3HfwAFowUqdd376tesGTBs',NULL,'109.38.134.103','WhatsApp/2.21.10.16 A','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUR0bWdBcnRQMk12ajdTcjVCckplV2ZtZGZwOGVXWjI3R2w1dGw3dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623226600),('eqjpLyNIlzzSexh6A3eEu822u3Cji5LehzjhI4mp',9,'145.102.244.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNGJJZ2QzRzZKMnVCRjFMdUx2aGcxYmEyN0xmY2txU2hDV3VyWDBBcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3ZpZGVvLzI1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGRDZTZoS3cuSk03V0EyUnpEMTE1N2VoQWZ1S1gxdUt2ZnR2RmRIWnBGM0FSOGFRN2V0RkdhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRkQ2U2aEt3LkpNN1dBMlJ6RDExNTdlaEFmdUtYMXVLdmZ0dkZkSFpwRjNBUjhhUTdldEZHYSI7fQ==',1623226912),('FKyeHjXafgDX3BcTOwaqSuJYPVf2lqb9EGa4XZIU',NULL,'109.38.135.78','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMU5TNHJWWW5qWGhMMjhuR3hUSkM0dXdDb0F1eFN1dTFteDhEaFVpNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623223997),('GvTf4RRMgUslzn6j7u0q8vHXV8CNQkJZkeuMdihp',NULL,'195.121.71.6','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV29JdGZIM0EzYmJobVFhN3JPNFRuU3F3aGdpOVBVSENMalF2V1pGeSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovL3N0ZXBpbmluLnB2Yi1wcm90b3R5cGUubmwvdXBsb2FkIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623226768),('hgFLNo70RuG7jn4kLVy69N3eUUpDNieaIjB3i6kS',6,'145.102.244.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMTVlelRGOEJ5c1NNeUJlOXVXTkZvMlVrSnlUanMzVzhmSklqSHJqZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3ZpZGVvLzI1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRpaHNxcmpZM0l0Ny9GR05BdC5VYkJlb09xLjlhOXJnUnZkcWF5YXFDVkpLQnkzNGhnV1FadSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkaWhzcXJqWTNJdDcvRkdOQXQuVWJCZW9PcS45YTlyZ1J2ZHFheWFxQ1ZKS0J5MzRoZ1dRWnUiO30=',1623227089),('Hk2FcUyiifZP7HqEb6r2kkbNV6eDZqbwJew9RO4u',NULL,'109.38.135.78','Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHNvR2lTeFRkNjdwWHNWVU9iNG9RRmxJb2N1SG9HcnM5VnhTU2FIZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623228394),('MB32IyptJUH7vx7ADxBATIHRnmTTF5wXrId5diW4',NULL,'145.102.244.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDA4RWNlSFJ4OTZIYTVFT0VyNlhBek5VcTNwTUpYMUxOdWF5WnJQbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623225904),('wpqcpldTTs6IsiihY3n3tJfpHpKUbp7evWC9hNT2',1,'145.102.244.61','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS0Z6QW4wMHNIaTBBVTFWNU9lR3MySHoyTFZ0amxmOWJua1FrOXViMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFFIbXlqb1FjaEszc2EvYXJKcUMuQy5RS0ZoSHgyTWhZLlVjM2FkV0Q1THByL2pWTnRwUVJxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRRSG15am9RY2hLM3NhL2FySnFDLkMuUUtGaEh4Mk1oWS5VYzNhZFdENUxwci9qVk50cFFScSI7fQ==',1623235229),('zoMzvLsPOE7JZahGMA9Sn7L64yNQSm1zQbEXi1kQ',NULL,'195.121.70.230','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3JlOWlEcTVXNVE0bVptR29SbGR2NUNJTU5rVGl3QThXemQ5VEVSOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9zdGVwaW5pbi5wdmItcHJvdG90eXBlLm5sL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1623226626);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'html',5,'2021-06-01 06:09:04','2021-06-01 06:09:04'),(2,'css',4,'2021-06-01 06:09:04','2021-06-01 06:09:04'),(3,'youtube',1,'2021-06-01 06:09:04','2021-06-01 06:09:04'),(4,'sketchfab',1,'2021-06-01 06:09:04','2021-06-01 06:09:04'),(5,'ftp',1,'2021-06-01 06:09:42','2021-06-01 06:09:42'),(6,'filezilla',1,'2021-06-01 06:09:42','2021-06-01 06:09:42'),(7,'3d_printing',1,'2021-06-01 06:11:25','2021-06-01 06:11:25'),(8,'ultimaker_2',1,'2021-06-01 06:11:25','2021-06-01 06:11:25'),(9,'php',2,'2021-06-01 06:11:52','2021-06-01 06:11:52'),(10,'webform',1,'2021-06-01 06:11:52','2021-06-01 06:11:52'),(11,'gallery',1,'2021-06-01 06:12:22','2021-06-01 06:12:22'),(12,'unity',1,'2021-06-01 06:13:05','2021-06-01 06:13:05'),(13,'swf',1,'2021-06-01 06:13:34','2021-06-01 06:13:34'),(14,'isometrisch',1,'2021-06-01 06:16:12','2021-06-01 06:16:12'),(15,'lijnperspectief',1,'2021-06-01 06:16:12','2021-06-01 06:16:12'),(16,'photoshop',1,'2021-06-01 06:16:47','2021-06-01 06:16:47'),(18,'vr',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(19,'4k',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(20,'360',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(21,'mediacollege',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(22,'amsterdam',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(23,'365_dagen',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(24,'open_dag',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(25,'virtueel',1,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(35,'animatie',1,'2021-06-02 08:50:51','2021-06-02 08:50:51'),(36,'after_effects',1,'2021-06-02 08:50:51','2021-06-02 08:50:51'),(37,'face_swap',1,'2021-06-02 08:52:52','2021-06-02 08:52:52'),(38,'illustrator',1,'2021-06-02 09:00:04','2021-06-02 09:00:04'),(39,'mediavormgeving',1,'2021-06-02 09:00:04','2021-06-02 09:00:04'),(40,'gradients',1,'2021-06-02 09:00:04','2021-06-02 09:00:04'),(41,'kleuroverloop',1,'2021-06-02 09:00:04','2021-06-02 09:00:04'),(42,'portfolio',1,'2021-06-02 09:05:46','2021-06-02 09:05:46'),(43,'design',1,'2021-06-02 09:05:46','2021-06-02 09:05:46'),(44,'mediavormgeven',1,'2021-06-02 09:05:46','2021-06-02 09:05:46'),(45,'interactive_design',1,'2021-06-02 09:05:46','2021-06-02 09:05:46'),(46,'web_design',1,'2021-06-02 09:05:46','2021-06-02 09:05:46'),(50,'gradient',1,'2021-06-02 09:29:35','2021-06-02 09:29:35'),(51,'kleur_verloop',1,'2021-06-02 09:29:35','2021-06-02 09:29:35'),(57,'ma_online',1,'2021-06-02 18:22:15','2021-06-02 18:22:15'),(58,'intro',1,'2021-06-02 18:22:15','2021-06-02 18:22:15'),(59,'uitleg',1,'2021-06-02 18:22:15','2021-06-02 18:22:15'),(60,'laravel',1,'2021-06-03 05:10:57','2021-06-03 05:10:57'),(61,'4_hour',1,'2021-06-03 05:10:57','2021-06-03 05:10:57'),(62,'course',1,'2021-06-03 05:10:57','2021-06-03 05:10:57'),(63,'vue.js',1,'2021-06-03 05:12:44','2021-06-03 05:12:44'),(64,'crash_course',2,'2021-06-03 05:12:44','2021-06-03 05:12:44'),(65,'2021',1,'2021-06-03 05:12:44','2021-06-03 05:12:44'),(66,'2_hours',1,'2021-06-03 05:14:34','2021-06-03 05:14:34'),(67,'full_course',1,'2021-06-03 05:14:34','2021-06-03 05:14:34'),(71,'typografie',1,'2021-06-04 17:10:53','2021-06-04 17:10:53'),(72,'font',1,'2021-06-04 17:10:53','2021-06-04 17:10:53'),(73,'download',1,'2021-06-04 17:10:53','2021-06-04 17:10:53'),(74,'spotify',1,'2021-06-09 06:20:11','2021-06-09 06:20:11'),(75,'website',1,'2021-06-09 06:20:11','2021-06-09 06:20:11'),(76,'react',1,'2021-06-09 06:20:11','2021-06-09 06:20:11');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ma Online','maonline@gmail.com',NULL,'$2y$10$QHmyjoQchK3sa/arJqC.C.QKFhHx2MhY.Uc3adWD5Lpr/jVNtpQRq',NULL,NULL,1,'6jgwwVitNHDKM55x4sCkbSebdBO6wYe0tTv2GYWPAVdUSkXlgiCZXnjdK7Tx',NULL,'https://ui-avatars.com/api/?name=Ma%20Online&color=7F9CF5&background=EBF4FF',NULL,NULL),(2,'Ruben_Koops','rubenkoops@ma.nl',NULL,'$2y$10$o9R4nfcvySqdsF5omKocvuGTUclNC0qVxjj1s.chU26DvWSYsYe1a',NULL,NULL,2,'eOKvHzpj83mCC8FUbpoy8ywFkodtKkbtAyLVaXKGaauYx9RYazqzumAM3nLc',NULL,'https://ui-avatars.com/api/?name=Ruben%20Koops&color=7F9CF5&background=EBF4FF','2021-06-01 06:06:37','2021-06-04 16:56:57'),(3,'Rosanne','25222@ma-web.nl',NULL,'$2y$10$T/y8GtudwJ3hKuEJuVN/ZuvGpGrcj9mFInkmpYZpmq6OTmSKxfy72',NULL,NULL,3,'jx4iGmAbXtAKcdzSWtvSzXi7R4eb7zvEYU0PCs4yv0JYyzXMng8fBCePn3lB',NULL,'https://ui-avatars.com/api/?name=Rosanne&color=7F9CF5&background=EBF4FF','2021-06-01 09:02:18','2021-06-02 09:43:36'),(4,'Dani_Rumping','daanrumping1@gmail.com',NULL,'$2y$10$w7fRutFQeeWMlLevJ60qgOMVFWudrYkYl.OsM2.UIbphAOFnVC5Ta',NULL,NULL,3,'sb3h1hQdBo8AxoiEZxss5ugr2Qp6UDAN8uAnN2DEhDV3IGB6xP87Zkcnr9MT',NULL,'https://ui-avatars.com/api/?name=Dani%20Rumping&color=7F9CF5&background=EBF4FF','2021-06-01 10:21:12','2021-06-02 21:41:45'),(6,'Fonteyn','25182@ma-web.nl',NULL,'$2y$10$ihsqrjY3It7/FGNAt.UbBeoOq.9a9rgRvdqayaqCVJKBy34hgWQZu',NULL,NULL,3,NULL,NULL,'https://ui-avatars.com/api/?name=Fonteyn&color=7F9CF5&background=EBF4FF','2021-06-02 05:37:50','2021-06-02 05:37:50'),(9,'Rowan_van_Zijl','24965@ma-web.nl',NULL,'$2y$10$dCe6hKw.JM7WA2RzD1157ehAfuKX1uKvftvFdHZpF3AR8aQ7etFGa',NULL,NULL,3,NULL,NULL,'https://ui-avatars.com/api/?name=Rowan van Zijl&color=7F9CF5&background=EBF4FF','2021-06-09 06:17:52','2021-06-09 06:19:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_one` int(11) NOT NULL,
  `star_two` int(11) NOT NULL,
  `star_three` int(11) NOT NULL,
  `star_four` int(11) NOT NULL,
  `star_five` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'0VPmRgw-Q6c','HTML/CSS - Video tag, YouTube en Sketchfab embed','In deze tutorial laat ik zien hoe de HTML5 video tag werkt en hoe je Youtube en Sketchfab kan embedden in je website','html,css,youtube,sketchfab','6:17',0,0,0,0,0,2,'2021-06-01 06:09:05','2021-06-01 06:09:05'),(2,'H2yCKUvPCPM','HTML/CSS - FTP website uploaden','In deze tutorial laat ik zien hoe je met behulp van FileZilla en FTP je website online kan zetten','html,css,ftp,filezilla','2:59',0,0,0,0,0,2,'2021-06-01 06:09:42','2021-06-01 06:09:42'),(3,'iyu1XwJCmuU','3D Printing op de Ultimaker 2','','3d_printing,ultimaker_2','8:09',0,0,0,0,0,2,'2021-06-01 06:11:25','2021-06-01 06:11:25'),(4,'5XbCz8htfME','Tutorial PHP web form','Een simpel formulier dat via PHP een mail stuurt.','php,webform','13:25',0,0,0,0,0,2,'2021-06-01 06:11:52','2021-06-01 06:11:52'),(5,'w6bhwACc-VQ','Tutorial PHP gallery','Laat PHP voor jou een gallery produceren uit een mapje met sheets.','php,gallery','7:31',0,0,0,0,0,2,'2021-06-01 06:12:22','2021-06-01 06:12:22'),(6,'HLyBOIVFOxU','HTML/CSS - HTML export Unity','Deze tutorial laat zien hoe je een HTML export vanuit Unity maakt die je vervolgens in je browser kunt spelen.','html,css,unity','4:48',0,0,0,0,0,2,'2021-06-01 06:13:05','2021-06-01 06:13:05'),(7,'aEcjsa1nGwg','HTML/CSS - SWF game page','Deze tutorial laat zien hoe je een SWF bestand in een HTML pagina kunt zetten en deze vervolgens kunt stijlen met CSS.','html,css,swf','8:00',0,0,0,0,0,2,'2021-06-01 06:13:34','2021-06-01 06:13:34'),(8,'xRNLqiIvL7Q','Isometrisch en lijnperspectief raster opzetten','Deze tutorial laat zien hoe je een isometrisch en lijnperspectief raster kan opzetten als hulpmiddel bij het painten.','isometrisch,lijnperspectief','11:05',0,0,0,0,0,2,'2021-06-01 06:16:12','2021-06-01 06:16:12'),(11,'daR3Pzt52Dg','VR rondleiding ? | Editie 2020 | Mediacollege Amsterdam 365 dagen Open Dag','Wil je een kijkje nemen op het mbo van het Mediacollege Amsterdam? Belle en Aron, twee studenten van de opleiding Filmacteur, nemen je graag mee door de school tijdens een virtuele rondleiding.','vr,4k,360,mediacollege,amsterdam,365_dagen,open_dag,virtueel','5:45',0,0,0,0,0,4,'2021-06-01 10:23:05','2021-06-01 10:23:05'),(16,'XLPchE7DPQE','Simple Animation Tutorial - After Effects','This simple animation tutorial will show you how to bring your design from Adobe Illustrator to Adobe after effects. Once the design is in after effects we begin the basic animation process. We start with the scale option in after effects.','animatie,after_effects','39:53',0,0,0,0,0,3,'2021-06-02 08:50:51','2021-06-02 08:50:51'),(17,'gOQ25Kp6jPY','Swap Faces In Photoshop','In this tutorial, you will learn to Swap faces In Photoshop. Swapping faces or swapping heads is perhaps what Photoshop is most commonly used for.','photoshop,face_swap','13:58',0,0,0,0,0,3,'2021-06-02 08:52:52','2021-06-02 08:52:52'),(18,'DK5KaVyyHt4','How to Make a Gradient in Illustrator','Welcome to How to Make a Gradient in Illustrator. In this video, you will learn the step by step process of how to create basic gradients using Adobe Illustrator. A gradient is a gradual blend of two or more colors (or different tints of the same color). Common uses for gradients include adding light/shadow effects, adding volume to objects and creating reflective surfaces such as metallic materials and gold. Another very popular use for color gradients includes creating abstract backgrounds, color overlays and emphasizing brand identity. Even a subtle gradient can go a long way.','illustrator,mediavormgeving,gradients,kleuroverloop','12:23',0,0,0,0,0,3,'2021-06-02 09:00:04','2021-06-02 09:00:04'),(19,'md0QkvqAn4s','How To Put Together A Graphic Design Portfolio','In this video I\'m sharing my tips for creating the best design portfolio! If you\'re applying to art school or interviewing for jobs I think this video will help a lot. We cover what type of portfolio you need, printed, website etc. and how to diversify the work you show and how many pieces you need in a graphic design portfolio! This will also help if you want to get into freelancing, using a website portfolio or social media to show your work!','portfolio,design,mediavormgeven,interactive_design,web_design','13:31',0,0,0,0,0,3,'2021-06-02 09:05:46','2021-06-02 12:03:52'),(23,'Wg1lL6tgq3c','How to Add Gradient to Editable Text | Illustrator CC Tutorial','In this Illustrator tutorial, learn how to add a gradient to editable text. It\'s not as easy as you might think, and involves making the text invisible before you apply the gradient fill through the appearance panel. Learn how to apply a gradient in this gradient text Illustrator tutorial.','gradient,kleur_verloop','5:11',0,0,0,0,0,3,'2021-06-02 09:29:35','2021-06-02 12:03:59'),(25,'Z0N4Sl4RT5c','Intro Ma Online','Deze video legt uit waar Ma Online voor gemaakt is en wat er allemaal mogelijk is.','ma_online,intro,uitleg','1:56',0,0,0,0,0,1,'2021-06-02 18:22:15','2021-06-02 21:51:16'),(26,'ImtZ5yENzgE','Laravel PHP Framework Tutorial - Full Course for Beginners (2019)','Learn Laravel 5.8 by creating an Instagram clone in this full tutorial course for beginners. Laravel is a free, open-source PHP web framework used for creating web applications. \r\n\r\n?Code: https://github.com/coderstape/freecodegram\r\n\r\n⭐️Course Contents ⭐️\r\n⌨️ (0:00) Introduction\r\n⌨️ (1:14) What is Laravel?\r\n⌨️ (2:07) Installing Laravel\r\n⌨️ (5:30) First look at the project\r\n⌨️ (7:15) Intro to php artisan\r\n⌨️ (11:42) Generating login flow with make:auth\r\n⌨️ (12:04) Setting Up the Front End with Node and NPM\r\n⌨️ (20:00) Migrations and Setting Up SQLite\r\n⌨️ (26:00) Designing the UI from Instagram\r\n⌨️ (42:12) Adding Username to the Registration Flow\r\n⌨️ (58:35) Creating the Profiles Controller\r\n⌨️ (1:04:00) RESTful Resource Controller\r\n⌨️ (1:09:10) Passing Data to the View\r\n⌨️ (1:10:20) Adding the Profiles Mode, Migration and Table\r\n⌨️ (1:17:30) Adding Eloquent Relationships\r\n⌨️ (1:28:10) Fetching the Record From The Database\r\n⌨️ (1:30:00) Adding Posts to the Database &amp; Many To Many Relationship\r\n⌨️ (2:04:24) Creating Through a Relationship\r\n⌨️ (2:08:12) Uploading/Saving the Image to the Project\r\n⌨️ (2:19:19) Resizing Images with Intervention Image PHP Library\r\n⌨️ (2:27:42) Route Model Binding\r\n⌨️ (2:31:48) Editing the Profile\r\n⌨️ (2:46:46) Restricting/Authorizing Actions with a Model Policy\r\n⌨️ (2:54:50) Editing the Profile Image\r\n⌨️ (3:00:00) Automatically Creating A Profile Using Model Events\r\n⌨️ (3:12:56) Default Profile Image\r\n⌨️ (3:19:48) Follow/Unfollow Profiles Using a Vue.js Component\r\n⌨️ (3:31:28) Many To Many Relationship\r\n⌨️ (3:46:33) Calculating Followers Count and Following Count\r\n⌨️ (3:48:55) Laravel Telescope\r\n⌨️ (3:51:44) Showing Posts from Profiles The User Is Following\r\n⌨️ (4:01:03) Pagination with Eloquent\r\n⌨️ (4:03:25) N + 1 Problem &amp; Solution\r\n⌨️ (4:05:21) Make Use of Cache for Expensive Query\r\n⌨️ (4:11:44) Sending Emails to New Registered Users\r\n⌨️ (4:21:51) Wrapping Up\r\n⌨️ (4:22:37) Closing Remarks &amp; What\'s Next In your Learning\r\n\r\n?Course from Coder\'s Tape. Check out their YouTube channel for more great Laravel tutorials: https://www.youtube.com/coderstape\r\n\r\n--\r\n\r\nLearn to code for free and get a developer job: https://www.freecodecamp.org\r\n\r\nRead hundreds of articles on programming: https://medium.freecodecamp.org\r\n\r\nAnd subscribe for new videos on technology every day: https://youtube.com/subscription_center?add_user=freecodecamp','laravel,4_hour,course','4:25:05',0,0,0,0,0,4,'2021-06-03 05:10:57','2021-06-03 05:10:57'),(27,'qZXt1Aom3Cs','Vue JS Crash Course 2021','Learn the fundamentals of Vue JS (v3) in this project-based crash course\r\n\r\nTask Tracker:\r\nhttps://github.com/bradtraversy/vue-crash-2021\r\n\r\nRandom User Generator:\r\nhttps://codepen.io/bradtraversy/pen/LYbzJjK\r\n\r\nLatest Udemy Courses:\r\nhttps://traversymedia.com​\r\n\r\n?  Support The Channel!\r\nhttp://www.patreon.com/traversymedia\r\n\r\nTimestamps:\r\n0:00 - Intro &amp; Slides\r\n7:17 - User Generator Mini Project (CDN)\r\n21:35 - Vue CLI Setup\r\n24:30 - Files, Dev Server &amp; Cleanup\r\n28:22 - Global Styles\r\n29:06 - Header Component\r\n30:44 - Component Props\r\n32:06 - Button Component\r\n35:25 - Events\r\n36:09 - Task Data &amp; created() Method\r\n38:22 - Tasks Component &amp; v-for Loop\r\n41:09 - Single Task Component\r\n44:34 - Dynamic Classes\r\n45:53 - Emit Events (Delete Task)\r\n52:14 - Toggle Reminder\r\n56:20 - AddTask Component &amp; v-model\r\n1:04:57 - Toggle Form &amp; Template Conditionals\r\n1:11:20 - Building For Production\r\n1:13:33 - JSON-Server Setup\r\n1:17:18 - Refactoring to Use The Backend\r\n1:30:48 - Implementing the Router\r\n1:48:23 - Restrict a Component to a Route','vue.js,crash_course,2021','1:50:52',0,0,0,0,0,4,'2021-06-03 05:12:44','2021-06-03 05:12:44'),(28,'pQN-pnXPaVg','HTML Full Course - Build a Website Tutorial','Learn the basics of HTML5 and web development in this awesome course for beginners. \r\n\r\nWant more from Mike? He\'s starting a coding RPG/Bootcamp - https://simulator.dev/\r\n\r\n⭐️ Contents ⭐️\r\n⌨️ (0:00:00) Introduction\r\n⌨️ (0:01:54) Choosing a Text Editor\r\n⌨️ (0:08:13) Creating an HTML file\r\n⌨️ (0:20:31) Basic Tags\r\n⌨️ (0:36:47) Comments\r\n⌨️ (0:42:13) Style &amp; Color\r\n⌨️ (0:48:07) Formatting a Page\r\n⌨️ (0:59:16) Links\r\n⌨️ (1:07:33) Images\r\n⌨️ (1:16:12) Videos &amp; Youtube iFrames\r\n⌨️ (1:23:00) Lists\r\n⌨️ (1:28:53) Tables\r\n⌨️ (1:37:21) Divs &amp; Spans\r\n⌨️ (1:44:54) Input &amp; Forms\r\n⌨️ (1:53:44) iFrames\r\n⌨️ (1:57:21) Meta Tags\r\n\r\nCourse developed by Mike Dane. Check out his YouTube channel for more great programming courses: https://www.youtube.com/channel/UCvmINlrza7JHB1zkIOuXEbw\r\n\r\n?Follow Mike on Twitter - https://twitter.com/mike_dane\r\n\r\n?The Mike\'s website: https://www.mikedane.com/\r\n\r\n⭐️Other full courses by Mike Dane on our channel ⭐️\r\n?Python: https://youtu.be/rfscVS0vtbw\r\n?C: https://youtu.be/KJgsSFOSQv0\r\n?C++: https://youtu.be/vLnPwxZdW4Y\r\n?SQL: https://youtu.be/HXV3zeQKqGY\r\n?Ruby: https://youtu.be/t_ispmWmdjY\r\n?PHP: https://youtu.be/OK_JCtrrv-c\r\n?C#: https://youtu.be/GhQdlIFylQ8\r\n\r\n--\r\n\r\nLearn to code for free and get a developer job: https://www.freecodecamp.org\r\n\r\nRead hundreds of articles on programming: https://medium.freecodecamp.org\r\n\r\nAnd subscribe for new videos on technology every day: https://youtube.com/subscription_center?add_user=freecodecamp','html,2_hours,full_course,crash_course','2:02:32',0,0,0,0,0,4,'2021-06-03 05:14:34','2021-06-03 05:14:34'),(31,'fDJj2ZHEpOE','69 FREE Fonts You’ve Never Heard Of','69 fonts that you\'ve likely never heard of, and FREE FOR COMMERCIAL USE ready to download and implement into graphic design projects, right now!\r\n\r\n\r\nI really enjoy making font videos because I myself love downloading the best free fonts, and then showing them to you so you guys can also download them and make great use of them in your work. I have looked across the internet once again, and handpicked some of the best typefaces that you likely have never heard of, so that you can then be aware of their beauty and excellence. \r\n\r\nIf you found todays video on the best free font downloads for commercial use enjoyable or useful, let me know in the comments section and drop a like on your way out. Subscribe to stay updated to all of my uploads and until next time, design your future today, peace','typografie,font,download','6:26',0,0,0,0,0,3,'2021-06-04 17:10:53','2021-06-04 17:11:35'),(32,'Xcet6msf3eE','How To Build A Better Spotify With React','? IMPORTANT:\r\n\r\nTabnine: https://www.tabnine.com/now?utm_source=youtube.com&amp;utm_medium=Ins&amp;utm_campaign=webdevsimplified\r\n\r\nSpotify is pretty cool, but what if you could make a better version? In this video I show you how to create a Spotify clone that not only has many of Spotify\'s features but also includes lyric lookup for any song you want.\r\n\r\n\r\n? Materials/References:\r\n\r\nGitHub Code: https://github.com/WebDevSimplified/spotify-clone\r\n\r\n\r\n? Find Me Here:\r\n\r\nMy Blog: https://blog.webdevsimplified.com\r\nMy Courses: https://courses.webdevsimplified.com\r\nPatreon: https://www.patreon.com/WebDevSimplified\r\nTwitter: https://twitter.com/DevSimplified\r\nDiscord: https://discord.gg/7StTjnR\r\nGitHub: https://github.com/WebDevSimplified\r\nCodePen: https://codepen.io/WebDevSimplified\r\n\r\n\r\n⏱️ Timestamps:\r\n\r\n00:00 - Introduction\r\n00:25 - Demo/Setup\r\n03:52 - Authorization Setup\r\n10:26 - Server Login Route\r\n15:28 - useAuth Hook\r\n23:39 - Refresh Token Automatically\r\n33:07 - Search\r\n46:58 - Song Player\r\n52:18 - Lyrics\r\n\r\n\r\n#SpotifyClone #WDS #ReactJs','spotify,website,react','58:17',0,0,0,0,0,9,'2021-06-09 06:20:11','2021-06-09 06:20:11');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-09 10:47:52
