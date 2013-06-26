<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de usu&aacute;rios.</h2>
        </div>
        <div id="menu">
            <ul>
                <?php if(is_admin()): ?>
                <li><?= anchor('admin/usuarios/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
                <?php endif; ?>
                <li><?= anchor('admin/index', 'Fechar', array('class' => 'ui-button botao')) ?></li>
            </ul>
        </div>
    </div>
    <div id="modo">
        <?php
        switch (@$modo):
            default:
                ?>
                <div id="grid">
                    <table border="0" width="100%" align="center" id="grid">
                        <thead>
                            <tr>
                                <th class="ui-widget-header">C&oacute;digo</th>
                                <th class="ui-widget-header">Nome</th>
                                <th class="ui-widget-header">Email</th>
                                <th class="ui-widget-header">Master</th>
                                <th class="ui-widget-header">Ativo</th>
                                <th class="ui-widget-header">Desde</th>
                                <th class="ui-widget-header" width="60"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $row): ?>
                                <tr>
                                    <td valign="middle"><?= $row->cod_usuario; ?></td>
                                    <td valign="middle"><?= anchor('admin/acessos/index/'.$row->cod_usuario,$row->usu_nome); ?></td>
                                    <td valign="middle"><?= $row->usu_email; ?></td>
                                    <td valign="middle"><?= sim_nao($row->usu_admin); ?></td>
                                    <td valign="middle"><?= sim_nao($row->usu_ativo); ?></td>
                                    <td valign="middle"><?= mdate('%d/%m/%Y %h:%i', mysql_to_unix($row->usu_data_cad)); ?></td>
                                    <td valign="middle">
                                        <ul>
                                            <li class="ui-state-default ui-corner-all" title="Alterar">
                                                <?= anchor('admin/usuarios/update/' . $row->cod_usuario, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                            </li>
                                            <li class="ui-state-default ui-corner-all" title="Excluir">
                                                <?= anchor('admin/usuarios/delete/' . $row->cod_usuario, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div id="resumo">
                        <span class="total">Total de <b><?= $total_registros; ?></b> registros.</span>
                        <span class="box_paginacao">
                            <?= $paginacao; ?>
                        </span>
                    </div>
                </div>
                <?php
                break;
            case 'insert':
                ?>
                <form name="form_insert" action="<?= site_url('admin/usuarios/save/'); ?>" method="POST" class="ui-widget-content">
                    <input type="hidden" name="usu_data_cad" value="<?= date("Y-m-d H:i:s"); ?>"/>
                    <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nome</td>
                                <td><input type="text" name="usu_nome" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="usu_email" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Senha</td>
                                <td><input type="password" name="usu_senha" size="25"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="usu_admin" value="1" /> Administrador principal</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding:12px;">
                                    <p><b>Permissões</b></p>
                                    <!-- Laço na lista de módulos -->
                                    <?php foreach ($lista_modulos as $mod): ?>
                                        <p>
                                            <label>
                                                <input type="checkbox" id="usu_permissoes" name="usu_permissoes[]" value="<?= $mod->cod_modulo; ?>" /> <?= $mod->mod_titulo; ?>
                                            </label>
                                        </p>
                                        <?php
                                    endforeach;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="usu_ativo" value="1" /> Usu&aacute;rio ativo</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                    <?= anchor('admin/usuarios', 'Cancelar'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
                break;
            case 'update':
                ?>
                <form name="form_update" action="<?= site_url('admin/usuarios/save/' . $row->cod_usuario); ?>" method="POST" class="ui-widget-content">
                    <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>C&oacute;digo</td>
                                <td><input type="text" name="cod_usuario" value="<?= $row->cod_usuario; ?>" size="5" disabled/></td>
                            </tr>
                            <tr>
                                <td>Nome</td>
                                <td><input type="text" name="usu_nome" value="<?= $row->usu_nome; ?>" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="usu_email" value="<?= $row->usu_email; ?>" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Senha</td>
                                <td><input type="password" name="usu_senha" value="" size="25"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="alterar_senha" value="1" /> Alterar a senha.</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="usu_admin" value="1" <?= marcado($row->usu_admin); ?> /> Administrador principal</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding:12px;">
                                    <?php //echo print_r(unserialize($row->usu_permissoes)); ?>
                                    <p><b>Permiss&otilde;es</b></p>
                                    <!-- Laço na lista de módulos -->
                                    <?php
                                    $permissoes = explode(';', $row->usu_permissoes);
                                    foreach ($lista_modulos as $key => $mod):
                                        $marcado = '';
                                        foreach ($permissoes as $per):
                                            if ($mod->cod_modulo == $per):
                                                $marcado = ' checked="checked"';
                                            endif;
                                        endforeach;
                                        ?>
                                        <p>
                                            <label>
                                                <input type="checkbox" id="usu_permissoes" name="usu_permissoes[]" value="<?= $mod->cod_modulo; ?>" <?= $marcado; ?> /> <?= $mod->mod_titulo; ?>
                                            </label>
                                        </p>
                                        <?php
                                    endforeach;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ativo</td>
                                <td><label><input type="checkbox" name="usu_ativo" value="1" <?= marcado($row->usu_ativo); ?> /> Usu&aacute;rio ativo</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                    <?= anchor('admin/usuarios', 'Cancelar'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php
            break;
            case 'usuario' :
                ?>
                <form name="form_update" action="<?= site_url('admin/dadosusuario/save/' . $row->cod_usuario); ?>" method="POST" class="ui-widget-content">
                    <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>C&oacute;digo</td>
                                <td><input type="text" name="cod_usuario" value="<?= $row->cod_usuario; ?>" size="5" disabled/></td>
                            </tr>
                            <tr>
                                <td>Nome</td>
                                <td><input type="text" name="usu_nome" value="<?= $row->usu_nome; ?>" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="usu_email" value="<?= $row->usu_email; ?>" size="45"/></td>
                            </tr>
                            <tr>
                                <td>Senha</td>
                                <td><input type="password" name="usu_senha" value="" size="25"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="alterar_senha" value="1" /> Alterar a senha.</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
        <?php
                break;
        endswitch;
        ?>
    </div>
</div>
<script>
    function limpa_permissoes(){
        $("usu_permissoes").checked(false);
    }
</script>
