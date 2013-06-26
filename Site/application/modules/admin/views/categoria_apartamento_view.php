<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de categorias de apartamentos.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/categoria_apartamento/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Cod</th>
                            <th class="ui-widget-header">Título</th>
                            <th class="ui-widget-header">Valor normal</th>
                            <th class="ui-widget-header">Valor alta</th>
                            <th class="ui-widget-header">Ativo</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_cat_apartamento; ?></td>
                                <td valign="middle"><?= $row->titulo; ?></td>
                                <td valign="middle">R$ <?= formata_valor($row->valor_normal); ?></td>
                                <td valign="middle">R$ <?= formata_valor($row->valor_alta); ?></td>
                                <td valign="middle"><?= sim_nao($row->ativo); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/categoria_apartamento/update/' . $row->cod_cat_apartamento, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/categoria_apartamento/delete/' . $row->cod_cat_apartamento, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/categoria_apartamento/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Título</td>
                             <td><input type="text" name="titulo" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Descricao</td>
                             <td><textarea name="descricao" rows="9" cols="60" class="form_input"></textarea></td>
                         </tr>
                         <tr>
                             <td>Foto</td>
                             <td><input type="file" name="userfile" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor normal</td>
                             <td><input type="text" name="valor_normal" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor alta</td>
                             <td><input type="text" name="valor_alta" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Ativo</td>
                             <td><input type="checkbox" name="ativo" value="1" /></td>
                         </tr>
                         <tr>
                             <td>Data de cadastro</td>
                             <td><input type="text" name="data_cadastro" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/categoria_apartamento', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/categoria_apartamento/save/' . $row->cod_cat_apartamento); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Título</td>
                             <td><input type="text" name="titulo" value="<?= $row->titulo; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Descricao</td>
                             <td><textarea name="descricao" rows="9" cols="60" class="form_input"><?= $row->descricao; ?></textarea></td>
                         </tr>
                         <tr>
                             <td>Foto</td>
                             <td><input type="file" name="userfile" size="35" class="form_input" /></td>
                         </tr>
						<tr>
                             <td></td>
                             <td><img src="<?= base_url('midia/apartamentos').'/'.$row->imagem; ?>" width="120" /></td>
                         </tr>
                         <tr>
                             <td>Valor normal</td>
                             <td><input type="text" name="valor_normal" value="<?= formata_valor($row->valor_normal); ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor alta</td>
                             <td><input type="text" name="valor_alta" value="<?= formata_valor($row->valor_alta); ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Ativo</td>
                             <td><input type="checkbox" name="ativo" value="1" <?= marcado($row->ativo); ?> /></td>
                         </tr>
                         <tr>
                             <td>Data de cadastro</td>
                             <td><input type="text" name="data_cadastro" value="<?= mdate('%d/%m/%Y', strtotime($row->data_cadastro)); ?>" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/categoria_apartamento', 'Cancelar'); ?>
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
