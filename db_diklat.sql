/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : db_diklat

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 25/09/2019 05:48:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_list
-- ----------------------------
DROP TABLE IF EXISTS `m_list`;
CREATE TABLE `m_list`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `artist` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `m4v` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mp4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ogv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `webmv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `avi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mkv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `webmm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `webm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_list
-- ----------------------------
INSERT INTO `m_list` VALUES (1, 'Azmi Pernah', 'Azmi', 'http://erp.local/upload/azmi_pernah.mp4', 'http://erp.local/upload/azmi_pernah.mp4', 'http://erp.local/upload/azmi_pernah.mp4', 'http://erp.local/upload/azmi_pernah.mp4', 'http://erp.local/upload/azmi_pernah.mp4', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `m_list` VALUES (12, 'All I Ask', 'NY', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', NULL, NULL, 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4', 'http://diklatapps.local/upload/All I Ask - Adele -Cover- by NY.mp4');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_karyawan` int(10) NULL DEFAULT NULL,
  `level` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (16, 'admin', 'YQ==', NULL, 1);
INSERT INTO `m_user` VALUES (18, 'joni', 'YQ==', NULL, 2);

SET FOREIGN_KEY_CHECKS = 1;
