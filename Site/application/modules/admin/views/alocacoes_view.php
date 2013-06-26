<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de alocacoes.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/alocacoes/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Hospede</th>
                            <th class="ui-widget-header">Apartamento</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_alocacao; ?></td>
                                <td valign="middle"><?= relacionamento('hospedagens', 'cod_hospedagem', 'cod_hospedagem', $row->cod_hospedagem, 'text'); ?></td>
                                <td valign="middle"><?= relacionamento('hospedes', 'cod_hospede', 'nome', $row->cod_hospede, 'text'); ?></td>
                                <td valign="middle"><?= relacionamento('apartamentos', 'cod_apartamento', 'numero', $row->cod_apartamento, 'text'); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/alocacoes/update/' . $row->cod_alocacao, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/alocacoes/delete/' . $row->cod_alocacao, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/alocacoes/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Hospede</td>
                             <td>
                                <select name="cod_hospede" class="form_input">
                                <?php foreach(relacionamento('hospedes', 'cod_hospede', 'nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_hospede;?>"><?=$rel->nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Apartamento</td>
                             <td>
                                <select name="cod_apartamento" class="form_input">
                                <?php foreach(relacionamento('apartamentos', 'cod_apartamento', 'numero', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_apartamento;?>"><?=$rel->numero;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/alocacoes', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/alocacoes/save/' . $row->cod_alocacao); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
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
                             <td>Hospede</td>
                             <td>
                                <select name="cod_hospede" class="form_input">
                                <?php foreach(relacionamento('hospedes', 'cod_hospede', 'nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_hospede;?>" <?php if($row->cod_hospede == $rel->cod_hospede)echo 'selected'; ?>><?=$rel->nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Apartamento</td>
                             <td>
                                <select name="cod_apartamento" class="form_input">
                                <?php foreach(relacionamento('apartamentos', 'cod_apartamento', 'numero', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_apartamento;?>" <?php if($row->cod_apartamento == $rel->cod_apartamento)echo 'selected'; ?>><?=$rel->numero;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/alocacoes', 'Cancelar'); ?>
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
