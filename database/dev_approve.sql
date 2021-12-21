/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : dev_approve

 Target Server Type    : MariaDB
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 13/07/2021 18:30:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `cate_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cate_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'เพิ่มเติมระบบงานเดิม (Program Change)');
INSERT INTO `category` VALUES (2, 'แก้บัคระบบงาน (Fix Bug)');
INSERT INTO `category` VALUES (3, 'ขอเพิ่มระบบใหม่ (New program)');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `dep_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'บุคคล');
INSERT INTO `department` VALUES (2, 'ตรวจสอบ');
INSERT INTO `department` VALUES (3, 'โปรแกรมเมอร์');
INSERT INTO `department` VALUES (4, 'บัญชี');

-- ----------------------------
-- Table structure for dev_appr
-- ----------------------------
DROP TABLE IF EXISTS `dev_appr`;
CREATE TABLE `dev_appr`  (
  `dev_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `dev_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cate_id` tinyint(5) NULL DEFAULT NULL,
  `user_appr` tinyint(5) NULL DEFAULT NULL,
  `user_dev` tinyint(5) NULL DEFAULT NULL,
  `dev_sts` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_add` tinyint(5) NULL DEFAULT NULL,
  `dev_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dev_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_add` datetime(0) NULL DEFAULT NULL,
  `date_end` datetime(0) NULL DEFAULT NULL,
  `date_last` datetime(0) NULL DEFAULT NULL,
  `sys_id` tinyint(5) NULL DEFAULT NULL,
  `date_appr` datetime(0) NULL DEFAULT NULL,
  `date_receive` datetime(0) NULL DEFAULT NULL,
  `dev_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dev_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dev_appr
-- ----------------------------
INSERT INTO `dev_appr` VALUES (5, 'ขอเพิ่มเติมเมนูแจ้งเข้าบันทึกรถยึด', 1, NULL, NULL, '1', 5, '146327333_170387511251458_8815646629006179103_n.jpg', '1.สามารถบันทึกรถยึดเข้ามายังระบบ\r\n2.สามารถส่งรถยึดไปยังศูนย์ประมูล\r\n3.มีรายการรถยึดสะสม\r\n4.รายละเอียดอื่นๆ อยู่ในเอกสารแนบ', '2021-07-12 12:31:09', NULL, NULL, 2, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system`  (
  `sys_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `sys_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`sys_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES (1, 'ระบบบุคคลเงินเดือน (HR)');
INSERT INTO `system` VALUES (2, 'ระบบตรวจสอบภายในองค์กร (Internal_audit)');
INSERT INTO `system` VALUES (3, 'ระบบรับส่งเอกสาร (Sent_Doc)');
INSERT INTO `system` VALUES (4, 'ระบบระบบขออนุมัติ (dev_approve)');
INSERT INTO `system` VALUES (5, 'อื่นๆ (เพิ่มระบบใหม่)');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_add` datetime(0) NULL DEFAULT NULL,
  `date_last` datetime(0) NULL DEFAULT NULL,
  `dep_id` tinyint(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '774', 'XAxa1234', 'super', 'admin', '1', NULL, NULL, 3);
INSERT INTO `user` VALUES (2, '17405', 'XAxa1234', 'pgm01', '01', '2', NULL, NULL, 3);
INSERT INTO `user` VALUES (3, '17407', 'XAxa1234', 'pgm02', '02', '2', NULL, NULL, 3);
INSERT INTO `user` VALUES (4, '744', 'XAxa1234', 'user01', '01', '3', NULL, NULL, 1);
INSERT INTO `user` VALUES (5, '688', 'XAxa1234', 'หัวหน้า', 'ฝ่ายตรวจสอบ', '3', NULL, NULL, 2);

SET FOREIGN_KEY_CHECKS = 1;
