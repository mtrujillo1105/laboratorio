-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para catalogo
CREATE DATABASE IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `catalogo`;

-- Volcando estructura para tabla catalogo.asesoria
CREATE TABLE IF NOT EXISTS `asesoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ASESORIA_Codigo` bigint(20) DEFAULT NULL,
  `ASESORIA_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ASESORIA_Descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.asesoria: ~1 rows (aproximadamente)
DELETE FROM `asesoria`;
/*!40000 ALTER TABLE `asesoria` DISABLE KEYS */;
INSERT INTO `asesoria` (`id`, `ASESORIA_Codigo`, `ASESORIA_Nombre`, `ASESORIA_Descripcion`, `created_at`, `updated_at`) VALUES
	(2, NULL, 'Asesoria de matlab', 'HI', NULL, NULL);
/*!40000 ALTER TABLE `asesoria` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.asesorias
CREATE TABLE IF NOT EXISTS `asesorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nombre_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Correo_Electrónico_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Celular_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nombre_Asesoria_Laboratorio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descripcion_Asesoria` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.asesorias: ~0 rows (aproximadamente)
DELETE FROM `asesorias`;
/*!40000 ALTER TABLE `asesorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesorias` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTP_Codigo` bigint(20) DEFAULT NULL,
  `CURSOC_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CURSOC_Descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CURSOC_Descuento` decimal(8,2) NOT NULL DEFAULT '0.00',
  `CURSOC_Costo` decimal(8,2) NOT NULL DEFAULT '0.00',
  `CURSOC_FechaInicio` datetime DEFAULT NULL,
  `CURSOC_FlagEstado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `CURSOC_FechaModificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.curso: ~0 rows (aproximadamente)
DELETE FROM `curso`;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_curso` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_min` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_max` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` decimal(8,2) NOT NULL,
  `descuento` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.descuentos: ~0 rows (aproximadamente)
DELETE FROM `descuentos`;
/*!40000 ALTER TABLE `descuentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `descuentos` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.horario_cursos
CREATE TABLE IF NOT EXISTS `horario_cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semana_labor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_labor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicial` int(11) NOT NULL,
  `hora_final` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.horario_cursos: ~0 rows (aproximadamente)
DELETE FROM `horario_cursos`;
/*!40000 ALTER TABLE `horario_cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_cursos` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.horario_instructors
CREATE TABLE IF NOT EXISTS `horario_instructors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_instructor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semana_labor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_labor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicial` int(11) NOT NULL,
  `hora_final` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.horario_instructors: ~0 rows (aproximadamente)
DELETE FROM `horario_instructors`;
/*!40000 ALTER TABLE `horario_instructors` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_instructors` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PERSP_Codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTC_FlagEstado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instructor_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.instructor: ~0 rows (aproximadamente)
DELETE FROM `instructor`;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.migrations: ~14 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_07_02_183519_create_roles_table', 1),
	(5, '2020_07_02_184037_create_role_user_table', 1),
	(6, '2020_07_06_102545_create_curso_table', 1),
	(7, '2020_07_08_113518_create_instructor_table', 1),
	(8, '2020_07_08_120136_create_horario_cursos_table', 1),
	(9, '2020_07_08_121301_create_descuentos_table', 1),
	(10, '2020_07_08_122015_create_horario_instructors_table', 1),
	(11, '2020_08_15_202521_create_solicitante_table', 1),
	(12, '2020_08_16_022024_create_asesorias_table', 1),
	(13, '2020_08_16_170434_create_servicio_table', 1),
	(14, '2020_08_16_200233_create_asesoria_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.roles: ~0 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.role_user: ~0 rows (aproximadamente)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Universidad_Procedencia` text COLLATE utf8mb4_unicode_ci,
  `Nombre_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Correo_Electrónico_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Celular_Contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tipo_Servicio_Academico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descripcion_Servicio_Solicitado` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.servicio: ~0 rows (aproximadamente)
DELETE FROM `servicio`;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.solicitante
CREATE TABLE IF NOT EXISTS `solicitante` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SOLIC_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLIC_Ruc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLIC_Direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLIC_Telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLIC_Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SOLIC_FlagEstado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UBIGP_Codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TIPSOLIP_Codigo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.solicitante: ~0 rows (aproximadamente)
DELETE FROM `solicitante`;
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;

-- Volcando estructura para tabla catalogo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla catalogo.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
