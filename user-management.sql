/*
Navicat MySQL Data Transfer

Source Server Version : 50523
Source Host           : localhost:3306
Source Database       : user-management

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2017-02-19 16:48:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator');
INSERT INTO `roles` VALUES ('2', 'Technician');
INSERT INTO `roles` VALUES ('3', 'User');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('7', 'Ana Palomino', 'ana.palomino@gmail.com', '667974291', '42');
INSERT INTO `users` VALUES ('19', 'Nancy Fajardo', 'nfajardo@msn.com', '956623487', '31');
INSERT INTO `users` VALUES ('20', 'Juan Perez', 'jperez@gmail.com', '123456789', '25');
INSERT INTO `users` VALUES ('27', 'Neuer Cid', 'ncid@gmail.com', '456123789', '27');
INSERT INTO `users` VALUES ('28', 'Rosa Miranda', 'rmiranda@msn.com', '859362147', '20');
INSERT INTO `users` VALUES ('29', 'Francisco Malpartida', 'francisco.malpartida@yahoo.es', '154876298', '39');
INSERT INTO `users` VALUES ('30', 'Alicia Torres', 'atorres@sellbytel.es', '568471456', '23');
INSERT INTO `users` VALUES ('50', 'Raul Ramirez', 'rramirez@msn.com', '159634782', '26');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('7', '1');
INSERT INTO `user_role` VALUES ('19', '1');
INSERT INTO `user_role` VALUES ('19', '2');
INSERT INTO `user_role` VALUES ('20', '1');
INSERT INTO `user_role` VALUES ('20', '3');
INSERT INTO `user_role` VALUES ('27', '3');
INSERT INTO `user_role` VALUES ('28', '2');
INSERT INTO `user_role` VALUES ('29', '1');
INSERT INTO `user_role` VALUES ('29', '3');
INSERT INTO `user_role` VALUES ('30', '1');
INSERT INTO `user_role` VALUES ('30', '2');
INSERT INTO `user_role` VALUES ('30', '3');
INSERT INTO `user_role` VALUES ('50', '2');
