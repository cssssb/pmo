/*
 Navicat MySQL Data Transfer

 Source Server         : 本地链接
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : pmo_c

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 12/10/2018 17:51:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pmo_budget
-- ----------------------------
DROP TABLE IF EXISTS `pmo_budget`;
CREATE TABLE `pmo_budget`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `budget_project_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `header_id` int(11) NULL DEFAULT NULL,
  `budget_tax` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '税率',
  `budget_consulting_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '咨询费用',
  `budget_expects_revenue` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '预计收入',
  `state` tinyint(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_budget
-- ----------------------------
INSERT INTO `pmo_budget` VALUES (1, '刘雪松', NULL, '7%', '5888', '99999', 0);
INSERT INTO `pmo_budget` VALUES (2, '刘雪松', NULL, '7%', '5888', '99999', 0);
INSERT INTO `pmo_budget` VALUES (3, '刘雪松', NULL, '7%', '5888', '99999', 0);
INSERT INTO `pmo_budget` VALUES (4, '刘雪松', NULL, '7%', '5888', '99999', 0);
INSERT INTO `pmo_budget` VALUES (5, '刘雪松', NULL, '7%', '5888', '99999', 0);
INSERT INTO `pmo_budget` VALUES (6, '刘雪松', NULL, '7%', '5888', '99999', 0);

-- ----------------------------
-- Table structure for pmo_city_cost
-- ----------------------------
DROP TABLE IF EXISTS `pmo_city_cost`;
CREATE TABLE `pmo_city_cost`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `short_fee_card_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '人员',
  `short_fee_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用名称',
  `short_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用',
  `header_id` int(11) NULL DEFAULT NULL,
  `now_time` datetime(0) NOT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_city_cost
-- ----------------------------
INSERT INTO `pmo_city_cost` VALUES (26, '2', '2', '2', 94, '2018-09-12 08:47:28', 0);
INSERT INTO `pmo_city_cost` VALUES (27, '1', '1', '1', 94, '2018-09-13 02:08:13', 0);
INSERT INTO `pmo_city_cost` VALUES (28, '2', '2', '2', 94, '2018-09-13 02:08:13', 0);

-- ----------------------------
-- Table structure for pmo_contract
-- ----------------------------
DROP TABLE IF EXISTS `pmo_contract`;
CREATE TABLE `pmo_contract`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '合同内容',
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合同编号',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_contract
-- ----------------------------
INSERT INTO `pmo_contract` VALUES (1, '123', '1', NULL);
INSERT INTO `pmo_contract` VALUES (2, '321', '2', NULL);

-- ----------------------------
-- Table structure for pmo_courses
-- ----------------------------
DROP TABLE IF EXISTS `pmo_courses`;
CREATE TABLE `pmo_courses`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '课程名称',
  `fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '价格每天',
  `state` tinyint(5) NULL DEFAULT NULL COMMENT '状态',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_department_staff
-- ----------------------------
DROP TABLE IF EXISTS `pmo_department_staff`;
CREATE TABLE `pmo_department_staff`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NULL DEFAULT NULL,
  `userid` int(11) NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT NULL COMMENT '1为启用0为禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_department_staff
-- ----------------------------
INSERT INTO `pmo_department_staff` VALUES (1, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (2, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (3, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (4, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (5, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (6, 1, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (7, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (8, 26509420, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (9, 26509420, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (10, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (11, 26509421, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (12, 26509421, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (13, 26509421, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (14, 26509421, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (15, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (16, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (17, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (18, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (19, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (20, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (21, 26509419, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (22, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (23, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (24, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (25, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (26, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (27, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (28, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (29, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (30, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (31, 26429951, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (32, 26436766, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (33, 26436766, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (34, 26436766, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (35, 26456742, 0, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (36, 26456742, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (37, 26456742, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (38, 26456742, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (39, 26456742, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (40, 30316407, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (41, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (42, 26509424, 2147483647, '2018-09-19 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (43, 30318368, 2147483647, '2018-09-19 00:00:00', 1);

-- ----------------------------
-- Table structure for pmo_department_table
-- ----------------------------
DROP TABLE IF EXISTS `pmo_department_table`;
CREATE TABLE `pmo_department_table`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门名称',
  `department_id` int(11) NULL DEFAULT NULL COMMENT '部门id',
  `parentid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_department_table
-- ----------------------------
INSERT INTO `pmo_department_table` VALUES (1, '管理部门', 26509419, 1);
INSERT INTO `pmo_department_table` VALUES (2, '中软总公司计算机培训中心', 1, 0);
INSERT INTO `pmo_department_table` VALUES (3, '财务部', 26509420, 1);
INSERT INTO `pmo_department_table` VALUES (4, '行政人事部', 26509421, 1);
INSERT INTO `pmo_department_table` VALUES (5, '技术部门', 26509422, 1);
INSERT INTO `pmo_department_table` VALUES (6, '行业培训部', 26509424, 1);
INSERT INTO `pmo_department_table` VALUES (7, '公共培训部', 26509425, 1);
INSERT INTO `pmo_department_table` VALUES (8, '公共培训一部', 26429951, 26509425);
INSERT INTO `pmo_department_table` VALUES (9, '技术资源部', 26436766, 26509422);
INSERT INTO `pmo_department_table` VALUES (10, '市场部', 26456742, 26509422);
INSERT INTO `pmo_department_table` VALUES (11, '行业1部', 30316407, 26509424);
INSERT INTO `pmo_department_table` VALUES (12, '行业2部', 30318368, 26509424);

-- ----------------------------
-- Table structure for pmo_department_table_copy
-- ----------------------------
DROP TABLE IF EXISTS `pmo_department_table_copy`;
CREATE TABLE `pmo_department_table_copy`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门名称',
  `department_id` int(11) NULL DEFAULT NULL COMMENT '部门id',
  `parentid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_department_table_copy
-- ----------------------------
INSERT INTO `pmo_department_table_copy` VALUES (1, '管理部门', 26509419, 1);
INSERT INTO `pmo_department_table_copy` VALUES (2, '财务部', 26509420, 1);
INSERT INTO `pmo_department_table_copy` VALUES (3, '行政人事部', 26509421, 1);
INSERT INTO `pmo_department_table_copy` VALUES (4, '技术部门', 26509422, 1);
INSERT INTO `pmo_department_table_copy` VALUES (5, '行业培训部', 26509424, 1);
INSERT INTO `pmo_department_table_copy` VALUES (6, '公共培训部', 26509425, 1);
INSERT INTO `pmo_department_table_copy` VALUES (7, '公共培训一部', 26429951, 26509425);
INSERT INTO `pmo_department_table_copy` VALUES (8, '技术资源部', 26436766, 26509422);
INSERT INTO `pmo_department_table_copy` VALUES (9, '市场部', 26456742, 26509422);
INSERT INTO `pmo_department_table_copy` VALUES (10, '行业1部', 30316407, 26509424);
INSERT INTO `pmo_department_table_copy` VALUES (11, '行业2部', 30318368, 26509424);

-- ----------------------------
-- Table structure for pmo_implement_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_implement_plan`;
CREATE TABLE `pmo_implement_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meet_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会场费',
  `equipment` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教材与设备费用',
  `test_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考试费',
  `arder_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '茶歇',
  `pen_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文具',
  `serve_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '服务费',
  `mail_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '快递费',
  `header_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_implement_plan
-- ----------------------------
INSERT INTO `pmo_implement_plan` VALUES (1, '1', '1', '1', '1', '1', '1', '1', 1, 1, NULL);
INSERT INTO `pmo_implement_plan` VALUES (2, '1', '1', '1', '1', '1', '1', '1', 1, 1, NULL);
INSERT INTO `pmo_implement_plan` VALUES (3, '2', '2', '2', '2', '2', '2', '1', 1, 0, NULL);
INSERT INTO `pmo_implement_plan` VALUES (4, '1', '1', '1', '1', '1', '1', '1', 1, 0, '2018-09-27 07:55:39');
INSERT INTO `pmo_implement_plan` VALUES (5, '1', '1', '1', '1', '1', '1', '1', 1, 0, '2018-09-27 07:56:02');
INSERT INTO `pmo_implement_plan` VALUES (6, '1', '1', '1', '1', '1', '1', '1', 1, 0, '2018-09-27 07:56:16');
INSERT INTO `pmo_implement_plan` VALUES (7, '1', '1', '1', '1', '1', '1', '1', 1, 0, NULL);
INSERT INTO `pmo_implement_plan` VALUES (8, '1', '1', '1', '1', '1', '1', '1', 1, 0, NULL);
INSERT INTO `pmo_implement_plan` VALUES (9, '1', '1', '1', '1', '1', '1', '1', 1, 0, NULL);
INSERT INTO `pmo_implement_plan` VALUES (10, '1', '1', '1', '1', '1', '1', '1', 1, 1, '2018-10-11 13:50:11');
INSERT INTO `pmo_implement_plan` VALUES (11, '1', '1', '1', '1', '1', '1', '1', 1, 0, '2018-10-11 13:56:37');

-- ----------------------------
-- Table structure for pmo_lecturer
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer`;
CREATE TABLE `pmo_lecturer`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '讲师姓名',
  `unit_price` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '单价',
  `mode` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合作模式',
  `class_id` int(11) NULL DEFAULT NULL COMMENT '课程表',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '状态',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer
-- ----------------------------
INSERT INTO `pmo_lecturer` VALUES (1, '刘雪松', '20', '长期', 1, 0, NULL);
INSERT INTO `pmo_lecturer` VALUES (2, '侍尧', '10', '长期', 2, 0, NULL);

-- ----------------------------
-- Table structure for pmo_lecturer_duty
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer_duty`;
CREATE TABLE `pmo_lecturer_duty`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职责描述',
  `state` tinyint(5) NULL DEFAULT NULL COMMENT '项目模板',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer_duty
-- ----------------------------
INSERT INTO `pmo_lecturer_duty` VALUES (1, '助教', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (2, '主讲', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (3, '专家', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (4, '外聘', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (5, '其他', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (6, '无', 0);

-- ----------------------------
-- Table structure for pmo_lecturer_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer_plan`;
CREATE TABLE `pmo_lecturer_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `lecturer_id` int(11) NULL DEFAULT NULL COMMENT '讲师表id(暂时无用)',
  `tax` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '税',
  `fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '讲课费',
  `day` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '讲课天数',
  `duty_id` int(11) NULL DEFAULT NULL COMMENT '职责id',
  `state` tinyint(2) NULL DEFAULT 0,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer_plan
-- ----------------------------
INSERT INTO `pmo_lecturer_plan` VALUES (1, 79, 1, '52', '2.5', '32', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (2, 79, 1, '52', '2.5', '32', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (3, 79, 1, '52', '2.5', '32', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (4, 79, 1, '1', '1', '1', 1, 2, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (5, 79, 1, '1', '1', '1', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (6, 79, 1, '1', '1', '1', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (7, 79, 1, '1', '1', '11', 1, 0, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (8, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-28 13:56:43');
INSERT INTO `pmo_lecturer_plan` VALUES (9, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:23:23');
INSERT INTO `pmo_lecturer_plan` VALUES (10, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:23:54');
INSERT INTO `pmo_lecturer_plan` VALUES (11, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:24:10');
INSERT INTO `pmo_lecturer_plan` VALUES (12, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:25:00');
INSERT INTO `pmo_lecturer_plan` VALUES (13, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:40:08');
INSERT INTO `pmo_lecturer_plan` VALUES (14, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:40:37');
INSERT INTO `pmo_lecturer_plan` VALUES (15, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:41:05');
INSERT INTO `pmo_lecturer_plan` VALUES (16, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:41:35');
INSERT INTO `pmo_lecturer_plan` VALUES (17, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:43:08');
INSERT INTO `pmo_lecturer_plan` VALUES (18, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-09-29 15:43:51');
INSERT INTO `pmo_lecturer_plan` VALUES (19, 94, 1, 'sad', '3000', '5', NULL, 1, '2018-09-29 15:49:45');
INSERT INTO `pmo_lecturer_plan` VALUES (20, 94, 1, 'sad', '3000', '5', 2, 1, '2018-09-29 15:51:38');
INSERT INTO `pmo_lecturer_plan` VALUES (21, 94, 2, 'sad', '3000', '5', 2, 1, '2018-09-29 15:58:52');
INSERT INTO `pmo_lecturer_plan` VALUES (22, 94, 1, '322', '3000', '53', 2, 1, '2018-09-29 16:01:54');
INSERT INTO `pmo_lecturer_plan` VALUES (23, 99, 2, 'asd ', '3000', '5', 2, 0, '2018-10-09 15:34:34');
INSERT INTO `pmo_lecturer_plan` VALUES (24, 99, 2, 'asd', '3000', '5', 2, 0, '2018-10-09 15:35:08');
INSERT INTO `pmo_lecturer_plan` VALUES (25, 99, 2, '1', '3000', '5', 2, 0, '2018-10-11 09:55:01');
INSERT INTO `pmo_lecturer_plan` VALUES (26, 99, 1, '3', '30005', '56', 1, 0, '2018-10-11 09:55:32');
INSERT INTO `pmo_lecturer_plan` VALUES (27, 94, 1, '崔思思', '崔思思', '崔思思', 1, 1, '2018-10-11 10:57:57');
INSERT INTO `pmo_lecturer_plan` VALUES (28, 94, 76, '王二丫', '崔思思', '崔思思', 1, 1, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (29, 2, 76, '王二丫', '崔思思', '崔思思', 1, 2, NULL);
INSERT INTO `pmo_lecturer_plan` VALUES (30, 2, 76, '王二丫', '崔思思', '崔思思', 1, 0, '2018-10-11 11:06:08');
INSERT INTO `pmo_lecturer_plan` VALUES (31, 94, 2, '7', '888', '8', 2, 1, '2018-10-11 11:14:59');
INSERT INTO `pmo_lecturer_plan` VALUES (32, NULL, 1, 'sad', '3000', '5', 2, 0, '2018-10-11 13:54:28');
INSERT INTO `pmo_lecturer_plan` VALUES (33, NULL, 2, 'sad777', '3000777', '577', 2, 0, '2018-10-11 13:55:06');
INSERT INTO `pmo_lecturer_plan` VALUES (34, NULL, 1, 'sad77', '30008', '58', 2, 0, '2018-10-11 13:55:37');
INSERT INTO `pmo_lecturer_plan` VALUES (35, NULL, 2, '3228', '30008', '53', 2, 0, '2018-10-11 13:56:57');
INSERT INTO `pmo_lecturer_plan` VALUES (36, 94, NULL, '2', '30002', '52', NULL, 1, '2018-10-11 14:05:16');
INSERT INTO `pmo_lecturer_plan` VALUES (37, 94, NULL, '6', '30060', '56', NULL, 1, '2018-10-11 14:05:38');
INSERT INTO `pmo_lecturer_plan` VALUES (38, NULL, 2, '7', '888', '8', 2, 0, '2018-10-11 14:06:35');
INSERT INTO `pmo_lecturer_plan` VALUES (39, NULL, 2, '2', '30002', '52', 2, 0, '2018-10-11 14:09:41');
INSERT INTO `pmo_lecturer_plan` VALUES (40, 94, 1, '8', '30008', '58', 2, 1, '2018-10-11 14:22:13');
INSERT INTO `pmo_lecturer_plan` VALUES (41, NULL, 2, '6', '30060', '56', 2, 0, '2018-10-11 14:30:04');
INSERT INTO `pmo_lecturer_plan` VALUES (42, NULL, 1, '88888', '30008', '58', 2, 0, '2018-10-11 14:30:42');
INSERT INTO `pmo_lecturer_plan` VALUES (43, 94, 2, '50', '300065', '5', 2, 2, '2018-10-11 14:32:00');
INSERT INTO `pmo_lecturer_plan` VALUES (44, 94, 2, '500', '300065', '5', 2, 1, '2018-10-11 14:32:14');
INSERT INTO `pmo_lecturer_plan` VALUES (45, 94, 2, '50', '3000655', '5', 2, 2, '2018-10-11 14:33:01');
INSERT INTO `pmo_lecturer_plan` VALUES (46, 94, 2, '500', '300065', '5', 2, 2, '2018-10-11 14:33:56');
INSERT INTO `pmo_lecturer_plan` VALUES (47, 94, 2, '88', '888', '8888', 3, 2, '2018-10-11 14:42:58');
INSERT INTO `pmo_lecturer_plan` VALUES (48, 94, 2, '7', '77', '777', 3, 2, '2018-10-11 14:43:24');
INSERT INTO `pmo_lecturer_plan` VALUES (49, 94, 1, '6', '30006', '56', 2, 1, '2018-10-11 15:05:38');
INSERT INTO `pmo_lecturer_plan` VALUES (50, 94, 2, '3', '30004', '55', 2, 1, '2018-10-11 15:07:23');
INSERT INTO `pmo_lecturer_plan` VALUES (51, 94, 1, '6', '30006', '56', 2, 0, '2018-10-11 17:23:18');
INSERT INTO `pmo_lecturer_plan` VALUES (52, 94, 2, '3', '30004', '55', 2, 0, '2018-10-12 11:01:09');

-- ----------------------------
-- Table structure for pmo_model_list
-- ----------------------------
DROP TABLE IF EXISTS `pmo_model_list`;
CREATE TABLE `pmo_model_list`  (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `details` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_operation_project
-- ----------------------------
DROP TABLE IF EXISTS `pmo_operation_project`;
CREATE TABLE `pmo_operation_project`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 1 COMMENT '0为可修改，1为锁不可修改',
  `time` datetime(0) NULL DEFAULT NULL,
  `token` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_operation_project
-- ----------------------------
INSERT INTO `pmo_operation_project` VALUES (25, 75, 1, '2018-09-29 13:26:19', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (26, 84, 1, '2018-09-29 13:35:57', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (27, 86, 1, '2018-09-29 13:36:15', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (28, 88, 1, '2018-09-29 13:44:43', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (29, 83, 1, '2018-09-29 13:44:47', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (30, 79, 1, '2018-09-29 13:45:10', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (31, 82, 1, '2018-09-29 14:24:19', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (32, 76, 1, '2018-09-29 14:24:24', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (33, 93, 1, '2018-09-29 14:54:34', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (34, 94, 1, '2018-09-29 14:54:57', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (35, 95, 1, '2018-09-29 14:56:48', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (36, 96, 1, '2018-09-29 14:56:57', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (37, 97, 1, '2018-09-29 14:58:07', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (38, 98, 1, '2018-09-29 14:58:14', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (39, 99, 1, '2018-09-29 14:58:43', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (40, 101, 1, '2018-09-29 17:00:35', 'tnkGNc');
INSERT INTO `pmo_operation_project` VALUES (41, 103, 1, '2018-10-09 11:32:25', 'tnkGNc');

-- ----------------------------
-- Table structure for pmo_process_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_process_plan`;
CREATE TABLE `pmo_process_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `meet_id` int(11) NULL DEFAULT NULL COMMENT '会场id',
  `training_id` int(11) NULL DEFAULT NULL COMMENT '培训成本id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for pmo_progam
-- ----------------------------
DROP TABLE IF EXISTS `pmo_progam`;
CREATE TABLE `pmo_progam`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '单行文字',
  `staff_id` int(11) NULL DEFAULT NULL COMMENT '销售负责人id',
  `contract_id` int(11) NULL DEFAULT NULL COMMENT '合同表id',
  `contacts_id` int(11) NULL DEFAULT NULL COMMENT '联系人表',
  `fo_sale` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属销售',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '默认为0替换为1删除为2',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_progam
-- ----------------------------
INSERT INTO `pmo_progam` VALUES (1, '第一个', 1, 11, 1, '1', '1', 0);
INSERT INTO `pmo_progam` VALUES (2, '第二个', 2, 2, 2, '2', '2', 0);
INSERT INTO `pmo_progam` VALUES (3, '第三个', 3, 3, 3, '3', '3', 0);

-- ----------------------------
-- Table structure for pmo_project_contacts
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_contacts`;
CREATE TABLE `pmo_project_contacts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系人',
  `phone` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系人电话',
  `rank` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职务',
  `department` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门',
  `state` tinyint(2) NULL DEFAULT 0,
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_project_header
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_header`;
CREATE TABLE `pmo_project_header`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目名称',
  `progam_id` int(11) NULL DEFAULT NULL COMMENT '所属项目集id',
  `staff_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '实施负责人(员工表)',
  `template_id` int(11) NULL DEFAULT NULL COMMENT '项目模板id',
  `customer_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司名称',
  `day_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '天数',
  `date` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '培训日期',
  `student_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学生人数',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '培训地点',
  `budget_id` int(11) NULL DEFAULT NULL COMMENT '预算表id',
  `time` date NULL DEFAULT NULL COMMENT '添加时间',
  `money` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '金额',
  `budget_tax` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '税率',
  `budget_consulting_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '咨询费用',
  `budget_expects_revenue` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '预计收入',
  `state` tinyint(2) NOT NULL DEFAULT 0 COMMENT '默认为0修改为1删除为2',
  `user_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户哈希值',
  `course_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '课程名称',
  `unicode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 117 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_header
-- ----------------------------
INSERT INTO `pmo_project_header` VALUES (93, '1', 1, '75', 1, 'lol', '1', '2018-09-12', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `pmo_project_header` VALUES (94, '2', 2, '76', 1, 'we', '2', '2018-09-13', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for pmo_project_template
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_template`;
CREATE TABLE `pmo_project_template`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '实训名称',
  `state` tinyint(5) NULL DEFAULT 0 COMMENT '状态',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_template
-- ----------------------------
INSERT INTO `pmo_project_template` VALUES (1, '1', 1, '1');
INSERT INTO `pmo_project_template` VALUES (2, '2', 0, '2');
INSERT INTO `pmo_project_template` VALUES (3, '3', 0, '3');

-- ----------------------------
-- Table structure for pmo_province_cost
-- ----------------------------
DROP TABLE IF EXISTS `pmo_province_cost`;
CREATE TABLE `pmo_province_cost`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `long_fee_card_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '人员姓名',
  `long_fee_card_start_time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出发时间',
  `long_fee_card_start_place` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出发地点',
  `long_fee_card_end_time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '结束时间',
  `long_fee_card_end_place` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '结束地点',
  `state` tinyint(3) NULL DEFAULT 0,
  `header_id` int(11) NULL DEFAULT NULL,
  `now_time` datetime(0) NOT NULL,
  `fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用',
  `long_fee_card_vehicle_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `long_fee_card_vehicle_id` int(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_province_cost
-- ----------------------------
INSERT INTO `pmo_province_cost` VALUES (35, '2', '2', '2', '2', '2', 2, 94, '2018-09-12 08:47:28', '1', NULL, NULL);
INSERT INTO `pmo_province_cost` VALUES (36, '1', '1', '1', '1', '1', 0, 94, '2018-09-13 02:08:13', '1', NULL, NULL);
INSERT INTO `pmo_province_cost` VALUES (37, '2', '2', '2', '2', '2', 0, 94, '2018-09-13 02:08:13', '100', NULL, NULL);
INSERT INTO `pmo_province_cost` VALUES (38, '2', '', '1', '', '2', 0, 94, '0000-00-00 00:00:00', NULL, '', 0);

-- ----------------------------
-- Table structure for pmo_staff_table
-- ----------------------------
DROP TABLE IF EXISTS `pmo_staff_table`;
CREATE TABLE `pmo_staff_table`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `position` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位信息',
  `department` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '成员所属部门id列表',
  `unionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在当前isv全局范围内唯一标识一个用户的身份,用户无法修改',
  `userid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工在企业内的UserID，企业用来唯一标识用户的字段',
  `jobnumbers` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工工号',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工的邮箱',
  `hiredDate` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '入职时间',
  `openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在本 服务窗运营服务商 范围内,唯一标识关注者身份的id（不可修改）',
  `mobile` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号码（ISV不可见）',
  `state` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `power` tinyint(25) NULL DEFAULT 0,
  `quit` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_staff_table
-- ----------------------------
INSERT INTO `pmo_staff_table` VALUES (75, '柳芳', '副总经理', '26509419,26509421', 'AArHzXVStM9CFwE0p1z6xwiEiE', '06216348088634', 'E000700902', 'liufang@chinasofti.com', '965059200000', 'AArHzXVStM9CFwE0p1z6xwiEiE', '13520383989', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (76, '宋丹', '副总经理', '26509419,26509422', 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '01132266088766', 'E000700903', 'songdan@chinasofti.com', '1091289600000', 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '13552323651', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (77, '吴宝辉', '总经理', '26509419,26509420', 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '06216318444176', 'E000700912', 'wbh@chinasofti.com', '1022860800000', 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '13910922852', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (78, '亢鹏', '销售总监', '26509424,26509419', 'RxYhVC88uNgrnjAo5MMFpgiEiE', '06216348531439', 'E000700918', 'kangpeng@chinasofti.com', '1146412800000', 'RxYhVC88uNgrnjAo5MMFpgiEiE', '13911678217', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (79, '吴春霞', '销售总监', '26509419,26509425', 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '05063868525407', 'E000700913', 'wuchunxia@chinasofti.com', '1444838400000', 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '13511050696', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (80, '庞海燕', '销售', '1', 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '3122336824175196', 'E100017691', 'panghy@chinasofti.com', '1309881600000', 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '13911395319', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (81, '李萍', '出纳', '26509420', 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '07526131261878', 'E100093748', '　liping009@chinasofti.com', '1471190400000', 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '15701205466', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (82, '吴美宏', '会计', '26509420', '70jUJuaiP2OKs0IIJq7flbgiEiE', '116119535921751029', 'E100104811', 'wumeihong@chinasofti.com', '1499788800000', '70jUJuaiP2OKs0IIJq7flbgiEiE', '13717860261', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (83, '田野', '人事行政助理', '26509421', 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '1825306650967326', '', 'tianye005@chinasofti.com', '', 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '13161571763', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (84, '段美静', '行政助理', '26509421', 'bD43OjgMMTnpCuIcExxHbQiEiE', '07124219319765', 'E100025888', 'duanmeijing@chinasofti.com', '1373990400000', 'bD43OjgMMTnpCuIcExxHbQiEiE', '15011503914', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (85, '耿伟宁', '库管', '26509421', 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '07526131259264', 'E000700927', 'gengwn@chinasofti.com', '965059200000', 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '13910221378', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (86, '刘明', '部门助理', '26509421', 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '07526131248816', 'E100021226', 'liuming008@chinasofti.com', '1362585600000', 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '13901022674', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (87, '冯津津', '部门助理', '26509424', 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '191740376120989583', '', '', '', 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '15801459601', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (88, '刘静', '部门助理', '26509424,30316407', 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '1927341807690241', '', '', '', 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '13552208962', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (89, '徐子媛', '销售', '26509424,30316407', 'Ys0nGM4CMNRBZtxPhcRLZQiEiE', '014031251124257755', '', '', '', 'Ys0nGM4CMNRBZtxPhcRLZQiEiE', '18801038759', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (90, '黄嘉丽', '', '26509424', 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '193416470239761688', '', '', '', 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '15611468096', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (91, '杜刚利', '销售经理', '26429951', 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '06216348145245', 'E000700914', 'dugl@chinasofti.com', '1180627200000', 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '13126615363', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (92, '于化龙', '部门助理', '26429951', 'HquLpbtgym5BZtxPhcRLZQiEiE', '036532486220025937', 'E100104612', 'yuhualong@chinasofti.com', '1497196800000', 'HquLpbtgym5BZtxPhcRLZQiEiE', '13718566107', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (93, '李忻怡', '部门助理', '26429951', '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '083043436726200916', 'E100103197', 'lixinyi001@chinasofti.com', '1486915200000', '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '13521876292', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (94, '李旋', '部门助理', '26429951', 'tZh4k924tiius0IIJq7flbgiEiE', '0830446509845885', 'E100103198', 'lixuan001@chinasofti.com', '1486915200000', 'tZh4k924tiius0IIJq7flbgiEiE', '18513162724', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (95, '陈丽', '销售', '26429951', 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '07526648601212661', 'E100099327', 'chenli003@chinasofti.com', '1476633600000', 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '13284370698', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (96, '曲鹤', '销售', '26429951', '8jADbZwou2dBZtxPhcRLZQiEiE', '03633558276714', 'E100023930', 'quhe@chinasofti.com', '1368979200000', '8jADbZwou2dBZtxPhcRLZQiEiE', '13581683695', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (97, '温越', '销售', '26429951', '6wyJIABL71srnjAo5MMFpgiEiE', '0621635133357', 'E100017694', 'wenyue@chinasofti.com', '1328457600000', '6wyJIABL71srnjAo5MMFpgiEiE', '18301174940', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (98, '廖志敏', '销售', '26429951', 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '01241652073500', 'E100034712', 'liaozhimin@chinasofti.com', '1393430400000', 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '18811148190', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (99, '糜研', '部门助理', '26429951', '5JrLJiiyN8Jes0IIJq7flbgiEiE', '075255564999', 'E100069484', 'miyan@chinasofti.com', '1448812800000', '5JrLJiiyN8Jes0IIJq7flbgiEiE', '13331067038', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (100, '孙江微', '销售', '26429951', 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '06216352034744', 'E000700917', 'zhongruanpeixun@163.com', '1433088000000', 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '15101695303', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (101, '张婧竹', '项目助理', '26436766', 'kTPzGvTMIK7pCuIcExxHbQiEiE', '06216351411207', 'E000700921', 'zhangjzh@chinasofti.com', '1188316800000', 'kTPzGvTMIK7pCuIcExxHbQiEiE', '13439711694', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (102, '高杨', '售前技术', '26436766', 'Z56IsiiXBjApBZtxPhcRLZQiEiE', '01286248451255312', 'E100104654', 'gaoyang002@chinasofti.com', '1497801600000', 'Z56IsiiXBjApBZtxPhcRLZQiEiE', '18034111700', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (103, '穆连', '部门助理', '26436766', 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '08326209641007192', 'E100103236', 'mulian@chinasofti.com', '1487260800000', 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '18811425390', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (104, '褚寅良', '市场经理', '26456742', 'CK49wpZksw9u3MiP4RuBwKwiEiE', 'manager1335', 'E100021198', 'chuyinliang@chinasofti.com', '1362499200000', 'CK49wpZksw9u3MiP4RuBwKwiEiE', '18801213590', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (105, '侍尧', '开发', '26456742', 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '1908591938654906', '', '', '', 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '18311295627', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (106, '崔思思', '开发', '26456742', 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '6565633823686068', '', '', '', 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '13552323831', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (107, '王曙光', '运营', '26456742', '6rLywmYZlIPpCuIcExxHbQiEiE', '164407591129262427', '', '', '', '6rLywmYZlIPpCuIcExxHbQiEiE', '15712832787', '1', 0, 1);
INSERT INTO `pmo_staff_table` VALUES (108, '赵爽', '平面设计', '26456742', 'SZ2QwtMVunRWAhgHmF5PzwiEiE', '07525700361034', 'E100094518', 'zhaoshuang@chinasofti.com', '1471536000000', 'SZ2QwtMVunRWAhgHmF5PzwiEiE', '13520556482', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (109, '刘雪松', '前端开发', '26456742', 'JkeBrDleabJii4l4ptzMsKAiEiE', '07202163272788', 'E100102911', 'liuxuesong001@chinasofti.com', '1482681600000', 'JkeBrDleabJii4l4ptzMsKAiEiE', '13611366048', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (110, '寇艳艳', '销售经理', '30316407', 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '06216352069386', 'E000700915', 'kouyy@chinasofti.com', '1213632000000', 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '13683248456', '9', 0, 0);
INSERT INTO `pmo_staff_table` VALUES (111, '张剑', '销售经理', '30318368', 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '06216352047230', 'E100020215', 'zhangjian005@chinasofti.com', '1357315200000', 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '18911711719', '9', 0, 0);

-- ----------------------------
-- Table structure for pmo_staff_table_copy
-- ----------------------------
DROP TABLE IF EXISTS `pmo_staff_table_copy`;
CREATE TABLE `pmo_staff_table_copy`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `position` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位信息',
  `department` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '成员所属部门id列表',
  `unionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在当前isv全局范围内唯一标识一个用户的身份,用户无法修改',
  `userid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工在企业内的UserID，企业用来唯一标识用户的字段',
  `jobnumber` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工工号',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工的邮箱',
  `hiredDate` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '入职时间',
  `openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在本 服务窗运营服务商 范围内,唯一标识关注者身份的id（不可修改）',
  `mobile` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号码（ISV不可见）',
  `state` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `power` tinyint(25) NULL DEFAULT 0,
  `quit` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_staff_table_copy
-- ----------------------------
INSERT INTO `pmo_staff_table_copy` VALUES (1, '庞海燕', '销售', '1', 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '3122336824175196', 'E100017691', 'panghy@chinasofti.com', '1309881600000', 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '13911395319', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (2, '柳芳', '副总经理', '26509419,26509421', 'AArHzXVStM9CFwE0p1z6xwiEiE', '06216348088634', 'E000700902', 'liufang@chinasofti.com', '965059200000', 'AArHzXVStM9CFwE0p1z6xwiEiE', '13520383989', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (3, '宋丹', '副总经理', '26509419,26509422', 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '01132266088766', 'E000700903', 'songdan@chinasofti.com', '1091289600000', 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '13552323651', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (4, '吴宝辉', '总经理', '26509419,26509420', 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '06216318444176', 'E000700912', 'wbh@chinasofti.com', '1022860800000', 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '13910922852', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (5, '亢鹏', '销售总监', '26509424,26509419', 'RxYhVC88uNgrnjAo5MMFpgiEiE', '06216348531439', 'E000700918', 'kangpeng@chinasofti.com', '1146412800000', 'RxYhVC88uNgrnjAo5MMFpgiEiE', '13911678217', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (6, '吴春霞', '销售总监', '26509419,26509425', 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '05063868525407', 'E000700913', 'wuchunxia@chinasofti.com', '1444838400000', 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '13511050696', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (7, '李萍', '出纳', '26509420', 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '07526131261878', 'E100093748', '　liping009@chinasofti.com', '1471190400000', 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '15701205466', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (8, '吴美宏', '会计', '26509420', '70jUJuaiP2OKs0IIJq7flbgiEiE', '116119535921751029', 'E100104811', 'wumeihong@chinasofti.com', '1499788800000', '70jUJuaiP2OKs0IIJq7flbgiEiE', '13717860261', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (9, '田野', '人事行政助理', '26509421', 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '1825306650967326', '', 'tianye005@chinasofti.com', '', 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '13161571763', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (10, '段美静', '行政助理', '26509421', 'bD43OjgMMTnpCuIcExxHbQiEiE', '07124219319765', 'E100025888', 'duanmeijing@chinasofti.com', '1373990400000', 'bD43OjgMMTnpCuIcExxHbQiEiE', '15011503914', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (11, '耿伟宁', '库管', '26509421', 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '07526131259264', 'E000700927', 'gengwn@chinasofti.com', '965059200000', 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '13910221378', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (12, '刘明', '部门助理', '26509421', 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '07526131248816', 'E100021226', 'liuming008@chinasofti.com', '1362585600000', 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '13901022674', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (13, '冯津津', '部门助理', '26509424', 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '191740376120989583', '', '', '', 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '15801459601', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (14, '刘静', '部门助理', '26509424,30316407', 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '1927341807690241', '', '', '', 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '13552208962', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (15, '徐子媛', '销售', '26509424,30316407', 'Ys0nGM4CMNRBZtxPhcRLZQiEiE', '014031251124257755', '', '', '', 'Ys0nGM4CMNRBZtxPhcRLZQiEiE', '18801038759', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (16, '黄嘉丽', '', '26509424', 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '193416470239761688', '', '', '', 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '15611468096', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (17, '杜刚利', '销售经理', '26429951', 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '06216348145245', 'E000700914', 'dugl@chinasofti.com', '1180627200000', 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '13126615363', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (18, '于化龙', '部门助理', '26429951', 'HquLpbtgym5BZtxPhcRLZQiEiE', '036532486220025937', 'E100104612', 'yuhualong@chinasofti.com', '1497196800000', 'HquLpbtgym5BZtxPhcRLZQiEiE', '13718566107', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (19, '李忻怡', '部门助理', '26429951', '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '083043436726200916', 'E100103197', 'lixinyi001@chinasofti.com', '1486915200000', '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '13521876292', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (20, '李旋', '部门助理', '26429951', 'tZh4k924tiius0IIJq7flbgiEiE', '0830446509845885', 'E100103198', 'lixuan001@chinasofti.com', '1486915200000', 'tZh4k924tiius0IIJq7flbgiEiE', '18513162724', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (21, '陈丽', '销售', '26429951', 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '07526648601212661', 'E100099327', 'chenli003@chinasofti.com', '1476633600000', 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '13284370698', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (22, '曲鹤', '销售', '26429951', '8jADbZwou2dBZtxPhcRLZQiEiE', '03633558276714', 'E100023930', 'quhe@chinasofti.com', '1368979200000', '8jADbZwou2dBZtxPhcRLZQiEiE', '13581683695', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (23, '温越', '销售', '26429951', '6wyJIABL71srnjAo5MMFpgiEiE', '0621635133357', 'E100017694', 'wenyue@chinasofti.com', '1328457600000', '6wyJIABL71srnjAo5MMFpgiEiE', '18301174940', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (24, '廖志敏', '销售', '26429951', 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '01241652073500', 'E100034712', 'liaozhimin@chinasofti.com', '1393430400000', 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '18811148190', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (25, '糜研', '部门助理', '26429951', '5JrLJiiyN8Jes0IIJq7flbgiEiE', '075255564999', 'E100069484', 'miyan@chinasofti.com', '1448812800000', '5JrLJiiyN8Jes0IIJq7flbgiEiE', '13331067038', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (26, '孙江微', '销售', '26429951', 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '06216352034744', 'E000700917', 'zhongruanpeixun@163.com', '1433088000000', 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '15101695303', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (27, '张婧竹', '项目助理', '26436766', 'kTPzGvTMIK7pCuIcExxHbQiEiE', '06216351411207', 'E000700921', 'zhangjzh@chinasofti.com', '1188316800000', 'kTPzGvTMIK7pCuIcExxHbQiEiE', '13439711694', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (28, '高杨', '售前技术', '26436766', 'Z56IsiiXBjApBZtxPhcRLZQiEiE', '01286248451255312', 'E100104654', 'gaoyang002@chinasofti.com', '1497801600000', 'Z56IsiiXBjApBZtxPhcRLZQiEiE', '18034111700', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (29, '穆连', '部门助理', '26436766', 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '08326209641007192', 'E100103236', 'mulian@chinasofti.com', '1487260800000', 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '18811425390', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (30, '褚寅良', '市场经理', '26456742', 'CK49wpZksw9u3MiP4RuBwKwiEiE', 'manager1335', 'E100021198', 'chuyinliang@chinasofti.com', '1362499200000', 'CK49wpZksw9u3MiP4RuBwKwiEiE', '18801213590', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (31, '侍尧', '开发', '26456742', 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '1908591938654906', '', '', '', 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '18311295627', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (32, '崔思思', '开发', '26456742', 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '6565633823686068', '', '', '', 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '13552323831', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (33, '王曙光', '运营', '26456742', '6rLywmYZlIPpCuIcExxHbQiEiE', '164407591129262427', '', '', '', '6rLywmYZlIPpCuIcExxHbQiEiE', '15712832787', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (34, '赵爽', '平面设计', '26456742', 'SZ2QwtMVunRWAhgHmF5PzwiEiE', '07525700361034', 'E100094518', 'zhaoshuang@chinasofti.com', '1471536000000', 'SZ2QwtMVunRWAhgHmF5PzwiEiE', '13520556482', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (35, '刘雪松', '前端开发', '26456742', 'JkeBrDleabJii4l4ptzMsKAiEiE', '07202163272788', 'E100102911', 'liuxuesong001@chinasofti.com', '1482681600000', 'JkeBrDleabJii4l4ptzMsKAiEiE', '13611366048', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (36, '寇艳艳', '销售经理', '30316407', 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '06216352069386', 'E000700915', 'kouyy@chinasofti.com', '1213632000000', 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '13683248456', '48', 0, 0);
INSERT INTO `pmo_staff_table_copy` VALUES (37, '张剑', '销售经理', '30318368', 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '06216352047230', 'E100020215', 'zhangjian005@chinasofti.com', '1357315200000', 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '18911711719', '48', 0, 0);

-- ----------------------------
-- Table structure for pmo_stay_cost
-- ----------------------------
DROP TABLE IF EXISTS `pmo_stay_cost`;
CREATE TABLE `pmo_stay_cost`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_expense_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '住宿费人姓名',
  `hotel_expense_days` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '天数',
  `hotel_expense_total` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '总价',
  `header_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  `now_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_stay_cost
-- ----------------------------
INSERT INTO `pmo_stay_cost` VALUES (21, '2', '2', '2', 94, 0, '2018-09-12 08:47:28');
INSERT INTO `pmo_stay_cost` VALUES (22, '1', '1', '1', 94, 0, '2018-09-13 02:08:13');
INSERT INTO `pmo_stay_cost` VALUES (23, '2', '2', '2', 94, 1, '2018-09-13 02:08:13');

-- ----------------------------
-- Table structure for pmo_travel_mode
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_mode`;
CREATE TABLE `pmo_travel_mode`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_mode
-- ----------------------------
INSERT INTO `pmo_travel_mode` VALUES (1, '火车');
INSERT INTO `pmo_travel_mode` VALUES (2, '飞机');
INSERT INTO `pmo_travel_mode` VALUES (3, '大巴');

-- ----------------------------
-- Table structure for pmo_user
-- ----------------------------
DROP TABLE IF EXISTS `pmo_user`;
CREATE TABLE `pmo_user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `token` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `state` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_user
-- ----------------------------
INSERT INTO `pmo_user` VALUES (1, '123456', '123456', 'q3YFRXoKTG', 1);

-- ----------------------------
-- Table structure for pmo_view_component
-- ----------------------------
DROP TABLE IF EXISTS `pmo_view_component`;
CREATE TABLE `pmo_view_component`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `key` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `title` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `tip` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `add_button` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `descript` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `before_api_uri` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `after_api_uri` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `to_page_id` int(11) NULL DEFAULT NULL,
  `annotation` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '注释',
  `page_id` int(11) UNSIGNED NULL DEFAULT NULL COMMENT '页面',
  `group_id` int(11) NULL DEFAULT NULL,
  `order_id` int(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 89 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_view_component
-- ----------------------------
INSERT INTO `pmo_view_component` VALUES (1, 'budget_project_name', 'BudgetListTextSearchLink', 1, NULL, '所属项目', NULL, NULL, NULL, 'project_header', NULL, NULL, '预算管理//新建预算', 1, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (2, 'budget_tax', 'MutiText', 2, '6%', '税率', NULL, NULL, NULL, NULL, NULL, NULL, '首页税率', 1, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (3, 'budget_consulting_fee', 'MutiText', 2, NULL, '咨询费用', NULL, NULL, NULL, NULL, NULL, NULL, '首页费用', 1, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (4, 'budget_expects_revenue', 'MutiText', 2, NULL, '预计收入', NULL, NULL, NULL, NULL, NULL, NULL, '首页预计收入', 1, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (5, 'add_project_name', 'MutiText', 2, NULL, '项目名称', NULL, NULL, NULL, NULL, NULL, 1, '所属项目新增里项目名称', 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (6, 'add_project_gather', 'ListTextSearch', 3, NULL, '所属项目集', NULL, '//新建项目集', NULL, 'project_template', NULL, 1, '项目集', 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (7, 'add_project_gather_charge', 'ProjectGather', 4, NULL, '销售负责人', NULL, NULL, NULL, 'staff_small_list', NULL, 1, '销售负责人', 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (9, 'add_customer_name', 'MutiText', 2, NULL, '客户名称', NULL, NULL, NULL, NULL, NULL, 1, '客户名称', 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (11, 'add_days', 'MutiText', 2, NULL, '天数', NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (12, 'add_training_numbers', 'MutiText', 2, NULL, '培训人数', NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (13, 'add_training_ares', 'MutiText', 2, NULL, '培训地点', NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (14, 'teacher_name', 'ListTextSearch', 3, NULL, '讲师姓名1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (8, 'add_project_charge', 'SelectList', 5, NULL, '实施负责人', NULL, NULL, NULL, NULL, NULL, 1, '实施负责人', 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (10, 'project_templet', 'ListTextSearch', 3, NULL, '项目模板', NULL, NULL, NULL, 'project_template', NULL, 1, NULL, 2, 0, NULL);
INSERT INTO `pmo_view_component` VALUES (15, 'group_id', 'ComGroup', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 15, NULL);
INSERT INTO `pmo_view_component` VALUES (16, 'teacher_name', 'MutiText', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 15, NULL);

-- ----------------------------
-- Table structure for pmo_view_page
-- ----------------------------
DROP TABLE IF EXISTS `pmo_view_page`;
CREATE TABLE `pmo_view_page`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_view_page
-- ----------------------------
INSERT INTO `pmo_view_page` VALUES (1);
INSERT INTO `pmo_view_page` VALUES (2);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(8) NOT NULL COMMENT '角色id',
  `role_name` varbinary(50) NULL DEFAULT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule`  (
  `id` int(5) NOT NULL COMMENT '权限id',
  `rule_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '权限类型',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(5) NOT NULL COMMENT '用户表',
  `account` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '账户名称',
  `passwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
