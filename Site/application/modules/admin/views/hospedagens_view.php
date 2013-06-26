<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de hospedagens.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/hospedagens/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_hospedagem; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/hospedagens/update/' . $row->cod_hospedagem, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/hospedagens/delete/' . $row->cod_hospedagem, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/hospedagens/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Usuário</td>
                             <td>
                                <select name="cod_usuario" class="form_input">
                                <?php foreach(relacionamento('tb_usuarios', 'cod_usuario', 'usu_nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_usuario;?>"><?=$rel->usu_nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Tipo</td>
                             <td><input type="text" name="tipo" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Data entrada</td>
                             <td><input type="text" name="data_entrada" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Data saída</td>
                             <td><input type="text" name="data_saida" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td><input type="text" name="status" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Data fechamento</td>
                             <td><input type="text" name="data_fechamento" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Valor ligações</td>
                             <td><input type="text" name="valor_ligacoes" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor consumo</td>
                             <td><input type="text" name="valor_consumos" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor serviços</td>
                             <td><input type="text" name="valor_servicos" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Total</td>
                             <td><input type="text" name="valor_total" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Desconto</td>
                             <td><input type="text" name="valor_desconto" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/hospedagens', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/hospedagens/save/' . $row->cod_hospedagem); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Usuário</td>
                             <td>
                                <select name="cod_usuario" class="form_input">
                                <?php foreach(relacionamento('tb_usuarios', 'cod_usuario', 'usu_nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_usuario;?>" <?php if($row->cod_usuario == $rel->cod_usuario)echo 'selected'; ?>><?=$rel->usu_nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Tipo</td>
                             <td><input type="text" name="tipo" value="<?= $row->tipo; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Data entrada</td>
                             <td><input type="text" name="data_entrada" value="<?= mdate('%d/%m/%Y', strtotime($row->data_entrada)); ?>" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Data saída</td>
                             <td><input type="text" name="data_saida" value="<?= mdate('%d/%m/%Y', strtotime($row->data_saida)); ?>" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td><input type="text" name="status" value="<?= $row->status; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Data fechamento</td>
                             <td><input type="text" name="data_fechamento" value="<?= mdate('%d/%m/%Y', strtotime($row->data_fechamento)); ?>" size="20" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Valor ligações</td>
                             <td><input type="text" name="valor_ligacoes" value="<?= $row->valor_ligacoes; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor consumo</td>
                             <td><input type="text" name="valor_consumos" value="<?= $row->valor_consumos; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor serviços</td>
                             <td><input type="text" name="valor_servicos" value="<?= $row->valor_servicos; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Total</td>
                             <td><input type="text" name="valor_total" value="<?= $row->valor_total; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Desconto</td>
                             <td><input type="text" name="valor_desconto" value="<?= $row->valor_desconto; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/hospedagens', 'Cancelar'); ?>
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
