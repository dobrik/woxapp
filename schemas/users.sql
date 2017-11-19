/*
Navicat MySQL Data Transfer

Source Server         : phalcon
Source Server Version : 50720
Source Host           : 192.168.2.203:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-19 23:13:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(70) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `token` varchar(36) NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'User Name', '380631809115', '4297f44b13955235245b2497399d7a93', 'E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz', '1', '0');
INSERT INTO `users` VALUES ('4', 'Test driver', '380939999999', '3d186804534370c3c817db0563f0e461', 'e3796b16623de4664ddf49e680b4c04698f1', '1', '0');
SET FOREIGN_KEY_CHECKS=1;
