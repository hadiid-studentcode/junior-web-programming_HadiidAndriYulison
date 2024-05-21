/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : db_kacamata

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 20/05/2024 11:54:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for distributor
-- ----------------------------
DROP TABLE IF EXISTS `distributor`;
CREATE TABLE `distributor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of distributor
-- ----------------------------
INSERT INTO `distributor` VALUES (1, 'S001', 'PT.Asparindo Nusaphala', 'Bekasi', 'aspan@indo.com', '+6200137', 'Budi');
INSERT INTO `distributor` VALUES (2, 'S002', 'CV.Multi Industrindo', 'Jakarta', 'multi@indo.com', '+6200123', 'Didu');

-- ----------------------------
-- Table structure for lensa
-- ----------------------------
DROP TABLE IF EXISTS `lensa`;
CREATE TABLE `lensa`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` float(255, 0) NULL DEFAULT NULL,
  `stok` int(11) NULL DEFAULT NULL,
  `id_distributor` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `relasi_distributor`(`id_distributor`) USING BTREE,
  CONSTRAINT `relasi_distributor` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lensa
-- ----------------------------
INSERT INTO `lensa` VALUES (1, 'L001', 'Tunggal', 'Hoya', 700000, 70, 1);
INSERT INTO `lensa` VALUES (2, 'L002', 'Bifokal', 'Zeiss', 800000, 40, 2);
INSERT INTO `lensa` VALUES (3, 'L003', 'Progresif', 'Oakley', 850000, 30, 2);
INSERT INTO `lensa` VALUES (4, 'L004', 'Transisi', 'Essilor', 975000, 10, 1);

SET FOREIGN_KEY_CHECKS = 1;
