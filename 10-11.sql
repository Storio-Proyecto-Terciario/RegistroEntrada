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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrativos`
--

LOCK TABLES `administrativos` WRITE;
/*!40000 ALTER TABLE `administrativos` DISABLE KEYS */;
INSERT INTO `administrativos` VALUES (12345678,'d41d8cd98f00b204e9800998ecf8427e','re@po',_binary ''),(33333333,'9b46ce39e2b2e5e16e56205d16cd7e97','admin1@example.com',_binary ''),(44444444,'8d2f68251798382c58e57e521a1a04d7','admin2@example.com',_binary ''),(55555555,'e2f87f1b54db0e943961c413401cf3f3','admin3@example.com',_binary ''),(77777777,'3ff7c49b48adfeee89050ebd1c485c5f','re@po',_binary '\0'),(88888888,'f650b3f0453df270e328751b9c5b56ef','jvs@nmdks',_binary ''),(99999999,'c4bbefbbc0ac538da83de59d53800c28','re@po',_binary '');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realiza`
--

LOCK TABLES `realiza` WRITE;
/*!40000 ALTER TABLE `realiza` DISABLE KEYS */;
INSERT INTO `realiza` VALUES (1,11111111,1,'2023-09-26','08:00:00'),(2,22222222,2,'2023-09-27','09:30:00'),(3,66666666,3,'2023-09-28','10:45:00'),(4,77777777,4,'2023-09-28','15:20:00'),(5,66666666,6,'2023-09-28','09:12:33'),(6,33333333,7,'2023-10-06','10:51:02'),(7,11111111,8,'2023-10-06','10:56:14'),(8,33333333,9,'2023-10-06','10:56:37'),(9,33333333,10,'2023-10-06','10:58:11'),(10,66666666,11,'2023-10-06','10:58:16'),(11,33333333,12,'2023-10-06','10:58:49'),(12,33333333,13,'2023-10-06','10:59:03'),(13,33333333,14,'2023-10-06','11:11:45'),(14,89898,15,'2023-10-06','11:13:00'),(15,22222222,16,'2023-10-06','11:40:42'),(16,2147483647,17,'2023-10-06','12:03:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,11111111,'Registro 1',_binary '\0'),(2,22222222,'Registro 2',_binary '\0'),(3,66666666,'Registro 3',_binary '\0'),(4,77777777,'Registro 4',_binary '\0'),(5,66666666,'Usuario registro',_binary '\0'),(6,66666666,'Usuario registro',_binary '\0'),(7,33333333,'Usuario registrado 3',_binary '\0'),(8,11111111,'hola',_binary '\0'),(9,33333333,'Usuario registrado 3',_binary '\0'),(10,33333333,'Usuario registrado 3',_binary '\0'),(11,66666666,'Usuario registrado 6',_binary '\0'),(12,33333333,'Usuario registrado 3',_binary '\0'),(13,33333333,'Usuario registrado 3',_binary '\0'),(14,33333333,'Usuario registrado',_binary '\0'),(15,89898,'Usuario no registrado cedula: 89898',_binary ''),(16,22222222,'Usuario registrado',_binary '\0'),(17,2147483647,'Usuario no registrado cedula: 12345678888888888888888888888888',_binary '');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `AfterInsertTrigger` AFTER INSERT ON `registro` FOR EACH ROW BEGIN
    IF (select count(*) from usuarios u left join registro r on u.UsuarioCI=r.UsuarioCI where u.UsuarioCI=new.UsuarioCI) = 0 then
        UPDATE Registro
        SET RegistroInvitado = 1
        WHERE RegistroID = NEW.RegistroID;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `supervisa`
--

DROP TABLE IF EXISTS `supervisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supervisa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Supervisado` int DEFAULT NULL,
  `AdministrativoJefe` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Supervisa` (`Supervisado`),
  KEY `FK_AdminitrativoJefeID` (`AdministrativoJefe`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisa`
--

LOCK TABLES `supervisa` WRITE;
/*!40000 ALTER TABLE `supervisa` DISABLE KEYS */;
INSERT INTO `supervisa` VALUES (1,33333333,44444444),(2,44444444,55555555),(3,99999999,33333333),(4,88888888,33333333),(5,77777777,55555555),(6,12345678,55555555);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (10101010,'Roberto','López','Funcionario',_binary ''),(11111111,'Juan','Pérez','Alumno',_binary ''),(12121212,'we','wewe','Profesor',_binary '\0'),(12345678,'Ocho','Nueve','Profesor',_binary ''),(13131313,'','','Profesor',_binary '\0'),(14141414,'werwe','we','Profesor',_binary '\0'),(22222222,'María','López','Profesor',_binary ''),(33333333,'Carlos','Rodríguez','Administrativo',_binary ''),(34343434,'wewe','wewe','Profesor',_binary ''),(44444444,'Laura','González','Direccion',_binary ''),(55555555,'Ana','Sánchez','Funcionario',_binary ''),(66666666,'Pedro','García','Alumno',_binary ''),(77777777,'Julia','Martínez','Profesor',_binary ''),(88888888,'David','Pérez','Administrativo',_binary ''),(99999999,'Elena','Fernández','Direccion',_binary '');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_administrativos` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    UPDATE administrativos
    SET AdministrativoExiste = NEW.UsuarioExiste
    WHERE UsuarioCI = NEW.UsuarioCI;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
-- Dumping events for database 'proyecto'
--

--
-- Dumping routines for database 'proyecto'
--
/*!50003 DROP PROCEDURE IF EXISTS `InsertarAdministrativoSupervisa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarAdministrativoSupervisa`(
    IN p_UsuarioCI INT,
    IN p_AdministrativoContra VARCHAR(255),
    IN p_AdministrativoContacto VARCHAR(25),
    IN p_AdministrativoJefe INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error en la transacción';
    END;

    START TRANSACTION; 

    IF p_UsuarioCI=(SELECT UsuarioCI FROM administrativos WHERE UsuarioCI=p_UsuarioCI and 
    `AdministrativoExiste`=0 ) THEN
        
        UPDATE Administrativos
        SET AdministrativoContra = p_AdministrativoContra,
            AdministrativoContacto = p_AdministrativoContacto,
            AdministrativoExiste = 1
        WHERE UsuarioCI = p_UsuarioCI;
        
          UPDATE supervisa
        SET AdministrativoJefe = p_AdministrativoJefe
        WHERE UsuarioCI = p_UsuarioCI;
    else
        
        INSERT INTO Administrativos (UsuarioCI, AdministrativoContra, AdministrativoContacto)
        VALUES (p_UsuarioCI, p_AdministrativoContra, p_AdministrativoContacto);
		
        INSERT INTO Supervisa (UsuarioCI, AdministrativoJefe)
        VALUES (p_UsuarioCI, p_AdministrativoJefe);
    END IF;

 
    



    COMMIT; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarRegistro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarRegistro`(IN ci INT, des varchar(255) )
BEGIN
  INSERT INTO `registro` ( `UsuarioCI`, `RegistroDesc`) 
  VALUES 
  ( ci, des);
  INSERT INTO `realiza` ( `UsuarioCI`, `RegistroID`, `RealizaDia`, `RealizaHora`) VALUES 
  (ci, LAST_INSERT_ID(), curdate(), CURTIME());


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_InsertarAdministrativoSupervisa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_InsertarAdministrativoSupervisa`(
    IN p_UsuarioCI INT,
    IN p_AdministrativoContra VARCHAR(255),
    IN p_AdministrativoContacto VARCHAR(25),
    IN p_AdministrativoJefe INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error en la transacción';
    END;

    START TRANSACTION; 
	IF p_UsuarioCI=(SELECT UsuarioCI FROM administrativos WHERE UsuarioCI=p_UsuarioCI and 
    `AdministrativoExiste`=1 ) THEN
        
	ROLLBACK;
    END IF;
    
    IF p_UsuarioCI=(SELECT UsuarioCI FROM administrativos WHERE UsuarioCI=p_UsuarioCI and 
    `AdministrativoExiste`=0 ) THEN
        
        UPDATE Administrativos
        SET AdministrativoContra = p_AdministrativoContra,
            AdministrativoContacto = p_AdministrativoContacto,
            AdministrativoExiste = 1
        WHERE UsuarioCI = p_UsuarioCI;
        
          UPDATE supervisa
        SET Supervisado= p_AdministrativoJefe
        WHERE UsuarioCI = p_UsuarioCI;
    else
        
        INSERT INTO Administrativos (UsuarioCI, AdministrativoContra, AdministrativoContacto)
        VALUES (p_UsuarioCI, p_AdministrativoContra, p_AdministrativoContacto);
		
        INSERT INTO Supervisa (Supervisado, AdministrativoJefe)
        VALUES (p_UsuarioCI, p_AdministrativoJefe);
    END IF;

 
    



    COMMIT; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertarUsuario`(
IN p_UsuarioCI INT, 
IN p_UsuarioNombre VARCHAR(25), 
IN p_UsuarioApellido VARCHAR(25), 
IN p_UsuarioTipo VARCHAR(25)
)
BEGIN
    IF p_UsuarioCI=(SELECT UsuarioCI FROM usuarios WHERE UsuarioCI=p_UsuarioCI and 
    `UsuarioExiste`=0 ) THEN
        
        UPDATE Usuarios
        SET UsuarioNombre = p_UsuarioNombre,
            UsuarioApellido = p_UsuarioApellido,
            UsuarioTipo = p_UsuarioTipo,
            UsuarioExiste = 1
        WHERE UsuarioCI = p_UsuarioCI;
    else
        INSERT INTO Usuarios (UsuarioCI, UsuarioNombre, UsuarioApellido, UsuarioTipo)
        VALUES (p_UsuarioCI, p_UsuarioNombre, p_UsuarioApellido, p_UsuarioTipo);
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarAdministrativo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarAdministrativo`(IN id INT)
BEGIN
    SELECT a.UsuarioCI
    FROM Administrativos a
    JOIN Usuarios u ON a.UsuarioCI = u.UsuarioCI AND u.UsuarioExiste = 1
    WHERE a.UsuarioCI = id
    AND a.AdministrativoExiste = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarUsuario`(IN ci INT)
BEGIN
    SELECT UsuarioCI
    FROM Usuarios
    WHERE UsuarioCI = ci
    AND UsuarioExiste = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistausuarios` AS select `usuarios`.`UsuarioCI` AS `UsuarioCI`,`usuarios`.`UsuarioNombre` AS `UsuarioNombre`,`usuarios`.`UsuarioApellido` AS `UsuarioApellido`,`usuarios`.`UsuarioTipo` AS `UsuarioTipo`,`usuarios`.`UsuarioExiste` AS `UsuarioExiste` from (`usuarios` left join `administrativos` on((`usuarios`.`UsuarioCI` = `administrativos`.`UsuarioCI`))) where ((`administrativos`.`AdministrativoExiste` = false) or (`administrativos`.`UsuarioCI` is null)) */;
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

-- Dump completed on 2023-11-10  9:09:27
