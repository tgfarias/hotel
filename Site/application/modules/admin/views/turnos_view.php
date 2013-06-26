<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de turnos.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/turnos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Hora de entrada</th>
                            <th class="ui-widget-header">Hora de saída</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_turno; ?></td>
                                <td valign="middle"><?= $row->titulo; ?></td>
                                <td valign="middle"><?= $row->hora_entrada; ?></td>
                                <td valign="middle"><?= $row->hora_saida; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/turnos/update/' . $row->cod_turno, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/turnos/delete/' . $row->cod_turno, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/turnos/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Hora de entrada</td>
                             <td><input type="text" name="hora_entrada" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Hora de saída</td>
                             <td><input type="text" name="hora_saida" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/turnos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/turnos/save/' . $row->cod_turno); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Hora de entrada</td>
                             <td><input type="text" name="hora_entrada" value="<?= $row->hora_entrada; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Hora de saída</td>
                             <td><input type="text" name="hora_saida" value="<?= $row->hora_saida; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/turnos', 'Cancelar'); ?>
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
