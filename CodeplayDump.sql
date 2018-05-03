-- MySQL dump 10.13  Distrib 5.7.21, for Linux (i686)
--
-- Host: localhost    Database: Codeplay
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `Aluno`
--

DROP TABLE IF EXISTS `Aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`),
  CONSTRAINT `Aluno_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `Professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aluno`
--

LOCK TABLES `Aluno` WRITE;
/*!40000 ALTER TABLE `Aluno` DISABLE KEYS */;
INSERT INTO `Aluno` VALUES (1,NULL,1,'20162TIJG0545','Wesley Dayvidson','wesleysilva_99@outlook.com','$2y$10$ZKyo7DiL9slcBx4unHbxu.W3AbFhzMGW/EhJPZLozZJJO0PaOSgle',1,NULL,NULL,'2018-03-15 18:27:45'),(2,NULL,1,'20141TIJG8000',NULL,NULL,'$2y$10$nIWKifdg7B4GrCPYuOycCe27ThbggyAxwR4/10lR2EcKzfC2fl4a2',0,NULL,NULL,'2018-03-15 19:10:10'),(3,NULL,1,'20181TIJG0623',NULL,NULL,'$2y$10$NZftT1O0qFwe7Pruajg3TeP6SF0XS/K2HfeA02zvR7UaHGLbdf/aO',0,NULL,NULL,'2018-03-15 19:15:27'),(4,NULL,1,'20162TIJG0546',NULL,NULL,'$2y$10$n23HQO1u4XaGwBHx05f/DuqmH557virlXCXXEbP0dRn5ysmxUVrS2',0,NULL,NULL,'2018-03-15 19:19:52'),(5,NULL,1,'20152tijg1234',NULL,NULL,'$2y$10$xUFOQna07TRZ1XxcaH5ZKetaAwpwrAxRKbgAz2MAP2wrtpF6m3ifK',0,NULL,NULL,'2018-03-15 19:20:40'),(6,NULL,1,'20142TIJG0545',NULL,NULL,'$2y$10$i4sO8xJhJNVwX7FBA5Yuju57Bj1vv1z7c6LG50ev01WC.83ahyrDG',0,NULL,NULL,'2018-03-15 19:20:50'),(7,NULL,1,'20132tijg0645',NULL,NULL,'$2y$10$9gstjVa1gilUTOXAIbXdcec0YW3quKGG.HqR38Onqfq2l8Zy0.SkW',0,NULL,NULL,'2018-03-15 19:21:04'),(8,NULL,1,'20162tijg5463',NULL,NULL,'$2y$10$lSpbH5zfnhg/IQep1DJpQOEcc3JWY77RhmFiWTRMcED7ntbLaETEi',0,NULL,NULL,'2018-03-15 19:21:13'),(9,NULL,1,'20151tijg5678',NULL,NULL,'$2y$10$dmhWuWB5XID./GEdoOSD.OD/WjcODt8wUkYHc.ywXITNXmShVIxM6',0,NULL,NULL,'2018-03-15 19:21:45'),(10,NULL,1,'20171tijg8090',NULL,NULL,'$2y$10$YHMTislBISSdehvWiww6QuGzM6kgwNUwXgdqhBzpnkzTyGfgoIDH2',0,NULL,NULL,'2018-03-15 19:21:57'),(11,NULL,2,'20161tijg0343',NULL,NULL,'$2y$10$QNog0krJPKH1bW.dssPPKOx4M6ZDjkm5cPmKBOtoiMGWNlluA3Wb6',0,NULL,NULL,'2018-03-15 19:59:42'),(12,NULL,2,'20161tijg0344',NULL,NULL,'$2y$10$AkjCGHf9GwNzDX3LFmpt1uHlktJEEnibE.hpC1BkBllPnUjmubs9C',0,NULL,NULL,'2018-03-15 19:59:51'),(13,NULL,2,'20162TIJG0541',NULL,NULL,'$2y$10$WcNkIK8uDBzdg/YKRYH00OjKnXBXnEien3m1CETjjY2llQUHFbU0y',0,NULL,NULL,'2018-03-15 19:59:57'),(14,NULL,2,'20162TIJG0542',NULL,NULL,'$2y$10$xqU7RB6l7g2RaTNN/he3r.p9MYGsyEDBE8MrhYjzeeXJmi4X13SOW',0,NULL,NULL,'2018-03-15 20:00:04'),(15,NULL,2,'20162TIJG0543',NULL,NULL,'$2y$10$O4bSBQsbCrsMb5hbT0uA6ewdSC08Pvj.jKGu1Nt7tBr9Pr4Ikr/0W',0,NULL,NULL,'2018-03-15 20:00:09'),(16,NULL,2,'20162TIJG0544',NULL,NULL,'$2y$10$9w8KnGUXwz4KtBB0a303UeXQ4uOyhzVAUfapy6wVsNcuD4JzgGHly',0,NULL,NULL,'2018-03-15 20:00:13'),(17,NULL,2,'20162TIJG0547',NULL,NULL,'$2y$10$YBYm/rTzuVY2UvW11fcF9eLqo47t7NsACtWXJv9g0x0klxHDGZdzW',0,NULL,NULL,'2018-03-15 20:00:22'),(18,NULL,2,'20162TIJG0548',NULL,NULL,'$2y$10$Nr2J9sG.y325oOO1IfFOpuZfABLwnr.J1XrmOJmvowhfEypdvfudO',0,NULL,NULL,'2018-03-15 20:00:26'),(19,NULL,2,'20162TIJG0549',NULL,NULL,'$2y$10$nxavsLhYVLfqDzT./QI5IO.xmdLwWIqos.kC7EEtvCx2EtCcJhoZG',0,NULL,NULL,'2018-03-15 20:00:36'),(20,NULL,2,'20162TIJG1545',NULL,NULL,'$2y$10$Z.An/HRTKtiDP2C4hkuSYuYv3smflvrrOSJ.0FpHCbQetgl.dXGZ2',0,NULL,NULL,'2018-03-15 20:00:54'),(21,NULL,3,'20181tijg0541',NULL,NULL,'$2y$10$sCnOl/oJBEwzULPIvX2g3eX.bmZLGq1ZuAxyO077x64YGsadcxvne',0,NULL,NULL,'2018-03-17 00:51:24'),(22,NULL,3,'20181tijg0542',NULL,NULL,'$2y$10$azfY9cdZnMtySVp0s0Mb3.0beOm.2CpYVsWiTcl1ibywrzdD8u77.',0,NULL,NULL,'2018-03-17 00:51:31'),(23,NULL,3,'20181TIJG0543',NULL,NULL,'$2y$10$oyL.NYur7X7hL38mCmRR9eqJzGS8ijPa1V.lDC6yh1vHOSVtq1QO2',0,NULL,NULL,'2018-03-17 00:51:43'),(24,NULL,3,'20181tijg0544',NULL,NULL,'$2y$10$lgZ1PcCB5bbwkSHjvFVhRuaoiMzo5nHRlMB6Pm.QklHNn6ppfoBxa',0,NULL,NULL,'2018-03-17 00:51:54'),(25,NULL,3,'20181tijg0545',NULL,NULL,'$2y$10$GBdDHIeY2EHw55bYPE4ox.d4j7S3TcHbW6Bjp0.qMsCKpqaFuYV3m',0,NULL,NULL,'2018-03-17 00:52:05'),(26,NULL,3,'20181tijg0546',NULL,NULL,'$2y$10$gF0Bzw6BuuBkN7wkfQGTfeagDEDD/Jf7yuMKKxi8f/g9zWFiQVRPe',0,NULL,NULL,'2018-03-17 00:52:19'),(27,NULL,3,'20181tijg0547',NULL,NULL,'$2y$10$llDbnxJ.8W//uIxMpgGQaesCmYzR0koV1VdFvqVwthysPEl5aR2Ke',0,NULL,NULL,'2018-03-17 00:52:26'),(28,NULL,3,'20181tijg0548',NULL,NULL,'$2y$10$TqBEyygJa44fF1wo6Q7NpeO.Kbhk1k/F0XaH7GKiEr3du054NC0wO',0,NULL,NULL,'2018-03-17 00:52:32'),(29,NULL,3,'20181tijg0549',NULL,NULL,'$2y$10$b5NsvGhCZHAHb0.QMYU06.OIf4eP35f1w1L13EJkBkhm9WWxf2iO2',0,NULL,NULL,'2018-03-17 00:52:37'),(30,NULL,3,'20181tijg0550',NULL,NULL,'$2y$10$b41v.gSHVfIIvtJbGjcycO5WhxtqjdkTXsc3FwG0Wp5LWi7CK/Wua',0,NULL,NULL,'2018-03-17 00:52:44');
/*!40000 ALTER TABLE `Aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Aluno_Turma`
--

DROP TABLE IF EXISTS `Aluno_Turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aluno_Turma` (
  `id_aluno` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  KEY `id_aluno` (`id_aluno`),
  KEY `id_turma` (`id_turma`),
  CONSTRAINT `Aluno_Turma_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `Aluno` (`id`),
  CONSTRAINT `Aluno_Turma_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `Turma` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aluno_Turma`
--

LOCK TABLES `Aluno_Turma` WRITE;
/*!40000 ALTER TABLE `Aluno_Turma` DISABLE KEYS */;
INSERT INTO `Aluno_Turma` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(10,2),(9,2),(8,2),(7,2),(6,2),(11,3),(12,3),(13,3),(14,3),(15,3),(20,4),(19,4),(18,4),(17,4),(16,4);
/*!40000 ALTER TABLE `Aluno_Turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Atividade`
--

DROP TABLE IF EXISTS `Atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_Atividade` text,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_Professor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Professor` (`id_Professor`),
  CONSTRAINT `Atividade_ibfk_1` FOREIGN KEY (`id_Professor`) REFERENCES `Professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Atividade`
--

LOCK TABLES `Atividade` WRITE;
/*!40000 ALTER TABLE `Atividade` DISABLE KEYS */;
INSERT INTO `Atividade` VALUES (1,'Atividade 1','2018-03-15 19:51:39',1),(2,'Atividade 2','2018-03-15 19:52:02',1),(3,'Atividade 3','2018-03-15 19:52:26',1),(4,'Atividade 4','2018-03-15 19:52:51',1),(5,'Atividade 1','2018-03-15 20:24:16',2),(6,'Atividade 2','2018-03-15 20:25:54',2);
/*!40000 ALTER TABLE `Atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Atividade_Turma`
--

DROP TABLE IF EXISTS `Atividade_Turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Atividade_Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Atividade` int(11) DEFAULT NULL,
  `id_Turma` int(11) DEFAULT NULL,
  `data_limite` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Atividade_Turma`
--

LOCK TABLES `Atividade_Turma` WRITE;
/*!40000 ALTER TABLE `Atividade_Turma` DISABLE KEYS */;
INSERT INTO `Atividade_Turma` VALUES (1,3,1,'2018-03-28');
/*!40000 ALTER TABLE `Atividade_Turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Atividade_Turma_Respondida`
--

DROP TABLE IF EXISTS `Atividade_Turma_Respondida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Atividade_Turma_Respondida` (
  `id_Atividade_Turma` int(11) DEFAULT NULL,
  `id_Aluno` int(11) DEFAULT NULL,
  KEY `id_Atividade_Turma` (`id_Atividade_Turma`),
  KEY `id_Aluno` (`id_Aluno`),
  CONSTRAINT `Atividade_Turma_Respondida_ibfk_1` FOREIGN KEY (`id_Atividade_Turma`) REFERENCES `Atividade_Turma` (`id`),
  CONSTRAINT `Atividade_Turma_Respondida_ibfk_2` FOREIGN KEY (`id_Aluno`) REFERENCES `Aluno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Atividade_Turma_Respondida`
--

LOCK TABLES `Atividade_Turma_Respondida` WRITE;
/*!40000 ALTER TABLE `Atividade_Turma_Respondida` DISABLE KEYS */;
/*!40000 ALTER TABLE `Atividade_Turma_Respondida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gabarito`
--

DROP TABLE IF EXISTS `Gabarito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gabarito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_Gabarito` text,
  `id_Problema` int(11) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_Problema` (`id_Problema`),
  CONSTRAINT `Gabarito_ibfk_1` FOREIGN KEY (`id_Problema`) REFERENCES `Problema` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gabarito`
--

LOCK TABLES `Gabarito` WRITE;
/*!40000 ALTER TABLE `Gabarito` DISABLE KEYS */;
INSERT INTO `Gabarito` VALUES (1,'for (var count = 0; count < 10; count++) {\r\n  window.alert(\'Caracol\');\r\n}\r\n',1,'2018-03-15 19:29:36'),(2,'var A, B, C;\r\n\r\n\r\nA = 4;\r\nB = 6;\r\nC = A + B;\r\nwindow.alert(C);\r\n',2,'2018-03-15 19:34:47'),(3,'var A;\r\n\r\n\r\nA = \'teste\';\r\nfor (var count = 0; count < 10; count++) {\r\n  window.alert(A);\r\n}\r\n',3,'2018-03-15 19:36:51'),(4,'var i;\r\n\r\n\r\nvar i_inc = 1;\r\nif (i > 100) {\r\n  i_inc = -i_inc;\r\n}\r\nfor (i = i; i_inc >= 0 ? i <= 100 : i >= 100; i += i_inc) {\r\n  if (i % 2 == 0) {\r\n    window.alert(i);\r\n  }\r\n}\r\n',4,'2018-03-15 19:39:27'),(5,'window.alert(\'Professor\');\r\n',5,'2018-03-15 19:40:48'),(6,'window.alert(\'Chico\');\r\n',6,'2018-03-15 19:44:11'),(7,'window.alert(\'Teste\');\r\n',7,'2018-03-15 19:46:13'),(8,'window.alert(\'Caracol\'.length);\r\n',8,'2018-03-15 19:47:19'),(9,'window.alert(\'Azul\');\r\n',9,'2018-03-15 19:49:33'),(10,'var A;\r\n\r\n\r\nwindow.alert(\'Computador\'.length);\r\n',10,'2018-03-15 19:50:47'),(11,'window.alert(\'teste\');\r\n',11,'2018-03-15 20:06:46'),(12,'window.alert(\'Avila\');\r\n',12,'2018-03-15 20:07:14'),(13,'window.alert(\'Caracol\'.length);\r\n',13,'2018-03-15 20:07:47'),(14,'var A;\r\n\r\n\r\nA = \'Teste\';\r\nfor (var count = 0; count < 10; count++) {\r\n  window.alert(\'\');\r\n}\r\n',14,'2018-03-15 20:16:39'),(15,'window.alert(\'Problema\');\r\n',15,'2018-03-15 20:17:36'),(16,'window.alert(\'Caracol\'.length);\r\n',16,'2018-03-15 20:19:04'),(17,'window.alert(\'Vamos trabalhar amiguinhos\');\r\n',17,'2018-03-15 20:19:55'),(18,'var A;\r\n\r\n\r\nA = \'Teste\';\r\nwindow.alert(A);\r\n',18,'2018-03-15 20:21:34'),(19,'window.alert(\'Cammy\');\r\n',19,'2018-03-15 20:22:59'),(20,'window.alert(\'Carnavral\');\r\n',20,'2018-03-15 20:23:55'),(21,'window.alert(\'Teste\');\r\n',21,'2018-03-21 14:00:16'),(22,'window.alert(\'abc\');\r\n',22,'2018-03-21 14:02:16'),(23,'var A;\r\n\r\n\r\nA = 0;\r\nfor (var count = 0; count < 100; count++) {\r\n  if (A % 2 == 0) {\r\n    window.alert(A);\r\n  }\r\n  A = A + 1;\r\n}\r\n',23,'2018-03-21 14:09:04'),(24,'window.alert(\'Chico\');\r\n',24,'2018-03-21 23:17:04'),(25,'window.alert(\'Chico\');\r\n',25,'2018-03-21 23:18:50');
/*!40000 ALTER TABLE `Gabarito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Problema`
--

DROP TABLE IF EXISTS `Problema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_Problema` text,
  `id_Professor` int(11) DEFAULT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `classificacao` varchar(10) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_Professor` (`id_Professor`),
  CONSTRAINT `Problema_ibfk_1` FOREIGN KEY (`id_Professor`) REFERENCES `Professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Problema`
--

LOCK TABLES `Problema` WRITE;
/*!40000 ALTER TABLE `Problema` DISABLE KEYS */;
INSERT INTO `Problema` VALUES (1,'Imprimir 10 vezes a palavra \"Caracol\"',1,'Estrutura de repetiÃ§Ã£o','fÃ¡cil','2018-03-15 19:29:36'),(2,'Crie uma variÃ¡vel A com o valor 4, uma variÃ¡vel B com o valor 6, e uma variÃ¡vel C com a soma das 2 outras variÃ¡veis, no final imprima o valor da variÃ¡vel C',1,'VariÃ¡veis e operadores','fÃ¡cil','2018-03-15 19:34:47'),(3,'Crie uma variÃ¡vel A com o valor \"teste\" imprima ela 10 vezes',1,'Estrutura de repetiÃ§Ã£o','fÃ¡cil','2018-03-15 19:36:51'),(4,'imprima os nÃºmeros pares de 0 a 100',1,'Estrutura de repetiÃ§Ã£o e seleÃ§Ã£o','fÃ¡cil','2018-03-15 19:39:27'),(5,'Imprima a palavra \"Professor\"',1,'Texto','fÃ¡cil','2018-03-15 19:40:48'),(6,'Imprima a palavra \"Chico\"',1,'inicio','fÃ¡cil','2018-03-15 19:44:11'),(7,'Imprima a palavra teste',1,'teste','fÃ¡cil','2018-03-15 19:46:13'),(8,'Imprima o tamanho da palavra \"Caracol\"',1,'funÃ§Ã£o','fÃ¡cil','2018-03-15 19:47:19'),(9,'Imprima a palavra \"Azul\"',1,'inicio','fÃ¡cil','2018-03-15 19:49:33'),(10,'Imprima o tamanho da palavra \"Computador\"',1,'inicio','fÃ¡cil','2018-03-15 19:50:47'),(11,'Imprimir palavra teste',2,'inicio','fÃ¡cil','2018-03-15 20:06:46'),(12,'imprimir palavra \"Avila\"',2,'inicio','fÃ¡cil','2018-03-15 20:07:13'),(13,'imprimir tamanho da palavra Caracol',2,'inicio','fÃ¡cil','2018-03-15 20:07:47'),(14,'Crie uma variÃ¡vel A com o valor \"teste\" imprima ela 10 vezes',2,'RepetiÃ§Ã£o','fÃ¡cil','2018-03-15 20:16:39'),(15,'Imprima a palavra \"Problema\"',2,'ttest','fÃ¡cil','2018-03-15 20:17:36'),(16,'Imprima o tamanho da palavra \"Caracol\"',2,'funÃ§Ã£o','fÃ¡cil','2018-03-15 20:19:04'),(17,'Imprima a Frase \"Vamos trabalhar amiguinhos\"',2,'Texto','fÃ¡cil','2018-03-15 20:19:55'),(18,'crie uma variÃ¡vel A com o valor \"teste\" e imprima ela',2,'VariÃ¡veis','fÃ¡cil','2018-03-15 20:21:34'),(19,'imrprima a palavra \"Cammy\"',2,'inicio','fÃ¡cil','2018-03-15 20:22:59'),(20,'Imprima a palavra \"Carnavral\"',2,'inicio','fÃ¡cil','2018-03-15 20:23:55'),(21,'imprima \"teste\"',3,'teste','fÃ¡cil','2018-03-21 14:00:16'),(22,'imprima \"Azul\"',3,'azul','fÃ¡cil','2018-03-21 14:02:16'),(23,'crie uma variÃ¡vel A iniciada com 0, imprima o seu valor se for par atÃ© 100.',3,'repeti','mÃ©dio','2018-03-21 14:09:04'),(24,NULL,1,NULL,NULL,'2018-03-21 23:17:04'),(25,NULL,1,NULL,NULL,'2018-03-21 23:18:50');
/*!40000 ALTER TABLE `Problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Problema_Atividade`
--

DROP TABLE IF EXISTS `Problema_Atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Problema_Atividade` (
  `id_atividade` int(11) DEFAULT NULL,
  `id_problema` int(11) DEFAULT NULL,
  KEY `id_atividade` (`id_atividade`),
  KEY `id_problema` (`id_problema`),
  CONSTRAINT `Problema_Atividade_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `Atividade` (`id`),
  CONSTRAINT `Problema_Atividade_ibfk_2` FOREIGN KEY (`id_problema`) REFERENCES `Problema` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Problema_Atividade`
--

LOCK TABLES `Problema_Atividade` WRITE;
/*!40000 ALTER TABLE `Problema_Atividade` DISABLE KEYS */;
INSERT INTO `Problema_Atividade` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(2,6),(2,7),(2,8),(2,9),(2,10),(3,1),(3,3),(3,4),(3,6),(3,8),(4,2),(4,4),(4,6),(4,8),(4,10),(5,11),(5,12),(5,13),(5,14),(6,12),(6,14),(6,15),(6,17);
/*!40000 ALTER TABLE `Problema_Atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Problema_Atividade_Respondido`
--

DROP TABLE IF EXISTS `Problema_Atividade_Respondido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Problema_Atividade_Respondido` (
  `id_Atividade` int(11) DEFAULT NULL,
  `id_Aluno` int(11) DEFAULT NULL,
  `id_Problema` int(11) DEFAULT NULL,
  KEY `id_Atividade` (`id_Atividade`),
  KEY `id_Aluno` (`id_Aluno`),
  KEY `id_Problema` (`id_Problema`),
  CONSTRAINT `Problema_Atividade_Respondido_ibfk_1` FOREIGN KEY (`id_Atividade`) REFERENCES `Atividade` (`id`),
  CONSTRAINT `Problema_Atividade_Respondido_ibfk_2` FOREIGN KEY (`id_Aluno`) REFERENCES `Aluno` (`id`),
  CONSTRAINT `Problema_Atividade_Respondido_ibfk_3` FOREIGN KEY (`id_Problema`) REFERENCES `Problema` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Problema_Atividade_Respondido`
--

LOCK TABLES `Problema_Atividade_Respondido` WRITE;
/*!40000 ALTER TABLE `Problema_Atividade_Respondido` DISABLE KEYS */;
INSERT INTO `Problema_Atividade_Respondido` VALUES (3,1,1),(3,1,6);
/*!40000 ALTER TABLE `Problema_Atividade_Respondido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Professor`
--

DROP TABLE IF EXISTS `Professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professor`
--

LOCK TABLES `Professor` WRITE;
/*!40000 ALTER TABLE `Professor` DISABLE KEYS */;
INSERT INTO `Professor` VALUES (1,'20162TIJG0545','Wesley Silva','wesleyceni99@gmail.com','$2y$10$skGOWLPvNSC1i2bw21S6qezh8VUKsLxhEWXnBj6Cej8CP808BPcRe',1,'2018-03-15 18:26:16'),(2,'20141TIJG8000','Francisco Junior','chico@gmail.com','$2y$10$GE6zdBRQh.HW32H1vyZDJOBT/aA7G8A4EUpFjb8OJ067MYbEWWvE.',1,'2018-03-15 18:52:41'),(3,'20181TIJG0623','Luciano Cabral','lulu@gmail.com','$2y$10$2UplWF7.Su2N8INNT30zH.1sC9R.DmJO.LN02OL4QCxsjZQxJiPi.',1,'2018-03-15 18:54:44'),(4,'20162TIJG0546','Diego Queiroz','dieguinho@gmail.com','$2y$10$pPTGd9RP6gJf.Kk4SPrEVOjJvpOZU5yu2hLaFtcphr3mesbWXAiEu',1,'2018-03-15 18:55:47');
/*!40000 ALTER TABLE `Professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resposta_Aluno`
--

DROP TABLE IF EXISTS `Resposta_Aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Resposta_Aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_resposta` text,
  `id_Aluno` int(11) DEFAULT NULL,
  `id_Problema` int(11) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_Aluno` (`id_Aluno`),
  KEY `id_Problema` (`id_Problema`),
  CONSTRAINT `Resposta_Aluno_ibfk_1` FOREIGN KEY (`id_Aluno`) REFERENCES `Aluno` (`id`),
  CONSTRAINT `Resposta_Aluno_ibfk_2` FOREIGN KEY (`id_Problema`) REFERENCES `Problema` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resposta_Aluno`
--

LOCK TABLES `Resposta_Aluno` WRITE;
/*!40000 ALTER TABLE `Resposta_Aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `Resposta_Aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resposta_Aluno_Problema_Atividade`
--

DROP TABLE IF EXISTS `Resposta_Aluno_Problema_Atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Resposta_Aluno_Problema_Atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_resposta` text,
  `correcao` tinyint(1) DEFAULT NULL,
  `id_Aluno` int(11) DEFAULT NULL,
  `id_Problema` int(11) DEFAULT NULL,
  `id_Atividade` int(11) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_Aluno` (`id_Aluno`),
  KEY `id_Problema` (`id_Problema`),
  KEY `id_Atividade` (`id_Atividade`),
  CONSTRAINT `Resposta_Aluno_Problema_Atividade_ibfk_1` FOREIGN KEY (`id_Aluno`) REFERENCES `Aluno` (`id`),
  CONSTRAINT `Resposta_Aluno_Problema_Atividade_ibfk_2` FOREIGN KEY (`id_Problema`) REFERENCES `Problema` (`id`),
  CONSTRAINT `Resposta_Aluno_Problema_Atividade_ibfk_3` FOREIGN KEY (`id_Atividade`) REFERENCES `Atividade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resposta_Aluno_Problema_Atividade`
--

LOCK TABLES `Resposta_Aluno_Problema_Atividade` WRITE;
/*!40000 ALTER TABLE `Resposta_Aluno_Problema_Atividade` DISABLE KEYS */;
INSERT INTO `Resposta_Aluno_Problema_Atividade` VALUES (2,'for (var count = 0; count < 10; count++) {\r\n  window.alert(\'Caracol\');\r\n}\r\n',1,1,1,3,'2018-04-03 04:50:03'),(3,'window.alert(\'Chico\');\r\n',1,1,6,3,'2018-04-03 05:05:41'),(4,'for (var count = 0; count < 0; count++) {\r\n}\r\n',0,1,1,3,'2018-04-03 05:40:17'),(5,'window.alert(\'Chico\');\r\n',1,1,6,3,'2018-04-03 05:42:37');
/*!40000 ALTER TABLE `Resposta_Aluno_Problema_Atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Turma`
--

DROP TABLE IF EXISTS `Turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Professor` int(11) DEFAULT NULL,
  `desc_Turma` varchar(200) DEFAULT NULL,
  `data_Alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_Professor` (`id_Professor`),
  CONSTRAINT `Turma_ibfk_1` FOREIGN KEY (`id_Professor`) REFERENCES `Professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Turma`
--

LOCK TABLES `Turma` WRITE;
/*!40000 ALTER TABLE `Turma` DISABLE KEYS */;
INSERT INTO `Turma` VALUES (1,1,'LÃ³gica tarde 2018.1','2018-03-15 19:26:35'),(2,1,'LÃ³gica Noite 2018.1','2018-03-15 19:27:04'),(3,2,'logica tarde 2018.1','2018-03-15 20:01:22'),(4,2,'logica noite 2018.1','2018-03-15 20:01:42');
/*!40000 ALTER TABLE `Turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-03 22:12:34
