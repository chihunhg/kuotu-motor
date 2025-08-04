/*
Navicat MariaDB Data Transfer

Source Server         : kuotu
Source Server Version : 50568
Source Host           : 61.63.128.110:3306
Source Database       : kuotu

Target Server Type    : MariaDB
Target Server Version : 50568
File Encoding         : 65001

Date: 2021-09-27 14:58:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dbclass1
-- ----------------------------
DROP TABLE IF EXISTS `dbclass1`;
CREATE TABLE `dbclass1` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系代碼',
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) DEFAULT '0' COMMENT '順序',
  `strName` varchar(50) DEFAULT '' COMMENT '名稱',
  `Color` varchar(10) NOT NULL DEFAULT '' COMMENT '色碼',
  `Upload` varchar(5) DEFAULT '' COMMENT '上下架',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='類別管理';

-- ----------------------------
-- Records of dbclass1
-- ----------------------------
INSERT INTO `dbclass1` VALUES ('1', '1', '0', '1', 'Toyota', '', 'Yes', 'Admin', '2021-08-18 10:59:21', '2021-08-18 10:59:21');
INSERT INTO `dbclass1` VALUES ('2', '1', '0', '2', 'Lexus', '', 'Yes', 'Admin', '2021-08-18 10:59:21', '2021-08-18 10:59:21');

-- ----------------------------
-- Table structure for dbclass1_img
-- ----------------------------
DROP TABLE IF EXISTS `dbclass1_img`;
CREATE TABLE `dbclass1_img` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Class1_PKey` int(11) DEFAULT '0' COMMENT 'FAQ主鍵',
  `Sort` int(11) DEFAULT '1' COMMENT '序號',
  `Forder` varchar(10) DEFAULT '' COMMENT '目錄名',
  `Photo1` varchar(50) DEFAULT '' COMMENT '圖檔',
  `PhotoW1` int(11) DEFAULT '0' COMMENT '圖寬',
  `PhotoH1` int(11) DEFAULT '0' COMMENT '圖高',
  `PhotoM` varchar(100) DEFAULT '' COMMENT '圖說',
  `intType` int(11) DEFAULT '1' COMMENT '檔案類別(1.圖片;2.檔案)',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE,
  KEY `PKey` (`PKey`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='FAQ圖片管理';

-- ----------------------------
-- Records of dbclass1_img
-- ----------------------------

-- ----------------------------
-- Table structure for discount
-- ----------------------------
DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系代碼',
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `intLocal` int(11) DEFAULT '1' COMMENT '顯示位置',
  `Class1_PKey` int(11) DEFAULT '0' COMMENT ' 類別主鍵',
  `strName` varchar(50) DEFAULT '' COMMENT '標題',
  `Subject` varchar(50) DEFAULT '' COMMENT '副標',
  `Interview` varchar(2000) DEFAULT '' COMMENT '簡述',
  `Color` varchar(10) DEFAULT '' COMMENT '色碼',
  `strLink` varchar(100) DEFAULT '' COMMENT '活動網址',
  `Target` varchar(10) DEFAULT '_blank' COMMENT '視窗開啟方式',
  `Movielink` varchar(20) DEFAULT '' COMMENT '影音連結',
  `Upload` varchar(5) DEFAULT '' COMMENT '上下架',
  `Home` varchar(5) DEFAULT '' COMMENT '首頁',
  `UserID` varchar(20) DEFAULT 'Admin' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='廣告管理';

-- ----------------------------
-- Records of discount
-- ----------------------------
INSERT INTO `discount` VALUES ('4', '1', '2', '1', '1', '1', 'ALL NEW VIOS 40萬40期0利率即日起至9月30日止', null, 'ALL NEW VIOS 40萬40期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:18:36', '2021-09-27 10:15:58');
INSERT INTO `discount` VALUES ('5', '1', '2', '2', '1', '1', 'YARIS 60萬30期0利率即日起至9月30日止', null, 'YARIS 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:18:44', '2021-09-27 10:16:41');
INSERT INTO `discount` VALUES ('6', '1', '2', '3', '1', '1', 'SIENTA 70萬36期0利率即日起至9月30日止', null, 'SIENTA 70萬36期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:18:49', '2021-09-27 10:17:08');
INSERT INTO `discount` VALUES ('7', '1', '2', '4', '1', '1', 'COROLLA ALTIS 70萬36期0利率即日起至9月30日止', null, 'COROLLA ALTIS 70萬36期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:18:55', '2021-09-27 10:17:30');
INSERT INTO `discount` VALUES ('8', '1', '2', '5', '1', '1', 'COROLLA ALTIS GR SPORT 70萬36期0利率 即日起至9月30日止', null, 'COROLLA ALTIS GR SPORT 70萬36期0利率 即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:19:01', '2021-09-27 10:18:01');
INSERT INTO `discount` VALUES ('9', '1', '2', '6', '1', '1', 'COROLLA CROSS 60萬30期0利率即日起至9月30日止', null, 'COROLLA CROSS 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:19:06', '2021-09-27 10:18:28');
INSERT INTO `discount` VALUES ('10', '1', '2', '7', '1', '1', 'RAV4 60萬30期0利率即日起至9月30日止', null, 'RAV4 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:19:54', '2021-09-27 10:19:54');
INSERT INTO `discount` VALUES ('11', '1', '2', '8', '1', '1', 'COROLLA SPORT 60萬30期0利率即日起至9月30日止', null, 'COROLLA SPORT 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:20:15', '2021-09-27 10:20:15');
INSERT INTO `discount` VALUES ('12', '1', '2', '9', '1', '1', 'C-HR 60萬30期0利率即日起至9月30日止', null, 'C-HR 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:20:40', '2021-09-27 10:20:40');
INSERT INTO `discount` VALUES ('13', '1', '2', '10', '1', '1', 'CAMRY 40萬30期0利率即日起至9月30日止', null, 'CAMRY 40萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:21:02', '2021-09-27 10:21:02');
INSERT INTO `discount` VALUES ('14', '1', '2', '11', '1', '1', 'PRIUS PHV(尊爵版) 40萬30期0利率即日起至9月30日止	', null, 'PRIUS PHV(尊爵版) 40萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:21:50', '2021-09-27 10:21:50');
INSERT INTO `discount` VALUES ('15', '1', '2', '12', '1', '1', 'PRIUS PHV(旗艦版) 60萬30期0利率即日起至9月30日止	', null, 'PRIUS PHV(旗艦版) 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:22:08', '2021-09-27 10:22:08');
INSERT INTO `discount` VALUES ('16', '1', '2', '13', '1', '1', 'PRIUS α 60萬30期0利率即日起至9月30日止', null, 'PRIUS α 60萬30期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:22:47', '2021-09-27 10:22:47');
INSERT INTO `discount` VALUES ('17', '1', '2', '14', '1', '1', 'PRADO 24萬24期0利率即日起至9月30日止', null, 'PRADO 24萬24期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:23:05', '2021-09-27 10:23:05');
INSERT INTO `discount` VALUES ('18', '1', '2', '15', '1', '1', 'ALPHARD 24萬24期0利率即日起至9月30日止	', null, 'ALPHARD 24萬24期0利率即日起至9月30日止', '', null, null, null, 'Yes', 'Yes', 'Admin', '2021-09-27 10:23:24', '2021-09-27 10:23:24');

-- ----------------------------
-- Table structure for discount_img
-- ----------------------------
DROP TABLE IF EXISTS `discount_img`;
CREATE TABLE `discount_img` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Discount_PKey` int(11) DEFAULT '0' COMMENT 'AD主鍵',
  `Sort` int(11) DEFAULT '1' COMMENT '序號',
  `Forder` varchar(10) DEFAULT '' COMMENT '目錄名',
  `Photo1` varchar(50) DEFAULT '' COMMENT '圖檔',
  `PhotoW1` int(11) DEFAULT '0' COMMENT '圖寬',
  `PhotoH1` int(11) DEFAULT '0' COMMENT '圖高',
  `PhotoM` varchar(100) DEFAULT '' COMMENT '圖說',
  `intType` int(11) DEFAULT '1' COMMENT '檔案類別(1.圖片;2.檔案)',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE,
  KEY `PKey` (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='FAQ圖片管理';

-- ----------------------------
-- Records of discount_img
-- ----------------------------
INSERT INTO `discount_img` VALUES ('5', '4', '1', '202109', 'discount_2021092710155801.jpg', '0', '0', '', '0', '2021-09-27 10:15:58');
INSERT INTO `discount_img` VALUES ('6', '5', '1', '202109', 'discount_2021092710164101.jpg', '0', '0', '', '0', '2021-09-27 10:16:41');
INSERT INTO `discount_img` VALUES ('7', '6', '1', '202109', 'discount_2021092710170801.jpg', '0', '0', '', '0', '2021-09-27 10:17:08');
INSERT INTO `discount_img` VALUES ('8', '7', '1', '202109', 'discount_2021092710173001.jpg', '0', '0', '', '0', '2021-09-27 10:17:30');
INSERT INTO `discount_img` VALUES ('9', '8', '1', '202109', 'discount_2021092710180101.jpg', '0', '0', '', '0', '2021-09-27 10:18:01');
INSERT INTO `discount_img` VALUES ('10', '9', '1', '202109', 'discount_2021092710182801.jpg', '0', '0', '', '0', '2021-09-27 10:18:28');
INSERT INTO `discount_img` VALUES ('11', '10', '1', '202109', 'discount_2021092710195401.jpg', '0', '0', '', '0', '2021-09-27 10:19:54');
INSERT INTO `discount_img` VALUES ('12', '11', '1', '202109', 'discount_2021092710201501.jpg', '0', '0', '', '0', '2021-09-27 10:20:15');
INSERT INTO `discount_img` VALUES ('13', '12', '1', '202109', 'discount_2021092710204001.jpg', '0', '0', '', '0', '2021-09-27 10:20:40');
INSERT INTO `discount_img` VALUES ('14', '13', '1', '202109', 'discount_2021092710210201.jpg', '0', '0', '', '0', '2021-09-27 10:21:02');
INSERT INTO `discount_img` VALUES ('15', '14', '1', '202109', 'discount_2021092710215001.jpg', '0', '0', '', '0', '2021-09-27 10:21:50');
INSERT INTO `discount_img` VALUES ('16', '15', '1', '202109', 'discount_2021092710220801.jpg', '0', '0', '', '0', '2021-09-27 10:22:08');
INSERT INTO `discount_img` VALUES ('17', '16', '1', '202109', 'discount_2021092710224701.jpg', '0', '0', '', '0', '2021-09-27 10:22:47');
INSERT INTO `discount_img` VALUES ('18', '17', '1', '202109', 'discount_2021092710230501.jpg', '0', '0', '', '0', '2021-09-27 10:23:05');
INSERT INTO `discount_img` VALUES ('19', '18', '1', '202109', 'discount_2021092710232401.jpg', '0', '0', '', '0', '2021-09-27 10:23:24');

-- ----------------------------
-- Table structure for language
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Sort` int(11) DEFAULT '0' COMMENT '順序',
  `strName` varchar(50) DEFAULT '' COMMENT '名稱',
  `Upload` varchar(5) DEFAULT '' COMMENT '上下架',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='語系管理';

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('1', '1', '中文', 'Yes', 'Admin', '2017-11-23 10:32:50', '2017-11-23 10:32:50');
INSERT INTO `language` VALUES ('2', '2', '英文', 'Yes', 'Admin', '2017-11-23 10:33:00', '2017-11-23 10:33:00');
INSERT INTO `language` VALUES ('3', '3', '簡中', 'Yes', '', null, null);

-- ----------------------------
-- Table structure for managelog
-- ----------------------------
DROP TABLE IF EXISTS `managelog`;
CREATE TABLE `managelog` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Module_PKey` int(11) DEFAULT '0' COMMENT '單元主鍵',
  `Module_Name` varchar(50) DEFAULT '' COMMENT '單元名稱',
  `strLink` varchar(50) DEFAULT '' COMMENT '檔案名稱',
  `SqlCommand` varchar(8000) DEFAULT '' COMMENT 'SQL語法',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `UserIP` varchar(20) DEFAULT '0' COMMENT ' 來源IP',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=491 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='後台異動記錄';

-- ----------------------------
-- Records of managelog
-- ----------------------------
INSERT INTO `managelog` VALUES ('455', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=4,Sort=1,Forder=202109,Photo1=discount_2021092710155801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:15:58,PKey=5', 'Admin', '60.250.70.36', '2021-09-27 10:15:58');
INSERT INTO `managelog` VALUES ('456', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=4,Sort=1,Forder=202109,Photo1=discount_2021092710155801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:15:58,PKey=5', 'Admin', '60.250.70.36', '2021-09-27 10:15:58');
INSERT INTO `managelog` VALUES ('457', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=5,Sort=1,Forder=202109,Photo1=discount_2021092710164101.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:16:41,PKey=6', 'Admin', '60.250.70.36', '2021-09-27 10:16:41');
INSERT INTO `managelog` VALUES ('458', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=5,Sort=1,Forder=202109,Photo1=discount_2021092710164101.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:16:41,PKey=6', 'Admin', '60.250.70.36', '2021-09-27 10:16:41');
INSERT INTO `managelog` VALUES ('459', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=6,Sort=1,Forder=202109,Photo1=discount_2021092710170801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:17:08,PKey=7', 'Admin', '60.250.70.36', '2021-09-27 10:17:08');
INSERT INTO `managelog` VALUES ('460', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=6,Sort=1,Forder=202109,Photo1=discount_2021092710170801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:17:08,PKey=7', 'Admin', '60.250.70.36', '2021-09-27 10:17:08');
INSERT INTO `managelog` VALUES ('461', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=7,Sort=1,Forder=202109,Photo1=discount_2021092710173001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:17:30,PKey=8', 'Admin', '60.250.70.36', '2021-09-27 10:17:30');
INSERT INTO `managelog` VALUES ('462', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=7,Sort=1,Forder=202109,Photo1=discount_2021092710173001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:17:30,PKey=8', 'Admin', '60.250.70.36', '2021-09-27 10:17:30');
INSERT INTO `managelog` VALUES ('463', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=8,Sort=1,Forder=202109,Photo1=discount_2021092710180101.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:18:01,PKey=9', 'Admin', '60.250.70.36', '2021-09-27 10:18:01');
INSERT INTO `managelog` VALUES ('464', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=8,Sort=1,Forder=202109,Photo1=discount_2021092710180101.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:18:01,PKey=9', 'Admin', '60.250.70.36', '2021-09-27 10:18:01');
INSERT INTO `managelog` VALUES ('465', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=9,Sort=1,Forder=202109,Photo1=discount_2021092710182801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:18:28,PKey=10', 'Admin', '60.250.70.36', '2021-09-27 10:18:28');
INSERT INTO `managelog` VALUES ('466', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=9,Sort=1,Forder=202109,Photo1=discount_2021092710182801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:18:28,PKey=10', 'Admin', '60.250.70.36', '2021-09-27 10:18:28');
INSERT INTO `managelog` VALUES ('467', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=1,intLocal=1,strName=ALL NEW VIOS 40萬40期0利率即日起至9月30日止,Subject=,Interview=ALL NEW VIOS 40萬40期0利率即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:18:36,UserID=Admin,PKey=4', 'Admin', '60.250.70.36', '2021-09-27 10:18:36');
INSERT INTO `managelog` VALUES ('468', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=2,intLocal=1,strName=YARIS 60萬30期0利率即日起至9月30日止,Subject=,Interview=YARIS 60萬30期0利率即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:18:44,UserID=Admin,PKey=5', 'Admin', '60.250.70.36', '2021-09-27 10:18:44');
INSERT INTO `managelog` VALUES ('469', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=3,intLocal=1,strName=SIENTA 70萬36期0利率即日起至9月30日止,Subject=,Interview=SIENTA 70萬36期0利率即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:18:49,UserID=Admin,PKey=6', 'Admin', '60.250.70.36', '2021-09-27 10:18:49');
INSERT INTO `managelog` VALUES ('470', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=4,intLocal=1,strName=COROLLA ALTIS 70萬36期0利率即日起至9月30日止,Subject=,Interview=COROLLA ALTIS 70萬36期0利率即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:18:55,UserID=Admin,PKey=7', 'Admin', '60.250.70.36', '2021-09-27 10:18:55');
INSERT INTO `managelog` VALUES ('471', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=5,intLocal=1,strName=COROLLA ALTIS GR SPORT 70萬36期0利率 即日起至9月30日止,Subject=,Interview=COROLLA ALTIS GR SPORT 70萬36期0利率 即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:19:01,UserID=Admin,PKey=8', 'Admin', '60.250.70.36', '2021-09-27 10:19:01');
INSERT INTO `managelog` VALUES ('472', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'UPDATE discount SET Class1_PKey=:Class1_PKey,Module_PKey=:Module_PKey,Sort=:Sort,intLocal=:intLocal,strName=:strName,Subject=:Subject,Interview=:Interview,strLink=:strLink,Target=:Target,Movielink=:Movielink,Upload=:Upload,Home=:Home,dtUDate=:dtUDate,UserID=:UserID WHERE PKey = :PKey\nClass1_PKey=1,Module_PKey=2,Sort=6,intLocal=1,strName=COROLLA CROSS 60萬30期0利率即日起至9月30日止,Subject=,Interview=COROLLA CROSS 60萬30期0利率即日起至9月30日止,strLink=,Target=,Movielink=,Upload=Yes,Home=Yes,dtUDate=2021/09/27 10:19:06,UserID=Admin,PKey=9', 'Admin', '60.250.70.36', '2021-09-27 10:19:06');
INSERT INTO `managelog` VALUES ('473', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=10,Sort=1,Forder=202109,Photo1=discount_2021092710195401.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:19:54,PKey=11', 'Admin', '60.250.70.36', '2021-09-27 10:19:54');
INSERT INTO `managelog` VALUES ('474', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=10,Sort=1,Forder=202109,Photo1=discount_2021092710195401.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:19:54,PKey=11', 'Admin', '60.250.70.36', '2021-09-27 10:19:54');
INSERT INTO `managelog` VALUES ('475', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=11,Sort=1,Forder=202109,Photo1=discount_2021092710201501.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:20:15,PKey=12', 'Admin', '60.250.70.36', '2021-09-27 10:20:15');
INSERT INTO `managelog` VALUES ('476', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=11,Sort=1,Forder=202109,Photo1=discount_2021092710201501.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:20:15,PKey=12', 'Admin', '60.250.70.36', '2021-09-27 10:20:15');
INSERT INTO `managelog` VALUES ('477', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=12,Sort=1,Forder=202109,Photo1=discount_2021092710204001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:20:40,PKey=13', 'Admin', '60.250.70.36', '2021-09-27 10:20:40');
INSERT INTO `managelog` VALUES ('478', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=12,Sort=1,Forder=202109,Photo1=discount_2021092710204001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:20:40,PKey=13', 'Admin', '60.250.70.36', '2021-09-27 10:20:40');
INSERT INTO `managelog` VALUES ('479', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=13,Sort=1,Forder=202109,Photo1=discount_2021092710210201.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:21:02,PKey=14', 'Admin', '60.250.70.36', '2021-09-27 10:21:02');
INSERT INTO `managelog` VALUES ('480', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=13,Sort=1,Forder=202109,Photo1=discount_2021092710210201.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:21:02,PKey=14', 'Admin', '60.250.70.36', '2021-09-27 10:21:02');
INSERT INTO `managelog` VALUES ('481', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=14,Sort=1,Forder=202109,Photo1=discount_2021092710215001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:21:50,PKey=15', 'Admin', '60.250.70.36', '2021-09-27 10:21:50');
INSERT INTO `managelog` VALUES ('482', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=14,Sort=1,Forder=202109,Photo1=discount_2021092710215001.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:21:50,PKey=15', 'Admin', '60.250.70.36', '2021-09-27 10:21:50');
INSERT INTO `managelog` VALUES ('483', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=15,Sort=1,Forder=202109,Photo1=discount_2021092710220801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:22:08,PKey=16', 'Admin', '60.250.70.36', '2021-09-27 10:22:08');
INSERT INTO `managelog` VALUES ('484', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=15,Sort=1,Forder=202109,Photo1=discount_2021092710220801.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:22:08,PKey=16', 'Admin', '60.250.70.36', '2021-09-27 10:22:08');
INSERT INTO `managelog` VALUES ('485', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=16,Sort=1,Forder=202109,Photo1=discount_2021092710224701.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:22:47,PKey=17', 'Admin', '60.250.70.36', '2021-09-27 10:22:47');
INSERT INTO `managelog` VALUES ('486', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=16,Sort=1,Forder=202109,Photo1=discount_2021092710224701.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:22:47,PKey=17', 'Admin', '60.250.70.36', '2021-09-27 10:22:47');
INSERT INTO `managelog` VALUES ('487', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=17,Sort=1,Forder=202109,Photo1=discount_2021092710230501.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:23:05,PKey=18', 'Admin', '60.250.70.36', '2021-09-27 10:23:05');
INSERT INTO `managelog` VALUES ('488', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=17,Sort=1,Forder=202109,Photo1=discount_2021092710230501.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:23:05,PKey=18', 'Admin', '60.250.70.36', '2021-09-27 10:23:05');
INSERT INTO `managelog` VALUES ('489', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=18,Sort=1,Forder=202109,Photo1=discount_2021092710232401.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:23:24,PKey=19', 'Admin', '60.250.70.36', '2021-09-27 10:23:24');
INSERT INTO `managelog` VALUES ('490', '2', '購車優惠', '/19/kuotu-motor/web_p/manage/discount/addin.php', 'INSERT INTO discount_img(Discount_PKey,Sort,Forder,Photo1,PhotoW1,PhotoH1,intType,dtDate)VALUES(:Discount_PKey,:Sort,:Forder,:Photo1,:PhotoW1,:PhotoH1,:intType,:dtDate)\nDiscount_PKey=18,Sort=1,Forder=202109,Photo1=discount_2021092710232401.jpg,PhotoW1=0,PhotoH1=0,intType=0,dtDate=2021/09/27 10:23:24,PKey=19', 'Admin', '60.250.70.36', '2021-09-27 10:23:24');

-- ----------------------------
-- Table structure for module_c
-- ----------------------------
DROP TABLE IF EXISTS `module_c`;
CREATE TABLE `module_c` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `strName` varchar(20) DEFAULT '' COMMENT '標題',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='單元模組欄位標題管理';

-- ----------------------------
-- Records of module_c
-- ----------------------------

-- ----------------------------
-- Table structure for module_d
-- ----------------------------
DROP TABLE IF EXISTS `module_d`;
CREATE TABLE `module_d` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `strName` varchar(20) DEFAULT '' COMMENT '標題',
  `strLink` varchar(20) DEFAULT '' COMMENT '後台連結',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='單元模組明細管理';

-- ----------------------------
-- Records of module_d
-- ----------------------------

-- ----------------------------
-- Table structure for module_l
-- ----------------------------
DROP TABLE IF EXISTS `module_l`;
CREATE TABLE `module_l` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `intType` int(11) DEFAULT '0' COMMENT '頁面代碼(1.列表;2.明細)',
  `Sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `strName` varchar(20) DEFAULT '' COMMENT '標題',
  `Photo1` varchar(20) DEFAULT '' COMMENT '圖檔名稱',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='單元模組樣式管理';

-- ----------------------------
-- Records of module_l
-- ----------------------------

-- ----------------------------
-- Table structure for module_p
-- ----------------------------
DROP TABLE IF EXISTS `module_p`;
CREATE TABLE `module_p` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `intType` int(11) DEFAULT '1' COMMENT '單元型態(1.功能;2.美工)',
  `intUse` int(11) DEFAULT '0' COMMENT '功能模組代碼',
  `Description` varchar(150) DEFAULT NULL,
  `Keywords` varchar(150) DEFAULT NULL,
  `strName` varchar(20) DEFAULT '' COMMENT '標題',
  `Module_Name` varchar(50) DEFAULT '' COMMENT '功能模組',
  `Home` varchar(5) DEFAULT '' COMMENT '首頁單元',
  `intLocal` int(11) DEFAULT '0' COMMENT '首頁單元',
  `strLink` varchar(20) DEFAULT '' COMMENT '後台連結',
  `intPage` int(11) DEFAULT '0' COMMENT '是否有前台單元',
  `PageLink` varchar(20) DEFAULT '' COMMENT '前台連結',
  `selList` varchar(50) DEFAULT '' COMMENT '選擇列表版面',
  `selDetail` varchar(50) DEFAULT '' COMMENT '選擇內頁版面',
  `intList` int(11) DEFAULT '0' COMMENT '列表版面代碼',
  `intDetail` int(11) DEFAULT '0' COMMENT '內頁版面代碼',
  `intLayer` int(11) DEFAULT '0' COMMENT '單元階層',
  `intColum` int(11) DEFAULT '0' COMMENT '欄位代號',
  `MaxQ` int(11) DEFAULT '0' COMMENT '最大筆數',
  `Upload` varchar(5) DEFAULT 'Yes' COMMENT '上下架',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='單元模組管理';

-- ----------------------------
-- Records of module_p
-- ----------------------------
INSERT INTO `module_p` VALUES ('1', '1', '1', '1', '2', null, null, '活動訊息', '活動訊息', '', '0', 'news', '1', '', '', '1,2,3,4', '0', '1', '0', '0', '5', 'Yes', 'Admin', '2017-08-10 18:00:29', '2017-02-18 10:16:36');
INSERT INTO `module_p` VALUES ('2', '1', '2', '1', '2', null, null, '購車優惠', '購車優惠', '', '0', 'discount', '1', '', '', '', '0', '0', '0', '0', '0', 'Yes', 'Admin', '2017-08-10 11:47:02', '2017-08-09 11:49:35');
INSERT INTO `module_p` VALUES ('3', '1', '20', '1', '17', null, null, '權限', '權限', '', '0', 'control', '1', '', '', '', '0', '0', '0', '0', '0', 'Yes', 'Admin', '2019-02-23 09:42:54', '2019-02-23 09:42:54');
INSERT INTO `module_p` VALUES ('4', '1', '3', '1', '2', null, null, '車款展示', '車款展示', '', '0', 'showroom', '1', '', '', '', '0', '0', '0', '0', '0', 'Yes', 'Admin', '2019-02-23 09:42:54', '2019-02-23 09:42:54');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系代碼',
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `intLocal` int(11) DEFAULT '1' COMMENT '顯示位置',
  `Class1_PKey` int(11) DEFAULT '0' COMMENT ' 類別主鍵',
  `strName` varchar(50) DEFAULT '' COMMENT '標題',
  `Subject` varchar(50) DEFAULT '' COMMENT '副標',
  `Interview` varchar(2000) DEFAULT '' COMMENT '簡述',
  `Color` varchar(10) DEFAULT '' COMMENT '色碼',
  `strLink` varchar(100) DEFAULT '' COMMENT '活動網址',
  `Target` varchar(10) DEFAULT '_blank' COMMENT '視窗開啟方式',
  `Movielink` varchar(20) DEFAULT '' COMMENT '影音連結',
  `Upload` varchar(5) DEFAULT '' COMMENT '上下架',
  `Home` varchar(5) DEFAULT '' COMMENT '首頁',
  `UserID` varchar(20) DEFAULT 'Admin' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='廣告管理';

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '1', '1', '1', '1', '1', 'COROLLA ALTIS & COROLLA CROSS 全新2022年式智能安全再進化', null, '升級標配TSS2.0智動駕駛輔助系統、升級至9吋大屏幕的TOYOTA Drive + Connect<br />\n詳情請洽國都TOYOTA各營業所', '', 'https://www.toyota.com.tw/news_detail.aspx?id=665', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-08-18 11:42:10');
INSERT INTO `news` VALUES ('2', '1', '1', '2', '1', '1', '顧客安心賞車保修，防疫無憂！', null, '顧客專屬防疫慰問金<br />\n賞車保修最安心<br />\nTOYOTA與您防疫齊心', '', 'https://www.toyota.com.tw/news_detail.aspx?id=661', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-08-18 16:42:57');
INSERT INTO `news` VALUES ('3', '1', '1', '3', '1', '1', 'COROLLA CROSS GR SPORT 狂放忘我 全新上市', null, 'GR SPORT 專屬外觀、運動化懸吊系統、TSS 2.0<br />\n詳情請洽國都TOYOTA各營業所', '', 'https://www.toyota.com.tw/showroom/COROLLA_CROSS_GR', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-08-18 16:45:15');
INSERT INTO `news` VALUES ('4', '1', '1', '5', '1', '1', '利hight金點數活動調整公告', null, '2021年10月1日(含)起，和泰汽車(股)將進行點數制度的調整，以提供您更全面與多元的點數服務。', '', 'https://www.toyota.com.tw/TOYOTA_Loyalty_Program/#/section-4', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-08-18 16:45:53');
INSERT INTO `news` VALUES ('9', '1', '1', '4', '1', '1', 'TOYOTA 精品團圓獻禮', null, 'Happy Moon Festival 中秋節限定85折起!!!', '', 'https://www.amazingselect.com.tw/marketing/topicgroup/?id=22', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-08-30 15:26:07');
INSERT INTO `news` VALUES ('10', '1', '1', '6', '1', '1', '林口三井品牌形象館限定精品優惠', null, 'TOYOTA 原廠精品最低4折起<br />\nGR 風格背包 三井限定優惠4折<br />\n玩具迴力車1台7折2台6折<br />\n其他品項7折優惠<br />\nTOYOTA品牌形象館【林口三井OUTLET限定店】<br />\n展間地址：新北市林口區文化三路一段356號<br />\n(林口三井OUTLET PARK 1F，近東口)', '', 'https://www.facebook.com/Kuotutoyota/photos/pcb.959677147912615/959676541246009/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:19:50');
INSERT INTO `news` VALUES ('11', '1', '1', '1', '1', '2', 'Lexus｜尊榮貴賓專屬 防疫慰問金', null, '防疫期間國都Lexus 為您做好萬全保障，讓您安心入廠，無後顧之憂！！', '', 'https://www.lexus.com.tw/news_detail.aspx?fn=1&nw=431', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 11:31:39', '2021-09-14 11:25:19');
INSERT INTO `news` VALUES ('12', '1', '1', '2', '1', '2', 'LEXUS 精品｜團圓獻禮優惠實施中', null, 'Lexus 國都精品提供您中秋送禮新選擇，敬請把握本月精品限定優惠。<br />\n優惠期間：2021/9/1 至9/28<br />\n●點數加價購6 折起<br />\n●現金/信用卡85 折起<br />\n*部分商品恕不折扣<br />\n詳情請洽國都服務廠', '', 'https://www.facebook.com/123546031550932/photos/a.128171407755061/975239833048210/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 11:31:36', '2021-09-14 11:31:15');
INSERT INTO `news` VALUES ('13', '1', '1', '7', '1', '1', '歡慶中秋2萬好禮', null, '現購 SIENTA，就送「歡慶中秋 2 萬豪禮」<br />\n創新美容星鑽年卡乙張(價值$6,880)<br />\n購車加油金3,000 元<br />\n0利率專案(20 萬/12 期)<br />\n松江所(02-25159988)<br />\n陽明所(02-28911811)<br />\n中和所(02-82266988)<br />\n丹鳳所(02-29015800)', '', 'https://www.facebook.com/Kuotutoyota/photos/a.254034501810220/959678511245812/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:33:24');
INSERT INTO `news` VALUES ('14', '1', '1', '8', '1', '1', '無論遊山或玩水，多台好車任你挑選', null, '優質原廠保固<br />\n160 項專業檢驗<br />\n首次免費定保<br />\n完善貸款服務<br />\n業界最長14天購車鑑賞期<br />\n豐富多款好車，就等你預約試車<br />\n松江所(02-25159988)<br />\n陽明所(02-28911811)<br />\n中和所(02-82266988)<br />\n丹鳳所(02-29015800)', '', 'https://www.facebook.com/Kuotutoyota/photos/a.254034501810220/957865291427134/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:34:40');
INSERT INTO `news` VALUES ('15', '1', '1', '9', '1', '1', '2021 年TOYOTA 國都環境月~~泰山楓樹腳公園環境月活動', null, '國都深耕-為珍愛台灣發聲<br />\n森生不息國都汽車認養公園最給力', '', 'https://www.facebook.com/hashtag/泰山楓樹腳公園環境月活動', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:35:37');
INSERT INTO `news` VALUES ('16', '1', '1', '3', '1', '2', '零利率專案輕鬆入主~~2021年9月限時優惠', null, '詳情請洽國都LEXUS各營業所', '', 'https://lexus.com.tw/buycar/sp/index.aspx', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 11:36:19', '2021-09-14 11:36:19');
INSERT INTO `news` VALUES ('17', '1', '1', '4', '1', '2', '22年式RX | 全面標配LEXUS LINK', null, '#您與愛車的最佳連結<br />\n#LEXUS_LINK智能車載系統<br />\n讓每一次的移動，都戀得更安心享受<br />\n22年式RX全面導入LEXUS LINK智能車載系統，<br />\n整合數位工具及車機數據，提供最方便的移動服務！<br />\n#車輛狀態_隨時掌握<br />\n#尋找愛車_輕鬆寫意<br />\n#行駛報告_清楚明瞭<br />\n#加油日記_不怕忘記', '', 'https://www.lexus.com.tw/showroom/RX', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 11:37:18', '2021-09-14 11:37:18');
INSERT INTO `news` VALUES ('18', '1', '1', '10', '1', '1', 'GR YARIS 剽悍登場 承襲賽道基因 本格氣息', null, 'TOYOTA總代理和泰汽車於2021年8月3日發表全新TOYOTA GR YARIS。', '', 'https://www.toyota.com.tw/news_detail.aspx?id=646', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:38:25');
INSERT INTO `news` VALUES ('19', '1', '1', '5', '1', '2', 'Lexus｜原廠護駕 安心放假', null, '即日起至 9/30 止回廠更換輪胎，即享休旅車全車系輪胎 85 折優惠，並贈送限量安心御守。', '', 'https://www.facebook.com/lexus.tw/videos/4122614954481534', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 11:39:13', '2021-09-14 11:39:13');
INSERT INTO `news` VALUES ('20', '1', '1', '11', '1', '1', '前擋玻璃 補修服務', null, '原廠專業補修技術，國都TOYOTA<br />\n1. 濱江服務廠<br />\n2. 士林服務廠<br />\n3.陽明服務廠。', '', 'https://www.toyota.com.tw/owner_news_detail.aspx?id=592', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:40:05');
INSERT INTO `news` VALUES ('21', '1', '1', '12', '1', '1', '免費健診 讓你Fun鬆涼一夏', null, '入廠即享 免費健診 車內藍光噴霧消毒', '', 'https://www.facebook.com/Kuotutoyota/photos/a.254034501810220/937606753452988/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 11:47:46');
INSERT INTO `news` VALUES ('22', '1', '1', '6', '1', '2', 'Lexus摯友尊享好禮', null, '自2021年7月起，針對車齡滿5年(含)以上之車主，推出專屬的「摯友尊享好禮」方案。', '', 'https://www.lexus.com.tw/news_detail.aspx?nw=414&fn=1', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 13:22:43', '2021-09-14 13:22:43');
INSERT INTO `news` VALUES ('23', '1', '1', '13', '1', '1', 'YOKOHAMA', null, '濕地穩抓全域制霸', '', 'https://www.toyota.com.tw/event/202104_toyota_toyotatire_v1/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:23:55');
INSERT INTO `news` VALUES ('24', '1', '1', '14', '1', '1', 'Toyota Eco 特攻隊', null, '2050豐田碳中和 為珍愛台灣發聲', '', 'https://www.facebook.com/Toyotalove.earth99/videos/830471711225589', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:25:07');
INSERT INTO `news` VALUES ('25', '1', '1', '7', '1', '2', 'Lexus線上預約試乘/購車諮詢', null, '提供您尊榮零接觸服務！', '', 'https://www.lexus.com.tw/testdrive.aspx', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 13:26:43', '2021-09-14 13:26:43');
INSERT INTO `news` VALUES ('26', '1', '1', '8', '1', '2', 'Lexus｜精心守護 讓您回廠最安心', null, '服務廠擴大預約取送車服務<br />\n 車輛保養完修後全面消毒<br />\n預約到府取送車敬請電洽國都LEXUS服務廠：<br />\n濱江廠(02-25081288)<br />\n士林廠(02-28312289)<br />\n新莊廠(02-29983990)<br />\n中和廠(02-82218618)', '', 'https://www.facebook.com/123546031550932/photos/a.128171407755061/920715998500594/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 13:27:46', '2021-09-14 13:27:28');
INSERT INTO `news` VALUES ('27', '1', '1', '15', '1', '1', '車主最可靠的防疫夥伴', null, '即日起推出 取送服務  若有取送車需求可以來電預約 我們盡速幫您安排人員到府取車', '', 'https://www.facebook.com/Kuotutoyota/photos/a.254034501810220/903594326854231/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:28:39');
INSERT INTO `news` VALUES ('28', '1', '1', '16', '1', '1', '國都原廠認證中古車 車主獨享好禮', null, '只要是「今年5/31~12/31」交車車主<br />\n⭐首半年免費換油券1張<br />\n⭐輪胎折價券4張、電瓶折價券1張<br />\n好康再加碼！<br />\n車齡4年(含)以上車主享⭐7項正廠零件工資85折優惠\n（引擎腳、前下懸吊臂、球接頭、拉桿端頭、煞車軟管、皮帶張緊器、轉向中間軸）', '', 'https://www.facebook.com/Kuotutoyota/photos/pcb.903487433531587/903487300198267', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:29:36');
INSERT INTO `news` VALUES ('29', '1', '1', '17', '1', '1', '想買車？線上諮詢免出門！', null, 'TOYOTA購車諮詢0接觸', '', 'https://www.toyota.com.tw/testdrive.aspx?serviceType=2/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:30:18');
INSERT INTO `news` VALUES ('30', '1', '1', '18', '1', '1', 'TOYOTA 玩具愛分享', null, '邀您一起回收玩具、讓愛新生', '', 'https://www.toyota.com.tw/TOYOTA_Toy_Story/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:30:54');
INSERT INTO `news` VALUES ('31', '1', '1', '19', '1', '1', '【引爆篇】環保，Connect & Sustain', null, '2021就是要引爆環保時尚行為?以關鍵人物+關鍵作法 ，創造低碳、減塑、Fun生活正向影響力！', '', 'https://www.facebook.com/Toyotalove.earth99/videos/157122036019452', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:32:01');
INSERT INTO `news` VALUES ('32', '1', '1', '20', '1', '1', '環保經濟學', null, '最近全球的股市漲漲漲<br />\n搭配最夯的「環保經濟學」<br />\n推薦能帶來環保價值的和泰與全台經銷商：<br />\n減碳2,434噸<br />\n減廢80噸<br />\n(太陽能發電)收入194萬<br />\n(節電及節水)節費106萬<br />\n就是上半年所創造的低碳、減塑、Fun生活之環保價值!', '', 'https://www.facebook.com/watch/?v=1763416943820889', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:33:06');
INSERT INTO `news` VALUES ('33', '1', '1', '21', '1', '1', '國都汽車愛地球、愛環保，達成節能減碳目標', null, '完成TOYOTA中和據點頂樓屋頂型太陽能光電系統設置', '', 'https://www.kuotu-motor.com.tw/news-1090910-3.html', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:34:14');
INSERT INTO `news` VALUES ('34', '1', '1', '9', '1', '2', 'LEXUS 車主尊榮回饋', null, '每一次回廠保養 都為您累積更多禮遇', '', 'https://www.lexus.com.tw/eliterewards/index.aspx#/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 13:34:57', '2021-09-14 13:34:57');
INSERT INTO `news` VALUES ('35', '1', '1', '22', '1', '1', 'Toyota Eco 特攻隊', null, '2019年一起傳遞「環保價值」<br />\n和泰汽車與在地經銷商，<br />\n透過完善的綠色服務，<br />\n已成為最優秀的綠色營運企業<br />\n動一動手指，傳遞去年所創造的環保價值，且持續累積中', '', 'https://www.facebook.com/Toyotalove.earth99/videos/619125111873216/', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:36:18');
INSERT INTO `news` VALUES ('36', '1', '1', '23', '1', '1', 'TOYOTA 一車一樹公益計畫', null, '減碳抗氧化，守護海岸線，共創永續家園', '', 'http://www.hotaimotor.com.tw/tree', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:38:47');
INSERT INTO `news` VALUES ('37', '1', '1', '24', '1', '1', '節能體驗--邀您體驗試乘新感動', null, '我們堅信，唯有親身體驗，才能真正感受TOYOTA的高品質與服務！誠摯邀請您至國都展示間試乘體驗！', '', 'https://www.toyota.com.tw/testdrive.aspx', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:39:33');
INSERT INTO `news` VALUES ('38', '1', '1', '25', '1', '1', 'No.1的企業只適合No.1的你', null, 'TOYOTA人力招募', '', 'https://www.kuotu-motor.com.tw/2011-04-12.htm', '_blank', null, 'Yes', 'Yes', 'Admin', '2021-09-14 14:12:36', '2021-09-14 13:40:32');

-- ----------------------------
-- Table structure for news_img
-- ----------------------------
DROP TABLE IF EXISTS `news_img`;
CREATE TABLE `news_img` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `News_PKey` int(11) DEFAULT '0' COMMENT 'AD主鍵',
  `Sort` int(11) DEFAULT '1' COMMENT '序號',
  `Forder` varchar(10) DEFAULT '' COMMENT '目錄名',
  `Photo1` varchar(50) DEFAULT '' COMMENT '圖檔',
  `PhotoW1` int(11) DEFAULT '0' COMMENT '圖寬',
  `PhotoH1` int(11) DEFAULT '0' COMMENT '圖高',
  `PhotoM` varchar(100) DEFAULT '' COMMENT '圖說',
  `intType` int(11) DEFAULT '1' COMMENT '檔案類別(1.圖片;2.檔案)',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE,
  KEY `PKey` (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='FAQ圖片管理';

-- ----------------------------
-- Records of news_img
-- ----------------------------
INSERT INTO `news_img` VALUES ('2', '1', '1', '202109', 'news_2021091410550401.gif', '320', '164', '', '1', '2021-09-14 10:55:04');
INSERT INTO `news_img` VALUES ('3', '2', '1', '202109', 'news_2021091410555101.gif', '320', '164', '', '1', '2021-09-14 10:55:51');
INSERT INTO `news_img` VALUES ('4', '3', '1', '202109', 'news_2021091410574301.gif', '320', '164', '', '1', '2021-09-14 10:57:43');
INSERT INTO `news_img` VALUES ('5', '4', '1', '202109', 'news_2021091410593301.gif', '320', '164', '', '1', '2021-09-14 10:59:33');
INSERT INTO `news_img` VALUES ('6', '5', '1', '202108', 'news_2021082711122001.gif', '0', '0', '', '0', '2021-08-27 11:12:20');
INSERT INTO `news_img` VALUES ('7', '6', '1', '202108', 'news_2021082711132001.gif', '0', '0', '', '0', '2021-08-27 11:13:20');
INSERT INTO `news_img` VALUES ('8', '7', '1', '202108', 'news_2021082711141801.gif', '0', '0', '', '0', '2021-08-27 11:14:18');
INSERT INTO `news_img` VALUES ('9', '8', '1', '202108', 'news_2021082711182201.gif', '0', '0', '', '0', '2021-08-27 11:18:22');
INSERT INTO `news_img` VALUES ('10', '9', '1', '202109', 'news_2021091410582201.gif', '320', '164', '', '1', '2021-09-14 10:58:22');
INSERT INTO `news_img` VALUES ('11', '10', '1', '202109', 'news_2021091411195001.gif', '0', '0', '', '0', '2021-09-14 11:19:50');
INSERT INTO `news_img` VALUES ('12', '11', '1', '202109', 'news_2021091411251901.gif', '0', '0', '', '0', '2021-09-14 11:25:19');
INSERT INTO `news_img` VALUES ('13', '12', '1', '202109', 'news_2021091411311501.gif', '0', '0', '', '0', '2021-09-14 11:31:15');
INSERT INTO `news_img` VALUES ('14', '13', '1', '202109', 'news_2021091411332401.gif', '0', '0', '', '0', '2021-09-14 11:33:24');
INSERT INTO `news_img` VALUES ('15', '14', '1', '202109', 'news_2021091411344001.gif', '0', '0', '', '0', '2021-09-14 11:34:40');
INSERT INTO `news_img` VALUES ('16', '15', '1', '202109', 'news_2021091411353701.gif', '0', '0', '', '0', '2021-09-14 11:35:37');
INSERT INTO `news_img` VALUES ('17', '16', '1', '202109', 'news_2021091411361901.gif', '0', '0', '', '0', '2021-09-14 11:36:19');
INSERT INTO `news_img` VALUES ('18', '17', '1', '202109', 'news_2021091411371801.gif', '0', '0', '', '0', '2021-09-14 11:37:18');
INSERT INTO `news_img` VALUES ('19', '18', '1', '202109', 'news_2021091411382501.gif', '0', '0', '', '0', '2021-09-14 11:38:25');
INSERT INTO `news_img` VALUES ('20', '19', '1', '202109', 'news_2021091411391301.gif', '0', '0', '', '0', '2021-09-14 11:39:13');
INSERT INTO `news_img` VALUES ('21', '20', '1', '202109', 'news_2021091411400501.gif', '0', '0', '', '0', '2021-09-14 11:40:05');
INSERT INTO `news_img` VALUES ('22', '21', '1', '202109', 'news_2021091411474601.gif', '0', '0', '', '0', '2021-09-14 11:47:46');
INSERT INTO `news_img` VALUES ('23', '22', '1', '202109', 'news_2021091413224301.gif', '0', '0', '', '0', '2021-09-14 13:22:43');
INSERT INTO `news_img` VALUES ('24', '23', '1', '202109', 'news_2021091413235501.gif', '0', '0', '', '0', '2021-09-14 13:23:55');
INSERT INTO `news_img` VALUES ('25', '24', '1', '202109', 'news_2021091413250701.gif', '0', '0', '', '0', '2021-09-14 13:25:07');
INSERT INTO `news_img` VALUES ('26', '25', '1', '202109', 'news_2021091413264301.gif', '0', '0', '', '0', '2021-09-14 13:26:43');
INSERT INTO `news_img` VALUES ('27', '26', '1', '202109', 'news_2021091413274601.gif', '320', '164', '', '1', '2021-09-14 13:27:46');
INSERT INTO `news_img` VALUES ('28', '27', '1', '202109', 'news_2021091413283901.gif', '0', '0', '', '0', '2021-09-14 13:28:39');
INSERT INTO `news_img` VALUES ('29', '28', '1', '202109', 'news_2021091413293601.gif', '0', '0', '', '0', '2021-09-14 13:29:36');
INSERT INTO `news_img` VALUES ('30', '29', '1', '202109', 'news_2021091413301801.gif', '0', '0', '', '0', '2021-09-14 13:30:18');
INSERT INTO `news_img` VALUES ('31', '30', '1', '202109', 'news_2021091413305401.gif', '0', '0', '', '0', '2021-09-14 13:30:54');
INSERT INTO `news_img` VALUES ('32', '31', '1', '202109', 'news_2021091413320101.gif', '0', '0', '', '0', '2021-09-14 13:32:01');
INSERT INTO `news_img` VALUES ('33', '32', '1', '202109', 'news_2021091413330601.gif', '0', '0', '', '0', '2021-09-14 13:33:06');
INSERT INTO `news_img` VALUES ('34', '33', '1', '202109', 'news_2021091413341401.gif', '0', '0', '', '0', '2021-09-14 13:34:14');
INSERT INTO `news_img` VALUES ('35', '34', '1', '202109', 'news_2021091413345701.gif', '0', '0', '', '0', '2021-09-14 13:34:57');
INSERT INTO `news_img` VALUES ('36', '35', '1', '202109', 'news_2021091413361801.gif', '0', '0', '', '0', '2021-09-14 13:36:18');
INSERT INTO `news_img` VALUES ('37', '36', '1', '202109', 'news_2021091413384701.gif', '0', '0', '', '0', '2021-09-14 13:38:47');
INSERT INTO `news_img` VALUES ('38', '37', '1', '202109', 'news_2021091413393301.gif', '0', '0', '', '0', '2021-09-14 13:39:33');
INSERT INTO `news_img` VALUES ('39', '38', '1', '202109', 'news_2021091413403201.gif', '0', '0', '', '0', '2021-09-14 13:40:32');

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Sort` int(11) DEFAULT '0' COMMENT '順序',
  `strName` varchar(50) DEFAULT '' COMMENT '功能名稱',
  `strLink` varchar(20) DEFAULT '' COMMENT '功能連結',
  `MaxLayer` int(11) DEFAULT '0' COMMENT '最大階層數',
  `isList` int(11) DEFAULT '0' COMMENT '是否有列表頁',
  `isDetail` int(11) DEFAULT '0' COMMENT '是否有明細頁',
  `isColum` int(11) DEFAULT '0' COMMENT '是否有欄位標題',
  `Home` varchar(5) DEFAULT '' COMMENT '首頁單元',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='程式功能名稱';

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES ('1', '1', '首頁Banner', 'ad', '0', '0', '0', '0', 'Yes');
INSERT INTO `program` VALUES ('2', '1', '單元Banner', 'banner', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('3', '2', '公司介紹(選單可擴充)', 'company', '0', '0', '1', '0', '');
INSERT INTO `program` VALUES ('4', '3', '新聞訊息(有日期)', 'news', '2', '1', '1', '0', '');
INSERT INTO `program` VALUES ('5', '4', '圖文訊息(無日期)', 'paper', '2', '1', '1', '0', '');
INSERT INTO `program` VALUES ('6', '6', 'FAQ(一問一答)', 'faq', '0', '1', '0', '0', '');
INSERT INTO `program` VALUES ('7', '7', '消費性產品(有售價)', 'product', '4', '1', '1', '1', '');
INSERT INTO `program` VALUES ('8', '7', '工業性產品(無售價)', 'product', '4', '1', '1', '1', '');
INSERT INTO `program` VALUES ('9', '5', '活動相簿', 'album', '2', '1', '1', '0', '');
INSERT INTO `program` VALUES ('10', '6', 'Youtube影音', 'movie', '2', '1', '0', '0', '');
INSERT INTO `program` VALUES ('11', '8', '會員', 'member', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('12', '11', '訂單(無前台)', 'order', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('13', '8', '網站連結', 'weblink', '0', '1', '0', '0', '');
INSERT INTO `program` VALUES ('14', '9', '檔案下載', 'filedown', '2', '1', '0', '0', '');
INSERT INTO `program` VALUES ('15', '11', '訂閱電子報(無前台)', 'epaper', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('16', '10', '行事曆', 'calendar', '0', '1', '0', '0', '');
INSERT INTO `program` VALUES ('17', '98', '員工權限(無前台)', 'control', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('18', '12', '歷史沿革', 'history', '0', '1', '0', '0', '');
INSERT INTO `program` VALUES ('19', '13', '活動報名', 'course', '2', '1', '1', '0', '');
INSERT INTO `program` VALUES ('20', '14', '捐款專案(圖文+線上捐款)', 'project', '2', '1', '1', '0', '');
INSERT INTO `program` VALUES ('21', '14', '線下捐款(可匯入資料)', 'donate', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('22', '15', '優惠券', 'coupon', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('23', '15', '優惠折抵', 'discount', '0', '0', '0', '0', '');
INSERT INTO `program` VALUES ('24', '99', '自訂程式', 'none', '0', '0', '0', '0', '');

-- ----------------------------
-- Table structure for program_img
-- ----------------------------
DROP TABLE IF EXISTS `program_img`;
CREATE TABLE `program_img` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Sort` int(11) DEFAULT '0' COMMENT '排序',
  `intUse` int(11) DEFAULT '0' COMMENT '功能模組代碼',
  `intType` int(11) DEFAULT '0' COMMENT '頁面代碼(1.列表;2.明細)',
  `strName` varchar(50) DEFAULT '' COMMENT '名稱',
  `Photo1` varchar(50) DEFAULT '' COMMENT '圖檔名稱',
  `PhotoW1` int(11) DEFAULT '0' COMMENT '圖寬',
  `PhotoH1` int(11) DEFAULT '0' COMMENT '圖高',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='單元頁面管理';

-- ----------------------------
-- Records of program_img
-- ----------------------------
INSERT INTO `program_img` VALUES ('1', '1', '3', '2', 'D-0301', 'D-0301.jpg', '150', '451', 'Admin', '2019-01-18 14:17:27', '2018-04-27 10:36:00');
INSERT INTO `program_img` VALUES ('2', '2', '3', '2', 'D-0302', 'D-0302.jpg', '150', '269', 'Admin', '2019-01-04 16:01:33', '2018-04-27 10:41:46');
INSERT INTO `program_img` VALUES ('3', '3', '3', '2', 'D-0303', 'D-0303.jpg', '150', '358', 'Admin', '2019-01-04 16:01:45', '2018-04-27 10:41:55');
INSERT INTO `program_img` VALUES ('4', '4', '3', '2', 'D-0304', 'D-0304.jpg', '150', '334', 'Admin', '2018-04-27 10:42:10', '2018-04-27 10:42:10');
INSERT INTO `program_img` VALUES ('5', '1', '4', '1', 'L-0401', 'L-0401.jpg', '150', '227', 'Admin', '2018-04-27 11:06:02', '2018-04-27 11:06:02');
INSERT INTO `program_img` VALUES ('6', '2', '4', '1', 'L-0402', 'L-0402.jpg', '150', '255', 'Admin', '2018-04-27 11:06:17', '2018-04-27 11:06:17');
INSERT INTO `program_img` VALUES ('7', '3', '4', '1', 'L-0403', 'L-0403.jpg', '150', '142', 'Admin', '2018-04-27 11:06:27', '2018-04-27 11:06:27');
INSERT INTO `program_img` VALUES ('8', '1', '4', '2', 'D-0401', 'D-0401.jpg', '150', '451', 'Admin', '2019-01-04 16:22:08', '2018-04-27 11:06:57');
INSERT INTO `program_img` VALUES ('9', '2', '4', '2', 'D-0402', 'D-0402.jpg', '150', '269', 'Admin', '2019-01-04 16:22:59', '2018-04-27 11:07:15');
INSERT INTO `program_img` VALUES ('10', '3', '4', '2', 'D-0403', 'D-0403.jpg', '150', '358', 'Admin', '2019-01-04 16:23:12', '2018-04-27 11:07:26');
INSERT INTO `program_img` VALUES ('11', '4', '4', '2', 'D-0404', 'D-0404.jpg', '150', '334', 'Admin', '2018-04-27 11:07:35', '2018-04-27 11:07:35');
INSERT INTO `program_img` VALUES ('12', '1', '5', '1', 'L-0501', 'L-0501.jpg', '150', '236', 'Admin', '2018-04-27 11:09:00', '2018-04-27 11:09:00');
INSERT INTO `program_img` VALUES ('13', '2', '5', '1', 'L-0502', 'L-0502.jpg', '150', '236', 'Admin', '2018-04-27 11:14:25', '2018-04-27 11:14:25');
INSERT INTO `program_img` VALUES ('14', '3', '5', '1', 'L-0503', 'L-0503.jpg', '150', '236', 'Admin', '2019-01-17 13:43:41', '2018-04-27 11:14:36');
INSERT INTO `program_img` VALUES ('15', '1', '5', '2', 'D-0501', 'D-0501.jpg', '150', '451', 'Admin', '2019-01-09 15:21:44', '2018-04-27 11:14:50');
INSERT INTO `program_img` VALUES ('16', '2', '5', '2', 'D-0502', 'D-0502.jpg', '150', '269', 'Admin', '2019-01-09 15:22:38', '2018-04-27 11:15:03');
INSERT INTO `program_img` VALUES ('17', '3', '5', '2', 'D-0503', 'D-0503.jpg', '150', '358', 'Admin', '2019-01-09 15:22:51', '2018-04-27 11:15:11');
INSERT INTO `program_img` VALUES ('18', '4', '5', '2', 'D-0504', 'D-0504.jpg', '150', '334', 'Admin', '2018-04-27 11:15:17', '2018-04-27 11:15:17');
INSERT INTO `program_img` VALUES ('19', '1', '6', '1', 'L-0601', 'L-0601.jpg', '150', '170', 'Admin', '2018-04-27 11:18:32', '2018-04-27 11:18:32');
INSERT INTO `program_img` VALUES ('20', '2', '6', '1', 'L-0602', 'L-0602.jpg', '150', '198', 'Admin', '2018-04-27 11:18:46', '2018-04-27 11:18:46');
INSERT INTO `program_img` VALUES ('21', '3', '6', '1', 'L-0603', 'L-0603.jpg', '150', '213', 'Admin', '2018-04-27 11:18:53', '2018-04-27 11:18:53');
INSERT INTO `program_img` VALUES ('22', '1', '7', '1', 'L-0701', 'L-0701.jpg', '500', '739', 'Admin', '2018-04-27 11:22:27', '2018-04-27 11:21:53');
INSERT INTO `program_img` VALUES ('23', '2', '7', '1', 'L-0702', 'L-0702.jpg', '500', '749', 'Admin', '2018-04-27 11:22:32', '2018-04-27 11:22:32');
INSERT INTO `program_img` VALUES ('24', '3', '7', '1', 'L-0703', 'L-0703.jpg', '500', '391', 'Admin', '2018-04-27 11:22:38', '2018-04-27 11:22:38');
INSERT INTO `program_img` VALUES ('25', '4', '7', '1', 'L-0704', 'L-0704.jpg', '500', '1443', 'Admin', '2018-04-27 11:22:44', '2018-04-27 11:22:44');
INSERT INTO `program_img` VALUES ('26', '1', '7', '2', 'D-0701', 'D-0701.jpg', '500', '766', 'Admin', '2018-04-27 11:23:51', '2018-04-27 11:23:51');
INSERT INTO `program_img` VALUES ('27', '2', '7', '2', 'D-0702', 'D-0702.jpg', '500', '1781', 'Admin', '2018-04-27 11:24:07', '2018-04-27 11:24:07');
INSERT INTO `program_img` VALUES ('28', '3', '7', '2', 'D-0703', 'D-0703.jpg', '500', '766', 'Admin', '2018-04-27 11:24:14', '2018-04-27 11:24:14');
INSERT INTO `program_img` VALUES ('29', '1', '8', '1', 'L-0801', 'L-0801.jpg', '150', '180', 'Admin', '2019-01-17 14:52:18', '2018-04-27 11:25:12');
INSERT INTO `program_img` VALUES ('30', '2', '8', '1', 'L-0802', 'L-0802.jpg', '150', '227', 'Admin', '2019-01-17 14:52:28', '2018-04-27 11:25:24');
INSERT INTO `program_img` VALUES ('31', '3', '8', '1', 'L-0803', 'L-0803.jpg', '152', '150', 'Admin', '2019-01-17 14:42:16', '2018-04-27 11:25:30');
INSERT INTO `program_img` VALUES ('32', '4', '8', '1', 'L-0804', 'L-0804.jpg', '150', '204', 'Admin', '2019-01-17 14:42:24', '2018-04-27 11:25:35');
INSERT INTO `program_img` VALUES ('33', '1', '8', '2', 'D-0801', 'D-0801.jpg', '150', '185', 'Admin', '2019-01-17 15:29:14', '2018-04-27 11:26:09');
INSERT INTO `program_img` VALUES ('34', '2', '8', '2', 'D-0802', 'D-0802.jpg', '150', '170', 'Admin', '2019-01-17 16:07:35', '2018-04-27 11:26:22');
INSERT INTO `program_img` VALUES ('35', '3', '8', '2', 'D-0803', 'D-0803.jpg', '150', '185', 'Admin', '2019-01-17 16:07:47', '2018-04-27 11:26:27');
INSERT INTO `program_img` VALUES ('37', '1', '9', '1', 'L-0901', 'L-0901.png', '150', '150', 'Admin', '2019-01-17 14:02:41', '2018-04-27 11:27:21');
INSERT INTO `program_img` VALUES ('38', '2', '9', '1', 'L-0902', 'L-0902.jpg', '150', '247', 'Admin', '2019-01-17 14:02:55', '2018-04-27 11:27:33');
INSERT INTO `program_img` VALUES ('39', '3', '9', '1', 'L-0903', 'L-0903.jpg', '150', '150', 'Admin', '2019-01-17 14:03:10', '2018-04-27 11:27:39');
INSERT INTO `program_img` VALUES ('40', '4', '9', '1', 'L-0904', 'L-0904.png', '150', '150', 'Admin', '2019-01-17 14:03:17', '2018-04-27 11:27:45');
INSERT INTO `program_img` VALUES ('41', '1', '9', '2', 'D-0901', 'D-0901.jpg', '500', '866', 'Admin', '2018-04-27 11:28:03', '2018-04-27 11:28:03');
INSERT INTO `program_img` VALUES ('42', '2', '9', '2', 'D-0902', 'D-0902.jpg', '500', '445', 'Admin', '2018-04-27 11:28:15', '2018-04-27 11:28:15');
INSERT INTO `program_img` VALUES ('43', '3', '9', '2', 'D-0903', 'D-0903.jpg', '500', '534', 'Admin', '2018-04-27 11:28:26', '2018-04-27 11:28:26');
INSERT INTO `program_img` VALUES ('44', '4', '9', '2', 'D-0904', 'D-0904.jpg', '500', '459', 'Admin', '2018-04-27 11:28:40', '2018-04-27 11:28:40');
INSERT INTO `program_img` VALUES ('45', '1', '10', '1', 'L-1001', 'L-1001.jpg', '500', '425', 'Admin', '2018-04-27 11:29:08', '2018-04-27 11:29:08');
INSERT INTO `program_img` VALUES ('46', '2', '10', '1', 'L-1002', 'L-1002.jpg', '500', '643', 'Admin', '2018-04-27 11:29:20', '2018-04-27 11:29:20');
INSERT INTO `program_img` VALUES ('47', '3', '10', '1', 'L-1003', 'L-1003.jpg', '173', '198', 'Admin', '2019-01-17 14:20:01', '2018-04-27 11:29:27');
INSERT INTO `program_img` VALUES ('48', '1', '13', '1', 'L-1301', 'L-1301.jpg', '500', '475', 'Admin', '2018-04-27 11:29:50', '2018-04-27 11:29:50');
INSERT INTO `program_img` VALUES ('49', '2', '13', '1', 'L-1302', 'L-1302.jpg', '500', '557', 'Admin', '2018-04-27 11:30:03', '2018-04-27 11:30:03');
INSERT INTO `program_img` VALUES ('50', '3', '13', '1', 'L-1303', 'L-1303.jpg', '500', '533', 'Admin', '2018-04-27 11:30:08', '2018-04-27 11:30:08');
INSERT INTO `program_img` VALUES ('51', '1', '14', '1', 'L-1401', 'L-1401.jpg', '500', '327', 'Admin', '2018-04-27 11:30:32', '2018-04-27 11:30:32');
INSERT INTO `program_img` VALUES ('52', '2', '14', '1', 'L-1402', 'L-1402.jpg', '500', '402', 'Admin', '2018-04-27 11:30:43', '2018-04-27 11:30:43');
INSERT INTO `program_img` VALUES ('53', '3', '14', '1', 'L-1403', 'L-1403.jpg', '500', '266', 'Admin', '2018-04-27 11:30:50', '2018-04-27 11:30:50');
INSERT INTO `program_img` VALUES ('54', '1', '16', '1', 'L-1601', 'L-1601.jpg', '500', '290', 'Admin', '2018-04-27 11:32:59', '2018-04-27 11:31:04');
INSERT INTO `program_img` VALUES ('55', '2', '16', '1', 'L-1602', 'L-1602.jpg', '500', '258', 'Admin', '2018-04-27 11:33:15', '2018-04-27 11:31:18');
INSERT INTO `program_img` VALUES ('56', '1', '18', '1', 'L-1801', 'L-1801.jpg', '500', '751', 'Admin', '2018-04-27 11:39:57', '2018-04-27 11:34:37');
INSERT INTO `program_img` VALUES ('57', '2', '18', '1', 'L-1802', 'L-1802.jpg', '150', '170', 'Admin', '2018-04-30 10:54:03', '2018-04-27 11:40:16');
INSERT INTO `program_img` VALUES ('58', '3', '18', '1', 'L-1803', 'L-1803.jpg', '150', '170', 'Admin', '2018-04-30 11:02:10', '2018-04-27 11:41:01');
INSERT INTO `program_img` VALUES ('59', '1', '19', '1', 'L-1901', 'L-1901.jpg', '150', '247', 'Admin', '2018-05-02 09:41:15', '2018-04-27 11:43:12');
INSERT INTO `program_img` VALUES ('60', '2', '19', '1', 'L-1902', 'L-1902.png', '150', '247', 'Admin', '2018-05-02 09:41:59', '2018-04-27 11:43:33');
INSERT INTO `program_img` VALUES ('61', '3', '19', '1', 'L-1903', 'L-1903.jpg', '150', '236', 'Admin', '2018-05-02 09:42:26', '2018-04-27 11:43:41');
INSERT INTO `program_img` VALUES ('62', '1', '19', '2', 'D-1901', 'D-1901.png', '150', '142', 'Admin', '2018-05-02 09:38:10', '2018-04-27 11:43:52');
INSERT INTO `program_img` VALUES ('63', '2', '19', '2', 'D-1902', 'D-1902.jpg', '150', '325', 'Admin', '2018-05-02 09:39:03', '2018-04-27 11:44:05');
INSERT INTO `program_img` VALUES ('64', '3', '19', '2', 'D-1903', 'D-1903.jpg', '150', '247', 'Admin', '2018-05-02 09:39:14', '2018-04-27 11:44:12');
INSERT INTO `program_img` VALUES ('65', '4', '19', '2', 'D-1904', 'D-1904.jpg', '150', '260', 'Admin', '2018-05-02 09:39:41', '2018-05-02 09:39:41');
INSERT INTO `program_img` VALUES ('66', '4', '19', '1', 'L-1904', 'L-1904.png', '150', '150', 'Admin', '2018-05-02 09:43:36', '2018-05-02 09:43:36');
INSERT INTO `program_img` VALUES ('67', '1', '20', '2', 'D-2001', 'D-2001.jpg', '150', '142', 'Admin', '2018-09-25 08:39:38', '2018-09-24 07:41:44');
INSERT INTO `program_img` VALUES ('68', '2', '20', '2', 'D-2002', 'D-2002.jpg', '150', '451', 'Admin', '2018-09-25 08:39:51', '2018-09-24 07:41:59');
INSERT INTO `program_img` VALUES ('69', '3', '20', '2', 'D-2003', 'D-2003.jpg', '150', '269', 'Admin', '2018-09-25 08:40:01', '2018-09-24 07:42:14');
INSERT INTO `program_img` VALUES ('70', '4', '20', '2', 'D-2004', 'D-2004.jpg', '150', '334', 'Admin', '2018-09-25 08:40:13', '2018-09-24 07:42:26');
INSERT INTO `program_img` VALUES ('71', '1', '20', '1', 'L-2001', 'L-2001.jpg', '150', '236', 'Admin', '2018-09-25 08:40:28', '2018-09-24 07:42:37');
INSERT INTO `program_img` VALUES ('72', '2', '20', '1', 'L-2002', 'L-2002.jpg', '150', '236', 'Admin', '2018-09-25 08:40:42', '2018-09-24 07:42:45');
INSERT INTO `program_img` VALUES ('73', '3', '20', '1', 'L-2003', 'L-2003.jpg', '200', '170', 'Admin', '2018-09-25 08:40:58', '2018-09-24 07:42:53');

-- ----------------------------
-- Table structure for showroom
-- ----------------------------
DROP TABLE IF EXISTS `showroom`;
CREATE TABLE `showroom` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系代碼',
  `Module_PKey` int(11) DEFAULT '0' COMMENT ' 模組主鍵',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `intLocal` int(11) DEFAULT '1' COMMENT '顯示位置',
  `Class1_PKey` int(11) DEFAULT '0' COMMENT ' 類別主鍵',
  `strName` varchar(50) DEFAULT '' COMMENT '標題',
  `Subject` varchar(50) DEFAULT '' COMMENT '副標',
  `Interview` varchar(2000) DEFAULT '' COMMENT '簡述',
  `Color` varchar(10) DEFAULT '' COMMENT '色碼',
  `strLink` varchar(100) DEFAULT '' COMMENT '活動網址',
  `Target` varchar(10) DEFAULT '_blank' COMMENT '視窗開啟方式',
  `Movielink` varchar(20) DEFAULT '' COMMENT '影音連結',
  `Upload` varchar(5) DEFAULT '' COMMENT '上下架',
  `Home` varchar(5) DEFAULT '' COMMENT '首頁',
  `UserID` varchar(20) DEFAULT 'Admin' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '更新日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  `intType` varchar(50) DEFAULT '' COMMENT '類型',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='廣告管理';

-- ----------------------------
-- Records of showroom
-- ----------------------------
INSERT INTO `showroom` VALUES ('9', '1', '4', '6', '1', '1', 'COROLLA CROSS', 'NT$77.5~97.5萬', '', '', 'https://www.toyota.com.tw/showroom/COROLLA_CROSS/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:12:32', '2021-09-14 14:17:59', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('11', '1', '4', '1', '1', '1', 'VIOS', 'NT$55.3~65.5萬', '', '', 'https://www.toyota.com.tw/showroom/VIOS/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:12:16', '2021-09-14 15:04:57', '汽油');
INSERT INTO `showroom` VALUES ('12', '1', '4', '2', '1', '1', 'YARIS', 'NT$58.9~70.9萬', '', '', 'https://www.toyota.com.tw/showroom/YARIS/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:12:20', '2021-09-14 15:06:46', '汽油');
INSERT INTO `showroom` VALUES ('13', '1', '4', '3', '1', '1', 'SIENTA', 'NT$64.9~89.9萬', '', '', 'https://www.toyota.com.tw/showroom/SIENTA/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:12:24', '2021-09-14 15:09:07', '汽油');
INSERT INTO `showroom` VALUES ('14', '1', '4', '4', '1', '1', 'ALTIS', 'NT$69.9~90.9萬', '', '', 'https://www.toyota.com.tw/showroom/ALTIS/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:12:28', '2021-09-14 15:12:12', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('15', '1', '4', '5', '1', '1', 'ALTIS GR SPORT', 'NT$83.5~87.9萬', '', '', 'https://www.toyota.com.tw/showroom/ALTIS_GR/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:15:13', '2021-09-14 15:15:13', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('16', '1', '4', '7', '1', '1', 'COROLLA CROSS GR SPORT', 'NT$87.5~94.5萬', '', '', 'https://www.toyota.com.tw/showroom/COROLLA_CROSS_GR/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:19:48', '2021-09-14 15:19:48', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('17', '1', '4', '8', '1', '1', 'COROLLA SPORT', 'NT$84.9~89.8萬', '', '', 'https://www.toyota.com.tw/showroom/COROLLA_SPORT/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:21:39', '2021-09-14 15:21:39', '汽油');
INSERT INTO `showroom` VALUES ('18', '1', '4', '9', '1', '1', 'CAMRY', 'NT$92.9~139.9萬', '', '', 'https://www.toyota.com.tw/showroom/CAMRY/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:34:33', '2021-09-14 15:34:33', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('19', '1', '4', '10', '1', '1', 'C-HR', 'NT$89.9~107.9萬', '', '', 'https://www.toyota.com.tw/showroom/C-HR/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:35:48', '2021-09-14 15:35:48', '汽油');
INSERT INTO `showroom` VALUES ('20', '1', '4', '11', '1', '1', 'RAV4', 'NT$95.5~128.9萬', '', '', 'https://www.toyota.com.tw/showroom/RAV4/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:36:46', '2021-09-14 15:36:46', 'HYBRID/汽油');
INSERT INTO `showroom` VALUES ('21', '1', '4', '12', '1', '1', 'PRIUS PHV', 'NT$114.9~125.9萬', '', '', 'https://www.toyota.com.tw/showroom/PRIUS_PHV/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:37:46', '2021-09-14 15:37:46', '插電式HYBRID');
INSERT INTO `showroom` VALUES ('22', '1', '4', '13', '1', '1', 'PRIUS α', 'NT$125.0~125.0萬', '', '', 'https://www.toyota.com.tw/showroom/PRIUS_ALPHA/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:40:52', '2021-09-14 15:40:52', 'HYBRID');
INSERT INTO `showroom` VALUES ('23', '1', '4', '14', '1', '1', 'HILUX', 'NT$145.0~145.0萬', '', '', 'https://www.toyota.com.tw/showroom/HILUX/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:41:59', '2021-09-14 15:41:59', '柴油');
INSERT INTO `showroom` VALUES ('24', '1', '4', '15', '1', '1', 'ALPHARD', 'NT$286.0~286.0萬', '', '', 'https://www.toyota.com.tw/showroom/ALPHARD/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:43:23', '2021-09-14 15:43:23', 'HYBRID');
INSERT INTO `showroom` VALUES ('25', '1', '4', '16', '1', '1', 'SIENNA', 'NT$222.0~279.0萬', '', '', 'https://www.toyota.com.tw/showroom/SIENNA/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:44:25', '2021-09-14 15:44:25', 'HYBRID');
INSERT INTO `showroom` VALUES ('26', '1', '4', '17', '1', '1', 'PRADO', 'NT$239.0~278.0萬', '', '', '柴油 https://www.toyota.com.tw/showroom/PRADO/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:45:21', '2021-09-14 15:45:21', '柴油');
INSERT INTO `showroom` VALUES ('27', '1', '4', '18', '1', '1', 'GR SUPRA', 'NT$200.0~250.0萬', '', '', 'https://www.toyota.com.tw/showroom/SUPRA/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:52:57', '2021-09-14 15:52:57', '汽油');
INSERT INTO `showroom` VALUES ('28', '1', '4', '19', '1', '1', 'GR YARIS', 'NT$179.0~179.0萬', '', '', 'https://www.toyota.com.tw/showroom/GR_YARIS/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:54:48', '2021-09-14 15:54:48', '汽油');
INSERT INTO `showroom` VALUES ('29', '1', '4', '20', '1', '1', '86', 'NT$130.0~133.0萬', '', '', 'https://www.toyota.com.tw/showroom/86/', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:55:39', '2021-09-14 15:55:39', '汽油');
INSERT INTO `showroom` VALUES ('30', '1', '4', '1', '1', '2', 'LM', '', '', '', 'https://www.lexus.com.tw/showroom/LM', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 15:59:25', '2021-09-14 15:57:45', '');
INSERT INTO `showroom` VALUES ('31', '1', '4', '2', '1', '2', 'UX', '', '', '', 'https://www.lexus.com.tw/showroom/UX', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:02:26', '2021-09-14 16:02:26', '');
INSERT INTO `showroom` VALUES ('32', '1', '4', '3', '1', '2', 'LS', '', '', '', 'https://www.lexus.com.tw/showroom/LS', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:04:01', '2021-09-14 16:04:01', '');
INSERT INTO `showroom` VALUES ('33', '1', '4', '4', '1', '2', 'ES', '', '', '', 'https://www.lexus.com.tw/showroom/ES', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:05:02', '2021-09-14 16:05:02', '');
INSERT INTO `showroom` VALUES ('34', '1', '4', '5', '1', '2', 'IS', '', '', '', 'https://www.lexus.com.tw/showroom/IS', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:06:15', '2021-09-14 16:06:15', '');
INSERT INTO `showroom` VALUES ('35', '1', '4', '6', '1', '2', 'RX', '', '', '', 'https://www.lexus.com.tw/showroom/RX', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:07:44', '2021-09-14 16:07:44', '');
INSERT INTO `showroom` VALUES ('36', '1', '4', '7', '1', '2', 'NX', '', '', '', 'https://www.lexus.com.tw/showroom/NX', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:13:04', '2021-09-14 16:08:55', '');
INSERT INTO `showroom` VALUES ('37', '1', '4', '8', '1', '2', 'RCF', '', '', '', 'https://www.lexus.com.tw/showroom/RC%20F', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:10:01', '2021-09-14 16:10:01', '');
INSERT INTO `showroom` VALUES ('38', '1', '4', '9', '1', '2', 'LC', '', '', '', 'https://www.lexus.com.tw/showroom/LC', '_blank', null, 'Yes', null, 'Admin', '2021-09-14 16:11:26', '2021-09-14 16:11:22', '');

-- ----------------------------
-- Table structure for showroom_img
-- ----------------------------
DROP TABLE IF EXISTS `showroom_img`;
CREATE TABLE `showroom_img` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `Showroom_PKey` int(11) DEFAULT '0' COMMENT 'AD主鍵',
  `Sort` int(11) DEFAULT '1' COMMENT '序號',
  `Forder` varchar(10) DEFAULT '' COMMENT '目錄名',
  `Photo1` varchar(50) DEFAULT '' COMMENT '圖檔',
  `PhotoW1` int(11) DEFAULT '0' COMMENT '圖寬',
  `PhotoH1` int(11) DEFAULT '0' COMMENT '圖高',
  `PhotoM` varchar(100) DEFAULT '' COMMENT '圖說',
  `intType` int(11) DEFAULT '1' COMMENT '檔案類別(1.圖片;2.檔案)',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE,
  KEY `PKey` (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='FAQ圖片管理';

-- ----------------------------
-- Records of showroom_img
-- ----------------------------
INSERT INTO `showroom_img` VALUES ('19', '9', '1', '202109', 'showroom_2021091414262101.png', '540', '187', '', '1', '2021-09-14 14:26:22');
INSERT INTO `showroom_img` VALUES ('20', '9', '2', '202109', 'showroom_2021091414175902.jpg', '0', '0', '', '0', '2021-09-14 14:17:59');
INSERT INTO `showroom_img` VALUES ('23', '11', '1', '202109', 'showroom_2021091415045701.png', '0', '0', '', '0', '2021-09-14 15:04:57');
INSERT INTO `showroom_img` VALUES ('24', '11', '2', '202109', 'showroom_2021091415045702.jpg', '0', '0', '', '0', '2021-09-14 15:04:57');
INSERT INTO `showroom_img` VALUES ('25', '12', '1', '202109', 'showroom_2021091415064601.png', '0', '0', '', '0', '2021-09-14 15:06:46');
INSERT INTO `showroom_img` VALUES ('26', '12', '2', '202109', 'showroom_2021091415064602.jpg', '0', '0', '', '0', '2021-09-14 15:06:46');
INSERT INTO `showroom_img` VALUES ('27', '13', '1', '202109', 'showroom_2021091415090701.png', '0', '0', '', '0', '2021-09-14 15:09:07');
INSERT INTO `showroom_img` VALUES ('28', '13', '2', '202109', 'showroom_2021091415090702.jpg', '0', '0', '', '0', '2021-09-14 15:09:07');
INSERT INTO `showroom_img` VALUES ('29', '14', '1', '202109', 'showroom_2021091415121201.png', '0', '0', '', '0', '2021-09-14 15:12:12');
INSERT INTO `showroom_img` VALUES ('30', '14', '2', '202109', 'showroom_2021091415121202.jpg', '0', '0', '', '0', '2021-09-14 15:12:12');
INSERT INTO `showroom_img` VALUES ('31', '15', '1', '202109', 'showroom_2021091415151301.png', '0', '0', '', '0', '2021-09-14 15:15:13');
INSERT INTO `showroom_img` VALUES ('32', '15', '2', '202109', 'showroom_2021091415151302.jpg', '0', '0', '', '0', '2021-09-14 15:15:13');
INSERT INTO `showroom_img` VALUES ('33', '16', '1', '202109', 'showroom_2021091415194801.png', '0', '0', '', '0', '2021-09-14 15:19:48');
INSERT INTO `showroom_img` VALUES ('34', '16', '2', '202109', 'showroom_2021091415194802.jpg', '0', '0', '', '0', '2021-09-14 15:19:48');
INSERT INTO `showroom_img` VALUES ('35', '17', '1', '202109', 'showroom_2021091415213901.png', '0', '0', '', '0', '2021-09-14 15:21:39');
INSERT INTO `showroom_img` VALUES ('36', '17', '2', '202109', 'showroom_2021091415213902.jpg', '0', '0', '', '0', '2021-09-14 15:21:39');
INSERT INTO `showroom_img` VALUES ('37', '18', '1', '202109', 'showroom_2021091415343301.png', '0', '0', '', '0', '2021-09-14 15:34:33');
INSERT INTO `showroom_img` VALUES ('38', '18', '2', '202109', 'showroom_2021091415343302.jpg', '0', '0', '', '0', '2021-09-14 15:34:33');
INSERT INTO `showroom_img` VALUES ('39', '19', '1', '202109', 'showroom_2021091415354801.png', '0', '0', '', '0', '2021-09-14 15:35:48');
INSERT INTO `showroom_img` VALUES ('40', '19', '2', '202109', 'showroom_2021091415354802.jpg', '0', '0', '', '0', '2021-09-14 15:35:48');
INSERT INTO `showroom_img` VALUES ('41', '20', '1', '202109', 'showroom_2021091415364601.png', '0', '0', '', '0', '2021-09-14 15:36:46');
INSERT INTO `showroom_img` VALUES ('42', '20', '2', '202109', 'showroom_2021091415364602.jpg', '0', '0', '', '0', '2021-09-14 15:36:46');
INSERT INTO `showroom_img` VALUES ('43', '21', '1', '202109', 'showroom_2021091415374601.png', '0', '0', '', '0', '2021-09-14 15:37:46');
INSERT INTO `showroom_img` VALUES ('44', '21', '2', '202109', 'showroom_2021091415374602.jpg', '0', '0', '', '0', '2021-09-14 15:37:46');
INSERT INTO `showroom_img` VALUES ('45', '22', '1', '202109', 'showroom_2021091415405201.png', '0', '0', '', '0', '2021-09-14 15:40:52');
INSERT INTO `showroom_img` VALUES ('46', '22', '2', '202109', 'showroom_2021091415405202.jpg', '0', '0', '', '0', '2021-09-14 15:40:52');
INSERT INTO `showroom_img` VALUES ('47', '23', '1', '202109', 'showroom_2021091415415901.png', '0', '0', '', '0', '2021-09-14 15:41:59');
INSERT INTO `showroom_img` VALUES ('48', '23', '2', '202109', 'showroom_2021091415415902.jpg', '0', '0', '', '0', '2021-09-14 15:41:59');
INSERT INTO `showroom_img` VALUES ('49', '24', '1', '202109', 'showroom_2021091415432301.png', '0', '0', '', '0', '2021-09-14 15:43:23');
INSERT INTO `showroom_img` VALUES ('50', '24', '2', '202109', 'showroom_2021091415432302.jpg', '0', '0', '', '0', '2021-09-14 15:43:23');
INSERT INTO `showroom_img` VALUES ('51', '25', '1', '202109', 'showroom_2021091415442501.png', '0', '0', '', '0', '2021-09-14 15:44:25');
INSERT INTO `showroom_img` VALUES ('52', '25', '2', '202109', 'showroom_2021091415442502.jpg', '0', '0', '', '0', '2021-09-14 15:44:25');
INSERT INTO `showroom_img` VALUES ('53', '26', '1', '202109', 'showroom_2021091415452101.png', '0', '0', '', '0', '2021-09-14 15:45:21');
INSERT INTO `showroom_img` VALUES ('54', '26', '2', '202109', 'showroom_2021091415452102.jpg', '0', '0', '', '0', '2021-09-14 15:45:21');
INSERT INTO `showroom_img` VALUES ('55', '27', '1', '202109', 'showroom_2021091415525701.png', '0', '0', '', '0', '2021-09-14 15:52:57');
INSERT INTO `showroom_img` VALUES ('56', '27', '2', '202109', 'showroom_2021091415525702.jpg', '0', '0', '', '0', '2021-09-14 15:52:57');
INSERT INTO `showroom_img` VALUES ('57', '28', '1', '202109', 'showroom_2021091415544801.png', '0', '0', '', '0', '2021-09-14 15:54:48');
INSERT INTO `showroom_img` VALUES ('58', '28', '2', '202109', 'showroom_2021091415544802.jpg', '0', '0', '', '0', '2021-09-14 15:54:48');
INSERT INTO `showroom_img` VALUES ('59', '29', '1', '202109', 'showroom_2021091415553901.png', '0', '0', '', '0', '2021-09-14 15:55:39');
INSERT INTO `showroom_img` VALUES ('60', '29', '2', '202109', 'showroom_2021091415553902.jpg', '0', '0', '', '0', '2021-09-14 15:55:39');
INSERT INTO `showroom_img` VALUES ('61', '30', '1', '202109', 'showroom_2021091415592401.png', '540', '187', '', '1', '2021-09-14 15:59:25');
INSERT INTO `showroom_img` VALUES ('62', '30', '2', '202109', 'showroom_2021091415574502.jpg', '0', '0', '', '0', '2021-09-14 15:57:45');
INSERT INTO `showroom_img` VALUES ('63', '31', '1', '202109', 'showroom_2021091416022601.png', '0', '0', '', '0', '2021-09-14 16:02:26');
INSERT INTO `showroom_img` VALUES ('64', '31', '2', '202109', 'showroom_2021091416022602.jpg', '0', '0', '', '0', '2021-09-14 16:02:26');
INSERT INTO `showroom_img` VALUES ('65', '32', '1', '202109', 'showroom_2021091416040101.png', '0', '0', '', '0', '2021-09-14 16:04:01');
INSERT INTO `showroom_img` VALUES ('66', '32', '2', '202109', 'showroom_2021091416040102.jpg', '0', '0', '', '0', '2021-09-14 16:04:02');
INSERT INTO `showroom_img` VALUES ('67', '33', '1', '202109', 'showroom_2021091416050201.png', '0', '0', '', '0', '2021-09-14 16:05:02');
INSERT INTO `showroom_img` VALUES ('68', '33', '2', '202109', 'showroom_2021091416050202.jpg', '0', '0', '', '0', '2021-09-14 16:05:02');
INSERT INTO `showroom_img` VALUES ('69', '34', '1', '202109', 'showroom_2021091416061501.png', '0', '0', '', '0', '2021-09-14 16:06:15');
INSERT INTO `showroom_img` VALUES ('70', '34', '2', '202109', 'showroom_2021091416061502.jpg', '0', '0', '', '0', '2021-09-14 16:06:15');
INSERT INTO `showroom_img` VALUES ('71', '35', '1', '202109', 'showroom_2021091416074401.png', '0', '0', '', '0', '2021-09-14 16:07:44');
INSERT INTO `showroom_img` VALUES ('72', '35', '2', '202109', 'showroom_2021091416074402.jpg', '0', '0', '', '0', '2021-09-14 16:07:44');
INSERT INTO `showroom_img` VALUES ('73', '36', '1', '202109', 'showroom_2021091416085501.png', '0', '0', '', '0', '2021-09-14 16:08:55');
INSERT INTO `showroom_img` VALUES ('74', '36', '2', '202109', 'showroom_2021091416085502.jpg', '0', '0', '', '0', '2021-09-14 16:08:55');
INSERT INTO `showroom_img` VALUES ('75', '37', '1', '202109', 'showroom_2021091416100101.png', '0', '0', '', '0', '2021-09-14 16:10:01');
INSERT INTO `showroom_img` VALUES ('76', '37', '2', '202109', 'showroom_2021091416100102.jpg', '0', '0', '', '0', '2021-09-14 16:10:01');
INSERT INTO `showroom_img` VALUES ('77', '38', '1', '202109', 'showroom_2021091416112201.png', '0', '0', '', '0', '2021-09-14 16:11:22');
INSERT INTO `showroom_img` VALUES ('78', '38', '2', '202109', 'showroom_2021091416112202.jpg', '0', '0', '', '0', '2021-09-14 16:11:22');

-- ----------------------------
-- Table structure for webcontrol
-- ----------------------------
DROP TABLE IF EXISTS `webcontrol`;
CREATE TABLE `webcontrol` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT '語系代碼',
  `Module_PKey` int(11) DEFAULT '0' COMMENT '模組主鍵',
  `Customer_PKey` int(11) DEFAULT '0' COMMENT '網站主鍵',
  `intType` int(11) DEFAULT '0' COMMENT '身份類別(0.使用者;1.管理者)',
  `strID` varchar(20) DEFAULT '' COMMENT '帳號',
  `strPW` varchar(50) DEFAULT '' COMMENT '密碼',
  `strName` varchar(20) DEFAULT '' COMMENT '姓名',
  `FunctionID` varchar(100) DEFAULT '' COMMENT '權限代碼',
  `FunctionName` varchar(500) DEFAULT '' COMMENT '權限名稱',
  `UserID` varchar(20) DEFAULT '' COMMENT '使用者帳號',
  `dtUDate` datetime DEFAULT NULL COMMENT '最後修改日期',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='權限管理';

-- ----------------------------
-- Records of webcontrol
-- ----------------------------
INSERT INTO `webcontrol` VALUES ('1', '1', '0', '0', '1', 'Admin', '5c2636d81f3270cf0f5ef18d7ab55eff', '網站管理者', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15', '', 'Admin', '2021-08-18 17:49:54', '2021-08-18 10:35:12');

-- ----------------------------
-- Table structure for webcontrol_lang
-- ----------------------------
DROP TABLE IF EXISTS `webcontrol_lang`;
CREATE TABLE `webcontrol_lang` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `intLang` int(11) DEFAULT '1' COMMENT ' 語系代碼',
  `Control_PKey` int(11) DEFAULT '0' COMMENT '權限主鍵',
  `FunctionID` varchar(100) DEFAULT '' COMMENT '權限代碼',
  `FunctionName` varchar(500) DEFAULT '' COMMENT '權限名稱',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='權限管理';

-- ----------------------------
-- Records of webcontrol_lang
-- ----------------------------

-- ----------------------------
-- Table structure for webset
-- ----------------------------
DROP TABLE IF EXISTS `webset`;
CREATE TABLE `webset` (
  `PKey` int(11) NOT NULL AUTO_INCREMENT,
  `strName` varchar(50) DEFAULT '' COMMENT '網站名稱(中)',
  `Description` varchar(200) DEFAULT '' COMMENT '網站描述',
  `Keywords` varchar(100) DEFAULT '' COMMENT '關鍵字',
  `gaCode` varchar(500) DEFAULT '' COMMENT 'GA-Code',
  `Address` varchar(100) DEFAULT '' COMMENT '聯絡住址',
  `Tel` varchar(50) DEFAULT '' COMMENT '聯絡電話',
  `Fax` varchar(50) DEFAULT '' COMMENT '聯絡傳真',
  `EMail` varchar(100) DEFAULT '' COMMENT '聯絡信箱',
  `dtDate` datetime DEFAULT NULL COMMENT '建立日期',
  PRIMARY KEY (`PKey`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='網站資料';

-- ----------------------------
-- Records of webset
-- ----------------------------
INSERT INTO `webset` VALUES ('1', '國都豐田數位服務網', '天下雜誌年度服務業排名，前百大企業，販賣區域及營業所分佈：台北市中山、士林、大同、北投區及新北市，共 22個營業所，19 個服務廠', 'toyota,LEXUS,豐田汽車,凌志汽車,和泰汽車', '', '', '', '', '', '2021-08-18 16:59:10');
