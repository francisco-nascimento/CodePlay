-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: Codeplay
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Dumping data for table `Assunto`
--

LOCK TABLES `Assunto` WRITE;
/*!40000 ALTER TABLE `Assunto` DISABLE KEYS */;
INSERT INTO `Assunto` VALUES (1,'Variáveis','2018-05-25 18:37:17'),(2,'Estruturas de seleção','2018-05-25 18:37:17'),(3,'Estruturas de repetição','2018-05-25 18:37:17');
/*!40000 ALTER TABLE `Assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Gabarito`
--

LOCK TABLES `Gabarito` WRITE;
/*!40000 ALTER TABLE `Gabarito` DISABLE KEYS */;
INSERT INTO `Gabarito` VALUES (1,'var idade;\r\n\r\n\r\nidade = 0;\r\nwindow.alert(idade);\r\n',2,'2018-05-25 19:15:04'),(2,'var a, b;\r\n\r\n\r\nwindow.alert(a + b);\r\n',3,'2018-05-26 16:00:44'),(3,'var c, d;\r\n\r\n\r\nwindow.alert(c - d);\r\n',4,'2018-05-26 16:01:36'),(4,'var e, f;\r\n\r\n\r\nwindow.alert(e * f);\r\n',5,'2018-05-26 16:03:00'),(5,'var g, h;\r\n\r\n\r\nwindow.alert(g / h);\r\n',6,'2018-05-26 16:03:51'),(6,'var nota1, nota2;\r\n\r\n\r\nwindow.alert((nota1 + nota2) / 2);\r\n',7,'2018-05-26 16:05:37'),(7,'var valor, desconto;\r\n\r\n\r\nwindow.alert(valor - desconto);\r\n',8,'2018-05-26 16:07:21'),(8,'var valoHora, quantidadeHoras;\r\n\r\n\r\nwindow.alert(quantidadeHoras * valoHora);\r\n',9,'2018-05-26 16:08:55');
/*!40000 ALTER TABLE `Gabarito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Problema`
--

LOCK TABLES `Problema` WRITE;
/*!40000 ALTER TABLE `Problema` DISABLE KEYS */;
INSERT INTO `Problema` VALUES (2,'Criar uma variável idade, adicionar 20 ao seu valor e imprimi-la.',6,1,'F','2018-05-25 19:15:04'),(3,'Criar as variáveis a e b. \r\nImprimir resultado a +b.',6,1,'F','2018-05-26 16:00:44'),(4,'Criar as variáveis c, d.\r\nImprimir o resultado c - d.',6,1,'F','2018-05-26 16:01:36'),(5,'Criar variáveis e, f\r\nImprimir o resultado e x f;\r\n',6,1,'F','2018-05-26 16:03:00'),(6,'Criar variáveis g, h\r\nImprimir resultado g / h',6,1,'F','2018-05-26 16:03:51'),(7,'Criar duas variáveis : nota1 e nota2 e imprimir a média entre elas.',6,1,'F','2018-05-26 16:05:37'),(8,'Criar duas variáveis para valor do produto e desconto. imprimir o valor final do produto.',6,1,'F','2018-05-26 16:07:21'),(9,'Criar as variáveis valor da hora e quantidade de horas.\r\nImprimir o salário do funcionário.',6,1,'F','2018-05-26 16:08:55');
/*!40000 ALTER TABLE `Problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Professor`
--

LOCK TABLES `Professor` WRITE;
/*!40000 ALTER TABLE `Professor` DISABLE KEYS */;
INSERT INTO `Professor` VALUES (6,'2248410','Francisco do Nascimento','chico@gmail.com','$2y$10$33cinRei213w1Zjsh7x7TO1tRUAJfcSqGXYO7gSmd6vwlbbVSYrVq',1,'2018-05-25 19:12:56');
/*!40000 ALTER TABLE `Professor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-27 23:33:03
