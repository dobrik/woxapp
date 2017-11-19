/*
Navicat MySQL Data Transfer

Source Server         : phalcon
Source Server Version : 50720
Source Host           : 192.168.2.203:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-19 23:13:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cars
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `driver_id` int(255) unsigned NOT NULL,
  `color` varchar(20) NOT NULL,
  `direction` int(11) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `planting_costs` int(11) NOT NULL,
  `car_photo` varchar(255) DEFAULT NULL,
  `costs_per_1` int(11) NOT NULL,
  `car_lat` double(11,6) NOT NULL,
  `car_lon` double(11,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id_foreign` (`driver_id`),
  CONSTRAINT `driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cars
-- ----------------------------
INSERT INTO `cars` VALUES ('1', '2', '4', 'red', '300', 'AA 2345', '2014', 'Audi', 'A4', 'frn', '32', 'http://example.com/data/cars/mercedes-ml.png', '2', '23.333300', '45.343430');
INSERT INTO `cars` VALUES ('2', '1', '4', 'red', '300', 'AA 2345', '2014', 'Audi', 'A4', 'frn', '32', 'http://example.com/data/cars/mercedes-ml.png', '2', '23.333300', '45.343430');
INSERT INTO `cars` VALUES ('3', '1', '4', 'red', '300', 'AA 2345', '2014', 'Audi', 'A4', 'frn', '32', 'http://example.com/data/cars/mercedes-ml.png', '2', '23.333300', '45.343430');
SET FOREIGN_KEY_CHECKS=1;
