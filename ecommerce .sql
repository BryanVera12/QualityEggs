-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kEmail` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'clientenom','clienteapell','cliente@gmail.com','cliente','4983a0ab83ed86e0e7213c8783940193','av. cliente',974125401),(2,'cliente2nom','cliente2apell','cliente2@gmail.com','cliente2','6dcd0e14f89d67e397b9f52bb63f5570','av. cliente2',912004753),(3,'Alexander','Vera','adhopper@bellsouth.net','cliente3','428e859901e1b27ec01c7921afc31d98','Mz S Lote 20 San Gabriel Alto, VMT',981324925),(4,'Bryan','Leon','contaadisneyparavocett@gmail.com','cliente4','7bec9c4e6c240015c5dc9a788de26df0','Mz S Lote 20 San Gabriel Alto, VMT',964567867);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventas`
--

DROP TABLE IF EXISTS `detalleventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `id_venta` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventas`
--

LOCK TABLES `detalleventas` WRITE;
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
INSERT INTO `detalleventas` VALUES (1,2,20,1,7,7),(2,3,20,1,14,14),(3,3,21,4,14,56),(4,2,21,2,7,14),(5,2,22,3,7,21),(6,3,22,1,14,14),(7,2,23,2,7,14),(8,3,24,5,14,70),(9,3,25,5,14,70),(10,3,26,5,14,70),(11,2,30,5,7,35),(12,3,30,5,14,70),(13,3,31,5,14,70),(14,2,31,1,7,7),(15,3,32,1,14,14),(16,2,32,1,7,7),(17,2,34,1,7,7),(18,3,34,1,14,14),(19,2,35,10,7,70),(20,3,36,1,14,14),(21,3,37,2,14,28);
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(250) NOT NULL,
  `filesize` int NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'huevos_blancos.jpg',5527,'/uploads/1.jpg','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/1.png'),(2,'huevos_corral.png',143172,'/uploads/2.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/2.png'),(3,'huevos_codorniz.png',152692,'/uploads/3.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/3.png'),(4,'huevos_corral.png',143172,'/uploads/4.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/4.png'),(5,'huevos_corral.png',143172,'/uploads/5.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/5.png'),(6,'huevos_corral.png',143172,'/uploads/6.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/6.png'),(7,'huevos_codorniz.png',152692,'/uploads/7.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/7.png'),(8,'huevos_codorniz.png',152692,'/uploads/8.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/8.png'),(9,'huevos_corral.png',143172,'/uploads/9.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/9.png'),(10,'huevos_corral.png',143172,'/uploads/10.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/10.png'),(11,'huevos_codorniz.png',152692,'/uploads/11.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/11.png'),(12,'huevos_corral.png',143172,'/uploads/12.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/12.png'),(13,'Huevos_blancos.png',193658,'/uploads/13.png','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/13.png'),(14,'huevos_jumbo.jpg',20232,'/uploads/14.jpg','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/14.png'),(15,'Huevos_super_jumbo.jpg',31309,'/uploads/15.jpg','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/15.png'),(16,'Huevos_pardos.jpg',58612,'/uploads/16.jpg','http://qualityeggs-env.eba-tayenpfx.us-east-1.elasticbeanstalk.com/ecommerce/uploads/16.png');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `stock` int NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,'Huevos Corral',7,20,'Huevos provenientes directamente de los corrales, directo a la mesa para platos mas deliciosos.'),(3,'Huevos Codorniz',14,21,'Huevos de codorniz con fuente rica de proteínas y minerales, ideal para colegiales a temprana edad como lonchera para el colegio.'),(4,'Huevos Blancos',8,40,'Fuente de proteínas, vitaminas y minerales.  Fecha de vencimiento y Código de trazabilidad (permiten conocer el histórico, la ubicación y la trayectoria del huevo).  Empaque ecológico, seguro y resistente. Fácil de almacenar y apilar.'),(5,'Huevos Pardos Jumbo',17,30,'10 % más grandes.   Fuente de proteínas, vitaminas y minerales.  Código de trazabilidad (permiten conocer el histórico, la ubicación y la trayectoria del huevo).  Empaque seguro y resistente. Fácil de almacenar y apilar. '),(6,'Huevos Super Jumbo',20,55,'20 % más grandes..  Fuente de proteínas, vitaminas y minerales.  Código de trazabilidad (permiten conocer el histórico, la ubicación y la trayectoria del huevo).  Empaque seguro y resistente. Fácil de almacenar y apilar. '),(7,'Huevos Pardos',13,45,'Fuente de proteínas, vitaminas y minerales.  Código de trazabilidad (permiten conocer el histórico, la ubicación y la trayectoria del huevo).  Empaque ecológico, seguro y resistente. Fácil de almacenar y apilar.');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_files`
--

DROP TABLE IF EXISTS `productos_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos_files` (
  `producto_id` int NOT NULL,
  `file_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_files`
--

LOCK TABLES `productos_files` WRITE;
/*!40000 ALTER TABLE `productos_files` DISABLE KEYS */;
INSERT INTO `productos_files` VALUES (2,10),(3,3),(2,11),(2,12),(4,13),(5,14),(6,15),(7,16);
/*!40000 ALTER TABLE `productos_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibe`
--

DROP TABLE IF EXISTS `recibe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recibe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idCli` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fkidCli` (`idCli`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibe`
--

LOCK TABLES `recibe` WRITE;
/*!40000 ALTER TABLE `recibe` DISABLE KEYS */;
INSERT INTO `recibe` VALUES (1,1,'clientenom','cliente@gmail.com','av. cliente');
/*!40000 ALTER TABLE `recibe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Bryan','Vera','bryan.vera@unmsm.edu.pe','admin','21232f297a57a5a743894a0e4a801fc3','Administrador'),(2,'Alex','Saavedra','alex_trabajador@gmail.com','alex','534b44a19bf18d20b71ecc4eb77c572f','Almacenero'),(3,'Alexander','Vera','bleonv02@hotmail.com','alexander','dd22141acb5ea065acd5ed773729c98f','Vendedor');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_pago` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkid_cliente` (`id_cliente`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (37,1,'ch_3JXYPyL7MVVlH7n71Cu1bEcC','2021-09-08'),(20,1,'ch_3JXDEgL7MVVlH7n71LBaQAjF','2021-09-07'),(21,1,'ch_3JXDhZL7MVVlH7n702BMKkWf','2021-09-07'),(22,1,'ch_3JXDtrL7MVVlH7n70p2RKmXy','2021-09-07'),(23,1,'ch_3JXJ31L7MVVlH7n71pXlMO9D','2021-09-08'),(24,1,'ch_3JXMsPL7MVVlH7n71ayZIgoz','2021-09-08'),(25,1,'ch_3JXMwBL7MVVlH7n70E9HUSZ1','2021-09-08'),(26,1,'ch_3JXMxlL7MVVlH7n70ptkA537','2021-09-08'),(27,1,'ch_3JXN1SL7MVVlH7n70xqV4Ug5','2021-09-08'),(28,1,'ch_3JXN3fL7MVVlH7n71YAJu4id','2021-09-08'),(29,1,'ch_3JXN4TL7MVVlH7n70V7pK80X','2021-09-08'),(30,1,'ch_3JXN7LL7MVVlH7n71PIuJfbG','2021-09-08'),(31,1,'ch_3JXN92L7MVVlH7n71yD1Rq0E','2021-09-08'),(32,1,'ch_3JXNDAL7MVVlH7n70bLeH3CG','2021-09-08'),(33,1,'ch_3JXNHcL7MVVlH7n70w5MpAz5','2021-09-08'),(34,1,'ch_3JXNJJL7MVVlH7n70H8NVCQy','2021-09-08'),(35,1,'ch_3JXPRRL7MVVlH7n71LobYInJ','2021-09-08'),(36,1,'ch_3JXPW5L7MVVlH7n70okz4Yuc','2021-09-08');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-08 18:18:32
