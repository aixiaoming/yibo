﻿# Host: localhost  (Version: 5.5.47)
# Date: 2016-04-21 17:13:39
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '2' COMMENT '账号',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `level` varchar(255) NOT NULL DEFAULT '2' COMMENT '0老板  1主管 2服务员',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `macid` varchar(255) DEFAULT NULL COMMENT '控制的机器编号',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员表';

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','0','管理员',NULL),(2,'1','e10adc3949ba59abbe56e057f20f883e','2','服务员1号','1,2,3,4,5,6'),(3,'11','e10adc3949ba59abbe56e057f20f883e','1','主管1号',NULL),(4,'2','e10adc3949ba59abbe56e057f20f883e','2','服务员2号',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "machine"
#

DROP TABLE IF EXISTS `machine`;
CREATE TABLE `machine` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `mac` varchar(255) DEFAULT NULL COMMENT '机器编号',
  `position` varchar(255) DEFAULT NULL COMMENT '座位编号',
  `level` varchar(255) DEFAULT NULL COMMENT '级别  1代表机器 2代表型号',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='机器型号及其座位';

#
# Data for table "machine"
#

/*!40000 ALTER TABLE `machine` DISABLE KEYS */;
INSERT INTO `machine` VALUES (1,'1','0','1'),(2,'2','0','1'),(3,'3','0','1'),(4,'4','0','1'),(5,'5','0','1'),(6,'6','0','1'),(7,'7','0','1'),(8,'8','0','1'),(9,'9','0','1'),(10,'10','0','1'),(11,'0','1','2'),(12,'0','2','2'),(13,'0','3','2'),(14,'0','4','2'),(15,'0','5','2'),(16,'0','6','2'),(17,'0','7','2'),(18,'0','8','2'),(19,'0','9','2'),(20,'0','10','2');
/*!40000 ALTER TABLE `machine` ENABLE KEYS */;

#
# Structure for table "record"
#

DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `conid` varchar(255) NOT NULL DEFAULT '' COMMENT '客户id',
  `conname` varchar(255) DEFAULT NULL COMMENT '客户姓名',
  `mac` varchar(255) NOT NULL DEFAULT '' COMMENT '机器号码',
  `conpos` varchar(255) NOT NULL DEFAULT '' COMMENT '位置',
  `put` varchar(255) NOT NULL DEFAULT '0' COMMENT '入分',
  `type` varchar(255) NOT NULL DEFAULT '0' COMMENT '入分方式 0为现金 1为刷卡  2为转账',
  `account` varchar(255) DEFAULT NULL COMMENT '转账转入哪个账户',
  `out1` varchar(255) NOT NULL DEFAULT '0' COMMENT '出分',
  `give` varchar(255) DEFAULT '0' COMMENT '赠分',
  `turn` varchar(255) NOT NULL DEFAULT '0' COMMENT '反分',
  `coturn` varchar(255) NOT NULL DEFAULT '0' COMMENT '扣反分',
  `time` datetime DEFAULT NULL COMMENT '服务员时间',
  `out2` varchar(11) DEFAULT '' COMMENT '返现',
  `waitid` varchar(255) NOT NULL DEFAULT '' COMMENT '服务员编号',
  `wainame` varchar(255) DEFAULT NULL COMMENT '服务员名字',
  `bossid` varchar(255) DEFAULT NULL COMMENT '主管编号',
  `judge` varchar(255) NOT NULL DEFAULT '1' COMMENT '是否需要主管同意 1不需要 2需要',
  `agree` varchar(255) DEFAULT NULL COMMENT '主管是否同意 1同意 2不同意 3未审核',
  `stime` varchar(255) DEFAULT NULL COMMENT '审核时间',
  `bossname` varchar(255) DEFAULT NULL COMMENT '主管姓名',
  `agreetime` varchar(255) NOT NULL DEFAULT '2' COMMENT '主管是否已处理 1为处理',
  `waisee` varchar(255) NOT NULL DEFAULT '1' COMMENT '服务员端是否显示该主管意见1为显示  2为不显示',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消费记录';

#
# Data for table "record"
#

/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (1,'2','客户2','1','1','5000','现金','','','','','','2016-03-29 06:28:34',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(2,'3','客户3','1','2','8000','现金','','','','','','2016-03-29 13:28:53',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(3,'5','客户5','1','1','400','现金','','','','','','2016-03-29 13:31:48',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(4,'2','客户2','3','5','','现金','','4','','','','2016-03-29 13:57:26',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(5,'2','客户2','3','5','','现金','','600','','','','2016-03-29 14:01:07',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(6,'1','客户一','6','6','','现金','','','','','','2016-03-29 14:10:13',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(7,'2','客户2','3','5','','现金','','','555','','','2016-03-29 19:12:41',NULL,'2','服务员1号','3','2','1','2016-03-29 19:13:05','主管1号','1','2'),(8,'6','客户6','1','1','500','现金','','','','','','2016-03-30 18:23:06',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(9,'7','客户7','5','6','5000','现金','','','','','','2016-03-30 18:28:52',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(10,'2','客户2','3','2','800','现金','','','','','','2016-03-30 21:42:44',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(11,'2','客户2','3','2','8000','现金','','','','','','2016-03-30 21:43:00',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(12,'2','客户2','3','2','','现金','','9000','','','','2016-03-30 21:43:17',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(13,'2','客户2','3','2','9000','现金','','','','','','2016-03-30 21:45:53',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(14,'2','客户2','3','2','600','现金','','','','','','2016-03-30 21:46:07',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(15,'2','客户2','3','2','','现金','','0','','','','2016-03-30 21:46:19',NULL,'4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(16,'2','客户2','3','2','','现金','','','1000','','','2016-03-30 21:46:44',NULL,'4','服务员2号',NULL,'2','1','2016-03-30 21:46:59','主管1号','1','2'),(17,'2','客户2','3','2','','现金','','','','','','2016-03-30 21:48:39',NULL,'4','服务员2号',NULL,'2','2','2016-03-30 21:48:49','主管1号','1','2'),(18,'2','客户2','3','2','','网银','主管1号','','','','','2016-03-30 22:10:26',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(19,'2','客户2','3','2','9000','现金','','','','','','2016-03-30 22:10:38',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(20,'2','客户2','3','2','','现金','','','','800','','2016-03-30 22:11:56',NULL,'2','服务员1号',NULL,'2','1','2016-03-30 22:12:09','主管1号','1','2'),(21,'2','客户2','3','2','','现金','','','','','0','2016-03-30 22:13:40',NULL,'2','服务员1号',NULL,'2','2','2016-03-30 22:13:58','主管1号','1','2'),(22,'2','客户2','3','2','','现金','','','','','0','2016-03-30 22:14:54',NULL,'2','服务员1号',NULL,'2','2','2016-03-30 22:20:22','主管1号','1','2'),(23,'6','客户6','5','4','600','现金','','','','','','2016-03-30 22:18:27',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(24,'9','兰兰','5','5','','现金','','','','','','2016-03-30 22:26:09',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(25,'9','兰兰','2','5','6000','现金','','','','','','2016-03-31 12:51:02',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(26,'9','兰兰','2','5','8222','现金','','','','','','2016-03-31 12:51:17',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(27,'2','客户2','3','2','','现金','','','8000','','','2016-03-31 12:53:43',NULL,'2','服务员1号',NULL,'2','1','2016-03-31 12:53:53','主管1号','1','2'),(28,'2','客户2','3','2','','现金','','','0','0','','2016-03-31 12:57:26',NULL,'2','服务员1号',NULL,'2','2','2016-03-31 12:57:46','主管1号','1','2'),(29,'9','兰兰','6','5','55555','网银','主管1号','','','','','2016-03-31 13:10:58',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(30,'2','客户2','4','2','5000','现金','','','','','','2016-03-31 15:38:40',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(31,'2','客户2','4','2','800','现金','','','','','','2016-03-31 16:34:35',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(32,'2','客户2','4','2','','现金','','','800','','','2016-03-31 16:39:00',NULL,'2','服务员1号',NULL,'2','1','2016-03-31 16:39:16','主管1号','1','2'),(33,'2','客户2','4','2','800','现金','','','','','','2016-03-31 16:40:54',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(34,'6','客户6','5','4','600','现金','','','','','','2016-03-31 16:41:07',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(35,'2','客户2','4','2','500','现金','','','','','','2016-03-31 17:32:53',NULL,'2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(36,'2','客户2','4','2','','网银','主管1号','','200','','','2016-03-31 17:34:33',NULL,'2','服务员1号',NULL,'2','1','2016-03-31 17:38:37','主管1号','1','2'),(54,'2','客户2','4','2','','现金','','','','','','2016-03-31 21:44:08','222','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(55,'2','客户2','4','2','','现金','','','333','','','2016-03-31 21:45:56','','2','服务员1号',NULL,'2','1','2016-03-31 21:47:09','主管1号','1','2'),(56,'2','客户2','4','2','','现金','','','','','66','2016-03-31 21:49:40','','2','服务员1号','3','2','1','2016-03-31 21:49:57','主管1号','1','2'),(57,'2','客户2','4','2','','现金','','','','','','2016-03-31 21:52:49','555','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(58,'10','汇入而','1','1','7000','现金','','','','','','2016-04-01 20:05:11','','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(59,'10','汇入而','1','1','800','现金','','','','','','2016-04-01 20:07:25','','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(60,'10','汇入而','1','1','','现金','','888','','','','2016-04-01 20:08:20','','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(61,'10','汇入而','1','1','','现金','','','500','','','2016-04-01 20:09:33','','2','服务员1号','3','2','1','2016-04-01 20:09:44','主管1号','1','2'),(62,'10','汇入而','1','1','','现金','','','','888','','2016-04-01 20:10:30','','2','服务员1号','3','2','1','2016-04-01 20:10:45','主管1号','1','2'),(63,'10','汇入而','1','1','','现金','','','','','0','2016-04-01 20:11:58','','2','服务员1号','3','2','2','2016-04-01 20:12:18','主管1号','1','2'),(64,'10','汇入而','1','1','','现金','','','','','500','2016-04-01 20:18:25','','2','服务员1号','3','2','1','2016-04-01 20:18:44','主管1号','1','2'),(65,'10','汇入而','1','1','','现金','','','','','','2016-04-01 20:21:43','555','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(66,'10','汇入而','1','1','','现金','','','','','','2016-04-01 20:22:03','666','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(67,'10','汇入而','1','1','','现金','','','333','','','2016-04-01 20:22:16','','2','服务员1号','3','2','1','2016-04-01 20:22:31','主管1号','1','2'),(68,'10','汇入而','1','1','','现金','','','','','','2016-04-01 20:45:03','500','2','服务员1号','3','2','1','2016-04-01 20:45:21','主管1号','1','2'),(69,'10','汇入而','1','1','','现金','','','','','','2016-04-01 20:45:56','0','2','服务员1号','3','2','2','2016-04-01 20:46:24','主管1号','1','2'),(70,'2','客户2','4','2','800','现金','','','','','','2016-04-16 16:07:40','','2','服务员1号',NULL,'1',NULL,NULL,NULL,'2','1'),(71,'2','客户2','4','2','500','现金','','','','','','2016-04-16 16:08:24','','4','服务员2号',NULL,'1',NULL,NULL,NULL,'2','1'),(72,'1','客户一','6','6','','现金','','','','500','','2016-04-21 14:29:07','','2','服务员1号','3','2','1','2016-04-21 14:30:49','主管1号','1','2');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userphone` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL COMMENT '点记率',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='客户表';

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'111','客户一',5),(2,'222','客户2',94),(3,'333','客户3',1),(4,'444','客户4',2),(5,'555','客户5',2),(6,'666','客户6',15),(7,'777','客户7',1),(8,'888','客户8',NULL),(9,'384695','兰兰',4),(10,'18563512','汇入而',12);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;