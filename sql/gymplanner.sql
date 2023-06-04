-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: gymplanner
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

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
-- Table structure for table `exercicios`
--

DROP TABLE IF EXISTS `exercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `series` int DEFAULT NULL,
  `repeticao` int DEFAULT NULL,
  `tempo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicios`
--

LOCK TABLES `exercicios` WRITE;
/*!40000 ALTER TABLE `exercicios` DISABLE KEYS */;
INSERT INTO `exercicios` VALUES (1,'braços','biceps',5,1,5),(2,'braços','triceps',5,1,5),(3,'braços','antebraco',5,1,5),(4,'braços','alternada',5,1,5),(5,'braços','barra fixa',5,1,5),(6,'peito','supino',5,1,5),(7,'peito','flexão',5,1,5),(8,'peito','crossover',5,1,5),(9,'peito','cruxifixo-reto',5,1,5),(10,'peito','voador-peitoral',5,1,5),(11,'abdomem','abdominal-infra',5,1,5),(12,'abdomem','abdominal-supra',5,1,5),(13,'abdomem','abdominal-classico',5,1,5),(14,'abdomem','prancha-lateral',5,1,5),(15,'pernas','agachamento',5,1,5),(16,'pernas','legpress',5,1,5),(17,'pernas','adutora',5,1,5),(18,'pernas','abdutora',5,1,5),(19,'pernas','cadeira flexora',5,1,5),(20,'costas','voador-dorsal',5,1,5),(21,'costas','remada-polia',5,1,5),(22,'costas','remada-unilateral',5,1,5),(23,'costas','remada-curvada',5,1,5),(24,'costas','puxada frontal',5,1,5),(25,'ombros','crucifixo-inverso',5,1,5),(26,'ombros','elevação-frontal',5,1,5),(27,'ombros','elevação-lateral',5,1,5),(28,'ombros','arnold press',5,1,5),(29,'ombros','rotação externa',5,1,5),(30,'glúteos','agachamento-sumô',5,1,5),(31,'glúteos','stiff',5,1,5),(32,'glúteos','leg press(45º)',5,1,5),(33,'aleatorio','jdjjdjdjdjd',5,1,5),(34,'aleatorio','jdjjdjdjdjd',5,1,5),(35,'ullll','jdjjdjdjdjd',5,1,5),(36,'categoria inventada','treino treino treino',5,1,5),(37,'categoria inventada 2','treino treino treino',5,1,5),(38,NULL,NULL,5,1,5);
/*!40000 ALTER TABLE `exercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicios_usuarios`
--

DROP TABLE IF EXISTS `exercicios_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercicios_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `series` int DEFAULT NULL,
  `repeticoes` int DEFAULT NULL,
  `tempo` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `exercicios_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicios_usuarios`
--

LOCK TABLES `exercicios_usuarios` WRITE;
/*!40000 ALTER TABLE `exercicios_usuarios` DISABLE KEYS */;
INSERT INTO `exercicios_usuarios` VALUES (1,'braços','biceps',1,10,15,NULL,NULL),(2,'pernas','agachamento',5,1,5,1,NULL),(3,'ombros','elevação-lateral',11,1,5,1,NULL),(4,'costas','voador-dorsal',5,1,5,1,NULL),(5,'abdomem','abdominal-infra',5,1,5,1,NULL),(6,'abdomem','abdominal-infra',5,1,5,1,NULL),(7,'ombros','elevação-frontal',15,5,10,1,NULL),(8,'peito','supino',11,1,5,1,NULL);
/*!40000 ALTER TABLE `exercicios_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'jfjfjjf','nfnfnfn@gmail.com','1','2023-05-22','masculino',NULL),(2,'Mario Bernado Rodrigues Pinheiro','mariobernadorodriguespinheiro@gmail.com','1','2003-09-03','masculino',NULL),(3,'José Ricardo Mário','jrm2023@gmail.com','1','2023-05-26','masculino',NULL),(4,'Victor','victor@gmail.com','123','2003-02-12','masculino','img/foto_perfil/seila.png'),(5,'Mario Rodrigues Fernandes','mariofer23@gmail.com','123','1997-03-30','masculino',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-04 11:34:25
