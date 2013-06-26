<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de hospedes.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/hospedes/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Nome</th>
                            <th class="ui-widget-header">Telefone</th>
                            <th class="ui-widget-header">Celular</th>
                            <th class="ui-widget-header">Ativo</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_hospede; ?></td>
                                <td valign="middle"><?= $row->nome; ?></td>
                                <td valign="middle"><?= $row->telefone; ?></td>
                                <td valign="middle"><?= $row->celular; ?></td>
                                <td valign="middle"><?= sim_nao($row->ativo); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/hospedes/update/' . $row->cod_hospede, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/hospedes/delete/' . $row->cod_hospede, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/hospedes/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Nome</td>
                             <td><input type="text" name="nome" size="64" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>RG</td>
                             <td>
                                <input type="text" name="rg" size="35" class="form_input" />
                                Orgão emissor
                                <input type="text" name="orgao_emissor" size="10" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>CPF</td>
                             <td><input type="text" name="cpf" size="35" class="form_input" /></td>
                         </tr>
                         
                         <tr>
                             <td>Nacionalidade</td>
                             <td>
                                <input type="text" name="nacionalidade" size="22" class="form_input" />
                                Naturalidade
                                <input type="text" name="naturalidade" size="22" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Data de nascimento</td>
                             <td>
                                <input type="text" name="data_nascimento" size="14" class="form_input" />
                                Estado civil
                                <select name="est_civil" class="form_input">
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viuvo">Viúvo</option>
                                </select>
                            </td>
                         </tr>
                         <tr>
                             <td>Endereço</td>
                             <td>
                                <input type="text" name="endereco" size="40" class="form_input" />
                                Número
                                <input type="text" name="numero" size="10" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Complemento</td>
                             <td><input type="text" name="complemento" size="55" class="form_input" /></td>
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
                             <td>
                                <input type="text" name="uf" size="10" class="form_input" />
                                CEP
                                <input type="text" name="cep" size="15" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td>
                                <input type="text" name="telefone" size="15" class="form_input" />
                                Celular
                                <input type="text" name="celular" size="15" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="ativo" value="1" class="form_input" /> Hospede ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/hospedes', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/hospedes/save/' . $row->cod_hospede); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Nome</td>
                             <td><input type="text" name="nome" value="<?= $row->nome; ?>" size="64" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>RG</td>
                             <td>
                                <input type="text" name="rg" value="<?= $row->rg; ?>" size="35" class="form_input" />
                                Orgão emissor
                                <input type="text" name="orgao_emissor" value="<?= $row->orgao_emissor; ?>" size="10" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>CPF</td>
                             <td><input type="text" name="cpf" value="<?= $row->cpf; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Nacionalidade</td>
                             <td>
                                <input type="text" name="nacionalidade" value="<?= $row->nacionalidade; ?>" size="22" class="form_input" />
                                Naturalidade
                                <input type="text" name="naturalidade" value="<?= $row->naturalidade; ?>" size="22" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Data de nascimento</td>
                             <td>
                                <input type="text" name="data_nascimento" value="<?= mdate("%d/%m/%Y", strtotime($row->data_nascimento)); ?>" size="14" class="form_input" />
                                Estado civil
                                <select name="est_civil" class="form_input">
                                    <option value="Solteiro" <?php if($row->est_civil == 'Solteiro'){echo 'selected';} ?> >Solteiro</option>
                                    <option value="Casado" <?php if($row->est_civil == 'Casado'){echo 'selected';} ?> >Casado</option>
                                    <option value="Divorciado" <?php if($row->est_civil == 'Divorciado'){echo 'selected';} ?> >Divorciado</option>
                                    <option value="Viuvo" <?php if($row->est_civil == 'Viuvo'){echo 'selected';} ?> >Viúvo</option>
                                </select>
                            </td>
                         </tr>
                         <tr>
                             <td>Endereço</td>
                             <td>
                                <input type="text" name="endereco" value="<?= $row->endereco; ?>" size="40" class="form_input" />
                                Número
                                <input type="text" name="numero" value="<?= $row->numero; ?>" size="10" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Complemento</td>
                             <td><input type="text" name="complemento" value="<?= $row->complemento; ?>" size="55" class="form_input" /></td>
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
                             <td>
                                <input type="text" name="uf" value="<?= $row->uf; ?>" size="10" class="form_input" />
                                CEP
                                <input type="text" name="cep" value="<?= $row->cep; ?>" size="15" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td>
                                <input type="text" name="telefone" value="<?= $row->telefone; ?>" size="15" class="form_input" />
                                Celular
                                <input type="text" name="celular" value="<?= $row->celular; ?>" size="15" class="form_input" />
                            </td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" value="<?= $row->email; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="ativo" value="1" class="form_input" <?php if($row->ativo){echo 'checked';} ?> /> Hospede ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/hospedes', 'Cancelar'); ?>
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
