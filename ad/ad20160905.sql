/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.47 : Database - advert
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`advert` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `advert`;

/*Table structure for table `ad_ad_info` */

DROP TABLE IF EXISTS `ad_ad_info`;

CREATE TABLE `ad_ad_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL COMMENT '广告id，从接口获取到的id',
  `provider_id` int(11) NOT NULL COMMENT '广告提供商的id',
  `provider_name` varchar(20) NOT NULL COMMENT '广告商名字',
  `ad_type` tinyint(2) NOT NULL COMMENT '广告类型：1，banner；2插屏；3，开屏',
  `ad_url` varchar(100) NOT NULL COMMENT '广告来源接口',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_ad_info` */

/*Table structure for table `ad_ad_type` */

DROP TABLE IF EXISTS `ad_ad_type`;

CREATE TABLE `ad_ad_type` (
  `aT_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位id',
  `ad_type` varchar(20) NOT NULL COMMENT '广告位类型',
  PRIMARY KEY (`aT_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ad_ad_type` */

insert  into `ad_ad_type`(`aT_id`,`ad_type`) values (1,'banner'),(2,'开屏'),(3,'插屏');

/*Table structure for table `ad_app_ad` */

DROP TABLE IF EXISTS `ad_app_ad`;

CREATE TABLE `ad_app_ad` (
  `appAd_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'app,广告位关联id',
  `app_id` int(11) NOT NULL COMMENT 'app_info表的appid',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `adType_id` int(11) NOT NULL COMMENT '对应的广告位类型',
  `ad_position_name` varchar(20) NOT NULL COMMENT '广告位名称',
  `ad_position_id` varchar(20) NOT NULL COMMENT '广告位id，用于识别广告',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT '记录是否启用，1启用，0禁用',
  PRIMARY KEY (`appAd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `ad_app_ad` */

insert  into `ad_app_ad`(`appAd_id`,`app_id`,`uid`,`adType_id`,`ad_position_name`,`ad_position_id`,`create_time`,`update_time`,`enabled`) values (1,2,1,1,'腾讯新闻banner','2016090216122141141','2016-09-02 15:44:47','2016-09-02 15:44:47',1),(2,3,1,3,'爱奇艺插屏','2016090216122141142','2016-09-02 15:45:35','2016-09-02 15:45:35',1),(3,3,1,3,'uc浏览器 开屏','2016090216122141143','2016-09-02 15:46:06','2016-09-02 15:46:06',1),(4,3,1,3,'优酷视频','2016090216122141145','2016-09-02 16:12:21','2016-09-02 16:12:21',1),(5,3,1,2,'酷我音乐','2016090216124721590','2016-09-02 16:12:47','2016-09-02 16:12:47',1),(6,9,7,1,'锁屏banner','2016090217384169018','2016-09-02 17:38:41','2016-09-02 17:38:41',1),(7,9,7,2,'开屏','2016090217385957854','2016-09-02 17:38:59','2016-09-02 17:38:59',0),(8,10,7,1,'百度banner','2016090218050141509','2016-09-02 18:05:01','2016-09-02 18:05:01',1),(9,10,7,2,'百度开屏','2016090218051860487','2016-09-02 18:05:18','2016-09-02 18:05:18',0),(10,10,7,3,'百度插屏','2016090218053752395','2016-09-02 18:05:37','2016-09-02 18:05:37',1),(11,2,1,3,'阿里妈妈','2016090514180136134','2016-09-05 14:18:01','2016-09-05 14:18:01',1),(12,2,1,3,'阿里巴巴','2016090514180831159','2016-09-05 14:18:08','2016-09-05 14:18:08',1),(13,2,1,3,'阿里旺旺','2016090514181536598','2016-09-05 14:18:15','2016-09-05 14:18:15',1),(14,2,1,3,'It之家','2016090514182751661','2016-09-05 14:18:27','2016-09-05 14:18:27',1),(15,2,1,3,'微信','2016090514184080469','2016-09-05 14:18:40','2016-09-05 14:18:40',1),(16,2,1,3,'qq','2016090514184615195','2016-09-05 14:18:46','2016-09-05 14:18:46',1);

/*Table structure for table `ad_app_info` */

DROP TABLE IF EXISTS `ad_app_info`;

CREATE TABLE `ad_app_info` (
  `app_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '关联用户id',
  `app_name` varchar(20) NOT NULL COMMENT '应用名称',
  `app_remark` varchar(30) NOT NULL COMMENT '应用备注',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `provider_id` int(11) NOT NULL COMMENT 'app 来源方id',
  `provider_name` varchar(20) NOT NULL COMMENT 'app来源方名字',
  `pkg_name` varchar(20) NOT NULL COMMENT '软件包名字',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `ad_app_info` */

insert  into `ad_app_info`(`app_id`,`uid`,`app_name`,`app_remark`,`create_time`,`update_time`,`provider_id`,`provider_name`,`pkg_name`) values (1,1,'网易新闻','app banner展示','2016-09-01 17:36:57','2016-09-01 17:36:57',0,'',''),(2,1,'腾讯新闻','横幅广告','2016-09-01 17:39:28','2016-09-01 17:39:28',0,'',''),(3,1,'爱奇艺','banner','2016-09-02 10:38:39','2016-09-02 10:38:39',0,'',''),(4,1,'滴滴打车','横幅广告','2016-09-02 10:39:01','2016-09-02 10:39:01',0,'',''),(5,1,'快车','开屏','2016-09-02 10:40:04','2016-09-02 10:40:04',0,'',''),(6,1,'网易云音乐','开屏','2016-09-02 10:40:20','2016-09-02 10:40:20',0,'',''),(7,1,'爱壁纸','banner','2016-09-02 10:40:41','2016-09-02 10:40:41',0,'',''),(8,1,'前程无忧','bannenr','2016-09-02 11:41:26','2016-09-02 11:41:26',0,'',''),(9,7,'爱奇艺','app banner展示','2016-09-02 17:32:49','2016-09-02 17:32:49',0,'',''),(10,7,'百度地图','横幅广告','2016-09-02 17:33:12','2016-09-02 17:33:12',0,'',''),(11,7,'今日头条','开屏','2016-09-02 17:33:24','2016-09-02 17:33:24',0,'','');

/*Table structure for table `ad_device` */

DROP TABLE IF EXISTS `ad_device`;

CREATE TABLE `ad_device` (
  `device_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设备id，记录不同的设备',
  `screentype` tinyint(2) NOT NULL COMMENT '屏幕类型',
  `imei` varchar(20) NOT NULL COMMENT '设备串码',
  `macadd` varchar(20) NOT NULL COMMENT '网卡地址',
  `connecttype` varchar(20) NOT NULL COMMENT '链接类型，wifi，3g，4g等',
  `countrycode` varchar(20) NOT NULL COMMENT '国家代码',
  `devicename` varchar(20) NOT NULL COMMENT '设备名称',
  `dlanguage` varchar(10) NOT NULL COMMENT '设备语言，描述设备的系统语言',
  `dmanufacturer` varchar(20) NOT NULL COMMENT '设备制造商',
  `dversion` varchar(10) NOT NULL COMMENT '设备版本',
  `height` varchar(6) NOT NULL COMMENT '设备高度',
  `width` varchar(6) NOT NULL COMMENT '设备宽度',
  `screendensity` varchar(6) NOT NULL COMMENT '设备ppi',
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_device` */

/*Table structure for table `ad_provider` */

DROP TABLE IF EXISTS `ad_provider`;

CREATE TABLE `ad_provider` (
  `provider_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告商的id',
  `provider_name` varchar(20) NOT NULL COMMENT '广告商的名字',
  `api_url` varchar(50) NOT NULL COMMENT '接口api',
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

/*Data for the table `ad_provider` */

/*Table structure for table `ad_resource` */

DROP TABLE IF EXISTS `ad_resource`;

CREATE TABLE `ad_resource` (
  `resource_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源id',
  `resource_url` varchar(50) NOT NULL COMMENT '资源url，接口',
  `description` varchar(50) NOT NULL COMMENT '资源描述',
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_resource` */

/*Table structure for table `ad_role` */

DROP TABLE IF EXISTS `ad_role`;

CREATE TABLE `ad_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `permission` varchar(100) NOT NULL COMMENT '权限列表',
  `description` varchar(100) NOT NULL COMMENT '角色描述',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ad_role` */

insert  into `ad_role`(`role_id`,`role_name`,`permission`,`description`) values (1,'超级管理员','1，2，3，4，5，6','所有权限'),(2,'一般管理员','1，3，5','部分权限'),(3,'普通人员','','浏览权限');

/*Table structure for table `ad_user` */

DROP TABLE IF EXISTS `ad_user`;

CREATE TABLE `ad_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `passwd` varchar(255) NOT NULL COMMENT '密码',
  `role_id` int(11) NOT NULL COMMENT '角色id，关联role表',
  `lastLoginTime` datetime NOT NULL COMMENT '登录时间',
  `loginIp` int(10) NOT NULL COMMENT '登录ip',
  `update_at` datetime NOT NULL COMMENT '更新时间',
  `created_at` datetime NOT NULL COMMENT '用户添加时间',
  `description` varchar(10) NOT NULL COMMENT '用户描述(管理员等)',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `ad_user` */

insert  into `ad_user`(`uid`,`uname`,`passwd`,`role_id`,`lastLoginTime`,`loginIp`,`update_at`,`created_at`,`description`) values (1,'admin','eyJpdiI6IkVYVG5rTk4yUWpPMXdcL3JTb1k0d3BnPT0iLCJ2YWx1ZSI6IkVyM1ZSR1lqR0Jpa2Qrb0RZQVJ3Rmc9PSIsIm1hYyI6IjE3YjU1Y2U5ZGQ1N2RiY2M0MmJjOGUyMWU1MTZlMTczNGY4MzhjMzEyMGRkMGYxZjg2MTVhNWUxMjE1ODVmYWMifQ==',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(2,'andy','123456',2,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(3,'andy','123456',2,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(4,'毛大大','eyJpdiI6IkVYVG5rTk4yUWpPMXdcL3JTb1k0d3BnPT0iLCJ2YWx1ZSI6IkVyM1ZSR1lqR0Jpa2Qrb0RZQVJ3Rmc9PSIsIm1hYyI6IjE3YjU1Y2U5ZGQ1N2RiY2M0MmJjOGUyMWU1MTZlMTczNGY4MzhjMzEyMGRkMGYxZjg2MTVhNWUxMjE1ODVmYWMifQ==',1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(5,'阿黄','eyJpdiI6InB5aFJYSmlqbmphMXpXVkhmR0R3QVE9PSIsInZhbHVlIjoiVEZlYUM4dk5KUWZ4NjdRc3lwcDhRUT09IiwibWFjIjoiNDBiNmUxYTViNWI2NTgxZjAzOTI5OWUyZTcyNmU2YTdlNDkxMTFjNmJmMWM0OTRkM2ZkMTI1YmQ4YTliMDBmNSJ9',1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(6,'小黑','eyJpdiI6IitHTTRVMHUrUVgxOTlHS3ZBWUE0Y1E9PSIsInZhbHVlIjoiMzA2UWRyeHExcG50RFFxVGlvMG9PZz09IiwibWFjIjoiMWIxY2FkYzkyYjg4NWFmZTY5YmIxNjU2YzQwZjQ2ZjA2YTg5ZGE2MTIxMjQzOTdmOTcxMDFlODRhYTc0ODFiMiJ9',3,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2016-08-31 00:00:00',''),(7,'小白','eyJpdiI6ImZpa2V1VkE1bWZiaDdSSHhZRStjelE9PSIsInZhbHVlIjoiZ2R0SnFzTWtCUkprbkF3OEpqY1lmUT09IiwibWFjIjoiNTc5MWU3ZDY5MGQ5NWNkZjQ5YTUzODYxMmIwN2EzNWNhYzJmODZiZThlNzE0OTU5NDA1NmQwYTBjMzY2YWVmMSJ9',3,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2016-08-31 05:47:17',''),(8,'小小','eyJpdiI6IndFa2NNYWNRdTJBUXJEaUFpSHFIU3c9PSIsInZhbHVlIjoiRG5jd0p0eWh2eVByZGNoNVpBQ2VVdz09IiwibWFjIjoiOGMwNjFmMzQ1M2QzMmU5YzNiYTNiNjQ2YTBhNTVmZWYyZDk2MWNmMjE3OWMzOGZmMmViYmUwODE4NTQyYjI1YiJ9',3,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2016-08-31 05:50:33',''),(9,'王老板','eyJpdiI6IkdhNU1ZczhiRUtab1RyOERlNVROR2c9PSIsInZhbHVlIjoiclUzV2xldXJRWVlnSFFaU3JRVm8zZz09IiwibWFjIjoiMTViMzFlOWY1NTdjNTAzY2ZhZmM1ZWIxNzJlZWU1NWVjMzBkMWFkNjVjNmYyMTJhODczZTZhYjc5NTlmN2EyNiJ9',3,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2016-08-31 17:52:55','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
