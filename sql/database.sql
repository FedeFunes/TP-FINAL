CREATE DATABASE  IF NOT EXISTS `cieloytierra` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cieloytierra`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: cieloytierra
-- ------------------------------------------------------
-- Server version	5.6.19-log

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
INSERT INTO `aeropuertos` VALUES (1,'SAVR',1,'Aeropuerto Alto Río Senguer'),(2,'SAZA',2,'Aeropuerto de Azul'),(3,'SAZB',3,'Aeropuerto Comandante Espora'),(4,'SAZS',4,'Aeropuerto Internacional Teniente Luis Candelaria'),(5,'SAZI',5,'Aeropuerto de Bolívar'),(6,'SABE',6,'Aeroparque Jorge Newbery'),(7,'SADO',7,'Aeródromo de Campo de Mayo'),(8,'SAHE',8,'Aeropuerto de Caviahue'),(9,'SANW',9,'Aeropuerto Ceres'),(10,'SACT',10,'Aeropuerto Gobernador Gordillo'),(11,'SACP',11,'Aeropuerto Chepes'),(12,'SANO',12,'Aeropuerto Chilecito'),(13,'SATC',13,'Aeropuerto Clorinda'),(14,'SAVC',14,'Aeropuerto Internacional General Enrique Mosconi'),(15,'SACO',15,'Aeropuerto Internacional Ingeniero Ambrosio Taravella'),(16,'SAAC',16,'Aeropuerto Comodoro Pierrestegui'),(17,'SAZC',17,'Aeropuerto Brigadier Hector Eduardo Ruiz'),(18,'SARC',18,'Aeropuerto Internacional Doctor Fernando Piragine Niveyro'),(19,'SATU',19,'Aeropuerto de Curuzú Cuatiá'),(20,'SAZW',20,'Aeropuerto de Cutral-Co'),(21,'SAZD',21,'Aeródromo de Dolores'),(22,'SADD',22,'Aeródromo de Don Torcuato (Cerrado)'),(23,'SAVB',23,'Aeropuerto de El Bolson'),(24,'SAWC',24,'Aeropuerto Comandante Armando Tola'),(25,'SAWA',25,'Aeropuerto de Lago Argentino (Cerrado)'),(26,'SADP',26,'Aeropuerto El Palomar'),(27,'SAVE',27,'Aeropuerto Brigadier General Antonio Parodi'),(28,'SAEZ',28,'Aeropuerto Internacional Ministro Pistarini'),(29,'SARF',29,'Aeropuerto Internacional de Formosa'),(30,'SAMA',30,'Aeropuerto de General Alvear'),(31,'SAZG',31,'Aeropuerto de General Pico'),(32,'SAHR',32,'Aeropuerto de General Roca'),(33,'SAVJ',33,'Aeropuerto de Ingeniero Jacobacci'),(34,'SAAK',34,'Aeropuerto Isla Martín García'),(35,'SADJ',35,'Aeropuerto Mariano Moreno'),(36,'SAAJ',36,'Aeropuerto de Junín'),(37,'SAOL',37,'Aeródromo de Laboulaye'),(38,'SACC',38,'Aeropuerto La Cumbre'),(39,'SADL',39,'Aeropuerto de La Plata'),(40,'SANL',40,'Aeropuerto Capitán Vicente Almandos Amonacide'),(41,'SAVH',41,'Aeropuerto Las Heras'),(42,'SATK',42,'Aeródromo Alferez Armando Rodríguez'),(43,'SAMM',43,'Aeropuerto Internacional Comodoro Ricardo Salomón'),(44,'SAZM',44,'Aeropuerto Internacional Astor Piazolla'),(45,'SAME',45,'Aeropuerto Internacional El Plumerillo'),(46,'SAOS',46,'Aeropuerto Internacional Valle del Conlara'),(47,'SAEM',47,'Aeródromo Juan Domingo Perón'),(48,'SARM',48,'Aeropuerto de Monte Caseros'),(49,'SADM',49,'Aeropuerto de Morón'),(50,'SAZO',50,'Aeropuerto Edgardo Hugo Yelpo'),(51,'SAZN',51,'Aeropuerto Internacional Presidente Perón'),(52,'SAZF',52,'Aeropuerto de Olavarría'),(53,'SAAP',53,'Aeropuerto General Justo José de Urquiza'),(54,'SARL',54,'Aeropuerto Internacional de Paso de los Libres'),(55,'SAZP',55,'Aeropuerto Comodoro P. Zanni'),(56,'SASJ',56,'Aeropuerto Internacional Gobernador Horacio Guzmán'),(57,'SAWP',57,'Aeropuerto Perito Moreno'),(58,'SARP',58,'Aeropuerto Internacional Libertador General José de San Martín'),(59,'SAWD',59,'Aeropuerto Puerto Deseado'),(60,'SARI',60,'Aeropuerto Internacional de Puerto Iguazú'),(61,'SAVY',61,'Aeropuerto El Tehuelche'),(62,'SAWJ',62,'Aeropuerto Capitán José Daniel Vázquez'),(63,'SAWU',63,'Aeropuerto de Puerto Santa Cruz'),(64,'SASA',64,'Aeropuerto de Presidencia Roque Sáenz Peña'),(65,'SATR',65,'Aeropuerto Daniel Jurkic'),(66,'SARE',66,'Aeropuerto Internacional de Resistencia'),(67,'SAOC',67,'Aeropuerto de Río Cuarto'),(68,'SAWG',68,'Aeropuerto Internacional Piloto Civil Norberto Fernández'),(69,'SAWE',69,'Aeropuerto Internacional Gob. Ramón Trejo Noel'),(70,'SAWT',70,'Aeropuerto Río Turbio'),(71,'SAAR',71,'Aeropuerto Internacional Rosario Islas Malvinas'),(72,'SASA',72,'Aeropuerto Internacional Martín Miguel de Güemes'),(73,'SADF',73,'Aeropuerto Internacional de San Fernando'),(74,'SANC',74,'Aeropuerto Coronel Felipe Varela'),(75,'SANU',75,'Aeropuerto Domingo Faustino Sarmiento'),(76,'SAOU',76,'Aeropuerto Brigadier Mayor Cesar Raúl Ojeda'),(77,'SAMR',77,'Aeropuerto Internacional Suboficial Ayudante Santiago Germano'),(78,'SASO',78,'Aero Club Orán'),(79,'SADS',79,'Aeropuerto de San Justo'),(80,'SANT',80,'Aeropuerto Internacional Teniente General Benjamín Matienzo'),(81,'SAZR',81,'Aeropuerto de Santa Rosa'),(82,'SAZL',82,'Aeropuerto de Santa Teresita'),(83,'SANE',83,'Aeropuerto Vicecomodoro Ángel de la Paz Aragonés'),(84,'SAZY',84,'Aeropuerto Aviador Carlos Campos'),(85,'SAAV',85,'Aeropuerto de Sauce Viejo'),(86,'SAFS',86,'Aeropuerto de Sunchales'),(87,'SAZT',87,'Aeropuerto de Tandil'),(88,'SAST',88,'Aeropuerto de Tartagal'),(89,'SANR',89,'Aeropuerto Internacional Termas de Río Hondo'),(90,'SAVT',90,'Aeropuerto Almirante Marco Andrés Zar'),(91,'SAZH',91,'Aeropuerto Municipal Primer Teniente Héctor Ricardo Volponi'),(92,'SAWH',92,'Aeropuerto de Ushuaia'),(93,'SAVV',93,'Aeropuerto Gobernador Edgardo Castello'),(94,'SAOD',94,'Aeropuerto de Villa Dolores'),(95,'SAZV',95,'Aeropuerto de Villa Gesell'),(96,'SAOR',96,'Aeropuerto de Villa Reynolds'),(97,'SAAU',97,'Aeropuerto de Villaguay'),(98,'SAHZ',98,'Aeropuerto de Zapala');
/*!40000 ALTER TABLE `aeropuertos` ENABLE KEYS */;
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
INSERT INTO `ciudades` VALUES (1,'Alto Río Senguer',1),(2,'Azul',2),(3,'Bahía Blanca',2),(4,'Bariloche',3),(5,'Bolívar',2),(6,'Buenos Aires',4),(7,'Campo de Mayo',2),(8,'Caviahue',5),(9,'Ceres',6),(10,'Chamical',7),(11,'Chepes',7),(12,'Chilecito',7),(13,'Clorinda',8),(14,'Comodoro Rivadavia',1),(15,'Córdoba',9),(16,'Concordia',10),(17,'Coronel Suárez',2),(18,'Corrientes',11),(19,'Curuzú Cuatiá',11),(20,'Cutral-Co',5),(21,'Dolores',2),(22,'Don Torcuato',2),(23,'El Bolsón',3),(24,'El Calafate',12),(25,'El Calafate',12),(26,'El Palomar',2),(27,'Esquel',1),(28,'Ezeiza',2),(29,'Formosa',8),(30,'General Alvear',13),(31,'General Pico',14),(32,'General Roca',3),(33,'Ingeniero Jacobacci',3),(34,'Isla Martín García',2),(35,'José C. Paz',2),(36,'Junín',2),(37,'Laboulaye',9),(38,'La Cumbre',9),(39,'La Plata',2),(40,'La Rioja',7),(41,'Las Heras',12),(42,'Las Lomitas',8),(43,'Malargüe',13),(44,'Mar del Plata',2),(45,'Mendoza',13),(46,'Merlo',15),(47,'Miramar',2),(48,'Monte Caseros',11),(49,'Morón',2),(50,'Necochea',2),(51,'Neuquén',5),(52,'Olavarría',2),(53,'Paraná',10),(54,'Paso de los Libres',11),(55,'Pehuajó',2),(56,'Perico',16),(57,'Perito Moreno',12),(58,'Posadas',17),(59,'Puerto Deseado',12),(60,'Puerto Iguazú',17),(61,'Puerto Madryn',1),(62,'Puerto San Julián',12),(63,'Puerto Santa Cruz',12),(64,'Presidencia Roque Saenz Peña',18),(65,'Reconquista',6),(66,'Resistencia',18),(67,'Río Cuarto',9),(68,'Río Gallegos',12),(69,'Río Grande',19),(70,'Río Turbio',12),(71,'Rosario',6),(72,'Salta',20),(73,'San Fernando',2),(74,'San Fernando del Valle de Catamarca',21),(75,'San Juan',22),(76,'San Luis',15),(77,'San Rafael',13),(78,'San Ramón de la Nueva Orán',20),(79,'San Justo',2),(80,'San Miguel de Tucumán',23),(81,'Santa Rosa',14),(82,'Santa Teresita',2),(83,'Santiago del Estero',24),(84,'San Martín de los Andes',5),(85,'Sauce Viejo',6),(86,'Sunchales',6),(87,'Tandil',2),(88,'Tartagal',20),(89,'Termas de Río Hondo',24),(90,'Trelew',1),(91,'Tres Arroyos',2),(92,'Ushuaia',19),(93,'Viedma',3),(94,'Villa Dolores',9),(95,'Villa Gesell',2),(96,'Villa Reynolds',15),(97,'Villaguay',10),(98,'Zapala',5);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
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
INSERT INTO `programacionvuelos` VALUES (1,1,84,3,1464.93,1191.00,'','','','\0','\0','\0','\0'),(2,2,20,2,2258.28,1836.00,'\0','','','\0','\0','\0',''),(3,3,95,1,3071.31,2497.00,'\0','','','\0','','',''),(4,4,87,4,2658.03,2161.00,'\0','\0','\0','\0','\0','','\0'),(5,5,4,3,1510.44,1228.00,'\0','\0','\0','','','\0',''),(6,7,55,2,1190.64,968.00,'\0','\0','\0','\0','','','\0'),(7,8,50,3,1575.63,1281.00,'\0','','\0','\0','','\0','\0'),(8,9,51,2,2564.55,2085.00,'','','\0','','\0','\0','\0'),(9,10,44,3,2036.88,1656.00,'\0','','','','\0','\0',''),(10,11,82,2,2437.86,1982.00,'\0','','','\0','\0','','\0'),(11,12,5,1,1136.52,924.00,'\0','','','\0','\0','\0','\0'),(12,13,91,4,2592.84,2108.00,'','\0','\0','\0','','\0',''),(13,14,31,2,1125.45,915.00,'','','','\0','\0','',''),(14,15,52,2,1453.86,1182.00,'','','','','','\0',''),(15,16,21,2,1952.01,1587.00,'','\0','','','','','\0'),(16,17,17,2,1923.72,1564.00,'\0','','','','','\0',''),(17,18,3,3,3046.71,2477.00,'','','','\0','\0','',''),(18,19,2,4,3063.93,2491.00,'','','','','','\0','\0'),(19,20,63,1,1912.65,1555.00,'','\0','\0','','','',''),(20,21,70,3,3014.73,2451.00,'\0','','','\0','\0','\0','\0'),(21,22,57,3,2167.26,1762.00,'','\0','\0','','','\0',''),(22,23,62,2,2846.22,2314.00,'\0','','','\0','\0','\0',''),(23,24,92,4,2043.03,1661.00,'','\0','\0','','\0','',''),(24,25,68,3,1619.91,1317.00,'','\0','\0','\0','','',''),(25,26,69,1,2776.11,2257.00,'\0','\0','','','','','\0'),(26,27,59,3,2485.83,2021.00,'','\0','\0','','','\0','\0'),(27,28,24,1,2377.59,1933.00,'\0','','','','\0','',''),(28,29,25,3,1168.50,950.00,'\0','\0','','\0','','','\0'),(29,30,61,1,1495.68,1216.00,'\0','','\0','\0','\0','','\0'),(30,31,93,2,2393.58,1946.00,'','\0','','','\0','',''),(31,32,90,2,2323.47,1889.00,'','','\0','','\0','\0',''),(32,33,1,2,1091.01,887.00,'\0','\0','','\0','','',''),(33,34,33,4,1391.13,1131.00,'','','','\0','\0','','\0'),(34,35,41,1,1122.99,913.00,'','\0','\0','\0','\0','\0',''),(35,36,27,4,2860.98,2326.00,'\0','\0','\0','','\0','',''),(36,37,14,4,1606.38,1306.00,'\0','','','','\0','','\0'),(37,38,23,2,2116.83,1721.00,'\0','\0','\0','','','\0','\0'),(38,39,19,3,2682.63,2181.00,'','\0','\0','\0','\0','',''),(39,40,65,2,2239.83,1821.00,'','','\0','','','\0',''),(40,41,42,2,2405.88,1956.00,'','\0','','','\0','',''),(41,42,13,4,2717.07,2209.00,'','','','\0','','','\0'),(42,43,88,1,2702.31,2197.00,'','\0','','','','',''),(43,44,78,1,1670.34,1358.00,'\0','','\0','\0','\0','\0','\0'),(44,45,56,4,1100.85,895.00,'\0','\0','\0','','','','\0'),(45,46,64,4,1041.81,847.00,'\0','\0','','\0','\0','\0',''),(46,47,72,2,2515.35,2045.00,'','\0','','\0','','\0',''),(47,48,58,3,1364.07,1109.00,'\0','','\0','\0','','','\0'),(48,49,48,2,2168.49,1763.00,'','','\0','','','',''),(49,50,54,1,2047.95,1665.00,'\0','','\0','','','\0',''),(50,51,60,2,2225.07,1809.00,'\0','\0','\0','\0','\0','','\0'),(51,52,29,2,2264.43,1841.00,'\0','\0','\0','\0','','\0','\0'),(52,53,66,3,1327.17,1079.00,'\0','\0','\0','','','\0',''),(53,54,18,4,1362.84,1108.00,'','','','','','\0',''),(54,55,76,2,2597.76,2112.00,'','','\0','\0','\0','\0',''),(55,56,46,2,2966.76,2412.00,'\0','','\0','\0','','\0','\0'),(56,57,96,1,2435.40,1980.00,'\0','\0','','\0','\0','\0',''),(57,58,37,4,1060.26,862.00,'','','','','','',''),(58,59,94,1,1875.75,1525.00,'','\0','\0','\0','\0','\0',''),(59,60,67,3,2741.67,2229.00,'','\0','\0','','','',''),(60,61,9,4,1070.10,870.00,'\0','\0','\0','\0','','\0','\0'),(61,62,75,2,2664.18,2166.00,'\0','\0','\0','','\0','\0','\0'),(62,63,80,3,1442.79,1173.00,'','\0','\0','\0','\0','','\0'),(63,64,89,2,2461.23,2001.00,'','\0','','','','',''),(64,65,12,1,2726.91,2217.00,'\0','','\0','','','',''),(65,66,40,1,2870.82,2334.00,'','\0','\0','\0','','\0','\0'),(66,67,83,1,2477.22,2014.00,'\0','','','\0','\0','','\0'),(67,68,74,1,1798.26,1462.00,'\0','','\0','','','\0',''),(68,69,77,1,2790.87,2269.00,'\0','\0','\0','\0','','',''),(69,70,43,2,2712.15,2205.00,'','\0','','','\0','','\0'),(70,71,45,1,1349.31,1097.00,'\0','\0','','\0','\0','\0',''),(71,72,30,1,1216.47,989.00,'\0','\0','','\0','\0','',''),(72,73,98,3,2899.11,2357.00,'\0','\0','\0','\0','\0','\0',''),(73,74,32,4,2110.68,1716.00,'','\0','\0','','\0','','\0'),(74,75,8,4,1706.01,1387.00,'\0','','','','','\0',''),(75,76,86,2,1269.36,1032.00,'\0','\0','','','','\0',''),(76,77,28,3,1939.71,1577.00,'','','','','','','\0'),(77,78,47,2,1790.88,1456.00,'','\0','\0','\0','','\0',''),(78,79,79,1,1650.66,1342.00,'','\0','','\0','','\0','\0'),(79,80,26,3,2007.36,1632.00,'','','','\0','','\0','\0'),(80,81,7,3,2969.22,2414.00,'\0','\0','\0','','','\0','\0'),(81,82,49,2,2890.50,2350.00,'','','\0','','','\0',''),(82,83,39,3,2263.20,1840.00,'\0','','\0','','\0','\0',''),(83,84,35,3,2576.85,2095.00,'\0','','','\0','\0','\0',''),(84,85,73,1,2168.49,1763.00,'\0','\0','','\0','','\0','\0'),(85,86,22,2,2809.32,2284.00,'\0','','\0','\0','','','\0'),(86,87,10,3,2794.56,2272.00,'','\0','\0','\0','','\0','\0'),(87,88,11,4,2274.27,1849.00,'','\0','\0','\0','\0','\0',''),(88,89,15,2,1908.96,1552.00,'\0','\0','','','','','\0'),(89,90,38,2,3040.56,2472.00,'\0','','\0','','','','\0'),(90,91,6,2,2939.70,2390.00,'','','','','','\0',''),(91,92,85,3,1842.54,1498.00,'\0','\0','','\0','','','\0'),(92,93,97,4,1455.09,1183.00,'','\0','','','\0','','\0'),(93,94,71,2,1626.06,1322.00,'','\0','\0','\0','','',''),(94,95,53,2,1509.21,1227.00,'\0','','\0','','\0','','\0'),(95,96,34,3,1901.58,1546.00,'\0','','\0','','\0','\0','\0'),(96,97,36,2,1020.90,830.00,'\0','','','\0','','',''),(97,98,16,2,2426.79,1973.00,'','','','','\0','','\0'),(98,6,7,2,3046.71,2477.00,'','\0','\0','','','',''),(99,6,8,1,2862.21,2327.00,'\0','','\0','','\0','',''),(100,6,9,1,1317.33,1071.00,'\0','\0','\0','\0','','',''),(101,6,10,4,2843.76,2312.00,'\0','','','','\0','\0',''),(102,6,11,3,1205.40,980.00,'\0','','\0','','\0','','\0'),(103,6,12,4,2629.74,2138.00,'\0','','','','','\0','\0'),(104,6,13,1,2394.81,1947.00,'','\0','','','\0','\0',''),(105,6,14,1,1178.34,958.00,'\0','','','\0','','',''),(106,6,15,1,2562.09,2083.00,'','\0','','','','',''),(107,6,16,3,2574.39,2093.00,'','','','','\0','\0',''),(108,6,17,3,1306.26,1062.00,'','\0','\0','\0','\0','','\0'),(109,6,18,3,1692.48,1376.00,'','','\0','\0','\0','',''),(110,6,19,1,1757.67,1429.00,'','\0','\0','\0','\0','',''),(111,6,20,4,1425.57,1159.00,'\0','','\0','','\0','\0',''),(112,6,21,1,2141.43,1741.00,'\0','\0','','','\0','',''),(113,6,22,3,2945.85,2395.00,'\0','','','\0','\0','\0',''),(114,6,23,3,1425.57,1159.00,'','\0','\0','\0','','\0','\0'),(115,6,24,1,1640.82,1334.00,'','\0','','\0','','\0','\0'),(116,6,25,3,2204.16,1792.00,'\0','','','','','\0',''),(117,6,26,3,1517.82,1234.00,'','\0','','\0','\0','','\0'),(118,6,27,3,2403.42,1954.00,'','','','','\0','\0',''),(119,6,28,1,1521.51,1237.00,'','','','','','\0',''),(120,6,29,2,1430.49,1163.00,'','\0','\0','','','',''),(121,6,30,3,2033.19,1653.00,'','\0','','\0','\0','\0',''),(122,6,31,2,2161.11,1757.00,'\0','\0','\0','','','\0',''),(123,6,32,2,2854.83,2321.00,'\0','','\0','','','\0','\0'),(124,6,33,1,1521.51,1237.00,'','\0','\0','\0','','',''),(125,6,34,3,2270.58,1846.00,'\0','','','\0','','\0','\0'),(126,6,35,4,2691.24,2188.00,'','\0','','\0','','','\0'),(127,6,36,2,1988.91,1617.00,'','','\0','','\0','',''),(128,6,37,4,1359.15,1105.00,'','','','','','\0','\0'),(129,6,38,3,1980.30,1610.00,'\0','','','\0','\0','\0','\0'),(130,6,39,4,2301.33,1871.00,'','','','','\0','',''),(131,6,40,1,1683.87,1369.00,'','\0','\0','','','\0','\0'),(132,6,41,2,2453.85,1995.00,'\0','','\0','\0','\0','',''),(133,6,42,1,2630.97,2139.00,'\0','','\0','','','',''),(134,6,43,3,2750.28,2236.00,'\0','\0','\0','\0','','','\0'),(135,6,44,4,1568.25,1275.00,'\0','','\0','','','\0','\0'),(136,6,45,3,1863.45,1515.00,'\0','','','\0','\0','','\0'),(137,6,46,4,3059.01,2487.00,'\0','','\0','\0','\0','','\0'),(138,6,47,4,2660.49,2163.00,'','\0','','','','',''),(139,6,48,1,2969.22,2414.00,'','\0','','','\0','',''),(140,6,49,4,2950.77,2399.00,'','','\0','\0','\0','',''),(141,6,50,2,2343.15,1905.00,'\0','','','','\0','',''),(142,6,51,1,3022.11,2457.00,'','','','\0','','\0','\0'),(143,6,52,2,1680.18,1366.00,'','\0','\0','\0','','\0',''),(144,6,53,3,3043.02,2474.00,'\0','\0','','\0','\0','\0',''),(145,6,54,2,1477.23,1201.00,'\0','\0','','\0','','\0',''),(146,6,55,3,2702.31,2197.00,'\0','\0','','','','',''),(147,6,56,1,1510.44,1228.00,'\0','','\0','','','\0','\0'),(148,6,57,3,2209.08,1796.00,'','','','\0','\0','\0','\0'),(149,6,58,1,3036.87,2469.00,'','\0','','','\0','\0','\0'),(150,6,59,1,2003.67,1629.00,'','','','\0','','',''),(151,6,60,2,2282.88,1856.00,'\0','\0','\0','','\0','\0','\0'),(152,6,61,1,1170.96,952.00,'','\0','\0','','\0','\0','\0'),(153,6,62,4,1025.82,834.00,'\0','','','\0','\0','\0','\0'),(154,6,63,3,2917.56,2372.00,'\0','','\0','\0','\0','\0',''),(155,6,64,1,1536.27,1249.00,'','\0','','','\0','\0','\0'),(156,6,65,2,2399.73,1951.00,'','','','','\0','\0','\0'),(157,6,66,3,2173.41,1767.00,'','\0','\0','\0','','',''),(158,6,67,2,1129.14,918.00,'','','','\0','','',''),(159,6,68,4,2477.22,2014.00,'\0','','','\0','','',''),(160,6,69,3,1767.51,1437.00,'','\0','','','\0','','\0'),(161,6,70,4,1783.50,1450.00,'','','\0','\0','\0','',''),(162,6,71,2,1147.59,933.00,'\0','\0','','\0','','','\0'),(163,6,72,1,1402.20,1140.00,'','','','','\0','\0','\0'),(164,6,73,4,2784.72,2264.00,'','\0','','\0','','\0',''),(165,6,74,1,2956.92,2404.00,'\0','','','','\0','\0',''),(166,6,75,1,1434.18,1166.00,'\0','\0','','','\0','\0',''),(167,6,76,2,1868.37,1519.00,'','','\0','','','','\0'),(168,6,77,3,2194.32,1784.00,'','','\0','\0','\0','','\0'),(169,6,78,1,3007.35,2445.00,'\0','','\0','','\0','',''),(170,6,79,4,2132.82,1734.00,'','\0','','','\0','\0','\0'),(171,6,80,3,2404.65,1955.00,'','','','\0','','','\0'),(172,6,81,2,2654.34,2158.00,'','\0','','\0','\0','','\0'),(173,6,82,2,2750.28,2236.00,'\0','','\0','\0','\0','\0','\0'),(174,6,83,3,2418.18,1966.00,'','','','\0','','','\0'),(175,6,84,3,2608.83,2121.00,'','','\0','\0','','\0','\0'),(176,6,85,3,1975.38,1606.00,'\0','','\0','','\0','',''),(177,6,86,3,2103.30,1710.00,'\0','','\0','\0','\0','\0',''),(178,6,87,2,1580.55,1285.00,'','','\0','\0','','\0','\0'),(179,6,88,2,1565.79,1273.00,'','\0','\0','','','','\0'),(180,6,89,2,2838.84,2308.00,'\0','','\0','','\0','','\0'),(181,6,90,1,2378.82,1934.00,'\0','','','\0','\0','\0',''),(182,6,91,2,1934.79,1573.00,'\0','\0','\0','\0','','','\0'),(183,6,92,4,1017.21,827.00,'','\0','','','','',''),(184,6,93,3,1293.96,1052.00,'','\0','','','\0','',''),(185,6,94,3,1266.90,1030.00,'\0','\0','','','','','\0'),(186,6,95,2,1694.94,1378.00,'\0','\0','','','','\0','\0'),(187,6,96,4,1581.78,1286.00,'','\0','\0','\0','','\0',''),(188,6,97,2,2778.57,2259.00,'\0','','','','','\0',''),(189,6,98,1,1761.36,1432.00,'\0','','\0','\0','\0','',''),(190,15,28,2,1956.93,1591.00,'','','\0','\0','','\0','\0'),(191,15,29,3,1087.32,884.00,'\0','','','','\0','\0','\0'),(192,15,30,1,2474.76,2012.00,'','\0','','\0','','','\0'),(193,15,31,2,2991.36,2432.00,'\0','','','\0','\0','',''),(194,15,32,2,1004.91,817.00,'\0','','\0','\0','','',''),(195,15,33,4,2656.80,2160.00,'\0','\0','','','','\0','\0'),(196,15,34,4,1211.55,985.00,'\0','','','','\0','\0',''),(197,15,35,3,1448.94,1178.00,'\0','','','','','\0','\0'),(198,15,36,1,2555.94,2078.00,'','','','','\0','',''),(199,15,37,2,1418.19,1153.00,'\0','','\0','','','','\0'),(200,15,38,3,1949.55,1585.00,'\0','\0','\0','\0','\0','\0','\0'),(201,15,39,2,2617.44,2128.00,'','\0','\0','\0','','',''),(202,15,40,4,2126.67,1729.00,'','','\0','','','\0',''),(203,15,41,2,1478.46,1202.00,'\0','\0','','','','\0',''),(204,15,42,4,2950.77,2399.00,'','\0','','','\0','','\0'),(205,15,43,1,2800.71,2277.00,'\0','\0','\0','','','\0',''),(206,15,44,3,1646.97,1339.00,'\0','','\0','','','',''),(207,15,45,2,2907.72,2364.00,'','\0','','','\0','',''),(208,15,46,1,1605.15,1305.00,'\0','','\0','','','\0',''),(209,15,47,2,2883.12,2344.00,'','\0','','','','',''),(210,15,48,3,1004.91,817.00,'','\0','\0','','','','\0'),(211,15,49,1,2125.44,1728.00,'\0','','\0','','','\0',''),(212,15,50,4,2238.60,1820.00,'\0','','\0','','','\0','\0'),(213,15,51,1,2674.02,2174.00,'','\0','\0','\0','','\0',''),(214,15,52,4,1031.97,839.00,'\0','\0','\0','\0','\0','',''),(215,15,53,3,1140.21,927.00,'\0','\0','\0','\0','','\0',''),(216,15,54,2,1049.19,853.00,'','','\0','\0','','','\0'),(217,15,55,1,2692.47,2189.00,'\0','\0','','\0','\0','',''),(218,15,56,4,1389.90,1130.00,'','','','\0','','','\0'),(219,15,57,1,1277.97,1039.00,'\0','','\0','','\0','\0',''),(220,15,58,3,2506.74,2038.00,'\0','','','','\0','\0',''),(221,15,59,1,2655.57,2159.00,'','','\0','\0','','','\0'),(222,15,60,4,2771.19,2253.00,'\0','','\0','\0','','','\0'),(223,15,61,4,2920.02,2374.00,'','','','','','\0',''),(224,15,62,3,3046.71,2477.00,'','\0','','','\0','',''),(225,15,63,2,1254.60,1020.00,'','','','','\0','',''),(226,15,64,1,1285.35,1045.00,'\0','','\0','','\0','\0','\0'),(227,15,65,3,1825.32,1484.00,'','','\0','\0','\0','\0','\0'),(228,15,66,3,2270.58,1846.00,'','\0','\0','','\0','\0','\0'),(229,15,67,2,2526.42,2054.00,'\0','','\0','','\0','',''),(230,15,68,3,2942.16,2392.00,'','','','\0','\0','',''),(231,15,69,4,2075.01,1687.00,'\0','','\0','\0','','','\0'),(232,15,70,2,1179.57,959.00,'','','\0','\0','','',''),(233,15,71,4,1410.81,1147.00,'\0','','','\0','\0','','\0'),(234,15,72,3,2831.46,2302.00,'\0','','','','\0','\0',''),(235,15,73,3,2950.77,2399.00,'\0','','\0','','\0','',''),(236,15,74,2,1933.56,1572.00,'','\0','\0','','\0','\0',''),(237,15,75,1,1674.03,1361.00,'\0','','','\0','\0','',''),(238,15,76,2,2437.86,1982.00,'','\0','','\0','\0','','\0'),(239,15,77,3,2945.85,2395.00,'','','','','','\0',''),(240,15,78,3,2931.09,2383.00,'\0','','','','','\0',''),(241,15,79,2,1599.00,1300.00,'','','\0','\0','','\0',''),(242,15,80,2,2990.13,2431.00,'','\0','','\0','','\0',''),(243,15,81,4,2033.19,1653.00,'','\0','\0','','','\0',''),(244,15,82,1,2392.35,1945.00,'','','','\0','','','\0'),(245,15,83,1,2034.42,1654.00,'','','','\0','\0','',''),(246,15,84,2,2186.94,1778.00,'\0','','','\0','\0','','\0'),(247,15,85,1,2762.58,2246.00,'','','\0','','','\0','\0'),(248,15,86,1,2441.55,1985.00,'','\0','\0','\0','\0','\0','\0'),(249,15,87,4,3029.49,2463.00,'\0','\0','','\0','','\0','\0'),(250,15,88,2,1849.92,1504.00,'','','','','','','\0'),(251,15,89,4,1719.54,1398.00,'','','\0','\0','\0','\0','\0'),(252,15,90,4,999.99,813.00,'','','\0','\0','\0','','\0'),(253,15,91,4,2814.24,2288.00,'\0','\0','','\0','','\0',''),(254,15,92,2,2356.68,1916.00,'\0','','\0','','','\0',''),(255,15,93,1,1624.83,1321.00,'\0','\0','','\0','\0','','\0'),(256,15,94,2,1157.43,941.00,'','','\0','\0','','','\0'),(257,15,95,2,2520.27,2049.00,'','','','\0','','\0','\0'),(258,15,96,3,2844.99,2313.00,'\0','','','\0','\0','\0',''),(259,15,97,2,2952.00,2400.00,'\0','','','','\0','',''),(260,15,98,2,1656.81,1347.00,'\0','\0','\0','','','','\0');
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
INSERT INTO `provincias` VALUES (1,'Chubut'),(2,'Buenos Aires'),(3,'Río Negro'),(4,'CABA'),(5,'Neuquén'),(6,'Santa Fe'),(7,'La Rioja'),(8,'Formosa'),(9,'Córdoba'),(10,'Entre Ríos'),(11,'Corrientes'),(12,'Santa Cruz'),(13,'Mendoza'),(14,'La Pampa'),(15,'San Luis'),(16,'Jujuy'),(17,'Misiones'),(18,'Chaco'),(19,'Tierra del Fuego'),(20,'Salta'),(21,'Catamarca'),(22,'San Juan'),(23,'Tucumán'),(24,'Santiago del Estero');
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
  PRIMARY KEY (`idReserva`),
  KEY `cod_vuelo_idx` (`cod_vuelo`),
  CONSTRAINT `cod_vuelo` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelos` (`idVuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
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
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`idVuelo`),
  KEY `cod_programacion_vuelo_idx` (`cod_programacion_vuelo`),
  CONSTRAINT `cod_programacion_vuelo` FOREIGN KEY (`cod_programacion_vuelo`) REFERENCES `programacionvuelos` (`idProgramacionVuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelos`
--

LOCK TABLES `vuelos` WRITE;
/*!40000 ALTER TABLE `vuelos` DISABLE KEYS */;
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

-- Dump completed on 2014-10-27 22:39:47
