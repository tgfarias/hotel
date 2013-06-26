<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de banners.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/banners/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Título</th>
                            <th class="ui-widget-header">Posição</th>
                            <th class="ui-widget-header">Ordem</th>
                            <th class="ui-widget-header">Tipo</th>
                            <th class="ui-widget-header">Cliques</th>
                            <th class="ui-widget-header">Visualizações</th>
                            <th class="ui-widget-header">Desde</th>
                            <th class="ui-widget-header">Expiração</th>
                            <th class="ui-widget-header">Ativo</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_banner; ?></td>
                                <td valign="middle"><?= $row->ban_titulo; ?></td>
                                <td valign="middle"><?= $row->ban_posicao; ?></td>
                                <td valign="middle"><?= $row->ban_ordem; ?></td>
                                <td valign="middle"><?= $row->ban_tipo; ?></td>
                                <td valign="middle"><?= $row->ban_click; ?></td>
                                <td valign="middle"><?= $row->ban_views; ?></td>
                                <td valign="middle"><?= mdate('%d/%m/%Y',strtotime($row->ban_data_cad)); ?></td>
                                <td valign="middle"><?= mdate('%d/%m/%Y',strtotime($row->ban_data_expira)); ?></td>
                                <td valign="middle"><?= sim_nao($row->ban_ativo); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/banners/update/' . $row->cod_banner, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/banners/delete/' . $row->cod_banner, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
        <form name="form_insert" action="<?= site_url('admin/banners/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td><input type="text" name="ban_titulo" size="100"/></td>
                         </tr>
                         <tr>
                             <td>Posição</td>
                             <td><input type="text" name="ban_posicao" size="25"/></td>
                         </tr>
                         <tr>
                             <td>Ordem</td>
                             <td><input type="text" name="ban_ordem" size="5"/></td>
                         </tr>
                         <tr>
                             <td>Link</td>
                             <td><input type="text" name="ban_link" value="http://" size="100"/></td>
                         </tr>
                         <tr>
                             <td>Tipo</td>
                             <td>
                                 <select name="ban_tipo">
                                     <option value="Imagem">Imagem</option>
                                     <option value="Flash">Flash</option>
                                     <option value="Html">Html</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <p><b>Código HTML</b></p>
                                 <textarea name="ban_html" cols="60" rows="9"></textarea>
                             </td>
                         </tr>
                         <tr>
                             <td>Imagem</td>
                             <td><input type="file" name="userfile" size="5"/></td>
                         </tr>
                         <tr>
                             <td>Largura</td>
                             <td>
                                 <input type="text" name="ban_width" size="7"/>
                                 Altura <input type="text" name="ban_height" size="7"/>
                             </td>
                         </tr>
                         <tr>
                             <td>Expiração</td>
                             <td><input class="data" type="text" name="ban_data_expira" size="15"/> dd/mm/aaaa</td>
                         </tr>
                         <tr>
                             <td>Ativo</td>
                             <td><label><input type="checkbox" name="ban_ativo" value="1" /> Banner ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/banners', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/banners/save/' . $row->cod_banner); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td><input type="text" name="cod_banner" value="<?= $row->cod_banner; ?>" size="5" disabled/></td>
                         </tr>
                         <tr>
                             <td>Título</td>
                             <td><input type="text" name="ban_titulo" value="<?= $row->ban_titulo; ?>" size="100"/></td>
                         </tr>
                         <tr>
                             <td>Posição</td>
                             <td><input type="text" name="ban_posicao" value="<?= $row->ban_posicao; ?>" size="25"/></td>
                         </tr>
                         <tr>
                             <td>Ordem</td>
                             <td><input type="text" name="ban_ordem" value="<?= $row->ban_ordem; ?>" size="5"/></td>
                         </tr>
                         <tr>
                             <td>Link</td>
                             <td><input type="text" name="ban_link" value="<?= $row->ban_link; ?>" size="100"/></td>
                         </tr>
                         <tr>
                             <td>Tipo</td>
                             <td>
                                 <select name="ban_tipo">
                                     <option value="Imagem" <?php if($row->ban_tipo == 'Imagem')echo 'selected'; ?>>Imagem</option>
                                     <option value="Flash" <?php if($row->ban_tipo == 'Flash')echo 'selected'; ?>>Flash</option>
                                     <option value="Html" <?php if($row->ban_tipo == 'Html')echo 'selected'; ?>>Html</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Html</td>
                             <td><textarea name="ban_html" cols="60" rows="9"><?= $row->ban_html; ?></textarea></td>
                         </tr>
                         <tr>
                             <td>Arquivo</td>
                             <td><input type="file" name="userfile" size="5"/> <label><input type="checkbox" name="alterar_arquivo" value="1" /> Alterar o arquivo</label></td>
                         </tr>
                         <tr>
                             <td>Largura</td>
                             <td>
                                 <input type="text" name="ban_width" value="<?= $row->ban_width; ?>" size="5"/>
                                 Altura <input type="text" name="ban_height" value="<?= $row->ban_height; ?>" size="5"/>
                             </td>
                         </tr>
                         <tr>
                             <td>Visualizações</td>
                             <td>
                                 <input type="text" name="ban_views" value="<?= $row->ban_views; ?>" size="5" readonly/>
                                 Cliques <input type="text" name="ban_click" value="<?= $row->ban_click; ?>" size="5" readonly/>
                             </td>
                         </tr>
                         <tr>
                             <td>Expiração</td>
                             <td><input class="data" type="text" name="ban_data_expira" value="<?= mdate('%d/%m/%Y',strtotime($row->ban_data_expira)); ?>" size="15"/></td>
                         </tr>
                         <tr>
                             <td>Ativo</td>
                             <td>
                                 <label><input type="checkbox" name="ban_ativo" value="1" <?= marcado($row->ban_ativo); ?>/> Banner ativo</label>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/banners', 'Cancelar'); ?>
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
