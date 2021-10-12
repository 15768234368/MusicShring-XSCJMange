/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : pxscj

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 28/06/2020 00:21:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cj
-- ----------------------------
DROP TABLE IF EXISTS `cj`;
CREATE TABLE `cj`  (
  `XM` char(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KCM` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CJ` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`XM`, `KCM`) USING BTREE,
  CONSTRAINT `FK_CJ_XS` FOREIGN KEY (`XM`) REFERENCES `xs` (`XM`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cj
-- ----------------------------
INSERT INTO `cj` VALUES ('张三', 'C语言', 79);
INSERT INTO `cj` VALUES ('张三', '体育', 78);
INSERT INTO `cj` VALUES ('张三', '数据库', 80);
INSERT INTO `cj` VALUES ('张三', '高数', 80);
INSERT INTO `cj` VALUES ('张宇', 'c++', 80);
INSERT INTO `cj` VALUES ('李四', '高数', 80);
INSERT INTO `cj` VALUES ('李弈', '体育', 72);
INSERT INTO `cj` VALUES ('李星', 'C语言', 89);
INSERT INTO `cj` VALUES ('章程', '高数', 80);
INSERT INTO `cj` VALUES ('罗宜', '体育', 75);
INSERT INTO `cj` VALUES ('罗宜', '数据库', 82);
INSERT INTO `cj` VALUES ('罗宜', '高数', 85);

-- ----------------------------
-- Table structure for kc
-- ----------------------------
DROP TABLE IF EXISTS `kc`;
CREATE TABLE `kc`  (
  `KCM` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `XS` tinyint(255) NULL DEFAULT NULL,
  `XF` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`KCM`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kc
-- ----------------------------
INSERT INTO `kc` VALUES ('', NULL, NULL);
INSERT INTO `kc` VALUES ('C++', 36, 3);
INSERT INTO `kc` VALUES ('C语言', 32, 2);
INSERT INTO `kc` VALUES ('公共体育', 32, 2);
INSERT INTO `kc` VALUES ('大学物理', 32, 2);
INSERT INTO `kc` VALUES ('大学英语', 32, 2);
INSERT INTO `kc` VALUES ('数据库', 36, 2);
INSERT INTO `kc` VALUES ('数据结构', 36, 2);
INSERT INTO `kc` VALUES ('高数', 36, 2);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `userid` int(8) NOT NULL,
  `username` char(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` char(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'root', '123456');
INSERT INTO `user` VALUES (2, 'root', '123456');

-- ----------------------------
-- Table structure for xmcj_view
-- ----------------------------
DROP TABLE IF EXISTS `xmcj_view`;
CREATE TABLE `xmcj_view`  (
  `KCM` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CJ` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`KCM`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xs
-- ----------------------------
DROP TABLE IF EXISTS `xs`;
CREATE TABLE `xs`  (
  `XM` char(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `XB` tinyint(1) NULL DEFAULT NULL,
  `CSSJ` date NULL DEFAULT NULL,
  `KCS` int(255) NULL DEFAULT NULL,
  `BZ` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `ZP` blob NULL,
  PRIMARY KEY (`XM`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xs
-- ----------------------------
INSERT INTO `xs` VALUES ('张一', 1, '2001-03-16', 1, NULL, NULL);
INSERT INTO `xs` VALUES ('张三', 1, '2020-06-07', 4, NULL, NULL);
INSERT INTO `xs` VALUES ('张宇', 1, '2020-06-12', 3, NULL, NULL);
INSERT INTO `xs` VALUES ('李依', 0, '2020-05-12', 1, NULL, NULL);
INSERT INTO `xs` VALUES ('李四', 0, '2000-12-13', 3, NULL, NULL);
INSERT INTO `xs` VALUES ('李弈', 0, '2020-06-12', 3, NULL, NULL);
INSERT INTO `xs` VALUES ('李星', 1, '2020-12-23', 4, NULL, NULL);
INSERT INTO `xs` VALUES ('章程', 1, '2020-06-07', 4, NULL, NULL);
INSERT INTO `xs` VALUES ('罗宜', 1, '2020-06-05', 5, NULL, NULL);
INSERT INTO `xs` VALUES ('赵泽', 1, '2020-06-14', 2, NULL, NULL);
INSERT INTO `xs` VALUES ('陈橙', 0, '2020-01-25', 2, NULL, NULL);

-- ----------------------------
-- Triggers structure for table cj
-- ----------------------------
DROP TRIGGER IF EXISTS `CJ_INSERT_KCS`;
delimiter ;;
CREATE TRIGGER `CJ_INSERT_KCS` AFTER INSERT ON `cj` FOR EACH ROW UPDATE XS SET KCS=KCS+1 where new.XM=XM
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table cj
-- ----------------------------
DROP TRIGGER IF EXISTS `CJ_DELEFE_KCS`;
delimiter ;;
CREATE TRIGGER `CJ_DELEFE_KCS` AFTER DELETE ON `cj` FOR EACH ROW update xs set kcs=kcs-1 where xm=old.xm
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
