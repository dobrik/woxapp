/*
Navicat MySQL Data Transfer

Source Server         : phalcon
Source Server Version : 50720
Source Host           : 192.168.2.203:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-19 23:13:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_lat` double(11,6) NOT NULL,
  `user_lon` double(11,6) NOT NULL,
  `car_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `status_id` int(11) unsigned zerofill NOT NULL DEFAULT '00000000000',
  `comment` text,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `pass_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('36', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('37', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('38', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('39', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000001', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('40', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('41', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('42', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('43', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('44', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('45', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('46', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
INSERT INTO `orders` VALUES ('47', '3', '22.333000', '34.455000', '32', '13', '12', '4', '2016-09-25 14:55:00', '00000000000', 'test comment', '0', '4');
SET FOREIGN_KEY_CHECKS=1;
