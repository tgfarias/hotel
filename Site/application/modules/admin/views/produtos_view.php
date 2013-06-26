<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de produtos.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/produtos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Fornecedor</th>
                            <th class="ui-widget-header">Descrição</th>
                            <th class="ui-widget-header">Valor unitário</th>
                            <th class="ui-widget-header">Disponível</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_produto; ?></td>
                                <td valign="middle"><?= relacionamento('fornecedores', 'cod_fornecedor', 'razao_social', $row->cod_fornecedor, 'text'); ?></td>
                                <td valign="middle"><?= $row->descricao; ?></td>
                                <td valign="middle">R$ <?= formata_valor($row->valor_unitario); ?></td>
                                <td valign="middle"><?= sim_nao($row->disponivel); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/produtos/update/' . $row->cod_produto, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/produtos/delete/' . $row->cod_produto, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/produtos/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Fornecedor</td>
                             <td>
                                <select name="cod_fornecedor" class="form_input">
                                <?php foreach(relacionamento('fornecedores', 'cod_fornecedor', 'razao_social', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_fornecedor;?>"><?=$rel->razao_social;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Descrição</td>
                             <td><input type="text" name="descricao" size="65" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor unitário</td>
                             <td><input type="text" name="valor_unitario" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Disponível</td>
                             <td><input type="checkbox" name="disponivel" value="1" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/produtos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/produtos/save/' . $row->cod_produto); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Fornecedor</td>
                             <td>
                                <select name="cod_fornecedor" class="form_input">
                                <?php foreach(relacionamento('fornecedores', 'cod_fornecedor', 'razao_social', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_fornecedor;?>" <?php if($row->cod_fornecedor == $rel->cod_fornecedor)echo 'selected'; ?>><?=$rel->razao_social;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Descrição</td>
                             <td><input type="text" name="descricao" value="<?= $row->descricao; ?>" size="65" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Valor unitário</td>
                             <td><input type="text" name="valor_unitario" value="<?= formata_valor($row->valor_unitario); ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Disponível</td>
                             <td><input type="checkbox" name="disponivel" value="1" <?= marcado($row->disponivel); ?> /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/produtos', 'Cancelar'); ?>
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
