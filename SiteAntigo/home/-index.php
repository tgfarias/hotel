<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Hotel Castelo :.</title>
<style type="text/css">
<!--
body {
	background-color: #DCD3C0;
	margin-top: 0px;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.borda_completa_tabela {
	border: 1px solid #BEAD8B;
}
.texto1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	padding: 10px;
}
input {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #000000;
	text-decoration: none;
	background-color: #E8E8E8;
	border: 1px solid #996600;
}
textarea {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #000000;
	background-color: #E8E8E8;
	border: 1px solid #996600;
}
img {
	padding: 3px;
}
.rodape {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	padding: 5px;
}
.borda_cinza {
	background-color: #F9F9F9;
	border: 1px solid #CCCCCC;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
a {
	font-weight: bold;
}
.style1 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #FFFFFF; padding: 5px; }
#Layer1 {
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	z-index:1;
	background-image: url(../images/fundo_load.png);
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center center;
	background-color: #FCFCFC;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
</head>

<body>
<table width="788" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_completa_tabela">
  <!--DWLayoutTable-->
  <tr>
    <td height="35" colspan="2" background="../images/barra_menu1.jpg" bgcolor="#C2AD92" class="texto1" style="background-repeat:no-repeat"><div align="right"><a href="./?cont=home">Home |</a> <a href="./?cont=empresa">Empresa</a> <a href="#">|</a> <a href="./?cont=estrutura">Nossa Estrutra |</a> <a href="./?cont=tarifas">Tarifas</a> <a href="#">|</a> <a href="./?cont=contato">Fale Conosco </a></div></td>
  </tr>
  
  <tr>
    <td height="9" colspan="2"><img src="../images/barra.jpg" width="780" height="3" /></td>
  </tr>
  
  <tr>
    <td height="163" colspan="2"><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="780" height="163">
        <param name="movie" value="../flash/imagefader1.swf" />
        <param name="quality" value="high" />
        <embed src="../flash/imagefader1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="780" height="163"></embed>
      </object>
    </div></td>
  </tr>
  
  <tr>
    <td height="9" colspan="2"><img src="../images/barra.jpg" width="780" height="3" /></td>
  </tr>
  <tr>
    <td height="38" colspan="2" valign="top" background="../images/fundo.jpg" class="texto1">
	<?php
	#	Interface de exibição de donteúdo.
	$cont	=	$_GET['cont'];
	if($cont){
		@include("../includes/inc.cont.".$cont.".php");
		}
		else{
		@include("../includes/inc.cont.home.php");
		} // Fecha o if
	?>	</td>
  </tr>
  <tr>
    <td height="9" colspan="2"><img src="../images/barra.jpg" width="780" height="3" /></td>
  </tr>
  <tr>
    <td height="65" colspan="2" class="texto1"><strong>Tel.:</strong> (63) 3216-9100<br />
      <strong>Cel.:</strong> (63) 8403-0554<br />
      <strong>E-Mail:</strong> <a href="mailto:contato@hotelcastelo-to.com.br"><font color="#000000">contato@hotelcastelo-to.com.br</font></a></td>
  </tr>
  <tr>
    <td width="679" height="23" valign="top" bgcolor="#C2AD92" class="style1">Copyright 2007 - Hotel Castelo- Todos os direitos reservados.</td>
  <td width="107" align="right" valign="top" bgcolor="#C2AD92" class="style1" onclick="document.location='http://www.whdesign.com.br';" title="Web House Brasil Tecnologia - www.whdesign.com.br"> By Web House Brasil</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
