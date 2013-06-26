/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : hotel

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-04-09 17:52:48
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `alocacoes`
-- ----------------------------
DROP TABLE IF EXISTS `alocacoes`;
CREATE TABLE `alocacoes` (
  `cod_alocacao` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hospedagem` int(11) NOT NULL,
  `cod_hospede` int(11) NOT NULL,
  `cod_apartamento` int(11) NOT NULL,
  PRIMARY KEY (`cod_alocacao`,`cod_hospedagem`,`cod_hospede`,`cod_apartamento`),
  KEY `fk_alocacoes_hospedagens1` (`cod_hospedagem`),
  KEY `fk_alocacoes_hospedes1` (`cod_hospede`),
  KEY `fk_alocacoes_apartamentos1` (`cod_apartamento`),
  CONSTRAINT `fk_alocacoes_apartamentos1` FOREIGN KEY (`cod_apartamento`) REFERENCES `apartamentos` (`cod_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alocacoes_hospedagens1` FOREIGN KEY (`cod_hospedagem`) REFERENCES `hospedagens` (`cod_hospedagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alocacoes_hospedes1` FOREIGN KEY (`cod_hospede`) REFERENCES `hospedes` (`cod_hospede`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alocacoes
-- ----------------------------

-- ----------------------------
-- Table structure for `apartamentos`
-- ----------------------------
DROP TABLE IF EXISTS `apartamentos`;
CREATE TABLE `apartamentos` (
  `cod_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cat_apartamento` int(11) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `ramal` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_apartamento`,`cod_cat_apartamento`),
  KEY `fk_apartamentos_categoria_apartamento` (`cod_cat_apartamento`),
  CONSTRAINT `fk_apartamentos_categoria_apartamento` FOREIGN KEY (`cod_cat_apartamento`) REFERENCES `categoria_apartamento` (`cod_cat_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of apartamentos
-- ----------------------------

-- ----------------------------
-- Table structure for `categoria_apartamento`
-- ----------------------------
DROP TABLE IF EXISTS `categoria_apartamento`;
CREATE TABLE `categoria_apartamento` (
  `cod_cat_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descricao` text,
  `imagem` varchar(255) DEFAULT NULL,
  `valor_normal` double DEFAULT NULL,
  `valor_alta` double DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`cod_cat_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria_apartamento
-- ----------------------------

-- ----------------------------
-- Table structure for `consumos`
-- ----------------------------
DROP TABLE IF EXISTS `consumos`;
CREATE TABLE `consumos` (
  `cod_consumo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hospedagem` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  PRIMARY KEY (`cod_consumo`,`cod_hospedagem`,`cod_produto`),
  KEY `fk_consumos_hospedagens1` (`cod_hospedagem`),
  KEY `fk_consumos_produtos1` (`cod_produto`),
  CONSTRAINT `fk_consumos_hospedagens1` FOREIGN KEY (`cod_hospedagem`) REFERENCES `hospedagens` (`cod_hospedagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consumos_produtos1` FOREIGN KEY (`cod_produto`) REFERENCES `produtos` (`cod_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of consumos
-- ----------------------------

-- ----------------------------
-- Table structure for `estoque`
-- ----------------------------
DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `cod_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `cod_produto` int(11) NOT NULL,
  `valor_custo` double DEFAULT NULL,
  `valor_venda` double DEFAULT NULL,
  `margem_lucro` double DEFAULT NULL,
  `qdte_minima` int(11) DEFAULT NULL,
  `qtde_atual` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_estoque`,`cod_produto`),
  KEY `fk_estoque_produtos1` (`cod_produto`),
  CONSTRAINT `fk_estoque_produtos1` FOREIGN KEY (`cod_produto`) REFERENCES `produtos` (`cod_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estoque
-- ----------------------------
INSERT INTO `estoque` VALUES ('1', '1', '0.5', '1.5', '0', '50', '50');

-- ----------------------------
-- Table structure for `fornecedores`
-- ----------------------------
DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE `fornecedores` (
  `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(45) DEFAULT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `ie` varchar(45) DEFAULT NULL,
  `im` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cod_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fornecedores
-- ----------------------------
INSERT INTO `fornecedores` VALUES ('1', 'Fornecedor de testes', 'Fornecedor Geral', '123456789', '1212121', '5454545', 'Sem endereço definido', '101', 'Sem complemento', 'Centro', 'Palmas', 'TO', '77000000', '63-1234-5678', 'fornecedor@site.com', 'www.sitedofornecedor.com.br', '1');

-- ----------------------------
-- Table structure for `funcionarios`
-- ----------------------------
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE `funcionarios` (
  `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_turno` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cod_funcionario`,`cod_turno`),
  KEY `fk_funcionarios_turnos1` (`cod_turno`),
  KEY `fk_funcionarios_tb_usuarios1_idx` (`cod_usuario`),
  CONSTRAINT `fk_funcionarios_tb_usuarios1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionarios_turnos1` FOREIGN KEY (`cod_turno`) REFERENCES `turnos` (`cod_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of funcionarios
-- ----------------------------
INSERT INTO `funcionarios` VALUES ('1', '1', '1', 'João da Silva', 'Recepcionista', '0000-00-00', '63-1234-5678', 'joao@dasilva.com.br', '1');

-- ----------------------------
-- Table structure for `hospedagens`
-- ----------------------------
DROP TABLE IF EXISTS `hospedagens`;
CREATE TABLE `hospedagens` (
  `cod_hospedagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL COMMENT 'Reserva ou Hospedagem',
  `data_entrada` date DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `data_fechamento` datetime DEFAULT NULL,
  `valor_ligacoes` double DEFAULT NULL,
  `valor_consumos` double DEFAULT NULL,
  `valor_servicos` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `valor_desconto` double DEFAULT NULL,
  PRIMARY KEY (`cod_hospedagem`),
  KEY `fk_hospedagens_tb_usuarios1_idx` (`cod_usuario`),
  CONSTRAINT `fk_hospedagens_tb_usuarios1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hospedagens
-- ----------------------------

-- ----------------------------
-- Table structure for `hospedes`
-- ----------------------------
DROP TABLE IF EXISTS `hospedes`;
CREATE TABLE `hospedes` (
  `cod_hospede` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `orgao_emissor` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `naturalidade` varchar(45) DEFAULT NULL,
  `data_nascimento` varchar(45) DEFAULT NULL,
  `est_civil` varchar(45) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cod_hospede`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hospedes
-- ----------------------------
INSERT INTO `hospedes` VALUES ('1', 'Maurício de Souza Aguiar', '123456', 'SSP/SP', '12345678912', 'Rua das rosas', '2345', 'Casa dos fundos', 'Vila Jardim', 'São paulo', 'SP', '01455369', '11-1234-5678', '11-8765-4321', 'mauricio@souza.com', 'Brasileiro', 'São paulo', '1981-12-09', 'Solteiro', '1');

-- ----------------------------
-- Table structure for `ligacoes`
-- ----------------------------
DROP TABLE IF EXISTS `ligacoes`;
CREATE TABLE `ligacoes` (
  `cod_ligacao` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hospedagem` int(11) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `fim` datetime DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`cod_ligacao`,`cod_hospedagem`),
  KEY `fk_ligacoes_hospedagens1` (`cod_hospedagem`),
  CONSTRAINT `fk_ligacoes_hospedagens1` FOREIGN KEY (`cod_hospedagem`) REFERENCES `hospedagens` (`cod_hospedagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ligacoes
-- ----------------------------

-- ----------------------------
-- Table structure for `produtos`
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `cod_produto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_fornecedor` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `valor_unitario` double DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`,`cod_fornecedor`),
  KEY `fk_produtos_fornecedores1` (`cod_fornecedor`),
  CONSTRAINT `fk_produtos_fornecedores1` FOREIGN KEY (`cod_fornecedor`) REFERENCES `fornecedores` (`cod_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES ('1', '1', 'Água com gás', '1.5', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Faz o registro dos accesos dos usuários no sistema.';

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
INSERT INTO `tb_acessos` VALUES ('13', '1', '2013-03-28 19:38:26', '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- ----------------------------
-- Records of tb_modulos
-- ----------------------------
INSERT INTO `tb_modulos` VALUES ('1', '1', 'Gerenciador de modulos', null, 'admin/modulos', 'Módulos', '1', '1', null);
INSERT INTO `tb_modulos` VALUES ('2', '1', 'Hospedes', 0x476572656E636961206F20636164617374726F20646520686F7370656465732E, 'admin/hospedes', 'Hóspedes', '1', '1', '2012-07-27 13:19:11');
INSERT INTO `tb_modulos` VALUES ('3', '1', 'Fornecedores', 0x476572656E636961206F20636164617374726F20646520666F726E656365646F726573, 'admin/fornecedores', 'Fornecedores', '1', '1', '2012-07-27 13:21:45');
INSERT INTO `tb_modulos` VALUES ('4', '1', 'Gerenciador de conteúdo', 0x476572656E63696120746F646F206F20636F6E7465C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC382C2A0C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383C2A2C3A2E282ACC5BEC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E2809AC382C2A0C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2BEC383E2809AC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C3A2E282ACC2A6C383E2809AC382C2A1C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E280A6C382C2A1C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2BA646F20646F2073697465, 'admin/conteudo', 'Conteúdo', '1', '1', '2012-07-27 13:34:54');
INSERT INTO `tb_modulos` VALUES ('5', '1', 'Gerenciador de enquete', 0x476572656E6369612061732070657371756973617320646520656E717565746520646F2073697465, 'admin/enquete', 'Enquetes', '1', '1', '2012-07-27 13:39:24');
INSERT INTO `tb_modulos` VALUES ('6', '1', 'Respostas de enquete', 0x476572656E63696120617320726573706F737461732064617320656E717565746573, 'admin/enq_respostas', 'Respostas', null, '1', '2012-07-27 13:42:25');
INSERT INTO `tb_modulos` VALUES ('8', '1', 'Galerias de mídia', 0x476572656E63696173206173206DC383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC382C2A0C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383C2A2C3A2E282ACC5BEC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E2809AC382C2A0C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2BEC383E2809AC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C3A2E282ACC2A6C383E2809AC382C2A1C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E280A6C382C2A1C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2AD6469617320646F20736974652E, 'admin/midias', 'Mídia', '1', '1', '2012-07-27 13:43:37');
INSERT INTO `tb_modulos` VALUES ('9', '1', 'Itens de mídia', 0x476572656E636961206F7320C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC382C2A0C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383C2A2C3A2E282ACC5BEC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E2809AC382C2A0C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2BEC383E2809AC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C3A2E282ACC2A6C383E2809AC382C2A1C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E280A6C382C2A1C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2AD74656E73206465206DC383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC382C2A0C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383C2A2C3A2E282ACC5BEC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E2809AC382C2A0C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2BEC383E2809AC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C3A2E282ACC2A6C383E2809AC382C2A1C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E280A6C382C2A1C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2AD646961, 'admin/itens_midia', 'Itens', null, '1', '2012-07-27 13:44:17');
INSERT INTO `tb_modulos` VALUES ('10', '1', 'Gerenciador de links', 0x476572656E636961206F73206C696E6B7320C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC382C2A0C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383C2A2C3A2E282ACC5BEC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E2809AC382C2A0C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2BEC383E2809AC382C2A2C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383E2809AC382C2A2C383C692C382C2A2C383C2A2C3A2E2809AC2ACC385C2A1C383E2809AC382C2ACC383C692C3A2E282ACC2A6C383E2809AC382C2A1C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C382C2A2C383C2A2C3A2E282ACC5A1C382C2ACC383E280A6C382C2A1C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2BA7465697320646F2073697465, 'admin/links', 'Links', '1', '1', '2012-07-27 13:45:05');
INSERT INTO `tb_modulos` VALUES ('11', '1', 'Gerenciador de banners', 0x476572656E636961206F732062616E6E65727320646F20736974652E, 'admin/banners', 'Banners', '1', '1', '2012-07-27 13:45:55');
INSERT INTO `tb_modulos` VALUES ('12', '1', 'Gerenciador de newsletter', 0x476572656E636961206F7320636164617374726F73206E61206E6577736C65747465722E, 'admin/newsletters', 'Newsletter', '1', '1', '2012-07-27 13:46:45');
INSERT INTO `tb_modulos` VALUES ('13', '1', 'Gerenciador de usuários', 0x476572656E636961206F7320757375C383C692C386E28099C383E280A0C3A2E282ACE284A2C383C692C3A2E282ACC2A0C383C2A2C3A2E2809AC2ACC3A2E2809EC2A2C383C692C386E28099C383C2A2C3A2E2809AC2ACC385C2A1C383C692C3A2E282ACC5A1C383E2809AC382C2A172696F7320646F2073697374656D612C20696465616C2070617261206F2061646D696E6973747261646F72207072696E636970616C2E, 'admin/usuarios', 'Usuários', null, '1', '2012-08-13 10:10:30');

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

-- ----------------------------
-- Table structure for `turnos`
-- ----------------------------
DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `cod_turno` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `hora_entrada` varchar(45) DEFAULT NULL,
  `hora_saida` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of turnos
-- ----------------------------
INSERT INTO `turnos` VALUES ('1', 'Manhã', '7:00', '13:00');
INSERT INTO `turnos` VALUES ('2', 'Tarde', '13:00', '19:00');
