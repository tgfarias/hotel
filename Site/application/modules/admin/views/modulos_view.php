<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de módulos.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/modulos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">T&iacute;tulo</th>
                            <th class="ui-widget-header">Label</th>
                            <th class="ui-widget-header">Vis&iacute;vel</th>
                            <th class="ui-widget-header">M&oacute;dulo ativo</th>
                            <th class="ui-widget-header">Desde</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_modulo; ?></td>
                                <td valign="middle"><?= $row->mod_titulo; ?></td>
                                <td valign="middle"><?= $row->mod_label; ?></td>
                                <td valign="middle"><?= sim_nao($row->mod_visivel); ?></td>
                                <td valign="middle"><?= sim_nao($row->mod_ativo); ?></td>
                                <td valign="middle"><?= mdate('%d/%m/%Y',strtotime($row->mod_data_cad)); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/modulos/update/' . $row->cod_modulo, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/modulos/delete/' . $row->cod_modulo, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/modulos/save/'); ?>" method="POST" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>T&iacute;tulo</td>
                             <td><input type="text" name="mod_titulo" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Descri&ccedil;&atilde;o</td>
                             <td><input type="text" name="mod_descricao" size="100"></textarea></td>
                         </tr>
                         <tr>
                             <td>Link</td>
                             <td><input type="text" name="mod_link" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Label</td>
                             <td><input type="text" name="mod_label" size="45"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="mod_visivel" value="1" /> M&oacute;dulo vis&iacute;vel no menu</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="mod_ativo" value="1" /> M&oacute;dulo ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/modulos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/modulos/save/' . $row->cod_modulo); ?>" method="POST" class="ui-widget-content">
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
                             <td><input type="text" name="cod_modulo" value="<?= $row->cod_modulo; ?>" size="5" disabled/></td>
                         </tr>
                         <tr>
                             <td>Título</td>
                             <td><input type="text" name="mod_titulo" value="<?= $row->mod_titulo; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Descrição</td>
                             <td><input type="text" name="mod_descricao" size="100"value="<?= $row->mod_descricao; ?>"/></td>
                         </tr>
                         <tr>
                             <td>Link</td>
                             <td><input type="text" name="mod_link" value="<?= $row->mod_link; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td>Label</td>
                             <td><input type="text" name="mod_label" value="<?= $row->mod_label; ?>" size="45"/></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="mod_visivel" value="1" <?= marcado($row->mod_visivel); ?>/> M&oacute;dulo vis&iacute;vel no menu</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="mod_ativo" value="1" <?= marcado($row->mod_ativo); ?>/> M&oacute;dulo ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/modulos', 'Cancelar'); ?>
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
