<?php include 'header.php'; ?>
<div id='div'></div>

<div>

<form class='clientes.php' method="POST">

	<legend id='titulo'>
		Cadastrar Cliente
	</legend>

	<div class='row' style='margin-top: 10px; margin-bottom: 20px;'> 
		<div class='col-md-3 col-md-offset-4'>
			<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cpf' onchange="tipoCliente(this.value);" checked="checked">Física</label>
			<label class="radio-inline"><input type="radio" name="registro" id='registro' value ='cnpj' onchange="tipoCliente(this.value);">Jurídica</label>
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
			<input class='form-group input-md col-md-3' type="text" id="registroCliente" maxlength='14' onkeypress='mascara(this,"###.###.###-##")'>
		</div>
	</div>

	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'>Telefone</h3>
		<div class='row'>
			<label for="telefoneCliente" class='col-md-3' style='padding: 5px; font-size: 20px;'>Tel:</label>
			<input class='form-group input-md col-md-6' type="text" id="telefoneCliente" name='telefoneCliente' maxlength="14" onkeypress="mascara(this,'## #### #####');" style='padding: 5px; border: 2px solid black; border-radius: 15px;' placeholder="11 2735 2000">	
			<a href="#" id='botaoAddTelefone' onclick="adicionarTelefoneTela(1)" class='btn btn-default col-md-offset-1'> <span class='glyphicon glyphicon-plus'></span></a>
		</div>
		<div class='col-md-12' id='divTelefones'>
		</div>
	</div>
	
	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'>Endereço</h3>
		<div id='formEndereco'>
			<div class='row'>
				<label for="cep" class='col-md-3'>Nome:</label>
				<input class='form-group input-md col-md-8' type="text" id="titulo" name='titulo' placeholder="(Ex: Casa, Trabalho)">	
			</div>
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
				<a href="#" onclick='adicionarEndereco();' class='btn btn-success col-md-12'>Adicionar Endereço <span class='glyphicon glyphicon-plus'></span></a>
			</div>
		</div>
	</div>
	<div id='enderecosCliente'>
		
	</div>

	<div class='col-md-4' style='border-right: 1px solid black;'>
	<h3 class='text-center'>Email's</h3>
		<div class='row'>
			<label for="emailCliente" class='col-md-3' style='padding: 5px; font-size: 20px;'>Email:</label>
			<input class='form-group input-md col-md-6' type="email" id="emailCliente" name='emailCliente' style='padding: 5px;'>	
			<a href="#divEmail" onclick="adicionarEmailTela(1);" id='botaoAddEmail' class='btn btn-default col-md-offset-1'> <span class='glyphicon glyphicon-plus'></span></a>
		</div>
		<div class='col-md-12' id='divEmail'>
			
		</div>
	</div>

	<div class='col-md-12'>
		<a href="#" onclick='#' class='btn btn-warning col-md-12'> Adicionar <span class='glyphicon glyphicon-plus'></span></a>
	</div>

	 
 </form>

</div>
<?php include 'footer.php'; ?>