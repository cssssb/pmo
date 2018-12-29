/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.4.41_3306
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : 192.168.4.41:3306
 Source Schema         : pmo_c

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 28/12/2018 16:58:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pmo_address
-- ----------------------------
DROP TABLE IF EXISTS `pmo_address`;
CREATE TABLE `pmo_address`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NULL DEFAULT NULL COMMENT '省id',
  `city_id` int(11) NULL DEFAULT NULL COMMENT '市id',
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '详细地址',
  `state` tinyint(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '培训详细地址表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_address
-- ----------------------------
INSERT INTO `pmo_address` VALUES (1, 2, 52, '中软大厦', 0);
INSERT INTO `pmo_address` VALUES (2, 2, 52, '中油宾馆', 0);
INSERT INTO `pmo_address` VALUES (3, 2, 52, '1', 0);
INSERT INTO `pmo_address` VALUES (4, 2, 52, '2', 0);
INSERT INTO `pmo_address` VALUES (5, 2, 52, '3', 0);
INSERT INTO `pmo_address` VALUES (6, 2, 52, '中软大厦', 0);
INSERT INTO `pmo_address` VALUES (7, 2, 52, '2', 0);
INSERT INTO `pmo_address` VALUES (8, 2, 52, '23', 0);
INSERT INTO `pmo_address` VALUES (9, 12, 176, '建华区', 0);
INSERT INTO `pmo_address` VALUES (10, 6, 88, '一个地址', 0);
INSERT INTO `pmo_address` VALUES (11, 2, 52, '中软大厦', 0);
INSERT INTO `pmo_address` VALUES (12, 30, 367, '昆明第一宾馆', 0);
INSERT INTO `pmo_address` VALUES (13, 2, 52, '金融界121号F301', 0);

-- ----------------------------
-- Table structure for pmo_ares
-- ----------------------------
DROP TABLE IF EXISTS `pmo_ares`;
CREATE TABLE `pmo_ares`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fid` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent_id`(`fid`) USING BTREE,
  INDEX `region_type`(`type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3409 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '地址表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_ares
-- ----------------------------
INSERT INTO `pmo_ares` VALUES (1, 0, '中国', 0);
INSERT INTO `pmo_ares` VALUES (2, 1, '北京', 1);
INSERT INTO `pmo_ares` VALUES (3, 1, '安徽', 1);
INSERT INTO `pmo_ares` VALUES (4, 1, '福建', 1);
INSERT INTO `pmo_ares` VALUES (5, 1, '甘肃', 1);
INSERT INTO `pmo_ares` VALUES (6, 1, '广东', 1);
INSERT INTO `pmo_ares` VALUES (7, 1, '广西', 1);
INSERT INTO `pmo_ares` VALUES (8, 1, '贵州', 1);
INSERT INTO `pmo_ares` VALUES (9, 1, '海南', 1);
INSERT INTO `pmo_ares` VALUES (10, 1, '河北', 1);
INSERT INTO `pmo_ares` VALUES (11, 1, '河南', 1);
INSERT INTO `pmo_ares` VALUES (12, 1, '黑龙江', 1);
INSERT INTO `pmo_ares` VALUES (13, 1, '湖北', 1);
INSERT INTO `pmo_ares` VALUES (14, 1, '湖南', 1);
INSERT INTO `pmo_ares` VALUES (15, 1, '吉林', 1);
INSERT INTO `pmo_ares` VALUES (16, 1, '江苏', 1);
INSERT INTO `pmo_ares` VALUES (17, 1, '江西', 1);
INSERT INTO `pmo_ares` VALUES (18, 1, '辽宁', 1);
INSERT INTO `pmo_ares` VALUES (19, 1, '内蒙古', 1);
INSERT INTO `pmo_ares` VALUES (20, 1, '宁夏', 1);
INSERT INTO `pmo_ares` VALUES (21, 1, '青海', 1);
INSERT INTO `pmo_ares` VALUES (22, 1, '山东', 1);
INSERT INTO `pmo_ares` VALUES (23, 1, '山西', 1);
INSERT INTO `pmo_ares` VALUES (24, 1, '陕西', 1);
INSERT INTO `pmo_ares` VALUES (25, 1, '上海', 1);
INSERT INTO `pmo_ares` VALUES (26, 1, '四川', 1);
INSERT INTO `pmo_ares` VALUES (27, 1, '天津', 1);
INSERT INTO `pmo_ares` VALUES (28, 1, '西藏', 1);
INSERT INTO `pmo_ares` VALUES (29, 1, '新疆', 1);
INSERT INTO `pmo_ares` VALUES (30, 1, '云南', 1);
INSERT INTO `pmo_ares` VALUES (31, 1, '浙江', 1);
INSERT INTO `pmo_ares` VALUES (32, 1, '重庆', 1);
INSERT INTO `pmo_ares` VALUES (33, 1, '香港', 1);
INSERT INTO `pmo_ares` VALUES (34, 1, '澳门', 1);
INSERT INTO `pmo_ares` VALUES (35, 1, '台湾', 1);
INSERT INTO `pmo_ares` VALUES (36, 3, '安庆', 2);
INSERT INTO `pmo_ares` VALUES (37, 3, '蚌埠', 2);
INSERT INTO `pmo_ares` VALUES (38, 3, '巢湖', 2);
INSERT INTO `pmo_ares` VALUES (39, 3, '池州', 2);
INSERT INTO `pmo_ares` VALUES (40, 3, '滁州', 2);
INSERT INTO `pmo_ares` VALUES (41, 3, '阜阳', 2);
INSERT INTO `pmo_ares` VALUES (42, 3, '淮北', 2);
INSERT INTO `pmo_ares` VALUES (43, 3, '淮南', 2);
INSERT INTO `pmo_ares` VALUES (44, 3, '黄山', 2);
INSERT INTO `pmo_ares` VALUES (45, 3, '六安', 2);
INSERT INTO `pmo_ares` VALUES (46, 3, '马鞍山', 2);
INSERT INTO `pmo_ares` VALUES (47, 3, '宿州', 2);
INSERT INTO `pmo_ares` VALUES (48, 3, '铜陵', 2);
INSERT INTO `pmo_ares` VALUES (49, 3, '芜湖', 2);
INSERT INTO `pmo_ares` VALUES (50, 3, '宣城', 2);
INSERT INTO `pmo_ares` VALUES (51, 3, '亳州', 2);
INSERT INTO `pmo_ares` VALUES (52, 2, '北京', 2);
INSERT INTO `pmo_ares` VALUES (53, 4, '福州', 2);
INSERT INTO `pmo_ares` VALUES (54, 4, '龙岩', 2);
INSERT INTO `pmo_ares` VALUES (55, 4, '南平', 2);
INSERT INTO `pmo_ares` VALUES (56, 4, '宁德', 2);
INSERT INTO `pmo_ares` VALUES (57, 4, '莆田', 2);
INSERT INTO `pmo_ares` VALUES (58, 4, '泉州', 2);
INSERT INTO `pmo_ares` VALUES (59, 4, '三明', 2);
INSERT INTO `pmo_ares` VALUES (60, 4, '厦门', 2);
INSERT INTO `pmo_ares` VALUES (61, 4, '漳州', 2);
INSERT INTO `pmo_ares` VALUES (62, 5, '兰州', 2);
INSERT INTO `pmo_ares` VALUES (63, 5, '白银', 2);
INSERT INTO `pmo_ares` VALUES (64, 5, '定西', 2);
INSERT INTO `pmo_ares` VALUES (65, 5, '甘南', 2);
INSERT INTO `pmo_ares` VALUES (66, 5, '嘉峪关', 2);
INSERT INTO `pmo_ares` VALUES (67, 5, '金昌', 2);
INSERT INTO `pmo_ares` VALUES (68, 5, '酒泉', 2);
INSERT INTO `pmo_ares` VALUES (69, 5, '临夏', 2);
INSERT INTO `pmo_ares` VALUES (70, 5, '陇南', 2);
INSERT INTO `pmo_ares` VALUES (71, 5, '平凉', 2);
INSERT INTO `pmo_ares` VALUES (72, 5, '庆阳', 2);
INSERT INTO `pmo_ares` VALUES (73, 5, '天水', 2);
INSERT INTO `pmo_ares` VALUES (74, 5, '武威', 2);
INSERT INTO `pmo_ares` VALUES (75, 5, '张掖', 2);
INSERT INTO `pmo_ares` VALUES (76, 6, '广州', 2);
INSERT INTO `pmo_ares` VALUES (77, 6, '深圳', 2);
INSERT INTO `pmo_ares` VALUES (78, 6, '潮州', 2);
INSERT INTO `pmo_ares` VALUES (79, 6, '东莞', 2);
INSERT INTO `pmo_ares` VALUES (80, 6, '佛山', 2);
INSERT INTO `pmo_ares` VALUES (81, 6, '河源', 2);
INSERT INTO `pmo_ares` VALUES (82, 6, '惠州', 2);
INSERT INTO `pmo_ares` VALUES (83, 6, '江门', 2);
INSERT INTO `pmo_ares` VALUES (84, 6, '揭阳', 2);
INSERT INTO `pmo_ares` VALUES (85, 6, '茂名', 2);
INSERT INTO `pmo_ares` VALUES (86, 6, '梅州', 2);
INSERT INTO `pmo_ares` VALUES (87, 6, '清远', 2);
INSERT INTO `pmo_ares` VALUES (88, 6, '汕头', 2);
INSERT INTO `pmo_ares` VALUES (89, 6, '汕尾', 2);
INSERT INTO `pmo_ares` VALUES (90, 6, '韶关', 2);
INSERT INTO `pmo_ares` VALUES (91, 6, '阳江', 2);
INSERT INTO `pmo_ares` VALUES (92, 6, '云浮', 2);
INSERT INTO `pmo_ares` VALUES (93, 6, '湛江', 2);
INSERT INTO `pmo_ares` VALUES (94, 6, '肇庆', 2);
INSERT INTO `pmo_ares` VALUES (95, 6, '中山', 2);
INSERT INTO `pmo_ares` VALUES (96, 6, '珠海', 2);
INSERT INTO `pmo_ares` VALUES (97, 7, '南宁', 2);
INSERT INTO `pmo_ares` VALUES (98, 7, '桂林', 2);
INSERT INTO `pmo_ares` VALUES (99, 7, '百色', 2);
INSERT INTO `pmo_ares` VALUES (100, 7, '北海', 2);
INSERT INTO `pmo_ares` VALUES (101, 7, '崇左', 2);
INSERT INTO `pmo_ares` VALUES (102, 7, '防城港', 2);
INSERT INTO `pmo_ares` VALUES (103, 7, '贵港', 2);
INSERT INTO `pmo_ares` VALUES (104, 7, '河池', 2);
INSERT INTO `pmo_ares` VALUES (105, 7, '贺州', 2);
INSERT INTO `pmo_ares` VALUES (106, 7, '来宾', 2);
INSERT INTO `pmo_ares` VALUES (107, 7, '柳州', 2);
INSERT INTO `pmo_ares` VALUES (108, 7, '钦州', 2);
INSERT INTO `pmo_ares` VALUES (109, 7, '梧州', 2);
INSERT INTO `pmo_ares` VALUES (110, 7, '玉林', 2);
INSERT INTO `pmo_ares` VALUES (111, 8, '贵阳', 2);
INSERT INTO `pmo_ares` VALUES (112, 8, '安顺', 2);
INSERT INTO `pmo_ares` VALUES (113, 8, '毕节', 2);
INSERT INTO `pmo_ares` VALUES (114, 8, '六盘水', 2);
INSERT INTO `pmo_ares` VALUES (115, 8, '黔东南', 2);
INSERT INTO `pmo_ares` VALUES (116, 8, '黔南', 2);
INSERT INTO `pmo_ares` VALUES (117, 8, '黔西南', 2);
INSERT INTO `pmo_ares` VALUES (118, 8, '铜仁', 2);
INSERT INTO `pmo_ares` VALUES (119, 8, '遵义', 2);
INSERT INTO `pmo_ares` VALUES (120, 9, '海口', 2);
INSERT INTO `pmo_ares` VALUES (121, 9, '三亚', 2);
INSERT INTO `pmo_ares` VALUES (122, 9, '白沙', 2);
INSERT INTO `pmo_ares` VALUES (123, 9, '保亭', 2);
INSERT INTO `pmo_ares` VALUES (124, 9, '昌江', 2);
INSERT INTO `pmo_ares` VALUES (125, 9, '澄迈县', 2);
INSERT INTO `pmo_ares` VALUES (126, 9, '定安县', 2);
INSERT INTO `pmo_ares` VALUES (127, 9, '东方', 2);
INSERT INTO `pmo_ares` VALUES (128, 9, '乐东', 2);
INSERT INTO `pmo_ares` VALUES (129, 9, '临高县', 2);
INSERT INTO `pmo_ares` VALUES (130, 9, '陵水', 2);
INSERT INTO `pmo_ares` VALUES (131, 9, '琼海', 2);
INSERT INTO `pmo_ares` VALUES (132, 9, '琼中', 2);
INSERT INTO `pmo_ares` VALUES (133, 9, '屯昌县', 2);
INSERT INTO `pmo_ares` VALUES (134, 9, '万宁', 2);
INSERT INTO `pmo_ares` VALUES (135, 9, '文昌', 2);
INSERT INTO `pmo_ares` VALUES (136, 9, '五指山', 2);
INSERT INTO `pmo_ares` VALUES (137, 9, '儋州', 2);
INSERT INTO `pmo_ares` VALUES (138, 10, '石家庄', 2);
INSERT INTO `pmo_ares` VALUES (139, 10, '保定', 2);
INSERT INTO `pmo_ares` VALUES (140, 10, '沧州', 2);
INSERT INTO `pmo_ares` VALUES (141, 10, '承德', 2);
INSERT INTO `pmo_ares` VALUES (142, 10, '邯郸', 2);
INSERT INTO `pmo_ares` VALUES (143, 10, '衡水', 2);
INSERT INTO `pmo_ares` VALUES (144, 10, '廊坊', 2);
INSERT INTO `pmo_ares` VALUES (145, 10, '秦皇岛', 2);
INSERT INTO `pmo_ares` VALUES (146, 10, '唐山', 2);
INSERT INTO `pmo_ares` VALUES (147, 10, '邢台', 2);
INSERT INTO `pmo_ares` VALUES (148, 10, '张家口', 2);
INSERT INTO `pmo_ares` VALUES (149, 11, '郑州', 2);
INSERT INTO `pmo_ares` VALUES (150, 11, '洛阳', 2);
INSERT INTO `pmo_ares` VALUES (151, 11, '开封', 2);
INSERT INTO `pmo_ares` VALUES (152, 11, '安阳', 2);
INSERT INTO `pmo_ares` VALUES (153, 11, '鹤壁', 2);
INSERT INTO `pmo_ares` VALUES (154, 11, '济源', 2);
INSERT INTO `pmo_ares` VALUES (155, 11, '焦作', 2);
INSERT INTO `pmo_ares` VALUES (156, 11, '南阳', 2);
INSERT INTO `pmo_ares` VALUES (157, 11, '平顶山', 2);
INSERT INTO `pmo_ares` VALUES (158, 11, '三门峡', 2);
INSERT INTO `pmo_ares` VALUES (159, 11, '商丘', 2);
INSERT INTO `pmo_ares` VALUES (160, 11, '新乡', 2);
INSERT INTO `pmo_ares` VALUES (161, 11, '信阳', 2);
INSERT INTO `pmo_ares` VALUES (162, 11, '许昌', 2);
INSERT INTO `pmo_ares` VALUES (163, 11, '周口', 2);
INSERT INTO `pmo_ares` VALUES (164, 11, '驻马店', 2);
INSERT INTO `pmo_ares` VALUES (165, 11, '漯河', 2);
INSERT INTO `pmo_ares` VALUES (166, 11, '濮阳', 2);
INSERT INTO `pmo_ares` VALUES (167, 12, '哈尔滨', 2);
INSERT INTO `pmo_ares` VALUES (168, 12, '大庆', 2);
INSERT INTO `pmo_ares` VALUES (169, 12, '大兴安岭', 2);
INSERT INTO `pmo_ares` VALUES (170, 12, '鹤岗', 2);
INSERT INTO `pmo_ares` VALUES (171, 12, '黑河', 2);
INSERT INTO `pmo_ares` VALUES (172, 12, '鸡西', 2);
INSERT INTO `pmo_ares` VALUES (173, 12, '佳木斯', 2);
INSERT INTO `pmo_ares` VALUES (174, 12, '牡丹江', 2);
INSERT INTO `pmo_ares` VALUES (175, 12, '七台河', 2);
INSERT INTO `pmo_ares` VALUES (176, 12, '齐齐哈尔', 2);
INSERT INTO `pmo_ares` VALUES (177, 12, '双鸭山', 2);
INSERT INTO `pmo_ares` VALUES (178, 12, '绥化', 2);
INSERT INTO `pmo_ares` VALUES (179, 12, '伊春', 2);
INSERT INTO `pmo_ares` VALUES (180, 13, '武汉', 2);
INSERT INTO `pmo_ares` VALUES (181, 13, '仙桃', 2);
INSERT INTO `pmo_ares` VALUES (182, 13, '鄂州', 2);
INSERT INTO `pmo_ares` VALUES (183, 13, '黄冈', 2);
INSERT INTO `pmo_ares` VALUES (184, 13, '黄石', 2);
INSERT INTO `pmo_ares` VALUES (185, 13, '荆门', 2);
INSERT INTO `pmo_ares` VALUES (186, 13, '荆州', 2);
INSERT INTO `pmo_ares` VALUES (187, 13, '潜江', 2);
INSERT INTO `pmo_ares` VALUES (188, 13, '神农架林区', 2);
INSERT INTO `pmo_ares` VALUES (189, 13, '十堰', 2);
INSERT INTO `pmo_ares` VALUES (190, 13, '随州', 2);
INSERT INTO `pmo_ares` VALUES (191, 13, '天门', 2);
INSERT INTO `pmo_ares` VALUES (192, 13, '咸宁', 2);
INSERT INTO `pmo_ares` VALUES (193, 13, '襄樊', 2);
INSERT INTO `pmo_ares` VALUES (194, 13, '孝感', 2);
INSERT INTO `pmo_ares` VALUES (195, 13, '宜昌', 2);
INSERT INTO `pmo_ares` VALUES (196, 13, '恩施', 2);
INSERT INTO `pmo_ares` VALUES (197, 14, '长沙', 2);
INSERT INTO `pmo_ares` VALUES (198, 14, '张家界', 2);
INSERT INTO `pmo_ares` VALUES (199, 14, '常德', 2);
INSERT INTO `pmo_ares` VALUES (200, 14, '郴州', 2);
INSERT INTO `pmo_ares` VALUES (201, 14, '衡阳', 2);
INSERT INTO `pmo_ares` VALUES (202, 14, '怀化', 2);
INSERT INTO `pmo_ares` VALUES (203, 14, '娄底', 2);
INSERT INTO `pmo_ares` VALUES (204, 14, '邵阳', 2);
INSERT INTO `pmo_ares` VALUES (205, 14, '湘潭', 2);
INSERT INTO `pmo_ares` VALUES (206, 14, '湘西', 2);
INSERT INTO `pmo_ares` VALUES (207, 14, '益阳', 2);
INSERT INTO `pmo_ares` VALUES (208, 14, '永州', 2);
INSERT INTO `pmo_ares` VALUES (209, 14, '岳阳', 2);
INSERT INTO `pmo_ares` VALUES (210, 14, '株洲', 2);
INSERT INTO `pmo_ares` VALUES (211, 15, '长春', 2);
INSERT INTO `pmo_ares` VALUES (212, 15, '吉林', 2);
INSERT INTO `pmo_ares` VALUES (213, 15, '白城', 2);
INSERT INTO `pmo_ares` VALUES (214, 15, '白山', 2);
INSERT INTO `pmo_ares` VALUES (215, 15, '辽源', 2);
INSERT INTO `pmo_ares` VALUES (216, 15, '四平', 2);
INSERT INTO `pmo_ares` VALUES (217, 15, '松原', 2);
INSERT INTO `pmo_ares` VALUES (218, 15, '通化', 2);
INSERT INTO `pmo_ares` VALUES (219, 15, '延边', 2);
INSERT INTO `pmo_ares` VALUES (220, 16, '南京', 2);
INSERT INTO `pmo_ares` VALUES (221, 16, '苏州', 2);
INSERT INTO `pmo_ares` VALUES (222, 16, '无锡', 2);
INSERT INTO `pmo_ares` VALUES (223, 16, '常州', 2);
INSERT INTO `pmo_ares` VALUES (224, 16, '淮安', 2);
INSERT INTO `pmo_ares` VALUES (225, 16, '连云港', 2);
INSERT INTO `pmo_ares` VALUES (226, 16, '南通', 2);
INSERT INTO `pmo_ares` VALUES (227, 16, '宿迁', 2);
INSERT INTO `pmo_ares` VALUES (228, 16, '泰州', 2);
INSERT INTO `pmo_ares` VALUES (229, 16, '徐州', 2);
INSERT INTO `pmo_ares` VALUES (230, 16, '盐城', 2);
INSERT INTO `pmo_ares` VALUES (231, 16, '扬州', 2);
INSERT INTO `pmo_ares` VALUES (232, 16, '镇江', 2);
INSERT INTO `pmo_ares` VALUES (233, 17, '南昌', 2);
INSERT INTO `pmo_ares` VALUES (234, 17, '抚州', 2);
INSERT INTO `pmo_ares` VALUES (235, 17, '赣州', 2);
INSERT INTO `pmo_ares` VALUES (236, 17, '吉安', 2);
INSERT INTO `pmo_ares` VALUES (237, 17, '景德镇', 2);
INSERT INTO `pmo_ares` VALUES (238, 17, '九江', 2);
INSERT INTO `pmo_ares` VALUES (239, 17, '萍乡', 2);
INSERT INTO `pmo_ares` VALUES (240, 17, '上饶', 2);
INSERT INTO `pmo_ares` VALUES (241, 17, '新余', 2);
INSERT INTO `pmo_ares` VALUES (242, 17, '宜春', 2);
INSERT INTO `pmo_ares` VALUES (243, 17, '鹰潭', 2);
INSERT INTO `pmo_ares` VALUES (244, 18, '沈阳', 2);
INSERT INTO `pmo_ares` VALUES (245, 18, '大连', 2);
INSERT INTO `pmo_ares` VALUES (246, 18, '鞍山', 2);
INSERT INTO `pmo_ares` VALUES (247, 18, '本溪', 2);
INSERT INTO `pmo_ares` VALUES (248, 18, '朝阳', 2);
INSERT INTO `pmo_ares` VALUES (249, 18, '丹东', 2);
INSERT INTO `pmo_ares` VALUES (250, 18, '抚顺', 2);
INSERT INTO `pmo_ares` VALUES (251, 18, '阜新', 2);
INSERT INTO `pmo_ares` VALUES (252, 18, '葫芦岛', 2);
INSERT INTO `pmo_ares` VALUES (253, 18, '锦州', 2);
INSERT INTO `pmo_ares` VALUES (254, 18, '辽阳', 2);
INSERT INTO `pmo_ares` VALUES (255, 18, '盘锦', 2);
INSERT INTO `pmo_ares` VALUES (256, 18, '铁岭', 2);
INSERT INTO `pmo_ares` VALUES (257, 18, '营口', 2);
INSERT INTO `pmo_ares` VALUES (258, 19, '呼和浩特', 2);
INSERT INTO `pmo_ares` VALUES (259, 19, '阿拉善盟', 2);
INSERT INTO `pmo_ares` VALUES (260, 19, '巴彦淖尔盟', 2);
INSERT INTO `pmo_ares` VALUES (261, 19, '包头', 2);
INSERT INTO `pmo_ares` VALUES (262, 19, '赤峰', 2);
INSERT INTO `pmo_ares` VALUES (263, 19, '鄂尔多斯', 2);
INSERT INTO `pmo_ares` VALUES (264, 19, '呼伦贝尔', 2);
INSERT INTO `pmo_ares` VALUES (265, 19, '通辽', 2);
INSERT INTO `pmo_ares` VALUES (266, 19, '乌海', 2);
INSERT INTO `pmo_ares` VALUES (267, 19, '乌兰察布市', 2);
INSERT INTO `pmo_ares` VALUES (268, 19, '锡林郭勒盟', 2);
INSERT INTO `pmo_ares` VALUES (269, 19, '兴安盟', 2);
INSERT INTO `pmo_ares` VALUES (270, 20, '银川', 2);
INSERT INTO `pmo_ares` VALUES (271, 20, '固原', 2);
INSERT INTO `pmo_ares` VALUES (272, 20, '石嘴山', 2);
INSERT INTO `pmo_ares` VALUES (273, 20, '吴忠', 2);
INSERT INTO `pmo_ares` VALUES (274, 20, '中卫', 2);
INSERT INTO `pmo_ares` VALUES (275, 21, '西宁', 2);
INSERT INTO `pmo_ares` VALUES (276, 21, '果洛', 2);
INSERT INTO `pmo_ares` VALUES (277, 21, '海北', 2);
INSERT INTO `pmo_ares` VALUES (278, 21, '海东', 2);
INSERT INTO `pmo_ares` VALUES (279, 21, '海南', 2);
INSERT INTO `pmo_ares` VALUES (280, 21, '海西', 2);
INSERT INTO `pmo_ares` VALUES (281, 21, '黄南', 2);
INSERT INTO `pmo_ares` VALUES (282, 21, '玉树', 2);
INSERT INTO `pmo_ares` VALUES (283, 22, '济南', 2);
INSERT INTO `pmo_ares` VALUES (284, 22, '青岛', 2);
INSERT INTO `pmo_ares` VALUES (285, 22, '滨州', 2);
INSERT INTO `pmo_ares` VALUES (286, 22, '德州', 2);
INSERT INTO `pmo_ares` VALUES (287, 22, '东营', 2);
INSERT INTO `pmo_ares` VALUES (288, 22, '菏泽', 2);
INSERT INTO `pmo_ares` VALUES (289, 22, '济宁', 2);
INSERT INTO `pmo_ares` VALUES (290, 22, '莱芜', 2);
INSERT INTO `pmo_ares` VALUES (291, 22, '聊城', 2);
INSERT INTO `pmo_ares` VALUES (292, 22, '临沂', 2);
INSERT INTO `pmo_ares` VALUES (293, 22, '日照', 2);
INSERT INTO `pmo_ares` VALUES (294, 22, '泰安', 2);
INSERT INTO `pmo_ares` VALUES (295, 22, '威海', 2);
INSERT INTO `pmo_ares` VALUES (296, 22, '潍坊', 2);
INSERT INTO `pmo_ares` VALUES (297, 22, '烟台', 2);
INSERT INTO `pmo_ares` VALUES (298, 22, '枣庄', 2);
INSERT INTO `pmo_ares` VALUES (299, 22, '淄博', 2);
INSERT INTO `pmo_ares` VALUES (300, 23, '太原', 2);
INSERT INTO `pmo_ares` VALUES (301, 23, '长治', 2);
INSERT INTO `pmo_ares` VALUES (302, 23, '大同', 2);
INSERT INTO `pmo_ares` VALUES (303, 23, '晋城', 2);
INSERT INTO `pmo_ares` VALUES (304, 23, '晋中', 2);
INSERT INTO `pmo_ares` VALUES (305, 23, '临汾', 2);
INSERT INTO `pmo_ares` VALUES (306, 23, '吕梁', 2);
INSERT INTO `pmo_ares` VALUES (307, 23, '朔州', 2);
INSERT INTO `pmo_ares` VALUES (308, 23, '忻州', 2);
INSERT INTO `pmo_ares` VALUES (309, 23, '阳泉', 2);
INSERT INTO `pmo_ares` VALUES (310, 23, '运城', 2);
INSERT INTO `pmo_ares` VALUES (311, 24, '西安', 2);
INSERT INTO `pmo_ares` VALUES (312, 24, '安康', 2);
INSERT INTO `pmo_ares` VALUES (313, 24, '宝鸡', 2);
INSERT INTO `pmo_ares` VALUES (314, 24, '汉中', 2);
INSERT INTO `pmo_ares` VALUES (315, 24, '商洛', 2);
INSERT INTO `pmo_ares` VALUES (316, 24, '铜川', 2);
INSERT INTO `pmo_ares` VALUES (317, 24, '渭南', 2);
INSERT INTO `pmo_ares` VALUES (318, 24, '咸阳', 2);
INSERT INTO `pmo_ares` VALUES (319, 24, '延安', 2);
INSERT INTO `pmo_ares` VALUES (320, 24, '榆林', 2);
INSERT INTO `pmo_ares` VALUES (321, 25, '上海', 2);
INSERT INTO `pmo_ares` VALUES (322, 26, '成都', 2);
INSERT INTO `pmo_ares` VALUES (323, 26, '绵阳', 2);
INSERT INTO `pmo_ares` VALUES (324, 26, '阿坝', 2);
INSERT INTO `pmo_ares` VALUES (325, 26, '巴中', 2);
INSERT INTO `pmo_ares` VALUES (326, 26, '达州', 2);
INSERT INTO `pmo_ares` VALUES (327, 26, '德阳', 2);
INSERT INTO `pmo_ares` VALUES (328, 26, '甘孜', 2);
INSERT INTO `pmo_ares` VALUES (329, 26, '广安', 2);
INSERT INTO `pmo_ares` VALUES (330, 26, '广元', 2);
INSERT INTO `pmo_ares` VALUES (331, 26, '乐山', 2);
INSERT INTO `pmo_ares` VALUES (332, 26, '凉山', 2);
INSERT INTO `pmo_ares` VALUES (333, 26, '眉山', 2);
INSERT INTO `pmo_ares` VALUES (334, 26, '南充', 2);
INSERT INTO `pmo_ares` VALUES (335, 26, '内江', 2);
INSERT INTO `pmo_ares` VALUES (336, 26, '攀枝花', 2);
INSERT INTO `pmo_ares` VALUES (337, 26, '遂宁', 2);
INSERT INTO `pmo_ares` VALUES (338, 26, '雅安', 2);
INSERT INTO `pmo_ares` VALUES (339, 26, '宜宾', 2);
INSERT INTO `pmo_ares` VALUES (340, 26, '资阳', 2);
INSERT INTO `pmo_ares` VALUES (341, 26, '自贡', 2);
INSERT INTO `pmo_ares` VALUES (342, 26, '泸州', 2);
INSERT INTO `pmo_ares` VALUES (343, 27, '天津', 2);
INSERT INTO `pmo_ares` VALUES (344, 28, '拉萨', 2);
INSERT INTO `pmo_ares` VALUES (345, 28, '阿里', 2);
INSERT INTO `pmo_ares` VALUES (346, 28, '昌都', 2);
INSERT INTO `pmo_ares` VALUES (347, 28, '林芝', 2);
INSERT INTO `pmo_ares` VALUES (348, 28, '那曲', 2);
INSERT INTO `pmo_ares` VALUES (349, 28, '日喀则', 2);
INSERT INTO `pmo_ares` VALUES (350, 28, '山南', 2);
INSERT INTO `pmo_ares` VALUES (351, 29, '乌鲁木齐', 2);
INSERT INTO `pmo_ares` VALUES (352, 29, '阿克苏', 2);
INSERT INTO `pmo_ares` VALUES (353, 29, '阿拉尔', 2);
INSERT INTO `pmo_ares` VALUES (354, 29, '巴音郭楞', 2);
INSERT INTO `pmo_ares` VALUES (355, 29, '博尔塔拉', 2);
INSERT INTO `pmo_ares` VALUES (356, 29, '昌吉', 2);
INSERT INTO `pmo_ares` VALUES (357, 29, '哈密', 2);
INSERT INTO `pmo_ares` VALUES (358, 29, '和田', 2);
INSERT INTO `pmo_ares` VALUES (359, 29, '喀什', 2);
INSERT INTO `pmo_ares` VALUES (360, 29, '克拉玛依', 2);
INSERT INTO `pmo_ares` VALUES (361, 29, '克孜勒苏', 2);
INSERT INTO `pmo_ares` VALUES (362, 29, '石河子', 2);
INSERT INTO `pmo_ares` VALUES (363, 29, '图木舒克', 2);
INSERT INTO `pmo_ares` VALUES (364, 29, '吐鲁番', 2);
INSERT INTO `pmo_ares` VALUES (365, 29, '五家渠', 2);
INSERT INTO `pmo_ares` VALUES (366, 29, '伊犁', 2);
INSERT INTO `pmo_ares` VALUES (367, 30, '昆明', 2);
INSERT INTO `pmo_ares` VALUES (368, 30, '怒江', 2);
INSERT INTO `pmo_ares` VALUES (369, 30, '普洱', 2);
INSERT INTO `pmo_ares` VALUES (370, 30, '丽江', 2);
INSERT INTO `pmo_ares` VALUES (371, 30, '保山', 2);
INSERT INTO `pmo_ares` VALUES (372, 30, '楚雄', 2);
INSERT INTO `pmo_ares` VALUES (373, 30, '大理', 2);
INSERT INTO `pmo_ares` VALUES (374, 30, '德宏', 2);
INSERT INTO `pmo_ares` VALUES (375, 30, '迪庆', 2);
INSERT INTO `pmo_ares` VALUES (376, 30, '红河', 2);
INSERT INTO `pmo_ares` VALUES (377, 30, '临沧', 2);
INSERT INTO `pmo_ares` VALUES (378, 30, '曲靖', 2);
INSERT INTO `pmo_ares` VALUES (379, 30, '文山', 2);
INSERT INTO `pmo_ares` VALUES (380, 30, '西双版纳', 2);
INSERT INTO `pmo_ares` VALUES (381, 30, '玉溪', 2);
INSERT INTO `pmo_ares` VALUES (382, 30, '昭通', 2);
INSERT INTO `pmo_ares` VALUES (383, 31, '杭州', 2);
INSERT INTO `pmo_ares` VALUES (384, 31, '湖州', 2);
INSERT INTO `pmo_ares` VALUES (385, 31, '嘉兴', 2);
INSERT INTO `pmo_ares` VALUES (386, 31, '金华', 2);
INSERT INTO `pmo_ares` VALUES (387, 31, '丽水', 2);
INSERT INTO `pmo_ares` VALUES (388, 31, '宁波', 2);
INSERT INTO `pmo_ares` VALUES (389, 31, '绍兴', 2);
INSERT INTO `pmo_ares` VALUES (390, 31, '台州', 2);
INSERT INTO `pmo_ares` VALUES (391, 31, '温州', 2);
INSERT INTO `pmo_ares` VALUES (392, 31, '舟山', 2);
INSERT INTO `pmo_ares` VALUES (393, 31, '衢州', 2);
INSERT INTO `pmo_ares` VALUES (394, 32, '重庆', 2);
INSERT INTO `pmo_ares` VALUES (395, 33, '香港', 2);
INSERT INTO `pmo_ares` VALUES (396, 34, '澳门', 2);
INSERT INTO `pmo_ares` VALUES (397, 35, '台湾', 2);
INSERT INTO `pmo_ares` VALUES (398, 36, '迎江区', 3);
INSERT INTO `pmo_ares` VALUES (399, 36, '大观区', 3);
INSERT INTO `pmo_ares` VALUES (400, 36, '宜秀区', 3);
INSERT INTO `pmo_ares` VALUES (401, 36, '桐城市', 3);
INSERT INTO `pmo_ares` VALUES (402, 36, '怀宁县', 3);
INSERT INTO `pmo_ares` VALUES (403, 36, '枞阳县', 3);
INSERT INTO `pmo_ares` VALUES (404, 36, '潜山县', 3);
INSERT INTO `pmo_ares` VALUES (405, 36, '太湖县', 3);
INSERT INTO `pmo_ares` VALUES (406, 36, '宿松县', 3);
INSERT INTO `pmo_ares` VALUES (407, 36, '望江县', 3);
INSERT INTO `pmo_ares` VALUES (408, 36, '岳西县', 3);
INSERT INTO `pmo_ares` VALUES (409, 37, '中市区', 3);
INSERT INTO `pmo_ares` VALUES (410, 37, '东市区', 3);
INSERT INTO `pmo_ares` VALUES (411, 37, '西市区', 3);
INSERT INTO `pmo_ares` VALUES (412, 37, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (413, 37, '怀远县', 3);
INSERT INTO `pmo_ares` VALUES (414, 37, '五河县', 3);
INSERT INTO `pmo_ares` VALUES (415, 37, '固镇县', 3);
INSERT INTO `pmo_ares` VALUES (416, 38, '居巢区', 3);
INSERT INTO `pmo_ares` VALUES (417, 38, '庐江县', 3);
INSERT INTO `pmo_ares` VALUES (418, 38, '无为县', 3);
INSERT INTO `pmo_ares` VALUES (419, 38, '含山县', 3);
INSERT INTO `pmo_ares` VALUES (420, 38, '和县', 3);
INSERT INTO `pmo_ares` VALUES (421, 39, '贵池区', 3);
INSERT INTO `pmo_ares` VALUES (422, 39, '东至县', 3);
INSERT INTO `pmo_ares` VALUES (423, 39, '石台县', 3);
INSERT INTO `pmo_ares` VALUES (424, 39, '青阳县', 3);
INSERT INTO `pmo_ares` VALUES (425, 40, '琅琊区', 3);
INSERT INTO `pmo_ares` VALUES (426, 40, '南谯区', 3);
INSERT INTO `pmo_ares` VALUES (427, 40, '天长市', 3);
INSERT INTO `pmo_ares` VALUES (428, 40, '明光市', 3);
INSERT INTO `pmo_ares` VALUES (429, 40, '来安县', 3);
INSERT INTO `pmo_ares` VALUES (430, 40, '全椒县', 3);
INSERT INTO `pmo_ares` VALUES (431, 40, '定远县', 3);
INSERT INTO `pmo_ares` VALUES (432, 40, '凤阳县', 3);
INSERT INTO `pmo_ares` VALUES (433, 41, '蚌山区', 3);
INSERT INTO `pmo_ares` VALUES (434, 41, '龙子湖区', 3);
INSERT INTO `pmo_ares` VALUES (435, 41, '禹会区', 3);
INSERT INTO `pmo_ares` VALUES (436, 41, '淮上区', 3);
INSERT INTO `pmo_ares` VALUES (437, 41, '颍州区', 3);
INSERT INTO `pmo_ares` VALUES (438, 41, '颍东区', 3);
INSERT INTO `pmo_ares` VALUES (439, 41, '颍泉区', 3);
INSERT INTO `pmo_ares` VALUES (440, 41, '界首市', 3);
INSERT INTO `pmo_ares` VALUES (441, 41, '临泉县', 3);
INSERT INTO `pmo_ares` VALUES (442, 41, '太和县', 3);
INSERT INTO `pmo_ares` VALUES (443, 41, '阜南县', 3);
INSERT INTO `pmo_ares` VALUES (444, 41, '颖上县', 3);
INSERT INTO `pmo_ares` VALUES (445, 42, '相山区', 3);
INSERT INTO `pmo_ares` VALUES (446, 42, '杜集区', 3);
INSERT INTO `pmo_ares` VALUES (447, 42, '烈山区', 3);
INSERT INTO `pmo_ares` VALUES (448, 42, '濉溪县', 3);
INSERT INTO `pmo_ares` VALUES (449, 43, '田家庵区', 3);
INSERT INTO `pmo_ares` VALUES (450, 43, '大通区', 3);
INSERT INTO `pmo_ares` VALUES (451, 43, '谢家集区', 3);
INSERT INTO `pmo_ares` VALUES (452, 43, '八公山区', 3);
INSERT INTO `pmo_ares` VALUES (453, 43, '潘集区', 3);
INSERT INTO `pmo_ares` VALUES (454, 43, '凤台县', 3);
INSERT INTO `pmo_ares` VALUES (455, 44, '屯溪区', 3);
INSERT INTO `pmo_ares` VALUES (456, 44, '黄山区', 3);
INSERT INTO `pmo_ares` VALUES (457, 44, '徽州区', 3);
INSERT INTO `pmo_ares` VALUES (458, 44, '歙县', 3);
INSERT INTO `pmo_ares` VALUES (459, 44, '休宁县', 3);
INSERT INTO `pmo_ares` VALUES (460, 44, '黟县', 3);
INSERT INTO `pmo_ares` VALUES (461, 44, '祁门县', 3);
INSERT INTO `pmo_ares` VALUES (462, 45, '金安区', 3);
INSERT INTO `pmo_ares` VALUES (463, 45, '裕安区', 3);
INSERT INTO `pmo_ares` VALUES (464, 45, '寿县', 3);
INSERT INTO `pmo_ares` VALUES (465, 45, '霍邱县', 3);
INSERT INTO `pmo_ares` VALUES (466, 45, '舒城县', 3);
INSERT INTO `pmo_ares` VALUES (467, 45, '金寨县', 3);
INSERT INTO `pmo_ares` VALUES (468, 45, '霍山县', 3);
INSERT INTO `pmo_ares` VALUES (469, 46, '雨山区', 3);
INSERT INTO `pmo_ares` VALUES (470, 46, '花山区', 3);
INSERT INTO `pmo_ares` VALUES (471, 46, '金家庄区', 3);
INSERT INTO `pmo_ares` VALUES (472, 46, '当涂县', 3);
INSERT INTO `pmo_ares` VALUES (473, 47, '埇桥区', 3);
INSERT INTO `pmo_ares` VALUES (474, 47, '砀山县', 3);
INSERT INTO `pmo_ares` VALUES (475, 47, '萧县', 3);
INSERT INTO `pmo_ares` VALUES (476, 47, '灵璧县', 3);
INSERT INTO `pmo_ares` VALUES (477, 47, '泗县', 3);
INSERT INTO `pmo_ares` VALUES (478, 48, '铜官山区', 3);
INSERT INTO `pmo_ares` VALUES (479, 48, '狮子山区', 3);
INSERT INTO `pmo_ares` VALUES (480, 48, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (481, 48, '铜陵县', 3);
INSERT INTO `pmo_ares` VALUES (482, 49, '镜湖区', 3);
INSERT INTO `pmo_ares` VALUES (483, 49, '弋江区', 3);
INSERT INTO `pmo_ares` VALUES (484, 49, '鸠江区', 3);
INSERT INTO `pmo_ares` VALUES (485, 49, '三山区', 3);
INSERT INTO `pmo_ares` VALUES (486, 49, '芜湖县', 3);
INSERT INTO `pmo_ares` VALUES (487, 49, '繁昌县', 3);
INSERT INTO `pmo_ares` VALUES (488, 49, '南陵县', 3);
INSERT INTO `pmo_ares` VALUES (489, 50, '宣州区', 3);
INSERT INTO `pmo_ares` VALUES (490, 50, '宁国市', 3);
INSERT INTO `pmo_ares` VALUES (491, 50, '郎溪县', 3);
INSERT INTO `pmo_ares` VALUES (492, 50, '广德县', 3);
INSERT INTO `pmo_ares` VALUES (493, 50, '泾县', 3);
INSERT INTO `pmo_ares` VALUES (494, 50, '绩溪县', 3);
INSERT INTO `pmo_ares` VALUES (495, 50, '旌德县', 3);
INSERT INTO `pmo_ares` VALUES (496, 51, '涡阳县', 3);
INSERT INTO `pmo_ares` VALUES (497, 51, '蒙城县', 3);
INSERT INTO `pmo_ares` VALUES (498, 51, '利辛县', 3);
INSERT INTO `pmo_ares` VALUES (499, 51, '谯城区', 3);
INSERT INTO `pmo_ares` VALUES (500, 52, '东城区', 3);
INSERT INTO `pmo_ares` VALUES (501, 52, '西城区', 3);
INSERT INTO `pmo_ares` VALUES (502, 52, '海淀区', 3);
INSERT INTO `pmo_ares` VALUES (503, 52, '朝阳区', 3);
INSERT INTO `pmo_ares` VALUES (504, 52, '崇文区', 3);
INSERT INTO `pmo_ares` VALUES (505, 52, '宣武区', 3);
INSERT INTO `pmo_ares` VALUES (506, 52, '丰台区', 3);
INSERT INTO `pmo_ares` VALUES (507, 52, '石景山区', 3);
INSERT INTO `pmo_ares` VALUES (508, 52, '房山区', 3);
INSERT INTO `pmo_ares` VALUES (509, 52, '门头沟区', 3);
INSERT INTO `pmo_ares` VALUES (510, 52, '通州区', 3);
INSERT INTO `pmo_ares` VALUES (511, 52, '顺义区', 3);
INSERT INTO `pmo_ares` VALUES (512, 52, '昌平区', 3);
INSERT INTO `pmo_ares` VALUES (513, 52, '怀柔区', 3);
INSERT INTO `pmo_ares` VALUES (514, 52, '平谷区', 3);
INSERT INTO `pmo_ares` VALUES (515, 52, '大兴区', 3);
INSERT INTO `pmo_ares` VALUES (516, 52, '密云县', 3);
INSERT INTO `pmo_ares` VALUES (517, 52, '延庆县', 3);
INSERT INTO `pmo_ares` VALUES (518, 53, '鼓楼区', 3);
INSERT INTO `pmo_ares` VALUES (519, 53, '台江区', 3);
INSERT INTO `pmo_ares` VALUES (520, 53, '仓山区', 3);
INSERT INTO `pmo_ares` VALUES (521, 53, '马尾区', 3);
INSERT INTO `pmo_ares` VALUES (522, 53, '晋安区', 3);
INSERT INTO `pmo_ares` VALUES (523, 53, '福清市', 3);
INSERT INTO `pmo_ares` VALUES (524, 53, '长乐市', 3);
INSERT INTO `pmo_ares` VALUES (525, 53, '闽侯县', 3);
INSERT INTO `pmo_ares` VALUES (526, 53, '连江县', 3);
INSERT INTO `pmo_ares` VALUES (527, 53, '罗源县', 3);
INSERT INTO `pmo_ares` VALUES (528, 53, '闽清县', 3);
INSERT INTO `pmo_ares` VALUES (529, 53, '永泰县', 3);
INSERT INTO `pmo_ares` VALUES (530, 53, '平潭县', 3);
INSERT INTO `pmo_ares` VALUES (531, 54, '新罗区', 3);
INSERT INTO `pmo_ares` VALUES (532, 54, '漳平市', 3);
INSERT INTO `pmo_ares` VALUES (533, 54, '长汀县', 3);
INSERT INTO `pmo_ares` VALUES (534, 54, '永定县', 3);
INSERT INTO `pmo_ares` VALUES (535, 54, '上杭县', 3);
INSERT INTO `pmo_ares` VALUES (536, 54, '武平县', 3);
INSERT INTO `pmo_ares` VALUES (537, 54, '连城县', 3);
INSERT INTO `pmo_ares` VALUES (538, 55, '延平区', 3);
INSERT INTO `pmo_ares` VALUES (539, 55, '邵武市', 3);
INSERT INTO `pmo_ares` VALUES (540, 55, '武夷山市', 3);
INSERT INTO `pmo_ares` VALUES (541, 55, '建瓯市', 3);
INSERT INTO `pmo_ares` VALUES (542, 55, '建阳市', 3);
INSERT INTO `pmo_ares` VALUES (543, 55, '顺昌县', 3);
INSERT INTO `pmo_ares` VALUES (544, 55, '浦城县', 3);
INSERT INTO `pmo_ares` VALUES (545, 55, '光泽县', 3);
INSERT INTO `pmo_ares` VALUES (546, 55, '松溪县', 3);
INSERT INTO `pmo_ares` VALUES (547, 55, '政和县', 3);
INSERT INTO `pmo_ares` VALUES (548, 56, '蕉城区', 3);
INSERT INTO `pmo_ares` VALUES (549, 56, '福安市', 3);
INSERT INTO `pmo_ares` VALUES (550, 56, '福鼎市', 3);
INSERT INTO `pmo_ares` VALUES (551, 56, '霞浦县', 3);
INSERT INTO `pmo_ares` VALUES (552, 56, '古田县', 3);
INSERT INTO `pmo_ares` VALUES (553, 56, '屏南县', 3);
INSERT INTO `pmo_ares` VALUES (554, 56, '寿宁县', 3);
INSERT INTO `pmo_ares` VALUES (555, 56, '周宁县', 3);
INSERT INTO `pmo_ares` VALUES (556, 56, '柘荣县', 3);
INSERT INTO `pmo_ares` VALUES (557, 57, '城厢区', 3);
INSERT INTO `pmo_ares` VALUES (558, 57, '涵江区', 3);
INSERT INTO `pmo_ares` VALUES (559, 57, '荔城区', 3);
INSERT INTO `pmo_ares` VALUES (560, 57, '秀屿区', 3);
INSERT INTO `pmo_ares` VALUES (561, 57, '仙游县', 3);
INSERT INTO `pmo_ares` VALUES (562, 58, '鲤城区', 3);
INSERT INTO `pmo_ares` VALUES (563, 58, '丰泽区', 3);
INSERT INTO `pmo_ares` VALUES (564, 58, '洛江区', 3);
INSERT INTO `pmo_ares` VALUES (565, 58, '清濛开发区', 3);
INSERT INTO `pmo_ares` VALUES (566, 58, '泉港区', 3);
INSERT INTO `pmo_ares` VALUES (567, 58, '石狮市', 3);
INSERT INTO `pmo_ares` VALUES (568, 58, '晋江市', 3);
INSERT INTO `pmo_ares` VALUES (569, 58, '南安市', 3);
INSERT INTO `pmo_ares` VALUES (570, 58, '惠安县', 3);
INSERT INTO `pmo_ares` VALUES (571, 58, '安溪县', 3);
INSERT INTO `pmo_ares` VALUES (572, 58, '永春县', 3);
INSERT INTO `pmo_ares` VALUES (573, 58, '德化县', 3);
INSERT INTO `pmo_ares` VALUES (574, 58, '金门县', 3);
INSERT INTO `pmo_ares` VALUES (575, 59, '梅列区', 3);
INSERT INTO `pmo_ares` VALUES (576, 59, '三元区', 3);
INSERT INTO `pmo_ares` VALUES (577, 59, '永安市', 3);
INSERT INTO `pmo_ares` VALUES (578, 59, '明溪县', 3);
INSERT INTO `pmo_ares` VALUES (579, 59, '清流县', 3);
INSERT INTO `pmo_ares` VALUES (580, 59, '宁化县', 3);
INSERT INTO `pmo_ares` VALUES (581, 59, '大田县', 3);
INSERT INTO `pmo_ares` VALUES (582, 59, '尤溪县', 3);
INSERT INTO `pmo_ares` VALUES (583, 59, '沙县', 3);
INSERT INTO `pmo_ares` VALUES (584, 59, '将乐县', 3);
INSERT INTO `pmo_ares` VALUES (585, 59, '泰宁县', 3);
INSERT INTO `pmo_ares` VALUES (586, 59, '建宁县', 3);
INSERT INTO `pmo_ares` VALUES (587, 60, '思明区', 3);
INSERT INTO `pmo_ares` VALUES (588, 60, '海沧区', 3);
INSERT INTO `pmo_ares` VALUES (589, 60, '湖里区', 3);
INSERT INTO `pmo_ares` VALUES (590, 60, '集美区', 3);
INSERT INTO `pmo_ares` VALUES (591, 60, '同安区', 3);
INSERT INTO `pmo_ares` VALUES (592, 60, '翔安区', 3);
INSERT INTO `pmo_ares` VALUES (593, 61, '芗城区', 3);
INSERT INTO `pmo_ares` VALUES (594, 61, '龙文区', 3);
INSERT INTO `pmo_ares` VALUES (595, 61, '龙海市', 3);
INSERT INTO `pmo_ares` VALUES (596, 61, '云霄县', 3);
INSERT INTO `pmo_ares` VALUES (597, 61, '漳浦县', 3);
INSERT INTO `pmo_ares` VALUES (598, 61, '诏安县', 3);
INSERT INTO `pmo_ares` VALUES (599, 61, '长泰县', 3);
INSERT INTO `pmo_ares` VALUES (600, 61, '东山县', 3);
INSERT INTO `pmo_ares` VALUES (601, 61, '南靖县', 3);
INSERT INTO `pmo_ares` VALUES (602, 61, '平和县', 3);
INSERT INTO `pmo_ares` VALUES (603, 61, '华安县', 3);
INSERT INTO `pmo_ares` VALUES (604, 62, '皋兰县', 3);
INSERT INTO `pmo_ares` VALUES (605, 62, '城关区', 3);
INSERT INTO `pmo_ares` VALUES (606, 62, '七里河区', 3);
INSERT INTO `pmo_ares` VALUES (607, 62, '西固区', 3);
INSERT INTO `pmo_ares` VALUES (608, 62, '安宁区', 3);
INSERT INTO `pmo_ares` VALUES (609, 62, '红古区', 3);
INSERT INTO `pmo_ares` VALUES (610, 62, '永登县', 3);
INSERT INTO `pmo_ares` VALUES (611, 62, '榆中县', 3);
INSERT INTO `pmo_ares` VALUES (612, 63, '白银区', 3);
INSERT INTO `pmo_ares` VALUES (613, 63, '平川区', 3);
INSERT INTO `pmo_ares` VALUES (614, 63, '会宁县', 3);
INSERT INTO `pmo_ares` VALUES (615, 63, '景泰县', 3);
INSERT INTO `pmo_ares` VALUES (616, 63, '靖远县', 3);
INSERT INTO `pmo_ares` VALUES (617, 64, '临洮县', 3);
INSERT INTO `pmo_ares` VALUES (618, 64, '陇西县', 3);
INSERT INTO `pmo_ares` VALUES (619, 64, '通渭县', 3);
INSERT INTO `pmo_ares` VALUES (620, 64, '渭源县', 3);
INSERT INTO `pmo_ares` VALUES (621, 64, '漳县', 3);
INSERT INTO `pmo_ares` VALUES (622, 64, '岷县', 3);
INSERT INTO `pmo_ares` VALUES (623, 64, '安定区', 3);
INSERT INTO `pmo_ares` VALUES (624, 64, '安定区', 3);
INSERT INTO `pmo_ares` VALUES (625, 65, '合作市', 3);
INSERT INTO `pmo_ares` VALUES (626, 65, '临潭县', 3);
INSERT INTO `pmo_ares` VALUES (627, 65, '卓尼县', 3);
INSERT INTO `pmo_ares` VALUES (628, 65, '舟曲县', 3);
INSERT INTO `pmo_ares` VALUES (629, 65, '迭部县', 3);
INSERT INTO `pmo_ares` VALUES (630, 65, '玛曲县', 3);
INSERT INTO `pmo_ares` VALUES (631, 65, '碌曲县', 3);
INSERT INTO `pmo_ares` VALUES (632, 65, '夏河县', 3);
INSERT INTO `pmo_ares` VALUES (633, 66, '嘉峪关市', 3);
INSERT INTO `pmo_ares` VALUES (634, 67, '金川区', 3);
INSERT INTO `pmo_ares` VALUES (635, 67, '永昌县', 3);
INSERT INTO `pmo_ares` VALUES (636, 68, '肃州区', 3);
INSERT INTO `pmo_ares` VALUES (637, 68, '玉门市', 3);
INSERT INTO `pmo_ares` VALUES (638, 68, '敦煌市', 3);
INSERT INTO `pmo_ares` VALUES (639, 68, '金塔县', 3);
INSERT INTO `pmo_ares` VALUES (640, 68, '瓜州县', 3);
INSERT INTO `pmo_ares` VALUES (641, 68, '肃北', 3);
INSERT INTO `pmo_ares` VALUES (642, 68, '阿克塞', 3);
INSERT INTO `pmo_ares` VALUES (643, 69, '临夏市', 3);
INSERT INTO `pmo_ares` VALUES (644, 69, '临夏县', 3);
INSERT INTO `pmo_ares` VALUES (645, 69, '康乐县', 3);
INSERT INTO `pmo_ares` VALUES (646, 69, '永靖县', 3);
INSERT INTO `pmo_ares` VALUES (647, 69, '广河县', 3);
INSERT INTO `pmo_ares` VALUES (648, 69, '和政县', 3);
INSERT INTO `pmo_ares` VALUES (649, 69, '东乡族自治县', 3);
INSERT INTO `pmo_ares` VALUES (650, 69, '积石山', 3);
INSERT INTO `pmo_ares` VALUES (651, 70, '成县', 3);
INSERT INTO `pmo_ares` VALUES (652, 70, '徽县', 3);
INSERT INTO `pmo_ares` VALUES (653, 70, '康县', 3);
INSERT INTO `pmo_ares` VALUES (654, 70, '礼县', 3);
INSERT INTO `pmo_ares` VALUES (655, 70, '两当县', 3);
INSERT INTO `pmo_ares` VALUES (656, 70, '文县', 3);
INSERT INTO `pmo_ares` VALUES (657, 70, '西和县', 3);
INSERT INTO `pmo_ares` VALUES (658, 70, '宕昌县', 3);
INSERT INTO `pmo_ares` VALUES (659, 70, '武都区', 3);
INSERT INTO `pmo_ares` VALUES (660, 71, '崇信县', 3);
INSERT INTO `pmo_ares` VALUES (661, 71, '华亭县', 3);
INSERT INTO `pmo_ares` VALUES (662, 71, '静宁县', 3);
INSERT INTO `pmo_ares` VALUES (663, 71, '灵台县', 3);
INSERT INTO `pmo_ares` VALUES (664, 71, '崆峒区', 3);
INSERT INTO `pmo_ares` VALUES (665, 71, '庄浪县', 3);
INSERT INTO `pmo_ares` VALUES (666, 71, '泾川县', 3);
INSERT INTO `pmo_ares` VALUES (667, 72, '合水县', 3);
INSERT INTO `pmo_ares` VALUES (668, 72, '华池县', 3);
INSERT INTO `pmo_ares` VALUES (669, 72, '环县', 3);
INSERT INTO `pmo_ares` VALUES (670, 72, '宁县', 3);
INSERT INTO `pmo_ares` VALUES (671, 72, '庆城县', 3);
INSERT INTO `pmo_ares` VALUES (672, 72, '西峰区', 3);
INSERT INTO `pmo_ares` VALUES (673, 72, '镇原县', 3);
INSERT INTO `pmo_ares` VALUES (674, 72, '正宁县', 3);
INSERT INTO `pmo_ares` VALUES (675, 73, '甘谷县', 3);
INSERT INTO `pmo_ares` VALUES (676, 73, '秦安县', 3);
INSERT INTO `pmo_ares` VALUES (677, 73, '清水县', 3);
INSERT INTO `pmo_ares` VALUES (678, 73, '秦州区', 3);
INSERT INTO `pmo_ares` VALUES (679, 73, '麦积区', 3);
INSERT INTO `pmo_ares` VALUES (680, 73, '武山县', 3);
INSERT INTO `pmo_ares` VALUES (681, 73, '张家川', 3);
INSERT INTO `pmo_ares` VALUES (682, 74, '古浪县', 3);
INSERT INTO `pmo_ares` VALUES (683, 74, '民勤县', 3);
INSERT INTO `pmo_ares` VALUES (684, 74, '天祝', 3);
INSERT INTO `pmo_ares` VALUES (685, 74, '凉州区', 3);
INSERT INTO `pmo_ares` VALUES (686, 75, '高台县', 3);
INSERT INTO `pmo_ares` VALUES (687, 75, '临泽县', 3);
INSERT INTO `pmo_ares` VALUES (688, 75, '民乐县', 3);
INSERT INTO `pmo_ares` VALUES (689, 75, '山丹县', 3);
INSERT INTO `pmo_ares` VALUES (690, 75, '肃南', 3);
INSERT INTO `pmo_ares` VALUES (691, 75, '甘州区', 3);
INSERT INTO `pmo_ares` VALUES (692, 76, '从化市', 3);
INSERT INTO `pmo_ares` VALUES (693, 76, '天河区', 3);
INSERT INTO `pmo_ares` VALUES (694, 76, '东山区', 3);
INSERT INTO `pmo_ares` VALUES (695, 76, '白云区', 3);
INSERT INTO `pmo_ares` VALUES (696, 76, '海珠区', 3);
INSERT INTO `pmo_ares` VALUES (697, 76, '荔湾区', 3);
INSERT INTO `pmo_ares` VALUES (698, 76, '越秀区', 3);
INSERT INTO `pmo_ares` VALUES (699, 76, '黄埔区', 3);
INSERT INTO `pmo_ares` VALUES (700, 76, '番禺区', 3);
INSERT INTO `pmo_ares` VALUES (701, 76, '花都区', 3);
INSERT INTO `pmo_ares` VALUES (702, 76, '增城区', 3);
INSERT INTO `pmo_ares` VALUES (703, 76, '从化区', 3);
INSERT INTO `pmo_ares` VALUES (704, 76, '市郊', 3);
INSERT INTO `pmo_ares` VALUES (705, 77, '福田区', 3);
INSERT INTO `pmo_ares` VALUES (706, 77, '罗湖区', 3);
INSERT INTO `pmo_ares` VALUES (707, 77, '南山区', 3);
INSERT INTO `pmo_ares` VALUES (708, 77, '宝安区', 3);
INSERT INTO `pmo_ares` VALUES (709, 77, '龙岗区', 3);
INSERT INTO `pmo_ares` VALUES (710, 77, '盐田区', 3);
INSERT INTO `pmo_ares` VALUES (711, 78, '湘桥区', 3);
INSERT INTO `pmo_ares` VALUES (712, 78, '潮安县', 3);
INSERT INTO `pmo_ares` VALUES (713, 78, '饶平县', 3);
INSERT INTO `pmo_ares` VALUES (714, 79, '南城区', 3);
INSERT INTO `pmo_ares` VALUES (715, 79, '东城区', 3);
INSERT INTO `pmo_ares` VALUES (716, 79, '万江区', 3);
INSERT INTO `pmo_ares` VALUES (717, 79, '莞城区', 3);
INSERT INTO `pmo_ares` VALUES (718, 79, '石龙镇', 3);
INSERT INTO `pmo_ares` VALUES (719, 79, '虎门镇', 3);
INSERT INTO `pmo_ares` VALUES (720, 79, '麻涌镇', 3);
INSERT INTO `pmo_ares` VALUES (721, 79, '道滘镇', 3);
INSERT INTO `pmo_ares` VALUES (722, 79, '石碣镇', 3);
INSERT INTO `pmo_ares` VALUES (723, 79, '沙田镇', 3);
INSERT INTO `pmo_ares` VALUES (724, 79, '望牛墩镇', 3);
INSERT INTO `pmo_ares` VALUES (725, 79, '洪梅镇', 3);
INSERT INTO `pmo_ares` VALUES (726, 79, '茶山镇', 3);
INSERT INTO `pmo_ares` VALUES (727, 79, '寮步镇', 3);
INSERT INTO `pmo_ares` VALUES (728, 79, '大岭山镇', 3);
INSERT INTO `pmo_ares` VALUES (729, 79, '大朗镇', 3);
INSERT INTO `pmo_ares` VALUES (730, 79, '黄江镇', 3);
INSERT INTO `pmo_ares` VALUES (731, 79, '樟木头', 3);
INSERT INTO `pmo_ares` VALUES (732, 79, '凤岗镇', 3);
INSERT INTO `pmo_ares` VALUES (733, 79, '塘厦镇', 3);
INSERT INTO `pmo_ares` VALUES (734, 79, '谢岗镇', 3);
INSERT INTO `pmo_ares` VALUES (735, 79, '厚街镇', 3);
INSERT INTO `pmo_ares` VALUES (736, 79, '清溪镇', 3);
INSERT INTO `pmo_ares` VALUES (737, 79, '常平镇', 3);
INSERT INTO `pmo_ares` VALUES (738, 79, '桥头镇', 3);
INSERT INTO `pmo_ares` VALUES (739, 79, '横沥镇', 3);
INSERT INTO `pmo_ares` VALUES (740, 79, '东坑镇', 3);
INSERT INTO `pmo_ares` VALUES (741, 79, '企石镇', 3);
INSERT INTO `pmo_ares` VALUES (742, 79, '石排镇', 3);
INSERT INTO `pmo_ares` VALUES (743, 79, '长安镇', 3);
INSERT INTO `pmo_ares` VALUES (744, 79, '中堂镇', 3);
INSERT INTO `pmo_ares` VALUES (745, 79, '高埗镇', 3);
INSERT INTO `pmo_ares` VALUES (746, 80, '禅城区', 3);
INSERT INTO `pmo_ares` VALUES (747, 80, '南海区', 3);
INSERT INTO `pmo_ares` VALUES (748, 80, '顺德区', 3);
INSERT INTO `pmo_ares` VALUES (749, 80, '三水区', 3);
INSERT INTO `pmo_ares` VALUES (750, 80, '高明区', 3);
INSERT INTO `pmo_ares` VALUES (751, 81, '东源县', 3);
INSERT INTO `pmo_ares` VALUES (752, 81, '和平县', 3);
INSERT INTO `pmo_ares` VALUES (753, 81, '源城区', 3);
INSERT INTO `pmo_ares` VALUES (754, 81, '连平县', 3);
INSERT INTO `pmo_ares` VALUES (755, 81, '龙川县', 3);
INSERT INTO `pmo_ares` VALUES (756, 81, '紫金县', 3);
INSERT INTO `pmo_ares` VALUES (757, 82, '惠阳区', 3);
INSERT INTO `pmo_ares` VALUES (758, 82, '惠城区', 3);
INSERT INTO `pmo_ares` VALUES (759, 82, '大亚湾', 3);
INSERT INTO `pmo_ares` VALUES (760, 82, '博罗县', 3);
INSERT INTO `pmo_ares` VALUES (761, 82, '惠东县', 3);
INSERT INTO `pmo_ares` VALUES (762, 82, '龙门县', 3);
INSERT INTO `pmo_ares` VALUES (763, 83, '江海区', 3);
INSERT INTO `pmo_ares` VALUES (764, 83, '蓬江区', 3);
INSERT INTO `pmo_ares` VALUES (765, 83, '新会区', 3);
INSERT INTO `pmo_ares` VALUES (766, 83, '台山市', 3);
INSERT INTO `pmo_ares` VALUES (767, 83, '开平市', 3);
INSERT INTO `pmo_ares` VALUES (768, 83, '鹤山市', 3);
INSERT INTO `pmo_ares` VALUES (769, 83, '恩平市', 3);
INSERT INTO `pmo_ares` VALUES (770, 84, '榕城区', 3);
INSERT INTO `pmo_ares` VALUES (771, 84, '普宁市', 3);
INSERT INTO `pmo_ares` VALUES (772, 84, '揭东县', 3);
INSERT INTO `pmo_ares` VALUES (773, 84, '揭西县', 3);
INSERT INTO `pmo_ares` VALUES (774, 84, '惠来县', 3);
INSERT INTO `pmo_ares` VALUES (775, 85, '茂南区', 3);
INSERT INTO `pmo_ares` VALUES (776, 85, '茂港区', 3);
INSERT INTO `pmo_ares` VALUES (777, 85, '高州市', 3);
INSERT INTO `pmo_ares` VALUES (778, 85, '化州市', 3);
INSERT INTO `pmo_ares` VALUES (779, 85, '信宜市', 3);
INSERT INTO `pmo_ares` VALUES (780, 85, '电白县', 3);
INSERT INTO `pmo_ares` VALUES (781, 86, '梅县', 3);
INSERT INTO `pmo_ares` VALUES (782, 86, '梅江区', 3);
INSERT INTO `pmo_ares` VALUES (783, 86, '兴宁市', 3);
INSERT INTO `pmo_ares` VALUES (784, 86, '大埔县', 3);
INSERT INTO `pmo_ares` VALUES (785, 86, '丰顺县', 3);
INSERT INTO `pmo_ares` VALUES (786, 86, '五华县', 3);
INSERT INTO `pmo_ares` VALUES (787, 86, '平远县', 3);
INSERT INTO `pmo_ares` VALUES (788, 86, '蕉岭县', 3);
INSERT INTO `pmo_ares` VALUES (789, 87, '清城区', 3);
INSERT INTO `pmo_ares` VALUES (790, 87, '英德市', 3);
INSERT INTO `pmo_ares` VALUES (791, 87, '连州市', 3);
INSERT INTO `pmo_ares` VALUES (792, 87, '佛冈县', 3);
INSERT INTO `pmo_ares` VALUES (793, 87, '阳山县', 3);
INSERT INTO `pmo_ares` VALUES (794, 87, '清新县', 3);
INSERT INTO `pmo_ares` VALUES (795, 87, '连山', 3);
INSERT INTO `pmo_ares` VALUES (796, 87, '连南', 3);
INSERT INTO `pmo_ares` VALUES (797, 88, '南澳县', 3);
INSERT INTO `pmo_ares` VALUES (798, 88, '潮阳区', 3);
INSERT INTO `pmo_ares` VALUES (799, 88, '澄海区', 3);
INSERT INTO `pmo_ares` VALUES (800, 88, '龙湖区', 3);
INSERT INTO `pmo_ares` VALUES (801, 88, '金平区', 3);
INSERT INTO `pmo_ares` VALUES (802, 88, '濠江区', 3);
INSERT INTO `pmo_ares` VALUES (803, 88, '潮南区', 3);
INSERT INTO `pmo_ares` VALUES (804, 89, '城区', 3);
INSERT INTO `pmo_ares` VALUES (805, 89, '陆丰市', 3);
INSERT INTO `pmo_ares` VALUES (806, 89, '海丰县', 3);
INSERT INTO `pmo_ares` VALUES (807, 89, '陆河县', 3);
INSERT INTO `pmo_ares` VALUES (808, 90, '曲江县', 3);
INSERT INTO `pmo_ares` VALUES (809, 90, '浈江区', 3);
INSERT INTO `pmo_ares` VALUES (810, 90, '武江区', 3);
INSERT INTO `pmo_ares` VALUES (811, 90, '曲江区', 3);
INSERT INTO `pmo_ares` VALUES (812, 90, '乐昌市', 3);
INSERT INTO `pmo_ares` VALUES (813, 90, '南雄市', 3);
INSERT INTO `pmo_ares` VALUES (814, 90, '始兴县', 3);
INSERT INTO `pmo_ares` VALUES (815, 90, '仁化县', 3);
INSERT INTO `pmo_ares` VALUES (816, 90, '翁源县', 3);
INSERT INTO `pmo_ares` VALUES (817, 90, '新丰县', 3);
INSERT INTO `pmo_ares` VALUES (818, 90, '乳源', 3);
INSERT INTO `pmo_ares` VALUES (819, 91, '江城区', 3);
INSERT INTO `pmo_ares` VALUES (820, 91, '阳春市', 3);
INSERT INTO `pmo_ares` VALUES (821, 91, '阳西县', 3);
INSERT INTO `pmo_ares` VALUES (822, 91, '阳东县', 3);
INSERT INTO `pmo_ares` VALUES (823, 92, '云城区', 3);
INSERT INTO `pmo_ares` VALUES (824, 92, '罗定市', 3);
INSERT INTO `pmo_ares` VALUES (825, 92, '新兴县', 3);
INSERT INTO `pmo_ares` VALUES (826, 92, '郁南县', 3);
INSERT INTO `pmo_ares` VALUES (827, 92, '云安县', 3);
INSERT INTO `pmo_ares` VALUES (828, 93, '赤坎区', 3);
INSERT INTO `pmo_ares` VALUES (829, 93, '霞山区', 3);
INSERT INTO `pmo_ares` VALUES (830, 93, '坡头区', 3);
INSERT INTO `pmo_ares` VALUES (831, 93, '麻章区', 3);
INSERT INTO `pmo_ares` VALUES (832, 93, '廉江市', 3);
INSERT INTO `pmo_ares` VALUES (833, 93, '雷州市', 3);
INSERT INTO `pmo_ares` VALUES (834, 93, '吴川市', 3);
INSERT INTO `pmo_ares` VALUES (835, 93, '遂溪县', 3);
INSERT INTO `pmo_ares` VALUES (836, 93, '徐闻县', 3);
INSERT INTO `pmo_ares` VALUES (837, 94, '肇庆市', 3);
INSERT INTO `pmo_ares` VALUES (838, 94, '高要市', 3);
INSERT INTO `pmo_ares` VALUES (839, 94, '四会市', 3);
INSERT INTO `pmo_ares` VALUES (840, 94, '广宁县', 3);
INSERT INTO `pmo_ares` VALUES (841, 94, '怀集县', 3);
INSERT INTO `pmo_ares` VALUES (842, 94, '封开县', 3);
INSERT INTO `pmo_ares` VALUES (843, 94, '德庆县', 3);
INSERT INTO `pmo_ares` VALUES (844, 95, '石岐街道', 3);
INSERT INTO `pmo_ares` VALUES (845, 95, '东区街道', 3);
INSERT INTO `pmo_ares` VALUES (846, 95, '西区街道', 3);
INSERT INTO `pmo_ares` VALUES (847, 95, '环城街道', 3);
INSERT INTO `pmo_ares` VALUES (848, 95, '中山港街道', 3);
INSERT INTO `pmo_ares` VALUES (849, 95, '五桂山街道', 3);
INSERT INTO `pmo_ares` VALUES (850, 96, '香洲区', 3);
INSERT INTO `pmo_ares` VALUES (851, 96, '斗门区', 3);
INSERT INTO `pmo_ares` VALUES (852, 96, '金湾区', 3);
INSERT INTO `pmo_ares` VALUES (853, 97, '邕宁区', 3);
INSERT INTO `pmo_ares` VALUES (854, 97, '青秀区', 3);
INSERT INTO `pmo_ares` VALUES (855, 97, '兴宁区', 3);
INSERT INTO `pmo_ares` VALUES (856, 97, '良庆区', 3);
INSERT INTO `pmo_ares` VALUES (857, 97, '西乡塘区', 3);
INSERT INTO `pmo_ares` VALUES (858, 97, '江南区', 3);
INSERT INTO `pmo_ares` VALUES (859, 97, '武鸣县', 3);
INSERT INTO `pmo_ares` VALUES (860, 97, '隆安县', 3);
INSERT INTO `pmo_ares` VALUES (861, 97, '马山县', 3);
INSERT INTO `pmo_ares` VALUES (862, 97, '上林县', 3);
INSERT INTO `pmo_ares` VALUES (863, 97, '宾阳县', 3);
INSERT INTO `pmo_ares` VALUES (864, 97, '横县', 3);
INSERT INTO `pmo_ares` VALUES (865, 98, '秀峰区', 3);
INSERT INTO `pmo_ares` VALUES (866, 98, '叠彩区', 3);
INSERT INTO `pmo_ares` VALUES (867, 98, '象山区', 3);
INSERT INTO `pmo_ares` VALUES (868, 98, '七星区', 3);
INSERT INTO `pmo_ares` VALUES (869, 98, '雁山区', 3);
INSERT INTO `pmo_ares` VALUES (870, 98, '阳朔县', 3);
INSERT INTO `pmo_ares` VALUES (871, 98, '临桂县', 3);
INSERT INTO `pmo_ares` VALUES (872, 98, '灵川县', 3);
INSERT INTO `pmo_ares` VALUES (873, 98, '全州县', 3);
INSERT INTO `pmo_ares` VALUES (874, 98, '平乐县', 3);
INSERT INTO `pmo_ares` VALUES (875, 98, '兴安县', 3);
INSERT INTO `pmo_ares` VALUES (876, 98, '灌阳县', 3);
INSERT INTO `pmo_ares` VALUES (877, 98, '荔浦县', 3);
INSERT INTO `pmo_ares` VALUES (878, 98, '资源县', 3);
INSERT INTO `pmo_ares` VALUES (879, 98, '永福县', 3);
INSERT INTO `pmo_ares` VALUES (880, 98, '龙胜', 3);
INSERT INTO `pmo_ares` VALUES (881, 98, '恭城', 3);
INSERT INTO `pmo_ares` VALUES (882, 99, '右江区', 3);
INSERT INTO `pmo_ares` VALUES (883, 99, '凌云县', 3);
INSERT INTO `pmo_ares` VALUES (884, 99, '平果县', 3);
INSERT INTO `pmo_ares` VALUES (885, 99, '西林县', 3);
INSERT INTO `pmo_ares` VALUES (886, 99, '乐业县', 3);
INSERT INTO `pmo_ares` VALUES (887, 99, '德保县', 3);
INSERT INTO `pmo_ares` VALUES (888, 99, '田林县', 3);
INSERT INTO `pmo_ares` VALUES (889, 99, '田阳县', 3);
INSERT INTO `pmo_ares` VALUES (890, 99, '靖西县', 3);
INSERT INTO `pmo_ares` VALUES (891, 99, '田东县', 3);
INSERT INTO `pmo_ares` VALUES (892, 99, '那坡县', 3);
INSERT INTO `pmo_ares` VALUES (893, 99, '隆林', 3);
INSERT INTO `pmo_ares` VALUES (894, 100, '海城区', 3);
INSERT INTO `pmo_ares` VALUES (895, 100, '银海区', 3);
INSERT INTO `pmo_ares` VALUES (896, 100, '铁山港区', 3);
INSERT INTO `pmo_ares` VALUES (897, 100, '合浦县', 3);
INSERT INTO `pmo_ares` VALUES (898, 101, '江州区', 3);
INSERT INTO `pmo_ares` VALUES (899, 101, '凭祥市', 3);
INSERT INTO `pmo_ares` VALUES (900, 101, '宁明县', 3);
INSERT INTO `pmo_ares` VALUES (901, 101, '扶绥县', 3);
INSERT INTO `pmo_ares` VALUES (902, 101, '龙州县', 3);
INSERT INTO `pmo_ares` VALUES (903, 101, '大新县', 3);
INSERT INTO `pmo_ares` VALUES (904, 101, '天等县', 3);
INSERT INTO `pmo_ares` VALUES (905, 102, '港口区', 3);
INSERT INTO `pmo_ares` VALUES (906, 102, '防城区', 3);
INSERT INTO `pmo_ares` VALUES (907, 102, '东兴市', 3);
INSERT INTO `pmo_ares` VALUES (908, 102, '上思县', 3);
INSERT INTO `pmo_ares` VALUES (909, 103, '港北区', 3);
INSERT INTO `pmo_ares` VALUES (910, 103, '港南区', 3);
INSERT INTO `pmo_ares` VALUES (911, 103, '覃塘区', 3);
INSERT INTO `pmo_ares` VALUES (912, 103, '桂平市', 3);
INSERT INTO `pmo_ares` VALUES (913, 103, '平南县', 3);
INSERT INTO `pmo_ares` VALUES (914, 104, '金城江区', 3);
INSERT INTO `pmo_ares` VALUES (915, 104, '宜州市', 3);
INSERT INTO `pmo_ares` VALUES (916, 104, '天峨县', 3);
INSERT INTO `pmo_ares` VALUES (917, 104, '凤山县', 3);
INSERT INTO `pmo_ares` VALUES (918, 104, '南丹县', 3);
INSERT INTO `pmo_ares` VALUES (919, 104, '东兰县', 3);
INSERT INTO `pmo_ares` VALUES (920, 104, '都安', 3);
INSERT INTO `pmo_ares` VALUES (921, 104, '罗城', 3);
INSERT INTO `pmo_ares` VALUES (922, 104, '巴马', 3);
INSERT INTO `pmo_ares` VALUES (923, 104, '环江', 3);
INSERT INTO `pmo_ares` VALUES (924, 104, '大化', 3);
INSERT INTO `pmo_ares` VALUES (925, 105, '八步区', 3);
INSERT INTO `pmo_ares` VALUES (926, 105, '钟山县', 3);
INSERT INTO `pmo_ares` VALUES (927, 105, '昭平县', 3);
INSERT INTO `pmo_ares` VALUES (928, 105, '富川', 3);
INSERT INTO `pmo_ares` VALUES (929, 106, '兴宾区', 3);
INSERT INTO `pmo_ares` VALUES (930, 106, '合山市', 3);
INSERT INTO `pmo_ares` VALUES (931, 106, '象州县', 3);
INSERT INTO `pmo_ares` VALUES (932, 106, '武宣县', 3);
INSERT INTO `pmo_ares` VALUES (933, 106, '忻城县', 3);
INSERT INTO `pmo_ares` VALUES (934, 106, '金秀', 3);
INSERT INTO `pmo_ares` VALUES (935, 107, '城中区', 3);
INSERT INTO `pmo_ares` VALUES (936, 107, '鱼峰区', 3);
INSERT INTO `pmo_ares` VALUES (937, 107, '柳北区', 3);
INSERT INTO `pmo_ares` VALUES (938, 107, '柳南区', 3);
INSERT INTO `pmo_ares` VALUES (939, 107, '柳江县', 3);
INSERT INTO `pmo_ares` VALUES (940, 107, '柳城县', 3);
INSERT INTO `pmo_ares` VALUES (941, 107, '鹿寨县', 3);
INSERT INTO `pmo_ares` VALUES (942, 107, '融安县', 3);
INSERT INTO `pmo_ares` VALUES (943, 107, '融水', 3);
INSERT INTO `pmo_ares` VALUES (944, 107, '三江', 3);
INSERT INTO `pmo_ares` VALUES (945, 108, '钦南区', 3);
INSERT INTO `pmo_ares` VALUES (946, 108, '钦北区', 3);
INSERT INTO `pmo_ares` VALUES (947, 108, '灵山县', 3);
INSERT INTO `pmo_ares` VALUES (948, 108, '浦北县', 3);
INSERT INTO `pmo_ares` VALUES (949, 109, '万秀区', 3);
INSERT INTO `pmo_ares` VALUES (950, 109, '蝶山区', 3);
INSERT INTO `pmo_ares` VALUES (951, 109, '长洲区', 3);
INSERT INTO `pmo_ares` VALUES (952, 109, '岑溪市', 3);
INSERT INTO `pmo_ares` VALUES (953, 109, '苍梧县', 3);
INSERT INTO `pmo_ares` VALUES (954, 109, '藤县', 3);
INSERT INTO `pmo_ares` VALUES (955, 109, '蒙山县', 3);
INSERT INTO `pmo_ares` VALUES (956, 110, '玉州区', 3);
INSERT INTO `pmo_ares` VALUES (957, 110, '北流市', 3);
INSERT INTO `pmo_ares` VALUES (958, 110, '容县', 3);
INSERT INTO `pmo_ares` VALUES (959, 110, '陆川县', 3);
INSERT INTO `pmo_ares` VALUES (960, 110, '博白县', 3);
INSERT INTO `pmo_ares` VALUES (961, 110, '兴业县', 3);
INSERT INTO `pmo_ares` VALUES (962, 111, '南明区', 3);
INSERT INTO `pmo_ares` VALUES (963, 111, '云岩区', 3);
INSERT INTO `pmo_ares` VALUES (964, 111, '花溪区', 3);
INSERT INTO `pmo_ares` VALUES (965, 111, '乌当区', 3);
INSERT INTO `pmo_ares` VALUES (966, 111, '白云区', 3);
INSERT INTO `pmo_ares` VALUES (967, 111, '小河区', 3);
INSERT INTO `pmo_ares` VALUES (968, 111, '金阳新区', 3);
INSERT INTO `pmo_ares` VALUES (969, 111, '新天园区', 3);
INSERT INTO `pmo_ares` VALUES (970, 111, '清镇市', 3);
INSERT INTO `pmo_ares` VALUES (971, 111, '开阳县', 3);
INSERT INTO `pmo_ares` VALUES (972, 111, '修文县', 3);
INSERT INTO `pmo_ares` VALUES (973, 111, '息烽县', 3);
INSERT INTO `pmo_ares` VALUES (974, 112, '西秀区', 3);
INSERT INTO `pmo_ares` VALUES (975, 112, '关岭', 3);
INSERT INTO `pmo_ares` VALUES (976, 112, '镇宁', 3);
INSERT INTO `pmo_ares` VALUES (977, 112, '紫云', 3);
INSERT INTO `pmo_ares` VALUES (978, 112, '平坝县', 3);
INSERT INTO `pmo_ares` VALUES (979, 112, '普定县', 3);
INSERT INTO `pmo_ares` VALUES (980, 113, '毕节市', 3);
INSERT INTO `pmo_ares` VALUES (981, 113, '大方县', 3);
INSERT INTO `pmo_ares` VALUES (982, 113, '黔西县', 3);
INSERT INTO `pmo_ares` VALUES (983, 113, '金沙县', 3);
INSERT INTO `pmo_ares` VALUES (984, 113, '织金县', 3);
INSERT INTO `pmo_ares` VALUES (985, 113, '纳雍县', 3);
INSERT INTO `pmo_ares` VALUES (986, 113, '赫章县', 3);
INSERT INTO `pmo_ares` VALUES (987, 113, '威宁', 3);
INSERT INTO `pmo_ares` VALUES (988, 114, '钟山区', 3);
INSERT INTO `pmo_ares` VALUES (989, 114, '六枝特区', 3);
INSERT INTO `pmo_ares` VALUES (990, 114, '水城县', 3);
INSERT INTO `pmo_ares` VALUES (991, 114, '盘县', 3);
INSERT INTO `pmo_ares` VALUES (992, 115, '凯里市', 3);
INSERT INTO `pmo_ares` VALUES (993, 115, '黄平县', 3);
INSERT INTO `pmo_ares` VALUES (994, 115, '施秉县', 3);
INSERT INTO `pmo_ares` VALUES (995, 115, '三穗县', 3);
INSERT INTO `pmo_ares` VALUES (996, 115, '镇远县', 3);
INSERT INTO `pmo_ares` VALUES (997, 115, '岑巩县', 3);
INSERT INTO `pmo_ares` VALUES (998, 115, '天柱县', 3);
INSERT INTO `pmo_ares` VALUES (999, 115, '锦屏县', 3);
INSERT INTO `pmo_ares` VALUES (1000, 115, '剑河县', 3);
INSERT INTO `pmo_ares` VALUES (1001, 115, '台江县', 3);
INSERT INTO `pmo_ares` VALUES (1002, 115, '黎平县', 3);
INSERT INTO `pmo_ares` VALUES (1003, 115, '榕江县', 3);
INSERT INTO `pmo_ares` VALUES (1004, 115, '从江县', 3);
INSERT INTO `pmo_ares` VALUES (1005, 115, '雷山县', 3);
INSERT INTO `pmo_ares` VALUES (1006, 115, '麻江县', 3);
INSERT INTO `pmo_ares` VALUES (1007, 115, '丹寨县', 3);
INSERT INTO `pmo_ares` VALUES (1008, 116, '都匀市', 3);
INSERT INTO `pmo_ares` VALUES (1009, 116, '福泉市', 3);
INSERT INTO `pmo_ares` VALUES (1010, 116, '荔波县', 3);
INSERT INTO `pmo_ares` VALUES (1011, 116, '贵定县', 3);
INSERT INTO `pmo_ares` VALUES (1012, 116, '瓮安县', 3);
INSERT INTO `pmo_ares` VALUES (1013, 116, '独山县', 3);
INSERT INTO `pmo_ares` VALUES (1014, 116, '平塘县', 3);
INSERT INTO `pmo_ares` VALUES (1015, 116, '罗甸县', 3);
INSERT INTO `pmo_ares` VALUES (1016, 116, '长顺县', 3);
INSERT INTO `pmo_ares` VALUES (1017, 116, '龙里县', 3);
INSERT INTO `pmo_ares` VALUES (1018, 116, '惠水县', 3);
INSERT INTO `pmo_ares` VALUES (1019, 116, '三都', 3);
INSERT INTO `pmo_ares` VALUES (1020, 117, '兴义市', 3);
INSERT INTO `pmo_ares` VALUES (1021, 117, '兴仁县', 3);
INSERT INTO `pmo_ares` VALUES (1022, 117, '普安县', 3);
INSERT INTO `pmo_ares` VALUES (1023, 117, '晴隆县', 3);
INSERT INTO `pmo_ares` VALUES (1024, 117, '贞丰县', 3);
INSERT INTO `pmo_ares` VALUES (1025, 117, '望谟县', 3);
INSERT INTO `pmo_ares` VALUES (1026, 117, '册亨县', 3);
INSERT INTO `pmo_ares` VALUES (1027, 117, '安龙县', 3);
INSERT INTO `pmo_ares` VALUES (1028, 118, '铜仁市', 3);
INSERT INTO `pmo_ares` VALUES (1029, 118, '江口县', 3);
INSERT INTO `pmo_ares` VALUES (1030, 118, '石阡县', 3);
INSERT INTO `pmo_ares` VALUES (1031, 118, '思南县', 3);
INSERT INTO `pmo_ares` VALUES (1032, 118, '德江县', 3);
INSERT INTO `pmo_ares` VALUES (1033, 118, '玉屏', 3);
INSERT INTO `pmo_ares` VALUES (1034, 118, '印江', 3);
INSERT INTO `pmo_ares` VALUES (1035, 118, '沿河', 3);
INSERT INTO `pmo_ares` VALUES (1036, 118, '松桃', 3);
INSERT INTO `pmo_ares` VALUES (1037, 118, '万山特区', 3);
INSERT INTO `pmo_ares` VALUES (1038, 119, '红花岗区', 3);
INSERT INTO `pmo_ares` VALUES (1039, 119, '务川县', 3);
INSERT INTO `pmo_ares` VALUES (1040, 119, '道真县', 3);
INSERT INTO `pmo_ares` VALUES (1041, 119, '汇川区', 3);
INSERT INTO `pmo_ares` VALUES (1042, 119, '赤水市', 3);
INSERT INTO `pmo_ares` VALUES (1043, 119, '仁怀市', 3);
INSERT INTO `pmo_ares` VALUES (1044, 119, '遵义县', 3);
INSERT INTO `pmo_ares` VALUES (1045, 119, '桐梓县', 3);
INSERT INTO `pmo_ares` VALUES (1046, 119, '绥阳县', 3);
INSERT INTO `pmo_ares` VALUES (1047, 119, '正安县', 3);
INSERT INTO `pmo_ares` VALUES (1048, 119, '凤冈县', 3);
INSERT INTO `pmo_ares` VALUES (1049, 119, '湄潭县', 3);
INSERT INTO `pmo_ares` VALUES (1050, 119, '余庆县', 3);
INSERT INTO `pmo_ares` VALUES (1051, 119, '习水县', 3);
INSERT INTO `pmo_ares` VALUES (1052, 119, '道真', 3);
INSERT INTO `pmo_ares` VALUES (1053, 119, '务川', 3);
INSERT INTO `pmo_ares` VALUES (1054, 120, '秀英区', 3);
INSERT INTO `pmo_ares` VALUES (1055, 120, '龙华区', 3);
INSERT INTO `pmo_ares` VALUES (1056, 120, '琼山区', 3);
INSERT INTO `pmo_ares` VALUES (1057, 120, '美兰区', 3);
INSERT INTO `pmo_ares` VALUES (1058, 137, '市区', 3);
INSERT INTO `pmo_ares` VALUES (1059, 137, '洋浦开发区', 3);
INSERT INTO `pmo_ares` VALUES (1060, 137, '那大镇', 3);
INSERT INTO `pmo_ares` VALUES (1061, 137, '王五镇', 3);
INSERT INTO `pmo_ares` VALUES (1062, 137, '雅星镇', 3);
INSERT INTO `pmo_ares` VALUES (1063, 137, '大成镇', 3);
INSERT INTO `pmo_ares` VALUES (1064, 137, '中和镇', 3);
INSERT INTO `pmo_ares` VALUES (1065, 137, '峨蔓镇', 3);
INSERT INTO `pmo_ares` VALUES (1066, 137, '南丰镇', 3);
INSERT INTO `pmo_ares` VALUES (1067, 137, '白马井镇', 3);
INSERT INTO `pmo_ares` VALUES (1068, 137, '兰洋镇', 3);
INSERT INTO `pmo_ares` VALUES (1069, 137, '和庆镇', 3);
INSERT INTO `pmo_ares` VALUES (1070, 137, '海头镇', 3);
INSERT INTO `pmo_ares` VALUES (1071, 137, '排浦镇', 3);
INSERT INTO `pmo_ares` VALUES (1072, 137, '东成镇', 3);
INSERT INTO `pmo_ares` VALUES (1073, 137, '光村镇', 3);
INSERT INTO `pmo_ares` VALUES (1074, 137, '木棠镇', 3);
INSERT INTO `pmo_ares` VALUES (1075, 137, '新州镇', 3);
INSERT INTO `pmo_ares` VALUES (1076, 137, '三都镇', 3);
INSERT INTO `pmo_ares` VALUES (1077, 137, '其他', 3);
INSERT INTO `pmo_ares` VALUES (1078, 138, '长安区', 3);
INSERT INTO `pmo_ares` VALUES (1079, 138, '桥东区', 3);
INSERT INTO `pmo_ares` VALUES (1080, 138, '桥西区', 3);
INSERT INTO `pmo_ares` VALUES (1081, 138, '新华区', 3);
INSERT INTO `pmo_ares` VALUES (1082, 138, '裕华区', 3);
INSERT INTO `pmo_ares` VALUES (1083, 138, '井陉矿区', 3);
INSERT INTO `pmo_ares` VALUES (1084, 138, '高新区', 3);
INSERT INTO `pmo_ares` VALUES (1085, 138, '辛集市', 3);
INSERT INTO `pmo_ares` VALUES (1086, 138, '藁城市', 3);
INSERT INTO `pmo_ares` VALUES (1087, 138, '晋州市', 3);
INSERT INTO `pmo_ares` VALUES (1088, 138, '新乐市', 3);
INSERT INTO `pmo_ares` VALUES (1089, 138, '鹿泉市', 3);
INSERT INTO `pmo_ares` VALUES (1090, 138, '井陉县', 3);
INSERT INTO `pmo_ares` VALUES (1091, 138, '正定县', 3);
INSERT INTO `pmo_ares` VALUES (1092, 138, '栾城县', 3);
INSERT INTO `pmo_ares` VALUES (1093, 138, '行唐县', 3);
INSERT INTO `pmo_ares` VALUES (1094, 138, '灵寿县', 3);
INSERT INTO `pmo_ares` VALUES (1095, 138, '高邑县', 3);
INSERT INTO `pmo_ares` VALUES (1096, 138, '深泽县', 3);
INSERT INTO `pmo_ares` VALUES (1097, 138, '赞皇县', 3);
INSERT INTO `pmo_ares` VALUES (1098, 138, '无极县', 3);
INSERT INTO `pmo_ares` VALUES (1099, 138, '平山县', 3);
INSERT INTO `pmo_ares` VALUES (1100, 138, '元氏县', 3);
INSERT INTO `pmo_ares` VALUES (1101, 138, '赵县', 3);
INSERT INTO `pmo_ares` VALUES (1102, 139, '新市区', 3);
INSERT INTO `pmo_ares` VALUES (1103, 139, '南市区', 3);
INSERT INTO `pmo_ares` VALUES (1104, 139, '北市区', 3);
INSERT INTO `pmo_ares` VALUES (1105, 139, '涿州市', 3);
INSERT INTO `pmo_ares` VALUES (1106, 139, '定州市', 3);
INSERT INTO `pmo_ares` VALUES (1107, 139, '安国市', 3);
INSERT INTO `pmo_ares` VALUES (1108, 139, '高碑店市', 3);
INSERT INTO `pmo_ares` VALUES (1109, 139, '满城县', 3);
INSERT INTO `pmo_ares` VALUES (1110, 139, '清苑县', 3);
INSERT INTO `pmo_ares` VALUES (1111, 139, '涞水县', 3);
INSERT INTO `pmo_ares` VALUES (1112, 139, '阜平县', 3);
INSERT INTO `pmo_ares` VALUES (1113, 139, '徐水县', 3);
INSERT INTO `pmo_ares` VALUES (1114, 139, '定兴县', 3);
INSERT INTO `pmo_ares` VALUES (1115, 139, '唐县', 3);
INSERT INTO `pmo_ares` VALUES (1116, 139, '高阳县', 3);
INSERT INTO `pmo_ares` VALUES (1117, 139, '容城县', 3);
INSERT INTO `pmo_ares` VALUES (1118, 139, '涞源县', 3);
INSERT INTO `pmo_ares` VALUES (1119, 139, '望都县', 3);
INSERT INTO `pmo_ares` VALUES (1120, 139, '安新县', 3);
INSERT INTO `pmo_ares` VALUES (1121, 139, '易县', 3);
INSERT INTO `pmo_ares` VALUES (1122, 139, '曲阳县', 3);
INSERT INTO `pmo_ares` VALUES (1123, 139, '蠡县', 3);
INSERT INTO `pmo_ares` VALUES (1124, 139, '顺平县', 3);
INSERT INTO `pmo_ares` VALUES (1125, 139, '博野县', 3);
INSERT INTO `pmo_ares` VALUES (1126, 139, '雄县', 3);
INSERT INTO `pmo_ares` VALUES (1127, 140, '运河区', 3);
INSERT INTO `pmo_ares` VALUES (1128, 140, '新华区', 3);
INSERT INTO `pmo_ares` VALUES (1129, 140, '泊头市', 3);
INSERT INTO `pmo_ares` VALUES (1130, 140, '任丘市', 3);
INSERT INTO `pmo_ares` VALUES (1131, 140, '黄骅市', 3);
INSERT INTO `pmo_ares` VALUES (1132, 140, '河间市', 3);
INSERT INTO `pmo_ares` VALUES (1133, 140, '沧县', 3);
INSERT INTO `pmo_ares` VALUES (1134, 140, '青县', 3);
INSERT INTO `pmo_ares` VALUES (1135, 140, '东光县', 3);
INSERT INTO `pmo_ares` VALUES (1136, 140, '海兴县', 3);
INSERT INTO `pmo_ares` VALUES (1137, 140, '盐山县', 3);
INSERT INTO `pmo_ares` VALUES (1138, 140, '肃宁县', 3);
INSERT INTO `pmo_ares` VALUES (1139, 140, '南皮县', 3);
INSERT INTO `pmo_ares` VALUES (1140, 140, '吴桥县', 3);
INSERT INTO `pmo_ares` VALUES (1141, 140, '献县', 3);
INSERT INTO `pmo_ares` VALUES (1142, 140, '孟村', 3);
INSERT INTO `pmo_ares` VALUES (1143, 141, '双桥区', 3);
INSERT INTO `pmo_ares` VALUES (1144, 141, '双滦区', 3);
INSERT INTO `pmo_ares` VALUES (1145, 141, '鹰手营子矿区', 3);
INSERT INTO `pmo_ares` VALUES (1146, 141, '承德县', 3);
INSERT INTO `pmo_ares` VALUES (1147, 141, '兴隆县', 3);
INSERT INTO `pmo_ares` VALUES (1148, 141, '平泉县', 3);
INSERT INTO `pmo_ares` VALUES (1149, 141, '滦平县', 3);
INSERT INTO `pmo_ares` VALUES (1150, 141, '隆化县', 3);
INSERT INTO `pmo_ares` VALUES (1151, 141, '丰宁', 3);
INSERT INTO `pmo_ares` VALUES (1152, 141, '宽城', 3);
INSERT INTO `pmo_ares` VALUES (1153, 141, '围场', 3);
INSERT INTO `pmo_ares` VALUES (1154, 142, '从台区', 3);
INSERT INTO `pmo_ares` VALUES (1155, 142, '复兴区', 3);
INSERT INTO `pmo_ares` VALUES (1156, 142, '邯山区', 3);
INSERT INTO `pmo_ares` VALUES (1157, 142, '峰峰矿区', 3);
INSERT INTO `pmo_ares` VALUES (1158, 142, '武安市', 3);
INSERT INTO `pmo_ares` VALUES (1159, 142, '邯郸县', 3);
INSERT INTO `pmo_ares` VALUES (1160, 142, '临漳县', 3);
INSERT INTO `pmo_ares` VALUES (1161, 142, '成安县', 3);
INSERT INTO `pmo_ares` VALUES (1162, 142, '大名县', 3);
INSERT INTO `pmo_ares` VALUES (1163, 142, '涉县', 3);
INSERT INTO `pmo_ares` VALUES (1164, 142, '磁县', 3);
INSERT INTO `pmo_ares` VALUES (1165, 142, '肥乡县', 3);
INSERT INTO `pmo_ares` VALUES (1166, 142, '永年县', 3);
INSERT INTO `pmo_ares` VALUES (1167, 142, '邱县', 3);
INSERT INTO `pmo_ares` VALUES (1168, 142, '鸡泽县', 3);
INSERT INTO `pmo_ares` VALUES (1169, 142, '广平县', 3);
INSERT INTO `pmo_ares` VALUES (1170, 142, '馆陶县', 3);
INSERT INTO `pmo_ares` VALUES (1171, 142, '魏县', 3);
INSERT INTO `pmo_ares` VALUES (1172, 142, '曲周县', 3);
INSERT INTO `pmo_ares` VALUES (1173, 143, '桃城区', 3);
INSERT INTO `pmo_ares` VALUES (1174, 143, '冀州市', 3);
INSERT INTO `pmo_ares` VALUES (1175, 143, '深州市', 3);
INSERT INTO `pmo_ares` VALUES (1176, 143, '枣强县', 3);
INSERT INTO `pmo_ares` VALUES (1177, 143, '武邑县', 3);
INSERT INTO `pmo_ares` VALUES (1178, 143, '武强县', 3);
INSERT INTO `pmo_ares` VALUES (1179, 143, '饶阳县', 3);
INSERT INTO `pmo_ares` VALUES (1180, 143, '安平县', 3);
INSERT INTO `pmo_ares` VALUES (1181, 143, '故城县', 3);
INSERT INTO `pmo_ares` VALUES (1182, 143, '景县', 3);
INSERT INTO `pmo_ares` VALUES (1183, 143, '阜城县', 3);
INSERT INTO `pmo_ares` VALUES (1184, 144, '安次区', 3);
INSERT INTO `pmo_ares` VALUES (1185, 144, '广阳区', 3);
INSERT INTO `pmo_ares` VALUES (1186, 144, '霸州市', 3);
INSERT INTO `pmo_ares` VALUES (1187, 144, '三河市', 3);
INSERT INTO `pmo_ares` VALUES (1188, 144, '固安县', 3);
INSERT INTO `pmo_ares` VALUES (1189, 144, '永清县', 3);
INSERT INTO `pmo_ares` VALUES (1190, 144, '香河县', 3);
INSERT INTO `pmo_ares` VALUES (1191, 144, '大城县', 3);
INSERT INTO `pmo_ares` VALUES (1192, 144, '文安县', 3);
INSERT INTO `pmo_ares` VALUES (1193, 144, '大厂', 3);
INSERT INTO `pmo_ares` VALUES (1194, 145, '海港区', 3);
INSERT INTO `pmo_ares` VALUES (1195, 145, '山海关区', 3);
INSERT INTO `pmo_ares` VALUES (1196, 145, '北戴河区', 3);
INSERT INTO `pmo_ares` VALUES (1197, 145, '昌黎县', 3);
INSERT INTO `pmo_ares` VALUES (1198, 145, '抚宁县', 3);
INSERT INTO `pmo_ares` VALUES (1199, 145, '卢龙县', 3);
INSERT INTO `pmo_ares` VALUES (1200, 145, '青龙', 3);
INSERT INTO `pmo_ares` VALUES (1201, 146, '路北区', 3);
INSERT INTO `pmo_ares` VALUES (1202, 146, '路南区', 3);
INSERT INTO `pmo_ares` VALUES (1203, 146, '古冶区', 3);
INSERT INTO `pmo_ares` VALUES (1204, 146, '开平区', 3);
INSERT INTO `pmo_ares` VALUES (1205, 146, '丰南区', 3);
INSERT INTO `pmo_ares` VALUES (1206, 146, '丰润区', 3);
INSERT INTO `pmo_ares` VALUES (1207, 146, '遵化市', 3);
INSERT INTO `pmo_ares` VALUES (1208, 146, '迁安市', 3);
INSERT INTO `pmo_ares` VALUES (1209, 146, '滦县', 3);
INSERT INTO `pmo_ares` VALUES (1210, 146, '滦南县', 3);
INSERT INTO `pmo_ares` VALUES (1211, 146, '乐亭县', 3);
INSERT INTO `pmo_ares` VALUES (1212, 146, '迁西县', 3);
INSERT INTO `pmo_ares` VALUES (1213, 146, '玉田县', 3);
INSERT INTO `pmo_ares` VALUES (1214, 146, '唐海县', 3);
INSERT INTO `pmo_ares` VALUES (1215, 147, '桥东区', 3);
INSERT INTO `pmo_ares` VALUES (1216, 147, '桥西区', 3);
INSERT INTO `pmo_ares` VALUES (1217, 147, '南宫市', 3);
INSERT INTO `pmo_ares` VALUES (1218, 147, '沙河市', 3);
INSERT INTO `pmo_ares` VALUES (1219, 147, '邢台县', 3);
INSERT INTO `pmo_ares` VALUES (1220, 147, '临城县', 3);
INSERT INTO `pmo_ares` VALUES (1221, 147, '内丘县', 3);
INSERT INTO `pmo_ares` VALUES (1222, 147, '柏乡县', 3);
INSERT INTO `pmo_ares` VALUES (1223, 147, '隆尧县', 3);
INSERT INTO `pmo_ares` VALUES (1224, 147, '任县', 3);
INSERT INTO `pmo_ares` VALUES (1225, 147, '南和县', 3);
INSERT INTO `pmo_ares` VALUES (1226, 147, '宁晋县', 3);
INSERT INTO `pmo_ares` VALUES (1227, 147, '巨鹿县', 3);
INSERT INTO `pmo_ares` VALUES (1228, 147, '新河县', 3);
INSERT INTO `pmo_ares` VALUES (1229, 147, '广宗县', 3);
INSERT INTO `pmo_ares` VALUES (1230, 147, '平乡县', 3);
INSERT INTO `pmo_ares` VALUES (1231, 147, '威县', 3);
INSERT INTO `pmo_ares` VALUES (1232, 147, '清河县', 3);
INSERT INTO `pmo_ares` VALUES (1233, 147, '临西县', 3);
INSERT INTO `pmo_ares` VALUES (1234, 148, '桥西区', 3);
INSERT INTO `pmo_ares` VALUES (1235, 148, '桥东区', 3);
INSERT INTO `pmo_ares` VALUES (1236, 148, '宣化区', 3);
INSERT INTO `pmo_ares` VALUES (1237, 148, '下花园区', 3);
INSERT INTO `pmo_ares` VALUES (1238, 148, '宣化县', 3);
INSERT INTO `pmo_ares` VALUES (1239, 148, '张北县', 3);
INSERT INTO `pmo_ares` VALUES (1240, 148, '康保县', 3);
INSERT INTO `pmo_ares` VALUES (1241, 148, '沽源县', 3);
INSERT INTO `pmo_ares` VALUES (1242, 148, '尚义县', 3);
INSERT INTO `pmo_ares` VALUES (1243, 148, '蔚县', 3);
INSERT INTO `pmo_ares` VALUES (1244, 148, '阳原县', 3);
INSERT INTO `pmo_ares` VALUES (1245, 148, '怀安县', 3);
INSERT INTO `pmo_ares` VALUES (1246, 148, '万全县', 3);
INSERT INTO `pmo_ares` VALUES (1247, 148, '怀来县', 3);
INSERT INTO `pmo_ares` VALUES (1248, 148, '涿鹿县', 3);
INSERT INTO `pmo_ares` VALUES (1249, 148, '赤城县', 3);
INSERT INTO `pmo_ares` VALUES (1250, 148, '崇礼县', 3);
INSERT INTO `pmo_ares` VALUES (1251, 149, '金水区', 3);
INSERT INTO `pmo_ares` VALUES (1252, 149, '邙山区', 3);
INSERT INTO `pmo_ares` VALUES (1253, 149, '二七区', 3);
INSERT INTO `pmo_ares` VALUES (1254, 149, '管城区', 3);
INSERT INTO `pmo_ares` VALUES (1255, 149, '中原区', 3);
INSERT INTO `pmo_ares` VALUES (1256, 149, '上街区', 3);
INSERT INTO `pmo_ares` VALUES (1257, 149, '惠济区', 3);
INSERT INTO `pmo_ares` VALUES (1258, 149, '郑东新区', 3);
INSERT INTO `pmo_ares` VALUES (1259, 149, '经济技术开发区', 3);
INSERT INTO `pmo_ares` VALUES (1260, 149, '高新开发区', 3);
INSERT INTO `pmo_ares` VALUES (1261, 149, '出口加工区', 3);
INSERT INTO `pmo_ares` VALUES (1262, 149, '巩义市', 3);
INSERT INTO `pmo_ares` VALUES (1263, 149, '荥阳市', 3);
INSERT INTO `pmo_ares` VALUES (1264, 149, '新密市', 3);
INSERT INTO `pmo_ares` VALUES (1265, 149, '新郑市', 3);
INSERT INTO `pmo_ares` VALUES (1266, 149, '登封市', 3);
INSERT INTO `pmo_ares` VALUES (1267, 149, '中牟县', 3);
INSERT INTO `pmo_ares` VALUES (1268, 150, '西工区', 3);
INSERT INTO `pmo_ares` VALUES (1269, 150, '老城区', 3);
INSERT INTO `pmo_ares` VALUES (1270, 150, '涧西区', 3);
INSERT INTO `pmo_ares` VALUES (1271, 150, '瀍河回族区', 3);
INSERT INTO `pmo_ares` VALUES (1272, 150, '洛龙区', 3);
INSERT INTO `pmo_ares` VALUES (1273, 150, '吉利区', 3);
INSERT INTO `pmo_ares` VALUES (1274, 150, '偃师市', 3);
INSERT INTO `pmo_ares` VALUES (1275, 150, '孟津县', 3);
INSERT INTO `pmo_ares` VALUES (1276, 150, '新安县', 3);
INSERT INTO `pmo_ares` VALUES (1277, 150, '栾川县', 3);
INSERT INTO `pmo_ares` VALUES (1278, 150, '嵩县', 3);
INSERT INTO `pmo_ares` VALUES (1279, 150, '汝阳县', 3);
INSERT INTO `pmo_ares` VALUES (1280, 150, '宜阳县', 3);
INSERT INTO `pmo_ares` VALUES (1281, 150, '洛宁县', 3);
INSERT INTO `pmo_ares` VALUES (1282, 150, '伊川县', 3);
INSERT INTO `pmo_ares` VALUES (1283, 151, '鼓楼区', 3);
INSERT INTO `pmo_ares` VALUES (1284, 151, '龙亭区', 3);
INSERT INTO `pmo_ares` VALUES (1285, 151, '顺河回族区', 3);
INSERT INTO `pmo_ares` VALUES (1286, 151, '金明区', 3);
INSERT INTO `pmo_ares` VALUES (1287, 151, '禹王台区', 3);
INSERT INTO `pmo_ares` VALUES (1288, 151, '杞县', 3);
INSERT INTO `pmo_ares` VALUES (1289, 151, '通许县', 3);
INSERT INTO `pmo_ares` VALUES (1290, 151, '尉氏县', 3);
INSERT INTO `pmo_ares` VALUES (1291, 151, '开封县', 3);
INSERT INTO `pmo_ares` VALUES (1292, 151, '兰考县', 3);
INSERT INTO `pmo_ares` VALUES (1293, 152, '北关区', 3);
INSERT INTO `pmo_ares` VALUES (1294, 152, '文峰区', 3);
INSERT INTO `pmo_ares` VALUES (1295, 152, '殷都区', 3);
INSERT INTO `pmo_ares` VALUES (1296, 152, '龙安区', 3);
INSERT INTO `pmo_ares` VALUES (1297, 152, '林州市', 3);
INSERT INTO `pmo_ares` VALUES (1298, 152, '安阳县', 3);
INSERT INTO `pmo_ares` VALUES (1299, 152, '汤阴县', 3);
INSERT INTO `pmo_ares` VALUES (1300, 152, '滑县', 3);
INSERT INTO `pmo_ares` VALUES (1301, 152, '内黄县', 3);
INSERT INTO `pmo_ares` VALUES (1302, 153, '淇滨区', 3);
INSERT INTO `pmo_ares` VALUES (1303, 153, '山城区', 3);
INSERT INTO `pmo_ares` VALUES (1304, 153, '鹤山区', 3);
INSERT INTO `pmo_ares` VALUES (1305, 153, '浚县', 3);
INSERT INTO `pmo_ares` VALUES (1306, 153, '淇县', 3);
INSERT INTO `pmo_ares` VALUES (1307, 154, '济源市', 3);
INSERT INTO `pmo_ares` VALUES (1308, 155, '解放区', 3);
INSERT INTO `pmo_ares` VALUES (1309, 155, '中站区', 3);
INSERT INTO `pmo_ares` VALUES (1310, 155, '马村区', 3);
INSERT INTO `pmo_ares` VALUES (1311, 155, '山阳区', 3);
INSERT INTO `pmo_ares` VALUES (1312, 155, '沁阳市', 3);
INSERT INTO `pmo_ares` VALUES (1313, 155, '孟州市', 3);
INSERT INTO `pmo_ares` VALUES (1314, 155, '修武县', 3);
INSERT INTO `pmo_ares` VALUES (1315, 155, '博爱县', 3);
INSERT INTO `pmo_ares` VALUES (1316, 155, '武陟县', 3);
INSERT INTO `pmo_ares` VALUES (1317, 155, '温县', 3);
INSERT INTO `pmo_ares` VALUES (1318, 156, '卧龙区', 3);
INSERT INTO `pmo_ares` VALUES (1319, 156, '宛城区', 3);
INSERT INTO `pmo_ares` VALUES (1320, 156, '邓州市', 3);
INSERT INTO `pmo_ares` VALUES (1321, 156, '南召县', 3);
INSERT INTO `pmo_ares` VALUES (1322, 156, '方城县', 3);
INSERT INTO `pmo_ares` VALUES (1323, 156, '西峡县', 3);
INSERT INTO `pmo_ares` VALUES (1324, 156, '镇平县', 3);
INSERT INTO `pmo_ares` VALUES (1325, 156, '内乡县', 3);
INSERT INTO `pmo_ares` VALUES (1326, 156, '淅川县', 3);
INSERT INTO `pmo_ares` VALUES (1327, 156, '社旗县', 3);
INSERT INTO `pmo_ares` VALUES (1328, 156, '唐河县', 3);
INSERT INTO `pmo_ares` VALUES (1329, 156, '新野县', 3);
INSERT INTO `pmo_ares` VALUES (1330, 156, '桐柏县', 3);
INSERT INTO `pmo_ares` VALUES (1331, 157, '新华区', 3);
INSERT INTO `pmo_ares` VALUES (1332, 157, '卫东区', 3);
INSERT INTO `pmo_ares` VALUES (1333, 157, '湛河区', 3);
INSERT INTO `pmo_ares` VALUES (1334, 157, '石龙区', 3);
INSERT INTO `pmo_ares` VALUES (1335, 157, '舞钢市', 3);
INSERT INTO `pmo_ares` VALUES (1336, 157, '汝州市', 3);
INSERT INTO `pmo_ares` VALUES (1337, 157, '宝丰县', 3);
INSERT INTO `pmo_ares` VALUES (1338, 157, '叶县', 3);
INSERT INTO `pmo_ares` VALUES (1339, 157, '鲁山县', 3);
INSERT INTO `pmo_ares` VALUES (1340, 157, '郏县', 3);
INSERT INTO `pmo_ares` VALUES (1341, 158, '湖滨区', 3);
INSERT INTO `pmo_ares` VALUES (1342, 158, '义马市', 3);
INSERT INTO `pmo_ares` VALUES (1343, 158, '灵宝市', 3);
INSERT INTO `pmo_ares` VALUES (1344, 158, '渑池县', 3);
INSERT INTO `pmo_ares` VALUES (1345, 158, '陕县', 3);
INSERT INTO `pmo_ares` VALUES (1346, 158, '卢氏县', 3);
INSERT INTO `pmo_ares` VALUES (1347, 159, '梁园区', 3);
INSERT INTO `pmo_ares` VALUES (1348, 159, '睢阳区', 3);
INSERT INTO `pmo_ares` VALUES (1349, 159, '永城市', 3);
INSERT INTO `pmo_ares` VALUES (1350, 159, '民权县', 3);
INSERT INTO `pmo_ares` VALUES (1351, 159, '睢县', 3);
INSERT INTO `pmo_ares` VALUES (1352, 159, '宁陵县', 3);
INSERT INTO `pmo_ares` VALUES (1353, 159, '虞城县', 3);
INSERT INTO `pmo_ares` VALUES (1354, 159, '柘城县', 3);
INSERT INTO `pmo_ares` VALUES (1355, 159, '夏邑县', 3);
INSERT INTO `pmo_ares` VALUES (1356, 160, '卫滨区', 3);
INSERT INTO `pmo_ares` VALUES (1357, 160, '红旗区', 3);
INSERT INTO `pmo_ares` VALUES (1358, 160, '凤泉区', 3);
INSERT INTO `pmo_ares` VALUES (1359, 160, '牧野区', 3);
INSERT INTO `pmo_ares` VALUES (1360, 160, '卫辉市', 3);
INSERT INTO `pmo_ares` VALUES (1361, 160, '辉县市', 3);
INSERT INTO `pmo_ares` VALUES (1362, 160, '新乡县', 3);
INSERT INTO `pmo_ares` VALUES (1363, 160, '获嘉县', 3);
INSERT INTO `pmo_ares` VALUES (1364, 160, '原阳县', 3);
INSERT INTO `pmo_ares` VALUES (1365, 160, '延津县', 3);
INSERT INTO `pmo_ares` VALUES (1366, 160, '封丘县', 3);
INSERT INTO `pmo_ares` VALUES (1367, 160, '长垣县', 3);
INSERT INTO `pmo_ares` VALUES (1368, 161, '浉河区', 3);
INSERT INTO `pmo_ares` VALUES (1369, 161, '平桥区', 3);
INSERT INTO `pmo_ares` VALUES (1370, 161, '罗山县', 3);
INSERT INTO `pmo_ares` VALUES (1371, 161, '光山县', 3);
INSERT INTO `pmo_ares` VALUES (1372, 161, '新县', 3);
INSERT INTO `pmo_ares` VALUES (1373, 161, '商城县', 3);
INSERT INTO `pmo_ares` VALUES (1374, 161, '固始县', 3);
INSERT INTO `pmo_ares` VALUES (1375, 161, '潢川县', 3);
INSERT INTO `pmo_ares` VALUES (1376, 161, '淮滨县', 3);
INSERT INTO `pmo_ares` VALUES (1377, 161, '息县', 3);
INSERT INTO `pmo_ares` VALUES (1378, 162, '魏都区', 3);
INSERT INTO `pmo_ares` VALUES (1379, 162, '禹州市', 3);
INSERT INTO `pmo_ares` VALUES (1380, 162, '长葛市', 3);
INSERT INTO `pmo_ares` VALUES (1381, 162, '许昌县', 3);
INSERT INTO `pmo_ares` VALUES (1382, 162, '鄢陵县', 3);
INSERT INTO `pmo_ares` VALUES (1383, 162, '襄城县', 3);
INSERT INTO `pmo_ares` VALUES (1384, 163, '川汇区', 3);
INSERT INTO `pmo_ares` VALUES (1385, 163, '项城市', 3);
INSERT INTO `pmo_ares` VALUES (1386, 163, '扶沟县', 3);
INSERT INTO `pmo_ares` VALUES (1387, 163, '西华县', 3);
INSERT INTO `pmo_ares` VALUES (1388, 163, '商水县', 3);
INSERT INTO `pmo_ares` VALUES (1389, 163, '沈丘县', 3);
INSERT INTO `pmo_ares` VALUES (1390, 163, '郸城县', 3);
INSERT INTO `pmo_ares` VALUES (1391, 163, '淮阳县', 3);
INSERT INTO `pmo_ares` VALUES (1392, 163, '太康县', 3);
INSERT INTO `pmo_ares` VALUES (1393, 163, '鹿邑县', 3);
INSERT INTO `pmo_ares` VALUES (1394, 164, '驿城区', 3);
INSERT INTO `pmo_ares` VALUES (1395, 164, '西平县', 3);
INSERT INTO `pmo_ares` VALUES (1396, 164, '上蔡县', 3);
INSERT INTO `pmo_ares` VALUES (1397, 164, '平舆县', 3);
INSERT INTO `pmo_ares` VALUES (1398, 164, '正阳县', 3);
INSERT INTO `pmo_ares` VALUES (1399, 164, '确山县', 3);
INSERT INTO `pmo_ares` VALUES (1400, 164, '泌阳县', 3);
INSERT INTO `pmo_ares` VALUES (1401, 164, '汝南县', 3);
INSERT INTO `pmo_ares` VALUES (1402, 164, '遂平县', 3);
INSERT INTO `pmo_ares` VALUES (1403, 164, '新蔡县', 3);
INSERT INTO `pmo_ares` VALUES (1404, 165, '郾城区', 3);
INSERT INTO `pmo_ares` VALUES (1405, 165, '源汇区', 3);
INSERT INTO `pmo_ares` VALUES (1406, 165, '召陵区', 3);
INSERT INTO `pmo_ares` VALUES (1407, 165, '舞阳县', 3);
INSERT INTO `pmo_ares` VALUES (1408, 165, '临颍县', 3);
INSERT INTO `pmo_ares` VALUES (1409, 166, '华龙区', 3);
INSERT INTO `pmo_ares` VALUES (1410, 166, '清丰县', 3);
INSERT INTO `pmo_ares` VALUES (1411, 166, '南乐县', 3);
INSERT INTO `pmo_ares` VALUES (1412, 166, '范县', 3);
INSERT INTO `pmo_ares` VALUES (1413, 166, '台前县', 3);
INSERT INTO `pmo_ares` VALUES (1414, 166, '濮阳县', 3);
INSERT INTO `pmo_ares` VALUES (1415, 167, '道里区', 3);
INSERT INTO `pmo_ares` VALUES (1416, 167, '南岗区', 3);
INSERT INTO `pmo_ares` VALUES (1417, 167, '动力区', 3);
INSERT INTO `pmo_ares` VALUES (1418, 167, '平房区', 3);
INSERT INTO `pmo_ares` VALUES (1419, 167, '香坊区', 3);
INSERT INTO `pmo_ares` VALUES (1420, 167, '太平区', 3);
INSERT INTO `pmo_ares` VALUES (1421, 167, '道外区', 3);
INSERT INTO `pmo_ares` VALUES (1422, 167, '阿城区', 3);
INSERT INTO `pmo_ares` VALUES (1423, 167, '呼兰区', 3);
INSERT INTO `pmo_ares` VALUES (1424, 167, '松北区', 3);
INSERT INTO `pmo_ares` VALUES (1425, 167, '尚志市', 3);
INSERT INTO `pmo_ares` VALUES (1426, 167, '双城市', 3);
INSERT INTO `pmo_ares` VALUES (1427, 167, '五常市', 3);
INSERT INTO `pmo_ares` VALUES (1428, 167, '方正县', 3);
INSERT INTO `pmo_ares` VALUES (1429, 167, '宾县', 3);
INSERT INTO `pmo_ares` VALUES (1430, 167, '依兰县', 3);
INSERT INTO `pmo_ares` VALUES (1431, 167, '巴彦县', 3);
INSERT INTO `pmo_ares` VALUES (1432, 167, '通河县', 3);
INSERT INTO `pmo_ares` VALUES (1433, 167, '木兰县', 3);
INSERT INTO `pmo_ares` VALUES (1434, 167, '延寿县', 3);
INSERT INTO `pmo_ares` VALUES (1435, 168, '萨尔图区', 3);
INSERT INTO `pmo_ares` VALUES (1436, 168, '红岗区', 3);
INSERT INTO `pmo_ares` VALUES (1437, 168, '龙凤区', 3);
INSERT INTO `pmo_ares` VALUES (1438, 168, '让胡路区', 3);
INSERT INTO `pmo_ares` VALUES (1439, 168, '大同区', 3);
INSERT INTO `pmo_ares` VALUES (1440, 168, '肇州县', 3);
INSERT INTO `pmo_ares` VALUES (1441, 168, '肇源县', 3);
INSERT INTO `pmo_ares` VALUES (1442, 168, '林甸县', 3);
INSERT INTO `pmo_ares` VALUES (1443, 168, '杜尔伯特', 3);
INSERT INTO `pmo_ares` VALUES (1444, 169, '呼玛县', 3);
INSERT INTO `pmo_ares` VALUES (1445, 169, '漠河县', 3);
INSERT INTO `pmo_ares` VALUES (1446, 169, '塔河县', 3);
INSERT INTO `pmo_ares` VALUES (1447, 170, '兴山区', 3);
INSERT INTO `pmo_ares` VALUES (1448, 170, '工农区', 3);
INSERT INTO `pmo_ares` VALUES (1449, 170, '南山区', 3);
INSERT INTO `pmo_ares` VALUES (1450, 170, '兴安区', 3);
INSERT INTO `pmo_ares` VALUES (1451, 170, '向阳区', 3);
INSERT INTO `pmo_ares` VALUES (1452, 170, '东山区', 3);
INSERT INTO `pmo_ares` VALUES (1453, 170, '萝北县', 3);
INSERT INTO `pmo_ares` VALUES (1454, 170, '绥滨县', 3);
INSERT INTO `pmo_ares` VALUES (1455, 171, '爱辉区', 3);
INSERT INTO `pmo_ares` VALUES (1456, 171, '五大连池市', 3);
INSERT INTO `pmo_ares` VALUES (1457, 171, '北安市', 3);
INSERT INTO `pmo_ares` VALUES (1458, 171, '嫩江县', 3);
INSERT INTO `pmo_ares` VALUES (1459, 171, '逊克县', 3);
INSERT INTO `pmo_ares` VALUES (1460, 171, '孙吴县', 3);
INSERT INTO `pmo_ares` VALUES (1461, 172, '鸡冠区', 3);
INSERT INTO `pmo_ares` VALUES (1462, 172, '恒山区', 3);
INSERT INTO `pmo_ares` VALUES (1463, 172, '城子河区', 3);
INSERT INTO `pmo_ares` VALUES (1464, 172, '滴道区', 3);
INSERT INTO `pmo_ares` VALUES (1465, 172, '梨树区', 3);
INSERT INTO `pmo_ares` VALUES (1466, 172, '虎林市', 3);
INSERT INTO `pmo_ares` VALUES (1467, 172, '密山市', 3);
INSERT INTO `pmo_ares` VALUES (1468, 172, '鸡东县', 3);
INSERT INTO `pmo_ares` VALUES (1469, 173, '前进区', 3);
INSERT INTO `pmo_ares` VALUES (1470, 173, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (1471, 173, '向阳区', 3);
INSERT INTO `pmo_ares` VALUES (1472, 173, '东风区', 3);
INSERT INTO `pmo_ares` VALUES (1473, 173, '同江市', 3);
INSERT INTO `pmo_ares` VALUES (1474, 173, '富锦市', 3);
INSERT INTO `pmo_ares` VALUES (1475, 173, '桦南县', 3);
INSERT INTO `pmo_ares` VALUES (1476, 173, '桦川县', 3);
INSERT INTO `pmo_ares` VALUES (1477, 173, '汤原县', 3);
INSERT INTO `pmo_ares` VALUES (1478, 173, '抚远县', 3);
INSERT INTO `pmo_ares` VALUES (1479, 174, '爱民区', 3);
INSERT INTO `pmo_ares` VALUES (1480, 174, '东安区', 3);
INSERT INTO `pmo_ares` VALUES (1481, 174, '阳明区', 3);
INSERT INTO `pmo_ares` VALUES (1482, 174, '西安区', 3);
INSERT INTO `pmo_ares` VALUES (1483, 174, '绥芬河市', 3);
INSERT INTO `pmo_ares` VALUES (1484, 174, '海林市', 3);
INSERT INTO `pmo_ares` VALUES (1485, 174, '宁安市', 3);
INSERT INTO `pmo_ares` VALUES (1486, 174, '穆棱市', 3);
INSERT INTO `pmo_ares` VALUES (1487, 174, '东宁县', 3);
INSERT INTO `pmo_ares` VALUES (1488, 174, '林口县', 3);
INSERT INTO `pmo_ares` VALUES (1489, 175, '桃山区', 3);
INSERT INTO `pmo_ares` VALUES (1490, 175, '新兴区', 3);
INSERT INTO `pmo_ares` VALUES (1491, 175, '茄子河区', 3);
INSERT INTO `pmo_ares` VALUES (1492, 175, '勃利县', 3);
INSERT INTO `pmo_ares` VALUES (1493, 176, '龙沙区', 3);
INSERT INTO `pmo_ares` VALUES (1494, 176, '昂昂溪区', 3);
INSERT INTO `pmo_ares` VALUES (1495, 176, '铁峰区', 3);
INSERT INTO `pmo_ares` VALUES (1496, 176, '建华区', 3);
INSERT INTO `pmo_ares` VALUES (1497, 176, '富拉尔基区', 3);
INSERT INTO `pmo_ares` VALUES (1498, 176, '碾子山区', 3);
INSERT INTO `pmo_ares` VALUES (1499, 176, '梅里斯达斡尔区', 3);
INSERT INTO `pmo_ares` VALUES (1500, 176, '讷河市', 3);
INSERT INTO `pmo_ares` VALUES (1501, 176, '龙江县', 3);
INSERT INTO `pmo_ares` VALUES (1502, 176, '依安县', 3);
INSERT INTO `pmo_ares` VALUES (1503, 176, '泰来县', 3);
INSERT INTO `pmo_ares` VALUES (1504, 176, '甘南县', 3);
INSERT INTO `pmo_ares` VALUES (1505, 176, '富裕县', 3);
INSERT INTO `pmo_ares` VALUES (1506, 176, '克山县', 3);
INSERT INTO `pmo_ares` VALUES (1507, 176, '克东县', 3);
INSERT INTO `pmo_ares` VALUES (1508, 176, '拜泉县', 3);
INSERT INTO `pmo_ares` VALUES (1509, 177, '尖山区', 3);
INSERT INTO `pmo_ares` VALUES (1510, 177, '岭东区', 3);
INSERT INTO `pmo_ares` VALUES (1511, 177, '四方台区', 3);
INSERT INTO `pmo_ares` VALUES (1512, 177, '宝山区', 3);
INSERT INTO `pmo_ares` VALUES (1513, 177, '集贤县', 3);
INSERT INTO `pmo_ares` VALUES (1514, 177, '友谊县', 3);
INSERT INTO `pmo_ares` VALUES (1515, 177, '宝清县', 3);
INSERT INTO `pmo_ares` VALUES (1516, 177, '饶河县', 3);
INSERT INTO `pmo_ares` VALUES (1517, 178, '北林区', 3);
INSERT INTO `pmo_ares` VALUES (1518, 178, '安达市', 3);
INSERT INTO `pmo_ares` VALUES (1519, 178, '肇东市', 3);
INSERT INTO `pmo_ares` VALUES (1520, 178, '海伦市', 3);
INSERT INTO `pmo_ares` VALUES (1521, 178, '望奎县', 3);
INSERT INTO `pmo_ares` VALUES (1522, 178, '兰西县', 3);
INSERT INTO `pmo_ares` VALUES (1523, 178, '青冈县', 3);
INSERT INTO `pmo_ares` VALUES (1524, 178, '庆安县', 3);
INSERT INTO `pmo_ares` VALUES (1525, 178, '明水县', 3);
INSERT INTO `pmo_ares` VALUES (1526, 178, '绥棱县', 3);
INSERT INTO `pmo_ares` VALUES (1527, 179, '伊春区', 3);
INSERT INTO `pmo_ares` VALUES (1528, 179, '带岭区', 3);
INSERT INTO `pmo_ares` VALUES (1529, 179, '南岔区', 3);
INSERT INTO `pmo_ares` VALUES (1530, 179, '金山屯区', 3);
INSERT INTO `pmo_ares` VALUES (1531, 179, '西林区', 3);
INSERT INTO `pmo_ares` VALUES (1532, 179, '美溪区', 3);
INSERT INTO `pmo_ares` VALUES (1533, 179, '乌马河区', 3);
INSERT INTO `pmo_ares` VALUES (1534, 179, '翠峦区', 3);
INSERT INTO `pmo_ares` VALUES (1535, 179, '友好区', 3);
INSERT INTO `pmo_ares` VALUES (1536, 179, '上甘岭区', 3);
INSERT INTO `pmo_ares` VALUES (1537, 179, '五营区', 3);
INSERT INTO `pmo_ares` VALUES (1538, 179, '红星区', 3);
INSERT INTO `pmo_ares` VALUES (1539, 179, '新青区', 3);
INSERT INTO `pmo_ares` VALUES (1540, 179, '汤旺河区', 3);
INSERT INTO `pmo_ares` VALUES (1541, 179, '乌伊岭区', 3);
INSERT INTO `pmo_ares` VALUES (1542, 179, '铁力市', 3);
INSERT INTO `pmo_ares` VALUES (1543, 179, '嘉荫县', 3);
INSERT INTO `pmo_ares` VALUES (1544, 180, '江岸区', 3);
INSERT INTO `pmo_ares` VALUES (1545, 180, '武昌区', 3);
INSERT INTO `pmo_ares` VALUES (1546, 180, '江汉区', 3);
INSERT INTO `pmo_ares` VALUES (1547, 180, '硚口区', 3);
INSERT INTO `pmo_ares` VALUES (1548, 180, '汉阳区', 3);
INSERT INTO `pmo_ares` VALUES (1549, 180, '青山区', 3);
INSERT INTO `pmo_ares` VALUES (1550, 180, '洪山区', 3);
INSERT INTO `pmo_ares` VALUES (1551, 180, '东西湖区', 3);
INSERT INTO `pmo_ares` VALUES (1552, 180, '汉南区', 3);
INSERT INTO `pmo_ares` VALUES (1553, 180, '蔡甸区', 3);
INSERT INTO `pmo_ares` VALUES (1554, 180, '江夏区', 3);
INSERT INTO `pmo_ares` VALUES (1555, 180, '黄陂区', 3);
INSERT INTO `pmo_ares` VALUES (1556, 180, '新洲区', 3);
INSERT INTO `pmo_ares` VALUES (1557, 180, '经济开发区', 3);
INSERT INTO `pmo_ares` VALUES (1558, 181, '仙桃市', 3);
INSERT INTO `pmo_ares` VALUES (1559, 182, '鄂城区', 3);
INSERT INTO `pmo_ares` VALUES (1560, 182, '华容区', 3);
INSERT INTO `pmo_ares` VALUES (1561, 182, '梁子湖区', 3);
INSERT INTO `pmo_ares` VALUES (1562, 183, '黄州区', 3);
INSERT INTO `pmo_ares` VALUES (1563, 183, '麻城市', 3);
INSERT INTO `pmo_ares` VALUES (1564, 183, '武穴市', 3);
INSERT INTO `pmo_ares` VALUES (1565, 183, '团风县', 3);
INSERT INTO `pmo_ares` VALUES (1566, 183, '红安县', 3);
INSERT INTO `pmo_ares` VALUES (1567, 183, '罗田县', 3);
INSERT INTO `pmo_ares` VALUES (1568, 183, '英山县', 3);
INSERT INTO `pmo_ares` VALUES (1569, 183, '浠水县', 3);
INSERT INTO `pmo_ares` VALUES (1570, 183, '蕲春县', 3);
INSERT INTO `pmo_ares` VALUES (1571, 183, '黄梅县', 3);
INSERT INTO `pmo_ares` VALUES (1572, 184, '黄石港区', 3);
INSERT INTO `pmo_ares` VALUES (1573, 184, '西塞山区', 3);
INSERT INTO `pmo_ares` VALUES (1574, 184, '下陆区', 3);
INSERT INTO `pmo_ares` VALUES (1575, 184, '铁山区', 3);
INSERT INTO `pmo_ares` VALUES (1576, 184, '大冶市', 3);
INSERT INTO `pmo_ares` VALUES (1577, 184, '阳新县', 3);
INSERT INTO `pmo_ares` VALUES (1578, 185, '东宝区', 3);
INSERT INTO `pmo_ares` VALUES (1579, 185, '掇刀区', 3);
INSERT INTO `pmo_ares` VALUES (1580, 185, '钟祥市', 3);
INSERT INTO `pmo_ares` VALUES (1581, 185, '京山县', 3);
INSERT INTO `pmo_ares` VALUES (1582, 185, '沙洋县', 3);
INSERT INTO `pmo_ares` VALUES (1583, 186, '沙市区', 3);
INSERT INTO `pmo_ares` VALUES (1584, 186, '荆州区', 3);
INSERT INTO `pmo_ares` VALUES (1585, 186, '石首市', 3);
INSERT INTO `pmo_ares` VALUES (1586, 186, '洪湖市', 3);
INSERT INTO `pmo_ares` VALUES (1587, 186, '松滋市', 3);
INSERT INTO `pmo_ares` VALUES (1588, 186, '公安县', 3);
INSERT INTO `pmo_ares` VALUES (1589, 186, '监利县', 3);
INSERT INTO `pmo_ares` VALUES (1590, 186, '江陵县', 3);
INSERT INTO `pmo_ares` VALUES (1591, 187, '潜江市', 3);
INSERT INTO `pmo_ares` VALUES (1592, 188, '神农架林区', 3);
INSERT INTO `pmo_ares` VALUES (1593, 189, '张湾区', 3);
INSERT INTO `pmo_ares` VALUES (1594, 189, '茅箭区', 3);
INSERT INTO `pmo_ares` VALUES (1595, 189, '丹江口市', 3);
INSERT INTO `pmo_ares` VALUES (1596, 189, '郧县', 3);
INSERT INTO `pmo_ares` VALUES (1597, 189, '郧西县', 3);
INSERT INTO `pmo_ares` VALUES (1598, 189, '竹山县', 3);
INSERT INTO `pmo_ares` VALUES (1599, 189, '竹溪县', 3);
INSERT INTO `pmo_ares` VALUES (1600, 189, '房县', 3);
INSERT INTO `pmo_ares` VALUES (1601, 190, '曾都区', 3);
INSERT INTO `pmo_ares` VALUES (1602, 190, '广水市', 3);
INSERT INTO `pmo_ares` VALUES (1603, 191, '天门市', 3);
INSERT INTO `pmo_ares` VALUES (1604, 192, '咸安区', 3);
INSERT INTO `pmo_ares` VALUES (1605, 192, '赤壁市', 3);
INSERT INTO `pmo_ares` VALUES (1606, 192, '嘉鱼县', 3);
INSERT INTO `pmo_ares` VALUES (1607, 192, '通城县', 3);
INSERT INTO `pmo_ares` VALUES (1608, 192, '崇阳县', 3);
INSERT INTO `pmo_ares` VALUES (1609, 192, '通山县', 3);
INSERT INTO `pmo_ares` VALUES (1610, 193, '襄城区', 3);
INSERT INTO `pmo_ares` VALUES (1611, 193, '樊城区', 3);
INSERT INTO `pmo_ares` VALUES (1612, 193, '襄阳区', 3);
INSERT INTO `pmo_ares` VALUES (1613, 193, '老河口市', 3);
INSERT INTO `pmo_ares` VALUES (1614, 193, '枣阳市', 3);
INSERT INTO `pmo_ares` VALUES (1615, 193, '宜城市', 3);
INSERT INTO `pmo_ares` VALUES (1616, 193, '南漳县', 3);
INSERT INTO `pmo_ares` VALUES (1617, 193, '谷城县', 3);
INSERT INTO `pmo_ares` VALUES (1618, 193, '保康县', 3);
INSERT INTO `pmo_ares` VALUES (1619, 194, '孝南区', 3);
INSERT INTO `pmo_ares` VALUES (1620, 194, '应城市', 3);
INSERT INTO `pmo_ares` VALUES (1621, 194, '安陆市', 3);
INSERT INTO `pmo_ares` VALUES (1622, 194, '汉川市', 3);
INSERT INTO `pmo_ares` VALUES (1623, 194, '孝昌县', 3);
INSERT INTO `pmo_ares` VALUES (1624, 194, '大悟县', 3);
INSERT INTO `pmo_ares` VALUES (1625, 194, '云梦县', 3);
INSERT INTO `pmo_ares` VALUES (1626, 195, '长阳', 3);
INSERT INTO `pmo_ares` VALUES (1627, 195, '五峰', 3);
INSERT INTO `pmo_ares` VALUES (1628, 195, '西陵区', 3);
INSERT INTO `pmo_ares` VALUES (1629, 195, '伍家岗区', 3);
INSERT INTO `pmo_ares` VALUES (1630, 195, '点军区', 3);
INSERT INTO `pmo_ares` VALUES (1631, 195, '猇亭区', 3);
INSERT INTO `pmo_ares` VALUES (1632, 195, '夷陵区', 3);
INSERT INTO `pmo_ares` VALUES (1633, 195, '宜都市', 3);
INSERT INTO `pmo_ares` VALUES (1634, 195, '当阳市', 3);
INSERT INTO `pmo_ares` VALUES (1635, 195, '枝江市', 3);
INSERT INTO `pmo_ares` VALUES (1636, 195, '远安县', 3);
INSERT INTO `pmo_ares` VALUES (1637, 195, '兴山县', 3);
INSERT INTO `pmo_ares` VALUES (1638, 195, '秭归县', 3);
INSERT INTO `pmo_ares` VALUES (1639, 196, '恩施市', 3);
INSERT INTO `pmo_ares` VALUES (1640, 196, '利川市', 3);
INSERT INTO `pmo_ares` VALUES (1641, 196, '建始县', 3);
INSERT INTO `pmo_ares` VALUES (1642, 196, '巴东县', 3);
INSERT INTO `pmo_ares` VALUES (1643, 196, '宣恩县', 3);
INSERT INTO `pmo_ares` VALUES (1644, 196, '咸丰县', 3);
INSERT INTO `pmo_ares` VALUES (1645, 196, '来凤县', 3);
INSERT INTO `pmo_ares` VALUES (1646, 196, '鹤峰县', 3);
INSERT INTO `pmo_ares` VALUES (1647, 197, '岳麓区', 3);
INSERT INTO `pmo_ares` VALUES (1648, 197, '芙蓉区', 3);
INSERT INTO `pmo_ares` VALUES (1649, 197, '天心区', 3);
INSERT INTO `pmo_ares` VALUES (1650, 197, '开福区', 3);
INSERT INTO `pmo_ares` VALUES (1651, 197, '雨花区', 3);
INSERT INTO `pmo_ares` VALUES (1652, 197, '开发区', 3);
INSERT INTO `pmo_ares` VALUES (1653, 197, '浏阳市', 3);
INSERT INTO `pmo_ares` VALUES (1654, 197, '长沙县', 3);
INSERT INTO `pmo_ares` VALUES (1655, 197, '望城县', 3);
INSERT INTO `pmo_ares` VALUES (1656, 197, '宁乡县', 3);
INSERT INTO `pmo_ares` VALUES (1657, 198, '永定区', 3);
INSERT INTO `pmo_ares` VALUES (1658, 198, '武陵源区', 3);
INSERT INTO `pmo_ares` VALUES (1659, 198, '慈利县', 3);
INSERT INTO `pmo_ares` VALUES (1660, 198, '桑植县', 3);
INSERT INTO `pmo_ares` VALUES (1661, 199, '武陵区', 3);
INSERT INTO `pmo_ares` VALUES (1662, 199, '鼎城区', 3);
INSERT INTO `pmo_ares` VALUES (1663, 199, '津市市', 3);
INSERT INTO `pmo_ares` VALUES (1664, 199, '安乡县', 3);
INSERT INTO `pmo_ares` VALUES (1665, 199, '汉寿县', 3);
INSERT INTO `pmo_ares` VALUES (1666, 199, '澧县', 3);
INSERT INTO `pmo_ares` VALUES (1667, 199, '临澧县', 3);
INSERT INTO `pmo_ares` VALUES (1668, 199, '桃源县', 3);
INSERT INTO `pmo_ares` VALUES (1669, 199, '石门县', 3);
INSERT INTO `pmo_ares` VALUES (1670, 200, '北湖区', 3);
INSERT INTO `pmo_ares` VALUES (1671, 200, '苏仙区', 3);
INSERT INTO `pmo_ares` VALUES (1672, 200, '资兴市', 3);
INSERT INTO `pmo_ares` VALUES (1673, 200, '桂阳县', 3);
INSERT INTO `pmo_ares` VALUES (1674, 200, '宜章县', 3);
INSERT INTO `pmo_ares` VALUES (1675, 200, '永兴县', 3);
INSERT INTO `pmo_ares` VALUES (1676, 200, '嘉禾县', 3);
INSERT INTO `pmo_ares` VALUES (1677, 200, '临武县', 3);
INSERT INTO `pmo_ares` VALUES (1678, 200, '汝城县', 3);
INSERT INTO `pmo_ares` VALUES (1679, 200, '桂东县', 3);
INSERT INTO `pmo_ares` VALUES (1680, 200, '安仁县', 3);
INSERT INTO `pmo_ares` VALUES (1681, 201, '雁峰区', 3);
INSERT INTO `pmo_ares` VALUES (1682, 201, '珠晖区', 3);
INSERT INTO `pmo_ares` VALUES (1683, 201, '石鼓区', 3);
INSERT INTO `pmo_ares` VALUES (1684, 201, '蒸湘区', 3);
INSERT INTO `pmo_ares` VALUES (1685, 201, '南岳区', 3);
INSERT INTO `pmo_ares` VALUES (1686, 201, '耒阳市', 3);
INSERT INTO `pmo_ares` VALUES (1687, 201, '常宁市', 3);
INSERT INTO `pmo_ares` VALUES (1688, 201, '衡阳县', 3);
INSERT INTO `pmo_ares` VALUES (1689, 201, '衡南县', 3);
INSERT INTO `pmo_ares` VALUES (1690, 201, '衡山县', 3);
INSERT INTO `pmo_ares` VALUES (1691, 201, '衡东县', 3);
INSERT INTO `pmo_ares` VALUES (1692, 201, '祁东县', 3);
INSERT INTO `pmo_ares` VALUES (1693, 202, '鹤城区', 3);
INSERT INTO `pmo_ares` VALUES (1694, 202, '靖州', 3);
INSERT INTO `pmo_ares` VALUES (1695, 202, '麻阳', 3);
INSERT INTO `pmo_ares` VALUES (1696, 202, '通道', 3);
INSERT INTO `pmo_ares` VALUES (1697, 202, '新晃', 3);
INSERT INTO `pmo_ares` VALUES (1698, 202, '芷江', 3);
INSERT INTO `pmo_ares` VALUES (1699, 202, '沅陵县', 3);
INSERT INTO `pmo_ares` VALUES (1700, 202, '辰溪县', 3);
INSERT INTO `pmo_ares` VALUES (1701, 202, '溆浦县', 3);
INSERT INTO `pmo_ares` VALUES (1702, 202, '中方县', 3);
INSERT INTO `pmo_ares` VALUES (1703, 202, '会同县', 3);
INSERT INTO `pmo_ares` VALUES (1704, 202, '洪江市', 3);
INSERT INTO `pmo_ares` VALUES (1705, 203, '娄星区', 3);
INSERT INTO `pmo_ares` VALUES (1706, 203, '冷水江市', 3);
INSERT INTO `pmo_ares` VALUES (1707, 203, '涟源市', 3);
INSERT INTO `pmo_ares` VALUES (1708, 203, '双峰县', 3);
INSERT INTO `pmo_ares` VALUES (1709, 203, '新化县', 3);
INSERT INTO `pmo_ares` VALUES (1710, 204, '城步', 3);
INSERT INTO `pmo_ares` VALUES (1711, 204, '双清区', 3);
INSERT INTO `pmo_ares` VALUES (1712, 204, '大祥区', 3);
INSERT INTO `pmo_ares` VALUES (1713, 204, '北塔区', 3);
INSERT INTO `pmo_ares` VALUES (1714, 204, '武冈市', 3);
INSERT INTO `pmo_ares` VALUES (1715, 204, '邵东县', 3);
INSERT INTO `pmo_ares` VALUES (1716, 204, '新邵县', 3);
INSERT INTO `pmo_ares` VALUES (1717, 204, '邵阳县', 3);
INSERT INTO `pmo_ares` VALUES (1718, 204, '隆回县', 3);
INSERT INTO `pmo_ares` VALUES (1719, 204, '洞口县', 3);
INSERT INTO `pmo_ares` VALUES (1720, 204, '绥宁县', 3);
INSERT INTO `pmo_ares` VALUES (1721, 204, '新宁县', 3);
INSERT INTO `pmo_ares` VALUES (1722, 205, '岳塘区', 3);
INSERT INTO `pmo_ares` VALUES (1723, 205, '雨湖区', 3);
INSERT INTO `pmo_ares` VALUES (1724, 205, '湘乡市', 3);
INSERT INTO `pmo_ares` VALUES (1725, 205, '韶山市', 3);
INSERT INTO `pmo_ares` VALUES (1726, 205, '湘潭县', 3);
INSERT INTO `pmo_ares` VALUES (1727, 206, '吉首市', 3);
INSERT INTO `pmo_ares` VALUES (1728, 206, '泸溪县', 3);
INSERT INTO `pmo_ares` VALUES (1729, 206, '凤凰县', 3);
INSERT INTO `pmo_ares` VALUES (1730, 206, '花垣县', 3);
INSERT INTO `pmo_ares` VALUES (1731, 206, '保靖县', 3);
INSERT INTO `pmo_ares` VALUES (1732, 206, '古丈县', 3);
INSERT INTO `pmo_ares` VALUES (1733, 206, '永顺县', 3);
INSERT INTO `pmo_ares` VALUES (1734, 206, '龙山县', 3);
INSERT INTO `pmo_ares` VALUES (1735, 207, '赫山区', 3);
INSERT INTO `pmo_ares` VALUES (1736, 207, '资阳区', 3);
INSERT INTO `pmo_ares` VALUES (1737, 207, '沅江市', 3);
INSERT INTO `pmo_ares` VALUES (1738, 207, '南县', 3);
INSERT INTO `pmo_ares` VALUES (1739, 207, '桃江县', 3);
INSERT INTO `pmo_ares` VALUES (1740, 207, '安化县', 3);
INSERT INTO `pmo_ares` VALUES (1741, 208, '江华', 3);
INSERT INTO `pmo_ares` VALUES (1742, 208, '冷水滩区', 3);
INSERT INTO `pmo_ares` VALUES (1743, 208, '零陵区', 3);
INSERT INTO `pmo_ares` VALUES (1744, 208, '祁阳县', 3);
INSERT INTO `pmo_ares` VALUES (1745, 208, '东安县', 3);
INSERT INTO `pmo_ares` VALUES (1746, 208, '双牌县', 3);
INSERT INTO `pmo_ares` VALUES (1747, 208, '道县', 3);
INSERT INTO `pmo_ares` VALUES (1748, 208, '江永县', 3);
INSERT INTO `pmo_ares` VALUES (1749, 208, '宁远县', 3);
INSERT INTO `pmo_ares` VALUES (1750, 208, '蓝山县', 3);
INSERT INTO `pmo_ares` VALUES (1751, 208, '新田县', 3);
INSERT INTO `pmo_ares` VALUES (1752, 209, '岳阳楼区', 3);
INSERT INTO `pmo_ares` VALUES (1753, 209, '君山区', 3);
INSERT INTO `pmo_ares` VALUES (1754, 209, '云溪区', 3);
INSERT INTO `pmo_ares` VALUES (1755, 209, '汨罗市', 3);
INSERT INTO `pmo_ares` VALUES (1756, 209, '临湘市', 3);
INSERT INTO `pmo_ares` VALUES (1757, 209, '岳阳县', 3);
INSERT INTO `pmo_ares` VALUES (1758, 209, '华容县', 3);
INSERT INTO `pmo_ares` VALUES (1759, 209, '湘阴县', 3);
INSERT INTO `pmo_ares` VALUES (1760, 209, '平江县', 3);
INSERT INTO `pmo_ares` VALUES (1761, 210, '天元区', 3);
INSERT INTO `pmo_ares` VALUES (1762, 210, '荷塘区', 3);
INSERT INTO `pmo_ares` VALUES (1763, 210, '芦淞区', 3);
INSERT INTO `pmo_ares` VALUES (1764, 210, '石峰区', 3);
INSERT INTO `pmo_ares` VALUES (1765, 210, '醴陵市', 3);
INSERT INTO `pmo_ares` VALUES (1766, 210, '株洲县', 3);
INSERT INTO `pmo_ares` VALUES (1767, 210, '攸县', 3);
INSERT INTO `pmo_ares` VALUES (1768, 210, '茶陵县', 3);
INSERT INTO `pmo_ares` VALUES (1769, 210, '炎陵县', 3);
INSERT INTO `pmo_ares` VALUES (1770, 211, '朝阳区', 3);
INSERT INTO `pmo_ares` VALUES (1771, 211, '宽城区', 3);
INSERT INTO `pmo_ares` VALUES (1772, 211, '二道区', 3);
INSERT INTO `pmo_ares` VALUES (1773, 211, '南关区', 3);
INSERT INTO `pmo_ares` VALUES (1774, 211, '绿园区', 3);
INSERT INTO `pmo_ares` VALUES (1775, 211, '双阳区', 3);
INSERT INTO `pmo_ares` VALUES (1776, 211, '净月潭开发区', 3);
INSERT INTO `pmo_ares` VALUES (1777, 211, '高新技术开发区', 3);
INSERT INTO `pmo_ares` VALUES (1778, 211, '经济技术开发区', 3);
INSERT INTO `pmo_ares` VALUES (1779, 211, '汽车产业开发区', 3);
INSERT INTO `pmo_ares` VALUES (1780, 211, '德惠市', 3);
INSERT INTO `pmo_ares` VALUES (1781, 211, '九台市', 3);
INSERT INTO `pmo_ares` VALUES (1782, 211, '榆树市', 3);
INSERT INTO `pmo_ares` VALUES (1783, 211, '农安县', 3);
INSERT INTO `pmo_ares` VALUES (1784, 212, '船营区', 3);
INSERT INTO `pmo_ares` VALUES (1785, 212, '昌邑区', 3);
INSERT INTO `pmo_ares` VALUES (1786, 212, '龙潭区', 3);
INSERT INTO `pmo_ares` VALUES (1787, 212, '丰满区', 3);
INSERT INTO `pmo_ares` VALUES (1788, 212, '蛟河市', 3);
INSERT INTO `pmo_ares` VALUES (1789, 212, '桦甸市', 3);
INSERT INTO `pmo_ares` VALUES (1790, 212, '舒兰市', 3);
INSERT INTO `pmo_ares` VALUES (1791, 212, '磐石市', 3);
INSERT INTO `pmo_ares` VALUES (1792, 212, '永吉县', 3);
INSERT INTO `pmo_ares` VALUES (1793, 213, '洮北区', 3);
INSERT INTO `pmo_ares` VALUES (1794, 213, '洮南市', 3);
INSERT INTO `pmo_ares` VALUES (1795, 213, '大安市', 3);
INSERT INTO `pmo_ares` VALUES (1796, 213, '镇赉县', 3);
INSERT INTO `pmo_ares` VALUES (1797, 213, '通榆县', 3);
INSERT INTO `pmo_ares` VALUES (1798, 214, '江源区', 3);
INSERT INTO `pmo_ares` VALUES (1799, 214, '八道江区', 3);
INSERT INTO `pmo_ares` VALUES (1800, 214, '长白', 3);
INSERT INTO `pmo_ares` VALUES (1801, 214, '临江市', 3);
INSERT INTO `pmo_ares` VALUES (1802, 214, '抚松县', 3);
INSERT INTO `pmo_ares` VALUES (1803, 214, '靖宇县', 3);
INSERT INTO `pmo_ares` VALUES (1804, 215, '龙山区', 3);
INSERT INTO `pmo_ares` VALUES (1805, 215, '西安区', 3);
INSERT INTO `pmo_ares` VALUES (1806, 215, '东丰县', 3);
INSERT INTO `pmo_ares` VALUES (1807, 215, '东辽县', 3);
INSERT INTO `pmo_ares` VALUES (1808, 216, '铁西区', 3);
INSERT INTO `pmo_ares` VALUES (1809, 216, '铁东区', 3);
INSERT INTO `pmo_ares` VALUES (1810, 216, '伊通', 3);
INSERT INTO `pmo_ares` VALUES (1811, 216, '公主岭市', 3);
INSERT INTO `pmo_ares` VALUES (1812, 216, '双辽市', 3);
INSERT INTO `pmo_ares` VALUES (1813, 216, '梨树县', 3);
INSERT INTO `pmo_ares` VALUES (1814, 217, '前郭尔罗斯', 3);
INSERT INTO `pmo_ares` VALUES (1815, 217, '宁江区', 3);
INSERT INTO `pmo_ares` VALUES (1816, 217, '长岭县', 3);
INSERT INTO `pmo_ares` VALUES (1817, 217, '乾安县', 3);
INSERT INTO `pmo_ares` VALUES (1818, 217, '扶余县', 3);
INSERT INTO `pmo_ares` VALUES (1819, 218, '东昌区', 3);
INSERT INTO `pmo_ares` VALUES (1820, 218, '二道江区', 3);
INSERT INTO `pmo_ares` VALUES (1821, 218, '梅河口市', 3);
INSERT INTO `pmo_ares` VALUES (1822, 218, '集安市', 3);
INSERT INTO `pmo_ares` VALUES (1823, 218, '通化县', 3);
INSERT INTO `pmo_ares` VALUES (1824, 218, '辉南县', 3);
INSERT INTO `pmo_ares` VALUES (1825, 218, '柳河县', 3);
INSERT INTO `pmo_ares` VALUES (1826, 219, '延吉市', 3);
INSERT INTO `pmo_ares` VALUES (1827, 219, '图们市', 3);
INSERT INTO `pmo_ares` VALUES (1828, 219, '敦化市', 3);
INSERT INTO `pmo_ares` VALUES (1829, 219, '珲春市', 3);
INSERT INTO `pmo_ares` VALUES (1830, 219, '龙井市', 3);
INSERT INTO `pmo_ares` VALUES (1831, 219, '和龙市', 3);
INSERT INTO `pmo_ares` VALUES (1832, 219, '安图县', 3);
INSERT INTO `pmo_ares` VALUES (1833, 219, '汪清县', 3);
INSERT INTO `pmo_ares` VALUES (1834, 220, '玄武区', 3);
INSERT INTO `pmo_ares` VALUES (1835, 220, '鼓楼区', 3);
INSERT INTO `pmo_ares` VALUES (1836, 220, '白下区', 3);
INSERT INTO `pmo_ares` VALUES (1837, 220, '建邺区', 3);
INSERT INTO `pmo_ares` VALUES (1838, 220, '秦淮区', 3);
INSERT INTO `pmo_ares` VALUES (1839, 220, '雨花台区', 3);
INSERT INTO `pmo_ares` VALUES (1840, 220, '下关区', 3);
INSERT INTO `pmo_ares` VALUES (1841, 220, '栖霞区', 3);
INSERT INTO `pmo_ares` VALUES (1842, 220, '浦口区', 3);
INSERT INTO `pmo_ares` VALUES (1843, 220, '江宁区', 3);
INSERT INTO `pmo_ares` VALUES (1844, 220, '六合区', 3);
INSERT INTO `pmo_ares` VALUES (1845, 220, '溧水县', 3);
INSERT INTO `pmo_ares` VALUES (1846, 220, '高淳县', 3);
INSERT INTO `pmo_ares` VALUES (1847, 221, '沧浪区', 3);
INSERT INTO `pmo_ares` VALUES (1848, 221, '金阊区', 3);
INSERT INTO `pmo_ares` VALUES (1849, 221, '平江区', 3);
INSERT INTO `pmo_ares` VALUES (1850, 221, '虎丘区', 3);
INSERT INTO `pmo_ares` VALUES (1851, 221, '吴中区', 3);
INSERT INTO `pmo_ares` VALUES (1852, 221, '相城区', 3);
INSERT INTO `pmo_ares` VALUES (1853, 221, '园区', 3);
INSERT INTO `pmo_ares` VALUES (1854, 221, '新区', 3);
INSERT INTO `pmo_ares` VALUES (1855, 221, '常熟市', 3);
INSERT INTO `pmo_ares` VALUES (1856, 221, '张家港市', 3);
INSERT INTO `pmo_ares` VALUES (1857, 221, '玉山镇', 3);
INSERT INTO `pmo_ares` VALUES (1858, 221, '巴城镇', 3);
INSERT INTO `pmo_ares` VALUES (1859, 221, '周市镇', 3);
INSERT INTO `pmo_ares` VALUES (1860, 221, '陆家镇', 3);
INSERT INTO `pmo_ares` VALUES (1861, 221, '花桥镇', 3);
INSERT INTO `pmo_ares` VALUES (1862, 221, '淀山湖镇', 3);
INSERT INTO `pmo_ares` VALUES (1863, 221, '张浦镇', 3);
INSERT INTO `pmo_ares` VALUES (1864, 221, '周庄镇', 3);
INSERT INTO `pmo_ares` VALUES (1865, 221, '千灯镇', 3);
INSERT INTO `pmo_ares` VALUES (1866, 221, '锦溪镇', 3);
INSERT INTO `pmo_ares` VALUES (1867, 221, '开发区', 3);
INSERT INTO `pmo_ares` VALUES (1868, 221, '吴江市', 3);
INSERT INTO `pmo_ares` VALUES (1869, 221, '太仓市', 3);
INSERT INTO `pmo_ares` VALUES (1870, 222, '崇安区', 3);
INSERT INTO `pmo_ares` VALUES (1871, 222, '北塘区', 3);
INSERT INTO `pmo_ares` VALUES (1872, 222, '南长区', 3);
INSERT INTO `pmo_ares` VALUES (1873, 222, '锡山区', 3);
INSERT INTO `pmo_ares` VALUES (1874, 222, '惠山区', 3);
INSERT INTO `pmo_ares` VALUES (1875, 222, '滨湖区', 3);
INSERT INTO `pmo_ares` VALUES (1876, 222, '新区', 3);
INSERT INTO `pmo_ares` VALUES (1877, 222, '江阴市', 3);
INSERT INTO `pmo_ares` VALUES (1878, 222, '宜兴市', 3);
INSERT INTO `pmo_ares` VALUES (1879, 223, '天宁区', 3);
INSERT INTO `pmo_ares` VALUES (1880, 223, '钟楼区', 3);
INSERT INTO `pmo_ares` VALUES (1881, 223, '戚墅堰区', 3);
INSERT INTO `pmo_ares` VALUES (1882, 223, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (1883, 223, '新北区', 3);
INSERT INTO `pmo_ares` VALUES (1884, 223, '武进区', 3);
INSERT INTO `pmo_ares` VALUES (1885, 223, '溧阳市', 3);
INSERT INTO `pmo_ares` VALUES (1886, 223, '金坛市', 3);
INSERT INTO `pmo_ares` VALUES (1887, 224, '清河区', 3);
INSERT INTO `pmo_ares` VALUES (1888, 224, '清浦区', 3);
INSERT INTO `pmo_ares` VALUES (1889, 224, '楚州区', 3);
INSERT INTO `pmo_ares` VALUES (1890, 224, '淮阴区', 3);
INSERT INTO `pmo_ares` VALUES (1891, 224, '涟水县', 3);
INSERT INTO `pmo_ares` VALUES (1892, 224, '洪泽县', 3);
INSERT INTO `pmo_ares` VALUES (1893, 224, '盱眙县', 3);
INSERT INTO `pmo_ares` VALUES (1894, 224, '金湖县', 3);
INSERT INTO `pmo_ares` VALUES (1895, 225, '新浦区', 3);
INSERT INTO `pmo_ares` VALUES (1896, 225, '连云区', 3);
INSERT INTO `pmo_ares` VALUES (1897, 225, '海州区', 3);
INSERT INTO `pmo_ares` VALUES (1898, 225, '赣榆县', 3);
INSERT INTO `pmo_ares` VALUES (1899, 225, '东海县', 3);
INSERT INTO `pmo_ares` VALUES (1900, 225, '灌云县', 3);
INSERT INTO `pmo_ares` VALUES (1901, 225, '灌南县', 3);
INSERT INTO `pmo_ares` VALUES (1902, 226, '崇川区', 3);
INSERT INTO `pmo_ares` VALUES (1903, 226, '港闸区', 3);
INSERT INTO `pmo_ares` VALUES (1904, 226, '经济开发区', 3);
INSERT INTO `pmo_ares` VALUES (1905, 226, '启东市', 3);
INSERT INTO `pmo_ares` VALUES (1906, 226, '如皋市', 3);
INSERT INTO `pmo_ares` VALUES (1907, 226, '通州市', 3);
INSERT INTO `pmo_ares` VALUES (1908, 226, '海门市', 3);
INSERT INTO `pmo_ares` VALUES (1909, 226, '海安县', 3);
INSERT INTO `pmo_ares` VALUES (1910, 226, '如东县', 3);
INSERT INTO `pmo_ares` VALUES (1911, 227, '宿城区', 3);
INSERT INTO `pmo_ares` VALUES (1912, 227, '宿豫区', 3);
INSERT INTO `pmo_ares` VALUES (1913, 227, '宿豫县', 3);
INSERT INTO `pmo_ares` VALUES (1914, 227, '沭阳县', 3);
INSERT INTO `pmo_ares` VALUES (1915, 227, '泗阳县', 3);
INSERT INTO `pmo_ares` VALUES (1916, 227, '泗洪县', 3);
INSERT INTO `pmo_ares` VALUES (1917, 228, '海陵区', 3);
INSERT INTO `pmo_ares` VALUES (1918, 228, '高港区', 3);
INSERT INTO `pmo_ares` VALUES (1919, 228, '兴化市', 3);
INSERT INTO `pmo_ares` VALUES (1920, 228, '靖江市', 3);
INSERT INTO `pmo_ares` VALUES (1921, 228, '泰兴市', 3);
INSERT INTO `pmo_ares` VALUES (1922, 228, '姜堰市', 3);
INSERT INTO `pmo_ares` VALUES (1923, 229, '云龙区', 3);
INSERT INTO `pmo_ares` VALUES (1924, 229, '鼓楼区', 3);
INSERT INTO `pmo_ares` VALUES (1925, 229, '九里区', 3);
INSERT INTO `pmo_ares` VALUES (1926, 229, '贾汪区', 3);
INSERT INTO `pmo_ares` VALUES (1927, 229, '泉山区', 3);
INSERT INTO `pmo_ares` VALUES (1928, 229, '新沂市', 3);
INSERT INTO `pmo_ares` VALUES (1929, 229, '邳州市', 3);
INSERT INTO `pmo_ares` VALUES (1930, 229, '丰县', 3);
INSERT INTO `pmo_ares` VALUES (1931, 229, '沛县', 3);
INSERT INTO `pmo_ares` VALUES (1932, 229, '铜山县', 3);
INSERT INTO `pmo_ares` VALUES (1933, 229, '睢宁县', 3);
INSERT INTO `pmo_ares` VALUES (1934, 230, '城区', 3);
INSERT INTO `pmo_ares` VALUES (1935, 230, '亭湖区', 3);
INSERT INTO `pmo_ares` VALUES (1936, 230, '盐都区', 3);
INSERT INTO `pmo_ares` VALUES (1937, 230, '盐都县', 3);
INSERT INTO `pmo_ares` VALUES (1938, 230, '东台市', 3);
INSERT INTO `pmo_ares` VALUES (1939, 230, '大丰市', 3);
INSERT INTO `pmo_ares` VALUES (1940, 230, '响水县', 3);
INSERT INTO `pmo_ares` VALUES (1941, 230, '滨海县', 3);
INSERT INTO `pmo_ares` VALUES (1942, 230, '阜宁县', 3);
INSERT INTO `pmo_ares` VALUES (1943, 230, '射阳县', 3);
INSERT INTO `pmo_ares` VALUES (1944, 230, '建湖县', 3);
INSERT INTO `pmo_ares` VALUES (1945, 231, '广陵区', 3);
INSERT INTO `pmo_ares` VALUES (1946, 231, '维扬区', 3);
INSERT INTO `pmo_ares` VALUES (1947, 231, '邗江区', 3);
INSERT INTO `pmo_ares` VALUES (1948, 231, '仪征市', 3);
INSERT INTO `pmo_ares` VALUES (1949, 231, '高邮市', 3);
INSERT INTO `pmo_ares` VALUES (1950, 231, '江都市', 3);
INSERT INTO `pmo_ares` VALUES (1951, 231, '宝应县', 3);
INSERT INTO `pmo_ares` VALUES (1952, 232, '京口区', 3);
INSERT INTO `pmo_ares` VALUES (1953, 232, '润州区', 3);
INSERT INTO `pmo_ares` VALUES (1954, 232, '丹徒区', 3);
INSERT INTO `pmo_ares` VALUES (1955, 232, '丹阳市', 3);
INSERT INTO `pmo_ares` VALUES (1956, 232, '扬中市', 3);
INSERT INTO `pmo_ares` VALUES (1957, 232, '句容市', 3);
INSERT INTO `pmo_ares` VALUES (1958, 233, '东湖区', 3);
INSERT INTO `pmo_ares` VALUES (1959, 233, '西湖区', 3);
INSERT INTO `pmo_ares` VALUES (1960, 233, '青云谱区', 3);
INSERT INTO `pmo_ares` VALUES (1961, 233, '湾里区', 3);
INSERT INTO `pmo_ares` VALUES (1962, 233, '青山湖区', 3);
INSERT INTO `pmo_ares` VALUES (1963, 233, '红谷滩新区', 3);
INSERT INTO `pmo_ares` VALUES (1964, 233, '昌北区', 3);
INSERT INTO `pmo_ares` VALUES (1965, 233, '高新区', 3);
INSERT INTO `pmo_ares` VALUES (1966, 233, '南昌县', 3);
INSERT INTO `pmo_ares` VALUES (1967, 233, '新建县', 3);
INSERT INTO `pmo_ares` VALUES (1968, 233, '安义县', 3);
INSERT INTO `pmo_ares` VALUES (1969, 233, '进贤县', 3);
INSERT INTO `pmo_ares` VALUES (1970, 234, '临川区', 3);
INSERT INTO `pmo_ares` VALUES (1971, 234, '南城县', 3);
INSERT INTO `pmo_ares` VALUES (1972, 234, '黎川县', 3);
INSERT INTO `pmo_ares` VALUES (1973, 234, '南丰县', 3);
INSERT INTO `pmo_ares` VALUES (1974, 234, '崇仁县', 3);
INSERT INTO `pmo_ares` VALUES (1975, 234, '乐安县', 3);
INSERT INTO `pmo_ares` VALUES (1976, 234, '宜黄县', 3);
INSERT INTO `pmo_ares` VALUES (1977, 234, '金溪县', 3);
INSERT INTO `pmo_ares` VALUES (1978, 234, '资溪县', 3);
INSERT INTO `pmo_ares` VALUES (1979, 234, '东乡县', 3);
INSERT INTO `pmo_ares` VALUES (1980, 234, '广昌县', 3);
INSERT INTO `pmo_ares` VALUES (1981, 235, '章贡区', 3);
INSERT INTO `pmo_ares` VALUES (1982, 235, '于都县', 3);
INSERT INTO `pmo_ares` VALUES (1983, 235, '瑞金市', 3);
INSERT INTO `pmo_ares` VALUES (1984, 235, '南康市', 3);
INSERT INTO `pmo_ares` VALUES (1985, 235, '赣县', 3);
INSERT INTO `pmo_ares` VALUES (1986, 235, '信丰县', 3);
INSERT INTO `pmo_ares` VALUES (1987, 235, '大余县', 3);
INSERT INTO `pmo_ares` VALUES (1988, 235, '上犹县', 3);
INSERT INTO `pmo_ares` VALUES (1989, 235, '崇义县', 3);
INSERT INTO `pmo_ares` VALUES (1990, 235, '安远县', 3);
INSERT INTO `pmo_ares` VALUES (1991, 235, '龙南县', 3);
INSERT INTO `pmo_ares` VALUES (1992, 235, '定南县', 3);
INSERT INTO `pmo_ares` VALUES (1993, 235, '全南县', 3);
INSERT INTO `pmo_ares` VALUES (1994, 235, '宁都县', 3);
INSERT INTO `pmo_ares` VALUES (1995, 235, '兴国县', 3);
INSERT INTO `pmo_ares` VALUES (1996, 235, '会昌县', 3);
INSERT INTO `pmo_ares` VALUES (1997, 235, '寻乌县', 3);
INSERT INTO `pmo_ares` VALUES (1998, 235, '石城县', 3);
INSERT INTO `pmo_ares` VALUES (1999, 236, '安福县', 3);
INSERT INTO `pmo_ares` VALUES (2000, 236, '吉州区', 3);
INSERT INTO `pmo_ares` VALUES (2001, 236, '青原区', 3);
INSERT INTO `pmo_ares` VALUES (2002, 236, '井冈山市', 3);
INSERT INTO `pmo_ares` VALUES (2003, 236, '吉安县', 3);
INSERT INTO `pmo_ares` VALUES (2004, 236, '吉水县', 3);
INSERT INTO `pmo_ares` VALUES (2005, 236, '峡江县', 3);
INSERT INTO `pmo_ares` VALUES (2006, 236, '新干县', 3);
INSERT INTO `pmo_ares` VALUES (2007, 236, '永丰县', 3);
INSERT INTO `pmo_ares` VALUES (2008, 236, '泰和县', 3);
INSERT INTO `pmo_ares` VALUES (2009, 236, '遂川县', 3);
INSERT INTO `pmo_ares` VALUES (2010, 236, '万安县', 3);
INSERT INTO `pmo_ares` VALUES (2011, 236, '永新县', 3);
INSERT INTO `pmo_ares` VALUES (2012, 237, '珠山区', 3);
INSERT INTO `pmo_ares` VALUES (2013, 237, '昌江区', 3);
INSERT INTO `pmo_ares` VALUES (2014, 237, '乐平市', 3);
INSERT INTO `pmo_ares` VALUES (2015, 237, '浮梁县', 3);
INSERT INTO `pmo_ares` VALUES (2016, 238, '浔阳区', 3);
INSERT INTO `pmo_ares` VALUES (2017, 238, '庐山区', 3);
INSERT INTO `pmo_ares` VALUES (2018, 238, '瑞昌市', 3);
INSERT INTO `pmo_ares` VALUES (2019, 238, '九江县', 3);
INSERT INTO `pmo_ares` VALUES (2020, 238, '武宁县', 3);
INSERT INTO `pmo_ares` VALUES (2021, 238, '修水县', 3);
INSERT INTO `pmo_ares` VALUES (2022, 238, '永修县', 3);
INSERT INTO `pmo_ares` VALUES (2023, 238, '德安县', 3);
INSERT INTO `pmo_ares` VALUES (2024, 238, '星子县', 3);
INSERT INTO `pmo_ares` VALUES (2025, 238, '都昌县', 3);
INSERT INTO `pmo_ares` VALUES (2026, 238, '湖口县', 3);
INSERT INTO `pmo_ares` VALUES (2027, 238, '彭泽县', 3);
INSERT INTO `pmo_ares` VALUES (2028, 239, '安源区', 3);
INSERT INTO `pmo_ares` VALUES (2029, 239, '湘东区', 3);
INSERT INTO `pmo_ares` VALUES (2030, 239, '莲花县', 3);
INSERT INTO `pmo_ares` VALUES (2031, 239, '芦溪县', 3);
INSERT INTO `pmo_ares` VALUES (2032, 239, '上栗县', 3);
INSERT INTO `pmo_ares` VALUES (2033, 240, '信州区', 3);
INSERT INTO `pmo_ares` VALUES (2034, 240, '德兴市', 3);
INSERT INTO `pmo_ares` VALUES (2035, 240, '上饶县', 3);
INSERT INTO `pmo_ares` VALUES (2036, 240, '广丰县', 3);
INSERT INTO `pmo_ares` VALUES (2037, 240, '玉山县', 3);
INSERT INTO `pmo_ares` VALUES (2038, 240, '铅山县', 3);
INSERT INTO `pmo_ares` VALUES (2039, 240, '横峰县', 3);
INSERT INTO `pmo_ares` VALUES (2040, 240, '弋阳县', 3);
INSERT INTO `pmo_ares` VALUES (2041, 240, '余干县', 3);
INSERT INTO `pmo_ares` VALUES (2042, 240, '波阳县', 3);
INSERT INTO `pmo_ares` VALUES (2043, 240, '万年县', 3);
INSERT INTO `pmo_ares` VALUES (2044, 240, '婺源县', 3);
INSERT INTO `pmo_ares` VALUES (2045, 241, '渝水区', 3);
INSERT INTO `pmo_ares` VALUES (2046, 241, '分宜县', 3);
INSERT INTO `pmo_ares` VALUES (2047, 242, '袁州区', 3);
INSERT INTO `pmo_ares` VALUES (2048, 242, '丰城市', 3);
INSERT INTO `pmo_ares` VALUES (2049, 242, '樟树市', 3);
INSERT INTO `pmo_ares` VALUES (2050, 242, '高安市', 3);
INSERT INTO `pmo_ares` VALUES (2051, 242, '奉新县', 3);
INSERT INTO `pmo_ares` VALUES (2052, 242, '万载县', 3);
INSERT INTO `pmo_ares` VALUES (2053, 242, '上高县', 3);
INSERT INTO `pmo_ares` VALUES (2054, 242, '宜丰县', 3);
INSERT INTO `pmo_ares` VALUES (2055, 242, '靖安县', 3);
INSERT INTO `pmo_ares` VALUES (2056, 242, '铜鼓县', 3);
INSERT INTO `pmo_ares` VALUES (2057, 243, '月湖区', 3);
INSERT INTO `pmo_ares` VALUES (2058, 243, '贵溪市', 3);
INSERT INTO `pmo_ares` VALUES (2059, 243, '余江县', 3);
INSERT INTO `pmo_ares` VALUES (2060, 244, '沈河区', 3);
INSERT INTO `pmo_ares` VALUES (2061, 244, '皇姑区', 3);
INSERT INTO `pmo_ares` VALUES (2062, 244, '和平区', 3);
INSERT INTO `pmo_ares` VALUES (2063, 244, '大东区', 3);
INSERT INTO `pmo_ares` VALUES (2064, 244, '铁西区', 3);
INSERT INTO `pmo_ares` VALUES (2065, 244, '苏家屯区', 3);
INSERT INTO `pmo_ares` VALUES (2066, 244, '东陵区', 3);
INSERT INTO `pmo_ares` VALUES (2067, 244, '沈北新区', 3);
INSERT INTO `pmo_ares` VALUES (2068, 244, '于洪区', 3);
INSERT INTO `pmo_ares` VALUES (2069, 244, '浑南新区', 3);
INSERT INTO `pmo_ares` VALUES (2070, 244, '新民市', 3);
INSERT INTO `pmo_ares` VALUES (2071, 244, '辽中县', 3);
INSERT INTO `pmo_ares` VALUES (2072, 244, '康平县', 3);
INSERT INTO `pmo_ares` VALUES (2073, 244, '法库县', 3);
INSERT INTO `pmo_ares` VALUES (2074, 245, '西岗区', 3);
INSERT INTO `pmo_ares` VALUES (2075, 245, '中山区', 3);
INSERT INTO `pmo_ares` VALUES (2076, 245, '沙河口区', 3);
INSERT INTO `pmo_ares` VALUES (2077, 245, '甘井子区', 3);
INSERT INTO `pmo_ares` VALUES (2078, 245, '旅顺口区', 3);
INSERT INTO `pmo_ares` VALUES (2079, 245, '金州区', 3);
INSERT INTO `pmo_ares` VALUES (2080, 245, '开发区', 3);
INSERT INTO `pmo_ares` VALUES (2081, 245, '瓦房店市', 3);
INSERT INTO `pmo_ares` VALUES (2082, 245, '普兰店市', 3);
INSERT INTO `pmo_ares` VALUES (2083, 245, '庄河市', 3);
INSERT INTO `pmo_ares` VALUES (2084, 245, '长海县', 3);
INSERT INTO `pmo_ares` VALUES (2085, 246, '铁东区', 3);
INSERT INTO `pmo_ares` VALUES (2086, 246, '铁西区', 3);
INSERT INTO `pmo_ares` VALUES (2087, 246, '立山区', 3);
INSERT INTO `pmo_ares` VALUES (2088, 246, '千山区', 3);
INSERT INTO `pmo_ares` VALUES (2089, 246, '岫岩', 3);
INSERT INTO `pmo_ares` VALUES (2090, 246, '海城市', 3);
INSERT INTO `pmo_ares` VALUES (2091, 246, '台安县', 3);
INSERT INTO `pmo_ares` VALUES (2092, 247, '本溪', 3);
INSERT INTO `pmo_ares` VALUES (2093, 247, '平山区', 3);
INSERT INTO `pmo_ares` VALUES (2094, 247, '明山区', 3);
INSERT INTO `pmo_ares` VALUES (2095, 247, '溪湖区', 3);
INSERT INTO `pmo_ares` VALUES (2096, 247, '南芬区', 3);
INSERT INTO `pmo_ares` VALUES (2097, 247, '桓仁', 3);
INSERT INTO `pmo_ares` VALUES (2098, 248, '双塔区', 3);
INSERT INTO `pmo_ares` VALUES (2099, 248, '龙城区', 3);
INSERT INTO `pmo_ares` VALUES (2100, 248, '喀喇沁左翼蒙古族自治县', 3);
INSERT INTO `pmo_ares` VALUES (2101, 248, '北票市', 3);
INSERT INTO `pmo_ares` VALUES (2102, 248, '凌源市', 3);
INSERT INTO `pmo_ares` VALUES (2103, 248, '朝阳县', 3);
INSERT INTO `pmo_ares` VALUES (2104, 248, '建平县', 3);
INSERT INTO `pmo_ares` VALUES (2105, 249, '振兴区', 3);
INSERT INTO `pmo_ares` VALUES (2106, 249, '元宝区', 3);
INSERT INTO `pmo_ares` VALUES (2107, 249, '振安区', 3);
INSERT INTO `pmo_ares` VALUES (2108, 249, '宽甸', 3);
INSERT INTO `pmo_ares` VALUES (2109, 249, '东港市', 3);
INSERT INTO `pmo_ares` VALUES (2110, 249, '凤城市', 3);
INSERT INTO `pmo_ares` VALUES (2111, 250, '顺城区', 3);
INSERT INTO `pmo_ares` VALUES (2112, 250, '新抚区', 3);
INSERT INTO `pmo_ares` VALUES (2113, 250, '东洲区', 3);
INSERT INTO `pmo_ares` VALUES (2114, 250, '望花区', 3);
INSERT INTO `pmo_ares` VALUES (2115, 250, '清原', 3);
INSERT INTO `pmo_ares` VALUES (2116, 250, '新宾', 3);
INSERT INTO `pmo_ares` VALUES (2117, 250, '抚顺县', 3);
INSERT INTO `pmo_ares` VALUES (2118, 251, '阜新', 3);
INSERT INTO `pmo_ares` VALUES (2119, 251, '海州区', 3);
INSERT INTO `pmo_ares` VALUES (2120, 251, '新邱区', 3);
INSERT INTO `pmo_ares` VALUES (2121, 251, '太平区', 3);
INSERT INTO `pmo_ares` VALUES (2122, 251, '清河门区', 3);
INSERT INTO `pmo_ares` VALUES (2123, 251, '细河区', 3);
INSERT INTO `pmo_ares` VALUES (2124, 251, '彰武县', 3);
INSERT INTO `pmo_ares` VALUES (2125, 252, '龙港区', 3);
INSERT INTO `pmo_ares` VALUES (2126, 252, '南票区', 3);
INSERT INTO `pmo_ares` VALUES (2127, 252, '连山区', 3);
INSERT INTO `pmo_ares` VALUES (2128, 252, '兴城市', 3);
INSERT INTO `pmo_ares` VALUES (2129, 252, '绥中县', 3);
INSERT INTO `pmo_ares` VALUES (2130, 252, '建昌县', 3);
INSERT INTO `pmo_ares` VALUES (2131, 253, '太和区', 3);
INSERT INTO `pmo_ares` VALUES (2132, 253, '古塔区', 3);
INSERT INTO `pmo_ares` VALUES (2133, 253, '凌河区', 3);
INSERT INTO `pmo_ares` VALUES (2134, 253, '凌海市', 3);
INSERT INTO `pmo_ares` VALUES (2135, 253, '北镇市', 3);
INSERT INTO `pmo_ares` VALUES (2136, 253, '黑山县', 3);
INSERT INTO `pmo_ares` VALUES (2137, 253, '义县', 3);
INSERT INTO `pmo_ares` VALUES (2138, 254, '白塔区', 3);
INSERT INTO `pmo_ares` VALUES (2139, 254, '文圣区', 3);
INSERT INTO `pmo_ares` VALUES (2140, 254, '宏伟区', 3);
INSERT INTO `pmo_ares` VALUES (2141, 254, '太子河区', 3);
INSERT INTO `pmo_ares` VALUES (2142, 254, '弓长岭区', 3);
INSERT INTO `pmo_ares` VALUES (2143, 254, '灯塔市', 3);
INSERT INTO `pmo_ares` VALUES (2144, 254, '辽阳县', 3);
INSERT INTO `pmo_ares` VALUES (2145, 255, '双台子区', 3);
INSERT INTO `pmo_ares` VALUES (2146, 255, '兴隆台区', 3);
INSERT INTO `pmo_ares` VALUES (2147, 255, '大洼县', 3);
INSERT INTO `pmo_ares` VALUES (2148, 255, '盘山县', 3);
INSERT INTO `pmo_ares` VALUES (2149, 256, '银州区', 3);
INSERT INTO `pmo_ares` VALUES (2150, 256, '清河区', 3);
INSERT INTO `pmo_ares` VALUES (2151, 256, '调兵山市', 3);
INSERT INTO `pmo_ares` VALUES (2152, 256, '开原市', 3);
INSERT INTO `pmo_ares` VALUES (2153, 256, '铁岭县', 3);
INSERT INTO `pmo_ares` VALUES (2154, 256, '西丰县', 3);
INSERT INTO `pmo_ares` VALUES (2155, 256, '昌图县', 3);
INSERT INTO `pmo_ares` VALUES (2156, 257, '站前区', 3);
INSERT INTO `pmo_ares` VALUES (2157, 257, '西市区', 3);
INSERT INTO `pmo_ares` VALUES (2158, 257, '鲅鱼圈区', 3);
INSERT INTO `pmo_ares` VALUES (2159, 257, '老边区', 3);
INSERT INTO `pmo_ares` VALUES (2160, 257, '盖州市', 3);
INSERT INTO `pmo_ares` VALUES (2161, 257, '大石桥市', 3);
INSERT INTO `pmo_ares` VALUES (2162, 258, '回民区', 3);
INSERT INTO `pmo_ares` VALUES (2163, 258, '玉泉区', 3);
INSERT INTO `pmo_ares` VALUES (2164, 258, '新城区', 3);
INSERT INTO `pmo_ares` VALUES (2165, 258, '赛罕区', 3);
INSERT INTO `pmo_ares` VALUES (2166, 258, '清水河县', 3);
INSERT INTO `pmo_ares` VALUES (2167, 258, '土默特左旗', 3);
INSERT INTO `pmo_ares` VALUES (2168, 258, '托克托县', 3);
INSERT INTO `pmo_ares` VALUES (2169, 258, '和林格尔县', 3);
INSERT INTO `pmo_ares` VALUES (2170, 258, '武川县', 3);
INSERT INTO `pmo_ares` VALUES (2171, 259, '阿拉善左旗', 3);
INSERT INTO `pmo_ares` VALUES (2172, 259, '阿拉善右旗', 3);
INSERT INTO `pmo_ares` VALUES (2173, 259, '额济纳旗', 3);
INSERT INTO `pmo_ares` VALUES (2174, 260, '临河区', 3);
INSERT INTO `pmo_ares` VALUES (2175, 260, '五原县', 3);
INSERT INTO `pmo_ares` VALUES (2176, 260, '磴口县', 3);
INSERT INTO `pmo_ares` VALUES (2177, 260, '乌拉特前旗', 3);
INSERT INTO `pmo_ares` VALUES (2178, 260, '乌拉特中旗', 3);
INSERT INTO `pmo_ares` VALUES (2179, 260, '乌拉特后旗', 3);
INSERT INTO `pmo_ares` VALUES (2180, 260, '杭锦后旗', 3);
INSERT INTO `pmo_ares` VALUES (2181, 261, '昆都仑区', 3);
INSERT INTO `pmo_ares` VALUES (2182, 261, '青山区', 3);
INSERT INTO `pmo_ares` VALUES (2183, 261, '东河区', 3);
INSERT INTO `pmo_ares` VALUES (2184, 261, '九原区', 3);
INSERT INTO `pmo_ares` VALUES (2185, 261, '石拐区', 3);
INSERT INTO `pmo_ares` VALUES (2186, 261, '白云矿区', 3);
INSERT INTO `pmo_ares` VALUES (2187, 261, '土默特右旗', 3);
INSERT INTO `pmo_ares` VALUES (2188, 261, '固阳县', 3);
INSERT INTO `pmo_ares` VALUES (2189, 261, '达尔罕茂明安联合旗', 3);
INSERT INTO `pmo_ares` VALUES (2190, 262, '红山区', 3);
INSERT INTO `pmo_ares` VALUES (2191, 262, '元宝山区', 3);
INSERT INTO `pmo_ares` VALUES (2192, 262, '松山区', 3);
INSERT INTO `pmo_ares` VALUES (2193, 262, '阿鲁科尔沁旗', 3);
INSERT INTO `pmo_ares` VALUES (2194, 262, '巴林左旗', 3);
INSERT INTO `pmo_ares` VALUES (2195, 262, '巴林右旗', 3);
INSERT INTO `pmo_ares` VALUES (2196, 262, '林西县', 3);
INSERT INTO `pmo_ares` VALUES (2197, 262, '克什克腾旗', 3);
INSERT INTO `pmo_ares` VALUES (2198, 262, '翁牛特旗', 3);
INSERT INTO `pmo_ares` VALUES (2199, 262, '喀喇沁旗', 3);
INSERT INTO `pmo_ares` VALUES (2200, 262, '宁城县', 3);
INSERT INTO `pmo_ares` VALUES (2201, 262, '敖汉旗', 3);
INSERT INTO `pmo_ares` VALUES (2202, 263, '东胜区', 3);
INSERT INTO `pmo_ares` VALUES (2203, 263, '达拉特旗', 3);
INSERT INTO `pmo_ares` VALUES (2204, 263, '准格尔旗', 3);
INSERT INTO `pmo_ares` VALUES (2205, 263, '鄂托克前旗', 3);
INSERT INTO `pmo_ares` VALUES (2206, 263, '鄂托克旗', 3);
INSERT INTO `pmo_ares` VALUES (2207, 263, '杭锦旗', 3);
INSERT INTO `pmo_ares` VALUES (2208, 263, '乌审旗', 3);
INSERT INTO `pmo_ares` VALUES (2209, 263, '伊金霍洛旗', 3);
INSERT INTO `pmo_ares` VALUES (2210, 264, '海拉尔区', 3);
INSERT INTO `pmo_ares` VALUES (2211, 264, '莫力达瓦', 3);
INSERT INTO `pmo_ares` VALUES (2212, 264, '满洲里市', 3);
INSERT INTO `pmo_ares` VALUES (2213, 264, '牙克石市', 3);
INSERT INTO `pmo_ares` VALUES (2214, 264, '扎兰屯市', 3);
INSERT INTO `pmo_ares` VALUES (2215, 264, '额尔古纳市', 3);
INSERT INTO `pmo_ares` VALUES (2216, 264, '根河市', 3);
INSERT INTO `pmo_ares` VALUES (2217, 264, '阿荣旗', 3);
INSERT INTO `pmo_ares` VALUES (2218, 264, '鄂伦春自治旗', 3);
INSERT INTO `pmo_ares` VALUES (2219, 264, '鄂温克族自治旗', 3);
INSERT INTO `pmo_ares` VALUES (2220, 264, '陈巴尔虎旗', 3);
INSERT INTO `pmo_ares` VALUES (2221, 264, '新巴尔虎左旗', 3);
INSERT INTO `pmo_ares` VALUES (2222, 264, '新巴尔虎右旗', 3);
INSERT INTO `pmo_ares` VALUES (2223, 265, '科尔沁区', 3);
INSERT INTO `pmo_ares` VALUES (2224, 265, '霍林郭勒市', 3);
INSERT INTO `pmo_ares` VALUES (2225, 265, '科尔沁左翼中旗', 3);
INSERT INTO `pmo_ares` VALUES (2226, 265, '科尔沁左翼后旗', 3);
INSERT INTO `pmo_ares` VALUES (2227, 265, '开鲁县', 3);
INSERT INTO `pmo_ares` VALUES (2228, 265, '库伦旗', 3);
INSERT INTO `pmo_ares` VALUES (2229, 265, '奈曼旗', 3);
INSERT INTO `pmo_ares` VALUES (2230, 265, '扎鲁特旗', 3);
INSERT INTO `pmo_ares` VALUES (2231, 266, '海勃湾区', 3);
INSERT INTO `pmo_ares` VALUES (2232, 266, '乌达区', 3);
INSERT INTO `pmo_ares` VALUES (2233, 266, '海南区', 3);
INSERT INTO `pmo_ares` VALUES (2234, 267, '化德县', 3);
INSERT INTO `pmo_ares` VALUES (2235, 267, '集宁区', 3);
INSERT INTO `pmo_ares` VALUES (2236, 267, '丰镇市', 3);
INSERT INTO `pmo_ares` VALUES (2237, 267, '卓资县', 3);
INSERT INTO `pmo_ares` VALUES (2238, 267, '商都县', 3);
INSERT INTO `pmo_ares` VALUES (2239, 267, '兴和县', 3);
INSERT INTO `pmo_ares` VALUES (2240, 267, '凉城县', 3);
INSERT INTO `pmo_ares` VALUES (2241, 267, '察哈尔右翼前旗', 3);
INSERT INTO `pmo_ares` VALUES (2242, 267, '察哈尔右翼中旗', 3);
INSERT INTO `pmo_ares` VALUES (2243, 267, '察哈尔右翼后旗', 3);
INSERT INTO `pmo_ares` VALUES (2244, 267, '四子王旗', 3);
INSERT INTO `pmo_ares` VALUES (2245, 268, '二连浩特市', 3);
INSERT INTO `pmo_ares` VALUES (2246, 268, '锡林浩特市', 3);
INSERT INTO `pmo_ares` VALUES (2247, 268, '阿巴嘎旗', 3);
INSERT INTO `pmo_ares` VALUES (2248, 268, '苏尼特左旗', 3);
INSERT INTO `pmo_ares` VALUES (2249, 268, '苏尼特右旗', 3);
INSERT INTO `pmo_ares` VALUES (2250, 268, '东乌珠穆沁旗', 3);
INSERT INTO `pmo_ares` VALUES (2251, 268, '西乌珠穆沁旗', 3);
INSERT INTO `pmo_ares` VALUES (2252, 268, '太仆寺旗', 3);
INSERT INTO `pmo_ares` VALUES (2253, 268, '镶黄旗', 3);
INSERT INTO `pmo_ares` VALUES (2254, 268, '正镶白旗', 3);
INSERT INTO `pmo_ares` VALUES (2255, 268, '正蓝旗', 3);
INSERT INTO `pmo_ares` VALUES (2256, 268, '多伦县', 3);
INSERT INTO `pmo_ares` VALUES (2257, 269, '乌兰浩特市', 3);
INSERT INTO `pmo_ares` VALUES (2258, 269, '阿尔山市', 3);
INSERT INTO `pmo_ares` VALUES (2259, 269, '科尔沁右翼前旗', 3);
INSERT INTO `pmo_ares` VALUES (2260, 269, '科尔沁右翼中旗', 3);
INSERT INTO `pmo_ares` VALUES (2261, 269, '扎赉特旗', 3);
INSERT INTO `pmo_ares` VALUES (2262, 269, '突泉县', 3);
INSERT INTO `pmo_ares` VALUES (2263, 270, '西夏区', 3);
INSERT INTO `pmo_ares` VALUES (2264, 270, '金凤区', 3);
INSERT INTO `pmo_ares` VALUES (2265, 270, '兴庆区', 3);
INSERT INTO `pmo_ares` VALUES (2266, 270, '灵武市', 3);
INSERT INTO `pmo_ares` VALUES (2267, 270, '永宁县', 3);
INSERT INTO `pmo_ares` VALUES (2268, 270, '贺兰县', 3);
INSERT INTO `pmo_ares` VALUES (2269, 271, '原州区', 3);
INSERT INTO `pmo_ares` VALUES (2270, 271, '海原县', 3);
INSERT INTO `pmo_ares` VALUES (2271, 271, '西吉县', 3);
INSERT INTO `pmo_ares` VALUES (2272, 271, '隆德县', 3);
INSERT INTO `pmo_ares` VALUES (2273, 271, '泾源县', 3);
INSERT INTO `pmo_ares` VALUES (2274, 271, '彭阳县', 3);
INSERT INTO `pmo_ares` VALUES (2275, 272, '惠农县', 3);
INSERT INTO `pmo_ares` VALUES (2276, 272, '大武口区', 3);
INSERT INTO `pmo_ares` VALUES (2277, 272, '惠农区', 3);
INSERT INTO `pmo_ares` VALUES (2278, 272, '陶乐县', 3);
INSERT INTO `pmo_ares` VALUES (2279, 272, '平罗县', 3);
INSERT INTO `pmo_ares` VALUES (2280, 273, '利通区', 3);
INSERT INTO `pmo_ares` VALUES (2281, 273, '中卫县', 3);
INSERT INTO `pmo_ares` VALUES (2282, 273, '青铜峡市', 3);
INSERT INTO `pmo_ares` VALUES (2283, 273, '中宁县', 3);
INSERT INTO `pmo_ares` VALUES (2284, 273, '盐池县', 3);
INSERT INTO `pmo_ares` VALUES (2285, 273, '同心县', 3);
INSERT INTO `pmo_ares` VALUES (2286, 274, '沙坡头区', 3);
INSERT INTO `pmo_ares` VALUES (2287, 274, '海原县', 3);
INSERT INTO `pmo_ares` VALUES (2288, 274, '中宁县', 3);
INSERT INTO `pmo_ares` VALUES (2289, 275, '城中区', 3);
INSERT INTO `pmo_ares` VALUES (2290, 275, '城东区', 3);
INSERT INTO `pmo_ares` VALUES (2291, 275, '城西区', 3);
INSERT INTO `pmo_ares` VALUES (2292, 275, '城北区', 3);
INSERT INTO `pmo_ares` VALUES (2293, 275, '湟中县', 3);
INSERT INTO `pmo_ares` VALUES (2294, 275, '湟源县', 3);
INSERT INTO `pmo_ares` VALUES (2295, 275, '大通', 3);
INSERT INTO `pmo_ares` VALUES (2296, 276, '玛沁县', 3);
INSERT INTO `pmo_ares` VALUES (2297, 276, '班玛县', 3);
INSERT INTO `pmo_ares` VALUES (2298, 276, '甘德县', 3);
INSERT INTO `pmo_ares` VALUES (2299, 276, '达日县', 3);
INSERT INTO `pmo_ares` VALUES (2300, 276, '久治县', 3);
INSERT INTO `pmo_ares` VALUES (2301, 276, '玛多县', 3);
INSERT INTO `pmo_ares` VALUES (2302, 277, '海晏县', 3);
INSERT INTO `pmo_ares` VALUES (2303, 277, '祁连县', 3);
INSERT INTO `pmo_ares` VALUES (2304, 277, '刚察县', 3);
INSERT INTO `pmo_ares` VALUES (2305, 277, '门源', 3);
INSERT INTO `pmo_ares` VALUES (2306, 278, '平安县', 3);
INSERT INTO `pmo_ares` VALUES (2307, 278, '乐都县', 3);
INSERT INTO `pmo_ares` VALUES (2308, 278, '民和', 3);
INSERT INTO `pmo_ares` VALUES (2309, 278, '互助', 3);
INSERT INTO `pmo_ares` VALUES (2310, 278, '化隆', 3);
INSERT INTO `pmo_ares` VALUES (2311, 278, '循化', 3);
INSERT INTO `pmo_ares` VALUES (2312, 279, '共和县', 3);
INSERT INTO `pmo_ares` VALUES (2313, 279, '同德县', 3);
INSERT INTO `pmo_ares` VALUES (2314, 279, '贵德县', 3);
INSERT INTO `pmo_ares` VALUES (2315, 279, '兴海县', 3);
INSERT INTO `pmo_ares` VALUES (2316, 279, '贵南县', 3);
INSERT INTO `pmo_ares` VALUES (2317, 280, '德令哈市', 3);
INSERT INTO `pmo_ares` VALUES (2318, 280, '格尔木市', 3);
INSERT INTO `pmo_ares` VALUES (2319, 280, '乌兰县', 3);
INSERT INTO `pmo_ares` VALUES (2320, 280, '都兰县', 3);
INSERT INTO `pmo_ares` VALUES (2321, 280, '天峻县', 3);
INSERT INTO `pmo_ares` VALUES (2322, 281, '同仁县', 3);
INSERT INTO `pmo_ares` VALUES (2323, 281, '尖扎县', 3);
INSERT INTO `pmo_ares` VALUES (2324, 281, '泽库县', 3);
INSERT INTO `pmo_ares` VALUES (2325, 281, '河南蒙古族自治县', 3);
INSERT INTO `pmo_ares` VALUES (2326, 282, '玉树县', 3);
INSERT INTO `pmo_ares` VALUES (2327, 282, '杂多县', 3);
INSERT INTO `pmo_ares` VALUES (2328, 282, '称多县', 3);
INSERT INTO `pmo_ares` VALUES (2329, 282, '治多县', 3);
INSERT INTO `pmo_ares` VALUES (2330, 282, '囊谦县', 3);
INSERT INTO `pmo_ares` VALUES (2331, 282, '曲麻莱县', 3);
INSERT INTO `pmo_ares` VALUES (2332, 283, '市中区', 3);
INSERT INTO `pmo_ares` VALUES (2333, 283, '历下区', 3);
INSERT INTO `pmo_ares` VALUES (2334, 283, '天桥区', 3);
INSERT INTO `pmo_ares` VALUES (2335, 283, '槐荫区', 3);
INSERT INTO `pmo_ares` VALUES (2336, 283, '历城区', 3);
INSERT INTO `pmo_ares` VALUES (2337, 283, '长清区', 3);
INSERT INTO `pmo_ares` VALUES (2338, 283, '章丘市', 3);
INSERT INTO `pmo_ares` VALUES (2339, 283, '平阴县', 3);
INSERT INTO `pmo_ares` VALUES (2340, 283, '济阳县', 3);
INSERT INTO `pmo_ares` VALUES (2341, 283, '商河县', 3);
INSERT INTO `pmo_ares` VALUES (2342, 284, '市南区', 3);
INSERT INTO `pmo_ares` VALUES (2343, 284, '市北区', 3);
INSERT INTO `pmo_ares` VALUES (2344, 284, '城阳区', 3);
INSERT INTO `pmo_ares` VALUES (2345, 284, '四方区', 3);
INSERT INTO `pmo_ares` VALUES (2346, 284, '李沧区', 3);
INSERT INTO `pmo_ares` VALUES (2347, 284, '黄岛区', 3);
INSERT INTO `pmo_ares` VALUES (2348, 284, '崂山区', 3);
INSERT INTO `pmo_ares` VALUES (2349, 284, '胶州市', 3);
INSERT INTO `pmo_ares` VALUES (2350, 284, '即墨市', 3);
INSERT INTO `pmo_ares` VALUES (2351, 284, '平度市', 3);
INSERT INTO `pmo_ares` VALUES (2352, 284, '胶南市', 3);
INSERT INTO `pmo_ares` VALUES (2353, 284, '莱西市', 3);
INSERT INTO `pmo_ares` VALUES (2354, 285, '滨城区', 3);
INSERT INTO `pmo_ares` VALUES (2355, 285, '惠民县', 3);
INSERT INTO `pmo_ares` VALUES (2356, 285, '阳信县', 3);
INSERT INTO `pmo_ares` VALUES (2357, 285, '无棣县', 3);
INSERT INTO `pmo_ares` VALUES (2358, 285, '沾化县', 3);
INSERT INTO `pmo_ares` VALUES (2359, 285, '博兴县', 3);
INSERT INTO `pmo_ares` VALUES (2360, 285, '邹平县', 3);
INSERT INTO `pmo_ares` VALUES (2361, 286, '德城区', 3);
INSERT INTO `pmo_ares` VALUES (2362, 286, '陵县', 3);
INSERT INTO `pmo_ares` VALUES (2363, 286, '乐陵市', 3);
INSERT INTO `pmo_ares` VALUES (2364, 286, '禹城市', 3);
INSERT INTO `pmo_ares` VALUES (2365, 286, '宁津县', 3);
INSERT INTO `pmo_ares` VALUES (2366, 286, '庆云县', 3);
INSERT INTO `pmo_ares` VALUES (2367, 286, '临邑县', 3);
INSERT INTO `pmo_ares` VALUES (2368, 286, '齐河县', 3);
INSERT INTO `pmo_ares` VALUES (2369, 286, '平原县', 3);
INSERT INTO `pmo_ares` VALUES (2370, 286, '夏津县', 3);
INSERT INTO `pmo_ares` VALUES (2371, 286, '武城县', 3);
INSERT INTO `pmo_ares` VALUES (2372, 287, '东营区', 3);
INSERT INTO `pmo_ares` VALUES (2373, 287, '河口区', 3);
INSERT INTO `pmo_ares` VALUES (2374, 287, '垦利县', 3);
INSERT INTO `pmo_ares` VALUES (2375, 287, '利津县', 3);
INSERT INTO `pmo_ares` VALUES (2376, 287, '广饶县', 3);
INSERT INTO `pmo_ares` VALUES (2377, 288, '牡丹区', 3);
INSERT INTO `pmo_ares` VALUES (2378, 288, '曹县', 3);
INSERT INTO `pmo_ares` VALUES (2379, 288, '单县', 3);
INSERT INTO `pmo_ares` VALUES (2380, 288, '成武县', 3);
INSERT INTO `pmo_ares` VALUES (2381, 288, '巨野县', 3);
INSERT INTO `pmo_ares` VALUES (2382, 288, '郓城县', 3);
INSERT INTO `pmo_ares` VALUES (2383, 288, '鄄城县', 3);
INSERT INTO `pmo_ares` VALUES (2384, 288, '定陶县', 3);
INSERT INTO `pmo_ares` VALUES (2385, 288, '东明县', 3);
INSERT INTO `pmo_ares` VALUES (2386, 289, '市中区', 3);
INSERT INTO `pmo_ares` VALUES (2387, 289, '任城区', 3);
INSERT INTO `pmo_ares` VALUES (2388, 289, '曲阜市', 3);
INSERT INTO `pmo_ares` VALUES (2389, 289, '兖州市', 3);
INSERT INTO `pmo_ares` VALUES (2390, 289, '邹城市', 3);
INSERT INTO `pmo_ares` VALUES (2391, 289, '微山县', 3);
INSERT INTO `pmo_ares` VALUES (2392, 289, '鱼台县', 3);
INSERT INTO `pmo_ares` VALUES (2393, 289, '金乡县', 3);
INSERT INTO `pmo_ares` VALUES (2394, 289, '嘉祥县', 3);
INSERT INTO `pmo_ares` VALUES (2395, 289, '汶上县', 3);
INSERT INTO `pmo_ares` VALUES (2396, 289, '泗水县', 3);
INSERT INTO `pmo_ares` VALUES (2397, 289, '梁山县', 3);
INSERT INTO `pmo_ares` VALUES (2398, 290, '莱城区', 3);
INSERT INTO `pmo_ares` VALUES (2399, 290, '钢城区', 3);
INSERT INTO `pmo_ares` VALUES (2400, 291, '东昌府区', 3);
INSERT INTO `pmo_ares` VALUES (2401, 291, '临清市', 3);
INSERT INTO `pmo_ares` VALUES (2402, 291, '阳谷县', 3);
INSERT INTO `pmo_ares` VALUES (2403, 291, '莘县', 3);
INSERT INTO `pmo_ares` VALUES (2404, 291, '茌平县', 3);
INSERT INTO `pmo_ares` VALUES (2405, 291, '东阿县', 3);
INSERT INTO `pmo_ares` VALUES (2406, 291, '冠县', 3);
INSERT INTO `pmo_ares` VALUES (2407, 291, '高唐县', 3);
INSERT INTO `pmo_ares` VALUES (2408, 292, '兰山区', 3);
INSERT INTO `pmo_ares` VALUES (2409, 292, '罗庄区', 3);
INSERT INTO `pmo_ares` VALUES (2410, 292, '河东区', 3);
INSERT INTO `pmo_ares` VALUES (2411, 292, '沂南县', 3);
INSERT INTO `pmo_ares` VALUES (2412, 292, '郯城县', 3);
INSERT INTO `pmo_ares` VALUES (2413, 292, '沂水县', 3);
INSERT INTO `pmo_ares` VALUES (2414, 292, '苍山县', 3);
INSERT INTO `pmo_ares` VALUES (2415, 292, '费县', 3);
INSERT INTO `pmo_ares` VALUES (2416, 292, '平邑县', 3);
INSERT INTO `pmo_ares` VALUES (2417, 292, '莒南县', 3);
INSERT INTO `pmo_ares` VALUES (2418, 292, '蒙阴县', 3);
INSERT INTO `pmo_ares` VALUES (2419, 292, '临沭县', 3);
INSERT INTO `pmo_ares` VALUES (2420, 293, '东港区', 3);
INSERT INTO `pmo_ares` VALUES (2421, 293, '岚山区', 3);
INSERT INTO `pmo_ares` VALUES (2422, 293, '五莲县', 3);
INSERT INTO `pmo_ares` VALUES (2423, 293, '莒县', 3);
INSERT INTO `pmo_ares` VALUES (2424, 294, '泰山区', 3);
INSERT INTO `pmo_ares` VALUES (2425, 294, '岱岳区', 3);
INSERT INTO `pmo_ares` VALUES (2426, 294, '新泰市', 3);
INSERT INTO `pmo_ares` VALUES (2427, 294, '肥城市', 3);
INSERT INTO `pmo_ares` VALUES (2428, 294, '宁阳县', 3);
INSERT INTO `pmo_ares` VALUES (2429, 294, '东平县', 3);
INSERT INTO `pmo_ares` VALUES (2430, 295, '荣成市', 3);
INSERT INTO `pmo_ares` VALUES (2431, 295, '乳山市', 3);
INSERT INTO `pmo_ares` VALUES (2432, 295, '环翠区', 3);
INSERT INTO `pmo_ares` VALUES (2433, 295, '文登市', 3);
INSERT INTO `pmo_ares` VALUES (2434, 296, '潍城区', 3);
INSERT INTO `pmo_ares` VALUES (2435, 296, '寒亭区', 3);
INSERT INTO `pmo_ares` VALUES (2436, 296, '坊子区', 3);
INSERT INTO `pmo_ares` VALUES (2437, 296, '奎文区', 3);
INSERT INTO `pmo_ares` VALUES (2438, 296, '青州市', 3);
INSERT INTO `pmo_ares` VALUES (2439, 296, '诸城市', 3);
INSERT INTO `pmo_ares` VALUES (2440, 296, '寿光市', 3);
INSERT INTO `pmo_ares` VALUES (2441, 296, '安丘市', 3);
INSERT INTO `pmo_ares` VALUES (2442, 296, '高密市', 3);
INSERT INTO `pmo_ares` VALUES (2443, 296, '昌邑市', 3);
INSERT INTO `pmo_ares` VALUES (2444, 296, '临朐县', 3);
INSERT INTO `pmo_ares` VALUES (2445, 296, '昌乐县', 3);
INSERT INTO `pmo_ares` VALUES (2446, 297, '芝罘区', 3);
INSERT INTO `pmo_ares` VALUES (2447, 297, '福山区', 3);
INSERT INTO `pmo_ares` VALUES (2448, 297, '牟平区', 3);
INSERT INTO `pmo_ares` VALUES (2449, 297, '莱山区', 3);
INSERT INTO `pmo_ares` VALUES (2450, 297, '开发区', 3);
INSERT INTO `pmo_ares` VALUES (2451, 297, '龙口市', 3);
INSERT INTO `pmo_ares` VALUES (2452, 297, '莱阳市', 3);
INSERT INTO `pmo_ares` VALUES (2453, 297, '莱州市', 3);
INSERT INTO `pmo_ares` VALUES (2454, 297, '蓬莱市', 3);
INSERT INTO `pmo_ares` VALUES (2455, 297, '招远市', 3);
INSERT INTO `pmo_ares` VALUES (2456, 297, '栖霞市', 3);
INSERT INTO `pmo_ares` VALUES (2457, 297, '海阳市', 3);
INSERT INTO `pmo_ares` VALUES (2458, 297, '长岛县', 3);
INSERT INTO `pmo_ares` VALUES (2459, 298, '市中区', 3);
INSERT INTO `pmo_ares` VALUES (2460, 298, '山亭区', 3);
INSERT INTO `pmo_ares` VALUES (2461, 298, '峄城区', 3);
INSERT INTO `pmo_ares` VALUES (2462, 298, '台儿庄区', 3);
INSERT INTO `pmo_ares` VALUES (2463, 298, '薛城区', 3);
INSERT INTO `pmo_ares` VALUES (2464, 298, '滕州市', 3);
INSERT INTO `pmo_ares` VALUES (2465, 299, '张店区', 3);
INSERT INTO `pmo_ares` VALUES (2466, 299, '临淄区', 3);
INSERT INTO `pmo_ares` VALUES (2467, 299, '淄川区', 3);
INSERT INTO `pmo_ares` VALUES (2468, 299, '博山区', 3);
INSERT INTO `pmo_ares` VALUES (2469, 299, '周村区', 3);
INSERT INTO `pmo_ares` VALUES (2470, 299, '桓台县', 3);
INSERT INTO `pmo_ares` VALUES (2471, 299, '高青县', 3);
INSERT INTO `pmo_ares` VALUES (2472, 299, '沂源县', 3);
INSERT INTO `pmo_ares` VALUES (2473, 300, '杏花岭区', 3);
INSERT INTO `pmo_ares` VALUES (2474, 300, '小店区', 3);
INSERT INTO `pmo_ares` VALUES (2475, 300, '迎泽区', 3);
INSERT INTO `pmo_ares` VALUES (2476, 300, '尖草坪区', 3);
INSERT INTO `pmo_ares` VALUES (2477, 300, '万柏林区', 3);
INSERT INTO `pmo_ares` VALUES (2478, 300, '晋源区', 3);
INSERT INTO `pmo_ares` VALUES (2479, 300, '高新开发区', 3);
INSERT INTO `pmo_ares` VALUES (2480, 300, '民营经济开发区', 3);
INSERT INTO `pmo_ares` VALUES (2481, 300, '经济技术开发区', 3);
INSERT INTO `pmo_ares` VALUES (2482, 300, '清徐县', 3);
INSERT INTO `pmo_ares` VALUES (2483, 300, '阳曲县', 3);
INSERT INTO `pmo_ares` VALUES (2484, 300, '娄烦县', 3);
INSERT INTO `pmo_ares` VALUES (2485, 300, '古交市', 3);
INSERT INTO `pmo_ares` VALUES (2486, 301, '城区', 3);
INSERT INTO `pmo_ares` VALUES (2487, 301, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (2488, 301, '沁县', 3);
INSERT INTO `pmo_ares` VALUES (2489, 301, '潞城市', 3);
INSERT INTO `pmo_ares` VALUES (2490, 301, '长治县', 3);
INSERT INTO `pmo_ares` VALUES (2491, 301, '襄垣县', 3);
INSERT INTO `pmo_ares` VALUES (2492, 301, '屯留县', 3);
INSERT INTO `pmo_ares` VALUES (2493, 301, '平顺县', 3);
INSERT INTO `pmo_ares` VALUES (2494, 301, '黎城县', 3);
INSERT INTO `pmo_ares` VALUES (2495, 301, '壶关县', 3);
INSERT INTO `pmo_ares` VALUES (2496, 301, '长子县', 3);
INSERT INTO `pmo_ares` VALUES (2497, 301, '武乡县', 3);
INSERT INTO `pmo_ares` VALUES (2498, 301, '沁源县', 3);
INSERT INTO `pmo_ares` VALUES (2499, 302, '城区', 3);
INSERT INTO `pmo_ares` VALUES (2500, 302, '矿区', 3);
INSERT INTO `pmo_ares` VALUES (2501, 302, '南郊区', 3);
INSERT INTO `pmo_ares` VALUES (2502, 302, '新荣区', 3);
INSERT INTO `pmo_ares` VALUES (2503, 302, '阳高县', 3);
INSERT INTO `pmo_ares` VALUES (2504, 302, '天镇县', 3);
INSERT INTO `pmo_ares` VALUES (2505, 302, '广灵县', 3);
INSERT INTO `pmo_ares` VALUES (2506, 302, '灵丘县', 3);
INSERT INTO `pmo_ares` VALUES (2507, 302, '浑源县', 3);
INSERT INTO `pmo_ares` VALUES (2508, 302, '左云县', 3);
INSERT INTO `pmo_ares` VALUES (2509, 302, '大同县', 3);
INSERT INTO `pmo_ares` VALUES (2510, 303, '城区', 3);
INSERT INTO `pmo_ares` VALUES (2511, 303, '高平市', 3);
INSERT INTO `pmo_ares` VALUES (2512, 303, '沁水县', 3);
INSERT INTO `pmo_ares` VALUES (2513, 303, '阳城县', 3);
INSERT INTO `pmo_ares` VALUES (2514, 303, '陵川县', 3);
INSERT INTO `pmo_ares` VALUES (2515, 303, '泽州县', 3);
INSERT INTO `pmo_ares` VALUES (2516, 304, '榆次区', 3);
INSERT INTO `pmo_ares` VALUES (2517, 304, '介休市', 3);
INSERT INTO `pmo_ares` VALUES (2518, 304, '榆社县', 3);
INSERT INTO `pmo_ares` VALUES (2519, 304, '左权县', 3);
INSERT INTO `pmo_ares` VALUES (2520, 304, '和顺县', 3);
INSERT INTO `pmo_ares` VALUES (2521, 304, '昔阳县', 3);
INSERT INTO `pmo_ares` VALUES (2522, 304, '寿阳县', 3);
INSERT INTO `pmo_ares` VALUES (2523, 304, '太谷县', 3);
INSERT INTO `pmo_ares` VALUES (2524, 304, '祁县', 3);
INSERT INTO `pmo_ares` VALUES (2525, 304, '平遥县', 3);
INSERT INTO `pmo_ares` VALUES (2526, 304, '灵石县', 3);
INSERT INTO `pmo_ares` VALUES (2527, 305, '尧都区', 3);
INSERT INTO `pmo_ares` VALUES (2528, 305, '侯马市', 3);
INSERT INTO `pmo_ares` VALUES (2529, 305, '霍州市', 3);
INSERT INTO `pmo_ares` VALUES (2530, 305, '曲沃县', 3);
INSERT INTO `pmo_ares` VALUES (2531, 305, '翼城县', 3);
INSERT INTO `pmo_ares` VALUES (2532, 305, '襄汾县', 3);
INSERT INTO `pmo_ares` VALUES (2533, 305, '洪洞县', 3);
INSERT INTO `pmo_ares` VALUES (2534, 305, '吉县', 3);
INSERT INTO `pmo_ares` VALUES (2535, 305, '安泽县', 3);
INSERT INTO `pmo_ares` VALUES (2536, 305, '浮山县', 3);
INSERT INTO `pmo_ares` VALUES (2537, 305, '古县', 3);
INSERT INTO `pmo_ares` VALUES (2538, 305, '乡宁县', 3);
INSERT INTO `pmo_ares` VALUES (2539, 305, '大宁县', 3);
INSERT INTO `pmo_ares` VALUES (2540, 305, '隰县', 3);
INSERT INTO `pmo_ares` VALUES (2541, 305, '永和县', 3);
INSERT INTO `pmo_ares` VALUES (2542, 305, '蒲县', 3);
INSERT INTO `pmo_ares` VALUES (2543, 305, '汾西县', 3);
INSERT INTO `pmo_ares` VALUES (2544, 306, '离石市', 3);
INSERT INTO `pmo_ares` VALUES (2545, 306, '离石区', 3);
INSERT INTO `pmo_ares` VALUES (2546, 306, '孝义市', 3);
INSERT INTO `pmo_ares` VALUES (2547, 306, '汾阳市', 3);
INSERT INTO `pmo_ares` VALUES (2548, 306, '文水县', 3);
INSERT INTO `pmo_ares` VALUES (2549, 306, '交城县', 3);
INSERT INTO `pmo_ares` VALUES (2550, 306, '兴县', 3);
INSERT INTO `pmo_ares` VALUES (2551, 306, '临县', 3);
INSERT INTO `pmo_ares` VALUES (2552, 306, '柳林县', 3);
INSERT INTO `pmo_ares` VALUES (2553, 306, '石楼县', 3);
INSERT INTO `pmo_ares` VALUES (2554, 306, '岚县', 3);
INSERT INTO `pmo_ares` VALUES (2555, 306, '方山县', 3);
INSERT INTO `pmo_ares` VALUES (2556, 306, '中阳县', 3);
INSERT INTO `pmo_ares` VALUES (2557, 306, '交口县', 3);
INSERT INTO `pmo_ares` VALUES (2558, 307, '朔城区', 3);
INSERT INTO `pmo_ares` VALUES (2559, 307, '平鲁区', 3);
INSERT INTO `pmo_ares` VALUES (2560, 307, '山阴县', 3);
INSERT INTO `pmo_ares` VALUES (2561, 307, '应县', 3);
INSERT INTO `pmo_ares` VALUES (2562, 307, '右玉县', 3);
INSERT INTO `pmo_ares` VALUES (2563, 307, '怀仁县', 3);
INSERT INTO `pmo_ares` VALUES (2564, 308, '忻府区', 3);
INSERT INTO `pmo_ares` VALUES (2565, 308, '原平市', 3);
INSERT INTO `pmo_ares` VALUES (2566, 308, '定襄县', 3);
INSERT INTO `pmo_ares` VALUES (2567, 308, '五台县', 3);
INSERT INTO `pmo_ares` VALUES (2568, 308, '代县', 3);
INSERT INTO `pmo_ares` VALUES (2569, 308, '繁峙县', 3);
INSERT INTO `pmo_ares` VALUES (2570, 308, '宁武县', 3);
INSERT INTO `pmo_ares` VALUES (2571, 308, '静乐县', 3);
INSERT INTO `pmo_ares` VALUES (2572, 308, '神池县', 3);
INSERT INTO `pmo_ares` VALUES (2573, 308, '五寨县', 3);
INSERT INTO `pmo_ares` VALUES (2574, 308, '岢岚县', 3);
INSERT INTO `pmo_ares` VALUES (2575, 308, '河曲县', 3);
INSERT INTO `pmo_ares` VALUES (2576, 308, '保德县', 3);
INSERT INTO `pmo_ares` VALUES (2577, 308, '偏关县', 3);
INSERT INTO `pmo_ares` VALUES (2578, 309, '城区', 3);
INSERT INTO `pmo_ares` VALUES (2579, 309, '矿区', 3);
INSERT INTO `pmo_ares` VALUES (2580, 309, '郊区', 3);
INSERT INTO `pmo_ares` VALUES (2581, 309, '平定县', 3);
INSERT INTO `pmo_ares` VALUES (2582, 309, '盂县', 3);
INSERT INTO `pmo_ares` VALUES (2583, 310, '盐湖区', 3);
INSERT INTO `pmo_ares` VALUES (2584, 310, '永济市', 3);
INSERT INTO `pmo_ares` VALUES (2585, 310, '河津市', 3);
INSERT INTO `pmo_ares` VALUES (2586, 310, '临猗县', 3);
INSERT INTO `pmo_ares` VALUES (2587, 310, '万荣县', 3);
INSERT INTO `pmo_ares` VALUES (2588, 310, '闻喜县', 3);
INSERT INTO `pmo_ares` VALUES (2589, 310, '稷山县', 3);
INSERT INTO `pmo_ares` VALUES (2590, 310, '新绛县', 3);
INSERT INTO `pmo_ares` VALUES (2591, 310, '绛县', 3);
INSERT INTO `pmo_ares` VALUES (2592, 310, '垣曲县', 3);
INSERT INTO `pmo_ares` VALUES (2593, 310, '夏县', 3);
INSERT INTO `pmo_ares` VALUES (2594, 310, '平陆县', 3);
INSERT INTO `pmo_ares` VALUES (2595, 310, '芮城县', 3);
INSERT INTO `pmo_ares` VALUES (2596, 311, '莲湖区', 3);
INSERT INTO `pmo_ares` VALUES (2597, 311, '新城区', 3);
INSERT INTO `pmo_ares` VALUES (2598, 311, '碑林区', 3);
INSERT INTO `pmo_ares` VALUES (2599, 311, '雁塔区', 3);
INSERT INTO `pmo_ares` VALUES (2600, 311, '灞桥区', 3);
INSERT INTO `pmo_ares` VALUES (2601, 311, '未央区', 3);
INSERT INTO `pmo_ares` VALUES (2602, 311, '阎良区', 3);
INSERT INTO `pmo_ares` VALUES (2603, 311, '临潼区', 3);
INSERT INTO `pmo_ares` VALUES (2604, 311, '长安区', 3);
INSERT INTO `pmo_ares` VALUES (2605, 311, '蓝田县', 3);
INSERT INTO `pmo_ares` VALUES (2606, 311, '周至县', 3);
INSERT INTO `pmo_ares` VALUES (2607, 311, '户县', 3);
INSERT INTO `pmo_ares` VALUES (2608, 311, '高陵县', 3);
INSERT INTO `pmo_ares` VALUES (2609, 312, '汉滨区', 3);
INSERT INTO `pmo_ares` VALUES (2610, 312, '汉阴县', 3);
INSERT INTO `pmo_ares` VALUES (2611, 312, '石泉县', 3);
INSERT INTO `pmo_ares` VALUES (2612, 312, '宁陕县', 3);
INSERT INTO `pmo_ares` VALUES (2613, 312, '紫阳县', 3);
INSERT INTO `pmo_ares` VALUES (2614, 312, '岚皋县', 3);
INSERT INTO `pmo_ares` VALUES (2615, 312, '平利县', 3);
INSERT INTO `pmo_ares` VALUES (2616, 312, '镇坪县', 3);
INSERT INTO `pmo_ares` VALUES (2617, 312, '旬阳县', 3);
INSERT INTO `pmo_ares` VALUES (2618, 312, '白河县', 3);
INSERT INTO `pmo_ares` VALUES (2619, 313, '陈仓区', 3);
INSERT INTO `pmo_ares` VALUES (2620, 313, '渭滨区', 3);
INSERT INTO `pmo_ares` VALUES (2621, 313, '金台区', 3);
INSERT INTO `pmo_ares` VALUES (2622, 313, '凤翔县', 3);
INSERT INTO `pmo_ares` VALUES (2623, 313, '岐山县', 3);
INSERT INTO `pmo_ares` VALUES (2624, 313, '扶风县', 3);
INSERT INTO `pmo_ares` VALUES (2625, 313, '眉县', 3);
INSERT INTO `pmo_ares` VALUES (2626, 313, '陇县', 3);
INSERT INTO `pmo_ares` VALUES (2627, 313, '千阳县', 3);
INSERT INTO `pmo_ares` VALUES (2628, 313, '麟游县', 3);
INSERT INTO `pmo_ares` VALUES (2629, 313, '凤县', 3);
INSERT INTO `pmo_ares` VALUES (2630, 313, '太白县', 3);
INSERT INTO `pmo_ares` VALUES (2631, 314, '汉台区', 3);
INSERT INTO `pmo_ares` VALUES (2632, 314, '南郑县', 3);
INSERT INTO `pmo_ares` VALUES (2633, 314, '城固县', 3);
INSERT INTO `pmo_ares` VALUES (2634, 314, '洋县', 3);
INSERT INTO `pmo_ares` VALUES (2635, 314, '西乡县', 3);
INSERT INTO `pmo_ares` VALUES (2636, 314, '勉县', 3);
INSERT INTO `pmo_ares` VALUES (2637, 314, '宁强县', 3);
INSERT INTO `pmo_ares` VALUES (2638, 314, '略阳县', 3);
INSERT INTO `pmo_ares` VALUES (2639, 314, '镇巴县', 3);
INSERT INTO `pmo_ares` VALUES (2640, 314, '留坝县', 3);
INSERT INTO `pmo_ares` VALUES (2641, 314, '佛坪县', 3);
INSERT INTO `pmo_ares` VALUES (2642, 315, '商州区', 3);
INSERT INTO `pmo_ares` VALUES (2643, 315, '洛南县', 3);
INSERT INTO `pmo_ares` VALUES (2644, 315, '丹凤县', 3);
INSERT INTO `pmo_ares` VALUES (2645, 315, '商南县', 3);
INSERT INTO `pmo_ares` VALUES (2646, 315, '山阳县', 3);
INSERT INTO `pmo_ares` VALUES (2647, 315, '镇安县', 3);
INSERT INTO `pmo_ares` VALUES (2648, 315, '柞水县', 3);
INSERT INTO `pmo_ares` VALUES (2649, 316, '耀州区', 3);
INSERT INTO `pmo_ares` VALUES (2650, 316, '王益区', 3);
INSERT INTO `pmo_ares` VALUES (2651, 316, '印台区', 3);
INSERT INTO `pmo_ares` VALUES (2652, 316, '宜君县', 3);
INSERT INTO `pmo_ares` VALUES (2653, 317, '临渭区', 3);
INSERT INTO `pmo_ares` VALUES (2654, 317, '韩城市', 3);
INSERT INTO `pmo_ares` VALUES (2655, 317, '华阴市', 3);
INSERT INTO `pmo_ares` VALUES (2656, 317, '华县', 3);
INSERT INTO `pmo_ares` VALUES (2657, 317, '潼关县', 3);
INSERT INTO `pmo_ares` VALUES (2658, 317, '大荔县', 3);
INSERT INTO `pmo_ares` VALUES (2659, 317, '合阳县', 3);
INSERT INTO `pmo_ares` VALUES (2660, 317, '澄城县', 3);
INSERT INTO `pmo_ares` VALUES (2661, 317, '蒲城县', 3);
INSERT INTO `pmo_ares` VALUES (2662, 317, '白水县', 3);
INSERT INTO `pmo_ares` VALUES (2663, 317, '富平县', 3);
INSERT INTO `pmo_ares` VALUES (2664, 318, '秦都区', 3);
INSERT INTO `pmo_ares` VALUES (2665, 318, '渭城区', 3);
INSERT INTO `pmo_ares` VALUES (2666, 318, '杨陵区', 3);
INSERT INTO `pmo_ares` VALUES (2667, 318, '兴平市', 3);
INSERT INTO `pmo_ares` VALUES (2668, 318, '三原县', 3);
INSERT INTO `pmo_ares` VALUES (2669, 318, '泾阳县', 3);
INSERT INTO `pmo_ares` VALUES (2670, 318, '乾县', 3);
INSERT INTO `pmo_ares` VALUES (2671, 318, '礼泉县', 3);
INSERT INTO `pmo_ares` VALUES (2672, 318, '永寿县', 3);
INSERT INTO `pmo_ares` VALUES (2673, 318, '彬县', 3);
INSERT INTO `pmo_ares` VALUES (2674, 318, '长武县', 3);
INSERT INTO `pmo_ares` VALUES (2675, 318, '旬邑县', 3);
INSERT INTO `pmo_ares` VALUES (2676, 318, '淳化县', 3);
INSERT INTO `pmo_ares` VALUES (2677, 318, '武功县', 3);
INSERT INTO `pmo_ares` VALUES (2678, 319, '吴起县', 3);
INSERT INTO `pmo_ares` VALUES (2679, 319, '宝塔区', 3);
INSERT INTO `pmo_ares` VALUES (2680, 319, '延长县', 3);
INSERT INTO `pmo_ares` VALUES (2681, 319, '延川县', 3);
INSERT INTO `pmo_ares` VALUES (2682, 319, '子长县', 3);
INSERT INTO `pmo_ares` VALUES (2683, 319, '安塞县', 3);
INSERT INTO `pmo_ares` VALUES (2684, 319, '志丹县', 3);
INSERT INTO `pmo_ares` VALUES (2685, 319, '甘泉县', 3);
INSERT INTO `pmo_ares` VALUES (2686, 319, '富县', 3);
INSERT INTO `pmo_ares` VALUES (2687, 319, '洛川县', 3);
INSERT INTO `pmo_ares` VALUES (2688, 319, '宜川县', 3);
INSERT INTO `pmo_ares` VALUES (2689, 319, '黄龙县', 3);
INSERT INTO `pmo_ares` VALUES (2690, 319, '黄陵县', 3);
INSERT INTO `pmo_ares` VALUES (2691, 320, '榆阳区', 3);
INSERT INTO `pmo_ares` VALUES (2692, 320, '神木县', 3);
INSERT INTO `pmo_ares` VALUES (2693, 320, '府谷县', 3);
INSERT INTO `pmo_ares` VALUES (2694, 320, '横山县', 3);
INSERT INTO `pmo_ares` VALUES (2695, 320, '靖边县', 3);
INSERT INTO `pmo_ares` VALUES (2696, 320, '定边县', 3);
INSERT INTO `pmo_ares` VALUES (2697, 320, '绥德县', 3);
INSERT INTO `pmo_ares` VALUES (2698, 320, '米脂县', 3);
INSERT INTO `pmo_ares` VALUES (2699, 320, '佳县', 3);
INSERT INTO `pmo_ares` VALUES (2700, 320, '吴堡县', 3);
INSERT INTO `pmo_ares` VALUES (2701, 320, '清涧县', 3);
INSERT INTO `pmo_ares` VALUES (2702, 320, '子洲县', 3);
INSERT INTO `pmo_ares` VALUES (2703, 321, '长宁区', 3);
INSERT INTO `pmo_ares` VALUES (2704, 321, '闸北区', 3);
INSERT INTO `pmo_ares` VALUES (2705, 321, '闵行区', 3);
INSERT INTO `pmo_ares` VALUES (2706, 321, '徐汇区', 3);
INSERT INTO `pmo_ares` VALUES (2707, 321, '浦东新区', 3);
INSERT INTO `pmo_ares` VALUES (2708, 321, '杨浦区', 3);
INSERT INTO `pmo_ares` VALUES (2709, 321, '普陀区', 3);
INSERT INTO `pmo_ares` VALUES (2710, 321, '静安区', 3);
INSERT INTO `pmo_ares` VALUES (2711, 321, '卢湾区', 3);
INSERT INTO `pmo_ares` VALUES (2712, 321, '虹口区', 3);
INSERT INTO `pmo_ares` VALUES (2713, 321, '黄浦区', 3);
INSERT INTO `pmo_ares` VALUES (2714, 321, '南汇区', 3);
INSERT INTO `pmo_ares` VALUES (2715, 321, '松江区', 3);
INSERT INTO `pmo_ares` VALUES (2716, 321, '嘉定区', 3);
INSERT INTO `pmo_ares` VALUES (2717, 321, '宝山区', 3);
INSERT INTO `pmo_ares` VALUES (2718, 321, '青浦区', 3);
INSERT INTO `pmo_ares` VALUES (2719, 321, '金山区', 3);
INSERT INTO `pmo_ares` VALUES (2720, 321, '奉贤区', 3);
INSERT INTO `pmo_ares` VALUES (2721, 321, '崇明县', 3);
INSERT INTO `pmo_ares` VALUES (2722, 322, '青羊区', 3);
INSERT INTO `pmo_ares` VALUES (2723, 322, '锦江区', 3);
INSERT INTO `pmo_ares` VALUES (2724, 322, '金牛区', 3);
INSERT INTO `pmo_ares` VALUES (2725, 322, '武侯区', 3);
INSERT INTO `pmo_ares` VALUES (2726, 322, '成华区', 3);
INSERT INTO `pmo_ares` VALUES (2727, 322, '龙泉驿区', 3);
INSERT INTO `pmo_ares` VALUES (2728, 322, '青白江区', 3);
INSERT INTO `pmo_ares` VALUES (2729, 322, '新都区', 3);
INSERT INTO `pmo_ares` VALUES (2730, 322, '温江区', 3);
INSERT INTO `pmo_ares` VALUES (2731, 322, '高新区', 3);
INSERT INTO `pmo_ares` VALUES (2732, 322, '高新西区', 3);
INSERT INTO `pmo_ares` VALUES (2733, 322, '都江堰市', 3);
INSERT INTO `pmo_ares` VALUES (2734, 322, '彭州市', 3);
INSERT INTO `pmo_ares` VALUES (2735, 322, '邛崃市', 3);
INSERT INTO `pmo_ares` VALUES (2736, 322, '崇州市', 3);
INSERT INTO `pmo_ares` VALUES (2737, 322, '金堂县', 3);
INSERT INTO `pmo_ares` VALUES (2738, 322, '双流县', 3);
INSERT INTO `pmo_ares` VALUES (2739, 322, '郫县', 3);
INSERT INTO `pmo_ares` VALUES (2740, 322, '大邑县', 3);
INSERT INTO `pmo_ares` VALUES (2741, 322, '蒲江县', 3);
INSERT INTO `pmo_ares` VALUES (2742, 322, '新津县', 3);
INSERT INTO `pmo_ares` VALUES (2743, 322, '都江堰市', 3);
INSERT INTO `pmo_ares` VALUES (2744, 322, '彭州市', 3);
INSERT INTO `pmo_ares` VALUES (2745, 322, '邛崃市', 3);
INSERT INTO `pmo_ares` VALUES (2746, 322, '崇州市', 3);
INSERT INTO `pmo_ares` VALUES (2747, 322, '金堂县', 3);
INSERT INTO `pmo_ares` VALUES (2748, 322, '双流县', 3);
INSERT INTO `pmo_ares` VALUES (2749, 322, '郫县', 3);
INSERT INTO `pmo_ares` VALUES (2750, 322, '大邑县', 3);
INSERT INTO `pmo_ares` VALUES (2751, 322, '蒲江县', 3);
INSERT INTO `pmo_ares` VALUES (2752, 322, '新津县', 3);
INSERT INTO `pmo_ares` VALUES (2753, 323, '涪城区', 3);
INSERT INTO `pmo_ares` VALUES (2754, 323, '游仙区', 3);
INSERT INTO `pmo_ares` VALUES (2755, 323, '江油市', 3);
INSERT INTO `pmo_ares` VALUES (2756, 323, '盐亭县', 3);
INSERT INTO `pmo_ares` VALUES (2757, 323, '三台县', 3);
INSERT INTO `pmo_ares` VALUES (2758, 323, '平武县', 3);
INSERT INTO `pmo_ares` VALUES (2759, 323, '安县', 3);
INSERT INTO `pmo_ares` VALUES (2760, 323, '梓潼县', 3);
INSERT INTO `pmo_ares` VALUES (2761, 323, '北川县', 3);
INSERT INTO `pmo_ares` VALUES (2762, 324, '马尔康县', 3);
INSERT INTO `pmo_ares` VALUES (2763, 324, '汶川县', 3);
INSERT INTO `pmo_ares` VALUES (2764, 324, '理县', 3);
INSERT INTO `pmo_ares` VALUES (2765, 324, '茂县', 3);
INSERT INTO `pmo_ares` VALUES (2766, 324, '松潘县', 3);
INSERT INTO `pmo_ares` VALUES (2767, 324, '九寨沟县', 3);
INSERT INTO `pmo_ares` VALUES (2768, 324, '金川县', 3);
INSERT INTO `pmo_ares` VALUES (2769, 324, '小金县', 3);
INSERT INTO `pmo_ares` VALUES (2770, 324, '黑水县', 3);
INSERT INTO `pmo_ares` VALUES (2771, 324, '壤塘县', 3);
INSERT INTO `pmo_ares` VALUES (2772, 324, '阿坝县', 3);
INSERT INTO `pmo_ares` VALUES (2773, 324, '若尔盖县', 3);
INSERT INTO `pmo_ares` VALUES (2774, 324, '红原县', 3);
INSERT INTO `pmo_ares` VALUES (2775, 325, '巴州区', 3);
INSERT INTO `pmo_ares` VALUES (2776, 325, '通江县', 3);
INSERT INTO `pmo_ares` VALUES (2777, 325, '南江县', 3);
INSERT INTO `pmo_ares` VALUES (2778, 325, '平昌县', 3);
INSERT INTO `pmo_ares` VALUES (2779, 326, '通川区', 3);
INSERT INTO `pmo_ares` VALUES (2780, 326, '万源市', 3);
INSERT INTO `pmo_ares` VALUES (2781, 326, '达县', 3);
INSERT INTO `pmo_ares` VALUES (2782, 326, '宣汉县', 3);
INSERT INTO `pmo_ares` VALUES (2783, 326, '开江县', 3);
INSERT INTO `pmo_ares` VALUES (2784, 326, '大竹县', 3);
INSERT INTO `pmo_ares` VALUES (2785, 326, '渠县', 3);
INSERT INTO `pmo_ares` VALUES (2786, 327, '旌阳区', 3);
INSERT INTO `pmo_ares` VALUES (2787, 327, '广汉市', 3);
INSERT INTO `pmo_ares` VALUES (2788, 327, '什邡市', 3);
INSERT INTO `pmo_ares` VALUES (2789, 327, '绵竹市', 3);
INSERT INTO `pmo_ares` VALUES (2790, 327, '罗江县', 3);
INSERT INTO `pmo_ares` VALUES (2791, 327, '中江县', 3);
INSERT INTO `pmo_ares` VALUES (2792, 328, '康定县', 3);
INSERT INTO `pmo_ares` VALUES (2793, 328, '丹巴县', 3);
INSERT INTO `pmo_ares` VALUES (2794, 328, '泸定县', 3);
INSERT INTO `pmo_ares` VALUES (2795, 328, '炉霍县', 3);
INSERT INTO `pmo_ares` VALUES (2796, 328, '九龙县', 3);
INSERT INTO `pmo_ares` VALUES (2797, 328, '甘孜县', 3);
INSERT INTO `pmo_ares` VALUES (2798, 328, '雅江县', 3);
INSERT INTO `pmo_ares` VALUES (2799, 328, '新龙县', 3);
INSERT INTO `pmo_ares` VALUES (2800, 328, '道孚县', 3);
INSERT INTO `pmo_ares` VALUES (2801, 328, '白玉县', 3);
INSERT INTO `pmo_ares` VALUES (2802, 328, '理塘县', 3);
INSERT INTO `pmo_ares` VALUES (2803, 328, '德格县', 3);
INSERT INTO `pmo_ares` VALUES (2804, 328, '乡城县', 3);
INSERT INTO `pmo_ares` VALUES (2805, 328, '石渠县', 3);
INSERT INTO `pmo_ares` VALUES (2806, 328, '稻城县', 3);
INSERT INTO `pmo_ares` VALUES (2807, 328, '色达县', 3);
INSERT INTO `pmo_ares` VALUES (2808, 328, '巴塘县', 3);
INSERT INTO `pmo_ares` VALUES (2809, 328, '得荣县', 3);
INSERT INTO `pmo_ares` VALUES (2810, 329, '广安区', 3);
INSERT INTO `pmo_ares` VALUES (2811, 329, '华蓥市', 3);
INSERT INTO `pmo_ares` VALUES (2812, 329, '岳池县', 3);
INSERT INTO `pmo_ares` VALUES (2813, 329, '武胜县', 3);
INSERT INTO `pmo_ares` VALUES (2814, 329, '邻水县', 3);
INSERT INTO `pmo_ares` VALUES (2815, 330, '利州区', 3);
INSERT INTO `pmo_ares` VALUES (2816, 330, '元坝区', 3);
INSERT INTO `pmo_ares` VALUES (2817, 330, '朝天区', 3);
INSERT INTO `pmo_ares` VALUES (2818, 330, '旺苍县', 3);
INSERT INTO `pmo_ares` VALUES (2819, 330, '青川县', 3);
INSERT INTO `pmo_ares` VALUES (2820, 330, '剑阁县', 3);
INSERT INTO `pmo_ares` VALUES (2821, 330, '苍溪县', 3);
INSERT INTO `pmo_ares` VALUES (2822, 331, '峨眉山市', 3);
INSERT INTO `pmo_ares` VALUES (2823, 331, '乐山市', 3);
INSERT INTO `pmo_ares` VALUES (2824, 331, '犍为县', 3);
INSERT INTO `pmo_ares` VALUES (2825, 331, '井研县', 3);
INSERT INTO `pmo_ares` VALUES (2826, 331, '夹江县', 3);
INSERT INTO `pmo_ares` VALUES (2827, 331, '沐川县', 3);
INSERT INTO `pmo_ares` VALUES (2828, 331, '峨边', 3);
INSERT INTO `pmo_ares` VALUES (2829, 331, '马边', 3);
INSERT INTO `pmo_ares` VALUES (2830, 332, '西昌市', 3);
INSERT INTO `pmo_ares` VALUES (2831, 332, '盐源县', 3);
INSERT INTO `pmo_ares` VALUES (2832, 332, '德昌县', 3);
INSERT INTO `pmo_ares` VALUES (2833, 332, '会理县', 3);
INSERT INTO `pmo_ares` VALUES (2834, 332, '会东县', 3);
INSERT INTO `pmo_ares` VALUES (2835, 332, '宁南县', 3);
INSERT INTO `pmo_ares` VALUES (2836, 332, '普格县', 3);
INSERT INTO `pmo_ares` VALUES (2837, 332, '布拖县', 3);
INSERT INTO `pmo_ares` VALUES (2838, 332, '金阳县', 3);
INSERT INTO `pmo_ares` VALUES (2839, 332, '昭觉县', 3);
INSERT INTO `pmo_ares` VALUES (2840, 332, '喜德县', 3);
INSERT INTO `pmo_ares` VALUES (2841, 332, '冕宁县', 3);
INSERT INTO `pmo_ares` VALUES (2842, 332, '越西县', 3);
INSERT INTO `pmo_ares` VALUES (2843, 332, '甘洛县', 3);
INSERT INTO `pmo_ares` VALUES (2844, 332, '美姑县', 3);
INSERT INTO `pmo_ares` VALUES (2845, 332, '雷波县', 3);
INSERT INTO `pmo_ares` VALUES (2846, 332, '木里', 3);
INSERT INTO `pmo_ares` VALUES (2847, 333, '东坡区', 3);
INSERT INTO `pmo_ares` VALUES (2848, 333, '仁寿县', 3);
INSERT INTO `pmo_ares` VALUES (2849, 333, '彭山县', 3);
INSERT INTO `pmo_ares` VALUES (2850, 333, '洪雅县', 3);
INSERT INTO `pmo_ares` VALUES (2851, 333, '丹棱县', 3);
INSERT INTO `pmo_ares` VALUES (2852, 333, '青神县', 3);
INSERT INTO `pmo_ares` VALUES (2853, 334, '阆中市', 3);
INSERT INTO `pmo_ares` VALUES (2854, 334, '南部县', 3);
INSERT INTO `pmo_ares` VALUES (2855, 334, '营山县', 3);
INSERT INTO `pmo_ares` VALUES (2856, 334, '蓬安县', 3);
INSERT INTO `pmo_ares` VALUES (2857, 334, '仪陇县', 3);
INSERT INTO `pmo_ares` VALUES (2858, 334, '顺庆区', 3);
INSERT INTO `pmo_ares` VALUES (2859, 334, '高坪区', 3);
INSERT INTO `pmo_ares` VALUES (2860, 334, '嘉陵区', 3);
INSERT INTO `pmo_ares` VALUES (2861, 334, '西充县', 3);
INSERT INTO `pmo_ares` VALUES (2862, 335, '市中区', 3);
INSERT INTO `pmo_ares` VALUES (2863, 335, '东兴区', 3);
INSERT INTO `pmo_ares` VALUES (2864, 335, '威远县', 3);
INSERT INTO `pmo_ares` VALUES (2865, 335, '资中县', 3);
INSERT INTO `pmo_ares` VALUES (2866, 335, '隆昌县', 3);
INSERT INTO `pmo_ares` VALUES (2867, 336, '东  区', 3);
INSERT INTO `pmo_ares` VALUES (2868, 336, '西  区', 3);
INSERT INTO `pmo_ares` VALUES (2869, 336, '仁和区', 3);
INSERT INTO `pmo_ares` VALUES (2870, 336, '米易县', 3);
INSERT INTO `pmo_ares` VALUES (2871, 336, '盐边县', 3);
INSERT INTO `pmo_ares` VALUES (2872, 337, '船山区', 3);
INSERT INTO `pmo_ares` VALUES (2873, 337, '安居区', 3);
INSERT INTO `pmo_ares` VALUES (2874, 337, '蓬溪县', 3);
INSERT INTO `pmo_ares` VALUES (2875, 337, '射洪县', 3);
INSERT INTO `pmo_ares` VALUES (2876, 337, '大英县', 3);
INSERT INTO `pmo_ares` VALUES (2877, 338, '雨城区', 3);
INSERT INTO `pmo_ares` VALUES (2878, 338, '名山县', 3);
INSERT INTO `pmo_ares` VALUES (2879, 338, '荥经县', 3);
INSERT INTO `pmo_ares` VALUES (2880, 338, '汉源县', 3);
INSERT INTO `pmo_ares` VALUES (2881, 338, '石棉县', 3);
INSERT INTO `pmo_ares` VALUES (2882, 338, '天全县', 3);
INSERT INTO `pmo_ares` VALUES (2883, 338, '芦山县', 3);
INSERT INTO `pmo_ares` VALUES (2884, 338, '宝兴县', 3);
INSERT INTO `pmo_ares` VALUES (2885, 339, '翠屏区', 3);
INSERT INTO `pmo_ares` VALUES (2886, 339, '宜宾县', 3);
INSERT INTO `pmo_ares` VALUES (2887, 339, '南溪县', 3);
INSERT INTO `pmo_ares` VALUES (2888, 339, '江安县', 3);
INSERT INTO `pmo_ares` VALUES (2889, 339, '长宁县', 3);
INSERT INTO `pmo_ares` VALUES (2890, 339, '高县', 3);
INSERT INTO `pmo_ares` VALUES (2891, 339, '珙县', 3);
INSERT INTO `pmo_ares` VALUES (2892, 339, '筠连县', 3);
INSERT INTO `pmo_ares` VALUES (2893, 339, '兴文县', 3);
INSERT INTO `pmo_ares` VALUES (2894, 339, '屏山县', 3);
INSERT INTO `pmo_ares` VALUES (2895, 340, '雁江区', 3);
INSERT INTO `pmo_ares` VALUES (2896, 340, '简阳市', 3);
INSERT INTO `pmo_ares` VALUES (2897, 340, '安岳县', 3);
INSERT INTO `pmo_ares` VALUES (2898, 340, '乐至县', 3);
INSERT INTO `pmo_ares` VALUES (2899, 341, '大安区', 3);
INSERT INTO `pmo_ares` VALUES (2900, 341, '自流井区', 3);
INSERT INTO `pmo_ares` VALUES (2901, 341, '贡井区', 3);
INSERT INTO `pmo_ares` VALUES (2902, 341, '沿滩区', 3);
INSERT INTO `pmo_ares` VALUES (2903, 341, '荣县', 3);
INSERT INTO `pmo_ares` VALUES (2904, 341, '富顺县', 3);
INSERT INTO `pmo_ares` VALUES (2905, 342, '江阳区', 3);
INSERT INTO `pmo_ares` VALUES (2906, 342, '纳溪区', 3);
INSERT INTO `pmo_ares` VALUES (2907, 342, '龙马潭区', 3);
INSERT INTO `pmo_ares` VALUES (2908, 342, '泸县', 3);
INSERT INTO `pmo_ares` VALUES (2909, 342, '合江县', 3);
INSERT INTO `pmo_ares` VALUES (2910, 342, '叙永县', 3);
INSERT INTO `pmo_ares` VALUES (2911, 342, '古蔺县', 3);
INSERT INTO `pmo_ares` VALUES (2912, 343, '和平区', 3);
INSERT INTO `pmo_ares` VALUES (2913, 343, '河西区', 3);
INSERT INTO `pmo_ares` VALUES (2914, 343, '南开区', 3);
INSERT INTO `pmo_ares` VALUES (2915, 343, '河北区', 3);
INSERT INTO `pmo_ares` VALUES (2916, 343, '河东区', 3);
INSERT INTO `pmo_ares` VALUES (2917, 343, '红桥区', 3);
INSERT INTO `pmo_ares` VALUES (2918, 343, '东丽区', 3);
INSERT INTO `pmo_ares` VALUES (2919, 343, '津南区', 3);
INSERT INTO `pmo_ares` VALUES (2920, 343, '西青区', 3);
INSERT INTO `pmo_ares` VALUES (2921, 343, '北辰区', 3);
INSERT INTO `pmo_ares` VALUES (2922, 343, '塘沽区', 3);
INSERT INTO `pmo_ares` VALUES (2923, 343, '汉沽区', 3);
INSERT INTO `pmo_ares` VALUES (2924, 343, '大港区', 3);
INSERT INTO `pmo_ares` VALUES (2925, 343, '武清区', 3);
INSERT INTO `pmo_ares` VALUES (2926, 343, '宝坻区', 3);
INSERT INTO `pmo_ares` VALUES (2927, 343, '经济开发区', 3);
INSERT INTO `pmo_ares` VALUES (2928, 343, '宁河县', 3);
INSERT INTO `pmo_ares` VALUES (2929, 343, '静海县', 3);
INSERT INTO `pmo_ares` VALUES (2930, 343, '蓟县', 3);
INSERT INTO `pmo_ares` VALUES (2931, 344, '城关区', 3);
INSERT INTO `pmo_ares` VALUES (2932, 344, '林周县', 3);
INSERT INTO `pmo_ares` VALUES (2933, 344, '当雄县', 3);
INSERT INTO `pmo_ares` VALUES (2934, 344, '尼木县', 3);
INSERT INTO `pmo_ares` VALUES (2935, 344, '曲水县', 3);
INSERT INTO `pmo_ares` VALUES (2936, 344, '堆龙德庆县', 3);
INSERT INTO `pmo_ares` VALUES (2937, 344, '达孜县', 3);
INSERT INTO `pmo_ares` VALUES (2938, 344, '墨竹工卡县', 3);
INSERT INTO `pmo_ares` VALUES (2939, 345, '噶尔县', 3);
INSERT INTO `pmo_ares` VALUES (2940, 345, '普兰县', 3);
INSERT INTO `pmo_ares` VALUES (2941, 345, '札达县', 3);
INSERT INTO `pmo_ares` VALUES (2942, 345, '日土县', 3);
INSERT INTO `pmo_ares` VALUES (2943, 345, '革吉县', 3);
INSERT INTO `pmo_ares` VALUES (2944, 345, '改则县', 3);
INSERT INTO `pmo_ares` VALUES (2945, 345, '措勤县', 3);
INSERT INTO `pmo_ares` VALUES (2946, 346, '昌都县', 3);
INSERT INTO `pmo_ares` VALUES (2947, 346, '江达县', 3);
INSERT INTO `pmo_ares` VALUES (2948, 346, '贡觉县', 3);
INSERT INTO `pmo_ares` VALUES (2949, 346, '类乌齐县', 3);
INSERT INTO `pmo_ares` VALUES (2950, 346, '丁青县', 3);
INSERT INTO `pmo_ares` VALUES (2951, 346, '察雅县', 3);
INSERT INTO `pmo_ares` VALUES (2952, 346, '八宿县', 3);
INSERT INTO `pmo_ares` VALUES (2953, 346, '左贡县', 3);
INSERT INTO `pmo_ares` VALUES (2954, 346, '芒康县', 3);
INSERT INTO `pmo_ares` VALUES (2955, 346, '洛隆县', 3);
INSERT INTO `pmo_ares` VALUES (2956, 346, '边坝县', 3);
INSERT INTO `pmo_ares` VALUES (2957, 347, '林芝县', 3);
INSERT INTO `pmo_ares` VALUES (2958, 347, '工布江达县', 3);
INSERT INTO `pmo_ares` VALUES (2959, 347, '米林县', 3);
INSERT INTO `pmo_ares` VALUES (2960, 347, '墨脱县', 3);
INSERT INTO `pmo_ares` VALUES (2961, 347, '波密县', 3);
INSERT INTO `pmo_ares` VALUES (2962, 347, '察隅县', 3);
INSERT INTO `pmo_ares` VALUES (2963, 347, '朗县', 3);
INSERT INTO `pmo_ares` VALUES (2964, 348, '那曲县', 3);
INSERT INTO `pmo_ares` VALUES (2965, 348, '嘉黎县', 3);
INSERT INTO `pmo_ares` VALUES (2966, 348, '比如县', 3);
INSERT INTO `pmo_ares` VALUES (2967, 348, '聂荣县', 3);
INSERT INTO `pmo_ares` VALUES (2968, 348, '安多县', 3);
INSERT INTO `pmo_ares` VALUES (2969, 348, '申扎县', 3);
INSERT INTO `pmo_ares` VALUES (2970, 348, '索县', 3);
INSERT INTO `pmo_ares` VALUES (2971, 348, '班戈县', 3);
INSERT INTO `pmo_ares` VALUES (2972, 348, '巴青县', 3);
INSERT INTO `pmo_ares` VALUES (2973, 348, '尼玛县', 3);
INSERT INTO `pmo_ares` VALUES (2974, 349, '日喀则市', 3);
INSERT INTO `pmo_ares` VALUES (2975, 349, '南木林县', 3);
INSERT INTO `pmo_ares` VALUES (2976, 349, '江孜县', 3);
INSERT INTO `pmo_ares` VALUES (2977, 349, '定日县', 3);
INSERT INTO `pmo_ares` VALUES (2978, 349, '萨迦县', 3);
INSERT INTO `pmo_ares` VALUES (2979, 349, '拉孜县', 3);
INSERT INTO `pmo_ares` VALUES (2980, 349, '昂仁县', 3);
INSERT INTO `pmo_ares` VALUES (2981, 349, '谢通门县', 3);
INSERT INTO `pmo_ares` VALUES (2982, 349, '白朗县', 3);
INSERT INTO `pmo_ares` VALUES (2983, 349, '仁布县', 3);
INSERT INTO `pmo_ares` VALUES (2984, 349, '康马县', 3);
INSERT INTO `pmo_ares` VALUES (2985, 349, '定结县', 3);
INSERT INTO `pmo_ares` VALUES (2986, 349, '仲巴县', 3);
INSERT INTO `pmo_ares` VALUES (2987, 349, '亚东县', 3);
INSERT INTO `pmo_ares` VALUES (2988, 349, '吉隆县', 3);
INSERT INTO `pmo_ares` VALUES (2989, 349, '聂拉木县', 3);
INSERT INTO `pmo_ares` VALUES (2990, 349, '萨嘎县', 3);
INSERT INTO `pmo_ares` VALUES (2991, 349, '岗巴县', 3);
INSERT INTO `pmo_ares` VALUES (2992, 350, '乃东县', 3);
INSERT INTO `pmo_ares` VALUES (2993, 350, '扎囊县', 3);
INSERT INTO `pmo_ares` VALUES (2994, 350, '贡嘎县', 3);
INSERT INTO `pmo_ares` VALUES (2995, 350, '桑日县', 3);
INSERT INTO `pmo_ares` VALUES (2996, 350, '琼结县', 3);
INSERT INTO `pmo_ares` VALUES (2997, 350, '曲松县', 3);
INSERT INTO `pmo_ares` VALUES (2998, 350, '措美县', 3);
INSERT INTO `pmo_ares` VALUES (2999, 350, '洛扎县', 3);
INSERT INTO `pmo_ares` VALUES (3000, 350, '加查县', 3);
INSERT INTO `pmo_ares` VALUES (3001, 350, '隆子县', 3);
INSERT INTO `pmo_ares` VALUES (3002, 350, '错那县', 3);
INSERT INTO `pmo_ares` VALUES (3003, 350, '浪卡子县', 3);
INSERT INTO `pmo_ares` VALUES (3004, 351, '天山区', 3);
INSERT INTO `pmo_ares` VALUES (3005, 351, '沙依巴克区', 3);
INSERT INTO `pmo_ares` VALUES (3006, 351, '新市区', 3);
INSERT INTO `pmo_ares` VALUES (3007, 351, '水磨沟区', 3);
INSERT INTO `pmo_ares` VALUES (3008, 351, '头屯河区', 3);
INSERT INTO `pmo_ares` VALUES (3009, 351, '达坂城区', 3);
INSERT INTO `pmo_ares` VALUES (3010, 351, '米东区', 3);
INSERT INTO `pmo_ares` VALUES (3011, 351, '乌鲁木齐县', 3);
INSERT INTO `pmo_ares` VALUES (3012, 352, '阿克苏市', 3);
INSERT INTO `pmo_ares` VALUES (3013, 352, '温宿县', 3);
INSERT INTO `pmo_ares` VALUES (3014, 352, '库车县', 3);
INSERT INTO `pmo_ares` VALUES (3015, 352, '沙雅县', 3);
INSERT INTO `pmo_ares` VALUES (3016, 352, '新和县', 3);
INSERT INTO `pmo_ares` VALUES (3017, 352, '拜城县', 3);
INSERT INTO `pmo_ares` VALUES (3018, 352, '乌什县', 3);
INSERT INTO `pmo_ares` VALUES (3019, 352, '阿瓦提县', 3);
INSERT INTO `pmo_ares` VALUES (3020, 352, '柯坪县', 3);
INSERT INTO `pmo_ares` VALUES (3021, 353, '阿拉尔市', 3);
INSERT INTO `pmo_ares` VALUES (3022, 354, '库尔勒市', 3);
INSERT INTO `pmo_ares` VALUES (3023, 354, '轮台县', 3);
INSERT INTO `pmo_ares` VALUES (3024, 354, '尉犁县', 3);
INSERT INTO `pmo_ares` VALUES (3025, 354, '若羌县', 3);
INSERT INTO `pmo_ares` VALUES (3026, 354, '且末县', 3);
INSERT INTO `pmo_ares` VALUES (3027, 354, '焉耆', 3);
INSERT INTO `pmo_ares` VALUES (3028, 354, '和静县', 3);
INSERT INTO `pmo_ares` VALUES (3029, 354, '和硕县', 3);
INSERT INTO `pmo_ares` VALUES (3030, 354, '博湖县', 3);
INSERT INTO `pmo_ares` VALUES (3031, 355, '博乐市', 3);
INSERT INTO `pmo_ares` VALUES (3032, 355, '精河县', 3);
INSERT INTO `pmo_ares` VALUES (3033, 355, '温泉县', 3);
INSERT INTO `pmo_ares` VALUES (3034, 356, '呼图壁县', 3);
INSERT INTO `pmo_ares` VALUES (3035, 356, '米泉市', 3);
INSERT INTO `pmo_ares` VALUES (3036, 356, '昌吉市', 3);
INSERT INTO `pmo_ares` VALUES (3037, 356, '阜康市', 3);
INSERT INTO `pmo_ares` VALUES (3038, 356, '玛纳斯县', 3);
INSERT INTO `pmo_ares` VALUES (3039, 356, '奇台县', 3);
INSERT INTO `pmo_ares` VALUES (3040, 356, '吉木萨尔县', 3);
INSERT INTO `pmo_ares` VALUES (3041, 356, '木垒', 3);
INSERT INTO `pmo_ares` VALUES (3042, 357, '哈密市', 3);
INSERT INTO `pmo_ares` VALUES (3043, 357, '伊吾县', 3);
INSERT INTO `pmo_ares` VALUES (3044, 357, '巴里坤', 3);
INSERT INTO `pmo_ares` VALUES (3045, 358, '和田市', 3);
INSERT INTO `pmo_ares` VALUES (3046, 358, '和田县', 3);
INSERT INTO `pmo_ares` VALUES (3047, 358, '墨玉县', 3);
INSERT INTO `pmo_ares` VALUES (3048, 358, '皮山县', 3);
INSERT INTO `pmo_ares` VALUES (3049, 358, '洛浦县', 3);
INSERT INTO `pmo_ares` VALUES (3050, 358, '策勒县', 3);
INSERT INTO `pmo_ares` VALUES (3051, 358, '于田县', 3);
INSERT INTO `pmo_ares` VALUES (3052, 358, '民丰县', 3);
INSERT INTO `pmo_ares` VALUES (3053, 359, '喀什市', 3);
INSERT INTO `pmo_ares` VALUES (3054, 359, '疏附县', 3);
INSERT INTO `pmo_ares` VALUES (3055, 359, '疏勒县', 3);
INSERT INTO `pmo_ares` VALUES (3056, 359, '英吉沙县', 3);
INSERT INTO `pmo_ares` VALUES (3057, 359, '泽普县', 3);
INSERT INTO `pmo_ares` VALUES (3058, 359, '莎车县', 3);
INSERT INTO `pmo_ares` VALUES (3059, 359, '叶城县', 3);
INSERT INTO `pmo_ares` VALUES (3060, 359, '麦盖提县', 3);
INSERT INTO `pmo_ares` VALUES (3061, 359, '岳普湖县', 3);
INSERT INTO `pmo_ares` VALUES (3062, 359, '伽师县', 3);
INSERT INTO `pmo_ares` VALUES (3063, 359, '巴楚县', 3);
INSERT INTO `pmo_ares` VALUES (3064, 359, '塔什库尔干', 3);
INSERT INTO `pmo_ares` VALUES (3065, 360, '克拉玛依市', 3);
INSERT INTO `pmo_ares` VALUES (3066, 361, '阿图什市', 3);
INSERT INTO `pmo_ares` VALUES (3067, 361, '阿克陶县', 3);
INSERT INTO `pmo_ares` VALUES (3068, 361, '阿合奇县', 3);
INSERT INTO `pmo_ares` VALUES (3069, 361, '乌恰县', 3);
INSERT INTO `pmo_ares` VALUES (3070, 362, '石河子市', 3);
INSERT INTO `pmo_ares` VALUES (3071, 363, '图木舒克市', 3);
INSERT INTO `pmo_ares` VALUES (3072, 364, '吐鲁番市', 3);
INSERT INTO `pmo_ares` VALUES (3073, 364, '鄯善县', 3);
INSERT INTO `pmo_ares` VALUES (3074, 364, '托克逊县', 3);
INSERT INTO `pmo_ares` VALUES (3075, 365, '五家渠市', 3);
INSERT INTO `pmo_ares` VALUES (3076, 366, '阿勒泰市', 3);
INSERT INTO `pmo_ares` VALUES (3077, 366, '布克赛尔', 3);
INSERT INTO `pmo_ares` VALUES (3078, 366, '伊宁市', 3);
INSERT INTO `pmo_ares` VALUES (3079, 366, '布尔津县', 3);
INSERT INTO `pmo_ares` VALUES (3080, 366, '奎屯市', 3);
INSERT INTO `pmo_ares` VALUES (3081, 366, '乌苏市', 3);
INSERT INTO `pmo_ares` VALUES (3082, 366, '额敏县', 3);
INSERT INTO `pmo_ares` VALUES (3083, 366, '富蕴县', 3);
INSERT INTO `pmo_ares` VALUES (3084, 366, '伊宁县', 3);
INSERT INTO `pmo_ares` VALUES (3085, 366, '福海县', 3);
INSERT INTO `pmo_ares` VALUES (3086, 366, '霍城县', 3);
INSERT INTO `pmo_ares` VALUES (3087, 366, '沙湾县', 3);
INSERT INTO `pmo_ares` VALUES (3088, 366, '巩留县', 3);
INSERT INTO `pmo_ares` VALUES (3089, 366, '哈巴河县', 3);
INSERT INTO `pmo_ares` VALUES (3090, 366, '托里县', 3);
INSERT INTO `pmo_ares` VALUES (3091, 366, '青河县', 3);
INSERT INTO `pmo_ares` VALUES (3092, 366, '新源县', 3);
INSERT INTO `pmo_ares` VALUES (3093, 366, '裕民县', 3);
INSERT INTO `pmo_ares` VALUES (3094, 366, '和布克赛尔', 3);
INSERT INTO `pmo_ares` VALUES (3095, 366, '吉木乃县', 3);
INSERT INTO `pmo_ares` VALUES (3096, 366, '昭苏县', 3);
INSERT INTO `pmo_ares` VALUES (3097, 366, '特克斯县', 3);
INSERT INTO `pmo_ares` VALUES (3098, 366, '尼勒克县', 3);
INSERT INTO `pmo_ares` VALUES (3099, 366, '察布查尔', 3);
INSERT INTO `pmo_ares` VALUES (3100, 367, '盘龙区', 3);
INSERT INTO `pmo_ares` VALUES (3101, 367, '五华区', 3);
INSERT INTO `pmo_ares` VALUES (3102, 367, '官渡区', 3);
INSERT INTO `pmo_ares` VALUES (3103, 367, '西山区', 3);
INSERT INTO `pmo_ares` VALUES (3104, 367, '东川区', 3);
INSERT INTO `pmo_ares` VALUES (3105, 367, '安宁市', 3);
INSERT INTO `pmo_ares` VALUES (3106, 367, '呈贡县', 3);
INSERT INTO `pmo_ares` VALUES (3107, 367, '晋宁县', 3);
INSERT INTO `pmo_ares` VALUES (3108, 367, '富民县', 3);
INSERT INTO `pmo_ares` VALUES (3109, 367, '宜良县', 3);
INSERT INTO `pmo_ares` VALUES (3110, 367, '嵩明县', 3);
INSERT INTO `pmo_ares` VALUES (3111, 367, '石林县', 3);
INSERT INTO `pmo_ares` VALUES (3112, 367, '禄劝', 3);
INSERT INTO `pmo_ares` VALUES (3113, 367, '寻甸', 3);
INSERT INTO `pmo_ares` VALUES (3114, 368, '兰坪', 3);
INSERT INTO `pmo_ares` VALUES (3115, 368, '泸水县', 3);
INSERT INTO `pmo_ares` VALUES (3116, 368, '福贡县', 3);
INSERT INTO `pmo_ares` VALUES (3117, 368, '贡山', 3);
INSERT INTO `pmo_ares` VALUES (3118, 369, '宁洱', 3);
INSERT INTO `pmo_ares` VALUES (3119, 369, '思茅区', 3);
INSERT INTO `pmo_ares` VALUES (3120, 369, '墨江', 3);
INSERT INTO `pmo_ares` VALUES (3121, 369, '景东', 3);
INSERT INTO `pmo_ares` VALUES (3122, 369, '景谷', 3);
INSERT INTO `pmo_ares` VALUES (3123, 369, '镇沅', 3);
INSERT INTO `pmo_ares` VALUES (3124, 369, '江城', 3);
INSERT INTO `pmo_ares` VALUES (3125, 369, '孟连', 3);
INSERT INTO `pmo_ares` VALUES (3126, 369, '澜沧', 3);
INSERT INTO `pmo_ares` VALUES (3127, 369, '西盟', 3);
INSERT INTO `pmo_ares` VALUES (3128, 370, '古城区', 3);
INSERT INTO `pmo_ares` VALUES (3129, 370, '宁蒗', 3);
INSERT INTO `pmo_ares` VALUES (3130, 370, '玉龙', 3);
INSERT INTO `pmo_ares` VALUES (3131, 370, '永胜县', 3);
INSERT INTO `pmo_ares` VALUES (3132, 370, '华坪县', 3);
INSERT INTO `pmo_ares` VALUES (3133, 371, '隆阳区', 3);
INSERT INTO `pmo_ares` VALUES (3134, 371, '施甸县', 3);
INSERT INTO `pmo_ares` VALUES (3135, 371, '腾冲县', 3);
INSERT INTO `pmo_ares` VALUES (3136, 371, '龙陵县', 3);
INSERT INTO `pmo_ares` VALUES (3137, 371, '昌宁县', 3);
INSERT INTO `pmo_ares` VALUES (3138, 372, '楚雄市', 3);
INSERT INTO `pmo_ares` VALUES (3139, 372, '双柏县', 3);
INSERT INTO `pmo_ares` VALUES (3140, 372, '牟定县', 3);
INSERT INTO `pmo_ares` VALUES (3141, 372, '南华县', 3);
INSERT INTO `pmo_ares` VALUES (3142, 372, '姚安县', 3);
INSERT INTO `pmo_ares` VALUES (3143, 372, '大姚县', 3);
INSERT INTO `pmo_ares` VALUES (3144, 372, '永仁县', 3);
INSERT INTO `pmo_ares` VALUES (3145, 372, '元谋县', 3);
INSERT INTO `pmo_ares` VALUES (3146, 372, '武定县', 3);
INSERT INTO `pmo_ares` VALUES (3147, 372, '禄丰县', 3);
INSERT INTO `pmo_ares` VALUES (3148, 373, '大理市', 3);
INSERT INTO `pmo_ares` VALUES (3149, 373, '祥云县', 3);
INSERT INTO `pmo_ares` VALUES (3150, 373, '宾川县', 3);
INSERT INTO `pmo_ares` VALUES (3151, 373, '弥渡县', 3);
INSERT INTO `pmo_ares` VALUES (3152, 373, '永平县', 3);
INSERT INTO `pmo_ares` VALUES (3153, 373, '云龙县', 3);
INSERT INTO `pmo_ares` VALUES (3154, 373, '洱源县', 3);
INSERT INTO `pmo_ares` VALUES (3155, 373, '剑川县', 3);
INSERT INTO `pmo_ares` VALUES (3156, 373, '鹤庆县', 3);
INSERT INTO `pmo_ares` VALUES (3157, 373, '漾濞', 3);
INSERT INTO `pmo_ares` VALUES (3158, 373, '南涧', 3);
INSERT INTO `pmo_ares` VALUES (3159, 373, '巍山', 3);
INSERT INTO `pmo_ares` VALUES (3160, 374, '潞西市', 3);
INSERT INTO `pmo_ares` VALUES (3161, 374, '瑞丽市', 3);
INSERT INTO `pmo_ares` VALUES (3162, 374, '梁河县', 3);
INSERT INTO `pmo_ares` VALUES (3163, 374, '盈江县', 3);
INSERT INTO `pmo_ares` VALUES (3164, 374, '陇川县', 3);
INSERT INTO `pmo_ares` VALUES (3165, 375, '香格里拉县', 3);
INSERT INTO `pmo_ares` VALUES (3166, 375, '德钦县', 3);
INSERT INTO `pmo_ares` VALUES (3167, 375, '维西', 3);
INSERT INTO `pmo_ares` VALUES (3168, 376, '泸西县', 3);
INSERT INTO `pmo_ares` VALUES (3169, 376, '蒙自县', 3);
INSERT INTO `pmo_ares` VALUES (3170, 376, '个旧市', 3);
INSERT INTO `pmo_ares` VALUES (3171, 376, '开远市', 3);
INSERT INTO `pmo_ares` VALUES (3172, 376, '绿春县', 3);
INSERT INTO `pmo_ares` VALUES (3173, 376, '建水县', 3);
INSERT INTO `pmo_ares` VALUES (3174, 376, '石屏县', 3);
INSERT INTO `pmo_ares` VALUES (3175, 376, '弥勒县', 3);
INSERT INTO `pmo_ares` VALUES (3176, 376, '元阳县', 3);
INSERT INTO `pmo_ares` VALUES (3177, 376, '红河县', 3);
INSERT INTO `pmo_ares` VALUES (3178, 376, '金平', 3);
INSERT INTO `pmo_ares` VALUES (3179, 376, '河口', 3);
INSERT INTO `pmo_ares` VALUES (3180, 376, '屏边', 3);
INSERT INTO `pmo_ares` VALUES (3181, 377, '临翔区', 3);
INSERT INTO `pmo_ares` VALUES (3182, 377, '凤庆县', 3);
INSERT INTO `pmo_ares` VALUES (3183, 377, '云县', 3);
INSERT INTO `pmo_ares` VALUES (3184, 377, '永德县', 3);
INSERT INTO `pmo_ares` VALUES (3185, 377, '镇康县', 3);
INSERT INTO `pmo_ares` VALUES (3186, 377, '双江', 3);
INSERT INTO `pmo_ares` VALUES (3187, 377, '耿马', 3);
INSERT INTO `pmo_ares` VALUES (3188, 377, '沧源', 3);
INSERT INTO `pmo_ares` VALUES (3189, 378, '麒麟区', 3);
INSERT INTO `pmo_ares` VALUES (3190, 378, '宣威市', 3);
INSERT INTO `pmo_ares` VALUES (3191, 378, '马龙县', 3);
INSERT INTO `pmo_ares` VALUES (3192, 378, '陆良县', 3);
INSERT INTO `pmo_ares` VALUES (3193, 378, '师宗县', 3);
INSERT INTO `pmo_ares` VALUES (3194, 378, '罗平县', 3);
INSERT INTO `pmo_ares` VALUES (3195, 378, '富源县', 3);
INSERT INTO `pmo_ares` VALUES (3196, 378, '会泽县', 3);
INSERT INTO `pmo_ares` VALUES (3197, 378, '沾益县', 3);
INSERT INTO `pmo_ares` VALUES (3198, 379, '文山县', 3);
INSERT INTO `pmo_ares` VALUES (3199, 379, '砚山县', 3);
INSERT INTO `pmo_ares` VALUES (3200, 379, '西畴县', 3);
INSERT INTO `pmo_ares` VALUES (3201, 379, '麻栗坡县', 3);
INSERT INTO `pmo_ares` VALUES (3202, 379, '马关县', 3);
INSERT INTO `pmo_ares` VALUES (3203, 379, '丘北县', 3);
INSERT INTO `pmo_ares` VALUES (3204, 379, '广南县', 3);
INSERT INTO `pmo_ares` VALUES (3205, 379, '富宁县', 3);
INSERT INTO `pmo_ares` VALUES (3206, 380, '景洪市', 3);
INSERT INTO `pmo_ares` VALUES (3207, 380, '勐海县', 3);
INSERT INTO `pmo_ares` VALUES (3208, 380, '勐腊县', 3);
INSERT INTO `pmo_ares` VALUES (3209, 381, '红塔区', 3);
INSERT INTO `pmo_ares` VALUES (3210, 381, '江川县', 3);
INSERT INTO `pmo_ares` VALUES (3211, 381, '澄江县', 3);
INSERT INTO `pmo_ares` VALUES (3212, 381, '通海县', 3);
INSERT INTO `pmo_ares` VALUES (3213, 381, '华宁县', 3);
INSERT INTO `pmo_ares` VALUES (3214, 381, '易门县', 3);
INSERT INTO `pmo_ares` VALUES (3215, 381, '峨山', 3);
INSERT INTO `pmo_ares` VALUES (3216, 381, '新平', 3);
INSERT INTO `pmo_ares` VALUES (3217, 381, '元江', 3);
INSERT INTO `pmo_ares` VALUES (3218, 382, '昭阳区', 3);
INSERT INTO `pmo_ares` VALUES (3219, 382, '鲁甸县', 3);
INSERT INTO `pmo_ares` VALUES (3220, 382, '巧家县', 3);
INSERT INTO `pmo_ares` VALUES (3221, 382, '盐津县', 3);
INSERT INTO `pmo_ares` VALUES (3222, 382, '大关县', 3);
INSERT INTO `pmo_ares` VALUES (3223, 382, '永善县', 3);
INSERT INTO `pmo_ares` VALUES (3224, 382, '绥江县', 3);
INSERT INTO `pmo_ares` VALUES (3225, 382, '镇雄县', 3);
INSERT INTO `pmo_ares` VALUES (3226, 382, '彝良县', 3);
INSERT INTO `pmo_ares` VALUES (3227, 382, '威信县', 3);
INSERT INTO `pmo_ares` VALUES (3228, 382, '水富县', 3);
INSERT INTO `pmo_ares` VALUES (3229, 383, '西湖区', 3);
INSERT INTO `pmo_ares` VALUES (3230, 383, '上城区', 3);
INSERT INTO `pmo_ares` VALUES (3231, 383, '下城区', 3);
INSERT INTO `pmo_ares` VALUES (3232, 383, '拱墅区', 3);
INSERT INTO `pmo_ares` VALUES (3233, 383, '滨江区', 3);
INSERT INTO `pmo_ares` VALUES (3234, 383, '江干区', 3);
INSERT INTO `pmo_ares` VALUES (3235, 383, '萧山区', 3);
INSERT INTO `pmo_ares` VALUES (3236, 383, '余杭区', 3);
INSERT INTO `pmo_ares` VALUES (3237, 383, '市郊', 3);
INSERT INTO `pmo_ares` VALUES (3238, 383, '建德市', 3);
INSERT INTO `pmo_ares` VALUES (3239, 383, '富阳市', 3);
INSERT INTO `pmo_ares` VALUES (3240, 383, '临安市', 3);
INSERT INTO `pmo_ares` VALUES (3241, 383, '桐庐县', 3);
INSERT INTO `pmo_ares` VALUES (3242, 383, '淳安县', 3);
INSERT INTO `pmo_ares` VALUES (3243, 384, '吴兴区', 3);
INSERT INTO `pmo_ares` VALUES (3244, 384, '南浔区', 3);
INSERT INTO `pmo_ares` VALUES (3245, 384, '德清县', 3);
INSERT INTO `pmo_ares` VALUES (3246, 384, '长兴县', 3);
INSERT INTO `pmo_ares` VALUES (3247, 384, '安吉县', 3);
INSERT INTO `pmo_ares` VALUES (3248, 385, '南湖区', 3);
INSERT INTO `pmo_ares` VALUES (3249, 385, '秀洲区', 3);
INSERT INTO `pmo_ares` VALUES (3250, 385, '海宁市', 3);
INSERT INTO `pmo_ares` VALUES (3251, 385, '嘉善县', 3);
INSERT INTO `pmo_ares` VALUES (3252, 385, '平湖市', 3);
INSERT INTO `pmo_ares` VALUES (3253, 385, '桐乡市', 3);
INSERT INTO `pmo_ares` VALUES (3254, 385, '海盐县', 3);
INSERT INTO `pmo_ares` VALUES (3255, 386, '婺城区', 3);
INSERT INTO `pmo_ares` VALUES (3256, 386, '金东区', 3);
INSERT INTO `pmo_ares` VALUES (3257, 386, '兰溪市', 3);
INSERT INTO `pmo_ares` VALUES (3258, 386, '市区', 3);
INSERT INTO `pmo_ares` VALUES (3259, 386, '佛堂镇', 3);
INSERT INTO `pmo_ares` VALUES (3260, 386, '上溪镇', 3);
INSERT INTO `pmo_ares` VALUES (3261, 386, '义亭镇', 3);
INSERT INTO `pmo_ares` VALUES (3262, 386, '大陈镇', 3);
INSERT INTO `pmo_ares` VALUES (3263, 386, '苏溪镇', 3);
INSERT INTO `pmo_ares` VALUES (3264, 386, '赤岸镇', 3);
INSERT INTO `pmo_ares` VALUES (3265, 386, '东阳市', 3);
INSERT INTO `pmo_ares` VALUES (3266, 386, '永康市', 3);
INSERT INTO `pmo_ares` VALUES (3267, 386, '武义县', 3);
INSERT INTO `pmo_ares` VALUES (3268, 386, '浦江县', 3);
INSERT INTO `pmo_ares` VALUES (3269, 386, '磐安县', 3);
INSERT INTO `pmo_ares` VALUES (3270, 387, '莲都区', 3);
INSERT INTO `pmo_ares` VALUES (3271, 387, '龙泉市', 3);
INSERT INTO `pmo_ares` VALUES (3272, 387, '青田县', 3);
INSERT INTO `pmo_ares` VALUES (3273, 387, '缙云县', 3);
INSERT INTO `pmo_ares` VALUES (3274, 387, '遂昌县', 3);
INSERT INTO `pmo_ares` VALUES (3275, 387, '松阳县', 3);
INSERT INTO `pmo_ares` VALUES (3276, 387, '云和县', 3);
INSERT INTO `pmo_ares` VALUES (3277, 387, '庆元县', 3);
INSERT INTO `pmo_ares` VALUES (3278, 387, '景宁', 3);
INSERT INTO `pmo_ares` VALUES (3279, 388, '海曙区', 3);
INSERT INTO `pmo_ares` VALUES (3280, 388, '江东区', 3);
INSERT INTO `pmo_ares` VALUES (3281, 388, '江北区', 3);
INSERT INTO `pmo_ares` VALUES (3282, 388, '镇海区', 3);
INSERT INTO `pmo_ares` VALUES (3283, 388, '北仑区', 3);
INSERT INTO `pmo_ares` VALUES (3284, 388, '鄞州区', 3);
INSERT INTO `pmo_ares` VALUES (3285, 388, '余姚市', 3);
INSERT INTO `pmo_ares` VALUES (3286, 388, '慈溪市', 3);
INSERT INTO `pmo_ares` VALUES (3287, 388, '奉化市', 3);
INSERT INTO `pmo_ares` VALUES (3288, 388, '象山县', 3);
INSERT INTO `pmo_ares` VALUES (3289, 388, '宁海县', 3);
INSERT INTO `pmo_ares` VALUES (3290, 389, '越城区', 3);
INSERT INTO `pmo_ares` VALUES (3291, 389, '上虞市', 3);
INSERT INTO `pmo_ares` VALUES (3292, 389, '嵊州市', 3);
INSERT INTO `pmo_ares` VALUES (3293, 389, '绍兴县', 3);
INSERT INTO `pmo_ares` VALUES (3294, 389, '新昌县', 3);
INSERT INTO `pmo_ares` VALUES (3295, 389, '诸暨市', 3);
INSERT INTO `pmo_ares` VALUES (3296, 390, '椒江区', 3);
INSERT INTO `pmo_ares` VALUES (3297, 390, '黄岩区', 3);
INSERT INTO `pmo_ares` VALUES (3298, 390, '路桥区', 3);
INSERT INTO `pmo_ares` VALUES (3299, 390, '温岭市', 3);
INSERT INTO `pmo_ares` VALUES (3300, 390, '临海市', 3);
INSERT INTO `pmo_ares` VALUES (3301, 390, '玉环县', 3);
INSERT INTO `pmo_ares` VALUES (3302, 390, '三门县', 3);
INSERT INTO `pmo_ares` VALUES (3303, 390, '天台县', 3);
INSERT INTO `pmo_ares` VALUES (3304, 390, '仙居县', 3);
INSERT INTO `pmo_ares` VALUES (3305, 391, '鹿城区', 3);
INSERT INTO `pmo_ares` VALUES (3306, 391, '龙湾区', 3);
INSERT INTO `pmo_ares` VALUES (3307, 391, '瓯海区', 3);
INSERT INTO `pmo_ares` VALUES (3308, 391, '瑞安市', 3);
INSERT INTO `pmo_ares` VALUES (3309, 391, '乐清市', 3);
INSERT INTO `pmo_ares` VALUES (3310, 391, '洞头县', 3);
INSERT INTO `pmo_ares` VALUES (3311, 391, '永嘉县', 3);
INSERT INTO `pmo_ares` VALUES (3312, 391, '平阳县', 3);
INSERT INTO `pmo_ares` VALUES (3313, 391, '苍南县', 3);
INSERT INTO `pmo_ares` VALUES (3314, 391, '文成县', 3);
INSERT INTO `pmo_ares` VALUES (3315, 391, '泰顺县', 3);
INSERT INTO `pmo_ares` VALUES (3316, 392, '定海区', 3);
INSERT INTO `pmo_ares` VALUES (3317, 392, '普陀区', 3);
INSERT INTO `pmo_ares` VALUES (3318, 392, '岱山县', 3);
INSERT INTO `pmo_ares` VALUES (3319, 392, '嵊泗县', 3);
INSERT INTO `pmo_ares` VALUES (3320, 393, '衢州市', 3);
INSERT INTO `pmo_ares` VALUES (3321, 393, '江山市', 3);
INSERT INTO `pmo_ares` VALUES (3322, 393, '常山县', 3);
INSERT INTO `pmo_ares` VALUES (3323, 393, '开化县', 3);
INSERT INTO `pmo_ares` VALUES (3324, 393, '龙游县', 3);
INSERT INTO `pmo_ares` VALUES (3325, 394, '合川区', 3);
INSERT INTO `pmo_ares` VALUES (3326, 394, '江津区', 3);
INSERT INTO `pmo_ares` VALUES (3327, 394, '南川区', 3);
INSERT INTO `pmo_ares` VALUES (3328, 394, '永川区', 3);
INSERT INTO `pmo_ares` VALUES (3329, 394, '南岸区', 3);
INSERT INTO `pmo_ares` VALUES (3330, 394, '渝北区', 3);
INSERT INTO `pmo_ares` VALUES (3331, 394, '万盛区', 3);
INSERT INTO `pmo_ares` VALUES (3332, 394, '大渡口区', 3);
INSERT INTO `pmo_ares` VALUES (3333, 394, '万州区', 3);
INSERT INTO `pmo_ares` VALUES (3334, 394, '北碚区', 3);
INSERT INTO `pmo_ares` VALUES (3335, 394, '沙坪坝区', 3);
INSERT INTO `pmo_ares` VALUES (3336, 394, '巴南区', 3);
INSERT INTO `pmo_ares` VALUES (3337, 394, '涪陵区', 3);
INSERT INTO `pmo_ares` VALUES (3338, 394, '江北区', 3);
INSERT INTO `pmo_ares` VALUES (3339, 394, '九龙坡区', 3);
INSERT INTO `pmo_ares` VALUES (3340, 394, '渝中区', 3);
INSERT INTO `pmo_ares` VALUES (3341, 394, '黔江开发区', 3);
INSERT INTO `pmo_ares` VALUES (3342, 394, '长寿区', 3);
INSERT INTO `pmo_ares` VALUES (3343, 394, '双桥区', 3);
INSERT INTO `pmo_ares` VALUES (3344, 394, '綦江县', 3);
INSERT INTO `pmo_ares` VALUES (3345, 394, '潼南县', 3);
INSERT INTO `pmo_ares` VALUES (3346, 394, '铜梁县', 3);
INSERT INTO `pmo_ares` VALUES (3347, 394, '大足县', 3);
INSERT INTO `pmo_ares` VALUES (3348, 394, '荣昌县', 3);
INSERT INTO `pmo_ares` VALUES (3349, 394, '璧山县', 3);
INSERT INTO `pmo_ares` VALUES (3350, 394, '垫江县', 3);
INSERT INTO `pmo_ares` VALUES (3351, 394, '武隆县', 3);
INSERT INTO `pmo_ares` VALUES (3352, 394, '丰都县', 3);
INSERT INTO `pmo_ares` VALUES (3353, 394, '城口县', 3);
INSERT INTO `pmo_ares` VALUES (3354, 394, '梁平县', 3);
INSERT INTO `pmo_ares` VALUES (3355, 394, '开县', 3);
INSERT INTO `pmo_ares` VALUES (3356, 394, '巫溪县', 3);
INSERT INTO `pmo_ares` VALUES (3357, 394, '巫山县', 3);
INSERT INTO `pmo_ares` VALUES (3358, 394, '奉节县', 3);
INSERT INTO `pmo_ares` VALUES (3359, 394, '云阳县', 3);
INSERT INTO `pmo_ares` VALUES (3360, 394, '忠县', 3);
INSERT INTO `pmo_ares` VALUES (3361, 394, '石柱', 3);
INSERT INTO `pmo_ares` VALUES (3362, 394, '彭水', 3);
INSERT INTO `pmo_ares` VALUES (3363, 394, '酉阳', 3);
INSERT INTO `pmo_ares` VALUES (3364, 394, '秀山', 3);
INSERT INTO `pmo_ares` VALUES (3365, 395, '沙田区', 3);
INSERT INTO `pmo_ares` VALUES (3366, 395, '东区', 3);
INSERT INTO `pmo_ares` VALUES (3367, 395, '观塘区', 3);
INSERT INTO `pmo_ares` VALUES (3368, 395, '黄大仙区', 3);
INSERT INTO `pmo_ares` VALUES (3369, 395, '九龙城区', 3);
INSERT INTO `pmo_ares` VALUES (3370, 395, '屯门区', 3);
INSERT INTO `pmo_ares` VALUES (3371, 395, '葵青区', 3);
INSERT INTO `pmo_ares` VALUES (3372, 395, '元朗区', 3);
INSERT INTO `pmo_ares` VALUES (3373, 395, '深水埗区', 3);
INSERT INTO `pmo_ares` VALUES (3374, 395, '西贡区', 3);
INSERT INTO `pmo_ares` VALUES (3375, 395, '大埔区', 3);
INSERT INTO `pmo_ares` VALUES (3376, 395, '湾仔区', 3);
INSERT INTO `pmo_ares` VALUES (3377, 395, '油尖旺区', 3);
INSERT INTO `pmo_ares` VALUES (3378, 395, '北区', 3);
INSERT INTO `pmo_ares` VALUES (3379, 395, '南区', 3);
INSERT INTO `pmo_ares` VALUES (3380, 395, '荃湾区', 3);
INSERT INTO `pmo_ares` VALUES (3381, 395, '中西区', 3);
INSERT INTO `pmo_ares` VALUES (3382, 395, '离岛区', 3);
INSERT INTO `pmo_ares` VALUES (3383, 396, '澳门', 3);
INSERT INTO `pmo_ares` VALUES (3384, 397, '台北', 3);
INSERT INTO `pmo_ares` VALUES (3385, 397, '高雄', 3);
INSERT INTO `pmo_ares` VALUES (3386, 397, '基隆', 3);
INSERT INTO `pmo_ares` VALUES (3387, 397, '台中', 3);
INSERT INTO `pmo_ares` VALUES (3388, 397, '台南', 3);
INSERT INTO `pmo_ares` VALUES (3389, 397, '新竹', 3);
INSERT INTO `pmo_ares` VALUES (3390, 397, '嘉义', 3);
INSERT INTO `pmo_ares` VALUES (3391, 397, '宜兰县', 3);
INSERT INTO `pmo_ares` VALUES (3392, 397, '桃园县', 3);
INSERT INTO `pmo_ares` VALUES (3393, 397, '苗栗县', 3);
INSERT INTO `pmo_ares` VALUES (3394, 397, '彰化县', 3);
INSERT INTO `pmo_ares` VALUES (3395, 397, '南投县', 3);
INSERT INTO `pmo_ares` VALUES (3396, 397, '云林县', 3);
INSERT INTO `pmo_ares` VALUES (3397, 397, '屏东县', 3);
INSERT INTO `pmo_ares` VALUES (3398, 397, '台东县', 3);
INSERT INTO `pmo_ares` VALUES (3399, 397, '花莲县', 3);
INSERT INTO `pmo_ares` VALUES (3400, 397, '澎湖县', 3);
INSERT INTO `pmo_ares` VALUES (3401, 3, '合肥', 2);
INSERT INTO `pmo_ares` VALUES (3402, 3401, '庐阳区', 3);
INSERT INTO `pmo_ares` VALUES (3403, 3401, '瑶海区', 3);
INSERT INTO `pmo_ares` VALUES (3404, 3401, '蜀山区', 3);
INSERT INTO `pmo_ares` VALUES (3405, 3401, '包河区', 3);
INSERT INTO `pmo_ares` VALUES (3406, 3401, '长丰县', 3);
INSERT INTO `pmo_ares` VALUES (3407, 3401, '肥东县', 3);
INSERT INTO `pmo_ares` VALUES (3408, 3401, '肥西县', 3);

-- ----------------------------
-- Table structure for pmo_budget
-- ----------------------------
DROP TABLE IF EXISTS `pmo_budget`;
CREATE TABLE `pmo_budget`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `budget_project_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `parent_id` int(11) NULL DEFAULT NULL,
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
-- Table structure for pmo_contract
-- ----------------------------
DROP TABLE IF EXISTS `pmo_contract`;
CREATE TABLE `pmo_contract`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '合同内容',
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合同编号',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '合同编号表' ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '课程价格表' ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 86 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '钉钉拉取部门表（好像没用（好像））' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_department_staff
-- ----------------------------
INSERT INTO `pmo_department_staff` VALUES (44, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (45, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (46, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (47, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (48, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (49, 1, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (50, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (51, 26509420, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (52, 26509420, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (53, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (54, 26509421, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (55, 26509421, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (56, 26509421, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (57, 26509421, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (58, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (59, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (60, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (61, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (62, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (63, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (64, 26509419, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (65, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (66, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (67, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (68, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (69, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (70, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (71, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (72, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (73, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (74, 26429951, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (75, 26436766, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (76, 26436766, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (77, 26436766, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (78, 26456742, 0, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (79, 26456742, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (80, 26456742, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (81, 26456742, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (82, 30316407, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (83, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (84, 26509424, 2147483647, '2018-11-02 00:00:00', 1);
INSERT INTO `pmo_department_staff` VALUES (85, 30318368, 2147483647, '2018-11-02 00:00:00', 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '部门表' ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '部门表' ROW_FORMAT = Dynamic;

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
-- Table structure for pmo_examine_f_flow
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_f_flow`;
CREATE TABLE `pmo_examine_f_flow`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '名字',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批流姓名' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_examine_f_flow
-- ----------------------------
INSERT INTO `pmo_examine_f_flow` VALUES (2, '决算审批');
INSERT INTO `pmo_examine_f_flow` VALUES (1, '预算审批');

-- ----------------------------
-- Table structure for pmo_examine_flow
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_flow`;
CREATE TABLE `pmo_examine_flow`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '审批流作用名称',
  `examine_mode` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '审批模式 1开头为上级主管 2开头为角色 3开头为制定user_id',
  `pass_mode` tinyint(2) NULL DEFAULT NULL COMMENT '通过方式，1代表会签，2代表依次，3代表或签',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '项目流状态 0可用1为作废',
  `fid` int(11) NULL DEFAULT NULL COMMENT '连接的审批',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批流过程' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_examine_flow
-- ----------------------------
INSERT INTO `pmo_examine_flow` VALUES (2, '决算审批', '3,10', 2, 0, 2);
INSERT INTO `pmo_examine_flow` VALUES (1, '预算审批', '2,7,10', 1, 0, 1);

-- ----------------------------
-- Table structure for pmo_examine_notes
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_notes`;
CREATE TABLE `pmo_examine_notes`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '操作人姓名',
  `time` datetime(0) NULL DEFAULT NULL COMMENT '操作时间',
  `is_pass` tinyint(2) NULL DEFAULT 0 COMMENT '0为未操作1为通过审核-1为未通过审核',
  `parent_id` int(11) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '注释',
  `examine_type` tinyint(2) NULL DEFAULT NULL COMMENT '1为预算，2为决算，3为借款，4为支出',
  `pass_mode` tinyint(2) NULL DEFAULT NULL COMMENT '1为依次通过，2为会签，3为或签',
  `admin_id` int(11) NULL DEFAULT NULL COMMENT '操作人id',
  `mode` tinyint(2) NULL DEFAULT NULL COMMENT '1为逐级2为角色3为指定4为第几级',
  `additional` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '逐级或角色或指定或第几级',
  `static_id` int(11) NULL DEFAULT NULL COMMENT '静态表id',
  `examine_id` int(11) NULL DEFAULT NULL COMMENT '审批项目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 302 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批节点记录' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_examine_notes
-- ----------------------------
INSERT INTO `pmo_examine_notes` VALUES (301, '段美静', NULL, 0, 141, NULL, 1, NULL, 10, 2, '行政', NULL, 270);
INSERT INTO `pmo_examine_notes` VALUES (278, '段美静', NULL, 0, 127, NULL, 2, NULL, 10, 2, '行政', NULL, 247);
INSERT INTO `pmo_examine_notes` VALUES (279, '段美静', '2018-12-28 13:52:42', 1, 132, '', 1, NULL, 10, 2, '行政', NULL, 248);
INSERT INTO `pmo_examine_notes` VALUES (281, '段美静', '2018-12-28 14:00:16', 1, 133, '', 1, NULL, 10, 2, '行政', NULL, 250);
INSERT INTO `pmo_examine_notes` VALUES (282, '段美静', NULL, 0, 132, NULL, 2, NULL, 10, 2, '行政', NULL, 251);
INSERT INTO `pmo_examine_notes` VALUES (300, '段美静', NULL, 0, 140, NULL, 1, NULL, 10, 2, '行政', NULL, 269);
INSERT INTO `pmo_examine_notes` VALUES (292, '段美静', '2018-12-28 16:05:09', 1, 138, '', 1, NULL, 10, 2, '行政', NULL, 261);
INSERT INTO `pmo_examine_notes` VALUES (297, '段美静', '2018-12-28 16:05:16', 1, 139, '', 1, NULL, 10, 2, '行政', NULL, 266);
INSERT INTO `pmo_examine_notes` VALUES (299, '段美静', '2018-12-28 16:09:06', 1, 139, '', 2, NULL, 10, 2, '行政', NULL, 268);
INSERT INTO `pmo_examine_notes` VALUES (285, '段美静', NULL, 0, 135, NULL, 1, NULL, 10, 2, '行政', NULL, 254);
INSERT INTO `pmo_examine_notes` VALUES (284, '段美静', NULL, 0, 134, NULL, 1, NULL, 10, 2, '行政', NULL, 253);
INSERT INTO `pmo_examine_notes` VALUES (283, '段美静', NULL, 0, 131, NULL, 1, NULL, 10, 2, '行政', NULL, 252);
INSERT INTO `pmo_examine_notes` VALUES (277, '段美静', '2018-12-27 17:24:21', 1, 127, '', 1, NULL, 10, 2, '行政', NULL, 246);
INSERT INTO `pmo_examine_notes` VALUES (275, '段美静', '2018-12-27 17:23:57', -1, 127, '', 1, NULL, 10, 2, '行政', NULL, 244);
INSERT INTO `pmo_examine_notes` VALUES (276, '段美静', '2018-12-27 17:24:10', -1, 127, '', 1, NULL, 10, 2, '行政', NULL, 245);
INSERT INTO `pmo_examine_notes` VALUES (273, '段美静', '2018-12-27 15:35:14', 1, 126, '', 2, NULL, 10, 2, '行政', NULL, 242);
INSERT INTO `pmo_examine_notes` VALUES (272, '段美静', '2018-12-27 15:35:00', -1, 126, '', 2, NULL, 10, 2, '行政', NULL, 241);
INSERT INTO `pmo_examine_notes` VALUES (258, '段美静', '2018-12-27 15:18:45', -1, 123, '', 1, NULL, 10, 2, '行政', NULL, 227);
INSERT INTO `pmo_examine_notes` VALUES (259, '段美静', '2018-12-27 15:19:29', 1, 123, '', 1, NULL, 10, 2, '行政', NULL, 228);
INSERT INTO `pmo_examine_notes` VALUES (260, '段美静', '2018-12-27 15:23:09', -1, 124, '', 1, NULL, 10, 2, '行政', NULL, 229);
INSERT INTO `pmo_examine_notes` VALUES (261, '段美静', '2018-12-27 15:24:45', -1, 124, '', 1, NULL, 10, 2, '行政', NULL, 230);
INSERT INTO `pmo_examine_notes` VALUES (262, '段美静', '2018-12-27 15:26:55', -1, 124, '', 1, NULL, 10, 2, '行政', NULL, 231);
INSERT INTO `pmo_examine_notes` VALUES (263, '段美静', '2018-12-27 15:27:23', 1, 124, '', 1, NULL, 10, 2, '行政', NULL, 232);
INSERT INTO `pmo_examine_notes` VALUES (271, '段美静', '2018-12-27 15:34:43', -1, 126, '', 2, NULL, 10, 2, '行政', NULL, 240);
INSERT INTO `pmo_examine_notes` VALUES (270, '段美静', '2018-12-27 15:34:27', 1, 126, '', 1, NULL, 10, 2, '行政', NULL, 239);
INSERT INTO `pmo_examine_notes` VALUES (267, '段美静', '2018-12-27 15:29:47', -1, 125, '', 1, NULL, 10, 2, '行政', NULL, 236);
INSERT INTO `pmo_examine_notes` VALUES (268, '段美静', '2018-12-27 15:30:45', -1, 125, '', 1, NULL, 10, 2, '行政', NULL, 237);
INSERT INTO `pmo_examine_notes` VALUES (269, '段美静', '2018-12-27 15:31:00', 1, 125, '', 1, NULL, 10, 2, '行政', NULL, 238);

-- ----------------------------
-- Table structure for pmo_examine_project
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_project`;
CREATE TABLE `pmo_examine_project`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `examine_type` tinyint(2) NULL DEFAULT NULL COMMENT '审批类型',
  `apply_user` int(11) NULL DEFAULT NULL COMMENT '申请人',
  `apply_time` datetime(0) NULL DEFAULT NULL COMMENT '提交申请时间',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '是否作废0为在审批1为已通过 -1为未通过',
  `time` datetime(0) NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '静态数据',
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '版本号',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '提交人姓名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 271 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批项目集合表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_examine_project
-- ----------------------------
INSERT INTO `pmo_examine_project` VALUES (266, 139, 1, 32, NULL, 1, '2018-12-28 16:04:24', '{\"project_list_data\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":555,\"city\":50,\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\",\"project_training_ares_name\":\"北京--北京--金融界121号F301\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15000,\"implementation_cost\":600,\"conference_cost\":0,\"stay\":2000,\"meal\":0,\"travel_cost\":2605,\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"lecturers\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"implement\":{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"},\"venue\":[],\"consulting_cost\":0,\"costing\":21805,\"expected_income\":\"60000\",\"project_profit\":38195,\"gross_interest_rate\":\"63.66%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:05:16\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"2\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\"},\"lecturer_get_project\":{\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_name_name\":\"柳芳\",\"parent_id\":\"139\"}],\"project_name\":\"需求分析\",\"unicode\":\"201812005\"},\"implement_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"implement\":[{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"}],\"venue\":[]},\"travel_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"city\":[{\"id\":\"71\",\"short_fee_card_people\":\"寇艳艳\",\"short_fee_type\":\"地铁\",\"short_fee\":\"50\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"state\":\"0\"}],\"meal\":[],\"province\":[{\"id\":\"126\",\"long_fee_card_people\":\"徐全\",\"long_fee_card_start_time\":\"2018-12-01T12:12\",\"long_fee_card_start_place\":\"北京\",\"long_fee_card_end_time\":\"2018-12-05T12:12\",\"long_fee_card_end_place\":\"上海\",\"state\":\"0\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"long_fee_card_fee\":\"555\",\"long_fee_card_vehicle_name\":\"火车\",\"long_fee_card_vehicle_id\":\"1\"}],\"stay\":[{\"id\":\"57\",\"hotel_expense_people\":\"寇艳艳\",\"hotel_expense_days\":\"4\",\"hotel_expense_total\":\"2000\",\"parent_id\":\"139\",\"state\":\"0\",\"now_time\":null}]}}', '3.0', '寇艳艳');
INSERT INTO `pmo_examine_project` VALUES (270, 141, 1, 30, NULL, 0, '2018-12-28 16:30:24', '{\"project_list_data\":{\"id\":\"141\",\"project_name\":null,\"project_gather_id\":null,\"project_person_in_charge_id\":null,\"project_project_template_id\":\"3\",\"project_training_ares_id\":null,\"project_customer_name\":null,\"project_days\":null,\"project_start_date\":null,\"project_end_date\":null,\"project_training_numbers\":null,\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"技术资源部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":null,\"project_tax_rate\":null,\"institutional_consulting_fees\":null,\"personal_consulting_fees\":null,\"unicode\":\"201812007\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":null,\"end\":null},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"141\",\"project_name\":null,\"project_gather_id\":null,\"project_person_in_charge_id\":null,\"project_project_template_id\":\"3\",\"project_training_ares_id\":null,\"project_customer_name\":null,\"project_days\":null,\"project_start_date\":null,\"project_end_date\":null,\"project_training_numbers\":null,\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"技术资源部\",\"province\":null,\"city\":null,\"address\":null,\"project_income\":null,\"project_tax_rate\":null,\"institutional_consulting_fees\":null,\"personal_consulting_fees\":null,\"unicode\":\"201812007\"},\"lecturer_get_project\":{\"lecturer\":[],\"project_name\":null,\"unicode\":\"201812007\"},\"implement_get_project\":{\"project_name\":null,\"unicode\":\"201812007\",\"implement\":[],\"venue\":[]},\"travel_get_project\":{\"project_name\":null,\"unicode\":\"201812007\",\"city\":[],\"meal\":[],\"province\":[],\"stay\":[]}}', '2.0', '崔思思');
INSERT INTO `pmo_examine_project` VALUES (269, 140, 1, 16, NULL, 0, '2018-12-28 16:09:03', '{\"project_list_data\":{\"id\":\"140\",\"project_name\":\"软考靠前培训班\",\"project_gather_id\":\"21\",\"project_person_in_charge_id\":\"18\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"1\",\"project_customer_name\":\"软考学员\",\"project_days\":\"4\",\"project_start_date\":\"2018-12-28\",\"project_end_date\":\"2018-12-31\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"温越\",\"project_leader_id\":\"21\",\"project_person_in_charge_name\":\"李旋\",\"project_gather_name\":\"软考\",\"project_project_template_name\":\"公共培训部\",\"province\":0,\"city\":200,\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"1800\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812006\",\"project_training_ares_name\":\"北京--北京--中软大厦\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\"},\"project_date\":{\"start\":\"2018-12-28\",\"end\":\"2018-12-31\"},\"labor_cost\":1800,\"implementation_cost\":7200,\"conference_cost\":7200,\"stay\":0,\"meal\":680,\"travel_cost\":880,\"lecturer\":[{\"id\":\"263\",\"teacher_lecture_days\":\"4\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"1800\",\"teacher_income_tax\":\"0\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"lecturers\":[{\"id\":\"263\",\"teacher_lecture_days\":\"4\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"1800\",\"teacher_income_tax\":\"0\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"implement\":null,\"venue\":[{\"id\":\"82\",\"room_number\":null,\"unit_price\":\"1800\",\"days\":\"4\",\"total_price\":\"7200\",\"meetingplace_name\":null,\"meetingplace_address\":\"中软大厦第一会议室\",\"time\":\"2018-12-28 16:05:07\",\"state\":\"0\",\"parent_id\":\"140\"}],\"consulting_cost\":0,\"costing\":11680,\"expected_income\":\"60000\",\"project_profit\":48320,\"gross_interest_rate\":\"80.53%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"140\",\"project_name\":\"软考靠前培训班\",\"project_gather_id\":\"21\",\"project_person_in_charge_id\":\"18\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"1\",\"project_customer_name\":\"软考学员\",\"project_days\":\"4\",\"project_start_date\":\"2018-12-28\",\"project_end_date\":\"2018-12-31\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"温越\",\"project_leader_id\":\"21\",\"project_person_in_charge_name\":\"李旋\",\"project_gather_name\":\"软考\",\"project_project_template_name\":\"公共培训部\",\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"1800\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812006\"},\"lecturer_get_project\":{\"lecturer\":[{\"id\":\"263\",\"teacher_lecture_days\":\"4\",\"teacher_duty_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_lecture_fee\":\"1800\",\"teacher_income_tax\":\"0\",\"teacher_name_id\":\"1\",\"teacher_name_name\":\"柳芳\",\"parent_id\":\"140\"}],\"project_name\":\"软考靠前培训班\",\"unicode\":\"201812006\"},\"implement_get_project\":{\"project_name\":\"软考靠前培训班\",\"unicode\":\"201812006\",\"implement\":[],\"venue\":[{\"id\":\"82\",\"room_number\":null,\"unit_price\":\"1800\",\"days\":\"4\",\"total_price\":\"7200\",\"meetingplace_name\":null,\"meetingplace_address\":\"中软大厦第一会议室\",\"time\":\"2018-12-28 16:05:07\",\"state\":\"0\",\"parent_id\":\"140\"}]},\"travel_get_project\":{\"project_name\":\"软考靠前培训班\",\"unicode\":\"201812006\",\"city\":[{\"id\":\"72\",\"short_fee_card_people\":\"李旋\",\"short_fee_type\":\"交通费\",\"short_fee\":\"200\",\"parent_id\":\"140\",\"now_time\":\"0000-00-00 00:00:00\",\"state\":\"0\"}],\"meal\":[{\"id\":\"49\",\"meal_fee\":\"680\",\"meal_fee_days\":\"4\",\"meal_fee_people_id\":\"1\",\"meal_fee_remarks\":\"班主任和讲师\",\"parent_id\":\"140\",\"state\":\"0\",\"meal_fee_people_name\":\"讲师\"}],\"province\":[],\"stay\":[]}}', '2.0', '杜刚利');
INSERT INTO `pmo_examine_project` VALUES (268, 139, 2, 32, NULL, 1, '2018-12-28 16:07:49', '{\"project_list_data\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":555,\"city\":300,\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\",\"project_training_ares_name\":\"北京--北京--金融界121号F301\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15000,\"implementation_cost\":600,\"conference_cost\":0,\"stay\":2000,\"meal\":170,\"travel_cost\":3025,\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"lecturers\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"implement\":{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"},\"venue\":[],\"consulting_cost\":0,\"costing\":22225,\"expected_income\":\"60000\",\"project_profit\":37775,\"gross_interest_rate\":\"62.96%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:05:16\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"2\"},\"finalAccounts\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:09:06\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"2\",\"admin_id\":\"10\"}],\"state\":\"2\"}}},\"project_get_one\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\"},\"lecturer_get_project\":{\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_name_name\":\"柳芳\",\"parent_id\":\"139\"}],\"project_name\":\"需求分析\",\"unicode\":\"201812005\"},\"implement_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"implement\":[{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"}],\"venue\":[]},\"travel_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"city\":[{\"id\":\"73\",\"short_fee_card_people\":\"寇艳艳\",\"short_fee_type\":\"出租\",\"short_fee\":\"300\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"state\":\"0\"}],\"meal\":[{\"id\":\"50\",\"meal_fee\":\"170\",\"meal_fee_days\":\"3\",\"meal_fee_people_id\":\"2\",\"meal_fee_remarks\":\"\",\"parent_id\":\"139\",\"state\":\"0\",\"meal_fee_people_name\":\"实施\"}],\"province\":[{\"id\":\"126\",\"long_fee_card_people\":\"徐全\",\"long_fee_card_start_time\":\"2018-12-01T12:12\",\"long_fee_card_start_place\":\"北京\",\"long_fee_card_end_time\":\"2018-12-05T12:12\",\"long_fee_card_end_place\":\"上海\",\"state\":\"0\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"long_fee_card_fee\":\"555\",\"long_fee_card_vehicle_name\":\"火车\",\"long_fee_card_vehicle_id\":\"1\"}],\"stay\":[{\"id\":\"57\",\"hotel_expense_people\":\"寇艳艳\",\"hotel_expense_days\":\"4\",\"hotel_expense_total\":\"2000\",\"parent_id\":\"139\",\"state\":\"0\",\"now_time\":null}]}}', '2.0', '寇艳艳');
INSERT INTO `pmo_examine_project` VALUES (261, 138, 1, 30, NULL, 1, '2018-12-28 15:28:57', '{\"project_list_data\":{\"id\":\"138\",\"project_name\":\"\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"公共培训部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":\"\",\"project_tax_rate\":\"\",\"institutional_consulting_fees\":\"\",\"personal_consulting_fees\":\"\",\"unicode\":\"201812004\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":\"\",\"end\":\"\"},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:05:09\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"2\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"138\",\"project_name\":\"\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"公共培训部\",\"province\":null,\"city\":null,\"address\":null,\"project_income\":\"\",\"project_tax_rate\":\"\",\"institutional_consulting_fees\":\"\",\"personal_consulting_fees\":\"\",\"unicode\":\"201812004\"},\"lecturer_get_project\":{\"lecturer\":[],\"project_name\":\"\",\"unicode\":\"201812004\"},\"implement_get_project\":{\"project_name\":\"\",\"unicode\":\"201812004\",\"implement\":[],\"venue\":[]},\"travel_get_project\":{\"project_name\":\"\",\"unicode\":\"201812004\",\"city\":[],\"meal\":[],\"province\":[],\"stay\":[]}}', '2.0', '崔思思');
INSERT INTO `pmo_examine_project` VALUES (262, 139, 1, 32, NULL, -1, '2018-12-28 16:00:31', '{\"project_list_data\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":555,\"city\":50,\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\",\"project_training_ares_name\":\"北京--北京--金融界121号F301\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15000,\"implementation_cost\":600,\"conference_cost\":0,\"stay\":2000,\"meal\":0,\"travel_cost\":2605,\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"27\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"徐全\"}],\"lecturers\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"27\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"徐全\"}],\"implement\":{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"},\"venue\":[],\"consulting_cost\":0,\"costing\":21805,\"expected_income\":\"60000\",\"project_profit\":38195,\"gross_interest_rate\":\"63.66%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:02:49\",\"pass\":\"-1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"-1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\"},\"lecturer_get_project\":{\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"27\",\"teacher_name_name\":\"徐全\",\"parent_id\":\"139\"}],\"project_name\":\"需求分析\",\"unicode\":\"201812005\"},\"implement_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"implement\":[{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"}],\"venue\":[]},\"travel_get_project\":{\"project_name\":\"需求分析\",\"unicode\":\"201812005\",\"city\":[{\"id\":\"71\",\"short_fee_card_people\":\"寇艳艳\",\"short_fee_type\":\"地铁\",\"short_fee\":\"50\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"state\":\"0\"}],\"meal\":[],\"province\":[{\"id\":\"126\",\"long_fee_card_people\":\"徐全\",\"long_fee_card_start_time\":\"2018-12-01T12:12\",\"long_fee_card_start_place\":\"北京\",\"long_fee_card_end_time\":\"2018-12-05T12:12\",\"long_fee_card_end_place\":\"上海\",\"state\":\"0\",\"parent_id\":\"139\",\"now_time\":\"0000-00-00 00:00:00\",\"long_fee_card_fee\":\"555\",\"long_fee_card_vehicle_name\":\"火车\",\"long_fee_card_vehicle_id\":\"1\"}],\"stay\":[{\"id\":\"57\",\"hotel_expense_people\":\"寇艳艳\",\"hotel_expense_days\":\"4\",\"hotel_expense_total\":\"2000\",\"parent_id\":\"139\",\"state\":\"0\",\"now_time\":null}]}}', '2.0', '寇艳艳');
INSERT INTO `pmo_examine_project` VALUES (253, 134, 1, 30, NULL, 0, '2018-12-28 15:19:26', NULL, NULL, NULL);
INSERT INTO `pmo_examine_project` VALUES (254, 135, 1, 30, NULL, 0, '2018-12-28 15:20:45', '{\"project_list_data\":{\"id\":\"135\",\"project_name\":\"uml\",\"project_gather_id\":\"23\",\"project_person_in_charge_id\":\"32\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"11\",\"project_customer_name\":\"云南移动\",\"project_days\":\"2\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"10\",\"project_leader_name\":\"张剑\",\"project_leader_id\":\"32\",\"project_person_in_charge_name\":\"张剑\",\"project_gather_name\":\"云南移动\",\"project_project_template_name\":\"行业培训部\",\"province\":0,\"city\":0,\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"360\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812001\",\"project_training_ares_name\":\"北京--北京--中软大厦\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15300,\"implementation_cost\":1360,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[{\"id\":\"261\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"300\",\"teacher_name_id\":\"17\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"杨云\"}],\"lecturers\":[{\"id\":\"261\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"300\",\"teacher_name_id\":\"17\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"杨云\"}],\"implement\":{\"id\":\"96\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"0\",\"tea_break\":\"500\",\"stationery\":\"500\",\"hospitality\":\"40\",\"postage\":\"20\",\"parent_id\":\"135\",\"state\":\"0\",\"time\":\"2018-12-28 15:16:43\",\"material_cost\":\"300\",\"equipment_cost\":\"0\"},\"venue\":[],\"consulting_cost\":0,\"costing\":17020,\"expected_income\":\"60000\",\"project_profit\":42980,\"gross_interest_rate\":\"71.63%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}},\"project_get_one\":{\"id\":\"135\",\"project_name\":\"uml\",\"project_gather_id\":\"23\",\"project_person_in_charge_id\":\"32\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"11\",\"project_customer_name\":\"云南移动\",\"project_days\":\"2\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"10\",\"project_leader_name\":\"张剑\",\"project_leader_id\":\"32\",\"project_person_in_charge_name\":\"张剑\",\"project_gather_name\":\"云南移动\",\"project_project_template_name\":\"行业培训部\",\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"360\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812001\",\"project_training_ares_name\":\"北京--北京--中软大厦\"},\"lecturer_get_project\":{\"lecturer\":[{\"id\":\"261\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"300\",\"teacher_name_id\":\"17\",\"teacher_name_name\":\"杨云\",\"parent_id\":\"135\"}],\"project_name\":\"uml\",\"unicode\":\"201812001\"},\"implement_get_project\":{\"project_name\":\"uml\",\"unicode\":\"201812001\",\"implement\":[{\"id\":\"96\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"0\",\"tea_break\":\"500\",\"stationery\":\"500\",\"hospitality\":\"40\",\"postage\":\"20\",\"parent_id\":\"135\",\"state\":\"0\",\"time\":\"2018-12-28 15:16:43\",\"material_cost\":\"300\",\"equipment_cost\":\"0\"}],\"venue\":[]},\"travel_get_project\":{\"project_name\":\"uml\",\"unicode\":\"201812001\",\"city\":[],\"meal\":[],\"province\":[],\"stay\":[]}}', '2.0', '崔思思');

-- ----------------------------
-- Table structure for pmo_examine_project_fee
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_project_fee`;
CREATE TABLE `pmo_examine_project_fee`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `labor_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '人工成本',
  `implementation_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '实施成本',
  `travel_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '差旅成本',
  `consulting_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '咨询成本',
  `costing` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '成本合计',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '0为可用，1为不可用',
  `stay` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '住宿成本',
  `city` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '市内交通成本',
  `province` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '长途交通成本',
  `meal` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '餐费',
  `expected_income` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '预计收入',
  `project_profit` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '项目利润',
  `gross_interest_rate` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '毛利率',
  `cooperative_gross_margin` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '去合作费毛利率',
  `type_id` tinyint(2) NULL DEFAULT NULL COMMENT '1为预算，2为决算，3为借款，4为支出',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 98 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批项目静态金额表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_examine_project_fee
-- ----------------------------
INSERT INTO `pmo_examine_project_fee` VALUES (77, 18, '6000', '0', '0', '0', '6000', 0, '0', '0', '0', '0', '0', '-6000', '-INF%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (78, 44, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (79, 44, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (80, 44, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (81, 8, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (82, 8, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (83, 1, '3123', '654', '0', '0', '3777', 0, '0', '0', '0', '0', '0', '-3777', '-INF%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (84, 35, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (85, 5, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '100', '100', '100%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (86, 41, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (87, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (88, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (89, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (90, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (91, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (92, 38, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (93, 34, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (94, 50, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (95, 30, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (96, 15, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);
INSERT INTO `pmo_examine_project_fee` VALUES (97, 34, '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', 'NAN%', NULL, NULL);

-- ----------------------------
-- Table structure for pmo_examine_user_flow
-- ----------------------------
DROP TABLE IF EXISTS `pmo_examine_user_flow`;
CREATE TABLE `pmo_examine_user_flow`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '用户ids',
  `f_flow_id` int(11) NULL DEFAULT NULL COMMENT '父审批流id',
  `pass_mode` tinyint(2) NULL DEFAULT NULL COMMENT '审批方式 1为逐级 2为会签 3为或签',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 78 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批模式表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_implement_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_implement_plan`;
CREATE TABLE `pmo_implement_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `venue_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会场费',
  `material_and_equipment_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教材与设备费用',
  `examination_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考试费',
  `tea_break` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '茶歇',
  `stationery` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文具',
  `hospitality` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '招待费',
  `postage` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '快递费',
  `parent_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  `time` datetime(0) NULL DEFAULT NULL,
  `material_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教材费',
  `equipment_cost` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '设备费用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 98 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '实施费用表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_implement_plan
-- ----------------------------
INSERT INTO `pmo_implement_plan` VALUES (81, NULL, NULL, '1', '1', '1', '1', '1', 6, 0, '2018-12-18 13:38:03', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (82, NULL, NULL, '11', '1', '1', '1', '1', 4, 0, '2018-12-18 13:38:35', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (83, NULL, NULL, '11', '1', '1', '1', '1', 17, 0, '2018-12-18 13:39:00', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (84, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:09:16', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (85, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:10:04', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (86, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:10:17', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (87, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:11:17', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (88, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:12:34', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (89, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:13:06', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (90, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:13:24', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (91, NULL, NULL, '1', '111', '1', '1', '1', 14, 1, '2018-12-18 14:13:43', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (92, NULL, NULL, '1', '111', '1', '1', '1', 14, 0, '2018-12-18 14:19:31', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (93, NULL, NULL, '1', '1', '1', '1', '1', 31, 0, '2018-12-19 10:33:14', '1', '1');
INSERT INTO `pmo_implement_plan` VALUES (94, NULL, NULL, '3', '4', '5', '6', '7', 127, 0, '2018-12-28 11:23:42', '1', '2');
INSERT INTO `pmo_implement_plan` VALUES (95, NULL, NULL, '23', '24', '25', '26', '27', 134, 0, '2018-12-28 14:47:52', '21', '22');
INSERT INTO `pmo_implement_plan` VALUES (96, NULL, NULL, '0', '500', '500', '40', '20', 135, 0, '2018-12-28 15:16:43', '300', '0');
INSERT INTO `pmo_implement_plan` VALUES (97, NULL, NULL, '', '', '', '', '200', 139, 0, '2018-12-28 15:50:29', '400', '');

-- ----------------------------
-- Table structure for pmo_implement_room
-- ----------------------------
DROP TABLE IF EXISTS `pmo_implement_room`;
CREATE TABLE `pmo_implement_room`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '会议室编号',
  `unit_price` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '单价',
  `days` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '会场名称',
  `total_price` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '总价',
  `meetingplace_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `meetingplace_address` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '会场地址',
  `time` datetime(0) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  `parent_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 83 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '会议室表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_implement_room
-- ----------------------------
INSERT INTO `pmo_implement_room` VALUES (1, '123', '321', '456', '654', '789987', '987789', '2018-10-25 11:35:48', 1, 1);
INSERT INTO `pmo_implement_room` VALUES (2, '1', '2', '6', '', '', '', '2018-10-25 13:20:24', 1, 3);
INSERT INTO `pmo_implement_room` VALUES (3, '1', '2', '6', '', '', '', '2018-10-25 13:22:49', 1, 3);
INSERT INTO `pmo_implement_room` VALUES (4, '1', '2', '6', '', '', '', '2018-10-25 13:24:05', 1, 3);
INSERT INTO `pmo_implement_room` VALUES (5, '1', '2', '6', '', '', '', '2018-10-25 13:25:20', 1, 3);
INSERT INTO `pmo_implement_room` VALUES (6, '1', '2', '', '', '', '', '2018-10-25 13:27:11', 1, 3);
INSERT INTO `pmo_implement_room` VALUES (7, '1', '2', '5', '', '', '', '2018-10-25 13:27:17', 2, 3);
INSERT INTO `pmo_implement_room` VALUES (8, '1', '2', '6', '', '', '', '2018-10-25 13:29:24', 2, 3);
INSERT INTO `pmo_implement_room` VALUES (10, '1', '2', '6', '', '', '', '2018-10-25 13:31:16', 2, 3);
INSERT INTO `pmo_implement_room` VALUES (28, '123', '123', '123', '123', '123312', '123', '2018-11-05 10:14:13', 1, 6);
INSERT INTO `pmo_implement_room` VALUES (29, '123', '123', '123', '123', '123312', '123', '2018-11-05 10:14:28', 1, 6);
INSERT INTO `pmo_implement_room` VALUES (30, '123321', '123', '123', '123', '123312', '123', '2018-11-05 10:14:39', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (82, NULL, '1800', '4', '7200', NULL, '中软大厦第一会议室', '2018-12-28 16:05:07', 0, 140);
INSERT INTO `pmo_implement_room` VALUES (81, NULL, '', '', '17', NULL, '', '2018-12-28 14:46:46', 0, 134);
INSERT INTO `pmo_implement_room` VALUES (80, NULL, '', '', '13', NULL, '', '2018-12-28 14:46:40', 0, 134);
INSERT INTO `pmo_implement_room` VALUES (34, '1', '1', '1', '1', '1', '1', '2018-11-26 10:45:12', 0, 4);
INSERT INTO `pmo_implement_room` VALUES (79, 'b501', '100', '5', '500', '第一会议室', '中软大厦', '2018-12-28 12:30:29', 0, 130);
INSERT INTO `pmo_implement_room` VALUES (78, '会议室编号', '70', '2', '80', '会议名称', '会议地址', '2018-12-28 11:11:37', 0, 128);
INSERT INTO `pmo_implement_room` VALUES (43, '1', '2', '', '', '', '', '2018-12-12 11:54:30', 0, 20);
INSERT INTO `pmo_implement_room` VALUES (44, '1', '2', '', '', '', '', '2018-12-12 11:54:43', 0, 20);
INSERT INTO `pmo_implement_room` VALUES (76, '1', '2', '3', '4', '5', '6', '2018-12-27 13:27:18', 0, 119);
INSERT INTO `pmo_implement_room` VALUES (77, '1', '2', '3', '4', '5', '6', '2018-12-27 16:51:34', 0, 127);
INSERT INTO `pmo_implement_room` VALUES (74, '1', '100', '1', '1000', '', '', '2018-12-26 16:42:12', 0, 103);
INSERT INTO `pmo_implement_room` VALUES (72, '1', '2', '3', '4', '5', '6', '2018-12-24 13:35:28', 0, 67);
INSERT INTO `pmo_implement_room` VALUES (71, '20', '20', '20', '20', '2', '中软', '2018-12-22 15:30:27', 0, 56);
INSERT INTO `pmo_implement_room` VALUES (70, '1', '1', '2', '22', '22', '2', '2018-12-22 15:14:35', 0, 54);
INSERT INTO `pmo_implement_room` VALUES (52, '1', '1', '1', '1', '1', '1', '2018-12-12 14:19:39', 1, 6);
INSERT INTO `pmo_implement_room` VALUES (53, '1', '1', '1', '12', '1', '1', '2018-12-12 14:19:52', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (54, '1', '1', '1', '1', '1', '1', '2018-12-12 14:21:36', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (55, '1', '1', '1', '1', '1', '1', '2018-12-12 14:22:16', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (56, '1', '1', '1', '1', '1', '1', '2018-12-12 14:28:37', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (57, '1', '1', '1', '1', '1', '1', '2018-12-12 14:32:36', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (58, '1', '1', '1', '1', '1', '1', '2018-12-12 14:32:52', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (59, '123', '123', '1', '1', '1', '1', '2018-12-12 14:34:10', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (60, '123', '123', '1', '1', '1', '1', '2018-12-12 14:37:37', 2, 6);
INSERT INTO `pmo_implement_room` VALUES (61, '12', '0', '1', '1', '品牌', '0', '2018-12-19 14:48:29', 0, 2);
INSERT INTO `pmo_implement_room` VALUES (63, '1', '1', '11', '1', '11', '1', '2018-12-18 13:38:09', 0, 6);
INSERT INTO `pmo_implement_room` VALUES (64, '1', '1', '1', '1', '11', '1', '2018-12-18 13:38:27', 0, 4);
INSERT INTO `pmo_implement_room` VALUES (65, '1', '1', '11', '1', '1', '1', '2018-12-18 13:38:53', 0, 17);
INSERT INTO `pmo_implement_room` VALUES (66, '1', '1', '1', '1', '1', '1', '2018-12-18 14:19:54', 0, 6);
INSERT INTO `pmo_implement_room` VALUES (67, '1', '1', '1', '1', '1', '1', '2018-12-18 14:20:12', 0, 4);
INSERT INTO `pmo_implement_room` VALUES (68, '1', '1', '1', '1', '1', '1', '2018-12-19 10:33:20', 0, 31);

-- ----------------------------
-- Table structure for pmo_json
-- ----------------------------
DROP TABLE IF EXISTS `pmo_json`;
CREATE TABLE `pmo_json`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT 'json',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '注释',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'json记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_key_type
-- ----------------------------
DROP TABLE IF EXISTS `pmo_key_type`;
CREATE TABLE `pmo_key_type`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'key=>value' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_key_type
-- ----------------------------
INSERT INTO `pmo_key_type` VALUES (1, '培训项目', '项目编号', 'unicode', NULL);
INSERT INTO `pmo_key_type` VALUES (2, '培训项目', '课程名称', 'project_name', NULL);
INSERT INTO `pmo_key_type` VALUES (3, '讲师安排', '讲师姓名', 'teacher_name', 'lecturer_manage_list');
INSERT INTO `pmo_key_type` VALUES (4, '讲师安排', '所得税', 'teacher_income_tax', NULL);
INSERT INTO `pmo_key_type` VALUES (5, '讲师安排', '讲课费', 'teacher_lecture_fee', NULL);
INSERT INTO `pmo_key_type` VALUES (6, '讲师安排', '课程天数', 'teacher_lecture_days', NULL);
INSERT INTO `pmo_key_type` VALUES (7, '讲师安排', '职责', 'teacher_duty', NULL);
INSERT INTO `pmo_key_type` VALUES (9, '会场安排', '天数', 'days', NULL);
INSERT INTO `pmo_key_type` VALUES (10, '会场安排', '单价', 'unit_price', NULL);
INSERT INTO `pmo_key_type` VALUES (11, '会场安排', '总价', 'total_price', NULL);
INSERT INTO `pmo_key_type` VALUES (12, '会场安排', '会议室编号', 'room_number', NULL);
INSERT INTO `pmo_key_type` VALUES (13, '会场安排', '会议名称', 'meetingplace_name', NULL);
INSERT INTO `pmo_key_type` VALUES (14, '会场安排', '会议地址', 'meetingplace_address', NULL);
INSERT INTO `pmo_key_type` VALUES (15, '培训项目', '设备费', 'equipment_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (16, '实施安排', '教材费用', 'material_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (17, '实施安排', '考试费', 'examination_fee', NULL);
INSERT INTO `pmo_key_type` VALUES (18, '实施安排', '茶歇', 'tea_break', NULL);
INSERT INTO `pmo_key_type` VALUES (19, '实施安排', '文具', 'stationery', NULL);
INSERT INTO `pmo_key_type` VALUES (20, '实施安排', '招待费', 'hospitality', NULL);
INSERT INTO `pmo_key_type` VALUES (21, '实施安排', '邮寄快递', 'postage', NULL);
INSERT INTO `pmo_key_type` VALUES (22, '市内交通', '人员数量', 'short_fee_card_people', NULL);
INSERT INTO `pmo_key_type` VALUES (23, '市内交通', '费用名称', 'short_fee_type', NULL);
INSERT INTO `pmo_key_type` VALUES (24, '市内交通', '费用', 'short_fee', NULL);
INSERT INTO `pmo_key_type` VALUES (26, '餐费', '人员姓名', 'meal_fee_people', NULL);
INSERT INTO `pmo_key_type` VALUES (27, '餐费', '天数', 'meal_fee_days', NULL);
INSERT INTO `pmo_key_type` VALUES (28, '餐费', '金额', 'meal_fee', NULL);
INSERT INTO `pmo_key_type` VALUES (29, '餐费', '备注', 'meal_fee_remarks', NULL);
INSERT INTO `pmo_key_type` VALUES (30, '长途交通', '人员数量', 'long_fee_card_people', NULL);
INSERT INTO `pmo_key_type` VALUES (31, '长途交通', '出发时间', 'long_fee_card_start_time', NULL);
INSERT INTO `pmo_key_type` VALUES (32, '长途交通', '结束时间', 'long_fee_card_end_time', NULL);
INSERT INTO `pmo_key_type` VALUES (33, '长途交通', '结束地点', 'long_fee_card_end_place', NULL);
INSERT INTO `pmo_key_type` VALUES (34, '长途交通', '出发地点', 'long_fee_card_start_place', NULL);
INSERT INTO `pmo_key_type` VALUES (35, '长途交通', '交通工具名称', 'long_fee_card_vehicle', NULL);
INSERT INTO `pmo_key_type` VALUES (36, '长途交通', '住宿人员数量', 'hotel_expense_people', NULL);
INSERT INTO `pmo_key_type` VALUES (37, '长途交通', '住宿天数', 'hotel_expense_days', NULL);
INSERT INTO `pmo_key_type` VALUES (38, '长途交通', '费用总价', 'hotel_expense_total', NULL);
INSERT INTO `pmo_key_type` VALUES (39, '培训项目', '所属项目集名称', 'project_gather', 'program_manage_list');
INSERT INTO `pmo_key_type` VALUES (41, '培训项目', '实施负责人姓名', 'project_person_in_charge', 'staff_manage_list');
INSERT INTO `pmo_key_type` VALUES (43, '培训项目', '项目负责人姓名', 'project_leader', 'staff_manage_list');
INSERT INTO `pmo_key_type` VALUES (45, '培训项目', '客户名称', 'project_customer_name', NULL);
INSERT INTO `pmo_key_type` VALUES (46, '培训项目', '编辑项目天数', 'project_days', NULL);
INSERT INTO `pmo_key_type` VALUES (47, '培训项目', '培训开始日期', 'project_start_date', NULL);
INSERT INTO `pmo_key_type` VALUES (48, '培训项目', '培训结束日期', 'project_end_date', NULL);
INSERT INTO `pmo_key_type` VALUES (49, '培训项目', '培训人数', 'project_training_numbers', NULL);
INSERT INTO `pmo_key_type` VALUES (50, '培训项目', '培训地点', 'project_training_ares', NULL);
INSERT INTO `pmo_key_type` VALUES (51, '培训项目', '收入', 'project_income', NULL);
INSERT INTO `pmo_key_type` VALUES (52, '培训项目', '税率', 'project_tax_rate', NULL);
INSERT INTO `pmo_key_type` VALUES (53, '培训项目', '机构咨询费', 'institutional_consulting_fees', NULL);
INSERT INTO `pmo_key_type` VALUES (54, '培训项目', '个人咨询费', 'personal_consulting_fees', NULL);
INSERT INTO `pmo_key_type` VALUES (55, '培训项目', '预计收入', 'expected_income', NULL);
INSERT INTO `pmo_key_type` VALUES (56, '培训项目', '项目利润', 'project_profit', NULL);
INSERT INTO `pmo_key_type` VALUES (57, '培训项目', '毛利率', 'gross_interest_rate', NULL);
INSERT INTO `pmo_key_type` VALUES (58, '培训项目', '人工成本', 'labor_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (59, '培训项目', '实施成本', 'implementation_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (60, '培训项目', '差旅成本', 'travel_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (61, '培训项目', '咨询成本', 'consulting_cost', NULL);
INSERT INTO `pmo_key_type` VALUES (62, '新建讲师', '合作模式', 'teacher_cooperation_model', 'lecturer_manage_cooperation');
INSERT INTO `pmo_key_type` VALUES (63, '新建项目', '项目模板', 'project_project_template', 'project_type_list');
INSERT INTO `pmo_key_type` VALUES (64, '新建项目集', '销售负责人', 'program_manage_sale', 'staff_manage_list');
INSERT INTO `pmo_key_type` VALUES (65, '新建项目集', '培训地点', 'program_training_ares', 'project_address_list');
INSERT INTO `pmo_key_type` VALUES (66, '新增培训地点', '省', 'province', 'project_address_province');
INSERT INTO `pmo_key_type` VALUES (67, '新建培训地点', '市', 'city', 'project_address_city');
INSERT INTO `pmo_key_type` VALUES (68, '长途交通费', '交通工具', 'long_fee_card_vehicle', 'travel_longTrafficType_list');
INSERT INTO `pmo_key_type` VALUES (69, '系统视图', 'Link按钮', 'link_btn', NULL);
INSERT INTO `pmo_key_type` VALUES (70, '系统视图', '保存按钮', 'hold_btn', NULL);
INSERT INTO `pmo_key_type` VALUES (71, '新建讲师', '讲师姓名', 'teacher_name', NULL);
INSERT INTO `pmo_key_type` VALUES (72, '系统视图', 'card按钮', 'card_btn', NULL);
INSERT INTO `pmo_key_type` VALUES (73, '预算', '提交申请人', 'application_people', NULL);
INSERT INTO `pmo_key_type` VALUES (74, '预算', '提交申请时间', 'application_time', NULL);
INSERT INTO `pmo_key_type` VALUES (75, '培训项目', '总成本', 'costing', NULL);

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
  `coop_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '讲师合作记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer
-- ----------------------------
INSERT INTO `pmo_lecturer` VALUES (1, '柳芳', '1500', '长期', 1, 0, NULL, 1);
INSERT INTO `pmo_lecturer` VALUES (2, '秦潇潇', '1500', '长期', 2, 0, NULL, 1);
INSERT INTO `pmo_lecturer` VALUES (13, '刘沛春', '1500', NULL, NULL, 0, NULL, 1);
INSERT INTO `pmo_lecturer` VALUES (14, '宋丹', '1500', NULL, NULL, 0, NULL, 1);
INSERT INTO `pmo_lecturer` VALUES (15, '胡光超', '1500', NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (16, '熊磊光', '6000', NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (17, '杨云', '6000', NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (18, '田雪松', '6000', NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (20, '马雁岭', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (21, '安魏', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (22, '陈勇', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (23, '顾炜宇', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (24, '宋丹', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (25, '王安', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (26, '王启斌', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (27, '徐全', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (28, '马丽娟', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (29, '蒋德均', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (30, '张晓峰', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (31, '张学朋', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (32, '蒋德钧', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (33, '季猛', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (34, '安巍', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (35, '谭明峰', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (36, '赵卫东', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (37, '陈阳海', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (38, '穆炜政', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (39, '钱兴会', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (40, '胡小亮', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (41, '康凯', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (42, '李福东', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (43, '程文俊', NULL, NULL, NULL, 0, NULL, 2);
INSERT INTO `pmo_lecturer` VALUES (44, '董亮', NULL, NULL, NULL, 0, NULL, 2);

-- ----------------------------
-- Table structure for pmo_lecturer_coop
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer_coop`;
CREATE TABLE `pmo_lecturer_coop`  (
  `teacher_cooperation_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_cooperation_model_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`teacher_cooperation_model_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '讲师合作方式表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer_coop
-- ----------------------------
INSERT INTO `pmo_lecturer_coop` VALUES (1, '专职');
INSERT INTO `pmo_lecturer_coop` VALUES (2, '兼职');

-- ----------------------------
-- Table structure for pmo_lecturer_duty
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer_duty`;
CREATE TABLE `pmo_lecturer_duty`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职责描述',
  `state` tinyint(5) NULL DEFAULT NULL COMMENT '项目模板',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '讲师身份表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer_duty
-- ----------------------------
INSERT INTO `pmo_lecturer_duty` VALUES (1, '主讲', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (2, '助教', 0);
INSERT INTO `pmo_lecturer_duty` VALUES (3, '特邀嘉宾', 0);

-- ----------------------------
-- Table structure for pmo_lecturer_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_lecturer_plan`;
CREATE TABLE `pmo_lecturer_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `lecturer_id` int(11) NULL DEFAULT NULL COMMENT '讲师表id(暂时无用)',
  `tax` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '税',
  `fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '讲课费',
  `day` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '讲课天数',
  `duty_id` int(11) NULL DEFAULT NULL COMMENT '职责id',
  `state` tinyint(2) NULL DEFAULT 0,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 264 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '讲师安排表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_lecturer_plan
-- ----------------------------
INSERT INTO `pmo_lecturer_plan` VALUES (160, 2, 2, '1', '3000', '5', 1, 1, '2018-10-25 11:25:18');
INSERT INTO `pmo_lecturer_plan` VALUES (161, 2, 2, '1', '3000', '5', 1, 2, '2018-10-25 11:25:24');
INSERT INTO `pmo_lecturer_plan` VALUES (162, 2, NULL, NULL, '3000', '5', 1, 1, '2018-10-25 11:36:41');
INSERT INTO `pmo_lecturer_plan` VALUES (163, 2, 1, NULL, '3000', '5', 1, 1, '2018-10-25 13:15:22');
INSERT INTO `pmo_lecturer_plan` VALUES (164, 1, 1, '123', '3000', '5', 1, 0, '2018-10-25 13:36:24');
INSERT INTO `pmo_lecturer_plan` VALUES (165, 2, 1, NULL, '3000', '5', 1, 1, '2018-10-30 13:39:57');
INSERT INTO `pmo_lecturer_plan` VALUES (166, 2, 1, NULL, '3000', '5', 1, 1, '2018-10-30 13:44:37');
INSERT INTO `pmo_lecturer_plan` VALUES (167, 2, 1, NULL, '3000.0', '5', 1, 1, '2018-11-01 14:00:01');
INSERT INTO `pmo_lecturer_plan` VALUES (168, 2, 1, NULL, '3000.5', '5', 1, 1, '2018-11-01 14:00:21');
INSERT INTO `pmo_lecturer_plan` VALUES (169, 2, 2, NULL, '3000.5', '5', 1, 1, '2018-11-02 10:18:50');
INSERT INTO `pmo_lecturer_plan` VALUES (170, 2, 2, '6', '3000.5', '5', 1, 1, '2018-11-02 13:59:40');
INSERT INTO `pmo_lecturer_plan` VALUES (171, 2, 2, '66', '3000.5', '5', 1, 2, '2018-11-02 14:02:17');
INSERT INTO `pmo_lecturer_plan` VALUES (172, 2, 1, NULL, '-3000', '5', 1, 1, '2018-11-02 16:29:11');
INSERT INTO `pmo_lecturer_plan` VALUES (173, 2, 1, NULL, '3000', '5', 1, 1, '2018-11-02 16:29:37');
INSERT INTO `pmo_lecturer_plan` VALUES (174, 2, 1, '1', '3000', '5', 1, 1, '2018-11-05 10:12:30');
INSERT INTO `pmo_lecturer_plan` VALUES (175, 2, 2, '2', '3000', '5', 1, 1, '2018-11-05 10:12:38');
INSERT INTO `pmo_lecturer_plan` VALUES (176, 2, 2, '1', '3000', '53', 1, 2, '2018-11-05 10:12:44');
INSERT INTO `pmo_lecturer_plan` VALUES (177, 2, 1, NULL, '3000', '5', 1, 1, '2018-11-05 10:19:12');
INSERT INTO `pmo_lecturer_plan` VALUES (178, 4, 2, NULL, '3000', '5', 1, 2, '2018-11-05 10:19:31');
INSERT INTO `pmo_lecturer_plan` VALUES (179, 2, 1, '1', '3000', '5', 1, 1, '2018-11-05 16:25:16');
INSERT INTO `pmo_lecturer_plan` VALUES (180, 2, 1, NULL, '3000', '5', 1, 1, '2018-11-05 16:25:22');
INSERT INTO `pmo_lecturer_plan` VALUES (181, 2, 1, '1', '3000', '5', 1, 2, '2018-11-05 17:36:48');
INSERT INTO `pmo_lecturer_plan` VALUES (182, 2, NULL, NULL, NULL, NULL, 1, 1, '2018-11-08 15:05:00');
INSERT INTO `pmo_lecturer_plan` VALUES (183, 2, NULL, NULL, NULL, NULL, 1, 1, '2018-11-08 15:05:17');
INSERT INTO `pmo_lecturer_plan` VALUES (184, 2, 2, '1', '2', '3', 1, 1, '2018-11-08 15:06:06');
INSERT INTO `pmo_lecturer_plan` VALUES (185, 2, 1, '34', '3000', '5', 1, 1, '2018-11-08 15:12:01');
INSERT INTO `pmo_lecturer_plan` VALUES (186, 2, 1, '1', '2', '3', 1, 2, '2018-11-14 09:30:37');
INSERT INTO `pmo_lecturer_plan` VALUES (187, 2, 1, '34', '3000', '5', 1, 1, '2018-11-14 09:30:46');
INSERT INTO `pmo_lecturer_plan` VALUES (188, 2, 1, '34', '3000', '5', 1, 2, '2018-11-14 09:30:56');
INSERT INTO `pmo_lecturer_plan` VALUES (189, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-11-14 11:13:06');
INSERT INTO `pmo_lecturer_plan` VALUES (190, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-11-14 11:13:48');
INSERT INTO `pmo_lecturer_plan` VALUES (191, NULL, 2, NULL, '3000', '5', 1, 0, '2018-11-14 11:14:33');
INSERT INTO `pmo_lecturer_plan` VALUES (192, NULL, 1, NULL, '3000', '5', 1, 0, '2018-11-14 11:14:52');
INSERT INTO `pmo_lecturer_plan` VALUES (193, 2, 2, NULL, '3000', '5', 1, 2, '2018-11-14 11:19:26');
INSERT INTO `pmo_lecturer_plan` VALUES (194, 2, 1, '56', '3000', '57', 1, 2, '2018-11-14 11:25:49');
INSERT INTO `pmo_lecturer_plan` VALUES (195, 2, 1, '1', '3000', '52', 1, 2, '2018-11-14 11:26:45');
INSERT INTO `pmo_lecturer_plan` VALUES (196, 2, 2, NULL, '3000', '5', 1, 2, '2018-11-14 11:34:52');
INSERT INTO `pmo_lecturer_plan` VALUES (197, 2, 2, NULL, '3000', '5', 1, 1, '2018-11-14 11:38:27');
INSERT INTO `pmo_lecturer_plan` VALUES (198, 2, 2, NULL, '3000', '5', 1, 2, '2018-11-14 11:40:14');
INSERT INTO `pmo_lecturer_plan` VALUES (199, 2, 2, '13', '3000', '5', 1, 1, '2018-11-14 11:43:14');
INSERT INTO `pmo_lecturer_plan` VALUES (200, 2, 2, '136', '3000', '5', 1, 1, '2018-11-15 15:10:34');
INSERT INTO `pmo_lecturer_plan` VALUES (201, 6, 1, '1', '3000', '5', 1, 1, '2018-11-26 10:42:24');
INSERT INTO `pmo_lecturer_plan` VALUES (202, 2, 2, '20', '3', '25', 1, 1, '2018-12-05 15:25:01');
INSERT INTO `pmo_lecturer_plan` VALUES (203, 2, 2, '20', '3', '25', 1, 1, '2018-12-05 16:26:34');
INSERT INTO `pmo_lecturer_plan` VALUES (204, 2, 2, '2', '3000', '533', 1, 1, '2018-12-05 16:54:42');
INSERT INTO `pmo_lecturer_plan` VALUES (205, 2, 2, '20', '3', '25', 1, 1, '2018-12-08 12:10:13');
INSERT INTO `pmo_lecturer_plan` VALUES (206, 2, 2, '2', '3000', '533', 1, 1, '2018-12-08 13:33:20');
INSERT INTO `pmo_lecturer_plan` VALUES (207, 11, 2, '20', '30000', '5', 1, 0, '2018-12-11 16:24:19');
INSERT INTO `pmo_lecturer_plan` VALUES (208, 6, 1, '100', '50000000000000', '5', 1, 1, '2018-12-11 18:19:00');
INSERT INTO `pmo_lecturer_plan` VALUES (209, 6, 1, '1', '3000', '5', 1, 0, '2018-12-12 10:33:00');
INSERT INTO `pmo_lecturer_plan` VALUES (210, 6, 1, '100', '20', '5', 1, 2, '2018-12-12 10:54:12');
INSERT INTO `pmo_lecturer_plan` VALUES (211, 2, 2, '2', '30000', '533', 1, 2, '2018-12-12 13:30:54');
INSERT INTO `pmo_lecturer_plan` VALUES (212, 2, 1, '20', '30000', '5', 1, 2, '2018-12-12 13:32:36');
INSERT INTO `pmo_lecturer_plan` VALUES (213, 2, 2, '20', '300', '25', 1, 2, '2018-12-12 13:32:57');
INSERT INTO `pmo_lecturer_plan` VALUES (214, 2, 1, '1', '3000', '5', 1, 2, '2018-12-12 13:34:14');
INSERT INTO `pmo_lecturer_plan` VALUES (215, 2, 1, '1', '3000', '5', 1, 2, '2018-12-12 13:36:24');
INSERT INTO `pmo_lecturer_plan` VALUES (216, 2, 2, '20', '3000', '5', 1, 2, '2018-12-12 13:38:57');
INSERT INTO `pmo_lecturer_plan` VALUES (217, 2, 13, '1', '30000', '5', 1, 2, '2018-12-12 13:41:06');
INSERT INTO `pmo_lecturer_plan` VALUES (218, 2, 2, '20', '3000', '5', 1, 2, '2018-12-12 13:43:41');
INSERT INTO `pmo_lecturer_plan` VALUES (219, 2, 2, '20', '3000', '5', 1, 2, '2018-12-12 13:50:35');
INSERT INTO `pmo_lecturer_plan` VALUES (220, 2, 2, '20', '30000', '5', 1, 1, '2018-12-12 13:51:42');
INSERT INTO `pmo_lecturer_plan` VALUES (221, 2, 1, '20', '3000', '5', 1, 1, '2018-12-13 10:55:52');
INSERT INTO `pmo_lecturer_plan` VALUES (222, 2, 2, '20', '31000', '5', 1, 1, '2018-12-13 15:20:42');
INSERT INTO `pmo_lecturer_plan` VALUES (223, 2, 1, '201', '31000', '5', 1, 1, '2018-12-13 15:21:07');
INSERT INTO `pmo_lecturer_plan` VALUES (224, 2, 2, '2011', '31000', '5', 1, 1, '2018-12-13 15:21:22');
INSERT INTO `pmo_lecturer_plan` VALUES (225, 2, 1, '2012', '31000', '5', 1, 1, '2018-12-13 15:21:40');
INSERT INTO `pmo_lecturer_plan` VALUES (226, 2, 2, '2013', '31000', '5', 1, 1, '2018-12-13 15:21:51');
INSERT INTO `pmo_lecturer_plan` VALUES (227, 2, 1, '2014', '31000', '5', 1, 1, '2018-12-13 15:22:13');
INSERT INTO `pmo_lecturer_plan` VALUES (228, 2, 1, '2015', '31000', '5', 1, 1, '2018-12-13 15:22:21');
INSERT INTO `pmo_lecturer_plan` VALUES (229, 2, 1, '3015', '31000', '5', 1, 1, '2018-12-13 15:23:06');
INSERT INTO `pmo_lecturer_plan` VALUES (230, 2, 2, '2013', '310000', '5', 1, 1, '2018-12-18 14:24:31');
INSERT INTO `pmo_lecturer_plan` VALUES (249, 55, 2, '', '3000', '5', 1, 0, '2018-12-22 16:01:41');
INSERT INTO `pmo_lecturer_plan` VALUES (232, 2, 2, '100', '310000', '5', 1, 0, '2018-12-19 14:40:47');
INSERT INTO `pmo_lecturer_plan` VALUES (233, 2, 1, '3015', '310000', '5', 1, 0, '2018-12-18 14:29:36');
INSERT INTO `pmo_lecturer_plan` VALUES (234, 2, 1, '3015', '310000', '5', 1, 0, '2018-12-18 14:38:15');
INSERT INTO `pmo_lecturer_plan` VALUES (235, 2, 2, '2013', '310000', '5', 1, 0, '2018-12-18 14:39:15');
INSERT INTO `pmo_lecturer_plan` VALUES (236, 2, 2, '2013', '310000', '5', 1, 0, '2018-12-18 14:40:37');
INSERT INTO `pmo_lecturer_plan` VALUES (237, 2, 2, '2013', '310000', '5', 1, 0, '2018-12-18 14:42:05');
INSERT INTO `pmo_lecturer_plan` VALUES (238, 2, 2, '2013', '310000', '5', 1, 0, '2018-12-18 14:45:06');
INSERT INTO `pmo_lecturer_plan` VALUES (247, 54, 1, '1', '3000', '5', 1, 0, '2018-12-22 15:14:21');
INSERT INTO `pmo_lecturer_plan` VALUES (248, 56, 0, '20', '3000', '5', 1, 0, '2018-12-22 15:30:09');
INSERT INTO `pmo_lecturer_plan` VALUES (242, 31, 1, '20', '30000', '5', 1, 2, '2018-12-19 10:36:58');
INSERT INTO `pmo_lecturer_plan` VALUES (243, 31, 1, '20', '3000', '5', 1, 0, '2018-12-19 10:37:19');
INSERT INTO `pmo_lecturer_plan` VALUES (244, 18, 16, '0.00', '6000', '5', 1, 0, '2018-12-19 14:09:06');
INSERT INTO `pmo_lecturer_plan` VALUES (251, 93, 1, '', '3000', '5', 1, 0, '2018-12-25 13:11:39');
INSERT INTO `pmo_lecturer_plan` VALUES (252, 96, 1, '10', '3000', '5', 1, 0, '2018-12-26 13:53:47');
INSERT INTO `pmo_lecturer_plan` VALUES (253, 103, 1, '500', '3000', '5', 1, 0, '2018-12-26 16:41:29');
INSERT INTO `pmo_lecturer_plan` VALUES (254, 104, 1, '123', '3000', '5', 1, 0, '2018-12-26 16:47:07');
INSERT INTO `pmo_lecturer_plan` VALUES (255, 119, 1, '500', '30001', '5', 1, 0, '2018-12-27 13:59:31');
INSERT INTO `pmo_lecturer_plan` VALUES (257, 127, 1, '100', '3000', '5', 1, 0, '2018-12-27 16:51:11');
INSERT INTO `pmo_lecturer_plan` VALUES (258, 128, 1, '讲师所得税', '50', '2', 1, 0, '2018-12-28 11:07:57');
INSERT INTO `pmo_lecturer_plan` VALUES (259, 134, 0, '', '3000', '5', 0, 0, '2018-12-28 14:43:53');
INSERT INTO `pmo_lecturer_plan` VALUES (260, 134, 0, '', '30000', '5', 0, 0, '2018-12-28 14:43:57');
INSERT INTO `pmo_lecturer_plan` VALUES (261, 135, 17, '300', '15000', '5', 1, 0, '2018-12-28 15:15:38');
INSERT INTO `pmo_lecturer_plan` VALUES (262, 139, 1, '', '15000', '3', 1, 0, '2018-12-28 16:03:24');
INSERT INTO `pmo_lecturer_plan` VALUES (263, 140, 1, '0', '1800', '4', 1, 0, '2018-12-28 16:01:18');

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
-- Table structure for pmo_operation
-- ----------------------------
DROP TABLE IF EXISTS `pmo_operation`;
CREATE TABLE `pmo_operation`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '项目id',
  `time` datetime(0) NULL DEFAULT NULL,
  `user_id` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `group_id` int(5) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '默认操作为0，1是在进行预算状态。2是在进行决算状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1607 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '项目操作记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_operation
-- ----------------------------
INSERT INTO `pmo_operation` VALUES (246, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (247, '6', '2018-12-22 16:38:54', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (248, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (249, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (250, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (251, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (252, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (253, '54', '2018-12-24 10:03:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (254, '56', '2018-12-22 16:48:40', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (255, '56', '2018-12-22 16:49:11', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (256, '4', '2018-12-22 16:58:27', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (257, '58', '2018-12-22 17:02:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (258, '4', '2018-12-22 17:31:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (259, '59', '2018-12-22 17:35:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (260, '60', '2018-12-24 09:52:35', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (261, '60', '2018-12-24 09:52:35', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (262, '57', '2018-12-22 17:43:58', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (263, '58', '2018-12-22 17:45:15', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (264, '54', '2018-12-24 10:09:20', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (265, '61', '2018-12-24 10:10:41', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (266, '64', '2018-12-24 10:17:29', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (267, '64', '2018-12-24 10:19:21', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (268, '6', '2018-12-24 11:19:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (269, '1', '2018-12-24 11:25:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (270, '56', '2018-12-24 11:26:54', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (271, '1', '2018-12-24 11:28:29', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (272, '65', '2018-12-24 13:28:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (273, '66', '2018-12-24 13:30:06', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (274, '67', '2018-12-24 13:33:48', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (275, '67', '2018-12-24 13:33:49', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (276, '67', '2018-12-24 13:35:10', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (277, '67', '2018-12-24 13:35:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (278, '67', '2018-12-24 13:35:15', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (279, '67', '2018-12-24 13:35:17', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (280, '67', '2018-12-24 13:35:19', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (281, '67', '2018-12-24 13:35:20', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (282, '67', '2018-12-24 13:35:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (283, '67', '2018-12-24 13:35:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (284, '67', '2018-12-24 13:36:17', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (285, '67', '2018-12-24 13:37:09', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (286, '68', '2018-12-24 13:39:10', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (287, '68', '2018-12-24 13:39:22', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (288, '69', '2018-12-24 13:42:49', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (289, '69', '2018-12-24 13:42:55', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (290, '72', '2018-12-24 14:02:20', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (291, '72', '2018-12-24 14:02:28', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (292, '72', '2018-12-24 14:07:35', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (293, '72', '2018-12-24 14:07:49', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (294, '72', '2018-12-24 14:08:00', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (295, '73', '2018-12-24 14:08:33', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (296, '73', '2018-12-24 14:08:42', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (297, '69', '2018-12-24 14:09:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (298, '68', '2018-12-24 14:09:16', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (299, '74', '2018-12-24 14:11:45', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (300, '74', '2018-12-24 14:11:51', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (301, '1', '2018-12-24 14:33:21', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (302, '4', '2018-12-24 14:33:32', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (303, '6', '2018-12-24 14:33:33', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (304, '4', '2018-12-24 14:33:43', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (305, '6', '2018-12-24 14:33:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (306, '1', '2018-12-24 14:37:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (307, '4', '2018-12-24 14:37:05', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (308, '6', '2018-12-24 14:37:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (309, '1', '2018-12-24 14:40:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (310, '1', '2018-12-24 14:41:00', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (311, '6', '2018-12-24 14:41:02', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (312, '4', '2018-12-24 14:41:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (313, '6', '2018-12-24 14:41:57', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (314, '6', '2018-12-24 14:41:58', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (315, '74', '2018-12-24 15:45:27', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (316, '74', '2018-12-24 15:46:22', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (317, '74', '2018-12-24 15:46:31', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (318, '74', '2018-12-24 15:47:21', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (319, '74', '2018-12-24 15:48:26', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (320, '74', '2018-12-24 15:49:17', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (321, '74', '2018-12-24 15:51:04', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (322, '74', '2018-12-24 15:53:37', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (323, '1', '2018-12-24 15:54:30', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (324, '1', '2018-12-24 16:09:42', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (325, '1', '2018-12-24 16:09:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (326, '4', '2018-12-24 16:14:01', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (327, '6', '2018-12-24 16:14:02', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (328, '1', '2018-12-24 16:14:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (329, '4', '2018-12-24 16:14:07', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (330, '6', '2018-12-24 16:14:09', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (331, '4', '2018-12-24 16:16:17', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (332, '1', '2018-12-24 16:16:17', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (333, '6', '2018-12-24 16:16:19', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (334, '76', '2018-12-24 16:18:20', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (335, '76', '2018-12-24 16:18:25', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (336, '76', '2018-12-24 16:18:40', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (337, '1', '2018-12-24 16:19:32', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (338, '77', '2018-12-24 16:25:28', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (339, '77', '2018-12-24 16:25:35', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (340, '77', '2018-12-24 16:25:51', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (341, '4', '2018-12-24 16:26:32', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (342, '1', '2018-12-24 16:26:33', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (343, '6', '2018-12-24 16:26:35', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (344, '6', '2018-12-24 16:26:37', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (345, '6', '2018-12-24 16:26:41', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (346, '4', '2018-12-24 16:26:43', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (347, '1', '2018-12-24 16:26:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (348, '80', '2018-12-24 16:27:38', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (349, '80', '2018-12-24 16:27:51', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (350, '80', '2018-12-24 16:27:55', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (351, '80', '2018-12-24 16:28:06', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (352, '81', '2018-12-24 16:30:11', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (353, '80', '2018-12-24 16:30:18', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (354, '80', '2018-12-24 16:30:22', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (355, '80', '2018-12-24 16:30:23', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (356, '80', '2018-12-24 16:30:27', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (357, '80', '2018-12-24 16:30:43', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (358, '82', '2018-12-24 16:31:50', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (359, '82', '2018-12-24 16:31:55', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (360, '82', '2018-12-24 16:32:47', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (361, '82', '2018-12-24 16:33:31', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (362, '1', '2018-12-24 16:34:10', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (363, '1', '2018-12-24 16:34:11', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (364, '82', '2018-12-24 16:34:13', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (365, '83', '2018-12-24 16:34:29', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (366, '84', '2018-12-24 16:36:56', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (367, '84', '2018-12-24 16:37:04', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (368, '1', '2018-12-24 16:38:03', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (369, '4', '2018-12-24 16:38:07', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (370, '6', '2018-12-24 16:38:30', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (371, '6', '2018-12-24 16:38:31', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (372, '4', '2018-12-24 16:38:32', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (373, '4', '2018-12-24 16:38:33', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (374, '1', '2018-12-24 16:38:36', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (375, '4', '2018-12-24 16:38:37', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (376, '6', '2018-12-24 16:38:38', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (377, '85', '2018-12-24 16:41:17', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (378, '85', '2018-12-24 16:41:23', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (379, '85', '2018-12-24 16:41:27', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (380, '86', '2018-12-24 16:44:23', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (381, '86', '2018-12-24 16:44:30', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (382, '86', '2018-12-24 16:44:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (383, '86', '2018-12-24 16:45:22', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (384, '86', '2018-12-24 16:47:21', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (385, '87', '2018-12-24 16:47:37', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (386, '87', '2018-12-24 16:47:40', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (387, '87', '2018-12-24 16:47:49', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (388, '1', '2018-12-24 16:48:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (389, '4', '2018-12-24 16:48:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (390, '6', '2018-12-24 16:48:08', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (391, '88', '2018-12-24 16:53:20', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (392, '88', '2018-12-24 16:53:26', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (393, '88', '2018-12-24 16:53:35', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (394, '88', '2018-12-24 16:53:39', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (395, '88', '2018-12-24 16:53:48', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (396, '6', '2018-12-24 17:00:24', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (397, '6', '2018-12-24 17:00:25', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (398, '89', '2018-12-24 17:00:30', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (399, '1', '2018-12-24 17:00:31', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (400, '88', '2018-12-24 17:00:38', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (401, '89', '2018-12-24 17:06:21', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (402, '89', '2018-12-24 17:06:25', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (403, '89', '2018-12-24 17:07:44', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (404, '1', '2018-12-24 17:08:03', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (405, '89', '2018-12-24 17:08:25', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (406, '86', '2018-12-24 17:10:25', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (407, '90', '2018-12-24 17:18:41', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (408, '90', '2018-12-24 17:18:50', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (409, '88', '2018-12-24 17:19:01', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (410, '88', '2018-12-24 17:19:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (411, '90', '2018-12-24 17:19:26', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (412, '4', '2018-12-24 17:23:30', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (413, '1', '2018-12-24 17:27:27', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (414, '1', '2018-12-24 17:35:53', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (415, '1', '2018-12-24 17:47:10', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (416, '4', '2018-12-24 17:47:11', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (417, '6', '2018-12-24 17:47:12', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (418, '4', '2018-12-24 17:47:13', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (419, '4', '2018-12-24 17:47:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (420, '4', '2018-12-24 17:48:00', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (421, '6', '2018-12-24 17:48:01', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (422, '1', '2018-12-24 17:48:02', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (423, '89', '2018-12-24 17:58:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (424, '89', '2018-12-24 17:59:38', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (425, '1', '2018-12-25 09:58:10', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (426, '4', '2018-12-25 10:00:22', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (427, '4', '2018-12-25 10:00:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (428, '1', '2018-12-25 10:00:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (429, '4', '2018-12-25 10:00:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (430, '6', '2018-12-25 10:01:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (431, '1', '2018-12-25 10:04:22', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (432, '1', '2018-12-25 10:04:23', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (433, '6', '2018-12-25 10:04:25', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (434, '4', '2018-12-25 10:04:28', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (435, '89', '2018-12-25 10:05:03', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (436, '1', '2018-12-25 10:05:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (437, '4', '2018-12-25 10:05:49', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (438, '6', '2018-12-25 10:05:49', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (439, '89', '2018-12-25 10:06:30', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (440, '89', '2018-12-25 10:07:00', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (441, '89', '2018-12-25 10:08:20', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (442, '89', '2018-12-25 10:08:22', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (443, '89', '2018-12-25 10:08:27', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (444, '89', '2018-12-25 10:09:19', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (445, '89', '2018-12-25 10:11:28', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (446, '91', '2018-12-25 10:13:02', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (447, '91', '2018-12-25 10:13:07', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (448, '91', '2018-12-25 10:13:30', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (449, '91', '2018-12-25 10:18:00', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (450, '1', '2018-12-25 10:18:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (451, '1', '2018-12-25 10:18:14', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (452, '4', '2018-12-25 10:18:15', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (453, '91', '2018-12-25 10:18:23', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (454, '1', '2018-12-25 10:23:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (455, '92', '2018-12-25 10:23:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (456, '92', '2018-12-25 10:23:58', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (457, '4', '2018-12-25 10:24:35', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (458, '4', '2018-12-25 10:24:42', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (459, '1', '2018-12-25 10:24:49', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (460, '6', '2018-12-25 10:27:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (461, '6', '2018-12-25 10:27:17', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (462, '4', '2018-12-25 10:27:17', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (463, '1', '2018-12-25 10:27:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (464, '4', '2018-12-25 10:27:19', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (465, '1', '2018-12-25 10:30:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (466, '1', '2018-12-25 10:30:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (467, '4', '2018-12-25 10:32:20', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (468, '4', '2018-12-25 10:32:20', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (469, '6', '2018-12-25 10:32:21', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (470, '1', '2018-12-25 10:32:22', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (471, '1', '2018-12-25 10:34:15', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (472, '1', '2018-12-25 10:34:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (473, '4', '2018-12-25 10:34:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (474, '6', '2018-12-25 10:34:19', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (475, '1', '2018-12-25 10:47:14', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (476, '1', '2018-12-25 10:47:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (477, '6', '2018-12-25 10:49:47', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (478, '1', '2018-12-25 10:58:02', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (479, '4', '2018-12-25 10:58:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (480, '4', '2018-12-25 10:58:52', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (481, '1', '2018-12-25 11:01:39', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (482, '6', '2018-12-25 11:01:47', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (483, '6', '2018-12-25 11:03:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (484, '4', '2018-12-25 11:03:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (485, '6', '2018-12-25 11:06:39', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (486, '6', '2018-12-25 11:07:43', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (487, '6', '2018-12-25 11:07:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (488, '6', '2018-12-25 11:07:46', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (489, '4', '2018-12-25 11:07:47', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (490, '1', '2018-12-25 11:07:49', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (491, '6', '2018-12-25 11:09:27', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (492, '1', '2018-12-25 11:09:29', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (493, '6', '2018-12-25 11:09:55', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (494, '4', '2018-12-25 11:09:56', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (495, '1', '2018-12-25 11:09:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (496, '92', '2018-12-25 11:12:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (497, '1', '2018-12-25 11:12:27', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (498, '4', '2018-12-25 11:12:28', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (499, '6', '2018-12-25 11:12:29', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (500, '93', '2018-12-25 11:12:40', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (501, '93', '2018-12-25 11:12:46', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (502, '93', '2018-12-25 11:12:53', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (503, '93', '2018-12-25 11:14:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (504, '93', '2018-12-25 11:14:14', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (505, '93', '2018-12-25 11:14:15', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (506, '93', '2018-12-25 11:15:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (507, '93', '2018-12-25 11:15:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (508, '93', '2018-12-25 11:16:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (509, '93', '2018-12-25 11:18:09', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (510, '93', '2018-12-25 11:19:06', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (511, '92', '2018-12-25 11:25:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (512, '92', '2018-12-25 11:25:34', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (513, '92', '2018-12-25 11:26:17', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (514, '92', '2018-12-25 11:26:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (515, '92', '2018-12-25 11:26:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (516, '250', '2018-12-25 11:27:03', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (517, '92', '2018-12-25 11:27:04', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (518, '250', '2018-12-25 11:27:43', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (519, '92', '2018-12-25 11:27:44', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (520, '92', '2018-12-25 11:28:23', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (521, '92', '2018-12-25 11:28:32', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (522, '92', '2018-12-25 11:28:32', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (523, '93', '2018-12-25 11:35:12', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (524, '93', '2018-12-25 13:11:33', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (525, '93', '2018-12-25 13:11:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (526, '93', '2018-12-25 13:11:39', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (527, '92', '2018-12-25 13:25:26', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (528, '92', '2018-12-25 13:25:39', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (529, '93', '2018-12-25 13:27:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (530, '73', '2018-12-25 13:27:32', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (531, '92', '2018-12-25 13:27:33', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (532, '93', '2018-12-25 13:27:53', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (533, '93', '2018-12-25 13:27:54', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (534, '92', '2018-12-25 13:28:00', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (535, '93', '2018-12-25 13:28:57', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (536, '93', '2018-12-25 13:32:09', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (537, '1', '2018-12-25 13:55:51', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (538, '92', '2018-12-25 13:58:34', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (539, '92', '2018-12-25 13:58:36', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (540, '92', '2018-12-25 13:58:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (541, '92', '2018-12-25 13:59:29', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (542, '1', '2018-12-25 13:59:56', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (543, '93', '2018-12-25 13:59:57', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (544, '93', '2018-12-25 14:00:02', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (545, '92', '2018-12-25 14:03:46', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (546, '92', '2018-12-25 14:03:51', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (547, '92', '2018-12-25 14:04:04', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (548, '92', '2018-12-25 14:04:09', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (549, '92', '2018-12-25 14:04:13', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (550, '93', '2018-12-25 14:04:15', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (551, '93', '2018-12-25 14:04:19', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (552, '92', '2018-12-25 14:05:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (553, '92', '2018-12-25 14:05:59', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (554, '93', '2018-12-25 14:06:16', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (555, '93', '2018-12-25 14:06:21', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (556, '92', '2018-12-25 14:10:46', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (557, '92', '2018-12-25 14:10:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (558, '93', '2018-12-25 14:11:01', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (559, '93', '2018-12-25 14:11:06', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (560, '4', '2018-12-25 14:14:20', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (561, '92', '2018-12-25 14:39:43', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (562, '92', '2018-12-25 14:39:44', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (563, '92', '2018-12-25 14:39:47', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (564, '92', '2018-12-25 14:40:25', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (565, '92', '2018-12-25 14:41:21', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (566, '73', '2018-12-25 14:41:48', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (567, '73', '2018-12-25 14:42:19', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (568, '73', '2018-12-25 14:42:22', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (569, '73', '2018-12-25 14:42:59', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (570, '73', '2018-12-25 14:44:05', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (571, '73', '2018-12-25 14:44:34', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (572, '93', '2018-12-25 14:45:59', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (573, '93', '2018-12-25 14:46:00', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (574, '93', '2018-12-25 14:46:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (575, '93', '2018-12-25 14:46:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (576, '93', '2018-12-25 14:47:20', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (577, '93', '2018-12-25 14:47:21', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (578, '92', '2018-12-25 14:47:37', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (579, '92', '2018-12-25 14:47:41', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (580, '1', '2018-12-25 14:47:41', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (581, '1', '2018-12-25 14:47:41', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (582, '4', '2018-12-25 14:47:42', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (583, '92', '2018-12-25 14:47:43', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (584, '6', '2018-12-25 14:47:43', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (585, '93', '2018-12-25 14:47:47', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (586, '92', '2018-12-25 14:47:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (587, '92', '2018-12-25 14:47:54', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (588, '94', '2018-12-25 14:48:14', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (589, '94', '2018-12-25 14:48:22', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (590, '94', '2018-12-25 14:48:31', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (591, '94', '2018-12-25 14:48:37', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (592, '94', '2018-12-25 14:48:44', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (593, '94', '2018-12-25 14:48:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (594, '94', '2018-12-25 14:48:54', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (595, '4', '2018-12-25 14:51:26', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (596, '1', '2018-12-25 14:51:26', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (597, '6', '2018-12-25 14:51:27', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (598, '94', '2018-12-25 14:52:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (599, '94', '2018-12-25 14:52:56', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (600, '94', '2018-12-25 14:53:08', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (601, '94', '2018-12-25 14:54:07', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (602, '94', '2018-12-25 14:54:49', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (603, '94', '2018-12-25 15:04:03', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (604, '41', '2018-12-25 15:08:55', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (605, '41', '2018-12-25 15:09:02', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (606, '94', '2018-12-25 15:21:22', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (607, '94', '2018-12-25 15:25:27', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (608, '94', '2018-12-25 15:26:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (609, '94', '2018-12-25 15:26:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (610, '93', '2018-12-25 15:26:36', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (611, '94', '2018-12-25 15:26:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (612, '94', '2018-12-25 15:26:52', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (613, '94', '2018-12-25 15:26:55', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (614, '94', '2018-12-25 15:26:59', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (615, '94', '2018-12-25 15:27:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (616, '94', '2018-12-25 15:27:06', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (617, '94', '2018-12-25 15:27:10', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (618, '94', '2018-12-25 15:27:14', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (619, '94', '2018-12-25 15:28:52', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (620, '94', '2018-12-25 15:28:55', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (621, '94', '2018-12-25 15:34:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (622, '94', '2018-12-25 15:34:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (623, '94', '2018-12-25 15:34:43', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (624, '94', '2018-12-25 15:34:48', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (625, '4', '2018-12-25 15:46:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (626, '4', '2018-12-25 15:46:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (627, '4', '2018-12-25 15:47:10', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (628, '4', '2018-12-25 15:48:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (629, '6', '2018-12-25 15:49:00', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (630, '94', '2018-12-25 15:51:34', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (631, '1', '2018-12-25 15:59:19', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (632, '94', '2018-12-25 16:29:08', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (633, '94', '2018-12-25 16:29:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (634, '94', '2018-12-25 16:29:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (635, '94', '2018-12-25 16:29:30', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (636, '94', '2018-12-25 16:29:59', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (637, '94', '2018-12-25 16:34:09', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (638, '94', '2018-12-25 16:34:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (639, '94', '2018-12-25 16:34:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (640, '94', '2018-12-25 16:38:08', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (641, '94', '2018-12-25 16:38:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (642, '94', '2018-12-25 16:42:25', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (643, '94', '2018-12-25 16:42:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (644, '94', '2018-12-25 16:45:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (645, '94', '2018-12-25 16:45:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (646, '94', '2018-12-25 16:45:37', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (647, '94', '2018-12-25 16:45:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (648, '4', '2018-12-25 17:43:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (649, '1', '2018-12-25 17:43:07', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (650, '1', '2018-12-25 18:03:55', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (651, '1', '2018-12-25 18:03:56', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (652, '1', '2018-12-25 18:05:20', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (653, '4', '2018-12-25 18:05:22', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (654, '6', '2018-12-25 18:05:23', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (655, '1', '2018-12-25 18:06:54', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (656, '4', '2018-12-25 18:06:58', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (657, '6', '2018-12-25 18:07:03', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (658, '1', '2018-12-25 18:08:14', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (659, '4', '2018-12-25 18:08:14', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (660, '6', '2018-12-25 18:08:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (661, '1', '2018-12-25 18:10:35', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (662, '4', '2018-12-25 18:10:36', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (663, '6', '2018-12-25 18:10:37', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (664, '1', '2018-12-25 18:15:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (665, '4', '2018-12-25 18:15:07', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (666, '6', '2018-12-25 18:15:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (667, '95', '2018-12-26 13:41:14', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (668, '96', '2018-12-26 13:46:16', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (669, '97', '2018-12-26 13:46:53', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (670, '98', '2018-12-26 13:47:28', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (671, '99', '2018-12-26 13:47:55', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (672, '96', '2018-12-26 13:49:48', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (673, '96', '2018-12-26 13:50:11', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (674, '101', '2018-12-26 13:50:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (675, '96', '2018-12-26 13:52:17', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (676, '96', '2018-12-26 13:53:11', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (677, '96', '2018-12-26 13:53:25', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (678, '96', '2018-12-26 13:53:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (679, '96', '2018-12-26 13:53:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (680, '96', '2018-12-26 13:53:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (681, '96', '2018-12-26 13:53:35', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (682, '96', '2018-12-26 13:53:47', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (683, '96', '2018-12-26 13:53:48', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (684, '96', '2018-12-26 13:54:00', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (685, '96', '2018-12-26 13:54:12', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (686, '96', '2018-12-26 13:54:23', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (687, '96', '2018-12-26 13:54:25', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (688, '96', '2018-12-26 13:54:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (689, '96', '2018-12-26 13:54:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (690, '96', '2018-12-26 13:54:34', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (691, '96', '2018-12-26 13:55:00', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (692, '96', '2018-12-26 13:55:01', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (693, '96', '2018-12-26 13:55:21', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (694, '96', '2018-12-26 13:55:24', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (695, '96', '2018-12-26 13:55:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (696, '96', '2018-12-26 13:55:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (697, '96', '2018-12-26 13:55:33', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (698, '96', '2018-12-26 13:55:37', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (699, '96', '2018-12-26 13:55:42', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (700, '96', '2018-12-26 13:55:59', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (701, '96', '2018-12-26 13:56:49', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (702, '98', '2018-12-26 13:57:06', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (703, '96', '2018-12-26 13:59:46', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (704, '102', '2018-12-26 14:00:17', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (705, '103', '2018-12-26 14:01:21', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (706, '98', '2018-12-26 14:24:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (707, '98', '2018-12-26 14:31:28', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (708, '98', '2018-12-26 14:39:07', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (709, '98', '2018-12-26 14:39:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (710, '96', '2018-12-26 14:39:16', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (711, '98', '2018-12-26 16:32:46', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (712, '103', '2018-12-26 16:37:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (713, '103', '2018-12-26 16:39:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (714, '103', '2018-12-26 16:39:41', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (715, '103', '2018-12-26 16:39:46', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (716, '103', '2018-12-26 16:40:43', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (717, '103', '2018-12-26 16:40:46', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (718, '103', '2018-12-26 16:40:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (719, '103', '2018-12-26 16:40:58', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (720, '103', '2018-12-26 16:40:59', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (721, '253', '2018-12-26 16:41:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (722, '103', '2018-12-26 16:41:29', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (723, '103', '2018-12-26 16:42:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (724, '103', '2018-12-26 16:42:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (725, '103', '2018-12-26 16:42:13', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (726, '103', '2018-12-26 16:44:45', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (727, '103', '2018-12-26 16:46:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (728, '104', '2018-12-26 16:46:40', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (729, '104', '2018-12-26 16:46:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (730, '104', '2018-12-26 16:46:59', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (731, '104', '2018-12-26 16:47:02', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (732, '104', '2018-12-26 16:47:07', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (733, '104', '2018-12-26 16:47:08', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (734, '104', '2018-12-26 16:47:13', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (735, '104', '2018-12-26 16:48:21', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (736, '1', '2018-12-26 16:51:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (737, '104', '2018-12-26 16:52:35', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (738, '104', '2018-12-26 16:52:43', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (739, '104', '2018-12-26 16:52:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (740, '104', '2018-12-26 16:53:01', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (741, '104', '2018-12-26 16:53:18', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (742, '104', '2018-12-26 16:53:30', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (743, '104', '2018-12-26 16:54:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (744, '104', '2018-12-26 16:54:46', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (745, '1', '2018-12-26 17:16:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (746, '4', '2018-12-26 17:16:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (747, '6', '2018-12-26 17:16:05', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (748, '6', '2018-12-26 17:16:07', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (749, '6', '2018-12-26 17:16:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (750, '4', '2018-12-26 17:16:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (751, '1', '2018-12-26 17:16:10', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (752, '4', '2018-12-26 17:16:12', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (753, '6', '2018-12-26 17:16:13', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (754, '4', '2018-12-26 17:17:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (755, '4', '2018-12-26 17:17:05', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (756, '6', '2018-12-26 17:17:13', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (757, '104', '2018-12-26 17:18:36', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (758, '104', '2018-12-26 17:18:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (759, '104', '2018-12-26 17:19:13', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (760, '104', '2018-12-26 17:20:33', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (761, '104', '2018-12-26 17:24:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (762, '104', '2018-12-26 17:24:56', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (763, '104', '2018-12-26 17:30:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (764, '104', '2018-12-26 17:37:31', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (765, '104', '2018-12-26 17:37:44', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (766, '104', '2018-12-26 17:37:51', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (767, '104', '2018-12-26 17:42:25', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (768, '105', '2018-12-26 17:45:19', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (769, '105', '2018-12-26 17:45:24', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (770, '105', '2018-12-26 17:45:31', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (771, '105', '2018-12-26 17:45:48', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (772, '105', '2018-12-26 17:45:49', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (773, '105', '2018-12-26 17:45:50', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (774, '105', '2018-12-26 17:45:50', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (775, '105', '2018-12-26 17:45:50', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (776, '106', '2018-12-26 17:48:32', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (777, '106', '2018-12-26 17:48:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (778, '106', '2018-12-26 17:50:23', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (779, '106', '2018-12-26 17:52:50', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (780, '1', '2018-12-26 18:02:58', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (781, '4', '2018-12-26 18:02:58', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (782, '6', '2018-12-26 18:03:00', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (783, '6', '2018-12-26 18:03:01', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (784, '105', '2018-12-26 18:04:57', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (785, '105', '2018-12-26 18:04:58', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (786, '105', '2018-12-26 18:05:26', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (787, '105', '2018-12-26 18:35:54', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (788, '105', '2018-12-26 18:43:52', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (789, '105', '2018-12-26 18:43:54', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (790, '105', '2018-12-26 18:43:56', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (791, '105', '2018-12-26 18:44:09', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (792, '105', '2018-12-26 18:44:38', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (793, '106', '2018-12-26 19:00:53', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (794, '106', '2018-12-26 19:07:04', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (795, '106', '2018-12-26 19:07:12', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (796, '106', '2018-12-26 19:07:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (797, '106', '2018-12-26 19:08:03', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (798, '106', '2018-12-26 19:08:25', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (799, '106', '2018-12-26 19:08:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (800, '106', '2018-12-26 19:09:14', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (801, '106', '2018-12-26 19:09:37', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (802, '106', '2018-12-26 19:20:12', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (803, '107', '2018-12-26 19:21:28', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (804, '107', '2018-12-26 19:21:38', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (805, '107', '2018-12-26 19:21:48', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (806, '107', '2018-12-26 19:22:38', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (807, '107', '2018-12-26 19:22:50', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (808, '107', '2018-12-26 19:23:01', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (809, '107', '2018-12-26 19:23:11', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (810, '107', '2018-12-26 19:23:25', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (811, '107', '2018-12-26 19:24:47', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (812, '107', '2018-12-26 19:25:04', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (813, '107', '2018-12-26 19:25:23', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (814, '107', '2018-12-26 19:25:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (815, '107', '2018-12-26 19:26:26', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (816, '107', '2018-12-26 19:27:15', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (817, '107', '2018-12-26 19:27:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (818, '107', '2018-12-26 19:28:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (819, '107', '2018-12-26 19:29:07', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (820, '107', '2018-12-26 19:30:07', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (821, '107', '2018-12-26 19:30:24', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (822, '107', '2018-12-26 19:30:30', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (823, '107', '2018-12-26 19:30:33', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (824, '107', '2018-12-26 19:30:48', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (825, '107', '2018-12-26 20:19:25', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (826, '107', '2018-12-26 20:19:40', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (827, '107', '2018-12-26 20:21:05', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (828, '107', '2018-12-26 20:22:11', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (829, '107', '2018-12-26 20:22:24', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (830, '107', '2018-12-26 20:22:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (831, '108', '2018-12-26 20:25:23', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (832, '108', '2018-12-26 20:25:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (833, '108', '2018-12-26 20:25:35', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (834, '108', '2018-12-26 20:26:12', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (835, '108', '2018-12-26 20:28:24', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (836, '108', '2018-12-26 20:29:41', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (837, '109', '2018-12-26 20:30:00', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (838, '109', '2018-12-26 20:30:04', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (839, '109', '2018-12-26 20:30:11', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (840, '108', '2018-12-26 20:41:01', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (841, '107', '2018-12-26 20:41:23', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (842, '107', '2018-12-26 20:41:36', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (843, '107', '2018-12-26 20:41:41', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (844, '107', '2018-12-26 20:49:17', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (845, '107', '2018-12-26 20:49:22', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (846, '107', '2018-12-26 20:49:27', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (847, '107', '2018-12-26 20:49:30', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (848, '107', '2018-12-26 20:49:36', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (849, '107', '2018-12-26 20:50:00', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (850, '107', '2018-12-26 20:50:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (851, '107', '2018-12-26 20:50:22', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (852, '107', '2018-12-26 20:51:51', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (853, '107', '2018-12-26 20:51:55', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (854, '107', '2018-12-26 20:52:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (855, '107', '2018-12-26 20:52:26', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (856, '107', '2018-12-26 20:56:23', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (857, '107', '2018-12-26 20:59:21', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (858, '107', '2018-12-26 20:59:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (859, '107', '2018-12-26 20:59:43', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (860, '107', '2018-12-26 21:00:12', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (861, '107', '2018-12-26 21:00:21', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (862, '107', '2018-12-26 21:00:36', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (863, '107', '2018-12-26 21:00:57', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (864, '107', '2018-12-26 21:01:03', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (865, '107', '2018-12-26 21:01:44', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (866, '107', '2018-12-26 21:01:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (867, '107', '2018-12-26 21:01:52', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (868, '107', '2018-12-26 21:02:02', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (869, '107', '2018-12-26 21:02:08', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (870, '107', '2018-12-26 21:02:15', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (871, '107', '2018-12-26 21:02:17', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (872, '107', '2018-12-26 21:02:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (873, '107', '2018-12-26 21:02:33', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (874, '107', '2018-12-26 21:02:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (875, '109', '2018-12-26 21:09:30', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (876, '109', '2018-12-26 21:09:35', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (877, '109', '2018-12-26 21:22:09', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (878, '109', '2018-12-26 21:22:11', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (879, '109', '2018-12-26 21:22:19', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (880, '109', '2018-12-26 21:22:30', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (881, '109', '2018-12-26 21:24:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (882, '109', '2018-12-26 21:24:37', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (883, '109', '2018-12-26 21:25:08', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (884, '109', '2018-12-26 21:26:02', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (885, '109', '2018-12-26 21:26:49', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (886, '109', '2018-12-26 21:26:55', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (887, '109', '2018-12-26 21:27:04', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (888, '109', '2018-12-26 21:27:10', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (889, '109', '2018-12-26 21:27:52', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (890, '109', '2018-12-26 21:27:56', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (891, '109', '2018-12-26 21:28:32', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (892, '109', '2018-12-26 21:29:26', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (893, '109', '2018-12-26 21:29:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (894, '109', '2018-12-26 21:29:37', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (895, '109', '2018-12-26 21:31:33', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (896, '107', '2018-12-26 21:32:55', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (897, '107', '2018-12-26 21:33:14', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (898, '107', '2018-12-26 21:33:23', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (899, '110', '2018-12-26 21:35:39', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (900, '110', '2018-12-26 21:35:46', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (901, '110', '2018-12-26 21:36:05', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (902, '110', '2018-12-26 21:36:07', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (903, '110', '2018-12-26 21:36:10', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (904, '110', '2018-12-26 21:36:15', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (905, '110', '2018-12-26 21:36:24', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (906, '110', '2018-12-26 21:36:41', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (907, '110', '2018-12-26 21:37:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (908, '110', '2018-12-26 21:37:43', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (909, '110', '2018-12-26 21:37:51', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (910, '110', '2018-12-26 21:39:24', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (911, '110', '2018-12-26 21:40:08', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (912, '110', '2018-12-26 21:40:31', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (913, '110', '2018-12-26 21:41:07', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (914, '110', '2018-12-26 21:41:21', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (915, '110', '2018-12-26 21:41:29', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (916, '110', '2018-12-26 21:48:53', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (917, '110', '2018-12-26 21:50:30', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (918, '110', '2018-12-26 21:55:01', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (919, '110', '2018-12-26 21:55:12', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (920, '110', '2018-12-26 21:58:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (921, '110', '2018-12-26 22:00:21', '33', NULL, 0);
INSERT INTO `pmo_operation` VALUES (922, '109', '2018-12-27 10:16:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (923, '4', '2018-12-27 10:32:24', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (924, '4', '2018-12-27 10:32:25', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (925, '1', '2018-12-27 10:36:29', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (926, '108', '2018-12-27 10:37:59', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (927, '108', '2018-12-27 10:39:04', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (928, '108', '2018-12-27 10:39:06', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (929, '110', '2018-12-27 10:51:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (930, '110', '2018-12-27 10:52:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (931, '111', '2018-12-27 10:53:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (932, '111', '2018-12-27 10:53:51', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (933, '110', '2018-12-27 10:54:04', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (934, '111', '2018-12-27 10:54:15', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (935, '111', '2018-12-27 10:54:23', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (936, '111', '2018-12-27 10:54:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (937, '111', '2018-12-27 10:54:38', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (938, '111', '2018-12-27 10:54:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (939, '111', '2018-12-27 10:54:43', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (940, '110', '2018-12-27 10:55:10', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (941, '111', '2018-12-27 10:55:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (942, '111', '2018-12-27 10:55:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (943, '110', '2018-12-27 10:57:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (944, '111', '2018-12-27 10:57:43', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (945, '112', '2018-12-27 10:58:00', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (946, '112', '2018-12-27 10:58:04', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (947, '112', '2018-12-27 10:58:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (948, '112', '2018-12-27 10:58:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (949, '112', '2018-12-27 10:58:31', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (950, '112', '2018-12-27 10:58:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (951, '112', '2018-12-27 10:58:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (952, '112', '2018-12-27 10:58:48', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (953, '112', '2018-12-27 10:58:51', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (954, '110', '2018-12-27 10:59:51', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (955, '110', '2018-12-27 11:00:28', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (956, '110', '2018-12-27 11:00:44', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (957, '110', '2018-12-27 11:00:44', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (958, '110', '2018-12-27 11:00:54', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (959, '110', '2018-12-27 11:01:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (960, '112', '2018-12-27 11:32:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (961, '112', '2018-12-27 11:33:08', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (962, '112', '2018-12-27 11:33:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (963, '110', '2018-12-27 11:33:55', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (964, '110', '2018-12-27 11:34:28', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (965, '113', '2018-12-27 11:35:25', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (966, '113', '2018-12-27 11:35:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (967, '114', '2018-12-27 11:38:17', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (968, '114', '2018-12-27 11:38:24', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (969, '113', '2018-12-27 11:39:03', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (970, '115', '2018-12-27 11:39:12', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (971, '115', '2018-12-27 11:39:19', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (972, '116', '2018-12-27 11:40:55', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (973, '116', '2018-12-27 11:41:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (974, '116', '2018-12-27 11:41:13', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (975, '116', '2018-12-27 11:41:22', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (976, '116', '2018-12-27 11:42:21', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (977, '116', '2018-12-27 11:42:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (978, '116', '2018-12-27 11:43:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (979, '117', '2018-12-27 11:51:52', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (980, '117', '2018-12-27 11:52:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (981, '117', '2018-12-27 11:52:08', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (982, '117', '2018-12-27 11:52:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (983, '117', '2018-12-27 11:54:20', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (984, '117', '2018-12-27 11:55:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (985, '117', '2018-12-27 11:56:39', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (986, '117', '2018-12-27 11:56:49', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (987, '118', '2018-12-27 12:05:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (988, '118', '2018-12-27 12:05:47', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (989, '118', '2018-12-27 12:05:53', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (990, '118', '2018-12-27 12:06:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (991, '118', '2018-12-27 12:07:06', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (992, '118', '2018-12-27 12:07:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (993, '118', '2018-12-27 12:09:48', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (994, '118', '2018-12-27 12:10:06', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (995, '118', '2018-12-27 13:17:20', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (996, '118', '2018-12-27 13:18:53', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (997, '118', '2018-12-27 13:19:01', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (998, '118', '2018-12-27 13:19:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (999, '118', '2018-12-27 13:19:37', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1000, '118', '2018-12-27 13:19:50', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1001, '118', '2018-12-27 13:19:56', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1002, '118', '2018-12-27 13:20:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1003, '118', '2018-12-27 13:20:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1004, '118', '2018-12-27 13:20:22', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1005, '118', '2018-12-27 13:20:31', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1006, '118', '2018-12-27 13:20:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1007, '118', '2018-12-27 13:20:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1008, '118', '2018-12-27 13:20:57', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1009, '118', '2018-12-27 13:21:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1010, '118', '2018-12-27 13:21:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1011, '117', '2018-12-27 13:21:24', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1012, '117', '2018-12-27 13:21:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1013, '119', '2018-12-27 13:22:57', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1014, '119', '2018-12-27 13:23:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1015, '119', '2018-12-27 13:23:37', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1016, '119', '2018-12-27 13:23:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1017, '119', '2018-12-27 13:23:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1018, '119', '2018-12-27 13:23:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1019, '119', '2018-12-27 13:23:53', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1020, '119', '2018-12-27 13:24:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1021, '119', '2018-12-27 13:24:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1022, '119', '2018-12-27 13:24:07', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1023, '119', '2018-12-27 13:24:53', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1024, '120', '2018-12-27 13:24:55', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1025, '120', '2018-12-27 13:24:59', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1026, '120', '2018-12-27 13:25:06', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1027, '119', '2018-12-27 13:25:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1028, '119', '2018-12-27 13:25:31', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1029, '120', '2018-12-27 13:25:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1030, '119', '2018-12-27 13:25:41', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1031, '119', '2018-12-27 13:25:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1032, '119', '2018-12-27 13:26:21', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1033, '120', '2018-12-27 13:26:26', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1034, '119', '2018-12-27 13:26:41', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1035, '119', '2018-12-27 13:26:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1036, '119', '2018-12-27 13:26:48', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1037, '119', '2018-12-27 13:26:56', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1038, '119', '2018-12-27 13:26:57', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1039, '256', '2018-12-27 13:27:00', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1040, '119', '2018-12-27 13:27:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1041, '119', '2018-12-27 13:27:03', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1042, '119', '2018-12-27 13:27:14', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1043, '119', '2018-12-27 13:27:15', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1044, '119', '2018-12-27 13:27:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1045, '119', '2018-12-27 13:27:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1046, '75', '2018-12-27 13:27:22', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1047, '119', '2018-12-27 13:27:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1048, '121', '2018-12-27 13:27:25', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1049, '121', '2018-12-27 13:27:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1050, '119', '2018-12-27 13:27:33', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1051, '119', '2018-12-27 13:27:37', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1052, '119', '2018-12-27 13:27:48', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1053, '119', '2018-12-27 13:27:52', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1054, '119', '2018-12-27 13:28:24', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1055, '121', '2018-12-27 13:28:29', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1056, '119', '2018-12-27 13:28:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1057, '119', '2018-12-27 13:28:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1058, '121', '2018-12-27 13:28:41', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1059, '119', '2018-12-27 13:28:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1060, '119', '2018-12-27 13:28:56', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1061, '119', '2018-12-27 13:29:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1062, '119', '2018-12-27 13:29:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1063, '119', '2018-12-27 13:29:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1064, '119', '2018-12-27 13:29:46', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1065, '119', '2018-12-27 13:29:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1066, '42', '2018-12-27 13:29:52', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1067, '119', '2018-12-27 13:29:53', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1068, '119', '2018-12-27 13:30:02', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1069, '119', '2018-12-27 13:30:02', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1070, '43', '2018-12-27 13:30:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1071, '119', '2018-12-27 13:30:19', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1072, '119', '2018-12-27 13:30:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1073, '119', '2018-12-27 13:30:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1074, '119', '2018-12-27 13:30:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1075, '119', '2018-12-27 13:31:39', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1076, '119', '2018-12-27 13:31:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1077, '119', '2018-12-27 13:32:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1078, '121', '2018-12-27 13:32:25', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1079, '119', '2018-12-27 13:32:27', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1080, '121', '2018-12-27 13:32:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1081, '121', '2018-12-27 13:32:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1082, '121', '2018-12-27 13:32:38', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1083, '121', '2018-12-27 13:32:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1084, '121', '2018-12-27 13:33:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1085, '119', '2018-12-27 13:34:47', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1086, '120', '2018-12-27 13:37:56', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1087, '120', '2018-12-27 13:37:58', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1088, '120', '2018-12-27 13:38:06', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1089, '120', '2018-12-27 13:38:10', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1090, '120', '2018-12-27 13:38:13', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1091, '120', '2018-12-27 13:38:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1092, '120', '2018-12-27 13:39:05', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1093, '120', '2018-12-27 13:40:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1094, '119', '2018-12-27 13:41:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1095, '119', '2018-12-27 13:41:19', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1096, '119', '2018-12-27 13:41:24', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1097, '255', '2018-12-27 13:41:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1098, '255', '2018-12-27 13:41:55', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1099, '119', '2018-12-27 13:42:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1100, '119', '2018-12-27 13:42:07', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1101, '119', '2018-12-27 13:42:39', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1102, '121', '2018-12-27 13:45:29', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1103, '121', '2018-12-27 13:45:37', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1104, '121', '2018-12-27 13:45:54', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1105, '121', '2018-12-27 13:46:11', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1106, '119', '2018-12-27 13:46:47', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1107, '121', '2018-12-27 13:46:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1108, '119', '2018-12-27 13:47:15', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1109, '121', '2018-12-27 13:47:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1110, '119', '2018-12-27 13:47:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1111, '121', '2018-12-27 13:47:20', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1112, '121', '2018-12-27 13:47:48', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1113, '121', '2018-12-27 13:48:58', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1114, '121', '2018-12-27 13:49:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1115, '121', '2018-12-27 13:50:52', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1116, '120', '2018-12-27 13:51:31', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1117, '120', '2018-12-27 13:51:35', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1118, '121', '2018-12-27 13:52:08', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1119, '1', '2018-12-27 13:52:57', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1120, '4', '2018-12-27 13:52:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1121, '6', '2018-12-27 13:52:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1122, '1', '2018-12-27 13:53:48', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1123, '4', '2018-12-27 13:53:49', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1124, '6', '2018-12-27 13:53:50', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1125, '1', '2018-12-27 13:57:42', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1126, '4', '2018-12-27 13:57:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1127, '6', '2018-12-27 13:57:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1128, '119', '2018-12-27 13:58:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1129, '119', '2018-12-27 13:58:50', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1130, '119', '2018-12-27 13:59:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1131, '119', '2018-12-27 13:59:15', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1132, '119', '2018-12-27 13:59:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1133, '119', '2018-12-27 13:59:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1134, '255', '2018-12-27 13:59:31', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1135, '119', '2018-12-27 13:59:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1136, '119', '2018-12-27 13:59:38', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1137, '119', '2018-12-27 13:59:44', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1138, '119', '2018-12-27 13:59:49', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1139, '119', '2018-12-27 14:00:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1140, '119', '2018-12-27 14:01:22', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1141, '119', '2018-12-27 14:01:43', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1142, '119', '2018-12-27 14:01:54', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1143, '121', '2018-12-27 14:05:17', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1144, '122', '2018-12-27 14:05:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1145, '122', '2018-12-27 14:06:02', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1146, '122', '2018-12-27 14:06:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1147, '1', '2018-12-27 14:06:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1148, '122', '2018-12-27 14:06:20', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1149, '122', '2018-12-27 14:07:02', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1150, '6', '2018-12-27 14:10:09', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1151, '4', '2018-12-27 14:10:10', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1152, '1', '2018-12-27 14:10:11', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1153, '122', '2018-12-27 14:12:50', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1154, '122', '2018-12-27 14:12:57', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1155, '1', '2018-12-27 14:13:04', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1156, '122', '2018-12-27 14:13:12', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1157, '4', '2018-12-27 14:14:06', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1158, '1', '2018-12-27 14:19:31', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1159, '4', '2018-12-27 14:20:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1160, '123', '2018-12-27 15:18:23', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1161, '123', '2018-12-27 15:18:27', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1162, '123', '2018-12-27 15:18:44', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1163, '123', '2018-12-27 15:19:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1164, '123', '2018-12-27 15:19:29', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1165, '124', '2018-12-27 15:22:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1166, '124', '2018-12-27 15:23:03', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1167, '124', '2018-12-27 15:23:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1168, '124', '2018-12-27 15:23:19', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1169, '124', '2018-12-27 15:24:39', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1170, '124', '2018-12-27 15:25:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1171, '124', '2018-12-27 15:26:55', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1172, '124', '2018-12-27 15:27:02', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1173, '124', '2018-12-27 15:27:23', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1174, '125', '2018-12-27 15:27:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1175, '125', '2018-12-27 15:27:46', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1176, '125', '2018-12-27 15:27:52', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1177, '125', '2018-12-27 15:28:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1178, '125', '2018-12-27 15:29:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1179, '125', '2018-12-27 15:29:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1180, '125', '2018-12-27 15:29:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1181, '125', '2018-12-27 15:29:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1182, '125', '2018-12-27 15:29:45', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1183, '125', '2018-12-27 15:29:52', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1184, '125', '2018-12-27 15:30:41', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1185, '125', '2018-12-27 15:30:53', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1186, '125', '2018-12-27 15:31:00', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1187, '126', '2018-12-27 15:34:11', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1188, '126', '2018-12-27 15:34:14', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1189, '126', '2018-12-27 15:34:27', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1190, '126', '2018-12-27 15:34:37', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1191, '126', '2018-12-27 15:34:43', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1192, '126', '2018-12-27 15:34:52', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1193, '126', '2018-12-27 15:35:00', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1194, '126', '2018-12-27 15:35:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1195, '126', '2018-12-27 15:35:14', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1196, '1', '2018-12-27 16:10:12', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1197, '6', '2018-12-27 16:12:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1198, '4', '2018-12-27 16:12:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1199, '1', '2018-12-27 16:12:06', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1200, '4', '2018-12-27 16:12:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1201, '6', '2018-12-27 16:12:09', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1202, '6', '2018-12-27 16:15:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1203, '1', '2018-12-27 16:48:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1204, '4', '2018-12-27 16:48:16', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1205, '6', '2018-12-27 16:48:18', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1206, '127', '2018-12-27 16:50:10', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1207, '127', '2018-12-27 16:50:58', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1208, '127', '2018-12-27 16:51:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1209, '127', '2018-12-27 16:51:11', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1210, '127', '2018-12-27 16:51:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1211, '127', '2018-12-27 16:51:13', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1212, '127', '2018-12-27 16:51:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1213, '127', '2018-12-27 16:51:26', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1214, '127', '2018-12-27 16:51:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1215, '127', '2018-12-27 16:51:34', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1216, '127', '2018-12-27 16:51:36', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1217, '127', '2018-12-27 16:52:14', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1218, '127', '2018-12-27 16:52:29', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1219, '127', '2018-12-27 16:52:40', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1220, '127', '2018-12-27 16:52:55', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1221, '127', '2018-12-27 16:52:56', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1222, '127', '2018-12-27 16:52:58', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1223, '127', '2018-12-27 16:53:02', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1224, '127', '2018-12-27 16:54:37', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1225, '127', '2018-12-27 16:54:39', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1226, '127', '2018-12-27 16:54:44', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1227, '127', '2018-12-27 17:02:59', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1228, '127', '2018-12-27 17:03:01', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1229, '127', '2018-12-27 17:16:24', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1230, '127', '2018-12-27 17:16:25', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1231, '127', '2018-12-27 17:16:27', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1232, '127', '2018-12-27 17:18:57', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1233, '127', '2018-12-27 17:19:08', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1234, '127', '2018-12-27 17:22:40', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1235, '127', '2018-12-27 17:22:46', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1236, '127', '2018-12-27 17:23:32', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1237, '127', '2018-12-27 17:23:48', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1238, '127', '2018-12-27 17:23:51', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1239, '127', '2018-12-27 17:23:57', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1240, '127', '2018-12-27 17:24:04', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1241, '127', '2018-12-27 17:24:10', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1242, '127', '2018-12-27 17:24:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1243, '127', '2018-12-27 17:24:21', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1244, '128', '2018-12-28 11:01:12', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1245, '128', '2018-12-28 11:05:17', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1246, '128', '2018-12-28 11:05:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1247, '128', '2018-12-28 11:07:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1248, '128', '2018-12-28 11:07:58', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1249, '128', '2018-12-28 11:10:17', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1250, '128', '2018-12-28 11:11:05', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1251, '128', '2018-12-28 11:11:37', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1252, '128', '2018-12-28 11:11:38', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1253, '127', '2018-12-28 11:14:55', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1254, '126', '2018-12-28 11:14:59', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1255, '127', '2018-12-28 11:15:01', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1256, '127', '2018-12-28 11:15:23', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1257, '127', '2018-12-28 11:15:24', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1258, '127', '2018-12-28 11:15:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1259, '127', '2018-12-28 11:15:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1260, '127', '2018-12-28 11:15:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1261, '127', '2018-12-28 11:15:34', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1262, '127', '2018-12-28 11:19:58', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1263, '127', '2018-12-28 11:20:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1264, '127', '2018-12-28 11:20:01', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1265, '127', '2018-12-28 11:20:03', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1266, '127', '2018-12-28 11:20:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1267, '127', '2018-12-28 11:20:23', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1268, '127', '2018-12-28 11:20:24', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1269, '127', '2018-12-28 11:23:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1270, '127', '2018-12-28 11:23:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1271, '127', '2018-12-28 11:23:46', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1272, '127', '2018-12-28 11:23:48', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1273, '1', '2018-12-28 11:28:00', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1274, '4', '2018-12-28 11:28:02', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1275, '6', '2018-12-28 11:28:03', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1276, '4', '2018-12-28 11:28:05', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1277, '1', '2018-12-28 11:28:08', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1278, '4', '2018-12-28 11:28:08', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1279, '6', '2018-12-28 11:28:09', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1280, '1', '2018-12-28 11:28:21', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1281, '4', '2018-12-28 11:28:33', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1282, '1', '2018-12-28 11:28:39', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1283, '127', '2018-12-28 11:28:54', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1284, '127', '2018-12-28 11:29:56', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1285, '130', '2018-12-28 11:31:13', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1286, '130', '2018-12-28 11:31:17', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1287, '130', '2018-12-28 11:31:20', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1288, '130', '2018-12-28 11:31:21', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1289, '130', '2018-12-28 11:42:31', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1290, '130', '2018-12-28 11:50:08', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1291, '130', '2018-12-28 11:50:10', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1292, '130', '2018-12-28 12:00:13', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1293, '130', '2018-12-28 12:03:48', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1294, '130', '2018-12-28 12:04:28', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1295, '130', '2018-12-28 12:04:30', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1296, '130', '2018-12-28 12:08:15', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1297, '130', '2018-12-28 12:08:16', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1298, '129', '2018-12-28 12:13:22', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1299, '129', '2018-12-28 12:13:37', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1300, '129', '2018-12-28 12:14:54', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1301, '129', '2018-12-28 12:14:55', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1302, '129', '2018-12-28 12:15:15', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1303, '129', '2018-12-28 12:15:15', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1304, '129', '2018-12-28 12:15:45', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1305, '130', '2018-12-28 12:17:51', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1306, '130', '2018-12-28 12:17:54', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1307, '130', '2018-12-28 12:18:24', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1308, '130', '2018-12-28 12:18:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1309, '129', '2018-12-28 12:20:29', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1310, '129', '2018-12-28 12:20:33', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1311, '129', '2018-12-28 12:20:39', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1312, '129', '2018-12-28 12:20:42', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1313, '130', '2018-12-28 12:23:06', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1314, '130', '2018-12-28 12:27:52', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1315, '130', '2018-12-28 12:28:29', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1316, '130', '2018-12-28 12:28:55', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1317, '130', '2018-12-28 12:30:19', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1318, '79', '2018-12-28 12:30:29', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1319, '130', '2018-12-28 12:30:30', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1320, '130', '2018-12-28 12:31:28', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1321, '130', '2018-12-28 12:32:15', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1322, '130', '2018-12-28 12:32:20', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1323, '130', '2018-12-28 12:32:22', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1324, '130', '2018-12-28 12:32:28', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1325, '129', '2018-12-28 12:32:55', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1326, '130', '2018-12-28 12:33:47', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1327, '130', '2018-12-28 12:40:17', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1328, '130', '2018-12-28 12:40:26', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1329, '127', '2018-12-28 12:42:27', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1330, '127', '2018-12-28 12:42:45', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1331, '131', '2018-12-28 12:44:22', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1332, '132', '2018-12-28 12:44:47', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1333, '130', '2018-12-28 12:47:14', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1334, '132', '2018-12-28 12:55:09', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1335, '132', '2018-12-28 13:04:25', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1336, '132', '2018-12-28 13:04:36', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1337, '132', '2018-12-28 13:06:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1338, '132', '2018-12-28 13:06:46', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1339, '132', '2018-12-28 13:06:48', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1340, '132', '2018-12-28 13:06:53', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1341, '132', '2018-12-28 13:06:57', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1342, '132', '2018-12-28 13:07:00', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1343, '132', '2018-12-28 13:07:36', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1344, '132', '2018-12-28 13:07:39', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1345, '132', '2018-12-28 13:07:42', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1346, '132', '2018-12-28 13:08:08', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1347, '132', '2018-12-28 13:08:29', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1348, '132', '2018-12-28 13:08:31', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1349, '132', '2018-12-28 13:08:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1350, '132', '2018-12-28 13:10:33', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1351, '132', '2018-12-28 13:10:36', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1352, '132', '2018-12-28 13:10:38', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1353, '132', '2018-12-28 13:18:39', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1354, '127', '2018-12-28 13:19:39', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1355, '132', '2018-12-28 13:19:52', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1356, '132', '2018-12-28 13:20:03', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1357, '132', '2018-12-28 13:20:32', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1358, '132', '2018-12-28 13:20:52', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1359, '132', '2018-12-28 13:21:00', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1360, '127', '2018-12-28 13:21:10', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1361, '127', '2018-12-28 13:21:13', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1362, '127', '2018-12-28 13:21:28', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1363, '1', '2018-12-28 13:23:51', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1364, '4', '2018-12-28 13:24:02', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1365, '6', '2018-12-28 13:24:02', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1366, '4', '2018-12-28 13:24:03', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1367, '1', '2018-12-28 13:24:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1368, '6', '2018-12-28 13:24:11', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1369, '1', '2018-12-28 13:24:27', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1370, '127', '2018-12-28 13:25:10', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1371, '132', '2018-12-28 13:25:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1372, '127', '2018-12-28 13:25:40', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1373, '4', '2018-12-28 13:27:01', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1374, '1', '2018-12-28 13:27:06', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1375, '6', '2018-12-28 13:27:15', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1376, '6', '2018-12-28 13:27:16', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1377, '4', '2018-12-28 13:27:17', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1378, '6', '2018-12-28 13:27:19', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1379, '1', '2018-12-28 13:27:40', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1380, '1', '2018-12-28 13:27:49', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1381, '1', '2018-12-28 13:27:59', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1382, '4', '2018-12-28 13:27:59', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1383, '6', '2018-12-28 13:28:05', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1384, '1', '2018-12-28 13:28:45', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1385, '1', '2018-12-28 13:29:43', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1386, '1', '2018-12-28 13:30:13', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1387, '127', '2018-12-28 13:30:59', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1388, '127', '2018-12-28 13:31:06', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1389, '127', '2018-12-28 13:31:13', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1390, '1', '2018-12-28 13:31:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1391, '1', '2018-12-28 13:32:55', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1392, '1', '2018-12-28 13:33:02', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1393, '1', '2018-12-28 13:34:01', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1394, '133', '2018-12-28 13:34:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1395, '133', '2018-12-28 13:34:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1396, '133', '2018-12-28 13:34:44', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1397, '1', '2018-12-28 13:35:59', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1398, '1', '2018-12-28 13:36:00', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1399, '1', '2018-12-28 13:36:19', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1400, '1', '2018-12-28 13:37:22', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1401, '133', '2018-12-28 13:38:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1402, '133', '2018-12-28 13:38:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1403, '133', '2018-12-28 13:38:39', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1404, '133', '2018-12-28 13:38:41', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1405, '133', '2018-12-28 13:41:10', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1406, '133', '2018-12-28 13:42:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1407, '133', '2018-12-28 13:44:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1408, '132', '2018-12-28 13:52:42', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1409, '133', '2018-12-28 13:55:27', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1410, '131', '2018-12-28 13:56:23', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1411, '133', '2018-12-28 14:00:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1412, '133', '2018-12-28 14:00:15', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1413, '133', '2018-12-28 14:00:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1414, '133', '2018-12-28 14:08:49', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1415, '133', '2018-12-28 14:08:55', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1416, '133', '2018-12-28 14:09:01', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1417, '133', '2018-12-28 14:09:51', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1418, '133', '2018-12-28 14:10:02', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1419, '133', '2018-12-28 14:10:12', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1420, '133', '2018-12-28 14:14:59', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1421, '133', '2018-12-28 14:15:00', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1422, '133', '2018-12-28 14:18:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1423, '131', '2018-12-28 14:27:32', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1424, '133', '2018-12-28 14:29:53', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1425, '133', '2018-12-28 14:30:01', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1426, '133', '2018-12-28 14:30:05', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1427, '133', '2018-12-28 14:30:12', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1428, '127', '2018-12-28 14:34:06', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1429, '127', '2018-12-28 14:35:15', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1430, '132', '2018-12-28 14:36:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1431, '132', '2018-12-28 14:36:43', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1432, '132', '2018-12-28 14:36:47', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1433, '132', '2018-12-28 14:36:52', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1434, '132', '2018-12-28 14:37:47', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1435, '131', '2018-12-28 14:38:19', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1436, '131', '2018-12-28 14:38:25', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1437, '131', '2018-12-28 14:38:32', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1438, '131', '2018-12-28 14:38:37', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1439, '131', '2018-12-28 14:38:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1440, '131', '2018-12-28 14:38:43', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1441, '131', '2018-12-28 14:38:52', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1442, '131', '2018-12-28 14:39:42', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1443, '131', '2018-12-28 14:39:44', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1444, '134', '2018-12-28 14:42:44', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1445, '134', '2018-12-28 14:42:49', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1446, '134', '2018-12-28 14:42:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1447, '134', '2018-12-28 14:42:56', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1448, '134', '2018-12-28 14:43:01', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1449, '134', '2018-12-28 14:43:07', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1450, '134', '2018-12-28 14:43:07', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1451, '134', '2018-12-28 14:43:49', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1452, '134', '2018-12-28 14:43:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1453, '134', '2018-12-28 14:43:53', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1454, '134', '2018-12-28 14:43:57', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1455, '134', '2018-12-28 14:43:58', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1456, '134', '2018-12-28 14:45:08', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1457, '134', '2018-12-28 14:45:17', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1458, '134', '2018-12-28 14:45:21', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1459, '134', '2018-12-28 14:45:50', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1460, '134', '2018-12-28 14:45:56', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1461, '134', '2018-12-28 14:46:02', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1462, '134', '2018-12-28 14:46:06', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1463, '134', '2018-12-28 14:46:22', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1464, '134', '2018-12-28 14:46:24', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1465, '134', '2018-12-28 14:46:30', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1466, '134', '2018-12-28 14:46:40', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1467, '134', '2018-12-28 14:46:41', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1468, '134', '2018-12-28 14:46:46', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1469, '134', '2018-12-28 14:46:47', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1470, '134', '2018-12-28 14:47:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1471, '134', '2018-12-28 14:47:52', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1472, '134', '2018-12-28 14:48:51', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1473, '134', '2018-12-28 14:50:01', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1474, '134', '2018-12-28 14:50:05', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1475, '134', '2018-12-28 14:51:03', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1476, '134', '2018-12-28 14:51:10', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1477, '134', '2018-12-28 14:55:16', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1478, '134', '2018-12-28 14:58:57', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1479, '134', '2018-12-28 15:04:26', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1480, '134', '2018-12-28 15:04:28', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1481, '134', '2018-12-28 15:07:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1482, '134', '2018-12-28 15:07:36', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1483, '135', '2018-12-28 15:14:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1484, '135', '2018-12-28 15:15:04', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1485, '135', '2018-12-28 15:15:22', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1486, '135', '2018-12-28 15:15:23', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1487, '261', '2018-12-28 15:15:38', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1488, '135', '2018-12-28 15:15:39', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1489, '135', '2018-12-28 15:15:58', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1490, '135', '2018-12-28 15:16:43', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1491, '135', '2018-12-28 15:16:44', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1492, '135', '2018-12-28 15:17:04', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1493, '135', '2018-12-28 15:17:07', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1494, '134', '2018-12-28 15:19:25', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1495, '134', '2018-12-28 15:20:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1496, '136', '2018-12-28 15:20:31', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1497, '135', '2018-12-28 15:20:45', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1498, '137', '2018-12-28 15:21:35', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1499, '137', '2018-12-28 15:21:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1500, '137', '2018-12-28 15:22:29', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1501, '138', '2018-12-28 15:22:39', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1502, '138', '2018-12-28 15:22:43', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1503, '137', '2018-12-28 15:23:03', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1504, '137', '2018-12-28 15:23:07', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1505, '138', '2018-12-28 15:23:11', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1506, '138', '2018-12-28 15:23:14', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1507, '138', '2018-12-28 15:23:16', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1508, '138', '2018-12-28 15:23:18', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1509, '138', '2018-12-28 15:23:33', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1510, '138', '2018-12-28 15:23:34', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1511, '137', '2018-12-28 15:23:45', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1512, '138', '2018-12-28 15:23:47', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1513, '138', '2018-12-28 15:24:21', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1514, '137', '2018-12-28 15:24:24', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1515, '137', '2018-12-28 15:24:27', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1516, '138', '2018-12-28 15:24:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1517, '138', '2018-12-28 15:24:33', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1518, '138', '2018-12-28 15:25:02', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1519, '138', '2018-12-28 15:25:23', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1520, '138', '2018-12-28 15:25:30', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1521, '138', '2018-12-28 15:26:54', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1522, '138', '2018-12-28 15:28:57', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1523, '138', '2018-12-28 15:29:28', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1524, '1', '2018-12-28 15:33:37', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1525, '139', '2018-12-28 15:45:09', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1526, '139', '2018-12-28 15:45:37', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1527, '139', '2018-12-28 15:45:45', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1528, '139', '2018-12-28 15:46:10', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1529, '139', '2018-12-28 15:46:19', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1530, '139', '2018-12-28 15:48:08', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1531, '139', '2018-12-28 15:48:10', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1532, '139', '2018-12-28 15:48:36', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1533, '139', '2018-12-28 15:48:37', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1534, '139', '2018-12-28 15:50:29', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1535, '139', '2018-12-28 15:50:30', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1536, '139', '2018-12-28 15:50:44', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1537, '139', '2018-12-28 15:53:52', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1538, '139', '2018-12-28 15:54:48', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1539, '139', '2018-12-28 15:55:16', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1540, '139', '2018-12-28 15:59:20', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1541, '139', '2018-12-28 15:59:58', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1542, '139', '2018-12-28 16:00:31', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1543, '140', '2018-12-28 16:00:49', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1544, '139', '2018-12-28 16:00:51', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1545, '140', '2018-12-28 16:00:56', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1546, '140', '2018-12-28 16:01:18', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1547, '140', '2018-12-28 16:01:19', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1548, '140', '2018-12-28 16:01:25', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1549, '140', '2018-12-28 16:01:31', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1550, '140', '2018-12-28 16:02:46', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1551, '139', '2018-12-28 16:02:49', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1552, '140', '2018-12-28 16:02:57', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1553, '139', '2018-12-28 16:03:10', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1554, '262', '2018-12-28 16:03:24', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1555, '139', '2018-12-28 16:03:24', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1556, '139', '2018-12-28 16:03:30', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1557, '139', '2018-12-28 16:03:57', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1558, '139', '2018-12-28 16:04:02', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1559, '139', '2018-12-28 16:04:17', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1560, '140', '2018-12-28 16:04:21', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1561, '139', '2018-12-28 16:04:24', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1562, '140', '2018-12-28 16:04:42', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1563, '140', '2018-12-28 16:04:52', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1564, '140', '2018-12-28 16:04:55', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1565, '140', '2018-12-28 16:05:02', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1566, '140', '2018-12-28 16:05:07', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1567, '140', '2018-12-28 16:05:08', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1568, '138', '2018-12-28 16:05:09', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1569, '139', '2018-12-28 16:05:16', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1570, '140', '2018-12-28 16:05:17', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1571, '140', '2018-12-28 16:05:24', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1572, '140', '2018-12-28 16:05:44', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1573, '139', '2018-12-28 16:05:46', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1574, '140', '2018-12-28 16:06:20', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1575, '140', '2018-12-28 16:06:21', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1576, '139', '2018-12-28 16:06:24', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1577, '139', '2018-12-28 16:06:25', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1578, '139', '2018-12-28 16:06:34', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1579, '139', '2018-12-28 16:06:37', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1580, '139', '2018-12-28 16:06:51', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1581, '139', '2018-12-28 16:07:12', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1582, '140', '2018-12-28 16:07:17', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1583, '139', '2018-12-28 16:07:49', '32', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1584, '140', '2018-12-28 16:08:51', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1585, '140', '2018-12-28 16:09:03', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1586, '139', '2018-12-28 16:09:05', '10', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1587, '140', '2018-12-28 16:16:25', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1588, '140', '2018-12-28 16:16:26', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1589, '140', '2018-12-28 16:16:33', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1590, '140', '2018-12-28 16:17:44', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1591, '140', '2018-12-28 16:22:40', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1592, '140', '2018-12-28 16:22:44', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1593, '140', '2018-12-28 16:23:29', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1594, '140', '2018-12-28 16:23:32', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1595, '140', '2018-12-28 16:23:37', '16', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1596, '140', '2018-12-28 16:24:53', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1597, '140', '2018-12-28 16:25:42', '28', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1598, '140', '2018-12-28 16:28:56', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1599, '140', '2018-12-28 16:29:00', '29', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1600, '141', '2018-12-28 16:30:24', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1601, '141', '2018-12-28 16:37:18', '27', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1602, '142', '2018-12-28 16:41:25', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1603, '142', '2018-12-28 16:41:28', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1604, '142', '2018-12-28 16:51:23', '31', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1605, '142', '2018-12-28 16:52:44', '30', NULL, 0);
INSERT INTO `pmo_operation` VALUES (1606, '142', '2018-12-28 16:58:31', '31', NULL, 0);

-- ----------------------------
-- Table structure for pmo_process_plan
-- ----------------------------
DROP TABLE IF EXISTS `pmo_process_plan`;
CREATE TABLE `pmo_process_plan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `meet_id` int(11) NULL DEFAULT NULL COMMENT '会场id',
  `training_id` int(11) NULL DEFAULT NULL COMMENT '培训成本id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '项目id会场id培训成本id' ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for pmo_progam
-- ----------------------------
DROP TABLE IF EXISTS `pmo_progam`;
CREATE TABLE `pmo_progam`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_program_manage_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '单行文字',
  `add_program_manage_sale_id` int(11) NULL DEFAULT NULL COMMENT '销售负责人id',
  `contract_id` int(11) NULL DEFAULT NULL COMMENT '合同表id',
  `contacts_id` int(11) NULL DEFAULT NULL COMMENT '联系人表',
  `fo_sale` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属销售',
  `time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '默认为0替换为1删除为2',
  `add_program_manage_contract_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合同编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '某个关联表 ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_progam
-- ----------------------------
INSERT INTO `pmo_progam` VALUES (20, '集成项目经理', NULL, NULL, NULL, NULL, NULL, 0, '20100102');
INSERT INTO `pmo_progam` VALUES (21, '软考', NULL, NULL, NULL, NULL, NULL, 0, '222');
INSERT INTO `pmo_progam` VALUES (23, '云南移动', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (22, 'NPDP', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (24, '广东移动', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (25, '咪咕', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (26, '民航信息中心', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (27, '建行', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (28, '联想', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (29, '云南移动', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (30, '众合伟奇', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (31, '中国联通', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (32, '慧萌信安', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (33, '中原油田', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (34, '中石油天然气规划院', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (35, '中移全通', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (36, '首信', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (37, '南航', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (38, '魔门塔', NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO `pmo_progam` VALUES (39, 'PMP', NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- ----------------------------
-- Table structure for pmo_project_body
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_body`;
CREATE TABLE `pmo_project_body`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '项目名称',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `project_customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '客户名称',
  `project_days` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '培训天数',
  `project_date` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '培训日期',
  `project_start_date` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '开始时间',
  `project_end_date` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '结束时间',
  `project_training_numbers` int(11) NULL DEFAULT NULL COMMENT '培训人数',
  `project_training_ares` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '培训地点',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '0为可修改1为已修改2为删除',
  `project_income` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '收入',
  `project_tax_rate` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '税率',
  `institutional_consulting_fees` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '机构咨询费',
  `personal_consulting_fees` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '个人咨询费',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 100 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '审批项目实际数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_body
-- ----------------------------
INSERT INTO `pmo_project_body` VALUES (99, '软考靠前培训班', 140, '软考学员', '4', NULL, '2018-12-28', '2018-12-31', 20, '1', 0, '60000', '1800', '0', '0');
INSERT INTO `pmo_project_body` VALUES (97, '', 138, '', '', NULL, '', '', 0, '', 0, '', '', '', '');
INSERT INTO `pmo_project_body` VALUES (98, '需求分析', 139, '中国联合网络通信有限公司北京市分公司', '3', NULL, '2018-12-29', '2019-01-01', 20, '13', 0, '60000', '3600', '0', '0');
INSERT INTO `pmo_project_body` VALUES (95, '', 136, '', '', NULL, '', '', 0, '', 0, '', '', '', '');
INSERT INTO `pmo_project_body` VALUES (96, '321321', 137, '', '', NULL, '', '', 0, '', 0, '', '', '', '');
INSERT INTO `pmo_project_body` VALUES (94, 'uml', 135, '云南移动', '2', NULL, '2018-12-29', '2019-01-01', 10, '11', 0, '60000', '360', '0', '0');
INSERT INTO `pmo_project_body` VALUES (93, '课程测试1', 134, '', '', NULL, '', '', 0, '', 0, '1000000000', '28', '20', '30');

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
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '联系人，联系人电话，联系人职务' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_project_fee
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_fee`;
CREATE TABLE `pmo_project_fee`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lecturer_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '讲师费',
  `travel_incitytraffic` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '市内交通费',
  `travel_longtraffic` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '长途交通费',
  `travel_hotel` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '住宿费',
  `implement_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '实施安排费',
  `venue_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '会场费',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '项目费用静态数据' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pmo_project_header
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_header`;
CREATE TABLE `pmo_project_header`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `progam_id` int(11) NULL DEFAULT NULL COMMENT '所属项目集id',
  `project_leader_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目负责人',
  `staff_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '实施负责人(员工表)',
  `template_id` int(11) NULL DEFAULT NULL COMMENT '项目模板id',
  `customer_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司名称',
  `budget_id` int(11) NULL DEFAULT NULL COMMENT '预算表id',
  `time` date NULL DEFAULT NULL COMMENT '添加时间',
  `state` tinyint(2) NOT NULL DEFAULT 0 COMMENT '默认为0修改为1删除为2',
  `add_user_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '添加者id',
  `unicode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 143 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '项目总表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_header
-- ----------------------------
INSERT INTO `pmo_project_header` VALUES (142, NULL, NULL, NULL, 3, NULL, NULL, '2018-12-28', 0, '', '201812008');
INSERT INTO `pmo_project_header` VALUES (141, NULL, NULL, NULL, 3, NULL, NULL, '2018-12-28', 0, '27', '201812007');
INSERT INTO `pmo_project_header` VALUES (140, 21, '21', '18', 2, NULL, NULL, '2018-12-28', 0, '16', '201812006');
INSERT INTO `pmo_project_header` VALUES (139, 31, '31', '31', 1, NULL, NULL, '2018-12-28', 0, '32', '201812005');
INSERT INTO `pmo_project_header` VALUES (138, 0, '', '', 2, NULL, NULL, '2018-12-28', 0, '30', '201812004');
INSERT INTO `pmo_project_header` VALUES (137, 0, '', '', 3, NULL, NULL, '2018-12-28', 0, '30', '201812003');
INSERT INTO `pmo_project_header` VALUES (136, 0, '', '', 2, NULL, NULL, '2018-12-28', 0, '30', '201812002');
INSERT INTO `pmo_project_header` VALUES (135, 23, '32', '32', 1, NULL, NULL, '2018-12-28', 0, '28', '201812001');
INSERT INTO `pmo_project_header` VALUES (134, 0, '', '1', 2, NULL, NULL, '2018-12-28', 0, '27', '201812000');

-- ----------------------------
-- Table structure for pmo_project_static
-- ----------------------------
DROP TABLE IF EXISTS `pmo_project_static`;
CREATE TABLE `pmo_project_static`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '项目id',
  `data` text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '项目json',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '项目创建人的id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 137 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_static
-- ----------------------------
INSERT INTO `pmo_project_static` VALUES (134, 140, '{\"id\":\"140\",\"project_name\":\"软考靠前培训班\",\"project_gather_id\":\"21\",\"project_person_in_charge_id\":\"18\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"1\",\"project_customer_name\":\"软考学员\",\"project_days\":\"4\",\"project_start_date\":\"2018-12-28\",\"project_end_date\":\"2018-12-31\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"温越\",\"project_leader_id\":\"21\",\"project_person_in_charge_name\":\"李旋\",\"project_gather_name\":\"软考\",\"project_project_template_name\":\"公共培训部\",\"province\":0,\"city\":200,\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"1800\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812006\",\"project_training_ares_name\":\"北京--北京--中软大厦\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\"},\"project_date\":{\"start\":\"2018-12-28\",\"end\":\"2018-12-31\"},\"labor_cost\":1800,\"implementation_cost\":7200,\"conference_cost\":7200,\"stay\":0,\"meal\":680,\"travel_cost\":880,\"lecturer\":[{\"id\":\"263\",\"teacher_lecture_days\":\"4\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"1800\",\"teacher_income_tax\":\"0\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"lecturers\":[{\"id\":\"263\",\"teacher_lecture_days\":\"4\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"1800\",\"teacher_income_tax\":\"0\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"implement\":null,\"venue\":[{\"id\":\"82\",\"room_number\":null,\"unit_price\":\"1800\",\"days\":\"4\",\"total_price\":\"7200\",\"meetingplace_name\":null,\"meetingplace_address\":\"中软大厦第一会议室\",\"time\":\"2018-12-28 16:05:07\",\"state\":\"0\",\"parent_id\":\"140\"}],\"consulting_cost\":0,\"costing\":11680,\"expected_income\":\"60000\",\"project_profit\":48320,\"gross_interest_rate\":\"80.53%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 16);
INSERT INTO `pmo_project_static` VALUES (135, 141, '{\"id\":\"141\",\"project_name\":null,\"project_gather_id\":null,\"project_person_in_charge_id\":null,\"project_project_template_id\":\"3\",\"project_training_ares_id\":null,\"project_customer_name\":null,\"project_days\":null,\"project_start_date\":null,\"project_end_date\":null,\"project_training_numbers\":null,\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"技术资源部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":null,\"project_tax_rate\":null,\"institutional_consulting_fees\":null,\"personal_consulting_fees\":null,\"unicode\":\"201812007\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":null,\"end\":null},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 27);
INSERT INTO `pmo_project_static` VALUES (136, 142, '{\"id\":\"142\",\"project_name\":null,\"project_gather_id\":null,\"project_person_in_charge_id\":null,\"project_project_template_id\":\"3\",\"project_training_ares_id\":null,\"project_customer_name\":null,\"project_days\":null,\"project_start_date\":null,\"project_end_date\":null,\"project_training_numbers\":null,\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"技术资源部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":null,\"project_tax_rate\":null,\"institutional_consulting_fees\":null,\"personal_consulting_fees\":null,\"unicode\":\"201812008\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":null,\"end\":null},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[],\"state\":\"0\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 0);
INSERT INTO `pmo_project_static` VALUES (133, 139, '{\"id\":\"139\",\"project_name\":\"需求分析\",\"project_gather_id\":\"31\",\"project_person_in_charge_id\":\"31\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"13\",\"project_customer_name\":\"中国联合网络通信有限公司北京市分公司\",\"project_days\":\"3\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"20\",\"project_leader_name\":\"寇艳艳\",\"project_leader_id\":\"31\",\"project_person_in_charge_name\":\"寇艳艳\",\"project_gather_name\":\"中国联通\",\"project_project_template_name\":\"行业培训部\",\"province\":555,\"city\":300,\"address\":\"金融界121号F301\",\"project_income\":\"60000\",\"project_tax_rate\":\"3600\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812005\",\"project_training_ares_name\":\"北京--北京--金融界121号F301\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"金融界121号F301\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15000,\"implementation_cost\":600,\"conference_cost\":0,\"stay\":2000,\"meal\":170,\"travel_cost\":3025,\"lecturer\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"lecturers\":[{\"id\":\"262\",\"teacher_lecture_days\":\"3\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"1\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"柳芳\"}],\"implement\":{\"id\":\"97\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"\",\"tea_break\":\"\",\"stationery\":\"\",\"hospitality\":\"\",\"postage\":\"200\",\"parent_id\":\"139\",\"state\":\"0\",\"time\":\"2018-12-28 15:50:29\",\"material_cost\":\"400\",\"equipment_cost\":\"\"},\"venue\":[],\"consulting_cost\":0,\"costing\":22225,\"expected_income\":\"60000\",\"project_profit\":37775,\"gross_interest_rate\":\"62.96%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:05:16\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"2\"},\"finalAccounts\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:09:06\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"2\",\"admin_id\":\"10\"}],\"state\":\"2\"}}}', 32);
INSERT INTO `pmo_project_static` VALUES (130, 136, '{\"id\":\"136\",\"project_name\":\"\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"公共培训部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":\"\",\"project_tax_rate\":\"\",\"institutional_consulting_fees\":\"\",\"personal_consulting_fees\":\"\",\"unicode\":\"201812002\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":\"\",\"end\":\"\"},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[],\"state\":\"0\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 30);
INSERT INTO `pmo_project_static` VALUES (131, 137, '{\"id\":\"137\",\"project_name\":\"321321\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"\",\"project_project_template_id\":\"3\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"技术资源部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":\"\",\"project_tax_rate\":\"\",\"institutional_consulting_fees\":\"\",\"personal_consulting_fees\":\"\",\"unicode\":\"201812003\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":\"\",\"end\":\"\"},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[],\"state\":\"0\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 30);
INSERT INTO `pmo_project_static` VALUES (132, 138, '{\"id\":\"138\",\"project_name\":\"\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":null,\"project_gather_name\":null,\"project_project_template_name\":\"公共培训部\",\"province\":0,\"city\":0,\"address\":null,\"project_income\":\"\",\"project_tax_rate\":\"\",\"institutional_consulting_fees\":\"\",\"personal_consulting_fees\":\"\",\"unicode\":\"201812004\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":\"\",\"end\":\"\"},\"labor_cost\":0,\"implementation_cost\":0,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[],\"lecturers\":[],\"implement\":null,\"venue\":[],\"consulting_cost\":0,\"costing\":0,\"expected_income\":0,\"project_profit\":0,\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":\"2018-12-28 16:05:09\",\"pass\":\"1\",\"note\":\"\",\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"2\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 30);
INSERT INTO `pmo_project_static` VALUES (128, 134, '{\"id\":\"134\",\"project_name\":\"课程测试1\",\"project_gather_id\":\"0\",\"project_person_in_charge_id\":\"1\",\"project_project_template_id\":\"2\",\"project_training_ares_id\":\"\",\"project_customer_name\":\"\",\"project_days\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"project_training_numbers\":\"0\",\"project_leader_name\":null,\"project_leader_id\":null,\"project_person_in_charge_name\":\"柳芳\",\"project_gather_name\":null,\"project_project_template_name\":\"公共培训部\",\"province\":1,\"city\":2,\"address\":null,\"project_income\":\"1000000000\",\"project_tax_rate\":\"28\",\"institutional_consulting_fees\":\"20\",\"personal_consulting_fees\":\"30\",\"unicode\":\"201812000\",\"project_traing_ares\":{\"province\":null,\"city\":null,\"address\":null},\"project_date\":{\"start\":\"\",\"end\":\"\"},\"labor_cost\":33000,\"implementation_cost\":198,\"conference_cost\":30,\"stay\":3,\"meal\":4,\"travel_cost\":10,\"lecturer\":[{\"id\":\"259\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"0\",\"teacher_lecture_fee\":\"3000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"0\",\"teacher_duty_name\":null,\"teacher_name_name\":null},{\"id\":\"260\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"0\",\"teacher_lecture_fee\":\"30000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"0\",\"teacher_duty_name\":null,\"teacher_name_name\":null}],\"lecturers\":[{\"id\":\"259\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"0\",\"teacher_lecture_fee\":\"3000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"0\",\"teacher_duty_name\":null,\"teacher_name_name\":null},{\"id\":\"260\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"0\",\"teacher_lecture_fee\":\"30000\",\"teacher_income_tax\":\"\",\"teacher_name_id\":\"0\",\"teacher_duty_name\":null,\"teacher_name_name\":null}],\"implement\":{\"id\":\"95\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"23\",\"tea_break\":\"24\",\"stationery\":\"25\",\"hospitality\":\"26\",\"postage\":\"27\",\"parent_id\":\"134\",\"state\":\"0\",\"time\":\"2018-12-28 14:47:52\",\"material_cost\":\"21\",\"equipment_cost\":\"22\"},\"venue\":[{\"id\":\"81\",\"room_number\":null,\"unit_price\":\"\",\"days\":\"\",\"total_price\":\"17\",\"meetingplace_name\":null,\"meetingplace_address\":\"\",\"time\":\"2018-12-28 14:46:46\",\"state\":\"0\",\"parent_id\":\"134\"},{\"id\":\"80\",\"room_number\":null,\"unit_price\":\"\",\"days\":\"\",\"total_price\":\"13\",\"meetingplace_name\":null,\"meetingplace_address\":\"\",\"time\":\"2018-12-28 14:46:40\",\"state\":\"0\",\"parent_id\":\"134\"}],\"consulting_cost\":50,\"costing\":33286,\"expected_income\":\"1000000000\",\"project_profit\":999966714,\"gross_interest_rate\":\"100%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 27);
INSERT INTO `pmo_project_static` VALUES (129, 135, '{\"id\":\"135\",\"project_name\":\"uml\",\"project_gather_id\":\"23\",\"project_person_in_charge_id\":\"32\",\"project_project_template_id\":\"1\",\"project_training_ares_id\":\"11\",\"project_customer_name\":\"云南移动\",\"project_days\":\"2\",\"project_start_date\":\"2018-12-29\",\"project_end_date\":\"2019-01-01\",\"project_training_numbers\":\"10\",\"project_leader_name\":\"张剑\",\"project_leader_id\":\"32\",\"project_person_in_charge_name\":\"张剑\",\"project_gather_name\":\"云南移动\",\"project_project_template_name\":\"行业培训部\",\"province\":0,\"city\":0,\"address\":\"中软大厦\",\"project_income\":\"60000\",\"project_tax_rate\":\"360\",\"institutional_consulting_fees\":\"0\",\"personal_consulting_fees\":\"0\",\"unicode\":\"201812001\",\"project_training_ares_name\":\"北京--北京--中软大厦\",\"project_traing_ares\":{\"province\":\"北京\",\"city\":\"北京\",\"address\":\"中软大厦\"},\"project_date\":{\"start\":\"2018-12-29\",\"end\":\"2019-01-01\"},\"labor_cost\":15300,\"implementation_cost\":1360,\"conference_cost\":0,\"stay\":0,\"meal\":0,\"travel_cost\":0,\"lecturer\":[{\"id\":\"261\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"300\",\"teacher_name_id\":\"17\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"杨云\"}],\"lecturers\":[{\"id\":\"261\",\"teacher_lecture_days\":\"5\",\"teacher_duty_id\":\"1\",\"teacher_lecture_fee\":\"15000\",\"teacher_income_tax\":\"300\",\"teacher_name_id\":\"17\",\"teacher_duty_name\":\"主讲\",\"teacher_name_name\":\"杨云\"}],\"implement\":{\"id\":\"96\",\"venue_fee\":null,\"material_and_equipment_cost\":null,\"examination_fee\":\"0\",\"tea_break\":\"500\",\"stationery\":\"500\",\"hospitality\":\"40\",\"postage\":\"20\",\"parent_id\":\"135\",\"state\":\"0\",\"time\":\"2018-12-28 15:16:43\",\"material_cost\":\"300\",\"equipment_cost\":\"0\"},\"venue\":[],\"consulting_cost\":0,\"costing\":17020,\"expected_income\":\"60000\",\"project_profit\":42980,\"gross_interest_rate\":\"71.63%\",\"examine\":{\"budget\":{\"step\":[{\"admin_user\":\"段美静\",\"time\":null,\"pass\":\"0\",\"note\":null,\"examine_type\":\"1\",\"admin_id\":\"10\"}],\"state\":\"1\"},\"finalAccounts\":{\"step\":[],\"state\":\"0\"}}}', 28);

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
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '行业培训部，公共培训部，技术资源部' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_project_template
-- ----------------------------
INSERT INTO `pmo_project_template` VALUES (1, '内训', 1, NULL);
INSERT INTO `pmo_project_template` VALUES (2, '公共培训', 0, NULL);
INSERT INTO `pmo_project_template` VALUES (3, '其他', 0, NULL);

-- ----------------------------
-- Table structure for pmo_role
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role`;
CREATE TABLE `pmo_role`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '怎样的角色',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '0为启用1为弃用',
  `notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '这个角色的注释',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '默认，职务，岗位' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_role
-- ----------------------------
INSERT INTO `pmo_role` VALUES (8, '默认', 0, NULL);
INSERT INTO `pmo_role` VALUES (6, 'PMO', 0, NULL);
INSERT INTO `pmo_role` VALUES (9, '系统管理员', 0, NULL);

-- ----------------------------
-- Table structure for pmo_role_in_route
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role_in_route`;
CREATE TABLE `pmo_role_in_route`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `route_id` int(255) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '0为可用1为删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 304 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '角色路由分配表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_role_in_route
-- ----------------------------
INSERT INTO `pmo_role_in_route` VALUES (206, 9, 85, 0);
INSERT INTO `pmo_role_in_route` VALUES (205, 9, 84, 0);
INSERT INTO `pmo_role_in_route` VALUES (204, 9, 83, 0);
INSERT INTO `pmo_role_in_route` VALUES (203, 9, 82, 0);
INSERT INTO `pmo_role_in_route` VALUES (202, 9, 81, 0);
INSERT INTO `pmo_role_in_route` VALUES (201, 9, 80, 0);
INSERT INTO `pmo_role_in_route` VALUES (200, 9, 79, 0);
INSERT INTO `pmo_role_in_route` VALUES (199, 9, 78, 0);
INSERT INTO `pmo_role_in_route` VALUES (198, 9, 77, 0);
INSERT INTO `pmo_role_in_route` VALUES (197, 9, 76, 0);
INSERT INTO `pmo_role_in_route` VALUES (196, 9, 75, 0);
INSERT INTO `pmo_role_in_route` VALUES (195, 9, 74, 0);
INSERT INTO `pmo_role_in_route` VALUES (194, 9, 73, 0);
INSERT INTO `pmo_role_in_route` VALUES (193, 9, 72, 0);
INSERT INTO `pmo_role_in_route` VALUES (192, 9, 71, 0);
INSERT INTO `pmo_role_in_route` VALUES (191, 9, 70, 0);
INSERT INTO `pmo_role_in_route` VALUES (190, 9, 69, 0);
INSERT INTO `pmo_role_in_route` VALUES (189, 9, 68, 0);
INSERT INTO `pmo_role_in_route` VALUES (188, 9, 67, 0);
INSERT INTO `pmo_role_in_route` VALUES (187, 9, 66, 0);
INSERT INTO `pmo_role_in_route` VALUES (186, 9, 65, 0);
INSERT INTO `pmo_role_in_route` VALUES (185, 9, 64, 0);
INSERT INTO `pmo_role_in_route` VALUES (184, 9, 63, 0);
INSERT INTO `pmo_role_in_route` VALUES (183, 9, 62, 0);
INSERT INTO `pmo_role_in_route` VALUES (182, 9, 61, 0);
INSERT INTO `pmo_role_in_route` VALUES (181, 9, 60, 0);
INSERT INTO `pmo_role_in_route` VALUES (180, 9, 59, 0);
INSERT INTO `pmo_role_in_route` VALUES (179, 9, 58, 0);
INSERT INTO `pmo_role_in_route` VALUES (178, 9, 57, 0);
INSERT INTO `pmo_role_in_route` VALUES (177, 9, 56, 0);
INSERT INTO `pmo_role_in_route` VALUES (176, 9, 55, 0);
INSERT INTO `pmo_role_in_route` VALUES (175, 9, 54, 0);
INSERT INTO `pmo_role_in_route` VALUES (174, 9, 53, 0);
INSERT INTO `pmo_role_in_route` VALUES (173, 9, 52, 0);
INSERT INTO `pmo_role_in_route` VALUES (172, 9, 51, 0);
INSERT INTO `pmo_role_in_route` VALUES (171, 9, 50, 0);
INSERT INTO `pmo_role_in_route` VALUES (170, 9, 49, 0);
INSERT INTO `pmo_role_in_route` VALUES (169, 9, 48, 0);
INSERT INTO `pmo_role_in_route` VALUES (168, 9, 47, 0);
INSERT INTO `pmo_role_in_route` VALUES (167, 9, 46, 0);
INSERT INTO `pmo_role_in_route` VALUES (166, 9, 45, 0);
INSERT INTO `pmo_role_in_route` VALUES (165, 9, 44, 0);
INSERT INTO `pmo_role_in_route` VALUES (164, 9, 43, 0);
INSERT INTO `pmo_role_in_route` VALUES (163, 9, 42, 0);
INSERT INTO `pmo_role_in_route` VALUES (162, 9, 41, 0);
INSERT INTO `pmo_role_in_route` VALUES (161, 9, 40, 0);
INSERT INTO `pmo_role_in_route` VALUES (160, 9, 39, 0);
INSERT INTO `pmo_role_in_route` VALUES (159, 9, 38, 0);
INSERT INTO `pmo_role_in_route` VALUES (158, 9, 37, 0);
INSERT INTO `pmo_role_in_route` VALUES (157, 9, 36, 0);
INSERT INTO `pmo_role_in_route` VALUES (156, 9, 35, 0);
INSERT INTO `pmo_role_in_route` VALUES (155, 9, 34, 0);
INSERT INTO `pmo_role_in_route` VALUES (154, 9, 33, 0);
INSERT INTO `pmo_role_in_route` VALUES (153, 9, 32, 0);
INSERT INTO `pmo_role_in_route` VALUES (152, 9, 31, 0);
INSERT INTO `pmo_role_in_route` VALUES (151, 9, 30, 0);
INSERT INTO `pmo_role_in_route` VALUES (150, 9, 29, 0);
INSERT INTO `pmo_role_in_route` VALUES (149, 9, 28, 0);
INSERT INTO `pmo_role_in_route` VALUES (148, 9, 27, 0);
INSERT INTO `pmo_role_in_route` VALUES (147, 9, 26, 0);
INSERT INTO `pmo_role_in_route` VALUES (146, 9, 25, 0);
INSERT INTO `pmo_role_in_route` VALUES (145, 9, 24, 0);
INSERT INTO `pmo_role_in_route` VALUES (144, 9, 23, 0);
INSERT INTO `pmo_role_in_route` VALUES (143, 9, 22, 0);
INSERT INTO `pmo_role_in_route` VALUES (142, 9, 21, 0);
INSERT INTO `pmo_role_in_route` VALUES (141, 9, 20, 0);
INSERT INTO `pmo_role_in_route` VALUES (140, 9, 19, 0);
INSERT INTO `pmo_role_in_route` VALUES (139, 9, 18, 0);
INSERT INTO `pmo_role_in_route` VALUES (138, 9, 17, 0);
INSERT INTO `pmo_role_in_route` VALUES (137, 9, 16, 0);
INSERT INTO `pmo_role_in_route` VALUES (136, 9, 15, 0);
INSERT INTO `pmo_role_in_route` VALUES (135, 9, 14, 0);
INSERT INTO `pmo_role_in_route` VALUES (134, 9, 13, 0);
INSERT INTO `pmo_role_in_route` VALUES (133, 9, 12, 0);
INSERT INTO `pmo_role_in_route` VALUES (132, 9, 11, 0);
INSERT INTO `pmo_role_in_route` VALUES (131, 9, 10, 0);
INSERT INTO `pmo_role_in_route` VALUES (130, 9, 9, 0);
INSERT INTO `pmo_role_in_route` VALUES (129, 9, 8, 0);
INSERT INTO `pmo_role_in_route` VALUES (128, 9, 7, 0);
INSERT INTO `pmo_role_in_route` VALUES (127, 9, 6, 0);
INSERT INTO `pmo_role_in_route` VALUES (126, 9, 5, 0);
INSERT INTO `pmo_role_in_route` VALUES (125, 9, 4, 0);
INSERT INTO `pmo_role_in_route` VALUES (124, 9, 3, 0);
INSERT INTO `pmo_role_in_route` VALUES (123, 9, 2, 0);
INSERT INTO `pmo_role_in_route` VALUES (122, 9, 1, 0);
INSERT INTO `pmo_role_in_route` VALUES (303, 8, 8, 0);
INSERT INTO `pmo_role_in_route` VALUES (302, 8, 2, 0);
INSERT INTO `pmo_role_in_route` VALUES (301, 8, 1, 0);

-- ----------------------------
-- Table structure for pmo_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role_menu`;
CREATE TABLE `pmo_role_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色id',
  `fmenu_id` int(11) NULL DEFAULT NULL COMMENT '项目属性id',
  `menu_id` int(11) NULL DEFAULT NULL COMMENT '项目详细id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '角色左侧栏分配表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_role_menu
-- ----------------------------
INSERT INTO `pmo_role_menu` VALUES (1, 8, 1, 3);
INSERT INTO `pmo_role_menu` VALUES (2, 8, 1, 4);
INSERT INTO `pmo_role_menu` VALUES (3, 8, 2, 10);

-- ----------------------------
-- Table structure for pmo_role_menu_static
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role_menu_static`;
CREATE TABLE `pmo_role_menu_static`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' ',
  `data` text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT 'json数据',
  `version` tinyint(2) NULL DEFAULT 1,
  `role_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '角色下id',
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '左侧角色栏静态表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_role_menu_static
-- ----------------------------
INSERT INTO `pmo_role_menu_static` VALUES (1, '{\"projectManagement\":{\"data\":[{\"id\":\"4\",\"path\":\"/biddingPlan\",\"title\":\"所属项目集\",\"component\":\"BiddingPlan\",\"fid\":\"1\",\"url\":null},{\"id\":\"28\",\"path\":\"/trainingProgram\",\"title\":\"培训项目\",\"component\":\"TrainingProgram\",\"fid\":\"1\",\"url\":\"project_manage_returnonlyuserlist\"}],\"name\":\"项目管理\"}}', 1, '8', '普通员工');
INSERT INTO `pmo_role_menu_static` VALUES (4, '{\"budgetAndFinalAccountsManagementcond\":{\"data\":[{\"id\":\"7\",\"path\":\"/budget\",\"title\":\"预算\",\"component\":\"Budget\",\"fid\":\"2\",\"url\":\"examine_budget_list\"},{\"id\":\"8\",\"path\":\"/finalAccounts\",\"title\":\"决算\",\"component\":\"FinalAccounts\",\"fid\":\"2\",\"url\":\"examine_final_list\"}],\"name\":\"预决算管理\"}}', 1, '6', 'PMO');
INSERT INTO `pmo_role_menu_static` VALUES (6, '{\"projectManagement\":{\"data\":[{\"id\":\"1\",\"path\":\"/customer\",\"title\":\"客户\",\"component\":\"Customer\",\"fid\":\"1\",\"url\":null},{\"id\":\"2\",\"path\":\"/contact\",\"title\":\"联系人\",\"component\":\"Contact\",\"fid\":\"1\",\"url\":null},{\"id\":\"3\",\"path\":\"/trainingProgram\",\"title\":\"培训项目\",\"component\":\"TrainingProgram\",\"fid\":\"1\",\"url\":\"project_manage_list\"},{\"id\":\"4\",\"path\":\"/biddingPlan\",\"title\":\"所属项目集\",\"component\":\"BiddingPlan\",\"fid\":\"1\",\"url\":null},{\"id\":\"5\",\"path\":\"/contract\",\"title\":\"合同管理\",\"component\":\"Contract\",\"fid\":\"1\",\"url\":null},{\"id\":\"6\",\"path\":\"/costing\",\"title\":\"成本管理\",\"component\":\"Costing\",\"fid\":\"1\",\"url\":null}],\"name\":\"项目管理\"},\"budgetAndFinalAccountsManagementcond\":{\"data\":[{\"id\":\"7\",\"path\":\"/budget\",\"title\":\"预算\",\"component\":\"Budget\",\"fid\":\"2\",\"url\":\"examine_budget_list\"},{\"id\":\"8\",\"path\":\"/finalAccounts\",\"title\":\"决算\",\"component\":\"FinalAccounts\",\"fid\":\"2\",\"url\":\"examine_final_list\"},{\"id\":\"9\",\"path\":\"/budgetAccounting\",\"title\":\"核算\",\"component\":\"BudgetAccounting\",\"fid\":\"2\",\"url\":null},{\"id\":\"10\",\"path\":\"/budgetExaminationAndApproval\",\"title\":\"审批\",\"component\":\"BudgetExaminationAndApproval\",\"fid\":\"2\",\"url\":\"examine_record_list\"}],\"name\":\"预决算管理\"},\"loanExpenditureManagement\":{\"data\":[{\"id\":\"11\",\"path\":\"/loan\",\"title\":\"借款\",\"component\":\"Loan\",\"fid\":\"3\",\"url\":null},{\"id\":\"12\",\"path\":\"/expenditure\",\"title\":\"支出\",\"component\":\"Expenditure\",\"fid\":\"3\",\"url\":null},{\"id\":\"13\",\"path\":\"/loanAccounting\",\"title\":\"核算\",\"component\":\"LoanAccounting\",\"fid\":\"3\",\"url\":null},{\"id\":\"14\",\"path\":\"/loanExaminationAndApproval\",\"title\":\"审批\",\"component\":\"LoanExaminationAndApproval\",\"fid\":\"3\",\"url\":null}],\"name\":\"借款支出管理\"},\"receivablesManagement\":{\"data\":[{\"id\":\"15\",\"path\":\"/receivables\",\"title\":\"应收款\",\"component\":\"Receivables\",\"fid\":\"4\",\"url\":null},{\"id\":\"16\",\"path\":\"/cashReceipts\",\"title\":\"实收款\",\"component\":\"CashReceipts\",\"fid\":\"4\",\"url\":null},{\"id\":\"17\",\"path\":\"/receivablesAccounting\",\"title\":\"核算\",\"component\":\"ReceivablesAccounting\",\"fid\":\"4\",\"url\":null},{\"id\":\"18\",\"path\":\"/receivablesExaminationAndApproval\",\"title\":\"审批\",\"component\":\"ReceivablesExaminationAndApproval\",\"fid\":\"4\",\"url\":null}],\"name\":\"收款管理\"},\"lecturerManagement\":{\"data\":[{\"id\":\"19\",\"path\":\"/lecturer\",\"title\":\"讲师\",\"component\":\"Lecturer\",\"fid\":\"5\",\"url\":null},{\"id\":\"20\",\"path\":\"/classRemuneration\",\"title\":\"课酬\",\"component\":\"ClassRemuneration\",\"fid\":\"5\",\"url\":null},{\"id\":\"21\",\"path\":\"/teachingArrangement\",\"title\":\"授课安排\",\"component\":\"TeachingArrangement\",\"fid\":\"5\",\"url\":null}],\"name\":\"讲师管理\"},\"implementationManagement\":{\"data\":[{\"id\":\"22\",\"path\":\"/rafficTravel\",\"title\":\"交通差旅\",\"component\":\"RafficTravel\",\"fid\":\"6\",\"url\":null},{\"id\":\"23\",\"path\":\"/segmenHotel\",\"title\":\"会议酒店\",\"component\":\"SegmenHotel\",\"fid\":\"6\",\"url\":null},{\"id\":\"24\",\"path\":\"/serviceConsumables\",\"title\":\"服务耗材\",\"component\":\"ServiceConsumables\",\"fid\":\"6\",\"url\":null}],\"name\":\"实施管理\"},\"viewManagement\":{\"data\":[{\"id\":\"25\",\"path\":\"/view\",\"title\":\"视图管理\",\"component\":\"View\",\"fid\":\"7\",\"url\":null},{\"id\":\"26\",\"path\":\"/menu\",\"title\":\"菜单管理\",\"component\":\"Menu\",\"fid\":\"7\",\"url\":null},{\"id\":\"30\",\"path\":\"/urlPower\",\"title\":\"路由权限\",\"component\":\"UrlPower\",\"fid\":\"7\",\"url\":\"role_route_list\"}],\"name\":\"视图管理\"}}', 1, '9', '系统管理员');

-- ----------------------------
-- Table structure for pmo_role_route
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role_route`;
CREATE TABLE `pmo_role_route`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '名字',
  `user_ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '用户表里的id 用,隔开',
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '0为启用1为弃用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '用户分配角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_role_route
-- ----------------------------
INSERT INTO `pmo_role_route` VALUES (1, 1, '主管理员', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (2, 1, '子管理员', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (3, 1, '负责人', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (4, 1, '主管', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (5, 2, '人事', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (7, 2, '行政', NULL, 0);
INSERT INTO `pmo_role_route` VALUES (6, 6, 'PMO', '10', 0);
INSERT INTO `pmo_role_route` VALUES (8, 8, '普通员工', '1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,32,33', 0);
INSERT INTO `pmo_role_route` VALUES (9, 9, '高级管理员', '28,29,31,30', 0);

-- ----------------------------
-- Table structure for pmo_role_view
-- ----------------------------
DROP TABLE IF EXISTS `pmo_role_view`;
CREATE TABLE `pmo_role_view`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `view_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '角色json分配表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of pmo_role_view
-- ----------------------------
INSERT INTO `pmo_role_view` VALUES (16, 2, 6);
INSERT INTO `pmo_role_view` VALUES (14, 2, 4);
INSERT INTO `pmo_role_view` VALUES (15, 2, 5);
INSERT INTO `pmo_role_view` VALUES (13, 2, 3);
INSERT INTO `pmo_role_view` VALUES (12, 2, 2);
INSERT INTO `pmo_role_view` VALUES (11, 2, 1);

-- ----------------------------
-- Table structure for pmo_route_url
-- ----------------------------
DROP TABLE IF EXISTS `pmo_route_url`;
CREATE TABLE `pmo_route_url`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `version` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '1.0',
  `request` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '接收',
  `response` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '输出',
  `url_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 90 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '路由表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_route_url
-- ----------------------------
INSERT INTO `pmo_route_url` VALUES (1, 'user/user/client_route', '1.0', '[1]', '[]', 'client_route', '目录');
INSERT INTO `pmo_route_url` VALUES (2, 'project/manage/add', '1.0', '{\"project_project_template_id\":\"string\"}', '[]', 'project_manage_add', '添加项目');
INSERT INTO `pmo_route_url` VALUES (3, 'project/data/edit', '1.0', '{\"id\":\"string\"}', '[]', 'project_data_edit', '修改项目');
INSERT INTO `pmo_route_url` VALUES (4, 'project/manage/list', '2.0', '[]', '[]', 'project_manage_list', '返回项目列表');
INSERT INTO `pmo_route_url` VALUES (5, 'project/data/getByProjectId', '1.0', '{\"id\":\"string\"}', '[]', 'project_data_getByProjectId', '获取一条项目数据');
INSERT INTO `pmo_route_url` VALUES (6, 'staff/manage/list', '1.0', '[]', '[]', 'staff_manage_list', '获取实施负责人');
INSERT INTO `pmo_route_url` VALUES (7, 'progam/manage/list', '1.0', '[]', '[]', 'program_manage_list', '项目集列表');
INSERT INTO `pmo_route_url` VALUES (8, 'progam/manage/add', '1.0', '[]', '[]', 'program_manage_add', '新增项目');
INSERT INTO `pmo_route_url` VALUES (9, 'user/project/projectTemplate', '1.0', '[]', '[]', 'project_type_list', '项目模板列表');
INSERT INTO `pmo_route_url` VALUES (10, 'lecturer/plan/getByProjectId', '1.0', '[]', '[]', 'lecturer_plan_getByProjectId', '实施安排数据');
INSERT INTO `pmo_route_url` VALUES (11, 'lecturer/manage/list', '1.0', '[]', '[]', 'lecturer_manage_list', '讲师列表');
INSERT INTO `pmo_route_url` VALUES (12, 'lecturer/duty/list', '1.0', '[]', '[]', 'lecturer_duty_list', '职责列表');
INSERT INTO `pmo_route_url` VALUES (13, 'lecturer/plan/add', '1.0', '[]', '[]', 'lecturer_plan_add', '添加讲师安排');
INSERT INTO `pmo_route_url` VALUES (14, 'lecturer/plan/edit', '1.0', '{\"id\":\"string\"}', '[]', 'lecturer_plan_edit', '修改讲师安排');
INSERT INTO `pmo_route_url` VALUES (15, 'lecturer/plan/del', '1.0', '{\"id\":\"string\"}', '[]', 'lecturer_plan_del', '删除讲师安排');
INSERT INTO `pmo_route_url` VALUES (16, 'implement/plan/getByProjectId', '1.0', '[]', '[]', 'implement_plan_getByProjectId', '获取实施安排');
INSERT INTO `pmo_route_url` VALUES (17, 'implement/plan/edit', '1.0', '[]', '[]', 'implement_plan_edit', '修改实施安排');
INSERT INTO `pmo_route_url` VALUES (18, 'travel/plan/getByProjectId', '1.0', '[]', '[]', 'travel_plan_getByProjectId', '获取差旅安排');
INSERT INTO `pmo_route_url` VALUES (19, 'travel/inCityTraffic/add', '1.0', '[]', '[]', 'travel_inCityTraffic_add', '添加市内交通');
INSERT INTO `pmo_route_url` VALUES (20, 'travel/inCityTraffic/edit', '1.0', '{\"id\":\"string\"}', '[]', 'travel_inCityTraffic_edit', '修改市内交通');
INSERT INTO `pmo_route_url` VALUES (21, 'travel/inCityTraffic/del', '1.0', '{\"id\":\"string\"}', '[]', 'travel_inCityTraffic_del', '删除室内交通');
INSERT INTO `pmo_route_url` VALUES (22, 'travel/longTraffic/add', '1.0', '[]', '[]', 'travel_longTraffic_add', '添加长途交通');
INSERT INTO `pmo_route_url` VALUES (23, 'travel/longTraffic/edit', '1.0', '{\"id\":\"string\"}', '[]', 'travel_longTraffic_edit', '修改长途交通');
INSERT INTO `pmo_route_url` VALUES (24, 'travel/longTraffic/del', '1.0', '{\"id\":\"string\"}', '[]', 'travel_longTraffic_del', '删除长途交通');
INSERT INTO `pmo_route_url` VALUES (25, 'travel/hotel/add', '1.0', '[]', '[]', 'travel_hotel_add', '增加住宿安排');
INSERT INTO `pmo_route_url` VALUES (26, 'travel/hotel/edit', '1.0', '{\"id\":\"string\"}', '[]', 'travel_hotel_edit', '修改住宿安排');
INSERT INTO `pmo_route_url` VALUES (27, 'travel/hotel/del', '1.0', '{\"id\":\"string\"}', '[]', 'travel_hotel_del', '删除住宿安排');
INSERT INTO `pmo_route_url` VALUES (28, 'travel/longTrafficType/list', '1.0', '[]', '[]', 'travel_longTrafficType_list', '出行方式列表');
INSERT INTO `pmo_route_url` VALUES (29, 'user/account/login', '1.0', '{\"account\":\"string\",\"password\":\"string\"}', '[]', 'user_account_login', '登陆');
INSERT INTO `pmo_route_url` VALUES (30, 'lecturer/manage/add', '1.0', '{\"teacher_name\":\"string\",\"teacher_price\":\"string\",\"teacher_cooperation_model_id\":\"string\"}', '{\"id\":\"string\",\"name\":\"string\"}', 'lecturer_manage_add', '新增讲师');
INSERT INTO `pmo_route_url` VALUES (31, 'lecturer/manage/cooperation', '1.0', '[]', '[]', 'lecturer_manage_cooperation', '讲师长短期');
INSERT INTO `pmo_route_url` VALUES (32, 'implement/venue/add', '1.0', '[]', '[]', 'implement_venue_add', '添加会场安排');
INSERT INTO `pmo_route_url` VALUES (33, 'implement/venue/del', '1.0', '[]', '[]', 'implement_venue_del', '删除会场安排');
INSERT INTO `pmo_route_url` VALUES (34, 'implement/venue/edit', '1.0', '[]', '[]', 'implement_venue_edit', '修改会场安排');
INSERT INTO `pmo_route_url` VALUES (35, 'project/address/list', '1.0', '[]', '[]', 'project_address_list', '获取城市列表');
INSERT INTO `pmo_route_url` VALUES (36, 'project/address/province', '1.0', '[]', '[]', 'project_address_province', '获取省列表');
INSERT INTO `pmo_route_url` VALUES (37, 'project/address/city', '1.0', '[]', '[]', 'project_address_city', '获取市列表');
INSERT INTO `pmo_route_url` VALUES (38, 'project/address/add', '1.0', '[]', '[]', 'project_address_add', '添加地址');
INSERT INTO `pmo_route_url` VALUES (39, 'project/address/edit', '1.0', '[]', '[]', 'project_address_edit', '修改地址');
INSERT INTO `pmo_route_url` VALUES (40, 'project/address/del', '1.0', '[]', '[]', 'project_address_del', '删除地址');
INSERT INTO `pmo_route_url` VALUES (41, 'travel/meal/people', '1.0', '[]', '[]', 'travel_meal_people', '人员列表');
INSERT INTO `pmo_route_url` VALUES (42, 'travel/meal/add', '1.0', '[]', '[]', 'travel_meal_add', '添加餐费');
INSERT INTO `pmo_route_url` VALUES (43, 'travel/meal/edit', '1.0', '[]', '[]', 'travel_meal_edit', '修改餐费');
INSERT INTO `pmo_route_url` VALUES (44, 'travel/meal/del', '1.0', '[]', '[]', 'travel_meal_del', '删除餐费');
INSERT INTO `pmo_route_url` VALUES (45, 'examine/config/add', '1.0', '[]', '[]', 'examine_config_add', '添加审批的审批单类型');
INSERT INTO `pmo_route_url` VALUES (46, 'examine/config/edit', '1.0', '[]', '[]', 'examine_config_edit', '修改配置的审批单类型');
INSERT INTO `pmo_route_url` VALUES (47, 'examine/config/del', '1.0', '[]', '[]', 'examine_config_del', '删除配置的审批单类型');
INSERT INTO `pmo_route_url` VALUES (48, 'examine/config/list', '1.0', '[]', '[]', 'examine_config_list', '审批列表');
INSERT INTO `pmo_route_url` VALUES (49, 'json/manage/add', '1.0', '[]', '[]', 'json_manage_add', '添加json数据');
INSERT INTO `pmo_route_url` VALUES (50, 'json/manage/edit', '1.0', '[]', '[]', 'json_manage_edit', '修改json数据');
INSERT INTO `pmo_route_url` VALUES (51, 'json/manage/list', '1.0', '[]', '[]', 'json_manage_list', 'json数据列表');
INSERT INTO `pmo_route_url` VALUES (52, 'json/manage/name', '1.0', '[]', '[]', 'json_manage_name', 'json列表名称');
INSERT INTO `pmo_route_url` VALUES (53, 'role/route/add', '1.0', '[]', '[]', 'role_route_add', '为角色添加路由');
INSERT INTO `pmo_route_url` VALUES (54, 'role/route/del', '1.0', '[]', '[]', 'role_route_del', '为角色删除路由');
INSERT INTO `pmo_route_url` VALUES (55, 'role/view/add', '0.1', '[]', '[]', 'role_view_add', '为角色添加试图');
INSERT INTO `pmo_route_url` VALUES (56, 'role/view/del', '0.1', '[]', '[]', 'role_view_del', '为角色删除试图');
INSERT INTO `pmo_route_url` VALUES (57, 'role/view/list', '0.1', '[]', '[]', 'role_view_list', '角色下的试图列表');
INSERT INTO `pmo_route_url` VALUES (58, 'menu/manage/add', '1.0', '[]', '[]', 'menu_manage_add', '静态菜单数据的添加');
INSERT INTO `pmo_route_url` VALUES (59, 'menu/manage/edit', '1.0', '[]', '[]', 'menu_manage_edit', '静态菜单数据的修改');
INSERT INTO `pmo_route_url` VALUES (60, 'menu/manage/del', '1.0', '[]', '[]', 'menu_manage_del', '静态菜单数据的删除');
INSERT INTO `pmo_route_url` VALUES (61, 'menu/manage/list', '1.0', '[]', '[]', 'menu_manage_list', '菜单的列表（非静态）');
INSERT INTO `pmo_route_url` VALUES (62, 'examine/manage/commitbudget', '1.0', '[]', '[]', 'examine_manage_commitbudget', '提交预算审批');
INSERT INTO `pmo_route_url` VALUES (63, 'examine/manage/will', '1.0', '[]', '[]', 'examine_manage_will', '查看需要我审批的审批单');
INSERT INTO `pmo_route_url` VALUES (64, 'examine/manage/ipassed', '1.0', '[]', '[]', 'examine_manage_ipassed', '查看我通过的审批单');
INSERT INTO `pmo_route_url` VALUES (65, 'examine/manage/agree', '1.0', '[]', '[]', 'examine_manage_agree', '通过审批单');
INSERT INTO `pmo_route_url` VALUES (66, 'examine/manage/refuse', '1.0', '[]', '[]', 'examine_manage_refuse', '不通过审批单');
INSERT INTO `pmo_route_url` VALUES (67, 'json/type/list', '1.0', '[]', '[]', 'json_type_list', 'json数据列表');
INSERT INTO `pmo_route_url` VALUES (68, 'project/manage/returnonlyuserlist', '1.0', '[]', '[]', 'project_manage_returnonlyuserlist', '返回我自己的项目列表');
INSERT INTO `pmo_route_url` VALUES (69, 'project/manage/returndepartmentlist', '1.0', '[]', '[]', 'project_manage_returndepartmentlist', '返回我部门的项目列表');
INSERT INTO `pmo_route_url` VALUES (70, 'examine/budget/list', '1.0', '[]', '[]', 'examine_budget_list', '预算审批列表');
INSERT INTO `pmo_route_url` VALUES (71, 'examine/final/list', '1.0', '[]', '[]', 'examine_final_list', '决算审批列表');
INSERT INTO `pmo_route_url` VALUES (72, 'examine/budget/project', '1.0', '[]', '[]', 'examine_budget_project', '获取预算项目信息');
INSERT INTO `pmo_route_url` VALUES (73, 'examine/budget/lecturer', '1.0', '[]', '[]', 'examine_budget_lecturer', '获取预算讲师信息');
INSERT INTO `pmo_route_url` VALUES (74, 'examine/budget/implement', '1.0', '[]', '[]', 'examine_budget_implement', '获取预算实施信息');
INSERT INTO `pmo_route_url` VALUES (75, 'examine/budget/travel', '1.0', '[]', '[]', 'examine_budget_travel', '获取预算差旅信息');
INSERT INTO `pmo_route_url` VALUES (76, 'menu/data/list', '1.0', '[]', '[]', 'menu_data_list', '菜单的静态列表');
INSERT INTO `pmo_route_url` VALUES (77, 'menu/data/listmenuleft', '1.0', '[]', '[]', 'menu_data_listmenuleft', '左侧菜单的列表');
INSERT INTO `pmo_route_url` VALUES (78, 'menu/data/listmenuright', '1.0', '[]', '[]', 'menu_data_listmenuright', '偏右左侧菜单的列表');
INSERT INTO `pmo_route_url` VALUES (79, 'menu/data/getone', '1.0', '[]', '[]', 'menu_data_getone', '获取一条菜单的静态列表');
INSERT INTO `pmo_route_url` VALUES (80, 'examine/manage/cancelbudget', '1.0', '[]', '[]', 'examine_manage_cancelbudget', '撤销预算');
INSERT INTO `pmo_route_url` VALUES (81, 'examine/manage/cancelfinal', '1.0', '[]', '[]', 'examine_manage_cancelfinal', '撤销决算');
INSERT INTO `pmo_route_url` VALUES (82, 'examine/manage/commitfinal', '1.0', '[]', '[]', 'examine_manage_commitfinal', '提交决算');
INSERT INTO `pmo_route_url` VALUES (83, 'examine/final/project', '1.0', '[]', '[]', 'examine_final_project', '获取决算项目信息');
INSERT INTO `pmo_route_url` VALUES (84, 'examine/final/lecturer', '1.0', '[]', '[]', 'examine_final_lecturer', '获取决算讲师信息');
INSERT INTO `pmo_route_url` VALUES (85, 'examine/final/implement', '1.0', '[]', '[]', 'examine_final_implement', '获取决算实施信息');
INSERT INTO `pmo_route_url` VALUES (86, 'examine/final/travel', '1.0', '[]', '[]', 'examine_final_travel', '获取决算差旅信息');
INSERT INTO `pmo_route_url` VALUES (87, 'client/route/list', '1.0', '[]', '[]', 'client_route_list', '');
INSERT INTO `pmo_route_url` VALUES (88, 'role/route/byid', '1.0', '[]', '[]', 'get_route_by_role_id', '');
INSERT INTO `pmo_route_url` VALUES (89, 'role/route/list', '1.0', '[]', '[]', 'role_route_list', '');

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
  `isAdmin` tinyint(2) NULL DEFAULT NULL,
  `isBoss` tinyint(2) NULL DEFAULT NULL,
  `isHide` tinyint(2) NULL DEFAULT NULL,
  `isLeader` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '职工表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_staff_table
-- ----------------------------
INSERT INTO `pmo_staff_table` VALUES (1, '柳芳', '副总经理', '26509419,26509421', 'AArHzXVStM9CFwE0p1z6xwiEiE', '06216348088634', NULL, 'liufang@chinasofti.com', '965059200000', NULL, '13520383989', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (2, '宋丹', '副总经理', '26509419,26509422', 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '01132266088766', NULL, 'songdan@chinasofti.com', '1091289600000', NULL, '13552323651', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (3, '吴宝辉', '总经理', '26509419,26509420', 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '06216318444176', NULL, 'wbh@chinasofti.com', '1022860800000', NULL, '13910922852', '', 0, 1, 1, 0, 0, 1);
INSERT INTO `pmo_staff_table` VALUES (4, '亢鹏', '销售总监', '26509424,26509419', 'RxYhVC88uNgrnjAo5MMFpgiEiE', '06216348531439', NULL, 'kangpeng@chinasofti.com', '1146412800000', NULL, '13911678217', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (5, '吴春霞', '销售总监', '26509419,26509425', 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '05063868525407', NULL, 'wuchunxia@chinasofti.com', '1444838400000', NULL, '13511050696', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (6, '庞海燕', '销售', '1', 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '3122336824175196', NULL, 'panghy@chinasofti.com', '1309881600000', NULL, '13911395319', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (7, '李萍', '出纳', '26509420', 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '07526131261878', NULL, '　liping009@chinasofti.com', '1471190400000', NULL, '15701205466', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (8, '吴美宏', '会计', '26509420', '70jUJuaiP2OKs0IIJq7flbgiEiE', '116119535921751029', NULL, 'wumeihong@chinasofti.com', '1499788800000', NULL, '13717860261', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (9, '田野', '人事行政助理', '26509421', 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '1825306650967326', NULL, 'tianye005@chinasofti.com', '', NULL, '13161571763', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (10, '段美静', '行政助理', '26509421', 'bD43OjgMMTnpCuIcExxHbQiEiE', '07124219319765', NULL, 'duanmeijing@chinasofti.com', '1373990400000', NULL, '15011503914', '', 0, 1, 1, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (11, '耿伟宁', '库管', '26509421', 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '07526131259264', NULL, 'gengwn@chinasofti.com', '965059200000', NULL, '13910221378', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (12, '刘明', '部门助理', '26509421', 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '07526131248816', NULL, 'liuming008@chinasofti.com', '1362585600000', NULL, '13901022674', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (13, '冯津津', '部门助理', '26509424', 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '191740376120989583', NULL, '', '', NULL, '15801459601', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (14, '刘静', '部门助理', '26509424,30316407', 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '1927341807690241', NULL, '', '', NULL, '13552208962', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (15, '黄嘉丽', '', '26509424', 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '193416470239761688', NULL, '', '', NULL, '15611468096', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (16, '杜刚利', '销售经理', '26429951', 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '06216348145245', NULL, 'dugl@chinasofti.com', '1180627200000', NULL, '13126615363', '', 0, 1, 0, 0, 0, 1);
INSERT INTO `pmo_staff_table` VALUES (17, '李忻怡', '部门助理', '26429951', '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '083043436726200916', NULL, 'lixinyi001@chinasofti.com', '1486915200000', NULL, '13521876292', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (18, '李旋', '部门助理', '26429951', 'tZh4k924tiius0IIJq7flbgiEiE', '0830446509845885', NULL, 'lixuan001@chinasofti.com', '1486915200000', NULL, '18513162724', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (19, '陈丽', '销售', '26429951', 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '07526648601212661', NULL, 'chenli003@chinasofti.com', '1476633600000', NULL, '13284370698', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (20, '曲鹤', '销售', '26429951', '8jADbZwou2dBZtxPhcRLZQiEiE', '03633558276714', NULL, 'quhe@chinasofti.com', '1368979200000', NULL, '13581683695', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (21, '温越', '销售', '26429951', '6wyJIABL71srnjAo5MMFpgiEiE', '0621635133357', NULL, 'wenyue@chinasofti.com', '1328457600000', NULL, '18301174940', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (22, '廖志敏', '销售', '26429951', 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '01241652073500', NULL, 'liaozhimin@chinasofti.com', '1393430400000', NULL, '18811148190', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (23, '糜研', '部门助理', '26429951', '5JrLJiiyN8Jes0IIJq7flbgiEiE', '075255564999', NULL, 'miyan@chinasofti.com', '1448812800000', NULL, '13331067038', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (24, '孙江微', '销售', '26429951', 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '06216352034744', NULL, 'zhongruanpeixun@163.com', '1433088000000', NULL, '15101695303', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (25, '张婧竹', '项目助理', '26436766', 'kTPzGvTMIK7pCuIcExxHbQiEiE', '06216351411207', NULL, 'zhangjzh@chinasofti.com', '1188316800000', NULL, '13439711694', '', 0, 1, 0, 0, 0, 1);
INSERT INTO `pmo_staff_table` VALUES (26, '穆连', '部门助理', '26436766', 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '08326209641007192', NULL, 'mulian@chinasofti.com', '1487260800000', NULL, '18811425390', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (27, '褚寅良', '市场经理', '26456742', 'CK49wpZksw9u3MiP4RuBwKwiEiE', 'manager1335', NULL, 'chuyinliang@chinasofti.com', '1362499200000', NULL, '18801213590', '', 0, 1, 1, 0, 0, 1);
INSERT INTO `pmo_staff_table` VALUES (28, '侍尧', '开发', '26456742', 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '1908591938654906', NULL, '', '', NULL, '18311295627', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (29, '崔思思', '开发', '26456742', 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '6565633823686068', NULL, '', '', NULL, '13552323831', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (30, '刘雪松', '前端开发', '26456742', 'JkeBrDleabJii4l4ptzMsKAiEiE', '07202163272788', NULL, 'liuxuesong001@chinasofti.com', '1482681600000', NULL, '13611366048', '', 0, 1, 0, 0, 0, 0);
INSERT INTO `pmo_staff_table` VALUES (31, '寇艳艳', '销售经理', '30316407', 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '06216352069386', NULL, 'kouyy@chinasofti.com', '1213632000000', NULL, '13683248456', '', 0, 1, 0, 0, 0, 1);
INSERT INTO `pmo_staff_table` VALUES (32, '张剑', '销售经理', '30318368', 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '06216352047230', NULL, 'zhangjian005@chinasofti.com', '1357315200000', NULL, '18911711719', '', 0, 1, 0, 0, 0, 1);

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
-- Table structure for pmo_staff_user
-- ----------------------------
DROP TABLE IF EXISTS `pmo_staff_user`;
CREATE TABLE `pmo_staff_user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(11) NULL DEFAULT NULL COMMENT '员工唯一标识ID（不可修改）',
  `unionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '在当前isv全局范围内唯一标识一个用户的身份，用户无法修改',
  `mobile` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '手机号',
  `tel` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '分机号',
  `workPlace` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '办公地点',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '注释',
  `isAdmin` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '是否是企业的管理员,\r\ntrue表示是\r\nfalse表示不是',
  `isBoss` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '是否为企业的老板（不能通过接口进行设置，可以通过钉钉管理后台进行设置），\r\ntrue表示是\r\nfalse表示不是',
  `isHide` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '是否隐藏号码，\r\ntrue表示是\r\nfalse表示不是',
  `isLeader` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '是否是部门的主管，\r\ntrue表示是，\r\nfalse表示不是',
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '成员名称',
  `active` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '表示该用户是否激活了钉钉',
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '成员所属部门id列表',
  `position` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '职位信息',
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '员工的邮箱',
  `orgEmail` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '员工的企业邮箱，如果员工的企业邮箱没有开通，返回信息中不包含',
  `jobnumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '员工工号',
  `hiredDate` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '入职时间',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '账号id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_staff_user
-- ----------------------------
INSERT INTO `pmo_staff_user` VALUES (1, 2147483647, 'AArHzXVStM9CFwE0p1z6xwiEiE', '13520383989', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '柳芳', '1', '26509419,26509421', '副总经理', 'liufang@chinasofti.com', '', 'E000700902', '965059200000', 1);
INSERT INTO `pmo_staff_user` VALUES (2, 2147483647, 'e3ZzKG4BsZ9BZtxPhcRLZQiEiE', '13552323651', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '宋丹', '1', '26509419,26509422', '副总经理', 'songdan@chinasofti.com', '', 'E000700903', '1091289600000', 2);
INSERT INTO `pmo_staff_user` VALUES (3, 2147483647, 'aFTxbe2UQHDvUnEMJ4uQWgiEiE', '13910922852', '', '海淀区学院南路55号中软大厦B座5层', '', '1', '', '', '1', '吴宝辉', '1', '26509419,26509420', '总经理', 'wbh@chinasofti.com', '', 'E000700912', '1022860800000', 3);
INSERT INTO `pmo_staff_user` VALUES (4, 2147483647, 'RxYhVC88uNgrnjAo5MMFpgiEiE', '13911678217', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '亢鹏', '1', '26509424,26509419', '销售总监', 'kangpeng@chinasofti.com', '', 'E000700918', '1146412800000', 4);
INSERT INTO `pmo_staff_user` VALUES (5, 2147483647, 'e2iPGzfthiPdk7DboRCsnJFAiEiE', '13511050696', '51527581', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '吴春霞', '1', '26509419,26509425', '销售总监', 'wuchunxia@chinasofti.com', '', 'E000700913', '1444838400000', 5);
INSERT INTO `pmo_staff_user` VALUES (6, 2147483647, 'hFiiCaqwYWahBZtxPhcRLZQiEiE', '13911395319', '', '', '', '', '', '', '', '庞海燕', '1', '1', '销售', 'panghy@chinasofti.com', '', 'E100017691', '1309881600000', 6);
INSERT INTO `pmo_staff_user` VALUES (7, 2147483647, 'IOjscEiP3zX1WAhgHmF5PzwiEiE', '15701205466', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '李萍', '1', '26509420', '出纳', '　liping009@chinasofti.com', '', 'E100093748', '1471190400000', 7);
INSERT INTO `pmo_staff_user` VALUES (8, 2147483647, '70jUJuaiP2OKs0IIJq7flbgiEiE', '13717860261', '', '', '', '', '', '', '', '吴美宏', '1', '26509420', '会计', 'wumeihong@chinasofti.com', '', 'E100104811', '1499788800000', 8);
INSERT INTO `pmo_staff_user` VALUES (9, 2147483647, 'iS6bcFE65knBu3MiP4RuBwKwiEiE', '13161571763', '', '', '', '', '', '', '', '田野', '1', '26509421', '人事行政助理', 'tianye005@chinasofti.com', '', '', '', 9);
INSERT INTO `pmo_staff_user` VALUES (10, 2147483647, 'bD43OjgMMTnpCuIcExxHbQiEiE', '15011503914', '', '海淀区学院南路55号中软大厦B座5层', '', '1', '', '', '', '段美静', '1', '26509421', '行政助理', 'duanmeijing@chinasofti.co', '', 'E100025888', '1373990400000', 10);
INSERT INTO `pmo_staff_user` VALUES (11, 2147483647, 'IOjscEiP3zX2tZRiiwDAMg0AiEiE', '13910221378', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '耿伟宁', '1', '26509421', '库管', 'gengwn@chinasofti.com', '', 'E000700927', '965059200000', 11);
INSERT INTO `pmo_staff_user` VALUES (12, 2147483647, 'IOjscEiP3zX3vUnEMJ4uQWgiEiE', '13901022674', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '刘明', '1', '26509421', '部门助理', 'liuming008@chinasofti.com', '', 'E100021226', '1362585600000', 12);
INSERT INTO `pmo_staff_user` VALUES (13, 2147483647, 'Ukn8rR3t0AzpCuIcExxHbQiEiE', '15801459601', '', '', '', '', '', '', '', '冯津津', '1', '26509424', '部门助理', '', '', '', '', 13);
INSERT INTO `pmo_staff_user` VALUES (14, 2147483647, 'QrOIvCJ1qGNii4l4ptzMsKAiEiE', '13552208962', '', '', '', '', '', '', '', '刘静', '1', '30316407', '部门助理', '', '', '', '', 14);
INSERT INTO `pmo_staff_user` VALUES (16, 2147483647, 'AAjrGoJ2iPPc7DboRCsnJFAiEiE', '15611468096', '', '', '', '', '', '', '', '黄嘉丽', '1', '26509424', '', '', '', '', '', 15);
INSERT INTO `pmo_staff_user` VALUES (17, 2147483647, 'uzgpwCJA6hfvUnEMJ4uQWgiEiE', '13126615363', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '1', '杜刚利', '1', '26429951', '销售经理', 'dugl@chinasofti.com', '', 'E000700914', '1180627200000', 16);
INSERT INTO `pmo_staff_user` VALUES (18, 2147483647, 'HquLpbtgym5BZtxPhcRLZQiEiE', '13718566107', '', '', '', '', '', '', '', '于化龙', '1', '26429951', '部门助理', 'yuhualong@chinasofti.com', '', 'E100104612', '1497196800000', 17);
INSERT INTO `pmo_staff_user` VALUES (19, 2147483647, '2ga6Zr8XbDVii4l4ptzMsKAiEiE', '13521876292', '', '', '', '', '', '', '', '李忻怡', '1', '26429951', '部门助理', 'lixinyi001@chinasofti.com', '', 'E100103197', '1486915200000', 18);
INSERT INTO `pmo_staff_user` VALUES (20, 2147483647, 'tZh4k924tiius0IIJq7flbgiEiE', '18513162724', '', '', '', '', '', '', '', '李旋', '1', '26429951', '部门助理', 'lixuan001@chinasofti.com', '', 'E100103198', '1486915200000', 19);
INSERT INTO `pmo_staff_user` VALUES (21, 2147483647, 'EdjPii2qReIpu3MiP4RuBwKwiEiE', '13284370698', '', '', '', '', '', '', '', '陈丽', '1', '26429951', '销售', 'chenli003@chinasofti.com', '', 'E100099327', '1476633600000', 20);
INSERT INTO `pmo_staff_user` VALUES (22, 2147483647, '8jADbZwou2dBZtxPhcRLZQiEiE', '13581683695', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '曲鹤', '1', '26429951', '销售', 'quhe@chinasofti.com', '', 'E100023930', '1368979200000', 21);
INSERT INTO `pmo_staff_user` VALUES (23, 2147483647, '6wyJIABL71srnjAo5MMFpgiEiE', '18301174940', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '温越', '1', '26429951', '销售', 'wenyue@chinasofti.com', '', 'E100017694', '1328457600000', 22);
INSERT INTO `pmo_staff_user` VALUES (24, 2147483647, 'ujbB2cZYZcdBZtxPhcRLZQiEiE', '18811148190', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '廖志敏', '1', '26429951', '销售', 'liaozhimin@chinasofti.com', '', 'E100034712', '1393430400000', 23);
INSERT INTO `pmo_staff_user` VALUES (25, 2147483647, '5JrLJiiyN8Jes0IIJq7flbgiEiE', '13331067038', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '糜研', '1', '26429951', '部门助理', 'miyan@chinasofti.com', '', 'E100069484', '1448812800000', 24);
INSERT INTO `pmo_staff_user` VALUES (26, 2147483647, 'BVkU1iPiPyQc8rnjAo5MMFpgiEiE', '15101695303', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '孙江微', '1', '26429951', '销售', 'zhongruanpeixun@163.com', '', 'E000700917', '1433088000000', 25);
INSERT INTO `pmo_staff_user` VALUES (27, 2147483647, 'kTPzGvTMIK7pCuIcExxHbQiEiE', '13439711694', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '1', '张婧竹', '1', '26436766', '项目助理', 'zhangjzh@chinasofti.com', '', 'E000700921', '1188316800000', 26);
INSERT INTO `pmo_staff_user` VALUES (28, 2147483647, 'iSodX2v8IGSLvUnEMJ4uQWgiEiE', '18811425390', '', '', '', '', '', '', '', '穆连', '1', '26436766', '部门助理', 'mulian@chinasofti.com', '', 'E100103236', '1487260800000', 27);
INSERT INTO `pmo_staff_user` VALUES (29, 0, 'CK49wpZksw9u3MiP4RuBwKwiEiE', '18801213590', '', '海淀区学院南路55号中软大厦B座5层', '', '1', '', '', '1', '褚寅良', '1', '26456742', '市场经理', 'chuyinliang@chinasofti.co', '', 'E100021198', '1362499200000', 28);
INSERT INTO `pmo_staff_user` VALUES (30, 2147483647, 'AVrBCiPiSzwx1CFwE0p1z6xwiEiE', '18311295627', '', '', '', '', '', '', '', '侍尧', '1', '26456742', '开发', '', '', '', '', 29);
INSERT INTO `pmo_staff_user` VALUES (31, 2147483647, 'Aqm4Rd2lu2lBZtxPhcRLZQiEiE', '13552323831', '', '', '', '', '', '', '', '崔思思', '1', '26456742', '开发', '', '', '', '', 30);
INSERT INTO `pmo_staff_user` VALUES (32, 2147483647, 'JkeBrDleabJii4l4ptzMsKAiEiE', '13611366048', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '', '刘雪松', '1', '26456742', '前端开发', 'liuxuesong001@chinasofti.', '', 'E100102911', '1482681600000', 31);
INSERT INTO `pmo_staff_user` VALUES (33, 2147483647, 'BVkU1iPiPyQc9WAhgHmF5PzwiEiE', '13683248456', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '1', '寇艳艳', '1', '30316407', '销售经理', 'kouyy@chinasofti.com', '', 'E000700915', '1213632000000', 32);
INSERT INTO `pmo_staff_user` VALUES (34, 2147483647, 'BVkU1iPiPyQciSvUnEMJ4uQWgiEiE', '18911711719', '', '海淀区学院南路55号中软大厦B座5层', '', '', '', '', '1', '张剑', '1', '30318368', '销售经理', 'zhangjian005@chinasofti.c', '', 'E100020215', '1357315200000', 33);

-- ----------------------------
-- Table structure for pmo_travel_city
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_city`;
CREATE TABLE `pmo_travel_city`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `short_fee_card_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '人员',
  `short_fee_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用名称',
  `short_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用',
  `parent_id` int(11) NULL DEFAULT NULL,
  `now_time` datetime(0) NOT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 74 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '人员，费用，费用名称' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_city
-- ----------------------------
INSERT INTO `pmo_travel_city` VALUES (65, '1', '1', '1', 94, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (66, '1', '2', '34', 119, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (68, '市内', '火车', '20', 127, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (69, '', '', '2', 131, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (70, '', '', '2', 134, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (73, '寇艳艳', '出租', '300', 139, '0000-00-00 00:00:00', 0);
INSERT INTO `pmo_travel_city` VALUES (72, '李旋', '交通费', '200', 140, '0000-00-00 00:00:00', 0);

-- ----------------------------
-- Table structure for pmo_travel_meal
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_meal`;
CREATE TABLE `pmo_travel_meal`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meal_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '金额',
  `meal_fee_days` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '天数',
  `meal_fee_people_id` int(11) NULL DEFAULT NULL,
  `meal_fee_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '备注',
  `parent_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '金额天数备注' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_meal
-- ----------------------------
INSERT INTO `pmo_travel_meal` VALUES (41, '1', '1', 2, '1', 94, 0);
INSERT INTO `pmo_travel_meal` VALUES (42, '22', '1', 2, '44', 119, 0);
INSERT INTO `pmo_travel_meal` VALUES (44, '5000', '1', 2, '备注', 127, 0);
INSERT INTO `pmo_travel_meal` VALUES (45, '200', '3', 1, '', 129, 0);
INSERT INTO `pmo_travel_meal` VALUES (46, '400', '5', 2, '', 129, 0);
INSERT INTO `pmo_travel_meal` VALUES (47, '4', '', 0, '', 131, 0);
INSERT INTO `pmo_travel_meal` VALUES (48, '4', '', 0, '4', 134, 0);
INSERT INTO `pmo_travel_meal` VALUES (49, '680', '4', 1, '班主任和讲师', 140, 0);
INSERT INTO `pmo_travel_meal` VALUES (50, '170', '3', 2, '', 139, 0);

-- ----------------------------
-- Table structure for pmo_travel_mode
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_mode`;
CREATE TABLE `pmo_travel_mode`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '出行方式' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_mode
-- ----------------------------
INSERT INTO `pmo_travel_mode` VALUES (1, '火车');
INSERT INTO `pmo_travel_mode` VALUES (2, '飞机');
INSERT INTO `pmo_travel_mode` VALUES (3, '大巴');

-- ----------------------------
-- Table structure for pmo_travel_people
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_people`;
CREATE TABLE `pmo_travel_people`  (
  `meal_fee_people_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meal_fee_people_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`meal_fee_people_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '讲师/实施' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_people
-- ----------------------------
INSERT INTO `pmo_travel_people` VALUES (1, '讲师');
INSERT INTO `pmo_travel_people` VALUES (2, '实施');

-- ----------------------------
-- Table structure for pmo_travel_province
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_province`;
CREATE TABLE `pmo_travel_province`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `long_fee_card_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '人员姓名',
  `long_fee_card_start_time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出发时间',
  `long_fee_card_start_place` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出发地点',
  `long_fee_card_end_time` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '结束时间',
  `long_fee_card_end_place` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '结束地点',
  `state` tinyint(3) NULL DEFAULT 0,
  `parent_id` int(11) NULL DEFAULT NULL,
  `now_time` datetime(0) NOT NULL,
  `long_fee_card_fee` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '费用',
  `long_fee_card_vehicle_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `long_fee_card_vehicle_id` int(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 127 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '长途交通' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_province
-- ----------------------------
INSERT INTO `pmo_travel_province` VALUES (114, '1', '', '', '', '', 0, 56, '0000-00-00 00:00:00', '20', '大巴', 3);
INSERT INTO `pmo_travel_province` VALUES (115, '1', '', '', '', '', 0, 56, '0000-00-00 00:00:00', '20', '大巴', 3);
INSERT INTO `pmo_travel_province` VALUES (116, '张', '', '', '', '', 0, 93, '0000-00-00 00:00:00', '11', '', 0);
INSERT INTO `pmo_travel_province` VALUES (117, '1', '', '11', '0001-01-01T01:01', '11', 0, 94, '0000-00-00 00:00:00', '1', '', 0);
INSERT INTO `pmo_travel_province` VALUES (118, '讲师', '2018-12-27T11:11', '北京', '2018-12-27T12:12', '上海', 0, 119, '0000-00-00 00:00:00', '500', '飞机', 2);
INSERT INTO `pmo_travel_province` VALUES (119, '讲师', '2018-12-27T11:11', '北京1', '2018-12-28T14:44', '上海', 0, 119, '0000-00-00 00:00:00', '500', '飞机', 2);
INSERT INTO `pmo_travel_province` VALUES (120, '1', '0001-01-01T01:01', '1', '', '1', 0, 121, '0000-00-00 00:00:00', '1', '火车', 1);
INSERT INTO `pmo_travel_province` VALUES (123, '长途人员', '2018-12-27T11:11', '北京', '2018-12-27T22:22', '北京', 0, 127, '0000-00-00 00:00:00', '1000', '飞机', 2);
INSERT INTO `pmo_travel_province` VALUES (122, '2', '', '', '', '1', 0, 120, '0000-00-00 00:00:00', '1', '', 0);
INSERT INTO `pmo_travel_province` VALUES (124, '', '', '', '', '', 0, 131, '0000-00-00 00:00:00', '1', '', 0);
INSERT INTO `pmo_travel_province` VALUES (125, '', '', '', '', '', 0, 134, '0000-00-00 00:00:00', '1', '', 0);
INSERT INTO `pmo_travel_province` VALUES (126, '徐全', '2018-12-01T12:12', '北京', '2018-12-05T12:12', '上海', 0, 139, '0000-00-00 00:00:00', '555', '火车', 1);

-- ----------------------------
-- Table structure for pmo_travel_stay
-- ----------------------------
DROP TABLE IF EXISTS `pmo_travel_stay`;
CREATE TABLE `pmo_travel_stay`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_expense_people` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '住宿费人姓名',
  `hotel_expense_days` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '天数',
  `hotel_expense_total` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '总价',
  `parent_id` int(11) NULL DEFAULT NULL,
  `state` tinyint(2) NULL DEFAULT 0,
  `now_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '住宿安排' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_travel_stay
-- ----------------------------
INSERT INTO `pmo_travel_stay` VALUES (49, '1', '11', '1', 94, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (50, '', '', '', 94, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (51, '2', '5', '6', 119, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (53, '住宿人', '1', '200', 127, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (54, '张剑', '4', '2000', 129, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (55, '', '', '3', 131, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (56, '', '', '3', 134, 0, NULL);
INSERT INTO `pmo_travel_stay` VALUES (57, '寇艳艳', '4', '2000', 139, 0, NULL);

-- ----------------------------
-- Table structure for pmo_user
-- ----------------------------
DROP TABLE IF EXISTS `pmo_user`;
CREATE TABLE `pmo_user`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '账户名称',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '密码',
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_user
-- ----------------------------
INSERT INTO `pmo_user` VALUES (1, '柳芳', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (2, '宋丹', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (3, '吴宝辉', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (4, '亢鹏', 'e10adc39', 'eTDYpuZXhn');
INSERT INTO `pmo_user` VALUES (5, '吴春霞', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (6, '庞海燕', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (7, '李萍', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (8, '吴美宏', 'e10adc39', '2yLjenCRKF');
INSERT INTO `pmo_user` VALUES (9, '田野', 'e10adc39', 'emgYtKXaxh');
INSERT INTO `pmo_user` VALUES (10, '段美静', 'e10adc39', 'krLj3PG7iH');
INSERT INTO `pmo_user` VALUES (11, '耿伟宁', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (12, '刘明', 'e10adc39', 'IcHYR8j3DM');
INSERT INTO `pmo_user` VALUES (13, '冯津津', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (14, '刘静', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (15, '黄嘉丽', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (16, '杜刚利', 'e10adc39', 'vEIcXCtVLD');
INSERT INTO `pmo_user` VALUES (17, '于化龙', 'e10adc39', 'ZrG16ctiNI');
INSERT INTO `pmo_user` VALUES (18, '李忻怡', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (19, '李旋', 'e10adc39', 'EbUs6YVZxp');
INSERT INTO `pmo_user` VALUES (20, '陈丽', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (21, '曲鹤', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (22, '温越', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (23, '廖志敏', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (24, '糜研', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (25, '孙江微', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (26, '张婧竹', 'e10adc39', 'VpnqJCot2f');
INSERT INTO `pmo_user` VALUES (27, '穆连', 'e10adc39', '9FnoTZsgIm');
INSERT INTO `pmo_user` VALUES (28, '褚寅良', 'e10adc39', 'RFW5KJsI7S');
INSERT INTO `pmo_user` VALUES (29, '侍尧', 'e10adc39', 'iwtDKmT07n');
INSERT INTO `pmo_user` VALUES (30, '崔思思', 'e10adc39', 'InpbCxNiLy');
INSERT INTO `pmo_user` VALUES (31, '刘雪松', 'e10adc39', '7LAIO1Gy9R');
INSERT INTO `pmo_user` VALUES (32, '寇艳艳', 'e10adc39', 'i10ofhlwne');
INSERT INTO `pmo_user` VALUES (33, '张剑', 'e10adc39', 'svfihWgb7I');
INSERT INTO `pmo_user` VALUES (34, '测试', 'e10adc39', 'B76xnyRd3g');
INSERT INTO `pmo_user` VALUES (35, '测试1', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (36, '测试2', 'e10adc39', '5v8Tqc6hFS');
INSERT INTO `pmo_user` VALUES (37, '测试3', 'e10adc39', NULL);
INSERT INTO `pmo_user` VALUES (38, '测试4', 'e10adc39', NULL);

-- ----------------------------
-- Table structure for pmo_view_json
-- ----------------------------
DROP TABLE IF EXISTS `pmo_view_json`;
CREATE TABLE `pmo_view_json`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `state` tinyint(2) NULL DEFAULT 0 COMMENT '默认为0 1为修改后',
  `mode` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '模块',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 103 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '视图json' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_view_json
-- ----------------------------
INSERT INTO `pmo_view_json` VALUES (1, 'addProject', '新建项目', 'formlist', '{\"form-temp-name\":\"新建项目\",\"form-list\":[{\"id_name\":\"project_project_template\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"项目模板\",\"tip\":\"\",\"add_button\":\"projecttemplat\",\"descript\":\"\",\"before_api_uri\":\"project_type_list\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"保存\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"project_manage_add\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (2, 'eidtProjectGather', '编辑项目集', 'formlist', '{\"form-temp-name\":\"编辑项目集\",\"form-list\":[{\"id_name\":\"name\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"项目集名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_manage_sale\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"销售负责人\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"staff_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"program_customer\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"客户名称\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_training_ares\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"培训地点\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"addProjectAddress\",\"descript\":\"\",\"before_api_uri\":\"project_address_list\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"program_manage_add\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (3, 'addTeacher', '新建讲师', 'formlist', '{\"form-temp-name\":\"新建讲师\",\"form-list\":[{\"id_name\":\"teacher_name\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"讲师姓名\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"讲师姓名\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_price\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"常用单价\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_cooperation_model\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"合作模式\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"lecturer_manage_cooperation\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"保存\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"lecturer_manage_add\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (4, 'editProject', '编辑项目', 'formlist', '{\"form-temp-name\":\"编辑项目\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_gather\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"所属项目集\",\"tip\":\"\",\"add_button\":\"addProjectGather\",\"descript\":\"\",\"before_api_uri\":\"program_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_person_in_charge\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"实施负责人\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"staff_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_leader\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"项目负责人\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"staff_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_customer_name\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"客户名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_days\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_start_date\",\"type_name\":\"TextDate\",\"key\":\"\",\"title\":\"培训开始日期\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_end_date\",\"type_name\":\"TextDate\",\"key\":\"\",\"title\":\"培训结束日期\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_training_numbers\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"培训人数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_training_ares\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"培训地点\",\"tip\":\"\",\"add_button\":\"addProjectAddress\",\"descript\":\"\",\"before_api_uri\":\"project_address_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_income\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"应收款\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_tax_rate\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"税金\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"institutional_consulting_fees\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"机构咨询费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"personal_consulting_fees\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"个人咨询费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"保存\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"project_data_edit\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (5, 'addProjectAddress', '新增培训地点', 'formlist', '{\"form-temp-name\":\"新增培训地点\",\"form-list\":[{\"id_name\":\"province\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"省\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"project_address_province\",\"after_api_uri\":\"\"},{\"id_name\":\"city\",\"type_name\":\"SelectListSearch\",\"key\":\"\",\"title\":\"市\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"project_address_city\",\"after_api_uri\":\"\"},{\"id_name\":\"detailed_address\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"详细地址\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"保存\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"project_address_add\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (6, 'teacherCardGroup', '讲师安排', 'group', '{\"form-temp-name\":\"讲师安排\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"讲师安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"lecturer\",\"descript\":\"teacherAddForm\",\"add_button_title\":\"讲师安排修改\",\"descript_title\":\"讲师安排-组\",\"add_title\":\"添加讲师安排\",\"edit_button\":\"lecturer_plan_edit\",\"del_button\":\"lecturer_plan_del\",\"list_button\":\"lecturer_plan_getByProjectId\",\"add_button\":\"lecturer_plan_add\"}}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (7, 'teacherAddForm', '讲师安排-组', 'formlist', '{\"form-temp-name\":\"讲师安排-组\",\"form-list\":[{\"id_name\":\"teacher_name\",\"type_name\":\"ListTextSearch\",\"key\":\"\",\"title\":\"讲师姓名\",\"tip\":\"\",\"add_button\":\"addTeacher\",\"descript\":\"\",\"before_api_uri\":\"lecturer_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_income_tax\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"所得税\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_lecture_fee\",\"type_name\":\"TextMoney\",\"key\":\"3000\",\"title\":\"讲课费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_lecture_days\",\"type_name\":\"TextMoney\",\"key\":\"5\",\"title\":\"课程天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"teacher_duty\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"职责\",\"tip\":\"\",\"add_button\":\"teacherDuty\",\"descript\":\"\",\"before_api_uri\":\"lecturer_duty_list\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (8, 'implementArrage', '实施安排', 'group', '{\"form-temp-name\":\"实施安排\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"venue_arrange\",\"type_name\":\"CardGroup\",\"title\":\"会场安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"venue\",\"descript\":\"venueAddFrom\",\"add_button_title\":\"会场安排修改\",\"descript_title\":\"会场安排-组\",\"add_title\":\"添加会场安排\",\"edit_button\":\"implement_venue_edit\",\"del_button\":\"implement_venue_del\",\"list_button\":\"implement_plan_getByProjectId\",\"add_button\":\"implement_venue_add\"}},{\"id_name\":\"implement_arrange\",\"type_name\":\"CardGroup\",\"title\":\"实施安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"implement\",\"descript\":\"implementAddFrom\",\"add_button_title\":\"实施安排修改\",\"descript_title\":\"实施安排-组\",\"edit_button\":\"implement_plan_edit\",\"del_button\":\"\",\"list_button\":\"implement_plan_getByProjectId\",\"add_button\":\"\"}}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (9, 'implementAddFrom', '其他实施费用-组', 'formlist', '{\"form-temp-name\":\"其他实施费用-组\",\"form-list\":[{\"id_name\":\"material_cost\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"教材费用\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"equipment_cost\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"设备费用\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"examination_fee\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"考试费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"tea_break\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"茶歇\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"stationery\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"文具\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hospitality\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"招待费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"postage\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"邮寄快递\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '系统视图');
INSERT INTO `pmo_view_json` VALUES (10, 'venueAddFrom', '会场安排-组', 'formlist', '{\"form-temp-name\":\"会场安排-组\",\"form-list\":[{\"id_name\":\"meetingplace_address\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"会场地址\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"unit_price\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"单价\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"days\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"total_price\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"总价\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (11, 'travelExpensesGroup', '差旅安排', 'group', '{\"form-temp-name\":\"差旅安排\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card\",\"type_name\":\"CardGroup\",\"title\":\"长途交通费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"province\",\"add_button\":\"travel_longTraffic_add\",\"descript\":\"longTravelAddFrom\",\"add_button_title\":\"长途交通费修改\",\"descript_title\":\"长途交通费-组\",\"add_title\":\"添加长途交通费\",\"edit_button\":\"travel_longTraffic_edit\",\"del_button\":\"travel_longTraffic_del\",\"list_button\":\"travel_plan_getByProjectId\"}},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"市内交通费\",\"add_button_title\":\"添加市内交通费\",\"before_api_uri\":\"city\",\"add_button\":{\"before_api_uri\":\"city\",\"descript\":\"shortTravelAddFrom\",\"add_button_title\":\"市内交通费修改\",\"descript_title\":\"市内交通费-组\",\"add_title\":\"添加市内交通费\",\"edit_button\":\"travel_inCityTraffic_edit\",\"del_button\":\"travel_inCityTraffic_del\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"travel_inCityTraffic_add\"}},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"住宿费\",\"add_button_title\":\"添加住宿费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"stay\",\"descript\":\"hotelTravelAddFrom\",\"add_button_title\":\"住宿费修改\",\"descript_title\":\"住宿费-组\",\"add_title\":\"添加住宿费\",\"edit_button\":\"travel_hotel_edit\",\"del_button\":\"travel_hotel_del\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"travel_hotel_add\"}},{\"id_name\":\"meal_fee_card\",\"type_name\":\"CardGroup\",\"title\":\"餐费\",\"add_button_title\":\"添加餐费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"meal\",\"descript\":\"mealTravelAddFrom\",\"add_button_title\":\"餐费修改\",\"descript_title\":\"餐费-组\",\"add_title\":\"添加餐费\",\"edit_button\":\"travel_meal_edit\",\"del_button\":\"travel_meal_del\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"travel_meal_add\"}}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (12, 'longTravelAddFrom', '长途交通费-组', 'formlist', '{\"form-temp-name\":\"长途交通费-组\",\"form-list\":[{\"id_name\":\"long_fee_card_people\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"人员\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_start_time\",\"type_name\":\"TextDatetime\",\"key\":\"\",\"title\":\"出发时间\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_start_place\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"出发地点\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_end_time\",\"type_name\":\"TextDatetime\",\"key\":\"\",\"title\":\"结束时间\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_end_place\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"结束地点\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_vehicle\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"交通工具\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"travel_longTrafficType_list\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card_fee\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"金额\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '系统视图');
INSERT INTO `pmo_view_json` VALUES (13, 'shortTravelAddFrom', '市内交通费-组', 'formlist', '{\"form-temp-name\":\"市内交通费-组\",\"form-list\":[{\"id_name\":\"short_fee_card_people\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"人员\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"short_fee_type\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"费用类型\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"short_fee\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"费用\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (14, 'hotelTravelAddFrom', '住宿费-组', 'formlist', '{\"form-temp-name\":\"住宿费-组\",\"form-list\":[{\"id_name\":\"hotel_expense_people\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"人员\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hotel_expense_days\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hotel_expense_total\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"费用总价\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '系统视图');
INSERT INTO `pmo_view_json` VALUES (15, 'mealTravelAddFrom', '餐费-组', 'formlist', '{\"form-temp-name\":\"餐费-组\",\"form-list\":[{\"id_name\":\"meal_fee_people\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"人员\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"travel_meal_people\",\"after_api_uri\":\"\"},{\"id_name\":\"meal_fee_days\",\"type_name\":\"MutiText\",\"key\":\"\",\"title\":\"天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"meal_fee\",\"type_name\":\"TextMoney\",\"key\":\"\",\"title\":\"金额\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"meal_fee_remarks\",\"type_name\":\"TextArea\",\"key\":\"\",\"title\":\"备注\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '系统视图');
INSERT INTO `pmo_view_json` VALUES (16, 'projectViewCard', '项目列表-卡片', 'cards', '{\"form-temp-name\":\"项目列表-卡片\",\"form-list\":[{\"id_name\":\"card_frame\",\"type_name\":\"Cards\",\"key\":\"\",\"title\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_card_head\",\"type_name\":\"CardHead\",\"title\":\"项目列表-卡片头\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardHead\"},{\"id_name\":\"project_card_body\",\"type_name\":\"CardBody\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_show_manage\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面1\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage1\"},{\"id_name\":\"project_edit_btns\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面2\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage2\"},{\"id_name\":\"project_approve_btns\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面3\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage3\"}]},{\"id_name\":\"project_card_open\",\"type_name\":\"CardOpen\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\"},{\"id_name\":\"project_card_foot\",\"type_name\":\"CardFoot\",\"title\":\"项目列表-卡片尾\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardFoot\"}],\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (17, 'projectCardHead', '项目列表-卡片头', 'formlist', '{\"form-temp-name\":\"项目列表-卡片头\",\"form-list\":[{\"id_name\":\"project_project_template_name\",\"type_name\":\"CardItem\",\"title\":\"项目类型\",\"default_value\":\"未设置项目类型\"},{\"id_name\":\"unicode\",\"type_name\":\"CardItem\",\"title\":\"班级编号\",\"default_value\":\"未设置班级编号\"},{\"id_name\":\"project_person_in_charge_name\",\"type_name\":\"CardItem\",\"title\":\"班主任\",\"default_value\":\"未设置班主任\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (18, 'projectCardPage1', '项目列表-页面1', 'formlist', '{\"form-temp-name\":\"项目列表-页面1\",\"form-list\":[{\"id_name\":\"project_name\",\"type_name\":\"TitleLeftCard\",\"title\":\"课程名称:\",\"default_value\":\"未设置课程名称\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturers\",\"type_name\":\"TitleCardRightGroup\",\"before_api_uri\":\"teacher_name_name\",\"title\":\"\",\"default_value\":\"未设置讲师\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_date\",\"type_name\":\"DateCard\",\"title\":\"\",\"default_value\":\"未设置日期\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_traing_ares\",\"type_name\":\"ProvinceCity\",\"title\":\"\",\"default_value\":\"未设置地区\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"address\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置地址\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_days\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置天数\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_customer_name\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置客户\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_gather_name\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置项目集\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"costing\",\"type_name\":\"LabelTotalMessage\",\"class\":\"\",\"key\":\"\",\"title\":\"项目总成本\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"总成本\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"expected_income\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目应收款\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_profit\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目毛利润\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"gross_interest_rate\",\"type_name\":\"LabelTotalMessage\",\"title\":\"毛利率\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"labor_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"人工成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturer\",\"type_name\":\"SpellingCardGroup\",\"title\":\"讲师成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implementation_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"实施成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"venue\",\"type_name\":\"LoopCardMoneyGroup\",\"title\":\"会议室成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implement\",\"type_name\":\"LabelChildMessage\",\"before_api_uri\":\"material_cost,equipment_cost,examination_fee,tea_break,stationery,hospitality,postage\",\"title\":\"教材费用,设备费用,考试费,茶歇,文具,招待费,邮寄快递\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"travel_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"差旅成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"city\",\"type_name\":\"LabelMessage\",\"title\":\"市内交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"province\",\"type_name\":\"LabelMessage\",\"title\":\"长途交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"stay\",\"type_name\":\"LabelMessage\",\"title\":\"住宿\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"meal\",\"type_name\":\"LabelMessage\",\"title\":\"餐费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"consulting_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"咨询成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"institutional_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"机构咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"personal_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"个人咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_tax_rate\",\"type_name\":\"LabelTitleMessage\",\"class\":\"\",\"key\":\"\",\"title\":\"税金\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"税率\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (19, 'projectCardPage2', '项目列表-页面2', 'formlist', '{\"form-temp-name\":\"项目列表-页面2\",\"form-list\":[{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"基础信息修改\",\"tip\":\"\",\"add_button\":\"editProject\",\"descript\":\"Link按钮\",\"before_api_uri\":\"project_data_getByProjectId\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"讲师安排\",\"tip\":\"\",\"add_button\":\"teacherCardGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"lecturer_plan_getByProjectId\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"实施安排\",\"tip\":\"\",\"add_button\":\"implementArrage\",\"descript\":\"Link按钮\",\"before_api_uri\":\"implement_plan_getByProjectId\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"差旅安排\",\"tip\":\"\",\"add_button\":\"travelExpensesGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"travel_plan_getByProjectId\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"Print\",\"class\":\"\",\"key\":\"loan_print\",\"title\":\"借款单\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"Print\",\"class\":\"\",\"key\":\"pay_box\",\"title\":\"支出单\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"Print\",\"class\":\"\",\"key\":\"travel_big_box\",\"title\":\"差旅借款单\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"Print\",\"class\":\"\",\"key\":\"travel_exp_box\",\"title\":\"差旅报销单\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (42, 'projectGatherPage3', '所属项目集-页面3', 'formlist', '{\"form-temp-name\":\"所属项目集-页面3\",\"form-list\":[]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (21, 'projectCardFoot', '项目列表-卡片尾', 'formlist', '{\"form-temp-name\":\"项目列表-卡片尾\",\"form-list\":[{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"项目信息\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"编辑项目\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"审批项目\",\"descript\":\"card按钮\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (22, 'newCard', '新增卡片', 'formlist', '{\"form-temp-name\":\"新增卡片\",\"form-list\":[{\"id_name\":\"card_frame\",\"type_name\":\"Cards\",\"key\":\"\",\"title\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"\",\"type_name\":\"CardHead\",\"title\":\"项目列表-卡片头\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardHead\"},{\"id_name\":\"\",\"type_name\":\"CardBody\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面1\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage1\"},{\"id_name\":\"\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面2\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage2\"},{\"id_name\":\"project_approve_btns\",\"type_name\":\"CardPage\",\"title\":\"项目列表-页面3\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardPage3\"}]},{\"id_name\":\"\",\"type_name\":\"CardOpen\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\"},{\"id_name\":\"\",\"type_name\":\"CardFoot\",\"title\":\"项目列表-卡片尾\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectCardFoot\"}],\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (23, 'newFormlistGroup', '新增formlist', 'formlist', '{\"form-temp-name\":\"新增formlist\",\"form-list\":[{\"id_name\":\"\",\"type_name\":\"MutiText\",\"class\":\"class\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '项目管理');
INSERT INTO `pmo_view_json` VALUES (40, 'projectCardPage3', '项目列表-页面3', 'formlist', '{\"form-temp-name\":\"项目列表-页面3\",\"form-list\":[{\"id_name\":\"\",\"type_name\":\"ApplicationsState\",\"class\":\"card_budget,message_label,status_box\",\"key\":\"budget\",\"title\":\"预算\",\"default_value\":\"预算状态\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"SubmitApplications\",\"class\":\"card_budget_btn,btn_list\",\"key\":\"budget\",\"title\":\"预算\",\"default_value\":\"预算提交按钮\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"examine_manage_commitbudget,examine_manage_cancelbudget\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"ApplicationsState\",\"class\":\"card_final_accounts,message_label,status_box\",\"key\":\"finalAccounts\",\"title\":\"决算\",\"default_value\":\"决算\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"SubmitApplications\",\"class\":\"card_budget_btn,btn_list\",\"key\":\"finalAccounts\",\"title\":\"决算\",\"default_value\":\"决算提交按钮\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"examine_manage_commitfinal,examine_manage_cancelfinal\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (37, 'projectGatherFoot', '所属项目集-卡片尾', 'formlist', '{\"form-temp-name\":\"所属项目集-卡片尾\",\"form-list\":[{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"key\":\"\",\"title\":\"展示项目集\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"card按钮\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"key\":\"\",\"title\":\"编辑项目集\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"card按钮\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"card按钮\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (35, 'projectGatherPage2', '所属项目集-页面2', 'formlist', '{\"form-temp-name\":\"所属项目集-页面2\",\"form-list\":[{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"编辑\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"program_data_getByProjectId\",\"descript\":\"Link按钮\",\"before_api_uri\":\"eidtProjectGather\",\"after_api_uri\":\"\"}]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (33, 'ProjectGatherHead', '所属项目集-卡片头', 'formlist', '{\"form-temp-name\":\"所属项目集-卡片头\",\"form-list\":[{\"id_name\":\"program_type\",\"type_name\":\"CardItem\",\"key\":\"未设置项目类型\",\"title\":\"项目类型\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"unicode\",\"type_name\":\"CardItem\",\"key\":\"\",\"title\":\"项目集编号\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_manage_sale\",\"type_name\":\"CardItem\",\"key\":\"项目集负责人\",\"title\":\"项目集负责人\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (41, 'addProjectGather', '新建项目集', 'formlist', '{\"form-temp-name\":\"新建项目集\",\"form-list\":[{\"id_name\":\"project_gather_project_template\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"项目模板\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"projecttemplat\",\"descript\":\"\",\"before_api_uri\":\"project_type_list\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"SelectListLocal\",\"class\":\"\",\"key\":\"1,2,3\",\"title\":\"下拉选择\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"hold_btn\",\"type_name\":\"HoldBtn\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"保存按钮\",\"before_api_uri\":\"program_manage_add\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (32, 'projectGatherCards', '所属项目集-卡片', 'cards', '{\"form-temp-name\":\"所属项目集-卡片\",\"form-list\":[{\"id_name\":\"card_frame\",\"type_name\":\"Cards\",\"key\":\"\",\"title\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"\",\"type_name\":\"CardHead\",\"title\":\"所属项目集-卡片头\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"ProjectGatherHead\"},{\"id_name\":\"\",\"type_name\":\"CardBody\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"\",\"type_name\":\"CardPage\",\"title\":\"所属项目集-页面1\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"programCardPage1\"},{\"id_name\":\"\",\"type_name\":\"CardPage\",\"title\":\"所属项目集-页面2\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectGatherPage2\"},{\"id_name\":\"project_approve_btns\",\"type_name\":\"CardPage\",\"title\":\"所属项目集-页面3\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectGatherPage3\"}]},{\"id_name\":\"\",\"type_name\":\"CardOpen\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\"},{\"id_name\":\"\",\"type_name\":\"CardFoot\",\"title\":\"所属项目集-卡片尾\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"projectGatherFoot\"}],\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (91, 'budgetTeacherCardGroup', '讲师信息', 'formlist', '{\"form-temp-name\":\"讲师信息\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"讲师安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"lecturer\",\"descript\":\"teacherAddForm\",\"add_button_title\":\"讲师安排修改\",\"descript_title\":\"讲师安排-组\",\"add_title\":\"添加讲师安排\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"lecturer_plan_getByProjectId\",\"add_button\":\"\"}}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (92, 'budgetImplementArrage', '实施信息', 'group', '{\"form-temp-name\":\"实施信息\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"venue_arrange\",\"type_name\":\"CardGroup\",\"title\":\"会场安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"venue\",\"descript\":\"venueAddFrom\",\"add_button_title\":\"会场安排修改\",\"descript_title\":\"会场安排-组\",\"add_title\":\"添加会场安排\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"implement_plan_getByProjectId\",\"add_button\":\"\"}},{\"id_name\":\"implement_arrange\",\"type_name\":\"CardGroup\",\"title\":\"实施安排\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"implement\",\"descript\":\"implementAddFrom\",\"add_button_title\":\"实施安排修改\",\"descript_title\":\"实施安排-组\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"implement_plan_getByProjectId\",\"add_button\":\"\"}}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (93, 'budgetTravelExpensesGroup', '差旅信息', 'group', '{\"form-temp-name\":\"差旅信息\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"long_fee_card\",\"type_name\":\"CardGroup\",\"title\":\"长途交通费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"province\",\"add_button\":\"\",\"descript\":\"longTravelAddFrom\",\"add_button_title\":\"长途交通费修改\",\"descript_title\":\"长途交通费-组\",\"add_title\":\"添加长途交通费\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"travel_plan_getByProjectId\"}},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"市内交通费\",\"add_button_title\":\"添加市内交通费\",\"before_api_uri\":\"city\",\"add_button\":{\"before_api_uri\":\"city\",\"descript\":\"shortTravelAddFrom\",\"add_button_title\":\"市内交通费修改\",\"descript_title\":\"市内交通费-组\",\"add_title\":\"添加市内交通费\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"\"}},{\"id_name\":\"\",\"type_name\":\"CardGroup\",\"title\":\"住宿费\",\"add_button_title\":\"添加住宿费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"stay\",\"descript\":\"hotelTravelAddFrom\",\"add_button_title\":\"住宿费修改\",\"descript_title\":\"住宿费-组\",\"add_title\":\"添加住宿费\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"\"}},{\"id_name\":\"meal_fee_card\",\"type_name\":\"CardGroup\",\"title\":\"餐费\",\"add_button_title\":\"添加餐费\",\"before_api_uri\":\"\",\"add_button\":{\"before_api_uri\":\"meal\",\"descript\":\"mealTravelAddFrom\",\"add_button_title\":\"餐费修改\",\"descript_title\":\"餐费-组\",\"add_title\":\"添加餐费\",\"edit_button\":\"\",\"del_button\":\"\",\"list_button\":\"travel_plan_getByProjectId\",\"add_button\":\"\"}}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (84, 'budgetViewCard', '预算-卡片', 'cards', '{\"form-temp-name\":\"预算-卡片\",\"form-list\":[{\"id_name\":\"card_frame\",\"type_name\":\"Cards\",\"key\":\"\",\"title\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_card_head\",\"type_name\":\"CardHead\",\"title\":\"预算-卡片头\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"budgetCardHead\"},{\"id_name\":\"project_card_body\",\"type_name\":\"CardBody\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_show_manage\",\"type_name\":\"CardPage\",\"title\":\"预算-页面1\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"budgetCardPage1\"},{\"id_name\":\"project_edit_btns\",\"type_name\":\"CardPage\",\"title\":\"预算-页面2\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"budgetCardPage2\"},{\"id_name\":\"project_approve_btns\",\"type_name\":\"CardPage\",\"title\":\"预算-页面3\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"budgetCardPage3\"}]},{\"id_name\":\"project_card_open\",\"type_name\":\"CardOpen\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\"},{\"id_name\":\"project_card_foot\",\"type_name\":\"CardFoot\",\"title\":\"预算-卡片尾\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"budgetCardFoot\"}],\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (90, 'projectMessage', '项目信息', 'formlist', '{\"form-temp-name\":\"项目信息\",\"form-list\":[{\"id_name\":\"unicode\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"项目编号\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"课程名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_gather\",\"type_name\":\"SelectList\",\"key\":\"\",\"title\":\"所属项目集\",\"tip\":\"\",\"add_button\":\"addProjectGather\",\"descript\":\"\",\"before_api_uri\":\"program_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_person_in_charge\",\"type_name\":\"DisSelectList\",\"key\":\"\",\"title\":\"实施负责人\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"staff_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_leader\",\"type_name\":\"DisSelectList\",\"key\":\"\",\"title\":\"项目负责人\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"staff_manage_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_customer_name\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"客户名称\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_days\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"天数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_start_date\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"培训开始日期\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_end_date\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"培训结束日期\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_training_numbers\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"培训人数\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_training_ares\",\"type_name\":\"DisSelectList\",\"key\":\"\",\"title\":\"培训地点\",\"tip\":\"\",\"add_button\":\"addProjectAddress\",\"descript\":\"\",\"before_api_uri\":\"project_address_list\",\"after_api_uri\":\"\"},{\"id_name\":\"project_income\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"收入\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_tax_rate\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"税率\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"institutional_consulting_fees\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"机构咨询费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"personal_consulting_fees\",\"type_name\":\"DisTextField\",\"key\":\"\",\"title\":\"个人咨询费\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (85, 'budgetCardHead', '预算-卡片头', 'formlist', '{\"form-temp-name\":\"预算-卡片头\",\"form-list\":[{\"id_name\":\"project_project_template_name\",\"type_name\":\"CardItem\",\"title\":\"项目类型\",\"default_value\":\"未设置项目类型\"},{\"id_name\":\"unicode\",\"type_name\":\"CardItem\",\"title\":\"班级编号\",\"default_value\":\"未设置班级编号\"},{\"id_name\":\"project_person_in_charge_name\",\"type_name\":\"CardItem\",\"title\":\"班主任\",\"default_value\":\"未设置班主任\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (86, 'budgetCardPage1', '预算-页面1', 'formlist', '{\"form-temp-name\":\"预算-页面1\",\"form-list\":[{\"id_name\":\"project_name\",\"type_name\":\"TitleLeftCard\",\"title\":\"课程名称:\",\"default_value\":\"未设置课程名称\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturers\",\"type_name\":\"TitleCardRightGroup\",\"before_api_uri\":\"teacher_name_name\",\"title\":\"\",\"default_value\":\"未设置讲师\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"SpellMessage\",\"class\":\"budget_menu,spelling_div,spelling_label,spelling_content\",\"key\":\"\",\"title\":\"收入,成本,利润\",\"default_value\":\"收入,成本,利润\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"project_income,costing,project_profit\",\"after_api_uri\":\"\"},{\"id_name\":\"gross_interest_rate\",\"type_name\":\"CardRightBody\",\"class\":\"\",\"key\":\"\",\"title\":\"利润率\",\"default_value\":\"利润率\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"毛利率\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_date\",\"type_name\":\"DateCard\",\"title\":\"\",\"default_value\":\"未设置日期\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_traing_ares\",\"type_name\":\"ProvinceCity\",\"title\":\"\",\"default_value\":\"未设置地区\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"address\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置地址\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_days\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置天数\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_customer_name\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置客户\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_gather_name\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置项目集\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"expected_income\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目应收款\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_profit\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目利润\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"gross_interest_rate\",\"type_name\":\"LabelTotalMessage\",\"title\":\"毛利率\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"labor_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"人工成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturer\",\"type_name\":\"SpellingCardGroup\",\"title\":\"讲师成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implementation_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"实施成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"venue\",\"type_name\":\"LoopCardMoneyGroup\",\"title\":\"会议室成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implement\",\"type_name\":\"LabelChildMessage\",\"before_api_uri\":\"material_cost,equipment_cost,examination_fee,tea_break,stationery,hospitality,postage\",\"title\":\"教材费用,设备费用,考试费,茶歇,文具,招待费,邮寄快递\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"travel_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"差旅成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"city\",\"type_name\":\"LabelMessage\",\"title\":\"市内交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"province\",\"type_name\":\"LabelMessage\",\"title\":\"长途交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"stay\",\"type_name\":\"LabelMessage\",\"title\":\"住宿\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"meal\",\"type_name\":\"LabelMessage\",\"title\":\"餐费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"consulting_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"咨询成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"institutional_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"机构咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"personal_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"个人咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (87, 'budgetCardPage2', '预算-页面2', 'formlist', '{\"form-temp-name\":\"预算-页面2\",\"form-list\":[{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"项目信息\",\"tip\":\"\",\"add_button\":\"projectMessage\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_budget_project\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"讲师信息\",\"tip\":\"\",\"add_button\":\"budgetTeacherCardGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_budget_lecturer\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"实施信息\",\"tip\":\"\",\"add_button\":\"budgetImplementArrage\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_budget_implement\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"差旅信息\",\"tip\":\"\",\"add_button\":\"budgetTravelExpensesGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_budget_travel\",\"after_api_uri\":\"\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (88, 'budgetCardPage3', '预算-页面3', 'formlist', '{\"form-temp-name\":\"预算-页面3\",\"form-list\":[{\"id_name\":\"\",\"type_name\":\"IsAgreeApplications\",\"class\":\"card_ask\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"预算审批\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"examine_manage_agree,examine_manage_refuse\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"LabelShowMessage\",\"class\":\"card_approval\",\"key\":\"\",\"title\":\"审批流程\",\"default_value\":\"审批流程\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"application_people\",\"type_name\":\"GetDataSpellingLabel\",\"class\":\"card_launch_approval\",\"key\":\"\",\"title\":\"发起审批\",\"default_value\":\"发起审批\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"提交申请人\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"application_time\",\"type_name\":\"ApplicationsDefault\",\"class\":\"card_get_time\",\"key\":\"\",\"title\":\"提交申请时间\",\"default_value\":\"提交申请时间\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"提交申请时间\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"ApplicationsFlow\",\"class\":\"status_flow,message_left,message_right\",\"key\":\"budget\",\"title\":\"审批流程\",\"default_value\":\"审批流程列\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (89, 'budgetCardFoot', '预算-卡片尾', 'formlist', '{\"form-temp-name\":\"预算-卡片尾\",\"form-list\":[{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"预算详情\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"项目详情\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"审批进度\",\"descript\":\"card按钮\"}]}', 0, '预算');
INSERT INTO `pmo_view_json` VALUES (83, 'programCardPage1', '所属项目集-页面1', 'formlist', '{\"form-temp-name\":\"所属项目集-页面1\",\"form-list\":[{\"id_name\":\"name\",\"type_name\":\"TitleLeftCard\",\"title\":\"\",\"default_value\":\"项目集名称\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_time\",\"type_name\":\"TitleRightCard\",\"before_api_uri\":\"\",\"title\":\"\",\"default_value\":\"创建时间\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_customer\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"客户名称\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_training_ares\",\"type_name\":\"ProvinceCity\",\"title\":\"\",\"default_value\":\"地区\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_project_list\",\"type_name\":\"TitleMessage\",\"title\":\"项目列表\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_project_list\",\"type_name\":\"LoopCardGroup\",\"title\":\"项目列表\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"name\",\"after_api_uri\":\"\"},{\"id_name\":\"program_contacts_list_name\",\"type_name\":\"TitleMessage\",\"key\":\"\",\"title\":\"联系人列表\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"program_contacts_list\",\"type_name\":\"LoopCardGroup\",\"key\":\"\",\"title\":\"联系人列表\",\"default_value\":\"默认值\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"name,position\",\"after_api_uri\":\"\"}]}', 0, '所属项目集');
INSERT INTO `pmo_view_json` VALUES (98, 'finalViewCard', '决算-卡片', 'formlist', '{\"form-temp-name\":\"决算-卡片\",\"form-list\":[{\"id_name\":\"card_frame\",\"type_name\":\"Cards\",\"key\":\"\",\"title\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_card_head\",\"type_name\":\"CardHead\",\"title\":\"决算-卡片头\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"finalCardHead\"},{\"id_name\":\"project_card_body\",\"type_name\":\"CardBody\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":[{\"id_name\":\"project_show_manage\",\"type_name\":\"CardPage\",\"title\":\"决算-页面1\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"finalCardPage1\"},{\"id_name\":\"project_edit_btns\",\"type_name\":\"CardPage\",\"title\":\"决算-页面2\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"finalCardPage2\"},{\"id_name\":\"project_approve_btns\",\"type_name\":\"CardPage\",\"title\":\"决算-页面3\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"finalCardPage3\"}]},{\"id_name\":\"project_card_open\",\"type_name\":\"CardOpen\",\"title\":\"\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\"},{\"id_name\":\"project_card_foot\",\"type_name\":\"CardFoot\",\"title\":\"决算-卡片尾\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"finalCardFoot\"}],\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '决算');
INSERT INTO `pmo_view_json` VALUES (96, 'finalCardPage1', '决算-页面1', 'formlist', '{\"form-temp-name\":\"决算-页面1\",\"form-list\":[{\"id_name\":\"project_name\",\"type_name\":\"TitleLeftCard\",\"title\":\"课程名称:\",\"default_value\":\"未设置课程名称\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturers\",\"type_name\":\"TitleCardRightGroup\",\"before_api_uri\":\"teacher_name_name\",\"title\":\"\",\"default_value\":\"未设置讲师\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"SpellMessage\",\"class\":\"budget_menu,spelling_div,spelling_label,spelling_content\",\"key\":\"\",\"title\":\"收入,成本,利润\",\"default_value\":\"收入,成本,利润\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"project_income,costing,project_profit\",\"after_api_uri\":\"\"},{\"id_name\":\"gross_interest_rate\",\"type_name\":\"CardRightBody\",\"class\":\"\",\"key\":\"\",\"title\":\"利润率\",\"default_value\":\"利润率\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"毛利率\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_date\",\"type_name\":\"DateCard\",\"title\":\"\",\"default_value\":\"未设置日期\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_traing_ares\",\"type_name\":\"ProvinceCity\",\"title\":\"\",\"default_value\":\"未设置地区\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"address\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置地址\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_days\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置天数\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_customer_name\",\"type_name\":\"CardLeftBody\",\"title\":\"\",\"default_value\":\"未设置客户\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_gather_name\",\"type_name\":\"CardRightBody\",\"title\":\"\",\"default_value\":\"未设置项目集\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"expected_income\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目应收款\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"project_profit\",\"type_name\":\"LabelTotalMessage\",\"title\":\"项目利润\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"gross_interest_rate\",\"type_name\":\"LabelTotalMessage\",\"title\":\"毛利率\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"labor_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"人工成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"lecturer\",\"type_name\":\"SpellingCardGroup\",\"title\":\"讲师成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implementation_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"实施成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"venue\",\"type_name\":\"LoopCardMoneyGroup\",\"title\":\"会议室成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"implement\",\"type_name\":\"LabelChildMessage\",\"before_api_uri\":\"material_cost,equipment_cost,examination_fee,tea_break,stationery,hospitality,postage\",\"title\":\"教材费用,设备费用,考试费,茶歇,文具,招待费,邮寄快递\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"travel_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"差旅成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"city\",\"type_name\":\"LabelMessage\",\"title\":\"市内交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"province\",\"type_name\":\"LabelMessage\",\"title\":\"长途交通\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"stay\",\"type_name\":\"LabelMessage\",\"title\":\"住宿\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"meal\",\"type_name\":\"LabelMessage\",\"title\":\"餐费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"consulting_cost\",\"type_name\":\"LabelTitleMessage\",\"title\":\"咨询成本\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"institutional_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"机构咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"personal_consulting_fees\",\"type_name\":\"LabelMessage\",\"title\":\"个人咨询费\",\"key\":\"\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '决算');
INSERT INTO `pmo_view_json` VALUES (99, 'finalCardHead', '决算-卡片头', 'formlist', '{\"form-temp-name\":\"决算-卡片头\",\"form-list\":[{\"id_name\":\"project_project_template_name\",\"type_name\":\"CardItem\",\"title\":\"项目类型\",\"default_value\":\"未设置项目类型\"},{\"id_name\":\"unicode\",\"type_name\":\"CardItem\",\"title\":\"班级编号\",\"default_value\":\"未设置班级编号\"},{\"id_name\":\"project_person_in_charge_name\",\"type_name\":\"CardItem\",\"title\":\"班主任\",\"default_value\":\"未设置班主任\"}]}', 0, '决算');
INSERT INTO `pmo_view_json` VALUES (100, 'finalCardPage2', '决算-页面2', 'formlist', '{\"form-temp-name\":\"决算-页面2\",\"form-list\":[{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"项目信息\",\"tip\":\"\",\"add_button\":\"projectMessage\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_final_project\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"讲师信息\",\"tip\":\"\",\"add_button\":\"budgetTeacherCardGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_final_lecturer\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"实施信息\",\"tip\":\"\",\"add_button\":\"budgetImplementArrage\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_final_implement\",\"after_api_uri\":\"\"},{\"id_name\":\"link_btn\",\"type_name\":\"Link\",\"key\":\"\",\"title\":\"差旅信息\",\"tip\":\"\",\"add_button\":\"budgetTravelExpensesGroup\",\"descript\":\"Link按钮\",\"before_api_uri\":\"examine_final_travel\",\"after_api_uri\":\"\"}]}', 0, '');
INSERT INTO `pmo_view_json` VALUES (101, 'finalCardFoot', '决算-卡片尾', 'formlist', '{\"form-temp-name\":\"决算-卡片尾\",\"form-list\":[{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"决算详情\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"项目详情\",\"descript\":\"card按钮\"},{\"id_name\":\"card_btn\",\"type_name\":\"CardTitleItem\",\"title\":\"审批进度\",\"descript\":\"card按钮\"}]}', 0, '决算');
INSERT INTO `pmo_view_json` VALUES (102, 'finalCardPage3', '决算-页面3', 'formlist', '{\"form-temp-name\":\"决算-页面3\",\"form-list\":[{\"id_name\":\"\",\"type_name\":\"IsAgreeApplications\",\"class\":\"card_ask\",\"key\":\"\",\"title\":\"未设置名称\",\"default_value\":\"决算审批\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"examine_manage_finalagree,examine_manage_finalrefuse\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"LabelShowMessage\",\"class\":\"card_approval\",\"key\":\"\",\"title\":\"审批流程\",\"default_value\":\"审批流程\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"application_people\",\"type_name\":\"GetDataSpellingLabel\",\"class\":\"card_launch_approval\",\"key\":\"\",\"title\":\"发起审批\",\"default_value\":\"发起审批\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"提交申请人\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"application_time\",\"type_name\":\"ApplicationsDefault\",\"class\":\"card_get_time\",\"key\":\"\",\"title\":\"提交申请时间\",\"default_value\":\"提交申请时间\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"提交申请时间\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"},{\"id_name\":\"\",\"type_name\":\"ApplicationsFlow\",\"class\":\"status_flow,message_left,message_right\",\"key\":\"finalAccounts\",\"title\":\"审批流程\",\"default_value\":\"审批流程列\",\"tip\":\"\",\"add_button\":\"\",\"descript\":\"\",\"before_api_uri\":\"\",\"after_api_uri\":\"\"}]}', 0, '');

-- ----------------------------
-- Table structure for pmo_view_menu
-- ----------------------------
DROP TABLE IF EXISTS `pmo_view_menu`;
CREATE TABLE `pmo_view_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '名字',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '左侧栏' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_view_menu
-- ----------------------------
INSERT INTO `pmo_view_menu` VALUES (1, '项目管理', 'projectManagement');
INSERT INTO `pmo_view_menu` VALUES (2, '预决算管理', 'budgetAndFinalAccountsManagementcond');
INSERT INTO `pmo_view_menu` VALUES (3, '借款支出管理', 'loanExpenditureManagement');
INSERT INTO `pmo_view_menu` VALUES (4, '收款管理', 'receivablesManagement');
INSERT INTO `pmo_view_menu` VALUES (5, '讲师管理', 'lecturerManagement');
INSERT INTO `pmo_view_menu` VALUES (6, '实施管理', 'implementationManagement');
INSERT INTO `pmo_view_menu` VALUES (7, '视图管理', 'viewManagement');

-- ----------------------------
-- Table structure for pmo_view_on_menu
-- ----------------------------
DROP TABLE IF EXISTS `pmo_view_on_menu`;
CREATE TABLE `pmo_view_on_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `component` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fid` int(11) NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '左侧栏详细' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmo_view_on_menu
-- ----------------------------
INSERT INTO `pmo_view_on_menu` VALUES (1, '/customer', '客户', 'Customer', 1, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (2, '/contact', '联系人', 'Contact', 1, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (3, '/trainingProgram', '培训项目', 'TrainingProgram', 1, 'project_manage_list');
INSERT INTO `pmo_view_on_menu` VALUES (4, '/biddingPlan', '所属项目集', 'BiddingPlan', 1, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (5, '/contract', '合同管理', 'Contract', 1, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (6, '/costing', '成本管理', 'Costing', 1, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (7, '/budget', '预算', 'Budget', 2, 'examine_budget_list');
INSERT INTO `pmo_view_on_menu` VALUES (8, '/finalAccounts', '决算', 'FinalAccounts', 2, 'examine_final_list');
INSERT INTO `pmo_view_on_menu` VALUES (9, '/budgetAccounting', '核算', 'BudgetAccounting', 2, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (10, '/budgetExaminationAndApproval', '审批', 'BudgetExaminationAndApproval', 2, 'examine_record_list');
INSERT INTO `pmo_view_on_menu` VALUES (11, '/loan', '借款', 'Loan', 3, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (12, '/expenditure', '支出', 'Expenditure', 3, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (13, '/loanAccounting', '核算', 'LoanAccounting', 3, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (14, '/loanExaminationAndApproval', '审批', 'LoanExaminationAndApproval', 3, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (15, '/receivables', '应收款', 'Receivables', 4, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (16, '/cashReceipts', '实收款', 'CashReceipts', 4, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (17, '/receivablesAccounting', '核算', 'ReceivablesAccounting', 4, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (18, '/receivablesExaminationAndApproval', '审批', 'ReceivablesExaminationAndApproval', 4, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (19, '/lecturer', '讲师', 'Lecturer', 5, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (20, '/classRemuneration', '课酬', 'ClassRemuneration', 5, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (21, '/teachingArrangement', '授课安排', 'TeachingArrangement', 5, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (22, '/rafficTravel', '交通差旅', 'RafficTravel', 6, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (23, '/segmenHotel', '会议酒店', 'SegmenHotel', 6, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (24, '/serviceConsumables', '服务耗材', 'ServiceConsumables', 6, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (25, '/view', '视图管理', 'View', 7, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (28, '/trainingProgram', '培训项目', 'TrainingProgram', 1, 'project_manage_returnonlyuserlist');
INSERT INTO `pmo_view_on_menu` VALUES (26, '/menu', '菜单管理', 'Menu', 7, NULL);
INSERT INTO `pmo_view_on_menu` VALUES (29, '/trainingProgram', '培训项目', 'TrainingProgram', 1, 'project_manage_returndepartmentlist');
INSERT INTO `pmo_view_on_menu` VALUES (30, '/urlPower', '路由权限', 'UrlPower', 7, 'role_route_list');

-- ----------------------------
-- Table structure for pmo_workpack
-- ----------------------------
DROP TABLE IF EXISTS `pmo_workpack`;
CREATE TABLE `pmo_workpack`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workpack_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '工作包名称',
  `workpack_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '工作包编码',
  `workpack_accountable` int(11) NULL DEFAULT NULL COMMENT '工作包负责人',
  `workpack_responsible` int(11) NULL DEFAULT NULL COMMENT '工作包执行人',
  `workpack_plan_start_ime` int(11) NULL DEFAULT NULL COMMENT '工作包计划开始时间',
  `workpack_plan_end_time` int(11) NULL DEFAULT NULL COMMENT '工作包计划结束时间',
  `workpack_plan_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '工作包计划值',
  `add_time` int(11) NULL DEFAULT NULL COMMENT '工作包添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
