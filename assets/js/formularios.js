function adicionarTelefoneTela(contador){
	if(document.getElementById('telefoneCliente').value == "" ||  document.getElementById('telefoneCliente').value.length < 12){
		alert("Insira um telefone válido");
		document.getElementById('telefoneCliente').focus();
	}else{
		var divTelefone = document.getElementById('divTelefones');
		contador = contador + 1;
		document.getElementById('botaoAddTelefone').setAttribute("onclick","adicionarTelefoneTela("+contador+")");
		telefone = document.getElementById('telefoneCliente').value.split(" ");
		document.getElementById('telefoneCliente').value = "";
		var telefoneFormatado = "("+telefone[0]+")"+telefone[1]+"-"+telefone[2];
		var novoDivTelefone = ""
		+"<div class='row' id='telefone"+contador+"' style='border: 1px solid black;border-radius: 20px; padding: 10px;'>"
		+"<font class='col-md-7' style='font-size: 18px; padding: 5px; font-weight: bold;'>"+telefoneFormatado+"</font>"
		+"<a href='#'' onclick='#'' class='btn btn-default col-md-2'> <span class='glyphicon glyphicon-edit'></span></a>"
		+"<a href='#' onclick='removerCampoAdicional(\"telefone"+contador+"\")' class='btn btn-default col-md-offset-1 col-md-2'> <span class='glyphicon glyphicon-remove'></span></a>"
		+"<input type='hidden' name='telefones[]'' value='"+telefone+"'>"
		+"</div>";
		divTelefone.innerHTML += novoDivTelefone;
	}
}

function adicionarEmailTela(contador){
	var email = document.getElementById('emailCliente').value;
	if(email == "" ||  email.indexOf("@") == -1 || email.indexOf('.') == -1){
		alert("Insira um email válido");
		document.getElementById('emailCliente').focus();
	}else{
		divEmail = document.getElementById('divEmail');
		contador = contador + 1;
		document.getElementById('botaoAddEmail').setAttribute("onclick","adicionarEmailTela("+contador+")");
		document.getElementById('emailCliente').value = "";
		var novoDivEmail = ""
		+"<div class='row' id='email"+contador+"' style='border: 1px solid black;border-radius: 20px; padding: 10px;'>"
		+"<font class='col-md-7' style='font-size: 18px; padding: 5px; font-weight: bold;'>";
		if(email.length > 10 ){
			novoDivEmail += email.substr(0,10)+"...";
		}
		else{
			novoDivEmail += email;
		};
		novoDivEmail +="</font>"
		+"<a href='#divEmail'' onclick='#'' class='btn btn-default col-md-2'> <span class='glyphicon glyphicon-edit'></span></a>"
		+"<a href='#divEmail' onclick='removerCampoAdicional(\"email"+contador+"\")' class='btn btn-default col-md-offset-1 col-md-2'> <span class='glyphicon glyphicon-remove'></span></a>"
		+"<input type='hidden' name='emails[]'' value='"+email+"'>"
		+"</div>";
		divEmail.innerHTML += novoDivEmail;
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
		document.getElementById("tituloRegistro").innerHTML = "CNPJ:";
		document.getElementById("registroCliente").value= "";
		document.getElementById("registroCliente").setAttribute("maxlength","18");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'##.###.###/####-##')");
	}
	if(registro == "cpf"){
		document.getElementById("tituloRegistro").innerHTML = "CPF: ";
		document.getElementById("registroCliente").value="";
		document.getElementById("registroCliente").setAttribute("maxlength","14");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'###.###.###-##')");
	}
}