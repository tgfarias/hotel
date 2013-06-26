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
                <table>
                    

                <ul>
                    <?php
                    $arrayApartamentos = listaApartamentos();
                    foreach($arrayApartamentos as $apto){
                         if($selecionado == $apto['numero']){
                    ?>
                    <li>
                        <h1>Apartamento: <?= $apto['numero']; ?></h1>
                       
                        <tr><td>Ramal: </td> <td> <?= $apto['ramal']; ?></td></tr>
                        <tr><td>Hóspede: </td><td>Novo</td></tr>

                        <tr><td>Tarifa: </td></tr>

                        <tr><td>Data Entrada: </td></tr>
                        <tr><td>Hora Entrada: </td></tr>
                        <tr><td>Data Saída: </td></tr>
                        <tr><td>Hora Saída: </td></tr>
                        <?php } ?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                
                </table>
            </div>
            <?php
        endswitch;
        ?>
    </div>
</div>

<?php 
function getYoutubeId( $link="" ) {
    preg_match( '/http[s]?:\/\/(www\.)?youtube\.com\/(watch\?(v=|feature=player_.*?&v=)|v\/|embed\/)([\w-_]+)/i', $link, $result );
    return $result[4];
}
?>