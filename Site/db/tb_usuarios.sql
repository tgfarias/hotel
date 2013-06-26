/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : igrejadecristo

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-03-28 12:05:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tb_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `usu_nome` varchar(45) COLLATE latin1_bin DEFAULT NULL COMMENT 'Nome',
  `usu_email` varchar(100) COLLATE latin1_bin DEFAULT NULL COMMENT 'Email',
  `usu_senha` varchar(255) COLLATE latin1_bin DEFAULT NULL COMMENT 'Senha',
  `usu_permissoes` varchar(255) COLLATE latin1_bin DEFAULT NULL COMMENT 'Permissões',
  `usu_admin` tinyint(4) DEFAULT NULL COMMENT 'Master',
  `usu_ativo` tinyint(4) DEFAULT NULL COMMENT 'Ativo',
  `usu_data_cad` datetime DEFAULT NULL COMMENT 'Desde',
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- ----------------------------
-- Records of tb_usuarios
-- ----------------------------
INSERT INTO `tb_usuarios` VALUES ('1', 'Administrador', 'admin@admin', '89794b621a313bb59eed0d9f0f4e8205', '', '1', '1', '2012-07-15 12:00:00');
