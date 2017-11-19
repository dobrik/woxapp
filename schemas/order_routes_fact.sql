/*
Navicat MySQL Data Transfer

Source Server         : phalcon
Source Server Version : 50720
Source Host           : 192.168.2.203:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-20 00:01:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order_routes_fact
-- ----------------------------
DROP TABLE IF EXISTS `order_routes_fact`;
CREATE TABLE `order_routes_fact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` double(11,6) NOT NULL,
  `lon` double(11,6) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id_foreign` (`order_id`),
  CONSTRAINT `order_routes_fact_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_routes_fact
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
