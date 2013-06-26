SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

insert into `apartamentos` values('1','1','101','101','Livre'),
 ('2','1','102','102','Livre'),
 ('3','1','103','103','Livre'),
 ('4','1','104','104','Livre'),
 ('5','1','105','105','Livre');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

insert into `categoria_apartamento` values('1','Single','Apartamento single (solteiro) com ar-condicionado, frigobar e TV a cabo.','5f1cfb2ece6157ec5bbb2f82d9f48ad4.jpg','80','100','1','2013-04-19');

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

insert into `estoque` values('1','1','0.5','1.5','0','50','50');

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

insert into `fornecedores` values('1','Fornecedor de testes','Fornecedor Geral','123456789','1212121','5454545','Sem endereço definido','101','Sem complemento','Centro','Palmas','TO','77000000','63-1234-5678','fornecedor@site.com','www.sitedofornecedor.com.br','1');

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

insert into `funcionarios` values('1','1','1','João da Silva','Recepcionista','0000-00-00','63-1234-5678','joao@dasilva.com.br','1');

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

insert into `hospedes` values('1','Maurício de Souza Aguiar','123456','SSP/SP','12345678912','Rua das rosas','2345','Casa dos fundos','Vila Jardim','São paulo','SP','01455369','11-1234-5678','11-8765-4321','mauricio@souza.com','Brasileiro','São paulo','1981-12-09','Solteiro','1');

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

insert into `produtos` values('1','1','Água com gás','1.5','1');

DROP TABLE IF EXISTS `tb_acessos`;

CREATE TABLE `tb_acessos` (
  `cod_acesso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `cod_usuario` int(11) NOT NULL COMMENT 'Usuário',
  `ace_data` datetime DEFAULT NULL COMMENT 'Data',
  `ace_ip` varchar(45) COLLATE latin1_bin DEFAULT NULL COMMENT 'IP',
  PRIMARY KEY (`cod_acesso`,`cod_usuario`),
  KEY `fk_tb_acessos_tb_usuarios` (`cod_usuario`),
  CONSTRAINT `fk_tb_acessos_tb_usuarios` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Faz o registro dos accesos dos usuários no sistema.';

insert into `tb_acessos` values('1','1','2013-01-23 04:35:59','::1'),
 ('2','1','2013-02-01 13:00:35','::1'),
 ('3','1','2013-02-01 13:03:32','::1'),
 ('4','1','2013-02-04 17:46:13','::1'),
 ('5','1','2013-02-06 01:11:58','::1'),
 ('6','1','2013-02-06 03:34:24','::1'),
 ('7','1','2013-02-06 13:22:32','::1'),
 ('8','1','2013-03-01 02:47:09','::1'),
 ('9','1','2013-03-04 17:51:17','::1'),
 ('10','1','2013-03-10 16:36:10','::1'),
 ('11','1','2013-03-23 16:21:36','::1'),
 ('12','1','2013-03-25 22:37:31','::1'),
 ('13','1','2013-03-28 19:38:26','::1'),
 ('14','1','2013-04-19 02:10:46','::1'),
 ('15','1','2013-04-26 02:38:08','::1');

DROP TABLE IF EXISTS `tb_configuracoes`;

CREATE TABLE `tb_configuracoes` (
  `cod_config` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código',
  `conf_key` varchar(45) NOT NULL COMMENT 'Chave',
  `conf_value` varchar(255) NOT NULL COMMENT 'Valor',
  `conf_descricao` varchar(255) NOT NULL COMMENT 'Descrição',
  PRIMARY KEY (`cod_config`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

insert into `tb_configuracoes` values('1','titulo_site','Igreja de Cristo - Sede','Título do site'),
 ('2','slogan_site','Site de exemplo','Slogan do site'),
 ('3','head_descricao','Um site de modelo para teste e apresentação do LifeCMS','Cabeçalho de descrição do site.'),
 ('10','destino_contato','elieldepaula@gmail.com','Destinatário do formulário de contato'),
 ('12','rodape_site','® 2013 Site de base, todos os direitos reservados.','Mensagem do rodapé do site.'),
 ('13','link_facebook','http://www.facebook.com','Link do Facebook'),
 ('14','link_twitter','http://www.twitter.com','Link para o Twitter');

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

insert into `tb_modulos` values('1','1','Gerenciador de modulos',null,'admin/modulos','Módulos','1','1',null),
 ('2','1','Hospedes',0x476572656e636961206f20636164617374726f20646520686f7370656465732e,'admin/hospedes','Hóspedes','1','1','2012-07-27 13:19:11'),
 ('3','1','Fornecedores',0x476572656e636961206f20636164617374726f20646520666f726e656365646f726573,'admin/fornecedores','Fornecedores','1','1','2012-07-27 13:21:45'),
 ('4','1','Gerenciador de conteúdo',0x476572656e63696120746f646f206f20636f6e7465c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e2809ac382c2a0c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2bec383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc5a1c383e2809ac382c2a0c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2bec383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a6c383c692c3a2e282acc5a1c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc2a6c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2ba646f20646f2073697465,'admin/conteudo','Conteúdo','1','1','2012-07-27 13:34:54'),
 ('5','1','Gerenciador de enquete',0x476572656e6369612061732070657371756973617320646520656e717565746520646f2073697465,'admin/enquete','Enquetes','1','1','2012-07-27 13:39:24'),
 ('6','1','Respostas de enquete',0x476572656e63696120617320726573706f737461732064617320656e717565746573,'admin/enq_respostas','Respostas',null,'1','2012-07-27 13:42:25'),
 ('8','1','Galerias de mídia',0x476572656e63696173206173206dc383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e2809ac382c2a0c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2bec383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc5a1c383e2809ac382c2a0c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2bec383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a6c383c692c3a2e282acc5a1c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc2a6c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2ad6469617320646f20736974652e,'admin/midias','Mídia','1','1','2012-07-27 13:43:37'),
 ('9','1','Itens de mídia',0x476572656e636961206f7320c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e2809ac382c2a0c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2bec383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc5a1c383e2809ac382c2a0c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2bec383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a6c383c692c3a2e282acc5a1c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc2a6c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2ad74656e73206465206dc383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e2809ac382c2a0c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2bec383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc5a1c383e2809ac382c2a0c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2bec383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a6c383c692c3a2e282acc5a1c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc2a6c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2ad646961,'admin/itens_midia','Itens',null,'1','2012-07-27 13:44:17'),
 ('10','1','Gerenciador de links',0x476572656e636961206f73206c696e6b7320c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e2809ac382c2a0c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2bec383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc5a1c383e2809ac382c2a0c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2bec383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc5a1c383e2809ac382c2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c3a2e282acc5a1c383e2809ac382c2acc383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a6c383c692c3a2e282acc5a1c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383e2809ac382c2a2c383c692c382c2a2c383c2a2c3a2e2809ac2acc385c2a1c383e2809ac382c2acc383c692c3a2e282acc2a6c383e2809ac382c2a1c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2ba7465697320646f2073697465,'admin/links','Links','1','1','2012-07-27 13:45:05'),
 ('11','1','Gerenciador de banners',0x476572656e636961206f732062616e6e65727320646f20736974652e,'admin/banners','Banners','1','1','2012-07-27 13:45:55'),
 ('12','1','Gerenciador de newsletter',0x476572656e636961206f7320636164617374726f73206e61206e6577736c65747465722e,'admin/newsletters','Newsletter','1','1','2012-07-27 13:46:45'),
 ('13','1','Gerenciador de usuários',0x476572656e636961206f7320757375c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c3a2e282acc2a0c383c2a2c3a2e2809ac2acc3a2e2809ec2a2c383c692c386e28099c383c2a2c3a2e2809ac2acc382c2a0c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383c2a2c3a2e282acc5bec382c2a2c383c692c386e28099c383e280a0c3a2e282ace284a2c383c692c382c2a2c383c2a2c3a2e282acc5a1c382c2acc383e280a6c382c2a1c383c692c386e28099c383c2a2c3a2e2809ac2acc385c2a1c383c692c3a2e282acc5a1c383e2809ac382c2a172696f7320646f2073697374656d612c20696465616c2070617261206f2061646d696e6973747261646f72207072696e636970616c2e,'admin/usuarios','Usuários',null,'1','2012-08-13 10:10:30');

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

insert into `tb_usuarios` values('1','Administrador','admin@admin','89794b621a313bb59eed0d9f0f4e8205','','1','1','2012-07-15 12:00:00');

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `cod_turno` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `hora_entrada` varchar(45) DEFAULT NULL,
  `hora_saida` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

insert into `turnos` values('1','Manhã','7:00','13:00'),
 ('2','Tarde','13:00','19:00');

SET FOREIGN_KEY_CHECKS = 1;
