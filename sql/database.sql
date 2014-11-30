CREATE DATABASE  IF NOT EXISTS `cieloytierra` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cieloytierra`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cieloytierra
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `aeropuertos`
--

DROP TABLE IF EXISTS `aeropuertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aeropuertos` (
  `idAeropuerto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_aeropuerto` varchar(5) NOT NULL,
  `cod_ciudad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idAeropuerto`),
  KEY `cod_ciudad_idx` (`cod_ciudad`),
  CONSTRAINT `cod_ciudad` FOREIGN KEY (`cod_ciudad`) REFERENCES `ciudades` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aeropuertos`
--

LOCK TABLES `aeropuertos` WRITE;
/*!40000 ALTER TABLE `aeropuertos` DISABLE KEYS */;
INSERT INTO `aeropuertos` VALUES (1,'SAVR',1,'Aeropuerto Alto R&iacute;o Senguer'),(2,'SAZA',2,'Aeropuerto de Azul'),(3,'SAZB',3,'Aeropuerto Comandante Espora'),(4,'SAZS',4,'Aeropuerto Internacional Teniente Luis Candelaria'),(5,'SAZI',5,'Aeropuerto de Bol&iacute;var'),(6,'SABE',6,'Aeroparque Jorge Newbery'),(7,'SADO',7,'Aer&oacute;dromo de Campo de Mayo'),(8,'SAHE',8,'Aeropuerto de Caviahue'),(9,'SANW',9,'Aeropuerto Ceres'),(10,'SACT',10,'Aeropuerto Gobernador Gordillo'),(11,'SACP',11,'Aeropuerto Chepes'),(12,'SANO',12,'Aeropuerto Chilecito'),(13,'SATC',13,'Aeropuerto Clorinda'),(14,'SAVC',14,'Aeropuerto Internacional General Enrique Mosconi'),(15,'SACO',15,'Aeropuerto Internacional Ingeniero Ambrosio Taravella'),(16,'SAAC',16,'Aeropuerto Comodoro Pierrestegui'),(17,'SAZC',17,'Aeropuerto Brigadier Hector Eduardo Ruiz'),(18,'SARC',18,'Aeropuerto Internacional Doctor Fernando Piragine Niveyro'),(19,'SATU',19,'Aeropuerto de Curuz&uacute; Cuati&aacute;'),(20,'SAZW',20,'Aeropuerto de Cutral-Co'),(21,'SAZD',21,'Aer&oacute;dromo de Dolores'),(22,'SADD',22,'Aer&oacute;dromo de Don Torcuato (Cerrado)'),(23,'SAVB',23,'Aeropuerto de El Bolson'),(24,'SAWC',24,'Aeropuerto Comandante Armando Tola'),(25,'SAWA',25,'Aeropuerto de Lago Argentino (Cerrado)'),(26,'SADP',26,'Aeropuerto El Palomar'),(27,'SAVE',27,'Aeropuerto Brigadier General Antonio Parodi'),(28,'SAEZ',28,'Aeropuerto Internacional Ministro Pistarini'),(29,'SARF',29,'Aeropuerto Internacional de Formosa'),(30,'SAMA',30,'Aeropuerto de General Alvear'),(31,'SAZG',31,'Aeropuerto de General Pico'),(32,'SAHR',32,'Aeropuerto de General Roca'),(33,'SAVJ',33,'Aeropuerto de Ingeniero Jacobacci'),(34,'SAAK',34,'Aeropuerto Isla Mart&iacute;n Garc&iacute;a'),(35,'SADJ',35,'Aeropuerto Mariano Moreno'),(36,'SAAJ',36,'Aeropuerto de Jun&iacute;n'),(37,'SAOL',37,'Aer&oacute;dromo de Laboulaye'),(38,'SACC',38,'Aeropuerto La Cumbre'),(39,'SADL',39,'Aeropuerto de La Plata'),(40,'SANL',40,'Aeropuerto Capit&aacute;n Vicente Almandos Amonacide'),(41,'SAVH',41,'Aeropuerto Las Heras'),(42,'SATK',42,'Aer&oacute;dromo Alferez Armando Rodr&iacute;guez'),(43,'SAMM',43,'Aeropuerto Internacional Comodoro Ricardo Salom&oacute;n'),(44,'SAZM',44,'Aeropuerto Internacional Astor Piazolla'),(45,'SAME',45,'Aeropuerto Internacional El Plumerillo'),(46,'SAOS',46,'Aeropuerto Internacional Valle del Conlara'),(47,'SAEM',47,'Aer&oacute;dromo Juan Domingo Per&oacute;n'),(48,'SARM',48,'Aeropuerto de Monte Caseros'),(49,'SADM',49,'Aeropuerto de Mor&oacute;n'),(50,'SAZO',50,'Aeropuerto Edgardo Hugo Yelpo'),(51,'SAZN',51,'Aeropuerto Internacional Presidente Per&oacute;n'),(52,'SAZF',52,'Aeropuerto de Olavarr&iacute;a'),(53,'SAAP',53,'Aeropuerto General Justo Jos&eacute; de Urquiza'),(54,'SARL',54,'Aeropuerto Internacional de Paso de los Libres'),(55,'SAZP',55,'Aeropuerto Comodoro P. Zanni'),(56,'SASJ',56,'Aeropuerto Internacional Gobernador Horacio Guzm&aacute;n'),(57,'SAWP',57,'Aeropuerto Perito Moreno'),(58,'SARP',58,'Aeropuerto Internacional Libertador General Jos&eacute; de San Mart&iacute;n'),(59,'SAWD',59,'Aeropuerto Puerto Deseado'),(60,'SARI',60,'Aeropuerto Internacional de Puerto Iguaz&uacute;'),(61,'SAVY',61,'Aeropuerto El Tehuelche'),(62,'SAWJ',62,'Aeropuerto Capit&aacute;n Jos&eacute; Daniel V&aacute;zquez'),(63,'SAWU',63,'Aeropuerto de Puerto Santa Cruz'),(64,'SASA',64,'Aeropuerto de Presidencia Roque S&aacute;enz Pe&ntilde;a'),(65,'SATR',65,'Aeropuerto Daniel Jurkic'),(66,'SARE',66,'Aeropuerto Internacional de Resistencia'),(67,'SAOC',67,'Aeropuerto de R&iacute;o Cuarto'),(68,'SAWG',68,'Aeropuerto Internacional Piloto Civil Norberto Fern&aacute;ndez'),(69,'SAWE',69,'Aeropuerto Internacional Gob. Ram&oacute;n Trejo Noel'),(70,'SAWT',70,'Aeropuerto R&iacute;o Turbio'),(71,'SAAR',71,'Aeropuerto Internacional Rosario Islas Malvinas'),(72,'SASA',72,'Aeropuerto Internacional Mart&iacute;n Miguel de G&uuml;emes'),(73,'SADF',73,'Aeropuerto Internacional de San Fernando'),(74,'SANC',74,'Aeropuerto Coronel Felipe Varela'),(75,'SANU',75,'Aeropuerto Domingo Faustino Sarmiento'),(76,'SAOU',76,'Aeropuerto Brigadier Mayor Cesar Ra&uacute;l Ojeda'),(77,'SAMR',77,'Aeropuerto Internacional Suboficial Ayudante Santiago Germano'),(78,'SASO',78,'Aero Club Or&aacute;n'),(79,'SADS',79,'Aeropuerto de San Justo'),(80,'SANT',80,'Aeropuerto Internacional Teniente General Benjam&iacute;n Matienzo'),(81,'SAZR',81,'Aeropuerto de Santa Rosa'),(82,'SAZL',82,'Aeropuerto de Santa Teresita'),(83,'SANE',83,'Aeropuerto Vicecomodoro &aacute;ngel de la Paz Aragon&eacute;s'),(84,'SAZY',84,'Aeropuerto Aviador Carlos Campos'),(85,'SAAV',85,'Aeropuerto de Sauce Viejo'),(86,'SAFS',86,'Aeropuerto de Sunchales'),(87,'SAZT',87,'Aeropuerto de Tandil'),(88,'SAST',88,'Aeropuerto de Tartagal'),(89,'SANR',89,'Aeropuerto Internacional Termas de R&iacute;o Hondo'),(90,'SAVT',90,'Aeropuerto Almirante Marco Andr&eacute;s Zar'),(91,'SAZH',91,'Aeropuerto Municipal Primer Teniente H&eacute;ctor Ricardo Volponi'),(92,'SAWH',92,'Aeropuerto de Ushuaia'),(93,'SAVV',93,'Aeropuerto Gobernador Edgardo Castello'),(94,'SAOD',94,'Aeropuerto de Villa Dolores'),(95,'SAZV',95,'Aeropuerto de Villa Gesell'),(96,'SAOR',96,'Aeropuerto de Villa Reynolds'),(97,'SAAU',97,'Aeropuerto de Villaguay'),(98,'SAHZ',98,'Aeropuerto de Zapala');
/*!40000 ALTER TABLE `aeropuertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asientos`
--

DROP TABLE IF EXISTS `asientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asientos` (
  `idAsiento` int(11) NOT NULL AUTO_INCREMENT,
  `columna` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `cod_reserva` int(11) NOT NULL,
  PRIMARY KEY (`idAsiento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos`
--

LOCK TABLES `asientos` WRITE;
/*!40000 ALTER TABLE `asientos` DISABLE KEYS */;
INSERT INTO `asientos` VALUES (1,1,2,2),(2,1,10,2),(3,1,10,2),(4,1,3,2);
/*!40000 ALTER TABLE `asientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aviones`
--

DROP TABLE IF EXISTS `aviones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aviones` (
  `idAvion` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `total_pasajes` int(11) DEFAULT NULL,
  `economy` int(11) DEFAULT NULL,
  `filas_economy` int(11) DEFAULT NULL,
  `columnas_economy` int(11) DEFAULT NULL,
  `primera` int(11) DEFAULT NULL,
  `filas_primera` int(11) DEFAULT NULL,
  `columnas_primera` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAvion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aviones`
--

LOCK TABLES `aviones` WRITE;
/*!40000 ALTER TABLE `aviones` DISABLE KEYS */;
INSERT INTO `aviones` VALUES (1,'Embraer','EMB-120',30,30,10,3,0,0,0),(2,'Embraer','ER-145',80,70,14,5,10,5,2),(3,'Embraer','ER-145',125,105,21,5,20,10,2),(4,'Embraer','ER-170',150,120,30,4,30,10,3);
/*!40000 ALTER TABLE `aviones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'primera'),(2,'economy');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(75) NOT NULL,
  `cod_provincia` int(11) NOT NULL,
  PRIMARY KEY (`idCiudad`),
  KEY `cod_provincia_idx` (`cod_provincia`),
  CONSTRAINT `cod_provincia` FOREIGN KEY (`cod_provincia`) REFERENCES `provincias` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Alto R&iacute;o Senguer',1),(2,'Azul',2),(3,'Bah&iacute;a Blanca',2),(4,'Bariloche',3),(5,'Bol&iacute;var',2),(6,'Buenos Aires',4),(7,'Campo de Mayo',2),(8,'Caviahue',5),(9,'Ceres',6),(10,'Chamical',7),(11,'Chepes',7),(12,'Chilecito',7),(13,'Clorinda',8),(14,'Comodoro Rivadavia',1),(15,'C&oacute;rdoba',9),(16,'Concordia',10),(17,'Coronel Su&aacute;rez',2),(18,'Corrientes',11),(19,'Curuz&uacute; Cuati&aacute;',11),(20,'Cutral-Co',5),(21,'Dolores',2),(22,'Don Torcuato',2),(23,'El Bols&oacute;n',3),(24,'El Calafate',12),(25,'El Calafate',12),(26,'El Palomar',2),(27,'Esquel',1),(28,'Ezeiza',2),(29,'Formosa',8),(30,'General Alvear',13),(31,'General Pico',14),(32,'General Roca',3),(33,'Ingeniero Jacobacci',3),(34,'Isla Mart&iacute;n Garc&iacute;a',2),(35,'Jos&eacute; C. Paz',2),(36,'Jun&iacute;n',2),(37,'Laboulaye',9),(38,'La Cumbre',9),(39,'La Plata',2),(40,'La Rioja',7),(41,'Las Heras',12),(42,'Las Lomitas',8),(43,'Malarg&uuml;e',13),(44,'Mar del Plata',2),(45,'Mendoza',13),(46,'Merlo',15),(47,'Miramar',2),(48,'Monte Caseros',11),(49,'Mor&oacute;n',2),(50,'Necochea',2),(51,'Neuqu&eacute;n',5),(52,'Olavarr&iacute;a',2),(53,'Paran&aacute;',10),(54,'Paso de los Libres',11),(55,'Pehuaj&oacute;',2),(56,'Perico',16),(57,'Perito Moreno',12),(58,'Posadas',17),(59,'Puerto Deseado',12),(60,'Puerto Iguaz&uacute;',17),(61,'Puerto Madryn',1),(62,'Puerto San Juli&aacute;n',12),(63,'Puerto Santa Cruz',12),(64,'Presidencia Roque Saenz Pe&ntilde;a',18),(65,'Reconquista',6),(66,'Resistencia',18),(67,'R&iacute;o Cuarto',9),(68,'R&iacute;o Gallegos',12),(69,'R&iacute;o Grande',19),(70,'R&iacute;o Turbio',12),(71,'Rosario',6),(72,'Salta',20),(73,'San Fernando',2),(74,'San Fernando del Valle de Catamarca',21),(75,'San Juan',22),(76,'San Luis',15),(77,'San Rafael',13),(78,'San Ram&oacute;n de la Nueva Or&aacute;n',20),(79,'San Justo',2),(80,'San Miguel de Tucum&aacute;n',23),(81,'Santa Rosa',14),(82,'Santa Teresita',2),(83,'Santiago del Estero',24),(84,'San Mart&iacute;n de los Andes',5),(85,'Sauce Viejo',6),(86,'Sunchales',6),(87,'Tandil',2),(88,'Tartagal',20),(89,'Termas de R&iacute;o Hondo',24),(90,'Trelew',1),(91,'Tres Arroyos',2),(92,'Ushuaia',19),(93,'Viedma',3),(94,'Villa Dolores',9),(95,'Villa Gesell',2),(96,'Villa Reynolds',15),(97,'Villaguay',10),(98,'Zapala',5);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_reservas`
--

DROP TABLE IF EXISTS `estados_reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_reservas` (
  `idEstadoReserva` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_reservas`
--

LOCK TABLES `estados_reservas` WRITE;
/*!40000 ALTER TABLE `estados_reservas` DISABLE KEYS */;
INSERT INTO `estados_reservas` VALUES (1,'Pendiente de Pago'),(2,'Pendiente de Check In'),(3,'Anulada'),(4,'En Lista de Espera'),(5,'Completada');
/*!40000 ALTER TABLE `estados_reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programacionvuelos`
--

DROP TABLE IF EXISTS `programacionvuelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programacionvuelos` (
  `idProgramacionVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_aeropuerto_origen` int(11) NOT NULL,
  `cod_aeropuerto_destino` int(11) NOT NULL,
  `cod_avion` int(11) NOT NULL,
  `precio_primera` decimal(11,2) DEFAULT NULL,
  `precio_economy` decimal(11,2) DEFAULT NULL,
  `vuelo_lunes` bit(1) DEFAULT NULL,
  `vuelo_martes` bit(1) DEFAULT NULL,
  `vuelo_miercoles` bit(1) DEFAULT NULL,
  `vuelo_jueves` bit(1) DEFAULT NULL,
  `vuelo_viernes` bit(1) DEFAULT NULL,
  `vuelo_sabado` bit(1) DEFAULT NULL,
  `vuelo_domingo` bit(1) DEFAULT NULL,
  `hora_partida` time NOT NULL,
  PRIMARY KEY (`idProgramacionVuelo`),
  KEY `cod_aeropuerto_origen_idx` (`cod_aeropuerto_origen`),
  KEY `cod_avion_idx` (`cod_avion`),
  KEY `cod_aeropuerto_destino_idx` (`cod_aeropuerto_destino`),
  CONSTRAINT `cod_aeropuerto_destino` FOREIGN KEY (`cod_aeropuerto_destino`) REFERENCES `aeropuertos` (`idAeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cod_aeropuerto_origen` FOREIGN KEY (`cod_aeropuerto_origen`) REFERENCES `aeropuertos` (`idAeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cod_avion` FOREIGN KEY (`cod_avion`) REFERENCES `aviones` (`idAvion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programacionvuelos`
--

LOCK TABLES `programacionvuelos` WRITE;
/*!40000 ALTER TABLE `programacionvuelos` DISABLE KEYS */;
INSERT INTO `programacionvuelos` VALUES (1,1,84,3,1464.00,1191.00,'','','','\0','\0','\0','\0','00:00:00'),(2,2,20,2,2258.00,1836.00,'\0','','','\0','\0','\0','','00:30:00'),(3,3,95,1,3071.00,2497.00,'\0','','','\0','','','','01:00:00'),(4,4,87,4,2658.00,2161.00,'\0','\0','\0','\0','\0','','\0','01:30:00'),(5,5,4,3,1510.00,1228.00,'\0','\0','\0','','','\0','','02:00:00'),(6,7,55,2,1190.00,968.00,'\0','\0','\0','\0','','','\0','07:00:00'),(7,8,50,3,1575.00,1281.00,'\0','','\0','\0','','\0','\0','07:30:00'),(8,9,51,2,2564.00,2085.00,'','','\0','','\0','\0','\0','08:00:00'),(9,10,44,3,2036.00,1656.00,'\0','','','','\0','\0','','08:30:00'),(10,11,82,2,2437.00,1982.00,'\0','','','\0','\0','','\0','09:00:00'),(11,12,5,1,1136.00,924.00,'\0','','','\0','\0','\0','\0','09:30:00'),(12,13,91,4,2592.00,2108.00,'','\0','\0','\0','','\0','','10:00:00'),(13,14,31,2,1125.00,915.00,'','','','\0','\0','','','10:30:00'),(14,15,52,2,1453.00,1182.00,'','','','','','\0','','11:00:00'),(15,16,21,2,1952.00,1587.00,'','\0','','','','','\0','11:30:00'),(16,17,17,2,1923.00,1564.00,'\0','','','','','\0','','12:00:00'),(17,18,3,3,3046.00,2477.00,'','','','\0','\0','','','12:30:00'),(18,19,2,4,3063.00,2491.00,'','','','','','\0','\0','13:00:00'),(19,20,63,1,1912.00,1555.00,'','\0','\0','','','','','13:30:00'),(20,21,70,3,3014.00,2451.00,'\0','','','\0','\0','\0','\0','17:00:00'),(21,22,57,3,2167.00,1762.00,'','\0','\0','','','\0','','17:30:00'),(22,23,62,2,2846.00,2314.00,'\0','','','\0','\0','\0','','18:00:00'),(23,24,92,4,2043.00,1661.00,'','\0','\0','','\0','','','18:30:00'),(24,25,68,3,1619.00,1317.00,'','\0','\0','\0','','','','19:00:00'),(25,26,69,1,2776.00,2257.00,'\0','\0','','','','','\0','19:30:00'),(26,27,59,3,2485.00,2021.00,'','\0','\0','','','\0','\0','20:00:00'),(27,28,24,1,2377.00,1933.00,'\0','','','','\0','','','20:30:00'),(28,29,25,3,1168.00,950.00,'\0','\0','','\0','','','\0','21:00:00'),(29,30,61,1,1495.00,1216.00,'\0','','\0','\0','\0','','\0','22:00:00'),(30,31,93,2,2393.00,1946.00,'','\0','','','\0','','','23:00:00'),(31,32,90,2,2323.00,1889.00,'','','\0','','\0','\0','','23:30:00'),(32,33,1,2,1091.00,887.00,'\0','\0','','\0','','','','23:45:00'),(33,34,33,4,1391.00,1131.00,'','','','\0','\0','','\0','22:15:00'),(34,35,41,1,1122.00,913.00,'','\0','\0','\0','\0','\0','','00:00:00'),(35,36,27,4,2860.00,2326.00,'\0','\0','\0','','\0','','','00:30:00'),(36,37,14,4,1606.00,1306.00,'\0','','','','\0','','\0','01:00:00'),(37,38,23,2,2116.00,1721.00,'\0','\0','\0','','','\0','\0','01:30:00'),(38,39,19,3,2682.00,2181.00,'','\0','\0','\0','\0','','','02:00:00'),(39,40,65,2,2239.00,1821.00,'','','\0','','','\0','','07:00:00'),(40,41,42,2,2405.00,1956.00,'','\0','','','\0','','','07:30:00'),(41,42,13,4,2717.00,2209.00,'','','','\0','','','\0','08:00:00'),(42,43,88,1,2702.00,2197.00,'','\0','','','','','','08:30:00'),(43,44,78,1,1670.00,1358.00,'\0','','\0','\0','\0','\0','\0','09:00:00'),(44,45,56,4,1100.00,895.00,'\0','\0','\0','','','','\0','09:30:00'),(45,46,64,4,1041.00,847.00,'\0','\0','','\0','\0','\0','','10:00:00'),(46,47,72,2,2515.00,2045.00,'','\0','','\0','','\0','','10:30:00'),(47,48,58,3,1364.00,1109.00,'\0','','\0','\0','','','\0','11:00:00'),(48,49,48,2,2168.00,1763.00,'','','\0','','','','','11:30:00'),(49,50,54,1,2047.00,1665.00,'\0','','\0','','','\0','','12:00:00'),(50,51,60,2,2225.00,1809.00,'\0','\0','\0','\0','\0','','\0','12:30:00'),(51,52,29,2,2264.00,1841.00,'\0','\0','\0','\0','','\0','\0','13:00:00'),(52,53,66,3,1327.00,1079.00,'\0','\0','\0','','','\0','','13:30:00'),(53,54,18,4,1362.00,1108.00,'','','','','','\0','','17:00:00'),(54,55,76,2,2597.00,2112.00,'','','\0','\0','\0','\0','','17:30:00'),(55,56,46,2,2966.00,2412.00,'\0','','\0','\0','','\0','\0','18:00:00'),(56,57,96,1,2435.00,1980.00,'\0','\0','','\0','\0','\0','','18:30:00'),(57,58,37,4,1060.00,862.00,'','','','','','','','19:00:00'),(58,59,94,1,1875.00,1525.00,'','\0','\0','\0','\0','\0','','19:30:00'),(59,60,67,3,2741.00,2229.00,'','\0','\0','','','','','20:00:00'),(60,61,9,4,1070.00,870.00,'\0','\0','\0','\0','','\0','\0','20:30:00'),(61,62,75,2,2664.00,2166.00,'\0','\0','\0','','\0','\0','\0','21:00:00'),(62,63,80,3,1442.00,1173.00,'','\0','\0','\0','\0','','\0','22:00:00'),(63,64,89,2,2461.00,2001.00,'','\0','','','','','','23:00:00'),(64,65,12,1,2726.00,2217.00,'\0','','\0','','','','','23:30:00'),(65,66,40,1,2870.00,2334.00,'','\0','\0','\0','','\0','\0','23:45:00'),(66,67,83,1,2477.00,2014.00,'\0','','','\0','\0','','\0','22:15:00'),(67,68,74,1,1798.00,1462.00,'\0','','\0','','','\0','','00:00:00'),(68,69,77,1,2790.00,2269.00,'\0','\0','\0','\0','','','','00:30:00'),(69,70,43,2,2712.00,2205.00,'','\0','','','\0','','\0','01:00:00'),(70,71,45,1,1349.00,1097.00,'\0','\0','','\0','\0','\0','','01:30:00'),(71,72,30,1,1216.00,989.00,'\0','\0','','\0','\0','','','02:00:00'),(72,73,98,3,2899.00,2357.00,'\0','\0','\0','\0','\0','\0','','07:00:00'),(73,74,32,4,2110.00,1716.00,'','\0','\0','','\0','','\0','07:30:00'),(74,75,8,4,1706.00,1387.00,'\0','','','','','\0','','08:00:00'),(75,76,86,2,1269.00,1032.00,'\0','\0','','','','\0','','08:30:00'),(76,77,28,3,1939.00,1577.00,'','','','','','','\0','09:00:00'),(77,78,47,2,1790.00,1456.00,'','\0','\0','\0','','\0','','09:30:00'),(78,79,79,1,1650.00,1342.00,'','\0','','\0','','\0','\0','10:00:00'),(79,80,26,3,2007.00,1632.00,'','','','\0','','\0','\0','10:30:00'),(80,81,7,3,2969.00,2414.00,'\0','\0','\0','','','\0','\0','11:00:00'),(81,82,49,2,2890.00,2350.00,'','','\0','','','\0','','11:30:00'),(82,83,39,3,2263.00,1840.00,'\0','','\0','','\0','\0','','12:00:00'),(83,84,35,3,2576.00,2095.00,'\0','','','\0','\0','\0','','12:30:00'),(84,85,73,1,2168.00,1763.00,'\0','\0','','\0','','\0','\0','13:00:00'),(85,86,22,2,2809.00,2284.00,'\0','','\0','\0','','','\0','13:30:00'),(86,87,10,3,2794.00,2272.00,'','\0','\0','\0','','\0','\0','17:00:00'),(87,88,11,4,2274.00,1849.00,'','\0','\0','\0','\0','\0','','17:30:00'),(88,89,15,2,1908.00,1552.00,'\0','\0','','','','','\0','18:00:00'),(89,90,38,2,3040.00,2472.00,'\0','','\0','','','','\0','18:30:00'),(90,91,6,2,2939.00,2390.00,'','','','','','\0','','19:00:00'),(91,92,85,3,1842.00,1498.00,'\0','\0','','\0','','','\0','19:30:00'),(92,93,97,4,1455.00,1183.00,'','\0','','','\0','','\0','20:00:00'),(93,94,71,2,1626.00,1322.00,'','\0','\0','\0','','','','20:30:00'),(94,95,53,2,1509.00,1227.00,'\0','','\0','','\0','','\0','21:00:00'),(95,96,34,3,1901.00,1546.00,'\0','','\0','','\0','\0','\0','22:00:00'),(96,97,36,2,1020.00,830.00,'\0','','','\0','','','','23:00:00'),(97,98,16,2,2426.00,1973.00,'','','','','\0','','\0','23:30:00'),(98,6,7,2,3046.00,2477.00,'','\0','\0','','','','','23:45:00'),(99,6,8,1,2862.00,2327.00,'\0','','\0','','\0','','','22:15:00'),(100,6,9,1,1317.00,1071.00,'\0','\0','\0','\0','','','','00:00:00'),(101,6,10,4,2843.00,2312.00,'\0','','','','\0','\0','','00:30:00'),(102,6,11,3,1205.00,980.00,'\0','','\0','','\0','','\0','01:00:00'),(103,6,12,4,2629.00,2138.00,'\0','','','','','\0','\0','01:30:00'),(104,6,13,1,2394.00,1947.00,'','\0','','','\0','\0','','02:00:00'),(105,6,14,1,1178.00,958.00,'\0','','','\0','','','','07:00:00'),(106,6,15,1,2562.00,2083.00,'','\0','','','','','','07:30:00'),(107,6,16,3,2574.00,2093.00,'','','','','\0','\0','','08:00:00'),(108,6,17,3,1306.00,1062.00,'','\0','\0','\0','\0','','\0','08:30:00'),(109,6,18,3,1692.00,1376.00,'','','\0','\0','\0','','','09:00:00'),(110,6,19,1,1757.00,1429.00,'','\0','\0','\0','\0','','','09:30:00'),(111,6,20,4,1425.00,1159.00,'\0','','\0','','\0','\0','','10:00:00'),(112,6,21,1,2141.00,1741.00,'\0','\0','','','\0','','','10:30:00'),(113,6,22,3,2945.00,2395.00,'\0','','','\0','\0','\0','','11:00:00'),(114,6,23,3,1425.00,1159.00,'','\0','\0','\0','','\0','\0','11:30:00'),(115,6,24,1,1640.00,1334.00,'','\0','','\0','','\0','\0','12:00:00'),(116,6,25,3,2204.00,1792.00,'\0','','','','','\0','','12:30:00'),(117,6,26,3,1517.00,1234.00,'','\0','','\0','\0','','\0','13:00:00'),(118,6,27,3,2403.00,1954.00,'','','','','\0','\0','','13:30:00'),(119,6,28,1,1521.00,1237.00,'','','','','','\0','','17:00:00'),(120,6,29,2,1430.00,1163.00,'','\0','\0','','','','','17:30:00'),(121,6,30,3,2033.00,1653.00,'','\0','','\0','\0','\0','','18:00:00'),(122,6,31,2,2161.00,1757.00,'\0','\0','\0','','','\0','','18:30:00'),(123,6,32,2,2854.00,2321.00,'\0','','\0','','','\0','\0','19:00:00'),(124,6,33,1,1521.00,1237.00,'','\0','\0','\0','','','','19:30:00'),(125,6,34,3,2270.00,1846.00,'\0','','','\0','','\0','\0','20:00:00'),(126,6,35,4,2691.00,2188.00,'','\0','','\0','','','\0','20:30:00'),(127,6,36,2,1988.00,1617.00,'','','\0','','\0','','','21:00:00'),(128,6,37,4,1359.00,1105.00,'','','','','','\0','\0','22:00:00'),(129,6,38,3,1980.00,1610.00,'\0','','','\0','\0','\0','\0','23:00:00'),(130,6,39,4,2301.00,1871.00,'','','','','\0','','','23:30:00'),(131,6,40,1,1683.00,1369.00,'','\0','\0','','','\0','\0','23:45:00'),(132,6,41,2,2453.00,1995.00,'\0','','\0','\0','\0','','','22:15:00'),(133,6,42,1,2630.00,2139.00,'\0','','\0','','','','','00:00:00'),(134,6,43,3,2750.00,2236.00,'\0','\0','\0','\0','','','\0','00:30:00'),(135,6,44,4,1568.00,1275.00,'\0','','\0','','','\0','\0','01:00:00'),(136,6,45,3,1863.00,1515.00,'\0','','','\0','\0','','\0','01:30:00'),(137,6,46,4,3059.00,2487.00,'\0','','\0','\0','\0','','\0','02:00:00'),(138,6,47,4,2660.00,2163.00,'','\0','','','','','','07:00:00'),(139,6,48,1,2969.00,2414.00,'','\0','','','\0','','','07:30:00'),(140,6,49,4,2950.00,2399.00,'','','\0','\0','\0','','','08:00:00'),(141,6,50,2,2343.00,1905.00,'\0','','','','\0','','','08:30:00'),(142,6,51,1,3022.00,2457.00,'','','','\0','','\0','\0','09:00:00'),(143,6,52,2,1680.00,1366.00,'','\0','\0','\0','','\0','','09:30:00'),(144,6,53,3,3043.00,2474.00,'\0','\0','','\0','\0','\0','','10:00:00'),(145,6,54,2,1477.00,1201.00,'\0','\0','','\0','','\0','','10:30:00'),(146,6,55,3,2702.00,2197.00,'\0','\0','','','','','','11:00:00'),(147,6,56,1,1510.00,1228.00,'\0','','\0','','','\0','\0','11:30:00'),(148,6,57,3,2209.00,1796.00,'','','','\0','\0','\0','\0','12:00:00'),(149,6,58,1,3036.00,2469.00,'','\0','','','\0','\0','\0','12:30:00'),(150,6,59,1,2003.00,1629.00,'','','','\0','','','','13:00:00'),(151,6,60,2,2282.00,1856.00,'\0','\0','\0','','\0','\0','\0','13:30:00'),(152,6,61,1,1170.00,952.00,'','\0','\0','','\0','\0','\0','17:00:00'),(153,6,62,4,1025.00,834.00,'\0','','','\0','\0','\0','\0','17:30:00'),(154,6,63,3,2917.00,2372.00,'\0','','\0','\0','\0','\0','','18:00:00'),(155,6,64,1,1536.00,1249.00,'','\0','','','\0','\0','\0','18:30:00'),(156,6,65,2,2399.00,1951.00,'','','','','\0','\0','\0','19:00:00'),(157,6,66,3,2173.00,1767.00,'','\0','\0','\0','','','','19:30:00'),(158,6,67,2,1129.00,918.00,'','','','\0','','','','20:00:00'),(159,6,68,4,2477.00,2014.00,'\0','','','\0','','','','20:30:00'),(160,6,69,3,1767.00,1437.00,'','\0','','','\0','','\0','21:00:00'),(161,6,70,4,1783.00,1450.00,'','','\0','\0','\0','','','22:00:00'),(162,6,71,2,1147.00,933.00,'\0','\0','','\0','','','\0','23:00:00'),(163,6,72,1,1402.00,1140.00,'','','','','\0','\0','\0','23:30:00'),(164,6,73,4,2784.00,2264.00,'','\0','','\0','','\0','','23:45:00'),(165,6,74,1,2956.00,2404.00,'\0','','','','\0','\0','','22:15:00'),(166,6,75,1,1434.00,1166.00,'\0','\0','','','\0','\0','','00:00:00'),(167,6,76,2,1868.00,1519.00,'','','\0','','','','\0','00:30:00'),(168,6,77,3,2194.00,1784.00,'','','\0','\0','\0','','\0','01:00:00'),(169,6,78,1,3007.00,2445.00,'\0','','\0','','\0','','','01:30:00'),(170,6,79,4,2132.00,1734.00,'','\0','','','\0','\0','\0','02:00:00'),(171,6,80,3,2404.00,1955.00,'','','','\0','','','\0','07:00:00'),(172,6,81,2,2654.00,2158.00,'','\0','','\0','\0','','\0','07:30:00'),(173,6,82,2,2750.00,2236.00,'\0','','\0','\0','\0','\0','\0','08:00:00'),(174,6,83,3,2418.00,1966.00,'','','','\0','','','\0','08:30:00'),(175,6,84,3,2608.00,2121.00,'','','\0','\0','','\0','\0','09:00:00'),(176,6,85,3,1975.00,1606.00,'\0','','\0','','\0','','','09:30:00'),(177,6,86,3,2103.00,1710.00,'\0','','\0','\0','\0','\0','','10:00:00'),(178,6,87,2,1580.00,1285.00,'','','\0','\0','','\0','\0','10:30:00'),(179,6,88,2,1565.00,1273.00,'','\0','\0','','','','\0','11:00:00'),(180,6,89,2,2838.00,2308.00,'\0','','\0','','\0','','\0','11:30:00'),(181,6,90,1,2378.00,1934.00,'\0','','','\0','\0','\0','','12:00:00'),(182,6,91,2,1934.00,1573.00,'\0','\0','\0','\0','','','\0','12:30:00'),(183,6,92,4,1017.00,827.00,'','\0','','','','','','13:00:00'),(184,6,93,3,1293.00,1052.00,'','\0','','','\0','','','13:30:00'),(185,6,94,3,1266.00,1030.00,'\0','\0','','','','','\0','17:00:00'),(186,6,95,2,1694.00,1378.00,'\0','\0','','','','\0','\0','17:30:00'),(187,6,96,4,1581.00,1286.00,'','\0','\0','\0','','\0','','18:00:00'),(188,6,97,2,2778.00,2259.00,'\0','','','','','\0','','18:30:00'),(189,6,98,1,1761.00,1432.00,'\0','','\0','\0','\0','','','19:00:00'),(190,15,28,2,1956.00,1591.00,'','','\0','\0','','\0','\0','19:30:00'),(191,15,29,3,1087.00,884.00,'\0','','','','\0','\0','\0','20:00:00'),(192,15,30,1,2474.00,2012.00,'','\0','','\0','','','\0','20:30:00'),(193,15,31,2,2991.00,2432.00,'\0','','','\0','\0','','','21:00:00'),(194,15,32,2,1004.00,817.00,'\0','','\0','\0','','','','22:00:00'),(195,15,33,4,2656.00,2160.00,'\0','\0','','','','\0','\0','23:00:00'),(196,15,34,4,1211.00,985.00,'\0','','','','\0','\0','','23:30:00'),(197,15,35,3,1448.00,1178.00,'\0','','','','','\0','\0','23:45:00'),(198,15,36,1,2555.00,2078.00,'','','','','\0','','','22:15:00'),(199,15,37,2,1418.00,1153.00,'\0','','\0','','','','\0','00:00:00'),(200,15,38,3,1949.00,1585.00,'\0','\0','\0','\0','\0','\0','\0','00:30:00'),(201,15,39,2,2617.00,2128.00,'','\0','\0','\0','','','','01:00:00'),(202,15,40,4,2126.00,1729.00,'','','\0','','','\0','','01:30:00'),(203,15,41,2,1478.00,1202.00,'\0','\0','','','','\0','','02:00:00'),(204,15,42,4,2950.00,2399.00,'','\0','','','\0','','\0','07:00:00'),(205,15,43,1,2800.00,2277.00,'\0','\0','\0','','','\0','','07:30:00'),(206,15,44,3,1646.00,1339.00,'\0','','\0','','','','','08:00:00'),(207,15,45,2,2907.00,2364.00,'','\0','','','\0','','','08:30:00'),(208,15,46,1,1605.00,1305.00,'\0','','\0','','','\0','','09:00:00'),(209,15,47,2,2883.00,2344.00,'','\0','','','','','','09:30:00'),(210,15,48,3,1004.00,817.00,'','\0','\0','','','','\0','10:00:00'),(211,15,49,1,2125.00,1728.00,'\0','','\0','','','\0','','10:30:00'),(212,15,50,4,2238.00,1820.00,'\0','','\0','','','\0','\0','11:00:00'),(213,15,51,1,2674.00,2174.00,'','\0','\0','\0','','\0','','11:30:00'),(214,15,52,4,1031.00,839.00,'\0','\0','\0','\0','\0','','','12:00:00'),(215,15,53,3,1140.00,927.00,'\0','\0','\0','\0','','\0','','12:30:00'),(216,15,54,2,1049.00,853.00,'','','\0','\0','','','\0','13:00:00'),(217,15,55,1,2692.00,2189.00,'\0','\0','','\0','\0','','','13:30:00'),(218,15,56,4,1389.00,1130.00,'','','','\0','','','\0','17:00:00'),(219,15,57,1,1277.00,1039.00,'\0','','\0','','\0','\0','','17:30:00'),(220,15,58,3,2506.00,2038.00,'\0','','','','\0','\0','','18:00:00'),(221,15,59,1,2655.00,2159.00,'','','\0','\0','','','\0','18:30:00'),(222,15,60,4,2771.00,2253.00,'\0','','\0','\0','','','\0','19:00:00'),(223,15,61,4,2920.00,2374.00,'','','','','','\0','','19:30:00'),(224,15,62,3,3046.00,2477.00,'','\0','','','\0','','','20:00:00'),(225,15,63,2,1254.00,1020.00,'','','','','\0','','','20:30:00'),(226,15,64,1,1285.00,1045.00,'\0','','\0','','\0','\0','\0','21:00:00'),(227,15,65,3,1825.00,1484.00,'','','\0','\0','\0','\0','\0','22:00:00'),(228,15,66,3,2270.00,1846.00,'','\0','\0','','\0','\0','\0','23:00:00'),(229,15,67,2,2526.00,2054.00,'\0','','\0','','\0','','','23:30:00'),(230,15,68,3,2942.00,2392.00,'','','','\0','\0','','','23:45:00'),(231,15,69,4,2075.00,1687.00,'\0','','\0','\0','','','\0','22:15:00'),(232,15,70,2,1179.00,959.00,'','','\0','\0','','','','00:00:00'),(233,15,71,4,1410.00,1147.00,'\0','','','\0','\0','','\0','00:30:00'),(234,15,72,3,2831.00,2302.00,'\0','','','','\0','\0','','01:00:00'),(235,15,73,3,2950.00,2399.00,'\0','','\0','','\0','','','01:30:00'),(236,15,74,2,1933.00,1572.00,'','\0','\0','','\0','\0','','02:00:00'),(237,15,75,1,1674.00,1361.00,'\0','','','\0','\0','','','07:00:00'),(238,15,76,2,2437.00,1982.00,'','\0','','\0','\0','','\0','07:30:00'),(239,15,77,3,2945.00,2395.00,'','','','','','\0','','08:00:00'),(240,15,78,3,2931.00,2383.00,'\0','','','','','\0','','08:30:00'),(241,15,79,2,1599.00,1300.00,'','','\0','\0','','\0','','09:00:00'),(242,15,80,2,2990.00,2431.00,'','\0','','\0','','\0','','09:30:00'),(243,15,81,4,2033.00,1653.00,'','\0','\0','','','\0','','10:00:00'),(244,15,82,1,2392.00,1945.00,'','','','\0','','','\0','10:30:00'),(245,15,83,1,2034.00,1654.00,'','','','\0','\0','','','11:00:00'),(246,15,84,2,2186.00,1778.00,'\0','','','\0','\0','','\0','11:30:00'),(247,15,85,1,2762.00,2246.00,'','','\0','','','\0','\0','12:00:00'),(248,15,86,1,2441.00,1985.00,'','\0','\0','\0','\0','\0','\0','12:30:00'),(249,15,87,4,3029.00,2463.00,'\0','\0','','\0','','\0','\0','13:00:00'),(250,15,88,2,1849.00,1504.00,'','','','','','','\0','13:30:00'),(251,15,89,4,1719.00,1398.00,'','','\0','\0','\0','\0','\0','17:00:00'),(252,15,90,4,999.00,813.00,'','','\0','\0','\0','','\0','17:30:00'),(253,15,91,4,2814.00,2288.00,'\0','\0','','\0','','\0','','18:00:00'),(254,15,92,2,2356.00,1916.00,'\0','','\0','','','\0','','18:30:00'),(255,15,93,1,1624.00,1321.00,'\0','\0','','\0','\0','','\0','19:00:00'),(256,15,94,2,1157.00,941.00,'','','\0','\0','','','\0','19:30:00'),(257,15,95,2,2520.00,2049.00,'','','','\0','','\0','\0','20:00:00'),(258,15,96,3,2844.00,2313.00,'\0','','','\0','\0','\0','','20:30:00'),(259,15,97,2,2952.00,2400.00,'\0','','','','\0','','','21:00:00'),(260,15,98,2,1656.00,1347.00,'\0','\0','\0','','','','\0','22:00:00');
/*!40000 ALTER TABLE `programacionvuelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `idProvincia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(55) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Chubut'),(2,'Buenos Aires'),(3,'R&iacute;o Negro'),(4,'CABA'),(5,'Neuqu&eacute;n'),(6,'Santa Fe'),(7,'La Rioja'),(8,'Formosa'),(9,'C&oacute;rdoba'),(10,'Entre R&iacute;os'),(11,'Corrientes'),(12,'Santa Cruz'),(13,'Mendoza'),(14,'La Pampa'),(15,'San Luis'),(16,'Jujuy'),(17,'Misiones'),(18,'Chaco'),(19,'Tierra del Fuego'),(20,'Salta'),(21,'Catamarca'),(22,'San Juan'),(23,'Tucum&aacute;n'),(24,'Santiago del Estero');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_reserva` date NOT NULL,
  `cod_vuelo` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `cod_vuelo_idx` (`cod_vuelo`),
  CONSTRAINT `cod_vuelo` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelos` (`idVuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (2,'brian','lamilla',36921178,'brian.lamilla@gmail.com','1992-05-10','2014-12-13',1,'2','1');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposviajes`
--

DROP TABLE IF EXISTS `tiposviajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposviajes` (
  `idTipoViaje` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoViaje`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposviajes`
--

LOCK TABLES `tiposviajes` WRITE;
/*!40000 ALTER TABLE `tiposviajes` DISABLE KEYS */;
INSERT INTO `tiposviajes` VALUES (1,'Ida'),(2,'Vuelta');
/*!40000 ALTER TABLE `tiposviajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'administrador','12345');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vuelos`
--

DROP TABLE IF EXISTS `vuelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vuelos` (
  `idVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_programacion_vuelo` int(11) NOT NULL,
  `fecha_vuelo` date NOT NULL,
  `tipo_viaje` char(6) NOT NULL,
  PRIMARY KEY (`idVuelo`),
  KEY `cod_programacion_vuelo_idx` (`cod_programacion_vuelo`),
  CONSTRAINT `cod_programacion_vuelo` FOREIGN KEY (`cod_programacion_vuelo`) REFERENCES `programacionvuelos` (`idProgramacionVuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelos`
--

LOCK TABLES `vuelos` WRITE;
/*!40000 ALTER TABLE `vuelos` DISABLE KEYS */;
INSERT INTO `vuelos` VALUES (1,1,'2014-12-20','3');
/*!40000 ALTER TABLE `vuelos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-29 15:25:28
