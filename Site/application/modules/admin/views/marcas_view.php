<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de marcas.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/marcas/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Imagem</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle" width="60"><?= $row->cod_marca; ?></td>
                                <td valign="middle"><?= $row->titulo; ?></td>
                                <td valign="middle" width="200"><img src="<?= base_url('midia/marcas').'/'.$row->imagem; ?>" width="75" /></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/marcas/update/' . $row->cod_marca, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/marcas/delete/' . $row->cod_marca, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/marcas/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Imagem</td>
                             <td><input type="file" name="userfile" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/marcas', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/marcas/save/' . $row->cod_marca); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Imagem</td>
                             <td>
                             	<input type="file" name="userfile" size="35" class="form_input" />
                             	<label><input type="checkbox" name="alterar_imagem" /> Alterar a imagem</label>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/marcas', 'Cancelar'); ?>
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
