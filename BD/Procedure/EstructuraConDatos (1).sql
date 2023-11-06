CREATE DATABASE  IF NOT EXISTS `proyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `proyecto`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `administrativos`
--

DROP TABLE IF EXISTS `administrativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrativos` (
  `UsuarioCI` int NOT NULL,
  `AdministrativoContra` varchar(255) NOT NULL,
  `AdministrativoContacto` varchar(25) NOT NULL,
  `AdministrativoExiste` bit(1) NOT NULL DEFAULT (1),
  PRIMARY KEY (`UsuarioCI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrativos`
--

LOCK TABLES `administrativos` WRITE;
/*!40000 ALTER TABLE `administrativos` DISABLE KEYS */;
INSERT INTO `administrativos` VALUES (3,'con','admin1@example.com',_binary ''),(4,'Contraseña2','admin2@example.com',_binary ''),(5,'Contraseña3','admin3@example.com',_binary ''),(8,'wef','jvs@nmdks',_binary ''),(9,'kll','re@po',_binary '');
/*!40000 ALTER TABLE `administrativos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realiza`
--

DROP TABLE IF EXISTS `realiza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `realiza` (
  `RealizaID` int NOT NULL AUTO_INCREMENT,
  `UsuarioCI` int DEFAULT NULL,
  `RegistroID` int NOT NULL,
  `RealizaDia` date NOT NULL,
  `RealizaHora` time NOT NULL,
  PRIMARY KEY (`RealizaID`),
  KEY `FK_RealizaUsuID` (`UsuarioCI`),
  KEY `FK_RegistroREgistroID` (`RegistroID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realiza`
--

LOCK TABLES `realiza` WRITE;
/*!40000 ALTER TABLE `realiza` DISABLE KEYS */;
INSERT INTO `realiza` VALUES (1,1,1,'2023-09-26','08:00:00'),(2,2,2,'2023-09-27','09:30:00'),(3,6,3,'2023-09-28','10:45:00'),(4,7,4,'2023-09-28','15:20:00'),(5,6,6,'2023-09-28','09:12:33'),(6,3,7,'2023-10-06','10:51:02'),(7,1,8,'2023-10-06','10:56:14'),(8,3,9,'2023-10-06','10:56:37'),(9,3,10,'2023-10-06','10:58:11'),(10,6,11,'2023-10-06','10:58:16'),(11,3,12,'2023-10-06','10:58:49'),(12,3,13,'2023-10-06','10:59:03'),(13,3,14,'2023-10-06','11:11:45'),(14,89898,15,'2023-10-06','11:13:00'),(15,2,16,'2023-10-06','11:40:42'),(16,2147483647,17,'2023-10-06','12:03:58');
/*!40000 ALTER TABLE `realiza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `RegistroID` int NOT NULL AUTO_INCREMENT,
  `UsuarioCI` int DEFAULT NULL,
  `RegistroDesc` varchar(255) DEFAULT NULL,
  `RegistroInvitado` bit(1) NOT NULL DEFAULT (0),
  PRIMARY KEY (`RegistroID`),
  KEY `FK_RegistroUsuID` (`UsuarioCI`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,1,'Registro 1',_binary '\0'),(2,2,'Registro 2',_binary '\0'),(3,6,'Registro 3',_binary '\0'),(4,7,'Registro 4',_binary '\0'),(5,6,'Usuario registro',_binary '\0'),(6,6,'Usuario registro',_binary '\0'),(7,3,'Usuario registrado 3',_binary '\0'),(8,1,'hola',_binary '\0'),(9,3,'Usuario registrado 3',_binary '\0'),(10,3,'Usuario registrado 3',_binary '\0'),(11,6,'Usuario registrado 6',_binary '\0'),(12,3,'Usuario registrado 3',_binary '\0'),(13,3,'Usuario registrado 3',_binary '\0'),(14,3,'Usuario registrado',_binary '\0'),(15,89898,'Usuario no registrado cedula: 89898',_binary ''),(16,2,'Usuario registrado',_binary '\0'),(17,2147483647,'Usuario no registrado cedula: 12345678888888888888888888888888',_binary '');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisa`
--

DROP TABLE IF EXISTS `supervisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supervisa` (
  `Supervisado` int DEFAULT NULL,
  `AdministrativoJefe` int DEFAULT NULL,
  KEY `FK_Supervisa` (`Supervisado`),
  KEY `FK_AdminitrativoJefeID` (`AdministrativoJefe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisa`
--

LOCK TABLES `supervisa` WRITE;
/*!40000 ALTER TABLE `supervisa` DISABLE KEYS */;
INSERT INTO `supervisa` VALUES (3,4),(4,5),(9,3),(8,3);
/*!40000 ALTER TABLE `supervisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `UsuarioCI` int NOT NULL,
  `UsuarioNombre` varchar(25) NOT NULL,
  `UsuarioApellido` varchar(25) NOT NULL,
  `UsuarioTipo` varchar(25) NOT NULL,
  `UsuarioExiste` bit(1) NOT NULL DEFAULT (1),
  PRIMARY KEY (`UsuarioCI`),
  CONSTRAINT `usuarios_chk_1` CHECK (((`UsuarioTipo` = _utf8mb4'Alumno') or (`UsuarioTipo` = _utf8mb4'Profesor') or (`UsuarioTipo` = _utf8mb4'Administrativo') or (`UsuarioTipo` = _utf8mb4'Direccion') or (`UsuarioTipo` = _utf8mb4'Funcionario')))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan','Pérez','Alumno',_binary ''),(2,'María','López','Profesor',_binary ''),(3,'Carlos','Rodríguez','Administrativo',_binary ''),(4,'Laura','González','Direccion',_binary ''),(5,'Ana','Sánchez','Funcionario',_binary ''),(6,'Pedro','García','Alumno',_binary ''),(7,'Julia','Martínez','Profesor',_binary ''),(8,'David','Pérez','Administrativo',_binary ''),(9,'Elena','Fernández','Direccion',_binary ''),(10,'Roberto','López','Funcionario',_binary ''),(1111,'we','wewe','Profesor',_binary '\0'),(999,'','','Profesor',_binary '\0'),(11,'werwe','we','Profesor',_binary '\0'),(34,'wewe','wewe','Profesor',_binary '');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vistaregistro`
--

DROP TABLE IF EXISTS `vistaregistro`;
/*!50001 DROP VIEW IF EXISTS `vistaregistro`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistaregistro` AS SELECT 
 1 AS `UsuarioCI`,
 1 AS `UsuarioNombre`,
 1 AS `UsuarioApellido`,
 1 AS `UsuarioTipo`,
 1 AS `UsuarioRegistroCI`,
 1 AS `RegistroID`,
 1 AS `RegistroDesc`,
 1 AS `RegistroInvitado`,
 1 AS `RealizaDia`,
 1 AS `RealizaHora`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistausuarioadministrativo`
--

DROP TABLE IF EXISTS `vistausuarioadministrativo`;
/*!50001 DROP VIEW IF EXISTS `vistausuarioadministrativo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistausuarioadministrativo` AS SELECT 
 1 AS `UsuarioCI`,
 1 AS `UsuarioNombre`,
 1 AS `UsuarioApellido`,
 1 AS `AdministrativoContacto`,
 1 AS `AdministrativoExiste`,
 1 AS `AdministrativoJefe`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistausuarios`
--

DROP TABLE IF EXISTS `vistausuarios`;
/*!50001 DROP VIEW IF EXISTS `vistausuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistausuarios` AS SELECT 
 1 AS `UsuarioCI`,
 1 AS `UsuarioNombre`,
 1 AS `UsuarioApellido`,
 1 AS `UsuarioTipo`,
 1 AS `UsuarioExiste`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vistaregistro`
--

/*!50001 DROP VIEW IF EXISTS `vistaregistro`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistaregistro` AS select `u`.`UsuarioCI` AS `UsuarioCI`,`u`.`UsuarioNombre` AS `UsuarioNombre`,`u`.`UsuarioApellido` AS `UsuarioApellido`,`u`.`UsuarioTipo` AS `UsuarioTipo`,`r`.`UsuarioCI` AS `UsuarioRegistroCI`,`r`.`RegistroID` AS `RegistroID`,`r`.`RegistroDesc` AS `RegistroDesc`,`r`.`RegistroInvitado` AS `RegistroInvitado`,`rl`.`RealizaDia` AS `RealizaDia`,`rl`.`RealizaHora` AS `RealizaHora` from ((`realiza` `rl` left join `usuarios` `u` on((`rl`.`UsuarioCI` = `u`.`UsuarioCI`))) join `registro` `r` on((`rl`.`RegistroID` = `r`.`RegistroID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistausuarioadministrativo`
--

/*!50001 DROP VIEW IF EXISTS `vistausuarioadministrativo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistausuarioadministrativo` AS select `u`.`UsuarioCI` AS `UsuarioCI`,`u`.`UsuarioNombre` AS `UsuarioNombre`,`u`.`UsuarioApellido` AS `UsuarioApellido`,`a`.`AdministrativoContacto` AS `AdministrativoContacto`,`a`.`AdministrativoExiste` AS `AdministrativoExiste`,`s`.`AdministrativoJefe` AS `AdministrativoJefe` from ((`usuarios` `u` join `administrativos` `a` on((`u`.`UsuarioCI` = `a`.`UsuarioCI`))) left join `supervisa` `s` on((`a`.`UsuarioCI` = `s`.`Supervisado`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistausuarios`
--

/*!50001 DROP VIEW IF EXISTS `vistausuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistausuarios` AS select `usuarios`.`UsuarioCI` AS `UsuarioCI`,`usuarios`.`UsuarioNombre` AS `UsuarioNombre`,`usuarios`.`UsuarioApellido` AS `UsuarioApellido`,`usuarios`.`UsuarioTipo` AS `UsuarioTipo`,`usuarios`.`UsuarioExiste` AS `UsuarioExiste` from `usuarios` where `usuarios`.`UsuarioCI` in (select `administrativos`.`UsuarioCI` from `administrativos`) is false */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-05 22:59:36
