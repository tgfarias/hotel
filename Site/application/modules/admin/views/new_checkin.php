<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Tiago Farias Costa">

	<!--link rel="stylesheet/less" href="<?//= base_url('application/modules/admin/views'); ?>/less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="<?//= base_url('application/modules/admin/views'); ?>/less/social-buttons.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="<?//= base_url('application/modules/admin/views'); ?>/less/responsive.less" type="text/css" /-->
	<!--script src="<?//= base_url('application/modules/admin/views'); ?>/js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?= base_url('application/modules/admin/views'); ?>/css/bootstrap.min.css" rel="stylesheet" >
	<link href="<?= base_url('application/modules/admin/views'); ?>/css/social-buttons.css" rel="stylesheet" >
	<link href="<?= base_url('application/modules/admin/views'); ?>/css/bootstrap-responsive.min.css" rel="stylesheet" >
	<link href="<?= base_url('application/modules/admin/views'); ?>/css/style.css" rel="stylesheet" >	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('application/modules/admin/views'); ?>/img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('application/modules/admin/views'); ?>/img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('application/modules/admin/views'); ?>/img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('application/modules/admin/views'); ?>/img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?= base_url('application/modules/admin/views'); ?>/img/favicon.png">

    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/scripts.js"></script>	
    <script type="text/javascript" src="<?= base_url('application/modules/admin/views'); ?>/js/bootstrap-typeahead.js"></script>	
    	
    <script type="text/javascript">



   /* $(document).ready(function() {
    	$('#modal-hospedes').bind('show', function () {
    		document.getElementById ("xlInput").value = document.title;
    	});
    });*/
    function closeDialog () {
    	$('#modal-hospedes').modal('hide'); 
    };

    function hospedeClicked (codigo) {
    	document.getElementById("hospede-cod").value = codigo;    	
    	closeDialog ();
    };

    function setaNome(nome){
		document.getElementById("hospede-nome").value = nome;
    };
  
    /*function pesquisaCampo(){
    	//alert("Entrou");
    	var texto = document.getElementById("hospede-nome").value;
    	//alert(texto);
    	
    	$.ajax({
	  		url: "<?php echo base_url("application/modules/admin/views")."/modal.php"; ?>",
	  		data: "pesquisa="+texto,
	  		//dataType: 'json',
	  		success: function(data) 
        	{
        		$('#modal-hospedes').modal('show');
        		//$('#form-pesquisa').submit();        		
        		$('.content').html(texto);

        	}
		});		
    	
    };*/

  	
 
$(document).ready(function(){
	var baseurl = $('.baseurl').val();
	$('#submitComment').submit(function(){
		$.ajax({
			url  : baseurl + 'index.php/admin/checkin/ajax',
			type : "POST",
			data :  $('#submitComment form').serialize(),
			success : function(result){					
				$('#modal-hospedes').modal('show');
				$('.content').html(result);
			}
		});
		return false;
	});
});


$(function(){

	$('#data-entrada').datepicker({
		language: 'pt-BR',
		format: 'dd/mm/yyyy'
	});
	$('#data-saida').datepicker({
		language: 'pt-BR',
		format: 'dd/mm/yyyy'
	});


	        // disabling dates
	        var nowTemp = new Date();
	        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	        var checkin = $('#data-entrada').datepicker({
	        	onRender: function(date) {
	        		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	        	}
	        }).on('changeDate', function(ev) {
	        	if (ev.date.valueOf() > checkout.date.valueOf()) {
	        		var newDate = new Date(ev.date)
	        		newDate.setDate(newDate.getDate() + 1);
	        		checkout.setValue(newDate);
	        	}
	        	checkin.hide();
	        	$('#data-saida')[0].focus();
	        }).data('datepicker');
	        var checkout = $('#data-saida').datepicker({
	        	onRender: function(date) {
	        		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	        	}
	        }).on('changeDate', function(ev) {
	        	checkout.hide();
	        	$('#hora-entrada')[0].focus();
	        }).data('datepicker');
	    });
</script>
</head>

<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span8">
					<legend>Dados Cadastrais</legend>
					<div class="control-group" id="submitComment">
						<form method="POST" action="">
							<label class="control-label">Hóspede</label>
							<div class="controls-row">
								<input id="hospede-nome" name="hospede-nome" type="text" placeholder="" class="input-xlarge" required />  
								<input class="baseurl" type="hidden" value="<?= base_url(); ?>" >  
								<button class="btn btn-info btn-small"><i class="icon-search"></i></button>
							</div>
						</form>
					</div>
					<div class="control-group">
						<label class="control-label">Apartamento</label>
						<div class="controls">
							<span class="input-xlarge uneditable-input"><?= $selecionado; ?></span>
						</div>
					</div>
				</div>
			</div>
			<form class="form-horizontal" style="margin-top:10px;border: 0px solid">
				<input id="hospede-cod" name="hospede-cod" type="hidden" placeholder="" class="input-xlarge" required />  
			<div class="row-fluid">
				<div class="span8">
					<div class="control-group">
						<label class="control-label">Tarifa (Diária)</label>
						<div class="controls">
							<select id="tarifa" name="tarifa" class="input-xlarge">
								<option value="<?= $tarifa[1]; ?>">R$ <?=  formata_valor($tarifa[1]); ?></option>
								<option value="<?= $tarifa[2]; ?>">R$ <?= formata_valor($tarifa[2]); ?></option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls-row">
							<input id="data-entrada" name="data-entrada" type="text" placeholder="Data Entrada" class="input-small" required />
							<input id="data-saida" name="data-saida" type="text" placeholder="Data Saída" class="input-small" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls-row">
							<input id="hora-entrada" name="hora-entrada" type="text" maxlength="5" data-mask="99:99" placeholder="Hora Entrada" class="input-small" required />
							<input id="hora-saida" name="hora-saida" type="text" maxlength="5" data-mask="99:99" placeholder="Hora Saída" class="input-small" required />
						</div>
					</div>
				</div>		
			</div>
			<div class="row-fluid">
				<div class="span8">
					<legend>Hóspedes Adicionais</legend>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls-row">
							<input id="hos-nome" name="hos-nome" type="text" placeholder="Nome" class="input-large" />
							<input id="hos-nasc" name="hos-nasc" type="text" placeholder="Nascimento" data-mask="99/99/9999" class="input-medium" />
							<input id="hos-cpf" name="hos-cpf" type="text" placeholder="C.P.F." data-mask="999.999.999-99" class="input-medium" />
							<input id="hos-rg" name="hos-rg" type="text" placeholder="R.G" class="input-medium" />  
							<button id="btn-hospede" name="btn-hospede" class="btn btn-primary">+</button> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">                     
							<textarea id="hosadd" name="hosadd" rows="5" cols="30" class="input-xxlarge"></textarea> 
						</div>
					</div>
					<legend>Observações</legend>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">                     
							<textarea id="obs" name="obs" rows="5" class="input-xxlarge"></textarea>
						</div>
					</div>
				</div>
			</div>
			
			<div id="modal-hospedes" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">
							Hóspedes
						</h3>
					</div>
					<div class="modal-body">
						<div class="content"></div>
						<p>
							<?php 
							//if(isset($_POST['pesquisa']))
							//	echo "<script>alert(".$_POST['pesquisa'].");</script>";
							//foreach($hospedes as $hospede){
							//	echo '<a href="#" onClick="hospedeClicked('.$hospede->cod_hospede.');setaNome(\''.$hospede->nome.'\');"> '.$hospede->nome.'</a>';
							//} ?>
						</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
			</div>
		</form>
	</div>

<!--	<div class="container">
		 <div class="row">
			<div class="span12"> -->
<!-- 				<div class="alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<h4>Alert!</h4> <strong>Warning!</strong> Best check yo self, you're not looking too good.
				</div>

				<button class="btn btn-facebook"><i class="icon-facebook"></i></button>
				<button class="btn btn-twitter"><i class="icon-twitter"></i></button>
				<button class="btn btn-linkedin"><i class="icon-linkedin"></i></button>
				<button class="btn btn-google-plus"><i class="icon-google-plus"></i></button>
				<button class="btn btn-instagram"><i class="icon-instagram"></i></button>
				<button class="btn btn-github"><i class="icon-github"></i></button>
 -->
<!-- 				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="btn-checkin" name="btn-checkin" class="btn btn-primary">Enviar</button>
					</div>
				</div>
 -->
				<!-- Text input-->





			
			
<!-- 	</div>
</div> -->
	
    </body>

</html>
