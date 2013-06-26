<?php


$contato		=	"reservas.hotelcastelo@gmail.com";

$acao			=	$_POST["acao"];

$nome			=	$_POST["nome"];
$email			=	$_POST["email"];
$telefone		=	$_POST["telefone"];
$apartamento	=	$_POST["apartamento"];
$data			=	$_POST['data'];
$data2			=	$_POST['data2'];
$hora			=	$_POST['hora'];

// TESTA A AÇÃO DO SISTEMA
if($acao == "enviar"){

// MONTA A MENSAGEM

$msg .= "\n SOLICITAÇÃO DE RESERVA ENVIADA PELO SITE \n";
$msg .= "=============================================\n\n";
$msg .= "Nome: ".$nome.".\n";
$msg .= "E-Mail: ".$email.".\n";
$msg .= "Telefone para contato: ".$telefone.".\n";
$msg .= "Apartamento desejado: ".$apartamento.".\n";
$msg .= "Data de chegada (check-in): ".$data.".\n";
$msg .= "Data de saída (check-out): ".$data2.".\n";
$msg .= "Hora de chegada: ".$hora.".\n";
$msg .= "Solicitação enviada em: ".date("d/m/Y").".\n\n";
	
// ENVIA A MENSAGEM:
mail("$contato", "$assunto [ Solicitação de reserva enviada pelo site - Hotel Castelo - TO ]", "$msg", "From: $nome <$email>");
	
echo "<br><br><b><center>";
echo "$nome, sua reserva foi enviada com sucesso,<br>em breve entraremos em contato.";
echo "</center></b><br><br>";
	
}
else{

?>


<link href="../conf/estilo.css" rel="stylesheet" type="text/css">
<form method="post" action="">
<input type="hidden" name="acao" value="enviar">
<table align="center" width="99%" border="0" cellpadding="0" cellspacing="0" class="texto-1">
  <!--DWLayoutTable-->
  <tr align="left" class="texto-1">
    <td align="left" valign="middle" style="padding-left=10;"><!--DWLayoutEmptyCell-->&nbsp;</td> 
      <td height="56" align="left" valign="middle" style="padding-left=10;"> 
          <a class="texto-1">
	      <font size="2" face="Arial, Helvetica, sans-serif">
	      Preencha o formulário abaixo para solicitar uma reserva:          </font>          </a>	  </td>
    </tr>
  <tr align="center">
    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="24" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="36" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td> 
    <td width="913" height="22" align="left" valign="middle">
	 Nome
	   <br />      </td>
    </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><input name="nome" type="text" class="caixa-1" id="nome" size="45" /></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td> 
    <td height="22" align="left" valign="middle">
	  E-Mail	    </td>
    </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><input name="email" type="text" class="caixa-1" id="email" size="25" /></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle">Telefone</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><input name="telefone" type="text" class="caixa-1" id="telefone" size="25" /> 
      (99)9999-9999</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle">Apartamento</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><select name="apartamento" id="apartamento">
      <option disabled="disabled">Apartamentos completos</option>
      <option value="Apto. completo - Single">Single</option>
      <option value="Apto. completo - Duplol">Duplo</option>
      <option value="Apto. completo - Ccasal">Casal</option>
      <option value="Apto. completo - Triplo">Triplo</option>
      <option value="Apto. completo - Quadruplo">Quadruplo</option>
      <option value="Apto. completo - Apart-hotel (1 pessoa)">Apart-hotel (1 pessoa)</option>
      <option value="Apto. completo - Apart-hotel (2 pessoas)">Apart-hotel (2 pessoas)</option>
      <option value="Apto. completo - Su&iacute;te master (1 pessoa)">Su&iacute;te master (1 pessoa)</option>
      <option value="Apto. completo - Su&iacute;te master (2 pessoas)">Su&iacute;te master (2 pessoas)</option>
      <option disabled="disabled">Apartamentos simples</option>
      <option value="Apto. simples - Single">Single</option>
      <option value="Apto. simples - Casal">Casal</option>
      <option value="Apto. simples - Quadruplo">Quadruplo</option>
    </select>    </td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td> 
    <td height="22" align="left" valign="middle">
	  Data	do check-in   </td>
    </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><input name="data" type="text" class="caixa-1" id="data" size="20" /> 
      dd/mm/aaaa</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle">Data do check-out</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="middle"><input name="data2" type="text" class="caixa-1" id="data2" size="20" />
dd/mm/aaaa</td>
  </tr>
  <tr>
    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td> 
    <td height="22" align="left" valign="top">Hor&aacute;rio de chegada</td>
    </tr>
  <tr>
    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="top"><input name="hora" type="text" class="caixa-1" id="hora" size="15" /> 
      hh:mm Ex. 22:30</td>
  </tr>
  <tr>
    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="22" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="58" align="left" valign="top">
	 <input type="submit" name="Submit" value="Enviar" class="botao-1"> 
     &nbsp;
	 <input type="reset" name="Submit2" value="Apagar" class="botao-1">	</td>
    </tr>
</table>

</form>

<?php

} // FECHA O IF
	
?>
