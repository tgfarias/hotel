/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : igrejadecristo

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-03-28 14:41:45
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_configuracoes
-- ----------------------------
INSERT INTO `tb_configuracoes` VALUES ('1', 'titulo_site', 'Igreja de Cristo - Sede', 'Título do site');
INSERT INTO `tb_configuracoes` VALUES ('2', 'slogan_site', 'Site de exemplo', 'Slogan do site');
INSERT INTO `tb_configuracoes` VALUES ('3', 'head_descricao', 'Um site de modelo para teste e apresentação do LifeCMS', 'Cabeçalho de descrição do site.');
INSERT INTO `tb_configuracoes` VALUES ('10', 'destino_contato', 'elieldepaula@gmail.com', 'Destinatário do formulário de contato');
INSERT INTO `tb_configuracoes` VALUES ('12', 'rodape_site', '® 2013 Site de base, todos os direitos reservados.', 'Mensagem do rodapé do site.');
INSERT INTO `tb_configuracoes` VALUES ('13', 'link_facebook', 'http://www.facebook.com', 'Link do Facebook');
INSERT INTO `tb_configuracoes` VALUES ('14', 'link_twitter', 'http://www.twitter.com', 'Link para o Twitter');
