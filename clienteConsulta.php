<?php include 'header.php'; ?>
<style type="text/css">
	#botaoAddCliente{
	 	border-radius: 50px; 
	 	width:50px;
	 	height:50px;
	 	padding: 13px;
	 	text-align: center;
	 	position: fixed;
		right: 10vh;
		top: 80vh;
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
<!-- Importando JS de Clientes -->
<script src="assets/js/clientes.js"></script>
<script type="text/javascript">consultaClientes();</script>
<div>

	<!--Botão para Adicionar Clientes-->
	<a href='#' id='botaoAddCliente' class='btn btn-warning glyphicon glyphicon-plus' onclick='abrirModal();'>	</a>

	<!--Aba para Adicionar Clientes-->
	<div id='clientes'>
	</div>

	<!-- Modal - Nome - Registro -->
	<div class="modal fade" id='ModalInicial' tabindex="-1" role="dialog" style='margin-top: 30vh;'>
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
		        <div class="modal-body" id='FormNomeCliente'>
			        <div class='row'>
		        	 	<input class='inputsDaTela input-sm col-xs-8' type="text" name="nomeCliente" id='nomeCliente' placeholder="Nome do Cliente">
		        			<a href='#' id='botaoSimData' class="btn btn-warning col-xs-3" style='width: 80px; font-family: Calibri;' onclick='nomeDoCliente(nomeCliente.value);'>
		        	 		Criar
		        	 	</a>
			        </div>
		        			        	
		        </div>
		    </div>
		  </div>
	</div>

	<!-- Modal - Cadastro das Informações -->
	<div class="modal fade" id='ClienteDados' tabindex="-2" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">

				<div class='modal-header'>
					<img src="assets/img/user_silhueta.png" class='img-circle img-responsive col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3'>
					<font id='nomeDoClienteTitulo' class="col-md-12 col-xs-12 text-center" style='font-weight: bold;'>Nome do Cliente</font>
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
							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' 
								type="text" name="telefone[]" id='telefone1'  
								placeholder="Adicionar um telefone" maxlength="13" 
								onchange="criarInput('telefone',1);" onkeypress="mascara(this,'## #### #####')"
							>
						</div>
					</div>

					<div class='row'>
						<div id='InputsEndereco' class='col-md-12'>
		        			<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' 
		        				type="text" name="endereco[]" id='endereco1' 
		        				placeholder="Adicionar um endereço" 
		        				onchange="criarInput('endereco',1);"
		        			>	
		        		</div>
					</div>
		        	

					<div class='row'>
						<div id='InputsEmail' class='col-md-12'>
							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' 
								type="email" name="email[]" id='email1' 
								placeholder="Adicionar um email" 
								onchange="criarInput('email',1);"
							>
						</div>
					</div>
					<div class='row'>
							
					</div>
		        	
				</div>

		        <div class="modal-footer">
		        	<a href="#" class='btn btn-default' data-dismiss="modal" style='font-family: Calibri; width: 80px; border-radius: 5px;'>Cancelar</a>
		        	<a href="#" class='btn btn-warning' onclick="salvar();" style='font-family: Calibri; width: 80px; border-radius: 5px;'>Salvar</a>

		        </div>	     
		    </div>
		</div>
	</div>

</div>
<?php include 'footer.php'; ?>
