function cadastrarCliente(nome,registro,telefones,enderecos,emails){

	var xhttp = new XMLHttpRequest(); 

	var url = 'clientes.php';
	var params = 'operacao=cadastrar&nome='+nome+'&registro='+registro+'&telefones='+telefones+'&enderecos='+enderecos+'&emails='+emails;
    xhttp.open("POST", url , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    xhttp.onreadystatechange = function() {//Call a function when the state changes.
	    if(xhttp.readyState == 4 && xhttp.status == 200) {
	        console.log(xhttp.responseText);
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

function abrirModal(){

	$('#ModalInicial').modal('show');
}

function carregarNaPagina(html){
	document.getElementById('clientes').innerHTML=html;
}

function consultaClientes(){

	var xhttp = new XMLHttpRequest();

	var url = 'clientes.php';
	var params = '?operacao=consultar';
	console.log(url+params);
    xhttp.open("GET", url+params , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

    var html = "<div class='col-md-3 col-md-offset-4 col-xs-12'><img class='col-md-10 col-md-offset-1 col-xs-12' src='assets/img/reload.gif'></div>";
    carregarNaPagina(html);

	xhttp.onreadystatechange = function() {
    	var json = JSON.parse(xhttp.responseText);
    	console.log(json.length);
    	var tabela = "<table class='table-hover'>";
    	for(var i = 0; i<json.length;i++){
    		tabela += "<tr>";
    		tabela += "<td>";
    		tabela += json[i]['nome'];
    		tabela += "</td>";
    		tabela += "</tr>";
    	}

    	tabela += "</table>";

    	//carregarNaPagina(tabela);
	}

	
}


