<?php

/*******************************************************************************
ARQUIVO .........: Módulo de contato - Fale Conosco
AUTOR ...........: Eliel de Paula - contato@whdesign.com.br
SITE ............: WHDesign - www.whdesign.com.br
DATA ............: 05/06/2006
********************************************************************************/

// CAPTURA OS DADOS DO FORMULÁRIO
$contato   =	   "reservas.hotelcastelo@gmail.com";			// EMAIL DESTINO, COLOQUE O SEU EMAIL ENTRE AS "ASPAS".
$acao      =       $_POST["acao"];		// AÇÃO DO FORMULÁRIO - NÃO ALTERAR
$nome      =       $_POST["nome"];		// NOME DIGITADO PELO USUÁRIO
$email     =       $_POST["email"];		// EMAIL DIGITADO PELO USUÁRIO
$assunto   =       $_POST["assunto"];	// ASSUNTO DIGITADO PELO USUÁRIO
$mensagem  =       $_POST["mensagem"];	// MENSAGEM DIGITADA PELO USUÁRIO

// TESTA A AÇÃO DO SISTEMA
if($acao == "enviar"){
	
// ENVIA A MENSAGEM:
mail("$contato", "$assunto [ Enviado pelo Site - Hotel Castelo - TO ]", "$mensagem", "From: $nome <$email>");
	
echo "<br><br><br><br><b><center>";
echo "$nome, sua mensagem foi enviada com sucesso,<br>em breve entraremos em contato.";
echo "</center></b>";
	
}
else{

?>


<link href="../conf/estilo.css" rel="stylesheet" type="text/css">
<form method="post" action="">

<input type="hidden" name="acao" value="enviar">
<table align="center" width="99%" border="0" cellpadding="0" cellspacing="0" class="texto-1">
  <!--DWLayoutTable-->
  <tr align="left" class="texto-1"> 
      <td height="56" colspan="4" valign="middle" style="padding-left=10;"> 
          <a class="texto-1">
	      <font size="2" face="Arial, Helvetica, sans-serif">
	      Preencha o formulário abaixo para entrar em contato:
          </font>
          </a>      
	  </td>
    </tr>
  <tr align="center">
    <td height="24" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="11">&nbsp;</td>
    <td width="232" valign="bottom"><div align="left">Mensagem:</div></td>
  </tr>
  <tr> 
    <td width="50" height="22" align="right" valign="middle">
	 Nome:
	  </td>
    <td width="108" valign="top">
	  <input name="nome" type="text" class="caixa-1" id="nome">	  </td>
    <td>&nbsp;</td>
    <td rowspan="5" valign="top">      <textarea name="mensagem" cols="60" rows="12" class="caixa-1" id="mensagem"></textarea></td>
    </tr>
  <tr> 
    <td height="22" align="right" valign="middle">
	  E-Mail:
	  </td>
    <td valign="top">
	  <input name="email" type="text" class="caixa-1" id="email">	 </td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">
	  Assunto:
	  </td>
    <td valign="top">
	  <input name="assunto" type="text" class="caixa-1" id="assunto">	</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="22" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="144" colspan="2" align="center" valign="top">
	 <input type="submit" name="Submit" value="Enviar" class="botao-1"> 
     &nbsp;
	 <input type="reset" name="Submit2" value="Apagar" class="botao-1">	</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<?php

} // FECHA O IF
	
?>
