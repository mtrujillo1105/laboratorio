-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         8.0.17 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para catalogo
CREATE DATABASE IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `catalogo`;


-- Volcando estructura para tabla catalogo.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `ALUMP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `PERSP_Codigo` int(11) DEFAULT NULL,
  `COCAP_Codigo` int(11) DEFAULT NULL,
  `ALUMC_Identificador` varchar(100) DEFAULT NULL,
  `ALUMC_FlagEstado` char(1) DEFAULT '1',
  `ALUMC_FechaModificacion` datetime DEFAULT NULL,
  `ALUMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ALUMP_Codigo`),
  KEY `fk_alumno_persona_idx` (`PERSP_Codigo`),
  CONSTRAINT `fk_alumno_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `persona` (`PERSP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.alumno: ~0 rows (aproximadamente)
DELETE FROM `alumno`;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nombre` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.categoria: ~0 rows (aproximadamente)
DELETE FROM `categoria`;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL,
  `SOLIP_Codigo` int(11) NOT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `correo_contacto` varchar(255) DEFAULT NULL,
  `celular_contacto` char(9) DEFAULT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `FK_contacto_solicitante` (`SOLIP_Codigo`),
  CONSTRAINT `FK_contacto_solicitante` FOREIGN KEY (`SOLIP_Codigo`) REFERENCES `solicitante` (`SOLIP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.contacto: ~0 rows (aproximadamente)
DELETE FROM `contacto`;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.cotizacion
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `COTIP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPOCOP_Codigo` int(11) DEFAULT NULL,
  `SOLIP_Codigo` int(11) DEFAULT NULL,
  `COTIC_Numero` int(11) DEFAULT NULL,
  `USUA_Codigo` int(11) DEFAULT NULL,
  `COTIC_Observacion` varchar(250) DEFAULT NULL,
  `COTIC_Mensaje` mediumtext,
  `COTIC_SubTotal` int(11) DEFAULT NULL,
  `COTIC_Igv` int(11) DEFAULT NULL,
  `COTIC_Total` int(11) DEFAULT NULL,
  `COTIC_Fecha` datetime DEFAULT NULL,
  `COTIC_FechaAtencion` datetime DEFAULT NULL,
  `COTIC_FechaModificacion` datetime DEFAULT NULL,
  `COTIC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COTIC_Nombre_Contacto` varchar(250) DEFAULT NULL,
  `COTIC_Correo_Contacto` varchar(250) DEFAULT NULL,
  `COTIC_Celular_Contacto` varchar(250) DEFAULT NULL,
  `COTIC_Correo1` varchar(250) DEFAULT NULL,
  `COTIC_Correo2` varchar(250) DEFAULT NULL,
  `COTIC_Correo3` varchar(250) DEFAULT NULL,
  `COTIC_Correo4` varchar(250) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  PRIMARY KEY (`COTIP_Codigo`),
  KEY `fk_cotizacion_tipocotizacion_idx` (`TIPOCOP_Codigo`),
  KEY `fk_cotizacion_solicitante_idx` (`SOLIP_Codigo`),
  KEY `FK_cotizacion_contacto` (`id_contacto`),
  CONSTRAINT `FK_cotizacion_contacto` FOREIGN KEY (`id_contacto`) REFERENCES `contacto` (`id_contacto`),
  CONSTRAINT `fk_cotizacion_tipocotizacion` FOREIGN KEY (`TIPOCOP_Codigo`) REFERENCES `tipocotizacion` (`TIPOCOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.cotizacion: ~0 rows (aproximadamente)
DELETE FROM `cotizacion`;
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.cotizacion_capacitacion
CREATE TABLE IF NOT EXISTS `cotizacion_capacitacion` (
  `COCAP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int(11) DEFAULT NULL,
  `COCAC_Cantidad` int(11) DEFAULT NULL,
  `COCAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COCAC_FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`COCAP_Codigo`),
  KEY `fk_cotizacioncapac_curso_idx` (`CURSOP_Codigo`),
  CONSTRAINT `fk_cotizacioncapac_curso` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.cotizacion_capacitacion: ~0 rows (aproximadamente)
DELETE FROM `cotizacion_capacitacion`;
/*!40000 ALTER TABLE `cotizacion_capacitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cotizacion_capacitacion` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.cotizacion_detalle
CREATE TABLE IF NOT EXISTS `cotizacion_detalle` (
  `CODEP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `COTIP_Codigo` int(11) NOT NULL DEFAULT '0',
  `CODEC_NombreEquipo` varchar(250) DEFAULT NULL,
  `CODEC_Descripcion` varchar(250) DEFAULT NULL,
  `CODEC_Fabricante` varchar(250) DEFAULT NULL,
  `CODEC_Url` varchar(250) DEFAULT NULL,
  `CODEC_FlagEstado` varchar(45) DEFAULT NULL,
  `CODEC_Cantidad` int(11) DEFAULT NULL,
  `CODEC_PrecioUnitario` double DEFAULT NULL,
  `CODEC_SubTotal` double DEFAULT NULL,
  `CODEC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CODEC_FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`CODEP_Codigo`),
  KEY `fk_cotizacion_cotizaciondetalle` (`COTIP_Codigo`),
  CONSTRAINT `fk_cotizacion_cotizaciondetalle` FOREIGN KEY (`COTIP_Codigo`) REFERENCES `cotizacion` (`COTIP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.cotizacion_detalle: ~0 rows (aproximadamente)
DELETE FROM `cotizacion_detalle`;
/*!40000 ALTER TABLE `cotizacion_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `cotizacion_detalle` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `CURSOC_Nombre` varchar(100) DEFAULT NULL,
  `CURSOC_Descripcion` text,
  `CURSOC_Descuento` decimal(7,2) DEFAULT '0.00',
  `CURSOC_Costo` decimal(7,2) DEFAULT '0.00',
  `CURSOC_FechaInicio` datetime DEFAULT NULL,
  `CURSOC_FlagEstado` char(1) DEFAULT '1',
  `CURSOC_FechaModificacion` varchar(45) DEFAULT NULL,
  `CURSOC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.curso: ~0 rows (aproximadamente)
DELETE FROM `curso`;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.curso_instructor
CREATE TABLE IF NOT EXISTS `curso_instructor` (
  `id_curso_instructor` int(11) NOT NULL,
  `INSTP_Codigo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_instructor`),
  KEY `FK_curso_instructor_curso` (`id_curso`),
  KEY `FK_curso_instructor_instructor` (`INSTP_Codigo`),
  CONSTRAINT `FK_curso_instructor_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `FK_curso_instructor_instructor` FOREIGN KEY (`INSTP_Codigo`) REFERENCES `instructor` (`INSTP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.curso_instructor: ~0 rows (aproximadamente)
DELETE FROM `curso_instructor`;
/*!40000 ALTER TABLE `curso_instructor` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso_instructor` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(250) NOT NULL DEFAULT '0',
  `cantidad_min` int(11) NOT NULL DEFAULT '0',
  `cantidad_max` int(11) NOT NULL DEFAULT '0',
  `costo` double NOT NULL DEFAULT '0',
  `descuento` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.descuentos: ~0 rows (aproximadamente)
DELETE FROM `descuentos`;
/*!40000 ALTER TABLE `descuentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `descuentos` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_eq` varchar(255) DEFAULT NULL,
  `descripcion_eq` mediumtext,
  `fabricante_eq` varchar(255) DEFAULT NULL,
  `descrip_tec_eq` mediumtext,
  `arch_descrip_eq` mediumtext,
  `url_tec_eq` text,
  `costo` double(22,0) DEFAULT NULL,
  `estado_tec_eq` varchar(50) DEFAULT NULL,
  `cantidad_eq` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.equipos: ~0 rows (aproximadamente)
DELETE FROM `equipos`;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.form_asesoria
CREATE TABLE IF NOT EXISTS `form_asesoria` (
  `ID_Form_Asesoria` int(11) NOT NULL,
  `Nombre_Empresa` varchar(30) NOT NULL,
  `Nombre_Contacto` varchar(30) NOT NULL,
  `Correo_Electronico_Contacto` varchar(60) NOT NULL,
  `Celular_Contacto` char(9) NOT NULL,
  `Descripcion_Asesoria` text NOT NULL,
  `Fecha_Registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Asesoria` int(11) NOT NULL,
  PRIMARY KEY (`ID_Form_Asesoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.form_asesoria: ~0 rows (aproximadamente)
DELETE FROM `form_asesoria`;
/*!40000 ALTER TABLE `form_asesoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_asesoria` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.horario_cursos: ~0 rows (aproximadamente)
DELETE FROM `horario_cursos`;
/*!40000 ALTER TABLE `horario_cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_cursos` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.horario_instructors: ~0 rows (aproximadamente)
DELETE FROM `horario_instructors`;
/*!40000 ALTER TABLE `horario_instructors` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario_instructors` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `INSTP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `celular` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `INSTC_FlagEstado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  `INSTC_FechaModificacion` datetime DEFAULT NULL,
  `INSTC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`INSTP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.instructor: ~0 rows (aproximadamente)
DELETE FROM `instructor`;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `MENU_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `MENU_Codigo_Padre` int(11) NOT NULL DEFAULT '0',
  `MENU_Descripcion` varchar(150) DEFAULT NULL,
  `MENU_Url` varchar(250) DEFAULT NULL,
  `MENU_Orden` int(11) NOT NULL DEFAULT '1',
  `MENU_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MENU_FechaModificacion` datetime DEFAULT NULL,
  `MENU_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`MENU_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.menu: ~0 rows (aproximadamente)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.migrations: ~0 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.permiso
CREATE TABLE IF NOT EXISTS `permiso` (
  `PERM_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int(11) NOT NULL,
  `MENU_Codigo` int(11) NOT NULL,
  `COMPP_Codigo` int(11) NOT NULL,
  `PERM_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`PERM_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.permiso: ~0 rows (aproximadamente)
DELETE FROM `permiso`;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `PERSP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `PERSC_ApellidoPaterno` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_ApellidoMaterno` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_NumeroDocIdentidad` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Ruc` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Direccion` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Movil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_Email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PERSC_FlagEstado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1',
  `PERSC_FechaModificacion` datetime DEFAULT NULL,
  `PERSC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `EMPRP_Codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=562 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.persona: ~0 rows (aproximadamente)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.prueba_equipo
CREATE TABLE IF NOT EXISTS `prueba_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Prueba` text,
  `Norma_Asoc_Prueba` text,
  `Descripcion_Norma` text,
  `Arch_Norma_Tecnica` text,
  `Costo` double DEFAULT NULL,
  `Estado_Norma_Prueba` varchar(50) DEFAULT NULL,
  `CODEP_Codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_equipo_cotizacion_detalle` (`CODEP_Codigo`),
  CONSTRAINT `FK_prueba_equipo_cotizacion_detalle` FOREIGN KEY (`CODEP_Codigo`) REFERENCES `cotizacion_detalle` (`CODEP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.prueba_equipo: ~0 rows (aproximadamente)
DELETE FROM `prueba_equipo`;
/*!40000 ALTER TABLE `prueba_equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prueba_equipo` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Descripcion` varchar(150) DEFAULT NULL,
  `ROL_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ROL_FechaModificacion` datetime DEFAULT NULL,
  `ROL_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.rol: ~0 rows (aproximadamente)
DELETE FROM `rol`;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.role_user: ~0 rows (aproximadamente)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.solicitante
CREATE TABLE IF NOT EXISTS `solicitante` (
  `SOLIP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
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
  `SOLIC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SOLIP_Codigo`),
  KEY `fk_ubigeo_solicitante_idx` (`UBIGP_Codigo`),
  KEY `fk_tiposolicitante_solicitante_idx` (`TIPSOLIP_Codigo`),
  CONSTRAINT `fk_tiposolicitante_solicitante` FOREIGN KEY (`TIPSOLIP_Codigo`) REFERENCES `tiposolicitante` (`TIPSOLIP_Codigo`),
  CONSTRAINT `fk_ubigeo_solicitante` FOREIGN KEY (`UBIGP_Codigo`) REFERENCES `ubigeo` (`UBIGP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.solicitante: ~0 rows (aproximadamente)
DELETE FROM `solicitante`;
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.tipocotizacion
CREATE TABLE IF NOT EXISTS `tipocotizacion` (
  `TIPOCOP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPOCOC_Descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`TIPOCOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.tipocotizacion: ~0 rows (aproximadamente)
DELETE FROM `tipocotizacion`;
/*!40000 ALTER TABLE `tipocotizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocotizacion` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.tiposolicitante
CREATE TABLE IF NOT EXISTS `tiposolicitante` (
  `TIPSOLIP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIPSOLIC_Descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TIPSOLIP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.tiposolicitante: ~0 rows (aproximadamente)
DELETE FROM `tiposolicitante`;
/*!40000 ALTER TABLE `tiposolicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposolicitante` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.ubigeo
CREATE TABLE IF NOT EXISTS `ubigeo` (
  `UBIGP_Codigo` char(6) NOT NULL,
  `UBIGC_CodDpto` char(2) DEFAULT NULL,
  `UBIGC_CodProv` char(2) DEFAULT NULL,
  `UBIGC_CodDist` char(2) DEFAULT NULL,
  `UBIGC_Descripcion` varchar(150) DEFAULT NULL,
  `UBIGC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UBIGC_FechaModificacion` datetime DEFAULT NULL,
  `UBIGC_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`UBIGP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.ubigeo: ~0 rows (aproximadamente)
DELETE FROM `ubigeo`;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;


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
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_rol` (`ROL_Codigo`),
  CONSTRAINT `FK_users_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Volcando estructura para tabla catalogo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla catalogo.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
