<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Visualização de acessos dos usuários.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/usuarios', 'Lista de usuários', array('class' => 'ui-button botao')) ?></li>
                <!--li><?//= anchor('admin/acessos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li-->
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
                            <th class="ui-widget-header">Código</th>
                            <th class="ui-widget-header">Data</th>
                            <th class="ui-widget-header">IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_acesso; ?></td>
                                <td valign="middle"><?= mdate('%d/%m/%Y %H:%i', strtotime($row->ace_data)); ?></td>
                                <td valign="middle"><?= $row->ace_ip; ?></td>
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
            <form name="form_insert" action="<?= site_url('admin/acessos/save/'); ?>" method="POST" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Código</td>
                             <td><input type="text" name="cod_acesso" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Usuário</td>
                             <td><input type="text" name="cod_usuario" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Data</td>
                             <td><input type="text" name="ace_data" size="45"/></td>
                         </tr>
                         <tr>
                             <td>IP</td>
                             <td><input type="text" name="ace_ip" size="45"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/acessos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/acessos/save/' . $row->cod_acesso); ?>" method="POST" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Código</td>
                             <td><input type="text" name="cod_acesso" value="<?= $row->cod_acesso; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Usuário</td>
                             <td><input type="text" name="cod_usuario" value="<?= $row->cod_usuario; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Data</td>
                             <td><input type="text" name="ace_data" value="<?= $row->ace_data; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td>IP</td>
                             <td><input type="text" name="ace_ip" value="<?= $row->ace_ip; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/acessos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
            <?php
        endswitch;
        ?>
    </div>
</div>
