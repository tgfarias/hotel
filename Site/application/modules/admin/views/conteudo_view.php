<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de conteúdo.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/conteudo/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                                <th class="ui-widget-header">Categoria</th>
                                <th class="ui-widget-header">Tipo</th>
                                <th class="ui-widget-header">Data</th>
                                <th class="ui-widget-header">&Eacute; destaque</th>
                                <th class="ui-widget-header">Publicado</th>
                                <th class="ui-widget-header" width="60"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $row): ?>
                                <tr>
                                    <td valign="middle"><?= $row->cod_conteudo; ?></td>
                                    <td valign="middle"><?= $row->cnt_titulo; ?></td>
                                    <td valign="middle"><?= relacionamento('tb_categorias', 'cod_categoria', 'cat_titulo', $row->cod_categoria, 'text'); ?></td>
                                    <td valign="middle"><?= $row->cnt_tipo; ?></td>
                                    <td valign="middle"><?= mdate('%d/%m/%Y',strtotime($row->cnt_data_cad)); ?></td>
                                    <td valign="middle"><?= sim_nao($row->cnt_destaque); ?></td>
                                    <td valign="middle"><?= sim_nao($row->cnt_publicado); ?></td>
                                    <td valign="middle">
                                        <ul>
                                            <li class="ui-state-default ui-corner-all" title="Alterar">
                                                <?= anchor('admin/conteudo/update/' . $row->cod_conteudo, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                            </li>
                                            <li class="ui-state-default ui-corner-all" title="Excluir">
                                                <?= anchor('admin/conteudo/delete/' . $row->cod_conteudo, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
                <form name="form_insert" action="<?= site_url('admin/conteudo/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                    <table border="0" width="100%" align="center" id="table_form">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>T&iacute;tulo</td>
                                <td><input type="text" name="cnt_titulo" size="120"/></td>
                            </tr>
                            <tr>
                             <td>Seção</td>
                             <td>
                                 <select name="cod_secao" id="cod_secao" class="form_input" onclick="filtra_categoria();">
                                 <?php foreach(relacionamento('tb_secoes', 'cod_secao', 'sec_titulo', '', 'form') as $rel): ?>
                                     <option value="<?=$rel->cod_secao;?>"><?=$rel->sec_titulo;?></option>
                                 <?php endforeach; ?>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Categoria</td>
                             <td id="categorias"><b>Selecione uma seção.</b></td>
                         </tr>
                            <tr>
                                <td>Tipo</td>
                                <td><label><input type="radio" name="cnt_tipo" value="Artigo" checked="checked"/> Artigo</label> <label><input type="radio" name="cnt_tipo" value="Pagina" /> P&aacute;gina</label></td>
                            </tr>
                            <tr>
                                <td>Imagem de capa</td>
                                <td><input type="file" name="userfile" size="45"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p><b>Resumo</b></p>
                                    <textarea name="cnt_resumo" cols="100" rows="9"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><b>Conte&uacute;do</b></p>
                                    <textarea class="ckeditor" name="cnt_conteudo" cols="45" rows="9"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Data</td>
                                <td><input class="data" type="text" name="cnt_data_cad" value="<?=date("d/m/Y");?>" size="15"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_comentarios" value="1" /> Aceita coment&aacute;rios</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_destaque" value="1" /> Destaque</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_publicado" value="1" /> Publicado</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                    <?= anchor('admin/conteudo', 'Cancelar'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
                break;
            case 'update':
                ?>
                <form name="form_update" action="<?= site_url('admin/conteudo/save/' . $row->cod_conteudo); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                                <td><input type="text" name="cod_conteudo" value="<?= $row->cod_conteudo; ?>" size="10" disabled/></td>
                            </tr>
                            <tr>
                                <td>T&iacute;tulo</td>
                                <td><input type="text" name="cnt_titulo" value="<?= $row->cnt_titulo; ?>" size="120"/></td>
                            </tr>
                            <!-- <tr>
                                <td>Link</td>
                                <td><input type="text" name="cnt_link" value="<?= $row->cnt_link; ?>" size="120"/></td>
                            </tr> -->
                            <tr>
                                <td>Se&ccedil;&atilde;o</td>
                                <td>
                                    <select name="cod_secao" id="cod_secao" onclick="filtra_categoria();">
                                        <?php foreach($secoes->result() as $sec): ?>
                                        <option value="<?=$sec->cod_secao;?>"><?=$sec->sec_titulo;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td id="categorias">
                                    <select name="cod_categoria">
                                        <?php foreach($categorias->result() as $cat): ?>
                                        <option value="<?=$cat->cod_categoria;?>"<?php if($row->cod_categoria == $cat->cod_categoria)echo 'selected'; ?>><?=$cat->cat_titulo;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tipo</td>
                                <td><label><input type="radio" name="cnt_tipo" value="Artigo" <?if($row->cnt_tipo == 'Artigo')echo 'checked="checked"';?>/> Artigo</label> <label><input type="radio" name="cnt_tipo" value="Pagina" <?if($row->cnt_tipo == 'Pagina')echo 'checked="checked"';?>/> P&aacute;gina</label></td>
                            </tr>
                            <tr>
                                <td>Imagem de capa</td>
                                <td>
                                    <input type="file" name="userfile" value="<?= $row->cnt_capa; ?>" size="45"/>
                                    <label><input type="checkbox" name="alterar_capa" value="1" /> Alterar a imagem de capa</label>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p><b>Resumo</b></p>
                                    <textarea name="cnt_resumo" cols="100" rows="9"><?= $row->cnt_resumo; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><b>Conte&uacute;do</b></p>
                                    <textarea class="ckeditor" name="cnt_conteudo" cols="45" rows="9"><?= $row->cnt_conteudo; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Data</td>
                                <td><input class="data" type="text" name="cnt_data_cad" value="<?= mdate('%d/%m/%Y',strtotime($row->cnt_data_cad)); ?>" size="15"/></td>
                            </tr>
                            <tr>
                                <td>Visualiza&ccedil;&otilde;es</td>
                                <td><input type="text" name="cnt_views" value="<?= $row->cnt_views; ?>" size="10" readonly/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_comentarios" value="1" <?= marcado($row->cnt_comentarios); ?>/> Aceita coment&aacute;rios</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_destaque" value="1" <?= marcado($row->cnt_destaque); ?>/> Destaque</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label><input type="checkbox" name="cnt_publicado" value="1" <?= marcado($row->cnt_publicado); ?>/> Publicado</label></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                    <?= anchor('admin/conteudo', 'Cancelar'); ?>
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
<script>
    function filtra_categoria(){
        var parametros = {id:$('#cod_secao').val()}
        $("#categorias").load("<?= site_url('admin/categorias/combo'); ?>",parametros);   
    }
</script>