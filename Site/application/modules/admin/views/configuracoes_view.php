<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de configurações.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/configuracoes/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Descrição</th>
                            <th class="ui-widget-header">Chave</th>
                            <th class="ui-widget-header">Valor</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_config; ?></td>
                                <td valign="middle"><?= $row->conf_descricao; ?></td>
                                <td valign="middle"><?= $row->conf_key; ?></td>
                                <td valign="middle"><?= $row->conf_value; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/configuracoes/update/' . $row->cod_config, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/configuracoes/delete/' . $row->cod_config, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/configuracoes/save/'); ?>" method="POST" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Chave</td>
                             <td><input type="text" name="conf_key" size="25"/></td>
                         </tr>
                         <tr>
                             <td>Valor</td>
                             <td><textarea name="conf_value" cols="55" rows="6"></textarea></td>
                         </tr>
                         <tr>
                             <td>Descrição</td>
                             <td><input type="text" name="conf_descricao" size="90"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/configuracoes', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/configuracoes/save/' . $row->cod_config); ?>" method="POST" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Chave</td>
                             <td><input type="text" name="conf_key" value="<?= $row->conf_key; ?>" size="25"/></td>
                         </tr>
                         <tr>
                             <td>Valor</td>
                             <td><textarea name="conf_value" cols="55" rows="6"><?= $row->conf_value; ?></textarea></td>
                         </tr>
                         <tr>
                             <td>Descrição</td>
                             <td><input type="text" name="conf_descricao" value="<?= $row->conf_descricao; ?>" size="90"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/configuracoes', 'Cancelar'); ?>
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
