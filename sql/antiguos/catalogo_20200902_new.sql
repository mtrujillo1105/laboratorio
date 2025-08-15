-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para catalogo
CREATE DATABASE IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `catalogo`;

-- Volcando estructura para tabla catalogo.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `ALUMP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `PERSP_Codigo` int(11) DEFAULT NULL,
  `COCAP_Codigo` int(11) DEFAULT NULL,
  `ALUMC_Identificador` varchar(100) DEFAULT NULL,
  `ALUMC_FlagEstado` char(1) DEFAULT '1',
  `ALUMC_FechaModificacion` datetime DEFAULT NULL,
  `ALUMC_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ALUMP_Codigo`),
  KEY `fk_alumno_persona_idx` (`PERSP_Codigo`),
  CONSTRAINT `fk_alumno_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `persona` (`PERSP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.asesoria
CREATE TABLE IF NOT EXISTS `asesoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ASESORIA_Nombre` varchar(255) DEFAULT NULL,
  `ASESORIA_Descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria` varchar(6) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nombre` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contacto` varchar(250) DEFAULT NULL,
  `email_contacto` varchar(250) DEFAULT NULL,
  `celular_contacto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.cotizacion
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `COTIP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPOCOP_Codigo` int(11) DEFAULT NULL,
  `SOLIP_Codigo` int(11) DEFAULT NULL,
  `COTIC_Numero` int(11) DEFAULT NULL,
  `USUA_Codigo` int(11) DEFAULT NULL,
  `COTIC_Observacion` varchar(250) DEFAULT NULL,
  `COTIC_Mensaje` mediumtext DEFAULT NULL,
  `COTIC_SubTotal` int(11) DEFAULT NULL,
  `COTIC_Igv` int(11) DEFAULT NULL,
  `COTIC_Total` int(11) DEFAULT NULL,
  `COTIC_Fecha` datetime DEFAULT NULL,
  `COTIC_FechaAtencion` datetime DEFAULT NULL,
  `COTIC_FechaModificacion` datetime DEFAULT NULL,
  `COTIC_FechaRegistro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `COTIC_Correo1` varchar(250) DEFAULT NULL,
  `COTIC_Correo2` varchar(250) DEFAULT NULL,
  `COTIC_Correo3` varchar(250) DEFAULT NULL,
  `COTIC_Correo4` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`COTIP_Codigo`),
  KEY `fk_cotizacion_tipocotizacion_idx` (`TIPOCOP_Codigo`),
  KEY `fk_cotizacion_solicitante_idx` (`SOLIP_Codigo`),
  CONSTRAINT `fk_cotizacion_solicitante` FOREIGN KEY (`SOLIP_Codigo`) REFERENCES `solicitante` (`id`),
  CONSTRAINT `fk_cotizacion_tipocotizacion` FOREIGN KEY (`TIPOCOP_Codigo`) REFERENCES `tipocotizacion` (`TIPOCOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.cotizacion_capacitacion
CREATE TABLE IF NOT EXISTS `cotizacion_capacitacion` (
  `COCAP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int(11) DEFAULT NULL,
  `COCAC_Cantidad` int(11) DEFAULT NULL,
  `COCAC_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `COCAC_FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`COCAP_Codigo`),
  KEY `fk_cotizacioncapac_curso_idx` (`CURSOP_Codigo`),
  CONSTRAINT `fk_cotizacioncapac_curso` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `curso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.cotizacion_detalle
CREATE TABLE IF NOT EXISTS `cotizacion_detalle` (
  `CODEP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `COTIP_Codigo` int(11) NOT NULL DEFAULT 0,
  `CODEC_NombreEquipo` varchar(250) DEFAULT NULL,
  `CODEC_Descripcion` varchar(250) DEFAULT NULL,
  `CODEC_Fabricante` varchar(250) DEFAULT NULL,
  `CODEC_Url` varchar(250) DEFAULT NULL,
  `CODEC_FlagEstado` varchar(45) DEFAULT NULL,
  `CODEC_Cantidad` int(11) DEFAULT NULL,
  `CODEC_PrecioUnitario` double DEFAULT NULL,
  `CODEC_SubTotal` double DEFAULT NULL,
  `CODEC_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `CODEC_FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`CODEP_Codigo`),
  KEY `fk_cotizacion_cotizaciondetalle` (`COTIP_Codigo`),
  CONSTRAINT `fk_cotizacion_cotizaciondetalle` FOREIGN KEY (`COTIP_Codigo`) REFERENCES `cotizacion` (`COTIP_Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `INSTP_Codigo` int(11) DEFAULT NULL,
  `CURSOC_Nombre` varchar(100) DEFAULT NULL,
  `CURSOC_Descripcion` text DEFAULT NULL,
  `CURSOC_Descuento` decimal(7,2) DEFAULT 0.00,
  `CURSOC_Costo` decimal(7,2) DEFAULT 0.00,
  `CURSOC_FechaInicio` datetime DEFAULT NULL,
  `CURSOC_FlagEstado` char(1) DEFAULT '1',
  `CURSOC_FechaModificacion` varchar(45) DEFAULT NULL,
  `CURSOC_FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curso_instructor_idx` (`INSTP_Codigo`),
  CONSTRAINT `fk_curso_instructor` FOREIGN KEY (`INSTP_Codigo`) REFERENCES `instructor` (`INSTP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(250) NOT NULL DEFAULT '0',
  `cantidad_min` int(11) NOT NULL DEFAULT 0,
  `cantidad_max` int(11) NOT NULL DEFAULT 0,
  `costo` double NOT NULL DEFAULT 0,
  `descuento` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.horario_cursos
CREATE TABLE IF NOT EXISTS `horario_cursos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(150) DEFAULT NULL,
  `semana_labor` varchar(150) DEFAULT NULL,
  `dia_labor` varchar(150) DEFAULT NULL,
  `hora_inicial` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.horario_instructors
CREATE TABLE IF NOT EXISTS `horario_instructors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_instructor` varchar(250) DEFAULT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `hora_inicial` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `INSTP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `PERSP_Codigo` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `celular` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `INSTC_FlagEstado` char(1) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `INSTC_FechaModificacion` datetime DEFAULT NULL,
  `INSTC_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`INSTP_Codigo`),
  KEY `fk_instructor_persona_idx` (`PERSP_Codigo`),
  CONSTRAINT `fk_instructor_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `persona` (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `MENU_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `MENU_Codigo_Padre` int(11) NOT NULL DEFAULT 0,
  `MENU_Descripcion` varchar(150) DEFAULT NULL,
  `MENU_Url` varchar(250) DEFAULT NULL,
  `MENU_Orden` int(11) NOT NULL DEFAULT 1,
  `MENU_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MENU_FechaModificacion` datetime DEFAULT NULL,
  `MENU_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`MENU_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.permiso
CREATE TABLE IF NOT EXISTS `permiso` (
  `PERM_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int(11) NOT NULL,
  `MENU_Codigo` int(11) NOT NULL,
  `COMPP_Codigo` int(11) NOT NULL,
  `PERM_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`PERM_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `PERSP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `PERSC_ApellidoPaterno` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_ApellidoMaterno` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Nombre` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_NumeroDocIdentidad` char(8) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Ruc` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Direccion` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Telefono` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Movil` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_Email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `PERSC_FlagEstado` char(1) CHARACTER SET utf8 DEFAULT '1',
  `PERSC_FechaModificacion` datetime DEFAULT NULL,
  `PERSC_FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `EMPRP_Codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=562 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Descripcion` varchar(150) DEFAULT NULL,
  `ROL_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ROL_FechaModificacion` datetime DEFAULT NULL,
  `ROL_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.solicitante
CREATE TABLE IF NOT EXISTS `solicitante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TIPSOLIP_Codigo` int(11) DEFAULT NULL,
  `UBIGP_Codigo` char(6) DEFAULT NULL,
  `SOLIC_Nombre` varchar(100) DEFAULT NULL,
  `SOLIC_Contacto` varchar(200) DEFAULT NULL,
  `SOLIC_Ruc` varchar(100) DEFAULT NULL,
  `SOLIC_Direccion` varchar(150) DEFAULT NULL,
  `SOLIC_Telefono` varchar(100) DEFAULT NULL,
  `SOLIC_Email` varchar(100) DEFAULT NULL,
  `SOLIC_FlagEstado` char(1) DEFAULT '1',
  `SOLIC_FechaModificacion` datetime DEFAULT NULL,
  `SOLIC_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ubigeo_solicitante_idx` (`UBIGP_Codigo`),
  KEY `fk_tiposolicitante_solicitante_idx` (`TIPSOLIP_Codigo`),
  CONSTRAINT `fk_tiposolicitante_solicitante` FOREIGN KEY (`TIPSOLIP_Codigo`) REFERENCES `tiposolicitante` (`TIPSOLIP_Codigo`),
  CONSTRAINT `fk_ubigeo_solicitante` FOREIGN KEY (`UBIGP_Codigo`) REFERENCES `ubigeo` (`UBIGP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.tipocotizacion
CREATE TABLE IF NOT EXISTS `tipocotizacion` (
  `TIPOCOP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPOCOC_Descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`TIPOCOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.tiposolicitante
CREATE TABLE IF NOT EXISTS `tiposolicitante` (
  `TIPSOLIP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPSOLIC_Descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TIPSOLIP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.tipo_servicio_academico
CREATE TABLE IF NOT EXISTS `tipo_servicio_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SERVICIOAC_Nombre` varchar(255) DEFAULT NULL,
  `SERVICIOAC_Descripcion` mediumtext DEFAULT NULL,
  `SERVICIOAC_Costo` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.ubigeo
CREATE TABLE IF NOT EXISTS `ubigeo` (
  `UBIGP_Codigo` char(6) NOT NULL,
  `UBIGC_CodDpto` char(2) DEFAULT NULL,
  `UBIGC_CodProv` char(2) DEFAULT NULL,
  `UBIGC_CodDist` char(2) DEFAULT NULL,
  `UBIGC_Descripcion` varchar(150) DEFAULT NULL,
  `UBIGC_FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `UBIGC_FechaModificacion` datetime DEFAULT NULL,
  `UBIGC_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`UBIGP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla catalogo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
