/*
Navicat MySQL Data Transfer

Source Server         : phalcon
Source Server Version : 50720
Source Host           : 192.168.2.203:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-19 23:13:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order_routes
-- ----------------------------
DROP TABLE IF EXISTS `order_routes`;
CREATE TABLE `order_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` double(11,6) NOT NULL,
  `lon` double(11,6) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id_foreign` (`order_id`),
  CONSTRAINT `order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_routes
-- ----------------------------
INSERT INTO `order_routes` VALUES ('12', '42', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('13', '42', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('14', '42', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
INSERT INTO `order_routes` VALUES ('15', '43', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('16', '43', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('17', '43', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
INSERT INTO `order_routes` VALUES ('18', '44', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('19', '44', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('20', '44', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
INSERT INTO `order_routes` VALUES ('21', '45', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('22', '45', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('23', '45', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
INSERT INTO `order_routes` VALUES ('24', '46', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('25', '46', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('26', '46', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
INSERT INTO `order_routes` VALUES ('27', '47', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '1');
INSERT INTO `order_routes` VALUES ('28', '47', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '2');
INSERT INTO `order_routes` VALUES ('29', '47', 'Ukraine, Dnipro, Malinovskogo 2', '45.323230', '39.544645', '3');
SET FOREIGN_KEY_CHECKS=1;
