/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : essencials

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-03-28 15:12:16
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Faz o registro dos accesos dos usuários no sistema.';

-- ----------------------------
-- Records of tb_acessos
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_configuracoes`
-- ----------------------------
DROP TABLE IF EXISTS `tb_configuracoes`;
CREATE TABLE `tb_configuracoes` (
  `cod_config` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `conf_key` varchar(45) NOT NULL COMMENT 'Chave',
  `conf_value` varchar(255) NOT NULL COMMENT 'Valor',
  `conf_descricao` varchar(255) NOT NULL COMMENT 'Descrição',
  PRIMARY KEY (`cod_config`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_configuracoes
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_modulos`
-- ----------------------------
DROP TABLE IF EXISTS `tb_modulos`;
CREATE TABLE `tb_modulos` (
  `cod_modulo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `cod_usuario` int(11) NOT NULL COMMENT 'Usuário',
  `mod_titulo` varchar(100) COLLATE latin1_bin DEFAULT NULL COMMENT 'Título',
  `mod_descricao` text COLLATE latin1_bin COMMENT 'Descrição',
  `mod_link` varchar(45) COLLATE latin1_bin DEFAULT NULL COMMENT 'Link',
  `mod_label` varchar(45) COLLATE latin1_bin DEFAULT NULL COMMENT 'Label',
  `mod_visivel` tinyint(4) DEFAULT NULL COMMENT 'Vivível',
  `mod_ativo` tinyint(4) DEFAULT NULL COMMENT 'Ativo',
  `mod_data_cad` datetime DEFAULT NULL COMMENT 'Desde',
  PRIMARY KEY (`cod_modulo`,`cod_usuario`),
  KEY `fk_tb_modulos_tb_usuarios1` (`cod_usuario`),
  CONSTRAINT `fk_tb_modulos_tb_usuarios1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- ----------------------------
-- Records of tb_modulos
-- ----------------------------

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
INSERT INTO `tb_usuarios` VALUES ('1', 'Administrador', 'admin@admin.com', '89794b621a313bb59eed0d9f0f4e8205', '', '1', '1', '2012-07-15 12:00:00');
