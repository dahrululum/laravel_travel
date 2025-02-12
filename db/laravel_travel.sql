/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : laravel_travel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-02-12 16:26:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO migrations VALUES ('2', '2014_10_12_100000_create_password_reset_tokens_table', '1');
INSERT INTO migrations VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO migrations VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO migrations VALUES ('5', '2025_02_12_063450_create_jenispakets_table', '2');
INSERT INTO migrations VALUES ('6', '2025_02_12_072910_create_programharis_table', '3');
INSERT INTO migrations VALUES ('7', '2025_02_12_084413_create_maskapais_table', '4');
INSERT INTO migrations VALUES ('8', '2025_02_12_085126_create_hotels_table', '5');
INSERT INTO migrations VALUES ('9', '2025_02_12_085755_create_itineraries_table', '6');
INSERT INTO migrations VALUES ('10', '2025_02_12_090638_create_fasilitas_table', '7');
INSERT INTO migrations VALUES ('11', '2025_02_12_091314_create_persyaratans_table', '8');
INSERT INTO migrations VALUES ('12', '2025_02_12_091942_create_kamars_table', '9');

-- ----------------------------
-- Table structure for `password_reset_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `personal_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `ref_fasilitas`;
CREATE TABLE `ref_fasilitas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_fasilitas
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_hotel`
-- ----------------------------
DROP TABLE IF EXISTS `ref_hotel`;
CREATE TABLE `ref_hotel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namahotel` varchar(255) NOT NULL,
  `ket` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_hotel
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_itinerary`
-- ----------------------------
DROP TABLE IF EXISTS `ref_itinerary`;
CREATE TABLE `ref_itinerary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `rute` varchar(255) NOT NULL,
  `ket` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_itinerary
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_jenispaket`
-- ----------------------------
DROP TABLE IF EXISTS `ref_jenispaket`;
CREATE TABLE `ref_jenispaket` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namajenis` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `lamahari` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `ket` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_jenispaket
-- ----------------------------
INSERT INTO ref_jenispaket VALUES ('1', '13D PDG-KUL-JED/MED', '67ac49d986dce', '7', '1', '<p>basinglah</p>', '2025-02-12 07:17:22', '2025-02-12 07:17:22');

-- ----------------------------
-- Table structure for `ref_kamar`
-- ----------------------------
DROP TABLE IF EXISTS `ref_kamar`;
CREATE TABLE `ref_kamar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namakamar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `ket` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_kamar
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_maskapai`
-- ----------------------------
DROP TABLE IF EXISTS `ref_maskapai`;
CREATE TABLE `ref_maskapai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namamaskapai` varchar(255) NOT NULL,
  `bandara` varchar(255) NOT NULL,
  `ket` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_maskapai
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_persyaratan`
-- ----------------------------
DROP TABLE IF EXISTS `ref_persyaratan`;
CREATE TABLE `ref_persyaratan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `tipe` char(255) NOT NULL DEFAULT '1',
  `isi` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_persyaratan
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_programhari`
-- ----------------------------
DROP TABLE IF EXISTS `ref_programhari`;
CREATE TABLE `ref_programhari` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namaprogram` varchar(255) NOT NULL,
  `ket` longtext NOT NULL,
  `status` char(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ref_programhari
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'Dahrul Ulum', 'dahrul.ulum@gmail.com', null, '$2y$12$oNAk2tEzdQLKVs2xG6wZ0uxYlU2XcB4GX2eofoYXh3/9/XFRwzZXO', null, '2025-02-12 06:32:46', '2025-02-12 06:32:46');
