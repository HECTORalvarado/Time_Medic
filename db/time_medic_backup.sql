CREATE DATABASE  IF NOT EXISTS `time_medic` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `time_medic`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: time_medic
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `idcitas` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 0 COMMENT '0: pendiente\n1: completa\n2: cancelada',
  PRIMARY KEY (`idcitas`),
  KEY `paciente_citas_idx` (`id_paciente`),
  KEY `doctor_citas_idx` (`id_doctor`),
  CONSTRAINT `doctor_citas` FOREIGN KEY (`id_doctor`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `paciente_citas` FOREIGN KEY (`id_paciente`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,1,2,'2024-05-04','17:19:03',1),(2,1,2,'2024-05-31','10:05:00',1),(3,1,4,'2024-05-31','01:56:00',2);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_especialidad`
--

DROP TABLE IF EXISTS `doctor_especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_especialidad` (
  `id_doctor_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_doctor_especialidad`),
  KEY `doctor_idx` (`id_doctor`),
  KEY `especialidad_idx` (`id_especialidad`),
  CONSTRAINT `doctor` FOREIGN KEY (`id_doctor`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_especialidad`
--

LOCK TABLES `doctor_especialidad` WRITE;
/*!40000 ALTER TABLE `doctor_especialidad` DISABLE KEYS */;
INSERT INTO `doctor_especialidad` VALUES (1,2,1),(2,4,1);
/*!40000 ALTER TABLE `doctor_especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_fechas`
--

DROP TABLE IF EXISTS `doctor_fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_fechas` (
  `id_doctor_fechas` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `id_fechas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_doctor_fechas`),
  KEY `id_doc_idx` (`id_doctor`),
  KEY `id_fechas_idx` (`id_fechas`),
  CONSTRAINT `id_doc` FOREIGN KEY (`id_doctor`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_fechas` FOREIGN KEY (`id_fechas`) REFERENCES `fechas` (`idfechas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_fechas`
--

LOCK TABLES `doctor_fechas` WRITE;
/*!40000 ALTER TABLE `doctor_fechas` DISABLE KEYS */;
INSERT INTO `doctor_fechas` VALUES (1,2,2),(2,4,3);
/*!40000 ALTER TABLE `doctor_fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_horario`
--

DROP TABLE IF EXISTS `doctor_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_horario` (
  `id_doctor_horarios` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `id_horario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_doctor_horarios`),
  KEY `doct_idx` (`id_doctor`),
  KEY `horario_idx` (`id_horario`),
  CONSTRAINT `doct` FOREIGN KEY (`id_doctor`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `horario` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_horario`
--

LOCK TABLES `doctor_horario` WRITE;
/*!40000 ALTER TABLE `doctor_horario` DISABLE KEYS */;
INSERT INTO `doctor_horario` VALUES (1,2,1),(2,4,1);
/*!40000 ALTER TABLE `doctor_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidades` (
  `id_especialidades` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(40) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_especialidades`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Medicina Interna','La medicina interna se ocupa del diagnóstico y tratamiento de enfermedades en adultos.'),(2,'Pediatría','La pediatría se enfoca en la atención médica de niños y adolescentes.'),(3,'Cirugía General','La cirugía general aborda intervenciones quirúrgicas comunes, como apendicectomías y colecistectomías.'),(4,'Ginecología y Obstetricia','La ginecología y obstetricia se centra en la salud reproductiva de las mujeres, incluyendo el embarazo y el parto.'),(5,'Dermatología','La dermatología se dedica al diagnóstico y tratamiento de enfermedades de la piel, cabello y uñas.'),(6,'Ortopedia','Trata las lesiones y trastornos del sistema musculoesquelético, incluyendo huesos, articulaciones, ligamentos y músculos.');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechas`
--

DROP TABLE IF EXISTS `fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fechas` (
  `idfechas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` varchar(45) NOT NULL,
  `fecha_fin` varchar(45) NOT NULL,
  PRIMARY KEY (`idfechas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechas`
--

LOCK TABLES `fechas` WRITE;
/*!40000 ALTER TABLE `fechas` DISABLE KEYS */;
INSERT INTO `fechas` VALUES (1,'Lunes','Lunes'),(2,'Lunes','Viernes'),(3,'Sábado','Domingo');
/*!40000 ALTER TABLE `fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id_horarios` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id_horarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'06:00:00','16:20:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(14) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'paciente'),(2,'doctor'),(3,'administrador');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(155) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` bit(1) DEFAULT b'1',
  `img` mediumblob DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'test','Proba','test@mail.com',1,'test1','$2y$10$R8G6ckS.FGGiNjaCsnj3xuBU5rBI/WU9cTi6d9rLnVX42uvWRmNLm',_binary '',NULL),(2,'doctor','lyne','mail@mail.com',2,'doct1','$2y$10$UIOOUCLJuMYHDFlY3mLw5.6YCy08maxLhLB20X7V8nGPZDel6qD.C',_binary '',NULL),(3,'admin','administrador','admin@admin.com',3,'admin1','$2y$10$54SaWxhIlBkUc0bxAFV9FOPlWQvSFlCcJv1.5fMY3bZof5fisqlPq',_binary '',NULL),(4,' Heinz','Doofenshmirtz','test@test.com',2,'doc2','$2y$10$HO13A3SuwCSVBQYdOKev4ueVCV2wHcziAi8FZZqZlpWXJM7Kx3hge',_binary '',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-16 20:39:47
