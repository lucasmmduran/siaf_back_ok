-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: 10.102.52.44    Database: siaf_proyecto_fix
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `conf_entidades`
--

DROP TABLE IF EXISTS `conf_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conf_entidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_entidad` varchar(100) NOT NULL,
  `entidad` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf_entidades`
--

LOCK TABLES `conf_entidades` WRITE;
/*!40000 ALTER TABLE `conf_entidades` DISABLE KEYS */;
INSERT INTO `conf_entidades` VALUES (1,'PLAN_EJEC','Planificación de la ejecución del egreso');
/*!40000 ALTER TABLE `conf_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf_roles`
--

DROP TABLE IF EXISTS `conf_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conf_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_rol` varchar(50) NOT NULL,
  `rol` varchar(80) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf_roles`
--

LOCK TABLES `conf_roles` WRITE;
/*!40000 ALTER TABLE `conf_roles` DISABLE KEYS */;
INSERT INTO `conf_roles` VALUES (1,'PLA_REGISTRADOR','Registrador de planes de ejecución de egreso',NULL),(2,'PLA_VERIFICADOR','Verificador de planes de ejecucion de egreso',NULL),(3,'PLA_APROBADOR','Aprobador de planes de ejecución de egresos',NULL);
/*!40000 ALTER TABLE `conf_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20250123032839','2025-01-23 04:28:46',3185),('DoctrineMigrations\\Version20250129044418','2025-01-29 05:51:42',68974);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_persona` varchar(2) NOT NULL,
  `tipo_documento` varchar(3) NOT NULL,
  `nro_documento` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_plan_conceptos`
--

DROP TABLE IF EXISTS `pla_conf_plan_conceptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_plan_conceptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_conf_planes_id` int(11) NOT NULL,
  `cod_plan_concepto` varchar(6) NOT NULL,
  `plan_concepto` varchar(45) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_212E257D341470E5` (`pla_conf_planes_id`),
  CONSTRAINT `FK_212E257D341470E5` FOREIGN KEY (`pla_conf_planes_id`) REFERENCES `pla_conf_planes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_plan_conceptos`
--

LOCK TABLES `pla_conf_plan_conceptos` WRITE;
/*!40000 ALTER TABLE `pla_conf_plan_conceptos` DISABLE KEYS */;
INSERT INTO `pla_conf_plan_conceptos` VALUES (1,1,'PPOC','Planta ocupada','2025-01-27 17:50:05',NULL),(2,1,'PPNVO','Incorporaciones','2025-01-27 17:50:32',NULL),(3,1,'PPCO','Corrimientos','2025-01-27 17:50:57',NULL),(4,1,'PPDES','Desafectaciones','2025-01-27 17:51:31',NULL),(5,1,'PPURS','URS','2025-01-27 17:51:50',NULL),(6,1,'PPHE','Horas extra','2025-01-27 17:52:07',NULL),(7,2,'LMOC','Planta ocupada','2025-01-27 17:52:50',NULL),(8,2,'LMNVO','Incorporaciones','2025-01-27 17:53:12',NULL),(9,2,'LMCO','Cambios nivel','2025-01-27 17:53:53',NULL),(10,3,'11NVO','Incorporaciones','2025-01-27 17:54:26',NULL),(11,3,'11CONT','Continuidad','2025-01-27 17:54:46',NULL),(12,3,'11INC','Incrementos','2025-01-27 17:55:18',NULL),(13,4,'20INC','Incrementos','2025-01-27 17:56:04',NULL),(14,4,'20CONT','Continuidad','2025-01-27 17:56:28',NULL),(15,5,'DGABI','Bienes','2025-01-27 17:56:51',NULL),(16,5,'DGASER','Servicios','2025-01-27 17:57:10',NULL),(17,5,'DGAFIN','Financiero','2025-01-27 17:57:39',NULL),(18,6,'PNUDBI','Bienes','2025-01-27 17:58:13',NULL),(19,6,'PNUSE','Servicios','2025-01-27 17:58:35',NULL),(20,6,'PNUDFI','Gastos financieros','2025-01-26 17:58:56','2025-01-27 17:59:38'),(21,6,'PNUDIN','Intereses','2025-02-27 17:59:21',NULL);
/*!40000 ALTER TABLE `pla_conf_plan_conceptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_plan_objetos_gasto`
--

DROP TABLE IF EXISTS `pla_conf_plan_objetos_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_plan_objetos_gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_conf_tipo_plan_id` int(11) NOT NULL,
  `siaf_objetos_gasto_id` int(11) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_71C57A74A90D98E2` (`pla_conf_tipo_plan_id`),
  KEY `IDX_71C57A74D4BDE734` (`siaf_objetos_gasto_id`),
  CONSTRAINT `FK_71C57A74A90D98E2` FOREIGN KEY (`pla_conf_tipo_plan_id`) REFERENCES `pla_conf_tipo_planes` (`id`),
  CONSTRAINT `FK_71C57A74D4BDE734` FOREIGN KEY (`siaf_objetos_gasto_id`) REFERENCES `siaf_objetos_gasto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_plan_objetos_gasto`
--

LOCK TABLES `pla_conf_plan_objetos_gasto` WRITE;
/*!40000 ALTER TABLE `pla_conf_plan_objetos_gasto` DISABLE KEYS */;
INSERT INTO `pla_conf_plan_objetos_gasto` VALUES (1,1,10,'2025-01-27 19:04:55',NULL),(2,1,13,'2025-01-20 19:05:11','2025-01-22 19:05:18'),(3,1,12,'2025-01-27 19:05:39',NULL),(4,2,13,'2025-01-27 19:05:57',NULL),(5,2,14,'2025-01-27 19:06:11',NULL),(6,2,15,'2025-01-27 19:06:24',NULL),(7,2,16,'2025-01-27 19:06:42',NULL),(8,2,4,'2025-01-27 19:07:06',NULL),(9,4,22,'2025-01-27 19:07:28',NULL),(10,4,5,'2025-01-27 19:07:49',NULL),(11,3,18,'2025-01-27 19:08:12',NULL),(12,3,19,'2025-01-27 19:08:25',NULL),(13,3,20,'2025-01-27 19:08:52',NULL),(14,5,2,'2025-01-27 19:09:12',NULL),(15,5,3,'2025-01-27 19:09:27',NULL),(16,5,4,'2025-01-27 19:09:44',NULL),(17,5,6,'2025-01-27 19:10:08',NULL);
/*!40000 ALTER TABLE `pla_conf_plan_objetos_gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_plan_objetos_gasto_res`
--

DROP TABLE IF EXISTS `pla_conf_plan_objetos_gasto_res`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_plan_objetos_gasto_res` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_conf_tipo_planes_id` int(11) NOT NULL,
  `siaf_objetos_gasto_id` int(11) NOT NULL,
  `nivel_planificacion` longtext NOT NULL COMMENT '(DC2Type:array)',
  `lista_objetos_gasto` varchar(120) NOT NULL,
  `fecha_vigencia_desde` datetime DEFAULT NULL,
  `fecha_vigencia_hasta` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_186D7B5ED1AE59E8` (`pla_conf_tipo_planes_id`),
  KEY `IDX_186D7B5ED4BDE734` (`siaf_objetos_gasto_id`),
  CONSTRAINT `FK_186D7B5ED1AE59E8` FOREIGN KEY (`pla_conf_tipo_planes_id`) REFERENCES `pla_conf_tipo_planes` (`id`),
  CONSTRAINT `FK_186D7B5ED4BDE734` FOREIGN KEY (`siaf_objetos_gasto_id`) REFERENCES `siaf_objetos_gasto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_plan_objetos_gasto_res`
--

LOCK TABLES `pla_conf_plan_objetos_gasto_res` WRITE;
/*!40000 ALTER TABLE `pla_conf_plan_objetos_gasto_res` DISABLE KEYS */;
/*!40000 ALTER TABLE `pla_conf_plan_objetos_gasto_res` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_plan_unidades`
--

DROP TABLE IF EXISTS `pla_conf_plan_unidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_plan_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_unidades_id` int(11) NOT NULL,
  `pla_conf_tipo_planes_id` int(11) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F5A8847534B4022F` (`siaf_unidades_id`),
  KEY `IDX_F5A88475D1AE59E8` (`pla_conf_tipo_planes_id`),
  CONSTRAINT `FK_F5A8847534B4022F` FOREIGN KEY (`siaf_unidades_id`) REFERENCES `siaf_unidades` (`id`),
  CONSTRAINT `FK_F5A88475D1AE59E8` FOREIGN KEY (`pla_conf_tipo_planes_id`) REFERENCES `pla_conf_tipo_planes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_plan_unidades`
--

LOCK TABLES `pla_conf_plan_unidades` WRITE;
/*!40000 ALTER TABLE `pla_conf_plan_unidades` DISABLE KEYS */;
INSERT INTO `pla_conf_plan_unidades` VALUES (1,5,2,'2025-01-27 19:10:41',NULL),(2,6,2,'2025-01-27 19:10:56',NULL),(3,11,2,'2025-01-27 19:11:14',NULL),(4,11,5,'2025-01-27 19:11:27',NULL),(5,11,1,'2025-01-27 19:11:44',NULL),(6,12,1,'2025-01-27 19:12:14',NULL),(7,12,5,'2025-01-27 19:12:28',NULL),(8,3,2,'2025-01-27 19:12:45',NULL),(9,3,5,'2025-01-27 19:13:02',NULL),(10,3,4,'2025-01-27 19:13:31',NULL),(11,13,2,'2025-01-27 19:13:44',NULL),(12,13,5,'2025-01-27 19:13:58',NULL),(13,4,2,'2025-01-27 19:14:12',NULL),(14,9,2,'2025-01-27 19:14:27',NULL),(15,9,5,'2025-01-27 19:14:41',NULL),(16,9,4,'2025-01-27 19:14:56',NULL),(17,9,3,'2025-01-20 19:15:12','2025-01-27 19:15:16'),(18,10,2,'2025-01-27 19:15:32',NULL),(19,10,5,'2025-01-27 19:15:46',NULL),(20,8,4,'2025-01-27 19:16:01',NULL),(21,7,3,'2025-01-27 19:16:15',NULL),(22,2,2,'2025-01-27 19:16:34',NULL),(23,2,4,'2025-01-27 19:16:34',NULL),(24,2,5,'2025-01-27 19:16:34',NULL);
/*!40000 ALTER TABLE `pla_conf_plan_unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_planes`
--

DROP TABLE IF EXISTS `pla_conf_planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_planes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_conf_tipo_plan_id` int(11) DEFAULT NULL,
  `cod_plan` varchar(5) NOT NULL,
  `plan` varchar(60) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  `abr_tipo_plan` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_13FA9ADCA90D98E2` (`pla_conf_tipo_plan_id`),
  CONSTRAINT `FK_13FA9ADCA90D98E2` FOREIGN KEY (`pla_conf_tipo_plan_id`) REFERENCES `pla_conf_tipo_planes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_planes`
--

LOCK TABLES `pla_conf_planes` WRITE;
/*!40000 ALTER TABLE `pla_conf_planes` DISABLE KEYS */;
INSERT INTO `pla_conf_planes` VALUES (1,1,'PP','Planta permanente','2025-01-27 17:39:41',NULL,'Planta Perm.','Planta permanente'),(2,1,'LM','Ley Marco','2025-01-27 17:41:14',NULL,'Ley Marco','Ley Marco'),(3,1,'1109','Dec 1109','2025-01-27 17:42:05',NULL,'1109','Decreto 1109'),(4,1,'2009','Dec 2009','2025-01-21 17:42:42','2025-01-27 17:42:52','2009','Decreto 2009'),(5,2,'DGA','Compras DGA','2025-01-27 17:43:49',NULL,'COM DGA','Compras a realizar desde la DGA'),(6,2,'PNUD','Compras PNUD','2025-01-27 17:44:31',NULL,'Compras PNUD','Compras PNUD'),(7,2,'BID','Compras BID','2025-01-27 17:45:08',NULL,'Compras BID','Compras BID'),(8,2,'BM','Compras BM','2025-01-27 17:45:38',NULL,'Compras BM','Compras BM'),(9,2,'OEXT','Compras otros financiadores','2025-01-27 17:46:44',NULL,'Comp.Otros.Financ.','Compras realizadas con otros financiamiento ( no 11, PNUD,BID,BM)'),(10,3,'AUT','AUtomatores','2025-01-27 17:47:23',NULL,'Automotores','AUtomaotores'),(11,3,'ALQ','Alquileres','2025-01-27 17:47:52',NULL,'ALquileres','Alquileres'),(12,4,'UNI','Universidades','2025-01-27 17:48:29',NULL,'Universidades','Universidades'),(13,4,'ONG','ONG','2025-01-27 17:49:02',NULL,'ONG','ONG');
/*!40000 ALTER TABLE `pla_conf_planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_tipo_planes`
--

DROP TABLE IF EXISTS `pla_conf_tipo_planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_tipo_planes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_plan` varchar(3) NOT NULL,
  `tipo_plan` varchar(60) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  `abr_tipo_plan` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_tipo_planes`
--

LOCK TABLES `pla_conf_tipo_planes` WRITE;
/*!40000 ALTER TABLE `pla_conf_tipo_planes` DISABLE KEYS */;
INSERT INTO `pla_conf_tipo_planes` VALUES (1,'RHU','Recursos Humanos','2025-01-27 12:36:30',NULL,'RRHH','Planificación de egresos relacionados con servicios personales '),(2,'COM','Compras y contrataciones','2025-01-27 12:38:35',NULL,'Compras','Planificación de las compras y contrataciones de las Unidades Responsables'),(3,'SGR','Servicios generales','2025-01-27 12:39:49',NULL,'Serv.Generales','Planificación de egresos por servicios generales'),(4,'CON','Convenios','2025-01-27 13:24:31',NULL,'Convenios','Planificación de convenios a ejecutar'),(5,'FDR','Fondos Rotatorios','2025-01-27 13:25:31',NULL,'Fondos Rotatorios','Estimación de egresos por fondos rotatorios');
/*!40000 ALTER TABLE `pla_conf_tipo_planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_conf_unidades_programatica`
--

DROP TABLE IF EXISTS `pla_conf_unidades_programatica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_conf_unidades_programatica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_unidades_id` int(11) NOT NULL,
  `siaf_aperturas_programaticas_id` int(11) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5D83144E34B4022F` (`siaf_unidades_id`),
  KEY `IDX_5D83144E222903D5` (`siaf_aperturas_programaticas_id`),
  CONSTRAINT `FK_5D83144E222903D5` FOREIGN KEY (`siaf_aperturas_programaticas_id`) REFERENCES `siaf_aperturas_programaticas` (`id`),
  CONSTRAINT `FK_5D83144E34B4022F` FOREIGN KEY (`siaf_unidades_id`) REFERENCES `siaf_unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_conf_unidades_programatica`
--

LOCK TABLES `pla_conf_unidades_programatica` WRITE;
/*!40000 ALTER TABLE `pla_conf_unidades_programatica` DISABLE KEYS */;
INSERT INTO `pla_conf_unidades_programatica` VALUES (1,5,29,'2025-01-27 19:17:40',NULL),(2,6,27,'2025-01-27 19:17:57',NULL),(3,6,19,'2025-01-20 19:18:13','2025-01-25 19:18:18'),(4,6,25,'2025-05-27 19:20:10',NULL),(5,11,29,'2025-01-27 19:20:29',NULL),(6,11,18,'2025-01-27 19:20:44',NULL),(7,3,18,'2025-01-27 19:20:57',NULL),(8,3,19,'2025-01-27 19:21:15',NULL),(9,3,23,'2025-01-27 19:21:30',NULL),(10,3,29,'2025-01-27 19:21:45',NULL),(11,13,18,'2025-01-27 19:21:57',NULL),(12,13,19,'2025-01-27 19:21:15',NULL),(13,13,23,'2025-01-27 19:21:30',NULL),(14,4,18,'2025-01-27 19:22:41',NULL),(15,10,29,'2025-01-27 19:22:59',NULL),(16,4,19,'2025-01-27 19:22:41',NULL),(17,4,23,'2025-01-27 19:22:41',NULL),(18,4,25,'2025-01-27 19:22:41',NULL),(19,8,19,'2025-01-27 19:23:57',NULL),(20,7,19,'2025-01-27 19:24:17',NULL),(21,2,18,'2025-01-27 19:24:34',NULL);
/*!40000 ALTER TABLE `pla_conf_unidades_programatica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_planes_cabecera`
--

DROP TABLE IF EXISTS `pla_planes_cabecera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_planes_cabecera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_conf_planes_id` int(11) NOT NULL,
  `siaf_aperturas_programaticas_id` int(11) DEFAULT NULL,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `siaf_unidades_id` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_ult_actualizacion` datetime NOT NULL,
  `nro_plan` int(11) NOT NULL,
  `identificacion_plan` varchar(20) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EF18B5CA341470E5` (`pla_conf_planes_id`),
  KEY `IDX_EF18B5CA222903D5` (`siaf_aperturas_programaticas_id`),
  KEY `IDX_EF18B5CA1655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_EF18B5CA34B4022F` (`siaf_unidades_id`),
  CONSTRAINT `FK_EF18B5CA1655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_EF18B5CA222903D5` FOREIGN KEY (`siaf_aperturas_programaticas_id`) REFERENCES `siaf_aperturas_programaticas` (`id`),
  CONSTRAINT `FK_EF18B5CA341470E5` FOREIGN KEY (`pla_conf_planes_id`) REFERENCES `pla_conf_planes` (`id`),
  CONSTRAINT `FK_EF18B5CA34B4022F` FOREIGN KEY (`siaf_unidades_id`) REFERENCES `siaf_unidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_planes_cabecera`
--

LOCK TABLES `pla_planes_cabecera` WRITE;
/*!40000 ALTER TABLE `pla_planes_cabecera` DISABLE KEYS */;
/*!40000 ALTER TABLE `pla_planes_cabecera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_planes_partidas`
--

DROP TABLE IF EXISTS `pla_planes_partidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_planes_partidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_planes_procesos_id` int(11) NOT NULL,
  `siaf_fuentes_financiamiento_id` int(11) NOT NULL,
  `siaf_aperturas_programaticas_id` int(11) NOT NULL,
  `siaf_objetos_gasto_id` int(11) NOT NULL,
  `compromiso_mes1` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes1` decimal(18,2) DEFAULT NULL,
  `importe_no_programado_orig` decimal(18,2) DEFAULT NULL,
  `importe_no_programado` decimal(18,2) DEFAULT NULL,
  `compromiso_mes2` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes2` decimal(18,2) DEFAULT NULL,
  `compromiso_mes3` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes3` decimal(18,2) DEFAULT NULL,
  `compromiso_mes4` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes4` decimal(18,2) DEFAULT NULL,
  `compromiso_mes5` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes5` decimal(18,2) DEFAULT NULL,
  `compromiso_mes6` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes6` decimal(18,2) DEFAULT NULL,
  `compromiso_mes7` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes7` decimal(18,2) DEFAULT NULL,
  `compromiso_mes8` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes8` decimal(18,2) DEFAULT NULL,
  `compromiso_mes9` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes9` decimal(18,2) DEFAULT NULL,
  `compromiso_mes10` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes10` decimal(18,2) DEFAULT NULL,
  `compromiso_mes11` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes11` decimal(18,2) DEFAULT NULL,
  `compromiso_mes12` decimal(18,2) DEFAULT NULL,
  `compromiso_orig_mes12` decimal(18,2) DEFAULT NULL,
  `devengado_mes1` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes1` decimal(18,2) DEFAULT NULL,
  `devengado_mes2` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes2` decimal(18,2) DEFAULT NULL,
  `devengado_mes3` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes3` decimal(18,2) DEFAULT NULL,
  `devengado_mes4` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes4` decimal(18,2) DEFAULT NULL,
  `devengado_mes5` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes5` decimal(18,2) DEFAULT NULL,
  `devengado_mes6` decimal(18,2) DEFAULT NULL,
  `devengado_orig_mes6` decimal(18,2) DEFAULT NULL,
  `devengado_mes7` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me7` decimal(18,2) DEFAULT NULL,
  `devengado_mes8` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me8` decimal(18,2) DEFAULT NULL,
  `devengado_mes9` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me9` decimal(18,2) DEFAULT NULL,
  `devengado_mes10` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me10` decimal(18,2) DEFAULT NULL,
  `devengado_mes11` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me11` decimal(18,2) DEFAULT NULL,
  `devengado_mes12` decimal(18,2) DEFAULT NULL,
  `devengado_orig_me12` decimal(18,2) DEFAULT NULL,
  `sub_clase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BF53852268357A88` (`pla_planes_procesos_id`),
  KEY `IDX_BF53852249AA8D2D` (`siaf_fuentes_financiamiento_id`),
  KEY `IDX_BF538522222903D5` (`siaf_aperturas_programaticas_id`),
  KEY `IDX_BF538522D4BDE734` (`siaf_objetos_gasto_id`),
  CONSTRAINT `FK_BF538522222903D5` FOREIGN KEY (`siaf_aperturas_programaticas_id`) REFERENCES `siaf_aperturas_programaticas` (`id`),
  CONSTRAINT `FK_BF53852249AA8D2D` FOREIGN KEY (`siaf_fuentes_financiamiento_id`) REFERENCES `siaf_fuentes_financiamiento` (`id`),
  CONSTRAINT `FK_BF53852268357A88` FOREIGN KEY (`pla_planes_procesos_id`) REFERENCES `pla_planes_procesos` (`id`),
  CONSTRAINT `FK_BF538522D4BDE734` FOREIGN KEY (`siaf_objetos_gasto_id`) REFERENCES `siaf_objetos_gasto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_planes_partidas`
--

LOCK TABLES `pla_planes_partidas` WRITE;
/*!40000 ALTER TABLE `pla_planes_partidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pla_planes_partidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_planes_procesos`
--

DROP TABLE IF EXISTS `pla_planes_procesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pla_planes_procesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_planes_cabecera_id` int(11) NOT NULL,
  `pla_conf_tipo_planes_id` int(11) NOT NULL,
  `siaf_moneda_id` int(11) NOT NULL,
  `nro_linea` int(11) NOT NULL,
  `descripcion` varchar(180) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `es_plurianual` tinyint(1) NOT NULL,
  `es_moneda_extranjera` tinyint(1) NOT NULL,
  `esta_presupuestado` tinyint(1) NOT NULL,
  `tipo_tasa` longtext NOT NULL COMMENT '(DC2Type:array)',
  `tasa_conversion` decimal(18,6) NOT NULL,
  `importe_total` decimal(18,2) NOT NULL,
  `importe_total_orig` decimal(18,2) NOT NULL,
  `importe_ejercicio` decimal(18,2) NOT NULL,
  `importe_ejercicio_orig` decimal(18,2) NOT NULL,
  `importe_anterior_orig` decimal(18,2) NOT NULL,
  `importe_proximo_ejercicio_orig` decimal(18,2) NOT NULL,
  `expediente_impulso` varchar(45) DEFAULT NULL,
  `tipo_registro` longtext DEFAULT NULL COMMENT '(DC2Type:array)',
  `referencia_linea_proceso` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_49D17E6570A714E2` (`pla_planes_cabecera_id`),
  KEY `IDX_49D17E65D1AE59E8` (`pla_conf_tipo_planes_id`),
  KEY `IDX_49D17E65DC25BE4A` (`siaf_moneda_id`),
  CONSTRAINT `FK_49D17E6570A714E2` FOREIGN KEY (`pla_planes_cabecera_id`) REFERENCES `pla_planes_cabecera` (`id`),
  CONSTRAINT `FK_49D17E65D1AE59E8` FOREIGN KEY (`pla_conf_tipo_planes_id`) REFERENCES `pla_conf_tipo_planes` (`id`),
  CONSTRAINT `FK_49D17E65DC25BE4A` FOREIGN KEY (`siaf_moneda_id`) REFERENCES `siaf_moneda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_planes_procesos`
--

LOCK TABLES `pla_planes_procesos` WRITE;
/*!40000 ALTER TABLE `pla_planes_procesos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pla_planes_procesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_aperturas_programaticas`
--

DROP TABLE IF EXISTS `siaf_aperturas_programaticas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_aperturas_programaticas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_finalidad_funcion_id` int(11) DEFAULT NULL,
  `siaf_servicios_id` int(11) NOT NULL,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `siaf_categorias_programaticas_id` int(11) DEFAULT NULL,
  `siaf_apertura_programatica_padre_id` int(11) DEFAULT NULL,
  `cod_apertura_programatica` varchar(14) NOT NULL,
  `apertura_programatica` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BB027480C8EBA48` (`siaf_finalidad_funcion_id`),
  KEY `IDX_BB027480196099F1` (`siaf_servicios_id`),
  KEY `IDX_BB0274801655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_BB02748014FE202F` (`siaf_categorias_programaticas_id`),
  KEY `IDX_BB02748024CB1614` (`siaf_apertura_programatica_padre_id`),
  CONSTRAINT `FK_BB02748014FE202F` FOREIGN KEY (`siaf_categorias_programaticas_id`) REFERENCES `siaf_categorias_programaticas` (`id`),
  CONSTRAINT `FK_BB0274801655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_BB027480196099F1` FOREIGN KEY (`siaf_servicios_id`) REFERENCES `siaf_servicios` (`id`),
  CONSTRAINT `FK_BB02748024CB1614` FOREIGN KEY (`siaf_apertura_programatica_padre_id`) REFERENCES `siaf_aperturas_programaticas` (`id`),
  CONSTRAINT `FK_BB027480C8EBA48` FOREIGN KEY (`siaf_finalidad_funcion_id`) REFERENCES `siaf_finalidad_funcion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_aperturas_programaticas`
--

LOCK TABLES `siaf_aperturas_programaticas` WRITE;
/*!40000 ALTER TABLE `siaf_aperturas_programaticas` DISABLE KEYS */;
INSERT INTO `siaf_aperturas_programaticas` VALUES (1,NULL,8,1,2025,NULL,'10','Actividades Comunes a los Programas de Agricultura, Ganaderia y Pesca'),(2,NULL,0,1,2025,NULL,'13','Actividades Comunes a los Programas de Industria y Desarrollo Productivo'),(3,NULL,0,1,2025,NULL,'17','Definicion de Politicas de Comercio Exterior'),(4,NULL,0,1,2025,NULL,'31','Defensa de la Libre Competencia'),(5,NULL,0,1,2025,NULL,'33','Analisis y Regulacion de la Competencia Comercial Internacional'),(6,1,0,1,2025,NULL,'10.0','Actividades Comunes a los Programas de Agricultura, Ganaderia y Pesca'),(7,2,0,1,2025,NULL,'13.0','Actividades Comunes a los Programas de Industria y Desarrollo Productivo\r\n'),(8,3,0,1,2025,NULL,'17.0','Definicion de Politicas de Comercio Exterior\r\n'),(9,4,0,1,2025,NULL,'31.0','Defensa de la Libre Competencia'),(10,5,0,1,2025,NULL,'33.0','Analisis y Regulacion de la Competencia Comercial Internacional'),(11,6,0,1,2025,NULL,'10.0.0','Actividades Comunes a los Programas de Agricultura, Ganaderia y Pesca'),(12,7,0,1,2025,NULL,'13.0.0','Actividades Comunes a los Programas de Industria y Desarrollo Productivo\r\n'),(13,8,0,1,2025,NULL,'17.0.0','Definicion de Politicas de Comercio Exterior\r\n'),(14,9,0,1,2025,NULL,'31.0.0','Defensa de la Libre Competencia'),(15,10,0,1,2025,NULL,'33.0.0','Analisis y Regulacion de la Competencia Comercial Internacional'),(16,11,0,1,2025,NULL,'10.0.0.1','Conduccion y Administracion'),(17,11,0,1,2025,NULL,'10.0.0.2','Coordinacion de Servicios Tecnicos'),(18,16,0,1,2025,NULL,'10.0.0.1.0','Actividades Comunes a los Programas de Agricultura, Ganaderia y Pesca Conduccion y Administracion'),(19,17,0,1,2025,NULL,'10.0.0.2.0','Actividades Comunes Agricultura, Ganaderia y Pesca Coordinacion de Servicios Tecnicos'),(20,12,0,1,2025,NULL,'13.0.0.1','Conduccion y Administracion'),(21,20,0,1,2025,NULL,'13.0.0.1.0','ACtividades Comunes Industria - Conduccion y Administracion'),(22,13,0,1,2025,NULL,'17.0.0.1','Conduccion  y Administracion'),(23,22,0,1,2025,NULL,'17.0.0.1.0','Def. Políticas Comercio exterior - Conduccion  y Administracion'),(24,13,0,1,2025,NULL,'17.0.0.45','Implementacion de la Ventanilla Unica de Comercio Exterior (VUCE) (BID N° 3869/OC-AR)'),(25,24,0,1,2025,NULL,'17.0.0.45.0','Implementacion de la Ventanilla Unica de Comercio Exterior (VUCE) (BID N° 3869/OC-AR)'),(26,14,0,1,2025,NULL,'31.0.0.1','Conduccion y Administracion'),(27,26,0,1,2025,NULL,'31.0.0.1.0','Defensa Libre competencia - Conduccion y Administracion'),(28,15,0,1,2025,NULL,'33.0.0.1','Analisis y Regulacion de la Competencia Comercial Internacional'),(29,28,0,1,2025,NULL,'33.0.0.1.0','Analisis y Regulacion de la Competencia Comercial Internacional');
/*!40000 ALTER TABLE `siaf_aperturas_programaticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_categorias_programaticas`
--

DROP TABLE IF EXISTS `siaf_categorias_programaticas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_categorias_programaticas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_categoria_programatica` varchar(3) NOT NULL,
  `categoria_programatica` varchar(120) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_categorias_programaticas`
--

LOCK TABLES `siaf_categorias_programaticas` WRITE;
/*!40000 ALTER TABLE `siaf_categorias_programaticas` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_categorias_programaticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_ejercicios`
--

DROP TABLE IF EXISTS `siaf_ejercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_ejercicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_planificacion` smallint(6) NOT NULL,
  `activo_formulacion` smallint(6) NOT NULL,
  `activo_ejecucion` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2026 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_ejercicios`
--

LOCK TABLES `siaf_ejercicios` WRITE;
/*!40000 ALTER TABLE `siaf_ejercicios` DISABLE KEYS */;
INSERT INTO `siaf_ejercicios` VALUES (2024,0,0,0),(2025,1,0,1);
/*!40000 ALTER TABLE `siaf_ejercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_estados_comprobantes`
--

DROP TABLE IF EXISTS `siaf_estados_comprobantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_estados_comprobantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_tipos_comprobantes_id` int(11) DEFAULT NULL,
  `estado` varchar(45) NOT NULL,
  `desc_estado` varchar(180) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_92E70DB6316CEB2B` (`siaf_tipos_comprobantes_id`),
  CONSTRAINT `FK_92E70DB6316CEB2B` FOREIGN KEY (`siaf_tipos_comprobantes_id`) REFERENCES `siaf_tipos_comprobantes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_estados_comprobantes`
--

LOCK TABLES `siaf_estados_comprobantes` WRITE;
/*!40000 ALTER TABLE `siaf_estados_comprobantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_estados_comprobantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_finalidad_funcion`
--

DROP TABLE IF EXISTS `siaf_finalidad_funcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_finalidad_funcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_finalidad_funcion` varchar(3) NOT NULL,
  `finalidad_funcion` varchar(80) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3202B6281655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_3202B62831E700CD` (`id_padre_id`),
  CONSTRAINT `FK_3202B6281655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_3202B62831E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_finalidad_funcion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_finalidad_funcion`
--

LOCK TABLES `siaf_finalidad_funcion` WRITE;
/*!40000 ALTER TABLE `siaf_finalidad_funcion` DISABLE KEYS */;
INSERT INTO `siaf_finalidad_funcion` VALUES (1,2025,NULL,'1','ADMINISTRACION GUBERNAMENTAL',1),(2,2025,NULL,'2','SERVICIOS DE DEFENSA Y SEGURIDAD',1),(3,2025,NULL,'3','SERVICIOS SOCIALES',1),(4,2025,NULL,'4','SERVICIOS ECONOMICOS',1),(5,2025,NULL,'5','DEUDA PUBLICA',1),(6,2025,1,'13','Dirección Superior Ejecutiva',2),(7,2025,4,'45','Agricultura, Ganadería y Pesca',2),(8,2025,4,'46','Industria',2),(9,2025,4,'47','Comercio, Turismo y Otros Servicios',2),(10,2025,4,'41','Energía, Combustibles y Minería',2);
/*!40000 ALTER TABLE `siaf_finalidad_funcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_fuentes_financiamiento`
--

DROP TABLE IF EXISTS `siaf_fuentes_financiamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_fuentes_financiamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_fuente_financiamiento` varchar(2) NOT NULL,
  `fuente_financiamiento` varchar(180) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BE2BFF1B1655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_BE2BFF1B31E700CD` (`id_padre_id`),
  CONSTRAINT `FK_BE2BFF1B1655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_BE2BFF1B31E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_fuentes_financiamiento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_fuentes_financiamiento`
--

LOCK TABLES `siaf_fuentes_financiamiento` WRITE;
/*!40000 ALTER TABLE `siaf_fuentes_financiamiento` DISABLE KEYS */;
INSERT INTO `siaf_fuentes_financiamiento` VALUES (1,2025,NULL,'1','Fuentes De Financiamiento Internas',1),(2,2025,NULL,'2','Fuentes De Financiamiento Externas',1),(3,2025,NULL,'9','Otras fuentes',1),(4,2025,1,'11','Tesoro Nacional',2),(5,2025,1,'12','Recursos Propios',2),(6,2025,1,'13','Recursos con Afectación Específica',2),(7,2025,2,'21','Transferencias Externas',2),(8,2025,2,'22','Crédito Externo',2);
/*!40000 ALTER TABLE `siaf_fuentes_financiamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_instituciones`
--

DROP TABLE IF EXISTS `siaf_instituciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_instituciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_institucion` varchar(9) NOT NULL,
  `institucion` varchar(180) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CF158A21655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_8CF158A231E700CD` (`id_padre_id`),
  CONSTRAINT `FK_8CF158A21655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_8CF158A231E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_instituciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_instituciones`
--

LOCK TABLES `siaf_instituciones` WRITE;
/*!40000 ALTER TABLE `siaf_instituciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_instituciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_moneda`
--

DROP TABLE IF EXISTS `siaf_moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_moneda` varchar(4) NOT NULL,
  `moneda` varchar(45) NOT NULL,
  `signo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_moneda`
--

LOCK TABLES `siaf_moneda` WRITE;
/*!40000 ALTER TABLE `siaf_moneda` DISABLE KEYS */;
INSERT INTO `siaf_moneda` VALUES (1,'ARS','Pesos','$'),(2,'USD','Dólares estadounidences','US$'),(3,'EUR','Euro','E');
/*!40000 ALTER TABLE `siaf_moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_objetos_gasto`
--

DROP TABLE IF EXISTS `siaf_objetos_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_objetos_gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `abr_objeto_gasto` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  `tipo` longtext DEFAULT NULL COMMENT '(DC2Type:array)',
  `objeto_gasto` varchar(80) NOT NULL,
  `cod_objeto_gasto` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_543626FF1655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_543626FF31E700CD` (`id_padre_id`),
  CONSTRAINT `FK_543626FF1655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_543626FF31E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_objetos_gasto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_objetos_gasto`
--

LOCK TABLES `siaf_objetos_gasto` WRITE;
/*!40000 ALTER TABLE `siaf_objetos_gasto` DISABLE KEYS */;
INSERT INTO `siaf_objetos_gasto` VALUES (1,2025,NULL,'1',0,'Personal','1','INCISO'),(2,2025,NULL,'2',0,'Bienes Cons','1','INCISO'),(3,2025,NULL,'3',0,'Serv.no pers','1','INCISO'),(4,2025,NULL,'4',0,'Bienes de uso','1','INCISO'),(5,2025,NULL,'5',0,'Transferencias','1','INCISO'),(6,2025,NULL,'6',0,'Inc.Financ','1','INCISO'),(7,2025,NULL,'7',0,'Deuda','1','INCISO'),(8,2025,NULL,'8',0,'Otros gastos','1','INCISO'),(9,2025,NULL,'9',0,'Otros','1','INCISO'),(10,2025,1,'1.1',0,'Pers.Perm','2',''),(11,2025,1,'1.2',0,'Pers.Temp','2',''),(12,2025,1,'1.8',0,'Pers.Contr','2',''),(13,2025,2,'2.1',0,'Alim,For','2',''),(14,2025,2,'2.2',0,'Textil','2',''),(15,2025,2,'2.3',0,'Papeleria','2',''),(16,2025,2,'2.4',0,'Cuero/Caucho','2',''),(17,2025,3,'3.1',0,'Serv.Bas','2',''),(18,2025,17,'3.1.1',0,'Electric.','3',''),(19,2025,17,'3.1.2',0,'Agua','3',''),(20,2025,17,'3.1.3',0,'Telefonía fija y móvil','3',''),(21,2025,3,'3.2',0,'Alquileres','3',''),(22,2025,5,'5.1',0,'Trns.Priv','2','');
/*!40000 ALTER TABLE `siaf_objetos_gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_organigrama`
--

DROP TABLE IF EXISTS `siaf_organigrama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_organigrama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_unidad_organizacional` varchar(10) NOT NULL,
  `unidad_organizacional` varchar(120) NOT NULL,
  `abr_unidad_organizacional` varchar(20) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_770484D331E700CD` (`id_padre_id`),
  CONSTRAINT `FK_770484D331E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_organigrama` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_organigrama`
--

LOCK TABLES `siaf_organigrama` WRITE;
/*!40000 ALTER TABLE `siaf_organigrama` DISABLE KEYS */;
INSERT INTO `siaf_organigrama` VALUES (1,NULL,'MECON','Despacho Ministro','Ministro','2025-01-27 14:26:57',NULL),(2,1,'SCP','Secretaría de Coordinación de la Producción','S.Coord.Produc.','2025-01-27 14:28:46',NULL),(3,1,'SPYME','Secretaría PYME y economía del conocimiento','S.PYME','2025-01-27 14:30:15',NULL),(4,1,'SIC','Secretaría de industria y comercio','S.Ind.y Comerc.','2025-01-27 14:33:32',NULL),(5,1,'SAGP','Secretaria de Agricultura Ganadería y Pesca','S.A,GyP','2025-01-27 14:34:28',NULL),(6,2,'SSESGP','Subsecretaría de evaluación y seguimiento de gestión de producción','SS.Ev.Producc','2025-01-27 14:36:56',NULL),(7,3,'SSEMPREND','Subsecretaría de emprendedores','SS.Emprend.','2025-01-27 14:43:33',NULL),(8,3,'SSECCON','Subsecretaría de economía del conocimiento','SS. EC.Conoc','2025-01-27 14:44:57',NULL),(9,4,'SSPOLIND','Subsecretaría de política industrial','SS.Pol.Indust','2025-01-27 14:45:59',NULL),(10,1,'SLyA','Secretaría Legal y Administrativa','S.Leg.y Adm','2025-01-27 14:46:59',NULL),(11,10,'SSGAP','Subsecretaría de gestión administrativa de producción','SS.Gest.Ad.Pro','2025-01-27 14:49:46',NULL),(12,11,'DGTIC','Dirección General de Tecnología de la información','DGTIC.Prod','2025-01-27 14:50:42',NULL),(13,11,'DGRRHH','Dirección General de Recursos Humanos de Producción','D.RRHH.Prod','2025-01-27 14:51:24',NULL),(14,11,'DGA','Dirección General de Administración Producción','DGA Prod','2025-01-27 14:52:03',NULL),(15,14,'DGPRE','Dirección General de Presupuesto','DGPRES Prod','2025-01-27 14:53:03',NULL),(16,11,'DGCC','Dirección de Compras y Contrataciones','D.Compras Pro','2025-01-27 15:02:19',NULL);
/*!40000 ALTER TABLE `siaf_organigrama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_parametros`
--

DROP TABLE IF EXISTS `siaf_parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_parametro` varchar(25) NOT NULL,
  `tipo_valor` longtext NOT NULL COMMENT '(DC2Type:array)',
  `parametro` varchar(45) NOT NULL,
  `uso_parametro` varchar(45) NOT NULL,
  `valor_num` decimal(24,6) DEFAULT NULL,
  `valor_char` varchar(200) DEFAULT NULL,
  `valor_fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_parametros`
--

LOCK TABLES `siaf_parametros` WRITE;
/*!40000 ALTER TABLE `siaf_parametros` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_parametros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_sectores_institucionales`
--

DROP TABLE IF EXISTS `siaf_sectores_institucionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_sectores_institucionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) DEFAULT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_sector_institucional` varchar(50) DEFAULT NULL,
  `sector_institucional` varchar(180) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_648A7BD31655D8F4` (`siaf_ejercicios_id`),
  KEY `IDX_648A7BD331E700CD` (`id_padre_id`),
  CONSTRAINT `FK_648A7BD31655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`),
  CONSTRAINT `FK_648A7BD331E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_sectores_institucionales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_sectores_institucionales`
--

LOCK TABLES `siaf_sectores_institucionales` WRITE;
/*!40000 ALTER TABLE `siaf_sectores_institucionales` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_sectores_institucionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_servicios`
--

DROP TABLE IF EXISTS `siaf_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_ejercicios_id` int(11) NOT NULL,
  `cod_servicio` varchar(10) NOT NULL,
  `servicio` varchar(120) DEFAULT NULL,
  `abr_servicio` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB2D0AB71655D8F4` (`siaf_ejercicios_id`),
  CONSTRAINT `FK_AB2D0AB71655D8F4` FOREIGN KEY (`siaf_ejercicios_id`) REFERENCES `siaf_ejercicios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_servicios`
--

LOCK TABLES `siaf_servicios` WRITE;
/*!40000 ALTER TABLE `siaf_servicios` DISABLE KEYS */;
INSERT INTO `siaf_servicios` VALUES (1,2025,'362','Secretaría de Industria y Desarrollo Productivo','As.Productivos');
/*!40000 ALTER TABLE `siaf_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_tipos_comprobantes`
--

DROP TABLE IF EXISTS `siaf_tipos_comprobantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_tipos_comprobantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_comprobantes` varchar(5) NOT NULL,
  `tipo_comporbante` varchar(45) NOT NULL,
  `desc_tipo_comprobante` varchar(180) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_tipos_comprobantes`
--

LOCK TABLES `siaf_tipos_comprobantes` WRITE;
/*!40000 ALTER TABLE `siaf_tipos_comprobantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `siaf_tipos_comprobantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_unidades`
--

DROP TABLE IF EXISTS `siaf_unidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siaf_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siaf_organigrama_id` int(11) NOT NULL,
  `siaf_servicios_id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `cod_unidad` varchar(10) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `abr_unidad` varchar(15) NOT NULL,
  `fecha_vigencia_desde` datetime NOT NULL,
  `fecha_vigencia_hasta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3C4BD894B10CD778` (`siaf_organigrama_id`),
  KEY `IDX_3C4BD894196099F1` (`siaf_servicios_id`),
  KEY `IDX_3C4BD89431E700CD` (`id_padre_id`),
  CONSTRAINT `FK_3C4BD894196099F1` FOREIGN KEY (`siaf_servicios_id`) REFERENCES `siaf_servicios` (`id`),
  CONSTRAINT `FK_3C4BD89431E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `siaf_unidades` (`id`),
  CONSTRAINT `FK_3C4BD894B10CD778` FOREIGN KEY (`siaf_organigrama_id`) REFERENCES `siaf_organigrama` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_unidades`
--

LOCK TABLES `siaf_unidades` WRITE;
/*!40000 ALTER TABLE `siaf_unidades` DISABLE KEYS */;
INSERT INTO `siaf_unidades` VALUES (1,1,1,NULL,'AP','Asuntos productivos','As.Prod','2025-01-27 15:22:54',NULL),(2,11,1,1,'SSAP','SS Asuntos Productivos','SS AP','2025-01-27 15:24:06',NULL),(3,14,1,2,'COMDGA','Compras - DGA','Compras DGA','2025-01-27 15:24:53',NULL),(4,11,1,2,'PNUD','Gestión PNUD','G.PNUD','2025-01-27 15:25:53',NULL),(5,11,1,2,'BID','Gestión BID','G.BID','2025-01-27 15:26:27',NULL),(6,11,1,2,'BM','Gestión Banco Mundial','G.BM','2025-01-27 15:27:17',NULL),(7,14,1,2,'SEVGRL','Servicios Generales','Serv.Gral','2025-01-27 15:28:24',NULL),(8,3,1,1,'PYME PLA','Secretaría PYME planificación','PYME Pla','2025-01-27 15:30:15',NULL),(9,3,1,8,'Proy.PYME','Proyectos PYME','Proyectos PYME','2025-01-27 15:31:12',NULL),(10,3,1,8,'PYME Adm','Administración PYME','PYME Adm','2025-01-27 15:31:56',NULL),(11,8,1,8,'Capacitar','Capacitar','Capacitar','2025-01-27 15:32:51',NULL),(12,13,1,2,'DRRHH','Dirección RRHH','RRHH','2025-01-27 16:11:37',NULL),(13,12,1,2,'DGTIC','Dirección General de TIC','DGTIC','2025-01-27 16:13:16',NULL);
/*!40000 ALTER TABLE `siaf_unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wfl_estados_entidad`
--

DROP TABLE IF EXISTS `wfl_estados_entidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wfl_estados_entidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_entidad_id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `es_final` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D22E97CD9CD4DDF` (`conf_entidad_id`),
  CONSTRAINT `FK_D22E97CD9CD4DDF` FOREIGN KEY (`conf_entidad_id`) REFERENCES `conf_entidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wfl_estados_entidad`
--

LOCK TABLES `wfl_estados_entidad` WRITE;
/*!40000 ALTER TABLE `wfl_estados_entidad` DISABLE KEYS */;
INSERT INTO `wfl_estados_entidad` VALUES (1,1,'Creado','Estado inicial del comprobante',0),(2,1,'En proceso','En proceso de carga del plan',0),(3,1,'Verificado','Verificado. Requiere que el plan sea consitente (importes de partidas con importe del proceso)',0),(4,1,'Anulado','Plan anulado antes de su aprobación',1),(5,1,'Aprobado','Plan aprobado. Se encuentra en condiciones de ser consolidado',1),(6,1,'Rechazado','Plan rechazado por el aprobador',1),(8,1,'En verificacion','Plan enviado a verificacion',0),(9,1,'En modificacion','Plan en modificación a solicitud de aprobador',0);
/*!40000 ALTER TABLE `wfl_estados_entidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wfl_transicion_estados`
--

DROP TABLE IF EXISTS `wfl_transicion_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wfl_transicion_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_entidad_id` int(11) DEFAULT NULL,
  `cod_transicion` varchar(80) NOT NULL,
  `transicion` varchar(80) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `wfl_estado_inicial_id` int(11) DEFAULT NULL,
  `wfl_estado_final_id` int(11) DEFAULT NULL,
  `tipo_trancision` longtext NOT NULL COMMENT '(DC2Type:array)',
  `conf_rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F43883F09CD4DDF` (`conf_entidad_id`),
  KEY `IDX_F43883F07E309DAD` (`wfl_estado_inicial_id`),
  KEY `IDX_F43883F094F0ACE1` (`wfl_estado_final_id`),
  KEY `IDX_F43883F0609D6CB3` (`conf_rol_id`),
  CONSTRAINT `FK_F43883F0609D6CB3` FOREIGN KEY (`conf_rol_id`) REFERENCES `conf_roles` (`id`),
  CONSTRAINT `FK_F43883F07E309DAD` FOREIGN KEY (`wfl_estado_inicial_id`) REFERENCES `wfl_estados_entidad` (`id`),
  CONSTRAINT `FK_F43883F094F0ACE1` FOREIGN KEY (`wfl_estado_final_id`) REFERENCES `wfl_estados_entidad` (`id`),
  CONSTRAINT `FK_F43883F09CD4DDF` FOREIGN KEY (`conf_entidad_id`) REFERENCES `conf_entidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wfl_transicion_estados`
--

LOCK TABLES `wfl_transicion_estados` WRITE;
/*!40000 ALTER TABLE `wfl_transicion_estados` DISABLE KEYS */;
INSERT INTO `wfl_transicion_estados` VALUES (2,1,'CREAR','Crea','Creación de Plan',NULL,1,'Automatica',1),(3,1,'INGRESAR','Carga','Carga de formulario',1,2,'Manual',1),(6,1,'CARGAR','Carga','Continua carga de plan',2,2,'Manual',1),(9,1,'VERIFICAR','Enviar a verificacion','Envio a moficiacion',2,8,'Hibrida',1),(12,1,'SOLICITAR','Solicitar aprobación del Plan','Solocaitar aprobacion del plan',8,3,'Hibrida',2),(15,1,'APROBAR','Apruba','Aprueba planificacion',3,5,'Manual',3),(16,1,'ANULAR','Anula','Anula Plan antes de su verificación',2,4,'Manual',1),(17,1,'DEVOLVER','Devolver','Devuelve para ajustes',8,2,'Manual',2),(18,1,'RECHAZAR','Rechazar Plan','Rechaza plan',3,6,'Manual',3),(21,1,'AJUSTAR','Solicitar ajuste','Solicitar ajuste de plan',3,9,'Manual',3),(23,1,'SOLICITAR 2','Solicitar aprobación','SOlicitar aprobación de modificación',9,3,'Manual',2),(25,1,'MODIFICAR','Modificar plan','Modificar plan ',9,9,'Manual',2);
/*!40000 ALTER TABLE `wfl_transicion_estados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-29  8:49:24
