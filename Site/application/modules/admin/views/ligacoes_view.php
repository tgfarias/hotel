<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de ligacoes.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/ligacoes/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Hospedagem</th>
                            <th class="ui-widget-header">Número ligado</th>
                            <th class="ui-widget-header">Início</th>
                            <th class="ui-widget-header">Fim</th>
                            <th class="ui-widget-header">Valor</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_ligacao; ?></td>
                                <td valign="middle"><?= relacionamento('hospedagens', 'cod_hospedagem', 'cod_hospedagem', $row->cod_hospedagem, 'text'); ?></td>
                                <td valign="middle"><?= $row->numero; ?></td>
                                <td valign="middle"><?= $row->inicio; ?></td>
                                <td valign="middle"><?= $row->fim; ?></td>
                                <td valign="middle"><?= $row->valor; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/ligacoes/update/' . $row->cod_ligacao, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/ligacoes/delete/' . $row->cod_ligacao, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/ligacoes/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Hospedagem</td>
                             <td>
                                <select name="cod_hospedagem" class="form_input">
                                <?php foreach(relacionamento('hospedagens', 'cod_hospedagem', 'cod_hospedagem', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_hospedagem;?>"><?=$rel->cod_hospedagem;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número ligado</td>
                             <td><input type="text" name="numero" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Início</td>
                             <td><input type="text" name="inicio" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Fim</td>
                             <td><input type="text" name="fim" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor</td>
                             <td><input type="text" name="valor" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/ligacoes', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/ligacoes/save/' . $row->cod_ligacao); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Hospedagem</td>
                             <td>
                                <select name="cod_hospedagem" class="form_input">
                                <?php foreach(relacionamento('hospedagens', 'cod_hospedagem', 'cod_hospedagem', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_hospedagem;?>" <?php if($row->cod_hospedagem == $rel->cod_hospedagem)echo 'selected'; ?>><?=$rel->cod_hospedagem;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número ligado</td>
                             <td><input type="text" name="numero" value="<?= $row->numero; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Início</td>
                             <td><input type="text" name="inicio" value="<?= $row->inicio; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Fim</td>
                             <td><input type="text" name="fim" value="<?= $row->fim; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor</td>
                             <td><input type="text" name="valor" value="<?= $row->valor; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/ligacoes', 'Cancelar'); ?>
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
