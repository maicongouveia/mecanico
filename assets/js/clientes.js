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
		$('#ClienteDados').modal('show');
	}else{
		document.getElementById('nomeCliente').focus();
		document.getElementById('nomeCliente').setAttribute("style", "border: 1px solid red;");
	}
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

function abrirModal(nomeModal){
	$(nomeModal).modal('show');
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
    	//console.log(json);
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

			document.getElementById('nomeDoClienteTitulo').innerHTML = cliente['nome'];

			//Botão de Excluir
			document.getElementById('botaoAuxiliar').setAttribute("onclick","excluirCliente("+cliente['id']+");");
			document.getElementById('botaoAuxiliar').innerHTML = Excluir;


			abrirModal('#ClienteDados');


			
		}
   	}	
}