/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : db_dipo

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 15/09/2021 11:26:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE `tbl_log`  (
  `kodelog` int(4) NOT NULL AUTO_INCREMENT,
  `tabel` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `aksi` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'insert, update, delete',
  `kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'kode prk yg didelete',
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'user yang delete',
  `datelog` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`kodelog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 515 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_log
-- ----------------------------
INSERT INTO `tbl_log` VALUES (1, 'tbl_kategori_produk', 'insert', 'KATEGORI0001', '', '2020-03-28 13:19:00');
INSERT INTO `tbl_log` VALUES (2, 'tbl_kategori_produk', 'insert', 'KATEGORI0002', '', '2020-03-28 13:32:00');
INSERT INTO `tbl_log` VALUES (3, 'tbl_kategori_produk', 'update', 'KATEGORI0002', '', '2020-03-28 13:32:00');
INSERT INTO `tbl_log` VALUES (4, 'tbl_kategori_produk', 'update', 'KATEGORI0002', '', '2020-03-28 13:37:00');
INSERT INTO `tbl_log` VALUES (5, 'tbl_user', 'insert', 'popon', '', '2020-03-28 13:44:00');
INSERT INTO `tbl_log` VALUES (6, 'tbl_user', 'insert', 'popon', '', '2020-03-28 13:45:00');
INSERT INTO `tbl_log` VALUES (7, 'tbl_kategori_produk', 'update', 'KATEGORI0002', '', '2020-03-28 13:45:00');
INSERT INTO `tbl_log` VALUES (8, 'tbl_kategori_produk', 'update', 'KATEGORI0002', '', '2020-03-28 13:45:00');
INSERT INTO `tbl_log` VALUES (9, 'tbl_jenis_produk', 'insert', 'JENIS0001', '', '2020-03-31 11:37:00');
INSERT INTO `tbl_log` VALUES (10, 'tbl_jenis_produk', 'update', 'JENIS0001', '', '2020-03-31 11:57:00');
INSERT INTO `tbl_log` VALUES (11, 'tbl_jenis_produk', 'insert', 'JENIS0002', '', '2020-04-03 12:55:00');
INSERT INTO `tbl_log` VALUES (12, 'tbl_produk', 'insert', 'PRODUK0001', '', '2020-04-14 07:23:00');
INSERT INTO `tbl_log` VALUES (13, 'tbl_toko', 'insert', 'TOKO0001', '', '2020-04-18 11:09:00');
INSERT INTO `tbl_log` VALUES (14, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-18 11:10:00');
INSERT INTO `tbl_log` VALUES (15, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-18 11:22:00');
INSERT INTO `tbl_log` VALUES (16, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-19 03:25:00');
INSERT INTO `tbl_log` VALUES (17, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-19 03:27:00');
INSERT INTO `tbl_log` VALUES (18, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-04-20 10:31:00');
INSERT INTO `tbl_log` VALUES (19, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-04-20 10:32:00');
INSERT INTO `tbl_log` VALUES (20, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-04-20 10:32:00');
INSERT INTO `tbl_log` VALUES (21, 'tbl_produk', 'insert', 'PRODUK0002', '', '2020-04-20 10:33:00');
INSERT INTO `tbl_log` VALUES (22, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-04-20 10:33:00');
INSERT INTO `tbl_log` VALUES (23, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-04-20 13:56:00');
INSERT INTO `tbl_log` VALUES (24, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-20 13:57:00');
INSERT INTO `tbl_log` VALUES (25, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-20 13:58:00');
INSERT INTO `tbl_log` VALUES (26, 'tbl_user', 'insert', 'ayuk', '', '2020-04-21 11:31:00');
INSERT INTO `tbl_log` VALUES (27, 'tbl_user', 'insert', 'jaka', '', '2020-04-21 11:36:00');
INSERT INTO `tbl_log` VALUES (28, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-21 13:49:00');
INSERT INTO `tbl_log` VALUES (29, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-21 14:08:00');
INSERT INTO `tbl_log` VALUES (30, 'tbl_toko', 'insert', 'TOKO0002', '', '2020-04-24 13:21:00');
INSERT INTO `tbl_log` VALUES (31, 'tbl_toko', 'insert', 'TOKO0003', '', '2020-04-26 13:05:00');
INSERT INTO `tbl_log` VALUES (32, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-26 13:53:00');
INSERT INTO `tbl_log` VALUES (33, 'tbl_toko', 'update', 'TOKO0001', '', '2020-04-26 13:53:00');
INSERT INTO `tbl_log` VALUES (34, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-21 11:25:00');
INSERT INTO `tbl_log` VALUES (35, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-05-21 12:23:00');
INSERT INTO `tbl_log` VALUES (36, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-05-21 12:38:00');
INSERT INTO `tbl_log` VALUES (37, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-05-21 12:38:00');
INSERT INTO `tbl_log` VALUES (38, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-21 12:39:00');
INSERT INTO `tbl_log` VALUES (39, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-05-21 12:53:00');
INSERT INTO `tbl_log` VALUES (40, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-05-21 12:53:00');
INSERT INTO `tbl_log` VALUES (41, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 11:51:00');
INSERT INTO `tbl_log` VALUES (42, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:10:00');
INSERT INTO `tbl_log` VALUES (43, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:10:00');
INSERT INTO `tbl_log` VALUES (44, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:36:00');
INSERT INTO `tbl_log` VALUES (45, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:39:00');
INSERT INTO `tbl_log` VALUES (46, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:39:00');
INSERT INTO `tbl_log` VALUES (47, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-22 17:49:00');
INSERT INTO `tbl_log` VALUES (48, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-28 02:31:00');
INSERT INTO `tbl_log` VALUES (49, 'tbl_produk', 'insert', 'PRODUK0003', '', '2020-05-28 02:32:00');
INSERT INTO `tbl_log` VALUES (50, 'tbl_produk', 'insert', 'PRODUK0004', '', '2020-05-28 02:36:00');
INSERT INTO `tbl_log` VALUES (51, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-28 02:38:00');
INSERT INTO `tbl_log` VALUES (52, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-28 02:41:00');
INSERT INTO `tbl_log` VALUES (53, 'tbl_produk', 'update', 'PRODUK0002', '', '2020-05-28 02:41:00');
INSERT INTO `tbl_log` VALUES (54, 'tbl_pesanhd', 'insert', 'TRS0001', '', '2020-05-28 11:03:00');
INSERT INTO `tbl_log` VALUES (55, 'tbl_pesanhd', 'insert', 'TRS0002', '', '2020-05-28 11:18:00');
INSERT INTO `tbl_log` VALUES (56, 'tbl_pesanhd', 'insert', 'TRS0003', '', '2020-05-28 11:50:00');
INSERT INTO `tbl_log` VALUES (57, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:11:00');
INSERT INTO `tbl_log` VALUES (58, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:14:00');
INSERT INTO `tbl_log` VALUES (59, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:16:00');
INSERT INTO `tbl_log` VALUES (60, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:16:00');
INSERT INTO `tbl_log` VALUES (61, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:16:00');
INSERT INTO `tbl_log` VALUES (62, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:16:00');
INSERT INTO `tbl_log` VALUES (63, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:16:00');
INSERT INTO `tbl_log` VALUES (64, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:17:00');
INSERT INTO `tbl_log` VALUES (65, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:17:00');
INSERT INTO `tbl_log` VALUES (66, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:18:00');
INSERT INTO `tbl_log` VALUES (67, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:19:00');
INSERT INTO `tbl_log` VALUES (68, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (69, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (70, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (71, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (72, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (73, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-05-29 14:21:00');
INSERT INTO `tbl_log` VALUES (74, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-06-03 11:46:00');
INSERT INTO `tbl_log` VALUES (75, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-06-11 13:45:00');
INSERT INTO `tbl_log` VALUES (76, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-06-11 13:48:00');
INSERT INTO `tbl_log` VALUES (77, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-06-11 14:00:00');
INSERT INTO `tbl_log` VALUES (78, 'tbl_jadwalsaleshd', 'insert', 'JDWSL0001', '', '2020-06-18 13:08:00');
INSERT INTO `tbl_log` VALUES (79, 'tbl_jadwalsaleshd', 'insert', 'JDWSL0002', '', '2020-06-23 13:27:00');
INSERT INTO `tbl_log` VALUES (80, 'tbl_jadwalsaleshd', 'update', 'JDWSL0002', '', '2020-06-23 13:30:00');
INSERT INTO `tbl_log` VALUES (81, 'tbl_jadwalsaleshd', 'update', 'JDWSL0002', '', '2020-06-23 13:30:00');
INSERT INTO `tbl_log` VALUES (82, 'tbl_jadwalsaleshd', 'update', 'JDWSL0002', '', '2020-06-23 13:31:00');
INSERT INTO `tbl_log` VALUES (83, 'tbl_jadwalsaleshd', 'update', 'JDWSL0002', '', '2020-06-23 13:31:00');
INSERT INTO `tbl_log` VALUES (84, 'tbl_toko', 'update', 'TOKO0003', '', '2020-06-23 13:32:00');
INSERT INTO `tbl_log` VALUES (85, 'tbl_user', 'insert', 'iwan', '', '2020-07-02 16:47:00');
INSERT INTO `tbl_log` VALUES (86, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:34:00');
INSERT INTO `tbl_log` VALUES (87, 'tbl_user', 'insert', 'iwan', '', '2020-07-09 14:35:00');
INSERT INTO `tbl_log` VALUES (88, 'tbl_user', 'insert', 'iwan', '', '2020-07-09 14:35:00');
INSERT INTO `tbl_log` VALUES (89, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:36:00');
INSERT INTO `tbl_log` VALUES (90, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:36:00');
INSERT INTO `tbl_log` VALUES (91, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:38:00');
INSERT INTO `tbl_log` VALUES (92, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:38:00');
INSERT INTO `tbl_log` VALUES (93, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:38:00');
INSERT INTO `tbl_log` VALUES (94, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:38:00');
INSERT INTO `tbl_log` VALUES (95, 'tbl_user', 'delete', '7', '', '2020-07-09 14:52:00');
INSERT INTO `tbl_log` VALUES (96, 'tbl_user', 'delete', '3', '', '2020-07-09 14:52:00');
INSERT INTO `tbl_log` VALUES (97, 'tbl_user', 'insert', 'indra', '', '2020-07-09 14:53:00');
INSERT INTO `tbl_log` VALUES (98, 'tbl_jenis_produk', 'update', 'JENIS0001', '', '2020-07-24 17:04:00');
INSERT INTO `tbl_log` VALUES (99, 'tbl_produk', 'insert', 'PRODUK0005', '', '2020-07-28 14:26:00');
INSERT INTO `tbl_log` VALUES (100, 'tbl_produk', 'delete', 'PRODUK0005', '', '2020-07-28 14:29:00');
INSERT INTO `tbl_log` VALUES (101, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-07-28 14:54:00');
INSERT INTO `tbl_log` VALUES (102, 'tbl_produk', 'update', 'PRODUK0003', '', '2020-07-28 14:54:00');
INSERT INTO `tbl_log` VALUES (103, 'tbl_produk', 'update', 'PRODUK0003', '', '2020-07-28 14:57:00');
INSERT INTO `tbl_log` VALUES (104, 'tbl_jenis_produk', 'insert', 'JENIS0003', '', '2020-07-28 15:00:00');
INSERT INTO `tbl_log` VALUES (105, 'tbl_jenis_produk', 'delete', 'JENIS0003', '', '2020-07-28 15:01:00');
INSERT INTO `tbl_log` VALUES (106, 'tbl_produk', 'update', 'PRODUK0001', '', '2020-07-28 15:04:00');
INSERT INTO `tbl_log` VALUES (107, 'tbl_toko', 'insert', 'TOKO0004', '', '2020-08-15 00:44:00');
INSERT INTO `tbl_log` VALUES (108, 'tbl_toko', 'update', 'TOKO0004', '', '2020-08-15 00:50:00');
INSERT INTO `tbl_log` VALUES (109, 'tbl_toko', 'update', 'TOKO0004', '', '2020-08-15 00:53:00');
INSERT INTO `tbl_log` VALUES (110, 'tbl_toko', 'update', 'TOKO0004', '', '2020-08-15 00:53:00');
INSERT INTO `tbl_log` VALUES (111, 'tbl_user', 'insert', 'ujang', '', '2020-08-15 01:01:00');
INSERT INTO `tbl_log` VALUES (112, 'tbl_user', 'insert', 'ujang', '', '2020-08-15 01:01:00');
INSERT INTO `tbl_log` VALUES (113, 'tbl_user', 'insert', 'amanda', '', '2020-08-15 01:02:00');
INSERT INTO `tbl_log` VALUES (114, 'tbl_toko', 'update', 'TOKO0001', '', '2020-08-15 01:03:00');
INSERT INTO `tbl_log` VALUES (115, 'tbl_toko', 'update', 'TOKO0001', '', '2020-08-15 01:42:00');
INSERT INTO `tbl_log` VALUES (116, 'tbl_toko', 'update', 'TOKO0001', '', '2020-08-15 01:44:00');
INSERT INTO `tbl_log` VALUES (117, 'tbl_toko', 'update', 'TOKO0001', '', '2020-08-15 01:44:00');
INSERT INTO `tbl_log` VALUES (118, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:43:00');
INSERT INTO `tbl_log` VALUES (119, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:45:00');
INSERT INTO `tbl_log` VALUES (120, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:45:00');
INSERT INTO `tbl_log` VALUES (121, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:46:00');
INSERT INTO `tbl_log` VALUES (122, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:48:00');
INSERT INTO `tbl_log` VALUES (123, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:50:00');
INSERT INTO `tbl_log` VALUES (124, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:52:00');
INSERT INTO `tbl_log` VALUES (125, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 11:59:00');
INSERT INTO `tbl_log` VALUES (126, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 12:19:00');
INSERT INTO `tbl_log` VALUES (127, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 12:19:00');
INSERT INTO `tbl_log` VALUES (128, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 12:24:00');
INSERT INTO `tbl_log` VALUES (129, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 12:24:00');
INSERT INTO `tbl_log` VALUES (130, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 12:30:00');
INSERT INTO `tbl_log` VALUES (131, 'tbl_pesanhd', 'update', 'TRS0003', '', '2020-09-30 13:57:00');
INSERT INTO `tbl_log` VALUES (132, 'tbl_jadwalsaleshd', 'insert', 'JDWSL0003', '', '2020-10-03 03:28:00');
INSERT INTO `tbl_log` VALUES (133, 'tbl_admin', 'insert', 'asas', '', '2020-10-08 18:47:00');
INSERT INTO `tbl_log` VALUES (134, 'tbl_admin', 'insert', 'bayu', '', '2020-10-12 12:36:00');
INSERT INTO `tbl_log` VALUES (135, 'tbl_admin', 'update', 'admin', '', '2020-10-12 13:18:00');
INSERT INTO `tbl_log` VALUES (136, 'tbl_admin', 'delete', 'USER0001', '', '2020-10-12 13:38:00');
INSERT INTO `tbl_log` VALUES (137, 'tbl_kategori_item', 'insert', 'KATEGORI0001', '', '2020-10-12 14:16:00');
INSERT INTO `tbl_log` VALUES (138, 'tbl_kategori_item', 'update', '', '', '2020-10-12 14:20:00');
INSERT INTO `tbl_log` VALUES (139, 'tbl_kategori_item', 'insert', 'KATEGORI0002', '', '2020-10-12 14:20:00');
INSERT INTO `tbl_log` VALUES (140, 'tbl_kategori_item', 'update', 'KATEGORI0001', '', '2020-10-12 14:20:00');
INSERT INTO `tbl_log` VALUES (141, 'tbl_kategori_item', 'update', 'KATEGORI0001', '', '2020-10-12 14:21:00');
INSERT INTO `tbl_log` VALUES (142, 'tbl_kategori_item', 'update', 'KATEGORI0002', '', '2020-10-12 14:22:00');
INSERT INTO `tbl_log` VALUES (143, 'tbl_kategori_item', 'insert', 'KATEGORI0003', '', '2020-10-12 14:22:00');
INSERT INTO `tbl_log` VALUES (144, 'tbl_kategori_item', 'delete', 'KATEGORI0003', '', '2020-10-12 14:23:00');
INSERT INTO `tbl_log` VALUES (145, 'tbl_kategori_item', 'update', 'KATEGORI0002', '', '2020-10-13 11:50:00');
INSERT INTO `tbl_log` VALUES (146, 'tbl_item', 'insert', 'ITEM0001', '', '2020-10-14 11:44:00');
INSERT INTO `tbl_log` VALUES (147, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 11:53:00');
INSERT INTO `tbl_log` VALUES (148, 'tbl_item', 'insert', 'ITEM0002', '', '2020-10-14 11:53:00');
INSERT INTO `tbl_log` VALUES (149, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-14 11:54:00');
INSERT INTO `tbl_log` VALUES (150, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-14 11:54:00');
INSERT INTO `tbl_log` VALUES (151, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-14 11:55:00');
INSERT INTO `tbl_log` VALUES (152, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-14 11:56:00');
INSERT INTO `tbl_log` VALUES (153, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 11:56:00');
INSERT INTO `tbl_log` VALUES (154, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 12:08:00');
INSERT INTO `tbl_log` VALUES (155, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 12:13:00');
INSERT INTO `tbl_log` VALUES (156, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 12:28:00');
INSERT INTO `tbl_log` VALUES (157, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 12:30:00');
INSERT INTO `tbl_log` VALUES (158, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-14 13:01:00');
INSERT INTO `tbl_log` VALUES (159, 'tbl_item', 'insert', 'ITEM0003', '', '2020-10-14 13:02:00');
INSERT INTO `tbl_log` VALUES (160, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 16:56:00');
INSERT INTO `tbl_log` VALUES (161, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 17:03:00');
INSERT INTO `tbl_log` VALUES (162, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 17:03:00');
INSERT INTO `tbl_log` VALUES (163, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 17:04:00');
INSERT INTO `tbl_log` VALUES (164, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-14 17:49:00');
INSERT INTO `tbl_log` VALUES (165, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-15 11:46:00');
INSERT INTO `tbl_log` VALUES (166, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-15 11:46:00');
INSERT INTO `tbl_log` VALUES (167, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-15 13:15:00');
INSERT INTO `tbl_log` VALUES (168, 'tbl_pelanggan', 'insert', 'chandra', '', '2020-10-15 17:19:00');
INSERT INTO `tbl_log` VALUES (169, 'tbl_pelanggan', 'update', 'chandra', '', '2020-10-15 17:28:00');
INSERT INTO `tbl_log` VALUES (170, 'tbl_pelanggan', 'update', 'chandra', '', '2020-10-15 17:54:00');
INSERT INTO `tbl_log` VALUES (171, 'tbl_blog', 'insert', 'BLOG0001', '', '2020-10-16 15:41:00');
INSERT INTO `tbl_log` VALUES (172, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:45:00');
INSERT INTO `tbl_log` VALUES (173, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:47:00');
INSERT INTO `tbl_log` VALUES (174, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:47:00');
INSERT INTO `tbl_log` VALUES (175, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:47:00');
INSERT INTO `tbl_log` VALUES (176, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:48:00');
INSERT INTO `tbl_log` VALUES (177, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:49:00');
INSERT INTO `tbl_log` VALUES (178, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:49:00');
INSERT INTO `tbl_log` VALUES (179, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:50:00');
INSERT INTO `tbl_log` VALUES (180, 'tbl_blog', 'update', 'BLOG0001', '', '2020-10-16 15:51:00');
INSERT INTO `tbl_log` VALUES (181, 'tbl_admin', 'update', 'admin', '', '2020-10-18 03:48:00');
INSERT INTO `tbl_log` VALUES (182, 'tbl_admin', 'insert', 'iwan', '', '2020-10-18 03:50:00');
INSERT INTO `tbl_log` VALUES (183, 'tbl_kategori_item', 'update', 'KATEGORI0001', '', '2020-10-19 16:37:00');
INSERT INTO `tbl_log` VALUES (184, 'tbl_kategori_item', 'insert', 'KATEGORI0004', '', '2020-10-19 16:37:00');
INSERT INTO `tbl_log` VALUES (185, 'tbl_kategori_item', 'insert', 'KATEGORI0005', '', '2020-10-19 16:37:00');
INSERT INTO `tbl_log` VALUES (186, 'tbl_kategori_item', 'insert', 'KATEGORI0006', '', '2020-10-19 16:40:00');
INSERT INTO `tbl_log` VALUES (187, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-21 16:16:00');
INSERT INTO `tbl_log` VALUES (188, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-21 16:17:00');
INSERT INTO `tbl_log` VALUES (189, 'tbl_item', 'update', 'ITEM0002', '', '2020-10-21 16:18:00');
INSERT INTO `tbl_log` VALUES (190, 'tbl_item', 'update', 'ITEM0003', '', '2020-10-21 16:19:00');
INSERT INTO `tbl_log` VALUES (191, 'tbl_item', 'insert', 'ITEM0004', '', '2020-10-22 13:55:00');
INSERT INTO `tbl_log` VALUES (192, 'tbl_item', 'update', 'ITEM0004', '', '2020-10-22 13:56:00');
INSERT INTO `tbl_log` VALUES (193, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-22 14:11:00');
INSERT INTO `tbl_log` VALUES (194, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-22 14:49:00');
INSERT INTO `tbl_log` VALUES (195, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-22 14:50:00');
INSERT INTO `tbl_log` VALUES (196, 'tbl_kategori_item', 'insert', 'KATEGORI0007', '', '2020-10-22 14:51:00');
INSERT INTO `tbl_log` VALUES (197, 'tbl_kategori_item', 'update', 'KATEGORI0001', '', '2020-10-22 14:54:00');
INSERT INTO `tbl_log` VALUES (198, 'tbl_kategori_item', 'update', 'KATEGORI0002', '', '2020-10-22 14:54:00');
INSERT INTO `tbl_log` VALUES (199, 'tbl_kategori_item', 'update', 'KATEGORI0004', '', '2020-10-22 14:55:00');
INSERT INTO `tbl_log` VALUES (200, 'tbl_item', 'update', 'ITEM0001', '', '2020-10-26 11:54:00');
INSERT INTO `tbl_log` VALUES (201, 'tbl_pelanggan', 'insert', 'PL0001', '', '2020-10-27 16:29:00');
INSERT INTO `tbl_log` VALUES (202, 'tbl_pelanggan', 'insert', 'PL0002', '', '2020-10-27 16:37:00');
INSERT INTO `tbl_log` VALUES (203, 'tbl_item', 'update', 'ITEM0004', '', '2020-10-30 13:57:00');
INSERT INTO `tbl_log` VALUES (204, 'tbl_pelanggan', 'login', '', '', '2020-10-30 17:09:00');
INSERT INTO `tbl_log` VALUES (205, 'tbl_pelanggan', 'login', '', '', '2020-10-30 17:29:00');
INSERT INTO `tbl_log` VALUES (206, 'tbl_pelanggan', 'login', '', '', '2020-10-30 17:30:00');
INSERT INTO `tbl_log` VALUES (207, 'tbl_pelanggan', 'login', '', '', '2020-11-02 11:34:00');
INSERT INTO `tbl_log` VALUES (208, 'tbl_pelanggan', 'login', '', '', '2020-11-02 11:44:00');
INSERT INTO `tbl_log` VALUES (209, 'tbl_pelanggan', 'login', '', '', '2020-11-02 11:44:00');
INSERT INTO `tbl_log` VALUES (210, 'tbl_pelanggan', 'login', '', '', '2020-11-02 12:00:00');
INSERT INTO `tbl_log` VALUES (211, 'tbl_pelanggan', 'login', '', '', '2020-11-06 09:30:00');
INSERT INTO `tbl_log` VALUES (212, 'tbl_pelanggan', 'login', '', '', '2020-11-06 17:22:00');
INSERT INTO `tbl_log` VALUES (213, 'tbl_pelanggan', 'login', '', '', '2020-11-20 09:24:00');
INSERT INTO `tbl_log` VALUES (214, 'tbl_pelanggan', 'login', '', '', '2020-11-30 15:56:00');
INSERT INTO `tbl_log` VALUES (215, 'tbl_pelanggan', 'login', '', '', '2020-12-01 12:01:00');
INSERT INTO `tbl_log` VALUES (216, 'tbl_pelanggan', 'login', '', '', '2020-12-01 12:03:00');
INSERT INTO `tbl_log` VALUES (217, 'tbl_pelanggan', 'update', 'saputrastyawan.d@gmail.com', '', '2020-12-01 12:13:00');
INSERT INTO `tbl_log` VALUES (218, 'tbl_pelanggan', 'update', 'saputrastyawan.d@gmail.com', '', '2020-12-01 12:14:00');
INSERT INTO `tbl_log` VALUES (219, 'tbl_pelanggan', 'login', '', '', '2020-12-01 15:55:00');
INSERT INTO `tbl_log` VALUES (220, 'tbl_pelanggan', 'login', '', '', '2020-12-02 12:39:00');
INSERT INTO `tbl_log` VALUES (221, 'tbl_pelanggan', 'login', '', '', '2020-12-02 16:10:00');
INSERT INTO `tbl_log` VALUES (222, 'tbl_pelanggan', 'login', '', '', '2020-12-03 11:29:00');
INSERT INTO `tbl_log` VALUES (223, 'tbl_blog', 'insert', 'BLOG0002', '', '2020-12-03 12:32:00');
INSERT INTO `tbl_log` VALUES (224, 'tbl_blog', 'update', 'BLOG0002', '', '2020-12-03 12:32:00');
INSERT INTO `tbl_log` VALUES (225, 'tbl_blog', 'update', 'BLOG0001', '', '2020-12-03 12:44:00');
INSERT INTO `tbl_log` VALUES (226, 'tbl_pelanggan', 'login', '', '', '2020-12-06 05:38:00');
INSERT INTO `tbl_log` VALUES (227, 'tbl_pelanggan', 'login', '', '', '2020-12-10 11:30:00');
INSERT INTO `tbl_log` VALUES (228, 'tbl_transaksi_hd', 'insert', 'TRS0001', '', '2020-12-10 13:27:00');
INSERT INTO `tbl_log` VALUES (229, 'tbl_transaksi_hd', 'insert', 'TRS0002', '', '2020-12-10 14:10:00');
INSERT INTO `tbl_log` VALUES (230, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:13:00');
INSERT INTO `tbl_log` VALUES (231, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:13:00');
INSERT INTO `tbl_log` VALUES (232, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:14:00');
INSERT INTO `tbl_log` VALUES (233, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:15:00');
INSERT INTO `tbl_log` VALUES (234, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:20:00');
INSERT INTO `tbl_log` VALUES (235, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:28:00');
INSERT INTO `tbl_log` VALUES (236, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:28:00');
INSERT INTO `tbl_log` VALUES (237, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:28:00');
INSERT INTO `tbl_log` VALUES (238, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:32:00');
INSERT INTO `tbl_log` VALUES (239, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2020-12-10 16:32:00');
INSERT INTO `tbl_log` VALUES (240, 'tbl_transaksi_hd', 'insert', 'TRS0003', '', '2020-12-10 17:00:00');
INSERT INTO `tbl_log` VALUES (241, 'tbl_transaksi_hd', 'insert', 'TRS0004', '', '2020-12-10 17:00:00');
INSERT INTO `tbl_log` VALUES (242, 'tbl_pelanggan', 'login', '', '', '2020-12-11 02:56:00');
INSERT INTO `tbl_log` VALUES (243, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0001', '', '2020-12-11 06:45:00');
INSERT INTO `tbl_log` VALUES (244, 'tbl_pelanggan', 'insert', 'lanang', '', '2020-12-11 06:46:00');
INSERT INTO `tbl_log` VALUES (245, 'tbl_config', 'update', 'ALAMAT', '', '2020-12-11 07:52:00');
INSERT INTO `tbl_log` VALUES (246, 'tbl_config', 'update', 'ALAMAT', '', '2020-12-11 07:52:00');
INSERT INTO `tbl_log` VALUES (247, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0001', '', '2020-12-11 08:09:00');
INSERT INTO `tbl_log` VALUES (248, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0001', '', '2020-12-11 08:11:00');
INSERT INTO `tbl_log` VALUES (249, 'tbl_transaksi_hd', 'insert', 'TRANSAKSI0002', '', '2020-12-11 08:27:00');
INSERT INTO `tbl_log` VALUES (250, 'tbl_pelanggan', 'update', 'asasa', '', '2020-12-11 08:32:00');
INSERT INTO `tbl_log` VALUES (251, 'tbl_pelanggan', 'update', 'limna', '', '2020-12-11 08:32:00');
INSERT INTO `tbl_log` VALUES (252, 'tbl_supplier', 'insert', 'SUPPLIER0001', '', '2020-12-30 06:56:00');
INSERT INTO `tbl_log` VALUES (253, 'tbl_supplier', 'update', 'SUPPLIER0001', '', '2020-12-30 06:58:00');
INSERT INTO `tbl_log` VALUES (254, 'tbl_supplier', 'update', 'SUPPLIER0001', '', '2020-12-30 06:58:00');
INSERT INTO `tbl_log` VALUES (255, 'tbl_supplier', 'update', 'SUPPLIER0001', '', '2020-12-30 06:58:00');
INSERT INTO `tbl_log` VALUES (256, 'tbl_supplier', 'update', 'SUPPLIER0001', '', '2020-12-30 07:11:00');
INSERT INTO `tbl_log` VALUES (257, 'tbl_item', 'update', 'ITEM0001', '', '2020-12-30 07:46:00');
INSERT INTO `tbl_log` VALUES (258, 'tbl_item', 'update', 'ITEM0001', '', '2020-12-30 07:46:00');
INSERT INTO `tbl_log` VALUES (259, 'tbl_item', 'update', 'ITEM0001', '', '2020-12-30 07:48:00');
INSERT INTO `tbl_log` VALUES (260, 'tbl_item', 'update', 'ITEM0001', '', '2020-12-30 08:01:00');
INSERT INTO `tbl_log` VALUES (261, 'tbl_pelanggan', 'login', '', '', '2020-12-30 08:05:00');
INSERT INTO `tbl_log` VALUES (262, 'tbl_item', 'insert', 'ITEM0005', '', '2020-12-30 08:51:00');
INSERT INTO `tbl_log` VALUES (263, 'tbl_supplier', 'insert', 'SUPPLIER0002', '', '2020-12-30 08:53:00');
INSERT INTO `tbl_log` VALUES (264, 'tbl_item', 'update', 'ITEM0005', '', '2020-12-30 08:53:00');
INSERT INTO `tbl_log` VALUES (265, 'tbl_pelanggan', 'login', '', '', '2020-12-31 01:58:00');
INSERT INTO `tbl_log` VALUES (266, 'tbl_pelanggan', 'update', 'saputrastyawan.d@gmail.com', '', '2020-12-31 02:05:00');
INSERT INTO `tbl_log` VALUES (267, 'tbl_pelanggan', 'login', '', '', '2020-12-31 02:23:00');
INSERT INTO `tbl_log` VALUES (268, 'tbl_sub', 'insert', 'saputrastyawan.d@gmail.com', '', '2020-12-31 03:14:00');
INSERT INTO `tbl_log` VALUES (269, 'tbl_sub', 'insert', 'saputrastyawan.d@gmail.com', '', '2020-12-31 03:15:00');
INSERT INTO `tbl_log` VALUES (270, 'tbl_sub', 'insert', 'saputrastyawan.d@gmail.com', '', '2020-12-31 03:16:00');
INSERT INTO `tbl_log` VALUES (271, 'tbl_admin', 'update', 'admin', '', '2021-01-12 14:30:00');
INSERT INTO `tbl_log` VALUES (272, 'tbl_item', 'update', 'ITEM0002', '', '2021-01-12 14:30:00');
INSERT INTO `tbl_log` VALUES (273, 'tbl_item', 'update', 'ITEM0002', '', '2021-01-12 14:31:00');
INSERT INTO `tbl_log` VALUES (274, 'tbl_pelanggan', 'login', '', '', '2021-01-13 02:22:00');
INSERT INTO `tbl_log` VALUES (275, 'tbl_supplier', 'insert', 'SUPPLIER0003', '', '2021-01-13 05:08:00');
INSERT INTO `tbl_log` VALUES (276, 'tbl_item', 'insert', 'ITEM0006', '', '2021-01-13 05:15:00');
INSERT INTO `tbl_log` VALUES (277, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 05:17:00');
INSERT INTO `tbl_log` VALUES (278, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 05:18:00');
INSERT INTO `tbl_log` VALUES (279, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 05:19:00');
INSERT INTO `tbl_log` VALUES (280, 'tbl_transaksi_hd', 'insert', 'TRANSAKSI0004', '', '2021-01-13 05:22:00');
INSERT INTO `tbl_log` VALUES (281, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0004', '', '2021-01-13 05:22:00');
INSERT INTO `tbl_log` VALUES (282, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0004', '', '2021-01-13 05:23:00');
INSERT INTO `tbl_log` VALUES (283, 'tbl_transaksi_hd', 'update', 'TRS0002', '', '2021-01-13 05:23:00');
INSERT INTO `tbl_log` VALUES (284, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0002', '', '2021-01-13 05:23:00');
INSERT INTO `tbl_log` VALUES (285, 'tbl_pelanggan', 'insert', 'PL0001', '', '2021-01-13 05:27:00');
INSERT INTO `tbl_log` VALUES (286, 'tbl_pelanggan', 'login', '', '', '2021-01-13 05:28:00');
INSERT INTO `tbl_log` VALUES (287, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:50:00');
INSERT INTO `tbl_log` VALUES (288, 'tbl_item', 'insert', 'ITEM0007', '', '2021-01-13 06:52:00');
INSERT INTO `tbl_log` VALUES (289, 'tbl_item', 'delete', 'ITEM0007', '', '2021-01-13 06:52:00');
INSERT INTO `tbl_log` VALUES (290, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:52:00');
INSERT INTO `tbl_log` VALUES (291, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:54:00');
INSERT INTO `tbl_log` VALUES (292, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:55:00');
INSERT INTO `tbl_log` VALUES (293, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:58:00');
INSERT INTO `tbl_log` VALUES (294, 'tbl_item', 'update', 'ITEM0006', '', '2021-01-13 06:58:00');
INSERT INTO `tbl_log` VALUES (295, 'tbl_item', 'insert', 'ITEM0008', '', '2021-01-13 07:06:00');
INSERT INTO `tbl_log` VALUES (296, 'tbl_item', 'delete', 'ITEM0008', '', '2021-01-13 07:07:00');
INSERT INTO `tbl_log` VALUES (297, 'tbl_item', 'insert', 'ITEM0009', '', '2021-01-13 07:14:00');
INSERT INTO `tbl_log` VALUES (298, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:15:00');
INSERT INTO `tbl_log` VALUES (299, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:15:00');
INSERT INTO `tbl_log` VALUES (300, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:17:00');
INSERT INTO `tbl_log` VALUES (301, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:17:00');
INSERT INTO `tbl_log` VALUES (302, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:18:00');
INSERT INTO `tbl_log` VALUES (303, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:19:00');
INSERT INTO `tbl_log` VALUES (304, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:19:00');
INSERT INTO `tbl_log` VALUES (305, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:22:00');
INSERT INTO `tbl_log` VALUES (306, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:23:00');
INSERT INTO `tbl_log` VALUES (307, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:23:00');
INSERT INTO `tbl_log` VALUES (308, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 07:23:00');
INSERT INTO `tbl_log` VALUES (309, 'tbl_config', 'update', 'ALAMAT', '', '2021-01-13 07:27:00');
INSERT INTO `tbl_log` VALUES (310, 'tbl_config', 'update', 'EMAIL', '', '2021-01-13 07:28:00');
INSERT INTO `tbl_log` VALUES (311, 'tbl_config', 'update', 'FB', '', '2021-01-13 07:33:00');
INSERT INTO `tbl_log` VALUES (312, 'tbl_config', 'update', 'TELEPON', '', '2021-01-13 07:58:00');
INSERT INTO `tbl_log` VALUES (313, 'tbl_item', 'insert', 'ITEM0010', '', '2021-01-13 10:58:00');
INSERT INTO `tbl_log` VALUES (314, 'tbl_admin', 'insert', 'Agus Budi', '', '2021-01-13 11:00:00');
INSERT INTO `tbl_log` VALUES (315, 'tbl_admin', 'insert', 'Gita SIntia', '', '2021-01-13 11:01:00');
INSERT INTO `tbl_log` VALUES (316, 'tbl_item', 'update', 'ITEM0010', '', '2021-01-13 11:02:00');
INSERT INTO `tbl_log` VALUES (317, 'tbl_item', 'delete', 'ITEM0001', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (318, 'tbl_item', 'delete', 'ITEM0002', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (319, 'tbl_item', 'delete', 'ITEM0003', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (320, 'tbl_item', 'delete', 'ITEM0004', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (321, 'tbl_item', 'delete', 'ITEM0005', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (322, 'tbl_item', 'delete', 'ITEM0006', '', '2021-01-13 11:03:00');
INSERT INTO `tbl_log` VALUES (323, 'tbl_item', 'insert', 'ITEM0011', '', '2021-01-13 11:11:00');
INSERT INTO `tbl_log` VALUES (324, 'tbl_item', 'insert', 'ITEM0012', '', '2021-01-13 11:18:00');
INSERT INTO `tbl_log` VALUES (325, 'tbl_item', 'update', 'ITEM0009', '', '2021-01-13 11:21:00');
INSERT INTO `tbl_log` VALUES (326, 'tbl_item', 'insert', 'ITEM0013', '', '2021-01-13 11:24:00');
INSERT INTO `tbl_log` VALUES (327, 'tbl_item', 'insert', 'ITEM0014', '', '2021-01-13 11:25:00');
INSERT INTO `tbl_log` VALUES (328, 'tbl_item', 'insert', 'ITEM0015', '', '2021-01-13 11:39:00');
INSERT INTO `tbl_log` VALUES (329, 'tbl_item', 'insert', 'ITEM0016', '', '2021-01-13 11:45:00');
INSERT INTO `tbl_log` VALUES (330, 'tbl_item', 'insert', 'ITEM0017', '', '2021-01-13 11:46:00');
INSERT INTO `tbl_log` VALUES (331, 'tbl_item', 'insert', 'ITEM0018', '', '2021-01-13 11:55:00');
INSERT INTO `tbl_log` VALUES (332, 'tbl_item', 'insert', 'ITEM0019', '', '2021-01-13 11:58:00');
INSERT INTO `tbl_log` VALUES (333, 'tbl_item', 'insert', 'ITEM0020', '', '2021-01-13 12:00:00');
INSERT INTO `tbl_log` VALUES (334, 'tbl_item', 'insert', 'ITEM0021', '', '2021-01-13 12:13:00');
INSERT INTO `tbl_log` VALUES (335, 'tbl_item', 'update', 'ITEM0021', '', '2021-01-13 12:13:00');
INSERT INTO `tbl_log` VALUES (336, 'tbl_item', 'insert', 'ITEM0022', '', '2021-01-13 12:14:00');
INSERT INTO `tbl_log` VALUES (337, 'tbl_item', 'insert', 'ITEM0023', '', '2021-01-13 12:19:00');
INSERT INTO `tbl_log` VALUES (338, 'tbl_item', 'insert', 'ITEM0024', '', '2021-01-13 12:21:00');
INSERT INTO `tbl_log` VALUES (339, 'tbl_item', 'insert', 'ITEM0025', '', '2021-01-13 12:25:00');
INSERT INTO `tbl_log` VALUES (340, 'tbl_item', 'insert', 'ITEM0026', '', '2021-01-13 12:27:00');
INSERT INTO `tbl_log` VALUES (341, 'tbl_item', 'insert', 'ITEM0027', '', '2021-01-13 12:31:00');
INSERT INTO `tbl_log` VALUES (342, 'tbl_item', 'insert', 'ITEM0028', '', '2021-01-13 12:34:00');
INSERT INTO `tbl_log` VALUES (343, 'tbl_item', 'insert', 'ITEM0029', '', '2021-01-13 12:34:00');
INSERT INTO `tbl_log` VALUES (344, 'tbl_item', 'insert', 'ITEM0030', '', '2021-01-13 12:37:00');
INSERT INTO `tbl_log` VALUES (345, 'tbl_item', 'insert', 'ITEM0031', '', '2021-01-13 12:44:00');
INSERT INTO `tbl_log` VALUES (346, 'tbl_pelanggan', 'insert', 'PL0002', '', '2021-01-13 12:45:00');
INSERT INTO `tbl_log` VALUES (347, 'tbl_item', 'insert', 'ITEM0032', '', '2021-01-13 12:47:00');
INSERT INTO `tbl_log` VALUES (348, 'tbl_pelanggan', 'login', '', '', '2021-01-13 12:47:00');
INSERT INTO `tbl_log` VALUES (349, 'tbl_item', 'insert', 'ITEM0033', '', '2021-01-13 12:50:00');
INSERT INTO `tbl_log` VALUES (350, 'tbl_item', 'update', 'ITEM0033', '', '2021-01-13 12:51:00');
INSERT INTO `tbl_log` VALUES (351, 'tbl_item', 'insert', 'ITEM0034', '', '2021-01-13 12:54:00');
INSERT INTO `tbl_log` VALUES (352, 'tbl_item', 'insert', 'ITEM0035', '', '2021-01-13 12:59:00');
INSERT INTO `tbl_log` VALUES (353, 'tbl_item', 'insert', 'ITEM0036', '', '2021-01-13 13:04:00');
INSERT INTO `tbl_log` VALUES (354, 'tbl_item', 'insert', 'ITEM0037', '', '2021-01-13 13:05:00');
INSERT INTO `tbl_log` VALUES (355, 'tbl_item', 'insert', 'ITEM0038', '', '2021-01-13 13:07:00');
INSERT INTO `tbl_log` VALUES (356, 'tbl_item', 'insert', 'ITEM0039', '', '2021-01-13 13:21:00');
INSERT INTO `tbl_log` VALUES (357, 'tbl_item', 'insert', 'ITEM0040', '', '2021-01-13 13:32:00');
INSERT INTO `tbl_log` VALUES (358, 'tbl_pelanggan', 'login', '', '', '2021-01-14 04:08:00');
INSERT INTO `tbl_log` VALUES (359, 'tbl_item', 'insert', 'ITEM0041', '', '2021-01-14 04:17:00');
INSERT INTO `tbl_log` VALUES (360, 'tbl_item', 'insert', 'ITEM0042', '', '2021-01-14 04:20:00');
INSERT INTO `tbl_log` VALUES (361, 'tbl_item', 'insert', 'ITEM0043', '', '2021-01-14 04:22:00');
INSERT INTO `tbl_log` VALUES (362, 'tbl_item', 'insert', 'ITEM0044', '', '2021-01-14 04:25:00');
INSERT INTO `tbl_log` VALUES (363, 'tbl_pelanggan', 'restore', 'ITEM0001 - kodeitem', '', '2021-01-14 08:16:00');
INSERT INTO `tbl_log` VALUES (364, 'tbl_pelanggan', 'restore', 'ITEM0002 - kodeitem', '', '2021-01-14 08:16:00');
INSERT INTO `tbl_log` VALUES (365, 'tbl_pelanggan', 'restore', 'ITEM0004 - kodeitem', '', '2021-01-14 12:20:00');
INSERT INTO `tbl_log` VALUES (366, 'tbl_pelanggan', 'restore', 'ITEM0006 - kodeitem', '', '2021-01-14 12:20:00');
INSERT INTO `tbl_log` VALUES (367, 'tbl_pelanggan', 'restore', 'ITEM0008 - kodeitem', '', '2021-01-14 12:21:00');
INSERT INTO `tbl_log` VALUES (368, 'tbl_item', 'update', 'ITEM0008', '', '2021-01-14 12:23:00');
INSERT INTO `tbl_log` VALUES (369, 'tbl_item', 'delete', 'ITEM0001', '', '2021-01-14 12:26:00');
INSERT INTO `tbl_log` VALUES (370, 'tbl_blog', 'delete', 'BLOG0001', '', '2021-01-14 12:29:00');
INSERT INTO `tbl_log` VALUES (371, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:15:00');
INSERT INTO `tbl_log` VALUES (372, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:16:00');
INSERT INTO `tbl_log` VALUES (373, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:16:00');
INSERT INTO `tbl_log` VALUES (374, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:18:00');
INSERT INTO `tbl_log` VALUES (375, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:19:00');
INSERT INTO `tbl_log` VALUES (376, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:20:00');
INSERT INTO `tbl_log` VALUES (377, 'tbl_item', 'update', 'ITEM0002', '', '2021-02-04 11:47:00');
INSERT INTO `tbl_log` VALUES (378, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 07:41:00');
INSERT INTO `tbl_log` VALUES (379, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 07:42:00');
INSERT INTO `tbl_log` VALUES (380, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 07:42:00');
INSERT INTO `tbl_log` VALUES (381, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 08:19:00');
INSERT INTO `tbl_log` VALUES (382, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 08:20:00');
INSERT INTO `tbl_log` VALUES (383, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 08:24:00');
INSERT INTO `tbl_log` VALUES (384, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 08:25:00');
INSERT INTO `tbl_log` VALUES (385, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-08 08:26:00');
INSERT INTO `tbl_log` VALUES (386, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-08 09:02:00');
INSERT INTO `tbl_log` VALUES (387, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-08 09:02:00');
INSERT INTO `tbl_log` VALUES (388, 'tbl_pelanggan', 'login', '', '', '2021-02-09 07:25:00');
INSERT INTO `tbl_log` VALUES (389, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-09 07:36:00');
INSERT INTO `tbl_log` VALUES (390, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-09 08:06:00');
INSERT INTO `tbl_log` VALUES (391, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-09 08:10:00');
INSERT INTO `tbl_log` VALUES (392, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-09 08:14:00');
INSERT INTO `tbl_log` VALUES (393, 'tbl_admin', 'update', 'admin', '', '2021-02-09 08:43:00');
INSERT INTO `tbl_log` VALUES (394, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0007', '', '2021-02-09 08:50:00');
INSERT INTO `tbl_log` VALUES (395, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0007', '', '2021-02-09 08:52:00');
INSERT INTO `tbl_log` VALUES (396, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-11 16:08:00');
INSERT INTO `tbl_log` VALUES (397, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:10:00');
INSERT INTO `tbl_log` VALUES (398, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:11:00');
INSERT INTO `tbl_log` VALUES (399, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:11:00');
INSERT INTO `tbl_log` VALUES (400, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:12:00');
INSERT INTO `tbl_log` VALUES (401, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:13:00');
INSERT INTO `tbl_log` VALUES (402, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-11 16:13:00');
INSERT INTO `tbl_log` VALUES (403, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0009', '', '2021-02-11 17:10:00');
INSERT INTO `tbl_log` VALUES (404, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0009', '', '2021-02-11 17:22:00');
INSERT INTO `tbl_log` VALUES (405, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0009', '', '2021-02-11 17:24:00');
INSERT INTO `tbl_log` VALUES (406, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0009', '', '2021-02-11 17:25:00');
INSERT INTO `tbl_log` VALUES (407, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0009', '', '2021-02-11 17:25:00');
INSERT INTO `tbl_log` VALUES (408, 'tbl_pelanggan', 'login', '', '', '2021-02-12 14:06:00');
INSERT INTO `tbl_log` VALUES (409, 'tbl_admin', 'update', 'admin', '', '2021-02-14 12:32:00');
INSERT INTO `tbl_log` VALUES (410, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-14 12:34:00');
INSERT INTO `tbl_log` VALUES (411, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-14 12:35:00');
INSERT INTO `tbl_log` VALUES (412, 'tbl_pelanggan', 'login', '', '', '2021-02-14 12:38:00');
INSERT INTO `tbl_log` VALUES (413, 'tbl_pelanggan', 'update', 'chandra', '', '2021-02-14 12:38:00');
INSERT INTO `tbl_log` VALUES (414, 'tbl_admin', 'update', 'admin', '', '2021-02-14 12:51:00');
INSERT INTO `tbl_log` VALUES (415, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-14 13:07:00');
INSERT INTO `tbl_log` VALUES (416, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-14 13:24:00');
INSERT INTO `tbl_log` VALUES (417, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-14 13:45:00');
INSERT INTO `tbl_log` VALUES (418, 'tbl_pelanggan', 'login', '', '', '2021-02-14 14:07:00');
INSERT INTO `tbl_log` VALUES (419, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-18 12:44:00');
INSERT INTO `tbl_log` VALUES (420, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-18 12:45:00');
INSERT INTO `tbl_log` VALUES (421, 'tbl_pelanggan', 'login', '', '', '2021-02-18 12:45:00');
INSERT INTO `tbl_log` VALUES (422, 'tbl_pelanggan', 'login', '', '', '2021-02-18 12:47:00');
INSERT INTO `tbl_log` VALUES (423, 'tbl_item', 'update', 'ITEM0008', '', '2021-02-18 12:47:00');
INSERT INTO `tbl_log` VALUES (424, 'tbl_item', 'update', 'ITEM0012', '', '2021-02-24 11:56:00');
INSERT INTO `tbl_log` VALUES (425, 'tbl_pelanggan', 'login', '', '', '2021-02-24 11:57:00');
INSERT INTO `tbl_log` VALUES (426, 'tbl_item', 'update', 'ITEM0002', '', '2021-03-02 12:14:00');
INSERT INTO `tbl_log` VALUES (427, 'tbl_pelanggan', 'login', '', '', '2021-03-08 02:18:00');
INSERT INTO `tbl_log` VALUES (428, 'tbl_item', 'update', 'ITEM0002', '', '2021-03-09 04:00:00');
INSERT INTO `tbl_log` VALUES (429, 'tbl_kategori_item', 'insert', 'KATEGORI0008', '', '2021-03-09 04:05:00');
INSERT INTO `tbl_log` VALUES (430, 'tbl_item', 'insert', 'ITEM0045', '', '2021-03-09 05:09:00');
INSERT INTO `tbl_log` VALUES (431, 'tbl_item', 'insert', 'ITEM0046', '', '2021-03-09 05:59:00');
INSERT INTO `tbl_log` VALUES (432, 'tbl_item', 'insert', 'ITEM0047', '', '2021-03-09 06:00:00');
INSERT INTO `tbl_log` VALUES (433, 'tbl_item', 'insert', 'ITEM0048', '', '2021-03-09 06:01:00');
INSERT INTO `tbl_log` VALUES (434, 'tbl_item', 'insert', 'ITEM0049', '', '2021-03-09 06:03:00');
INSERT INTO `tbl_log` VALUES (435, 'tbl_item', 'update', 'ITEM0049', '', '2021-03-09 06:04:00');
INSERT INTO `tbl_log` VALUES (436, 'tbl_item', 'insert', 'ITEM0050', '', '2021-03-09 06:07:00');
INSERT INTO `tbl_log` VALUES (437, 'tbl_item', 'update', 'ITEM0050', '', '2021-03-09 06:07:00');
INSERT INTO `tbl_log` VALUES (438, 'tbl_item', 'update', 'ITEM0002', '', '2021-03-12 01:55:00');
INSERT INTO `tbl_log` VALUES (439, 'tbl_item', 'insert', 'ITEM0051', '', '2021-04-06 01:57:00');
INSERT INTO `tbl_log` VALUES (440, 'tbl_item', 'update', 'ITEM0033', '', '2021-04-06 01:58:00');
INSERT INTO `tbl_log` VALUES (441, 'tbl_kategori_item', 'insert', 'KATEGORI0009', '', '2021-04-06 02:00:00');
INSERT INTO `tbl_log` VALUES (442, 'tbl_kategori_item', 'delete', 'KATEGORI0004', '', '2021-04-06 02:05:00');
INSERT INTO `tbl_log` VALUES (443, 'tbl_kategori_item', 'update', 'KATEGORI0002', '', '2021-04-06 02:05:00');
INSERT INTO `tbl_log` VALUES (444, 'tbl_admin', 'update', 'Agus Budi', '', '2021-04-06 02:14:00');
INSERT INTO `tbl_log` VALUES (445, 'tbl_item', 'insert', 'ITEM0052', '', '2021-04-06 02:15:00');
INSERT INTO `tbl_log` VALUES (446, 'tbl_config', 'update', 'NAMA_TOKO', '', '2021-04-06 02:20:00');
INSERT INTO `tbl_log` VALUES (447, 'tbl_item', 'insert', 'ITEM0053', '', '2021-04-06 02:40:00');
INSERT INTO `tbl_log` VALUES (448, 'tbl_item', 'insert', 'ITEM0054', '', '2021-04-06 02:42:00');
INSERT INTO `tbl_log` VALUES (449, 'tbl_item', 'insert', 'ITEM0055', '', '2021-04-06 02:59:00');
INSERT INTO `tbl_log` VALUES (450, 'tbl_item', 'update', 'ITEM0006', '', '2021-04-06 03:02:00');
INSERT INTO `tbl_log` VALUES (451, 'tbl_item', 'update', 'ITEM0006', '', '2021-04-06 03:03:00');
INSERT INTO `tbl_log` VALUES (452, 'tbl_item', 'update', 'ITEM0041', '', '2021-04-07 03:17:00');
INSERT INTO `tbl_log` VALUES (453, 'tbl_item', 'update', 'ITEM0043', '', '2021-04-07 03:19:00');
INSERT INTO `tbl_log` VALUES (454, 'tbl_pelanggan', 'login', '', '', '2021-04-07 03:22:00');
INSERT INTO `tbl_log` VALUES (455, 'tbl_pelanggan', 'insert', 'PL0003', '', '2021-04-07 03:31:00');
INSERT INTO `tbl_log` VALUES (456, 'tbl_pelanggan', 'login', '', '', '2021-04-07 03:32:00');
INSERT INTO `tbl_log` VALUES (457, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0016', '', '2021-04-07 03:55:00');
INSERT INTO `tbl_log` VALUES (458, 'tbl_transaksi_hd', 'update', 'TRANSAKSI0016', '', '2021-04-07 04:10:00');
INSERT INTO `tbl_log` VALUES (459, 'tbl_kategori_item', 'update', 'KATEGORI0001', '', '2021-04-07 05:12:00');
INSERT INTO `tbl_log` VALUES (460, 'tbl_kategori_item', 'update', 'KATEGORI0005', '', '2021-04-07 05:12:00');
INSERT INTO `tbl_log` VALUES (461, 'tbl_item', 'insert', 'ITEM0056', '', '2021-04-07 07:28:00');
INSERT INTO `tbl_log` VALUES (462, 'tbl_item', 'insert', 'ITEM0057', '', '2021-04-07 07:31:00');
INSERT INTO `tbl_log` VALUES (463, 'tbl_item', 'insert', 'ITEM0058', '', '2021-04-07 07:32:00');
INSERT INTO `tbl_log` VALUES (464, 'tbl_pelanggan', 'login', '', '', '2021-04-07 12:38:00');
INSERT INTO `tbl_log` VALUES (465, 'tbl_pelanggan', 'login', '', '', '2021-04-07 13:03:00');
INSERT INTO `tbl_log` VALUES (466, 'tbl_item', 'insert', 'ITEM0059', '', '2021-04-10 04:16:00');
INSERT INTO `tbl_log` VALUES (467, 'tbl_pelanggan', 'login', '', '', '2021-04-10 04:17:00');
INSERT INTO `tbl_log` VALUES (468, 'tbl_item', 'insert', 'ITEM0060', '', '2021-04-10 04:22:00');
INSERT INTO `tbl_log` VALUES (469, 'tbl_item', 'insert', 'ITEM0061', '', '2021-04-10 04:23:00');
INSERT INTO `tbl_log` VALUES (470, 'tbl_item', 'insert', 'ITEM0062', '', '2021-04-10 04:24:00');
INSERT INTO `tbl_log` VALUES (471, 'tbl_item', 'insert', 'ITEM0063', '', '2021-04-10 04:28:00');
INSERT INTO `tbl_log` VALUES (472, 'tbl_item', 'insert', 'ITEM0064', '', '2021-04-10 04:36:00');
INSERT INTO `tbl_log` VALUES (473, 'tbl_item', 'insert', 'ITEM0065', '', '2021-04-10 04:37:00');
INSERT INTO `tbl_log` VALUES (474, 'tbl_item', 'insert', 'ITEM0066', '', '2021-04-10 04:39:00');
INSERT INTO `tbl_log` VALUES (475, 'tbl_item', 'insert', 'ITEM0067', '', '2021-04-10 04:40:00');
INSERT INTO `tbl_log` VALUES (476, 'tbl_item', 'insert', 'ITEM0068', '', '2021-04-10 04:42:00');
INSERT INTO `tbl_log` VALUES (477, 'tbl_item', 'update', 'ITEM0065', '', '2021-04-10 04:42:00');
INSERT INTO `tbl_log` VALUES (478, 'tbl_item', 'insert', 'ITEM0069', '', '2021-04-10 04:49:00');
INSERT INTO `tbl_log` VALUES (479, 'tbl_item', 'update', 'ITEM0069', '', '2021-04-10 04:55:00');
INSERT INTO `tbl_log` VALUES (480, 'tbl_item', 'insert', 'ITEM0070', '', '2021-04-10 05:18:00');
INSERT INTO `tbl_log` VALUES (481, 'tbl_item', 'insert', 'ITEM0071', '', '2021-04-10 05:20:00');
INSERT INTO `tbl_log` VALUES (482, 'tbl_item', 'insert', 'ITEM0072', '', '2021-04-10 05:21:00');
INSERT INTO `tbl_log` VALUES (483, 'tbl_item', 'insert', 'ITEM0073', '', '2021-04-10 05:40:00');
INSERT INTO `tbl_log` VALUES (484, 'tbl_pelanggan', 'login', '', '', '2021-04-10 05:40:00');
INSERT INTO `tbl_log` VALUES (485, 'tbl_item', 'update', 'ITEM0073', '', '2021-04-10 05:41:00');
INSERT INTO `tbl_log` VALUES (486, 'tbl_item', 'insert', 'ITEM0074', '', '2021-04-10 05:42:00');
INSERT INTO `tbl_log` VALUES (487, 'tbl_item', 'insert', 'ITEM0075', '', '2021-04-10 06:15:00');
INSERT INTO `tbl_log` VALUES (488, 'tbl_item', 'update', 'ITEM0075', '', '2021-04-10 06:24:00');
INSERT INTO `tbl_log` VALUES (489, 'tbl_item', 'insert', 'ITEM0076', '', '2021-04-10 06:26:00');
INSERT INTO `tbl_log` VALUES (490, 'tbl_item', 'insert', 'ITEM0077', '', '2021-04-10 06:28:00');
INSERT INTO `tbl_log` VALUES (491, 'tbl_item', 'insert', 'ITEM0078', '', '2021-04-10 06:36:00');
INSERT INTO `tbl_log` VALUES (492, 'tbl_item', 'insert', 'ITEM0079', '', '2021-04-10 06:38:00');
INSERT INTO `tbl_log` VALUES (493, 'tbl_item', 'insert', 'ITEM0080', '', '2021-04-10 06:39:00');
INSERT INTO `tbl_log` VALUES (494, 'tbl_item', 'insert', 'ITEM0081', '', '2021-04-10 07:07:00');
INSERT INTO `tbl_log` VALUES (495, 'tbl_item', 'insert', 'ITEM0082', '', '2021-04-10 07:08:00');
INSERT INTO `tbl_log` VALUES (496, 'tbl_item', 'insert', 'ITEM0083', '', '2021-04-10 07:09:00');
INSERT INTO `tbl_log` VALUES (497, 'tbl_item', 'insert', 'ITEM0084', '', '2021-04-10 07:10:00');
INSERT INTO `tbl_log` VALUES (498, 'tbl_item', 'insert', 'ITEM0085', '', '2021-04-10 07:11:00');
INSERT INTO `tbl_log` VALUES (499, 'tbl_item', 'insert', 'ITEM0086', '', '2021-04-10 07:12:00');
INSERT INTO `tbl_log` VALUES (500, 'tbl_item', 'insert', 'ITEM0087', '', '2021-04-10 07:14:00');
INSERT INTO `tbl_log` VALUES (501, 'tbl_item', 'insert', 'ITEM0088', '', '2021-04-10 07:14:00');
INSERT INTO `tbl_log` VALUES (502, 'tbl_item', 'insert', 'ITEM0089', '', '2021-04-10 07:15:00');
INSERT INTO `tbl_log` VALUES (503, 'tbl_item', 'insert', 'ITEM0090', '', '2021-04-10 07:16:00');
INSERT INTO `tbl_log` VALUES (504, 'tbl_item', 'update', 'ITEM0002', '', '2021-04-11 06:50:00');
INSERT INTO `tbl_log` VALUES (505, 'tbl_item', 'insert', 'ITEM0091', '', '2021-04-19 04:47:00');
INSERT INTO `tbl_log` VALUES (506, 'tbl_ongkir', 'insert', 'ONGKIR0001', '', '2021-04-23 03:16:00');
INSERT INTO `tbl_log` VALUES (507, 'tbl_ongkir', 'update', 'ONGKIR0001', '', '2021-04-23 03:18:00');
INSERT INTO `tbl_log` VALUES (508, 'tbl_ongkir', 'insert', 'ONGKIR0002', '', '2021-04-23 03:19:00');
INSERT INTO `tbl_log` VALUES (509, 'tbl_config', 'update', 'REK_AN', '', '2021-04-23 03:22:00');
INSERT INTO `tbl_log` VALUES (510, 'tbl_config', 'update', 'REK_BANK', '', '2021-04-23 03:22:00');
INSERT INTO `tbl_log` VALUES (511, 'tbl_config', 'update', 'REK_NOREK', '', '2021-04-23 03:22:00');
INSERT INTO `tbl_log` VALUES (512, 'tbl_pelanggan', 'login', '', '', '2021-04-23 03:23:00');
INSERT INTO `tbl_log` VALUES (513, 'tbl_ongkir', 'insert', 'ONGKIR0003', '', '2021-04-23 03:33:00');
INSERT INTO `tbl_log` VALUES (514, 'tbl_pelanggan', 'login', '', '', '2021-04-30 06:10:00');

-- ----------------------------
-- Table structure for tbl_pura
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pura`;
CREATE TABLE `tbl_pura`  (
  `kodepura` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kodeuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenispura` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `namapura` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamatpura` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kabupaten` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `provinsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ketuapengelola` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `notelepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nomor_tanda_daftar_pura` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kondisipura` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'BAIK, RUSAK',
  `piodalan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `luaspura` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keteranganpura` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status_tanah_pura` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'SERTIFIKAT, BELUM SERTIFIKAT, HIBAH',
  `dateaddpura` datetime(0) DEFAULT NULL,
  `dateupdpura` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`kodepura`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pura
-- ----------------------------
INSERT INTO `tbl_pura` VALUES ('PURA001', 'USER0001', 'SAD KHAYANGAN', 'Besakih', '--', NULL, NULL, 'Karangasem', 'Bali', '--', '--', '51.07.01.2004', 'BAIK', '--', '21,23 km', NULL, 'SERTIFIKAT', '2021-09-15 00:00:00', '2021-09-15 00:00:00');
INSERT INTO `tbl_pura` VALUES ('PURA002', 'USER0001', 'SAD KHAYANGAN', 'Pura Penataran Agung Lempuyang', 'Banjar Purwa Ayu, Desa Tribuana, Kecamatan Abang, Karangasem', NULL, NULL, 'Karangasem', 'Bali', '', '--', '--', 'BAIK', '--', '603 meter', NULL, 'SERTIFIKAT', '2021-09-15 00:00:00', '2021-09-15 00:00:00');
INSERT INTO `tbl_pura` VALUES ('PURA003', 'USER0001', 'SAD KHAYANGAN', 'Pura Luhur Batukau', 'Desa Wongaya Gede, Kecamatan Penebel', NULL, NULL, 'Tabanan', 'Bali', '', '--', '--', 'BAIK', '--', '--', NULL, 'SERTIFIKAT', '2021-09-15 00:00:00', '2021-09-15 00:00:00');
INSERT INTO `tbl_pura` VALUES ('PURA004', 'USER002', 'JAGATNATHA', 'Pura Ulun Danu Bratan', '--', NULL, NULL, 'Tabanan', 'Bali', '', '--', '--', 'BAIK', '--', '21,23 km', NULL, 'SERTIFIKAT', '2021-09-15 00:00:00', '2021-09-15 00:00:00');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `kodeuser` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `namauser` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `akses` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '\'ADMIN\', \'PIC\'',
  `dateadduser` datetime(0) DEFAULT NULL,
  `dateupduser` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`kodeuser`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('USER0001', 'admin', 'admin', 'Admin Sistem', 'ADMIN', '2021-09-14 10:30:06', '2021-09-14 10:30:10');
INSERT INTO `tbl_user` VALUES ('USER002', 'dipo', '12345', 'Dipayana Gde', 'PIC', '2021-09-15 00:00:00', '2021-09-15 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
