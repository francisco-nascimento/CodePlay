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
INSERT INTO `Assunto` VALUES (1,'Variáveis','2018-05-25 21:37:17'),(2,'Estruturas de seleção','2018-05-25 21:37:17'),(3,'Estruturas de repetição','2018-05-25 21:37:17');
/*!40000 ALTER TABLE `Assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Gabarito`
--

LOCK TABLES `Gabarito` WRITE;
/*!40000 ALTER TABLE `Gabarito` DISABLE KEYS */;
INSERT INTO `Gabarito` VALUES (1,'var idade;\r\n\r\n\r\nidade = 0;\r\nwindow.alert(idade);\r\n',2,'2018-05-25 22:15:04'),(2,'var a, b;\r\n\r\n\r\nwindow.alert(a + b);\r\n',3,'2018-05-26 19:00:44'),(3,'var c, d;\r\n\r\n\r\nwindow.alert(c - d);\r\n',4,'2018-05-26 19:01:36'),(4,'var e, f;\r\n\r\n\r\nwindow.alert(e * f);\r\n',5,'2018-05-26 19:03:00'),(5,'var g, h;\r\n\r\n\r\nwindow.alert(g / h);\r\n',6,'2018-05-26 19:03:51'),(6,'var nota1, nota2;\r\n\r\n\r\nwindow.alert((nota1 + nota2) / 2);\r\n',7,'2018-05-26 19:05:37'),(7,'var valor, desconto;\r\n\r\n\r\nwindow.alert(valor - desconto);\r\n',8,'2018-05-26 19:07:21'),(8,'var valoHora, quantidadeHoras;\r\n\r\n\r\nwindow.alert(quantidadeHoras * valoHora);\r\n',9,'2018-05-26 19:08:55'),(9,'var a, b, c;\r\n\r\n\r\na = 10;\r\nb = 20;\r\nc = 30;\r\nwindow.alert(b - (c + a) % 3);\r\n\r\nb;\r\n',10,'2018-05-31 17:29:03'),(10,'var a, b, c;\r\n\r\n\r\na = 4;\r\nb = 8;\r\nc = 32;\r\nwindow.alert((c - b) / Math.sqrt(a));\r\n',11,'2018-05-31 17:37:57'),(11,'var d, f, g;\r\n\r\n\r\nd = 10;\r\nf = 5;\r\ng = 100;\r\nwindow.alert((f + g) % d);\r\n',12,'2018-05-31 17:42:00'),(12,'var r, s, x, z;\r\n\r\n\r\nr = 100;\r\ns = 2000;\r\nx = 30.5;\r\nz = 30.5;\r\nwindow.alert(String(\'O valor de z é\') + String(z));\r\n',13,'2018-05-31 17:48:33');
/*!40000 ALTER TABLE `Gabarito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Problema`
--

LOCK TABLES `Problema` WRITE;
/*!40000 ALTER TABLE `Problema` DISABLE KEYS */;
INSERT INTO `Problema` VALUES (2,'Criar uma variável idade, adicionar 20 ao seu valor e imprimi-la.',6,1,'F','2018-05-25 22:15:04'),(3,'Criar as variáveis a e b. \r\nImprimir resultado a +b.',6,1,'F','2018-05-26 19:00:44'),(4,'Criar as variáveis c, d.\r\nImprimir o resultado c - d.',6,1,'F','2018-05-26 19:01:36'),(5,'Criar variáveis e, f\r\nImprimir o resultado e x f;\r\n',6,1,'F','2018-05-26 19:03:00'),(6,'Criar variáveis g, h\r\nImprimir resultado g / h',6,1,'F','2018-05-26 19:03:51'),(7,'Criar duas variáveis : nota1 e nota2 e imprimir a média entre elas.',6,1,'F','2018-05-26 19:05:37'),(8,'Criar duas variáveis para valor do produto e desconto. imprimir o valor final do produto.',6,1,'F','2018-05-26 19:07:21'),(9,'Criar as variáveis valor da hora e quantidade de horas.\r\nImprimir o salário do funcionário.',6,1,'F','2018-05-26 19:08:55'),(10,'Criar 3 variáveis: a, b, c com os valores 10, 20, 30.\r\nImprimir o resultado da expressão: b = b - (c + a) % 3',6,1,'M','2018-05-31 17:29:03'),(11,'Criar 3 variáveis: a, b, c. \r\nA deverá ser iniciado com 4, b com o dobro de a, c com o produto de a e b.\r\nImprimir o resultado da expressão: (c - b) / raiz quadrada de a.\r\n',6,1,'D','2018-05-31 17:37:57'),(12,'Criar 3 variáveis: d, f, g com os valores 10, 5, 100.\r\nImprimir o resultado da expressão: (f + g) % d',6,1,'M','2018-05-31 17:42:00'),(13,'Criar 3 variáveis: r = 100, s = 2000, x = 30.5, z = 0.\r\nAtribuir a variável z, a soma de r, s, x.\r\nImprimir a mensagem: \"O valor de z é ____ \".',6,1,'D','2018-05-31 17:48:33');
/*!40000 ALTER TABLE `Problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Professor`
--

LOCK TABLES `Professor` WRITE;
/*!40000 ALTER TABLE `Professor` DISABLE KEYS */;
INSERT INTO `Professor` VALUES (6,'2248410','Francisco do Nascimento','chico@gmail.com','$2y$10$33cinRei213w1Zjsh7x7TO1tRUAJfcSqGXYO7gSmd6vwlbbVSYrVq',1,'2018-05-25 22:12:56');
INSERT INTO `Professor` VALUES (7,'2248239','Havana Alves','havana.alves@gmail.com','$2y$10$33cinRei213w1Zjsh7x7TO1tRUAJfcSqGXYO7gSmd6vwlbbVSYrVq',1,'2018-05-25 22:12:56');

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

-- Dump completed on 2018-06-05  0:51:23
