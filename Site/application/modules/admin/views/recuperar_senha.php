<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v3.1.0.46558
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>:: Life CMS - Gestão de conteúdo ::</title>
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
                                            
                                            <form name="form_login" action="<?=site_url('admin/index/dorecover');?>" method="POST">
                                                <table border="0" width="500" align="center">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="60"></td>
                                                            <td><h1 style="font-size: 22px;font-weight: bold;margin-top: 12px;margin-bottom: 15px;">Recuperação de senha</h1></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60"></td>
                                                            <td style="padding-top: 15px;padding-bottom: 15px;color: #333333;">
                                                                <p>
                                                                    Informe abaixo o seu email usado no cadastro de administrador, em seguida enviaremos uma confirmação de alteração de senha para este e-mail contendo as instruções necessárias para redefinir sua senha.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60" style="padding:5px;">Email</td>
                                                            <td style="padding:5px;"><input type="text" name="email" value="" size="45" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td style="padding:5px;">
                                                                <input type="submit" value="Enviar" name="bt_acao" class="botao" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                            
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
                                <p><?= anchor('admin/index', 'Dashboard'); ?> | <a href="#">Suporte</a> | <?= anchor('admin/index/dologout', 'Sair'); ?></p>

                                <p>&reg; <?=date("Y"); ?> Life Sites, todos os direitos reservados.</p>
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