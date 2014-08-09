CREATE DATABASE  IF NOT EXISTS `fruits` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fruits`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: fruits
-- ------------------------------------------------------
-- Server version	5.7.3-m13

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
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent` (
  `agent_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '代理id',
  `agent_name` varchar(50) DEFAULT NULL COMMENT '代理姓名',
  `agent_tel` varchar(25) DEFAULT NULL COMMENT '代理联系电话',
  `agent_password` varchar(50) DEFAULT NULL COMMENT '代理登陆密码',
  `village_id` int(8) DEFAULT NULL COMMENT '小区id',
  `village_position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
INSERT INTO `agent` VALUES (1,NULL,'15868842773','123456',16,NULL);
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_import_order`
--

DROP TABLE IF EXISTS `agent_import_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_import_order` (
  `agent_import_order_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '代理要求进货订单Id',
  `agent_id` int(8) DEFAULT NULL COMMENT '代理id',
  `village_id` varchar(200) DEFAULT NULL COMMENT '小区姓名 ',
  `agent_import_order_remarks` text COMMENT '备注',
  `agent_import_order_date` date DEFAULT NULL COMMENT '代理下单时间',
  `examine` int(1) DEFAULT '0' COMMENT '是否审核通过  如果直接是1就相当于总部发货',
  `handle` int(1) DEFAULT '0' COMMENT '是否接收',
  PRIMARY KEY (`agent_import_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_import_order`
--

LOCK TABLES `agent_import_order` WRITE;
/*!40000 ALTER TABLE `agent_import_order` DISABLE KEYS */;
INSERT INTO `agent_import_order` VALUES (1,1,'10',NULL,'2014-08-01',0,1),(2,1,'10',NULL,'2014-08-01',0,1),(3,1,'10',NULL,'2014-08-01',0,0),(4,1,'10',NULL,'2014-08-02',0,0),(5,NULL,NULL,NULL,'2014-08-02',0,0),(6,1,'0',NULL,'2014-08-03',0,0);
/*!40000 ALTER TABLE `agent_import_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_import_order_detail`
--

DROP TABLE IF EXISTS `agent_import_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_import_order_detail` (
  `agent_import_order_detail_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '代理要求进货订单具体项Id',
  `agent_import_order_id` int(8) DEFAULT NULL COMMENT '代理要求进货订单Id',
  `type_name` varchar(50) DEFAULT NULL COMMENT '品种名称',
  `order_amount` int(11) COMMENT '下单数量',
  `actual_amount` int(11) COMMENT '实际数量',
  `agent_import_order_detail_remarks` text COMMENT '备注',
  PRIMARY KEY (`agent_import_order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_import_order_detail`
--

LOCK TABLES `agent_import_order_detail` WRITE;
/*!40000 ALTER TABLE `agent_import_order_detail` DISABLE KEYS */;
INSERT INTO `agent_import_order_detail` VALUES (1,3,'苹果',10,10,NULL),(2,3,'凤梨',11,11,NULL),(3,4,'苹果',10,0,NULL),(4,4,'凤梨',11,0,NULL),(5,6,'水果',100,0,NULL),(6,6,'苹果',200,0,NULL);
/*!40000 ALTER TABLE `agent_import_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_import_order_show`
--

DROP TABLE IF EXISTS `agent_import_order_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_import_order_show` (
  `agent_import_order_show_id` int(8) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  `weight` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`agent_import_order_show_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_import_order_show`
--

LOCK TABLES `agent_import_order_show` WRITE;
/*!40000 ALTER TABLE `agent_import_order_show` DISABLE KEYS */;
INSERT INTO `agent_import_order_show` VALUES (1,'水果',100.00),(2,'苹果',200.00);
/*!40000 ALTER TABLE `agent_import_order_show` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_order_detail`
--

DROP TABLE IF EXISTS `book_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_order_detail` (
  `book_order_detail_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '预购订单id',
  `book_order_show_id` int(8) DEFAULT NULL COMMENT '预购id',
  `user_id` int(8) DEFAULT NULL COMMENT '客户Id',
  `book_order_detail_amout` int(11) DEFAULT NULL COMMENT '下单数量',
  `book_order_detail_price` float(11,2) DEFAULT NULL COMMENT '下单时单价',
  `book_order_detail_totalmoney` float(11,2) DEFAULT NULL COMMENT '下单金额',
  `book_order_actual_amout` int(11) DEFAULT NULL COMMENT '实际数量',
  `book_order_actual_totalmoney` float(11,2) DEFAULT NULL COMMENT '实际金额',
  `book_order_detail_starttime` datetime DEFAULT NULL COMMENT '下单时间',
  `book_order_detail_remarks` text COMMENT '备注',
  `book_order_detail_sendtime` datetime DEFAULT NULL COMMENT '配送时间',
  `book_order_detail_state` varchar(20) DEFAULT '0' COMMENT '订单状态',
  `user_address_id` int(8) DEFAULT NULL,
  `book_order_detail_weight` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`book_order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200000039 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_order_detail`
--

LOCK TABLES `book_order_detail` WRITE;
/*!40000 ALTER TABLE `book_order_detail` DISABLE KEYS */;
INSERT INTO `book_order_detail` VALUES (200000000,1,1,1,1.00,1.00,75,1.00,'2014-07-28 14:59:13','1','2014-08-08 14:59:23','1',1,NULL),(200000020,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:42:49','0','0000-00-00 00:00:00','0',12,NULL),(200000021,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:42:49','0','0000-00-00 00:00:00','0',12,NULL),(200000022,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:42:49','0','0000-00-00 00:00:00','0',12,NULL),(200000023,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:42:49','0','0000-00-00 00:00:00','0',12,NULL),(200000024,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:53:33','0','0000-00-00 00:00:00','0',12,NULL),(200000025,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:54:25','0','0000-00-00 00:00:00','0',12,NULL),(200000026,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:58:54','这是备注','0000-00-00 00:00:00','0',12,NULL),(200000027,1,1,2,10.00,20.00,NULL,NULL,'2014-08-06 20:58:54','这是备注','0000-00-00 00:00:00','0',12,NULL),(200000028,1,1,3,10.00,30.00,NULL,NULL,'2014-08-06 23:50:32','','0000-00-00 00:00:00','0',12,NULL),(200000029,1,1,4,10.00,40.00,NULL,NULL,'2014-08-06 23:50:58','','0000-00-00 00:00:00','0',12,NULL),(200000030,1,1,5,10.00,50.00,NULL,NULL,'2014-08-06 23:51:22','','0000-00-00 00:00:00','0',12,NULL),(200000031,1,1,2,10.00,20.00,NULL,NULL,'2014-08-07 02:16:23','','0000-00-00 00:00:00','0',12,NULL),(200000032,1,1,2,10.00,20.00,NULL,NULL,'2014-08-07 02:16:23','','0000-00-00 00:00:00','0',12,NULL),(200000033,1,1,2,10.00,20.00,NULL,NULL,'2014-08-07 02:17:36','','0000-00-00 00:00:00','0',12,NULL),(200000034,1,1,2,10.00,20.00,NULL,NULL,'2014-08-07 02:17:36','','0000-00-00 00:00:00','0',12,NULL),(200000035,1,10000,2,10.00,20.00,NULL,NULL,'2014-08-07 15:27:46','','0000-00-00 00:00:00','0',16,NULL),(200000036,1,10000,3,20.00,60.00,NULL,NULL,'2014-08-08 03:46:54','','0000-00-00 00:00:00','0',17,NULL),(200000037,800000001,10000,2,20.00,40.00,NULL,NULL,'2014-08-08 03:53:57','','0000-00-00 00:00:00','0',17,NULL),(200000038,800000001,10000,10,20.00,200.00,NULL,NULL,'2014-08-08 11:47:33','','0000-00-00 00:00:00','0',17,NULL);
/*!40000 ALTER TABLE `book_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_order_show`
--

DROP TABLE IF EXISTS `book_order_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_order_show` (
  `book_order_show_id` int(8) NOT NULL AUTO_INCREMENT,
  `book_order_picture` varchar(200) DEFAULT NULL COMMENT '预购图片',
  `fruits_type_id` int(8) DEFAULT NULL COMMENT '品种id',
  `book_order_total` int(11) DEFAULT NULL COMMENT '预购报名人数',
  `book_order_send_time` date DEFAULT NULL COMMENT '发货时间',
  `book_order_disable` int(1) DEFAULT '0',
  `pay_mode` int(2) DEFAULT NULL COMMENT '0是货到付款，1是网页支付',
  `book_order_order` int(8) DEFAULT NULL,
  `book_order_remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`book_order_show_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_order_show`
--

LOCK TABLES `book_order_show` WRITE;
/*!40000 ALTER TABLE `book_order_show` DISABLE KEYS */;
INSERT INTO `book_order_show` VALUES (800000001,NULL,700000001,100,'2014-08-16',0,NULL,NULL,NULL),(800000002,'../upload/book_order/container_bg.png',700000002,50,'2014-08-21',0,NULL,NULL,'好');
/*!40000 ALTER TABLE `book_order_show` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `wa_book_order` BEFORE UPDATE ON `book_order_show` FOR EACH ROW if new.book_order_disable =1 then
if ((select max(book_order_order) from book_order where book_order_disable=1)=null) then
set new.book_order_order = 0;
else
set new.book_order_order = (select max(book_order_order) from book_order where book_order_disable=1) +1;
end if;
else
set new.book_order_order = null;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `fruits_type_id` int(8) DEFAULT NULL COMMENT '通用id',
  `user_id` int(8) DEFAULT NULL COMMENT '客户Id',
  `user_name` varchar(50) DEFAULT NULL COMMENT '客户姓名',
  `comment_marks` decimal(11,2) DEFAULT NULL COMMENT '评论分数',
  `comment_content` varchar(200) DEFAULT NULL COMMENT '评论内容',
  `comment_picture` varchar(200) DEFAULT NULL COMMENT '评论照片',
  `comment_time` datetime DEFAULT NULL COMMENT '评论时间',
  `comment_disable` tinyint(1) DEFAULT NULL COMMENT '评论可见',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(2,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(3,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(4,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(5,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(6,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(7,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(8,700000000,10000,NULL,3.00,NULL,NULL,'0000-00-00 00:00:00',NULL),(9,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 00:00:00',NULL),(10,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 00:00:00',NULL),(11,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:15:19',NULL),(12,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:19:39',NULL),(13,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:20:28',NULL),(14,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:21:45',NULL),(15,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:21:45',NULL),(16,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:26:49',NULL),(17,700000000,10000,NULL,3.00,NULL,NULL,'2014-08-08 03:26:49',NULL),(18,700000000,10000,NULL,3.00,'苹果不错',NULL,'2014-08-08 03:26:49',NULL),(19,700000000,10000,NULL,3.00,'苹果不错',NULL,'2014-08-08 03:26:49',NULL),(20,700000000,10000,NULL,3.00,'苹果不错',NULL,'2014-08-08 03:26:49',NULL),(21,800000001,10000,NULL,3.00,'梨子不错',NULL,'2014-08-08 03:55:56',NULL),(22,800000001,10000,NULL,3.00,'测试五星梨子',NULL,'2014-08-08 11:32:05',NULL),(23,800000001,10000,NULL,2.00,'2星梨子',NULL,'2014-08-08 11:36:20',NULL),(24,800000001,10000,NULL,2.00,'2星梨子',NULL,'2014-08-08 11:36:20',NULL),(25,800000001,10000,NULL,1.00,'1星梨子',NULL,'2014-08-08 11:36:59',NULL),(26,800000001,10000,NULL,2.00,'2星梨子',NULL,'2014-08-08 11:40:37',NULL),(27,600000001,10000,NULL,5.00,'五星大保健',NULL,'2014-08-08 11:42:18',NULL),(28,800000001,10000,NULL,5.00,'抢购的五星梨子',NULL,'2014-08-08 11:47:40',NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defective_goods_feedback`
--

DROP TABLE IF EXISTS `defective_goods_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defective_goods_feedback` (
  `defective_goods_feedback_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '次品反馈Id',
  `agent_id` int(8) COMMENT '代理Id',
  `agent_name` varchar(200) DEFAULT NULL COMMENT '代理姓名 ',
  `village_name` varchar(200) DEFAULT NULL COMMENT '小区名称',
  `defective_goods_feedback_detail` varchar(200) DEFAULT NULL COMMENT '次品反馈详情',
  `defective_goods_feedback_date` date COMMENT '次品反馈日期',
  PRIMARY KEY (`defective_goods_feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defective_goods_feedback`
--

LOCK TABLES `defective_goods_feedback` WRITE;
/*!40000 ALTER TABLE `defective_goods_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `defective_goods_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `discount_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '水果图片Id',
  `discount_name` varchar(200) COMMENT '优惠名称 ',
  `discount_type_id` int(8) COMMENT '优惠水果id',
  `discount_type_name` varchar(200) DEFAULT NULL COMMENT '优惠水果名称',
  `discount_type_price` float(11,2) COMMENT '原价',
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` VALUES (1,'中秋特惠',700000001,'梨子',100.00);
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_order_detail`
--

DROP TABLE IF EXISTS `export_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_order_detail` (
  `export_order_detail_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '出货订单具体项Id',
  `import_order_id` int(8) COMMENT '进货订单Id',
  `village_id` int(8) COMMENT '小区Id',
  `village_name` varchar(200) DEFAULT NULL COMMENT '小区姓名',
  `village_position` varchar(200) DEFAULT NULL COMMENT '小区位置',
  `type_id` int(8) COMMENT '品种id',
  `type_name` varchar(50) DEFAULT NULL COMMENT '品种名称',
  `export_order_amount` int(11) COMMENT '出货预期数量',
  `export_actual_amount` int(11) COMMENT '出货实际重量',
  PRIMARY KEY (`export_order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_order_detail`
--

LOCK TABLES `export_order_detail` WRITE;
/*!40000 ALTER TABLE `export_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fruits_class`
--

DROP TABLE IF EXISTS `fruits_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fruits_class` (
  `fruits_class_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '水果大类id',
  `fruits_class_name` varchar(50) DEFAULT NULL COMMENT '水果大类名称',
  `fruits_class_picture` varchar(100) DEFAULT NULL COMMENT '水果大类图片',
  `fruits_class_detail` text COMMENT '详情',
  `fruits_class_popularity` decimal(4,2) DEFAULT NULL COMMENT '人气',
  `fruits_class_disable` int(1) DEFAULT '0',
  `fruits_class_order` int(8) DEFAULT NULL,
  PRIMARY KEY (`fruits_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fruits_class`
--

LOCK TABLES `fruits_class` WRITE;
/*!40000 ALTER TABLE `fruits_class` DISABLE KEYS */;
INSERT INTO `fruits_class` VALUES (1,'葡萄','../upload/fruits_class/container_bg.png','好',10.00,0,NULL);
INSERT INTO `fruits_class` VALUES (2,'芒果','../upload/fruits_class/container_bg.png','好',20.00,0,NULL);
INSERT INTO `fruits_class` VALUES (3,'西瓜','../upload/fruits_class/container_bg.png','好',30.00,0,NULL);
INSERT INTO `fruits_class` VALUES (4,'苹果','../upload/fruits_class/container_bg.png','好',40.00,0,NULL);
INSERT INTO `fruits_class` VALUES (5,'未分类','../upload/fruits_class/container_bg.png','好',50.00,0,NULL);
/*!40000 ALTER TABLE `fruits_class` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `wa_class` BEFORE UPDATE ON `fruits_class` FOR EACH ROW if new.fruits_class_disable =1 then
if ((select max(fruits_class_order) from fruits_class where fruits_class_disable=1)=null) then
set new.fruits_class_order = 0;
else
set new.fruits_class_order = (select max(fruits_class_order) from fruits_class where fruits_class_disable=1) +1;
end if;
else
set new.fruits_class_order = null;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `fruits_type`
--

DROP TABLE IF EXISTS `fruits_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fruits_type` (
  `type_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '品种id',
  `type_name` varchar(50) DEFAULT NULL COMMENT '品种名称',
  `type_picture` varchar(100) DEFAULT NULL COMMENT '品种图片',
  `type_popularity` int(8) DEFAULT NULL COMMENT '人气',
  `type_price` decimal(11,2) DEFAULT NULL COMMENT '当前价格',
  `type_detail` text,
  `type_disable` int(1) DEFAULT '0',
  `type_order` int(8) DEFAULT '0',
  `type_remarks` varchar(200) DEFAULT NULL,
  `type_weight_measure` varchar(50) DEFAULT NULL,
  `fruits_class_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fruits_type`
--

LOCK TABLES `fruits_type` WRITE;
/*!40000 ALTER TABLE `fruits_type` DISABLE KEYS */;
INSERT INTO `fruits_type` VALUES (700000000,'巨峰葡萄','../upload/fruits_type/QQ截图20140711231255.png',10,10.00,'好',1,2,'好','斤',1),(700000001,'红提',NULL,NULL,20.00,NULL,1,4,NULL,'斤',1),(700000002,'鸡蛋芒',NULL,NULL,NULL,NULL,1,3,NULL,'个',2),(700000003,'泰芒',NULL,NULL,NULL,NULL,0,0,NULL,'个',2),(700000004,'不错的葡萄',NULL,NULL,NULL,NULL,0,0,NULL,'斤',1),(700000005,'荔枝',NULL,NULL,NULL,NULL,0,0,NULL,'斤',5),(700000006,'香蕉',NULL,NULL,NULL,NULL,0,0,NULL,'斤',5),(700000007,'哈密瓜',NULL,NULL,NULL,NULL,0,0,NULL,'个',5),(700000008,'木瓜',NULL,NULL,NULL,NULL,0,0,NULL,'个',5);
/*!40000 ALTER TABLE `fruits_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habit`
--

DROP TABLE IF EXISTS `habit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habit` (
  `habit_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '习惯Id',
  `user_id` int(8) DEFAULT NULL COMMENT '客户id',
  `type_id` int(8) DEFAULT NULL COMMENT '品种id',
  `order_detail_order_weight` decimal(11,2) DEFAULT NULL COMMENT '下单重量',
  `habit_starttime` date DEFAULT NULL COMMENT '起始时间',
  `habit_frequence` varchar(255) DEFAULT NULL COMMENT '配送频率',
  `habit_useful` int(2) DEFAULT NULL COMMENT '是否启用',
  PRIMARY KEY (`habit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habit`
--

LOCK TABLES `habit` WRITE;
/*!40000 ALTER TABLE `habit` DISABLE KEYS */;
/*!40000 ALTER TABLE `habit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_order`
--

DROP TABLE IF EXISTS `import_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import_order` (
  `import_order_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '进货订单Id',
  `import_fruit_market` varchar(50) DEFAULT NULL COMMENT '进货水果市场',
  `export_manager_name` varchar(50) DEFAULT NULL COMMENT '出货人姓名',
  `export_manager_tel` varchar(25) DEFAULT NULL COMMENT '出货人电话',
  `import_manager_name` varchar(50) COMMENT '进货人姓名',
  `import_manager_tel` varchar(25) DEFAULT NULL COMMENT '进货人电话',
  `order_totalmoney` decimal(11,2) DEFAULT NULL COMMENT '预期总金额',
  `import_order_state` varchar(20) DEFAULT NULL COMMENT '进货订单状态',
  PRIMARY KEY (`import_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_order`
--

LOCK TABLES `import_order` WRITE;
/*!40000 ALTER TABLE `import_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `import_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_order_detail`
--

DROP TABLE IF EXISTS `import_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import_order_detail` (
  `import_order_detail_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '进货订单具体项Id',
  `import_order_id` int(8) COMMENT '进货订单Id',
  `type_id` int(8) COMMENT '品种id',
  `type_name` varchar(50) DEFAULT NULL COMMENT '品种名称',
  `import_order_amount` int(11) COMMENT '进货预期数量',
  `import_order_money` float(11,2) DEFAULT NULL COMMENT '进货预期金额',
  `import_actual_amount` int(11) COMMENT '进货实际重量',
  `import_actual_money` float(11,2) DEFAULT NULL COMMENT '进货实际金额',
  PRIMARY KEY (`import_order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_order_detail`
--

LOCK TABLES `import_order_detail` WRITE;
/*!40000 ALTER TABLE `import_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `import_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `order_money` decimal(11,2) DEFAULT NULL COMMENT '总金额',
  `order_time` datetime DEFAULT NULL COMMENT '下单时间',
  `pay_mode` int(2) DEFAULT NULL COMMENT '0是货到付款，1是网页支付',
  `order_remarks` varchar(200) DEFAULT NULL COMMENT '备注',
  `order_deliverytime` datetime DEFAULT NULL COMMENT '配送时间',
  `order_state` int(2) DEFAULT '0' COMMENT '订单状态',
  `user_address_id` int(8) DEFAULT NULL,
  `user_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000049 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (100000000,10.20,'2014-07-29 08:20:01',1,'很不错哦','2014-08-02 00:00:00',1,2,1),(100000011,11.80,'2014-07-29 19:53:21',1,'速度送货','2014-08-08 19:53:35',0,1,1),(100000025,40.00,'2014-08-06 23:45:40',0,'','0000-00-00 00:00:00',0,12,1),(100000026,30.00,'2014-08-06 23:50:02',0,'','0000-00-00 00:00:00',0,12,1),(100000027,20.00,'2014-08-07 02:04:10',0,'','0000-00-00 00:00:00',0,12,1),(100000028,60.00,'2014-08-07 03:13:53',0,'','0000-00-00 00:00:00',0,12,1),(100000029,80.00,'2014-08-07 03:50:20',0,'','0000-00-00 00:00:00',0,12,1),(100000030,60.00,'2014-08-07 04:07:57',0,'','0000-00-00 00:00:00',0,12,1),(100000031,20.00,'2014-08-07 13:55:28',0,'','0000-00-00 00:00:00',0,14,2),(100000032,0.00,'2014-08-07 14:12:10',0,'','0000-00-00 00:00:00',0,14,2),(100000033,60.00,'2014-08-07 15:16:02',0,'','0000-00-00 00:00:00',0,14,2),(100000034,20.00,'2014-08-07 15:16:49',0,'','0000-00-00 00:00:00',0,14,2),(100000035,20.00,'2014-08-07 15:16:49',0,'','0000-00-00 00:00:00',0,14,2),(100000036,20.00,'2014-08-07 15:22:31',0,'','0000-00-00 00:00:00',0,14,2),(100000037,20.00,'2014-08-07 15:22:31',0,'','0000-00-00 00:00:00',0,14,2),(100000038,20.00,'2014-08-07 15:26:47',0,'','0000-00-00 00:00:00',0,16,10000),(100000039,0.00,'2014-08-07 15:36:40',0,'','0000-00-00 00:00:00',0,17,10000),(100000040,0.00,'2014-08-07 15:36:40',0,'','0000-00-00 00:00:00',0,17,10000),(100000041,20.00,'2014-08-07 16:03:41',0,'','0000-00-00 00:00:00',0,17,10000),(100000042,20.00,'2014-08-07 16:50:13',0,'','0000-00-00 00:00:00',0,17,10000),(100000043,20.00,'2014-08-07 16:54:16',0,'','0000-00-00 00:00:00',0,17,10000),(100000044,110.00,'2014-08-07 21:32:38',0,'','0000-00-00 00:00:00',0,17,10000),(100000045,30.00,'2014-08-08 01:46:04',0,'','0000-00-00 00:00:00',1,17,10000),(100000046,100.00,'2014-08-08 01:52:48',0,'','0000-00-00 00:00:00',2,17,10000),(100000047,100.00,'2014-08-08 01:52:48',0,'','0000-00-00 00:00:00',3,17,10000),(100000048,80.00,'2014-08-08 11:41:12',0,'','0000-00-00 00:00:00',3,17,10000);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `order_detail_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '具体订单id',
  `order_id` int(8) DEFAULT NULL COMMENT '订单id',
  `type_id` int(8) DEFAULT NULL COMMENT '品种id',
  `order_detail_order_weight` float(11,0) DEFAULT NULL COMMENT '下单重量',
  `order_detail_price` float(11,2) DEFAULT NULL COMMENT '下单时单价',
  `order_detail_money` float(11,2) DEFAULT NULL COMMENT '下单金额',
  `order_detail_actual_weight` float(11,0) DEFAULT NULL COMMENT '实际重量',
  `order_detail_actual_money` float(11,2) DEFAULT '0.00' COMMENT '实际金额',
  `order_detail_comment` varchar(200) DEFAULT NULL COMMENT '客户评论//作废',
  PRIMARY KEY (`order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=300000029 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (300000000,100000001,1,1,1.00,1.00,1,1.00,'1'),(300000001,100000012,1,2,10.00,20.00,NULL,0.00,NULL),(300000002,100000012,2,2,NULL,0.00,NULL,0.00,NULL),(300000003,100000013,1,2,10.00,20.00,NULL,0.00,NULL),(300000004,100000014,1,2,10.00,20.00,NULL,0.00,NULL),(300000005,100000015,1,1,10.00,10.00,NULL,0.00,NULL),(300000006,100000016,1,2,10.00,20.00,NULL,0.00,NULL),(300000007,100000017,1,2,10.00,20.00,NULL,0.00,NULL),(300000008,100000018,1,8,10.00,80.00,NULL,0.00,NULL),(300000009,100000019,1,2,10.00,20.00,NULL,0.00,NULL),(300000010,100000021,1,3,10.00,30.00,NULL,0.00,NULL),(300000011,100000023,1,2,10.00,20.00,NULL,0.00,NULL),(300000012,100000025,1,4,10.00,40.00,NULL,0.00,NULL),(300000013,100000026,1,3,10.00,30.00,NULL,0.00,NULL),(300000014,100000027,1,2,10.00,20.00,NULL,0.00,NULL),(300000015,100000028,1,2,10.00,20.00,NULL,0.00,NULL),(300000016,100000029,1,4,10.00,40.00,NULL,0.00,NULL),(300000017,100000030,1,2,10.00,20.00,NULL,0.00,NULL),(300000018,100000031,1,2,10.00,20.00,NULL,0.00,NULL),(300000019,100000034,1,2,10.00,20.00,NULL,0.00,NULL),(300000020,100000036,1,2,10.00,20.00,NULL,0.00,NULL),(300000021,100000038,1,2,10.00,20.00,NULL,0.00,NULL),(300000022,100000041,1,2,10.00,20.00,NULL,0.00,NULL),(300000023,100000042,1,2,10.00,20.00,NULL,0.00,NULL),(300000024,100000043,1,2,10.00,20.00,NULL,0.00,NULL),(300000025,100000044,700000000,3,10.00,30.00,NULL,0.00,NULL),(300000026,100000045,700000000,3,10.00,30.00,NULL,0.00,NULL),(300000027,100000046,700000000,6,10.00,60.00,NULL,0.00,NULL),(300000028,100000047,700000000,2,10.00,20.00,NULL,0.00,NULL);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_order`
--

DROP TABLE IF EXISTS `package_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_order` (
  `package_order_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '套餐订单Id',
  `package_show_id` int(8) DEFAULT NULL COMMENT '套餐id',
  `order_id` int(8) DEFAULT NULL COMMENT '订单id',
  `user_id` int(8) DEFAULT NULL COMMENT '客户Id',
  `package_order_total_amount` int(11) DEFAULT NULL COMMENT '下单数量',
  `package_order_remarks` text COMMENT '备注',
  `package_order_price` float(8,2) DEFAULT NULL COMMENT '当时的Package价格',
  PRIMARY KEY (`package_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=400000018 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_order`
--

LOCK TABLES `package_order` WRITE;
/*!40000 ALTER TABLE `package_order` DISABLE KEYS */;
INSERT INTO `package_order` VALUES (400000003,1,100000001,NULL,2,NULL,50.00),(400000004,1,100000013,NULL,2,NULL,100.00),(400000005,1,100000014,NULL,2,NULL,100.00),(400000006,1,100000015,NULL,1,NULL,100.00),(400000007,400000001,100000017,NULL,4,NULL,20.00),(400000008,400000000,100000023,NULL,1,NULL,100.00),(400000009,400000001,100000023,NULL,10,NULL,20.00),(400000010,400000001,100000028,NULL,2,NULL,20.00),(400000011,400000001,100000029,NULL,2,NULL,20.00),(400000012,400000001,100000030,NULL,2,NULL,20.00),(400000013,400000001,100000033,NULL,3,NULL,20.00),(400000014,400000001,100000044,NULL,4,NULL,20.00),(400000015,400000001,100000046,NULL,2,NULL,20.00),(400000016,600000001,100000047,NULL,4,NULL,20.00),(400000017,600000001,100000048,NULL,4,NULL,20.00);
/*!40000 ALTER TABLE `package_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_order_detail`
--

DROP TABLE IF EXISTS `package_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_order_detail` (
  `package_order_detail_id` int(8) NOT NULL AUTO_INCREMENT,
  `package_order_id` int(8) DEFAULT NULL,
  `type_id` int(8) DEFAULT NULL,
  `package_order_detail_weight` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`package_order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=500000003 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_order_detail`
--

LOCK TABLES `package_order_detail` WRITE;
/*!40000 ALTER TABLE `package_order_detail` DISABLE KEYS */;
INSERT INTO `package_order_detail` VALUES (500000001,400000003,3,1.00),(500000002,400000003,4,1.00);
/*!40000 ALTER TABLE `package_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_show`
--

DROP TABLE IF EXISTS `package_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_show` (
  `package_show_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '套餐id',
  `package_name` varchar(50) DEFAULT NULL COMMENT '套餐名称',
  `package_picture` varchar(200) DEFAULT NULL COMMENT '套餐图片',
  `package_detail` text COMMENT '套餐详情',
  `package_price` decimal(11,2) DEFAULT NULL COMMENT '套餐当前价格',
  `package_popularity` decimal(11,2) DEFAULT NULL COMMENT '套餐人气',
  `package_disable` int(1) DEFAULT '0',
  `package_order` int(8) DEFAULT NULL,
  `package_remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`package_show_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_show`
--

LOCK TABLES `package_show` WRITE;
/*!40000 ALTER TABLE `package_show` DISABLE KEYS */;
INSERT INTO `package_show` VALUES (600000000,'好好','../upload/package/container_bg.png','',100.00,20.00,0,NULL,'好吃'),(600000001,'大保健','../upload/package/','很不错',20.00,5.10,0,NULL,'很好');
/*!40000 ALTER TABLE `package_show` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `wa_package` BEFORE UPDATE ON `package_show` FOR EACH ROW if new.package_disable =1 then
if ((select max(package_order) from package where package_disable=1)=null) then
set new.package_order = 0;
else
set new.package_order = (select max(package_order) from package where package_disable=1) +1;
end if;
else
set new.package_order = null;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `package_show_detail`
--

DROP TABLE IF EXISTS `package_show_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_show_detail` (
  `package_show_detail_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '预购订单id',
  `package_show_id` int(8) DEFAULT NULL COMMENT '预购id',
  `fruits_type_id` int(8) COMMENT '水果品种',
  `package_order_detail_amout` int(11) DEFAULT NULL COMMENT '每一个的数量',
  `package_order_detail_remarks` text COMMENT '备注',
  `package_weight_measure` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`package_show_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=500000003 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_show_detail`
--

LOCK TABLES `package_show_detail` WRITE;
/*!40000 ALTER TABLE `package_show_detail` DISABLE KEYS */;
INSERT INTO `package_show_detail` VALUES (500000000,1,4,1,'1','个'),(500000001,1,6,10,'很好','个'),(500000002,1,3,10,'1','斤');
/*!40000 ALTER TABLE `package_show_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `private_custom`
--

DROP TABLE IF EXISTS `private_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `private_custom` (
  `private_custom_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '私人定制Id',
  `user_id` int(8) COMMENT '用户id ',
  `fruit_class_id` varchar(200) DEFAULT NULL COMMENT '水果大类id',
  `fruit_class_picture` varchar(100) COMMENT '水果大类图片',
  PRIMARY KEY (`private_custom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `private_custom`
--

LOCK TABLES `private_custom` WRITE;
/*!40000 ALTER TABLE `private_custom` DISABLE KEYS */;
/*!40000 ALTER TABLE `private_custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publish_pic`
--

DROP TABLE IF EXISTS `publish_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publish_pic` (
  `publish_pic_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '图片Id',
  `publish_pic_title` varchar(50) DEFAULT NULL COMMENT '图片标题 ',
  `publish_pic_url` varchar(200) DEFAULT NULL COMMENT '图片路径',
  `publish_pic_link` varchar(11) DEFAULT NULL COMMENT '图片链接',
  `publish_pic_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`publish_pic_id`),
  UNIQUE KEY `publish_pic_order` (`publish_pic_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publish_pic`
--

LOCK TABLES `publish_pic` WRITE;
/*!40000 ALTER TABLE `publish_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `publish_pic` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `test` BEFORE INSERT ON `publish_pic` FOR EACH ROW if ((select max(publish_pic_order) from publish_pic) =null) then
set new.publish_pic_order = 0;
else
set new.publish_pic_order = (select max(publish_pic_order) from publish_pic) +1;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `special_performance`
--

DROP TABLE IF EXISTS `special_performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_performance` (
  `special_performance_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '专场Id',
  `special_performance_name` varchar(200) COMMENT '专场名称 ',
  `special_performance_pic` varchar(200) DEFAULT NULL COMMENT '专场图片',
  `special_performance_order` int(8) DEFAULT '0',
  PRIMARY KEY (`special_performance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_performance`
--

LOCK TABLES `special_performance` WRITE;
/*!40000 ALTER TABLE `special_performance` DISABLE KEYS */;
INSERT INTO `special_performance` VALUES (1,'准妈妈','../upload/special_performance/container_bg.png',NULL),(2,'瘦身','../upload/special_performance/container_bg.png',NULL),(3,'公司',NULL,NULL);
/*!40000 ALTER TABLE `special_performance` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `wa_special_performance` BEFORE INSERT ON `special_performance` FOR EACH ROW if ((select max(special_performance_order) from special_performance) =null) then
set new.special_performance_order = 0;
else
set new.special_performance_order = (select max(special_performance_order) from special_performance) +1;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `special_performance_detail`
--

DROP TABLE IF EXISTS `special_performance_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_performance_detail` (
  `special_performance_detail_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '专场Id',
  `fruits_class_id` int(8) COMMENT '专场水果id',
  `special_performance_detail_order` int(8) DEFAULT '0',
  `special_performance_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`special_performance_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_performance_detail`
--

LOCK TABLES `special_performance_detail` WRITE;
/*!40000 ALTER TABLE `special_performance_detail` DISABLE KEYS */;
INSERT INTO `special_performance_detail` VALUES (1,1,1,1),(2,2,2,1),(3,3,3,1),(4,4,4,1),(5,5,5,1);
/*!40000 ALTER TABLE `special_performance_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `wa_special_performance_detail` BEFORE INSERT ON `special_performance_detail` FOR EACH ROW if ((select max(special_performance_detail_order) from special_performance_detail) =null) then
set new.special_performance_detail_order = 0;
else
set new.special_performance_detail_order = (select max(special_performance_detail_order) from special_performance_detail) +1;
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage` (
  `storage_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '库存Id',
  `agent_id` int(8) COMMENT '代理Id',
  `storage_timestamp` date COMMENT '库存时间戳',
  `storage_remark` text COMMENT '库存备注',
  `village_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`storage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (1,1,'2014-07-26',NULL,1),(2,1,'2014-08-23',NULL,NULL),(3,1,'2014-08-25',NULL,NULL),(4,1,'2014-08-02',NULL,10),(5,1,'2014-08-02',NULL,10),(6,1,'2014-08-02',NULL,10),(7,1,'0000-00-00',NULL,NULL),(8,1,'2014-08-03',NULL,NULL);
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage_detail`
--

DROP TABLE IF EXISTS `storage_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_detail` (
  `storage_detail_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '库存具体项Id',
  `storage_id` int(8) COMMENT '库存Id',
  `type_id` int(8) COMMENT '品种id',
  `storage_amount` float(8,2) DEFAULT NULL COMMENT '库存重量',
  `storage_remark` text COMMENT '库存备注',
  `village_id` int(8) DEFAULT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `sell_amount` float(8,2) DEFAULT '0.00',
  PRIMARY KEY (`storage_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage_detail`
--

LOCK TABLES `storage_detail` WRITE;
/*!40000 ALTER TABLE `storage_detail` DISABLE KEYS */;
INSERT INTO `storage_detail` VALUES (1,1,3,100.00,NULL,1,'苹果',70.00),(2,2,3,10.20,NULL,NULL,'苹果',0.00),(3,3,1,10.20,NULL,NULL,'桃子',0.00),(4,5,2,50.00,NULL,NULL,'凤梨',0.00),(5,6,3,10.20,NULL,NULL,'苹果',0.00),(6,8,0,10.00,NULL,NULL,'苹果',0.00),(7,8,0,11.00,NULL,NULL,'凤梨',0.00),(8,8,0,15.00,NULL,NULL,'苹果',0.00);
/*!40000 ALTER TABLE `storage_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '客户Id',
  `user_name` varchar(50) DEFAULT NULL COMMENT '客户姓名 ',
  `user_password` varchar(50) DEFAULT NULL COMMENT '客户密码',
  `user_picture` varchar(200) DEFAULT NULL COMMENT '客户头像',
  `user_score` decimal(11,2) DEFAULT NULL COMMENT '客户积分 ',
  `user_grade` varchar(11) DEFAULT NULL COMMENT '客户等级 ',
  `user_balance` decimal(11,2) DEFAULT NULL COMMENT '客户余额',
  `user_tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'王奥',NULL,NULL,NULL,'3',NULL,NULL),(10000,'曹魏','3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d',NULL,NULL,NULL,NULL,'13738021791');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_receive`
--

DROP TABLE IF EXISTS `user_receive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_receive` (
  `user_id` int(8) NOT NULL COMMENT '客户id',
  `user_address_id` int(8) AUTO_INCREMENT COMMENT '收货 地址id',
  `user_current_name` varchar(50) DEFAULT NULL COMMENT '客户当前名称 ',
  `user_address` varchar(200) DEFAULT NULL COMMENT '收货 地址',
  `user_tel` varchar(25) DEFAULT NULL COMMENT '客户电话',
  `village_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`user_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_receive`
--

LOCK TABLES `user_receive` WRITE;
/*!40000 ALTER TABLE `user_receive` DISABLE KEYS */;
INSERT INTO `user_receive` VALUES (1,1,'1','临江花园12幢','15397081254',1),(2,2,NULL,'玉泉32舍','15397081254',1),(3,3,NULL,'紫荆港云峰','15397081254',1),(4,4,NULL,'西城年华3幢','15397081254',1),(5,5,NULL,'文鼎苑4幢','15397081254',1),(6,6,NULL,'临江花园13幢','15397081254',1),(7,7,NULL,'玉泉5舍','15397081254',1),(8,8,NULL,'玉泉7舍','15397081254',1),(9,9,NULL,'玉泉12舍','15397081254',1),(10,10,NULL,'玉泉31舍','15397081254',1),(1,12,'曹魏','玉泉','11111111',NULL),(2,14,'曹魏','玉泉5舍','13738021791',NULL),(10000,16,'曹魏','玉泉5舍','13738021791',NULL),(10000,17,'曹魏','玉泉曹楼','13738021791',NULL);
/*!40000 ALTER TABLE `user_receive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `village`
--

DROP TABLE IF EXISTS `village`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `village` (
  `village_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '小区Id',
  `village_name` varchar(200) DEFAULT NULL COMMENT '小区姓名 ',
  `village_position` varchar(200) DEFAULT NULL COMMENT '小区位置',
  `village_usernum` int(11) DEFAULT NULL COMMENT '小区用户数',
  `agent_id` int(8) DEFAULT NULL COMMENT '小区代理 id',
  `village_agent_tel` varchar(20) NOT NULL,
  `village_agent_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`village_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `village`
--

LOCK TABLES `village` WRITE;
/*!40000 ALTER TABLE `village` DISABLE KEYS */;
INSERT INTO `village` VALUES (1,NULL,NULL,NULL,1,'',NULL);
/*!40000 ALTER TABLE `village` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-08 14:28:18
