-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para marcaciones
DROP DATABASE IF EXISTS `marcaciones`;
CREATE DATABASE IF NOT EXISTS `marcaciones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `marcaciones`;

-- Volcando estructura para tabla marcaciones.empleados
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cedula` bigint NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  `lugar_marcacion` int unsigned DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `FK_lugar_marcacion` (`lugar_marcacion`),
  CONSTRAINT `FK_lugar_marcacion` FOREIGN KEY (`lugar_marcacion`) REFERENCES `lugares` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla marcaciones.empleados: ~11 rows (aproximadamente)
DELETE FROM `empleados`;
INSERT INTO `empleados` (`id`, `cedula`, `nombre`, `apellido`, `fecha_nacimiento`, `correo`, `estado`, `lugar_marcacion`, `fecha_registro`) VALUES
	(1, 1234, 'Test', 'One', '1999-10-21', 'tester@test.com', 1, 1, '2023-10-21 18:12:08'),
	(2, 1444, 'Juan', 'Urrego', '1990-10-15', 'juan@gmail.com', 1, 2, '2023-10-21 18:12:08'),
	(3, 122, 'Magni quos exercitat', 'Labore modi ullamco ', '1997-05-08', 'dawud@mailinator.com', 1, 3, '2023-10-21 19:07:36'),
	(5, 31, 'Voluptas expedita si', 'Enim sapiente sunt d', '1981-10-26', 'bujysa@mailinator.com', 0, 4, '2023-10-21 19:11:29'),
	(6, 18, 'Minus sunt ad non i', 'Nisi exercitationem ', '2006-03-25', 'qigyhypa@mailinator.com', 1, 3, '2023-10-21 19:12:25'),
	(7, 77, 'Ipsum aliquid dolore', 'Est elit cillum ius', '1975-12-14', 'molipozyq@mailinator.com', 0, 2, '2023-10-21 19:12:41'),
	(8, 38, 'Voluptatem hic adipi', 'Saepe laudantium in', '1995-07-04', 'keqipic@mailinator.com', 1, 1, '2023-10-21 19:14:27'),
	(9, 82222222, 'Consectetur in et v', 'Minima et sit blandi', '1997-04-20', 'cotewedof@mailinator.com', 1, 2, '2023-10-21 19:16:00'),
	(10, 48, 'Dicta et ad et aut e', 'Nemo vel corrupti i', '1979-12-25', 'wuhe@mailinator.com', 0, 3, '2023-10-21 21:22:02'),
	(11, 10100, 'In maiores aut dolor', 'Debitis ut nesciunt', '2015-02-20', 'falusim@mailinator.com', 1, 1, '2023-10-31 04:24:51');

-- Volcando estructura para tabla marcaciones.lugares
DROP TABLE IF EXISTS `lugares`;
CREATE TABLE IF NOT EXISTS `lugares` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `lugar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla marcaciones.lugares: ~4 rows (aproximadamente)
DELETE FROM `lugares`;
INSERT INTO `lugares` (`id`, `lugar`) VALUES
	(1, 'GENERAL'),
	(2, 'OFICINA'),
	(3, 'NOMINA'),
	(4, 'PORTERIA');

-- Volcando estructura para tabla marcaciones.marcaciones
DROP TABLE IF EXISTS `marcaciones`;
CREATE TABLE IF NOT EXISTS `marcaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint unsigned NOT NULL,
  `entrada` timestamp NOT NULL,
  `tipo_entrada` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lugar_entrada_id` int unsigned NOT NULL,
  `salida` timestamp NULL DEFAULT NULL,
  `tipo_salida` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lugar_salida_id` int unsigned DEFAULT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_empleado_id_marcaciones` (`empleado_id`),
  KEY `FK_lugar_entrada` (`lugar_entrada_id`),
  CONSTRAINT `FK_empleado_id_marcaciones` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_lugar_entrada` FOREIGN KEY (`lugar_entrada_id`) REFERENCES `lugares` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla para el control de las marcaciones';

-- Volcando datos para la tabla marcaciones.marcaciones: ~4 rows (aproximadamente)
DELETE FROM `marcaciones`;
INSERT INTO `marcaciones` (`id`, `empleado_id`, `entrada`, `tipo_entrada`, `lugar_entrada_id`, `salida`, `tipo_salida`, `lugar_salida_id`, `registro`) VALUES
	(1, 1, '2023-11-04 13:21:00', 'MANUAL', 1, '2023-11-04 19:47:27', 'QR', 0, '2023-11-04 19:21:00'),
	(2, 2, '2023-11-04 20:23:48', 'MANUAL', 1, NULL, NULL, 0, '2023-11-04 20:23:48'),
	(3, 3, '2023-11-04 20:24:44', 'MANUAL', 1, '2023-11-04 20:26:34', 'QR', 0, '2023-11-04 20:24:44'),
	(10, 1, '2023-11-11 16:33:05', 'MANUAL', 1, '2023-11-11 16:33:50', 'MANUAL', 2, '2023-11-11 16:33:05');

-- Volcando estructura para tabla marcaciones.sessiones
DROP TABLE IF EXISTS `sessiones`;
CREATE TABLE IF NOT EXISTS `sessiones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cedula` bigint unsigned NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dispositivo` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_hora` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla para almacenar las sesiones ';

-- Volcando datos para la tabla marcaciones.sessiones: ~28 rows (aproximadamente)
DELETE FROM `sessiones`;
INSERT INTO `sessiones` (`id`, `cedula`, `estado`, `dispositivo`, `fecha_hora`) VALUES
	(1, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:31:09'),
	(2, 109353701922, 'error', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:31:23'),
	(3, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:42:33'),
	(4, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:44:19'),
	(5, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:47:57'),
	(6, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:52:41'),
	(7, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 17:54:30'),
	(8, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 18:07:46'),
	(9, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 18:07:51'),
	(10, 92, 'error', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 19:46:45'),
	(11, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 19:46:50'),
	(12, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 20:57:15'),
	(13, 1093537019, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 21:21:40'),
	(14, 2222, 'error', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 21:26:59'),
	(15, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 21:27:07'),
	(16, 123456789, 'error', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 21:27:16'),
	(17, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.57', '2023-10-21 21:27:43'),
	(18, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.61', '2023-10-26 02:35:46'),
	(19, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 17:42:05'),
	(20, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 18:15:26'),
	(21, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 18:16:11'),
	(22, 1234567, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 18:23:29'),
	(23, 1234567, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 22:02:27'),
	(24, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.69', '2023-10-26 22:08:18'),
	(25, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76', '2023-10-31 03:10:07'),
	(26, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76', '2023-10-31 03:11:00'),
	(27, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76', '2023-10-31 04:02:18'),
	(28, 123456789, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.76', '2023-10-31 04:24:35'),
	(29, 1234567, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', '2023-11-04 19:30:43'),
	(30, 1093537019, 'error', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', '2023-11-08 01:40:08'),
	(31, 1234567, 'ok', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', '2023-11-08 01:40:17');

-- Volcando estructura para tabla marcaciones.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cedula` bigint NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de usuarios';

-- Volcando datos para la tabla marcaciones.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `correo`, `password`, `rol`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 123456789, 'Jhon Fabio Cardona', 'jfcm@gmail.com', '$2y$10$jvHEd8tnLh0KiRbxRFQL7.IduXwQ.A0fT7sUI57xywri0WT.vxljW', 'developer', 1, '2023-10-21 16:57:20', '2023-10-21 21:23:38'),
	(2, 92, 'Eum amet voluptatem', 'hocy@mailinator.com', '$2y$10$1raobB6EzBGdGMs0kQALteO1e0bTMy3dkw4hf8spEe8Xpt0B0l/pC', 'coordinador', 0, '2023-10-21 19:44:30', '2023-10-21 20:53:26'),
	(3, 26666666, 'Voluptatem qui itaq', 'dafesocysy@mailinator.com', '$2y$10$TZCOsbiJoyqKNjrJmM45quZY1NqoiemYdoGn.YuIcdBUEWZ2xB2Sy', 'coordinador', 1, '2023-10-21 21:22:15', '2023-10-21 21:22:28'),
	(4, 1234567, 'Admin', 'admin@admin.com', '$2y$10$BL5i.XXSksNyQmQxlbElMudqw1.WB45BnDCKes7l2m7i/O/7qCi/G', 'developer', 1, '2023-10-26 18:23:20', '2023-10-26 18:23:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
