<?php include 'header.php'; ?>
<div id='div'></div>

<div>

<form class='clientes.php' method="POST">

	<legend id='titulo'>
		Cadastrar Cliente
	</legend>

	<div class='row' style='margin-top: 10px; margin-bottom: 20px;'> 
		<div class='col-md-3 col-md-offset-4'>
			<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cpf' onchange='tipoCliente(this)' checked="checked">Física</label>
			<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cnpj' onchange='tipoCliente(this)'>Jurídica</label>
		</div>	
	</div>

	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<label for="nomeCliente" class='col-md-2'>Nome:</label>
			<input class='form-group input-md col-md-10' type="text" id="nomeCliente" >	
		</div>
	</div>
	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<label for="registroCliente" id='tituloRegistro' class='col-md-2'>CPF:</label>
			<input class='form-group input-md col-md-3' type="text" id="registroCliente" maxlength='18' onkeypress='mascara(this,"###.###.###-##")'>	
		</div>
	</div>

	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'> Telefone</h3>
		<div class='row'>
			<label for="telefoneCliente" class='col-md-3'>Telefone:</label>
			<input class='form-group input-md col-md-6	' type="text" id="telefoneCliente" name='telefoneCliente' maxlength="13" onkeypress="mascara(this,'##-####-#####')" >	
			<a href="#" onclick="#" class='btn btn-default col-md-offset-1'> <span class='glyphicon glyphicon-plus'></span></a>
		</div>
		<div class='col-md-12' id='telefones'>
			<div class='row' style='border: 1px solid black;border-radius: 20px; padding: 10px;'>
				<font class='col-md-7' id='telefone1' style='font-size: 18px; padding: 5px; font-weight: bold;'>(11)97243-1309</font>
				<a href="#" onclick="#" class='btn btn-default col-md-2'> <span class='glyphicon glyphicon-edit'></span></a>
				<a href="#" onclick="#" class='btn btn-default col-md-offset-1 col-md-2'> <span class='glyphicon glyphicon-remove'></span></a>
			</div>
		</div>
	</div>
	
	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'>Endereço</h3>
		<div class='row'>
			<label for="cep" class='col-md-3'>CEP:</label>
			<input class='form-group input-md col-md-8' type="text" id="cep" name='cep' onchange="buscaCep();" onkeypress="mascara(this,'#####-###')" >	
		</div>
		<div class='row'>
			<label for="cep" class='col-md-3'>Endereço:</label>
			<input class='form-group input-md col-md-8' type="text" id="endereco" name='endereco' onchange="buscaCepEndereco();" >	
		</div>
		<div class='row'>
			<label for="cep" class='col-md-3'>Numero:</label>
			<input class='form-group input-md col-md-8' type="text" id="numero" name='numero' >	
		</div>
		<div class='row'>
			<label for="cep" class='col-md-3'>Complem:</label>
			<input class='form-group input-md col-md-8' type="text" id="complemento" name='complemento' >	
		</div>
		<div class='row'>
			<label for="cep" class='col-md-3'>Bairro:</label>
			<input class='form-group input-md col-md-8' type="text" id="bairro" name='bairro' >	
		</div>
		<div class='row'>
			<label for="cep" class='col-md-3'>Cidade:</label>
			<input class='form-group input-md col-md-8' type="text" id="cidade" name='cidade' >	
		</div>
		<div class='row'>
			<a href="#" class='btn btn-success col-md-12'>Adicionar Endereço <span class='glyphicon glyphicon-plus'></span></a>
		</div>
	</div>

	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'> Email's</h3>
		<div class='row'>
			<label for="emailCliente" class='col-md-3'>Email:</label>
			<input class='form-group input-md col-md-6' type="email" id="emailCliente" name='emailCliente'>	
			<a href="#" onclick="#" class='btn btn-default col-md-offset-1'> <span class='glyphicon glyphicon-plus'></span></a>
		</div>
		<div class='col-md-12' id='emails'>
			<div style='border: 1px solid black; border-radius: 20px; padding: 20px;'>

			<div class='row'>
				<font class='col-md-7' id='telefone1' style='font-size: 18px; font-weight: bold;'>
					contato@maicongouveia.co...
				</font>
			</div>
			<div class='row'>
				<a href="#" onclick="#" class='btn btn-default col-md-offset-3 col-md-2'> <span class='glyphicon glyphicon-edit'></span></a>
				<a href="#" onclick="#" class='btn btn-default col-md-offset-1 col-md-2'> <span class='glyphicon glyphicon-remove'></span></a>
			</div>
				
			</div>
		</div>
		<div class='col-md-12' id='emails'>
			<div style='border: 1px solid black; border-radius: 20px; padding: 20px;'>

			<div class='row'>
				<font class='col-md-7' id='telefone1' style='font-size: 18px; font-weight: bold;'>
					gouveia.maicon@gmail.com
				</font>
			</div>
			<div class='row'>
				<a href="#" onclick="#" class='btn btn-default col-md-offset-3 col-md-2'> <span class='glyphicon glyphicon-edit'></span></a>
				<a href="#" onclick="#" class='btn btn-default col-md-offset-1 col-md-2'> <span class='glyphicon glyphicon-remove'></span></a>
			</div>
				
			</div>
		</div>
	</div>

	<div class='col-md-12'>
		<a href="#" onclick='#' class='btn btn-warning col-md-12'> Adicionar <span class='glyphicon glyphicon-plus'></span></a>
	</div>

	 
 </form>

</div>
<?php include 'footer.php'; ?>