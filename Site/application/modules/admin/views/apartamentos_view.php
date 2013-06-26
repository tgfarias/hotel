<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de apartamentos.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/apartamentos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Categoria</th>
                            <th class="ui-widget-header">Número</th>
                            <th class="ui-widget-header">Status</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_apartamento; ?></td>
                                <td valign="middle"><?= relacionamento('categoria_apartamento', 'cod_cat_apartamento', 'titulo', $row->cod_cat_apartamento, 'text'); ?></td>
                                <td valign="middle"><?= $row->numero; ?></td>
                                <td valign="middle"><?= $row->status; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/apartamentos/update/' . $row->cod_apartamento, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/apartamentos/delete/' . $row->cod_apartamento, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/apartamentos/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th width="120"></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Categoria</td>
                             <td>
                                <select name="cod_cat_apartamento" class="form_input">
                                <?php foreach(relacionamento('categoria_apartamento', 'cod_cat_apartamento', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_cat_apartamento;?>"><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" size="15" class="form_input" /></td>
                         </tr>
                         
                         <tr>
                             <td>Ramal</td>
                             <td><input type="text" name="ramal" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td>
								<select name="status" class="form_input">
									<option value="Livre">Livre</option>
									<option value="Ocupado">Ocupado</option>
									<option value="Manutencao">Manutencao</option>
								</select>
							</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/apartamentos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/apartamentos/save/' . $row->cod_apartamento); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th width="120"></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Categoria</td>
                             <td>
                                <select name="cod_cat_apartamento" class="form_input">
                                <?php foreach(relacionamento('categoria_apartamento', 'cod_cat_apartamento', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_cat_apartamento;?>" <?php if($row->cod_cat_apartamento == $rel->cod_cat_apartamento)echo 'selected'; ?>><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" value="<?= $row->numero; ?>" size="15" class="form_input" /></td>
                         </tr>
                        
                         <tr>
                             <td>Ramal</td>
                             <td><input type="text" name="ramal" value="<?= $row->ramal; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td>
								<select name="status" class="form_input">
									<option value="Livre" <?php if($row->status == "Livre"){echo 'selected';} ?> >Livre</option>
									<option value="Ocupado" <?php if($row->status == "Ocupado"){echo 'selected';} ?> >Ocupado</option>
									<option value="Manutencao" <?php if($row->status == "Manutencao"){echo 'selected';} ?> >Manutencao</option>
								</select>
							</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/apartamentos', 'Cancelar'); ?>
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
