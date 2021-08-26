-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.39-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para hoteleria
CREATE DATABASE IF NOT EXISTS `hoteleria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hoteleria`;

-- Volcando estructura para tabla hoteleria.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla hoteleria.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`usuario`, `nombre`, `email`, `telefono`, `pass`) VALUES
	('admin', 'Administrador', 'admin@gmail.com', '9191234567', '$2y$10$ghIELNhAz5qITFDPgOAOB.cmYbZrP8y1SsxhzDRdzkIEXHp4vvOYO');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `api_token` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`usuario`),
  UNIQUE KEY `api_token` (`api_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla hoteleria.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`usuario`, `nombre`, `email`, `telefono`, `pass`, `api_token`) VALUES
	('usuario', 'Usuario', 'usuario@gmail.com', '9197654321', '$2y$10$F4kgYT5Yf1Bvyy/GARbyEeHBwVDiquXJjb4.v5IfqVkHV7sPJdmR.', '6e671901f52439a324e6d3ff8fe4bfa20ae0f1432c2691736837420b6075785e');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.hotel
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cant_habitaciones` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla hoteleria.hotel: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id`, `nombre`, `descripcion`, `telefono`, `cant_habitaciones`, `direccion`, `precio`) VALUES
	(2, 'HOTEL ZEPEDA', 'Visítanos, somos tu hotel de confianza', '9191234567', 23, '2da. CALLE PONIENTE NORTE N°106 Barrio, Norte, 29950 Ocosingo, Chis., Mexico', 2500.00),
	(3, 'Hotel 123', 'Visitanos', '9191614798', 10, 'Conocida', 1450.00),
	(4, 'HOTEL EX - HACIENDA LA ILUSIÓN', 'Visítanos, no te arrepentirás', '9196730031', 21, 'Carretera Internacional Ocosingo Palenque km 85 s/n Barrio Lindavista, 29950 Ocosingo, Mexico', 1300.00);
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla hoteleria.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.renta
CREATE TABLE IF NOT EXISTS `renta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_i` datetime NOT NULL,
  `fecha_e` datetime NOT NULL,
  `renta_hab` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `forma_pago` enum('EFECTIVO','TC','TRANSFERENCIA') DEFAULT NULL,
  `n_cliente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `n_cliente` (`n_cliente`),
  CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`n_cliente`) REFERENCES `cliente` (`usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla hoteleria.renta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `renta` DISABLE KEYS */;
/*!40000 ALTER TABLE `renta` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.renta_hotel
CREATE TABLE IF NOT EXISTS `renta_hotel` (
  `idRenta` int(11) NOT NULL,
  `idHotel` int(11) NOT NULL,
  KEY `idRenta` (`idRenta`),
  KEY `idHotel` (`idHotel`),
  CONSTRAINT `renta_hotel_ibfk_1` FOREIGN KEY (`idRenta`) REFERENCES `renta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `renta_hotel_ibfk_2` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla hoteleria.renta_hotel: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `renta_hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `renta_hotel` ENABLE KEYS */;

-- Volcando estructura para tabla hoteleria.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla hoteleria.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
