-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sistema-advocacia-php
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `sistema-advocacia-php`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sistema-advocacia-php` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sistema-advocacia-php`;

--
-- Table structure for table `acao_usuario`
--

DROP TABLE IF EXISTS `acao_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acao_usuario` (
  `id_acao_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `acao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `cliente_id` bigint(20) unsigned DEFAULT NULL,
  `processo_id` bigint(20) unsigned DEFAULT NULL,
  `endereco_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_acao_usuario`),
  KEY `acao_usuario_usuario_id_foreign` (`usuario_id`),
  KEY `acao_usuario_cliente_id_foreign` (`cliente_id`),
  KEY `acao_usuario_processo_id_foreign` (`processo_id`),
  KEY `acao_usuario_endereco_id_foreign` (`endereco_id`),
  CONSTRAINT `acao_usuario_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `acao_usuario_endereco_id_foreign` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `acao_usuario_processo_id_foreign` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `acao_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acao_usuario`
--

LOCK TABLES `acao_usuario` WRITE;
/*!40000 ALTER TABLE `acao_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `acao_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escolaridade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cliente_cpf_unique` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (15,'teste 1','124.545.678-97','asdsdaads','asdasd','asdsdaads','2022-06-13','F',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id_endereco` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rua` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_residencial` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone_celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `endereco_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `endereco_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processo`
--

DROP TABLE IF EXISTS `processo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processo` (
  `id_processo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `processo` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_processo_id` bigint(20) unsigned NOT NULL,
  `observacao` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `situacao_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_processo`),
  KEY `processo_tipo_processo_id_foreign` (`tipo_processo_id`),
  KEY `processo_cliente_id_foreign_idx` (`cliente_id`),
  CONSTRAINT `processo_cliente_id_foreign_idx` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processo`
--

LOCK TABLES `processo` WRITE;
/*!40000 ALTER TABLE `processo` DISABLE KEYS */;
INSERT INTO `processo` VALUES (9,'1',24,'asas',NULL,NULL,'2022-06-21',15,6);
/*!40000 ALTER TABLE `processo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_processos`
--

DROP TABLE IF EXISTS `tipo_processos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_processos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_processos`
--

LOCK TABLES `tipo_processos` WRITE;
/*!40000 ALTER TABLE `tipo_processos` DISABLE KEYS */;
INSERT INTO `tipo_processos` VALUES (1,'Apos. Pessoa com Def. Por Idade','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(2,'Apos. Idade Rural','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(3,'Apos. Idade Urbana','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(4,'Apos. Tempo Cont','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(5,'Cancelar CTC','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(6,'CTC','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(7,'Apresentar Defesa - MOB','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(8,'Apuração Bat. Contínuo / MDS','2022-04-28 21:29:36','2022-04-28 21:29:36',''),(9,'Alt. Local ou Forma Pgto','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(10,'Cadastrar ou Renovar Procuração','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(11,'Reativar Benefício','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(12,'Solicitar Cert. Inexistência Dep. Habil. Pensão','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(13,'Solicitar Desistência do Benefício','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(14,'Solicitar Pgto de Benefício Não Recebido','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(15,'Pedido de Prorrog. com Doc. Médico','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(16,'Solicitação de Acréscimo de 25 %','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(17,'Benefício Assist. ao Idoso','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(18,'Aux. Reclusão','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(19,'Aux. Reclusão','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(20,'Pensão','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(21,'Cópia de Processo','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(22,'Recurso','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(23,'Revisão','2022-04-28 21:29:37','2022-04-28 21:29:37',''),(24,'Revisão de CTC','2022-04-28 21:29:37','2022-04-28 21:29:37','');
/*!40000 ALTER TABLE `tipo_processos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$1$ZkKaqTS3$giYfnf4PG.sEk/W.SQI1N/',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','ADMINISTRADOR','admin@email.com','$1$ZkKaqTS3$giYfnf4PG.sEk/W.SQI1N/',NULL,NULL,1),(3,'teste','teste','ATENDENTE','teste@email.com','$1$ZkKaqTS3$giYfnf4PG.sEk/W.SQI1N/',NULL,NULL,1),(4,'estagiario','estagiario','ESTÁGIARIO','estagiario@email.com','$1$ZkKaqTS3$giYfnf4PG.sEk/W.SQI1N/',NULL,NULL,1),(5,'jovem','jovem','ADMINISTRADOR','jovem@email.com','$1$ZkKaqTS3$giYfnf4PG.sEk/W.SQI1N/',NULL,NULL,1);
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

-- Dump completed on 2022-06-30 18:34:07
