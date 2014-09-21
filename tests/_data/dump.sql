# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.16)
# Base de datos: laravel
# Tiempo de Generación: 2014-09-19 16:05:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla accesslevel_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accesslevel_user`;

CREATE TABLE `accesslevel_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accesslevel_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `accesslevel_user_accesslevel_id_index` (`accesslevel_id`),
  KEY `accesslevel_user_user_id_index` (`user_id`),
  CONSTRAINT `accesslevel_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accesslevel_user_accesslevel_id_foreign` FOREIGN KEY (`accesslevel_id`) REFERENCES `accesslevels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla accesslevels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accesslevels`;

CREATE TABLE `accesslevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `accesslevels` WRITE;
/*!40000 ALTER TABLE `accesslevels` DISABLE KEYS */;

INSERT INTO `accesslevels` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
  (1,'Administrator','Administrador del Sitio','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'Secretaria','Secretaria del Oficina','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `accesslevels` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla boat_tour
# ------------------------------------------------------------

DROP TABLE IF EXISTS `boat_tour`;

CREATE TABLE `boat_tour` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `boat_id` int(10) unsigned NOT NULL,
  `tour_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `boat_tour_boat_id_index` (`boat_id`),
  KEY `boat_tour_tour_id_index` (`tour_id`),
  CONSTRAINT `boat_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `boat_tour_boat_id_foreign` FOREIGN KEY (`boat_id`) REFERENCES `boats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `boat_tour` WRITE;
/*!40000 ALTER TABLE `boat_tour` DISABLE KEYS */;

INSERT INTO `boat_tour` (`id`, `boat_id`, `tour_id`, `created_at`, `updated_at`)
VALUES
  (1,1,1,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (2,2,1,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (3,1,2,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (4,2,2,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (5,1,3,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (6,2,3,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (7,1,4,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (8,2,4,'2014-09-19 16:03:51','2014-09-19 16:03:51');

/*!40000 ALTER TABLE `boat_tour` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla boats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `boats`;

CREATE TABLE `boats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `abordajemaximo` int(11) NOT NULL,
  `abordajenormal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `boats` WRITE;
/*!40000 ALTER TABLE `boats` DISABLE KEYS */;

INSERT INTO `boats` (`id`, `name`, `order`, `public`, `abordajemaximo`, `abordajenormal`, `created_at`, `updated_at`)
VALUES
  (1,'Catamaran',1,1,50,40,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'Lancha',2,1,15,13,'2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `boats` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `esAgencia` tinyint(1) NOT NULL DEFAULT '0',
  `credit` float(8,2) NOT NULL DEFAULT '0.00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_identification_unique` (`identification`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `name`, `lastname`, `identification`, `email`, `phone`, `esAgencia`, `credit`, `deleted_at`, `created_at`, `updated_at`)
VALUES
  (1,'Marc','Antón','E-71151324','ngrijalva@terra.com','931-64-3291',0,0.00,NULL,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
(2,'Guillem','Galindo','G-28438550','isolano@herrero.com','963 64 1063',0,0.00,NULL,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
(3,'Jan','Tomas','V-95589944','sanchez.martina@terra.com','+34 967 32 7663',0,0.00,NULL,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
(4,'Miguel','Madrid','G-49713670','uvalentin@hotmail.com','+34 919335455',0,0.00,NULL,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
(5,'Carmen','Serna','E-36222859','aburgos@centro.es','693-67-6466',0,0.00,NULL,'2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla mercadopagos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mercadopagos`;

CREATE TABLE `mercadopagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMercadoPago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operation_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `external_reference` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_approved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `money_release_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `finance_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_paid_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_received_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payerId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payerfirst_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payerlast_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payeremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payernickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonearea_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneextension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collectorid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectorfirst_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectorlast_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectoremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectornickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectorphonearea_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectorphonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collectorphoneextension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
  ('2014_09_05_214828_MercadoPagos',1),
('2014_09_13_193146_make_users_table',1),
('2014_09_13_193343_make_clients_table',1),
('2014_09_13_195255_make_reservations_table',1),
('2014_09_13_195740_make_paymenttypes_table',1),
('2014_09_13_200002_make_passengers_table',1),
('2014_09_13_200306_make_payments_table',1),
('2014_09_13_200426_make_variables_table',1),
('2014_09_13_200555_make_specialdates_table',1),
('2014_09_13_201054_make_tours_table',1),
('2014_09_13_201401_make_boats_table',1),
('2014_09_13_201521_make_accesslevels_table',1),
('2014_09_13_201559_create_accesslevel_user_table',1),
('2014_09_13_201653_create_boat_tour_table',1),
('2014_09_13_201746_make_paymentstatus_table',1),
('2014_09_13_201935_create_session_table',1),
('2014_09_14_044256_add_relation_to_passengers_table',1),
('2014_09_14_044328_add_relation_to_payments_table',1),
('2014_09_14_145637_add_relation_to_reservations_table',1),
('2014_09_16_233103_create_prices_table',1),
('2014_09_16_234457_create_price_tour_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla passengers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `passengers`;

CREATE TABLE `passengers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reservation_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `passengers_reservation_id_foreign` (`reservation_id`),
  CONSTRAINT `passengers_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1801 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `passengers` WRITE;
/*!40000 ALTER TABLE `passengers` DISABLE KEYS */;

/*!40000 ALTER TABLE `passengers` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ammount` float(8,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reservation_id` int(10) unsigned NOT NULL,
  `paymenttype_id` int(10) unsigned NOT NULL,
  `mercadopago_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_reservation_id_foreign` (`reservation_id`),
  KEY `payments_paymenttype_id_foreign` (`paymenttype_id`),
  KEY `payments_mercadopago_id_foreign` (`mercadopago_id`),
  CONSTRAINT `payments_mercadopago_id_foreign` FOREIGN KEY (`mercadopago_id`) REFERENCES `mercadopagos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `payments_paymenttype_id_foreign` FOREIGN KEY (`paymenttype_id`) REFERENCES `paymenttypes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `payments_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla paymentstatus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paymentstatus`;

CREATE TABLE `paymentstatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `paymentstatus` WRITE;
/*!40000 ALTER TABLE `paymentstatus` DISABLE KEYS */;

INSERT INTO `paymentstatus` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
  (1,'No ha abonado nada','0% abono','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'Aguante','0% abono pero necesito que se quede','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (3,'Parcialmente Pagado','Falta por pagar','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (4,'Pagado','Ya pago el 100%','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `paymentstatus` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla paymenttypes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paymenttypes`;

CREATE TABLE `paymenttypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `paymenttypes` WRITE;
/*!40000 ALTER TABLE `paymenttypes` DISABLE KEYS */;

INSERT INTO `paymenttypes` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
  (1,'Efectivo','Pago realizdo en efectivo','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'Cheque','Pago realizdo en Cheque','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (3,'Debito Oficina','Pago realizdo en Debito por la oficina','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (4,'Debito Casabote','Pago realizdo en Debito en Casa Bote','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (5,'Mercadopago','Pago realizdo por Mercadopago','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `paymenttypes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla price_tour
# ------------------------------------------------------------

DROP TABLE IF EXISTS `price_tour`;

CREATE TABLE `price_tour` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price_id` int(10) unsigned NOT NULL,
  `tour_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `price_tour_price_id_index` (`price_id`),
  KEY `price_tour_tour_id_index` (`tour_id`),
  CONSTRAINT `price_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `price_tour_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `price_tour` WRITE;
/*!40000 ALTER TABLE `price_tour` DISABLE KEYS */;

INSERT INTO `price_tour` (`id`, `price_id`, `tour_id`, `created_at`, `updated_at`)
VALUES
  (1,1,1,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (2,1,3,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (3,2,2,'2014-09-19 16:03:51','2014-09-19 16:03:51'),
  (4,2,4,'2014-09-19 16:03:51','2014-09-19 16:03:51');

/*!40000 ALTER TABLE `price_tour` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla prices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adult` float(8,2) NOT NULL,
  `older` float(8,2) NOT NULL,
  `child` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;

INSERT INTO `prices` (`id`, `description`, `adult`, `older`, `child`, `created_at`, `updated_at`)
VALUES
  (1,'2 horas',500.00,250.00,250.00,'2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'1 hora',400.00,200.00,200.00,'2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla reservations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `references` longtext COLLATE utf8_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL DEFAULT '0',
  `olders` int(11) NOT NULL DEFAULT '0',
  `childs` int(11) NOT NULL DEFAULT '0',
  `totalAmmount` float(8,2) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `madeBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'client',
  `modifiedBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(10) unsigned NOT NULL,
  `boat_id` int(10) unsigned NOT NULL,
  `tour_id` int(10) unsigned NOT NULL,
  `paymentStatus_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `reservations_client_id_foreign` (`client_id`),
  KEY `reservations_boat_id_foreign` (`boat_id`),
  KEY `reservations_tour_id_foreign` (`tour_id`),
  KEY `reservations_paymentstatus_id_foreign` (`paymentStatus_id`),
  CONSTRAINT `reservations_paymentstatus_id_foreign` FOREIGN KEY (`paymentStatus_id`) REFERENCES `paymentstatus` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reservations_boat_id_foreign` FOREIGN KEY (`boat_id`) REFERENCES `boats` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reservations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reservations_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;

INSERT INTO `reservations` (`id`, `date`, `references`, `adults`, `olders`, `childs`, `totalAmmount`, `confirmed`, `madeBy`, `modifiedBy`, `deleted_at`, `created_at`, `updated_at`, `client_id`, `boat_id`, `tour_id`, `paymentStatus_id`)
VALUES
  (1,'2014-09-20','Quas aliquid explicabo officiis fugit dolorem dolorem. Officiis hic quia quisquam sapiente itaque et. Necessitatibus qui eos quia non aut ullam fugit.',3,3,1,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',40,1,3,1),
(2,'2014-10-15','Voluptatem aut et tempora illum. Maiores ut tempora quod. Porro id vitae id atque reprehenderit non officiis.',3,2,2,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',34,2,2,1),
(3,'2014-10-16','Consequuntur ut est praesentium molestiae nihil odio. Unde consectetur repellendus omnis sapiente. Adipisci est quasi dolore cupiditate. Ea et amet ea quo dolor repudiandae.',3,3,1,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',78,1,3,2),
(4,'2014-10-04','Inventore veniam atque culpa beatae. Et ut voluptatem quos alias vitae itaque facilis. Consequatur occaecati et adipisci quam illum. Ab expedita commodi porro possimus veritatis magnam non.',2,2,3,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',67,1,1,1),
(5,'2014-10-01','Quo voluptas iure sint officiis minima optio. Quas non et blanditiis. Quae rem in dolorem est. Iste velit soluta itaque necessitatibus rerum quisquam.',2,2,2,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',23,1,3,2),
(6,'2014-10-10','Quis repellat temporibus animi dolorem et aliquam autem. Assumenda velit iste excepturi laudantium. Quia vel earum qui ducimus harum officia. Quia amet amet laudantium voluptatibus saepe.',3,3,1,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',28,1,2,2),
(7,'2014-10-16','Et eum impedit aliquam suscipit eum. Sint eius aut animi praesentium et eos. Sequi quaerat alias omnis voluptatem consequatur aliquam.',2,3,2,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',53,2,2,1),
(8,'2014-10-18','Repellat perspiciatis soluta facilis quis. Itaque repellendus deleniti temporibus.',1,3,2,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',10,2,3,1),
(9,'2014-09-19','Occaecati eaque libero molestias aut. Id beatae voluptatum at voluptas repellat. Impedit eum nisi deserunt.',1,3,3,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',79,2,1,2),
(10,'2014-10-03','Omnis voluptatum enim quaerat quam explicabo illo. Harum autem sint voluptatem et unde voluptas. Tenetur vel eos quibusdam omnis aspernatur.',1,1,1,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',75,2,2,1),
(11,'2014-09-23','Accusantium voluptatibus doloribus voluptas deserunt sunt voluptas dolor. Consectetur qui voluptatum amet magnam quasi sit. Atque vero qui adipisci dolorem laborum et voluptate reiciendis.',2,3,3,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',88,1,2,2),
(12,'2014-10-12','Modi beatae exercitationem rerum explicabo explicabo. Quae et non quam tempora. Fugit cupiditate ipsum nostrum. Repellendus distinctio velit eveniet distinctio natus quam.',3,3,1,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',46,2,2,2),
(13,'2014-10-04','Et non ducimus enim eaque aut. Repellat laboriosam non eius itaque officia reiciendis. Exercitationem suscipit quidem nulla iusto suscipit.',1,2,2,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',76,2,1,2),
(14,'2014-10-17','Et et et perspiciatis esse earum quod. Fuga cupiditate voluptatem et accusamus et sed culpa. Optio in omnis sed eos pariatur. Dolor consequuntur provident eligendi est officia et.',2,2,2,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',54,1,3,1),
(15,'2014-09-23','At dolorem doloremque optio et pariatur autem dolor. Minus et sed voluptas non enim doloremque. Delectus voluptatibus qui ea labore. Doloribus non sed perspiciatis sed cupiditate necessitatibus.',3,2,2,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',32,2,3,2),
(16,'2014-09-28','Eos dolor voluptatem dolores est accusamus ad sit. Explicabo enim omnis dolorum enim molestias animi consequuntur. Molestias at velit odio ratione nulla iusto.',3,3,1,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',22,2,2,2),
(17,'2014-09-23','Quia quo voluptatem cum ut amet doloribus. Minus voluptates est autem. Qui in officiis asperiores repudiandae dolores quo perferendis. Dignissimos omnis tenetur mollitia nulla dolore.',1,2,1,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',14,2,2,1),
(18,'2014-09-27','Qui enim illo et impedit aut enim eos. Eligendi sed aut est voluptatibus quia saepe. Voluptatem perspiciatis nemo sed deleniti ipsam possimus debitis. Id ut ratione et aperiam pariatur.',3,1,3,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',43,2,3,1),
(19,'2014-10-14','Numquam ratione consequatur id eveniet beatae ea. Quidem doloremque consequatur et et. Earum quo ut et soluta quia eveniet. Molestiae aut id eum.',2,1,3,0.00,1,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',58,2,3,1),
(20,'2014-10-04','Tempora quas qui provident illo minima quod. Ad quos porro quaerat et facere. Beatae vel sed veniam distinctio. Iure ut rerum rerum et optio et nobis asperiores.',2,1,1,0.00,0,'Client','',NULL,'2014-09-19 16:03:48','2014-09-19 16:03:48',94,1,1,2);

/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla specialdates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `specialdates`;

CREATE TABLE `specialdates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `specialdates` WRITE;
/*!40000 ALTER TABLE `specialdates` DISABLE KEYS */;

INSERT INTO `specialdates` (`id`, `date`, `class`, `active`, `description`, `created_at`, `updated_at`)
VALUES
  (1,'2013-01-12','work',1,'prueba','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'2014-01-12','work',1,'prueba','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (3,'2014-08-31','work',1,'prueba','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `specialdates` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tours
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tours`;

CREATE TABLE `tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `lunes` tinyint(1) NOT NULL DEFAULT '1',
  `martes` tinyint(1) NOT NULL DEFAULT '1',
  `miercoles` tinyint(1) NOT NULL DEFAULT '1',
  `jueves` tinyint(1) NOT NULL DEFAULT '1',
  `viernes` tinyint(1) NOT NULL DEFAULT '1',
  `sabado` tinyint(1) NOT NULL DEFAULT '1',
  `domingo` tinyint(1) NOT NULL DEFAULT '1',
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;

INSERT INTO `tours` (`id`, `departure`, `name`, `order`, `public`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `descripcion`, `created_at`, `updated_at`)
VALUES
  (1,'10:30 am','Playa','1',1,0,1,1,1,1,1,1,'Paseo que incluye parada en la Playa PicaPica','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'01:00 pm','Extra','2',0,0,1,1,1,1,1,1,'Paseo Extra cuando esta full','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (3,'02:30 pm','Playa','3',1,0,1,1,1,1,1,1,'Paseo que incluye parada en la Playa PicaPica','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (4,'05:00 am','Atardecer','4',1,0,1,1,1,1,1,1,'Paseo que incluye Atardecer en la union de los rios','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_alias_unique` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `lastname`, `alias`, `email`, `password`, `created_at`, `updated_at`)
VALUES
  (1,'Administra Dor','Princi Pal','admin','admin@test.com','$2y$10$Gm0vNodQYaQcZt.Mx7PlIO0mIo.J/W6r/JRPJatEr7OSBdQumE6Rq','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla variables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `variables`;

CREATE TABLE `variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `variables` WRITE;
/*!40000 ALTER TABLE `variables` DISABLE KEYS */;

INSERT INTO `variables` (`id`, `name`, `value`, `created_at`, `updated_at`)
VALUES
  (1,'Lunes','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (2,'Martes','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (3,'Miercoles','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (4,'Jueves','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (5,'Viernes','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (6,'Sabado','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (7,'Domingo','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (8,'minDiasParaReservar','1','2014-09-19 16:03:47','2014-09-19 16:03:47'),
  (9,'temporadaBaja','1','2014-09-19 16:03:47','2014-09-19 16:03:47');

/*!40000 ALTER TABLE `variables` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
