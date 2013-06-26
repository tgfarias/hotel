<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de categorias.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/categorias/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Seção</th>
                            <th class="ui-widget-header">Categoria</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_categoria; ?></td>
                                <td valign="middle"><?= relacionamento('tb_secoes', 'cod_secao', 'sec_titulo', $row->cod_secao, 'text'); ?></td>
                                <td valign="middle"><?= $row->cat_titulo; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/categorias/update/' . $row->cod_categoria, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/categorias/delete/' . $row->cod_categoria, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/categorias/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Seção</td>
                             <td>
                                 <select name="cod_secao" class="form_input">
                                 <?php foreach(relacionamento('tb_secoes', 'cod_secao', 'sec_titulo', '', 'form') as $rel): ?>
                                     <option value="<?=$rel->cod_secao;?>"><?=$rel->sec_titulo;?></option>
                                 <?php endforeach; ?>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Categoria</td>
                             <td><input type="text" name="cat_titulo" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/categorias', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/categorias/save/' . $row->cod_categoria); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td><input type="hidden" name="cod_categoria" value="<?= $row->cod_categoria; ?>" /></td>
                         </tr>
                         <tr>
                             <td>Seção</td>
                             <td>
                                 <select name="cod_secao" class="form_input">
                                 <?php foreach(relacionamento('tb_secoes', 'cod_secao', 'sec_titulo', '', 'form') as $rel): ?>
                                     <option value="<?=$rel->cod_secao;?>" <?php if($row->cod_secao == $rel->cod_secao)echo 'selected'; ?>><?=$rel->sec_titulo;?></option>
                                 <?php endforeach; ?>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Categoria</td>
                             <td><input type="text" name="cat_titulo" value="<?= $row->cat_titulo; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/categorias', 'Cancelar'); ?>
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
