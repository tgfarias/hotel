<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Gerenciador de funcionarios.</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/funcionarios/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
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
                            <th class="ui-widget-header">Função</th>
                            <th class="ui-widget-header">Telefone</th>
                            <th class="ui-widget-header">Ativo</th>
                            <th class="ui-widget-header" width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $row): ?>
                            <tr>
                                <td valign="middle"><?= $row->cod_funcionario; ?></td>
                                <td valign="middle"><?= $row->nome; ?></td>
                                <td valign="middle"><?= $row->funcao; ?></td>
                                <td valign="middle"><?= $row->telefone; ?></td>
                                <td valign="middle"><?= sim_nao($row->ativo); ?></td>
                                <td valign="middle">
                                    <ul>
                                        <li class="ui-state-default ui-corner-all" title="Alterar">
                                            <?= anchor('admin/funcionarios/update/' . $row->cod_funcionario, 'Alterar', array('class' => 'ui-icon ui-icon-pencil')); ?>
                                        </li>
                                        <li class="ui-state-default ui-corner-all" title="Excluir">
                                            <?= anchor('admin/funcionarios/delete/' . $row->cod_funcionario, 'Apagar', array('class' => 'ui-icon ui-icon-trash', 'onclick' => 'return apagar()')); ?>
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
            <form name="form_insert" action="<?= site_url('admin/funcionarios/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <!-- <tr>
                             <td>Usuário</td>
                             <td>
                                <select name="cod_usuario" class="form_input">
                                <?php foreach(relacionamento('tb_usuarios', 'cod_usuario', 'usu_nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_usuario;?>"><?=$rel->usu_nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr> -->
                         <tr>
                             <td>Turno</td>
                             <td>
                                <select name="cod_turno" class="form_input">
                                <?php foreach(relacionamento('turnos', 'cod_turno', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_turno;?>"><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Nome</td>
                             <td><input type="text" name="nome" size="55" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Função</td>
                             <td><input type="text" name="funcao" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Admissão</td>
                             <td><input type="text" name="data_admissao" size="15" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td><input type="text" name="telefone" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="ativo" value="1" class="form_input" /> Funcionário ativo</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/funcionarios', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/funcionarios/save/' . $row->cod_funcionario); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <!-- <tr>
                             <td>Usuário</td>
                             <td>
                                <select name="cod_usuario" class="form_input">
                                <?php foreach(relacionamento('tb_usuarios', 'cod_usuario', 'usu_nome', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_usuario;?>" <?php if($row->cod_usuario == $rel->cod_usuario)echo 'selected'; ?>><?=$rel->usu_nome;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr> -->
                         <tr>
                             <td>Turno</td>
                             <td>
                                <select name="cod_turno" class="form_input">
                                <?php foreach(relacionamento('turnos', 'cod_turno', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_turno;?>" <?php if($row->cod_turno == $rel->cod_turno)echo 'selected'; ?>><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Nome</td>
                             <td><input type="text" name="nome" value="<?= $row->nome; ?>" size="55" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Função</td>
                             <td><input type="text" name="funcao" value="<?= $row->funcao; ?>" size="35" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Admissão</td>
                             <td><input type="text" name="data_admissao" value="<?= mdate("%d/%m/%Y", strtotime($row->data_admissao)); ?>" size="15" class="data" /></td>
                         </tr>
                         <tr>
                             <td>Telefone</td>
                             <td><input type="text" name="telefone" value="<?= $row->telefone; ?>" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td><input type="text" name="email" value="<?= $row->email; ?>" size="25" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td><label><input type="checkbox" name="ativo" value="1" size="45" class="form_input" <?php if($row->ativo){ echo 'checked';} ?> /> Funcionário ativo.</label></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/funcionarios', 'Cancelar'); ?>
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
