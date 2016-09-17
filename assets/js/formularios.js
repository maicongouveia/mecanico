function criarInput(tipo, contador){
	if(tipo == "telefone"){
		if(document.getElementById(tipo+contador).value != ''){
			contador++;
			var novoInput = ""
			+"<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' type=\"text\" name=\"telefone[]\"  maxlength=\"13\"  placeholder=\"Adicionar um telefone\" id='telefone"+contador+"' onchange=\"criarInput('telefone',"+contador+")\" onkeypress=\"mascara(this,'## #### #####')\" >";
			var divInputs = document.getElementById('InputsTelefone');
			divInputs.insertAdjacentHTML('beforeend', novoInput);
			document.getElementById(tipo+contador).focus();
		}
		else if(document.getElementById(tipo+contador).value == ''){
			removerCampoAdicional(tipo+contador);
		}
	}	
	else if(tipo == "email"){
		if(document.getElementById(tipo+contador).value != ''){
			contador++;
			var novoInput = ""
			+"<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' type=\"email\" name=\"email[]\" placeholder=\"Adicionar um email\" id='email"+contador+"' onchange=\"criarInput('email',"+contador+")\" >"
			var divInputs = document.getElementById('InputsEmail');
			divInputs.insertAdjacentHTML('beforeend', novoInput);
			document.getElementById(tipo+contador).focus();
		}
		else if(document.getElementById(tipo+contador).value == ''){
			removerCampoAdicional(tipo+contador);
		}
	}
	else if(tipo == "endereco"){
		if(document.getElementById(tipo+contador).value != ''){
			contador++;
			var novoInput = ""
			+"<input class='inputsDaTela input-xs col-md-8 col-md-offset-2 col-xs-12 text-center disable-focus' type=\"text\" name=\"endereco[]\" placeholder=\"Adicionar um endereço\" id='endereco"+contador+"' onchange=\"criarInput('endereco',"+contador+")\" >"
			var divInputs = document.getElementById('InputsEndereco');
			divInputs.insertAdjacentHTML('beforeend', novoInput);
			document.getElementById(tipo+contador).focus();
		}
		else if(document.getElementById(tipo+contador).value == ''){
			removerCampoAdicional(tipo+contador);
		}		
	}	
}

function removerCampoAdicional(nomeDiv){
	var divParaExcluir = document.getElementById(nomeDiv);
	if(divParaExcluir.parentNode){
		divParaExcluir.parentNode.removeChild(divParaExcluir);
	}
}

function verificaUsuario(){

	var registro = document.getElementById("registro").value;

	var xhttp = new XMLHttpRequest(); 

	    if(registro !== ""){
	    	var url = '//iguatemiimoveis.com.br/adm/verificaInquilino.php';
		    xhttp.open("GET", url , true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send();
	    }

	    xhttp.onreadystatechange = function() {

	        if (xhttp.readyState == 4 && xhttp.status == 200) {
	            	
	            	document.getElementById("registro").value = "";

	            	alert("Inquilino já cadastrado no sistema");

		        }
	    };   
}

function tipoCliente(registro){
	if(registro == "cnpj"){
		document.getElementById("registroCliente").value= "";
		document.getElementById("registroCliente").setAttribute("maxlength","18");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'##.###.###/####-##')");
		document.getElementById("registroCliente").setAttribute("placeholder","CNPJ");
	}
	if(registro == "cpf"){
		document.getElementById("registroCliente").value="";
		document.getElementById("registroCliente").setAttribute("maxlength","14");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'###.###.###-##')");
		document.getElementById("registroCliente").setAttribute("placeholder","CPF");
	}
}