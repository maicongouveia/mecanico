<?php include 'header.php'; ?>
<style type="text/css">
	#botaoAddCliente{
	 	border-radius: 50px; 
	 	position: fixed;
	 	width:50px;
	 	height:50px;
	 	padding: 13px;
	 	margin-left: 70%;
	 	margin-top: 30%;
	 	z-index: 0;
	 }

	#nomeCliente{
		border: 0px;'
	}

	.inputsDaTela{
		border:0px;
		outline:0px !important;
        -webkit-appearance:none;
        font-family: Calibri;
        font-size: 15px;
    }
</style>
<script type="text/javascript">

</script>
<div>

	<a href='#' id='botaoAddCliente' class='btn btn-warning glyphicon glyphicon-plus' data-toggle="modal" data-target="#ClienteNome">
	</a>

	<!-- Modal - Nome - Registro -->
	<div class="modal fade" id='ClienteNome' tabindex="-1" role="dialog" style='margin-top: 30vh;'>
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
		        <div class="modal-body" id='FormNomeCliente'>
			        <div class='row'>
		        	 	<input class='inputsDaTela input-sm col-xs-8' type="text" name="nomeCliente" id='nomeCliente' placeholder="Nome do Cliente">
		        			<a href='#' id='botaoSimData' class="btn btn-warning col-xs-3" style='width: 80px; font-family: Calibri;' data-toggle="modal" data-target="#ClienteDados">
		        	 		Criar
		        	 	</a>
			        </div>
		        			        	
		        </div>
		    </div>
		  </div>
	</div>

	<!-- Modal - Cadastro das Informações -->
	<div class="modal fade" id='ClienteDados' tabindex="-1" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">

				<div class='modal-header'>
					<img src="assets/img/user_silhueta.png" class='img-circle col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3'>
					<font id='nomeDoCliente' class="col-md-12 col-xs-12 text-center" style='font-weight: bold;'>Nome do Cliente</font>
				</div>

		        <div class="modal-body" id='FormDados' style='height: auto;'>

		        	<div class='row'> 
						<div class='col-md-12 text-center'>
							<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cpf' onchange="tipoCliente(this.value);" checked="checked">Física</label>
							<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cnpj' onchange="tipoCliente(this.value);">Jurídica</label>
						</div>	
					</div>
					
					<div class='row'> 
						<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' style='border-bottom: 1px solid black;' type="text" id="registroCliente" maxlength='14' onkeypress='mascara(this,"###.###.###-##")' placeholder="CPF">
					</div>

					<div class='row' style='margin-top: 20px;'> 
						<div id='InputsTelefone' class='col-md-12'>
							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12  text-center disable-focus' type="text" name="telefone[]" placeholder="Adicionar um telefone">
						</div>
					</div>

					<div class='row'>
						<div id='InputsEndereço' class='col-md-12'>
		        			<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12  text-center' type="text" name="endereco[]" placeholder="Adicionar um endereço">	
		        		</div>
					</div>
		        	

					<div class='row'>
						<div id='InputsEmail' class='col-md-12'>
							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12  text-center' type="text" name="email[]" placeholder="Adicionar um email">
						</div>
					</div>
					<div class='row'>
							
					</div>
		        	
				</div>

		        <div class="modal-footer">
		        	<a href="#" class='btn btn-default' style='font-family: Calibri; width: 80px; border-radius: 5px;'>Cancelar</a>
		        	<a href="#" class='btn btn-warning' style='font-family: Calibri; width: 80px; border-radius: 5px;'>Salvar</a>

		        </div>	     
		    </div>
		</div>
	</div>

</div>
<?php include 'footer.php'; ?>
