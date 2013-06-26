<div id="painel_interno">
    <div id="menu_topo">
        <div class="postmetadataheader">
            <h2 class="postheader">Check-in</h2>
        </div>
        <div id="menu">
            <ul>
                <li><?= anchor('admin/apartamentos/insert', 'Adicionar', array('class' => 'ui-button botao')) ?></li>
                <li><?= anchor('admin/index', 'Fechar', array('class' => 'ui-button botao')) ?></li>
            </ul>
        </div>
    </div>
    <div id="modo">
    <?php
        switch (@$modo):
        default:
            // Mosaico de apartamentos.
            ?>
            <div id="grid">
                <ul id="lista_apto_checkin">
                    <?php
                    $arrayApartamentos = listaApartamentos();
                    foreach($arrayApartamentos as $apto){                       
                    ?>
                    <li>
                        <h1><?= $apto['numero']; ?></h1>
                        <p><?= $apto['status']; ?></p>
                        <?php
                        if($apto['status'] == 'Livre'){
                        ?>
                        <p><?= anchor('admin/checkin/novo/'.$apto['cod_apartamento'], 'Check-in'); ?> | <?= anchor('admin/checkin/novareserva/'.$apto['cod_apartamento'], 'Reservar'); ?></p>
                        <?php } 
                     ?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            break;
        case 'insert':
            ?>
            <form name="form_insert" action="<?= site_url('admin/apartamentos/save/'); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Categoria</td>
                             <td>
                                <select name="cod_cat_apartamento" class="form_input">
                                <?php foreach(relacionamento('categoria_apartamento', 'cod_cat_apartamento', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_cat_apartamento;?>"><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Ramal</td>
                             <td><input type="text" name="ramal" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td><input type="text" name="status" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/apartamentos', 'Cancelar'); ?>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </form>
             <?php
             break;
         case 'update':
             ?>
             <form name="form_update" action="<?= site_url('admin/apartamentos/save/' . $row->cod_apartamento); ?>" method="POST" enctype="multipart/form-data" class="ui-widget-content">
                 <table border="0" width="100%" align="center" class="ui-widget" id="table_form">
                     <thead>
                         <tr>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>Categoria</td>
                             <td>
                                <select name="cod_cat_apartamento" class="form_input">
                                <?php foreach(relacionamento('categoria_apartamento', 'cod_cat_apartamento', 'titulo', '', 'form') as $rel): ?>
                                    <option value="<?=$rel->cod_cat_apartamento;?>" <?php if($row->cod_cat_apartamento == $rel->cod_cat_apartamento)echo 'selected'; ?>><?=$rel->titulo;?></option>
                                <?php endforeach; ?>
                                </select>
                             </td>
                         </tr>
                         <tr>
                             <td>Número</td>
                             <td><input type="text" name="numero" value="<?= $row->numero; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Ramal</td>
                             <td><input type="text" name="ramal" value="<?= $row->ramal; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td><input type="text" name="status" value="<?= $row->status; ?>" size="45" class="form_input" /></td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <input type="submit" value="Salvar" name="bot_salvar" class="ui-button botao" />
                                 <?= anchor('admin/apartamentos', 'Cancelar'); ?>
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
