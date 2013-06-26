<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de fornecedores.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/fornecedores/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Razão social</th>
                            <th class="ui-widget-header">Telefone</th>
                            <th class="ui-widget-header">Email</th>
                            <th class="ui-widget-header">Ativo</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_fornecedor; ?></td>
                                <td valign="middle"><?= $row->razao_social; ?></td>
                                <td valign="middle"><?= $row->telefone; ?></td>
                                <td valign="middle"><?= $row->email; ?></td>
                                <td valign="middle"><?= sim_nao($row->ativo); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/fornecedores/update/' . $row->cod_fornecedor, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/fornecedores/delete/' . $row->cod_fornecedor, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/fornecedores/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Razão social</td>
                             <td><input type="text" name="razao_social" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Nome Fantasia</td>
                             <td><input type="text" name="nome_fantasia" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>CNPJ</td>
                             <td><input type="text" name="cnpj" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Insc. Estadual</td>
                             <td><input type="text" name="ie" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td> Insc. Municipal</td>
                             <td><input type="text" name="im" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Endereço</td>
                             <td><input type="text" name="endereco" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" size="10" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Complemento</td>
                             <td><input type="text" name="complemento" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Bairro</td>
                             <td><input type="text" name="bairro" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Cidade</td>
                             <td><input type="text" name="cidade" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>UF</td>
                             <td><input type="text" name="uf" size="10" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>CEP</td>
                             <td><input type="text" name="cep" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td><input type="text" name="telefone" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Site</td>
                             <td><input type="text" name="site" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="ativo" value="1" /> Fornecedor ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/fornecedores', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/fornecedores/save/' . $row->cod_fornecedor); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Razão social</td>
                             <td><input type="text" name="razao_social" value="<?= $row->razao_social; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Nome Fantasia</td>
                             <td><input type="text" name="nome_fantasia" value="<?= $row->nome_fantasia; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>CNPJ</td>
                             <td><input type="text" name="cnpj" value="<?= $row->cnpj; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Insc. Estadual</td>
                             <td><input type="text" name="ie" value="<?= $row->ie; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td> Insc. Municipal</td>
                             <td><input type="text" name="im" value="<?= $row->im; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Endereço</td>
                             <td><input type="text" name="endereco" value="<?= $row->endereco; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" value="<?= $row->numero; ?>" size="10" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Complemento</td>
                             <td><input type="text" name="complemento" value="<?= $row->complemento; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Bairro</td>
                             <td><input type="text" name="bairro" value="<?= $row->bairro; ?>" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Cidade</td>
                             <td><input type="text" name="cidade" value="<?= $row->cidade; ?>" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>UF</td>
                             <td><input type="text" name="uf" value="<?= $row->uf; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>CEP</td>
                             <td><input type="text" name="cep" value="<?= $row->cep; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td><input type="text" name="telefone" value="<?= $row->telefone; ?>" size="15" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" value="<?= $row->email; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Site</td>
                             <td><input type="text" name="site" value="<?= $row->site; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Ativo</td>
                             <td><input type="checkbox" name="ativo" value="1" <?= marcado($row->ativo); ?> /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/fornecedores', 'Cancelar'); ?>
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
