CREATE DATABASE  IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `catalogo`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: catalogo
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `categoria` varchar(6) NOT NULL DEFAULT '',
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES ('000001','Informatica'),('000004','Liderazgo'),('000006','Idiomas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `codigo` varchar(6) NOT NULL DEFAULT '',
  `titulo` text NOT NULL,
  `precio` decimal(4,2) DEFAULT '0.00',
  `imagen` varchar(50) DEFAULT '',
  `categoria` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`codigo`),
  KEY `FK_CATOLOGO_LIBRO_idx` (`categoria`),
  CONSTRAINT `FK_CATOLOGO_LIBRO` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES ('000028','ASP.NET',18.00,'libros/BASN.gif','000001'),('000029','Crystal Reports 10',25.00,'libros/BCR1.gif','000001'),('000030','SQL Server 2005',25.00,'libros/BSQ5.gif','000001'),('000031','ASP',45.00,'libros/LDASPCR.gif','000001'),('000032','Dreamweaver 8',22.00,'libros/LDDRW.gif','000001'),('000033','Flash 8',32.00,'libros/LDFLASH.gif','000001'),('000034','Fireworks MX',28.00,'libros/LDFRW.gif','000001'),('000035','Power Builder',31.00,'libros/LDPB.gif','000001'),('000036','Php-Mysql',24.00,'libros/LDPHPMY.gif','000001'),('000037','PostgreSQL APACHE',38.00,'libros/LDPHPPG.gif','000001'),('000038','SQL Server 2000',27.00,'libros/LDSQL2.gif','000001'),('000039','UML',15.00,'ibros/LDUML.gif','000001'),('000040','Visual Basic 6.0',0.00,'libros/LDVB.gif','000001'),('000041','Visual BAsic POO',30.00,'libros/LDVBPOO.gif','000001'),('000042','Visual Basic SQL',32.00,'libros/LDVBSQL.gif','000001'),('000043','Visual Fox Pro',28.00,'libros/LDVF.gif','000001'),('000044','C++.Net',30.00,'libros/MCNT.gif','000001'),('000045','Delphi 8',31.00,'libros/MDPH.gif','000001'),('000046','Dream Weaver Studio 8',34.00,'libros/MDR8.gif','000001'),('000047','Flash 8',34.00,'libros/MFL8.gif','000001'),('000048','Indesign CS2',34.00,'libros/MID2.gif','000001'),('000049','Java 2',42.00,'libros/MJV2.gif','000001'),('000050','Red Hat 8',45.00,'libros/MLRH.gif','000001'),('000051','Oracle 2006',38.00,'libros/MOR6.gif','000001'),('000052','PHP y Mysql Server',28.00,'libros/MPHP.gif','000001'),('000053','SQL Server 2000',15.00,'libros/MSQ0.gif','000001'),('000054','SQL Server 2005',29.00,'images/libros/MSQL.gif','000001'),('000055','UML y Rational Rose',57.00,'images/libros/MUML.gif','000001'),('000056','Visual Basic.net 2005',30.00,'images/libros/MVBS.gif','000001'),('000057','Visual C++ 6.0',29.00,'images/libros/MVC6.gif','000001'),('000058','Windows 2000 Server',52.00,'images/libros/MWS0.gif','000001'),('000059','Windows Server 2003',61.00,'images/libros/MWS3.gif','000001'),('000060','Ado.Net',31.00,'images/libros/RADO.gif','000001'),('000061','Dreamweaver 8',26.00,'images/libros/RDR8.gif','000001'),('000062','Flash 8',31.00,'images/libros/RFL8.gif','000001'),('000063','Photoshop CS2',32.00,'images/libros/RPCS.gif','000001');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (37,'Cash','Luna','empresa@empresa.com','123456'),(38,'Rosa','Ventura','rventura@empresa.com','123456'),(42,'Pedro','Infante','pinfante@empresa.com','123456'),(45,'Maria','Sahuinco','msahuinco@empresa.com','123456'),(50,'Susana','Paredes5 4','sparedes@empresa.com','123456'),(51,'Pedro aa','Paramo','pparamo@empresa.com','123456');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'catalogo'
--

--
-- Dumping routines for database 'catalogo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-03 19:26:49
