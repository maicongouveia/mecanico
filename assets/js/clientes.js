function cadastrarCliente(nome,registro,telefones,enderecos,emails){

	var xhttp = new XMLHttpRequest(); 

	var url = 'clientes.php';
	var params = 'operacao=cadastrar&nome='+nome+'&registro='+registro+'&telefones='+telefones+'&enderecos='+enderecos+'&emails='+emails;
    xhttp.open("POST", url , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    xhttp.onreadystatechange = function() {//Call a function when the state changes.
	    if(xhttp.readyState == 4 && xhttp.status == 200) {
	       consultaClientes('tabela');
	    }
	}
}

function nomeDoCliente(nomeCliente){

	if(nomeCliente != ''){
		document.getElementById('nomeDoClienteTitulo').innerHTML = nomeCliente;
		$('#ModalInicial').modal('hide');
		document.getElementById('ClienteDados').innerHTML = "<div class='modal-dialog modal-md' role='document'>"
		+"	<div class='modal-content'>"
		+"		<div class='modal-header'>"
		+"			<img src='assets/img/user_silhueta.png' class='img-circle img-responsive col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3'>"
		+"			<font id='nomeDoClienteTitulo' class='col-md-12 col-xs-12 text-center' style='font-weight: bold;'>Nome do Cliente</font>"
		+"		</div>"
	+"		        <div class='modal-body' id='FormDados' style='height: auto;'>"

	+"		        	<div class='row' id='linhaOptionRegistro'> "
	+"						<div class='col-md-12 text-center'>"
	+"							<label class='radio-inline'><input type='radio' name='registro' id='registro' value ='cpf' onchange='tipoCliente(this.value);' checked='checked'>Física</label>"
	+"							<label class='radio-inline'><input type='radio' name='registro' id='registro' value ='cnpj' onchange='tipoCliente(this.value);'>Jurídica</label>"
	+"						</div>	"
	+"					</div>"
	+"					<div class='row'> "
	+"						<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' style='border-bottom: 1px solid black;' type='text' id='registroCliente' maxlength='14' onkeypress='mascara(this,\"###.###.###-##\")' placeholder='CPF'>"
	+"					</div>"

	+"					<div class='row' style='margin-top: 20px;'> "
	+"						<div id='InputsTelefone' class='col-md-12'>"
	+"							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' "
	+"								type='text' name='telefone[]' id='telefone1'  "
	+"								placeholder='Adicionar um telefone' maxlength='13' "
	+"								onchange='criarInput(\"telefone\",1);' onkeypress='mascara(this,\"## #### #####\")'"
	+"							>"
	+"						</div>"
	+"					</div>"
	+"					<div class='row'>"
	+"						<div id='InputsEndereco' class='col-md-12'>"
	+"		        			<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' "
	+"		        				type='text' name='endereco[]' id='endereco1' "
	+"		        				placeholder='Adicionar um endereço' "
	+"		        				onchange='criarInput(\"endereco\",1);'"
	+"		        			>	"
	+"		        		</div>"
	+"					</div>"
	+"						<div class='row'>"
	+"						<div id='InputsEmail' class='col-md-12'>"
	+"							<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' "
	+"								type='email' name='email[]' id='email1' "
	+"								placeholder='Adicionar um email' "
	+"								onchange='criarInput(\"email\",1);'"
	+"							>"
	+"						</div>"
	+"					</div>"
	+"					<div class='row'>"
	+"					</div>"
	+"		        </div>"
	+"		        <div class='modal-footer'>"
	+"		        	<a href='#' class='btn btn-default' id='botaoAuxiliar' data-dismiss='modal' style='font-family: Calibri; width: 80px; border-radius: 5px;'>Cancelar</a>"
	+"		        	<a href='#' class='btn btn-warning' onclick='salvar();' style='font-family: Calibri; width: 80px; border-radius: 5px;'>Salvar</a>"
	+"		        </div>"
	+"		    </div>"
	+"		</div>'";
		$('#ClienteDados').modal('show');
	}else{
		document.getElementById('nomeCliente').focus();
		document.getElementById('nomeCliente').setAttribute("style", "border: 1px solid red;");
	}
}

function abrirModal(nomeModal){

	$(nomeModal).modal('show');
}

function salvar(){

	var nome = document.getElementById('nomeDoClienteTitulo').innerHTML;
	var registro = document.getElementById('registroCliente').value;

	var campoTelefone = document.getElementsByName("telefone[]");
	var telefones = new Array();
	for (var i = 0; i < campoTelefone.length ; i++) {
		if(campoTelefone[i].value != ""){
			telefones.push(campoTelefone[i].value);
		}
	}

	telefones = telefones.toString();

	var campoEmails = document.getElementsByName("email[]");
	var emails = new Array();
	for (var i = 0; i < campoEmails.length ; i++) {
		if(campoEmails[i].value != ""){
			emails.push(campoEmails[i].value);
		}			
	}
	
	emails = emails.toString();
	
	var campoEnderecos = document.getElementsByName("endereco[]");
	var enderecos = new Array();
	for (var i = 0; i < campoEnderecos.length ; i++) {
		if(campoEnderecos[i].value != ""){
			enderecos.push(campoEnderecos[i].value);
		}
		
	}
	enderecos = enderecos.join(" * ");
	console.log(enderecos);
	
	cadastrarCliente(nome,registro,telefones,enderecos,emails);
	
	$('#ClienteDados').modal('hide');
}

function excluir(id){	

	var xhttp = new XMLHttpRequest();

	var url = 'clientes.php';
	var params = 'operacao=excluir&id='+id;
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    consultaClientes('');

    $("#Aviso").modal('hide');
    
}

function excluirItem(tipoId){

	tipoId = tipoId.split("-");
	tipo = tipoId[0];
	id = tipoId[1];

	var xhttp = new XMLHttpRequest();

	var url = 'clientes.php';
	var params = 'operacao=excluir&tipo='+tipo+'&id='+id;
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    removerCampoAdicional("Linha-"+tipo+"-"+id);

    $("#Aviso").modal('hide');
}

function aviso(tipo,id){
	if(tipo=='excluir'){
		document.getElementById("botaoEsquerdo").setAttribute("onclick","excluir("+id+");");
		document.getElementById("Pergunta").innerHTML = "Deseja excluir esse cliente?";
	}
	else if(tipo=='excluirItem'){
		document.getElementById("botaoEsquerdo").setAttribute("onclick","excluirItem('"+id+"');");
		document.getElementById("Pergunta").innerHTML = "Deseja excluir " + document.getElementById(id).innerHTML;
	}

	abrirModal("#Aviso");
}

function consultaClientes(tipo){

	var xhttp = new XMLHttpRequest();

	var url = 'clientes.php';
	var params = '?operacao=consultar&tipo='+tipo;
    xhttp.open("GET", url+params , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

    document.getElementById("clientesEstranhos").innerHTML = "<div class='col-md-3 col-md-offset-4 col-xs-12'><img class='col-md-10 col-md-offset-1 col-xs-12' src='assets/img/reload.gif'></div>";

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var json = JSON.parse(xhttp.responseText);
    		var cliente;
	    	var tabela = "\n<table class='table table-hover table-striped'>"
	    	tabela += "\n<tr style='font-weight: bold;'>";
	    	tabela += "\n<td>";
	    	tabela += "\nNome do Cliente";
	    	tabela += "\n</td>";
	    	tabela += "\n<td>";
	    	tabela += "\nTelefone Principal";
	    	tabela += "\n</td>";
	    	tabela += "\n<td>";
	    	tabela += "\nEndereço";
	    	tabela += "\n</td>";
	    	tabela += "\n</tr>";
	    	for(var i=0;i<json.length;i++){
	    		cliente = json[i];
	    		telefones = cliente['telefones'];
	    		enderecos = cliente['enderecos'];
	    		tabela += "\n<tr onclick='consultaCliente("+cliente['id']+");'>";
	    		tabela += "\n<td>\n";
	    		tabela += cliente['nome'];
	    		tabela += "\n</td>";
	    		tabela += "\n<td>\n";
	    		if(telefones != null)
	    			tabela += telefones[0]['telefone'];
	    		else
	    			tabela += "--------------";
	    		tabela += "\n</td>";
	    		tabela += "\n<td>\n";
	    		if(enderecos != null)
	    			tabela += enderecos[0]['endereco'];
	    		else
	    			tabela += "--------------";
	    		tabela += "\n</td>";
	    		tabela += "\n</tr>";
	    	}
    		tabela += "</table>";

    	 	document.getElementById("clientesEstranhos").innerHTML = tabela;
		}
    	
	}	
}

function consultaCliente(id){
	var xhttp = new XMLHttpRequest();

	var url = 'clientes.php';
	var params = '?operacao=consultar&tipo=&id='+id;
    xhttp.open("GET", url+params , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {

			var json = JSON.parse(xhttp.responseText);
			//console.log(json);
			var cliente = json[0];
			var telefones = cliente['telefones'];
			var enderecos = cliente['enderecos'];
			var emails = cliente['emails'];

			document.getElementById('nomeDoClienteTitulo').innerHTML = cliente['nome'];
			document.getElementById('linhaOptionRegistro').innerHTML = "";
			document.getElementById('registroCliente').value = cliente['registro'];
			document.getElementById('registroCliente').disabled = true;

			//Cria inputs telefone
			if(telefones!=null){
				var inputsTelefone = "";
				for(var i=0;i<telefones.length;i++){
					inputsTelefone += "<div class='row col-md-6 col-md-offset-4' id='Linha-telefone-"+telefones[i]['id']+"'>";
					inputsTelefone += "\n<a href='#' class='glyphicon glyphicon-pencil'></a>";
					inputsTelefone += "\n<span id='telefone-"+telefones[i]['id']+"'>";
					inputsTelefone += telefones[i]['telefone'];
					inputsTelefone += "</span>";
					inputsTelefone += "\n<a href='#' class='glyphicon glyphicon-trash' onclick='aviso(\"excluirItem\",\"telefone-"+telefones[i]['id']+"\")';></a>";
					inputsTelefone += "</div>";
				}	
				
				inputsTelefone += "\n<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' type='text' name='telefone[]' id='telefone1' placeholder='Adicionar um telefone' maxlength='13' onchange='criarInput(\"telefone\",1);'' onkeypress='mascara(this,\"## #### #####\")'>";

				document.getElementById('InputsTelefone').innerHTML = inputsTelefone;
			}
			
			//Cria inputs endereco
			if(enderecos!=null){
				var inputsEndereco = "";
				for(var i=0;i<enderecos.length;i++){
					inputsEndereco += "<div class='row col-md-8 col-md-offset-2 text-center' id='Linha-endereco-"+enderecos[i]['id']+"'>";
					inputsEndereco += "\n<a href='#' class='glyphicon glyphicon-pencil'></a>";
					inputsEndereco += "\n<span id='endereco-"+enderecos[i]['id']+"'>";
					inputsEndereco += enderecos[i]['endereco'];
					inputsEndereco += "</span>";
					inputsEndereco += "\n<a href='#' class='glyphicon glyphicon-trash' onclick='aviso(\"excluirItem\",\"endereco-"+enderecos[i]['id']+"\")';></a>";
					inputsEndereco += "</div>";					
				}
				inputsEndereco += "\n<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' type='text' name='endereco[]' id='endereco1' placeholder='Adicionar um endereço' onchange=\"criarInput('endereco',1);\">";

				document.getElementById('InputsEndereco').innerHTML = inputsEndereco;
			}

			//Cria inputs email
			if(emails!=null){
				var inputsEmails = "";
				for(var i=0;i<emails.length;i++){
					inputsEmails += "<div class='row col-md-8 col-md-offset-2 text-center' id='Linha-email-"+emails[i]['id']+"'>";
					inputsEmails += "\n<a href='#' class='glyphicon glyphicon-pencil'></a>";
					inputsEmails += "\n<span id='email-"+emails[i]['id']+"'>";
					inputsEmails += emails[i]['email'];
					inputsEmails += "</span>";
					inputsEmails += "\n<a href='#' class='glyphicon glyphicon-trash' onclick='aviso(\"excluirItem\",\"email-"+emails[i]['id']+"\")';></a>";
					inputsEmails += "</div>";					
				}			
				
				inputsEmails += "\n<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center' type='email' name='email[]' id='email1' placeholder='Adicionar um email' onchange=\"criarInput('email',1);\">";

				document.getElementById('InputsEmail').innerHTML = inputsEmails;
			}

			//Botão de Excluir
			document.getElementById('botaoAuxiliar').setAttribute("onclick","aviso('excluir',"+cliente['id']+");");
			document.getElementById('botaoAuxiliar').innerHTML = "Excluir";

			abrirModal('#ClienteDados');			
		}
   	}	
}
