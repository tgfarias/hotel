<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de estoque.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/estoque/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Produto</th>
                            <th class="ui-widget-header">Valor venda</th>
                            <th class="ui-widget-header">Qtde. mínima</th>
                            <th class="ui-widget-header">Qtde. atual</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_estoque; ?></td>
                                <td valign="middle"><?= relacionamento('produtos', 'cod_produto', 'descricao', $row->cod_produto, 'text'); ?></td>
                                <td valign="middle"><?= $row->valor_venda; ?></td>
                                <td valign="middle"><?= $row->qdte_minima; ?></td>
                                <td valign="middle"><?= $row->qtde_atual; ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/estoque/update/' . $row->cod_estoque, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/estoque/delete/' . $row->cod_estoque, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/estoque/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Produto</td>
                             <td>
                                <select name="cod_produto" class="form_input">
                                <?php foreach(relacionamento('produtos', 'cod_produto', 'descricao', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_produto;?>"><?=$rel->descricao;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Valor custo</td>
                             <td><input type="text" name="valor_custo" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor venda</td>
                             <td><input type="text" name="valor_venda" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>margem lucro (%)</td>
                             <td><input type="text" name="margem_lucro" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Qtde. mínima</td>
                             <td><input type="text" name="qdte_minima" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Qtde. atual</td>
                             <td><input type="text" name="qtde_atual" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/estoque', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/estoque/save/' . $row->cod_estoque); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Produto</td>
                             <td>
                                <select name="cod_produto" class="form_input">
                                <?php foreach(relacionamento('produtos', 'cod_produto', 'descricao', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_produto;?>" <?php if($row->cod_produto == $rel->cod_produto)echo 'selected'; ?>><?=$rel->descricao;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Valor custo</td>
                             <td><input type="text" name="valor_custo" value="<?= $row->valor_custo; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor venda</td>
                             <td><input type="text" name="valor_venda" value="<?= $row->valor_venda; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>margem lucro (%)</td>
                             <td><input type="text" name="margem_lucro" value="<?= $row->margem_lucro; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Qtde. mínima</td>
                             <td><input type="text" name="qdte_minima" value="<?= $row->qdte_minima; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Qtde. atual</td>
                             <td><input type="text" name="qtde_atual" value="<?= $row->qtde_atual; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/estoque', 'Cancelar'); ?>
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
