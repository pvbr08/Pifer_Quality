CREATE DATABASE  IF NOT EXISTS `pifer_quality` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pifer_quality`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pifer_quality
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTA` int(1) NOT NULL,
  `DESCRICAO` varchar(255) NOT NULL,
  `OBS` longtext,
  `ATIVO` tinyint(1) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DESCRICAO` (`DESCRICAO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
INSERT INTO `avaliacao` VALUES (1,0,'Não se aplica',NULL,1,'2017-08-10 10:31:51'),(2,1,'Péssimo',NULL,1,'2017-08-10 10:31:52'),(3,2,'Ruim',NULL,1,'2017-08-10 10:31:52'),(4,3,'Regular',NULL,1,'2017-08-10 10:31:52'),(5,4,'Bom',NULL,1,'2017-08-10 10:31:52'),(6,5,'Ótimo',NULL,1,'2017-08-10 10:31:52'),(7,6,'Perfeito',NULL,1,'2017-08-10 10:31:52');
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_AVALIACAO BEFORE INSERT ON AVALIACAO FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `avaliacao_pergunta`
--

DROP TABLE IF EXISTS `avaliacao_pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_pergunta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_PERGUNTA` int(11) NOT NULL,
  `FK_AVALIACAO` int(11) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PERGUNTA` (`FK_PERGUNTA`),
  CONSTRAINT `avaliacao_pergunta_ibfk_1` FOREIGN KEY (`FK_PERGUNTA`) REFERENCES `pergunta` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_pergunta`
--

LOCK TABLES `avaliacao_pergunta` WRITE;
/*!40000 ALTER TABLE `avaliacao_pergunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_pergunta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_AVALIACA_PERGUNTA BEFORE INSERT ON AVALIACAO_PERGUNTA FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pergunta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_PERMISSAO` int(11) NOT NULL,
  `DESCRICAO` varchar(255) NOT NULL,
  `OBS` longtext,
  `ATIVO` tinyint(1) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DESCRICAO` (`DESCRICAO`),
  KEY `FK_PERMISSAO` (`FK_PERMISSAO`),
  CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`FK_PERMISSAO`) REFERENCES `permissao` (`ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_PERGUNTA BEFORE INSERT ON PERGUNTA FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(255) NOT NULL,
  `ATIVO` tinyint(1) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DESCRICAO` (`DESCRICAO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,'Administrador',1,'2017-08-10 10:27:28'),(2,'Cliente',1,'2017-08-10 10:27:28'),(3,'Fornecedor',1,'2017-08-10 10:27:28'),(4,'Funcionário',1,'2017-08-10 10:27:28'),(5,'Público',1,'2017-08-10 10:27:28');
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_PERMISSAO BEFORE INSERT ON PERMISSAO FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `CNPJ_CPF` varchar(20) NOT NULL,
  `ATIVO` tinyint(1) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOME` (`NOME`),
  UNIQUE KEY `CNPJ_CPF` (`CNPJ_CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Administrador','04.658.766/0001-19',1,'2017-08-10 10:21:13');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_PESSOAS BEFORE INSERT ON PESSOAS FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_PESSOAS` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASS` varchar(50) NOT NULL,
  `ATIVO` tinyint(1) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  `DT_LAST_ACCESS` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LOGIN` (`LOGIN`),
  KEY `FK_PESSOAS` (`FK_PESSOAS`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`FK_PESSOAS`) REFERENCES `pessoas` (`ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'root','e10adc3949ba59abbe56e057f20f883e',1,'2017-08-10 10:24:38','2017-08-10 10:24:38');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER TRG_DT_CADASTRO_USUARIOS BEFORE INSERT ON USUARIOS FOR EACH ROW SET NEW.DT_CADASTRO = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'pifer_quality'
--

--
-- Dumping routines for database 'pifer_quality'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-10 10:33:12
