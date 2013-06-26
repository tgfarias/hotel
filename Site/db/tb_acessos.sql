/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : igrejadecristo

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-03-28 12:05:44
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tb_acessos`
-- ----------------------------
DROP TABLE IF EXISTS `tb_acessos`;
CREATE TABLE `tb_acessos` (
  `cod_acesso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `cod_usuario` int(11) NOT NULL COMMENT 'Usuário',
  `ace_data` datetime DEFAULT NULL COMMENT 'Data',
  `ace_ip` varchar(45) COLLATE latin1_bin DEFAULT NULL COMMENT 'IP',
  PRIMARY KEY (`cod_acesso`,`cod_usuario`),
  KEY `fk_tb_acessos_tb_usuarios` (`cod_usuario`),
  CONSTRAINT `fk_tb_acessos_tb_usuarios` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Faz o registro dos accesos dos usuários no sistema.';

-- ----------------------------
-- Records of tb_acessos
-- ----------------------------
INSERT INTO `tb_acessos` VALUES ('1', '1', '2013-01-23 04:35:59', '::1');
INSERT INTO `tb_acessos` VALUES ('2', '1', '2013-02-01 13:00:35', '::1');
INSERT INTO `tb_acessos` VALUES ('3', '1', '2013-02-01 13:03:32', '::1');
INSERT INTO `tb_acessos` VALUES ('4', '1', '2013-02-04 17:46:13', '::1');
INSERT INTO `tb_acessos` VALUES ('5', '1', '2013-02-06 01:11:58', '::1');
INSERT INTO `tb_acessos` VALUES ('6', '1', '2013-02-06 03:34:24', '::1');
INSERT INTO `tb_acessos` VALUES ('7', '1', '2013-02-06 13:22:32', '::1');
INSERT INTO `tb_acessos` VALUES ('8', '1', '2013-03-01 02:47:09', '::1');
INSERT INTO `tb_acessos` VALUES ('9', '1', '2013-03-04 17:51:17', '::1');
INSERT INTO `tb_acessos` VALUES ('10', '1', '2013-03-10 16:36:10', '::1');
INSERT INTO `tb_acessos` VALUES ('11', '1', '2013-03-23 16:21:36', '::1');
INSERT INTO `tb_acessos` VALUES ('12', '1', '2013-03-25 22:37:31', '::1');
