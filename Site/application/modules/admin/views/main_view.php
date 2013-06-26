<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>:: Sistema Hoteleiro On-Line ::</title>
        <link type="text/css" href="<?= base_url('application/modules/admin/views'); ?>/css/overcast/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <link type="text/css" href="<?= base_url('application/modules/admin/views'); ?>/css/main.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('application/modules/admin/views'); ?>/style.css" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" href="<?= base_url('application/modules/admin/views'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="<?= base_url('application/modules/admin/views'); ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/jquery.js"></script>
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/script.js"></script>
        <style type="text/css">
            .post .layout-item-0 { color: #262626; }
            .post .layout-item-1 { color: #262626; padding-right: 3px;padding-left: 3px; }
            .ie7 .post .layout-cell {border:none !important; padding:0 !important; }
            .ie6 .post .layout-cell {border:none !important; padding:0 !important; }
        </style>
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/main.js"></script>
        <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div id="main">
            <div class="cleared reset-box"></div>
            
            <div class="bar nav">
                <div class="nav-outer">
                    <div class="nav-wrapper">
                        <div class="nav-inner">
                            <ul class="hmenu">
                                <li>
                                    <?= anchor('admin/index', 'Dashboard'); ?>
                                </li>
                                <li>
                                    <a>Hospedagens</a>
                                    <ul>
                                        <li><?= anchor('admin/checkin', 'Checkin'); ?></li>
                                        <li><?= anchor('admin/checkout', 'Checkout'); ?></li>
                                        <li><?= anchor('admin/hospedagens', 'Gerenciar hospedagens'); ?></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Cadastros</a>
                                    <ul>
                                        <li><?= anchor('admin/hospedes', 'Cadastro de hospedes'); ?></li>
                                        <li><?= anchor('admin/fornecedores', 'Cadastro de fornecedores'); ?></li>
                                        <li>
                                            <a>Apartamentos</a>
                                            <ul>
                                                <li><?= anchor('admin/apartamentos', 'Cadastro de apartamentos'); ?></li>
                                                <li><?= anchor('admin/categoria_apartamento', 'Categoria de apartamento'); ?></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a>Funcionários</a>
                                            <ul>
                                                <li><?= anchor('admin/funcionarios', 'Cadastro de funcionários'); ?></li>
                                                <li><?= anchor('admin/turnos', 'Turnos de trabalho'); ?></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a>Produtos</a>
                                            <ul>
                                                <li><?= anchor('admin/produtos', 'Cadastro de produtos'); ?></li>
                                                <li><?= anchor('admin/estoque', 'Estoque'); ?></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Sistema</a>
                                    <ul>
                                        <?php if(is_admin()): ?>
                                        <li><?= anchor('admin/usuarios', 'Gerenciar usuários'); ?></li>
                                        <li><?= anchor('admin/modulos', 'Gerenciar módulos'); ?></li>
                                        <li><?= anchor('admin/configuracoes', 'Configurações'); ?></l>
                                        <?php else: ?>
                                        <li><?= anchor('admin/dadosusuario', 'Atualizar meus dados'); ?></l>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <li>
                                    <?= anchor('admin/index/dologout', 'Sair'); ?>
                                </li>	
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="cleared reset-box"></div>
            <div class="box sheet">
                <div class="box-body sheet-body">
                    <div class="layout-wrapper">
                        <div class="content-layout">
                            <div class="content-layout-row">
                                <div class="layout-cell content">
                                    <div class="box post">
                                        <div class="box-body post-body">
                                            <?php
                                            $msg = $this->session->flashdata('feedback');
                                            if (@$msg):
                                                if ($msg <> 'pag'):
                                                    ?>
                                                    <div id="mensagem_sistema">
                                                        <div class="ui-state-error ui-corner-all msg">
                                                            <p>
                                                                <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                                                                <?= humanize($msg); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endif;
                                            endif;
                                            ?>
                                            <?= $contents; ?>
                                            <div class="cleared"></div>
                                        </div>
                                    </div>

                                    <div class="cleared"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cleared"></div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-body">
                    <div class="footer-center">
                        <div class="footer-wrapper">
                            <div class="footer-text">
                                <p style="margin-bottom: 10px;"><?= anchor('admin/index', 'Dashboard'); ?> | <a href="http://www.elieldepaula.com.br/suporte" target="_blank">Suporte</a> | <?= anchor('admin/index/dologout', 'Sair'); ?></p>

                                <p>&reg; <?=date("Y"); ?> Eliel de Paula, todos os direitos reservados.</p>
                                <div class="cleared"></div>
                                <p class="page-footer"></p>
                            </div>
                        </div>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </body>
</html>